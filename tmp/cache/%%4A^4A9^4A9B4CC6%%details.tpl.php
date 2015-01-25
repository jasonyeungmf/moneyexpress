<?php /* Smarty version 2.6.18, created on 2014-02-26 01:33:06
         compiled from ../templates/default/products/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urlencode', '../templates/default/products/details.tpl', 1, false),array('modifier', 'htmlsafe', '../templates/default/products/details.tpl', 9, false),array('modifier', 'siLocal_number_clean', '../templates/default/products/details.tpl', 13, false),array('modifier', 'siLocal_number', '../templates/default/products/details.tpl', 20, false),array('modifier', 'unescape', '../templates/default/products/details.tpl', 61, false),array('modifier', 'siLocal_number_formatted', '../templates/default/products/details.tpl', 106, false),array('function', 'html_options', '../templates/default/products/details.tpl', 154, false),)), $this); ?>
<form name="frmpost" action="index.php?module=products&view=save&id=<?php echo ((is_array($_tmp=$_GET['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
" method="post" id="frmpost" onsubmit="return checkForm(this);">


<?php if ($_GET['action'] == 'view'): ?>
<br />
	<table align="center">
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['product_description']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['product_unit_price']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['unit_price'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
</td>
	</tr>
    <?php if ($this->_tpl_vars['defaults']['inventory'] == '1'): ?>
        <tr>
            <td class="details_screen">
                <?php echo $this->_tpl_vars['LANG']['cost']; ?>

            </td>
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['cost'])) ? $this->_run_mod_handler('siLocal_number', true, $_tmp) : siLocal::number($_tmp)); ?>
</td>
        </tr>
        <tr>
            <td class="details_screen"><?php echo $this->_tpl_vars['LANG']['reorder_level']; ?>
</td>
            <td><?php echo $this->_tpl_vars['product']['reorder_level']; ?>
</td>
        </tr>
    <?php endif; ?>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['default_tax']; ?>
</td>
		<td>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['tax_selected']['tax_description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['tax_selected']['type'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

		</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['product_cf1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['custom_field1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['product_cf2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['custom_field2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['product_cf3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['custom_field3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['product_cf4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['custom_field4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
			<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['notes']; ?>
</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['notes'])) ? $this->_run_mod_handler('unescape', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['product_enabled']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['wording_for_enabled'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
</table>
	<br />
	<table class="buttons" align="center">
		<tr>
			<td>
				<a href="./index.php?module=products&view=details&id=<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
&action=edit" class="positive">
					<img src="./images/famfam/add.png" alt=""/>
					<?php echo $this->_tpl_vars['LANG']['edit']; ?>

				</a>

			</td>
		</tr>
	</table>
<?php endif; ?>


<?php if ($_GET['action'] == 'edit'): ?>
<br />

	<table align="center">
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['product_description']; ?>
</td>
		<td><input type="text" name="description" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="description"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['product_unit_price']; ?>
</td>
		<td><input type="text" name="unit_price" size="25" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['unit_price'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
" /></td>
	</tr>
    <?php if ($this->_tpl_vars['defaults']['inventory'] == '1'): ?>
        <tr>
            <td class="details_screen">

                <?php echo $this->_tpl_vars['LANG']['cost']; ?>


		        <a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_cost" title="<?php echo $this->_tpl_vars['LANG']['cost']; ?>
">
                    <img src="./images/common/help-small.png" alt="" />
                </a>

            </td>
            <td><input type="text" class="edit" name="cost" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['cost'])) ? $this->_run_mod_handler('siLocal_number_formatted', true, $_tmp) : siLocal::number_formatted($_tmp)); ?>
"  size="25" /></td>
        </tr>
        <tr>
            <td class="details_screen"><?php echo $this->_tpl_vars['LANG']['reorder_level']; ?>
</td>
            <td><input type="text" class="edit" name="reorder_level" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['reorder_level'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"  size="25" /></td>
        </tr>
    <?php endif; ?>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['default_tax']; ?>
</td>
		<td>
		<select name="default_tax_id">
			<?php $_from = $this->_tpl_vars['taxes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tax']):
?>
				<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['tax_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" <?php if ($this->_tpl_vars['tax']['tax_id'] == $this->_tpl_vars['product']['default_tax_id']): ?>selected<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['tax_description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['product_cf1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field1" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['custom_field1'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['product_cf2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field2" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['custom_field2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['product_cf3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field3" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['custom_field3'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['customFieldLabel']['product_cf4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['custom_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field4" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['custom_field4'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['notes']; ?>
</td>
		<td><textarea name="notes" class="editor" rows="8" cols="50"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['notes'])) ? $this->_run_mod_handler('unescape', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['product_enabled']; ?>
</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'enabled','options' => $this->_tpl_vars['enabled'],'selected' => $this->_tpl_vars['product']['enabled']), $this);?>

		</td>
	</tr>
	</table>
<?php endif; ?> 
<?php if ($_GET['action'] == 'edit'): ?>
	<br />
	<table class="buttons" align="center">
	<tr>
		<td>
			<button type="submit" class="positive" name="save_product" value="<?php echo $this->_tpl_vars['LANG']['save']; ?>
">
			    <img class="button_img" src="./images/common/tick.png" alt="" /> 
				<?php echo $this->_tpl_vars['LANG']['save']; ?>

			</button>

			<input type="hidden" name="op" value="edit_product">
		
			<a href="./index.php?module=products&view=manage" class="negative">
		        <img src="./images/common/cross.png" alt="" />
	        	<?php echo $this->_tpl_vars['LANG']['cancel']; ?>

    		</a>
	
		</td>
	</tr>
</table>
		
	<?php endif; ?>
</form>