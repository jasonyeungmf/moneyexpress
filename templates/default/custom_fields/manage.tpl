{*
/*
* Script: manage.tpl
* 	 Custom fields manage template
*
* License:
*	 GPL v2 or above
*/
*}

{ if $number_of_rows.count == 0 }
<p><em>{$LANG.no_invoices}.</em></p>

{else}
</br>
<div style="text-align:center;">
	<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_what_are_custom_fields" title="{$LANG.what_are_custom_fields}">{$LANG.what_are_custom_fields}<img src="./images/common/help-small.png" alt="" /></a> ::
	
	<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_manage_custom_fields" title="{$LANG.whats_this_page_about}">{$LANG.whats_this_page_about}<img src="./images/common/help-small.png" alt="" /></a>
</div>
</br>

<table id="manageGrid" style="display:none"></table>
{include file='../modules/custom_fields/manage.js.php'}

{/if}
