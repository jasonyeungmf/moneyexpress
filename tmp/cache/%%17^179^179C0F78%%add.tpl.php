<?php /* Smarty version 2.6.18, created on 2014-02-27 01:50:30
         compiled from ../templates/default/cron/add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/cron/add.tpl', 34, false),array('modifier', 'siLocal_number', '../templates/default/cron/add.tpl', 34, false),array('modifier', 'date_format', '../templates/default/cron/add.tpl', 42, false),)), $this); ?>
<?php if ($this->_tpl_vars['saved'] == 'true'): ?>
	<meta http-equiv="refresh" content="2;URL=index.php?module=cron&amp;view=manage" />
	<br />
	 <?php echo $this->_tpl_vars['LANG']['save_cron_success']; ?>

	<br />
	<br />
<?php endif; ?>
<?php if ($this->_tpl_vars['saved'] == 'false'): ?>
	<meta http-equiv="refresh" content="2;URL=index.php?module=cron&amp;view=manage" />
	<br />
	 <?php echo $this->_tpl_vars['LANG']['save_cron_failure']; ?>

	<br />
	<br />
<?php endif; ?>

<?php if ($this->_tpl_vars['saved'] == false): ?>
	<?php if ($_POST['op'] == 'add' && $_POST['invoice_id'] == ''): ?> 
		<div class="validation_alert"><img src="./images/common/important.png" alt="" />
		You must select an invoice</div>
		<hr />
	<?php endif; ?>


<form name="frmpost" action="index.php?module=cron&view=add" method="POST" id="frmpost">
<br />	 

<table align="center">
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['invoice']; ?>
</td>
		<td>
		<select name="invoice_id" class="validate[required]">
		    <option value=''></option>
			<?php $_from = $this->_tpl_vars['invoice_all']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['invoice']):
?>
				<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['index_name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['biller'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
, <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['customer'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
, <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['invoice_total'])) ? $this->_run_mod_handler('siLocal_number', true, $_tmp) : siLocal::number($_tmp)); ?>
)</option>
			<?php endforeach; endif; unset($_from); ?>
		</select>
		</td>
	</tr>
    <tr wrap="nowrap">
            <td class="details_screen"><?php echo $this->_tpl_vars['LANG']['start_date']; ?>
</td>
            <td wrap="nowrap">
                <input type="text" class="validate[required,custom[date],length[0,10]] date-picker" size="10" name="start_date" id="date" value='<?php echo ((is_array($_tmp="+1 days")) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
' />   
            </td>
    </tr>
    <tr wrap="nowrap">
            <td class="details_screen"><?php echo $this->_tpl_vars['LANG']['end_date']; ?>
</td>
            <td wrap="nowrap">
                <input type="text" class="date-picker" size="10" name="end_date" id="date" value='' />   
            </td>
    </tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['recur_each']; ?>
</td>
		<td>
		<input name="recurrence" size="10" class="validate[required]">
		</input>
             <select name="recurrence_type" class="validate[required]">
             <option value="day"><?php echo $this->_tpl_vars['LANG']['days']; ?>
</option>
             <option value="week"><?php echo $this->_tpl_vars['LANG']['weeks']; ?>
</option>
             <option value="month"><?php echo $this->_tpl_vars['LANG']['months']; ?>
</option>
             <option value="year"><?php echo $this->_tpl_vars['LANG']['years']; ?>
</option>
             </select>
         </td>
     </tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['email_biller_after_cron']; ?>
</td>
		<td>
             <select name="email_biller" class="validate[required]">
             <option value="1"><?php echo $this->_tpl_vars['LANG']['yes']; ?>
</option>
             <option value="0"><?php echo $this->_tpl_vars['LANG']['no']; ?>
</option>
             </select>
         </td>
     </tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['email_customer_after_cron']; ?>
</td>
		<td>
             <select name="email_customer" class="validate[required]">
             <option value="1"><?php echo $this->_tpl_vars['LANG']['yes']; ?>
</option>
             <option value="0"><?php echo $this->_tpl_vars['LANG']['no']; ?>
</option>
             </select>
         </td>
     </tr>


</table>
<br />
<table class="buttons" align="center">
	<tr>
		<td>
			<button type="submit" class="positive" name="id" value="<?php echo $this->_tpl_vars['LANG']['save']; ?>
">
			    <img class="button_img" src="./images/common/tick.png" alt="" /> 
				<?php echo $this->_tpl_vars['LANG']['save']; ?>

			</button>

			<input type="hidden" name="op" value="add" />
		
			<a href="./index.php?module=cron&view=manage" class="negative">
		        <img src="./images/common/cross.png" alt="" />
	        	<?php echo $this->_tpl_vars['LANG']['cancel']; ?>

    		</a>
	
		</td>
	</tr>
</table>


</form>
<?php endif; ?>