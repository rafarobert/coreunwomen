    var form_bjlLWDFaNmlpSm5kMll2YzQ1cDYzcGJmcDVHbzJadw______;
  var object_login_TimeZoneAlert;

  if (typeof(__aObjects__) == "undefined") {
      var __aObjects__ = [];
  }

    function loadForm_bjlLWDFaNmlpSm5kMll2YzQ1cDYzcGJmcDVHbzJadw______(ajaxServer)
    {
      swSubmitValidateForm = 1;
      var i = 0;

      if (typeof(G_Form) == "undefined") {
          return alert("form.js was not loaded");
      }

      form_bjlLWDFaNmlpSm5kMll2YzQ1cDYzcGJmcDVHbzJadw______=new G_Form(document.getElementById('bjlLWDFaNmlpSm5kMll2YzQ1cDYzcGJmcDVHbzJadw______'),'bjlLWDFaNmlpSm5kMll2YzQ1cDYzcGJmcDVHbzJadw______');
      object_login_TimeZoneAlert = form_bjlLWDFaNmlpSm5kMll2YzQ1cDYzcGJmcDVHbzJadw______;
      __aObjects__.push(object_login_TimeZoneAlert);
      var myForm=form_bjlLWDFaNmlpSm5kMll2YzQ1cDYzcGJmcDVHbzJadw______;
      if (myForm.aElements===undefined) alert("login_TimeZoneAlert");
      myForm.ajaxServer = ajaxServer;

        //
        
                  i = myForm.aElements.length;

                      myForm.aElements[i] = new G_Text(myForm, myForm.element.elements['form[BROWSER_TIME_ZONE_OFFSET]'],'BROWSER_TIME_ZONE_OFFSET');
            myForm.aElements[i].setAttributes({"sqlOption":[],"dependentFields":"","gridFieldType":"hidden","label":null,"pmLabel":null,"language":"en","group":0,"mode":"edit","defaultValue":null,"gridLabel":"","hint":"","enableHtml":false,"style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"edit","options":[]});
            
                          i = myForm.aElements.length;

                      myForm.aElements[i] = new G_Text(myForm, myForm.element.elements['form[USR_TIME_ZONE]'],'USR_TIME_ZONE');
            myForm.aElements[i].setAttributes({"sqlOption":[],"dependentFields":"","gridFieldType":"hidden","label":null,"pmLabel":null,"language":"en","group":0,"mode":"edit","defaultValue":null,"gridLabel":"","hint":"","enableHtml":false,"style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"edit","options":[]});
            
                          i = myForm.aElements.length;

                      myForm.aElements[i] = new G_DropDown(myForm, myForm.element.elements['form[BROWSER_TIME_ZONE]'],'BROWSER_TIME_ZONE');
            myForm.aElements[i].setAttributes({"defaultValue":"","required":false,"dependentFields":"","readonly":false,"optgroup":0,"option":[],"sqlOption":[],"saveLabel":0,"modeGridDrop":"","renderMode":"","selectedValue":"","label":"","pmLabel":"","language":"en","group":0,"mode":"edit","gridFieldType":"","gridLabel":"","hint":"","enableHtml":false,"style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"edit","options":[]});
            
                          i = myForm.aElements.length;

                      var element = getField("BTNOK");
            
                        i = myForm.aElements.length;

                      var element = getField("JS");
            
                                                                                              }

    
