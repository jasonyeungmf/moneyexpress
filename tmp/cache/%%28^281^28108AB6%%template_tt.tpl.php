<?php /* Smarty version 2.6.18, created on 2015-01-05 23:26:36
         compiled from ../templates/invoices/default/template_tt.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urlsafe', '../templates/invoices/default/template_tt.tpl', 4, false),array('modifier', 'htmlsafe', '../templates/invoices/default/template_tt.tpl', 5, false),array('modifier', 'siLocal_number_trim', '../templates/invoices/default/template_tt.tpl', 69, false),array('modifier', 'siLocal_number_clean', '../templates/invoices/default/template_tt.tpl', 77, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['css'])) ? $this->_run_mod_handler('urlsafe', true, $_tmp) : urlsafe($_tmp)); ?>
" media="all">
<title><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['index_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</title>
</head>
<body class="body_tt" style="height:auto;width:auto;">
<div id="container_tt">
<table align="center" width="100%" border="0">
	<tr>
		<td rowspan="4">
			<a href="./index.php?module=invoices_tt&view=quick_view&id=<?php echo ((is_array($_tmp=$this->_tpl_vars['currentid'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
">	
			<img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['user_logo'])) ? $this->_run_mod_handler('urlsafe', true, $_tmp) : urlsafe($_tmp)); ?>
" height=55  border="0" hspace="0" align="left">
		</a>
		</td>
		<td class="head_1"><?php echo $this->_tpl_vars['user']['name']; ?>
</td>
		<th align="right"><span class="head_1"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_heading'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</span></th>
	</tr>

	<tr>
		<td><FONT SIZE="1"><?php echo $this->_tpl_vars['LANG']['address']; ?>
: <?php echo $this->_tpl_vars['user']['street_address']; ?>
 <?php echo $this->_tpl_vars['user']['street_address2']; ?>
 <?php echo $this->_tpl_vars['user']['city']; ?>
 <?php echo $this->_tpl_vars['user']['state']; ?>
 <?php echo $this->_tpl_vars['user']['country']; ?>
</font></td>
		<td></td>
	</tr>

	<tr>
		<td><FONT SIZE="1"><?php echo $this->_tpl_vars['LANG']['phone']; ?>
: <?php echo $this->_tpl_vars['user']['phone']; ?>
, <?php echo $this->_tpl_vars['LANG']['fax']; ?>
: <?php echo $this->_tpl_vars['user']['fax']; ?>
</font></td>
		<td></td>
	</tr>	

	<tr>
		<!--	<td><FONT SIZE="1"><?php echo $this->_tpl_vars['LANG']['email']; ?>
: <?php echo $this->_tpl_vars['user']['email']; ?>
, <?php echo $this->_tpl_vars['LANG']['website']; ?>
: <?php echo $this->_tpl_vars['user']['website']; ?>
</font></td>	-->
		<td><FONT SIZE="1"><?php echo $this->_tpl_vars['LANG']['email']; ?>
: <?php echo $this->_tpl_vars['user']['email']; ?>
, <?php echo $this->_tpl_vars['LANG']['website']; ?>
: </font></td>
		<td><a href="./index.php?module=export&view=invoice_tt&id=<?php echo ((is_array($_tmp=$this->_tpl_vars['previousid'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
&format=print"><img src="./images/print/previous.png" alt="" align="left" /></a><a href="./index.php?module=export&view=invoice_tt&id=<?php echo ((is_array($_tmp=$this->_tpl_vars['nextid'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
&format=print"><img src="./images/print/next.png" alt="" align="right"/></a></td>
	</tr>
</table>
	
<table align="center" width="100%" border="1">
	<tr>
		<td class="title"><?php echo $this->_tpl_vars['LANG']['index_id']; ?>
</td>
		<td class="data_2"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['index_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>

		<td class="title"><?php echo $this->_tpl_vars['LANG']['internal_id']; ?>
</td>
		<td class="data_2"></td>

		<td class="title"><?php echo $this->_tpl_vars['LANG']['date_time']; ?>
</td>
		<td class="data_2"><?php echo $this->_tpl_vars['invoice']['date']; ?>
</td>
	</tr>
	
	<tr>
		<td class="title"><?php echo $this->_tpl_vars['LANG']['trading_type']; ?>
</td>
		<td class="data_2"><?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>

		<td class="title"><?php echo $this->_tpl_vars['LANG']['biller']; ?>
</td>
		<td class="data_2"><?php echo ((is_array($_tmp=$this->_tpl_vars['biller']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>

		<td class="title"><?php echo $this->_tpl_vars['LANG']['payment_type']; ?>
</td>
		<!--	<td class="data_2"><?php echo ((is_array($_tmp=$this->_tpl_vars['payment_type']['pt_description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>	-->
		<td class="data_2"></td>
	</tr>

	<tr>
		<td class="title"><?php echo $this->_tpl_vars['LANG']['customer_no']; ?>
</td>
		<td class="data_2"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['customer_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>

		<td class="title"><?php echo $this->_tpl_vars['LANG']['account_id']; ?>
</td>
		<td class="data_2"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['account_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>

		<td class="title"><?php echo $this->_tpl_vars['LANG']['quantity']; ?>
</td>
		<td class="data_1"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['quantity'])) ? $this->_run_mod_handler('siLocal_number_trim', true, $_tmp) : siLocal::number_trim($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td class="title"><?php echo $this->_tpl_vars['LANG']['customer_name']; ?>
</td>
		<td colspan="3" class="data_2"><?php echo ((is_array($_tmp=$this->_tpl_vars['customer_detail'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>

		<td class="title"><?php echo $this->_tpl_vars['LANG']['unit_price']; ?>
</td>
		<td class="data_1"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['unit_price'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td class="title"></td>
		<td colspan="3"></td>

		<td class="title"><?php echo $this->_tpl_vars['LANG']['charge']; ?>
</td>
		<td class="data_1"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['charge'])) ? $this->_run_mod_handler('siLocal_number_trim', true, $_tmp) : siLocal::number_trim($_tmp)); ?>
</td>
	</tr>
	
	<tr>
		<td class="title"></td>
		<td colspan="3"></td>

		<td class="title"><?php echo $this->_tpl_vars['LANG']['total']; ?>
</td>
		<td class="data_1"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['total'])) ? $this->_run_mod_handler('siLocal_number_trim', true, $_tmp) : siLocal::number_trim($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td class="title"><?php echo $this->_tpl_vars['LANG']['payee']; ?>
</td>
		<td colspan="5" class="data_3"><?php echo ((is_array($_tmp=$this->_tpl_vars['account']['payee'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td class="title"><?php echo $this->_tpl_vars['LANG']['bank']; ?>
</td>
		<td colspan="5" class="data_3"><?php echo ((is_array($_tmp=$this->_tpl_vars['account']['bank'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td class="title"><?php echo $this->_tpl_vars['LANG']['account_no']; ?>
</td>
		<td colspan="5" class="data_1"><?php echo ((is_array($_tmp=$this->_tpl_vars['account']['account_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

	<tr>
		<td class="title"><?php echo $this->_tpl_vars['LANG']['payable_amount']; ?>
</td>
		<td class="data_1"><?php echo ((is_array($_tmp=$this->_tpl_vars['currency']['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['payable_amount'])) ? $this->_run_mod_handler('siLocal_number_trim', true, $_tmp) : siLocal::number_trim($_tmp)); ?>
</td>

		<td class="title"><?php echo $this->_tpl_vars['LANG']['spell_number']; ?>
</td>
		<td colspan="3" class="data_2"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['spell_number'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
</table>

<table align="left" width="100%" border="0">
	<tr>
		<td>
		<i><FONT SIZE="1"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_payment_line1_name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_payment_line1_value'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</font></i>
		</td>
	</tr>
</table>
</div>
</body>
</html>