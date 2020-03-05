<?php /* Smarty version 2.6.31, created on 2020-03-04 19:34:49
         compiled from /Users/rafaelgutierrezgaspar/Sites/dev/pm346/processmaker/gulliver/templates/menu.html */ ?>
<ul id="pm_menu">
	<?php $_from = $this->_tpl_vars['menus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['field']):
?>
	<?php if ($this->_tpl_vars['field']['icon'] != ""): ?>
	<li  id="<?php echo $this->_tpl_vars['field']['idName']; ?>
" class="<?php echo $this->_tpl_vars['field']['classname']; ?>
">
		<a href="<?php echo $this->_tpl_vars['field']['target']; ?>
" >
			<img src="<?php echo $this->_tpl_vars['field']['icon']; ?>
" border="0" alt="<?php echo $this->_tpl_vars['field']['label']; ?>
"/>
			<?php echo $this->_tpl_vars['field']['label']; ?>

		</a>
	</li>
	<?php else: ?>
	<li  id="<?php echo $this->_tpl_vars['field']['idName']; ?>
"
		  class="<?php echo $this->_tpl_vars['field']['classname']; ?>
">
		<a href="<?php echo $this->_tpl_vars['field']['target']; ?>
">
			<?php echo $this->_tpl_vars['field']['label']; ?>

		</a>
	</li>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
</ul>