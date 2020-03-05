
let buttonAdd,buttonEdit,buttonDelete,buttonCopy;let credentials;Ext.onReady(function(){Ext.QuickTips.init();Ext.form.Field.prototype.msgTarget="side";credentials=atob(CREDENTIAL_DATA);credentials=(credentials=="")?"":JSON.parse(credentials);let closeWindow=function(){try{storeListCoutryGroup.load();Ext.getCmp("windowLocation").hide();buttonEdit.disable();buttonDelete.disable();buttonCopy.disable();}catch(error){Ext.MessageBox.alert("Error in the code.",error);}};let storeListCoutryGroup=new Ext.data.JsonStore({"proxy":new Ext.data.HttpProxy({"method":"GET","url":URI_ENDPOINT+"plugin-thermoMsc/countryGroup/list","headers":{"Authorization":"Bearer "+credentials.access_token}}),"root":"data","autoDestroy":true,"totalProperty":"total","remoteSort":true,"fields":["IC_UID","IC_NAME","GRP_ID_GTC_IMPORT","GRP_GTC_IMPORT","GRP_ID_GTC_EXPORT","GRP_GTC_EXPORT","GRP_ID_GCC_CONTACT","GRP_GCC_CONTACT","GRP_ID_HAZCOM_CONTACT","GRP_HAZCOM_CONTACT","GRP_ID_TRANSPORTATION_CONTACT","GRP_TRANSPORTATION_CONTACT","GRP_ID_DISTRIBUTION_CONTACT","GRP_DISTRIBUTION_CONTACT","GRP_ID_EHS","GRP_EHS","GRP_ID_RA","GRP_RA","GRP_ID_IE","GRP_IE","GRP_ID_ITTS","GRP_ITTS","GRP_ID_GTC_IMPORT_CHINA","GRP_GTC_IMPORT_CHINA"]});let storeCountries=new Ext.data.JsonStore({"fields":["IC_UID","IC_NAME"],"data":DATA_COUNTRIES});let storeGroups=new Ext.data.JsonStore({"fields":["GRP_UID","GRP_TITLE"],"data":DATA_GROUPS});let newCountryGroup=function(){try{windowLocation.show();Ext.getCmp("formCountryGroupUid").setValue("");Ext.getCmp("formGTCImport").setValue("");Ext.getCmp("formGTCExport").setValue("");Ext.getCmp("formGccContact").setValue("");Ext.getCmp("formHazcomContact").setValue("");Ext.getCmp("formTransportationContact").setValue("");Ext.getCmp("formDistributionContact").setValue("");Ext.getCmp("formEhs").setValue("");Ext.getCmp("formRa").setValue("");Ext.getCmp("formIe").setValue("");Ext.getCmp("formItts").setValue("");Ext.getCmp("formGTCImportChina").setValue("");Ext.getCmp("formCountryGroup").getForm().reset();windowLocation.setTitle("New Country Group");formCountryGroup.getForm().reset();}catch(error){Ext.MessageBox.alert("Error in the code.",error);}};let editCountryGroup=function(){try{let dataCountryGroup=gridCountryGroup.getSelectionModel().getSelected();formCountryGroup.getForm().reset();Ext.getCmp("formCountryGroupUid").setValue(dataCountryGroup.data["IC_UID"]);Ext.getCmp("formGTCImport").setValue(dataCountryGroup.data["GRP_ID_GTC_IMPORT"]==null?'** NOT APPLICABLE **':dataCountryGroup.data["GRP_ID_GTC_IMPORT"]);Ext.getCmp("formGTCExport").setValue(dataCountryGroup.data["GRP_ID_GTC_EXPORT"]==null?'** NOT APPLICABLE **':dataCountryGroup.data["GRP_ID_GTC_EXPORT"]);Ext.getCmp("formGccContact").setValue(dataCountryGroup.data["GRP_ID_GCC_CONTACT"]==null?'** NOT APPLICABLE **':dataCountryGroup.data["GRP_ID_GCC_CONTACT"]);Ext.getCmp("formHazcomContact").setValue(dataCountryGroup.data["GRP_ID_HAZCOM_CONTACT"]==null?'** NOT APPLICABLE **':dataCountryGroup.data["GRP_ID_HAZCOM_CONTACT"]);Ext.getCmp("formTransportationContact").setValue(dataCountryGroup.data["GRP_ID_TRANSPORTATION_CONTACT"]==null?'** NOT APPLICABLE **':dataCountryGroup.data["GRP_ID_TRANSPORTATION_CONTACT"]);Ext.getCmp("formDistributionContact").setValue(dataCountryGroup.data["GRP_ID_DISTRIBUTION_CONTACT"]==null?'** NOT APPLICABLE **':dataCountryGroup.data["GRP_ID_DISTRIBUTION_CONTACT"]);Ext.getCmp("formEhs").setValue(dataCountryGroup.data["GRP_ID_EHS"]==null?'** NOT APPLICABLE **':dataCountryGroup.data["GRP_ID_EHS"]);Ext.getCmp("formRa").setValue(dataCountryGroup.data["GRP_ID_RA"]==null?'** NOT APPLICABLE **':dataCountryGroup.data["GRP_ID_RA"]);Ext.getCmp("formIe").setValue(dataCountryGroup.data["GRP_ID_IE"]==null?'** NOT APPLICABLE **':dataCountryGroup.data["GRP_ID_IE"]);Ext.getCmp("formItts").setValue(dataCountryGroup.data["GRP_ID_ITTS"]==null?'** NOT APPLICABLE **':dataCountryGroup.data["GRP_ID_ITTS"]);Ext.getCmp("formGTCImportChina").setValue(dataCountryGroup.data["GRP_ID_GTC_IMPORT_CHINA"]==null?'** NOT APPLICABLE **':dataCountryGroup.data["GRP_ID_GTC_IMPORT_CHINA"]);windowLocation.setTitle("Edit Country Group");windowLocation.show();}catch(error){Ext.MessageBox.alert("Error: "+error+".");}};let deleteCountryGroup=function(){try{let dataCountryGroup=gridCountryGroup.getSelectionModel().getSelected();let countryGroupUid=dataCountryGroup.json["IC_UID"];Ext.Msg.confirm('Delete Country Group?','Are you sure you want to remove selected country group?',function(btn){if(btn==='yes'){Ext.Ajax.request({"method":"DELETE","url":URI_ENDPOINT+"plugin-thermoMsc/countryGroup/"+countryGroupUid,"headers":{"Authorization":"Bearer "+credentials.access_token},"beforeSend":function(request){try{request.setRequestHeader("Authorization","Bearer "+credentials.access_token);}catch(error){Ext.MessageBox.alert("Error in the code.",error);}},"success":function(response,resp){try{let jsonMessage=Ext.util.JSON.decode(response.responseText);let errorDelete=jsonMessage.error||null;if(errorDelete==null){Ext.msgBoxSlider.msg("Success","The country group record has been deleted.","success");}else{Ext.msgBoxSlider.msg("Warning",errorDelete,"warning");}
storeListCoutryGroup.load();buttonEdit.disable();buttonDelete.disable();buttonCopy.disable();}catch(error){Ext.MessageBox.alert("Error in the code.",error);}},"failure":function(response,resp){try{Ext.MessageBox.alert("Alert!!","There is an error.");}catch(error){Ext.MessageBox.alert("Error in the code.",error);}}});}});}catch(error){Ext.MessageBox.alert("Error: "+error+".");}}
let copyCountryGroup=function(){try{let dataCountryGroup=gridCountryGroup.getSelectionModel().getSelected();formCountryGroup.getForm().reset();Ext.getCmp("formCountryGroupUid").setValue("");Ext.getCmp("formGTCImport").setValue(dataCountryGroup.data["GRP_ID_GTC_IMPORT"]);Ext.getCmp("formGTCExport").setValue(dataCountryGroup.data["GRP_ID_GTC_EXPORT"]);Ext.getCmp("formGccContact").setValue(dataCountryGroup.data["GRP_ID_GCC_CONTACT"]);Ext.getCmp("formHazcomContact").setValue(dataCountryGroup.data["GRP_ID_HAZCOM_CONTACT"]);Ext.getCmp("formTransportationContact").setValue(dataCountryGroup.data["GRP_ID_TRANSPORTATION_CONTACT"]);Ext.getCmp("formDistributionContact").setValue(dataCountryGroup.data["GRP_ID_DISTRIBUTION_CONTACT"]);Ext.getCmp("formEhs").setValue(dataCountryGroup.data["GRP_ID_EHS"]);Ext.getCmp("formRa").setValue(dataCountryGroup.data["GRP_ID_RA"]);Ext.getCmp("formIe").setValue(dataCountryGroup.data["GRP_ID_IE"]);Ext.getCmp("formItts").setValue(dataCountryGroup.data["GRP_ID_ITTS"]);Ext.getCmp("formGTCImportChina").setValue(dataCountryGroup.data["GRP_ID_GTC_IMPORT_CHINA"]);windowLocation.setTitle("Copy Country Group");windowLocation.show();}catch(error){Ext.MessageBox.alert("Error: "+error+".");}};let formCountryGroup=new Ext.FormPanel({"id":"formCountryGroup","frame":true,"items":[new Ext.form.ComboBox({"id":"formCountryGroupUid","name":"Countries","fieldLabel":"Countries","store":storeCountries,"valueField":"IC_UID","displayField":"IC_NAME","typeAhead":true,"mode":"local","triggerAction":"all","emptyText":"Select group","selectOnFocus":true,"width":320,"allowBlank":false,"editable":true,"forceSelection":true,"queryMode":'local',},),new Ext.form.ComboBox({"id":"formGTCImport","name":"GTCImport","fieldLabel":"GTC Import","store":storeGroups,"valueField":"GRP_UID","displayField":"GRP_TITLE","typeAhead":true,"mode":"local","triggerAction":"all","emptyText":"Select group","selectOnFocus":true,"width":320,"allowBlank":false,"forceSelection":true,"editable":true},),new Ext.form.ComboBox({"id":"formGTCExport","name":"GTCExport","fieldLabel":"GTC Export","store":storeGroups,"valueField":"GRP_UID","displayField":"GRP_TITLE","typeAhead":true,"mode":"local","triggerAction":"all","emptyText":"Select group","selectOnFocus":true,"width":320,"allowBlank":false,"forceSelection":true,"editable":true},),new Ext.form.ComboBox({"id":"formGccContact","name":"GccContact","fieldLabel":"GCC","store":storeGroups,"valueField":"GRP_UID","displayField":"GRP_TITLE","typeAhead":true,"mode":"local","triggerAction":"all","emptyText":"Select group","selectOnFocus":true,"width":320,"allowBlank":false,"forceSelection":true,"editable":true},),new Ext.form.ComboBox({"id":"formHazcomContact","name":"HazcomContact","fieldLabel":"HazCom","store":storeGroups,"valueField":"GRP_UID","displayField":"GRP_TITLE","typeAhead":true,"mode":"local","triggerAction":"all","emptyText":"Select group","selectOnFocus":true,"width":320,"allowBlank":false,"forceSelection":true,"editable":true},),new Ext.form.ComboBox({"id":"formTransportationContact","name":"TransportationContact","fieldLabel":"Transportation","store":storeGroups,"valueField":"GRP_UID","displayField":"GRP_TITLE","typeAhead":true,"mode":"local","triggerAction":"all","emptyText":"Select group","selectOnFocus":true,"width":320,"allowBlank":false,"forceSelection":true,"editable":true,},),new Ext.form.ComboBox({"id":"formDistributionContact","name":"DistributionContact","fieldLabel":"Distribution","store":storeGroups,"valueField":"GRP_UID","displayField":"GRP_TITLE","typeAhead":true,"mode":"local","triggerAction":"all","emptyText":"Select group","selectOnFocus":true,"width":320,"allowBlank":false,"forceSelection":true,"editable":true,},),new Ext.form.ComboBox({"id":"formEhs","name":"Ehs","fieldLabel":"EHS","store":storeGroups,"valueField":"GRP_UID","displayField":"GRP_TITLE","typeAhead":true,"mode":"local","triggerAction":"all","emptyText":"Select group","selectOnFocus":true,"width":320,"allowBlank":false,"forceSelection":true,"editable":true,},),new Ext.form.ComboBox({"id":"formRa","name":"Ra","fieldLabel":"RA","store":storeGroups,"valueField":"GRP_UID","displayField":"GRP_TITLE","typeAhead":true,"mode":"local","triggerAction":"all","emptyText":"Select group","selectOnFocus":true,"width":320,"allowBlank":false,"forceSelection":true,"editable":true,},),new Ext.form.ComboBox({"id":"formIe","name":"Ie","fieldLabel":"IE","store":storeGroups,"valueField":"GRP_UID","displayField":"GRP_TITLE","typeAhead":true,"mode":"local","triggerAction":"all","emptyText":"Select group","selectOnFocus":true,"width":320,"allowBlank":false,"forceSelection":true,"editable":true,},),new Ext.form.ComboBox({"id":"formItts","name":"Itts","fieldLabel":"ITTS","store":storeGroups,"valueField":"GRP_UID","displayField":"GRP_TITLE","typeAhead":true,"mode":"local","triggerAction":"all","emptyText":"Select group","selectOnFocus":true,"width":320,"allowBlank":false,"forceSelection":true,"editable":true,},),new Ext.form.ComboBox({"id":"formGTCImportChina","name":"GTCImportChina","fieldLabel":"GTC Import China","store":storeGroups,"valueField":"GRP_UID","displayField":"GRP_TITLE","typeAhead":true,"mode":"local","triggerAction":"all","emptyText":"Select group","selectOnFocus":true,"width":320,"allowBlank":false,"forceSelection":true,"editable":true},)],"buttons":[{"text":"Save","handler":function(){try{if(Ext.getCmp("formCountryGroup").getForm().isValid()){let url,method;let dataCountryGroupCommon={"IC_UID":Ext.getCmp("formCountryGroupUid").getValue(),"GRP_GTC_IMPORT":Ext.getCmp("formGTCImport").getValue(),"GRP_GTC_EXPORT":Ext.getCmp("formGTCExport").getValue(),"GRP_GCC_CONTACT":Ext.getCmp("formGccContact").getValue(),"GRP_HAZCOM_CONTACT":Ext.getCmp("formHazcomContact").getValue(),"GRP_TRANSPORTATION_CONTACT":Ext.getCmp("formTransportationContact").getValue(),"GRP_DISTRIBUTION_CONTACT":Ext.getCmp("formDistributionContact").getValue(),"GRP_EHS":Ext.getCmp("formEhs").getValue(),"GRP_RA":Ext.getCmp("formRa").getValue(),"GRP_IE":Ext.getCmp("formIe").getValue(),"GRP_ITTS":Ext.getCmp("formItts").getValue(),"GRP_GTC_IMPORT_CHINA":Ext.getCmp("formGTCImportChina").getValue(),};let messageSuccessSaved="";method="PUT";url=URI_ENDPOINT+"plugin-thermoMsc/countryGroup";dataCountryGroup=dataCountryGroupCommon;messageSuccessSaved="The country group record has been modified.";Ext.Ajax.request({"url":url,"method":method,"type":"ajax","headers":{"Authorization":"Bearer "+credentials.access_token},"beforeSend":function(request){request.setRequestHeader("Authorization"," Bearer "+credentials.access_token);},"jsonData":dataCountryGroup,"success":function(obj,resp){closeWindow();let jsonMessage=Ext.util.JSON.decode(resp.responseText);Ext.msgBoxSlider.msg("Success",messageSuccessSaved,"success");},"failure":function(obj,resp){}});}else{Ext.MessageBox.alert("Alert","You have to complete the fields");}}catch(error){Ext.MessageBox.alert("Error in the code.",error);}}},{"text":"Cancel","handler":closeWindow}],"labelWidth":180});buttonAdd=new Ext.Action({"text":"New","iconCls":"button_menu_ext ss_sprite ss_add","handler":newCountryGroup});buttonEdit=new Ext.Action({"text":"Edit","iconCls":"button_menu_ext ss_sprite  ss_pencil","handler":editCountryGroup,"disabled":true});buttonDelete=new Ext.Action({"text":"Delete","iconCls":"button_menu_ext ss_sprite  ss_delete","handler":deleteCountryGroup,"disabled":true});buttonCopy=new Ext.Action({"text":"Copy","iconCls":"button_menu_ext ss_sprite ss_page_copy","handler":copyCountryGroup,"disabled":true});let windowLocation=new Ext.Window({"title":"Country Group","close":"hide","closeAction":'hide',"autoHeight":true,"modal":true,"closable":true,"width":550,"items":[formCountryGroup],"id":"windowLocation"});let tbarSearch=[buttonAdd,"-",buttonEdit,buttonDelete,buttonCopy,{"xtype":"tbfill"},"->",new Ext.ux.form.SearchField({"store":storeListCoutryGroup,"width":250})];let pageSize=parseInt(PAGED_AMOUNT);let storePageSize=new Ext.data.SimpleStore({"autoLoad":true,"fields":["size"],"data":[["20"],["30"],["40"],["50"],["100"]]});let comboPageSize=new Ext.form.ComboBox({"typeAhead":false,"mode":"local","triggerAction":"all","store":storePageSize,"valueField":"size","displayField":"size","width":50,"editable":false,"listeners":{select:function(current,dataCombo){pagingSearchList.pageSize=parseInt(dataCombo.data["size"]);pagingSearchList.moveFirst();}}});comboPageSize.setValue(pageSize);let pagingSearchList=new Ext.PagingToolbar({"pageSize":pageSize,"store":storeListCoutryGroup,"displayInfo":true,"autoHeight":true,"displayMsg":"Showing "+" {0} - {1} "+"of"+" {2} ","emptyMsg":"There are no cases filed","items":[comboPageSize]});let selectModelList=new Ext.grid.CheckboxSelectionModel({"singleSelect":true,"listeners":{"rowselect":function(){buttonEdit.enable();buttonDelete.enable();buttonCopy.enable();}}});let gridCountryGroup=new Ext.grid.GridPanel({"title":"List of Country Groups","store":storeListCoutryGroup,"tbar":tbarSearch,"bbar":pagingSearchList,"region":"center","margins":"0 0 0 0","loadMask":true,"sm":selectModelList,"cm":new Ext.grid.ColumnModel({"defaults":{"sortable":true},"columns":[{"id":"IC_UID","dataIndex":"IC_UID","hidden":true,"width":40,"header":"IC_UID",},{"header":"Location","width":40,"dataIndex":"IC_NAME"},{"header":"ID GTC Import","hidden":true,"width":40,"dataIndex":"GRP_ID_GTC_IMPORT",},{"header":"GTC Import","width":40,"dataIndex":"GRP_GTC_IMPORT","renderer":renderGroup},{"header":"ID GTC Export","hidden":true,"width":40,"dataIndex":"GRP_ID_GTC_EXPORT",},{"header":"GTC Export","width":40,"dataIndex":"GRP_GTC_EXPORT","renderer":renderGroup},{"header":"Gcc","hidden":true,"width":40,"dataIndex":"GRP_ID_GCC_CONTACT",},{"header":"Gcc","width":40,"dataIndex":"GRP_GCC_CONTACT","renderer":renderGroup},{"header":"Hazcom","hidden":true,"width":40,"dataIndex":"GRP_ID_HAZCOM_CONTACT",},{"header":"Hazcom","width":40,"dataIndex":"GRP_HAZCOM_CONTACT","renderer":renderGroup},{"header":"Transportation","hidden":true,"width":40,"dataIndex":"GRP_ID_TRANSPORTATION_CONTACT",},{"header":"Transportation","width":40,"dataIndex":"GRP_TRANSPORTATION_CONTACT","renderer":renderGroup},{"header":"Distribution","hidden":true,"width":40,"dataIndex":"GRP_ID_DISTRIBUTION_CONTACT",},{"header":"Distribution","width":40,"dataIndex":"GRP_DISTRIBUTION_CONTACT","renderer":renderGroup},{"header":"EHS","hidden":true,"width":40,"dataIndex":"GRP_ID_EHS",},{"header":"EHS","width":40,"dataIndex":"GRP_EHS","renderer":renderGroup},{"header":"RA","hidden":true,"width":40,"dataIndex":"GRP_ID_RA",},{"header":"RA","width":40,"dataIndex":"GRP_RA","renderer":renderGroup},{"header":"IE","hidden":true,"width":40,"dataIndex":"GRP_ID_IE",},{"header":"IE","width":40,"dataIndex":"GRP_IE","renderer":renderGroup},{"header":"ITTS","hidden":true,"width":40,"dataIndex":"GRP_ID_ITTS",},{"header":"ITTS","width":40,"dataIndex":"GRP_ITTS","renderer":renderGroup},{"header":"ID GTC Import China","hidden":true,"width":40,"dataIndex":"GRP_ID_GTC_IMPORT_CHINA",},{"header":"GTC Import China","width":40,"dataIndex":"GRP_GTC_IMPORT_CHINA","renderer":renderGroup}]}),"border":false,"autoShow":true,"autoFill":true,"nocache":true,"autoWidth":true,"stripeRows":true,"stateful":true,"animCollapse":true,"enableColumnResize":true,"enableHdMenu":true,"columnLines":true,"viewConfig":{"forceFit":true,"emptyText":"<div align='center' style='margin-left: -40%;'><b> Sorry ,the criteria has not been found. </b></div>"},"listeners":{"rowclick":function(grid,rowIndex){rowSelected=gridCountryGroup.getSelectionModel().getSelected();},"rowdblclick":editCountryGroup}});new Ext.Viewport({"layout":"border","border":false,"items":[gridCountryGroup]});storeListCoutryGroup.load();});function renderGroup(value){try{if(value==null){return'<span style="color: #ff0000;">** NOT APPLICABLE **</span>';}
return value;}catch(error){Ext.MessageBox.alert("Error in the code.",error);}}