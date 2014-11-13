{if $saved == true }
	<br />
	 {$LANG.save_account_success}
	<br />
	<br />
{else}
	<br />
	 {$LANG.save_account_failure}
	<br />
	<br />
{/if}

{if $smarty.post.cancel == null }
	<meta http-equiv="refresh" content="0;URL=index.php?module=accounts&amp;view=manage" />
{else}
	<meta http-equiv="refresh" content="0;URL=index.php?module=accounts&amp;view=manage" />
{/if}
