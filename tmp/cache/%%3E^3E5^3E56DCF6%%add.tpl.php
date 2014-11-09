<?php /* Smarty version 2.6.18, created on 2014-03-02 03:48:54
         compiled from ../templates/default/invoices_tt/add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/invoices_tt/add.tpl', 126, false),array('modifier', 'date_format', '../templates/default/invoices_tt/add.tpl', 140, false),)), $this); ?>
<body>
<form 
	name="frmpost" 
	action="index.php?module=invoices_tt&amp;view=save" 
	method="post" 
	onsubmit="return frmpost_Validator(this)"
>

<div id="gmail_loading" class="gmailLoader" style="float:right; display: none;">
    <img src="images/common/gmail-loader.gif" alt="<?php echo $this->_tpl_vars['LANG']['loading']; ?>
 ..." /> <?php echo $this->_tpl_vars['LANG']['loading']; ?>
 ...
</div>

<?php if ($this->_tpl_vars['first_run_wizard'] == true): ?>
    <br />
    <br />
    <span class="welcome"><?php echo $this->_tpl_vars['LANG']['before_starting']; ?>
</span>
    <br />
    <br />
    <br />

<table class="buttons" align="center">
<?php if ($this->_tpl_vars['billers'] == null): ?>
    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['setup_as_biller']; ?>
&nbsp;</td>
        <td>
            <a href="./index.php?module=billers&amp;view=add" class="positive">
                <img src="./images/common/user_add.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['add_new_biller']; ?>

            </a>
        </td>
    </tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['customers'] == null): ?>
    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['setup_add_customer']; ?>
&nbsp;</td>
        <td>
            <a href="./index.php?module=customers&amp;view=add" class="positive">
                <img src="./images/common/vcard_add.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['customer_add']; ?>

            </a>
        </td>
    </tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['currencys_tt'] == null): ?>
    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['setup_add_currency_for_tt']; ?>
&nbsp;</td>
        <td>
            <a href="./index.php?module=currencys_tt&amp;view=add" class="positive">
                <img src="./images/common/cart_add.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['add_new_currency_for_tt']; ?>

            </a>
        </td>
    </tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['accounts'] == null): ?>
    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['setup_add_account']; ?>
&nbsp;</td>
        <td>
            <a href="./index.php?module=accounts&amp;view=add" class="positive">
				<img src="./images/common/cart_add.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['add_new_account']; ?>

			</a>
		</td>
	</tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['trading_types'] == null): ?>
	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['setup_add_trading_type']; ?>
&nbsp;</td>
		<td>
			<a href="./index.php?module=trading_types&amp;view=add" class="positive">
				<img src="./images/common/cart_add.png" alt="" />
				<?php echo $this->_tpl_vars['LANG']['add_new_trading_type']; ?>

			</a>
		</td>
	</tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['preferences'] == null): ?>
	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['setup_add_inv_pref']; ?>
&nbsp;</td>
		<td>
			</a>
			<a href="./index.php?module=preferences&amp;view=add" class="positive">
				<img src="./images/common/page_white_edit.png" alt="" />
				<?php echo $this->_tpl_vars['LANG']['add_new_preference']; ?>

			</a>
		</td>
	</tr>
<?php endif; ?>                
</table>
<br />
<?php else: ?>

<br />
<span class="welcome">
    <a href="index.php?module=invoices_tt&amp;view=add">
    	<img class="action" src="./images/common/edit.png"/>&nbsp;<?php echo $this->_tpl_vars['LANG']['quantity_style']; ?>

    </a>
    <a class="cluetip" href="#" rel="index.php?module=documentation&amp;view=view&amp;page=help_quantity_types" title="<?php echo $this->_tpl_vars['LANG']['quantity_types']; ?>
">
		<img class="action" src="./images/common/help-small.png" alt="" />
	</a>&nbsp;&nbsp;

    <a href="index.php?module=invoices_tt&amp;view=add2">
    	<img class="action" src="./images/common/page_white_edit.png"/>&nbsp;<?php echo $this->_tpl_vars['LANG']['payable_amount_style']; ?>

    </a>
	<a class="cluetip" href="#" rel="index.php?module=documentation&amp;view=view&amp;page=help_payable_amount_types" title="<?php echo $this->_tpl_vars['LANG']['payable_amount_type']; ?>
">
		<img class="action" src="./images/common/help-small.png" alt="" />
	</a>
</span>
<br />
<br />
<br />

<table align="center" border="0">
  	<tr>
      	<td><?php echo $this->_tpl_vars['LANG']['index_id']; ?>
</td>    
        <td>
	        <input 
	        	name="index_id" 
	        	id="index_id" 
	        	type="text" 
	        	value="<?php echo ((is_array($_tmp=$_POST['index_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
	        	size="20"
	        />
        </td>

        <td><?php echo $this->_tpl_vars['LANG']['internal_id']; ?>
</td>
        <td></td>

        <td><?php echo $this->_tpl_vars['LANG']['date_time']; ?>
</td>
        <td wrap="nowrap">
            <input 
            name="date" 
            id="date1"
            type="text" 
            value="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
"
            size="20"
            class="validate[required,custom[date],length[0,19]]"
            />   
        </td>
    </tr>
		       
    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['trading_type']; ?>
</td>
        <td>
            <?php if ($this->_tpl_vars['trading_types'] == null): ?>
                <p><em><?php echo $this->_tpl_vars['LANG']['no_trading_types']; ?>
</em></p>
            <?php else: ?>
	            <select name="trading_type_id" id="trading_type_id" tabIndex="1">
		            <?php $_from = $this->_tpl_vars['trading_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trading_type']):
?>
			            <?php if ($this->_tpl_vars['trading_type']['id'] == 3 || $this->_tpl_vars['trading_type']['id'] == 4): ?> 
				            <option 
				            	<?php if ($this->_tpl_vars['trading_type']['id'] == 4): ?> selected <?php endif; ?>
				            	value="<?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				            >
				            	<?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

				            </option>
			            <?php endif; ?>	
		            <?php endforeach; endif; unset($_from); ?>
	            </select>
            <?php endif; ?>
        </td>

        <td><?php echo $this->_tpl_vars['LANG']['biller']; ?>
</td>
        <td>
           	<?php if ($this->_tpl_vars['billers'] == null): ?>
                <p><em><?php echo $this->_tpl_vars['LANG']['no_billers']; ?>
</em></p>
            <?php else: ?>
	            <select name="biller_id" tabIndex="2">
		            <?php $_from = $this->_tpl_vars['billers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['biller']):
?>
			            <option 
				            <?php if ($this->_tpl_vars['biller']['id'] == $this->_tpl_vars['defaults']['biller']): ?> selected <?php endif; ?> 
				            value="<?php echo ((is_array($_tmp=$this->_tpl_vars['biller']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
			            >
			            	<?php echo ((is_array($_tmp=$this->_tpl_vars['biller']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

			            </option>
		            <?php endforeach; endif; unset($_from); ?>
	            </select>
            <?php endif; ?>
        </td>

        <td><?php echo $this->_tpl_vars['LANG']['payment_type']; ?>
</td>
        <td>
			<?php if ($this->_tpl_vars['payment_types'] == null): ?>
            	<em><?php echo $this->_tpl_vars['LANG']['no_payment_types']; ?>
</em>
            <?php else: ?>
	            <select name="payment_type_id" tabIndex="3">
		            <?php $_from = $this->_tpl_vars['payment_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['payment_type']):
?>
			            <option 
				            <?php if ($this->_tpl_vars['payment_type']['pt_id'] == $this->_tpl_vars['defaults']['payment_type']): ?> selected <?php endif; ?> 
				            value="<?php echo ((is_array($_tmp=$this->_tpl_vars['payment_type']['pt_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				        >
				            <?php echo ((is_array($_tmp=$this->_tpl_vars['payment_type']['pt_description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

			            </option>
		            <?php endforeach; endif; unset($_from); ?>
	            </select>
            <?php endif; ?>
		</td>
    </tr>

    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['customer_no']; ?>
</td>
     <!-- <td>
        <?php if ($this->_tpl_vars['customers'] == null): ?>
            <em><?php echo $this->_tpl_vars['LANG']['no_customers']; ?>
</em>
        <?php else: ?>
	        <select name="customer_id" id="customer_id" class="validate[required] customer_change">
	        	<option value=""></option>
		        <?php $_from = $this->_tpl_vars['customers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customer']):
?>
		        <option <?php if ($this->_tpl_vars['customer']['customer_no'] == $this->_tpl_vars['defaultCustomerID']): ?> selected <?php endif; ?> 
		        value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
">
		        <?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

		        </option>
		        <?php endforeach; endif; unset($_from); ?>
	        </select>
        <?php endif; ?>
        </td>	-->
        <td>
			<input 
				name="customer_id"
				id="customer_id"
				type="text"
				value="<?php echo ((is_array($_tmp=$this->_tpl_vars['account']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				size="20"
			    AUTOCOMPLETE="OFF"
			    readonly="readonly"
				class="validate[required]" 
			/>
		</td>

        <td><?php echo $this->_tpl_vars['LANG']['account_id']; ?>
</td>
        <td>
			<input 
				name="account_id"
				id="account_id"
				type="text"
				value="<?php echo ((is_array($_tmp=$this->_tpl_vars['account']['serial_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				size="20"
			    AUTOCOMPLETE="OFF"
				class="validate[required] account_change" 
				tabIndex="4"
			/>
		</td>

		<td><?php echo $this->_tpl_vars['LANG']['quantity']; ?>
</td>
		<td>
			<input 
			    name="quantity" 
			    id="quantity"
				type="text"
			    value="<?php echo ((is_array($_tmp=$_POST['quantity'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
				size="20"
			    AUTOCOMPLETE="OFF"
			    class="validate[required] tt_quantity_change"
			    tabIndex="5"
			/>
		</td>
    </tr>

    <tr>
    	<td><?php echo $this->_tpl_vars['LANG']['customer_name']; ?>
</td>
    	<td colspan="3">
			<input 
				name="customer_name"
				id="customer_name"
				type="text"
				value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer_detail'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				size="78"
			    AUTOCOMPLETE="OFF"
			    readonly="readonly"
				class="validate[required]" 
			/>
		</td>

		<td><?php echo $this->_tpl_vars['LANG']['unit_price']; ?>
</td>
		<td>
			<input 
				name="unit_price" 
				id="unit_price"
				type="text"
				value="<?php echo ((is_array($_tmp=$_POST['unit_price'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				size="20"
				AUTOCOMPLETE="OFF"
                class="validate[required] tt_unit_price_change"
                tabIndex="6"
			/>
		</td>
    </tr>

    <tr>
    	<td></td>
		<td colspan="3"></td>

    	<td><?php echo $this->_tpl_vars['LANG']['charge']; ?>
</td>
    	<td>
			<input 
				name="charge" 
				id="charge"
				type="text"
				value="<?php echo ((is_array($_tmp=$_POST['charge'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				size="20"
				AUTOCOMPLETE="OFF"
				class="validate[required] charge_change"
				tabIndex="7"
			/>
		</td>

    </tr>

    <tr>
    	<td></td>
		<td colspan="3"></td>

		<td><?php echo $this->_tpl_vars['LANG']['total']; ?>
</td>
		<td>
			<input
				name="total"
				id="total"
				value="<?php echo ((is_array($_tmp=$_POST['total'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				size="20" 
				readonly="readonly"
			/>
		</td>
    </tr>

    <tr>
    	<td><?php echo $this->_tpl_vars['LANG']['payee']; ?>
</td>
    	<td colspan="5">
			<input
				name="payee"
				id="payee"
				value="<?php echo ((is_array($_tmp=$this->_tpl_vars['account']['payee'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				size="123"
			    readonly="readonly"
			/>
		</td>
    </tr>

    <tr>
    	<td><?php echo $this->_tpl_vars['LANG']['bank']; ?>
</td>
    	<td colspan="5">
			<input
				name="bank"
				id="bank"
				value="<?php echo ((is_array($_tmp=$this->_tpl_vars['account']['bank'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				size="123"
			    readonly="readonly"
			/>
		</td>
    </tr>

    <tr>
    	<td><?php echo $this->_tpl_vars['LANG']['account_no']; ?>
</td>
    	<td colspan="5">
			<input
				name="account_no"
				id="account_no"
				value="<?php echo ((is_array($_tmp=$this->_tpl_vars['account']['account_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				size="123"
			    readonly="readonly"
			/>
		</td>
    </tr>

    <tr>
    	<td><?php echo $this->_tpl_vars['LANG']['product']; ?>
</br><?php echo $this->_tpl_vars['LANG']['calculation_types']; ?>
</br><?php echo $this->_tpl_vars['LANG']['payable_amount']; ?>
</td>
    	<td>
    		<?php if ($this->_tpl_vars['currencys_tt'] == null): ?>
				<p><em><?php echo $this->_tpl_vars['LANG']['no_currencys_tt']; ?>
</em></p>
			<?php else: ?>
				<select name="product_id"	id="product_id" class="validate[required]" tabIndex="8">
					<?php $_from = $this->_tpl_vars['currencys_tt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
						<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['calculation_types'] == null): ?>
				<p><em><?php echo $this->_tpl_vars['LANG']['no_calculation_types']; ?>
</em></p>
			<?php else: ?>
				<select name="calculation_type_id" id="calculation_type_id" class="validate[required] calculation_type_change" tabIndex="9">
					<?php $_from = $this->_tpl_vars['calculation_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['calculation_type']):
?>
						<option	value="<?php echo ((is_array($_tmp=$this->_tpl_vars['calculation_type']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['calculation_type']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			<?php endif; ?>

			<input
				name="payable_amount"
				id="payable_amount"
				value="<?php echo ((is_array($_tmp=$_POST['payable_amount'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				size="20" 
				readonly="readonly"
			/>
		</td>

		<td><?php echo $this->_tpl_vars['LANG']['spell_number']; ?>
</td>
		<td colspan="3">
			<textarea 
				input
				name="spell_number"
				id="spell_number"
				type="text"
				rows="3" 
				cols="56"
				wrap="nowrap"
				readonly="readonly"
			><?php echo ((is_array($_tmp=$_POST['spell_number'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</textarea>
		</td>
    </tr>

    <tr>	
	    <td colspan="6"><?php echo $this->_tpl_vars['LANG']['note']; ?>
</td>
	</tr>

	<tr>
		<td colspan="6">
			<textarea 
				input  
				name="note"
				id="note"  
				type="text"
				rows="3" 
				cols="123" 
				wrap="nowrap"
				tabIndex="10"
			><?php echo ((is_array($_tmp=$_POST['note'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</textarea>
		</td>
	</tr>

	<tr>
		<td><?php echo $this->_tpl_vars['LANG']['inv_pref']; ?>
</td>
		<td colspan="5">
		<?php if ($this->_tpl_vars['preferences'] == null): ?>
			<p><em><?php echo $this->_tpl_vars['LANG']['no_preferences']; ?>
</em></p>
		<?php else: ?>
			<select name="preference_id" tabIndex="11">
				<?php $_from = $this->_tpl_vars['preferences']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['preference']):
?>
					<option <?php if ($this->_tpl_vars['preference']['pref_id'] == $this->_tpl_vars['defaults']['preference_id']): ?> selected <?php endif; ?> 
						value="<?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
					>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

					</option>
				<?php endforeach; endif; unset($_from); ?>
			</select>
		<?php endif; ?>
		</td>
	</tr>

	<tr>
		<td class=""> 
			<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_invoice_custom_fields" title="<?php echo $this->_tpl_vars['LANG']['want_more_fields']; ?>
"><img src="./images/common/help-small.png" alt="" /> <?php echo $this->_tpl_vars['LANG']['want_more_fields']; ?>
</a>
		</td>
	</tr>

</table>
			
<table class="buttons" align="center" border="0">
		<tr>
			<td>
				<button type="submit" class="positive" name="submit" value="<?php echo $this->_tpl_vars['LANG']['save']; ?>
" tabIndex="12">
		            <img class="button_img" src="./images/common/tick.png" alt="" /> 
		            <?php echo $this->_tpl_vars['LANG']['save']; ?>

		        </button>
			</td>

			<td>
	            <a href="./index.php?module=invoices_tt&amp;view=manage" class="negative" tabIndex="13">
	                <img src="./images/common/cross.png" alt="" />
	                <?php echo $this->_tpl_vars['LANG']['cancel']; ?>

	            </a>
	    
	        </td>
	    </tr>
	</table>
</table>

<input type="hidden" name="action" value="insert" />

</form>
</body>
<?php endif; ?>