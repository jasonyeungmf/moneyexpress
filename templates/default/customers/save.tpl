{if $saved == true }

<br />
	{$LANG.save_customer_success}
<br />
<br />
{else}
<br />
	 {$LANG.save_customer_failure}
<br />
<br />
{/if}

{if $smarty.post.cancel == null }
	<meta http-equiv="refresh" content="0;url=index.php?module=customers&amp;view=manage" />
{else}
	<meta http-equiv="refresh" content="0;url=index.php?module=customers&amp;view=manage" />
{/if}
