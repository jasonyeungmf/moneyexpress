<?php
function checkLogin() {
	if (!defined("BROWSE")) {
		echo "You Cannot Access This Script Directly, Have a Nice Day.";
		exit();
	}
}

function getLogoList() {
	$dirname="./templates/invoices/logos";
	$ext = array("jpg", "png", "jpeg", "gif");
	$files = array();
	if($handle = opendir($dirname)) {
		while(false !== ($file = readdir($handle)))
		for($i=0;$i<sizeof($ext);$i++)
		if(stristr($file, ".".$ext[$i])) //NOT case sensitive: OK with JpeG, JPG, ecc.
		$files[] = $file;
		closedir($handle);
	}

	sort($files);
	
	return $files;
}

function getLogo($biller) {

	$url = getURL();

	if(!empty($biller['logo'])) {
		return $url."/templates/invoices/logos/$biller[logo]";
	}
	else {
		return $url."/templates/invoices/logos/_default_blank_logo.png";
	}
}

function getUserLogo($user) {

	$url = getURL();

	if(!empty($user['logo'])) {
		return $url."/templates/invoices/logos/$user[logo]";
	}
	else {
		return $url."/templates/invoices/logos/_default_blank_logo.png";
	}
}

/**
* Function: get_custom_field_label
* 
* Prints the name of the custom field based on the input. If the custom field has not been defined by the user than use the default in the lang files
*
* Arguments:
* field		- The custom field in question
**/
function get_custom_field_label($field)         {
	global $LANG;
	global $dbh;
	
    $sql =  "SELECT cf_custom_label FROM ".TB_PREFIX."custom_fields WHERE cf_custom_field = :field";
    $sth = dbQuery($sql, ':field', $field) or die(end($dbh->errorInfo()));

    $cf = $sth->fetch();

    //grab the last character of the field variable
    $get_cf_number = $field[strlen($field)-1];    

    //if custom field is blank in db use the one from the LANG files
    if ($cf['cf_custom_label'] == null) {
       	$cf['cf_custom_label'] = $LANG['custom_field'] . $get_cf_number;
    }
        
    return $cf['cf_custom_label'];
}

function get_custom_field_name($field) {

        global $LANG;

		//grab the first character of the field variable
        $get_cf_letter = $field[0];
		
        //grab the last character of the field variable
       	$get_cf_number = $field[strlen($field)-1];
	
// functon to return false if invalid custom_field
	$custom_field_name = "";
	switch ($get_cf_letter) {
		case "ller":  $custom_field_name = $LANG['biller'];	break;
		case "c":  $custom_field_name = $LANG['customers'];	break;
		case "i":  $custom_field_name = $LANG['invoice'];	break;
		case "p":  $custom_field_name = $LANG['products'];	break;
		case "cn":  $custom_field_name = $LANG['currency_note'];	break;
		case "ct":  $custom_field_name = $LANG['currency_tt'];	break;
		default :  $custom_field_name = false;
	}
	//if (!$custom_field_name) $custom_field_name .= " :: " . $LANG["custom_field"] . " " . $get_cf_number ;
	//$custom_field_name .= " :: " . $LANG["custom_field"] . " " . $get_cf_number ;
	$custom_field_name = $field;
    return $custom_field_name;
}

function dropDown($choiceArray, $defVal) {

	$dropDown = '<select name="value">' . "\n";

	foreach ($choiceArray as $key => $value)
	{
		if ($key == $defVal) {
			$dropDown .= "\n" . '<OPTION SELECTED style="font-weight: bold" value='.$key.'>'.$value.'</OPTION>';
		} else {
			$dropDown .= "\n" . '<OPTION '.$selected.' value='.$key.'>'.$value.'</OPTION>';
		}
	}
	$dropDown .= "\n</select>";

	return $dropDown;
}

/**
* Function: show_custom_field
* 
* If a custom field has been defined then show it in the add,edit, or view invoice screen. This is used for the Invoice Custom Fields - may be used for the others as wll based on the situation
*
* Parameters:
* custom_field		- the db name of the custom field ie invoice_cf1
* custom_field_value	- the value of this custom field for a given invoice
* permission		- the permission level - ie. in a print view its gets a read level, in an edit or add screen its write leve
* css_class_tr		- the css class the the table row (tr)
* css_class1		- the css class of the first td
* css_class2		- the css class of the second td
* td_col_span		- the column span of the right td
* seperator		- used in the print view ie. adding a : between the 2 values
*
* Returns:
* Depending on the permission passed, either a formatted input box and the label of the custom field or a table row and data
**/

