<br/>
<div id="gmail_loading" class="gmailLoader" style="float:right; display: none;">
	<img src="images/common/gmail-loader.gif" alt="{$LANG.loading} ..." /> {$LANG.loading} ...
</div>
<form name="frmpost" action="index.php?module=invoices&amp;view=save" method="post" class="quantity_change">
<table align="center" border="0" width="100%">
	
        <tr>
		<td class="details_screen">{$LANG.trading_type}</td>
		<td>
			{if $trading_types == null }
				<p><em>{$LANG.no_trading_types}</em></p>
			{else}	
				<select name="trading_type_id" id="trading_type_id" class="trading_type_change">	
				{foreach from=$trading_types item=trading_type}
					<option {if $trading_type.id == $invoice.trading_type_id} selected {/if} value="{$trading_type.id|htmlsafe}">{$trading_type.description|htmlsafe}</option>
				{/foreach}
				</select>
			{/if}
		</td>		
		<td class="details_screen">{$LANG.summary}</td>
	</tr>
	
	<tr>
		<td class="details_screen">{$LANG.biller}</td>
		<td>
			{if $billers == null }
				<p><em>{$LANG.no_billers}</em></p>
			{else}
				<select name="biller_id">
				{foreach from=$billers item=biller}
					<option {if $biller.id == $invoice.biller_id} selected {/if} value="{$biller.id|htmlsafe}">{$biller.name|htmlsafe}</option>
				{/foreach}
				</select>
			{/if}
		</td>
		<td class="details_screen">{$LANG.index_id}</td>
		<td> {$invoice.index_id|htmlsafe} </td>		
	</tr>
	
	<tr>
		<td class="details_screen">{$LANG.customer}</td>
		<td>
			{if $customers == null}
	        	<p><em>{$LANG.no_customers}</em></p>
			{else}
			<select name="customer_id">
			{foreach from=$customers item=customer}
				<option {if $customer.customer_no == $invoice.customer_id} selected {/if} value="{$customer.customer_no|htmlsafe}">{$customer.customer_no|htmlsafe}-{$customer.name|htmlsafe}</option>
			{/foreach}
			</select>
			{/if}
		</td>
	        <td class="details_screen">{$LANG.date_time}</td>
        	<td><input type="text" size="20" class="" name="date" id="date" value="{$invoice.date|htmlsafe}" readonly="readonly"/></td>		
	</tr>
	
	<tr><td><br/></td></tr>

	<tr>
	<td colspan="7">
		<table id="itemtable" width="100%" border="0">
			<tr>
				<td class="details_screen"></td>
				<td class="details_screen">{$LANG.currency}</td>				
				<td class="details_screen">{$LANG.quantity}</td>
	        		<td class='details_screen'>{$LANG.unit_price}</td>
				<td class='details_screen'>{$LANG.subtotal}</td>
				<td class='details_screen'>{$LANG.charge}</td>
				<td class='details_screen'>{$LANG.total}</td>
				<td class='details_screen'>{$LANG.note_cost}</td>
	        		
		    	</tr>
	
			{foreach key=line from=$invoiceItems item=invoiceItem name=line_item_number}
				<tbody class="line_item" id="row{$line|htmlsafe}">
			        	<tr>
						<td>
						{if $line != "0"}
							<a 
								id="trash_link_edit{$line|htmlsafe}"
								class="trash_link_edit"
								title="{$LANG.delete_line_item}" 
								href="#" 
								style="display: inline;"
								rel="{$line|htmlsafe}"
							>
								<img id="delete_image{$line|htmlsafe}" src="./images/common/delete_item.png" alt="" />
							</a>
						{/if}
						{if $line == "0"}
							<a 
								id="trash_link_edit{$line|htmlsafe}"
								class="trash_link_edit"
								title="{$LANG.delete_line_item}"
								href="#"
								style="display: inline;"
								rel="{$line|htmlsafe}"
							>
								<img id="delete_image{$line|htmlsafe}" src="./images/common/blank.gif" alt="" />
							</a>
						{/if}
						</td>
						
						<td>																	                					                
					        {if $currencys_note == null }
								<p><em>{$LANG.no_currencys_note}</em></p>
							{else}								
								<select 
									name="currencys{$line|htmlsafe}"
									id="currencys{$line|htmlsafe}"
									rel="{$line|htmlsafe}"
									class="validate[required] currency_change"
								>
								{foreach from=$currencys_note item=currency}
									<option {if $currency.id == $invoiceItem.currency_id} selected {/if} value="{$currency.id|htmlsafe}">
									{$currency.code|htmlsafe}
									</option>
								{/foreach}
								</select>
							{/if}						 
						</td>						
						
						<td>													
							<input type="hidden" id="delete{$line|htmlsafe}" name="delete{$line|htmlsafe}" size="3" value=""/>
							<input 
								AUTOCOMPLETE="OFF"
								name='quantity{$line|htmlsafe}' 
								id='quantity{$line|htmlsafe}' 
								size="20"
								rel="{$line|htmlsafe}"
								class="validate[required] quantity_change"
								value='{$invoiceItem.quantity|siLocal_number_clean}' 
							/>
							<input type="hidden" name='line_item{$line|htmlsafe}' id='line_item{$line|htmlsafe}' value='{$invoiceItem.id|htmlsafe}'/>	
						</td>						
						
						<td>
							<input
								AUTOCOMPLETE="OFF" 
								name="unit_price{$line|htmlsafe}"
								id="unit_price{$line|htmlsafe}" 
								size="20"
								rel="{$line|htmlsafe}"
								class="validate[required] unit_price_change"
								value="{$invoiceItem.unit_price|siLocal_number_clean}"
							/>
						</td>
						
						<td>
							<input
								AUTOCOMPLETE="OFF"
								readonly="readonly" 
								id="subtotal{$line|htmlsafe}" 
								name="subtotal{$line|htmlsafe}" 
								size="20"
								rel="{$line|htmlsafe}"
								value="{$invoiceItem.subtotal|siLocal_number_clean}"
							/>
						</td>						

						<td>
							<input
								AUTOCOMPLETE="OFF" 
								name="charge{$line|htmlsafe}"
								id="charge{$line|htmlsafe}" 
								size="20"
								rel="{$line|htmlsafe}"
								class="validate[required] charge_change"
								value="{$invoiceItem.charge|siLocal_number_clean}"
							/>
						</td>						

						<td>
							<input
								AUTOCOMPLETE="OFF"
								readonly="readonly" 
								id="total{$line|htmlsafe}" 
								name="total{$line|htmlsafe}" 
								size="20"
								rel="{$line|htmlsafe}"
								value="{$invoiceItem.total|siLocal_number_clean}"
							/>
						</td>						
						
						<td>
							<input
								AUTOCOMPLETE="OFF" 
								id="note_cost{$line|htmlsafe}" 
								name="note_cost{$line|htmlsafe}" 
								size="20"
								rel="{$line|htmlsafe}"
								value="{$invoiceItem.note_cost|siLocal_number_clean}"
							/>
						</td>						
						
			        </tr>
				
		            	<tr colspan="3" class="note">
					<td></td>
					<td colspan="3">
						<textarea input type="text" class="note-edit" name="description{$line|htmlsafe}" id="description{$line|htmlsafe}" rows="1" cols="50" wrap="nowrap">{$invoiceItem.description|outhtml}</textarea>
					</td>
				</tr>
		</tbody>
			{/foreach}
		</table>
		</td>
	</tr>
		<tr>
			<td>
				<table class="buttons" align="left">
					<tr>
						<td><a	href="#" class="add_line_item"><img src="./images/common/add.png" alt="" />{$LANG.add_new_row}</a></td>
						<td>
						<a href='#' class="show-note" onclick="javascript: $('.note').show();$('.show-note').hide();"><img src="./images/common/page_white_add.png" title="{$LANG.show_description}" alt=""/>{$LANG.show_description}</a>
						<a href='#' class="note" onclick="javascript: $('.note').hide();$('.show-note').show();"><img src="./images/common/page_white_delete.png" title="{$LANG.hide_description}" alt=""/>{$LANG.hide_description}</a>
						</td>							
					</tr>
				 </table>
			</td>
		</tr>

		<tr>
			<td class="details_screen">{$LANG.invoice_total}</td>
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
	        	<td class="details_screen">{$LANG.note}:</td>
			<td><textarea input type="text" name="note" rows="2" cols="34" wrap="nowrap">{$invoice.note|outhtml}</textarea></td>
		</tr>

		<tr>
			<td class="details_screen">{$LANG.inv_pref}</td>
			<td>
			{if $preferences == null }
				<p><em>{$LANG.no_preferences}</em></p>
			{else}
				<select name="preference_id">
				{foreach from=$preferences item=preference}
					<option {if $preference.pref_id == $invoice.preference_id} selected {/if} value="{$preference.pref_id|htmlsafe}">{$preference.pref_description|htmlsafe}</option>
				{/foreach}
				</select>
			{/if}
			</td>
		</tr>
</table>
</table>

<table class="buttons" align="center" border="0">
<tr>
<td>
	<button type="submit" class="invoice_save positive" name="submit" value="{$LANG.save}"><img class="button_img" src="./images/common/tick.png" alt="" />{$LANG.save}</button>
	{if $invoice.id == null} 
		<input type="hidden" name="action" value="insert" />
	{else}
		<input type="hidden" name="id" value="{$invoice.id|htmlsafe}" />
		<input type="hidden" name="index_id" value="{$invoice.index_id|htmlsafe}" />
		<input type="hidden" name="action" value="edit" />
	{/if}
		<input type="hidden" name="op" value="insert_preference" />
		<input type="hidden" id="max_items" name="max_items" value="{$lines|htmlsafe}" />
		<a href="./index.php?module=invoices&amp;view=manage" class="negative"><img src="./images/common/cross.png" alt="" />{$LANG.cancel}</a>
</td>
</tr>
</table>
 	
</form>