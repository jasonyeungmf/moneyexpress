{*
/*
* Script: update.tpl
* 	Currencys(Note) update template
*
* Authors:
*	 Jeson.Yang
*
* Last edited:
* 	 2013-07-19
*
* License:
*	 GPL v2 or above
*/
*}

{if $updated == true }
	<br />
	 {$LANG.update_currency_note_rate_success}
	<br />
	<br />
{else}
	<br />
	 {$LANG.update_currency_note_rate_failure}
	<br />
	<br />
{/if}

<meta http-equiv="refresh" content="1;URL=index.php?module=currencys_note&view=manage" />

