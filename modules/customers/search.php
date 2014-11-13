<?php
checkLogin();

$smarty -> display("../templates/default/menu.tpl");
$smarty -> display("../templates/default/main.tpl");

echo <<<EOD
	<div>
	<form action="index.php?module=customers&view=search" method="post">
	<input type="text" name="name" />
	<input type="submit" value="Search">
	</form>
EOD;

$customers = searchCustomers($_POST['name']);

echo "<table> <br />";

foreach($customers as $customer) {
	echo <<<EOD
		
		<tr>
			<td>$customer[name]&nbsp;&nbsp;</td>
			<td><a href="index.php?module=invoices&view=itemised&customer_id=$customer[id]">Itemised</a> |</td> 
			<td><a href="index.php?module=invoices&view=consulting&customer_id=$customer[id]">&nbsp;Consulting</a> |</td> 
			<td><a href="index.php?module=invoices&view=total&customer_id=$customer[id]">&nbsp;Total</a></td> 
		</tr>
EOD;
}

echo "</table></div>";

//getMenuStructure();
exit(); //Fix double menu display ;-) - Gates

?>
