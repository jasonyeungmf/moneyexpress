<?php /* Smarty version 2.6.18, created on 2013-12-17 20:44:25
         compiled from ../templates/default/trading_types/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/trading_types/details.tpl', 14, false),)), $this); ?>

<form name="frmpost" action="index.php?module=trading_types&amp;view=save&amp;id=<?php echo ((is_array($_tmp=$_GET['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" method="post" onsubmit="return frmpost_Validator(this)">



<br />
<?php if ($_GET['action'] == 'view'): ?>
	
	
	<table align="center">
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['description']; ?>
</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['enabled'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	</table>
		<br />
	<table class="buttons" align="center">
		<tr>
			<td>
				<a href="./index.php?module=trading_types&amp;view=details&amp;id=<?php echo $this->_tpl_vars['trading_type']['id']; ?>
&amp;action=edit" class="positive">
					<img src="./images/famfam/report_edit.png" alt="" />
					<?php echo $this->_tpl_vars['LANG']['edit']; ?>

				</a>

				<a href="./index.php?module=trading_types&amp;view=manage" class="negative">
					<img src="./images/common/cross.png" alt="" />
					<?php echo $this->_tpl_vars['LANG']['cancel']; ?>

				</a>
		
			</td>
		</tr>
	 </table>
<?php endif; ?>

<?php if ($_GET['action'] == 'edit'): ?>

	<table align="center">
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['description']; ?>
 <a href="index.php?module=documentation&amp;view=view&amp;page=help_required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png" alt="(required)" /></a></td>
		<td>
			<input type="text"  class="validate[required]"  name="description" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['trading_type']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)))) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="50" />
		</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
 </td>
		<td>
				<select name="enabled">
			<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['enabled'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" selected style="font-weight: bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['enabled'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
			<option value="1"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</option>
			<option value="0"><?php echo $this->_tpl_vars['LANG']['disabled']; ?>
</option>
		</select>
				
		</td>
	</tr>
	</table>
	<br />
	<table class="buttons" align="center">
		<tr>
			<td>
				<button type="submit" class="positive" name="save_trading_type" value="<?php echo $this->_tpl_vars['LANG']['save']; ?>
">
					<img class="button_img" src="./images/common/tick.png" alt="" /> 
					<?php echo $this->_tpl_vars['LANG']['save']; ?>

				</button>

				<input type="hidden" name="op" value="edit_trading_type">
			
				<a href="./index.php?module=trading_types&amp;view=manage" class="negative">
					<img src="./images/common/cross.png" alt="" />
					<?php echo $this->_tpl_vars['LANG']['cancel']; ?>

				</a>
		
			</td>
		</tr>
	 </table>

<?php endif; ?>