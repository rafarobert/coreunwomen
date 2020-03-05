    var form_bjlLWDFaNmlwNWpmNjM3UzZLaWEyWmFicTlDYw______;
  var object_showMessage;

  if (typeof(__aObjects__) == "undefined") {
      var __aObjects__ = [];
  }

    function loadForm_bjlLWDFaNmlwNWpmNjM3UzZLaWEyWmFicTlDYw______(ajaxServer)
    {
      swSubmitValidateForm = 1;
      var i = 0;

      if (typeof(G_Form) == "undefined") {
          return alert("form.js was not loaded");
      }

      form_bjlLWDFaNmlwNWpmNjM3UzZLaWEyWmFicTlDYw______=new G_Form(document.getElementById('bjlLWDFaNmlwNWpmNjM3UzZLaWEyWmFicTlDYw______'),'bjlLWDFaNmlwNWpmNjM3UzZLaWEyWmFicTlDYw______');
      object_showMessage = form_bjlLWDFaNmlwNWpmNjM3UzZLaWEyWmFicTlDYw______;
      __aObjects__.push(object_showMessage);
      var myForm=form_bjlLWDFaNmlwNWpmNjM3UzZLaWEyWmFicTlDYw______;
      if (myForm.aElements===undefined) alert("showMessage");
      myForm.ajaxServer = ajaxServer;

        //
        
                  i = myForm.aElements.length;

                      var element = getField("TITLE");
            
                        i = myForm.aElements.length;

                      myForm.aElements[i] = new G_Text(myForm, myForm.element.elements['form[MESSAGE]'],'MESSAGE');
            myForm.aElements[i].setAttributes({"size":15,"maxLength":64,"validate":"Any","mask":"","defaultValue":"","required":false,"dependentFields":"","linkField":"","strTo":"","readOnly":false,"sqlOption":[],"gridFieldType":"text","formula":"","function":"","replaceTags":0,"renderMode":"","comma_separator":".","autocomplete":"on","label":"","pmLabel":"","language":"en","group":0,"mode":"view","gridLabel":"","hint":"","enableHtml":"1","style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"view","options":[]});
            //alert('{"size":15,"maxLength":64,"validate":"Any","mask":"","defaultValue":"","required":false,"dependentFields":"","linkField":"","strTo":"","readOnly":false,"sqlOption":[],"gridFieldType":"text","formula":"","function":"","replaceTags":0,"renderMode":"","comma_separator":".","autocomplete":"on","label":"","pmLabel":"","language":"en","group":0,"mode":"view","gridLabel":"","hint":"","enableHtml":"1","style":"","withoutLabel":false,"className":"","colWidth":140,"colAlign":"left","colClassName":"","titleAlign":"","align":"","showInTable":"","dataCompareField":"","dataCompareType":"=","pmtable":"","keys":"","pmconnection":"","pmfield":"","modeGrid":"","modeForGrid":"view","options":[]}');
            
                                                      }

    
