<?php
  if($_REQUEST['formprocess']=="yes"){
    if($pid>0){
      //GRAB OUR MODULE FROM THE DATABASE, MATCHING ID WITH PID, ZERO IS NOTHING
        $sql = "SELECT * FROM ".$cfg->db_prefix."_modules WHERE id = $pid";
        $result = $db->DB_Q_C($sql);
        $count = mysql_affected_rows();
        if($count>0){
          //DETERMINE AND CREATE THE MODULE
            $row = mysql_fetch_array($result);
            $module = new $row['name']($db, $cfg, $time);
		  //PREOCESS THE REQUEST
		    $extra = $module->processAction($cid, $user, $theid);
        }
    }else{
      if($user_logged){ 
        if($cid==-2){
          //USER OPTIONS
            $options = new class_options($db, $cfg);
            $ret_code = array();
            $ret_code = $options->process_view($user);
            $extra = "?pid=$pid&cid=$cid&rc=".$ret_code[0];
       }
      }
    }
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/$extra");
    exit;
   }
?>
