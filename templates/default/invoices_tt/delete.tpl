{if $smarty.get.stage == 1 }

	<br />
	{$LANG.confirm_delete} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe}
    <br />
    <br />
        <form name="frmpost" action="index.php?module=invoices_tt&amp;view=delete&amp;stage=2&amp;id={$smarty.get.id|urlencode}" method="post">
        <table class="buttons" align="center">
            <tr>
                <td>
                    <button type="submit" class="positive" name="submit">
                        <img class="button_img" src="./images/common/tick.png" alt="" /> 
                        {$LANG.yes}
                    </button>

                    <input type="hidden" name="doDelete" value="y" />
                
                    <a href="./index.php?module=invoices_tt&amp;view=manage" class="negative">
                        <img src="./images/common/cross.png" alt="" />
                        {$LANG.cancel}
                    </a>
            
                </td>
            </tr>
        </table>
        </form>	
		</table>

{/if}

{if $smarty.get.stage == 2 }

	<div id="top"></b></div>
	<br /><br />
	{$preference.pref_inv_wording|htmlsafe} {$id|htmlsafe} {$LANG.deleted}
	<br /><br />

{/if}
