<br />
<div id="gmail_loading" class="gmailLoader" style="float:right; display: none;">
        	<img src="images/common/gmail-loader.gif" alt="{$LANG.loading} ..." /> {$LANG.loading} ...
</div>

<form name="frmpost" action="index.php?module=invoices_tt&amp;view=save" method="post">
<table align="center" border="0">
  	<tr>
      	<td>{$LANG.index_id}</td>    
        <td>
        	<input 
	        	name="index_id" 
	        	id="index_id_edit"
	        	type="text"
	        	value="{$invoice.index_id|htmlsafe}"
	        	size="25"
	        	readonly="readonly"
	        />
        </td>

        <td>{$LANG.internal_id}</td>
        <td></td>

        <td>{$LANG.date_time}</td>
        <td>
        	<input 
	        	name="date" 
	        	id="date"
	        	type="text"
	        	value="{$invoice.date|htmlsafe}"
	        	size="20"
	        	readonly="readonly"
	        />
        </td>
    </tr>
		       
    <tr>
        <td>{$LANG.trading_type}</td>
        <td>
            {if $trading_types == null }
                <p><em>{$LANG.no_trading_types}</em></p>
            {else}
	            <select name="trading_type_id" id="trading_type_id" class="tt_edit_trading_type_change" tabIndex="1">
		            {foreach from=$trading_types item=trading_type}			            
				            <option 
				            	{if $trading_type.id == $invoice.trading_type_id} selected {/if}
				            	value="{$trading_type.id|htmlsafe}"
				            >{$trading_type.description|htmlsafe}
				            </option>
		            {/foreach}
	            </select>
            {/if}
        </td>

        <td>{$LANG.biller}</td>
        <td>
           	{if $billers == null }
                <p><em>{$LANG.no_billers}</em></p>
            {else}
	            <select name="biller_id" id="biller_id" tabIndex="2">
		            {foreach from=$billers item=biller}
			            <option 
				            {if $biller.id == $invoice.biller_id} selected {/if} 
				            value="{$biller.id|htmlsafe}"
			            >{$biller.name|htmlsafe}
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
	            <select name="payment_type_id" id="payment_type_id" tabIndex="3">
		            {foreach from=$payment_types item=payment_type}
			            <option 
				            {if $payment_type.pt_id == $invoice.payment_type_id} selected {/if} 
				            value="{$payment_type.pt_id|htmlsafe}"
				        >{$payment_type.pt_description|htmlsafe}
			            </option>
		            {/foreach}
	            </select>
            {/if}
		</td>
    </tr>

    <tr>
        <td>{$LANG.customer_no}</td>
        <td>
			<input 
				name="customer_id"
				id="customer_id"
				type="text"
				value="{$invoice.customer_id|htmlsafe}"
				size="25"
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
				value="{$invoice.account_id|htmlsafe}"
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
			    value="{$invoice.quantity|htmlsafe}" 
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
				value="{$invoice.unit_price|htmlsafe}"
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
				value="{$invoice.charge|htmlsafe}"
				size="20"
				AUTOCOMPLETE="OFF"
				class="validate[required] tt_charge_change"
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
				value="{$invoice.total|htmlsafe}"
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
    	<td>{$LANG.product}</br>{$LANG.calculation_type}</br>{$LANG.payable_amount}</td>
    	<td>
    		{if $products == null }
				<p><em>{$LANG.no_currencys_tt}</em></p>
			{else}
				<select name="product_id"	id="product_id" class="validate[required]" tabIndex="8">
					{foreach from=$products item=product}
						<option {if $product.id == $invoice.product_id} selected {/if} 
							value="{$product.id|htmlsafe}"
						>{$product.code|htmlsafe}
						</option>
					{/foreach}
				</select>
			{/if}

			{if $calculation_types == null }
				<p><em>{$LANG.no_calculation_types}</em></p>
			{else}
				<select name="calculation_type_id" id="calculation_type_id" class="validate[required] calculation_type_change" tabIndex="9">
					{foreach from=$calculation_types item=calculation_type}
						<option	{if $calculation_type.id == $invoice.calculation_type_id} selected {/if} 
							value="{$calculation_type.id|htmlsafe}"
						>{$calculation_type.description|htmlsafe}
						</option>
					{/foreach}
				</select>
			{/if}

			<input
				name="payable_amount"
				id="payable_amount"
				value="{$invoice.payable_amount|htmlsafe}"
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
			>{$invoice.spell_number|htmlsafe}
			</textarea>
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
			>{$invoice.note|htmlsafe}
			</textarea>
		</td>
	</tr>

	<tr>
		<td>{$LANG.inv_pref}</td>
		<td colspan="5">
		{if $preferences == null }
			<p><em>{$LANG.no_preferences}</em></p>
		{else}
			<select name="preference_id" id="preference_id" tabIndex="11">
				{foreach from=$preferences item=preference}
					<option {if $preference.pref_id == $invoice.preference_id} selected {/if} 
						value="{$preference.pref_id|htmlsafe}"
					>{$preference.pref_description|htmlsafe}
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

<br />

<table class="buttons" align="center">
	<tr>
		<td>
			<button type="submit" class="positive" name="submit" value="{$LANG.save}" tabIndex="12">
				<img class="button_img" src="./images/common/tick.png" alt="" /> 
				{$LANG.save}
			</button>

			<a href="./index.php?module=invoices_tt&amp;view=manage" class="negative" tabIndex="13">
				<img src="./images/common/cross.png" alt="" />
				{$LANG.cancel}
			</a>
		</td>
	</tr>
</table>

<input type="hidden" name="id" value="{$invoice.id|htmlsafe}"/>				
<input type="hidden" name="action" value="edit"/>
<input type="hidden" name="op" value="insert_preference"/>

</form>
