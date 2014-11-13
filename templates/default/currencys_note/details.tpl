<form name="frmpost" action="index.php?module=currencys_note&view=save&id={$smarty.get.id|urlencode}" method="post" id="frmpost" onsubmit="return checkForm(this);">


{if $smarty.get.action== 'view' }
<br />
	<table align="center">
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td>{$currency_note.country|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.symbol}</td>
		<td>{$currency_note.symbol|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.currency_en}</td>
		<td>{$currency_note.currency_en|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.currency_local}</td>
		<td>{$currency_note.currency_local|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.code}</td>
		<td>{$currency_note.code|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.note_buy}</td>
		<td>{$currency_note.note_buy|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.note_sell}</td>
		<td>{$currency_note.note_sell|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.note_amount}</td>
		<td>{$currency_note.note_amount|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.note_cost}</td>
		<td>{$currency_note.note_cost|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.note_total}</td>
		<td>{$currency_note.note_total|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.currency_note_cf1|htmlsafe} 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="{$LANG.custom_fields}"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td>{$currency_note.custom_field1|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.currency_note_cf2|htmlsafe} 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="{$LANG.custom_fields}"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td>{$currency_note.custom_field2|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.currency_note_cf3|htmlsafe} 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="{$LANG.custom_fields}"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td>{$currency_note.custom_field3|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.currency_note_cf4|htmlsafe} 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="{$LANG.custom_fields}"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td>{$currency_note.custom_field4|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td><td>{$currency_note.notes|unescape}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>{$currency_note.wording_for_enabled|htmlsafe}</td>
	</tr>
</table>
	<br />
	<table class="buttons" align="center">
		<tr>
			<td>
				<a href="./index.php?module=currencys_note&view=details&id={$currency_note.id|htmlsafe}&action=edit" class="positive">
					<img src="./images/famfam/add.png" alt=""/>
					{$LANG.edit}
				</a>

			</td>
		</tr>
	</table>
{/if}


{if $smarty.get.action== 'edit' }
<br />

	<table align="center">
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td><input type="text" name="country" size="50" value="{$currency_note.country|htmlsafe}" id="country"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.symbol}</td>
		<td><input type="text" name="symbol" size="50" value="{$currency_note.symbol|htmlsafe}" id="symbol"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.currency_en}</td>
		<td><input type="text" name="currency_en" size="50" value="{$currency_note.currency_en|htmlsafe}" id="currency_en"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.currency_local}</td>
		<td><input type="text" name="currency_local" size="50" value="{$currency_note.currency_local|htmlsafe}" id="currency_local"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.code}</td>
		<td><input type="text" name="code" size="50" value="{$currency_note.code|htmlsafe}" id="code"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.note_buy}</td>
		<td><input type="text" name="note_buy" size="50" value="{$currency_note.note_buy|htmlsafe}" id="note_buy"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.note_sell}</td>
		<td><input type="text" name="note_sell" size="50" value="{$currency_note.note_sell|htmlsafe}" id="note_sell"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.note_amount}</td>
		<td><input type="text" name="note_amount" size="50" value="{$currency_note.note_amount|htmlsafe}" id="note_amount"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.note_cost}</td>
		<td><input type="text" name="note_cost" size="50" value="{$currency_note.note_cost|htmlsafe}" id="note_cost"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.note_total}</td>
		<td><input type="text" name="note_total" size="50" value="{$currency_note.note_total|htmlsafe}" id="note_total"  class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.currency_note_cf1|htmlsafe} 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="{$LANG.custom_fields}"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field1" size="50" value="{$currency_note.custom_field1|htmlsafe}" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.currency_note_cf2|htmlsafe} 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="{$LANG.custom_fields}"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field2" size="50" value="{$currency_note.custom_field2|htmlsafe}" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.currency_note_cf3|htmlsafe} 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="{$LANG.custom_fields}"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field3" size="50" value="{$currency_note.custom_field3|htmlsafe}" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.currency_note_cf4|htmlsafe} 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="{$LANG.custom_fields}"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="custom_field4" size="50" value="{$currency_note.custom_field4|htmlsafe}" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td><textarea name="notes" class="editor" rows="8" cols="50">{$currency_note.notes|unescape}</textarea></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
			{html_options name=enabled options=$enabled selected=$currency_note.enabled}
		</td>
	</tr>
	</table>
{/if} 
{if $smarty.get.action== 'edit' }
	<br />
	<table class="buttons" align="center">
	<tr>
		<td>
			<button type="submit" class="positive" name="save_currency_note" value="{$LANG.save}">
			    <img class="button_img" src="./images/common/tick.png" alt="" /> 
				{$LANG.save}
			</button>

			<input type="hidden" name="op" value="edit_currency_note">
		
			<a href="./index.php?module=currencys_note&view=manage" class="negative">
		        <img src="./images/common/cross.png" alt="" />
	        	{$LANG.cancel}
    		</a>
	
		</td>
	</tr>
</table>
		
	{/if}
</form>
