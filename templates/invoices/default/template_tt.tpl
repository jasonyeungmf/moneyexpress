<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="{$css|urlsafe}" media="all">
<title>{$invoice.index_id|htmlsafe}</title>
</head>
<body class="body_tt" style="height:auto;width:auto;">
<div id="container_tt">
<table align="center" width="100%" border="0">
	<tr>
		<td rowspan="4"><img src="{$user_logo|urlsafe}" height=55  border="0" hspace="0" align="left"></td>
		<td class="head_1">{$user.name}</td>
		<th align="right"><span class="head_1">{$preference.pref_inv_heading|htmlsafe}</span></th>
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
		<!--	<td><FONT SIZE="1">{$LANG.email}: {$user.email}, {$LANG.website}: {$user.website}</font></td>	-->
		<td><FONT SIZE="1">{$LANG.email}: {$user.email}, {$LANG.website}: </font></td>
		<td>
			<a href="./index.php?module=export&view=invoice_tt&id={$nextid|htmlsafe}&format=print">
			<img src="./images/print/next.png" alt="" title="{$LANG.next}" align="right"/></a>	

			<a href="./index.php?module=invoices_tt&view=details&id={$currentid|htmlsafe}">
			<img src="./images/print/edit.png" alt="" title="{$LANG.edit}" align="right"/></a>		

			<a href="./index.php?module=invoices_tt&view=quick_view&id={$currentid|htmlsafe}">
			<img src="./images/print/view.png" alt="" title="{$LANG.view}" align="right"/></a>

			<a href="./index.php?module=export&view=invoice_tt&id={$previousid|htmlsafe}&format=print">
			<img src="./images/print/previous.png" alt="" title="{$LANG.previous}" align="right"/></a>
		</td>
	</tr>
</table>
	
<table align="center" width="100%" border="1">
	<tr>
		<td class="title">{$LANG.index_id}</td>
		<td class="data_2">{$invoice.index_id|htmlsafe}</td>

		<td class="title">{$LANG.internal_id}</td>
		<td class="data_2"></td>

		<td class="title">{$LANG.date_time}</td>
		<td class="data_2">{$invoice.date}</td>
	</tr>
	
	<tr>
		<td class="title">{$LANG.trading_type}</td>
		<td class="data_2">{$trading_type.description|htmlsafe}</td>

		<td class="title">{$LANG.biller}</td>
		<td class="data_2">{$biller.name|htmlsafe}</td>

		<td class="title">{$LANG.payment_type}</td>
		<!--	<td class="data_2">{$payment_type.pt_description|htmlsafe}</td>	-->
		<td class="data_2"></td>
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

<table align="left" width="100%" border="0">
	<tr>
		<td>
		<i><FONT SIZE="1">{$preference.pref_inv_payment_line1_name|htmlsafe} {$preference.pref_inv_payment_line1_value|htmlsafe}</font></i>
		</td>
	</tr>
</table>
</div>
</body>
</html>
