<?php /* Smarty version 2.6.18, created on 2014-12-16 01:04:42
         compiled from ../templates/invoices/default/template.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urlsafe', '../templates/invoices/default/template.tpl', 4, false),array('modifier', 'htmlsafe', '../templates/invoices/default/template.tpl', 5, false),array('modifier', 'siLocal_number_trim', '../templates/invoices/default/template.tpl', 78, false),array('modifier', 'siLocal_number_clean', '../templates/invoices/default/template.tpl', 79, false),array('modifier', 'outhtml', '../templates/invoices/default/template.tpl', 94, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['css'])) ? $this->_run_mod_handler('urlsafe', true, $_tmp) : urlsafe($_tmp)); ?>
" media="all">
<title><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['index_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</title>
</head>
<body style="height:auto;width:auto;">
	<div id="container">
	<div id="header"></div>
	<table width="100%" align="center" border="0">
		<tr>
			<td rowspan="4"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['user_logo'])) ? $this->_run_mod_handler('urlsafe', true, $_tmp) : urlsafe($_tmp)); ?>
" height=55  border="0" hspace="0" align="left"></td>
			<td class="font1"><?php echo $this->_tpl_vars['user']['name']; ?>
</td>
			<th align="right"><span class="font1"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_heading'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
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
			<td><FONT SIZE="1"><?php echo $this->_tpl_vars['LANG']['email']; ?>
: <?php echo $this->_tpl_vars['user']['email']; ?>
, <?php echo $this->_tpl_vars['LANG']['website']; ?>
: <?php echo $this->_tpl_vars['user']['website']; ?>
</font></td>
			<td></td>
		</tr>				
		<tr>	
			<td><a href="./index.php?module=export&view=invoice&id=<?php echo ((is_array($_tmp=$this->_tpl_vars['previousid'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
&format=print"><img src="./images/print/previous.png" alt="" /></a></td>
			<td><br/></td>
			<td align="right"><a href="./index.php?module=export&view=invoice&id=<?php echo ((is_array($_tmp=$this->_tpl_vars['nextid'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
&format=print"><img src="./images/print/next.png" alt="" /></a></td>
		</tr>
	</table>
	
	<table class="left" width="100%" border="0">
	<tr>
		<td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['trading_type']; ?>
</b></td>
		<td align="right" ><?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
		<td colspan="3"><br/></td>
		<td align="right" class="col1 tbl1-bottom"><b><?php echo $this->_tpl_vars['LANG']['summary']; ?>
</b></td>
		<td><br /></td>
	</tr>		
	
	<tr>
	        <td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['biller']; ?>
</b></td>
		<td align="right" ><?php echo ((is_array($_tmp=$this->_tpl_vars['biller']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
		<td colspan="3"><br/></td>
		<td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['index_id']; ?>
</b></td>
		<td align="right"><?php echo $this->_tpl_vars['invoice']['index_id']; ?>
</td>
	</tr> 
				
	<tr>
		<td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['customer']; ?>
</b></td>
		<td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['mobile_phone'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['phone'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
		<td colspan="3"><br/></td>
		<td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['date_time']; ?>
</b></td>
		<td align="right"><?php echo $this->_tpl_vars['invoice']['date']; ?>
</td>
	</tr>	
	
	<tr>
		<td colspan="7"><br /></td>
	</tr>
	
	<tr>
		<td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['description']; ?>
</b></td>
		<td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['currency']; ?>
</b></td>
		<td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['quantity']; ?>
</b></td>
		<td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['unit_price']; ?>
</b></td>
		<td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['subtotal']; ?>
</b></td>
		<td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['charge']; ?>
</b></td>
		<td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['total']; ?>
</b></td>
	</tr>
				
	<?php $_from = $this->_tpl_vars['invoiceItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['invoiceItem']):
?>	
		<tr>
			<td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
			<td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['currency']['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
			<td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['quantity'])) ? $this->_run_mod_handler('siLocal_number_trim', true, $_tmp) : siLocal::number_trim($_tmp)); ?>
</td>
			<td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['unit_price'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
</td>
			<td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['subtotal'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
</td>
			<td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['charge'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
</td>
			<td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['total'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>

	<tr>
		<td colspan="5"></td>
		<td align="right" class="tbl1-bottom col1"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['total']; ?>
</b></td>
		<td align="right"><span class="double_underline"><b><u><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['total'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
</u></b></span></td>
	</tr>		
	
	<tr>
		<td align="right" class="tbl1-bottom col1"><b><?php echo $this->_tpl_vars['LANG']['notes']; ?>
</td>
		<td align="left" colspan="6"></b><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['note'])) ? $this->_run_mod_handler('outhtml', true, $_tmp) : outhtml($_tmp)); ?>
</td>	
	</tr>
		
	<tr>
		<td colspan="7"><br /></td>
	</tr>
		
	<tr>
		<td class="tbl1-bottom col1" colspan="7"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_detail_heading'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</b></td>
	</tr>
	
	<tr>
		<td colspan="7"><i><FONT SIZE="1"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_detail_line'])) ? $this->_run_mod_handler('outhtml', true, $_tmp) : outhtml($_tmp)); ?>
</font></i></td>
	</tr>
	
	<tr>
		<td colspan="7"><i><FONT SIZE="1"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_payment_method'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</font></i></td>
	</tr>

	<tr>
		<td colspan="7"><br /></td>
	</tr>
	
	<tr>
		<td colspan="7"><div style="font-size:8pt;" align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['biller']['footer'])) ? $this->_run_mod_handler('outhtml', true, $_tmp) : outhtml($_tmp)); ?>
</div></td>
	</tr>	
	</table>
	
<div id="footer"></div>
</div>
</body>
</html>