<?php
/**
 * processes_ImportFile.php
 *
 * If the feature is enable and the code_scanner_scope was enable the argument import_process will check the code
 * Review in a process import
 *
 * @link https://wiki.processmaker.com/3.1/Importing_and_Exporting_Projects#Importing_a_Project
 */

use ProcessMaker\Importer\XmlImporter;
use ProcessMaker\Validation\ValidationUploadedFiles;

ValidationUploadedFiles::getValidationUploadedFiles()->dispatch(function($validator) {
    echo G::json_encode([
        'status' => 'ERROR',
        'success' => true,
        'catchMessage' => $validator->getMessage()
    ]);
    exit();
});

ini_set("max_execution_time", 0);
$affectedGroups = [];
$granularImport = false;
$objectImport = '';
$objectsToImport = '';
if (isset($_POST["PRO_FILENAME"])) {
    $_POST["PRO_FILENAME"] = htmlspecialchars_decode($_POST["PRO_FILENAME"]);
}
/*----------------------------------********---------------------------------*/
if (PMLicensedFeatures::getSingleton()->verifyfeature("B0oWlBLY3hHdWY0YUNpZEtFQm5CeTJhQlIwN3IxMEkwaG4=") &&
    isset($_FILES["PROCESS_FILENAME"]) &&
    $_FILES["PROCESS_FILENAME"]["error"] == 0 &&
    preg_match("/^(?:pm|pmx|pmx2)$/", pathinfo($_FILES["PROCESS_FILENAME"]["name"], PATHINFO_EXTENSION))
) {
    //Check disabled code
    $response = [];

    try {
        $arrayTrigger = [];
        $projectTitle = "";

        switch (pathinfo($_FILES["PROCESS_FILENAME"]["name"], PATHINFO_EXTENSION)) {
            case "pm":
                $fh = fopen($_FILES["PROCESS_FILENAME"]["tmp_name"], "rb");
                $content = fread($fh, (int)(fread($fh, 9)));
                $data = unserialize($content);
                fclose($fh);

                if (is_object($data) && isset($data->triggers) && is_array($data->triggers) && !empty($data->triggers)) {
                    $arrayTrigger = $data->triggers;
                    $projectTitle = $data->process["PRO_TITLE"];
                }
                break;
            case "pmx":
            case "pmx2":
                $importer = new XmlImporter();
                $data = $importer->load($_FILES["PROCESS_FILENAME"]["tmp_name"]);
                if (isset($data["tables"]["workflow"]["triggers"]) && is_array($data["tables"]["workflow"]["triggers"]) && !empty($data["tables"]["workflow"]["triggers"])) {
                    $arrayTrigger = $data["tables"]["workflow"]["triggers"];
                    $projectTitle = $data["tables"]["bpmn"]["project"][0]["prj_name"];
                }
                break;
        }

        if (!empty($arrayTrigger)) {

            $cs = new CodeScanner(config("system.workspace"));

            $strFoundDisabledCode = "";

            foreach ($arrayTrigger as $value) {
                $arrayTriggerData = $value;

                if (in_array('import_process', $cs->getScope())) {
                    $arrayFoundDisabledCode = $cs->checkDisabledCode("SOURCE", $arrayTriggerData["TRI_WEBBOT"]);
                } else {
                    $arrayFoundDisabledCode = [];
                }

                if (!empty($arrayFoundDisabledCode)) {
                    $strCodeAndLine = "";

                    foreach ($arrayFoundDisabledCode["source"] as $key2 => $value2) {
                        $strCodeAndLine .= (($strCodeAndLine != "")? ", " : "") . G::LoadTranslation("ID_DISABLED_CODE_CODE_AND_LINE", array($key2, implode(", ", $value2)));
                    }

                    $strFoundDisabledCode .= (($strFoundDisabledCode != "")? "\n" : "") . "- " . $arrayTriggerData["TRI_TITLE"] . ": " . $strCodeAndLine;
                }
            }

            if ($strFoundDisabledCode != "") {
                $response["status"]  = "DISABLED-CODE";
                $response["success"] = true;
                $response["message"] = G::LoadTranslation("ID_DISABLED_CODE_PROCESS", array($projectTitle, "\n" . $strFoundDisabledCode));

                echo G::json_encode($response);
                exit(0);
            }
        }
    } catch (Exception $e) {
        $response["status"]       = "ERROR";
        $response["success"]      = true;
        $response["catchMessage"] = $e->getMessage();

        echo G::json_encode($response);
        exit(0);
    }
}
/*----------------------------------********---------------------------------*/

