<br />
<br />

<input type="hidden" name="action" value="insert" />
<table align="center">
<tr>
<td>
<table align="left" border="0">
	<tr>
        	<td class="details_screen">{$LANG.trading_type}</td>
		
                <td>
                {if $trading_types == null }
                	<p><em>{$LANG.no_trading_types}</em></p>
                {else}
                        <select name="trading_type_id" id="trading_type_id" class="trading_type_change" >
                            	{foreach from=$trading_types item=trading_type}
				    		<option {if $trading_type.id == $defaults.trading_type} selected {/if} 
					    		value="{$trading_type.id|htmlsafe}"
						>
						{$trading_type.description|htmlsafe}
						</option>
				{/foreach}
                        </select>
                {/if}
                </td>
		
		<td class="details_screen">Summary:</td>
        </tr>
		       
               <tr>
                      <td class="details_screen">
                               {$LANG.biller}
                       </td>
                       <td>
                           {if $billers == null }
                              <p><em>{$LANG.no_billers}</em></p>
                           {else}
                            <select name="biller_id" >
                            {foreach from=$billers item=biller}
                            <option {if $biller.id == $defaults.biller} selected {/if} value="{$biller.id|htmlsafe}">{$biller.name|htmlsafe}</option>
                            {/foreach}
                            </select>
                            {/if}
                        </td>
			
			<td class="details_screen">{$LANG.index_id}</td>		
			<td>
				<input
					id="index_id" 
					name="index_id"
					type="text"
					class="validate[required]"
					size="54"
					{if $smarty.get.index_id}
						 value="{$smarty.get.index_id}"
					{else}
						 value=""
					{/if}
				/>
			</td>		
                </tr>
                <tr>
                    <td class="details_screen">
                        {$LANG.customer}
                    </td>
                    <td>
                        {if $customers == null }
                        <em>{$LANG.no_customers}</em>
                        {else}
                            <select name="customer_id">
                            {foreach from=$customers item=customer}
                                <option {if $customer.customer_no == $defaultCustomerID} selected {/if} value="{$customer.customer_no|htmlsafe}">{$customer.customer_no|htmlsafe}-{$customer.name|htmlsafe}</option>
                            {/foreach}
                            </select>
                        {/if}
                    </td>
		    
		    	<td class="details_screen">{$LANG.date_time}</td>
			<td wrap="nowrap">
		                <input
		    		type="text" 
		    		class="validate[required,custom[date],length[0,19]]" 
		    		size="54" 
		    		name="date" 
		    		id="date1" 
		    		{if $smarty.get.date}
		    		    value="{$smarty.get.date}"
		    		{else}
		                        value="{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}"
		    		{/if} 
		    		/>   
		        </td>
                </tr>
       </table>
       </td></tr>
       <tr><td>
