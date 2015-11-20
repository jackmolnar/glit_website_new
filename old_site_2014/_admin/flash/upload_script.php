<?php
  //REMEMBER TO MOVE THESE OUTSIDE MAIN DIRECTORY WHEN WE PUSH LIVE
    include '../class/class_config.php';
    include '../class/class_db.php';			/**/
    include '../includes/functions_common.php';			/**/
  //CREATE OUR CONFIG
    $cfg = new class_config();
  //CREATE OUR DATABASE
    $db = new class_db($cfg->db_host,$cfg->db_name,$cfg->db_user,$cfg->db_pass);
  //CONNECT TO OUR DATABASE
    $database_connection = $db->DB_CONNECT();
  //GRAB OPTIONS FROM POST 
    $userid  = $_REQUEST['userid'];
  //
  	$thumb = $_REQUEST['thumb'];
  	$thumb_size = $_REQUEST['thumb_size'];
  //LOCATION - DEFAULT TO ../../files/, CANNOT BE ABOVE THE FILES DIRECTORY
    $location  = $_REQUEST['location'];	
    $thumb_location  = $_REQUEST['location']."thumbs/";
  //WHERE THE FILE IS GONNA BE PLACED
    $target_path = "../$location";	
    $thumb_path = "../$location/thumbs/";
    $oldfile =  basename($_FILES['Filedata']['name']);
  //GRAB THE EXTENSION
    $pos = strpos($oldfile,".",0);
    $ext = strtolower(trim(substr($oldfile,$pos+1,strlen($oldfile))," "));
  //CHECK TO SEE IF THE FILE IS ALLOWED TO BE UPLOADED TO THIS DIREICTORY
    $sql = "SELECT * FROM 
                ".$cfg->db_prefix."_files 
            WHERE
              extension = 'folder' AND
              location = '$location'";
    $results=$db->DB_Q_C($sql);
    $row = mysql_fetch_array($results);
    $allowed = $row['note'];
    if(($allowed=="all") 
        || ($allowed=="images" && ($ext=="gif" || $ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="wbmp"))
        || ($allowed=="media" && ($ext=="swf" || $ext=="wmv" || $ext=="move"))
        || ($allowed=="documents" && ($ext=="ppt" || $ext=="pps" || $ext=="zip" || $ext=="doc" || $ext=="txt" || $ext=="pdf" || $ext=="rar"))
        ){
      //CREATE THE SYSTEM NAME
        $sql = "SELECT id FROM ".$cfg->db_prefix."_files ORDER BY id DESC";
        $results=$db->DB_Q_C($sql);
        $total_files = mysql_fetch_array($results); 
        $total_files[0]++; 	 
        $sys_name = "file_".$total_files[0].".".$ext;
      //CONSTRUCT FINAL DEST PATH
        $target_path = $target_path . $sys_name;
      //
        if(move_uploaded_file($_FILES['Filedata']['tmp_name'], $target_path)) {
          //CREATE A UNIX TIMESTAMP
            $stamp = time();
            $date = gmdate("Y-m-d H:i:s", $stamp);
		  if($thumb=="yes"){
			  //IF THE EXTENSION IS AN IMAGE EXTENSION, LETS CREATE A THUMBNAIL
			  if($ext=="gif" || $ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="wbmp"){
				//CREATE THE THUMBS FOLDER IF IT DOES NOT EXIST
				  if(!file_exists($thumb_path)){
					mkdir($thumb_path);
				  }
				//INSERT INTO OUR FILES OBJECT
				  $sql = "INSERT INTO ".$cfg->db_prefix."_files(name, sys_name, location, extension, note) 
				  VALUES('$oldfile', '$sys_name', '$thumb_location', '$ext', 'thumbnail')";
				  $results=$db->DB_Q_C($sql);
				  $lastid = mysql_insert_id();
				//CREATE THE THUMBNAIL
				  makeThumbnail($target_path, $thumb_path. basename($sys_name), $thumb_size);
			  }
			}
          //INSERT INTO OUR FILES OBJECT
            $sql = "INSERT INTO ".$cfg->db_prefix."_files(name, sys_name, location, extension, note) 
            VALUES('$oldfile', '$sys_name', '$location', '$ext', '')";
            $results=$db->DB_Q_C($sql);
            $lastid = mysql_insert_id();
          //LOG THE ACTION
		  	//GRAB THE MODULE ID
				$sql = "SELECT id FROM ".$cfg->db_prefix."_modules WHERE name = 'class_files'";
            	$results=$db->DB_Q_C($sql);
				$row = mysql_fetch_array($results);
            $sql = "INSERT INTO ".$cfg->db_prefix."_object(create_date, create_who) 
            VALUES('$date', '$userid')";
            $results=$db->DB_Q_C($sql);
            $lastobjectid = mysql_insert_id();
            $sql = "INSERT INTO ".$cfg->db_prefix."_logs(user_id, object_id, module_id, sub_module_id, record_id, action)
            VALUES('".$userid."', $lastobjectid, '".$row[0]."', 1, $lastid, 1)";
            $results=$db->DB_Q_C($sql);
          //CLOSE OUT CONNECTION TO THE DATABASE
            $db->DB_CLOSE($database_connection);
            echo "true";
        }else{
          //CLOSE OUT CONNECTION TO THE DATABASE
            $db->DB_CLOSE($database_connection);
          //AN ERROR HAS OCCURRED
           echo "false";
        }	
     }else{
      //CLOSE OUT CONNECTION TO THE DATABASE
        $db->DB_CLOSE($database_connection);
      //FILE IS NOT ALLOWED IN THIS DIRECTORY
        echo "false";
     }	