if (isset($_FILES["PROCESS_FILENAME"]) && (pathinfo($_FILES["PROCESS_FILENAME"]["name"], PATHINFO_EXTENSION) == "pmx"
        || pathinfo($_FILES["PROCESS_FILENAME"]["name"], PATHINFO_EXTENSION) == "pmx2")

) {
    $importer = new XmlImporter();
    $importer->setData("usr_uid", $_SESSION["USER_LOGGED"]);
    $importer->setSaveDir(PATH_DOCUMENT . "input");
    $importer->setSourceFromGlobals("PROCESS_FILENAME");

    try {
        $opt1 = XmlImporter::IMPORT_OPTION_CREATE_NEW;
        $opt2 = XmlImporter::GROUP_IMPORT_OPTION_CREATE_NEW;
        $prjUid = '';
        $proType = '';
        $data = $importer->load();
        if (version_compare($data['version'], '3.0', '>') && pathinfo($_FILES["PROCESS_FILENAME"]["name"],
                PATHINFO_EXTENSION) == "pmx"
        ) {
            die(G::LoadTranslation("ID_IMPORTER_ERROR_FILE_INVALID_TYPE_OR_CORRUPT_DATA"));
        }
        /*----------------------------------********---------------------------------*/
        $granularImport = false;
        $objectsToImport = '';

        if (version_compare($data['version'], '3.0', '>')) {
            $objectsToImport = [];
            $objects = (isset($data['objects'])) ? explode('|', $data['objects']) : "";
            $ids = new \ProcessMaker\BusinessModel\Migrator\ExportObjects();
            $objects = $ids->getIdObjectList($objects);
            foreach ($objects as $object) {
                $objectsToImport[] = (object)array('id' => $object, 'action' => 'replace');
            }
        }

        if (isset($_POST['objectsToImport']) && !empty(G::json_decode($_POST['objectsToImport']))) {
            $objectsToImport = G::json_decode($_POST['objectsToImport']);
        }
        /*----------------------------------********---------------------------------*/
        if ($_POST['generateUid'] === 'generate') {
                $generateUid = true;
                $prjUid = $importer->import($opt1, $opt2, $generateUid, $objectsToImport);
        } elseif ($_POST['generateUid'] === 'keep') {
                $generateUid = false;
                $prjUid = $importer->import($opt1, $opt2, $generateUid, $objectsToImport);
        } else {
                $prjUid = $importer->import();
        }

        $oProcess = new Process();
        $processData = $oProcess->load($prjUid);
        $proType = $processData["PRO_TYPE"];
        $granularImport = false;
        $objectImport = '';

        $result = array(
            "success"                   => true,
            "catchMessage"              => '',
            "ExistProcessInDatabase"    => 0,
            "ExistGroupsInDatabase"     => 0,
            "notExistProcessInDatabase" => 0,
            "affectedGroups"            => '',
            "sNewProUid"                => $prjUid,
            "project_type"              => 'bpmn',
            "isGranularImport"          => $granularImport,
            "objectGranularImport"      => $objectImport,
            "project_type_aux"          => $proType
        );
    } catch (Exception $e) {
        /*----------------------------------********---------------------------------*/
        switch (get_class($e)) {
            case 'ProcessMaker\BusinessModel\Migrator\ImportException':
                $result =  $e->getNameException();
                die($result);
                break;
            default:
        /*----------------------------------********---------------------------------*/
                $groupsExists = ($e->getCode() == XmlImporter::IMPORT_STAT_GROUP_ALREADY_EXISTS) ? 1 : 0;
                if ($groupsExists === 1) {
                    $arrayGroups = XmlImporter::$affectedGroups;
                    if (sizeof($arrayGroups)) {
                        foreach ($arrayGroups as $group) {
                            $affectedGroups[] = $group["GRP_TITLE"];
                        }
                        $affectedGroups = implode(', ', $affectedGroups);
                    }
                }
                $result = array(
                    "success" => true,
                    "catchMessage" => (in_array($e->getCode(), array(
                        XmlImporter::IMPORT_STAT_TARGET_ALREADY_EXISTS,
                        XmlImporter::IMPORT_STAT_GROUP_ALREADY_EXISTS,
                        XmlImporter::IMPORTED_PROJECT_DOES_NOT_EXISTS
                    ))) ? "" : $e->getMessage(),
                    "ExistProcessInDatabase" => ($e->getCode() == XmlImporter::IMPORT_STAT_TARGET_ALREADY_EXISTS) ? 1 : 0,
                    "ExistGroupsInDatabase" => $groupsExists,
                    "notExistProcessInDatabase" => ($e->getCode() == XmlImporter::IMPORTED_PROJECT_DOES_NOT_EXISTS) ? 1 : 0,
                    "affectedGroups" => !empty($affectedGroups) ? $affectedGroups : '',
                    "sNewProUid" => '',
                    "project_type" => 'bpmn',
                    "isGranularImport" => $granularImport,
                    "objectGranularImport" => $objectImport,
                    "proFileName" => $_FILES["PROCESS_FILENAME"]["name"],
                    "groupBeforeAccion" => 'uploadFileNewProcess',
                    "importOption" => 0
                );
        /*----------------------------------********---------------------------------*/
                break;
        }
        /*----------------------------------********---------------------------------*/
    }

    echo G::json_encode($result);
    exit(0);
}

