<form name="frmpost" action="index.php?module=invoices&amp;view=save" method="post" onsubmit="return frmpost_Validator(this)">

<div id="gmail_loading" class="gmailLoader" style="float:right; display: none;">
        	<img src="images/common/gmail-loader.gif" alt="{$LANG.loading} ..." /> {$LANG.loading} ...
</div>


{if $first_run_wizard == true}

        <br />
        <br />
        <span class="welcome">
            {$LANG.before_starting}
        </span>
        <br />
        <br />
        <br />
        <table class="buttons" align="center">
    {if $billers == null}
        <tr>
                <td>
                     {$LANG.setup_as_biller}&nbsp;  
                </td>
                <td>
                    <a href="./index.php?module=billers&amp;view=add" class="positive">
                        <img src="./images/common/user_add.png" alt="" />
                        {$LANG.add_new_biller}
                    </a>
                </td>
        </tr>
    {/if}
    {if $customers == null}
            <tr>
                <td>
                     {$LANG.setup_add_customer}&nbsp;  
                </td>
                <td>
                    <a href="./index.php?module=customers&amp;view=add" class="positive">
                        <img src="./images/common/vcard_add.png" alt="" />
                        {$LANG.customer_add}
                    </a>
                </td>
            </tr>
    {/if}
    {if $products == null}
            <tr>
                <td>
                     {$LANG.setup_add_products}&nbsp;  
                </td>
                <td>
                    <a href="./index.php?module=products&amp;view=add" class="positive">
                        <img src="./images/common/cart_add.png" alt="" />
                        {$LANG.add_new_product}
                    </a>
                </td>
            </tr>

    {/if}
    {if $taxes == null}
            <tr>
                <td>
                     {$LANG.setup_add_taxrate}&nbsp;  
                </td>
                <td>
                    <a href="index.php?module=tax_rates&amp;view=add" class="positive">
                        <img src="./images/common/money_delete.png" alt="" />
                        {$LANG.add_new_tax_rate}
                    </a>
                </td>
            </tr>

    {/if}
    {if $preferences == null}
            <tr>
                <td>
                     {$LANG.setup_add_inv_pref}&nbsp;  
                </td>
                <td>
                    </a>
                    <a href="./index.php?module=preferences&amp;view=add" class="positive">
                        <img src="./images/common/page_white_edit.png" alt="" />
                        {$LANG.add_new_preference}
                    </a>
                </td>
            </tr>


    {/if}
                </td>
            </tr>
            </table>
        <br />

