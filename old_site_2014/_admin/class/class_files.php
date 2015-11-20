<?php

	/******************************************************************************************

	  PERMISSION'S BREAK DOWN

	    [0] = OVERALL ACCESS TO THIS MODULE

	    [1] = CREATE/UPLOAD A FILES

	    [2] = EDIT FILES

	    [3] = DELETE FILES

	*******************************************************************************************  

	*******************************************************************************************

	  SUB-MODULE ID'S

	     1 - FILES

	******************************************************************************************/

	class class_files{

		/******************************************************************************************

		CLASS VARIABLES

		******************************************************************************************/

		var $name;

		var $id;

		var $config;

		var $time;

		var $db;

		/******************************************************************************************

		class_news - constructor, initialize all variables. 

		******************************************************************************************/

		function class_files($db, $cfg, $t){

		  //MODULE NAME

		    $this->name = "Files";

		  //STORE THE DATABASE

		    $this->db = $db;

		  //STORE THE SITES CONFIG SETTINGS

		    $this->config = $cfg;

		   //STORE THE ID OF THIS MODULE

		    $sql = "SELECT * FROM ".$this->config->db_prefix."_modules WHERE name = 'class_files'";

		    $result = $this->db->DB_Q_C($sql);

		    if(mysql_affected_rows()>0){

		      $this->id = mysql_result($result,0,'id'); 

        };

		  //STORE THE TIME OBJECT

		    $this->time = $t;

		}

		/******************************************************************************************

		install

		******************************************************************************************/

		function install($date){

		  //STORE OUR MODULE

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_modules` (name) VALUES ('class_files')";

  		  $results = $this->db->DB_Q_C($sql);

      	$lastid = mysql_insert_id();

      	$this->id = $lastid;

      //SET PERMISSIONS FOR OUR DEFAULT USER

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_perms` (user_id, module_id, perm) VALUES (1, $lastid, '1111')";

  		  $results = $this->db->DB_Q_C($sql);

  		//CREATE THE TABLE FOR THIS MODULE

        $sql = "

            CREATE TABLE `".$this->config->db_prefix."_files` (

              `id` int(11) NOT NULL auto_increment,

              `name` varchar(200) NOT NULL default '',

              `sys_name` varchar(200) NOT NULL default '',

              `location` varchar(200) NOT NULL default '',

              `extension` varchar(200) NOT NULL default '',

              `note` text NOT NULL, 

              PRIMARY KEY  (`id`)

            ) ENGINE=MyISAM;";

  		  $results = $this->db->DB_Q_C($sql);

  		//CREATE OUR FILE ENTRIES

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_files` 

            (name, sys_name, location, extension, note)

          VALUES 

            ('Default Template', 'file_1.php', '../".$this->config->file_dir."/templates/', 'php', 'The default template for your site.');";

        $results = $this->db->DB_Q_C($sql);

      	$record_id = mysql_insert_id();

      //STORE OUR OBJECT

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";

  		  $results = $this->db->DB_Q_C($sql);

      	$object_id = mysql_insert_id();

  		//STORE OUR LOG INFO

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, 1, $lastid, 1, $record_id, 1)";

  		  $results = $this->db->DB_Q_C($sql);

  		  

  		//CREATE OUR FILE ENTRIES

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_files` 

            (name, sys_name, location, extension, note)

          VALUES 

            ('templates', 'templates', '../".$this->config->file_dir."/templates/', 'folder', 'all')";

        $results = $this->db->DB_Q_C($sql);

      	$record_id = mysql_insert_id();

      //STORE OUR OBJECT

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1)";

  		  $results = $this->db->DB_Q_C($sql);

      	$object_id = mysql_insert_id();

  		//STORE OUR LOG INFO

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, 1, $lastid, 1, $record_id, 1)";

  		  $results = $this->db->DB_Q_C($sql);

  		  

  		//CREATE OUR FILE ENTRIES

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_files` 

            (name, sys_name, location, extension, note)

          VALUES 

            ('backup', 'backup', '../".$this->config->file_dir."/backup/', 'folder', 'all')";

        $results = $this->db->DB_Q_C($sql);

      	$record_id = mysql_insert_id();

      //STORE OUR OBJECT

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1)";

  		  $results = $this->db->DB_Q_C($sql);

      	$object_id = mysql_insert_id();

  		//STORE OUR LOG INFO

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, 1, $lastid, 1, $record_id, 1)";

  		  $results = $this->db->DB_Q_C($sql);

  		  

  		//CREATE THE IMAGE FOLDER

  		//GRAB OUR FOLDER PATH, AND THE REQUESTED NAME FOR THE FOLDER

  		  $folder = $this->config->file_dir."/images/";

	      $stat = mkdir($folder, 0777);

        if($stat){

          //CREATE A UNIX TIMESTAMP

            $stamp = time();

            $date = gmdate("Y-m-d H:i:s", $stamp);

          //INSERT INTO OUR FILES OBJECT

            $sql = "INSERT INTO ".$this->config->db_prefix."_files(name, sys_name, location, extension, note) 

            VALUES('images', 'images', '../$folder', 'folder', 'images')";

            $results=$this->db->DB_Q_C($sql);

            $lastid = mysql_insert_id();

          //LOG THE ACTION

            $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 

            VALUES('$date', '1')";

            $results=$this->db->DB_Q_C($sql);

            $lastobjectid = mysql_insert_id();

            $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)

            VALUES($lastobjectid, 1, '".$this->id."', 1, $lastid, 1)";

            $results=$this->db->DB_Q_C($sql);

  		  

        }else{

          print "<div id='error'><div id='content'>An error has occurred!</div></div>";

        }

      //CREATE THE DOCUMENT FOLDER

  		//GRAB OUR FOLDER PATH, AND THE REQUESTED NAME FOR THE FOLDER

  		  $folder = $this->config->file_dir."/docs/";

	      $stat = mkdir($folder, 0777);

        if($stat){

          //CREATE A UNIX TIMESTAMP

            $stamp = time();

            $date = gmdate("Y-m-d H:i:s", $stamp);

          //INSERT INTO OUR FILES OBJECT

            $sql = "INSERT INTO ".$this->config->db_prefix."_files(name, sys_name, location, extension, note) 

            VALUES('docs', 'docs', '../$folder', 'folder', 'documents')";

            $results=$this->db->DB_Q_C($sql);

            $lastid = mysql_insert_id();

          //LOG THE ACTION

            $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 

            VALUES('$date', '1')";

            $results=$this->db->DB_Q_C($sql);

            $lastobjectid = mysql_insert_id();

            $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)

            VALUES($lastobjectid, '1', '".$this->id."', 1, $lastid, 1)";

  		  

            $results=$this->db->DB_Q_C($sql);

        }else{

          print "<div id='error'><div id='content'>An error has occurred!</div></div>";

        }

      //CREATE THE MEDIA FOLDER

  		//GRAB OUR FOLDER PATH, AND THE REQUESTED NAME FOR THE FOLDER

  		  $folder = $this->config->file_dir."/media/";

	      $stat = mkdir($folder, 0777);

        if($stat){

          //CREATE A UNIX TIMESTAMP

            $stamp = time();

            $date = gmdate("Y-m-d H:i:s", $stamp);

          //INSERT INTO OUR FILES OBJECT

            $sql = "INSERT INTO ".$this->config->db_prefix."_files(name, sys_name, location, extension, note) 

            VALUES('media', 'media', '../$folder', 'folder', 'media')";

            $results=$this->db->DB_Q_C($sql);

            $lastid = mysql_insert_id();

          //LOG THE ACTION

            $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 

            VALUES('$date', '1')";

            $results=$this->db->DB_Q_C($sql);

            $lastobjectid = mysql_insert_id();

            $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)

            VALUES($lastobjectid, '1', '".$this->id."', 1, $lastid, 1)";

  		  

            $results=$this->db->DB_Q_C($sql);

        }else{

          print "<div id='error'><div id='content'>An error has occurred!</div></div>";

        }

  		//CREATE DIRECTORY STRUCTURE IN XML

          $xml_dir=$this->read_dir_XML($this->config->file_dir);

	        $file = $this->config->file_dir."/dir.xml";

      	   if (!$handle = fopen($file, 'w+')) {

      			 echo "Cannot open file ($file)";

      			 exit;

      	   }

      	   if (fwrite($handle, $xml_dir) === FALSE) {

    			   echo "Cannot write to file ($file)";

    			   exit;

    		   }

		   fclose($handle);

		}

		/******************************************************************************************

		display_log

		******************************************************************************************/

		function display_log($action, $subid, $date, $theid){

		  $ret = "";

		  if($subid==1){

        //FILE

        if($action==1){

          //CREATE

          $ret = "Created a <a class='toolTipElement' title='View Details::View more information on this file.' href='?pid=$this->id&cid=2&amp;theid=$theid'>file</a> on $date";

        }else if($action==2){

          //EDIT

          $ret = "Edited a <a class='toolTipElement' title='View Details::View more information on this file.' href='?pid=$this->id&cid=2&amp;theid=$theid'>file</a> on $date";

        }else if($action==3){

          //DELETE

          $ret = "Deleted a <a class='toolTipElement' title='View Details::View more information on this file.' href='?pid=$this->id&cid=2&amp;theid=$theid'>file</a> on $date";

        }else{

          //UNKNOWN

          $ret = "($action, $subid) Did unknown action to a <a class='toolTipElement' title='View Details::View more information on this file.' href='?pid=$this->id&cid=2&amp;theid=$theid'>file</a> on $date";

        }

      }else{

        //UNKNOWN

          $ret = "($action, $subid) Did unknown action to an unknown section on $date";

      }

      return $ret;

		}

		/******************************************************************************************

		display_permissions

		******************************************************************************************/

		function display_permissions($perm, $user){

		  print "<tr><th></th><th>".$this->name."</th></tr><tr><th></th><td>";

        print "<select id='perm_".$this->name."' name='perm_".$this->name."'>";

        if($perm[0]==1){

          print "<option value='0'>No Access</option>";

          print "<option value='1' selected='selected'>Full Access</option>";

        }else{

          print "<option value='0' selected='selected'>No Access</option>";

          print "<option value='1'>Full Access</option>";

        }

        print "</select>";

        print "<div id='advanced_".$this->name."'></div>";

      //ADVANCED PERMISSIONS

        print "<div id='file_perms_advanced'>";

          //TOTAL SUB-PERMISSION COUNT

            print "<input type='hidden' name='perm_".$this->name."_count' value='3' />";

            print "<table>";

            print "<tr><th colspan='2'>Advanced Permissions</th></tr>";

          //CREATE FILES

            if($user->user_perms[$this->id-1][1]==1){

              print "<tr><th>Upload/Create Files & Folders</th><td>";

                print "<select name='perm_".$this->name."_1'>";

                if($perm[1]=='1'){

                  print "<option value='0'>No Access</option>";

                  print "<option value='1' selected='selected'>Full Access</option>";

                }else if($perm[1]=='0'){

                  print "<option value='0' selected='selected'>No Access</option>";

                  print "<option value='1'>Full Access</option>";

                }else{

                  print "<option value='0'>No Access</option>";

                  print "<option value='1' selected='selected'>Full Access</option>";

                }

                print "</select>";

              print "</td></tr>";

            }else{

              print "<input type='hidden' name='perm_".$this->name."_1' value='0' />";

            }

          //EDIT FILES

            if($user->user_perms[$this->id-1][2]==1){

              print "<tr><th>Edit Files</th><td>";

                print "<select name='perm_".$this->name."_2'>";

                if($perm[2]=='1'){

                  print "<option value='0'>No Access</option>";

                  print "<option value='1' selected='selected'>Full Access</option>";

                }else if($perm[2]=='0'){

                  print "<option value='0' selected='selected'>No Access</option>";

                  print "<option value='1'>Full Access</option>";

                }else{

                  print "<option value='0'>No Access</option>";

                  print "<option value='1' selected='selected'>Full Access</option>";

                }

                print "</select>";

              print "</td></tr>";

            }else{

              print "<input type='hidden' name='perm_".$this->name."_2' value='0' />";

            }

          //DELETE FILES

            if($user->user_perms[$this->id-1][3]==1){

              print "<tr><th>Delete Files & Folders</th><td>";

                print "<select name='perm_".$this->name."_3'>";

                if($perm[3]=='1'){

                  print "<option value='0'>No Access</option>";

                  print "<option value='1' selected='selected'>Full Access</option>";

                }else if($perm[3]=='0'){

                  print "<option value='0' selected='selected'>No Access</option>";

                  print "<option value='1'>Full Access</option>";

                }else{

                  print "<option value='0'>No Access</option>";

                  print "<option value='1' selected='selected'>Full Access</option>";

                }

                print "</select>";

              print "</td></tr>";

            }else{

              print "<input type='hidden' name='perm_".$this->name."_3' value='0' />";

            }

            print "</table>";

        print "</div>";

      print "</td></tr>";

      print "<script>

          var fileSlide = new Fx.Slide('file_perms_advanced');

					$('perm_".$this->name."').addEvent('change', function(e){

					   var tmp = $('perm_".$this->name."').options[$('perm_".$this->name."').selectedIndex].value;

					   if(tmp==0){

              fileSlide.slideOut();

             }else{

              fileSlide.slideIn();

             }

						});

					  var tmp = $('perm_".$this->name."').options[$('perm_".$this->name."').selectedIndex].value;

					  if(tmp==0){

              fileSlide.hide();

             }else{

              fileSlide.show();

             }

        </script>";

		}

		/******************************************************************************************

		processAction

		******************************************************************************************/

		function processAction($cid, $user, $theid){

		  $extra = "";

		  if($user->user_perms[$this->id-1][0]==1){

        $ret_code = array();

        if($cid==1 && $user->user_perms[$this->id-1][1]==1){

          //CREATE

		      $ret_code = $this->process_create($user);

		    }else if($cid==3 && $user->user_perms[$this->id-1][2]==1){

		      //EDIT

      	  $ret_code = $this->process_edit($user, $theid);

      	}else if($cid==4 && $user->user_perms[$this->id-1][3]==1){

          //DELETE

	        $ret_code = $this->process_delete($user, $theid);

        }

		    //CONSTRUCT OUR RETURN ADDRESS

          if($_REQUEST['the_action']=='submitexitok'){

            //RETURN TO THE DEFAULT VIEW FOR THIS MODULE

              $extra = "?pid=".$this->id."&rc=".$ret_code[0];

          }else{

            //RETURN TO THE EDIT FORM OF THIS MODULE

              $extra = "?pid=".$this->id."&cid=3&theid=".$ret_code[1]."&rc=".$ret_code[0];

          }

          //WHEN DEALING WITH FILES THE DIR VAR WILL BE SET, SO LETS SET IT ON THE RETURN TRIP

          //RETURN CODE OF 2 IS RETURNED WHEN WE DELETE A FOLDER, SO WE CAN NOT RETURN TO THAT FOLDER

          //SINCE IT DOES NOT EXIST

          if(isset($_REQUEST['dir']) && $ret_code[0]!=2){

            $extra.= "&dir=".$_REQUEST['dir'];

          }else{

            $extra.= "&dir=".$_REQUEST['parent'];

          }

		  }else{

        //THE USER IS NOT AUTHORIZED TO PERFORM THIS ACTION

          print "<div id='error'><div id='content'>You are not authorized to perform this action!</div></div>";

      }

      return $extra;

		}

		/******************************************************************************************

		processNav

		******************************************************************************************/

		function processNav($cid, $user, $start, $limit){

		  if($user->user_perms[$this->id-1][0]==1){

		    if($cid==0){

		      //VIEW

	         $this->view($user, $_REQUEST['rc'], $start, $limit);

        }else if($cid==1 && $user->user_perms[$this->id-1][1]==1){

          //CREATE

	         $this->display_create($_REQUEST['theid'], $user);

        }else if($cid==2){

          //VIEW

	         $this->view_content($user, $_REQUEST['theid']);

        }else if($cid==3 && $user->user_perms[$this->id-1][2]==1){

          //EDIT

	         $this->display_edit($_REQUEST['theid'], $_REQUEST['rc'], $user);

        }else if($cid==4 && $user->user_perms[$this->id-1][3]==1){

          //DELETE

	         $this->display_delete($user, $_REQUEST['theid']);

        }else if($cid==100){

          //ABOUT/HELP

	         $this->about();

        }else{

          //THE USER IS NOT AUTHORIZED TO VIEW THIS CONTENT

            print "<div id='error'><div id='content'>You are not authorized to view this page!</div></div>";

        }

		  }else{

        //THE USER IS NOT AUTHORIZED TO VIEW THIS CONTENT

          print "<div id='error'><div id='content'>You are not authorized to view this page!</div></div>";

      }

		}

		/******************************************************************************************

		view_content

		******************************************************************************************/

    function view_content($user, $theid){

      //SET THE DIRECTORY

        if(!isset($_REQUEST['dir'])){

          $directory = "../../../../../../../".$this->config->file_dir."/";

        }else{

          $directory = "../../../../../../../".$this->config->file_dir."/".$_REQUEST['dir'];

        }

      //TRIM OFF OUR ../ OFF OF OUR DIRECTORY

        $tmp = substr ($directory,21);

        $dir_pos = explode("/",$tmp);

       //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE

          $sql = "SELECT * FROM ".$this->config->db_prefix."_files  WHERE

                  ".$this->config->db_prefix."_files.id = $theid

                  LIMIT 1";

          $result=$this->db->DB_Q_C($sql);

          $row = mysql_fetch_array($result);

       print "<div id='forms'><div id='content'>";

      print "<table cellpadding='0' cellspacing='0' width='100%'>";

      print "<tr><th colspan='2' class='record_head'>"; 

      //DISPLAY OUR DIRECTOY LINKS

        $add = ""; 

        for($i=0;$i<count($dir_pos)-1;$i++){

          //SPECIAL FOR OUR FIRST, DOESNT NEED ANY DIR VAR

            if($i==0){

                print "<a href='?pid=".$this->id."'>".$dir_pos[$i]."</a><b>&raquo;</b>";       

            }else{

                print "<a href='?pid=".$this->id."&amp;dir=$add".$dir_pos[$i]."/'>".$dir_pos[$i]."</a><b>&raquo;</b>";

                $add.=$dir_pos[$i]."/"; 

            }

        }

      print $row['name']."</th></tr>";

       print "<tr><td colspan='2'>View the details of this file below or <a href='".$row['location'].$row['sys_name']."'>view the file by clicking here.</a></td></tr>";

       //DISPLAY THUMBNAIL IF IT IS AN IMAGE

        $ext = $row['extension'];

        if($ext=="gif" || $ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="wbmp"){

          $num = strlen($row['location']);

          if(substr($row['location'],$num-7,$num)=="thumbs/"){  

            print "<tr><td colspan='2'><a href='".$row['location']."".$row['sys_name']."' target='_blank'>";

            print "<img src='".$row['location'].$row['sys_name']."' alt=".$row['name']." border='0' />";

            print "</a></td></tr>";

          }else{

            print "<tr><td colspan='2'><a href='".$row['location']."".$row['sys_name']."' target='_blank'>";

            print "<img src='".$row['location']."thumbs/".$row['sys_name']."' alt=".$row['name']." border='0' />";

            print "</a></td></tr>";

          }

        }

       //

       print "<tr><th>Name</th><td>".$row['name']."</td></tr>";

       print "<tr><th>System Name</th><td>".$row['sys_name']."</td></tr>";

       print "<tr><th>Location</th><td>".$row['location']."</td></tr>";

       print "<tr><th>Note</th><td>".$row['note']."</td></tr>";

       print "</table>";

       //DISPLAY THE HISTORY OF THIS RECORD

        $sql = "SELECT * FROM ".$this->config->db_prefix."_logs, ".$this->config->db_prefix."_object, ".$this->config->db_prefix."_user WHERE

                ".$this->config->db_prefix."_logs.record_id = $theid AND 

                ".$this->config->db_prefix."_logs.module_id = ".$this->id." AND

                ".$this->config->db_prefix."_logs.sub_module_id = 1 AND

                ".$this->config->db_prefix."_logs.object_id =  ".$this->config->db_prefix."_object.id AND

                ".$this->config->db_prefix."_logs.user_id =  ".$this->config->db_prefix."_user.id

                    ORDER BY ".$this->config->db_prefix."_logs.id DESC";

        $result2=$this->db->DB_Q_C($sql);

        print "<div id='records'><div id='content'>";

        print "<table cellpadding='0' cellspacing='0'>";

        print "<tr><th class='record_head'>Article History</th></tr>";

        print "<tr><th>action</th></tr>";

        while($row2=mysql_fetch_array($result2)){

          if($striper){

            $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";

          }else{

            $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             

          }

          $striper=!$striper;

          //GET AND CONVERT DATE ACCORDINGLY

				   $tmp_date = $this->time->convertTime($user->user_timezone, $row2['create_date']);

				   $create_date = DateFormat($tmp_date, $this->config->date_format);

           if($row2['action']==1){

              //CREATE

               print "<tr $effect><td colspan='2'>

                      This file was created by <b>".$row2['username']."</b> on $create_date.

                  </td></tr>";

            }else if($row2['action']==2){

              //EDIT

                print "<tr $effect><td colspan='2'>

                      This file was edited by <b>".$row2['username']."</b> on $create_date.

                  </td></tr>";

            }else if($row2['action']==4){

              //PUBLISHED   

                print "<tr $effect><td colspan='2'>

                      This file was published by <b>".$row2['username']."</b> on $create_date.

                  </td></tr>";       

            }

        }

        print "</table></div></div>";      

       print "</div></div>";

    }

		/******************************************************************************************

		view - view entries in the database, in a table format

		******************************************************************************************/

		function view($user, $ret_code=0, $start=0, $limit=10){

		  //SET THE DIRECTORY

        if(!isset($_REQUEST['dir'])){

          $directory = "../".$this->config->file_dir."/";

        }else{

          $directory = "../".$this->config->file_dir."/".$_REQUEST['dir'];

        }

        $curr_dir = $_REQUEST['dir'];

      //READ THE CURRENT DIRECTORY WE ARE IN

		    $dir_list = $this->read_dir($directory);

      //TRIM OFF OUR ../ OFF OF OUR DIRECTORY

        $tmp = substr ($directory,3);

        $dir_pos = explode("/",$tmp);

		  print "<div id='records'><div id='content'>";

		  if($ret_code==0){

      }else if($ret_code==1){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>The folder has been created.</th></tr>

        </table>";

      }else if($ret_code==-1){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>The news article has not been published.</th></tr>

        </table>";

      }else if($ret_code==2){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>The folder has been deleted.</th></tr>

        </table>";

      }else if($ret_code==-2){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>The folder has not been deleted.</th></tr>

        </table>";

      }else if($ret_code==-3){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>An error has occured while trying to delete the folder.</th></tr>

        </table>";

      }else if($ret_code==4){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>The file has been deleted.</th></tr>

        </table>";

      }else if($ret_code==-4){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>The file has not been deleted.</th></tr>

        </table>";

      }else if($ret_code==5){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>The files have been deleted.</th></tr>

        </table>";

      }else if($ret_code==-5){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>The files have not been deleted.</th></tr>

        </table>";

      }

		  print "<table cellpadding='0' cellspacing='0'>";

      print "<tr><th class='record_head'>"; 

      //DISPLAY OUR DIRECTOY LINKS

        $add = ""; 

        for($i=0;$i<count($dir_pos)-1;$i++){

          //SPECIAL FOR OUR FIRST, DOESNT NEED ANY DIR VAR

            if($i==0){

                print "<a class='toolTipElement' title='Open Folder::View the contents of this folder.' href='?pid=".$this->id."'>".$dir_pos[$i]."</a><b>&raquo;</b>";                     

            }else{

                print "<a class='toolTipElement' title='Open Folder::View the contents of this folder.' href='?pid=".$this->id."&amp;dir=$add".$dir_pos[$i]."/'>".$dir_pos[$i]."</a><b>&raquo;</b>";

                $add.=$dir_pos[$i]."/";

            }

        }

      //

        if($user->user_perms[$this->id-1][1]==1){

          print "<a href='#' id='toggleForm' class='toolTipElement' title='Create a Folder::Create a folder in this directory.'><img src='images/folder_add.png' /></a>";

        }else{

          print "<img src='images/folder_add_disabled.png' />";

        }

      print "</th></tr></table>";

      //

        if($user->user_perms[$this->id-1][1]==1){

          print "<div id='folder-create'>";

            $this->folder_form($directory);

            print "</div>

            <script>

              var formSlide = new Fx.Slide('folder-create');

              $('toggleForm').addEvent('click', function(e){

                formSlide.toggle();

    						});

    						formSlide.hide();

            </script>";

        }

      print "<table cellpadding='0' cellspacing='0'>";

      //DISPLAY OUR FOLDERS, FOR THE CURRENT DIRECTORY

        print "<tr><th colspan='2'>File Name</th><th colspan='3'>Options</th></tr>";

          $folder_count = 0;

          for($i=0;$i<count($dir_list);$i++){

            if($dir_list[$i]['type']=="dir"){

              $folder_count++;

              $tmp = explode("/", $dir_list[$i]['name']);

            //

              $sql = "SELECT * FROM

                      ".$this->config->db_prefix."_files

                WHERE

                  extension = 'folder' AND

                  location = '".$directory.$tmp[count($tmp)-2]."/'";

              $results = $this->db->DB_Q_C($sql);

              $row=mysql_fetch_array($results);

            //

                if($striper){

                  $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";

                }else{

                  $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             

                }

                $striper=!$striper;

                print "<tr $effect>

                       <td width='23'><img src='images/folder.png' align='left'' alt='folder' /></td>

                       <td><a class='toolTipElement' title='View Details::View the contents of this folder.' href='?pid=".$this->id."&amp;dir=".$dir_list[$i]['name']."'>".$tmp[count($tmp)-2]."</a> <i>(".$this->folderType($row['note']).")</i></td>

                       <td width='23'><a class='toolTipElement' title='View Details::View the contents of this folder.' href='?pid=".$this->id."&amp;dir=".$dir_list[$i]['name']."'><img src='images/preview.png' border='0' alt='view' /></a></td>";

                if($tmp[count($tmp)-2]!="thumbs" && $user->user_perms[$this->id-1][1]==1){

                  print "<td width='23'><a class='toolTipElement' title='Upload Files::Upload files to this folder.' href='?pid=".$this->id."&amp;cid=1&amp;dir=../".$this->config->file_dir."/".$dir_list[$i]['name']."'><img src='images/folder_upload.png' border='0' alt='upload' /></a></td>";

                }else{

                  print "<td width='23'><img src='images/folder_upload_disabled.png' border='0' alt='upload' /></td>";

                }

                if($user->user_perms[$this->id-1][3]==1){

                  print "<td width='23'><a class='toolTipElement' title='Delete Folder::Delete this folder and all of its contents from the system.' href='?pid=".$this->id."&amp;cid=4&amp;ct=folder&amp;dir=".$dir_list[$i]['name']."'><img src='images/delete.png' border='0' alt='delete' /></a></td></tr>";

                }else{

                  print "<td width='23'><img src='images/delete_disabled.png' border='0' alt='delete' /></td>";

                }                 

            }

          }

      //DISPLAY OUR FILES FOR THE CURRENT DIRECTORY

      //GRAB DATA FROM THE DATABASE, SELECT JUST FILES FROM OUR CURRENT DIRECTORY

        $sql = "SELECT * FROM 

                  ".$this->config->db_prefix."_files 

                WHERE

                  location = '$directory' AND

                  extension != 'folder'

                ORDER BY id DESC LIMIT $start, $limit";

        $results = $this->db->DB_Q_C($sql);

        $count = mysql_affected_rows();

        $sql = "SELECT * FROM 

                  ".$this->config->db_prefix."_files 

                WHERE

                  location = '$directory' AND

                  extension != 'folder'

                  ORDER BY id DESC";

        $results2 = $this->db->DB_Q_C($sql);

        $total = mysql_affected_rows();

       //CHECK TO SEE IF WE HAVE ANY RESULTS

           if($count>0){

            print "<tr><td colspan='5'>

            <form method='post' action='?pid=".$this->id."&amp;cid=4&amp;ct=mult' id='multform' name='multform' onSubmit=\"this.the_action.value=clicked;\">

            <input type='hidden' name='the_action' value='submitok' />

            </td></tr>";

            while($row=mysql_fetch_array($results)){

             if($striper){

                $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";

              }else{

                $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             

              }

              $striper=!$striper;

              print "<tr $effect>

                    <td width='23'><input type='checkbox' value='".$row[0]."' name='mult_check[]' /></td>

                    <td><a class='toolTipElement' title='View Details::View details about this file' href='?pid=".$this->id."&amp;cid=2&amp;theid=".$row[0]."&amp;dir=".$curr_dir."'>".$row['name']."</a></td>

                    <td width='23'><a class='toolTipElement' title='View Details::View details about this file' href='?pid=".$this->id."&amp;cid=2&amp;theid=".$row[0]."&amp;dir=".$curr_dir."'><img src='images/preview.png' border='0' alt='view' /></a></td>";

              //

                if($user->user_perms[$this->id-1][2]==1){

                  print "<td width='23'><a class='toolTipElement' title='Edit File::Edit this file' href='?pid=".$this->id."&amp;cid=3&amp;theid=".$row[0]."&amp;dir=".$curr_dir."'><img src='images/edit.png' border='0' alt='edit' /></a></td>";

                }else{

                  print "<td width='23'><img src='images/edit_disabled.png' alt='' /></td>";

                }

              //

                if($user->user_perms[$this->id-1][3]==1){

                  print "<td width='23'><a class='toolTipElement' title='Delete File::Remove this file from the system' href='?pid=".$this->id."&amp;cid=4&amp;theid=".$row[0]."&amp;dir=".$curr_dir."'><img src='images/delete.png' border='0' alt='delete' /></a></td>";

                }else{

                  print "<td width='23'><img src='images/delete_disabled.png' alt='' /></td>";

                }           

              print "</tr>";

            }

            print "</table>";

            print "<table cellpadding='0' cellspacing='0'>";

            print "<tr><td align='right' colspan='6'>";

            print "<input type='button' name='CheckAll' value='Check All / Uncheck All' onClick=\"selectAll(document.multform, true)\">";

            print "<input type='hidden' name='dir' value='$curr_dir' />";

            print "<select class='required' name='multchoice' id='multchoice'>";

            print "<option value='0' selected='selected'>Please select an option</option>";

            print "<option value='delete'>Delete selected</option>";

            print "</select>";

            print "<input type='submit' name='multok' value='submit' onclick=\"clicked='multok'\"/></td></tr>";

            print "</form>

            <script>new FormValidator ('multform', {

                  onFormValidate: function(pass, form){ 

                    if(pass==true){

                      form.multok.disabled=true;

                    }

                  }

                });</script>

            ";

            if($total>$count){

                $name = array("pid", "cid", "dir");

                $data = array($_REQUEST['pid'], $_REQUEST['cid'], $_REQUEST['dir']); 

                pageNav($start, $limit, $total, $name, $data);

                print "<tr><th class='record_footer'>";       

                print "Showing $count out of a total of <b>$total</b> files in this folder</th></tr>";

              }else{

                if($count>1){

                  print "<tr><th colspan='5' class='record_footer'>There are a total of <b>$total</b> files in this folder</th></tr>";

                }else{

                  print "<tr><th colspan='5' class='record_footer'>There is <b>$total</b> file in this folder</th></tr>";

                }

              }  

          }else{

            print "<tr><td colspan='5'>There are no files in this folder.</td></tr>";

          }

      //

      print "</table>";

      print "</div></div>";



		}

		function folderType($allowed){

		  if($allowed=="all"){

        return "all files";

      }else  if($allowed=="images"){

        return "image files only";

      }else  if($allowed=="media"){

        return "media files only";

      }else  if($allowed=="documents"){

        return "document files only";

      }else{

        return "all files";

      }

    }

		/******************************************************************************************

		fck_link_view - view entries in the database, in a table format

		******************************************************************************************/

		function fck_link_view($user, $start=0, $limit=10){

		  //SET THE DIRECTORY

        if(!isset($_REQUEST['dir'])){

          //$directory = "../../../../../../../".$this->config->file_dir."/";

          $directory = "../../../../../../../";

        }else{

          //$directory = "../../../../../../../".$this->config->file_dir."/".$_REQUEST['dir'];

          $directory = "../../../../../../../".$_REQUEST['dir'];

        }

      //READ THE CURRENT DIRECTORY WE ARE IN

		    $dir_list = $this->read_dir($directory);

      //TRIM OFF OUR ../ OFF OF OUR DIRECTORY

        $tmp = str_replace("../", "", $directory);

        //$tmp = substr ($directory,21);

        $dir_pos = explode("/",$tmp);

		  print "<div id='records'><div id='content'>";

      print "<table cellpadding='0' cellspacing='0'>";

      print "<tr><th class='record_head'>"; 

      //DISPLAY OUR DIRECTOY LINKS

        print "<a href='?'>Top</a><b>&raquo;</b>";

        $add = ""; 

        for($i=0;$i<count($dir_pos)-1;$i++){

          print "<a href='?dir=$add".$dir_pos[$i]."/'>".$dir_pos[$i]."</a><b>&raquo;</b>";

          $add.=$dir_pos[$i]."/";  

        }

      print "</th></tr>";

      //DISPLAY OUR FOLDERS, FOR THE CURRENT DIRECTORY

        print "<tr><th>Folder Name</th><th>Options</th></tr>";

        for($i=0;$i<count($dir_list);$i++){

          if($dir_list[$i]['type']=="dir"){

            $tmp = explode("/", $dir_list[$i]['name']);

              if($striper){

                $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";

              }else{

                $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             

              }

              $striper=!$striper;

              print "<tr $effect>

                     <td>

                     <img src='../../../../../../../".$this->config->install_dir."/images/folder.png' align='left'' alt='folder' border='0'/>

                     <a href='?pid=".$this->id."&amp;dir=".$add.$tmp[count($tmp)-2]."/'>".$tmp[count($tmp)-2]."</a>

                     </td>

                     <td>

                     <a href='#'  title='Link to this folder' onclick='setImage(\"".$this->config->site_url.$add.$tmp[count($tmp)-2]."/\")'>

                     <img src='../../../../../../../".$this->config->install_dir."/images/page_link.png' align='left'' alt='folder' border='0'/>

                     </a>

                     </td>

                     </tr>";

          }

        }

      //DISPLAY OUR FILES FOR THE CURRENT DIRECTORY

        print "<tr><th colspan='2'>File Name</th></tr>";

      //GRAB DATA FROM THE DATABASE, SELECT JUST FILES FROM OUR CURRENT DIRECTORY

        $tmp = substr ($directory,18);

        $sql = "SELECT * FROM ".$this->config->db_prefix."_files WHERE

                  location = '$tmp' AND

                  extension != 'folder'

                  ORDER BY id DESC LIMIT $start, $limit";

        $results = $this->db->DB_Q_C($sql);

        $count = mysql_affected_rows();

        $sql = "SELECT * FROM ".$this->config->db_prefix."_files WHERE

                  location = '$tmp' AND

                  extension != 'folder'

                  ORDER BY id DESC";

        $results2 = $this->db->DB_Q_C($sql);

        $total = mysql_affected_rows();

       //CHECK TO SEE IF WE HAVE ANY RESULTS

           if($count>0){

            while($row=mysql_fetch_array($results)){

            /*************************************************************************************

            VERY IMPORTANT - WE NEED TO ADD THE SITE ROOT TO OUR IMAGE THAT WE RETURN            

            *************************************************************************************/                     

              $tmp_path = $this->config->site_url.substr($row['location'].$row['sys_name'], 3); //LIVE VERSION

              if($striper){

                $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";

              }else{

                $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             

              }

              $striper=!$striper;

              print "<tr $effect><td colspan='2'>";

             $ext = $row['extension'];

              if($row['note']=="thumbnail"){

                print "<a href='#' onclick='setImage(\"".$tmp_path."\")'><img src='../../../../../../".$row['location'].$row['sys_name']."' alt='".$row['name']."' border='0' /></a>";

              }else if($ext=="gif" || $ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="wbmp"){

                print "<a href='#' onclick='setImage(\"".$tmp_path."\")'><img src='../../../../../../".$row['location']."thumbs/".$row['sys_name']."' alt='".$row['name']."' border='0' /></a>";

              }else{

                print "<a href='#' onclick='setImage(\"".$tmp_path."\")'>".$row['name']."</a>";

              }

              print "</td>";

              print "</tr>";

            }

             if($total>$count){

              $name = array("pid", "dir");

              $data = array($_REQUEST['pid'], $_REQUEST['dir']); 

                pageNav($start, $limit, $total, $name, $data);

                print "<tr><th class='record_footer' colspan='2'>";       

                print "Showing $count out of a total of <b>$total</b> records in the system</th></tr>";

              }else{

                if($count>1){

                  print "<tr><th class='record_footer' colspan='2'>There are a total of <b>$total</b> files in this folder</th></tr>";

                }else{

                  print "<tr><th class='record_footer'>There is <b>$total</b> file in this folder</th></tr>";

                }

              }  

          }else{

            print "<tr><td colspan='2'>There are no files in this folder.</td></tr>";

          }

      /*print "<tr><td>";

      $this->fck_create_form($user);

      print "</td></tr>";*/

      //

      print "</table>";

      print "</div></div>";

		}

		/******************************************************************************************

		fck_link_view - view entries in the database, in a table format

		******************************************************************************************/

		function fck_file_view($user, $start=0, $limit=10){

		  //SET THE DIRECTORY

        if(!isset($_REQUEST['dir'])){

          $directory = "../../../../../../../".$this->config->file_dir."/";

          $no_upload = true;

        }else{

          $directory = "../../../../../../../".$this->config->file_dir."/".$_REQUEST['dir'];

        }

      //READ THE CURRENT DIRECTORY WE ARE IN

		    $dir_list = $this->read_dir($directory);

      //TRIM OFF OUR ../ OFF OF OUR DIRECTORY

        $tmp = substr ($directory,21);

        $dir_pos = explode("/",$tmp);

		  print "<div id='records'><div id='content'>";

      print "<table cellpadding='0' cellspacing='0'>";

      print "<tr><th class='record_head'>"; 

      //DISPLAY OUR DIRECTOY LINKS

        $add = ""; 

        for($i=0;$i<count($dir_pos)-1;$i++){

          //SPECIAL FOR OUR FIRST, DOESNT NEED ANY DIR VAR

            if($i==0){

                print "<a href='?'>".$dir_pos[$i]."</a><b>&raquo;</b>";       

            }else{

                print "<a href='?dir=$add".$dir_pos[$i]."/'>".$dir_pos[$i]."</a><b>&raquo;</b>";

                $add.=$dir_pos[$i]."/"; 

            }

        }

      print "</th></tr>";

      //DISPLAY OUR FOLDERS, FOR THE CURRENT DIRECTORY

        print "<tr><th>Folder Name</th></tr>";

        for($i=0;$i<count($dir_list);$i++){

          if($dir_list[$i]['type']=="dir"){

            $tmp = explode("/", $dir_list[$i]['name']);

              if($striper){

                $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";

              }else{

                $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             

              }

              $striper=!$striper;

              print "<tr $effect>

                     <td>

                     <img src='../../../../../../../".$this->config->install_dir."/images/folder.png' align='left'' alt='folder' />

                     <a href='?pid=".$this->id."&amp;dir=".$add.$tmp[count($tmp)-2]."/'>".$tmp[count($tmp)-2]."</a>

                     </td>

                     </tr>";

          }

        }

      //DISPLAY OUR FILES FOR THE CURRENT DIRECTORY

        print "<tr><th>File Name</th></tr>";

      //GRAB DATA FROM THE DATABASE, SELECT JUST FILES FROM OUR CURRENT DIRECTORY

        $tmp = substr ($directory,18);

        $sql = "SELECT * FROM ".$this->config->db_prefix."_files WHERE

                  location = '$tmp' AND

                  extension != 'folder'

                  ORDER BY id DESC LIMIT $start, $limit";

        $results = $this->db->DB_Q_C($sql);

        $count = mysql_affected_rows();

        $sql = "SELECT * FROM ".$this->config->db_prefix."_files WHERE

                  location = '$tmp' AND

                  extension != 'folder'

                  ORDER BY id DESC";

        $results2 = $this->db->DB_Q_C($sql);

        $total = mysql_affected_rows();

       //CHECK TO SEE IF WE HAVE ANY RESULTS

           if($count>0){

            while($row=mysql_fetch_array($results)){

            /*************************************************************************************

            VERY IMPORTANT - WE NEED TO ADD THE SITE ROOT TO OUR IMAGE THAT WE RETURN            

            *************************************************************************************/                     

              $tmp_path = $this->config->site_url.substr($row['location'].$row['sys_name'], 3); //LIVE VERSION

              if($striper){

                $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";

              }else{

                $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             

              }

              $striper=!$striper;

              print "<tr $effect><td>";

             $ext = $row['extension'];

              if($row['note']=="thumbnail"){

                print "<a href='#' onclick='setImage(\"".$tmp_path."\")'><img src='../../../../../../".$row['location'].$row['sys_name']."' alt='".$row['name']."' border='0' /></a>";

              }else if($ext=="gif" || $ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="wbmp"){

                print "<a href='#' onclick='setImage(\"".$tmp_path."\")'><img src='../../../../../../".$row['location']."thumbs/".$row['sys_name']."' alt='".$row['name']."' border='0' /></a>";

              }else{

                print "<a href='#' onclick='setImage(\"".$tmp_path."\")'>".$row['name']."</a>";

              }

              print "</td>";

              print "</tr>";

            }

             if($total>$count){

              $name = array("pid", "dir");

              $data = array($_REQUEST['pid'], $_REQUEST['dir']); 

                pageNav($start, $limit, $total, $name, $data);

                print "<tr><th class='record_footer' colspan='2'>";       

                print "Showing $count out of a total of <b>$total</b> records in the system</th></tr>";

              }else{

                if($count>1){

                  print "<tr><th class='record_footer' colspan='2'>There are a total of <b>$total</b> files in this folder</th></tr>";

                }else{

                  print "<tr><th class='record_footer'>There is <b>$total</b> file in this folder</th></tr>";

                }

              }  

          }else{

            print "<tr><td>There are no files in this folder.</td></tr>";

          }

      if($no_upload==false){

        print "<tr><th>Upload Files</th></tr>";

        print "<tr><td>";

        $this->fck_create_form($user);

        print "</td></tr>";

      }

      //

      print "</table>";

      print "</div></div>";

		}

		/******************************************************************************************

		menu - displays the menu for this module

		******************************************************************************************/

		function menu($user, $pid){

      $content = "";

      if($user->user_perms[$this->id-1][0]==1){

        if($pid==$this->id){

          $content = "<li id='menu_".$this->id."_style' class='active_module'><a id='menu_".$this->id."' name='menu_".$this->id."' class='toolTipElement' title='File Section::View, Manage or Upload files to the system.' href='#'>files</a></li>";

        }else{

          $content = "<li id='menu_".$this->id."_style'><a id='menu_".$this->id."' name='menu_".$this->id."' class='toolTipElement' title='File Section::View, Manage or Upload files to the system.' href='#'>files</a></li>";

        }

      }

      return $content; 

		}

		/******************************************************************************************

		submenu - displays the submenu for this module

		******************************************************************************************/

		function submenu($user, $pid, $cid){

		    //subtract one from the result, so it will match up with the user perm array

		  $content = "";

      if($user->user_perms[$this->id-1][0]==1){

		    $content = "<div id='submenu_".$this->id."'><ul>";

        if($cid==0 && $pid == $this->id){

          $content .= "<li class='active_module'><a class='toolTipElement' title='View Files::View files in your system.' href='?pid=$this->id&amp;cid=0'>view</a></li>";

        }else{

          $content .= "<li><a class='toolTipElement' title='View Files::View files in your system.' href='?pid=$this->id&amp;cid=0'>view</a></li>";

        }

        if($user->user_perms[$this->id-1][1]==1){

          if($cid==1 && $pid == $this->id){

            $content .= "<li class='active_module'><a class='toolTipElement' title='Upload Files::Upload files to the system.' href='?pid=$this->id&amp;cid=1'>upload</a></li>";

          }else{

            $content .= "<li><a class='toolTipElement' title='File Section::Upload files to the system.' href='?pid=$this->id&amp;cid=1'>upload</a></li>";

          }

        }

        if($cid==100 && $pid == $this->id){

          $content .= "<li class='active_module'><a class='toolTipElement' title='Further Help::Learn more about the file section of your site.' href='?pid=$this->id&amp;cid=100'>help</a></li>";

        }else{

          $content .= "<li><a class='toolTipElement' title='Further Help::Learn more about the file section of your site.' href='?pid=$this->id&amp;cid=100'>help</a></li>";

        }

		    $content.= "</ul></div>";

      }

      return $content; 

		}

		/******************************************************************************************

		create

		******************************************************************************************/

		 function display_create($theid, $user){

		  if($_REQUEST['ct']=="folder"){

        //$this->create_folder($user);

      }else{

        $this->create_form($user);

      }

    }

    /******************************************************************************************

		create

		******************************************************************************************/

		 function process_create($user){

		  if($_REQUEST['ct']=="folder"){

        return $this->create_folder($user);

      }

    }

    /******************************************************************************************

		edit

		******************************************************************************************/

    function display_edit($theid, $ret_code, $user){

      if($ret_code==0){

      }else if($ret_code==1){

        print "<div id='forms'><table width='100%'>

        <tr><th class='notice_record_head'>The file changes have been saved.</th></tr>

        </table></div>";

      }

      $dir = $_REQUEST['dir'];

      //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE

        $sql = "SELECT * FROM ".$this->config->db_prefix."_files WHERE

                ".$this->config->db_prefix."_files.id = $theid LIMIT 1";

        $result=$this->db->DB_Q_C($sql);

        $row = mysql_fetch_array($result);

      $this->edit_form($row['name'], $row['note'], $theid, $dir);

      $this->view_content($user, $theid);

    }

    /******************************************************************************************

		edit

		******************************************************************************************/

    function process_edit($user, $theid){

      $ret_code = array(1,$theid);

        //GRAB ALL THE INFORMATION FROM THE POST ACTION

  				$note = addslashes($_REQUEST['note']);

  				$filename = stripslashes($_REQUEST['filename']);

  				$old_filename = stripslashes($_REQUEST['old_filename']);

          $dir = $_REQUEST['dir'];

				//CREATE A UNIX TIMESTAMP

					$stamp = time();

					$date = gmdate("Y-m-d H:i:s", $stamp);

       	//UPDATE OUR FILES OBJECT

					$sql = "UPDATE 

                    ".$this->config->db_prefix."_files

                  SET 

                    name = '$filename',

                    note = '$note'

                  WHERE 

                    id = $theid";

					$results=$this->db->DB_Q_C($sql);

				//LOG THE ACTION

				  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 

								   VALUES('$date', '$user->user_id')";

					$results=$this->db->DB_Q_C($sql);

					$lastobjectid = mysql_insert_id();

				  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)

                  VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 1, $theid, 2)";

          $results=$this->db->DB_Q_C($sql);

        return $ret_code;

    }

    /******************************************************************************************

		edit_form

		******************************************************************************************/

		function edit_form($filename="", $note="", $theid, $dir){

		  print "<div id='forms'><div id='content'>";   

        print "<form id='edit_file' id='edit_form' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">";

        //HIDDEN FIELDS

          print "<input type='hidden' name='the_action' value='submitok' />";

          print "<input type='hidden' name='theid' value='$theid' />";

          print "<input type='hidden' name='dir' value='$dir' />";

          print "<input type='hidden' name='old_filename' value='$filename' />

        <input type='hidden' name='formprocess' value='yes' />";

  			print "<table width='100%' cellspacing='0' cellpadding='0'>";

  			print "<tr><th class='record_head' colspan='2'>File Edit Form</th></tr>";

  			print "<tr><td colspan='2'>Please fill in required fields below and click Save File to update your file in the system.</td></tr>";

  				//FILE NAME

  				  print "<tr><th>Name</th><td><input class='required' type='text' name='filename' value='$filename' /></td></tr>";

          //NOTE

  					print "<tr><th>Note</th><td>";

  					$oFCKeditor = new FCKeditor('note') ;

  					$oFCKeditor->Value = $note;

  					$oFCKeditor->Create() ;

  					print "</td></tr>";

  				//SUBMIT

  					print "<tr><th colspan='2' align='right'><input type='submit' name='submitok' value='Save File' onclick=\"clicked='submitok'\" /></th></tr>";

  			print "</table>";

  		print "</form>";

  		print "</div></div>

  		  <script>new FormValidator ('edit_file', {

          onFormValidate: function(pass, form){ 

            if(pass==true){

              form.submitok.disabled=true;

            }

          }

        });</script>";

		}

    /******************************************************************************************

		delete

		******************************************************************************************/

		function delete($user, $theid){

		  if($_REQUEST['ct']=="mult"){

        $this->delete_mult_file($user, $theid);

      }else if($_REQUEST['ct']=="folder"){

        $this->delete_folder();

      }else{

        $this->delete_file($user, $theid);

      }

    }

    /******************************************************************************************

		delete_folder

		******************************************************************************************/

		function display_delete($user, $theid){

		  if($_REQUEST['ct']=="mult"){

        $this->display_delete_mult_file($user, $theid);

      }else if($_REQUEST['ct']=="folder"){

        $this->display_delete_folder();

      }else{

        $this->display_delete_file($user, $theid);

      }

		}

    /******************************************************************************************

		delete_folder

		******************************************************************************************/

		function process_delete($user, $theid){

		  if($_REQUEST['ct']=="mult"){

        return $this->process_delete_mult_file($user, $theid);

      }else if($_REQUEST['ct']=="folder"){

        return $this->process_delete_folder();

      }else{

        return $this->process_delete_file($user, $theid);

      }

		}

		/******************************************************************************************

		delete_folder

		******************************************************************************************/

		function display_delete_folder(){

      $dir = $_REQUEST['dir'];

		  if($_REQUEST['dir']=="templates/"){

         print "<div id='error'><div id='content'>You do not have permission to delete this folder!</div></div>";

       }else{

          print "<div id='forms'><div id='content'>";

          print "<table cellpadding='0' cellspacing='0' width='100%'>";

          print "<tr><th class='record_head' colspan='2'>Delete Folder and All Files Under this folder?</th></tr>";

          print "<tr><td>";

            print "<form id='delete_folder' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">";

            //HIDDEN FIELDS

              print "<input type='hidden' name='the_action' value='submitok' />";

              print "<input type='hidden' name='theid' value='$theid' />";

              print "<input type='hidden' name='dir' value='$dir' />

        <input type='hidden' name='formprocess' value='yes' />";

              //GET PARENT FOLDER

        		   $pos = strrpos(substr($dir,0,strlen($dir)-1), "/");

        		   $dir =  substr($dir, 0, $pos)."/";

              print "<input type='hidden' name='parent' value='$dir' />";

              print "<select name='choice' class='required'>";

                print "<option value='no'>No, do not delete the folder</option>";

                print "<option value='yes'>Yes, delete the folder</option>";

              print "</select>";

              print "<input type='submit' name='submitexitok' value='Submit' onclick=\"clicked='submitexitok'\" />";

            print "</form>";

          print "</table>";

          print "</div></div>

          <script>new FormValidator ('delete_folder', {

            onFormValidate: function(pass, form){ 

              if(pass==true){

                form.submitexitok.disabled=true;

              }

            }

          });</script>";

       }

		}

    /******************************************************************************************

		delete_folder

		******************************************************************************************/

		function process_delete_folder(){

		  $ret_code = array(0,0);

      $dir = $_REQUEST['dir'];

        $parent = $_REQUEST['parent'];

        if($_REQUEST['choice']=="yes"){

    		  //SET THE DIRECTORY

            if(!isset($_REQUEST['dir'])){

              $directory = "../".$this->config->file_dir."/";

            }else{

              $directory = "../".$this->config->file_dir."/".$_REQUEST['dir'];

            }

            $thumbdir = $directory."thumbs/";

    		  //REMOVE ALL ENTRIES IN THE DATABASE FOR THE FILES IN THE DIRECTORY

            $sql = "DELETE FROM ".$this->config->db_prefix."_files WHERE

                    ".$this->config->db_prefix."_files.location = '$directory'"; 

            $results = $this->db->DB_Q_C($sql);

          //REMOVE ALL ENTRIES IN THE DATABASE FOR THE FILES IN THE DIRECTORY

            $sql = "DELETE FROM ".$this->config->db_prefix."_files WHERE

                    ".$this->config->db_prefix."_files.location = '$thumbdir'"; 

            $results = $this->db->DB_Q_C($sql);

    		  //REMOVE ALL FILES IN THE DIRECTORY AND THE DIRECTORY ITSELF

    		    $stat = $this->rmdirtree($directory);

    		    if($stat){

    		      //REMOVE ALL ENTRIES IN THE DATABASE FOR THE FILES IN THE DIRECTORY

                $sql = "DELETE FROM ".$this->config->db_prefix."_files WHERE location = '$directory'"; 

                $results = $this->db->DB_Q_C($sql);

                $ret_code[0] = 2;

            }else{

              //error

              $ret_code[0] = -3;

            }

    		}else{

          $ret_code[0] = -2;

        } 

        return $ret_code;	  

    }

    /******************************************************************************************

		delete

		******************************************************************************************/

		function display_delete_file($user, $theid){

      $dir = $_REQUEST['dir'];

		   print "<div id='forms'><div id='content'>";

        print "<table cellpadding='0' cellspacing='0' width='100%'>";

        print "<tr><th class='record_head' colspan='2'>Delete file?</th></tr>";

        print "<tr><td>";

          print "<form id='delete_file' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">";

          //HIDDEN FIELDS

            print "<input type='hidden' name='the_action' value='submitok' />";

            print "<input type='hidden' name='theid' value='$theid' />";

            print "<input type='hidden' name='dir' value='$dir' />

        <input type='hidden' name='formprocess' value='yes' />";

            print "<select name='choice' class='required'>";

              print "<option value='no'>No, do not delete the file</option>";

              print "<option value='yes'>Yes, delete the file</option>";

            print "</select>";

            print "<input type='submit' name='submitexitok' value='Submit' onclick=\"clicked='submitexitok'\" />";

          print "</form>";

        print "</table>";

        print "</div></div>

        <script>new FormValidator ('delete_file', {

          onFormValidate: function(pass, form){ 

            if(pass==true){

              form.submitexitok.disabled=true;

            }

          }

        });</script>

        ";

        $this->view_content($user, $theid);

		}

    /******************************************************************************************

		delete

		******************************************************************************************/

		function process_delete_file($user, $theid){

		  $ret_code = array(0,0);

      $dir = $_REQUEST['dir'];

        if($_REQUEST['choice']=="yes"){         

          //CREATE A UNIX TIMESTAMP

  					$stamp = time();

  					$date = gmdate("Y-m-d H:i:s", $stamp);

    		  //SET THE DIRECTORY

            if(!isset($_REQUEST['dir'])){

              $directory = "../".$this->config->file_dir."/";

            }else{

              $directory = "../".$this->config->file_dir."/".$_REQUEST['dir'];

            }

          //GRAB THE LOCATION OF THE FILE

            $sql = "SELECT * FROM ".$this->config->db_prefix."_files WHERE

                    id = $theid";

            $results = $this->db->DB_Q_C($sql);

            $row = mysql_fetch_array($results);

            $path = $row['location'].$row['sys_name'];

    		  //REMOVE ALL ENTRIES IN THE DATABASE FOR THE FILES IN THE DIRECTORY

            $sql = "DELETE FROM ".$this->config->db_prefix."_files WHERE id = $theid"; 

            $results = $this->db->DB_Q_C($sql);

    		  //REMOVE THE FILE

    		    unlink($path);

    		  //LOG THE ACTION

    				  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 

										   VALUES('$date', '$user->user_id')";

    					$results=$this->db->DB_Q_C($sql);

    					$lastobjectid = mysql_insert_id();

    				  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)

                      VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 1, $theid, 3)";

              $results=$this->db->DB_Q_C($sql);

          $ret_code[0] = 4;

    		}else{

          $ret_code[0] = -4;

        }

        return $ret_code;

    }

    /******************************************************************************************

		delete

		******************************************************************************************/

		function display_delete_mult_file($user, $theid){

		  $dir = $_REQUEST['dir'];

		   print "<div id='forms'><div id='content'>";

        print "<table cellpadding='0' cellspacing='0' width='100%'>";

        print "<tr><th class='record_head' colspan='2'>Delete files?</th></tr>";

        print "<tr><td>";

          print "<form id='delete_mult' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">";

          //HIDDEN FIELDS

            print "<input type='hidden' name='the_action' value='submitok' />";

            print "<input type='hidden' name='theid' value='$theid' />";

            print "<input type='hidden' name='dir' value='$dir' />

        <input type='hidden' name='formprocess' value='yes' />";

            print "<input type='hidden' name='multchoice' value='delete' />";

            for($i=0;$i<count($_REQUEST['mult_check']);$i++){

              print "<input type='hidden' name='mult_check[]' value='".$_REQUEST['mult_check'][$i]."' />";

            }

            print "<select name='choice' class='required'>";

              print "<option value='no'>No, do not delete the files</option>";

              print "<option value='yes'>Yes, delete the files</option>";

            print "</select>";

            print "<input type='submit' name='submitexitok' value='Submit' onclick=\"clicked='submitexitok'\" />";

          print "</form>";

        print "</table>";

        print "</div></div>

        <script>new FormValidator ('delete_mult', {

            onFormValidate: function(pass, form){ 

              if(pass==true){

                form.submitexitok.disabled=true;

              }

            }

          });</script>";

		}

    /******************************************************************************************

		delete

		******************************************************************************************/

		function process_delete_mult_file($user, $theid){

		  $ret_code = array(0,0);

		  $dir = $_REQUEST['dir'];

        if($_REQUEST['choice']=="yes"){

          //CREATE A UNIX TIMESTAMP

  					$stamp = time();

  					$date = gmdate("Y-m-d H:i:s", $stamp);

          //GRAB ALL THE IDS

            $mult_check = $_REQUEST['mult_check'];

    		    for($i=0;$i<count($mult_check);$i++){

    		      $theid = $mult_check[$i];

              //SET THE DIRECTORY

                if(!isset($_REQUEST['dir'])){

                  $directory = "../".$this->config->file_dir."/";

                }else{

                  $directory = "../".$this->config->file_dir."/".$_REQUEST['dir'];

                }

              //GRAB THE LOCATION OF THE FILE

                $sql = "SELECT * FROM ".$this->config->db_prefix."_files WHERE

                        id = $theid";

                $results = $this->db->DB_Q_C($sql);

                $row = mysql_fetch_array($results);

                $path = $row['location'].$row['sys_name'];

        		  //REMOVE ALL ENTRIES IN THE DATABASE FOR THE FILES IN THE DIRECTORY                    

                $sql = "DELETE FROM ".$this->config->db_prefix."_files WHERE id = $theid"; 

                $results = $this->db->DB_Q_C($sql);

        		  //REMOVE THE FILE

        		    unlink($path);

        		  //LOG THE ACTION

      				  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 

  										   VALUES('$date', '$user->user_id')";

      					$results=$this->db->DB_Q_C($sql);

      					$lastobjectid = mysql_insert_id();

      				  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)

                        VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 1, $theid, 3)";

                $results=$this->db->DB_Q_C($sql);

            }

    		  $ret_code[0] = 5;

    		}else{

    		  $ret_code[0] = -5;

        }

        return $ret_code;

    }

    function rmdirtree($dirname) {

      if(file_exists($dirname)){

        if (is_dir($dirname)) {    //Operate on dirs only

           $result=array();

           if (substr($dirname,-1)!='/') {$dirname.='/';}    //Append slash if necessary

           $handle = opendir($dirname);

           while (false !== ($file = readdir($handle))) {

               if ($file!='.' && $file!= '..') {    //Ignore . and ..

                  $path = $dirname.$file;

                  if(file_exists($path)){

                    if (is_dir($path)) {    //Recurse if subdir, Delete if file

                      $result=array_merge($result,$this->rmdirtree($path));

                    }else{

                      unlink($path);

                      $result[].=$path;

                    }

                  }

              }

           }

           closedir($handle);

           rmdir($dirname);    //Remove dir

           $result[].=$dirname;

           return $result;    //Return array of deleted items

        }else{

           return false;    //Return false if attempting to operate on a file

        }

      }else{

           return false;    //Return false if attempting to operate on a file

      }

    }

    /******************************************************************************************

		recursedir

		******************************************************************************************/

    function read_dir($BASEDIR) {

      $file_list = array();

      if(file_exists($BASEDIR)){

        $hndl=opendir($BASEDIR);

        while($file=readdir($hndl)) {

          if ($file!='.' && $file!='..' && $file!='Thumbs.db' && $file!='rss' && $file!='backup' && $file!='_face' && $file!='_scripts' && $file!='_images' && $file!='_templates' && $file!=$this->config->install_dir){

            //3=../ 1=beginning /

            $length = strlen($this->config->file_dir)+3+1;

            $completepath= substr("$BASEDIR$file",$length);

            if (is_dir("$BASEDIR$file")) {

              array_push($file_list, array(type=>"dir", name=>"$completepath/"));

            } else {

              array_push($file_list, array(type=>"file", name=>$file));

            }

          }

        }

      }else{

        print "<div id='error'><div id='content'>$BASEDIR ~ Invalid Directory!</div></div>";

      }

      return $file_list;

    }

    /******************************************************************************************

		recursedir

		******************************************************************************************/

    function read_dir_XML($BASEDIR) {

      //

        $sql = "SELECT * FROM

                  ".$this->config->db_prefix."_files

               WHERE

                  extension = 'folder' AND

                  location = '$BASEDIR/'";

        $results = $this->db->DB_Q_C($sql);

        $row = mysql_fetch_array($results);

      //

      $tmp_var = explode("/", $BASEDIR);

      $tmp_name = $tmp_var[count($tmp_var)-1];

      $xml .= "<node label='$tmp_name' url='$BASEDIR/' isBranch='true' allowed='".$row['note']."'>";

      $hndl=opendir($BASEDIR);

       while($file=readdir($hndl)) {

               if ($file=='.' || $file=='..' || $file=='thumbs' || $file=='rss' || $file=='templates' || $file=='backup') continue;

                       $completepath="$BASEDIR/$file";

                       if (is_dir($completepath)) {

                          $xml.=$this->read_dir_XML($BASEDIR.'/'.$file);

                       }

       }

       $xml .= '</node>';

       return $xml;

    }

    /******************************************************************************************

		flash_recursedir

		******************************************************************************************/

    function flash_recursedir($BASEDIR) {

       $hndl=opendir($BASEDIR);

       while($file=readdir($hndl)) {

               if ($file=='.' || $file=='..' || $file=='thumbs' || $file=='rss') continue;

                       $completepath="$BASEDIR/$file";

                       if (is_dir($completepath)) {

                               # its a dir, recurse.

                                $ret.="$BASEDIR/$file/[SPLIT]";

                               //print "DIR: $BASEDIR/$file<br>\n";

                               $ret.=$this->flash_recursedir($BASEDIR.'/'.$file);

                       }

       }

       return $ret;

    }

    /******************************************************************************************

		create_form - displays the form to create a news article

		******************************************************************************************/

    function create_form($user){

      $directory = $_REQUEST['dir'];

      $dir = $this->flash_recursedir("../".$this->config->file_dir);

      //CREATE DIRECTORY STRUCTURE IN XML

          $xml_dir=$this->read_dir_XML("../".$this->config->file_dir);

	        $file = "../".$this->config->file_dir."/dir.xml";

      	   if (!$handle = fopen($file, 'w+')) {

      			 echo "Cannot open file ($file)";

      			 exit;

      	   }

      	   if (fwrite($handle, $xml_dir) === FALSE) {

    			   echo "Cannot write to file ($file)";

    			   exit;

    		   }

		   fclose($handle);

		  //GET THE MAX FILE UPLOAD SIZE

		  $maxsize = ini_get('upload_max_filesize');

      $display_max = $maxsize;

		  if (!is_numeric($maxsize)) {

          if (strpos($maxsize, 'M') !== false)

              $maxsize = intval($maxsize)*1024*1024;

          elseif (strpos($maxsize, 'K') !== false)

              $maxsize = intval($maxsize)*1024;

          elseif (strpos($maxsize, 'G') !== false)

              $maxsize = intval($maxsize)*1024*1024*1024;

      }

      //

      print "<div id='records'><div id='content'>";

      print "<div id='flash_content'>";

			print "<a href='http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash&promoid=BIOW'>Please upgrade your Flash Player to the latest version (follow this link)</a>.";		

		  print "</div>";

		  print "<div><i>* max file size is ".$display_max."</i></div>";

      print "</div>";

      print "</div>";

      $selected_dir = explode("/", $directory);

		  print "<script type='text/javascript' defer='defer'>

		   var so = new SWFObject('flash/upload1.swf', 'home', '900', '240', '8', '#ededed');

		   so.addParam('menu', 'false');

       so.addParam('wmode', 'transparent');

   		 so.addVariable('xml_dir', \"$file\");

   		 so.addVariable('userid', '$user->user_id');

   		 so.addVariable('dir', \"$dir\");

   		 so.addVariable('selected_dir', \"".$selected_dir[count($selected_dir)-2]."\");

   		 so.addVariable('maxsize', \"$maxsize\");

		   so.write('flash_content');

		  </script>";

    }

    /******************************************************************************************

		create_form - displays the form to create a news article

		******************************************************************************************/

    function fck_create_form($user){

      $directory = $_REQUEST['dir'];

      $dir = $this->flash_recursedir("../../../../../../../".$this->config->file_dir);

      //CREATE DIRECTORY STRUCTURE IN XML

          $xml_dir=$this->read_dir_XML("../../../../../../../".$this->config->file_dir);

	        $file = "../../../../../../../".$this->config->file_dir."/dir.xml";

		  //GET THE MAX FILE UPLOAD SIZE

		  $maxsize = ini_get('upload_max_filesize');

      $display_max = $maxsize;

		  if (!is_numeric($maxsize)) {

          if (strpos($maxsize, 'M') !== false)

              $maxsize = intval($maxsize)*1024*1024;

          elseif (strpos($maxsize, 'K') !== false)

              $maxsize = intval($maxsize)*1024;

          elseif (strpos($maxsize, 'G') !== false)

              $maxsize = intval($maxsize)*1024*1024*1024;

      }

      //

      print "<div id='records'><div id='content'>";

      print "<div id='flash_content'>";

			print "<a href='http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash&promoid=BIOW'>Please upgrade your Flash Player to the latest version (follow this link)</a>.";		

		  print "</div>";

		  print "<p><i>* max file size is ".$display_max."</i></p>";

      print "</div>";

      print "</div>";

      $selected_dir = explode("/", $directory);

		  print "<script type='text/javascript' defer='defer'>

		   var so = new SWFObject('../../../../../../flash/small_upload.swf', 'home', '900', '75', '8', '#ededed');

		   so.addParam('menu', 'false');

   		 so.addVariable('xml_dir', \"$file\");

   		 so.addVariable('userid', '$user->user_id');

   		 so.addVariable('dir', \"$dir\");

   		 so.addVariable('selected_dir', \"".$selected_dir[count($selected_dir)-2]."\");

   		 so.addVariable('maxsize', \"$maxsize\");

       so.addParam('wmode', 'transparent');

		   so.write('flash_content');

		  </script>";

      /*$dir = $this->flash_recursedir("../../../../../../../".$this->config->file_dir);

      //

      print "<div id='records'><div id='content'>";

      print "<div id='flash_content'>";

			print "<a href='http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash&promoid=BIOW'>Please upgrade your Flash Player to the latest version (follow this link)</a>.";		

		  print "</div>";

      print "</div>";

      print "</div>";

		  print "<script type='text/javascript'>

		   var so = new SWFObject('../../../../../../flash/upload1.swf', 'home', '800', '240', '8', '#ECE9D8');

		   so.addParam('menu', 'false');

   		 so.addVariable('userid', '$user->user_id');

   		 so.addVariable('dir', \"$dir\");

   		 so.addVariable('selected_dir', \"$directory\");

		   so.write('flash_content');

		  </script>";*/

    }

    /******************************************************************************************

		create_folder

		******************************************************************************************/

    function create_folder($user){

      $ret_code = array(1,0);

      //GRAB OUR FOLDER PATH, AND THE REQUESTED NAME FOR THE FOLDER

        $folder_path = $_REQUEST['folder_path'];

        $create_folder = cleanstr($_REQUEST['create_folder']);

        $dir = $_REQUEST['dir'];

        $allowed_ext = $_REQUEST['allowed_ext'];

        $stat = mkdir($folder_path.$create_folder, 0777);

        if($stat){

          //CREATE A UNIX TIMESTAMP

            $stamp = time();

            $date = gmdate("Y-m-d H:i:s", $stamp);

          //INSERT INTO OUR FILES OBJECT

            $sql = "INSERT INTO ".$this->config->db_prefix."_files(name, sys_name, location, extension, note) 

            VALUES('$create_folder', '$create_folder', '$folder_path$create_folder/', 'folder', '$allowed_ext')";

            $results=$this->db->DB_Q_C($sql);

            $lastid = mysql_insert_id();

          //LOG THE ACTION

            $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 

            VALUES('$date', '$user->user_id')";

            $results=$this->db->DB_Q_C($sql);

            $lastobjectid = mysql_insert_id();

            $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)

            VALUES($lastobjectid, '".$user->user_id."', '4', 1, $lastid, 1)";

            $results=$this->db->DB_Q_C($sql);

        }else{

          //print "<div id='error'><div id='content'>An error has occurred!</div></div>";

          $ret_code = array(-1,0);

        }

        return $ret_code;

    }

    /******************************************************************************************

		folder_form

		******************************************************************************************/

    function folder_form($directory){

      $dir = $_REQUEST['dir'];

      print "<div id='forms'>

      <form name='createfolder' id='createfolder' method='post' action='?pid=".$this->id."&amp;cid=1&amp;ct=folder' onSubmit=\"this.the_action.value=clicked;\">

        <input type='hidden' name='the_action' value='submitok' />

        <input type='hidden' name='folder_path' value='$directory' />

        <input type='hidden' name='dir' value='$dir' />

        <input type='hidden' name='formprocess' value='yes' />

        <table width='100%' cellspacing='0' cellpadding='0'>

        <tr><th class='record_head' colspan='2'>Folder Submission Form</th></tr>

        <tr><td colspan='2'>Please fill in required fields below and click <b>Create Folder</b> to add your folder into the system.</td></tr>

        <tr><th>Name</th><td><input class='required validate-fileexists' type='text' name='create_folder' value='' /></td>

        <tr><th>Allowed Files</th><td><select name='allowed_ext'>

        <option value='all'>All Files</option>

        <option value='images'>Images Only</option>

        <option value='media'>Media Only</option>

        <option value='documents'>Documents Only</option>

        </select></td>

        <tr><td colspan='2'><input type='submit' name='submitexitok' value='Create Folder' onclick=\"clicked='submitexitok'\" /></td></tr>

        </table>

        </form></div>

         <script>

  		    new FormValidator ('createfolder', {

            onFormValidate: function(pass, form){ 

              if(pass==true){

                form.submitexitok.disabled=true;

              }

            }

          });

  		    FormValidator.add('validate-fileexists', {

          	errorMsg: 'A folder by that name allready exists in this directory, please use a different name.',

          	test: function(element) {

          	    var http = createRequestObject();

                http.open('post',  'includes/checkfileexsists.php', false);

      				  http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      				  var url='$directory'+element.getValue()+'/';

      				  http.send('file='+url);

      				  if(http.responseText=='false'){

      				    //the file does not exist

                  return true;

                }else if(http.responseText=='true'){

      				    //the file does exist, check to see if we are editing and the title is the same

                    return false;

                }

          	}

          });

  		  </script>";

    }

    /******************************************************************************************

		about

		******************************************************************************************/

    function about(){ 

      print "<div id='forms'><div id='content'>";

      print "<h1>About Files</h1>";

      print "<div id='about'>";

        print "<ul>";

          print "<li><a href='#1'>Do i need flash to upload files?</a></li>";

          print "<hr noshade='noshade' />";

          //

          print "<a name='1'></a><li>Do i need flash to upload files?";

            print "<p>Yes, flash is required.</p>";

          print "</li>";

        print "</ul>";

      print "</div></div></div>"; 

    }

	}

?>

