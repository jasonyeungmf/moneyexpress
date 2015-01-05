{if $saved == true }
	<br />
	 {$LANG.save_invoice_tt_success}
	<br />
	<br />
{else}
	<br />
	 {$LANG.save_invoice_tt_failure}
	<br />
	<br />
{/if}

<!-- <meta http-equiv="refresh" content="1;URL=index.php?module=invoices_tt&amp;view=quick_view&amp;id={$id|urlencode}" /> -->
<meta http-equiv="refresh" content="1;URL=index.php?module=export&amp;view=invoice_tt&amp;id={$id|urlencode}&amp;format=print" />
