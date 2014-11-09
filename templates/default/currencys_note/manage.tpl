{*
/*
* Script: manage.tpl
* 	 rates_note manage template
*
*
* License:
*	 GPL v3 or above
*
* Website:
*	http://www.simpleinvoices.org
*/
*}
<table class="buttons" align="center">
    <tr>
        <td>
            <a href="./index.php?module=currencys_note&view=add" class="positive">
                <img src="./images/famfam/add.png" alt=""/>
                {$LANG.currency_note_add}
            </a>

        </td>
        <td>
            <a href="./index.php?module=currencys_note&view=update" class="positive">
                {$LANG.notes_rate_update}
            </a>

        </td>
    </tr>
</table>

{if $number_of_rows.count == 0 }

	<br />
	<br />
	<span class="welcome">{$LANG.no_currency_note}</span>
	<br />
	<br />
	<br />
	<br />

{else}
	<br />
	<table id="manageGrid" style="display:none"></table>
	{include file='../modules/currencys_note/manage.js.php'}
	
{/if}
