<form name="frmpost" action="index.php?module=accounts&amp;view=save&amp;serial_no={$smarty.get.serial_no}" method="post" id="frmpost" onsubmit="return checkForm(this);">


{if $smarty.get.action== 'view' }

{*
<b>{$LANG.account} :: <a	href="index.php?module=accounts&amp;view=details&amp;serial_no={$account.serial_no}&amp;action=edit">{$LANG.edit}</a></b>
*}
<br />
<table align="center">
	<tr>
		<td class="details_screen">{$LANG.customer_no}</td>
		<td>{$account.customer_no}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.name}</td>
		<td>{$account.name}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.serial_no}</td>
		<td>{$account.serial_no}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.payee}</td>
		<td>{$account.payee}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.bank}</td>
		<td>{$account.bank}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.account_no}</td>
		<td>{$account.account_no}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>{$account.wording_for_enabled}</td>
	</tr>
</table>
{/if}


{if $smarty.get.action== 'view' }
<br />
	<table class="buttons" align="center">
		<tr>
			<td>
				<a href="./index.php?module=accounts&amp;view=details&amp;action=edit&amp;serial_no={$account.serial_no}" class="positive">
					<img src="./images/famfam/report_edit.png" alt=""/>
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
		<td class="details_screen">{$LANG.customer_no}</td>
		<td><input type="text" name="customer_no" value="{$account.customer_no|htmlsafe}" size="80" AUTOCOMPLETE="OFF" class="validate[required]"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.name}</td>
		<td><input type="text" name="name" value="{$account.name|htmlsafe}" size="80" AUTOCOMPLETE="OFF" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.serial_no}</td>
		<td>{$account.serial_no}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.payee}</td>
		<td><input type="text" name="payee" value="{$account.payee|htmlsafe}" size="80" AUTOCOMPLETE="OFF" class="validate[required]"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.bank}</td>
		<td>			
			<input type="text" name="bank" value="{$account.bank|htmlsafe}" size="80" AUTOCOMPLETE="OFF" class="validate[required]"/>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.account_no}</td>
		<td><input type="text" name="account_no" value="{$account.account_no|htmlsafe}" size="80" AUTOCOMPLETE="OFF" class="validate[required]"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
		{html_options name=enabled options=$enabled selected=$account.enabled}
		</td>
	</tr>

</table>
{/if} 

{if $smarty.get.action== 'edit' }
<br />
	<table class="buttons" align="center">
    <tr>
        <td>
            <button type="submit" class="positive" name="save_account" value="{$LANG.save_account}">
                <img class="button_img" src="./images/common/tick.png" alt="" /> 
                {$LANG.save}
            </button>

            <input type="hidden" name="op" value="edit_account">
   			<input type="hidden" name="categorie" value="1" />

            <a href="./index.php?module=accounts&amp;view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                {$LANG.cancel}
            </a>
    
        </td>
    </tr>
	</table>
	{/if}
</form>
