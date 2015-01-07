<div class="top_menu">
	<div class="txt_right">
	{$LANG.hello} {$smarty.session.Zend_Auth.email|htmlsafe}
	{if $config->authentication->enabled == 1} |
		{if $smarty.session.Zend_Auth.id == null}
			<a href="index.php?module=auth&amp;view=login">{$LANG.login}</a>
		{else}
			<a href="index.php?module=auth&amp;view=logout">{$LANG.logout}</a>
		{/if}
	{/if}
	
	</div>
</div>

<div id="tabmenu" class="flora" >
	<ul>
		<li><a href="#home"><span>{$LANG.home}</span></a></li>
		<li><a href="#invoice"><span>{$LANG.invoice}</span></a></li>
		<li><a href="#account"><span>{$LANG.account}</span></a></li>
		<li><a href="#people"><span>{$LANG.people}</span></a></li>
		<li><a href="#product"><span>{$LANG.product}</span></a></li>
		<li style="float:right" class="menu_setting"><a href="#setting"><span>{$LANG.settings}</span></a></li>
	</ul>

<div id="home">
<ul class="subnav">
	<li><a{if $pageActive == "dashboard"} class="active" {/if} href="index.php?module=index&amp;view=index">{$LANG.dashboard}</a></li>
	<li><a{if $pageActive == "report"} class="active" {/if} href="index.php?module=reports&amp;view=index">{$LANG.all_reports}</a></li>
</ul>
</div>

<div id="invoice">
<ul class="subnav">

<li><a 	{ if $pageActive == "invoice_tt"} class="active" {/if} href="index.php?module=invoices_tt&amp;view=manage">{$LANG.tt_invoices}</a></li>		{ if $subPageActive == "invoice_tt_edit"} <li><a class="active active_subpage" href="#">{$LANG.edit}</a></li>{/if}
		{ if $subPageActive == "invoice_tt_view"} <li><a class="active active_subpage" href="#">{$LANG.quick_view}</a></li>{/if}
		{ if $subPageActive == "invoice_tt_new"} <li><a class="active active_subpage" href="#">{$LANG.new_invoice}</a></li>{/if}
				
<li><a 	{ if $pageActive == "invoice"} class="active" {/if} href="index.php?module=invoices&amp;view=manage">{$LANG.invoices}</a></li>
		{ if $subPageActive == "invoice_edit"} <li><a class="active active_subpage" href="#">{$LANG.edit}</a></li>{/if}
		{ if $subPageActive == "invoice_view"} <li><a class="active active_subpage" href="#">{$LANG.quick_view}</a></li>{/if}
		{ if $subPageActive == "invoice_new"} <li><a class="active active_subpage" href="#">{$LANG.new_invoice}</a></li>{/if}						
</ul>
</div>
        
<div id="account">
<ul class="subnav">
<li><a { if $pageActive == "account"} class="active"{/if} href="index.php?module=accounts&amp;view=manage">{$LANG.accounts}</a></li>
	{ if $subPageActive == "account_add"} <li><a class="active active_subpage" href="#">{$LANG.add}</a></li>{/if}
	{ if $subPageActive == "account_view"} <li><a class="active active_subpage" href="#">{$LANG.view}</a></li>{/if}
	{ if $subPageActive == "account_edit"} <li><a class="active active_subpage" href="#">{$LANG.edit}</a></li>{/if}
</ul>
</div>   

<div id="people">
<ul class="subnav">
<li><a { if $pageActive == "customer"} class="active"{/if} href="index.php?module=customers&amp;view=manage">{$LANG.customers}</a></li>
	{ if $subPageActive == "customer_add"} <li><a class="active active_subpage" href="#">{$LANG.add}</a></li>{/if}
	{ if $subPageActive == "customer_view"} <li><a class="active active_subpage" href="#">{$LANG.view}</a></li>{/if}
	{ if $subPageActive == "customer_edit"} <li><a class="active active_subpage" href="#">{$LANG.edit}</a></li>{/if}

<li><a { if $pageActive == "biller"} class="active" {/if} href="index.php?module=billers&amp;view=manage">{$LANG.billers}</a></li>
	{ if $subPageActive == "biller_add"} <li><a class="active active_subpage" href="#">{$LANG.add}</a></li>{/if}
	{ if $subPageActive == "biller_view"} <li><a class="active active_subpage" href="#">{$LANG.view}</a></li>{/if}
	{ if $subPageActive == "biller_edit"} <li><a class="active active_subpage" href="#">{$LANG.edit}</a></li>{/if}

