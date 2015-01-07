<?php /* Smarty version 2.6.18, created on 2015-01-08 03:34:45
         compiled from ../templates/default/menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/menu.tpl', 3, false),)), $this); ?>
<div class="top_menu">
	<div class="txt_right">
	<?php echo $this->_tpl_vars['LANG']['hello']; ?>
 <?php echo ((is_array($_tmp=$_SESSION['Zend_Auth']['email'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

	<?php if ($this->_tpl_vars['config']->authentication->enabled == 1): ?> |
		<?php if ($_SESSION['Zend_Auth']['id'] == null): ?>
			<a href="index.php?module=auth&amp;view=login"><?php echo $this->_tpl_vars['LANG']['login']; ?>
</a>
		<?php else: ?>
			<a href="index.php?module=auth&amp;view=logout"><?php echo $this->_tpl_vars['LANG']['logout']; ?>
</a>
		<?php endif; ?>
	<?php endif; ?>
	
	</div>
</div>

<div id="tabmenu" class="flora" >
	<ul>
		<li><a href="#home"><span><?php echo $this->_tpl_vars['LANG']['home']; ?>
</span></a></li>
		<li><a href="#invoice"><span><?php echo $this->_tpl_vars['LANG']['invoice']; ?>
</span></a></li>
		<li><a href="#account"><span><?php echo $this->_tpl_vars['LANG']['account']; ?>
</span></a></li>
		<li><a href="#people"><span><?php echo $this->_tpl_vars['LANG']['people']; ?>
</span></a></li>
		<li><a href="#currency"><span><?php echo $this->_tpl_vars['LANG']['currency']; ?>
</span></a></li>
		<li style="float:right" class="menu_setting"><a href="#setting"><span><?php echo $this->_tpl_vars['LANG']['settings']; ?>
</span></a></li>
	</ul>

<div id="home">
<ul class="subnav">
	<li><a<?php if ($this->_tpl_vars['pageActive'] == 'dashboard'): ?> class="active" <?php endif; ?> href="index.php?module=index&amp;view=index"><?php echo $this->_tpl_vars['LANG']['dashboard']; ?>
</a></li>
	<li><a<?php if ($this->_tpl_vars['pageActive'] == 'report'): ?> class="active" <?php endif; ?> href="index.php?module=reports&amp;view=index"><?php echo $this->_tpl_vars['LANG']['all_reports']; ?>
</a></li>
</ul>
</div>

<div id="invoice">
<ul class="subnav">

<li><a 	<?php if ($this->_tpl_vars['pageActive'] == 'invoice_tt'): ?> class="active" <?php endif; ?> href="index.php?module=invoices_tt&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['tt_invoices']; ?>
</a></li>		<?php if ($this->_tpl_vars['subPageActive'] == 'invoice_tt_edit'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a></li><?php endif; ?>
		<?php if ($this->_tpl_vars['subPageActive'] == 'invoice_tt_view'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['quick_view']; ?>
</a></li><?php endif; ?>
		<?php if ($this->_tpl_vars['subPageActive'] == 'invoice_tt_new'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['new_invoice']; ?>
</a></li><?php endif; ?>
				
<li><a 	<?php if ($this->_tpl_vars['pageActive'] == 'invoice'): ?> class="active" <?php endif; ?> href="index.php?module=invoices&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['invoices']; ?>
</a></li>
		<?php if ($this->_tpl_vars['subPageActive'] == 'invoice_edit'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a></li><?php endif; ?>
		<?php if ($this->_tpl_vars['subPageActive'] == 'invoice_view'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['quick_view']; ?>
</a></li><?php endif; ?>
		<?php if ($this->_tpl_vars['subPageActive'] == 'invoice_new'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['new_invoice']; ?>
</a></li><?php endif; ?>						
</ul>
</div>
        
<div id="account">
<ul class="subnav">
<li><a <?php if ($this->_tpl_vars['pageActive'] == 'account'): ?> class="active"<?php endif; ?> href="index.php?module=accounts&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['accounts']; ?>
</a></li>
	<?php if ($this->_tpl_vars['subPageActive'] == 'account_add'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['add']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'account_view'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['view']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'account_edit'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a></li><?php endif; ?>
</ul>
</div>   

<div id="people">
<ul class="subnav">
<li><a <?php if ($this->_tpl_vars['pageActive'] == 'customer'): ?> class="active"<?php endif; ?> href="index.php?module=customers&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['customers']; ?>
</a></li>
	<?php if ($this->_tpl_vars['subPageActive'] == 'customer_add'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['add']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'customer_view'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['view']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'customer_edit'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a></li><?php endif; ?>

<li><a <?php if ($this->_tpl_vars['pageActive'] == 'biller'): ?> class="active" <?php endif; ?> href="index.php?module=billers&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['billers']; ?>
</a></li>
	<?php if ($this->_tpl_vars['subPageActive'] == 'biller_add'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['add']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'biller_view'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['view']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'biller_edit'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a></li><?php endif; ?>

<li><a <?php if ($this->_tpl_vars['pageActive'] == 'user'): ?> class="active" <?php endif; ?> href="index.php?module=user&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['users']; ?>
</a></li>
	<?php if ($this->_tpl_vars['subPageActive'] == 'user_add'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['add']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'user_view'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['view']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'user_edit'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a></li><?php endif; ?>
		</ul>
</div>

<div id="currency">
<ul class="subnav">
<li><a<?php if ($this->_tpl_vars['pageActive'] == 'currencys_note'): ?> class="active"<?php endif; ?> href="index.php?module=currencys_note&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['note']; ?>
</a></li>

<li><a <?php if ($this->_tpl_vars['pageActive'] == 'currencys_tt'): ?> class="active"<?php endif; ?> href="index.php?module=currencys_tt&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['tt']; ?>
</a></li>

<li><a <?php if ($this->_tpl_vars['pageActive'] == 'currencys_cny'): ?> class="active"<?php endif; ?> href="index.php?module=currencys_cny&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['cny']; ?>
</a></li>
</ul>
</div>          

<div style="float: right; " id="setting">
<ul class="subnav">
<li><a <?php if ($this->_tpl_vars['pageActive'] == 'setting'): ?> class="active"<?php endif; ?> href="index.php?module=options&amp;view=index"><?php echo $this->_tpl_vars['LANG']['settings']; ?>
</a></li>
	<?php if ($this->_tpl_vars['subPageActive'] == 'setting_extensions'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['extensions']; ?>
</a></li><?php endif; ?>

<li><a <?php if ($this->_tpl_vars['pageActive'] == 'system_default'): ?> class="active"<?php endif; ?> href="index.php?module=system_defaults&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['system_defaults']; ?>
</a></li>

<li><a <?php if ($this->_tpl_vars['pageActive'] == 'custom_field'): ?> class="active"<?php endif; ?> href="index.php?module=custom_fields&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['custom_fields_upper']; ?>
</a></li>
	<?php if ($this->_tpl_vars['subPageActive'] == 'custom_fields_view'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['view']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'custom_fields_edit'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a></li><?php endif; ?>

<li><a <?php if ($this->_tpl_vars['pageActive'] == 'preference'): ?> class="active"<?php endif; ?> href="index.php?module=preferences&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['invoice_preferences']; ?>
</a></li>
	<?php if ($this->_tpl_vars['subPageActive'] == 'preferences_add'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['add']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'preferences_view'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['view']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'preferences_edit'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a></li><?php endif; ?>

<li><a <?php if ($this->_tpl_vars['pageActive'] == 'payment_type'): ?> class="active"<?php endif; ?> href="index.php?module=payment_types&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['payment_types']; ?>
</a></li>
	<?php if ($this->_tpl_vars['subPageActive'] == 'payment_types_add'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['add']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'payment_types_view'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['view']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'payment_types_edit'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a></li><?php endif; ?>

<li><a <?php if ($this->_tpl_vars['pageActive'] == 'trading_type'): ?> class="active"<?php endif; ?> href="index.php?module=trading_types&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['trading_types']; ?>
</a></li>
	<?php if ($this->_tpl_vars['subPageActive'] == 'trading_types_add'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['add']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'trading_types_view'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['view']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'trading_types_edit'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a></li><?php endif; ?>
				
<li><a <?php if ($this->_tpl_vars['pageActive'] == 'calculation_type'): ?> class="active"<?php endif; ?> href="index.php?module=calculation_types&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['calculation_types']; ?>
</a></li>
	<?php if ($this->_tpl_vars['subPageActive'] == 'calculation_type_add'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['add']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'calculation_type_view'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['view']; ?>
</a></li><?php endif; ?>
	<?php if ($this->_tpl_vars['subPageActive'] == 'calculation_type_edit'): ?> <li><a class="active active_subpage" href="#"><?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a></li><?php endif; ?>
			
<li><a <?php if ($this->_tpl_vars['pageActive'] == 'backup'): ?> class="active"<?php endif; ?> href="index.php?module=options&amp;view=backup_database"><?php echo $this->_tpl_vars['LANG']['backup_database']; ?>
</a></li>
</ul>
</div>

</div>
