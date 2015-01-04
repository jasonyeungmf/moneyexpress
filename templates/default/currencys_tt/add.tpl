
{* if bill is updated or saved.*}

{if $smarty.post.code != "" && $smarty.post.id != null } 
	{include file="../templates/default/currencys_tt/save.tpl"}
{else}
{* if  name was inserted *} 
	{if $smarty.post.id !=null} 
		<div class="validation_alert"><img src="./images/common/important.png" alt="" />
		You must enter a code for the currency tt</div>
		<hr />
	{/if}
<form name="frmpost" action="index.php?module=currencys_tt&view=add" method="POST" id="frmpost" onsubmit="return checkForm(this);">
<br />

<table align="center">
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td><input type="text" class="edit" name="country" value="{$smarty.post.country|htmlsafe}"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.symbol}</td>
		<td><input type="text" class="edit" name="symbol" value="{$smarty.post.symbol|htmlsafe}"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.currency_en}</td>
		<td><input type="text" class="edit" name="currency_en" value="{$smarty.post.currency_en|htmlsafe}"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.currency_local}</td>
		<td><input type="text" class="edit" name="currency_local" value="{$smarty.post.currency_local|htmlsafe}"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.code}</td>
		<td><input type="text" class="edit" name="code" value="{$smarty.post.code|htmlsafe}"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.tt_buy}</td>
		<td><input type="text" class="edit" name="tt_buy" value="{$smarty.post.tt_buy|htmlsafe}"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.tt_sell}</td>
		<td><input type="text" class="edit" name="tt_sell" value="{$smarty.post.tt_sell|htmlsafe}"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.currency_tt_cf1|htmlsafe} 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="{$LANG.custom_fields}"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" class="edit" name="custom_field1" value="{$smarty.post.custom_field1|htmlsafe}"  size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.currency_tt_cf2|htmlsafe} 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="{$LANG.custom_fields}"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" class="edit" name="custom_field2" value="{$smarty.post.custom_field2|htmlsafe}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.currency_tt_cf3|htmlsafe} 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="{$LANG.custom_fields}"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" class="edit" name="custom_field3" value="{$smarty.post.custom_field3|htmlsafe}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.currency_tt_cf4|htmlsafe} 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="{$LANG.custom_fields}"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" class="edit" name="custom_field4" value="{$smarty.post.custom_field4|htmlsafe}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
			{html_options class=edit name=enabled options=$enabled selected=1}
		</td>
	</tr>
</table>
<br />
<table class="buttons" align="center">
	<tr>
		<td>
			<button type="submit" class="positive" name="id" value="{$LANG.save}">
			    <img class="button_img" src="./images/common/tick.png" alt="" /> 
				{$LANG.save}
			</button>

			<input type="hidden" name="op" value="insert_currency_tt" />
		
			<a href="./index.php?module=currencys_tt&view=manage" class="negative">
		        <img src="./images/common/cross.png" alt="" />
	        	{$LANG.cancel}
    		</a>
	
		</td>
	</tr>
</table>
</form>
{/if}
