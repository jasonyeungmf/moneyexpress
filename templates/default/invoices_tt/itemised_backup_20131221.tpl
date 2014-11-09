{*
/*
* Script: itemised.tpl
* 	 Itemised invoice template
*
* License:
*	 GPL v3 or above
*
* Website:
*	http://www.simpleinvoices.org
*/
*}

<form name="frmpost" action="index.php?module=invoices_tt&amp;view=save" method="post" onsubmit="return frmpost_Validator(this)">

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
    {if $currencys_tt == null}
            <tr>
                <td>
                     {$LANG.setup_add_currency_for_tt}&nbsp;  
                </td>
                <td>
                    <a href="./index.php?module=currencys_tt&amp;view=add" class="positive">
                        <img src="./images/common/cart_add.png" alt="" />
                        {$LANG.add_new_currency_for_tt}
                    </a>
                </td>
            </tr>

    {/if}
    {if $accounts == null}
            <tr>
                <td>
                     {$LANG.setup_add_account}&nbsp;  
                </td>
                <td>
                    <a href="./index.php?module=accounts&amp;view=add" class="positive">
                        <img src="./images/common/cart_add.png" alt="" />
                        {$LANG.add_new_account}
                    </a>
                </td>
            </tr>

    {/if}
    {if $trading_types == null}
            <tr>
                <td>
                     {$LANG.setup_add_trading_type}&nbsp;  
                </td>
                <td>
                    <a href="./index.php?module=trading_types&amp;view=add" class="positive">
                        <img src="./images/common/cart_add.png" alt="" />
                        {$LANG.add_new_trading_type}
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
<!--	{include file="$path/header.tpl"}	-->
{include file="$path/header.tpl"}

<table align="left" border="1">
	<tr>
		<td colspan="3">
		<table id="itemtable" border="1">
			<tbody id="itemtable-tbody">
			<tr>
				<td class="details_screen">{$LANG.quantity}</td>
				<td class="details_screen">{$LANG.product}</td>
				<td class="details_screen">{$LANG.unit_price}</td>
				<td class="details_screen">{$LANG.payable_amount}</td>
				<td class="details_screen">{$LANG.charge}</td>
				<td class="details_screen">{$LANG.total}</td>

			</tr>
			</tbody>
	
	       	<tbody class="line_item" id="row{$smarty.section.line.index|htmlsafe}">
				<tr>						
					<td>
						<input 
			                name="quantity" 
			                id="quantity"
							type="text"
			                value="0" 
							size="20"
			                AUTOCOMPLETE="OFF" 
			                class="validate[required] quantity_change"
			            />
					</td>							
						
					<td>
						{if $currencys_tt == null }
						<p><em>{$LANG.no_currencys_tt}</em></p>
						{else}
							<select name="products"	id="products" class="validate[required] product_change">
								<option value=""></option>
								{foreach from=$currencys_tt item=product}
								<option 
									{if $product.id == $smarty.get.product}
									    value="{$smarty.get.product}"
									    selected
									{else}
									    value="{$product.id|htmlsafe}"
									{/if}
								>{$product.code|htmlsafe}</option>
								{/foreach}
							</select>
						{/if}
					</td>						
						
					<td>
						<input 
							name="unit_price" 
							id="unit_price"
							type="text"
							value=""
							size="20"
							AUTOCOMPLETE="OFF"
                            class="validate[required] unit_price_change"
						/>
					</td>

					<td>
						<input
							name="payable_amount"
							id="payable_amount"
							value="0"
							size="20" 
							readonly="readonly"
						/>
					</td>

					<td>
						<input 
							name="charge" 
							id="charge"
							type="text"
							value="0"
							size="20"
							AUTOCOMPLETE="OFF"
                            class="validate[required]"
						/>
					</td>
						
					<td>
						<input
							name="total"
							id="total"
							value="0"
							size="20" 
							readonly="readonly"
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
		</table>
		</td>
	</tr>
		<!--	{$show_custom_field.1}
			{$show_custom_field.2}
			{$show_custom_field.3}
			{$show_custom_field.4}
			
				{showCustomFields categorieId="4" itemId=""}	-->
			
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
			<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_invoice_custom_fields" title="{$LANG.want_more_fields}"><img src="./images/common/help-small.png" alt="" /> {$LANG.want_more_fields}</a>
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
