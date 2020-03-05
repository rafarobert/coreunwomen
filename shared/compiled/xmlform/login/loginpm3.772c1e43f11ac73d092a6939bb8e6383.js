    var form_bjlLWDFaNmlvSsKwWDNawrBkNG1objZwN1o___;
  var object_login;

  if (typeof(__aObjects__) == "undefined") {
      var __aObjects__ = [];
  }

    function loadForm_bjlLWDFaNmlvSsKwWDNawrBkNG1objZwN1o___(ajaxServer)
    {
      swSubmitValidateForm = 1;
      var i = 0;

      if (typeof(G_Form) == "undefined") {
          return alert("form.js was not loaded");
      }

      form_bjlLWDFaNmlvSsKwWDNawrBkNG1objZwN1o___=new G_Form(document.getElementById('bjlLWDFaNmlvSsKwWDNawrBkNG1objZwN1o___'),'bjlLWDFaNmlvSsKwWDNawrBkNG1objZwN1o___');
      object_login = form_bjlLWDFaNmlvSsKwWDNawrBkNG1objZwN1o___;
      __aObjects__.push(object_login);
      var myForm=form_bjlLWDFaNmlvSsKwWDNawrBkNG1objZwN1o___;
      if (myForm.aElements===undefined) alert("login");
      myForm.ajaxServer = ajaxServer;

        //
        
                  i = myForm.aElements.length;

                      myForm.aElements[i] = new G_Text(myForm, myForm.element.elements['form[BROWSER_TIME_ZONE_OFFSET]'],'BROWSER_TIME_ZONE_OFFSET');
            myForm.aElements[i].setAttributes({"sqlOption":[],"dependentFields":"","gridFieldType":"hidden","label":null,"pmLabel":null,"language":"en","group":0,"mode":"edit","defaultValue":null,"gridLabel":"","hint":"","enableHtml":false,"style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"edit","options":[]});
            
                          i = myForm.aElements.length;

                      var element = getField("TITLE");
            
                        i = myForm.aElements.length;

                      myForm.aElements[i] = new G_Text(myForm, myForm.element.elements['form[USR_USERNAME]'],'USR_USERNAME');
            myForm.aElements[i].setAttributes({"size":"30","maxLength":"50","validate":"Any","mask":"","defaultValue":"","required":false,"dependentFields":"","linkField":"","strTo":"","readOnly":false,"sqlOption":[],"gridFieldType":"text","formula":"","function":"","replaceTags":0,"renderMode":"","comma_separator":".","autocomplete":"0","label":"User","pmLabel":"User","language":"en","group":0,"mode":"edit","gridLabel":"","hint":"","enableHtml":false,"style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"edit","options":[]});
            //alert('{"size":"30","maxLength":"50","validate":"Any","mask":"","defaultValue":"","required":false,"dependentFields":"","linkField":"","strTo":"","readOnly":false,"sqlOption":[],"gridFieldType":"text","formula":"","function":"","replaceTags":0,"renderMode":"","comma_separator":".","autocomplete":"0","label":"User","pmLabel":"User","language":"en","group":0,"mode":"edit","gridLabel":"","hint":"","enableHtml":false,"style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"edit","options":[]}');
            
                          i = myForm.aElements.length;

                      myForm.aElements[i] = new G_Text(myForm, myForm.element.elements['form[USR_PASSWORD]'],'USR_PASSWORD');
            myForm.aElements[i].setAttributes({"size":"30","maxLength":"32","validate":"Any","mask":"","defaultValue":"","required":false,"dependentFields":"","linkField":"","strTo":"","readOnly":false,"sqlOption":[],"gridFieldType":"text","formula":"","function":"","replaceTags":0,"renderMode":"","comma_separator":".","autocomplete":"0","label":"Password","pmLabel":"Password","language":"en","group":0,"mode":"edit","gridLabel":"","hint":"","enableHtml":false,"style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"edit","options":[]});
            //alert('{"size":"30","maxLength":"32","validate":"Any","mask":"","defaultValue":"","required":false,"dependentFields":"","linkField":"","strTo":"","readOnly":false,"sqlOption":[],"gridFieldType":"text","formula":"","function":"","replaceTags":0,"renderMode":"","comma_separator":".","autocomplete":"0","label":"Password","pmLabel":"Password","language":"en","group":0,"mode":"edit","gridLabel":"","hint":"","enableHtml":false,"style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"edit","options":[]}');
            
                          i = myForm.aElements.length;

                      var element = getField("USR_PASSWORD_MASK");
            
                        i = myForm.aElements.length;

                      myForm.aElements[i] = new G_DropDown(myForm, myForm.element.elements['form[USER_LANG]'],'USER_LANG');
            myForm.aElements[i].setAttributes({"defaultValue":"","required":false,"dependentFields":"","readonly":false,"optgroup":0,"option":[],"sqlOption":[],"saveLabel":0,"modeGridDrop":"","renderMode":"","selectedValue":"","label":"Language","pmLabel":"Language","language":"en","group":0,"mode":"edit","gridFieldType":"","gridLabel":"","hint":"","enableHtml":false,"style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"edit","options":[]});
            
                          i = myForm.aElements.length;

                      myForm.aElements[i] = new G_Text(myForm, myForm.element.elements['form[URL]'],'URL');
            myForm.aElements[i].setAttributes({"sqlOption":[],"dependentFields":"","gridFieldType":"hidden","label":null,"pmLabel":null,"language":"en","group":0,"mode":"edit","defaultValue":null,"gridLabel":"","hint":"","enableHtml":false,"style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"edit","options":[]});
            
                          i = myForm.aElements.length;

                      myForm.aElements[i] = new G_Text(myForm, myForm.element.elements['form[FAILED_LOGINS]'],'FAILED_LOGINS');
            myForm.aElements[i].setAttributes({"sqlOption":[],"dependentFields":"","gridFieldType":"hidden","label":null,"pmLabel":null,"language":"en","group":0,"mode":"edit","defaultValue":null,"gridLabel":"","hint":"","enableHtml":false,"style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"edit","options":[]});
            
                          i = myForm.aElements.length;

                      var element = getField("LOGIN_VERIFY_MSG");
            
                        i = myForm.aElements.length;

                      var element = getField("BSUBMIT");
            
                        i = myForm.aElements.length;

                      var element = getField("FORGOT_PASWORD_LINK");
            
                        i = myForm.aElements.length;

                      var element = getField("JS");
            
                                                                                                                                                                                                }

    