if (isset($_POST["PRO_FILENAME"]) &&
    file_exists(PATH_DOCUMENT . "input" . PATH_SEP . $_POST["PRO_FILENAME"]) && (pathinfo(PATH_DOCUMENT . "input" .
            PATH_SEP . $_POST["PRO_FILENAME"], PATHINFO_EXTENSION) == "pmx" || pathinfo(PATH_DOCUMENT . "input" .
            PATH_SEP . $_POST["PRO_FILENAME"], PATHINFO_EXTENSION) == "pmx2")

) {

    $option = XmlImporter::IMPORT_OPTION_CREATE_NEW;

    switch ((isset($_POST["IMPORT_OPTION"]))? (int)($_POST["IMPORT_OPTION"]) : 0) {
        case 1:
            $option = XmlImporter::IMPORT_OPTION_OVERWRITE;
            break;
        case 2:
            $option = XmlImporter::IMPORT_OPTION_DISABLE_AND_CREATE_NEW;
            break;
        case 3:
            $option = XmlImporter::IMPORT_OPTION_KEEP_WITHOUT_CHANGING_AND_CREATE_NEW;
            break;
    }

    $optionGroup = XmlImporter::GROUP_IMPORT_OPTION_CREATE_NEW;

    switch ((isset($_POST["optionGroupExistInDatabase"]))? (int)($_POST["optionGroupExistInDatabase"]) : 0) {
        case 1:
            $optionGroup = XmlImporter::GROUP_IMPORT_OPTION_RENAME;
            break;
        case 2:
            $optionGroup = XmlImporter::GROUP_IMPORT_OPTION_MERGE_PREEXISTENT;
            break;
    }

    $importer = new XmlImporter();
    $importer->setData("usr_uid", $_SESSION["USER_LOGGED"]);
    $importer->setSourceFile(PATH_DOCUMENT . "input" . PATH_SEP . $_POST["PRO_FILENAME"]);
    $data = $importer->load();
    if (version_compare($data['version'], '3.0', '>') && pathinfo(PATH_DOCUMENT . "input" .
            PATH_SEP . $_POST["PRO_FILENAME"], PATHINFO_EXTENSION) == "pmx") {
        die(G::LoadTranslation( "ID_IMPORTER_ERROR_FILE_INVALID_TYPE_OR_CORRUPT_DATA" ));
    }
    try {
        /*----------------------------------********---------------------------------*/
        $objectsToImport = '';
        if (version_compare($data['version'], '3.0', '>')) {
            $dataObject = (isset($data['objects'])) ? explode('|', $data['objects']) : "";
            $exportObjects = new \ProcessMaker\BusinessModel\Migrator\ExportObjects();
            $idObjectList = $exportObjects->getIdObjectList($dataObject);

            // only uploadFileNewProcessExist
            if (isset($_POST['objectsToImport']) && $_POST['objectsToImport'] === '' && $_POST['IMPORT_OPTION'] === "1") {
                $granularImport = true;
                $result = [
                    "success" => true,
                    "catchMessage" => '',
                    "ExistProcessInDatabase" => 0,
                    "ExistGroupsInDatabase" => 0,
                    "notExistProcessInDatabase" => 0,
                    "affectedGroups" => '',
                    "sNewProUid" => '',
                    "project_type" => 'bpmn',
                    "isGranularImport" => $granularImport,
                    "objectGranularImport" => $idObjectList,
                    "project_type_aux" => ''
                ];
                echo G::json_encode($result);
                exit(0);
            }

            $actionImport = "merge";
            if ($_POST['IMPORT_OPTION'] === "3") {
                $actionImport = "replace";
            }

            $objectsToImport = [];
            foreach ($idObjectList as $object) {
                $objectsToImport[] = (object) ['id' => $object, 'action' => $actionImport];
            }

            if (isset($_POST['objectsToImport']) && !empty(G::json_decode($_POST['objectsToImport']))) {
                $objectsToImport = G::json_decode($_POST['objectsToImport']);
            }
        }
        /*----------------------------------********---------------------------------*/
        $prjUid = $importer->import($option, $optionGroup, false, $objectsToImport);

        $oProcess = new Process();
        $processData = $oProcess->load( $prjUid );
        $proType = $processData["PRO_TYPE"];

        $result = array(
            "success"                => true,
            "catchMessage"           => '',
            "ExistProcessInDatabase" => 0,
            "ExistGroupsInDatabase"  => 0,
            "ExistGroupsInDatabase"  => '',
            "sNewProUid"             => $prjUid,
            "project_type"           => 'bpmn',
            "isGranularImport"       => '',
            "objectGranularImport"   => '',
            "project_type_aux"       => $proType
        );
    } catch (Exception $e) {
        /*----------------------------------********---------------------------------*/
        switch (get_class($e)) {
            case 'ProcessMaker\BusinessModel\Migrator\ImportException':
                $result =  $e->getNameException();
                die($result);
                break;
            default:
        /*----------------------------------********---------------------------------*/
                $groupsExists = ($e->getCode() == XmlImporter::IMPORT_STAT_GROUP_ALREADY_EXISTS) ? 1 : 0;
                if ($groupsExists === 1) {
                    $arrayGroups = XmlImporter::$affectedGroups;
                    if (sizeof($arrayGroups)) {
                        foreach ($arrayGroups as $group) {
                            $affectedGroups[] = $group["GRP_TITLE"];
                        }
                        $affectedGroups = implode(', ', $affectedGroups);
                    }
                }
                $result = array(
                    "success" => true,
                    "catchMessage" => (in_array($e->getCode(), array(XmlImporter::IMPORT_STAT_TARGET_ALREADY_EXISTS, XmlImporter::IMPORT_STAT_GROUP_ALREADY_EXISTS))) ? "" : $e->getMessage(),
                    "ExistProcessInDatabase" => ($e->getCode() == XmlImporter::IMPORT_STAT_TARGET_ALREADY_EXISTS) ? 1 : 0,
                    "ExistGroupsInDatabase" => $groupsExists,
                    "affectedGroups" => !empty($affectedGroups) ? $affectedGroups : '',
                    "sNewProUid" => '',
                    "project_type" => 'bpmn',
                    "isGranularImport" => $granularImport,
                    "objectGranularImport" => $objectImport,
                    "proFileName" => $_POST["PRO_FILENAME"],
                    "groupBeforeAccion" => "uploadFileNewProcess",
                    "importOption" => (isset($_POST["IMPORT_OPTION"])) ? (int)($_POST["IMPORT_OPTION"]) : 0
                );
        /*----------------------------------********---------------------------------*/
                break;
        }
        /*----------------------------------********---------------------------------*/
    }

    echo G::json_encode($result);
    exit(0);
}

