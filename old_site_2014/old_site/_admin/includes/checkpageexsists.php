<?php
  //INCLUDE ALL OF OUR MODULE CLASSES
  	include '../class/class_config.php';
  	include '../class/class_db.php';
  //CREATE OUR CONFIG
    $cfg = new class_config();
	//CREATE OUR DATABASE
	   $db = new class_db($cfg->db_host,$cfg->db_name,$cfg->db_user,$cfg->db_pass);
	//CONNECT TO OUR DATABASE
	   $database_connection = $db->DB_CONNECT();
	//CONSTRUCT THE FILEPATH
	  $parent_page = $_REQUEST['parent_page'];
    $tmp_array = explode("/",getParentName($db, $parent_page, $cfg));
    for($i=count($tmp_array)-2;$i>=0;$i--){
      $tmp_path.= $tmp_array[$i]."/";
    }
    $file_path = "../../$tmp_path".$_REQUEST['file'];
	//CLOSE OUT CONNECTION TO THE DATABASE
    $db->DB_CLOSE($database_connection);
  if(file_exists($file_path)){
    echo "true";
  }else{
    echo "false";
  }
  //
  function getParentName($db, $parent_page, $cfg){
    if($parent_page!=0){
      $sql = "SELECT * FROM ".$cfg->db_prefix."_block_page WHERE id = $parent_page";
      $results=$db->DB_Q_C($sql);
      $row = mysql_fetch_array($results);
      $tmp.= $row['title']."/";
      if($row['parent_page']!=0){
        $tmp.= getParentname($db, $row['parent_page'], $cfg);
      }
    }
    return $tmp;
  }
?>
