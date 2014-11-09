<body>
<form 
	name="frmpost" 
	action="index.php?module=invoices_tt&amp;view=save" 
	method="post" 
	onsubmit="return frmpost_Validator(this)"
>

<div id="gmail_loading" class="gmailLoader" style="float:right; display: none;">
    <img src="images/common/gmail-loader.gif" alt="{$LANG.loading} ..." /> {$LANG.loading} ...
</div>

{if $first_run_wizard == true}
    <br />
    <br />
    <span class="welcome">{$LANG.before_starting}</span>
    <br />
    <br />
    <br />

<table class="buttons" align="center">
{if $billers == null}
    <tr>
        <td>{$LANG.setup_as_biller}&nbsp;</td>
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
        <td>{$LANG.setup_add_customer}&nbsp;</td>
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
        <td>{$LANG.setup_add_currency_for_tt}&nbsp;</td>
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
        <td>{$LANG.setup_add_account}&nbsp;</td>
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
		<td>{$LANG.setup_add_trading_type}&nbsp;</td>
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
		<td>{$LANG.setup_add_inv_pref}&nbsp;</td>
		<td>
			</a>
			<a href="./index.php?module=preferences&amp;view=add" class="positive">
				<img src="./images/common/page_white_edit.png" alt="" />
				{$LANG.add_new_preference}
			</a>
		</td>
	</tr>
{/if}                
</table>
<br />
{else}

<br />
<span class="welcome">
    <a href="index.php?module=invoices_tt&amp;view=add">
    	<img class="action" src="./images/common/edit.png"/>&nbsp;{$LANG.quantity_style}
    </a>
    <a class="cluetip" href="#" rel="index.php?module=documentation&amp;view=view&amp;page=help_quantity_types" title="{$LANG.quantity_types}">
		<img class="action" src="./images/common/help-small.png" alt="" />
	</a>&nbsp;&nbsp;

    <a href="index.php?module=invoices_tt&amp;view=add2">
    	<img class="action" src="./images/common/page_white_edit.png"/>&nbsp;{$LANG.payable_amount_style}
    </a>
	<a class="cluetip" href="#" rel="index.php?module=documentation&amp;view=view&amp;page=help_payable_amount_types" title="{$LANG.payable_amount_type}">
		<img class="action" src="./images/common/help-small.png" alt="" />
	</a>
</span>
<br />
<br />
<br />