$action = isset( $_REQUEST['ajaxAction'] ) ? $_REQUEST['ajaxAction'] : null;

$importer = new XmlImporter();

$result = new stdClass();
$result->success = true;
$result->catchMessage = "";

if ($action == "uploadFileNewProcess") {
    try {
        //type of file: only pm
        $processFileType = $_REQUEST["processFileType"];

        $oProcess = new stdClass();
        $oData = new stdClass();

        $isCorrectTypeFile = 1;

        if (isset( $_FILES['PROCESS_FILENAME']['type'] )) {
            $allowedExtensions = array ($processFileType
            );
            $allowedExtensions = array ('pm');
            $explode = explode(".", $_FILES['PROCESS_FILENAME']['name']);
            if (!in_array(end($explode), $allowedExtensions)) {
                throw new Exception(G::LoadTranslation("ID_FILE_UPLOAD_INCORRECT_EXTENSION"));
            }
        }

        if ($processFileType != "pm") {
            throw new Exception( G::LoadTranslation( "ID_ERROR_UPLOAD_FILE_CONTACT_ADMINISTRATOR" ) );
        }

        if ($processFileType == "pm") {
            $oProcess = new Processes();
        }

        $result->success = true;
        $result->ExistProcessInDatabase = ""; //"" -Default
        //0 -Dont exist process
        //1 -exist process
        $result->ExistGroupsInDatabase = ""; //"" -Default
        //0 -Dont exist process
        //1 -exist process
        $optionGroupExistInDatabase = isset( $_REQUEST["optionGroupExistInDatabase"] ) ? $_REQUEST["optionGroupExistInDatabase"] : null;

        //!Upload file
        if (! is_null( $optionGroupExistInDatabase )) {
            $filename = $_REQUEST["PRO_FILENAME"];
            $path = PATH_DOCUMENT . 'input' . PATH_SEP;
        } else {
            if ($_FILES['PROCESS_FILENAME']['error'] == 0) {
                $filename = $_FILES['PROCESS_FILENAME']['name'];
                $path = PATH_DOCUMENT . 'input' . PATH_SEP;
                $tempName = $_FILES['PROCESS_FILENAME']['tmp_name'];
                //$action = "none";
                G::uploadFile( $tempName, $path, $filename );

            }
        }

        //importing a bpmn diagram, using external class to do it.
        if ($processFileType == "bpmn") {
            $bpmn = new bpmnExport();
            $bpmn->importBpmn( $path . $filename );
            die();
        }

        //if file is a .pm  file continues normally the importing
        if ($processFileType == "pm") {
            $oData = $oProcess->getProcessData( $path . $filename );
        }

        $importer->throwExceptionIfExistsReservedWordsSql($oData);

        //!Upload file
        $Fields['PRO_FILENAME'] = $filename;
        $Fields['IMPORT_OPTION'] = 2;

        $sProUid = $oData->process['PRO_UID'];

        $oData->process['PRO_UID_OLD'] = $sProUid;

        if ($oProcess->processExists( $sProUid )) {
            $result->ExistProcessInDatabase = 1;
        } else {
            $result->ExistProcessInDatabase = 0;
        }

        //!respect of the groups
        $result->ExistGroupsInDatabase = 1;
        $result->groupBeforeAccion = $action;
        if (! is_null( $optionGroupExistInDatabase )) {
            if ($optionGroupExistInDatabase == 1) {
                $oData->groupwfs = $oProcess->renameExistingGroups( $oData->groupwfs );
            } elseif ($optionGroupExistInDatabase == 2) {
                $oData = $oProcess->groupwfsUpdateUidByDatabase($oData);
            }
            $result->ExistGroupsInDatabase = 0;
        } else {
            if (! ($oProcess->checkExistingGroups( $oData->groupwfs ) > 0)) {
                $result->ExistGroupsInDatabase = 0;
            }
        }

        //replacing the processOwner user for the current user

        $oData->process['PRO_CREATE_USER'] = $_SESSION['USER_LOGGED'];

        //!respect of the groups

        if ($result->ExistProcessInDatabase == 0 && $result->ExistGroupsInDatabase == 0) {
            if ($processFileType == "pm") {
                $oProcess->createProcessFromData( $oData, $path . $filename );
            }
        }

        //!data ouput
        $result->sNewProUid = $sProUid;
        $result->proFileName = $Fields['PRO_FILENAME'];
        $result->affectedGroups = '';
        if($result->ExistGroupsInDatabase === 1) {
            $arrayGroups = XmlImporter::$affectedGroups;
            if(sizeof($arrayGroups)) {
                foreach ($arrayGroups as $group) {
                    $affectedGroups[] = $group["GRP_TITLE"];
                }
                $affectedGroups = implode(', ', $affectedGroups);
            }
        }
        $result->affectedGroups = empty($affectedGroups) ? "" : $affectedGroups;

        //Add Audit Log
        $process = new Process();

        if ($process->processExists($sProUid)) {
            $arrayProcessData = $process->load($oData->process["PRO_UID"]);

            G::auditLog("ImportProcess", "PM File Imported " . $arrayProcessData["PRO_TITLE"] . " (" . $arrayProcessData["PRO_UID"] . ")");
        }
    } catch (Exception $e) {
        $result->response = $e->getMessage();
        $result->catchMessage = $e->getMessage();
        $result->success = true;
    }
}

