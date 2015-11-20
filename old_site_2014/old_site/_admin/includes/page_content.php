<?php
  if($pid==-1){
    //THE USER IS LOGGED OUT OF THE SYSTEM, DISPLAY NOTHING
  }else if($pid>0){
    //GRAB OUR MODULE FROM THE DATABASE, MATCHING ID WITH PID, ZERO IS NOTHING
      $sql = "SELECT * FROM ".$cfg->db_prefix."_modules WHERE id = $pid";
      $result = $db->DB_Q_C($sql);
      $count = mysql_affected_rows();
      if($count>0){
        $row = mysql_fetch_array($result);
        //DETERMINE AND CREATE THE MODULE
          $module = new $row['name']($db, $cfg, $time);
		//PREOCESS THE REQUEST
		  $module->processNav($cid, $user, $start, $limit);
      }else{
        //NO MODULE FOUND
           print "<div id='error'><div id='content'>The module is either not installed or does not exisit.</div></div>";
      }
  }else{
    if($user_logged){    
      //DEFAULT TO OUR HOME PAGE
        $module = new class_home($db, $cfg, $time);
        if($cid==0){
          $module->view($user);
        }else if($cid==1){
          $module->view_logs($user, $start, $limit);
        }else if($cid==-2){
          //OPTIONS PAGE
            $options = new class_options($db, $cfg);
            $options->display_view($user, $_REQUEST['rc']);
        }else if($cid==-3){
          $module->about();
        }
    }
  }
?>
