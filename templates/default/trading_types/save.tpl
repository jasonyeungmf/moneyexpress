{*
/*
* Script: save.tpl
* 	 Payment type save template
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-18
*
* License:
*	 GPL v2 or above
*
* Website:
*	http://www.simpleinvoices.org
*/
*}

<br />
{if $saved == true }
	<br />
	 {$LANG.save_trading_type_success}
	<br />
	<br />
{else}
	<br />
	 {$LANG.save_trading_type_failure}
	<br />
	<br />
{/if}

{if $saved == true }
	<meta http-equiv="refresh" content="2;URL=index.php?module=trading_types&amp;view=manage" />
{/if}
