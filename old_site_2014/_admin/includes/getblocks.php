<?php
  //INCLUDE ALL OF OUR MODULE CLASSES
  	include '../class/class_config.php';
  	include '../class/class_db.php';
  	include '../class/class_html_parser.php';
	
  //CREATE OUR CONFIG
    $cfg = new class_config();
	//CREATE OUR DATABASE
	   $db = new class_db($cfg->db_host,$cfg->db_name,$cfg->db_user,$cfg->db_pass);
	//CONNECT TO OUR DATABASE
	   $database_connection = $db->DB_CONNECT();
	//
	  $template_id = $_REQUEST['template_id'];
	  $page_id = $_REQUEST['page_id'];
	  $module_id = $_REQUEST['module_id'];
  //GRAB OUR TEMPLATE
    $sql = "SELECT * FROM ".$cfg->db_prefix."_block_template WHERE id = $template_id";
    $results=$db->DB_Q_C($sql);
    $row = mysql_fetch_array($results);
  //SEARCH THROUGH BODY AND
    $tmp_body = stripslashes($row['body']);
  	$parser = new class_html_parser($tmp_body); 
	$block_array = array();
	$block_array = $parser->fetchTagIntoArray("<block>");
  //
  	print "<input type='hidden' name='block_count' value='".count($block_array)."' />";
  //PRINT OUT OUR BLOCKS
	for($i=0;$i<count($block_array);$i++){
		//LIST OUT ALL OF OUR BLOCKS
			$sql = "SELECT * FROM ".$cfg->db_prefix."_block_content ORDER BY name ASC";
			$results=$db->DB_Q_C($sql);
		//PREPARE NOTIFICATIONS
			$tmp_name = str_replace("_", " ", $block_array[$i]['name']);
			$tmp_name = str_replace("'", "", $tmp_name);
			$tmp_name = str_replace('"', "", $tmp_name);
			$tmp_description = str_replace("_", " ", $block_array[$i]['description']);
			$tmp_description = str_replace("'", "", $tmp_description);
			$tmp_description = str_replace('"', "", $tmp_description);
			$tmp_default = str_replace("'", "", $block_array[$i]['default']);
		//
			$name = "text_block_".$i;
		//CHECK TO SEE IF THE BLOCK CAN BE EDITED
			if($tmp_default>0){
				$disabled = "disabled='disabled'";
				$dis_msg = "<input type='hidden' name='$name' value='$tmp_default'/> This block is locked in the template and can not be changed. You may edit the block but you may not swap it out for another.";
			}else{
				$disabled = "";
				$dis_msg = $tmp_description;
			}
			print "<fieldset><legend>".$tmp_name."</legend>";
			print "<p>".$dis_msg."</p>";
			//print "<p><a href='?pid=$module_id&cid=12&theid=".."'>edit this block</a></p>";
			print "<select id='$name' name='$name' $disabled>";
			while($row = mysql_fetch_array($results)){
				if($page_id>0){
					//CHECK TO SEE IF THIS BLOCK IS SELECTED
						$sql = "SELECT * FROM 
							".$cfg->db_prefix."_block_list
						WHERE 
							template_block_id = ".str_replace("'", "", $block_array[$i]['id'])." AND
							page_id = ".$page_id." AND
							block_id = ".$row['id']."
						";
						$results1=$db->DB_Q_C($sql);
						$select_check = mysql_affected_rows();
						if($select_check>0){
							$selected_option = $row['id'];
							print "<option selected='selected' value='".$row['id']."'>".$row['name']."</option>";
						}else{
							print "<option value='".$row['id']."'>".$row['name']."</option>";
						}
				}else{
					if($tmp_default==$row['id']){
						$selected_option = $row['id'];
						print "<option selected='selected' value='".$row['id']."'>".$row['name']."</option>";
					}else{
						print "<option value='".$row['id']."'>".$row['name']."</option>";
					}
				}
				
			}
			print "</select>";
			print "</fieldset>";
	}
?>