function show_custom_field($custom_field,$custom_field_value,$permission,$css_class_tr,$css_class1,$css_class2,$td_col_span,$seperator) {
	global $dbh;
		/*
	*get the last character of the $custom field - used to set the name of the field
	*/
	$custom_field_number =  substr($custom_field, -1, 1);


	#get the label for the custom field

	$display_block = "";

	$get_custom_label ="SELECT cf_custom_label FROM ".TB_PREFIX."custom_fields WHERE cf_custom_field = :field";
	$sth = dbQuery($get_custom_label, ':field', $custom_field) or die(end($dbh->errorInfo()));

	while ($Array_cl = $sth->fetch()) {
                $has_custom_label_value = $Array_cl['cf_custom_label'];
	}
	/*if permision is write then coming from a new invoice screen show show only the custom field and have a label
	* if custom_field_value !null coming from existing invoice so show only the cf that they actually have
	*/	
	if ( (($has_custom_label_value != null) AND ( $permission == "write")) OR ($custom_field_value != null)) {

		$custom_label_value = htmlsafe(get_custom_field_label($custom_field));

		if ($permission == "read") {
			$display_block = <<<EOD
			<tr class="$css_class_tr" >
				<td class="$css_class1">
					$custom_label_value$seperator
				</td>
				<td class="$css_class2" colspan="$td_col_span" >
					$custom_field_value
				</td>
			</tr>
EOD;
		}

		else if ($permission == "write") {

		$display_block = <<<EOD
			<tr>
				<td class="$css_class1">$custom_label_value
				<a class="cluetip" href="#"	rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields" title="Custom Fields"><img src="./images/common/help-small.png" alt="" /></a>
 
				</td>
				<td>
					<input type="text" name="customField$custom_field_number" value="$custom_field_value" size="25" />
				</td>
			</tr>
EOD;
		}
	}
	return $display_block;
}

