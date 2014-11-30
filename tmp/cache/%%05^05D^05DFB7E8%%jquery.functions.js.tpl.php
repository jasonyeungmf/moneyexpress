<?php /* Smarty version 2.6.18, created on 2014-12-01 02:23:27
         compiled from ../include/jquery/jquery.functions.js.tpl */ ?>
<?php echo '
<script type="text/javascript">
	/*
	* Script: jquery.functions.js
	* Purpose: jquery/javascript functions for Simple Invoices 
	*/
	
	// for autocomplete in papyment page
	function selectItem(li) {
		if (li.extra)
	        document.getElementById("js_total").innerHTML= " " + li.extra[0] + " "
	}
	
	// for autocomplete in papyment page
	function formatItem(row) {
		return row[0] + "<br><i>" + row[1] + "</i>";
	}
	
	//delete line item in new invoice page
	function delete_row(row_number)
	{
	//	$(\'#row\'+row_number).hide(); 
		$(\'#row\'+row_number).remove();
	}
	
	//dlete line item in EDIT page
	function delete_line_item(row_number)
	{
		$(\'#row\'+row_number).hide(); 
		$(\'#quantity\'+row_number).removeAttr(\'value\');
		$(\'#delete\'+row_number).attr(\'value\',\'yes\');
	}
	
	//trading type change
	function invoice_trading_type_change(trading_type, row_number, currency, quantity, charge){
		
		if(trading_type == "1"){
			var $currency_ajax = \'currency_ajax_note_buy\';
		}
		if(trading_type == "2"){
			var $currency_ajax = \'currency_ajax_note_sell\';
		}
		
      	$(\'#gmail_loading\').show();
		$.ajax({
			type: \'GET\',
			url: \'./index.php?module=invoices&view=\'+$currency_ajax+\'&id=\'+currency,
			data: "id: "+currency,
			dataType: "json",
			success: function(data){
				$(\'#gmail_loading\').hide();
				/*$(\'#state\').html(data);*/
				/*if ( (quantity.length==0) || (quantity.value==null) ) */
				if (quantity=="") 
				{	
					$("#quantity"+row_number).attr("value","1");
				}
				
				$("#unit_price"+row_number).attr("value",data[\'unit_price\']);
				
				if(trading_type == "1"){
					$("#note_cost"+row_number).attr("value","0");
				}
				if(trading_type == "2"){
					$("#note_cost"+row_number).attr("value",data[\'note_cost\']);
				}		
				
				//subtotal and total count
				var $quantity = $("#quantity"+row_number).attr("value");
				var $subtotal = $quantity * $("#unit_price"+row_number).attr("value");
					$subtotal = Math.round($subtotal*100)/100;
				var $charge = ($("#charge"+row_number).attr("value") - 0);
				var $total = $subtotal + $charge;
					$total = Math.round($total*100)/100;
				$("#subtotal"+row_number).attr("value",$subtotal);
				$("#total"+row_number).attr("value",$total);
				
				//invoice total count
				//count_invoice_line_items();
				var $rowID_last = $("#max_items").attr("value");
				var $invoice_total = 0;
				for(var $i=0;$i<=$rowID_last;$i++)
				{
					$invoice_total += ($("#total"+$i).attr("value") - 0);
				}
				$invoice_total = Math.round($invoice_total*100)/100;
				$("#invoice_total").attr("value",$invoice_total);	
				
				$("#tax_id\\\\["+row_number+"\\\\]\\\\[0\\\\]").val(data[\'default_tax_id\']);
				if (data[\'default_tax_id_2\']== null)
				{
					$("#tax_id\\\\["+row_number+"\\\\]\\\\[1\\\\]").val(\'\');
				}
				if (data[\'default_tax_id_2\'] !== null)
				{
					$("#tax_id\\\\["+row_number+"\\\\]\\\\[1\\\\]").val(data[\'default_tax_id_2\']);
				}
			}
	
   		 });
     }

	/* Currency change*/
	function invoice_currency_change(currency, row_number, quantity, charge,trading_type){
		
		if(trading_type == "1"){
			var $currency_ajax = \'currency_ajax_note_buy\';
		}
		if(trading_type == "2"){
			var $currency_ajax = \'currency_ajax_note_sell\';
		}
		
      	$(\'#gmail_loading\').show();
		$.ajax({
			type: \'GET\',
			url: \'./index.php?module=invoices&view=\'+$currency_ajax+\'&id=\'+currency,
			data: "id: "+currency,
			dataType: "json",
			success: function(data){
				$(\'#gmail_loading\').hide();
				/*$(\'#state\').html(data);*/
				/*if ( (quantity.length==0) || (quantity.value==null) ) */
				if (quantity=="") 
				{	
					$("#quantity"+row_number).attr("value","0");
				}
				
				$("#unit_price"+row_number).attr("value",data[\'unit_price\']);
				
				//note cost
				if(trading_type == "1"){
					$("#note_cost"+row_number).attr("value","0");
				}
				if(trading_type == "2"){
					$("#note_cost"+row_number).attr("value",data[\'note_cost\']);
				}				
				
				//subtotal and total count
				var $quantity = $("#quantity"+row_number).attr("value");
				var $subtotal = $quantity * $("#unit_price"+row_number).attr("value");
					$subtotal = Math.round($subtotal*100)/100;
				var $charge = ($("#charge"+row_number).attr("value") - 0);
				var $total = $subtotal + $charge;
					$total = Math.round($total*100)/100;
				$("#subtotal"+row_number).attr("value",$subtotal);
				$("#total"+row_number).attr("value",$total);
						
				//invoice total count
				count_invoice_line_items();
				var $rowID_last = $("#max_items").attr("value");
				var $invoice_total = 0;
				for(var $i=0;$i<=$rowID_last;$i++)
				{
					$invoice_total += ($("#total"+$i).attr("value") - 0);
				}
				$invoice_total = Math.round($invoice_total*100)/100;
				$("#invoice_total").attr("value",$invoice_total);	
				
				$("#tax_id\\\\["+row_number+"\\\\]\\\\[0\\\\]").val(data[\'default_tax_id\']);
				if (data[\'default_tax_id_2\'] == null)
				{
					$("#tax_id\\\\["+row_number+"\\\\]\\\\[1\\\\]").val(\'\');
				}
				if (data[\'default_tax_id_2\'] !== null)
				{
					$("#tax_id\\\\["+row_number+"\\\\]\\\\[1\\\\]").val(data[\'default_tax_id_2\']);
				}
			}
   		 });
     }
	 
	 function start_date_change(start_date,end_date){
      	$(\'#gmail_loading\').show();
		$.ajax({
			type: \'GET\',
			url: \'./index.php?module=invoices&view=manage&having=date_between&start_date=\'+start_date+\'&end_date=\'+end_date,
			data: "start_date="+start_date+"&end_date="+end_date,
			dataType: "json",
			success: function(data){
				$(\'#gmail_loading\').hide();		
				
			}
   		 });
     }
    
	/*
	 * Function: count_invoice_line_items
	 * Purpose: find the last line item and update max_items so /modules/invoice/save.php can access it
	 */
	function count_invoice_line_items()
	{
		var lastRow = $(\'#itemtable tbody.line_item:last\'); 
		var rowID_last = $("input[@id^=\'quantity\']",lastRow).attr("id");
		rowID_last = parseInt(rowID_last.slice(8)); //using 8 as \'quantity\' has eight letters and want to get the number thats after that
		/*$("#max_items").val(rowID_last);*/
		$("#max_items").attr(\'value\',rowID_last);
		siLog(\'debug\', \'Max Items = \'+rowID_last );
		
	}

	/*
	* function: siLog
	* purpose: wrapper function for blackbirdjs logging
	* if debugging is OFF in config.ini - then blackbirdjs.js wont be loaded in header.tpl and normal call to log.debug would fail and cause problems
	*/
	function siLog(level,message)
	{
		log_level = "log." + level + "(\'" + message + "\')";
		
		//if blackbirdjs is loaded (ie. debug in config.ini is on) run - else do nothing
		if(window.log)
		{
			eval(log_level);
		}
	}
	
     /*
	 * function: add_line_item
	 * purpose: to add a new line item in invoice creation page
	 * */
	function add_line_item()
	{
		$(\'#gmail_loading\').show();
		
		//clone the last tr in the item table
		var clonedRow = $(\'#itemtable tbody.line_item:first\').clone(); 
		var lastRow = $(\'#itemtable tbody.line_item:last\').clone(); 
	
		//find the Id for the row from the quantity if
		var rowID_old = $("input[@id^=\'quantity\']",clonedRow).attr("id");
		var rowID_last = $("input[@id^=\'quantity\']",lastRow).attr("id");
		rowID_old = parseInt(rowID_old.slice(8)); //using 8 as \'quantity\' has eight letters and want to get the number thats after that
		rowID_last = parseInt(rowID_last.slice(8)); //using 8 as \'quantity\' has eight letters and want to get the number thats after that
	
		//create next row id
		var rowID_new = rowID_last + 1;
		
		siLog(\'debug\',\'Line item \'+rowID_new+\'added\');
		//log.debug( \'Line item \'+rowID_new+\'added\');
	
		//console.log("Old row ID: "+rowID_old);
		//console.log("New row ID:"+rowID_new);
		//console.log("Last row ID:"+rowID_last);
	
		//update all the row items
		//
	
		clonedRow.attr("id","row"+rowID_new);
		//trash image
		clonedRow.find("#trash_link"+rowID_old).attr("id", "trash_link"+rowID_new);
		clonedRow.find("#trash_link"+rowID_new).attr("name", "trash_link"+rowID_new);
		clonedRow.find("#trash_link_edit"+rowID_old).attr("id", "trash_link_edit"+rowID_new);
		clonedRow.find("#trash_link_edit"+rowID_new).attr("name", "trash_link_edit"+rowID_new);

		//update teh hidden delete field
		clonedRow.find("#delete"+rowID_old).attr("id", "delete"+rowID_new);
		clonedRow.find("#delete"+rowID_new).attr("name", "delete"+rowID_new);
		//update the delete icon
		clonedRow.find("#delete_image"+rowID_old).attr("id", "delete_image"+rowID_new);
		clonedRow.find("#delete_image"+rowID_new).attr("name", "delete_image"+rowID_new);
		clonedRow.find("#delete_image"+rowID_new).attr("src", "./images/common/delete_item.png");

		clonedRow.find("#trash_link"+rowID_new).attr("href", "#");
		clonedRow.find("#trash_link"+rowID_new).attr("rel", rowID_new);
		clonedRow.find("#trash_link_edit"+rowID_new).attr("href", "#");
		clonedRow.find("#trash_link_edit"+rowID_new).attr("rel", rowID_new);
	
		clonedRow.find("#trash_image"+rowID_old).attr("src", "./images/common/delete_item.png");
		clonedRow.find("#trash_image"+rowID_old).attr("title", "Delete this row");
	
		//edit invoice - newly added line item
		clonedRow.find("#line_item"+rowID_old).attr("id", "line_item"+rowID_new);
		clonedRow.find("#line_item"+rowID_new).attr("name", "line_item"+rowID_new);
		clonedRow.find("#line_item"+rowID_new).val(\'\');
	
		//clonedRow.find("#currencys"+rowID_old).removeAttr("onchange");
		clonedRow.find("#currencys"+rowID_old).attr("rel", rowID_new);
		clonedRow.find("#currencys"+rowID_old).attr("id", "currencys"+rowID_new);
		clonedRow.find("#currencys"+rowID_new).attr("name", "currencys"+rowID_new);
		//clonedRow.find("#currencys"+rowID_new).removeClass("validate[required]");

		clonedRow.find("#quantity"+rowID_old).attr("rel", rowID_new);
		$("#quantity"+rowID_old, clonedRow).attr("id", "quantity"+rowID_new);
		$("#quantity"+rowID_new, clonedRow).attr("name", "quantity"+rowID_new);
		clonedRow.find("#quantity"+rowID_new).removeAttr("value");
		//clonedRow.find("#quantity"+rowID_new).removeClass("validate[required]");

		clonedRow.find("#unit_price"+rowID_old).attr("rel", rowID_new);
		$("#unit_price"+rowID_old, clonedRow).attr("id", "unit_price"+rowID_new);
		$("#unit_price"+rowID_new, clonedRow).attr("name", "unit_price"+rowID_new);
		$("#unit_price"+rowID_new, clonedRow).val("");
		//$("#unit_price"+rowID_new, clonedRow).removeClass("validate[required]");
		
		clonedRow.find("#subtotal"+rowID_old).attr("rel", rowID_new);
		$("#subtotal"+rowID_old, clonedRow).attr("id", "subtotal"+rowID_new);
		$("#subtotal"+rowID_new, clonedRow).attr("name", "subtotal"+rowID_new);
		clonedRow.find("#subtotal"+rowID_new).removeAttr("value");
		//clonedRow.find("#subtotal"+rowID_new).removeClass("validate[required]");
		
		clonedRow.find("#charge"+rowID_old).attr("rel", rowID_new);
		$("#charge"+rowID_old, clonedRow).attr("id", "charge"+rowID_new);
		$("#charge"+rowID_new, clonedRow).attr("name", "charge"+rowID_new);
		$("#charge"+rowID_new, clonedRow).val("0");
		//clonedRow.find("#charge"+rowID_new).removeClass("validate[required]");
		
		clonedRow.find("#total"+rowID_old).attr("rel", rowID_new);
		$("#total"+rowID_old, clonedRow).attr("id", "total"+rowID_new);
		$("#total"+rowID_new, clonedRow).attr("name", "total"+rowID_new);
		clonedRow.find("#total"+rowID_new).removeAttr("value");
		//clonedRow.find("#total"+rowID_new).removeClass("validate[required]");
		
		clonedRow.find("#note_cost"+rowID_old).attr("rel", rowID_new);
		$("#note_cost"+rowID_old, clonedRow).attr("id", "note_cost"+rowID_new);
		$("#note_cost"+rowID_new, clonedRow).attr("name", "note_cost"+rowID_new);
		$("#note_cost"+rowID_new, clonedRow).val("");
		//$("#note_cost"+rowID_new, clonedRow).removeClass("validate[required]");
	
		$("#description"+rowID_old, clonedRow).attr("id", "description"+rowID_new);
		$("#description"+rowID_new, clonedRow).attr("name", "description"+rowID_new);
		//$("#description"+rowID_new, clonedRow).attr("value","'; ?>
<?php echo $this->_tpl_vars['LANG']['description']; ?>
<?php echo '");
		//$("#description"+rowID_new, clonedRow).css({ color: "#b2adad" });
	
		$(\'#itemtable\').append(clonedRow);
		
		$(\'#gmail_loading\').hide();
	
	}
	
	//the export dialog in the manage invoices page
	function export_invoice(row_number,spreadsheet,wordprocessor){
	
	
		 $("#export_dialog").show();
			siLog(\'debug\',\'export_dialog_show\');
		 $(".export_pdf").attr({ 
	          //href: "index.php?module=export&view=pdf&id="+row_number
			  href: "index.php?module=export&view=invoice&id="+row_number+"&format=pdf"
	        });
		 $(".export_doc").attr({ 
			  href: "index.php?module=export&view=invoice&id="+row_number+"&format=file&filetype="+wordprocessor
	        });	 
	      $(".export_xls").attr({ 
	          href: "index.php?module=export&view=invoice&id="+row_number+"&format=file&filetype="+spreadsheet
	        });							
		 $("#export_dialog").dialog({ 
		   modal: true, 
		   buttons: { 
	        "Cancel": function() { 
	            $(this).dialog("destroy"); 
	        }
	        },
		    overlay: { 
		        opacity: 0.5, 
		        background: "black" 
		    },
			close: function() { $(this).dialog("destroy")}
		});
	
	}

	
	/*
	 * Function: invoice_save_remove_autofill
	 * Purpose: remove the autofilled text in the line items notes box
	 * NOTE - might remove this as php can handle this
	 */
	//delete - not used anymore
	function invoice_save_remove_autofill()
	{
		siLog(\'debug\',\'exectued invoice save remove\');
		
		var description = $("textarea[@id^=\'description\']").attr("value");

		if (description ==\''; ?>
<?php echo $this->_tpl_vars['LANG']['description']; ?>
<?php echo '\')
		{
			siLog(\'info\',\'autofill value of \'+description+\' to be removed removed\');
			$("textarea[@id^=\'description\']").val(\'\');
			siLog(\'info\',\'autofill value was removed\');
		}
		
	}

var timerID = null;
var timerRunning = false;
function stopclock ()
	{
		if(timerRunning)
		clearTimeout(timerID);
		timerRunning = false;
	}

function startclock() 
	{
		stopclock();
		showtime();
	}
function showtime() 
	{
		var now = new Date();
		var hours = now.getHours();
		var minutes = now.getMinutes();
		var seconds = now.getSeconds();
		var milliseconds = now.getMilliseconds();
		var Years = now.getFullYear();
		var Months = now.getMonth() + 1;
		var Dates = now.getDate();
			
		if ( Months < 10 )
			{
				Months = "0" + Months;
			}
		if ( Dates < 10 )
			{
				Dates = "0" + Dates;
			}
		if ( milliseconds < 10 )
			{
				milliseconds = "00" + milliseconds;
			}
		if ( milliseconds > 9 && milliseconds < 100 )
			{
				milliseconds = "0" + milliseconds;
			}
		
		var timeValue_1 = Years + "" + Months + "" + Dates + "-";
		timeValue_1 += ((hours < 10) ? "0" : "") + hours;
		timeValue_1 += ((minutes < 10) ? "0" : "") + minutes;
		timeValue_1 += ((seconds < 10) ? "0" : "") + seconds;
		timeValue_1 += "-" + milliseconds;
//		$("#index_id").attr("value",timeValue_1);//use in input
		
		var index_no = Years + "" + Months + "" + Dates + "-";
		var maxNum = 100000;  
		var minNum = 0;
		var no = Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum;
		
		if ( no < 10 )
		{
			no = "0000" + no;
		}
		if ( no > 9 && no < 100 )
		{
			no = "000" + no;
		}
		if ( no > 99 && no < 1000 )
		{
				no = "00" + no;
		}
		if ( no > 999 && no < 10000 )
		{
				no = "0" + no;
		}
		index_no += no;
		var $trading_type = $("#trading_type_id").val();
		if($trading_type == "1"){
			$("#index_id").attr("value","NB" + index_no);
		}
		if($trading_type == "2"){
			$("#index_id").attr("value","NS" + index_no);
		}
		if($trading_type == "3"){
			$("#index_id").attr("value","TB" + index_no);
		}
		if($trading_type == "4"){
			$("#index_id").attr("value","TS" + index_no);
		}
		
		//show date time	
		var timeValue_2 = Years + "-" + Months + "-" + Dates + " ";
		timeValue_2 += ((hours < 10) ? "0" : "") + hours;
		timeValue_2 += ((minutes < 10) ? ":0" : ":") + minutes;
		timeValue_2 += ((seconds < 10) ? ":0" : ":") + seconds;
//		$(\'#showtime\').html(timeValue_2);//can not use in text
//		document.getElementById("date1").innerHTML = timeValue_2;//can not use in text
		$("#date1").attr("value",timeValue_2);//use in text
			
		timerID = setTimeout("showtime()",20);
		timerRunning = true;
	}

//generate index number
function indexNO()
{
var now = new Date();
var Years = now.getFullYear();
var Months = now.getMonth() + 1;
var Dates = now.getDate();
var maxNum = 100000;  
var minNum = 0;
 			
if ( Months < 10 )
	{
		Months = "0" + Months;
	}
if ( Dates < 10 )
	{
		Dates = "0" + Dates;
	}
var index_no = Years + "" + Months + "" + Dates + "-";

var no = Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum;
if ( no < 10 )
	{
		no = "0000" + no;
	}
if ( no > 9 && no < 100 )
	{
		no = "000" + no;
	}
if ( no > 99 && no < 1000 )
	{
		no = "00" + no;
	}
if ( no > 999 && no < 10000 )
	{
		no = "0" + no;
	}
index_no += no;
$("#index_id").attr("value",index_no);
}

function toWords(s){
	// Convert numbers to words
	// copyright 25th July 2006, by Stephen Chapman http://javascript.about.com
	// permission to use this Javascript on your web page is granted
	// provided that all of the code (including this copyright notice) is
	// used exactly as shown (you can change the numbering system if you wish)

	// American Numbering System
	var th = [\'\',\'thousand\',\'million\', \'billion\',\'trillion\'];
	// uncomment this line for English Number System
	// var th = [\'\',\'thousand\',\'million\', \'milliard\',\'billion\'];

	var dg = [\'zero\',\'one\',\'two\',\'three\',\'four\', \'five\',\'six\',\'seven\',\'eight\',\'nine\']; 
	var tn = [\'ten\',\'eleven\',\'twelve\',\'thirteen\', \'fourteen\',\'fifteen\',\'sixteen\', \'seventeen\',\'eighteen\',\'nineteen\']; 
	var tw = [\'twenty\',\'thirty\',\'forty\',\'fifty\', \'sixty\',\'seventy\',\'eighty\',\'ninety\']; 
	s = s.toString(); 
	s = s.replace(/[\\, ]/g,\'\'); 

	if (s != parseFloat(s)) 
		return \'not a number\'; 
		var x = s.indexOf(\'.\'); 

	if (x == -1) 
		x = s.length; 

	if (x > 15) 
		return \'too big\';
		var n = s.split(\'\'); 
		var str = \'\'; 
		var sk = 0; 

	for (var i=0; i < x; i++) {
		if ((x-i)%3==2) {
			if (n[i] == \'1\'){
				str += tn[Number(n[i+1])] + \' \'; 
				i++; 
				sk=1;
			} 

			else if (n[i]!=0) {
				str += tw[n[i]-2] + \' \';
				sk=1;
			}
		} 

		else if (n[i]!=0) {
			str += dg[n[i]] +\' \'; 
			if ((x-i)%3==0) 
				str += \'hundred \';
				sk=1;
		} 

		if ((x-i)%3==1) {
			if (sk) 
				str += th[(x-i-1)/3] + \' \';
				sk=0;
		}
	} 

	if (x != s.length) {
		var y = s.length; 
		str += \'point \'; 

		for (var i=x+1; i<y; i++) 
			str += dg[n[i]] +\' \';
	} 
	return str.replace(/\\s+/g,\' \');
}

// T/T customer change
function customer_change(customer_id){
	$(\'#gmail_loading\').show();
	$.ajax({
		type: \'GET\',
		url: \'./index.php?module=invoices_tt&view=ajax_customer&id=\'+customer_id,
		data: "id: "+customer_id,
		dataType: "json",
		success: function(data){
		$(\'#gmail_loading\').hide();
					
		if (data[\'id_no\'] !== ""){
			id = \'(ID)\';
		}
		if (data[\'id_no\'] == ""){
			id = \'\';
		}
		$("#customer_name").attr("value",data[\'name\'] + "-" + data[\'attention\'] + "-" + id + "-" + data[\'mobile_phone\'] + "-" +data[\'phone\'] + "-" + data[\'fax\']);
		}
   });
}

// T/T account change
function account_change(account_id){
	$(\'#gmail_loading\').show();
	$.ajax({
		type: \'GET\',
		url: \'./index.php?module=invoices_tt&view=ajax_account&id=\'+account_id,
		data: "id: "+account_id,
		dataType: "json",
		success: function(data){
		$(\'#gmail_loading\').hide();
		
		$("#customer_id").attr("value",data[\'customer_no\']);
		$("#payee").attr("value",data[\'payee\']);
		$("#bank").attr("value",data[\'bank\']);
		$("#account_no").attr("value",data[\'account_no\']);
		$customer_id = $("#customer_id").val();
		if($customer_id != "1")
		{
			customer_change($customer_id);
		}
		if($customer_id == "1")
		{
			$("#customer_name").attr("value",data[\'name\']);
		}
		
		}
   });
}

// T/T invoice_product_change
function tt_invoice_product_change(product,trading_type){
	$(\'#gmail_loading\').show();
	$.ajax({
		type: \'GET\',
		url: \'./index.php?module=invoices_tt&view=ajax_product&id=\'+product,
		data: "id: "+product,
		dataType: "json",
		success: function(data){
			$(\'#gmail_loading\').hide();
			
			if(trading_type == "3" && product == "1"){
				$("#unit_price").attr("value","");
			}
			
			if(trading_type == "3" && product != "1"){
				$("#unit_price").attr("value",data[\'tt_buy\']);
			}
			
			if(trading_type == "4" && product == "1"){
				$("#unit_price").attr("value","");
			}
			
			if(trading_type == "4" && product != "1"){
				$("#unit_price").attr("value",data[\'tt_sell\']);
			}
		}
   });
}

//the export dialog in the manage invoices_tt page
	function export_invoicett(row_number,spreadsheet,wordprocessor){
	
	
		 $("#export_dialog").show();
			siLog(\'debug\',\'export_dialog_show\');
		 $(".export_pdf").attr({ 
	          //href: "index.php?module=export&view=pdf&id="+row_number
			  href: "index.php?module=export&view=invoice_tt&id="+row_number+"&format=pdf"
	        });
		 $(".export_doc").attr({ 
			  href: "index.php?module=export&view=invoice_tt&id="+row_number+"&format=file&filetype="+wordprocessor
	        });	 
	      $(".export_xls").attr({ 
	          href: "index.php?module=export&view=invoice_tt&id="+row_number+"&format=file&filetype="+spreadsheet
	        });							
		 $("#export_dialog").dialog({ 
		   modal: true, 
		   buttons: { 
	        "Cancel": function() { 
	            $(this).dialog("destroy"); 
	        }
	        },
		    overlay: { 
		        opacity: 0.5, 
		        background: "black" 
		    },
			close: function() { $(this).dialog("destroy")}
		});
	
	}
//no use	
function province_change(province,bank_2,city){
	$(\'#gmail_loading\').show();
	$.ajax({
		type: \'GET\',
		url: \'./index.php?module=accounts&view=ajax_province&id=\'+province,
		data: "id: "+province,
		dataType: "json",
		success: function(data){
			$(\'#gmail_loading\').hide();
			bank = bank_2 + data[\'name\'] + city;
			$("#bank").attr("value",bank);
		}
   });
   
   $.ajax({
		type: \'GET\',
		url: \'./index.php?module=accounts&view=ajax_city&id=\'+province,
		data: "id: "+province,
		dataType: "json",
		success: function(data){
			$(\'#gmail_loading\').hide();
			$("#city").html(data);
			
		}
   });
}

</script>
'; ?>
