{*
/*
* Script: save.tpl
* 	Currency(Note) save template
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

{if $saved == true }
	<br />
	 {$LANG.save_currency_note_success}
	<br />
	<br />
{else}
	<br />
	 {$LANG.save_currency_note_failure}
	<br />
	<br />
{/if}

{if $smarty.post.cancel == null }
	<meta http-equiv="refresh" content="2;URL=index.php?module=currencys_note&view=manage" />
{else}
	<meta http-equiv="refresh" content="1;URL=index.php?module=currencys_note&view=manage" />
{/if}