function simpleInvoicesError($type,$info1 = "", $info2 = "") 
{

    switch ($type)
    {

        case "notWriteable":

            $error = exit("
            <br />
            ===========================================<br />
            Simple Invoices error<br />
            ===========================================<br />
            The ".$info1." <b>".$info2."</b> has to be writeable");
        break;
        
        case "dbConnection":
        
            $error = exit("
            <br />
            ===========================================<br />
            Simple Invoices database connection problem<br />
            ===========================================<br />
            <br />
            Could not connect to the Simple Invoices database<br /><br />
            For information on how to fix this pease refer to the following database error: <br /> --> <b>$info1</b><br /><br />
            If this is an Access denied error please enter the correct database connection details config/config.ini
            <br />
            <br />
            <b>Note:</b> If you are installing Simple Invoices please follow the below steps: 
            <br />1. Create a blank MySQL database
            <br />2. Enter the correct database connection details in the config/config.ini file
            <br />3. Refresh this page
        
            <br />
            <br />
            ===========================================<br />
            ");
        break;

        case "PDO":
        
            $error = exit("
            <br />
            ===========================================<br />
            Simple Invoices - PDO problem<br />
            ===========================================<br />
            <br />
            PDO is not configured in your PHP installation.<br />  
            This means that Simple Invoices can't be used.<br /><br />

            To fix this please installed the pdo_mysql php extension.<br />
            If you are using a webhost please email them and get them to <br />
            install PDO for PHP with the MySQL extension<br /><br />
            ===========================================<br />
            ");
        break;

        case "sql":
        
            $error = exit("
            <br />
            ===========================================<br />
            Simple Invoices - SQL problem<br />
            ===========================================<br />
            <br />
            The following sql statement:<br />  
            ".$info2."<br /><br />

            had the following error code: ".$info1['1']."<br />
            with the message of:".$info1['2']."<br />
            <br />
            ===========================================<br />
            ");
        break;
        case "PDO_mysql_attr":
        
            $error = exit("
            <br />
            ===========================================<br />
            Simple Invoices - PDO - MySQL problem<br />
            ===========================================<br />
            <br />
            Your Simple Invoices installation can't use the<br />
            database settings 'database.utf8'.<br /><br />  

            To fix this please edit config/config.ini and<br />
            set 'database.utf8' to 'false'<br />
            <br />
            ===========================================<br />
            ");
        break;

    }

    return $error;

}

function checkConnection() {
	global $dbh;
	
	if(!$dbh) {
		simpleInvoiceError("dbConnection",$db_server,$dbh->errorInfo());
/*
		die('<br />
		===========================================<br />
		Simple Invoices database connection problem<br />
		===========================================<br />
		Could not connect to the Simple Invoices database<br /><br />
		Please refer to the following database ('.$db_server.') error for for to fix this: <b>ERROR :' . end($dbh->errorInfo()) . '</b><br /><br />
		If this is an Access denied error please make sure that the db_host, db_name, db_user, and db_password in config/config.php are correct 
		<br />
		===========================================<br />
		');
*/
	}
}

function menuIsActive($module,$requestedModule) {
	if ($module == $requestedModule) {
		echo "id=active";
	}
}


function getLangList() {
 $startdir = './lang/';
 $ignoredDirectory[] = '.';
 $ignoredDirectory[] = '..';
 $ignoredDirectory[] = '.svn';
  if (is_dir($startdir)){
      if ($dh = opendir($startdir)){
          while (($folder = readdir($dh)) !== false){
              if (!(array_search($folder,$ignoredDirectory) > -1)){
                if (filetype($startdir . $folder) == "dir"){
//                      $directorylist[$startdir . $folder]['name'] = $folder;
//                     $directorylist[$startdir . $folder]['path'] = $startdir;
					  $folderList[] = $folder;
                  }
              }
          }
          closedir($dh);
      }
  }
sort($folderList);
return($folderList);
}

function sql2xml($sth, $count) {

	//you can choose any name for the starting tag
	$xml = ("<result>");
	$xml .= "<page>1</page>";
	$xml .= "<total>".$count."</total>";
	//while($row = $sth->fetch(PDO::FETCH_ASSOC) )
	foreach($sth as $row)
	{
		//count the no. of  columns in the table
		$fcount = count($row);

		$xml .= ("<tablerow>");
/*
		if(isset($actions))
		{
			$xml .= ("<actions><a href='index.php'>TEST</a>
</actions>");
		}	
*/
		//for($i=0; $i < $fcount; $i++)
		foreach($row as $key => $value)
		{
		//	$tag = mysql_field_name( $query4xml, $i );
		//	$xml .= ("<$tag>". $row[$i]. "</$tag>");
			$xml .= ("<$key>". htmlsafe($value). "</$key>");
		}
		$xml .= ("</tablerow>");
	}
	$xml .= ("</result>");

	return $xml;
}

/**
* Function: si_truncate
* 
* Trucate a given string
* 
* Parameters:
* string	- the string to truncate
* max		- the max lenght in characters to truncate the string to 
* rep		- characters to be added at end of truncated string

*
* Returns:
* The array sorted as you want
**/
function si_truncate($string, $max = 20, $rep = '')
{
    if (strlen($string) <= ($max + strlen($rep)))
    {
        return $string;
    }
    $leave = $max - strlen ($rep);
    return substr_replace($string, $rep, $leave);
}


/* Escapes HTML stuff */
function htmlsafe($str) {
#    if (get_magic_quotes_gpc())
#    {
#        return stripslashes(htmlentities($str, ENT_QUOTES, 'UTF-8'));
#    } else {
        return htmlentities($str, ENT_QUOTES, 'UTF-8');
#    }
}

/* Makes a string to be put inside a href="" safe */
function urlsafe($str) {
    $str = preg_replace('/[^a-zA-Z0-9@;:%_\+\.~#\?\/\=\&\/\-]/','',$str);
    if(preg_match('/^\s*javascript/i', $str)) //no javascript urls
    {
        return false;
    }
    $str = htmlsafe($str);
    return $str;
}

/* Sanitises HTML for output stuff */
function outhtml($html) {

    $config = HTMLPurifier_Config::createDefault();

    // configuration goes here:
    $config->set('Core.Encoding', 'UTF-8'); // replace with your encoding
    $config->set('HTML.Doctype', 'XHTML 1.0 Strict'); // replace with your doctype

    $purifier = new HTMLPurifier($config);
    return $purifier->purify($html);

}

//Generates a token to be used on forms that change something
function siNonce($action = false, $userid = false, $tickTock = false)
{
    global $config;
    global $auth_session;
    
    $tickTock = ($tickTock) ? $tickTock : floor(time()/$config->nonce->timelimit);
    
    if(!$userid)
    {
        $userid = $auth_session->id; 
    }
    
    $hash = md5($tickTock.':'.$config->nonce->key.':'.$userid.':'.$action);
    
    return $hash;
}

//Verify a nonce token
function verifySiNonce($hash, $action, $userid = false)
{
    global $config;
    
    $tickTock = floor(time()/$config->nonce->timelimit);
    if(!isempty($hash) AND ($hash === siNonce($action, $userid) OR $hash === siNonce($action, $userid, $tickTock-1)))
    {
        return true;
    }
    
    //else
    return false;
}

//Put this before an action is commited make sure to put a unique $action
function requireCSRFProtection($action = 'all', $userid = false)
{
    verifySiNonce($_REQUEST['csrfprotectionbysr'], $action, $userid) or die('CSRF Attack Detected');      
}

function antiCSRFHiddenInput($action = 'all', $userid = false)
{
    return '<input type="hidden" name="csrfprotectionbysr" value="'.htmlsafe(siNonce($action, $userid)).'" />';
}

