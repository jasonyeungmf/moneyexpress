<?php /* Smarty version 2.6.18, created on 2015-01-08 02:55:17
         compiled from ../templates/default/index/index.tpl */ ?>
<?php if ($this->_tpl_vars['mysql'] < 5 && $this->_tpl_vars['db_server'] == 'mysql'): ?>

		<?php echo $this->_tpl_vars['LANG']['note']; ?>
 <a href='index.php?module=documentation&amp;view=view&amp;page=help_mysql4' rel='gb_page_center[450, 450]' ><img src='./images/common/help-small.png' alt="" /></a> : <?php echo $this->_tpl_vars['LANG']['mysql4_features_disabled']; ?>
<br />
<?php endif; ?>

<!-- Welcome message - start -->
<br />
<?php if ($this->_tpl_vars['first_run_wizard'] == true): ?>
<br />
 <span class="welcome"><?php echo $this->_tpl_vars['LANG']['thank_you']; ?>
 <?php echo $this->_tpl_vars['LANG']['before_starting']; ?>
</span>
<br />
<br />
<br />

<table class="buttons" align="center">
<?php if ($this->_tpl_vars['billers'] == null): ?>
    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['setup_as_biller']; ?>
&nbsp;</td>
        <td>
            <a href="./index.php?module=billers&amp;view=add" class="positive">
                <img src="./images/common/user_add.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['add_new_biller']; ?>

            </a>
        </td>
    </tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['customers'] == null): ?>
    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['setup_add_customer']; ?>
&nbsp;</td>
        <td>
            <a href="./index.php?module=customers&amp;view=add" class="positive">
                <img src="./images/common/vcard_add.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['customer_add']; ?>

            </a>
        </td>
    </tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['currencys_note'] == null): ?>
    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['add_new_currencynote']; ?>
&nbsp;</td>
        <td>
            <a href="./index.php?module=currencys_note&amp;view=add" class="positive">
                <img src="./images/common/cart_add.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['add_new_product']; ?>

            </a>
        </td>
    </tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['currencys_tt'] == null): ?>
    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['currency_tt_add']; ?>
&nbsp;</td>
        <td>
            <a href="./index.php?module=currencys_tt&amp;view=add" class="positive">
                <img src="./images/common/cart_add.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['add_new_product']; ?>

            </a>
        </td>
    </tr>
<?php endif; ?>    

<?php if ($this->_tpl_vars['preferences'] == null): ?>
    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['setup_add_inv_pref']; ?>
&nbsp;</td>
        <td>
            <a href="./index.php?module=preferences&amp;view=add" class="positive">
                <img src="./images/common/page_white_edit.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['add_new_preference']; ?>

            </a>
        </td>
    </tr>
<?php endif; ?>

    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['setup_create_invoices']; ?>
&nbsp;</td>
        <td>
            <a href="./index.php?module=invoices&amp;view=itemised" class="positive">
                <img src="./images/famfam/add.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['new_invoice']; ?>

            </a>
        </td>
    </tr>
</table>
<br /><br />

<table class="buttons" align="center" >
    <tr>
        <td><?php echo $this->_tpl_vars['LANG']['setup_customisation']; ?>
&nbsp;</td>
        <td>
            <a href="index.php?module=options&amp;view=index" class=""><img src="./images/common/cog_edit.png" alt=""/><?php echo $this->_tpl_vars['LANG']['settings']; ?>
</a>
        </td>
    </tr>
</table>
<br /><br />
<!-- Welcome message - end -->

<!-- Do stuff menu  - start -->
<?php else: ?>
<div>
<h2><?php echo $this->_tpl_vars['LANG']['start_working']; ?>
</h2>
    <table class="buttons">
        <tr>
            <td>
                <a href="index.php?module=invoices&amp;view=itemised" class="positive">
                    <img src="./images/common/add.png" alt=""/>
                    <?php echo $this->_tpl_vars['LANG']['add_new_invoice']; ?>

                </a>
            </td>
            <td>
                <a href="index.php?module=customers&amp;view=add" class="">
                    <img src="./images/common/vcard_add.png" alt=""/>
                    <?php echo $this->_tpl_vars['LANG']['add_customer']; ?>

                </a>
            </td>
            <td>
                <a href="index.php?module=products&amp;view=add" class="">
                    <img src="./images/common/cart_add.png" alt=""/>
                    <?php echo $this->_tpl_vars['LANG']['add_new_product']; ?>

                </a>
            </td>
        </tr>
    </table>
    <br />
<!-- Do stuff menu  - end -->

<!-- Don't forget to menu - start -->
<h2 class="align_left"><?php echo $this->_tpl_vars['LANG']['dont_forget_to']; ?>
</h2>
    <table class="buttons" >
        <tr>
            <td>
                <a href="index.php?module=options&amp;view=index" class="">
                    <img src="./images/common/cog_edit.png" alt=""/>
                    <?php echo $this->_tpl_vars['LANG']['customise_settings']; ?>

                </a>
            </td>
            <td>
                <a href="./index.php?module=options&amp;view=backup_database" class="">
                    <img src="./images/common/database_save.png" alt=""/>
                    <?php echo $this->_tpl_vars['LANG']['backup_your_database']; ?>

                </a>
            </td>
        </tr>
    </table>
    <br />
</div>
<!-- Don't forget to menu - end -->
<?php endif; ?>