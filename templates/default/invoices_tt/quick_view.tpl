<div class="align_center">
	<br />

	<!--Actions heading - start-->
	<span class="welcome">
			<a title="{$LANG.print_preview_tooltip} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe}" href="index.php?module=export&amp;view=invoice_tt&amp;id={$invoice.id|urlencode}&amp;format=print"><img src='images/common/printer.png' class='action' />&nbsp;{$LANG.print_preview}</a>
			 &nbsp;&nbsp; 
			
			<a title="{$LANG.edit} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe}" href="index.php?module=invoices_tt&amp;view=details&amp;id={$invoice.id|urlencode}&amp;action=view"><img src='images/common/edit.png' class='action' />&nbsp;{$LANG.edit}</a>
			 &nbsp;&nbsp; 

			<a title="{$LANG.export_tooltip} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe} {$LANG.export_pdf_tooltip}" href="index.php?module=export&amp;view=invoice_tt&amp;id={$invoice.id}&amp;format=pdf"><img src='images/common/page_white_acrobat.png' class='action' />&nbsp;{$LANG.export_pdf}</a>
			 &nbsp;&nbsp; 
			
			<a title="{$LANG.export_tooltip} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe} {$LANG.export_xls_tooltip} .{$config->export->spreadsheet|htmlsafe} {$LANG.format_tooltip}" href="index.php?module=export&amp;view=invoice_tt&amp;id={$invoice.id}&amp;format=file&amp;filetype={$spreadsheet|urlencode}"><img src='images/common/page_white_excel.png' class='action' />&nbsp;{$LANG.export_as} .{$spreadsheet|htmlsafe}</a>
			 &nbsp;&nbsp; 
			
			<a title="{$LANG.export_tooltip} {$preference.pref_inv_wording} {$invoice.id|htmlsafe} {$LANG.export_doc_tooltip} .{$config->export->wordprocessor|htmlsafe} {$LANG.format_tooltip}" href="index.php?module=export&amp;view=invoice_tt&amp;id={$invoice.id}&amp;format=file&amp;filetype={$wordprocessor|urlencode}"><img src='images/common/page_white_word.png' class='action' />&nbsp;{$LANG.export_as} .{$wordprocessor|htmlsafe} </a>
			 &nbsp;&nbsp; 

			 <a title="{$LANG.export_tooltip} {$preference.pref_inv_wording} {$invoice.id|htmlsafe} {$LANG.export_doc_tooltip} .{$config->export->jpg|htmlsafe} {$LANG.format_tooltip}" href="index.php?module=export&amp;view=invoice_tt&amp;id={$invoice.id}&amp;format=file&amp;filetype={$jpg|urlencode}"><img src='images/common/image-x-generic.png' class='action' />&nbsp;{$LANG.export_as} .{$jpg|htmlsafe} </a>
			 &nbsp;&nbsp; 
			
			<a title="{$LANG.email} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe}" href="index.php?module=invoices_tt&amp;view=email&amp;stage=1&amp;id={$invoice.id|urlencode}"><img src='images/common/mail-message-new.png' class='action' />&nbsp;{$LANG.email}</a>
			
			{if $defaults.delete == '1'} 
			 &nbsp;&nbsp; 
				<a title="{$LANG.delete} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe}" href="index.php?module=invoices_tt&amp;view=delete&amp;stage=1&amp;id={$invoice.id|urlencode}"><img src='images/common/delete.png' class='action' />&nbsp;{$LANG.delete}</a>
			{/if}
	</span>
</div>
<!--Actions heading - start-->
<br />
<br />

<table align="center" border="1">
	<tr>
		<td class="title">{$LANG.index_id}</td>
		<td class="data_2">{$invoice.index_id|htmlsafe}</td>

		<td class="title">{$LANG.internal_id}</td>
		<td class="data_2"></td>

		<td class="title">{$LANG.date_time}</td>
		<td class="data_2">{$invoice.date|date_format:"%Y-%m-%d %H:%M:%S"}</td>
	</tr>
	
	<tr>
		<td class="title">{$LANG.trading_type}</td>
		<td class="data_2">{$trading_type.description|htmlsafe}</td>

		<td class="title">{$LANG.biller}</td>
		<td class="data_2">{$biller.name|htmlsafe}</td>

		<td class="title">{$LANG.payment_type}</td>
		<td class="data_2">{$payment_type.pt_description|htmlsafe}</td>
	</tr>

	<tr>
		<td class="title">{$LANG.customer_no}</td>
		<td class="data_2">{$invoice.customer_id|htmlsafe}</td>

		<td class="title">{$LANG.account_id}</td>
		<td class="data_2">{$invoice.account_id|htmlsafe}</td>

		<td class="title">{$LANG.quantity}</td>
		<td class="data_1">{$invoice.quantity|siLocal_number_trim}</td>
	</tr>

	<tr>
		<td class="title">{$LANG.customer_name}</td>
		<td colspan="3" class="data_2">{$customer_detail|htmlsafe}</td>

		<td class="title">{$LANG.unit_price}</td>
		<td class="data_1">{$invoice.unit_price|siLocal_number_clean}</td>
	</tr>

	<tr>
		<td class="title"></td>
		<td colspan="3"></td>

		<td class="title">{$LANG.charge}</td>
		<td class="data_1">{$invoice.charge|siLocal_number_trim}</td>
	</tr>
	
	<tr>
		<td class="title"></td>
		<td colspan="3"></td>

		<td class="title">{$LANG.total}</td>
		<td class="data_1">{$invoice.total|siLocal_number_trim}</td>
	</tr>

	<tr>
		<td class="title">{$LANG.payee}</td>
		<td colspan="5" class="data_3">{$account.payee|htmlsafe}</td>
	</tr>

	<tr>
		<td class="title">{$LANG.bank}</td>
		<td colspan="5" class="data_3">{$account.bank|htmlsafe}</td>
	</tr>

	<tr>
		<td class="title">{$LANG.account_no}</td>
		<td colspan="5" class="data_1">{$account.account_no|htmlsafe}</td>
	</tr>

	<tr>
		<td class="title">{$LANG.payable_amount}</td>
		<td class="data_1">{$currency.code|htmlsafe}: {$invoice.payable_amount|siLocal_number_trim}</td>

		<td class="title">{$LANG.spell_number}</td>
		<td colspan="3" class="data_2">{$invoice.spell_number|htmlsafe}</td>
	</tr>

</table>

<br />
<br />
