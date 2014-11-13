{*
/*
* Script: manage.tpl
* 	 currencys_tt manage template
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
            <a href="./index.php?module=currencys_cny&view=add" class="positive">
                <img src="./images/famfam/add.png" alt=""/>
                {$LANG.currency_cny_add}
            </a>

        </td>
        <td>
            <a href="./index.php?module=currencys_cny&view=update" class="positive">
                {$LANG.cny_rate_update}
            </a>

        </td>
    </tr>
</table>

{if $number_of_rows.count == 0 }

	<br />
	<br />
	<span class="welcome">{$LANG.no_currency_cny}</span>
	<br />
	<br />
	<br />
	<br />

{else}
	<br />
	<table id="manageGrid" style="display:none"></table>
	{include file='../modules/currencys_cny/manage.js.php'}
	
{/if}
