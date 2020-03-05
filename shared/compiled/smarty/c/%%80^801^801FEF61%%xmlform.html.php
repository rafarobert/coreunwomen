<?php /* Smarty version 2.6.31, created on 2020-03-04 21:09:05
         compiled from /Users/rafaelgutierrezgaspar/Sites/dev/pm346/processmaker/workflow/engine/templates/xmlform.html */ ?>
<?php if ($this->_tpl_vars['printTemplate']): ?>
  <form id="<?php echo $this->_tpl_vars['form']->id; ?>
" name="<?php echo $this->_tpl_vars['form']->name; ?>
" action="<?php echo $this->_tpl_vars['form']->action; ?>
" class="<?php echo $this->_tpl_vars['form']->className; ?>
" method="post" encType="multipart/form-data" style="margin:0px;" onsubmit="return validateForm('<?php echo $this->_tpl_vars['form']->objectRequiredFields; ?>
');">  <div class="borderForm" style="width:<?php echo $this->_tpl_vars['form']->width; ?>
; padding-left:0; padding-right:0; border-width:<?php echo $this->_tpl_vars['form']->border; ?>
;">
    <div class="boxTop"><div class="a">&nbsp;</div><div class="b">&nbsp;</div><div class="c">&nbsp;</div></div>
    <div class="content" style="height:<?php echo $this->_tpl_vars['form']->height; ?>
;" >
    <table width="99%">
      <tr>
        <td valign='top'>
          <input type="hidden" class="notValidateThisFields" name="__notValidateThisFields__" id="__notValidateThisFields__" value="<?php echo $this->_tpl_vars['form']->objectRequiredFields; ?>
" />
          <input type="hidden" name="DynaformRequiredFields" id="DynaformRequiredFields" value="<?php echo $this->_tpl_vars['form']->objectRequiredFields; ?>
" />
          <input type="hidden" name="__DynaformName__" id="__DynaformName__" value="<?php echo $this->_tpl_vars['form']->name; ?>
" />
          <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <?php $_from = $this->_tpl_vars['form']->fields; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
            <?php if (( $this->_tpl_vars['field']->type === 'title' )): ?>
            <tr>
              <td class='FormTitle' colspan="2" align="<?php echo $this->_tpl_vars['field']->align; ?>
"><?php echo $this->_tpl_vars['field']->field; ?>
</td>
            </tr>
            <?php elseif (( $this->_tpl_vars['field']->type === 'subtitle' )): ?>
            <tr>
              <td class='FormSubTitle' colspan="2" align="<?php echo $this->_tpl_vars['field']->align; ?>
">
                <span><?php echo $this->_tpl_vars['field']->field; ?>
</span>
                <?php if (( isset ( $this->_tpl_vars['field']->showHide ) && $this->_tpl_vars['field']->showHide )): ?>
                <a style="float:right;" href="#" onclick="contractExpandSubtitle(this);return false;">Hide</a>
                <?php endif; ?>
              </td>
            </tr>
            <?php elseif (( $this->_tpl_vars['field']->type === 'button' ) || ( $this->_tpl_vars['field']->type === 'submit' ) || ( $this->_tpl_vars['field']->type === 'reset' )): ?>
            <tr>
              <td class='FormButton' colspan="2" align="<?php echo $this->_tpl_vars['field']->align; ?>
"><?php echo $this->_tpl_vars['field']->field; ?>
</td>
            </tr>
            <?php elseif (( $this->_tpl_vars['field']->type === 'grid' )): ?>
            <tr>
              <td colspan="2"><?php echo $this->_tpl_vars['field']->field; ?>
</td>
            </tr>
            <?php elseif (( $this->_tpl_vars['field']->type === 'checkbox' ) && ( $this->_tpl_vars['field']->labelOnRight )): ?>
            <tr>
              <td class='FormLabel' width="<?php echo $this->_tpl_vars['form']->labelWidth; ?>
"></td>
              <td><?php echo $this->_tpl_vars['field']->field; ?>
</td>
            </tr>
            <?php elseif (( $this->_tpl_vars['field']->type === 'phpvariable' )): ?>
            <?php elseif (( $this->_tpl_vars['field']->type === 'private' )): ?>
            <?php elseif (( $this->_tpl_vars['field']->type === 'javascript' )): ?>
            <?php elseif (( $this->_tpl_vars['field']->type === 'pmconnection' )): ?>
            <?php elseif (( $this->_tpl_vars['field']->type === 'hidden' )): ?>
            <tr style="display: none">
              <td colspan="2"><?php echo $this->_tpl_vars['field']->field; ?>
</td>
            </tr>
            <?php elseif (( $this->_tpl_vars['field']->type === '' )): ?>
            <?php elseif (( $this->_tpl_vars['field']->withoutLabel )): ?>
            <tr>
              <td colspan="2" class="withoutLabel" style="height:auto;"><?php echo $this->_tpl_vars['field']->field; ?>
</td>
            </tr>
            <?php elseif (( isset ( $this->_tpl_vars['field']->withoutValue ) && $this->_tpl_vars['field']->withoutValue )): ?>
            <tr>
              <td class='FormLabel' colspan="2"><div align="<?php echo $this->_tpl_vars['field']->align; ?>
"><?php echo $this->_tpl_vars['field']->label; ?>
</div></td>
            </tr>
            <?php else: ?>
            <tr>
              <td class='FormLabel' width="<?php echo $this->_tpl_vars['form']->labelWidth; ?>
"><?php if (( isset ( $this->_tpl_vars['field']->required ) && $this->_tpl_vars['field']->required && $this->_tpl_vars['field']->mode === 'edit' )): ?><font color="red">*  </font><?php endif; ?><?php echo $this->_tpl_vars['field']->label; ?>
</td>
              <td class='FormFieldContent' width='<?php echo $this->_tpl_vars['form']->fieldContentWidth; ?>
' ><?php echo $this->_tpl_vars['field']->field; ?>
</td>
            </tr>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
          </table>
        </td>
      </tr>
    </table>
    <?php if ($this->_tpl_vars['hasRequiredFields']): ?><div class="FormRequiredTextMessage"><font color="red">*  </font><?php echo (G::LoadTranslation('ID_REQUIRED_FIELD')); ?></div><?php endif; ?>
       </div>
       <div class="boxBottom"><div class="a">&nbsp;</div><div class="b">&nbsp;</div><div class="c">&nbsp;</div></div>
       </div>
       <?php $_from = $this->_tpl_vars['form']->fields; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
         <?php if (( $this->_tpl_vars['field']->type === 'javascript' )): ?>
           <script type="text/javascript">
             <?php echo $this->_tpl_vars['field']->field; ?>

           </script>
         <?php endif; ?>
       <?php endforeach; endif; unset($_from); ?>
  </form>

<?php endif; ?>
<?php if ($this->_tpl_vars['printJSFile']): ?>
    var form_<?php echo $this->_tpl_vars['form']->id; ?>
;
  var object_<?php echo $this->_tpl_vars['form']->name; ?>
;

  if (typeof(__aObjects__) == "undefined") <?php echo '{'; ?>

      var __aObjects__ = [];
  <?php echo '}'; ?>


    function loadForm_<?php echo $this->_tpl_vars['form']->id; ?>
(ajaxServer)
    <?php echo '{'; ?>

      swSubmitValidateForm = 1;
      var i = 0;

      if (typeof(G_Form) == "undefined") <?php echo '{'; ?>

          return alert("form.js was not loaded");
      <?php echo '}'; ?>


      form_<?php echo $this->_tpl_vars['form']->id; ?>
=new G_Form(document.getElementById('<?php echo $this->_tpl_vars['form']->id; ?>
'),'<?php echo $this->_tpl_vars['form']->id; ?>
');
      object_<?php echo $this->_tpl_vars['form']->name; ?>
 = form_<?php echo $this->_tpl_vars['form']->id; ?>
;
      __aObjects__.push(object_<?php echo $this->_tpl_vars['form']->name; ?>
);
      var myForm=form_<?php echo $this->_tpl_vars['form']->id; ?>
;
      if (myForm.aElements===undefined) alert("<?php echo $this->_tpl_vars['form']->name; ?>
");
      myForm.ajaxServer = ajaxServer;

        //<?php echo $this->_tpl_vars['form']->ajaxSubmit; ?>

        <?php if (isset ( $this->_tpl_vars['form']->ajaxSubmit ) && ( $this->_tpl_vars['form']->ajaxSubmit )): ?>
          <?php echo '
            var sub = new leimnud.module.app.submit({
              form    : myForm.element,'; ?>

              inProgress: <?php echo $this->_tpl_vars['form']->in_progress; ?>
,
              callback: <?php echo $this->_tpl_vars['form']->callback; ?>

              <?php echo '
            });
            sub.sendObj = false;
          '; ?>

        <?php endif; ?>

        <?php $_from = $this->_tpl_vars['form']->fields; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['field']):
?>
          i = myForm.aElements.length;

          <?php if (( ( $this->_tpl_vars['field']->type === 'dropdown' ) || $this->_tpl_vars['field']->type === 'listbox' )): ?>
            myForm.aElements[i] = new G_DropDown(myForm, myForm.element.elements['form[<?php echo $this->_tpl_vars['name']; ?>
]'],'<?php echo $this->_tpl_vars['name']; ?>
');
            myForm.aElements[i].setAttributes(<?php echo $this->_tpl_vars['field']->getAttributes(); ?>
);
            <?php echo $this->_tpl_vars['field']->attachEvents("myForm.aElements[i].element"); ?>

          <?php elseif (( $this->_tpl_vars['field']->type === 'text' )): ?>
            myForm.aElements[i] = new G_Text(myForm, myForm.element.elements['form[<?php echo $this->_tpl_vars['name']; ?>
]'],'<?php echo $this->_tpl_vars['name']; ?>
');
            myForm.aElements[i].setAttributes(<?php echo $this->_tpl_vars['field']->getAttributes(); ?>
);
            //alert('<?php echo $this->_tpl_vars['field']->getAttributes(); ?>
');
            <?php echo $this->_tpl_vars['field']->attachEvents("myForm.aElements[i].element"); ?>

          <?php elseif (( $this->_tpl_vars['field']->type === 'percentage' )): ?>
            myForm.aElements[i] = new G_Percentage(myForm, myForm.element.elements['form[<?php echo $this->_tpl_vars['name']; ?>
]'],'<?php echo $this->_tpl_vars['name']; ?>
');
            myForm.aElements[i].setAttributes(<?php echo $this->_tpl_vars['field']->getAttributes(); ?>
);
            <?php echo $this->_tpl_vars['field']->attachEvents("myForm.aElements[i].element"); ?>

          <?php elseif (( $this->_tpl_vars['field']->type === 'currency' )): ?>
            myForm.aElements[i] = new G_Currency(myForm, myForm.element.elements['form[<?php echo $this->_tpl_vars['name']; ?>
]'],'<?php echo $this->_tpl_vars['name']; ?>
');
            myForm.aElements[i].setAttributes(<?php echo $this->_tpl_vars['field']->getAttributes(); ?>
);
            <?php echo $this->_tpl_vars['field']->attachEvents("myForm.aElements[i].element"); ?>

          <?php elseif (( $this->_tpl_vars['field']->type === 'textarea' )): ?>
            myForm.aElements[i] = new G_TextArea(myForm, myForm.element.elements['form[<?php echo $this->_tpl_vars['name']; ?>
]'],'<?php echo $this->_tpl_vars['name']; ?>
');
            myForm.aElements[i].setAttributes(<?php echo $this->_tpl_vars['field']->getAttributes(); ?>
);
            <?php echo $this->_tpl_vars['field']->attachEvents("myForm.aElements[i].element"); ?>

          <?php elseif (( $this->_tpl_vars['field']->type === 'date' )): ?>
            myForm.aElements[i] = new G_Date(myForm, myForm.element.elements['form[<?php echo $this->_tpl_vars['name']; ?>
]'],'<?php echo $this->_tpl_vars['name']; ?>
');
            myForm.aElements[i].setAttributes(<?php echo $this->_tpl_vars['field']->getAttributes(); ?>
);
            if (myForm.aElements[i].mask) <?php echo '{'; ?>

              myForm.aElements[i].mask = dateSetMask(myForm.aElements[i].mask);
            <?php echo '}'; ?>

            <?php echo $this->_tpl_vars['field']->attachEvents("myForm.aElements[i].element"); ?>

          <?php elseif (( $this->_tpl_vars['field']->type === 'hidden' )): ?>
            myForm.aElements[i] = new G_Text(myForm, myForm.element.elements['form[<?php echo $this->_tpl_vars['name']; ?>
]'],'<?php echo $this->_tpl_vars['name']; ?>
');
            myForm.aElements[i].setAttributes(<?php echo $this->_tpl_vars['field']->getAttributes(); ?>
);
            <?php echo $this->_tpl_vars['field']->attachEvents("myForm.aElements[i].element"); ?>

          <?php elseif (( $this->_tpl_vars['field']->type === 'grid' )): ?>
            myForm.aElements[i] = new G_Grid(myForm, '<?php echo $this->_tpl_vars['name']; ?>
');
            grid_<?php echo $this->_tpl_vars['field']->id; ?>
(myForm.aElements[i]);
            grid_<?php echo $this->_tpl_vars['name']; ?>
 = myForm.aElements[i];
            <?php echo $this->_tpl_vars['field']->attachEvents("myForm.aElements[i].element"); ?>

          <?php else: ?>
            var element = getField("<?php echo $this->_tpl_vars['name']; ?>
");
            <?php echo $this->_tpl_vars['field']->attachEvents('element'); ?>

        <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
      <?php $_from = $this->_tpl_vars['form']->fields; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['field']):
?>
        <?php if (isset ( $this->_tpl_vars['field']->dependentFields ) && ( $this->_tpl_vars['field']->dependentFields != '' )): ?>
          <?php if (( $this->_tpl_vars['field']->type === 'dropdown' )): ?>
              myForm.getElementByName('<?php echo $this->_tpl_vars['name']; ?>
').setDependentFields('<?php echo $this->_tpl_vars['field']->dependentFields; ?>
');
            <?php elseif (( $this->_tpl_vars['field']->type === 'text' )): ?>
              myForm.getElementByName('<?php echo $this->_tpl_vars['name']; ?>
').setDependentFields('<?php echo $this->_tpl_vars['field']->dependentFields; ?>
');
            <?php elseif (( $this->_tpl_vars['field']->type === 'percentage' )): ?>
              myForm.getElementByName('<?php echo $this->_tpl_vars['name']; ?>
').setDependentFields('<?php echo $this->_tpl_vars['field']->dependentFields; ?>
');
            <?php elseif (( $this->_tpl_vars['field']->type === 'currency' )): ?>
              myForm.getElementByName('<?php echo $this->_tpl_vars['name']; ?>
').setDependentFields('<?php echo $this->_tpl_vars['field']->dependentFields; ?>
');
            <?php elseif (( $this->_tpl_vars['field']->type === 'date' )): ?>
              myForm.getElementByName('<?php echo $this->_tpl_vars['name']; ?>
').setDependentFields('<?php echo $this->_tpl_vars['field']->dependentFields; ?>
');
          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
    <?php echo '}'; ?>


    <?php if (( isset ( $this->_tpl_vars['form']->jsDesignerPreview ) )): ?>
        <?php echo $this->_tpl_vars['form']->jsDesignerPreview; ?>

    <?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['printJavaScript']): ?>
    leimnud.event.add(window,'load',function()<?php echo '{'; ?>
loadForm_<?php echo $this->_tpl_vars['form']->id; ?>
('<?php echo $this->_tpl_vars['form']->ajaxServer; ?>
');if (typeof(dynaformOnload) != 'undefined') <?php echo '{dynaformOnload();}}'; ?>
);
<?php endif; ?>
