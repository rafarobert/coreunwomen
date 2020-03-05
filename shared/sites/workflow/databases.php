<?php
$dbAdapter    = 'mysql';
$dbHost       = 'localhost';
$dbName       = 'wf_workflow_346';
$dbUser       = 'wf_workflow_346';
$dbPass       = '0qnh8dHB$YU!40w';
$dbRbacHost   = 'localhost';
$dbRbacName   = 'wf_workflow_346';
$dbRbacUser   = 'wf_workflow_346';
$dbRbacPass   = '0qnh8dHB$YU!40w';
$dbReportHost = 'localhost';
$dbReportName = 'wf_workflow_346';
$dbReportUser = 'wf_workflow_346';
$dbReportPass = '0qnh8dHB$YU!40w';


$dsn       = sprintf("%s://%s:%s@%s/%s", $dbAdapter, $dbUser,       $dbPass,       $dbHost,       $dbName);
$dsnRbac   = sprintf("%s://%s:%s@%s/%s", $dbAdapter, $dbRbacUser,   $dbRbacPass,   $dbRbacHost,   $dbRbacName);
$dsnReport = sprintf("%s://%s:%s@%s/%s", $dbAdapter, $dbReportUser, $dbReportPass, $dbReportHost, $dbReportName);

switch ($dbAdapter) {
  case 'mysql':
    $dsn       .= '?encoding=utf8';
    $dsnRbac   .= '?encoding=utf8';
    $dsnReport .= '?encoding=utf8';
    break;
  default:
    break;
}

$pro ['datasources']['workflow']['connection'] = $dsn;
$pro ['datasources']['workflow']['adapter'] = $dbAdapter;

$pro ['datasources']['rbac']['connection'] = $dsnRbac;
$pro ['datasources']['rbac']['adapter'] = $dbAdapter;

$pro ['datasources']['rp']['connection'] = $dsnReport;
$pro ['datasources']['rp']['adapter'] = $dbAdapter;

$pro ['datasources']['dbarray']['connection'] = 'dbarray://user:pass@localhost/pm_os';
$pro ['datasources']['dbarray']['adapter']    = 'dbarray';

return $pro;