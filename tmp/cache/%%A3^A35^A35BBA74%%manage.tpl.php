<?php /* Smarty version 2.6.18, created on 2014-12-05 00:28:00
         compiled from ../templates/default/invoices/manage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', '../templates/default/invoices/manage.tpl', 59, false),)), $this); ?>
<!-- <link href="include/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
<table class="buttons" align="center">
    <tr>
        <td>

            <a href="index.php?module=invoices&amp;view=itemised" class="positive">
                <img src="./images/common/add.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['new_invoice']; ?>

            </a>

        </td>
    </tr>
</table>

<?php if ($this->_tpl_vars['number_of_invoices']['count'] == 0): ?>
	<br />
	<span class="welcome"><?php echo $this->_tpl_vars['LANG']['no_invoices']; ?>
</span>
	<br />
<?php else: ?>
<br/>

<form action="index.php?module=invoices&amp;view=manage&amp;having=date_between&amp;start_date=<?php echo $this->_tpl_vars['start_date']; ?>
&amp;end_date=<?php echo $this->_tpl_vars['end_date']; ?>
" method="post">
<table align="center" border="1">
<tr wrap="nowrap">
	<td>
		<button type="submit" class="positive" name="submit" value="<?php echo $this->_tpl_vars['LANG']['submit']; ?>
"><?php echo $this->_tpl_vars['LANG']['submit']; ?>
</button>
	</td>
	<td>
		<?php echo $this->_tpl_vars['LANG']['start_date']; ?>
<br>
		(YYYY-MM-DD)
	</td>
	
	<td wrap="nowrap">
		<input 
			style="font-weight:bold"
			type="text" 
			class="validate[required] date-picker" 
			size="13" 
			name="start_date" 
			id="start_date"
			value=""
			AUTOCOMPLETE="OFF"
		/>   
	</td>

	<td>
		<?php echo $this->_tpl_vars['LANG']['end_date']; ?>
<br>
		(YYYY-MM-DD)
	</td>

	<td wrap="nowrap">
		<input 
			style="font-weight:bold"
			type="text" 
			class="validate[required] date-picker" 
			size="13" 
			name="end_date" 
			id="end_date" 
			value="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
"
			AUTOCOMPLETE="OFF"
		/>   
	</td>
	
	<td><?php echo $this->_tpl_vars['LANG']['start_date']; ?>
: <?php echo $this->_tpl_vars['start_date']; ?>
</td>
	
	<td><?php echo $this->_tpl_vars['LANG']['end_date']; ?>
: <?php echo $this->_tpl_vars['end_date']; ?>
</td>	
</tr>
</table>
</form>	
<br />
    <span class="welcome">
        <a style="font-weight:bold"><?php echo $this->_tpl_vars['LANG']['all']; ?>
</a>:
        <a href="index.php?module=invoices&amp;view=manage"><?php echo $this->_tpl_vars['LANG']['all']; ?>
</a> |
        <a href="index.php?module=invoices&amp;view=manage&amp;having=date_between&amp;start_date=<?php echo $this->_tpl_vars['start_date']; ?>
&amp;end_date=<?php echo $this->_tpl_vars['end_date']; ?>
"><?php echo $this->_tpl_vars['LANG']['date_between']; ?>
</a> |
        <a href="index.php?module=invoices&amp;view=manage&amp;having=this_year"><?php echo $this->_tpl_vars['LANG']['this_year']; ?>
</a> |
    	<a href="index.php?module=invoices&amp;view=manage&amp;having=this_month"><?php echo $this->_tpl_vars['LANG']['this_month']; ?>
</a> |
    	<a href="index.php?module=invoices&amp;view=manage&amp;having=today"><?php echo $this->_tpl_vars['LANG']['today']; ?>
</a>
       </span>
    <span class="welcome">
       	<a style="font-weight:bold"><?php echo $this->_tpl_vars['LANG']['buy']; ?>
</a>:
       	<a href="index.php?module=invoices&amp;view=manage&amp;having=note_buy"><?php echo $this->_tpl_vars['LANG']['all']; ?>
</a> |	
    	<a href="index.php?module=invoices&amp;view=manage&amp;having=date_between_note_buy&amp;start_date=<?php echo $this->_tpl_vars['start_date']; ?>
&amp;end_date=<?php echo $this->_tpl_vars['end_date']; ?>
"><?php echo $this->_tpl_vars['LANG']['date_between']; ?>
</a> |
    	<a href="index.php?module=invoices&amp;view=manage&amp;having=this_year_note_buy"><?php echo $this->_tpl_vars['LANG']['this_year']; ?>
</a> |
	<a href="index.php?module=invoices&amp;view=manage&amp;having=this_month_note_buy"><?php echo $this->_tpl_vars['LANG']['this_month']; ?>
</a> |
	<a href="index.php?module=invoices&amp;view=manage&amp;having=today_note_buy"><?php echo $this->_tpl_vars['LANG']['today']; ?>
</a>
   </span>
   <span class="welcome">
        <a style="font-weight:bold"><?php echo $this->_tpl_vars['LANG']['sell']; ?>
</a>:
        <a href="index.php?module=invoices&amp;view=manage&amp;having=note_sell"><?php echo $this->_tpl_vars['LANG']['all']; ?>
</a> |
       	<a href="index.php?module=invoices&amp;view=manage&amp;having=date_between_note_sell&amp;start_date=<?php echo $this->_tpl_vars['start_date']; ?>
&amp;end_date=<?php echo $this->_tpl_vars['end_date']; ?>
"><?php echo $this->_tpl_vars['LANG']['date_between']; ?>
</a> |
       	<a href="index.php?module=invoices&amp;view=manage&amp;having=this_year_note_sell"><?php echo $this->_tpl_vars['LANG']['this_year']; ?>
</a> |
   	<a href="index.php?module=invoices&amp;view=manage&amp;having=this_month_note_sell"><?php echo $this->_tpl_vars['LANG']['this_month']; ?>
</a> |
   	<a href="index.php?module=invoices&amp;view=manage&amp;having=today_note_sell"><?php echo $this->_tpl_vars['LANG']['today']; ?>
</a>
      </span>
          <br />
	<br />
	<table id="manageGrid" style="display:none"></table>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../modules/invoices/manage.js.php', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


	<div id="export_dialog" class="flora" title="Export">

		<table class="buttons">
			<tr>
				<td>

					<a
				     	title='<?php echo $this->_tpl_vars['LANG']['export_tooltip']; ?>
 <?php echo $this->_tpl_vars['LANG']['export_pdf_tooltip']; ?>
'
						class='export_pdf export_window' 
					>
						<img src="./images/common/page_white_acrobat.png" alt="" />
						<?php echo $this->_tpl_vars['LANG']['export_pdf']; ?>

					</a>
				  </td>
			</tr>
			<tr>
				<td>  
					
					<a 
						title='<?php echo $this->_tpl_vars['LANG']['export_tooltip']; ?>
 <?php echo $this->_tpl_vars['LANG']['export_xls_tooltip']; ?>
 .<?php echo $this->_tpl_vars['config']->export->spreadsheet; ?>
' 
						class='export_xls export_window'
				   >
						<img src="./images/common/page_white_excel.png" alt="" />
						<?php echo $this->_tpl_vars['LANG']['export_xls']; ?>

					</a>
					</td>
			</tr>
			<tr>
				<td>    
			
				   <a 
						title='<?php echo $this->_tpl_vars['LANG']['export_tooltip']; ?>
 <?php echo $this->_tpl_vars['LANG']['export_doc_tooltip']; ?>
 .<?php echo $this->_tpl_vars['config']->export->wordprocessor; ?>
'
						class='export_doc export_window' 
				   >
						<img src="./images/common/page_white_word.png" alt="" />
						<?php echo $this->_tpl_vars['LANG']['export_doc']; ?>

					</a>
				</td>
			</tr>
		</table>
	</div>
<?php endif; ?>

