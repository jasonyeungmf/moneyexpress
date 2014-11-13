{if $import == true }
	<br />
	 {$LANG.update_customers_success}
	<br />
	<br />
{else}
	<br />
	 {$LANG.update_customers_failure}
	<br />
	<br />
{/if}

<meta http-equiv="refresh" content="1;URL=index.php?module=customers&view=manage" />