<table align="center" border="0">
  	<tr>
      	<td>{$LANG.index_id}</td>    
        <td>
	        <input 
	        	name="index_id" 
	        	id="index_id" 
	        	type="text" 
	        	value="{$smarty.post.index_id|htmlsafe}" 
	        	size="20"
	        />
        </td>

        <td>{$LANG.internal_id}</td>
        <td></td>

        <td>{$LANG.date_time}</td>
        <td wrap="nowrap">
            <input 
            name="date" 
            id="date1"
            type="text" 
            value="{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}"
            size="20"
            class="validate[required,custom[date],length[0,19]]"
            />   
        </td>
    </tr>
		       
    <tr>
        <td>{$LANG.trading_type}</td>
        <td>
            {if $trading_types == null }
                <p><em>{$LANG.no_trading_types}</em></p>
            {else}
	            <select name="trading_type_id" id="trading_type_id" tabIndex="1">
		            {foreach from=$trading_types item=trading_type}
			            {if $trading_type.id == 3 || $trading_type.id ==4} 
				            <option 
				            	{if $trading_type.id == 4} selected {/if}
				            	value="{$trading_type.id|htmlsafe}"
				            >
				            	{$trading_type.description|htmlsafe}
				            </option>
			            {/if}	
		            {/foreach}
	            </select>
            {/if}
        </td>

        <td>{$LANG.biller}</td>
        <td>
           	{if $billers == null }
                <p><em>{$LANG.no_billers}</em></p>
            {else}
	            <select name="biller_id" tabIndex="2">
		            {foreach from=$billers item=biller}
			            <option 
				            {if $biller.id == $defaults.biller} selected {/if} 
				            value="{$biller.id|htmlsafe}"
			            >
			            	{$biller.name|htmlsafe}
			            </option>
		            {/foreach}
	            </select>
            {/if}
        </td>

        <td>{$LANG.payment_type}</td>
        <td>
			{if $payment_types == null }
            	<em>{$LANG.no_payment_types}</em>
            {else}
	            <select name="payment_type_id" tabIndex="3">
		            {foreach from=$payment_types item=payment_type}
			            <option 
				            {if $payment_type.pt_id == $defaults.payment_type} selected {/if} 
				            value="{$payment_type.pt_id|htmlsafe}"
				        >
				            {$payment_type.pt_description|htmlsafe}
			            </option>
		            {/foreach}
	            </select>
            {/if}
		</td>
    </tr>

    <tr>
        <td>{$LANG.customer_no}</td>
     <!-- <td>
        {if $customers == null }
            <em>{$LANG.no_customers}</em>
        {else}
	        <select name="customer_id" id="customer_id" class="validate[required] customer_change">
	        	<option value=""></option>
		        {foreach from=$customers item=customer}
		        <option {if $customer.customer_no == $defaultCustomerID} selected {/if} 
		        value="{$customer.customer_no|htmlsafe}">
		        {$customer.customer_no|htmlsafe}-{$customer.name|htmlsafe}
		        </option>
		        {/foreach}
	        </select>
        {/if}
        </td>	-->
        <td>
			<input 
				name="customer_id"
				id="customer_id"
				type="text"
				value="{$account.customer_no|htmlsafe}"
				size="20"
			    AUTOCOMPLETE="OFF"
			    readonly="readonly"
				class="validate[required]" 
			/>
		</td>

        <td>{$LANG.account_id}</td>
        <td>
			<input 
				name="account_id"
				id="account_id"
				type="text"
				value="{$account.serial_no|htmlsafe}"
				size="20"
			    AUTOCOMPLETE="OFF"
				class="validate[required] account_change" 
				tabIndex="4"
			/>
		</td>

		<td>{$LANG.quantity}</td>
		<td>
			<input 
			    name="quantity" 
			    id="quantity"
				type="text"
			    value="{$smarty.post.quantity|htmlsafe}" 
				size="20"
			    AUTOCOMPLETE="OFF"
			    class="validate[required] tt_quantity_change"
			    tabIndex="5"
			/>
		</td>
    </tr>

    <tr>
    	<td>{$LANG.customer_name}</td>
    	<td colspan="3">
			<input 
				name="customer_name"
				id="customer_name"
				type="text"
				value="{$customer_detail|htmlsafe}"
				size="78"
			    AUTOCOMPLETE="OFF"
			    readonly="readonly"
				class="validate[required]" 
			/>
		</td>

		<td>{$LANG.unit_price}</td>
		<td>
			<input 
				name="unit_price" 
				id="unit_price"
				type="text"
				value="{$smarty.post.unit_price|htmlsafe}"
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

    	<td>{$LANG.charge}</td>
    	<td>
			<input 
				name="charge" 
				id="charge"
				type="text"
				value="{$smarty.post.charge|htmlsafe}"
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

		<td>{$LANG.total}</td>
		<td>
			<input
				name="total"
				id="total"
				value="{$smarty.post.total|htmlsafe}"
				size="20" 
				readonly="readonly"
			/>
		</td>
    </tr>

    <tr>
    	<td>{$LANG.payee}</td>
    	<td colspan="5">
			<input
				name="payee"
				id="payee"
				value="{$account.payee|htmlsafe}"
				size="123"
			    readonly="readonly"
			/>
		</td>
    </tr>

    <tr>
    	<td>{$LANG.bank}</td>
    	<td colspan="5">
			<input
				name="bank"
				id="bank"
				value="{$account.bank|htmlsafe}"
				size="123"
			    readonly="readonly"
			/>
		</td>
    </tr>

    <tr>
    	<td>{$LANG.account_no}</td>
    	<td colspan="5">
			<input
				name="account_no"
				id="account_no"
				value="{$account.account_no|htmlsafe}"
				size="123"
			    readonly="readonly"
			/>
		</td>
    </tr>

    <tr>
    	<td>{$LANG.product}</br>{$LANG.calculation_types}</br>{$LANG.payable_amount}</td>
    	<td>
    		{if $currencys_tt == null }
				<p><em>{$LANG.no_currencys_tt}</em></p>
			{else}
				<select name="product_id"	id="product_id" class="validate[required]" tabIndex="8">
					{foreach from=$currencys_tt item=product}
						<option value="{$product.id|htmlsafe}">{$product.code|htmlsafe}</option>
					{/foreach}
				</select>
			{/if}

			{if $calculation_types == null }
				<p><em>{$LANG.no_calculation_types}</em></p>
			{else}
				<select name="calculation_type_id" id="calculation_type_id" class="validate[required] calculation_type_change" tabIndex="9">
					{foreach from=$calculation_types item=calculation_type}
						<option	value="{$calculation_type.id|htmlsafe}">{$calculation_type.description|htmlsafe}</option>
					{/foreach}
				</select>
			{/if}

			<input
				name="payable_amount"
				id="payable_amount"
				value="{$smarty.post.payable_amount|htmlsafe}"
				size="20" 
				readonly="readonly"
			/>
		</td>

		<td>{$LANG.spell_number}</td>
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
			>{$smarty.post.spell_number|htmlsafe}</textarea>
		</td>
    </tr>

    <tr>	
	    <td colspan="6">{$LANG.note}</td>
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
			>{$smarty.post.note|htmlsafe}</textarea>
		</td>
	</tr>

	<tr>
		<td>{$LANG.inv_pref}</td>
		<td colspan="5">
		{if $preferences == null }
			<p><em>{$LANG.no_preferences}</em></p>
		{else}
			<select name="preference_id" tabIndex="11">
				{foreach from=$preferences item=preference}
					<option {if $preference.pref_id == $defaults.preference_id} selected {/if} 
						value="{$preference.pref_id|htmlsafe}"
					>
						{$preference.pref_description|htmlsafe}
					</option>
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
			
<table class="buttons" align="center" border="0">
		<tr>
			<td>
				<button type="submit" class="positive" name="submit" value="{$LANG.save}" tabIndex="12">
		            <img class="button_img" src="./images/common/tick.png" alt="" /> 
		            {$LANG.save}
		        </button>
			</td>

			<td>
	            <a href="./index.php?module=invoices_tt&amp;view=manage" class="negative" tabIndex="13">
	                <img src="./images/common/cross.png" alt="" />
	                {$LANG.cancel}
	            </a>
	    
	        </td>
	    </tr>
	</table>
</table>

<input type="hidden" name="action" value="insert" />

</form>
</body>
{/if}