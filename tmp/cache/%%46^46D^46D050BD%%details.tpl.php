<?php /* Smarty version 2.6.18, created on 2014-03-02 01:07:26
         compiled from ../templates/default/customers/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/customers/details.tpl', 33, false),array('modifier', 'number_format', '../templates/default/customers/details.tpl', 117, false),array('modifier', 'urlencode', '../templates/default/customers/details.tpl', 125, false),array('modifier', 'outhtml', '../templates/default/customers/details.tpl', 243, false),array('function', 'html_options', '../templates/default/customers/details.tpl', 251, false),)), $this); ?>
<?php if ($_GET['action'] == 'view'): ?>
<br />
<table align="center" border="1">
	<tr>
		<td colspan="2" align="center" class="align_center"><i><?php echo $this->_tpl_vars['LANG']['customer_details']; ?>
</i></td>
		<td align="center" class="align_center"><?php echo $this->_tpl_vars['LANG']['id_document']; ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['customer_no']; ?>
</td>
		<td><?php echo $this->_tpl_vars['customer']['customer_no']; ?>
</td>
		<td rowspan="18" align="center" class="align_left">
			<img src="images/id_document/<?php echo $this->_tpl_vars['customer']['id_document']; ?>
" width='100%' alt=""/> 
		</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['customer']['name']; ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['attention_short']; ?>

			<a
				rel="index.php?module=documentation&amp;view=view&amp;page=help_customer_contact"
				href="#"
				class="cluetip"
				title="<?php echo $this->_tpl_vars['LANG']['customer_contact']; ?>
"
			>
				<img src="./images/common/help-small.png" alt="" />
			</a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['attention'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['id_no']; ?>
</td>
		<td><?php echo $this->_tpl_vars['customer']['id_no']; ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['phone']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['phone'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['mobile_phone']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['mobile_phone'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['fax']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['fax'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['email']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['email'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['website']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['website'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['street_address']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['street_address'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['street_address2']; ?>

			<a
				class="cluetip"
				href="#"
				rel="index.php?module=documentation&amp;view=view&amp;page=help_street2"
				title="<?php echo $this->_tpl_vars['LANG']['street2']; ?>
"
			> 
				<img src="./images/common/help-small.png" alt="" />
			</a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['street_address2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['city']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['city'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['zip']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['zip_code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['state']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['state'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['country']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['country'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['notes']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['notes'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['wording_for_enabled'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['customer_total']; ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['stuff']['total'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
</td>
	</tr>
</table>
<br />

<table class="buttons" align="center">
    <tr>
        <td>
            <a href="./index.php?module=customers&amp;view=details&amp;customer_no=<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['customer_no'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&amp;action=edit" class="positive">
                <img src="./images/common/tick.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['edit']; ?>

            </a>
    
        </td>
    </tr>
</table>
<?php endif; ?>

<?php if ($_GET['action'] == 'edit'): ?>

<form name="frmpost" action="index.php?module=customers&amp;view=save&amp;customer_no=<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['customer_no'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
" method="post" id="frmpost" onsubmit="return checkForm(this);">
<br />
<table align="center">
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['customer_no']; ?>
</td>
		<td><?php echo $this->_tpl_vars['customer']['customer_no']; ?>
</td>
	</tr>

	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['name']; ?>

		<a 
				class="cluetip"
				href="#"
				rel="index.php?module=documentation&amp;view=view&amp;page=help_required_field"
				title="<?php echo $this->_tpl_vars['LANG']['Required_Field']; ?>
"
		>
		<img src="./images/common/required-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="name" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" class="validate[required]" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['attention_short']; ?>

		<a
			rel="index.php?module=documentation&amp;view=view&amp;page=help_customer_contact"
			href="#"
			class="cluetip"
			title="<?php echo $this->_tpl_vars['LANG']['customer_contact']; ?>
"
		>
		 <img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="attention" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['attention'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>

	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['id_document']; ?>

		<a
			rel="index.php?module=documentation&amp;view=view&amp;page=help_id_document"
			href="#"
			class="cluetip"
			title="<?php echo $this->_tpl_vars['LANG']['id_document']; ?>
"
		>
		 	<img src="./images/common/help-small.png" alt="" />
		 </a>
		 </td>
		 <td><input type="text" name="id_document" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['id_document'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['id_no']; ?>
</td>
		<td><input type="text" name="id_no" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['id_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['phone']; ?>
</td>
		<td><input type="text" name="phone" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['phone'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['mobile_phone']; ?>
</td>
		<td><input type="text" name="mobile_phone" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['mobile_phone'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['fax']; ?>
</td>
		<td><input type="text" name="fax" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['fax'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['email']; ?>
</td>
		<td><input type="text" name="email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['email'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['website']; ?>
</td>
		<td><input type="text" name="website" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['website'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['street']; ?>
</td>
		<td><input type="text" name="street_address" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['street_address'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['street2']; ?>

			<a
				class="cluetip"
				href="#"
				rel="index.php?module=documentation&amp;view=view&amp;page=help_street2"
				title="<?php echo $this->_tpl_vars['LANG']['street2']; ?>
"
			> 
				<img src="./images/common/help-small.png" alt="" />
			</a>
		</td>
		<td><input type="text" name="street_address2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['street_address2'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['city']; ?>
</td>
		<td><input type="text" name="city" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['city'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['zip']; ?>
</td>
		<td><input type="text" name="zip_code" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['zip_code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['state']; ?>
</td>
		<td><input type="text" name="state" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['state'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['country']; ?>
</td>
		<td><input type="text" name="country" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['country'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['notes']; ?>
</td>
		<td><textarea  name="notes"  rows="5" cols="85"><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['notes'])) ? $this->_run_mod_handler('outhtml', true, $_tmp) : outhtml($_tmp)); ?>
</textarea></td>
	</tr>
		<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'enabled','options' => $this->_tpl_vars['enabled'],'selected' => $this->_tpl_vars['customer']['enabled']), $this);?>

		</td>
	</tr>
</table>


<br />

<table class="buttons" align="center">
    <tr>
        <td>
            <button type="submit" class="positive" name="save_customer" value="<?php echo $this->_tpl_vars['LANG']['save_customer']; ?>
">
                <img class="button_img" src="./images/common/tick.png" alt="" /> 
                <?php echo $this->_tpl_vars['LANG']['save']; ?>

            </button>

            <input type="hidden" name="op" value="edit_customer">
        
            <a href="./index.php?module=customers&amp;view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['cancel']; ?>

            </a>
    
        </td>
    </tr>
</table>

</form>
<?php endif; ?>