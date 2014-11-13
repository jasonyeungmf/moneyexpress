<div class="align_center">
<br />
<!--Actions heading - start-->
<span class="welcome">
	<a title="{$LANG.print_preview_tooltip} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe}" href="index.php?module=export&amp;view=invoice&amp;id={$invoice.id|urlencode}&amp;format=print"><img src='images/common/printer.png' class='action' />&nbsp;{$LANG.print_preview}</a>
	&nbsp;&nbsp; 
	
	<a title="{$LANG.edit} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe}" href="index.php?module=invoices&amp;view=details&amp;id={$invoice.id|urlencode}&amp;action=view"><img src='images/common/edit.png' class='action' />&nbsp;{$LANG.edit}</a>
	&nbsp;&nbsp; 
			 
	<a title="{$LANG.export_tooltip} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe} {$LANG.export_pdf_tooltip}" href="index.php?module=export&amp;view=invoice&amp;id={$invoice.id}&amp;format=pdf"><img src='images/common/page_white_acrobat.png' class='action' />&nbsp;{$LANG.export_pdf}</a>
	&nbsp;&nbsp; 
	
	<a title="{$LANG.export_tooltip} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe} {$LANG.export_xls_tooltip} .{$config->export->spreadsheet|htmlsafe} {$LANG.format_tooltip}" href="index.php?module=export&amp;view=invoice&amp;id={$invoice.id}&amp;format=file&amp;filetype={$spreadsheet|urlencode}"><img src='images/common/page_white_excel.png' class='action' />&nbsp;{$LANG.export_as} .{$spreadsheet|htmlsafe}</a>
	&nbsp;&nbsp; 
	
	<a title="{$LANG.export_tooltip} {$preference.pref_inv_wording} {$invoice.id|htmlsafe} {$LANG.export_doc_tooltip} .{$config->export->wordprocessor|htmlsafe} {$LANG.format_tooltip}" href="index.php?module=export&amp;view=invoice&amp;id={$invoice.id}&amp;format=file&amp;filetype={$wordprocessor|urlencode}"><img src='images/common/page_white_word.png' class='action' />&nbsp;{$LANG.export_as} .{$wordprocessor|htmlsafe} </a>
	&nbsp;&nbsp; 
	
	<a title="{$LANG.email} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe}" href="index.php?module=invoices&amp;view=email&amp;stage=1&amp;id={$invoice.id|urlencode}"><img src='images/common/mail-message-new.png' class='action' />&nbsp;{$LANG.email}</a>
	
	{if $defaults.delete == '1'} 
	&nbsp;&nbsp; 
	<a title="{$LANG.delete} {$preference.pref_inv_wording|htmlsafe} {$invoice.id|htmlsafe}" href="index.php?module=invoices&amp;view=delete&amp;stage=1&amp;id={$invoice.id|urlencode}"><img src='images/common/delete.png' class='action' />&nbsp;{$LANG.delete}</a>
	{/if}
</span>
</div>
<!--Actions heading - start-->
<br />
<br />

<table align="center" width="" border="0">
	<tr>
		<td><b>{$LANG.biller}:</b></td>
		<td>{$biller.name|htmlsafe}</td>
		<td></td>
		<td colspan="2"><b>{$LANG.summary}:</b></td>
	</tr>
	<tr>
		<td colspan="3"></td>
		<td><b>{$LANG.index_id}:</b></td>
		<td>{$invoice.index_id|htmlsafe}</td>
	</tr>
	
	<tr>
		<td><b>{$LANG.customer}:</b></td>
		<td>{$customer.customer_no|htmlsafe}-{$customer.name|htmlsafe}-{$customer.mobile_phone|htmlsafe}-{$customer.phone|htmlsafe}</td>
		<td></td>
		<td><b>{$LANG.date_time}:</b></td>
		<td>{$invoice.date|date_format:"%Y-%m-%d %H:%M:%S"}</td>
	</tr>	
	
	<tr>
		<td colspan="6"><br/></td>
	</tr>	
		
	<tr>
		<td class="align_right"><b>{$LANG.description}</b></td>
		<td class="align_right"><b>{$LANG.product}</b></td>
       		<td class="align_right"><b>{$LANG.quantity}</b></td>
		<td class="align_right"><b>{$LANG.unit_price}</b></td>
		<td class="align_right"><b>{$LANG.charge}</b></td>
		<td class="align_right"><b>{$LANG.gross_total}</b></td>
	</tr>
	
{foreach from=$invoiceItems item=invoiceItem }
	<tr>
		<td style="text-align:right">{$invoiceItem.description|htmlsafe}</td>
		<td style="text-align:right">{$invoiceItem.product.code|htmlsafe}</td>
		<td style="text-align:right">{$invoiceItem.quantity|siLocal_number_trim}</td>
		<td style="text-align:right">{$preference.pref_currency_sign}{$invoiceItem.unit_price|siLocal_number_clean}</td>
		<td style="text-align:right">{$preference.pref_currency_sign}{$invoiceItem.tax_amount|siLocal_number_clean}</td>
		<td style="text-align:right">{$preference.pref_currency_sign}{$invoiceItem.gross_total|siLocal_number_trim}</td>
        </tr>
{/foreach}

	<tr>
		<td colspan="6"><b>{$LANG.notes}:{$invoice.note|outhtml}</b></td>
	</tr>
	<tr>
		<td colspan="6"><br/></td>
	</tr>

	<tr>
        	<td colspan="4"></td>
		<td colspan="1" class="align_right"><b>{$preference.pref_inv_wording|htmlsafe} {$LANG.gross}&nbsp;</b></td>
		<td colspan="1" class="align_right">{if $invoice_number_of_taxes > 1}<u>{/if}{$preference.pref_currency_sign|htmlsafe}{$invoice.gross|siLocal_number_trim}{if $invoice_number_of_taxes > 1}</u>{/if}</td>
	</tr>


{section name=line start=0 loop=$invoice.tax_grouped step=1}

{if ($invoice.tax_grouped[line].tax_amount) }
	<tr class="details_screen">
		<td colspan="4"></td>
		<td colspan="1" class="align_right"><b>{$invoice.tax_grouped[line].tax_name|htmlsafe}&nbsp;</b></td>
		<td colspan="1" class="align_right">{$preference.pref_currency_sign|htmlsafe}{$invoice.tax_grouped[line].tax_amount|siLocal_number_clean}</td>
	</tr>
{/if}
{/section}
	
	<tr class="details_screen">
	        <td colspan="4"></td>
		<td colspan="1" class="align_right"><b>{$preference.pref_inv_wording|htmlsafe} {$LANG.total}&nbsp;</b></td>
		<td colspan="1" class="align_right"><span class="double_underline">{$preference.pref_currency_sign|htmlsafe}{$invoice.total|siLocal_number_trim}</span></td>
	</tr>
</table>

<br /><br />

<br />
