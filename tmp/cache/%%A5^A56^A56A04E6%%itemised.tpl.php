<?php /* Smarty version 2.6.18, created on 2014-12-17 23:49:03
         compiled from ../templates/default/invoices/itemised.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/invoices/itemised.tpl', 57, false),array('modifier', 'date_format', '../templates/default/invoices/itemised.tpl', 123, false),)), $this); ?>
<form name="frmpost" action="index.php?module=invoices&amp;view=save" method="post" onsubmit="return frmpost_Validator(this)">

<div id="gmail_loading" class="gmailLoader" style="float:right; display: none;"><img src="images/common/gmail-loader.gif" alt="<?php echo $this->_tpl_vars['LANG']['loading']; ?>
 ..." /><?php echo $this->_tpl_vars['LANG']['loading']; ?>
 ...</div>

<?php if ($this->_tpl_vars['first_run_wizard'] == true): ?>
<br /><br />
<span class="welcome"><?php echo $this->_tpl_vars['LANG']['before_starting']; ?>
</span>
<br /><br /><br />

<table class="buttons" align="center">

<?php if ($this->_tpl_vars['billers'] == null): ?>
<tr>
	<td><?php echo $this->_tpl_vars['LANG']['setup_as_biller']; ?>
&nbsp;</td>
        <td><a href="./index.php?module=billers&amp;view=add" class="positive"><img src="./images/common/user_add.png" alt="" /><?php echo $this->_tpl_vars['LANG']['add_new_biller']; ?>
</a></td>
</tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['customers'] == null): ?>
 <tr>
	<td><?php echo $this->_tpl_vars['LANG']['setup_add_customer']; ?>
&nbsp;</td>
	<td><a href="./index.php?module=customers&amp;view=add" class="positive"><img src="./images/common/vcard_add.png" alt="" /><?php echo $this->_tpl_vars['LANG']['customer_add']; ?>
</a></td>
</tr>
<?php endif; ?>
	    
<?php if ($this->_tpl_vars['products'] == null): ?>
<tr>
	<td><?php echo $this->_tpl_vars['LANG']['setup_add_products']; ?>
&nbsp;</td>
	<td><a href="./index.php?module=currencys_note&amp;view=add" class="positive"><img src="./images/common/cart_add.png" alt="" /><?php echo $this->_tpl_vars['LANG']['add_new_product']; ?>
</a></td>
</tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['preferences'] == null): ?>
<tr>
	<td><?php echo $this->_tpl_vars['LANG']['setup_add_inv_pref']; ?>
&nbsp;</td>
	<td><a href="./index.php?module=preferences&amp;view=add" class="positive"><img src="./images/common/page_white_edit.png" alt="" /><?php echo $this->_tpl_vars['LANG']['add_new_preference']; ?>
</a></td>
</tr>
<?php endif; ?>
</table>

<br />

<?php else: ?>
<br />
<br />
<input type="hidden" name="action" value="insert" />
<table align="center" width="100%" border="0">
	<tr>
        	<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['trading_type']; ?>
</td>		
                <td>
                <?php if ($this->_tpl_vars['trading_types'] == null): ?>
                	<p><em><?php echo $this->_tpl_vars['LANG']['no_trading_types']; ?>
</em></p>
                <?php else: ?>
                        <select name="trading_type_id" id="trading_type_id" class="trading_type_change" >
                            	<?php $_from = $this->_tpl_vars['trading_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trading_type']):
?>
				    		<option <?php if ($this->_tpl_vars['trading_type']['id'] == $this->_tpl_vars['defaults']['trading_type']): ?> selected <?php endif; ?> 
					    		value="<?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
						>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

						</option>
				<?php endforeach; endif; unset($_from); ?>
                        </select>
                <?php endif; ?>
                </td>		
		<td class="details_screen">Summary:</td>
        </tr>
		       
        <tr>
                <td class="details_screen"><?php echo $this->_tpl_vars['LANG']['biller']; ?>
</td>
                <td>
			<?php if ($this->_tpl_vars['billers'] == null): ?>
                        	<p><em><?php echo $this->_tpl_vars['LANG']['no_billers']; ?>
</em></p>
                        <?php else: ?>
                            <select name="biller_id" >
                            <?php $_from = $this->_tpl_vars['billers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['biller']):
?>
                            <option <?php if ($this->_tpl_vars['biller']['id'] == $this->_tpl_vars['defaults']['biller']): ?> selected <?php endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['biller']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['biller']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                            </select>
                        <?php endif; ?>
                </td>
			
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['index_id']; ?>
</td>		
		<td>
			<input
				id="index_id" 
				name="index_id"
				type="text"
				class="validate[required]"
				size="40"
				<?php if ($_GET['index_id']): ?>
					 value="<?php echo $_GET['index_id']; ?>
"
				<?php else: ?>
					 value=""
				<?php endif; ?>
			/>
		</td>		
	</tr>

	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['customer']; ?>
</td>
                <td>
                        <?php if ($this->_tpl_vars['customers'] == null): ?>
                        	<em><?php echo $this->_tpl_vars['LANG']['no_customers']; ?>
</em>
                        <?php else: ?>
                            <select name="customer_id">
                            <?php $_from = $this->_tpl_vars['customers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customer']):
?>
                                <option <?php if ($this->_tpl_vars['customer']['customer_no'] == $this->_tpl_vars['defaultCustomerID']): ?> selected <?php endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                            </select>
                        <?php endif; ?>
                </td>		    
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['date_time']; ?>
</td>
		<td wrap="nowrap">
			<input
		    	type="text" 
		    	class="validate[required,custom[date],length[0,19]]" 
		    	size="40" 
		    	name="date" 
		    	id="date1" 
		    	<?php if ($_GET['date']): ?>
				value="<?php echo $_GET['date']; ?>
"
		    	<?php else: ?>
				value="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
"
		    	<?php endif; ?> 
		    	/>   
		</td>
        </tr>

	<tr><td><br/></td></tr>
	
	<tr>

		<td colspan="4">
		<table id="itemtable" width="100%" border="0">
			<tbody id="itemtable-tbody">
			<tr>
				<td class="details_screen"></td>				
				<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['currency']; ?>
</td>
				<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['quantity']; ?>
</td>				
				<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['unit_price']; ?>
</td>
				<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['subtotal']; ?>
</td>
				<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['charge']; ?>
</td>
				<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['total']; ?>
</td>
				<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note_cost']; ?>
</td>
				
			</tr>
			</tbody>
	
	        <?php unset($this->_sections['line']);
$this->_sections['line']['name'] = 'line';
$this->_sections['line']['start'] = (int)0;
$this->_sections['line']['loop'] = is_array($_loop=$this->_tpl_vars['dynamic_line_items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['line']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['line']['show'] = true;
$this->_sections['line']['max'] = $this->_sections['line']['loop'];
if ($this->_sections['line']['start'] < 0)
    $this->_sections['line']['start'] = max($this->_sections['line']['step'] > 0 ? 0 : -1, $this->_sections['line']['loop'] + $this->_sections['line']['start']);
else
    $this->_sections['line']['start'] = min($this->_sections['line']['start'], $this->_sections['line']['step'] > 0 ? $this->_sections['line']['loop'] : $this->_sections['line']['loop']-1);
if ($this->_sections['line']['show']) {
    $this->_sections['line']['total'] = min(ceil(($this->_sections['line']['step'] > 0 ? $this->_sections['line']['loop'] - $this->_sections['line']['start'] : $this->_sections['line']['start']+1)/abs($this->_sections['line']['step'])), $this->_sections['line']['max']);
    if ($this->_sections['line']['total'] == 0)
        $this->_sections['line']['show'] = false;
} else
    $this->_sections['line']['total'] = 0;
if ($this->_sections['line']['show']):

            for ($this->_sections['line']['index'] = $this->_sections['line']['start'], $this->_sections['line']['iteration'] = 1;
                 $this->_sections['line']['iteration'] <= $this->_sections['line']['total'];
                 $this->_sections['line']['index'] += $this->_sections['line']['step'], $this->_sections['line']['iteration']++):
$this->_sections['line']['rownum'] = $this->_sections['line']['iteration'];
$this->_sections['line']['index_prev'] = $this->_sections['line']['index'] - $this->_sections['line']['step'];
$this->_sections['line']['index_next'] = $this->_sections['line']['index'] + $this->_sections['line']['step'];
$this->_sections['line']['first']      = ($this->_sections['line']['iteration'] == 1);
$this->_sections['line']['last']       = ($this->_sections['line']['iteration'] == $this->_sections['line']['total']);
?>
		<?php $this->assign('lineNumber', $this->_sections['line']['index']); ?> 
				<tbody class="line_item" id="row<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
">
					<tr>
						<td>
							<?php if ($this->_sections['line']['index'] == '0'): ?>
							<a 
								href="#" 
								class="trash_link"
								id="trash_link<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								title="<?php echo ((is_array($_tmp=$this->_tpl_vars['LANG']['cannot_delete_first_row'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
							>
								<img 
									id="trash_image<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
									src="./images/common/blank.gif"
									height="16px"
									width="16px"
									title="<?php echo $this->_tpl_vars['LANG']['cannot_delete_first_row']; ?>
"
									alt=""
								 />
							</a>
							<?php endif; ?>
							<?php if ($this->_sections['line']['index'] != 0): ?>
														<!-- onclick="delete_row(<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
);" --> 
							<a 
								id="trash_link<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								class="trash_link"
								title="<?php echo $this->_tpl_vars['LANG']['delete_row']; ?>
" 
								rel="<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								href="#" 
								style="display: inline;"
							>
								<img src="./images/common/delete_item.png" alt="" />
							</a>
							<?php endif; ?>
						</td>		
						
						<td>
					<?php if ($this->_tpl_vars['currencys_note'] == null): ?>
					<p><em><?php echo $this->_tpl_vars['LANG']['no_currencys_note']; ?>
</em></p>
					<?php else: ?>
						<select 
							id="currencys<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
							name="currencys<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
							rel="<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
							class="validate[required] currency_change"						
                        			>
							<option value=""></option>
							<?php $_from = $this->_tpl_vars['currencys_note']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['currency']):
?>
							<option 
								<?php if ($this->_tpl_vars['currency']['id'] == $_GET['currency'][$this->_tpl_vars['lineNumber']]): ?>
								    value="<?php echo $_GET['currency'][$this->_tpl_vars['lineNumber']]; ?>
"
								    selected
								<?php else: ?>
								    value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								<?php endif; ?>
							>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['currency']['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

							</option>
						<?php endforeach; endif; unset($_from); ?>
						</select>
					<?php endif; ?>
						</td>
						<td>
							<input 
				                                AUTOCOMPLETE="OFF"
								type="text"
				                                name="quantity<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
				                                id="quantity<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								size="20" 
								rel="<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				                                <?php if ($_GET['quantity'][$this->_tpl_vars['lineNumber']]): ?>
				                                	value="<?php echo $_GET['quantity'][$this->_tpl_vars['lineNumber']]; ?>
"
								<?php else: ?>
									value=""
				                                <?php endif; ?> 
				                                class="validate[required] quantity_change"				                                
			                                />
						</td>								
						<td>
							<input 
								id="unit_price<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								name="unit_price<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								rel="<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								size="20"
								AUTOCOMPLETE="OFF"
								<?php if ($_GET['unit_price'][$this->_tpl_vars['lineNumber']]): ?>
								    	value="<?php echo $_GET['unit_price'][$this->_tpl_vars['lineNumber']]; ?>
"
								<?php else: ?>
								   	value=""
								<?php endif; ?>
                                				class="validate[required] unit_price_change"
							/>
						</td>
														
						<td>
							<input 
								readonly="readonly"
								id="subtotal<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								name="subtotal<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								rel="<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								size="20"
								AUTOCOMPLETE="OFF"
								<?php if ($_GET['subtotal'][$this->_tpl_vars['lineNumber']]): ?>
								    value="<?php echo $_GET['subtotal'][$this->_tpl_vars['lineNumber']]; ?>
"
								<?php else: ?>
								   value=""
								<?php endif; ?>
								class=""
							/>
						</td>
						<td>
							<input 
				                                AUTOCOMPLETE="OFF"
								type="text" 
				                                id="charge<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
				                                name="charge<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								size="20" 
								rel="<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
				                                <?php if ($_GET['charge'][$this->_tpl_vars['lineNumber']]): ?>
				                                	value="<?php echo $_GET['charge'][$this->_tpl_vars['lineNumber']]; ?>
"
								<?php else: ?>
									value="0"
				                                <?php endif; ?>
								 class="validate[required] charge_change"
			                                />
						</td>
						<td>
							<input 
								readonly="readonly"
								id="total<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								name="total<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								rel="<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								size="20"
								AUTOCOMPLETE="OFF"
								<?php if ($_GET['total'][$this->_tpl_vars['lineNumber']]): ?>
								    value="<?php echo $_GET['total'][$this->_tpl_vars['lineNumber']]; ?>
"
								<?php else: ?>
								   value=""
								<?php endif; ?>
								class=""
							/>
						</td>													
						<td>
							<input 
								readonly="readonly"
								AUTOCOMPLETE="OFF"
								id="note_cost<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								name="note_cost<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								rel="<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								size="20"
								<?php if ($_GET['note_cost'][$this->_tpl_vars['lineNumber']]): ?>
									value="<?php echo $_GET['note_cost'][$this->_tpl_vars['lineNumber']]; ?>
"
								<?php else: ?>
									value=""
								<?php endif; ?>
						                class=""
							/>
						</td>
														
					</tr>
							
					<tr class="note">
						<td></td>
						<td colspan="3">
							<textarea input type="text" class="note" name="description<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="description<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" rows="1" cols="50" WRAP=nowrap></textarea>
						</td>
					</tr>
					
				</tbody>				
	        <?php endfor; endif; ?>					
		</table>
		</td>
	</tr>
	
	<tr>
		<td>
			<table class="buttons" align="left">
				<tr>
					<td><a href="#" class="add_line_item"><img src="./images/common/add.png" alt="" /><?php echo $this->_tpl_vars['LANG']['add_new_row']; ?>
</a></td>
					<td>
					<a href='#' class="show-note" onclick="javascript: $('.note').show();$('.show-note').hide();">
						<img src="./images/common/page_white_add.png" title="<?php echo $this->_tpl_vars['LANG']['show_description']; ?>
" alt="" /><?php echo $this->_tpl_vars['LANG']['show_description']; ?>
</a>
					<a href='#' class="note" onclick="javascript: $('.note').hide();$('.show-note').show();">
						<img src="./images/common/page_white_delete.png" title="<?php echo $this->_tpl_vars['LANG']['hide_description']; ?>
" alt="" /><?php echo $this->_tpl_vars['LANG']['hide_description']; ?>
</a>
					</td>
					
				</tr>
		 	</table>
		</td>
	</tr>
	
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['invoice_total']; ?>
</td>
		<td>
			<input 
			readonly="readonly"
			id="invoice_total" 
			name="invoice_total" 
			size="40"
			AUTOCOMPLETE="OFF"
			<?php if ($_GET['invoice_total']): ?>
				 value="<?php echo $_GET['invoice_total']; ?>
"
			<?php else: ?>
				 value=""
			<?php endif; ?>
			/>
		</td>
	</tr>	

	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['notes']; ?>
</td>
		<td><textarea input type="text" name="note" rows="2" cols="34" wrap="nowrap"><?php echo $_GET['note']; ?>
</textarea></td>
	</tr>
	
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['inv_pref']; ?>
</td>
		<td>
		<?php if ($this->_tpl_vars['preferences'] == null): ?>
			<p><em><?php echo $this->_tpl_vars['LANG']['no_preferences']; ?>
</em></p>
		<?php else: ?>
			<select name="preference_id">
			<?php $_from = $this->_tpl_vars['preferences']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['preference']):
?>
				<option <?php if ($this->_tpl_vars['preference']['pref_id'] == $this->_tpl_vars['defaults']['preference']): ?> selected <?php endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
			</select>
		<?php endif; ?>
		</td>
	</tr>
</table>

<table class="buttons" align="center" border="0">
	<tr>
		<td><button type="submit" class="invoice_save positive" name="submit" value="<?php echo $this->_tpl_vars['LANG']['save']; ?>
"><img class="button_img" src="./images/common/tick.png" alt="" /><?php echo $this->_tpl_vars['LANG']['save']; ?>
</button></td>
		<td><input type="hidden" id="max_items" name="max_items" value="<?php echo ((is_array($_tmp=$this->_sections['line']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" />	        	
			<a href="./index.php?module=invoices&amp;view=manage" class="negative"><img src="./images/common/cross.png" alt="" /><?php echo $this->_tpl_vars['LANG']['cancel']; ?>
</a>    
	        </td>
	</tr>
</table>

</form>
<?php endif; ?>