if ($action == "uploadFileNewProcessExist") {
    try {
        $option = $_REQUEST["IMPORT_OPTION"];
        $filename = $_REQUEST["PRO_FILENAME"];
        $processFileType = $_REQUEST["processFileType"];

        $result->ExistGroupsInDatabase = ""; //"" -Default
        //0 -Dont exist process
        //1 -exist process


        $optionGroupExistInDatabase = isset( $_REQUEST["optionGroupExistInDatabase"] ) ? $_REQUEST["optionGroupExistInDatabase"] : null;
        $sNewProUid = "";

        $oProcess = new stdClass();
        if ($processFileType != "pm") {
            throw new Exception( G::LoadTranslation( "ID_ERROR_UPLOAD_FILE_CONTACT_ADMINISTRATOR" ) );
        }

        //load the variables
        if ($processFileType == "pm") {
            $oProcess = new Processes();
        }

        $path = PATH_DOCUMENT . 'input' . PATH_SEP;

        if ($processFileType == "pm") {
            $oData = $oProcess->getProcessData( $path . $filename );
        }

        $importer->throwExceptionIfExistsReservedWordsSql($oData);

        //**cheking if the PRO_CREATE_USER exist**//
        $usrCrtr = $oData->process['PRO_CREATE_USER'];

        $exist = new Users();
        if($exist->userExists($usrCrtr)){
        	$usrInfo = $exist->getAllInformation($usrCrtr);
        	if ($usrInfo['status'] == 'CLOSED'){
        		$oData->process['PRO_CREATE_USER'] = $_SESSION['USER_LOGGED'];
        	}
        } else {
        	$oData->process['PRO_CREATE_USER'] = $_SESSION['USER_LOGGED'];
        }

        $Fields['PRO_FILENAME'] = $filename;
        $sProUid = $oData->process['PRO_UID'];

        $oData->process['PRO_UID_OLD'] = $sProUid;

        $result->ExistGroupsInDatabase = 1;
        if (! is_null( $optionGroupExistInDatabase )) {
            if ($optionGroupExistInDatabase == 1) {
                $oData->groupwfs = $oProcess->renameExistingGroups( $oData->groupwfs );
            } elseif ($optionGroupExistInDatabase == 2) {
                $oData = $oProcess->groupwfsUpdateUidByDatabase($oData);
            }
            $result->ExistGroupsInDatabase = 0;
        } else {
            if (! ($oProcess->checkExistingGroups( $oData->groupwfs ) > 0)) {
                $result->ExistGroupsInDatabase = 0;
            }
        }

        if ($result->ExistGroupsInDatabase == 0) {
            //Update the current Process, overwriting all tasks and steps
            if ($option == 1) {
                $oProcess->updateProcessFromData( $oData, $path . $filename );
                if (file_exists( PATH_OUTTRUNK . 'compiled' . PATH_SEP . 'xmlform' . PATH_SEP . $sProUid )) {
                    $oDirectory = dir( PATH_OUTTRUNK . 'compiled' . PATH_SEP . 'xmlform' . PATH_SEP . $sProUid );
                    while ($sObjectName = $oDirectory->read()) {
                        if (($sObjectName != '.') && ($sObjectName != '..')) {
                            unlink( PATH_OUTTRUNK . 'compiled' . PATH_SEP . 'xmlform' . PATH_SEP . $sProUid . PATH_SEP . $sObjectName );
                        }
                    }
                    $oDirectory->close();
                }
                $sNewProUid = $sProUid;
            }

            //Disable current Process and create a new version of the Process
            if ($option == 2) {
                $oProcess->disablePreviousProcesses( $sProUid );
                $sNewProUid = $oProcess->getUnusedProcessGUID();
                $oProcess->setProcessGUID($oData, $sNewProUid);
                $oProcess->setProcessParent( $oData, $sProUid );
                $oData->process['PRO_TITLE'] = "New - " . $oData->process['PRO_TITLE'] . ' - ' . date( 'M d, H:i' );
                $oProcess->renewAll( $oData );

                if ($processFileType == "pm") {
                    $oProcess->createProcessFromData( $oData, $path . $filename );
                }
            }

            //Create a completely new Process without change the current Process
            if ($option == 3) {
                //krumo ($oData); die;
                $sNewProUid = $oProcess->getUnusedProcessGUID();
                $oProcess->setProcessGUID($oData, $sNewProUid);
                $oData->process['PRO_TITLE'] = G::LoadTranslation('ID_COPY_OF'). ' - ' . $oData->process['PRO_TITLE'] . ' - ' . date( 'M d, H:i' );
                $oProcess->renewAll( $oData );

                if ($processFileType == "pm") {
                    $oProcess->createProcessFromData( $oData, $path . $filename );
                }
            }
        }

        //!data ouput
        $result->proFileName = $filename;
        $result->importOption = $option;
        $result->sNewProUid = $sNewProUid;
        $result->success = true;
        $result->ExistGroupsInDatabase = $result->ExistGroupsInDatabase;
        $result->groupBeforeAccion = $action;
        $result->affectedGroups = '';
        if($result->ExistGroupsInDatabase === 1) {
            $arrayGroups = XmlImporter::$affectedGroups;
            if(sizeof($arrayGroups)) {
                foreach ($arrayGroups as $group) {
                    $affectedGroups[] = $group["GRP_TITLE"];
                }
                $affectedGroups = implode(', ', $affectedGroups);
            }
        }
        $result->affectedGroups = empty($affectedGroups) ? "" : $affectedGroups;

        //!data ouput
    } catch (Exception $e) {
        $result->response = $e->getMessage();
        $result->success = true;
    }
}

echo G::json_encode( $result );
exit(0);

