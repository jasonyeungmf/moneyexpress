{*
/*
* Script: details.tpl
* 	 Payment type details template
*
* License:
*	 GPL v3 or above
*
* Website:
*	http://www.simpleinvoices.org
*/
*}

<form name="frmpost" action="index.php?module=trading_types&amp;view=save&amp;id={$smarty.get.id|htmlsafe}" method="post" onsubmit="return frmpost_Validator(this)">



<br />
{if $smarty.get.action == "view" }
	
	
	<table align="center">
	<tr>
		<td class="details_screen">{$LANG.description}</td><td>{$trading_type.description|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td><td>{$trading_type.enabled|htmlsafe}</td>
	</tr>
	</table>
		<br />
	<table class="buttons" align="center">
		<tr>
			<td>
				<a href="./index.php?module=trading_types&amp;view=details&amp;id={$trading_type.id}&amp;action=edit" class="positive">
					<img src="./images/famfam/report_edit.png" alt="" />
					{$LANG.edit}
				</a>

				<a href="./index.php?module=trading_types&amp;view=manage" class="negative">
					<img src="./images/common/cross.png" alt="" />
					{$LANG.cancel}
				</a>
		
			</td>
		</tr>
	 </table>
{/if}

{if $smarty.get.action == "edit"}

	<table align="center">
	<tr>
		<td class="details_screen">{$LANG.description} <a href="index.php?module=documentation&amp;view=view&amp;page=help_required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png" alt="(required)" /></a></td>
		<td>
			<input type="text"  class="validate[required]"  name="description" value="{$trading_type.description|htmlsafe|htmlsafe}" size="50" />
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled} </td>
		<td>
		{*displayblock enabled*}
		<select name="enabled">
			<option value="{$trading_type.enabled|htmlsafe}" selected style="font-weight: bold">{$trading_type.enabled|htmlsafe}</option>
			<option value="1">{$LANG.enabled}</option>
			<option value="0">{$LANG.disabled}</option>
		</select>
		{*/displayblock enabled*}
		
		</td>
	</tr>
	</table>
	<br />
	<table class="buttons" align="center">
		<tr>
			<td>
				<button type="submit" class="positive" name="save_trading_type" value="{$LANG.save}">
					<img class="button_img" src="./images/common/tick.png" alt="" /> 
					{$LANG.save}
				</button>

				<input type="hidden" name="op" value="edit_trading_type">
			
				<a href="./index.php?module=trading_types&amp;view=manage" class="negative">
					<img src="./images/common/cross.png" alt="" />
					{$LANG.cancel}
				</a>
		
			</td>
		</tr>
	 </table>

{/if}
