<?php
include("sql_queries.php");
include("manageCustomFields.php");
include("../config/config.php");

function convertCustomFields() {
	/* check if any value set -> keeps all data for sure */
	global $dbh;
	$sql = "SELECT * FROM ".TB_PREFIX."custom_fields";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	
	while($custom = $sth->fetch()) 
	{
		if(preg_match("/(.+)_cf([1-4])/",$custom['cf_custom_field'],$match))
		{
			//print_r($match);
			
			switch($match[1])
			{
				case "biller": $cat = 1;	break;
				case "customer": $cat = 2;	break;
				case "product": $cat = 3;	break;
				case "invoice": $cat = 4;	break;
				case "currency_note": $cat = 5;	break;
				case "currency_tt": $cat = 6;	break;
				default: $case = 0;
			}
			
			$cf_field = "custom_field".$match[2];
			if($match[1] != "biller") 
			{
				$sql = "SELECT id, :field FROM :table";
				$tablename = TB_PREFIX.$match[1]"s";
			}
			else 
			{
				$sql = "SELECT id, :field FROM :table";
				$tablename = TB_PREFIX.$match[1];
			}
			
			
			/*
			 * If custom field name is set
			 */
			if($custom['cf_custom_label'] != NULL) 
			{
				$store = true;
			}
			
			
			
			//error_log($sql);
			$tth = $dbh->prepare($sql);
			$tth->bindValue(':table', $tablename);
			$tth->bindValue(':field', $cf_field);
			$tth->execute();
			$store = false;
			
			/*
			 * If any field is set, create custom field
			 */
			while($res = $tth->fetch()) 
			{
				if($res[1] != NULL) 
				{
					$store = true;
					break;
				}
				//echo($res[0]."<br />");
			}
			
			if($store) 
			{
				print_r($res);
				echo "<br />".$sql."   ".$res['id'];
				
				//create new text custom field
				saveCustomField(3,$cat,$custom['cf_custom_field'],$custom['cf_custom_label']);
				$id = lastInsertId();
				error_log($id);
				$plugin = getPluginById($id);
				
				//insert all data
				$uth = $dbh->prepare($sql);
				$uth->bindValue(':table', $tablename);
				$uth->bindValue(':field', $cf_field);
				$uth->execute();
				while($res2 = $uth->fetch()) 
				{
					$plugin->saveInput($res2[$cf_field], $res2['id']);
				}
				
			}
		}
	}
}