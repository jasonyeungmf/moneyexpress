<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="{$css|urlsafe}" media="all">
<title>{$invoice.index_id|htmlsafe}</title>
</head>
<body style="height:auto;width:auto;">
	<div id="container">
	<div id="header"></div>
	<table width="100%" align="center" border="0">
		<tr>
			<td rowspan="4"><img src="{$user_logo|urlsafe}" height=55  border="0" hspace="0" align="left"></td>
			<td class="font1">{$user.name}</td>
			<th align="right"><span class="font1">{$preference.pref_inv_heading|htmlsafe}</span></th>
		</tr>
		<tr>
			<td><FONT SIZE="1">{$LANG.address}: {$user.street_address} {$user.street_address2} {$user.city} {$user.state} {$user.country}</font></td>
			<td></td>
		</tr>
		<tr>
			<td><FONT SIZE="1">{$LANG.phone}: {$user.phone}, {$LANG.fax}: {$user.fax}</font></td>
			<td></td>
		</tr>	
		<tr>
			<td><FONT SIZE="1">{$LANG.email}: {$user.email}, {$LANG.website}: {$user.website}</font></td>
			<td></td>
		</tr>				
		<tr>	
			<td><a href="./index.php?module=export&view=invoice&id={$previousid|htmlsafe}&format=print"><img src="./images/print/previous.png" alt="" /></a></td>
			<td><br/></td>
			<td align="right"><a href="./index.php?module=export&view=invoice&id={$nextid|htmlsafe}&format=print"><img src="./images/print/next.png" alt="" /></a></td>
		</tr>
	</table>
	
	<table class="left" width="100%" border="0">
	<tr>
		<td align="right" class="tbl1-bottom col1"><b>{$LANG.trading_type}</b></td>
		<td align="right" >{$trading_type.description|htmlsafe}</td>
		<td colspan="3"><br/></td>
		<td align="right" class="col1 tbl1-bottom"><b>{$LANG.summary}</b></td>
		<td><br /></td>
	</tr>		
	
	<tr>
	        <td align="right" class="tbl1-bottom col1"><b>{$LANG.biller}</b></td>
		<td align="right" >{$biller.name|htmlsafe}</td>
		<td colspan="3"><br/></td>
		<td align="right" class="tbl1-bottom col1"><b>{$LANG.index_id}</b></td>
		<td align="right">{$invoice.index_id}</td>
	</tr> 
				
	<tr>
		<td align="right" class="tbl1-bottom col1"><b>{$LANG.customer}</b></td>
		<td align="right">{$customer.customer_no|htmlsafe}-{$customer.name|htmlsafe}-{$customer.mobile_phone|htmlsafe}-{$customer.phone|htmlsafe}</td>
		<td colspan="3"><br/></td>
		<td align="right" class="tbl1-bottom col1"><b>{$LANG.date_time}</b></td>
		<td align="right">{$invoice.date}</td>
	</tr>	
	
	<tr>
		<td colspan="7"><br /></td>
	</tr>
	
	<tr>
		<td align="right" class="tbl1-bottom col1"><b>{$LANG.description}</b></td>
		<td align="right" class="tbl1-bottom col1"><b>{$LANG.currency}</b></td>
		<td align="right" class="tbl1-bottom col1"><b>{$LANG.quantity}</b></td>
		<td align="right" class="tbl1-bottom col1"><b>{$LANG.unit_price}</b></td>
		<td align="right" class="tbl1-bottom col1"><b>{$LANG.subtotal}</b></td>
		<td align="right" class="tbl1-bottom col1"><b>{$LANG.charge}</b></td>
		<td align="right" class="tbl1-bottom col1"><b>{$LANG.total}</b></td>
	</tr>
				
	{foreach from=$invoiceItems item=invoiceItem}	
		<tr>
			<td align="right">{$invoiceItem.description|htmlsafe}</td>
			<td align="right">{$invoiceItem.currency.code|htmlsafe}</td>
			<td align="right">{$preference.pref_currency_sign|htmlsafe}{$invoiceItem.quantity|siLocal_number_trim}</td>
			<td align="right">{$invoiceItem.unit_price|siLocal_number_clean}</td>
			<td align="right">{$preference.pref_currency_sign|htmlsafe}{$invoiceItem.subtotal|siLocal_number_clean}</td>
			<td align="right">{$preference.pref_currency_sign|htmlsafe}{$invoiceItem.charge|siLocal_number_clean}</td>
			<td align="right">{$preference.pref_currency_sign|htmlsafe}{$invoiceItem.total|siLocal_number_clean}</td>
		</tr>
	{/foreach}

	<tr>
		<td align="right" class="tbl1-bottom col1"><b>{$LANG.notes}</td>
		<td align="left" colspan="6"></b>{$invoice.note|outhtml}</td>	
	</tr>
	
	<tr>
		<td colspan="5"></td>
		<td align="right" class="tbl1-bottom col1"><b>{$preference.pref_inv_wording|htmlsafe} {$LANG.total}</b></td>
		<td align="right"><span class="double_underline"><b><u>{$preference.pref_currency_sign|htmlsafe}{$invoice.total|siLocal_number_clean}</u></b></span></td>
	</tr>		
		
	<tr>
		<td colspan="7"><br /></td>
	</tr>
		
	<tr>
		<td class="tbl1-bottom col1" colspan="7"><b>{$preference.pref_inv_detail_heading|htmlsafe}</b></td>
	</tr>
	
	<tr>
		<td colspan="7"><i><FONT SIZE="1">{$preference.pref_inv_detail_line|outhtml}</font></i></td>
	</tr>
	
	<tr>
		<td colspan="7"><i><FONT SIZE="1">{$preference.pref_inv_payment_method|htmlsafe}</font></i></td>
	</tr>

	<tr>
		<td colspan="7"><br /></td>
	</tr>
	
	<tr>
		<td colspan="7"><div style="font-size:8pt;" align="center">{$biller.footer|outhtml}</div></td>
	</tr>	
	</table>
	
<div id="footer"></div>
</div>
</body>
</html>
