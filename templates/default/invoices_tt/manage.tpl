<!-- <link href="include/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->

<table class="buttons" align="center">
    <tr>
        <td>
            <a href="index.php?module=invoices_tt&amp;view=add" class="positive"><img src="./images/common/add.png" alt="" />{$LANG.new_invoice}
            </a>

        </td>
    </tr>
</table>

{if $number_of_invoices.count == 0}
	
	<br />
	<br />
	<span class="welcome">{$LANG.no_invoices}</span>
	<br />
	<br />
	<br />
	<br />
{else}
<br />

<form action="index.php?module=invoices_tt&amp;view=manage&amp;having=date_between&amp;start_date={$start_date}&amp;end_date={$end_date}" method="post">
<table align="center" border="1">
<tr wrap="nowrap">
	<td>
		<button type="submit" class="positive" name="submit" value="{$LANG.submit}">{$LANG.submit}</button>
	</td>
	<td>
		{$LANG.start_date}<br>
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
		{$LANG.end_date}<br>
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
			value="{$smarty.now|date_format:"%Y-%m-%d"}"
			AUTOCOMPLETE="OFF"
		/>   
	</td>
	
	<td>{$LANG.start_date}: {$start_date}</td>
	
	<td>{$LANG.end_date}: {$end_date}</td>	
</tr>
</table>
</form>
    		
    <br />
    <span class="welcome">
        <a style="font-weight:bold">{$LANG.all}</a>:
        <a href="index.php?module=invoices_tt&amp;view=manage">{$LANG.all}</a> |
        <a href="index.php?module=invoices_tt&amp;view=manage&amp;having=date_between&amp;start_date={$start_date}&amp;end_date={$end_date}">
        	{$LANG.date_between}
        </a> |
        <a href="index.php?module=invoices_tt&amp;view=manage&amp;having=this_year">{$LANG.this_year}</a> |
    	<a href="index.php?module=invoices_tt&amp;view=manage&amp;having=this_month">{$LANG.this_month}</a> |
    	<a href="index.php?module=invoices_tt&amp;view=manage&amp;having=today">{$LANG.today}</a>
       </span>
    <span class="welcome">
       	<a style="font-weight:bold">{$LANG.buy}</a>:
       	<a href="index.php?module=invoices_tt&amp;view=manage&amp;having=buy">{$LANG.all}</a> |	
    	<a href="index.php?module=invoices_tt&amp;view=manage&amp;having=date_between_buy&amp;start_date={$start_date}&amp;end_date={$end_date}">	{$LANG.date_between}
    	</a> |
    	<a href="index.php?module=invoices_tt&amp;view=manage&amp;having=this_year_buy">{$LANG.this_year}</a> |
		<a href="index.php?module=invoices_tt&amp;view=manage&amp;having=this_month_buy">{$LANG.this_month}</a> |
		<a href="index.php?module=invoices_tt&amp;view=manage&amp;having=today_buy">{$LANG.today}</a>
   </span>
   <span class="welcome">
        <a style="font-weight:bold">{$LANG.sell}</a>:
        <a href="index.php?module=invoices_tt&amp;view=manage&amp;having=sell">{$LANG.all}</a> |
       	<a href="index.php?module=invoices_tt&amp;view=manage&amp;having=date_between_sell&amp;start_date={$start_date}&amp;end_date={$end_date}">	{$LANG.date_between}
       	</a> |
       	<a href="index.php?module=invoices_tt&amp;view=manage&amp;having=this_year_sell">{$LANG.this_year}</a> |
	   	<a href="index.php?module=invoices_tt&amp;view=manage&amp;having=this_month_sell">{$LANG.this_month}</a> |
	   	<a href="index.php?module=invoices_tt&amp;view=manage&amp;having=today_sell">{$LANG.today}</a>
      </span>
    <br />
    <br />
	<table id="manageGrid" style="display:none"></table>
	{include file='../modules/invoices_tt/manage.js.php'}


	<div id="export_dialog" class="flora" title="Export">

		<table class="buttons">
			<tr>
				<td>

					<a
				     	title='{$LANG.export_tooltip} {$LANG.export_pdf_tooltip}'
						class='export_pdf export_window' 
					>
						<img src="./images/common/page_white_acrobat.png" alt="" />
						{$LANG.export_pdf}
					</a>
				  </td>
			</tr>
			<tr>
				<td>  
					
					<a 
						title='{$LANG.export_tooltip} {$LANG.export_xls_tooltip} .{$config->export->spreadsheet}' 
						class='export_xls export_window'
				   >
						<img src="./images/common/page_white_excel.png" alt="" />
						{$LANG.export_xls}
					</a>
					</td>
			</tr>
			<tr>
				<td>    
			
				   <a 
						title='{$LANG.export_tooltip} {$LANG.export_doc_tooltip} .{$config->export->wordprocessor}'
						class='export_doc export_window' 
				   >
						<img src="./images/common/page_white_word.png" alt="" />
						{$LANG.export_doc}
					</a>
				</td>
			</tr>
		</table>
	</div>
{/if}


