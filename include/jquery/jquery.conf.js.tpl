{literal}
<script type="text/javascript">
$(document).ready(function(){

	$("#Container").after(
	'<div id="confirm_delete_line_item" style="display: hidden;" title="Delete this line item?">' +
		'<div style="padding-right: 2em;">If you choose "Delete" the line item will be removed on Save.</div>' +
	'</div>'
	);
	
      	$("#confirm_delete_line_item").dialog({
			autoOpen: false,
			bgiframe: true,
			resizable: false,
			modal: true,
			width:300,
			height:170,
			overlay: {
				backgroundColor: '#000',
				opacity: 0.5
			},
			buttons: {
				Delete: function() {
					var delete_function = $("#confirm_delete_line_item").data('delete_function');
					(delete_function)();
					$(this).dialog('close');
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			}
		});
	/*
	Load the jquery datePicker with out config
	*/
	if($.datePicker){
		$.datePicker.setDateFormat('ymd','-');
		$('input.date-picker').datePicker({startDate:'01/01/1970'});
		$('input#date2').datePicker({endDate:'01/01/1970'});
	}
	if($(".showdownloads")){
		$(".showdownloads").click(function(){
				var offset = $(this).offset();
				$(this)
					.next(".downloads")
						.css("top", offset.top + "px")
						.css("left", offset.left + "px")
						.css("position", "absolute")
						.css("background-color", "#F1F1F1")
						.css("padding", "5px")
						.css("border", "solid 1px #CCC")
						.hover(function(){}, function(){$(this).hide()})
						.show();
				return false;
			})
	}
	if($("#ac_me")){
		$("#ac_me").autocomplete("index.php?module=payments&view=process_ajax", { minChars:1, matchSubset:1, matchContains:1, cacheLength:10, onItemSelect:selectItem, formatItem:formatItem, selectOnly:1 });
	}
	
	if ($('#tabs_customer'))
		$('#tabs_customer').tabs();
			
	if($('#trigger-tab'))
		$('#trigger-tab').after('<p><a href="#" onclick="$(\'#container-1\').triggerTab(3); return false;">Activate third tab</a></p>');
				
	if($('#custom-tab-by-hash')){
		$('#custom-tab-by-hash').click(function() {
		    var win = window.open(this.href, '', 'directories,location,menubar,resizable,scrollbars,status,toolbar');
		    win.focus();
		});
	}
	
	
	/*Load the cluetip - only if cluetip plugin has been loaded*/
	if(jQuery.cluetip)
	{
		$('a.cluetip').cluetip(
			{
				activation: 'click',
				sticky: true,
				cluetipClass: 'notice',
				fx: {             
                      open:       'fadeIn', // can be 'show' or 'slideDown' or 'fadeIn'
                      openSpeed:  '70'
    			},
  				arrows: true,
  				closePosition: 'title',			
  				closeText: '<img src="./images/common/cross.png" alt="" />'
			}
		);
	}

	//load the configs for the html editor
	//$('.editor').livequery(function(){ $(this).wysiwyg({
	if($('.editor') && $('.editor')[0] && typeof($('.editor')[0].contentEditable) != 'undefined'
	&& !(
	(navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/iPad/i))
	&& navigator.userAgent.match(/CPU\sOS\s[0123]_\d/i))) //only if it is supported | iPhone OS <= 3.2 incorrectly report it
	{
	$('.editor').wysiwyg({
    controls : {
	    html : { visible : true },
	    createLink : { visible : false },
	    insertImage : { visible : false },
		separator00 : { visible : false, separator : false },
		separator01 : { visible : false, separator : false },
		separator02 : { visible : false, separator : false },
		separator03 : { visible : false, separator : false },
		separator04 : { visible : false, separator : false },
		separator05 : { visible : false, separator : false },
		separator06 : { visible : false, separator : false },
		separator07 : { visible : false, separator : false },
		separator08 : { visible : false, separator : false },
		separator09 : { visible : false, separator : false },
		h1mozilla : { visible : false},
		h2mozilla : { visible : false},
		h3mozilla : { visible : false},
		h1 : { visible : false},
		h2 : { visible : false},
		h3 : { visible : false},
		increaseFontSize : { visible : false },
		decreaseFontSize : { visible : false },
        insertOrderedList : { visible : true },
        insertUnorderedList : { visible : true }
    }
	});
	}

	//hide the description field for each line item on invoice creation
	$('.notes').hide();

//realtime
startclock();
//Index Number
//indexNO();
	
	//quantity keyup
	$(".quantity_change").livequery('keyup',function (){
       	//subtotal and total count
		var $row_number = $(this).attr("rel");
      	var $quantity = $(this).val();
		var $unit_price = $("#unit_price"+$row_number).attr("value");
		var $subtotal = $quantity * $unit_price;
			$subtotal = Math.round($subtotal*100)/100;
		var $charge = ($("#charge"+$row_number).attr("value") - 0);
		var $total = $subtotal + $charge;
			$total = Math.round($total*100)/100;
		$("#subtotal"+$row_number).attr("value",$subtotal);
		$("#total"+$row_number).attr("value",$total);
		
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
		
		siLog('debug','{/literal}{$LANG.description}{literal}');
    });

	//unit price keyup
	$(".unit_price_change").livequery('keyup',function (){
       	//subtotal and total count
		var $row_number = $(this).attr("rel");
		var $quantity = $("#quantity"+$row_number).attr("value");
      	var $unit_price = $(this).val();
		var $subtotal = $quantity * $unit_price;
			$subtotal = Math.round($subtotal*100)/100;
		var $charge = ($("#charge"+$row_number).attr("value") - 0);
		var $total = $subtotal + $charge;
			$total = Math.round($total*100)/100;
		$("#subtotal"+$row_number).attr("value",$subtotal);
		$("#total"+$row_number).attr("value",$total);
		
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
		
		siLog('debug','{/literal}{$LANG.description}{literal}');
    });
	
	//charge keyup
	$(".charge_change").livequery('keyup',function (){
       	//subtotal and total count
		var $row_number = $(this).attr("rel");
      	var $quantity = $("#quantity"+$row_number).attr("value");
		var $unit_price = $("#unit_price"+$row_number).attr("value");
		var $subtotal = $quantity * $unit_price;
			$subtotal = Math.round($subtotal*100)/100;
		var $charge = ($(this).val() - 0);
		var $total = $subtotal + $charge;
			$total = Math.round($total*100)/100;
		$("#subtotal"+$row_number).attr("value",$subtotal);
		$("#total"+$row_number).attr("value",$total);
		
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
		
		siLog('debug','{/literal}{$LANG.description}{literal}');
    });
	
	//trading type change
	$(".trading_type_change").livequery('change',function () {
		var $trading_type = $(this).val();
		var $row_number;
		var $product;
		var $quantity;
		var $charge;
		count_invoice_line_items();
		var $rowID_last = $("#max_items").attr("value");
		for(var $i=0;$i<=$rowID_last;$i++){
      		$row_number = $i;
      		$product = $("#products"+$row_number).val();
      		$quantity = $("#quantity"+$row_number).attr("value");
			$charge = $("#charge"+$row_number).attr("value");
 			invoice_trading_type_change($trading_type,$row_number,$product,$quantity,$charge);
		}
		siLog('debug','{/literal}{$LANG.description}{literal}');
     });
	 
	// Product change
	$(".product_change").livequery('change',function () { 
      	var $row_number = $(this).attr("rel");
      	var $product = $(this).val();
      	var $quantity = $("#quantity"+$row_number).attr("value");
		var $charge = $("#charge"+$row_number).attr("value");
		var $trading_type = $("#trading_type_id").val();
 		invoice_product_change($product,$row_number,$quantity,$charge,$trading_type);
		siLog('debug','{/literal}{$LANG.description}{literal}');
     });
	 
	 //start date change
	 $(".start_date_change").livequery('keyup',function () { 
      	var $start_date = $(this).val();
      	var $end_date = $("#end_date").attr("value");
 		start_date_change($start_date,$end_date);
		siLog('debug','{/literal}{$LANG.description}{literal}');
     });
	 
	/*
	* Product Inventory Change - updates line item with product price info
	*/
	$(".product_inventory_change").livequery('change',function () { 
      	var $product = $(this).val();
      	var $existing_cost = $("#cost").val();
 		product_inventory_change($product,$existing_cost);
     });
 
    
	//delete line in invoice
	$(".trash_link").livequery('click',function () { 
      id = $(this).attr("rel");
	{/literal}
	{if $config->confirm->deleteLineItem}
	{literal}
		var delete_function = function() { 
			delete_row(id); 
		}
	{/literal}
		$("#confirm_delete_line_item").data('delete_function', delete_function);
		$("#confirm_delete_line_item").dialog('open');
	{else}
		delete_row(id);
	{/if}
	{literal}
	
		//invoice total count
		count_invoice_line_items();
		var $rowID_last = $("#max_items").attr("value");
		var $invoice_total = 0;
		for(var $i=0;$i<=$rowID_last;$i++)
		{
			$invoice_total += ($("#total"+$i).attr("value") - 0);
			$("#invoice_total").attr("value",$invoice_total);	
		}			
    });
	
	//delete line in invoice
	$(".trash_link_edit").livequery('click',function () { 
      id = $(this).attr("rel");

	{/literal}
	{if $config->confirm->deleteLineItem}
	{literal}
		var delete_function = function() {
			delete_line_item(id); 
		}
	{/literal}
		$("#confirm_delete_line_item").data('delete_function', delete_function);
		$("#confirm_delete_line_item").dialog('open');
	{else}
		delete_line_item(id);
	{/if}
	{literal}
    });

	//add new lien item in invoices
	$("a.add_line_item").click(function () { 
		add_line_item();
		//autoFill($(".note"), "Description");
    });


	//calc number of line items 
	$(".invoice_save").click(function () {
		$('#gmail_loading').show();
		siLog('debug','invoice save');
		count_invoice_line_items();
		siLog('debug','invoice save- post count');
		//invoice_save_remove_autofill();
		$('#gmail_loading').hide();
	});

	
	//Autofill "Description" into the invoice items description/notes textarea
	$(".note").livequery(function(){
			
			$description = $(".note").val();
		
			if ($description == "")
			{
				$(".note").val('{/literal}{$LANG.description}{literal}');
				//$(this).val("").css({ color: '#333'});
			}
	
			$(".note").focus(function(){
	            if($(this).val()=="{/literal}{$LANG.description}{literal}"){
	               $(this).val("").css({ color: '#333' });
            }
	});
	});
	$(".note").css({ color: "#b2adad" });



	//Export dialog window - onclick export button close window

	$(".export_window").livequery('click',function () { 
		$('.ui-dialog-titlebar-close').trigger('click');
    });

/*
	$(".export_window").click(function () { 
		$('.ui-dialog-titlebar-close').trigger('click');
    });
*/
	$(".invoice_export_dialog").livequery('click',function () { 
      	var $row_number = $(this).attr("rel");
		siLog('debug',"{/literal}$config->export->spreadsheet{literal}");
		export_invoice($row_number, '{/literal}{$config->export->spreadsheet}{literal}','{/literal}{$config->export->wordprocessor}{literal}');
     });



/* TT invoice below */

// TT edit trading type change
$(".tt_edit_trading_type_change").livequery('change',function () {
	var $trading_type = $(this).val();
	var $index_id = $("#index_id_edit").val();
	var $index_id = $index_id.slice(2);
	if($trading_type == "3"){
		$("#index_id_edit").attr("value","TB" + $index_id);
	}
	if($trading_type == "4"){
		$("#index_id_edit").attr("value","TS" + $index_id);
	}
});
	
// TT customer change
$(".customer_change").livequery('change',function () {
	var $customer_id = $(this).val();
	customer_change($customer_id);
});
	
// TT account change
$(".account_change").livequery('change',function () {
	var $account_id = $(this).val();
	account_change($account_id);
});

// TT product change
$(".tt_product_change").livequery('change',function () { 
    var $product = $(this).val();
	var $trading_type = $("#trading_type_id").val();
 	tt_invoice_product_change($product,$trading_type);
});

// TT calculation type change
$(".calculation_type_change").livequery('change',function () {
	var $calculation_type_id = $(this).val();
    var $quantity = $("#quantity").val();
	var $unit_price = $("#unit_price").val();
	var $charge = $("#charge").val();
	var $total = ($quantity - 0) + ($charge - 0);
	var $payable_amount = $quantity * $unit_price;
	
	$("#total").attr("value",$total);
	
	if($calculation_type_id == "1"){
		$payable_amount = Math.round($payable_amount);
		var $words = toWords($payable_amount);
		$("#spell_number").attr("value",$words);
		$("#payable_amount").attr("value",$payable_amount);
	}
	if($calculation_type_id == "2"){
		$payable_amount = Math.round($payable_amount * 10) / 10;
		var $words = toWords($payable_amount);
		$("#spell_number").attr("value",$words);
		$("#payable_amount").attr("value",$payable_amount);
	}
	if($calculation_type_id == "3"){
		$payable_amount = Math.round($payable_amount * 100) / 100;
		var $words = toWords($payable_amount);
		$("#spell_number").attr("value",$words);
		$("#payable_amount").attr("value",$payable_amount);
	}
	if($calculation_type_id == "4"){
		$payable_amount = Math.floor($payable_amount);
		var $words = toWords($payable_amount);
		$("#spell_number").attr("value",$words);
		$("#payable_amount").attr("value",$payable_amount);
	}	
});

// TT quantity change
$(".tt_quantity_change").livequery('keyup',function () {
	var $calculation_type_id = $("#calculation_type_id").val();
    var $quantity = $(this).val();
	var $unit_price = $("#unit_price").val();
	var $charge = $("#charge").val();
	var $total = ($quantity - 0) + ($charge - 0);
	var $payable_amount = $quantity * $unit_price;
	
	$("#total").attr("value",$total);
	
	if($calculation_type_id == "1"){
		$payable_amount = Math.round($payable_amount);
		var $words = toWords($payable_amount);
		$("#spell_number").attr("value",$words);
		$("#payable_amount").attr("value",$payable_amount);
	}
	if($calculation_type_id == "2"){
		$payable_amount = Math.round($payable_amount * 10) / 10;
		var $words = toWords($payable_amount);
		$("#spell_number").attr("value",$words);
		$("#payable_amount").attr("value",$payable_amount);
	}
	if($calculation_type_id == "3"){
		$payable_amount = Math.round($payable_amount * 100) / 100;
		var $words = toWords($payable_amount);
		$("#spell_number").attr("value",$words);
		$("#payable_amount").attr("value",$payable_amount);
	}
	if($calculation_type_id == "4"){
		$payable_amount = Math.floor($payable_amount);
		var $words = toWords($payable_amount);
		$("#spell_number").attr("value",$words);
		$("#payable_amount").attr("value",$payable_amount);
	}	
});

// TT unit price change
$(".tt_unit_price_change").livequery('keyup',function () {
	var $calculation_type_id = $("#calculation_type_id").val();
    var $quantity = $("#quantity").val();
	var $unit_price = $(this).val();
	var $charge = $("#charge").val();
	var $total = ($quantity - 0) + ($charge - 0);
	var $payable_amount = $quantity * $unit_price;
		
	$("#total").attr("value",$total);
	
	if($calculation_type_id == "1"){
		$payable_amount = Math.round($payable_amount);
		var $words = toWords($payable_amount);
		$("#spell_number").attr("value",$words);
		$("#payable_amount").attr("value",$payable_amount);
	}
	if($calculation_type_id == "2"){
		$payable_amount = Math.round($payable_amount * 10) / 10;
		var $words = toWords($payable_amount);
		$("#spell_number").attr("value",$words);
		$("#payable_amount").attr("value",$payable_amount);
	}
	if($calculation_type_id == "3"){
		$payable_amount = Math.round($payable_amount * 100) / 100;
		var $words = toWords($payable_amount);
		$("#spell_number").attr("value",$words);
		$("#payable_amount").attr("value",$payable_amount);
	}
	if($calculation_type_id == "4"){
		$payable_amount = Math.floor($payable_amount);
		var $words = toWords($payable_amount);
		$("#spell_number").attr("value",$words);
		$("#payable_amount").attr("value",$payable_amount);
	}	
});

// TT charge change
$(".charge_change").livequery('keyup',function () {
	var $calculation_type_id = $("#calculation_type_id").val();
    var $quantity = $("#quantity").val();
	var $unit_price = $("#unit_price").val();
	var $charge = $(this).val();
	var $total = ($quantity - 0) + ($charge - 0);
	var $payable_amount = $quantity * $unit_price;
	
	$("#total").attr("value",$total);
	
	if($calculation_type_id == "1"){
		$payable_amount = Math.round($payable_amount);
		$("#payable_amount").attr("value",$payable_amount);
	}
	if($calculation_type_id == "2"){
		$payable_amount = Math.round($payable_amount * 10) / 10;
		$("#payable_amount").attr("value",$payable_amount);
	}
	if($calculation_type_id == "3"){
		$payable_amount = Math.round($payable_amount * 100) / 100;
		$("#payable_amount").attr("value",$payable_amount);
	}
	if($calculation_type_id == "4"){
		$payable_amount = Math.floor($payable_amount);
		$("#payable_amount").attr("value",$payable_amount);
	}	
});

$(".invoice_tt_save").click(function () {
		$('#gmail_loading').show();
		siLog('debug','invoice_tt save');
		$('#gmail_loading').hide();
});

$(".invoicett_export_dialog").livequery('click',function () { 
      	var $row_number = $(this).attr("rel");
		siLog('debug',"{/literal}$config->export->spreadsheet{literal}");
		export_invoicett($row_number, '{/literal}{$config->export->spreadsheet}{literal}','{/literal}{$config->export->wordprocessor}{literal}');
});

// bank 2 change(no use)
$(".bank_2_change").livequery('change',function () {
	var $bank_2 = $(this).val();
	var $province = $("#province").val();
	var $city = $("#city").val();
	province_change($province,$bank_2,$city);
});

// province change(no use)
$(".province_change").livequery('change',function () {
	var $province = $(this).val();
	var $bank_2 = $("#bank_2").val();
	var $city = $("#city").val();
	province_change($province,$bank_2,$city);
});

// city change(no use)
$(".city_change").livequery('change',function () {
	var $city = $(this).val();
	var $bank_2 = $("#bank_2").val();
	var $province = $("#province").val();
	city_change($province,$bank_2,$city);
});

		
});	
</script>

{/literal}
