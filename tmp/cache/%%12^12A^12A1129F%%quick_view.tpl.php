<?php /* Smarty version 2.6.18, created on 2014-11-05 00:58:23
         compiled from ../templates/default/invoices/quick_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/invoices/quick_view.tpl', 5, false),array('modifier', 'urlencode', '../templates/default/invoices/quick_view.tpl', 5, false),array('modifier', 'date_format', '../templates/default/invoices/quick_view.tpl', 50, false),array('modifier', 'siLocal_number_trim', '../templates/default/invoices/quick_view.tpl', 70, false),array('modifier', 'siLocal_number_clean', '../templates/default/invoices/quick_view.tpl', 71, false),array('modifier', 'outhtml', '../templates/default/invoices/quick_view.tpl', 78, false),)), $this); ?>
<div class="align_center">
<br />
<!--Actions heading - start-->
<span class="welcome">
	<a title="<?php echo $this->_tpl_vars['LANG']['print_preview_tooltip']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" href="index.php?module=export&amp;view=invoice&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&amp;format=print"><img src='images/common/printer.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['print_preview']; ?>
</a>
	&nbsp;&nbsp; 
	
	<a title="<?php echo $this->_tpl_vars['LANG']['edit']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" href="index.php?module=invoices&amp;view=details&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&amp;action=view"><img src='images/common/edit.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['edit']; ?>
</a>
	&nbsp;&nbsp; 
			 
	<a title="<?php echo $this->_tpl_vars['LANG']['export_tooltip']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['export_pdf_tooltip']; ?>
" href="index.php?module=export&amp;view=invoice&amp;id=<?php echo $this->_tpl_vars['invoice']['id']; ?>
&amp;format=pdf"><img src='images/common/page_white_acrobat.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['export_pdf']; ?>
</a>
	&nbsp;&nbsp; 
	
	<a title="<?php echo $this->_tpl_vars['LANG']['export_tooltip']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['export_xls_tooltip']; ?>
 .<?php echo ((is_array($_tmp=$this->_tpl_vars['config']->export->spreadsheet)) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['format_tooltip']; ?>
" href="index.php?module=export&amp;view=invoice&amp;id=<?php echo $this->_tpl_vars['invoice']['id']; ?>
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
" href="index.php?module=export&amp;view=invoice&amp;id=<?php echo $this->_tpl_vars['invoice']['id']; ?>
&amp;format=file&amp;filetype=<?php echo ((is_array($_tmp=$this->_tpl_vars['wordprocessor'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><img src='images/common/page_white_word.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['export_as']; ?>
 .<?php echo ((is_array($_tmp=$this->_tpl_vars['wordprocessor'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 </a>
	&nbsp;&nbsp; 
	
	<a title="<?php echo $this->_tpl_vars['LANG']['email']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" href="index.php?module=invoices&amp;view=email&amp;stage=1&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><img src='images/common/mail-message-new.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['email']; ?>
</a>
	
	<?php if ($this->_tpl_vars['defaults']['delete'] == '1'): ?> 
	&nbsp;&nbsp; 
	<a title="<?php echo $this->_tpl_vars['LANG']['delete']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" href="index.php?module=invoices&amp;view=delete&amp;stage=1&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><img src='images/common/delete.png' class='action' />&nbsp;<?php echo $this->_tpl_vars['LANG']['delete']; ?>
</a>
	<?php endif; ?>
</span>
</div>
<!--Actions heading - start-->
<br />
<br />

<table align="center" width="" border="0">
	<tr>
		<td><b><?php echo $this->_tpl_vars['LANG']['biller']; ?>
:</b></td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['biller']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
		<td></td>
		<td colspan="2"><b><?php echo $this->_tpl_vars['LANG']['summary']; ?>
:</b></td>
	</tr>
	<tr>
		<td colspan="3"></td>
		<td><b><?php echo $this->_tpl_vars['LANG']['index_id']; ?>
:</b></td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['index_id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
	</tr>
	
	<tr>
		<td><b><?php echo $this->_tpl_vars['LANG']['customer']; ?>
:</b></td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['mobile_phone'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['phone'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
		<td></td>
		<td><b><?php echo $this->_tpl_vars['LANG']['date_time']; ?>
:</b></td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</td>
	</tr>	
	
	<tr>
		<td colspan="6"><br/></td>
	</tr>	
		
	<tr>
		<td class="align_right"><b><?php echo $this->_tpl_vars['LANG']['description']; ?>
</b></td>
		<td class="align_right"><b><?php echo $this->_tpl_vars['LANG']['product']; ?>
</b></td>
       		<td class="align_right"><b><?php echo $this->_tpl_vars['LANG']['quantity']; ?>
</b></td>
		<td class="align_right"><b><?php echo $this->_tpl_vars['LANG']['unit_price']; ?>
</b></td>
		<td class="align_right"><b><?php echo $this->_tpl_vars['LANG']['charge']; ?>
</b></td>
		<td class="align_right"><b><?php echo $this->_tpl_vars['LANG']['gross_total']; ?>
</b></td>
	</tr>
	
<?php $_from = $this->_tpl_vars['invoiceItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['invoiceItem']):
?>
	<tr>
		<td style="text-align:right"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
		<td style="text-align:right"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['product']['code'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td>
		<td style="text-align:right"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['quantity'])) ? $this->_run_mod_handler('siLocal_number_trim', true, $_tmp) : siLocal::number_trim($_tmp)); ?>
</td>
		<td style="text-align:right"><?php echo $this->_tpl_vars['preference']['pref_currency_sign']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['unit_price'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
</td>
		<td style="text-align:right"><?php echo $this->_tpl_vars['preference']['pref_currency_sign']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['tax_amount'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
</td>
		<td style="text-align:right"><?php echo $this->_tpl_vars['preference']['pref_currency_sign']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceItem']['gross_total'])) ? $this->_run_mod_handler('siLocal_number_trim', true, $_tmp) : siLocal::number_trim($_tmp)); ?>
</td>
        </tr>
<?php endforeach; endif; unset($_from); ?>

	<tr>
		<td colspan="6"><b><?php echo $this->_tpl_vars['LANG']['notes']; ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['note'])) ? $this->_run_mod_handler('outhtml', true, $_tmp) : outhtml($_tmp)); ?>
</b></td>
	</tr>
	<tr>
		<td colspan="6"><br/></td>
	</tr>

	<tr>
        	<td colspan="4"></td>
		<td colspan="1" class="align_right"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['gross']; ?>
&nbsp;</b></td>
		<td colspan="1" class="align_right"><?php if ($this->_tpl_vars['invoice_number_of_taxes'] > 1): ?><u><?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['gross'])) ? $this->_run_mod_handler('siLocal_number_trim', true, $_tmp) : siLocal::number_trim($_tmp)); ?>
<?php if ($this->_tpl_vars['invoice_number_of_taxes'] > 1): ?></u><?php endif; ?></td>
	</tr>


<?php unset($this->_sections['line']);
$this->_sections['line']['name'] = 'line';
$this->_sections['line']['start'] = (int)0;
$this->_sections['line']['loop'] = is_array($_loop=$this->_tpl_vars['invoice']['tax_grouped']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['line']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['line']['show'] = true;
$this->_sections['line']['max'] = $this->_sections['line']['loop'];
if ($this->_sections['line']['start'] < 0)
    $this->_sections['line']['start'] = max($this->_sections['line']['step'] > 0 ? 0 : -1, $this->_sections['line']['loop'] + $this->_sections['line']['start']);
else
    $this->_sections['line']['start'] = min($this->_sections['line']['start'], $this->_sections['line']['step'] > 0 ? $this->_sections['line']['loop'] : $this->_sections['line']['loop']-1);
if ($this->_sections['line']['show']) {
    $this->_sections['line']['total'] = min(ceil(($this->_sections['line']['step'] > 0 ? $this->_sections['line']['loop'] - $this->_sections['line']['start'] : $this->_sections['line']['start']+1)/abs($this->_sections['line']['step'])), $this->_sections['line']['max']);
    if ($this->_sections['line']['total'] == 0)
        $this->_sections['line']['show'] = false;
} else
    $this->_sections['line']['total'] = 0;
if ($this->_sections['line']['show']):

            for ($this->_sections['line']['index'] = $this->_sections['line']['start'], $this->_sections['line']['iteration'] = 1;
                 $this->_sections['line']['iteration'] <= $this->_sections['line']['total'];
                 $this->_sections['line']['index'] += $this->_sections['line']['step'], $this->_sections['line']['iteration']++):
$this->_sections['line']['rownum'] = $this->_sections['line']['iteration'];
$this->_sections['line']['index_prev'] = $this->_sections['line']['index'] - $this->_sections['line']['step'];
$this->_sections['line']['index_next'] = $this->_sections['line']['index'] + $this->_sections['line']['step'];
$this->_sections['line']['first']      = ($this->_sections['line']['iteration'] == 1);
$this->_sections['line']['last']       = ($this->_sections['line']['iteration'] == $this->_sections['line']['total']);
?>

<?php if (( $this->_tpl_vars['invoice']['tax_grouped'][$this->_sections['line']['index']]['tax_amount'] )): ?>
	<tr class="details_screen">
		<td colspan="4"></td>
		<td colspan="1" class="align_right"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['tax_grouped'][$this->_sections['line']['index']]['tax_name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
&nbsp;</b></td>
		<td colspan="1" class="align_right"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['tax_grouped'][$this->_sections['line']['index']]['tax_amount'])) ? $this->_run_mod_handler('siLocal_number_clean', true, $_tmp) : siLocal::number_clean($_tmp)); ?>
</td>
	</tr>
<?php endif; ?>
<?php endfor; endif; ?>
	
	<tr class="details_screen">
	        <td colspan="4"></td>
		<td colspan="1" class="align_right"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['total']; ?>
&nbsp;</b></td>
		<td colspan="1" class="align_right"><span class="double_underline"><?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_currency_sign'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['total'])) ? $this->_run_mod_handler('siLocal_number_trim', true, $_tmp) : siLocal::number_trim($_tmp)); ?>
</span></td>
	</tr>
</table>

<br /><br />

<br />