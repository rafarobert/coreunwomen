<?php /* Smarty version 2.6.31, created on 2020-03-04 21:19:14
         compiled from layout.html */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <link rel="stylesheet" href="/lib/pmdynaform/libs/bootstrap-3.1.1/css/bootstrap.min.css">
    <?php echo $this->_tpl_vars['meta']; ?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
    <?php echo $this->_tpl_vars['header']; ?>

  </head>
  <?php if (( $this->_tpl_vars['user_logged'] != '' || $this->_tpl_vars['tracker'] != '' ) && $this->_tpl_vars['timezone_status'] != 'failed'): ?>
    <body>
      <table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" id="pm_main_table">
        <tr>
          <td id="pm_header" valign="top" <?php if ($this->_tpl_vars['user_logged'] != '' || $this->_tpl_vars['tracker'] != ''): ?>style="border-bottom:1px solid #e7e7e7;"<?php endif; ?>>
            <table width="100%" height="32" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
              <tr>
                  <?php if ($this->_tpl_vars['user_logged'] != '' || $this->_tpl_vars['tracker'] != ''): ?>
                  <td rowspan="2" style="vertical-align:top;width: 245px;"><img src="<?php echo $this->_tpl_vars['logo_company']; ?>
" class="logo_company"/></td>
                  <td id="mainMenuBG" class="mainMenuBG" rowspan="2" valign="center" >
                      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['tpl_menu']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                      <?php if (( count ( $this->_tpl_vars['subMenus'] ) > 0 )): ?>
                          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['tpl_submenu']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                      <?php endif; ?>
                  </td>
                  <td height="16" align="right" valign="top">
                    <div align="right" class="logout">
                      <small>
                      <?php if ($this->_tpl_vars['user_logged'] != ''): ?>
                        <?php echo $this->_tpl_vars['msgVer']; ?>
<label class="textBlue"><?php echo $this->_tpl_vars['userfullname']; ?>
 <a href="../users/myInfo"><?php echo $this->_tpl_vars['user']; ?>
</a> | </label>
                        <?php if ($this->_tpl_vars['switch_interface']): ?>
                        <label class="textBlue"><a href="../../uxs/home"><?php echo $this->_tpl_vars['switch_interface_label']; ?>
</a> | </label>
                        <?php endif; ?>
                        <a href="<?php echo $this->_tpl_vars['linklogout']; ?>
" class="tableOption"><?php echo $this->_tpl_vars['logout']; ?>
</a>&nbsp;&nbsp;<br/>
                        <label class="textBlack"><b><?php echo $this->_tpl_vars['rolename']; ?>
</b> <?php echo $this->_tpl_vars['workspace_label']; ?>
 <b><u><?php echo $this->_tpl_vars['workspace']; ?>
</u></b></label>&nbsp; &nbsp;
                      <?php else: ?>
                          <?php if ($this->_tpl_vars['tracker'] == 1): ?>
                              <a href="<?php echo $this->_tpl_vars['linklogout']; ?>
" class="tableOption"><?php echo $this->_tpl_vars['logout']; ?>
</a>&nbsp;&nbsp;
                          <?php endif; ?>
                      <?php endif; ?>
                      </small>
                    </div>
                  </td>
                  <?php else: ?>
                  <td width="100%" style="padding-top: 10px">
                      <img style="display: block; margin-left: auto; margin-right: auto;" src="<?php echo $this->_tpl_vars['logo_company']; ?>
"/>
                  </td>
                  <?php endif; ?>
              </tr>
              <tr>
                <td height="16" valign="bottom" class="title">
                  <div align="right"></div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <table width="100%" cellspacing="0" cellpadding="0" border="0" >
              <tr>
                <td <?php  if (isset($_SESSION["TRACKER_JAVASCRIPT"])) { echo "id=\"trackerContainer\""; }  ?> width="100%" align="center">
                  <?php 
                  global $G_TEMPLATE;
                  if ($G_TEMPLATE != '') G::LoadTemplate($G_TEMPLATE);
                  
                  if (isset($_SESSION["TRACKER_JAVASCRIPT"])) {
                      echo $_SESSION["TRACKER_JAVASCRIPT"];

                      unset($_SESSION["TRACKER_JAVASCRIPT"]);
                  } 
                   ?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr height="100%">
          <td height="100%">
            <div class="Footer">
              <div class="content"><?php echo $this->_tpl_vars['footer']; ?>
</div>
            </div>
          </td>
        </tr>
      </table>
    </body>
  <?php else: ?>
    <body id="page-top" class="login" data-spy="scroll" data-target=".navbar-custom">      
      <div class="page-wrap">
        <div class="container">         
            <div class="row vertical-offset-100">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                      <div class="row-fluid user-row">
                                <img src="/images/logopm3login.png" class="img-responsive" alt="Conxole Admin">
                            </div>
                    <div class="panel panel-default">
                        <div class="panel-body">                           
                            <?php 
                            global $G_TEMPLATE;
                            if ($G_TEMPLATE != '') G::LoadTemplate($G_TEMPLATE);
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>       
        <div class="footer-login">
          <div class="container">
            <span>
              <?php echo $this->_tpl_vars['footer']; ?>

            </span>
          </div>
        </div>
    </body>
  <?php endif; ?>
</html>