<?php /* Smarty version 2.6.18, created on 2015-01-04 02:59:14
         compiled from ../templates/default/invoices/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/invoices/details.tpl', 16, false),array('modifier', 'siLocal_number_clean', '../templates/default/invoices/details.tpl', 143, false),array('modifier', 'outhtml', '../templates/default/invoices/details.tpl', 212, false),)), $this); ?>
<br/>
<div id="gmail_loading" class="gmailLoader" style="float:right; display: none;">
	<img src="images/common/gmail-loader.gif" alt="<?php echo $this->_tpl_vars['LANG']['loading']; ?>
 ..." /> <?php echo $this->_tpl_vars['LANG']['loading']; ?>
 ...
</div>
<form name="frmpost" action="index.php?module=invoices&amp;view=save" method="post" class="quantity_change">
<table align="center" border="0" width="100%">
	
        <tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['trading_type']; ?>
</td>
		<td>
			<?php if ($this->_tpl_vars['trading_types'] == null): ?>
				<p><em><?php echo $this->_tpl_vars['LANG']['no_trading_types']; ?>
</em></p>
			<?php else: ?>	
				<select name="trading_type_id" id="trading_type_id" class="trading_type_change edit_trading_type_change">	
				<?php $_from = $this->_tpl_vars['trading_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trading_type']):
?>
					<option <?php if ($this->_tpl_vars['trading_type']['id'] == $this->_tpl_vars['invoice']['trading_type_id']): ?> selected <?php endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
				</select>
			<?php endif; ?>
		</td>		
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['summary']; ?>
</td>
	</tr>
	
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['biller']; ?>
</td>
		<td>
			<?php if ($this->_tpl_vars['billers'] == null): ?>
				<p><em><?php echo $this->_tpl_vars['LANG']['no_billers']; ?>
</em></p>
			<?php else: ?>
				<select name="biller_id">
				<?php $_from = $this->_tpl_vars['billers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['biller']):
?>
					<option <?php if ($this->_tpl_vars['biller']['id'] == $this->_tpl_vars['invoice']['biller_id']): ?> selected <?php endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['biller']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
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
			AUTOCOMPLETE="OFF"
			readonly="readonly"
			type="text" 
			id="index_id_edit" 
			name="index_id" 
			size="25"
			value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['index_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
			/>
		</td>							
	</tr>
	
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['customer']; ?>
</td>
		<td>
			<?php if ($this->_tpl_vars['customers'] == null): ?>
	        	<p><em><?php echo $this->_tpl_vars['LANG']['no_customers']; ?>
</em></p>
			<?php else: ?>
			<select name="customer_id">
			<?php $_from = $this->_tpl_vars['customers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customer']):
?>
				<option <?php if ($this->_tpl_vars['customer']['customer_no'] == $this->_tpl_vars['invoice']['customer_id']): ?> selected <?php endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
			</select>
			<?php endif; ?>
		</td>
	        <td class="details_screen"><?php echo $this->_tpl_vars['LANG']['date_time']; ?>
</td>
        	<td><input type="text" size="25" class="" name="date" id="date" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['date'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" readonly="readonly"/></td>		
	</tr>
	
	<tr><td><br/></td></tr>

	<tr>
	<td colspan="7">
		<table id="itemtable" width="100%" border="0">
			<tr>
				<td class="details_screen"></td>
				<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['currency']; ?>
</td>				
				<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['quantity']; ?>
</td>
	        		<td class='details_screen'><?php echo $this->_tpl_vars['LANG']['unit_price']; ?>
</td>
				<td class='details_screen'><?php echo $this->_tpl_vars['LANG']['subtotal']; ?>
</td>
				<td class='details_screen'><?php echo $this->_tpl_vars['LANG']['charge']; ?>
</td>
				<td class='details_screen'><?php echo $this->_tpl_vars['LANG']['total']; ?>
</td>
				<td class='details_screen'><?php echo $this->_tpl_vars['LANG']['note_cost']; ?>
</td>
	        		
		    	</tr>
	
			<?php $_from = $this->_tpl_vars['invoiceItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['line_item_number'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['line_item_number']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['line'] => $this->_tpl_vars['invoiceItem']):
        $this->_foreach['line_item_number']['iteration']++;
?>
				<tbody class="line_item" id="row<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
">
			        	<tr>
						<td>
						<?php if ($this->_tpl_vars['line'] != '0'): ?>
							<a 
								id="trash_link_edit<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								class="trash_link_edit"
								title="<?php echo $this->_tpl_vars['LANG']['delete_line_item']; ?>
" 
								href="#" 
								style="display: inline;"
								rel="<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
							>
								<img id="delete_image<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" src="./images/common/delete_item.png" alt="" />
							</a>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['line'] == '0'): ?>
							<a 
								id="trash_link_edit<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								class="trash_link_edit"
								title="<?php echo $this->_tpl_vars['LANG']['delete_line_item']; ?>
"
								href="#"
								style="display: inline;"
								rel="<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
							>
								<img id="delete_image<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" src="./images/common/blank.gif" alt="" />
							</a>
						<?php endif; ?>
						</td>
						
						<td>																	                					                
					        <?php if ($this->_tpl_vars['currencys_note'] == null): ?>
								<p><em><?php echo $this->_tpl_vars['LANG']['no_currencys_note']; ?>
</em></p>
							<?php else: ?>								
								<select 
									name="currencys<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
									id="currencys<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
									rel="<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
									class="validate[required] currency_change"
								>
								<?php $_from = $this->_tpl_vars['currencys_note']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['currency']):
?>
									<option <?php if ($this->_tpl_vars['currency']['id'] == $this->_tpl_vars['invoiceItem']['currency_id']): ?> selected <?php endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['currency']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
">
									<?php echo ((is_array($_tmp=$this->_tpl_vars['currency']['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

									</option>
								<?php endforeach; endif; unset($_from); ?>
								</select>
							<?php endif; ?>						 
						</td>						
						
						<td>													
							<input type="hidden" id="delete<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" name="delete<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="3" value=""/>
							<input 
								AUTOCOMPLETE="OFF"
								name='quantity<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
' 
								id='quantity<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
' 
								size="20"
								rel="<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								class="validate[required] quantity_change"
								value='<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['quantity'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
' 
							/>
							<input type="hidden" name='line_item<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
' id='line_item<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
'/>	
						</td>						
						
						<td>
							<input
								AUTOCOMPLETE="OFF" 
								name="unit_price<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								id="unit_price<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								size="20"
								rel="<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								class="validate[required] unit_price_change"
								value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['unit_price'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
"
							/>
						</td>
						
						<td>
							<input
								AUTOCOMPLETE="OFF"
								readonly="readonly" 
								id="subtotal<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								name="subtotal<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								size="20"
								rel="<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['subtotal'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
"
							/>
						</td>						

						<td>
							<input
								AUTOCOMPLETE="OFF" 
								name="charge<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								id="charge<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								size="20"
								rel="<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								class="validate[required] charge_change"
								value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['charge'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
"
							/>
						</td>						

						<td>
							<input
								AUTOCOMPLETE="OFF"
								readonly="readonly" 
								id="total<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								name="total<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								size="20"
								rel="<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['total'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
"
							/>
						</td>						
						
						<td>
							<input
								AUTOCOMPLETE="OFF" 
								id="note_cost<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								name="note_cost<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
								size="20"
								rel="<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
								value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['note_cost'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
"
							/>
						</td>						
						
			        </tr>
				
		            	<tr colspan="3" class="note">
					<td></td>
					<td colspan="3">
						<textarea input type="text" class="note-edit" name="description<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="description<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" rows="1" cols="50" wrap="nowrap"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['description'])) ? $this->_run_mod_handler('outhtml', true, $_tmp) : outhtml($_tmp)); ?>
</textarea>
					</td>
				</tr>
		</tbody>
			<?php endforeach; endif; unset($_from); ?>
		</table>
		</td>
	</tr>
		<tr>
			<td>
				<table class="buttons" align="left">
					<tr>
						<td><a	href="#" class="add_line_item"><img src="./images/common/add.png" alt="" /><?php echo $this->_tpl_vars['LANG']['add_new_row']; ?>
</a></td>
						<td>
						<a href='#' class="show-note" onclick="javascript: $('.note').show();$('.show-note').hide();"><img src="./images/common/page_white_add.png" title="<?php echo $this->_tpl_vars['LANG']['show_description']; ?>
" alt=""/><?php echo $this->_tpl_vars['LANG']['show_description']; ?>
</a>
						<a href='#' class="note" onclick="javascript: $('.note').hide();$('.show-note').show();"><img src="./images/common/page_white_delete.png" title="<?php echo $this->_tpl_vars['LANG']['hide_description']; ?>
" alt=""/><?php echo $this->_tpl_vars['LANG']['hide_description']; ?>
</a>
						</td>							
					</tr>
				 </table>
			</td>
		</tr>

		<tr>
			<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['invoice_total']; ?>
</td>
			<td align="right">
				<input 
				readonly="readonly"
				id="invoice_total" 
				name="invoice_total" 
				size="40"
				AUTOCOMPLETE="OFF"
				 value=""
				/>
			</td>				
		</tr>

		<tr>
	        	<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['note']; ?>
:</td>
			<td><textarea input type="text" name="note" rows="2" cols="34" wrap="nowrap"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['note'])) ? $this->_run_mod_handler('outhtml', true, $_tmp) : outhtml($_tmp)); ?>
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
					<option <?php if ($this->_tpl_vars['preference']['pref_id'] == $this->_tpl_vars['invoice']['preference_id']): ?> selected <?php endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
				</select>
			<?php endif; ?>
			</td>
		</tr>
</table>
</table>

<table class="buttons" align="center" border="0">
<tr>
<td>
	<button type="submit" class="invoice_save positive" name="submit" value="<?php echo $this->_tpl_vars['LANG']['save']; ?>
"><img class="button_img" src="./images/common/tick.png" alt="" /><?php echo $this->_tpl_vars['LANG']['save']; ?>
</button>
	<?php if ($this->_tpl_vars['invoice']['id'] == null): ?> 
		<input type="hidden" name="action" value="insert" />
	<?php else: ?>
		<input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" />

		<input type="hidden" name="action" value="edit" />
	<?php endif; ?>
		<input type="hidden" name="op" value="insert_preference" />
		<input type="hidden" id="max_items" name="max_items" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['lines'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" />
		<a href="./index.php?module=invoices&amp;view=manage" class="negative"><img src="./images/common/cross.png" alt="" /><?php echo $this->_tpl_vars['LANG']['cancel']; ?>
</a>
</td>
</tr>
</table>
 	
</form>