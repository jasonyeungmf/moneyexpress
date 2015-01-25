<?php /* Smarty version 2.6.18, created on 2013-12-23 01:49:46
         compiled from ../templates/default/trading_types/add.tpl */ ?>
<form name="frmpost" action="index.php?module=trading_types&amp;view=save" method="post">
<br />
	<table align="center">
		<tr>
			<td class="details_screen">Trading type description 
			<a 
				class="cluetip"
				href="#"
				rel="index.php?module=documentation&amp;view=view&amp;page=help_required_field"
				title="<?php echo $this->_tpl_vars['LANG']['Required_Field']; ?>
"
			>
		<img src="./images/common/required-small.png" alt="" /></a>			
		</td>
			<td><input class="validate[required]" type="text" name="description" size="50" /></td>
		</tr>
		<tr>
			<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td>
			<td>
				<select name="enabled">
					<option value="1" selected><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
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
				<button type="submit" class="positive" name="insert_preference" value="<?php echo $this->_tpl_vars['LANG']['save']; ?>
">
					<img class="button_img" src="./images/common/tick.png" alt="" /> 
					<?php echo $this->_tpl_vars['LANG']['save']; ?>

				</button>

				<input type="hidden" name="op" value="insert_preference" />
			
				<a href="./index.php?module=trading_types&amp;view=manage" class="negative">
					<img src="./images/common/cross.png" alt="" />
					<?php echo $this->_tpl_vars['LANG']['cancel']; ?>

				</a>
		
			</td>
		</tr>
	 </table>
	<div style="text-align:center;">
		<input type="hidden" name="op" value="insert_trading_type" />
	</div>
</form>