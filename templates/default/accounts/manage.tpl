<table class="buttons" align="center">
    <tr>
        <td>
            <a href="./index.php?module=accounts&amp;view=add" class="positive">
                <img src="./images/famfam/add.png" alt="" />
                {$LANG.account_add}
            </a>

        </td>
    </tr>
 </table>
 
{if $number_of_accounts.count == 0}
	<br />
	<br />
	<span class="welcome">{$LANG.no_accounts}</span>
	<br />
	<br />
	<br />
	<br />
	
{else}

	<br />
	<table id="manageGrid" style="display:none"></table>
	{include file='../modules/accounts/manage.js.php'}

{/if}
