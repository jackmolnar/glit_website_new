<?php

  /******************************************************************************************

	  PERMISSION'S BREAK DOWN

	    [0] = OVERALL ACCESS TO THIS MODULE

	    [1] = ACCESS LOGS

	    [2] = BACKUP

	******************************************************************************************/

	class class_home{

		/******************************************************************************************

		CLASS VARIABLES

		******************************************************************************************/

		var $name;

		var $id;

		var $config;

		var $time;

		var $db;

		/******************************************************************************************

		class_home - constructor, initialize all variables. 

		******************************************************************************************/

		function class_home($db, $cfg, $t){

		  //MODULE NAME

		    $this->name = "Home";

		  //STORE THE DATABASE

		    $this->db = $db;

		  //STORE THE SITES CONFIG SETTINGS

		    $this->config = $cfg;

		  //STORE THE ID OF THIS MODULE

		    $sql = "SELECT * FROM ".$this->config->db_prefix."_modules WHERE name = 'class_home'";

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

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_modules` (name) VALUES ('class_home')";

  		  $results = $this->db->DB_Q_C($sql);

      	$lastid = mysql_insert_id();

      //SET PERMISSIONS FOR OUR DEFAULT USER

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_perms` (user_id, module_id, perm) VALUES (1, $lastid, '1111')";

  		  $results = $this->db->DB_Q_C($sql);

		}

		/******************************************************************************************

		backup

		******************************************************************************************/

		function backup(){

		  return "";

		}

		/******************************************************************************************

		menu - displays the menu for this module

		******************************************************************************************/

		function menu($user, $pid){

		  $content = "";

        if($user->user_perms[$this->id-1][0]==1){

          if($pid==$this->id){

            $content = "<li id='menu_".$this->id."_style' class='active_module'><a id='menu_".$this->id."' name='menu_".$this->id."' class='toolTipElement' title='Home Section::Set user options, view logs' href='#'>home</a></li>";

          }else{

            $content = "<li id='menu_".$this->id."_style' ><a id='menu_".$this->id."' name='menu_".$this->id."' class='toolTipElement' title='Home Section::Set user options, view logs' href='#'>home</a></li>";

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

          $content .= "<li class='active_module'><a class='toolTipElement' title='View Home::View the home page.' href='?pid=$this->id&amp;cid=0'>home</a></li>";

        }else{

          $content .= "<li><a class='toolTipElement' title='View Home::View the home page.' href='?pid=$this->id&amp;cid=0'>home</a></li>";

        }

        if($cid==1 && $pid == $this->id){

          $content .= "<li class='active_module'><a class='toolTipElement' title='View Options::View and Edit your options.' href='?pid=$this->id&amp;cid=1'>options</a></li>";

        }else{

          $content .= "<li><a class='toolTipElement' title='View Options::View and Edit your options.' href='?pid=$this->id&amp;cid=1'>options</a></li>";

        }

        if($user->user_perms[$this->id-1][1]==1){

          if($cid==2 && $pid == $this->id){

            $content .= "<li class='active_module'><a class='toolTipElement' title='Access Logs::View all activity in the system.' href='?pid=$this->id&amp;cid=2'>access logs</a></li>";

          }else{

            $content .= "<li><a class='toolTipElement' title='Access Logs::View all activity in the system.' href='?pid=$this->id&amp;cid=2'>access logs</a></li>";

          }

        }

        if($user->user_perms[$this->id-1][2]==1){

          if($cid==3 && $pid == $this->id){

            $content .= "<li class='active_module'><a class='toolTipElement' title='Site Backup::Backup your entire site.' href='?pid=$this->id&amp;cid=3'>backup</a></li>";

          }else{

            $content .= "<li><a class='toolTipElement' title='Site Backup::Backup your entire site.' href='?pid=$this->id&amp;cid=3'>backup</a></li>";

          }

        }

        if($cid==100 && $pid == $this->id){

          $content .= "<li class='active_module'><a class='toolTipElement' title='Further Help::Get some help on the booty.' href='?pid=$this->id&amp;cid=100'>help</a></li>";

        }else{

          $content .= "<li><a class='toolTipElement' title='Further Help::Get some help on the booty.' href='?pid=$this->id&amp;cid=100'>help</a></li>";

        }

		    $content.= "</ul></div>";

      }

      return $content;

		}

		/******************************************************************************************

		processAction

		******************************************************************************************/

		function processAction($cid, $user, $theid){

		  $extra = "";

		  if($user->user_perms[$this->id-1][0]==1){

        $ret_code = array();

        if($cid==1){

		      //OPTIONS

	         $ret_code = $this->process_options($user);

		    }else if($cid==3 && $user->user_perms[$this->id-1][2]==1){

		      //SITE BACKUP

	         $ret_code = $this->process_backup($user);

        }else if($cid==4 && $user->user_perms[$this->id-1][2]==1){

		      //SITE BACKUP

	         $ret_code = $this->process_delete_backup($user, $theid);

        }

		    //CONSTRUCT OUR RETURN ADDRESS

          if($_REQUEST['the_action']=='submitexitok'){

            //RETURN TO THE DEFAULT VIEW FOR THIS MODULE

              $extra = "?pid=".$this->id."&cid=3&rc=".$ret_code[0];

          }else if($_REQUEST['the_action']=='submitexitok_backup'){

            //RETURN TO THE DEFAULT VIEW FOR THIS MODULE

              $extra = "?pid=".$this->id."&cid=3&rc=".$ret_code[0];

          }else{

            //RETURN TO THE EDIT FORM OF THIS MODULE

              $extra = "?pid=".$this->id."&cid=$cid&theid=".$ret_code[1]."&rc=".$ret_code[0];

          }

          //WHEN DEALING WITH FILES THE DIR VAR WILL BE SET, SO LETS SET IT ON THE RETURN TRIP

          if(isset($_REQUEST['dir'])){

            $extra.= "&dir=".$_REQUEST['dir'];

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

	         $this->view($user);

        }else if($cid==1){

		      //OPTIONS

	         $this->display_options($user, $_REQUEST['rc']);

        }else if($cid==2 && $user->user_perms[$this->id-1][1]==1){

		      //ACCESS LOGS

	         $this->view_logs($user, $start, $limit);

        }else if($cid==3 && $user->user_perms[$this->id-1][2]==1){

		      //SITE BACKUP

	         $this->display_backup($user, $_REQUEST['rc']);

        }else if($cid==4 && $user->user_perms[$this->id-1][2]==1){

		      //DELETE BACKUP FILE

	         $this->display_delete_backup($user, $_REQUEST['theid']);

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

		site_backup 

		******************************************************************************************/

		function site_backup(){

		  print "<div id='forms'><div id='content'>

          <table cellpadding='0' cellspacing='0' width='100%'>

          <tr><th class='record_head' colspan='2'>Backup your site?</th></tr>

          <tr><td>

          <form method='post' id='backup_site' action='' onSubmit=\"this.the_action.value=clicked;\">

          <input type='hidden' name='the_action' value='submitok' />

          <input type='hidden' name='formprocess' value='yes' />

          <select name='choice' class='required'>

          <option value='no'>No, do not backup the site</option>

          <option value='yes'>Yes, backup the site</option>

          </select>

          <input type='submit' name='submitexitok' value='Submit' onclick=\"clicked='submitexitok'\" />

          </form>

          </table>

          </div></div>

          <script>new FormValidator ('backup_site', {

            onFormValidate: function(pass, form){ 

              if(pass==true){

                form.submitexitok.disabled=true;

              }

            }

          });</script>";

    }

    /******************************************************************************************

		process_delete

		******************************************************************************************/

    function process_delete_backup($user, $theid){

      $ret_code = array(0,0);

      $dir = $_REQUEST['dir'];

        if($_REQUEST['choice']=="yes"){         

          //CREATE A UNIX TIMESTAMP

  					$stamp = time();

  					$date = gmdate("Y-m-d H:i:s", $stamp);

    		  //

              $directory = "../".$this->config->file_dir."/backup/";

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

          $ret_code[0] = -4;

    		}else{

          $ret_code[0] = 4;

        }

        return $ret_code;

    }

    /******************************************************************************************

		site_backup 

		******************************************************************************************/

		function process_backup($user){

      include_once("class_zip.php");

      if($_REQUEST['choice']=='yes'){

        //CREATE A UNIX TIMESTAMP

        	$stamp = time();

      	  $date1 = gmdate("m-d-y", $stamp);

  				$date = gmdate("Y-m-d H:i:s", $stamp);

        	$title = "bu_".$date."_".$user->user_name.".zip";

        //CREATE THE BACKUP OF OUR DATABASE

          $filename = "../".$this->config->file_dir."/tmp_$date1.sql";

          passthru("mysqldump --opt -h".$this->config->db_host." -u".$this->config->db_user." -p".$this->config->db_pass." ".$this->config->db_name." >$filename");

        //

          $zipfile = new zipfile(); 

  		  //READ THE CURRENT DIRECTORY WE ARE IN

  		    $dir_list = $this->read_dir("../");

  		    for($i=0;$i<count($dir_list);$i++){

            if($dir_list[$i]['type']=="dir"){

              //echo $dir_list[$i]['name']."<br/>"; 

              $zipfile->add_dir($dir_list[$i]['name']);

            }else if($dir_list[$i]['type']=="file"){

              //echo $dir_list[$i]['name']."<br/>"; 

              $zipfile->add_file(file_get_contents($dir_list[$i]['loc'], false), $dir_list[$i]['name']);

            }

          }

        //REMOVE OUR TEMP SQL FILE

          unlink($filename);

        //CREATE THE SYSTEM NAME

          $sql = "SELECT id FROM ".$this->config->db_prefix."_files ORDER BY id DESC";

          $results=$this->db->DB_Q_C($sql);

          $total_files = mysql_fetch_array($results); 

          $total_files[0]++; 	 

          $sys_name = "file_".$total_files[0].".zip";

        //CREATE THE ZIP FILE

          $fileName = "../".$this->config->file_dir."/backup/$sys_name";

          $fd = fopen ($fileName, "w");

          $out = fwrite ($fd, $zipfile->file());

          fclose ($fd);

        //

          $sql ="INSERT INTO `".$this->config->db_prefix."_files` VALUES ('', '$title', '$sys_name', '../".$this->config->file_dir."/backup/', 'zip', 'A backup of your site.')";

          $results=$this->db->DB_Q_C($sql);

      		$lastid = mysql_insert_id();

        //LOG THE ACTION

          $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 

          			   VALUES('$date', '$user->user_id')";

          $results=$this->db->DB_Q_C($sql);

          $lastobjectid = mysql_insert_id();

          $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)

                  VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 1, $lastid, 1)";

          $results=$this->db->DB_Q_C($sql);

        //

          $ret_code = array(1, $lastid);

      }else{

          $ret_code = array(-1, 0);

      }

      return $ret_code;

    }

    /******************************************************************************************

		recursedir

		******************************************************************************************/

    function read_dir($BASEDIR) {

      $file_list = array();

      if(file_exists($BASEDIR)){

        $hndl=opendir($BASEDIR);

        while($file=readdir($hndl)) {

          if ($file!='.' && $file!='..' && $file!='backup'){

            if(substr($BASEDIR, 0,2)==".."){

              $tmp =  substr($BASEDIR, 3); 

            }

            if (is_dir("$BASEDIR$file")) {

              array_push($file_list, array(type=>"dir", name=>"$tmp$file/", loc=>"$BASEDIR$file/"));

              $tmp_array = array();

              $tmp_array = $this->read_dir("$BASEDIR$file/");

              $file_list = array_merge($file_list, $tmp_array);

            } else {

              array_push($file_list, array(type=>"file", name=>"$tmp$file", loc=>"$BASEDIR$file"));

            }

          }

        }

      }else{

        //print "<div id='error'><div id='content'>$BASEDIR ~ Invalid Directory!</div></div>";

      }

      return $file_list;

    }

    /******************************************************************************************

		display_log

		******************************************************************************************/

		function display_log($action, $subid, $date, $theid){

		  $ret = "";

		  if($subid==1){

        //backup

        if($action==1){

          //CREATE

          $ret = "Created a backup file on $date";

        }else if($action==3){

          //DELETE

          $ret = "Deleted a backup file on $date";

        }else{

          //UNKNOWN

          $ret = "Did unknown action to a backup file on $date";

        }

      }else{

        //UNKNOWN

          $ret = "Did unknown action to an unknown section on $date";

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

        print "<div id='home_perms_advanced'>";

          //TOTAL SUB-PERMISSION COUNT

            print "<input type='hidden' name='perm_".$this->name."_count' value='2' />";

            print "<table>";

            print "<tr><th colspan='2'>Advanced Permissions</th></tr>";

          //ACCESS LOGS

            if($user->user_perms[$this->id-1][1]==1){

              print "<tr><th>Access Logs</th><td>";

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

          //BACKUP

            if($user->user_perms[$this->id-1][2]==1){

              print "<tr><th>Site Backup</th><td>";

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

            print "</table>";

        print "</div>";

      print "</td></tr>";

      print "<script>

          var homeSlide = new Fx.Slide('home_perms_advanced');

					$('perm_".$this->name."').addEvent('change', function(e){

					   var tmp = $('perm_".$this->name."').options[$('perm_".$this->name."').selectedIndex].value;

					   if(tmp==0){

              homeSlide.slideOut();

             }else{

              homeSlide.slideIn();

             }

						});

					  var tmp = $('perm_".$this->name."').options[$('perm_".$this->name."').selectedIndex].value;

					  if(tmp==0){

              homeSlide.hide();

             }else{

              homeSlide.show();

             }

        </script>";

		}

    /******************************************************************************************

		display_templates

		******************************************************************************************/

    function display_backup($user, $ret_code){

        print "<div id='records'><div id='content'>";

      //

      if($ret_code==0){

      }else if($ret_code==1){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>Your site has been backed up.</th></tr>

        </table>";

      }else if($ret_code==-1){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>Your site has not been backed up.</th></tr>

        </table>";

      }else if($ret_code==-4){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>The backup file has been removed.</th></tr>

        </table>";

      }else if($ret_code==4){

        print "<table width='100%'>

        <tr><th class='notice_record_head'>The backup file has not been removed.</th></tr>

        </table>";

      }

      //

      $this->site_backup();

      $loc = "../".$this->config->file_dir."/backup/";

	    $sql = "SELECT * FROM

              ".$this->config->db_prefix."_files WHERE location = \"$loc\" AND

              extension = 'zip' ORDER BY id DESC";

      $results=$this->db->DB_Q_C($sql);

      $count = mysql_affected_rows();

      $total = $count;

      print "<table cellpadding='0' cellspacing='0'>

        <tr><th colspan='3' class='record_head'>Backups 

            </th></tr>";

      if($count>0){

        print "<tr><th>Title</th><th colspan='2'>Options</th></tr>";

        while($row=mysql_fetch_array($results)){

          if($striper){

            $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";

          }else{

            $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             

          }

          $striper=!$striper;

          print "<tr $effect>

                <td>".$row['name']."</td>

                <td width='23'><a class='toolTipElement' title='Download Backup::Download this backup zip file of your site.' href='".$row['location'].$row['sys_name']."'><img src='images/rebuild.png' border='0' alt='' /></a></td>

                <td width='23'><a class='toolTipElement' title='Delete backup::Delete this backup file from the system.' href='?pid=$this->id&amp;cid=4&amp;theid=".$row[0]."'><img src='images/delete.png' border='0' alt='' /></a></td>

                </tr>";

        }

        if($total>$count){

          $name = array("pid", "cid");

          $data = array($_REQUEST['pid'], $_REQUEST['cid']); 

          pageNav($start, $limit, $total, $name, $data);

          print "<tr><th colspan='3' class='record_footer'>

          Showing $count out of a total of <b>$total</b> records in the system</th></tr>";

        }else{

          if($count>1){

            print "<tr><th colspan='3' class='record_footer'>There are a total of <b>$total</b> records in the system</th></tr>";

          }else{

            print "<tr><th colspan='3' class='record_footer'>There is <b>$total</b> record in the system</th></tr>";

          }

        }      

      }else{

        print "<tr><td>There are no backup files in the system.</td></tr>";

      }

      print "</table>

      </div></div>";

    }

    /******************************************************************************************

		display_delete

		******************************************************************************************/

    function display_delete_backup($user, $theid){

        print "<div id='forms'><div id='content'>

          <table cellpadding='0' cellspacing='0' width='100%'>

          <tr><th class='record_head' colspan='2'>Delete backup file?</th></tr>

          <tr><td>

          <form method='post' id='delete_backup' action='' onSubmit=\"this.the_action.value=clicked;\">

          <input type='hidden' name='the_action' value='submitok' />

          <input type='hidden' name='formprocess' value='yes' />

          <input type='hidden' name='theid' value='$theid' />

          <select name='choice' class='required'>

          <option value='no'>No, do not delete the backup file</option>

          <option value='yes'>Yes, delete the backup file</option>

          </select>

          <input type='submit' name='submitexitok_backup' value='Submit' onclick=\"clicked='submitexitok_backup'\" />

          </form>

          </table>

          </div></div>

          <script>new FormValidator ('delete_backup', {

            onFormValidate: function(pass, form){ 

              if(pass==true){

                form.submitexitok_backup.disabled=true;

              }

            }

          });</script>";

        //$this->view_content($user, $theid);

    }

		/******************************************************************************************

		display_options 

		******************************************************************************************/

		function display_options($user, $ret_code=0){

		  if($ret_code==0){

      }else if($ret_code==1){

		    print "<div id='records'><div id='content'>";

        print "<table width='100%'>

        <tr><th class='notice_record_head'>Your options have been saved.</th></tr>

        </table>";

        print "</div></div>";

      }

      $this->options_form($user);

		}

		/******************************************************************************************

		process_options 

		******************************************************************************************/

		function process_options($user){

		  $ret_code = array(1, 0);

	    if($_REQUEST['dst']){

        $dst = 1;

      }else{

        $dst = 0;

      }

      $password = $_REQUEST['password'];

      $old_password = $_REQUEST['old_password'];

      $salt = $_REQUEST['sid'];

      $reset = 0;

      if($old_password != $password){

        //WE USE THE LAST ID OF OUR OBJECT AS THE SALT

        $new_password =  generateHash($password, $salt);

        $password = $new_password;

        $reset = 1;

      }

      //UPDATE THE USER

        $sql = "UPDATE 

                  ".$this->config->db_prefix."_user 

                SET 

                  tz = '".$_REQUEST['timezone']."', 

                  reclimit = '".$_REQUEST['reclimit']."', 

                  help = '".$_REQUEST['help']."', 

                  dst = '$dst', 

                  email = '".$_REQUEST['email']."',

                  reset = $reset,

                  password = '$password'

                WHERE 

                  id = ".$user->user_id;

        $results=$this->db->DB_Q_C($sql);

        return $ret_code;

		}

		/******************************************************************************************************

    options_form  

  	******************************************************************************************************/

		function options_form($user){

     print "<div id='forms'><div id='content'>";   

        print "<form method='post' action='' name='useroptions' id='useroptions' onSubmit=\"this.the_action.value=clicked;\">";

        print "<table width='100%' cellspacing='0' cellpadding='0'>";

  			print "<tr><th class='record_head' colspan='2'>User Options Form</th></tr>";

  			print "<tr><td colspan='2'>Set your personal options below.</td></tr>";

  			//HIDDEN

  			  print "<input type='hidden' name='the_action' value='submitok' />";

  			  print "<input type='hidden' name='old_password' value='".$user->user_pass."' />";

          print "<input type='hidden' name='sid' value='".$user->user_salt."' />

        <input type='hidden' name='formprocess' value='yes' />";

  			//PASSWORD

           print "<tr><th>Password</th><td><input class='required' type='password' name='password' value='".$user->user_pass."'/></td></tr>";

        //EMAIL

           print "<tr><th>Email</th><td><input class='required validate-email' size='45' type='text' name='email' value='".$user->user_email."' /></td></tr>";

  		 //RECORD LIMIT

    			print "<tr><th><a class='toolTipElement' title='::Default number of records to be viewed at one time on any page in the system.' href=''>Record Limit</a></th><td>";

    				print "<select name='reclimit'>";

    					if($user->user_reclimit==10){

    						print "<option selected='selected'>10</option>";

    					}else{

    						print "<option>10</option>";

    					}

    					if($user->user_reclimit==20){

    						print "<option selected='selected'>20</option>";

    					}else{

    						print "<option>20</option>";

    					}

    					if($user->user_reclimit==30){

    						print "<option selected='selected'>30</option>";

    					}else{

    						print "<option>30</option>";

    					}

    					if($user->user_reclimit==40){

    						print "<option selected='selected'>40</option>";

    					}else{

    						print "<option>40</option>";

    					}

    					if($user->user_reclimit==50){

    						print "<option selected='selected'>50</option>";

    					}else{

    						print "<option>50</option>";

    					}

    				print "</select>";

  		 //TIMEZONE

    		  print "<tr><th>Timezone</th><td>";

  				print "<select name='timezone'>";

  						print "

	<option value='1' ".$this->checkSelection($user->user_timezone, 1).">(GMT-12:00) International Date Line West</option>

	<option value='2' ".$this->checkSelection($user->user_timezone, 2).">(GMT-11:00) Midway Island Samoa</option>

	<option value='3' ".$this->checkSelection($user->user_timezone, 3).">(GMT-10:00) Hawaii</option>

	<option value='4' ".$this->checkSelection($user->user_timezone, 4).">(GMT-09:00) Alaska</option>

	<option value='5' ".$this->checkSelection($user->user_timezone, 5).">(GMT-08:00) Pacific Time (US & Canada); Tijuana</option>

	<option value='6' ".$this->checkSelection($user->user_timezone, 6).">(GMT-07:00) Arizona</option>

	<option value='7' ".$this->checkSelection($user->user_timezone, 7).">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>

	<option value='8' ".$this->checkSelection($user->user_timezone, 8).">(GMT-07:00) Mountain Time (US & Canada)</option>

	<option value='9' ".$this->checkSelection($user->user_timezone, 9).">(GMT-06:00) Central America</option>

	<option value='10' ".$this->checkSelection($user->user_timezone, 10).">(GMT-06:00) Central Time (US & Canada)</option>

	<option value='11' ".$this->checkSelection($user->user_timezone, 11).">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>

	<option value='12' ".$this->checkSelection($user->user_timezone, 12).">(GMT-06:00) Saskatchewan</option>

	<option value='13' ".$this->checkSelection($user->user_timezone, 13).">(GMT-05:00) Bogota, Lime, Quito</option>

	<option value='14' ".$this->checkSelection($user->user_timezone, '14').">(GMT-05:00) Eastern Time (US & Canada)</option>

	<option value='15' ".$this->checkSelection($user->user_timezone, 15).">(GMT-05:00) Indiana (East)</option>

	<option value='16' ".$this->checkSelection($user->user_timezone, 16).">(GMT-04:00) Atlantic Time (Canada)</option>

	<option value='17' ".$this->checkSelection($user->user_timezone, 17).">(GMT-04:00) Caracas, La Paz</option>

	<option value='18' ".$this->checkSelection($user->user_timezone, 18).">(GMT-04:00) Santiago</option>

	<option value='19' ".$this->checkSelection($user->user_timezone, 19).">(GMT-03:30) Newfoundland</option>

	<option value='20' ".$this->checkSelection($user->user_timezone, 20).">(GMT-03:00) Brasilia</option>

	<option value='21' ".$this->checkSelection($user->user_timezone, 21).">(GMT-03:00) Buenos Aires, Georgetown</option>

	<option value='22' ".$this->checkSelection($user->user_timezone, 22).">(GMT-03:00) Greenland</option>

	<option value='23' ".$this->checkSelection($user->user_timezone, 23).">(GMT-02:00) Mid-Atlantic</option>

	<option value='24' ".$this->checkSelection($user->user_timezone, 24).">(GMT-01:00) Azores</option>

	<option value='25' ".$this->checkSelection($user->user_timezone, 25).">(GMT-01:00) Cape Verde Is.</option>

	<option value='26' ".$this->checkSelection($user->user_timezone, 26).">(GMT) Casablanca, Monrovia</option>

	<option value='27' ".$this->checkSelection($user->user_timezone, 27).">(GMT) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>

	<option value='28' ".$this->checkSelection($user->user_timezone, 28).">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>

	<option value='29' ".$this->checkSelection($user->user_timezone, 29).">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>

	<option value='30' ".$this->checkSelection($user->user_timezone, 30).">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>

	<option value='31' ".$this->checkSelection($user->user_timezone, 31).">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>

	<option value='32' ".$this->checkSelection($user->user_timezone, 32).">(GMT+01:00) West Central Africa</option>

	<option value='33' ".$this->checkSelection($user->user_timezone, 33).">(GMT+02:00) Athens, Istanbul, Minsk</option>

	<option value='34' ".$this->checkSelection($user->user_timezone, 34).">(GMT+02:00) Bucharest</option>

	<option value='35' ".$this->checkSelection($user->user_timezone, 35).">(GMT+02:00) Cairo</option>

	<option value='36' ".$this->checkSelection($user->user_timezone, 36).">(GMT+02:00) Harare, Pretoria</option>

	<option value='37' ".$this->checkSelection($user->user_timezone, 37).">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>

	<option value='38' ".$this->checkSelection($user->user_timezone, 38).">(GMT+02:00) Jerusalem</option>

	<option value='39' ".$this->checkSelection($user->user_timezone, 39).">(GMT+03:00) Baghdad</option>

	<option value='40' ".$this->checkSelection($user->user_timezone, 40).">(GMT+03:00) Kuwait, Riyadh</option>

	<option value='41' ".$this->checkSelection($user->user_timezone, 41).">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>

	<option value='42' ".$this->checkSelection($user->user_timezone, 42).">(GMT+03:00) Nairobi</option>

	<option value='43' ".$this->checkSelection($user->user_timezone, 43).">(GMT+03:30) Tehran</option>

	<option value='44' ".$this->checkSelection($user->user_timezone, 44).">(GMT+04:00) Abu Dhabi, Muscat</option>

	<option value='45' ".$this->checkSelection($user->user_timezone, 45).">(GMT+04:00) Baku, Tbilisi, Yerevan</option>

	<option value='46' ".$this->checkSelection($user->user_timezone, 46).">(GMT+04:30) Kabul</option>

	<option value='47' ".$this->checkSelection($user->user_timezone, 47).">(GMT+05:00) Ekaterinburg</option>

	<option value='48' ".$this->checkSelection($user->user_timezone, 48).">(GMT+05:00) Islamabad, Karachi, Tashkent</option>

	<option value='49' ".$this->checkSelection($user->user_timezone, 49).">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>

	<option value='50' ".$this->checkSelection($user->user_timezone, 50).">(GMT+05.75) Kathmandu</option>

	<option value='51' ".$this->checkSelection($user->user_timezone, 51).">(GMT+06:00) Almaty, Novosibirsk</option>

	<option value='52' ".$this->checkSelection($user->user_timezone, 52).">(GMT+06:00) Astana, Dhaka</option>

	<option value='53' ".$this->checkSelection($user->user_timezone, 53).">(GMT+06:00) Sri Jayawardenepura</option>

	<option value='54' ".$this->checkSelection($user->user_timezone, 54).">(GMT+06:30) Rangoon</option>

	<option value='55' ".$this->checkSelection($user->user_timezone, 55).">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>

	<option value='56' ".$this->checkSelection($user->user_timezone, 56).">(GMT+07:00) Krasnoyarsk</option>

	<option value='57' ".$this->checkSelection($user->user_timezone, 57).">(GMT+08:00) Beijing, Chongging, Hong Kong, Urumgi</option>

	<option value='58' ".$this->checkSelection($user->user_timezone, 58).">(GMT+08:00) Irkutsk, Ulaan Bataar</option>

	<option value='59' ".$this->checkSelection($user->user_timezone, 59).">(GMT+08:00) Kuala Lumpur, Singapore</option>

	<option value='60' ".$this->checkSelection($user->user_timezone, 60).">(GMT+08:00) Perth</option>

	<option value='61' ".$this->checkSelection($user->user_timezone, 61).">(GMT+08:00) Taipei</option>

	<option value='62' ".$this->checkSelection($user->user_timezone, 62).">(GMT+09:00) Osaka, Sapporo, Tokyo</option>

	<option value='63' ".$this->checkSelection($user->user_timezone, 63).">(GMT+09:00) Seoul</option>

	<option value='64' ".$this->checkSelection($user->user_timezone, 64).">(GMT+09:00) Yakutsk</option>

	<option value='65' ".$this->checkSelection($user->user_timezone, 65).">(GMT+09:30) Adelaide</option>

	<option value='66' ".$this->checkSelection($user->user_timezone, 66).">(GMT+09:30) Darwin</option>

	<option value='67' ".$this->checkSelection($user->user_timezone, 67).">(GMT+10:00) Brisbane</option>

	<option value='68' ".$this->checkSelection($user->user_timezone, 68).">(GMT+10:00) Canberra, Melbourne, Sydney</option>

	<option value='69' ".$this->checkSelection($user->user_timezone, 69).">(GMT+10:00) Guam, Port Moresby</option>

	<option value='70' ".$this->checkSelection($user->user_timezone, 70).">(GMT+10:00) Hobart</option>

	<option value='71' ".$this->checkSelection($user->user_timezone, 71).">(GMT+10:00) Vladivostok</option>

	<option value='72' ".$this->checkSelection($user->user_timezone, 72).">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>

	<option value='73' ".$this->checkSelection($user->user_timezone, 73).">(GMT+12:00) Auckland, Wellington</option>

	<option value='74' ".$this->checkSelection($user->user_timezone, 74).">(GMT+12:00) Figi, Kamchatka, Marshall Is.</option>

	<option value='75' ".$this->checkSelection($user->user_timezone, 75).">(GMT+13:00) Nuku'alofa</option>";

  					print "</select></td>";

  	     	print "</tr>";

  	   //DST

  	     print "<tr><th>Daylight Savings</th><td>";

  		  print "<select name='dst'>";

        if($user->user_dst==1){

          print "<option value='1' selected='selected'>Yes, observe day light savings time</option>"; 

          print "<option value='0'>No</option>";           

        }else{

          print "<option value='1'>Yes, observe day light savings time</option>"; 

          print "<option value='0' selected='selected'>No</option>";          

        }

  		  print "</select>";

         print "</td></tr>";

  		 //HELP TEXT

  		  print "<tr><th>Help Text</th><td>";

  		  print "<select name='help'>";

  		    if($user->user_help==1){

  		      print "<option value='1' selected='selected'>Yes, Help text on</option>";

  		      print "<option value='0'>No, I don't need any help</option>";

          }else{

  		      print "<option value='1'>Yes, Help text on</option>";

  		      print "<option value='0' selected='selected'>No, I don't need any help</option>";

          }

        print "</select>";

  	    print "</td></tr>";

  	   //SUBMIT

  				print "<tr><th colspan='2' align='right'><input type='submit' name='submitok' value='Save Options' onclick=\"clicked='submitok'\" /></th></tr>";

  			print "</table>";

  		print "</form>";

  		print "</div></div>

      <script>new FormValidator ('useroptions', {

          onFormValidate: function(pass, form){ 

            if(pass==true){

              form.submitok.disabled=true;

            }

          }

        });</script>";

  }

  /******************************************************************************************************

  checkSelection  

	******************************************************************************************************/

	function checkSelection($usertz, $tz){

		if($usertz == $tz){

			return "selected='selected' ";

		}  

	}

		/******************************************************************************************

		view 

		******************************************************************************************/

		function view($user){

		  $user_list = $user->get_users();

		  $list = "<ul>";

      for($i=0;$i<count($user_list);$i++){

        $list.= "<li>".$user_list[$i]."</li>";

      }

		  $list.= "</ul>";

		  print "<div id='records'>

          <div id='content'>

            <table>

            <tr>

            <td>

                <h1>Welcome to the booty of your site!</h1>

                <p>For the latest information about the bootyCMS, please visit the <a href='http://www.bootycms.com/'>bootyCMS website.</a></p>

            </td>

            <td>

              <h1>Users online</h1>

              <p>There are ".$user->count_users()." users currently online.</p>

              $list

            </td>

            </tr>

            </table>

          </div>

        </div>";

    }

    /******************************************************************************************

		view 

		******************************************************************************************/

		function view_logs($user, $start=0, $limit=10){

		  //GRAB AND STORE USER MODULE ID

		    $sql = "SELECT * FROM ".$this->config->db_prefix."_modules WHERE name = 'class_users'";

		    $results = $this->db->DB_Q_C($sql);

		    $row=mysql_fetch_array($results);

		    $user_mod_id = $row[0];

		  //GRAB PERMISSIONS FOR THE USER - A USER CAN ONLY SEE ACCESS LOGS THAT THEY HAVE PERMISSION TOO SEE

  		  $mods.="(";

  		  for($i=0;$i<count($user->user_perms);$i++){

          if($user->user_perms[$i][0]==1){

            $tmp_var = $i+1;

            $mods.= "module_id = $tmp_var OR ";

          }

        }

        $mods = substr($mods, 0, strlen($mods)-4);

  		  $mods.=")";

		    $sql = "SELECT * FROM 

                  ".$this->config->db_prefix."_logs, 

                  ".$this->config->db_prefix."_object, 

                  ".$this->config->db_prefix."_user 

              WHERE

                  ".$this->config->db_prefix."_logs.object_id =  ".$this->config->db_prefix."_object.id AND

                  ".$this->config->db_prefix."_logs.user_id =  ".$this->config->db_prefix."_user.id AND $mods

              ORDER BY ".$this->config->db_prefix."_logs.id DESC LIMIT $start, $limit";

        $results = $this->db->DB_Q_C($sql);

        $count = mysql_affected_rows();

        //COUNT ALL THE RECORDS IN THE SYSTEM

        $sql = "SELECT * FROM ".$this->config->db_prefix."_logs, ".$this->config->db_prefix."_object, ".$this->config->db_prefix."_user WHERE

                ".$this->config->db_prefix."_logs.object_id =  ".$this->config->db_prefix."_object.id AND

                ".$this->config->db_prefix."_logs.user_id =  ".$this->config->db_prefix."_user.id AND $mods

                    ORDER BY ".$this->config->db_prefix."_logs.id DESC";

        $results2 = $this->db->DB_Q_C($sql);

        $total = mysql_affected_rows();

        //

        print "<div id='records'><div id='content'>";

        print "<table cellpadding='0' cellspacing='0'>";

        print "<tr><th class='record_head'>Access Logs</th></tr>";

        if($count>0){

          if($total>$count){

            $name = array("pid", "cid");

            $data = array($_REQUEST['pid'], $_REQUEST['cid']); 

            print "<tr><th colspan='3' class='record_footer'>"; 

            pageNav($start, $limit, $total, $name, $data);

            print "</th></tr>";

          }

          print "<tr><th>User</th><th>Action</th></tr>";

          while($row=mysql_fetch_array($results)){

            //GET AND CONVERT DATE ACCORDINGLY

					   $tmp_date = $this->time->convertTime($user->user_timezone, $row['create_date']);

					   $create_date = DateFormat($tmp_date, $this->config->date_format);          

              if($striper){

                $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";

              }else{

                $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             

              }

              $striper=!$striper;

              //DETERMINE THE ACTION 

                $sql = "SELECT * FROM ".$this->config->db_prefix."_modules WHERE id = ".$row['module_id'];

                $results2 = $this->db->DB_Q_C($sql);

                $row2=mysql_fetch_array($results2);

              //

                //if($user->user_perms[$row2[0]-1][0]=='1'){

                  $module = new $row2['name']($this->db, $this->config, $this->time);

                //}



              //if($user->user_perms[$mod_id]==1){

		            

                print "<tr $effect>

                      <td><a class='toolTipElement' title='View::View details about this user.' href='?pid=$user_mod_id&cid=2&theid=".$row['user_id']."'>".$row['username']."</a></td>

                      <td>".$module->display_log($row['action'], $row['sub_module_id'], $create_date, $row['record_id'])."</td>

                      </tr>";

              //}

          }

          if($total>$count){

            print "<tr><th align='right' colspan='3' class='record_footer'>";

            $name = array("pid", "cid");

            $data = array($_REQUEST['pid'], $_REQUEST['cid']); 

            pageNav($start, $limit, $total, $name, $data);

            print "</th></tr>";

            print "<tr><th colspan='3' class='record_footer'>";       

            print "Showing $count out of a total of <b>$total</b> records in the system</th></tr>";

          }else{

            if($count>1){

              print "<tr><th colspan='3' class='record_footer'>There are a total of <b>$total</b> records in the system</th></tr>";

            }else{

              print "<tr><th colspan='3' class='record_footer'>There is <b>$total</b> record in the system</th></tr>";

            }

          }      

        }else{

          print "<tr><td>There are no records in the system.</td></tr>";

        }

        print "</table>";

        print "</div></div>";

		}

		/******************************************************************************************

		about

		******************************************************************************************/

		function about(){

		  print "

      <div id='forms'>

        <div id='content'>

          <h1>About the bootyCMS</h1>

          <div id='about'>

            <ul>

              <li><a href='#1'>What are the server requirements to run the booty?</a></li>

              <li><a href='#2'>Will my browser work with the booty?</a></li>

              <li><a href='#3'>What can I do with a backup file that I downloaded?</a></li>

              <hr noshade='noshade' />

              <a name='1'></a>

                <li>What are the server requirements to run the booty?

                  <p>

                    Any server with php(PHP Version 4.4.7+) and mysql(MYSQL 4.1.11+) installed. 

                    This server is currently running <strong>PHP Version ".phpversion()."</strong> and <strong>MYSQL Version ".mysql_get_server_info()."</strong>. 

                    Older versions of php and mysql may work, but as of now have not been fully tested.

                  </p>

                </li>

              <a name='2'></a>

                <li>Will my browser work with the booty?

                  <p>

                    We recommend using the latest web browsers, but Firefox 1.0+ and Internet Explorer 6.0+ should work just fine. 

                    The latest flash player is recommended as well, you can install it <a href='http://www.adobe.com/products/flashplayer/'>here if need be</a>.

                    Javascript also must be enabled, if it is disabled you may receive unexpected results.

                  </p>

                </li>

              <a name='3'></a>

                <li>What can I do with a backup file that I downloaded?

                  <p>

                    Keep it secret, keep it safe. If for some reason you lose any data on your site, you can use that file to restore your entire site to the state it was in when you created the backup file. 

                    It is always a good idea to create a backup and download it for safe keeping, just in case.

                  </p>

                </li>

            </ul>

          </div>

        </div>

      </div>";

		}

	}

?>