{else}
{include file="$path/header.tpl" }
<br/>
<table align="left" border="1">
	<tr>
		<td colspan="3">
		<table id="itemtable" border="1">
			<tbody id="itemtable-tbody">
			<tr>
				<td class="details_screen"></td>
				<td class="details_screen">{$LANG.quantity}</td>
				<td class="details_screen">{$LANG.product}</td>
				<td class="details_screen">{$LANG.unit_price}</td>
				<td class="details_screen">{$LANG.charge}</td>
				<td class="details_screen">{$LANG.total}</td>
				<td class="details_screen">{$LANG.note_cost}</td>
				
			</tr>
			</tbody>
	
	        {section name=line start=0 loop=$dynamic_line_items step=1}
		{ assign var="lineNumber" value=$smarty.section.line.index } 
				<tbody class="line_item" id="row{$smarty.section.line.index|htmlsafe}">
					<tr>
						<td>
							{if $smarty.section.line.index == "0"}
							<a 
								href="#" 
								class="trash_link"
								id="trash_link{$smarty.section.line.index|htmlsafe}"
								title="{$LANG.cannot_delete_first_row|htmlsafe}"
							>
								<img 
									id="trash_image{$smarty.section.line.index|htmlsafe}"
									src="./images/common/blank.gif"
									height="16px"
									width="16px"
									title="{$LANG.cannot_delete_first_row}"
									alt=""
								 />
							</a>
							{/if}
							{if $smarty.section.line.index != 0}
							{* can't delete line 0 *}
							<!-- onclick="delete_row({$smarty.section.line.index|htmlsafe});" --> 
							<a 
								id="trash_link{$smarty.section.line.index|htmlsafe}"
								class="trash_link"
								title="{$LANG.delete_row}" 
								rel="{$smarty.section.line.index|htmlsafe}"
								href="#" 
								style="display: inline;"
							>
								<img src="./images/common/delete_item.png" alt="" />
							</a>
							{/if}
						</td>
						
						<td>
							<input 
			                                AUTOCOMPLETE="OFF"
							type="text" 
			                                class="{if $smarty.section.line.index == "0"}validate[required]{/if} quantity_change"
			                                name="quantity{$smarty.section.line.index|htmlsafe}" 
			                                id="quantity{$smarty.section.line.index|htmlsafe}" 
							size="20" 
							rel="{$smarty.section.line.index|htmlsafe}"
			                                {if $smarty.get.quantity.$lineNumber}
			                                	value="{$smarty.get.quantity.$lineNumber}"
			                                {/if}
			                                />
						</td>							
						
						<td>
					{if $currencys_note == null }
					<p><em>{$LANG.no_currencys_note}</em></p>
					{else}
						<select 
							id="products{$smarty.section.line.index|htmlsafe}"
							name="products{$smarty.section.line.index|htmlsafe}"
							rel="{$smarty.section.line.index|htmlsafe}"
							class="{if $smarty.section.line.index == "0"}validate[required]{/if} product_change"						
                        			>
							<option value=""></option>
							{foreach from=$currencys_note item=product}
							<option 
								{if $product.id == $smarty.get.product.$lineNumber}
								    value="{$smarty.get.product.$lineNumber}"
								    selected
								{else}
								    value="{$product.id|htmlsafe}"
								{/if}
							>
								{$product.code|htmlsafe}
							</option>
						{/foreach}
						</select>
					{/if}
						</td>
						
						<td>
							<input 
								id="unit_price{$smarty.section.line.index|htmlsafe}" 
								name="unit_price{$smarty.section.line.index|htmlsafe}"
								rel="{$smarty.section.line.index|htmlsafe}" 
								size="20"
								AUTOCOMPLETE="OFF"
								{if $smarty.get.unit_price.$lineNumber}
								    value="{$smarty.get.unit_price.$lineNumber}"
								{else}
								   value=""
								{/if}
                                				class="{if $smarty.section.line.index == "0"}validate[required]{/if} unit_price_change"
							/>
						</td>
						<td>
							<input 
			                                AUTOCOMPLETE="OFF"
							type="text" 
			                                class="{if $smarty.section.line.index == "0"}validate[required]{/if} charge_change"
			                                name="charge{$smarty.section.line.index|htmlsafe}" 
			                                id="charge{$smarty.section.line.index|htmlsafe}" 
							size="20" 
							rel="{$smarty.section.line.index|htmlsafe}"
			                                {if $smarty.get.charge.$lineNumber}
			                                	value="{$smarty.get.charge.$lineNumber}"
			                                {/if}
			                                />
						</td>									
						<td>
							<input 
								readonly="readonly"
								id="total{$smarty.section.line.index|htmlsafe}" 
								name="total{$smarty.section.line.index|htmlsafe}"
								rel="{$smarty.section.line.index|htmlsafe}" 
								size="20"
								AUTOCOMPLETE="OFF"
								{if $smarty.get.total.$lineNumber}
								    value="{$smarty.get.total.$lineNumber}"
								{else}
								   value=""
								{/if}
								{if $smarty.section.line.index == "0"} class="validate[required]" {/if}
							/>
						</td>
						
						<td>
							<input 
								{* readonly="readonly" *}
								id="note_cost{$smarty.section.line.index|htmlsafe}" 
								name="note_cost{$smarty.section.line.index|htmlsafe}"
								rel="{$smarty.section.line.index|htmlsafe}" 
								size="20"
								AUTOCOMPLETE="OFF"
								{if $smarty.get.note_cost.$lineNumber}
									value="{$smarty.get.note_cost.$lineNumber}"
								{else}
									value=""
								{/if}
						                class="{if $smarty.section.line.index == "0"}validate[required]{/if} trading_type_change product_change"
							/>
						</td>
														
					</tr>
							
					<tr class="note">
							<td>
							</td>
							<td colspan="4">
								<textarea input type="text" class="note" name="description{$smarty.section.line.index|htmlsafe}" id="description{$smarty.section.line.index|htmlsafe}" rows="3" cols=3 WRAP=nowrap></textarea>
								
								</td>
					</tr>
				</tbody>
	        {/section}
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
					<td>
					<a href='#' class="show-note" onclick="javascript: $('.note').show();$('.show-note').hide();">
						<img src="./images/common/page_white_add.png" title="{$LANG.show_details}" alt="" />{$LANG.show_details}</a>
					<a href='#' class="note" onclick="javascript: $('.note').hide();$('.show-note').show();">
						<img src="./images/common/page_white_delete.png" title="{$LANG.hide_details}" alt="" />{$LANG.hide_details}</a>
					</td>
					
				</tr>
		 </table>
		</td>
	</tr>
			{$show_custom_field.1}
			{$show_custom_field.2}
			{$show_custom_field.3}
			{$show_custom_field.4}
			{*
				{showCustomFields categorieId="4" itemId=""}
			*}
	<tr>
		<td align="right" class="details_screen">{$LANG.invoice_total}************************************************** 
		<input 
		readonly="readonly"
		id="invoice_total" 
		name="invoice_total" 
		size="20"
		AUTOCOMPLETE="OFF"
		class="validate[required]"
		{if $smarty.get.invoice_total}
			 value="{$smarty.get.invoice_total}"
		{else}
			 value=""
		{/if}
		/>
		</td>		
	</tr>
	<tr>
	        <td colspan="1" class="details_screen">{$LANG.notes}</td>
	</tr>
	
	<tr>
		<td colspan="4">
			<textarea input type="text" class="editor" name="note" rows="5" cols="50" wrap="nowrap">
				{$smarty.get.note}
			</textarea>
		</td>
	</tr>
	</tr>
	
	<tr>
	<td class="details_screen">{$LANG.inv_pref}
	&nbsp; 
	&nbsp; 
	{if $preferences == null }
		<p><em>{$LANG.no_preferences}</em></p>
	{else}
		<select name="preference_id">
		{foreach from=$preferences item=preference}
			<option {if $preference.pref_id == $defaults.preference} selected {/if} value="{$preference.pref_id|htmlsafe}">{$preference.pref_description|htmlsafe}</option>
		{/foreach}
		</select>
	{/if}
	
	</td>
	</tr>	
	<tr>
		<td class=""> 
			<a class="cluetip" href="#" rel="index.php?module=documentation&amp;view=view&amp;page=help_invoice_custom_fields" title="{$LANG.want_more_fields}"><img src="./images/common/help-small.png" alt="" /> {$LANG.want_more_fields}</a>
		</td>
	</tr>

</table>
</td>
</tr>
<tr>
<td>
<table class="buttons" align="center" border="1">
	<tr>
		<td>
		<button type="submit" class="invoice_save positive" name="submit" value="{$LANG.save}">
                <img class="button_img" src="./images/common/tick.png" alt="" /> 
                {$LANG.save}
            </button>
            
		</td>
		<td>
		<input type="hidden" id="max_items" name="max_items" value="{$smarty.section.line.index|htmlsafe}" />
        	<input type="hidden" name="type" value="2" />
        	
            <a href="./index.php?module=invoices&amp;view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                {$LANG.cancel}
            </a>
    
        </td>
    </tr>
</table>
</table>

</form>
{/if}
