<?php /* Smarty version 2.6.18, created on 2014-05-30 01:06:36
         compiled from ../templates/default/invoices/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/invoices/details.tpl', 31, false),array('modifier', 'siLocal_number_clean', '../templates/default/invoices/details.tpl', 149, false),array('modifier', 'outhtml', '../templates/default/invoices/details.tpl', 211, false),)), $this); ?>
<br />
<div id="gmail_loading" class="gmailLoader" style="float:right; display: none;">
        	<img src="images/common/gmail-loader.gif" alt="<?php echo $this->_tpl_vars['LANG']['loading']; ?>
 ..." /> <?php echo $this->_tpl_vars['LANG']['loading']; ?>
 ...
</div>
<form name="frmpost" action="index.php?module=invoices&amp;view=save" method="post">
	<table align="center">
	<tr>
		<td colspan="6" align="center"></td>
	</tr>
	
        <tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['trading_type']; ?>
</td>
		<td>
		<?php $_from = $this->_tpl_vars['trading_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trading_type']):
?>
			<?php if ($this->_tpl_vars['trading_type']['id'] == $this->_tpl_vars['invoice']['trading_type_id']): ?>
				<a>:<?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</a>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		</td>		
	
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['trading_type_id']; ?>
</td>
		<td>
		<input 
			style="font-weight:bold"
			readonly="readonly"
			id="trading_type_id" 
			name="trading_type_id" 
			size="10"
			value="<?php echo $this->_tpl_vars['invoice']['trading_type_id']; ?>
" 
		/>
		</td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['biller']; ?>
</td><td>
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
		<td> <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['index_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
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
        	<td><input type="text" size="20" class="" name="date" id="date" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['date'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" readonly="readonly"/></td>		
	</tr>
<br />
<?php if ($this->_tpl_vars['invoice']['type_id'] == 2 || $this->_tpl_vars['invoice']['type_id'] == 3): ?>

		<tr>
		<td colspan="6">
		
		<table id="itemtable">
			<tr>
				<td class="details_screen"></td>
				<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['quantity_short']; ?>
</td>
				<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['product']; ?>
</td>
				<?php unset($this->_sections['tax_header']);
$this->_sections['tax_header']['name'] = 'tax_header';
$this->_sections['tax_header']['loop'] = is_array($_loop=$this->_tpl_vars['defaults']['tax_per_line_item']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tax_header']['show'] = true;
$this->_sections['tax_header']['max'] = $this->_sections['tax_header']['loop'];
$this->_sections['tax_header']['step'] = 1;
$this->_sections['tax_header']['start'] = $this->_sections['tax_header']['step'] > 0 ? 0 : $this->_sections['tax_header']['loop']-1;
if ($this->_sections['tax_header']['show']) {
    $this->_sections['tax_header']['total'] = $this->_sections['tax_header']['loop'];
    if ($this->_sections['tax_header']['total'] == 0)
        $this->_sections['tax_header']['show'] = false;
} else
    $this->_sections['tax_header']['total'] = 0;
if ($this->_sections['tax_header']['show']):

            for ($this->_sections['tax_header']['index'] = $this->_sections['tax_header']['start'], $this->_sections['tax_header']['iteration'] = 1;
                 $this->_sections['tax_header']['iteration'] <= $this->_sections['tax_header']['total'];
                 $this->_sections['tax_header']['index'] += $this->_sections['tax_header']['step'], $this->_sections['tax_header']['iteration']++):
$this->_sections['tax_header']['rownum'] = $this->_sections['tax_header']['iteration'];
$this->_sections['tax_header']['index_prev'] = $this->_sections['tax_header']['index'] - $this->_sections['tax_header']['step'];
$this->_sections['tax_header']['index_next'] = $this->_sections['tax_header']['index'] + $this->_sections['tax_header']['step'];
$this->_sections['tax_header']['first']      = ($this->_sections['tax_header']['iteration'] == 1);
$this->_sections['tax_header']['last']       = ($this->_sections['tax_header']['iteration'] == $this->_sections['tax_header']['total']);
?>
					<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['tax']; ?>
 <?php if ($this->_tpl_vars['defaults']['tax_per_line_item'] > 1): ?><?php echo ((is_array($_tmp=$this->_sections['tax_header']['index']+1)) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php endif; ?> </td>
				<?php endfor; endif; ?>
	        		<td class='details_screen'><?php echo $this->_tpl_vars['LANG']['unit_price']; ?>
</td>
				<td class='details_screen'><?php echo $this->_tpl_vars['LANG']['note_cost']; ?>
</td>
	        		<td>
					<a 
						href='#' 
						class="show-note" 
						onclick="javascript: $('.note').show();$('.show-note').hide();"
					>
						<img src="./images/common/page_white_add.png" title="<?php echo $this->_tpl_vars['LANG']['show_details']; ?>
" alt="" />
					</a>
					<a href='#' class="note" onclick="javascript: $('.note').hide();$('.show-note').show();">
						<img src="./images/common/page_white_delete.png" title="<?php echo $this->_tpl_vars['LANG']['hide_details']; ?>
" alt="" />
					</a>
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
							<input type="hidden" id="delete<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" name="delete<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="3" />
							<input 
								AUTOCOMPLETE="OFF"
								type="text" 
								name='quantity<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
' 
								id='quantity<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
' 
								value='<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['quantity'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
' 
								size="20"
							/>
							<input type="hidden" name='line_item<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
' id='line_item<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
' /> 
						</td>						
						
						<td>
																	                					                
					        <?php if ($this->_tpl_vars['currencys_note'] == null): ?>
								<p><em><?php echo $this->_tpl_vars['LANG']['no_currencys_note']; ?>
</em></p>
							<?php else: ?>								
								<select 
									name="products<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
									id="products<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
									rel="<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
									class="product_change"
								>
								<?php $_from = $this->_tpl_vars['currencys_note']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
									<option <?php if ($this->_tpl_vars['product']['id'] == $this->_tpl_vars['invoiceItem']['product_id']): ?> selected <?php endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
">
									<?php echo ((is_array($_tmp=$this->_tpl_vars['product']['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

									</option>
								<?php endforeach; endif; unset($_from); ?>
								</select>
							<?php endif; ?>
						</td>
						
						<?php unset($this->_sections['tax']);
$this->_sections['tax']['name'] = 'tax';
$this->_sections['tax']['start'] = (int)0;
$this->_sections['tax']['loop'] = is_array($_loop=$this->_tpl_vars['defaults']['tax_per_line_item']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tax']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['tax']['show'] = true;
$this->_sections['tax']['max'] = $this->_sections['tax']['loop'];
if ($this->_sections['tax']['start'] < 0)
    $this->_sections['tax']['start'] = max($this->_sections['tax']['step'] > 0 ? 0 : -1, $this->_sections['tax']['loop'] + $this->_sections['tax']['start']);
else
    $this->_sections['tax']['start'] = min($this->_sections['tax']['start'], $this->_sections['tax']['step'] > 0 ? $this->_sections['tax']['loop'] : $this->_sections['tax']['loop']-1);
if ($this->_sections['tax']['show']) {
    $this->_sections['tax']['total'] = min(ceil(($this->_sections['tax']['step'] > 0 ? $this->_sections['tax']['loop'] - $this->_sections['tax']['start'] : $this->_sections['tax']['start']+1)/abs($this->_sections['tax']['step'])), $this->_sections['tax']['max']);
    if ($this->_sections['tax']['total'] == 0)
        $this->_sections['tax']['show'] = false;
} else
    $this->_sections['tax']['total'] = 0;
if ($this->_sections['tax']['show']):

            for ($this->_sections['tax']['index'] = $this->_sections['tax']['start'], $this->_sections['tax']['iteration'] = 1;
                 $this->_sections['tax']['iteration'] <= $this->_sections['tax']['total'];
                 $this->_sections['tax']['index'] += $this->_sections['tax']['step'], $this->_sections['tax']['iteration']++):
$this->_sections['tax']['rownum'] = $this->_sections['tax']['iteration'];
$this->_sections['tax']['index_prev'] = $this->_sections['tax']['index'] - $this->_sections['tax']['step'];
$this->_sections['tax']['index_next'] = $this->_sections['tax']['index'] + $this->_sections['tax']['step'];
$this->_sections['tax']['first']      = ($this->_sections['tax']['iteration'] == 1);
$this->_sections['tax']['last']       = ($this->_sections['tax']['iteration'] == $this->_sections['tax']['total']);
?>
							<td>				                				                
								<select 
									id="tax_id[<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_sections['tax']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
]"
									name="tax_id[<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_sections['tax']['index'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
]"
								>
								<option value=""></option>
								<?php $this->assign('index', $this->_sections['tax']['index']); ?>
								<?php $_from = $this->_tpl_vars['taxes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tax']):
?>
									<option <?php if ($this->_tpl_vars['tax']['tax_id'] === $this->_tpl_vars['invoiceItem']['tax'][$this->_tpl_vars['index']]): ?> selected <?php endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['tax_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tax']['tax_description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
								<?php endforeach; endif; unset($_from); ?>
							</select>
							</td>
						<?php endfor; endif; ?>
						<td>
							<input
							AUTOCOMPLETE="OFF" 
							id="unit_price<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
							name="unit_price<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
							size="20" 
							value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['unit_price'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
" />
						</td>
						<td>
							<input
							AUTOCOMPLETE="OFF" 
							id="note_cost<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
							name="note_cost<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" 
							size="20" 
							value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['note_cost'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
" />
						</td>						
						
			        </tr>
		            	<tr colspan="6" class="note">
					<td>
					</td>
					<td colspan="4">
						<textarea input type="text" class="note-edit" name="description<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" id="description<?php echo ((is_array($_tmp=$this->_tpl_vars['line'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" rows="3" cols="3" wrap="nowrap"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['description'])) ? $this->_run_mod_handler('outhtml', true, $_tmp) : outhtml($_tmp)); ?>
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
						<td>
														<a 
								href="#" 
								class="add_line_item"
							>
								<img 
									src="./images/common/add.png"
									alt=""
								/>
								<?php echo $this->_tpl_vars['LANG']['add_new_row']; ?>

							</a>
					
						</td>
					</tr>
				 </table>
			</td>
		</tr>
	 <?php echo $this->_tpl_vars['customFields']['1']; ?>

	 <?php echo $this->_tpl_vars['customFields']['2']; ?>

	 <?php echo $this->_tpl_vars['customFields']['3']; ?>

	 <?php echo $this->_tpl_vars['customFields']['4']; ?>

			<tr>
				<td colspan="6" class="details_screen"><?php echo $this->_tpl_vars['LANG']['note']; ?>
:</td>
			</tr>
			<tr>
	             <td colspan="6" ><textarea input type="text" class="editor" name="note" rows="10" cols="70" wrap="nowrap"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['note'])) ? $this->_run_mod_handler('outhtml', true, $_tmp) : outhtml($_tmp)); ?>
</textarea></td>
			</tr>
			
<?php endif; ?>

	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['inv_pref']; ?>
</td><td>


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
	<!-- addition close table tag to close invoice itemised/consulting if it has a note -->
	</table>

<br />
<table class="buttons" align="center">
	<tr>
		<td>
			<button type="submit" class="invoice_save positive" name="submit" value="<?php echo $this->_tpl_vars['LANG']['save']; ?>
">
				<img class="button_img" src="./images/common/tick.png" alt="" /> 
				<?php echo $this->_tpl_vars['LANG']['save']; ?>

			</button>
			<?php if ($this->_tpl_vars['invoice']['id'] == null): ?> 
				<input type="hidden" name="action" value="insert" />
			<?php else: ?>
				<input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" />
				<input type="hidden" name="index_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['index_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" />
				
				<input type="hidden" name="action" value="edit" />
			<?php endif; ?>
            <?php if ($this->_tpl_vars['invoice']['type_id'] == 1): ?>
                <input id="quantity0" type="hidden" size="10" value="1.00" name="quantity0"/>
                <input id="line_item0" type="hidden" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItems']['0']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" name="line_item0"/>
            <?php endif; ?>
			<input type="hidden" name="type" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['type_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" />
			<input type="hidden" name="op" value="insert_preference" />
			<input type="hidden" id="max_items" name="max_items" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['lines'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" />
			<a href="./index.php?module=invoices&amp;view=manage" class="negative">
				<img src="./images/common/cross.png" alt="" />
				<?php echo $this->_tpl_vars['LANG']['cancel']; ?>

			</a>
		</td>
	</tr>
</table>
 	
</form>