<li><a { if $pageActive == "user"} class="active" {/if} href="index.php?module=user&amp;view=manage">{$LANG.users}</a></li>
	{ if $subPageActive == "user_add"} <li><a class="active active_subpage" href="#">{$LANG.add}</a></li>{/if}
	{ if $subPageActive == "user_view"} <li><a class="active active_subpage" href="#">{$LANG.view}</a></li>{/if}
	{ if $subPageActive == "user_edit"} <li><a class="active active_subpage" href="#">{$LANG.edit}</a></li>{/if}
		</ul>
</div>

<div id="product">
<ul class="subnav">
<li><a{ if $pageActive == "currencys_note"} class="active"{/if} href="index.php?module=currencys_note&amp;view=manage">{$LANG.note}</a></li>

<li><a { if $pageActive == "currencys_tt"} class="active"{/if} href="index.php?module=currencys_tt&amp;view=manage">{$LANG.tt}</a></li>

<li><a { if $pageActive == "currencys_cny"} class="active"{/if} href="index.php?module=currencys_cny&amp;view=manage">{$LANG.cny}</a></li>
</ul>
</div>          

<div style="float: right; " id="setting">
<ul class="subnav">
<li><a { if $pageActive == "setting"} class="active"{/if} href="index.php?module=options&amp;view=index">{$LANG.settings}</a></li>
	{ if $subPageActive == "setting_extensions"} <li><a class="active active_subpage" href="#">{$LANG.extensions}</a></li>{/if}

<li><a { if $pageActive == "system_default"} class="active"{/if} href="index.php?module=system_defaults&amp;view=manage">{$LANG.system_preferences}</a></li>

<li><a { if $pageActive == "custom_field"} class="active"{/if} href="index.php?module=custom_fields&amp;view=manage">{$LANG.custom_fields_upper}</a></li>
	{ if $subPageActive == "custom_fields_view"} <li><a class="active active_subpage" href="#">{$LANG.view}</a></li>{/if}
	{ if $subPageActive == "custom_fields_edit"} <li><a class="active active_subpage" href="#">{$LANG.edit}</a></li>{/if}

<li><a { if $pageActive == "preference"} class="active"{/if} href="index.php?module=preferences&amp;view=manage">{$LANG.invoice_preferences}</a></li>
	{ if $subPageActive == "preferences_add"} <li><a class="active active_subpage" href="#">{$LANG.add}</a></li>{/if}
	{ if $subPageActive == "preferences_view"} <li><a class="active active_subpage" href="#">{$LANG.view}</a></li>{/if}
	{ if $subPageActive == "preferences_edit"} <li><a class="active active_subpage" href="#">{$LANG.edit}</a></li>{/if}

<li><a { if $pageActive == "payment_type"} class="active"{/if} href="index.php?module=payment_types&amp;view=manage">{$LANG.payment_types}</a></li>
	{ if $subPageActive == "payment_types_add"} <li><a class="active active_subpage" href="#">{$LANG.add}</a></li>{/if}
	{ if $subPageActive == "payment_types_view"} <li><a class="active active_subpage" href="#">{$LANG.view}</a></li>{/if}
	{ if $subPageActive == "payment_types_edit"} <li><a class="active active_subpage" href="#">{$LANG.edit}</a></li>{/if}

<li><a { if $pageActive == "trading_type"} class="active"{/if} href="index.php?module=trading_types&amp;view=manage">{$LANG.trading_types}</a></li>
	{ if $subPageActive == "trading_types_add"} <li><a class="active active_subpage" href="#">{$LANG.add}</a></li>{/if}
	{ if $subPageActive == "trading_types_view"} <li><a class="active active_subpage" href="#">{$LANG.view}</a></li>{/if}
	{ if $subPageActive == "trading_types_edit"} <li><a class="active active_subpage" href="#">{$LANG.edit}</a></li>{/if}
				
<li><a { if $pageActive == "calculation_type"} class="active"{/if} href="index.php?module=calculation_types&amp;view=manage">{$LANG.calculation_types}</a></li>
	{ if $subPageActive == "calculation_type_add"} <li><a class="active active_subpage" href="#">{$LANG.add}</a></li>{/if}
	{ if $subPageActive == "calculation_type_view"} <li><a class="active active_subpage" href="#">{$LANG.view}</a></li>{/if}
	{ if $subPageActive == "calculation_type_edit"} <li><a class="active active_subpage" href="#">{$LANG.edit}</a></li>{/if}
			
<li><a { if $pageActive == "backup"} class="active"{/if} href="index.php?module=options&amp;view=backup_database">{$LANG.backup_database}</a></li>
</ul>
</div>

</div>

