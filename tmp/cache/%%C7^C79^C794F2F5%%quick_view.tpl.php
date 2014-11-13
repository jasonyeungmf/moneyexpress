<?php /* Smarty version 2.6.18, created on 2014-02-18 01:46:18
         compiled from ../templates/default/invoices_tt/quick_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/invoices_tt/quick_view.tpl', 6, false),array('modifier', 'urlencode', '../templates/default/invoices_tt/quick_view.tpl', 6, false),array('modifier', 'date_format', '../templates/default/invoices_tt/quick_view.tpl', 46, false),array('modifier', 'siLocal_number_trim', '../templates/default/invoices_tt/quick_view.tpl', 68, false),array('modifier', 'siLocal_number_clean', '../templates/default/invoices_tt/quick_view.tpl', 76, false),array('modifier', 'siLocal_number', '../templates/default/invoices_tt/quick_view.tpl', 135, false),)), $this); ?>
<div class="align_center">
	<br />

	<!--Actions heading - start-->
	<span class="welcome">
			<a title="<?php echo $this->_tpl_vars['LANG']['print_preview_tooltip']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" href="index.php?module=export&amp;view=invoice_tt&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&amp;format=print"><img src='images/common/printer.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['print_preview']; ?>
</a>
			 &nbsp;&nbsp; 
			
			<a title="<?php echo $this->_tpl_vars['LANG']['edit']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" href="index.php?module=invoices_tt&amp;view=details&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&amp;action=view"><img src='images/common/edit.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a>
			 &nbsp;&nbsp; 

			<a title="<?php echo $this->_tpl_vars['LANG']['export_tooltip']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['export_pdf_tooltip']; ?>
" href="index.php?module=export&amp;view=invoice_tt&amp;id=<?php echo $this->_tpl_vars['invoice']['id']; ?>
&amp;format=pdf"><img src='images/common/page_white_acrobat.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['export_pdf']; ?>
</a>
			 &nbsp;&nbsp; 
			
			<a title="<?php echo $this->_tpl_vars['LANG']['export_tooltip']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['export_xls_tooltip']; ?>
 .<?php echo ((is_array($_tmp=$this->_tpl_vars['config']->export->spreadsheet)) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['format_tooltip']; ?>
" href="index.php?module=export&amp;view=invoice_tt&amp;id=<?php echo $this->_tpl_vars['invoice']['id']; ?>
&amp;format=file&amp;filetype=<?php echo ((is_array($_tmp=$this->_tpl_vars['spreadsheet'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><img src='images/common/page_white_excel.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['export_as']; ?>
 .<?php echo ((is_array($_tmp=$this->_tpl_vars['spreadsheet'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</a>
			 &nbsp;&nbsp; 
			
			<a title="<?php echo $this->_tpl_vars['LANG']['export_tooltip']; ?>
 <?php echo $this->_tpl_vars['preference']['pref_inv_wording']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['export_doc_tooltip']; ?>
 .<?php echo ((is_array($_tmp=$this->_tpl_vars['config']->export->wordprocessor)) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['format_tooltip']; ?>
" href="index.php?module=export&amp;view=invoice_tt&amp;id=<?php echo $this->_tpl_vars['invoice']['id']; ?>
&amp;format=file&amp;filetype=<?php echo ((is_array($_tmp=$this->_tpl_vars['wordprocessor'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><img src='images/common/page_white_word.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['export_as']; ?>
 .<?php echo ((is_array($_tmp=$this->_tpl_vars['wordprocessor'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 </a>
			 &nbsp;&nbsp; 

			 <a title="<?php echo $this->_tpl_vars['LANG']['export_tooltip']; ?>
 <?php echo $this->_tpl_vars['preference']['pref_inv_wording']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['export_doc_tooltip']; ?>
 .<?php echo ((is_array($_tmp=$this->_tpl_vars['config']->export->jpg)) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['format_tooltip']; ?>
" href="index.php?module=export&amp;view=invoice_tt&amp;id=<?php echo $this->_tpl_vars['invoice']['id']; ?>
&amp;format=file&amp;filetype=<?php echo ((is_array($_tmp=$this->_tpl_vars['jpg'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><img src='images/common/image-x-generic.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['export_as']; ?>
 .<?php echo ((is_array($_tmp=$this->_tpl_vars['jpg'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 </a>
			 &nbsp;&nbsp; 
			
			<a title="<?php echo $this->_tpl_vars['LANG']['email']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" href="index.php?module=invoices_tt&amp;view=email&amp;stage=1&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><img src='images/common/mail-message-new.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['email']; ?>
</a>
			
			<?php if ($this->_tpl_vars['defaults']['delete'] == '1'): ?> 
			 &nbsp;&nbsp; 
				<a title="<?php echo $this->_tpl_vars['LANG']['delete']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" href="index.php?module=invoices_tt&amp;view=delete&amp;stage=1&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><img src='images/common/delete.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['delete']; ?>
</a>
			<?php endif; ?>
	</span>
</div>
<!--Actions heading - start-->
<br />
<br />
<!-- #PDF end -->

<table align="center" border="1">
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
		<td class="data_2"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
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
		<td class="data_2"><?php echo ((is_array($_tmp=$this->_tpl_vars['payment_type']['pt_description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
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
		<td class="data_1"><?php echo ((is_array($_tmp=$this->_tpl_vars['product']['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['payable_amount'])) ? $this->_run_mod_handler('siLocal_number_trim', true, $_tmp) : siLocal::number_trim($_tmp)); ?>
</td>

		<td class="title"><?php echo $this->_tpl_vars['LANG']['spell_number']; ?>
</td>
		<td colspan="3" class="data_2"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['spell_number'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>

</table>

<br />
<br />
<!--
<table align="center" border="1">
	<tr class="details_screen">
		<td class="details_screen" colspan="16"><?php echo $this->_tpl_vars['LANG']['financial_status']; ?>
</td>
	</tr>
	<tr class="account">
		<td class="account" colspan="8"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['index_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
		<td width=5%></td>
		<td class="columnleft" width="5%"></td>
		<td class="account" colspan="6"><a href="index.php?module=customers&amp;view=details&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&amp;action=view"><?php echo $this->_tpl_vars['LANG']['customer_account']; ?>
</a></td>
	</tr>
	<tr>
		<td class="account"><?php echo $this->_tpl_vars['LANG']['total']; ?>
:</td>
		<td class="account"><?php echo $this->_tpl_vars['preference']['pref_currency_sign']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['total'])) ? $this->_run_mod_handler('siLocal_number', true, $_tmp) : siLocal::number($_tmp)); ?>
</td>
		<td class="account"><a href="index.php?module=payments&amp;view=manage&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><?php echo $this->_tpl_vars['LANG']['paid']; ?>
:</a></td>
		<td class="account"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['paid'])) ? $this->_run_mod_handler('siLocal_number', true, $_tmp) : siLocal::number($_tmp)); ?>
</td>
		<td class="account"><?php echo $this->_tpl_vars['LANG']['owing']; ?>
:</td>
		<td class="account"><u><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['owing'])) ? $this->_run_mod_handler('siLocal_number', true, $_tmp) : siLocal::number($_tmp)); ?>
</u></td>
		<td class="account"><?php echo $this->_tpl_vars['LANG']['age']; ?>
:</td>
		<td class="account" nowrap><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice_age'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 
		<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_age" title="<?php echo $this->_tpl_vars['LANG']['age']; ?>
"><img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td></td>
		<td class="columnleft"></td>
		<td class="account"><?php echo $this->_tpl_vars['LANG']['total']; ?>
:</td>
		<td class="account"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['customerAccount']['total'])) ? $this->_run_mod_handler('siLocal_number', true, $_tmp) : siLocal::number($_tmp)); ?>
</td>
		<td class="account"><a href="index.php?module=payments&amp;view=manage&amp;c_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><?php echo $this->_tpl_vars['LANG']['paid']; ?>
:</a></td>
		<td class="account"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['customerAccount']['paid'])) ? $this->_run_mod_handler('siLocal_number', true, $_tmp) : siLocal::number($_tmp)); ?>
 </td>
		<td class="account"><?php echo $this->_tpl_vars['LANG']['owing']; ?>
:</td>
		<td class="account"><u><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['customerAccount']['owing'])) ? $this->_run_mod_handler('siLocal_number', true, $_tmp) : siLocal::number($_tmp)); ?>
</u></td>
	</tr>
</table>
<br />	-->