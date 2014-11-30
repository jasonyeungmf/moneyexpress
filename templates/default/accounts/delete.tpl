{if $smarty.get.stage == 1 }

	<br />
			<font style="font-weight:bold" size="2">{$LANG.confirm_delete}</font>
			<br />
			<br />
		<table border="1" cellpadding="3" align="center">
			<tr>
				<td>{$LANG.customer_no}</td>
				<td>{$LANG.name}</td>
				<td>{$LANG.serial_no}</td>
				<td>{$LANG.payee}</td>
				<td>{$LANG.bank}</td>
				<td>{$LANG.account_no}</td>
			</tr>
			
			<tr>
				<td><font size="2">{$account.customer_no|htmlsafe}</font></td>
				<td><font size="2">{$account.name|htmlsafe}</font></td>
				<td><font style="font-weight:bold" size="2" color="red">{$account.serial_no|htmlsafe}</font></td>
				<td><font size="2">{$account.payee|htmlsafe}</font></td>
				<td><font size="2">{$account.bank|htmlsafe}</font></td>
				<td><font size="2">{$account.account_no|htmlsafe}</font></td>
			</tr>
 		</table>
            <br />
            <br />
        <form name="frmpost" action="index.php?module=accounts&amp;view=delete&amp;stage=2&amp;serial_no={$smarty.get.serial_no|urlencode}" method="post">
        <table class="buttons" align="center">
            <tr>
                <td>
                    <button type="submit" class="positive" name="submit">
                        <img class="button_img" src="./images/common/tick.png" alt="" /> 
                        {$LANG.yes}
                    </button>

                    <input type="hidden" name="doDelete" value="y" />
                
                    <a href="./index.php?module=accounts&amp;view=manage" class="negative">
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
	{$account.serial_no|htmlsafe} {$LANG.deleted}
	<br /><br />

{/if}
