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
  	//
  	 $u = $_REQUEST['u'];
  	 $sql = "SELECT COUNT(*) FROM ".$cfg->db_prefix."_user WHERE username LIKE '$u'";
  	 $results = $db->DB_Q_C($sql);
  	 $row =mysql_fetch_array($results);
  	 //CLOSE OUT CONNECTION TO THE DATABASE
       $db->DB_CLOSE($database_connection);
  	 if($row[0]==0){
        echo "false";
     }else{
        echo "true";
     }
?>
