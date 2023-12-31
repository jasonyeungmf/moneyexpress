{if $mysql < 5 && $db_server == 'mysql'}

		{$LANG.note} <a href='index.php?module=documentation&amp;view=view&amp;page=help_mysql4' rel='gb_page_center[450, 450]' ><img src='./images/common/help-small.png' alt="" /></a> : {$LANG.mysql4_features_disabled}<br />
{/if}

<!-- Welcome message - start -->
<br />
{if $first_run_wizard == true}
<br />
 <span class="welcome">{$LANG.thank_you} {$LANG.before_starting}</span>
<br />
<br />
<br />

<table class="buttons" align="center">
{if $billers == null}
    <tr>
        <td>{$LANG.setup_as_biller}&nbsp;</td>
        <td>
            <a href="./index.php?module=billers&amp;view=add" class="positive">
                <img src="./images/common/user_add.png" alt="" />
                {$LANG.add_new_biller}
            </a>
        </td>
    </tr>
{/if}

{if $customers == null}
    <tr>
        <td>{$LANG.setup_add_customer}&nbsp;</td>
        <td>
            <a href="./index.php?module=customers&amp;view=add" class="positive">
                <img src="./images/common/vcard_add.png" alt="" />
                {$LANG.customer_add}
            </a>
        </td>
    </tr>
{/if}

{if $currencys_note == null}
    <tr>
        <td>{$LANG.add_new_currencynote}&nbsp;</td>
        <td>
            <a href="./index.php?module=currencys_note&amp;view=add" class="positive">
                <img src="./images/common/cart_add.png" alt="" />
                {$LANG.add_new_product}
            </a>
        </td>
    </tr>
{/if}

{if $currencys_tt == null}
    <tr>
        <td>{$LANG.currency_tt_add}&nbsp;</td>
        <td>
            <a href="./index.php?module=currencys_tt&amp;view=add" class="positive">
                <img src="./images/common/cart_add.png" alt="" />
                {$LANG.add_new_product}
            </a>
        </td>
    </tr>
{/if}    

{if $preferences == null}
    <tr>
        <td>{$LANG.setup_add_inv_pref}&nbsp;</td>
        <td>
            <a href="./index.php?module=preferences&amp;view=add" class="positive">
                <img src="./images/common/page_white_edit.png" alt="" />
                {$LANG.add_new_preference}
            </a>
        </td>
    </tr>
{/if}

    <tr>
        <td>{$LANG.setup_create_invoices}&nbsp;</td>
        <td>
            <a href="./index.php?module=invoices&amp;view=itemised" class="positive">
                <img src="./images/famfam/add.png" alt="" />
                {$LANG.new_invoice}
            </a>
        </td>
    </tr>
</table>
<br /><br />

<table class="buttons" align="center" >
    <tr>
        <td>{$LANG.setup_customisation}&nbsp;</td>
        <td>
            <a href="index.php?module=options&amp;view=index" class=""><img src="./images/common/cog_edit.png" alt=""/>{$LANG.settings}</a>
        </td>
    </tr>
</table>
<br /><br />
<!-- Welcome message - end -->

<!-- Do stuff menu  - start -->
{else}
<div>
<h2>{$LANG.start_working}</h2>
    <table class="buttons">
        <tr>
            <td>
                <a href="index.php?module=invoices&amp;view=itemised" class="positive">
                    <img src="./images/common/add.png" alt=""/>
                    {$LANG.add_new_invoice}
                </a>
            </td>
            <td>
                <a href="index.php?module=customers&amp;view=add" class="">
                    <img src="./images/common/vcard_add.png" alt=""/>
                    {$LANG.add_customer}
                </a>
            </td>
            <td>
                <a href="index.php?module=products&amp;view=add" class="">
                    <img src="./images/common/cart_add.png" alt=""/>
                    {$LANG.add_new_product}
                </a>
            </td>
        </tr>
    </table>
    <br />
<!-- Do stuff menu  - end -->

<!-- Don't forget to menu - start -->
<h2 class="align_left">{$LANG.dont_forget_to}</h2>
    <table class="buttons" >
        <tr>
            <td>
                <a href="index.php?module=options&amp;view=index" class="">
                    <img src="./images/common/cog_edit.png" alt=""/>
                    {$LANG.customise_settings}
                </a>
            </td>
            <td>
                <a href="./index.php?module=options&amp;view=backup_database" class="">
                    <img src="./images/common/database_save.png" alt=""/>
                    {$LANG.backup_your_database}
                </a>
            </td>
        </tr>
    </table>
    <br />
</div>
<!-- Don't forget to menu - end -->
{/if}
