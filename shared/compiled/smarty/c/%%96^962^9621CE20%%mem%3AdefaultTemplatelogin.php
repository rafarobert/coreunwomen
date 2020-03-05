<?php /* Smarty version 2.6.31, created on 2020-03-04 21:19:14
         compiled from mem:defaultTemplatelogin */ ?>
<div class="panel-default">
    <p><?php echo G::LoadTranslation('ID_LOGIN_TITLE'); ?></p>
</div>

<form accept-charset="UTF-8" role="form" class="form-signin"
  id="<?php echo $this->_tpl_vars['form_id']; ?>
" name="<?php echo $this->_tpl_vars['form_name']; ?>
" action="<?php echo $this->_tpl_vars['form_action']; ?>
" method="post" encType="multipart/form-data" onsubmit="return validateForm('<?php echo $this->_tpl_vars['form_objectRequiredFields']; ?>
');">
  <input type="hidden" class="notValidateThisFields" name="__notValidateThisFields__" id="__notValidateThisFields__" value="<?php echo $this->_tpl_vars['form_objectRequiredFields']; ?>
" />
  <input type="hidden" name="DynaformRequiredFields" id="DynaformRequiredFields" value="<?php echo $this->_tpl_vars['form_objectRequiredFields']; ?>
" />
  <?php echo $this->_tpl_vars['form']['BROWSER_TIME_ZONE_OFFSET']; ?>

    <div style="display: none;"> <?php echo $this->_tpl_vars['form']['USR_PASSWORD']; ?>
</div>
    <fieldset>
      <label class="panel-login">
        <div class="login_result"></div>
      </label>
      <?php echo $this->_tpl_vars['form']['USR_USERNAME']; ?>

      <?php echo $this->_tpl_vars['form']['USR_PASSWORD_MASK']; ?>

      <?php echo $this->_tpl_vars['form']['USER_LANG']; ?>

      <?php echo $this->_tpl_vars['form']['URL']; ?>

      <?php echo $this->_tpl_vars['form']['FAILED_LOGINS']; ?>


    </fieldset>
    <fieldset>
        <label class="panel-login">
            <div class="login_result"></div>
        </label>
        <br>
        <?php echo $this->_tpl_vars['form']['BSUBMIT']; ?>

        <?php echo $this->_tpl_vars['form']['FORGOT_PASWORD_LINK']; ?>


    </fieldset>
    <script type="text/javascript">
      <?php echo $this->_tpl_vars['form']['JS']; ?>

    </script>
</form>
<script src="/lib/pmdynaform/libs/respondjs/respond.min.js"></script>
<script src="/lib/pmdynaform/libs/html5shiv/html5shiv.js"></script>
<script type="text/javascript">
    try <?php echo '{'; ?>
 dynaformSetFocus();}catch(e)<?php echo '{'; ?>
}
</script>