/***************************************************************************************
***************************************************************************************/
function makeThumbnail($o_file, $t_file, $t_ht = 100) {
  $image_info = getImageSize($o_file) ; // see EXIF for faster way
  switch ($image_info['mime']) {
    case 'image/gif':
      if(imagetypes() & IMG_GIF){ // not the same as IMAGETYPE
        $o_im = imageCreateFromGIF($o_file) ;
      }else{
        $ermsg = 'GIF images are not supported<br />';
      }
    break;
    case 'image/jpeg':
      if(imagetypes() & IMG_JPG){
        $o_im = imageCreateFromJPEG($o_file) ;
      }else{
        $ermsg = 'JPEG images are not supported<br />';
      }
    break;
    case 'image/png':
      if (imagetypes() & IMG_PNG)  {
        $o_im = imageCreateFromPNG($o_file) ;
      } else {
        $ermsg = 'PNG images are not supported<br />';
      }
    break;
    case 'image/wbmp':
      if (imagetypes() & IMG_WBMP)  {
        $o_im = imageCreateFromWBMP($o_file) ;
      } else {
        $ermsg = 'WBMP images are not supported<br />';
      }
      break;
    default:
      $ermsg = $image_info['mime'].' images are not supported<br />';
    break;
  }
  if (!isset($ermsg)) {
    $o_wd = imagesx($o_im) ;
    $o_ht = imagesy($o_im) ;
    // thumbnail width = target * original width / original height
    //
    if($o_ht > $o_wd && $o_ht > $t_ht) {
  		$new_w = ($t_ht / $o_ht) * $o_wd;
  		$new_h = $t_ht;	
  	}else if ($o_wd > $t_ht) {
  		$new_h = ($t_ht / $o_wd) * $o_ht;
  		$new_w = $t_ht;
  	}else{
  		$new_h = $o_ht;
  		$new_w = $o_wd;
    }
    //
    //$t_wd = round($o_wd * $t_ht / $o_ht) ;
    $t_im = imageCreateTrueColor($new_w, $new_h);
    imageCopyResampled($t_im, $o_im, 0, 0, 0, 0, $new_w, $new_h, $o_wd, $o_ht);
    imageJPEG($t_im,$t_file); 
    imageDestroy($o_im);
    imageDestroy($t_im);
  }
return isset($ermsg)?$ermsg:NULL;
}
?>
