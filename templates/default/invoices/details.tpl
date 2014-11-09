{*
/*
* Script: details.tpl
* 	 Invoice details template
*	 Modified for 'default_invoices' by Marcel van Dorp. Version 20090208
*	 if no invoice_id set, the date will be today, and the action will be 'insert' instead of 'edit'
*
* License:
*	 GPL v3 or above
*
* Website:
*	http://www.simpleinvoices.org
*/
*}
{* <h3>You are editing {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe}</h3> *}
<br />
<div id="gmail_loading" class="gmailLoader" style="float:right; display: none;">
        	<img src="images/common/gmail-loader.gif" alt="{$LANG.loading} ..." /> {$LANG.loading} ...
</div>
<form name="frmpost" action="index.php?module=invoices&amp;view=save" method="post">
	<table align="center">
	<tr>
		<td colspan="6" align="center"></td>
	</tr>
	
        <tr>
		<td class="details_screen">{$LANG.trading_type}</td>
		<td>
		{foreach from=$trading_types item=trading_type}
			{if $trading_type.id == $invoice.trading_type_id}
				<a>:{$trading_type.description|htmlsafe}</a>
			{/if}
		{/foreach}
		</td>		
	
		<td class="details_screen">{$LANG.trading_type_id}</td>
		<td>
		<input 
			style="font-weight:bold"
			readonly="readonly"
			id="trading_type_id" 
			name="trading_type_id" 
			size="10"
			value="{$invoice.trading_type_id}" 
		/>
		</td>
	</tr>
	<tr>

	</tr>
	<tr>
		<td class="details_screen">{$LANG.biller}</td><td>
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
<br />
{if $invoice.type_id == 2 || $invoice.type_id == 3 }

		<tr>
		<td colspan="6">
		
		<table id="itemtable">
			<tr>
				<td class="details_screen"></td>
				<td class="details_screen">{$LANG.quantity_short}</td>
				<td class="details_screen">{$LANG.product}</td>
				{section name=tax_header loop=$defaults.tax_per_line_item }
					<td class="details_screen">{$LANG.tax} {if $defaults.tax_per_line_item > 1}{$smarty.section.tax_header.index+1|htmlsafe}{/if} </td>
				{/section}
	        		<td class='details_screen'>{$LANG.unit_price}</td>
				<td class='details_screen'>{$LANG.note_cost}</td>
	        		<td>
					<a 
						href='#' 
						class="show-note" 
						onclick="javascript: $('.note').show();$('.show-note').hide();"
					>
						<img src="./images/common/page_white_add.png" title="{$LANG.show_details}" alt="" />
					</a>
					<a href='#' class="note" onclick="javascript: $('.note').hide();$('.show-note').show();">
						<img src="./images/common/page_white_delete.png" title="{$LANG.hide_details}" alt="" />
					</a>
				</td>
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
							<input type="hidden" id="delete{$line|htmlsafe}" name="delete{$line|htmlsafe}" size="3" />
							<input 
								AUTOCOMPLETE="OFF"
								type="text" 
								name='quantity{$line|htmlsafe}' 
								id='quantity{$line|htmlsafe}' 
								value='{$invoiceItem.quantity|siLocal_number_clean}' 
								size="20"
							/>
							<input type="hidden" name='line_item{$line|htmlsafe}' id='line_item{$line|htmlsafe}' value='{$invoiceItem.id|htmlsafe}' /> 
						</td>						
						
						<td>
																	                					                
					        {if $currencys_note == null }
								<p><em>{$LANG.no_currencys_note}</em></p>
							{else}								
								<select 
									name="products{$line|htmlsafe}"
									id="products{$line|htmlsafe}"
									rel="{$line|htmlsafe}"
									class="product_change"
								>
								{foreach from=$currencys_note item=product}
									<option {if $product.id == $invoiceItem.product_id} selected {/if} value="{$product.id|htmlsafe}">
									{$product.code|htmlsafe}
									</option>
								{/foreach}
								</select>
							{/if}
						</td>
						
						{section name=tax start=0 loop=$defaults.tax_per_line_item step=1}
							<td>				                				                
								<select 
									id="tax_id[{$line|htmlsafe}][{$smarty.section.tax.index|htmlsafe}]"
									name="tax_id[{$line|htmlsafe}][{$smarty.section.tax.index|htmlsafe}]"
								>
								<option value=""></option>
								{assign var="index" value=$smarty.section.tax.index}
								{foreach from=$taxes item=tax}
									<option {if $tax.tax_id === $invoiceItem.tax.$index} selected {/if} value="{$tax.tax_id|htmlsafe}">{$tax.tax_description|htmlsafe}</option>
								{/foreach}
							</select>
							</td>
						{/section}
						<td>
							<input
							AUTOCOMPLETE="OFF" 
							id="unit_price{$line|htmlsafe}" 
							name="unit_price{$line|htmlsafe}" 
							size="20" 
							value="{$invoiceItem.unit_price|siLocal_number_clean}" />
						</td>
						<td>
							<input
							AUTOCOMPLETE="OFF" 
							id="note_cost{$line|htmlsafe}" 
							name="note_cost{$line|htmlsafe}" 
							size="20" 
							value="{$invoiceItem.note_cost|siLocal_number_clean}" />
						</td>						
						
			        </tr>
		            	<tr colspan="6" class="note">
					<td>
					</td>
					<td colspan="4">
						<textarea input type="text" class="note-edit" name="description{$line|htmlsafe}" id="description{$line|htmlsafe}" rows="3" cols="3" wrap="nowrap">{$invoiceItem.description|outhtml}</textarea>
									
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
						<td>
							{* onclick="add_line_item();" *}
							<a 
								href="#" 
								class="add_line_item"
							>
								<img 
									src="./images/common/add.png"
									alt=""
								/>
								{$LANG.add_new_row}
							</a>
					
						</td>
					</tr>
				 </table>
			</td>
		</tr>
	 {$customFields.1}
	 {$customFields.2}
	 {$customFields.3}
	 {$customFields.4}
			<tr>
				<td colspan="6" class="details_screen">{$LANG.note}:</td>
			</tr>
			<tr>
	             <td colspan="6" ><textarea input type="text" class="editor" name="note" rows="10" cols="70" wrap="nowrap">{$invoice.note|outhtml}</textarea></td>
			</tr>
			
