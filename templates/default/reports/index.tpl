{*
<div>

<!-- Welcome message - start -->

<div class="welcome">
	<h2>Reports welcome message</h2>
	
	Thank you for choosing Simple Invoices! There are just a couple of things to do before you can start invoicing<br /><br />
	1 - Setup yourself up as a biller - <a href="index.php?module=biller&view=add">click here</a><br />
	
	<br /><br />
	Already know Simple Invoices by heart? You can <a href="">hide this text</a> forever then  <a href="">click here</a>
	

</div>
*}
<!-- Welcome message - end -->
<!-- Do stuff menu  - start -->
<br />
<table align="center">
<tr>
<td>

<h2>{$LANG.statements}<a name="statement" href=""></a></h2>
<table class="buttons" >
    <tr>
        <td>
            <a href="index.php?module=statement&view=index" class="">
                <img src="./images/famfam/money.png" alt="" />
                {$LANG.statement_of_invoices}
            </a>
        </td>
    </tr>
</table>
<br />
<h2>{$LANG.sales}<a name="sales" href=""></a></h2>
<table class="buttons" >
    <tr>
        <td>
            <a href="index.php?module=reports&view=report_sales_total" class="">
                <img src="./images/famfam/money.png" alt="" />
                {$LANG.total_sales}
            </a>
            <a href="index.php?module=reports&view=report_sales_by_periods" class="">
                <img src="./images/famfam/money.png" alt="" />
                {$LANG.monthly_sales_per_year}
            </a>
            <a href="index.php?module=reports&view=report_sales_customers_total" class="">
                <img src="./images/famfam/money.png" alt="" />
                {$LANG.sales_by_customers} 
            </a>                      
        </td>
    </tr>
</table>
{if $defaults.inventory == "1"}
    <br />
    <h2>{$LANG.profit}</h2>
    <table class="buttons" >
        <tr>
            <td>

                <a href="index.php?module=reports&view=report_invoice_profit" class="">
                    <img src="./images/famfam/money.png" alt="" />
                    {$LANG.profit_per_invoice}
                </a>
                

            </td>
        </tr>
    </table>
{/if}
<br />

<h2>{$LANG.products}</h2>
<table class="buttons" >
    <tr>
        <td>

            <a href="index.php?module=reports&view=report_products_sold_total" class="">
                <img src="./images/famfam/cart.png" alt="" />
                {$LANG.product_sales}
            </a>

            <a href="index.php?module=reports&view=report_products_sold_by_customer" class="">
                <img src="./images/famfam/cart.png" alt="" />
                {$LANG.products_by_customer}
            </a>            

        </td>
    </tr>
</table>
<br />

<h2>{$LANG.biller_sales}</h2>
<table class="buttons" >
    <tr>
        <td>

            <a href="index.php?module=reports&view=report_biller_total" class="">
                <img src="./images/famfam/user_suit.png" alt="" />
                {$LANG.biller_sales}
            </a>

            <a href="index.php?module=reports&view=report_biller_by_customer" class="">
                <img src="./images/famfam/user_suit.png" alt="" />
                {$LANG.biller_sales_by_customer_totals} {* TODO change this - remove total *}
            </a>            

        </td>
    </tr>
</table>
<br />

<h2>{$LANG.Other}</h2>
<table class="buttons" >
    <tr>
        <td>

            <a href="index.php?module=reports&view=database_log" class="">
                <img src="./images/famfam/database.png" alt="" />
                {$LANG.database_log}
            </a>

        </td>
    </tr>
</table>


</td>
</tr>
</table>
<br />