{/if}

	<tr>
		<td class="details_screen">{$LANG.inv_pref}</td><td>


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
	<!-- addition close table tag to close invoice itemised/consulting if it has a note -->
	</table>

<br />
<table class="buttons" align="center">
	<tr>
		<td>
			<button type="submit" class="invoice_save positive" name="submit" value="{$LANG.save}">
				<img class="button_img" src="./images/common/tick.png" alt="" /> 
				{$LANG.save}
			</button>
			{if $invoice.id == null} 
				<input type="hidden" name="action" value="insert" />
			{else}
				<input type="hidden" name="id" value="{$invoice.id|htmlsafe}" />
				<input type="hidden" name="index_id" value="{$invoice.index_id|htmlsafe}" />
				
				<input type="hidden" name="action" value="edit" />
			{/if}
            {if $invoice.type_id == 1 }
                <input id="quantity0" type="hidden" size="10" value="1.00" name="quantity0"/>
                <input id="line_item0" type="hidden" value="{$invoiceItems.0.id|htmlsafe}" name="line_item0"/>
            {/if}
			<input type="hidden" name="type" value="{$invoice.type_id|htmlsafe}" />
			<input type="hidden" name="op" value="insert_preference" />
			<input type="hidden" id="max_items" name="max_items" value="{$lines|htmlsafe}" />
			<a href="./index.php?module=invoices&amp;view=manage" class="negative">
				<img src="./images/common/cross.png" alt="" />
				{$LANG.cancel}
			</a>
		</td>
	</tr>
</table>
 	
</form>
