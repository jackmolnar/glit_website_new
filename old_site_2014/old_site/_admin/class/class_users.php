<?php
	/******************************************************************************************
	  PERMISSION'S BREAK DOWN
	    [0] = OVERALL ACCESS TO THIS MODULE
	    [1] = CREATE A USER
	    [2] = EDIT A USER
	    [3] = DELETE A USER
	*******************************************************************************************  
	*******************************************************************************************
	  SUB-MODULE ID'S
	     1 - USER
	******************************************************************************************/
	class class_users{
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
		function class_users($db, $cfg, $t){
		  //MODULE NAME
		    $this->name = "Users";
		  //STORE THE DATABASE
		    $this->db = $db;
		  //STORE THE SITES CONFIG SETTINGS
		    $this->config = $cfg;
		   //STORE THE ID OF THIS MODULE
		    $sql = "SELECT * FROM ".$this->config->db_prefix."_modules WHERE name = 'class_users'";
		    $result = $this->db->DB_Q_C($sql);
		    if(mysql_affected_rows()>0){
		      $this->id = mysql_result($result,0,'id');
		    }
		  //STORE THE TIME OBJECT
		    $this->time = $t;
		}
		/******************************************************************************************
		install
		******************************************************************************************/
		function install($date){
		  //STORE OUR MODULE
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_modules` (name) VALUES ('class_users')";
  		  $results = $this->db->DB_Q_C($sql);
      	$lastid = mysql_insert_id();
      //SET PERMISSIONS FOR OUR DEFAULT USER
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_perms` (user_id, module_id, perm) VALUES (1, $lastid, '1111')";
  		  $results = $this->db->DB_Q_C($sql);
  		//
  		  $sql = "
          CREATE TABLE `".$this->config->db_prefix."_useronline` (
            `id` int(10) NOT NULL auto_increment,
            `ip` varchar(15) NOT NULL default '',
            `timestamp` varchar(15) NOT NULL default '',
            `user_id` int(11) NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `id`(`id`)
          ) TYPE=MyISAM COMMENT='' AUTO_INCREMENT=1 ;
        ";
  		  $results = $this->db->DB_Q_C($sql);
  		//CREATE THE TABLE FOR THIS MODULE
  		  $sql = "
          CREATE TABLE `".$this->config->db_prefix."_user` (
            `id` int(11) NOT NULL auto_increment,
            `username` varchar(100) NOT NULL default '',
            `password` varchar(200) NOT NULL default '',
            `email` varchar(100) NOT NULL default '',
            `last_log` datetime NOT NULL default '0000-00-00 00:00:00',
            `ip` varchar(100) NOT NULL default '',
            `active` varchar(100) NOT NULL default 'yes',
            `tz` varchar(100) NOT NULL default '',
            `reclimit` int(3) NOT NULL default '10',
            `help` tinyint(1) NOT NULL default '1',
            `reset` tinyint(1) NOT NULL default '0',
            `dst` tinyint(1) NOT NULL default '0',
            `salt` int(11) NOT NULL default '1',
            PRIMARY KEY  (`id`),
            UNIQUE KEY `username` (`username`)
          ) ENGINE=MyISAM;";
  		  $results = $this->db->DB_Q_C($sql);
  		//GRAB OUR TIMEZONE ID WITH THE DAY LIGHT SAVINGS ON - BY DEFAULT
  		  $sql = "SELECT * FROM ".$this->config->db_prefix."_timezone 
                WHERE 
                  gmt_offset = ".$this->config->default_tz." AND
                  dst_offset = 1";
        $results = $this->db->DB_Q_C($sql);
        $count = mysql_affected_rows();
        if($count>0){
          $row = mysql_fetch_array($results);
          $tmp_timezone = $row['timezoneid'];
        }else{
          $tmp_timezone = 1;
        }
  		//CREATE OUR DEFAULT USER
  		  srand ((double) microtime( )*1000000);
        $salt = rand();
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_user` 
                  (username, password, email, last_log, ip, active, tz, reclimit, help, reset, dst, salt) 
                VALUES 
                  ('admin', '".generateHash("change", $salt)."', 'admin@yoursite.com', '$date', '', 'yes', '".$tmp_timezone."', 10, 1, 1, 1, $salt)";
  		  $results = $this->db->DB_Q_C($sql);
      	$record_id = mysql_insert_id();
  		//STORE OUR OBJECT
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
  		  $results = $this->db->DB_Q_C($sql);
      	$object_id = mysql_insert_id();
  		//STORE OUR LOG INFO
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, 1, $lastid, 1, $record_id, 1)";
  		  $results = $this->db->DB_Q_C($sql);
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
		display_delete
		******************************************************************************************/
    function display_delete($user, $theid){
      $sql = "SELECT * FROM 
            ".$this->config->db_prefix."_user, 
            ".$this->config->db_prefix."_logs, 
            ".$this->config->db_prefix."_object
         WHERE
            ".$this->config->db_prefix."_user.id = $theid AND
            ".$this->config->db_prefix."_user.id = ".$this->config->db_prefix."_logs.record_id AND
            ".$this->config->db_prefix."_logs.module_id = ".$this->id." AND
            ".$this->config->db_prefix."_logs.sub_module_id = 1 AND
            ".$this->config->db_prefix."_logs.object_id = ".$this->config->db_prefix."_object.id AND
            ".$this->config->db_prefix."_logs.action = 1
        ORDER BY create_date DESC";
        $result=$this->db->DB_Q_C($sql);
        $row = mysql_fetch_array($result);
        if($row[0]>1 && $row['create_who']!=0 && ($row['create_who']==$user->user_id || $row[0]==$user->user_id)){ 
          print "<div id='forms'><div id='content'>";
          print "<table cellpadding='0' cellspacing='0' width='100%'>";
          print "<tr><th class='record_head' colspan='2'>Delete this user?</th></tr>";
          print "<tr><td>";
            print "<form id='delete_user' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">";
            //HIDDEN FIELDS
              print "<input type='hidden' name='the_action' value='submitok' />
              <input type='hidden' name='theid' value='$theid' />
              <input type='hidden' name='formprocess' value='yes' />";
              print "<select name='choice' class='requried'>";
                print "<option value='no'>No, do not delete the user</option>";
                print "<option value='yes'>Yes, delete the user</option>";
              print "</select>";
              print "<input type='submit' name='submitexitok' value='Submit' onclick=\"clicked='submitexitok'\" />";
            print "</form>";
          print "</table>";
          print "</div></div>
          <script>new FormValidator ('delete_user', {
                  onFormValidate: function(pass, form){ 
                    if(pass==true){
                      form.submitexitok.disabled=true;
                    }
                  }
                });</script>";
          $this->view_content($user, $theid);
        }else{
          print "<div id='error'><div id='content'>You do not have permission to delete this user!</div></div>";
        } 
    }
		/******************************************************************************************
		process_delete
		******************************************************************************************/
    function process_delete($user, $theid){
      $ret_code = array(0,0);
        if($_REQUEST['choice']=="yes"){ 
          //CREATE A UNIX TIMESTAMP
  					$stamp = time();
  					$date = gmdate("Y-m-d H:i:s", $stamp);
          //REMOVE OUR USER
            $sql = "DELETE FROM ".$this->config->db_prefix."_user WHERE id = $theid";
            $result=$this->db->DB_Q_C($sql);
          //REMOVE OUR USER'S PERMISSIONS
            $sql = "DELETE FROM ".$this->config->db_prefix."_perms WHERE user_id = $theid";
            $result=$this->db->DB_Q_C($sql);
          //LOG THE ACTION
  				  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 
									   VALUES('$date', '$user->user_id')";
  					$results=$this->db->DB_Q_C($sql);
  					$lastobjectid = mysql_insert_id();
  				  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)
                    VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 1, $theid, 3)";
            $results=$this->db->DB_Q_C($sql);
          $ret_code[0] = 2;
        }else{
          $ret_code[0] = -2;
        }
        return $ret_code;
    }
		/******************************************************************************************
		view_content
		******************************************************************************************/
    function view_content($user, $theid){
       //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE
          $sql = "SELECT * FROM ".$this->config->db_prefix."_user WHERE
                  ".$this->config->db_prefix."_user.id = $theid 
                  LIMIT 1";
          $result=$this->db->DB_Q_C($sql);
          $row = mysql_fetch_array($result);
       //GET AND CONVERT DATE ACCORDINGLY
			   $tmp_date = $this->time->convertTime($user->user_timezone, $row['last_log']);
			   $last_log = DateFormat($tmp_date, $this->config->date_format);
       print "<div id='forms'><div id='content'>";
       print "<table cellpadding='0' cellspacing='0' width='100%'>";
       print "<tr><th class='record_head' colspan='2'>User Profile</th></tr>";
       print "<tr><td colspan='2'>View the details of this user below.</td></tr>";
       print "<tr><th>Username</th><td>".$row['username']."</td></tr>";
       print "<tr><th>Email</th><td><a href='mailto:".$row['email']."'>".$row['email']."</a></td></tr>";
       print "<tr><th>Last Login</th><td>".$last_log."</td></tr>";
      //DISPLAY THE USERS PERMISSIONS
        //GRAB MODULE LIST FROM DATABASE
          $sql = "SELECT * FROM ".$this->config->db_prefix."_perms, ".$this->config->db_prefix."_modules 
                  WHERE 
                    ".$this->config->db_prefix."_perms.user_id = $theid AND
                    ".$this->config->db_prefix."_perms.module_id = ".$this->config->db_prefix."_modules.id
                  ORDER BY ".$this->config->db_prefix."_modules.id ASC";
          $result2=$this->db->DB_Q_C($sql); 
          while($row2 = mysql_fetch_array($result2)){
              $module = new $row2['name']($this->db, $this->config, $this->time);
              print "<tr><th>".$module->name."</th><td>";
              if($row2['perm']==1){
                print "Full Access";
              }else{
                print "No Access";
              }
              print "</td></tr>";
          } 
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
                      This user was created by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";
            }else if($row2['action']==2){
              //EDIT
                print "<tr $effect><td colspan='2'>
                      This user was edited by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";
            }else if($row2['action']==4){
              //PUBLISHED   
                print "<tr $effect><td colspan='2'>
                      This user was published by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";       
            }
        }
        print "</table></div></div>";
      //DISPLAY THIS USERS LATEST ACTIONS
        $sql = "SELECT * FROM ".$this->config->db_prefix."_logs, ".$this->config->db_prefix."_object, ".$this->config->db_prefix."_user WHERE
                ".$this->config->db_prefix."_logs.object_id =  ".$this->config->db_prefix."_object.id AND
                ".$this->config->db_prefix."_logs.user_id =  ".$theid." AND
                ".$this->config->db_prefix."_user.id =  ".$theid."
                    ORDER BY ".$this->config->db_prefix."_logs.id DESC LIMIT 20";
        $result2=$this->db->DB_Q_C($sql);
        $count = mysql_affected_rows();
        print "<div id='records'><div id='content'>";
        print "<table cellpadding='0' cellspacing='0'>";
        print "<tr><th class='record_head'>Recent Activity</th></tr>";
        print "<tr><th>action</th></tr>";
        if($count>0){
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
  				  //
  				   $sql = "SELECT * FROM ".$this->config->db_prefix."_modules WHERE id = ".$row2['module_id'];
  				   $result3=$this->db->DB_Q_C($sql);
  				   $row3=mysql_fetch_array($result3);
  				  //
              if($user->user_perms[$row3[0]-1][0]=='1'){
                $module = new $row3['name']($this->db, $this->config, $this->time);
                echo "<tr $effect><td>".$module->display_log($row2['action'], $row2['sub_module_id'], $create_date, $row2['record_id'])."</td></tr>";
              }
          }
        }else{
          print "<tr $effect><td colspan='2'>There is no activity to report.</td></tr>";
        }
        print "</table></div></div>";
       print "</div></div>";
    }
		/******************************************************************************************
		view - view entries in the database, in a table format
		******************************************************************************************/
		function view($user, $ret_code=0, $start=0, $limit=10){
		 $sql = "SELECT * FROM ".$this->config->db_prefix."_user
                    ORDER BY id DESC LIMIT $start, $limit";
        $results = $this->db->DB_Q_C($sql);
        $count = mysql_affected_rows();
        //COUNT ALL THE RECORDS IN THE SYSTEM
        $sql = "SELECT * FROM ".$this->config->db_prefix."_user
                    ORDER BY id DESC";
        $results2 = $this->db->DB_Q_C($sql);
        $total = mysql_affected_rows();
        //
        print "<div id='records'><div id='content'>";
        if($ret_code==0){
      }else if($ret_code==1){
        print "<table width='100%'>
        <tr><th class='notice_record_head'>The user has been saved.</th></tr>
        </table>";
      }else if($ret_code==2){
        print "<table width='100%'>
        <tr><th class='notice_record_head'>The user has been deleted.</th></tr>
        </table>";
      }else if($ret_code==-2){
        print "<table width='100%'>
        <tr><th class='notice_record_head'>The user has not been deleted.</th></tr>
        </table>";
      }
        print "<table cellpadding='0' cellspacing='0'>";
        print "<tr><th colspan='6' class='record_head'>Site Users</th></tr>";
        if($count>0){
          print "<tr><th>User Name</th><th>Last Login</th><th colspan='3'>Options</th></tr>";
          while($row=mysql_fetch_array($results)){
             //GET AND CONVERT DATE ACCORDINGLY
    				   $tmp_date = $this->time->convertTime($user->user_timezone, $row['last_log']);
    				   $last_log = DateFormat($tmp_date, $this->config->date_format); 
            if($striper){
                $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
              }else{
                $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
              }
              $striper=!$striper;
              print "<tr $effect>
                    <td>".$row['username']."</td>
                    <td>".$last_log."</td>
                    <td width='23'><a class='toolTipElement' title='User Details::View details about this user.' href='?pid=".$this->id."&amp;cid=2&amp;theid=".$row[0]."'><img src='images/preview.png' border='0' alt='view' /></a></td>";
             if($user->user_perms[$this->id-1][2]==1){
              //ONLY THE ADMIN USER AND THIS USER CAN EDIT
                if($user->user_id==1 || $row[0]==$user->user_id){
                  print "<td width='23'><a class='toolTipElement' title='Edit User::Edit this user.' href='?pid=".$this->id."&amp;cid=3&amp;theid=".$row[0]."'><img src='images/edit.png' border='0' alt='edit' /></a></td>";
                }else{
                  print "<td width='23'><img src='images/edit_disabled.png' border='0' alt='' /></td>";
                }
              }else{
                print "<td width='23'><img src='images/edit_disabled.png' border='0' alt='' /></td>";
              }
            if($user->user_perms[$this->id-1][3]==1){
              //ONLY THE ADMIN USER CAN DELETE
                if($user->user_id==1){
                  print "<td width='23'><a class='toolTipElement' title='Delete User::Delete this user from the system.' href='?pid=".$this->id."&amp;cid=4&amp;theid=".$row[0]."'><img src='images/delete.png' border='0' alt='delete' /></a></td>";
                }else{
                  print "<td width='23'><img src='images/delete_disabled.png' border='0' alt='' /></td>";
                }
              }else{
                print "<td width='23'><img src='images/delete_disabled.png' border='0' alt='' /></td>";
              }
            print "</tr>";
          }
          if($total>$count){
            $name = array("pid", "cid");
            $data = array($_REQUEST['pid'], $_REQUEST['cid']); 
            pageNav($start, $limit, $total, $name, $data);
            print "<tr><th colspan='5' class='record_footer'>";       
            print "Showing $count out of a total of <b>$total</b> records in the system</th></tr>";
          }else{
            if($count>1){
              print "<tr><th colspan='7' class='record_footer'>There are a total of <b>$total</b> records in the system</th></tr>";
            }else{
              print "<tr><th colspan='7' class='record_footer'>There is <b>$total</b> record in the system</th></tr>";
            }
          }      
        }else{
          print "<tr><td>There are no users in the system.</td></tr>";
        }
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
          $content = "<li id='menu_".$this->id."_style' class='active_module'><a id='menu_".$this->id."' name='menu_".$this->id."' class='toolTipElement' title='User Section::View, Edit or Delete users.' href='#'>users</a></li>";
        }else{
          $content = "<li id='menu_".$this->id."_style' ><a id='menu_".$this->id."' name='menu_".$this->id."' class='toolTipElement' title='User Section::View, Edit or Delete users.' href='#'>users</a></li>";
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
          $content .= "<li class='active_module'><a class='toolTipElement' title='View Users::View all users in the system.' href='?pid=$this->id&amp;cid=0'>view</a></li>";
        }else{
          $content .= "<li><a class='toolTipElement' title='View Users::View all users in the system.' href='?pid=$this->id&amp;cid=0'>view</a></li>";
        }
        if($user->user_perms[$this->id-1][1]==1){
          if($cid==1 && $pid == $this->id){
            $content .= "<li class='active_module'><a class='toolTipElement' title='Create User::Add a user to the system.' href='?pid=$this->id&amp;cid=1'>create</a></li>";
          }else{
            $content .= "<li><a class='toolTipElement' title='Create Users::Add a user to the system.' href='?pid=$this->id&amp;cid=1'>create</a></li>";
          }
        }
        if($cid==100 && $pid == $this->id){
          $content .= "<li class='active_module'><a class='toolTipElement' title='Further Help::Learn more about the user section of your site.' href='?pid=$this->id&amp;cid=100'>help</a></li>";
        }else{
          $content .= "<li><a class='toolTipElement' title='Further Help::Learn more about the user section of your site.' href='?pid=$this->id&amp;cid=100'>help</a></li>";
        }
		    $content.= "</ul></div>";
      }
      return $content; 
		}
		/******************************************************************************************
		create
		******************************************************************************************/
     function display_create($theid, $user){
        $this->create_form($user);
     }
		/******************************************************************************************
		create
		******************************************************************************************/
     function process_create($user){
      $ret_code = array(1,0);
      //GRAB ALL THE INFORMATION FROM THE POST ACTION
         $username = $_REQUEST['username'];
         $password = $_REQUEST['password'];
         $email = $_REQUEST['email'];
      //CREATE A UNIX TIMESTAMP
      	$stamp = time();
      	$date = gmdate("Y-m-d H:i:s", $stamp);
      //INSERT OUR USER
        srand ((double) microtime( )*1000000);
        $salt = rand();
      //GRAB OUR TIMEZONE ID WITH THE DAY LIGHT SAVINGS ON - BY DEFAULT
  		  $sql = "SELECT * FROM ".$this->config->db_prefix."_timezone 
                WHERE 
                  gmt_offset = ".$this->config->default_tz." AND
                  dst_offset = 1";
        $results = $this->db->DB_Q_C($sql);
        $count = mysql_affected_rows();
        if($count>0){
          $row = mysql_fetch_array($results);
          $tmp_timezone = $row['timezoneid'];
        }else{
          $tmp_timezone = 1;
        }
      //WE USE THE LAST ID OF OUR OBJECT AS THE SALT
        $new_password =  generateHash($password, $salt);
        $sql = "INSERT INTO ".$this->config->db_prefix."_user(username, password, email, last_log, ip, active, tz, reclimit, help, reset, dst, salt) 
							   VALUES('$username', '$new_password', '$email', '', '', 'yes', '$tmp_timezone', '10', '1', 0, 1, $salt)";
				$results=$this->db->DB_Q_C($sql);
				$lastid = mysql_insert_id();
      //INSERT OUR PERMISSIONS FOR THIS USER
        //GRAB MODULE LIST FROM DATABASE
          $sql = "SELECT * FROM ".$this->config->db_prefix."_modules";
          $result=$this->db->DB_Q_C($sql);
          $sql = "INSERT INTO ".$this->config->db_prefix."_perms (user_id, module_id, perm) VALUES ";
          while($row = mysql_fetch_array($result)){
            $module = new $row['name']($this->db, $this->config, $this->time);
            $mod_perm_count = $_REQUEST['perm_'.$module->name.'_count'];
            $perm = $_REQUEST['perm_'.$module->name];
            for($i=1;$i<=$mod_perm_count;$i++){
              $perm.= $_REQUEST['perm_'.$module->name.'_'.$i];
            }
            $sql .= "('$lastid', '".$row[0]."',  '$perm'),";
          }
          //TRIM THE "," OFF OF END
          $sql = substr($sql,0, strlen($sql)-1);
          $result=$this->db->DB_Q_C($sql);
      //LOG THE ACTION
			  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 
							   VALUES('$date', '$user->user_id')";
				$results=$this->db->DB_Q_C($sql);
				$lastobjectid = mysql_insert_id();
			  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)
                VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 1, $lastid, 1)";
        $results=$this->db->DB_Q_C($sql);
      //
        $ret_code[1] = $lastid;
        return $ret_code;
    }
    /******************************************************************************************
		edit
		******************************************************************************************/
    function display_edit($theid, $ret_code, $user){
      if($ret_code==0){
      }else if($ret_code==1){
        print "<div id='records'><table width='100%'>
        <tr><th class='notice_record_head'>The user has been saved.</th></tr>
        </table></div>";
      }
      //GRAB THE USER INFO
        $sql = "SELECT * FROM 
          ".$this->config->db_prefix."_user, 
          ".$this->config->db_prefix."_logs, 
          ".$this->config->db_prefix."_object
       WHERE
          ".$this->config->db_prefix."_user.id = $theid AND
          ".$this->config->db_prefix."_user.id = ".$this->config->db_prefix."_logs.record_id AND
          ".$this->config->db_prefix."_logs.module_id = ".$this->id." AND
          ".$this->config->db_prefix."_logs.sub_module_id = 1 AND
          ".$this->config->db_prefix."_logs.object_id = ".$this->config->db_prefix."_object.id AND
          ".$this->config->db_prefix."_logs.action = 1
      ORDER BY create_date DESC";
        $result=$this->db->DB_Q_C($sql);
        $row = mysql_fetch_array($result);
      //GRAB THE USER'S PERMISSION INFO
        $sql = "SELECT * FROM ".$this->config->db_prefix."_perms WHERE user_id = $theid  ORDER BY module_id ASC";
        $result1=$this->db->DB_Q_C($sql);
        $perms = array();
        while($row1 = mysql_fetch_array($result1)){
          array_push($perms, $row1['perm']);
        }
        if($row['create_who']==$user->user_id || $row[0]==$user->user_id || $user->user_id==1){
          $this->create_form($user, $row['username'], $row['password'], $row['email'], $perms, $theid, $row['salt']);
        }else{
          print "<div id='error'><div id='content'>You do not have permission to edit this user!</div></div>";
        }
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
        print "<div id='user_perms_advanced'>";
          //TOTAL SUB-PERMISSION COUNT
            print "<input type='hidden' name='perm_".$this->name."_count' value='3' />";
            print "<table>";
            print "<tr><th colspan='2'>Advanced Permissions</th></tr>";
          //CREATE USERS
            if($user->user_perms[$this->id-1][1]==1){
              print "<tr><th>Create Users</th><td>";
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
          //EDIT USERS
            if($user->user_perms[$this->id-1][2]==1){
              print "<tr><th>Edit Users</th><td>";
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
          //DELETE USERS
            if($user->user_perms[$this->id-1][3]==1){
              print "<tr><th>Delete Users</th><td>";
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
          var userSlide = new Fx.Slide('user_perms_advanced');
					$('perm_".$this->name."').addEvent('change', function(e){
					   var tmp = $('perm_".$this->name."').options[$('perm_".$this->name."').selectedIndex].value;
					   if(tmp==0){
              userSlide.slideOut();
             }else{
              userSlide.slideIn();
             }
						});
					  var tmp = $('perm_".$this->name."').options[$('perm_".$this->name."').selectedIndex].value;
					  if(tmp==0){
              userSlide.hide();
             }else{
              userSlide.show();
             }
        </script>";
		}
		/******************************************************************************************
		display_log
		******************************************************************************************/
		function display_log($action, $subid, $date, $theid){
		  $ret = "";
		  if($subid==1){
        //USER
        if($action==1){
          //CREATE
          $ret = "Created a <a class='toolTipElement' title='View Details::View more information on this user.' href='?pid=$this->id&cid=2&amp;theid=$theid'>user</a> on $date";
        }else if($action==2){
          //EDIT
          $ret = "Edited a <a class='toolTipElement' title='View Details::View more information on this user.' href='?pid=$this->id&cid=2&amp;theid=$theid'>user</a> on $date";
        }else if($action==3){
          //DELETE
          $ret = "Deleted a <a class='toolTipElement' title='View Details::View more information on this user.' href='?pid=$this->id&cid=2&amp;theid=$theid'>user</a> on $date";
        }else{
          //UNKNOWN
          $ret = "Did unknown action to a <a class='toolTipElement' title='View Details::View more information on this user.' href='?pid=$this->id&cid=2&amp;theid=$theid'>user</a> on $date";
        }
      }else{
        //UNKNOWN
          $ret = "Did unknown action to an unknown section on $date";
      }
      return $ret;
		}
    /******************************************************************************************
		edit
		******************************************************************************************/
    function process_edit($user, $theid){
      $ret_code = array(1, $theid);
        //GRAB ALL THE INFORMATION FROM THE POST ACTION
  			   $username = $_REQUEST['username'];
  			   $old_username = $_REQUEST['old_username'];
  			   $password = $_REQUEST['password'];
  			   $email = $_REQUEST['email'];
  				 $old_password = $_REQUEST['old_password'];
  				 $salt = $_REQUEST['sid'];
				//CREATE A UNIX TIMESTAMP
					$stamp = time();
					$date = gmdate("Y-m-d H:i:s", $stamp);
			        //UPDATE OUR USER
			          //CHECK TO SEE IF THE PASSWORD HAS BEEN CHANGED
			          $reset = 0;
			          if($old_password != $password){
                  //WE USE THE LAST ID OF OUR OBJECT AS THE SALT
			            $new_password =  generateHash($password, $salt);
			            $password = $new_password;
			            $reset = 1;
                }
                if($old_username != $username){
			            $reset = 1;
                }
                $sql = "UPDATE ".$this->config->db_prefix."_user 
                        SET username = '$username', password = '$password', email = '$email', reset = '$reset'
                        WHERE id = $theid";
      					$results=$this->db->DB_Q_C($sql);
			        //UPDATE OUR PERMISSIONS FOR THIS USER
			          //REMOVE OLD PERMISSIONS
			            $sql = "DELETE FROM ".$this->config->db_prefix."_perms WHERE user_id = $theid";
                  $result=$this->db->DB_Q_C($sql);
			          //GRAB MODULE LIST FROM DATABASE
                  $sql = "SELECT * FROM ".$this->config->db_prefix."_modules ORDER BY id ASC";
                  $result=$this->db->DB_Q_C($sql);
                  $sql = "INSERT INTO ".$this->config->db_prefix."_perms (user_id, module_id, perm) VALUES ";
                  while($row = mysql_fetch_array($result)){
                    $module = new $row['name']($this->db, $this->config, $this->time);
                    $mod_perm_count = $_REQUEST['perm_'.$module->name.'_count'];
                    $perm = $_REQUEST['perm_'.$module->name];
                    for($i=1;$i<=$mod_perm_count;$i++){
                      $perm.= $_REQUEST['perm_'.$module->name.'_'.$i];
                    }
                    $sql .= "('$theid', '".$row[0]."',  '$perm'),";
                  }
                  //TRIM THE "," OFF OF END
                  $sql = substr($sql,0, strlen($sql)-1);+
                  $result=$this->db->DB_Q_C($sql);
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
		create_form - displays the form to create a news article
		******************************************************************************************/
    function create_form($user, $username="", $password="", $email="", $perms="", $theid="", $sid=""){
      print "<div id='forms'><div id='content'>";   
        print "<form method='post' action='' id='user_create' name='user_create' onSubmit=\"this.the_action.value=clicked;\">";
        //HIDDEN FIELDS
          print "<input type='hidden' name='the_action' value='submitok' />";
          print "<input type='hidden' name='theid' value='$theid' />";
          print "<input type='hidden' name='old_password' value='$password' />";
          print "<input type='hidden' name='old_username' value='$username' />";
          print "<input type='hidden' name='sid' value='$sid' />
            <input type='hidden' name='formprocess' value='yes' />";
  			print "<table width='100%' cellspacing='0' cellpadding='0'>";
  			print "<tr><th class='record_head' colspan='2'>User Submission Form</th></tr>";
  			print "<tr><td colspan='2'>Please fill in required fields below and click <b>Save User</b>
              to enter the user into the system.</td></tr>";
          //USERNAME
             print "<tr><th>Username</th><td><input class='required UserExists' size='35' type='text' name='username' value='$username' /></td></tr>";
          //PASSWORD
             print "<tr><th>Password</th><td><input class='required' type='password' name='password' value='$password'/></td></tr>";
          //EMAIL
             print "<tr><th>Email</th><td><input class='required validate-email' size='45' type='text' name='email' value='$email' /></td></tr>";
          //PERMS
            print "<tr><th class='record_head' colspan='2'>Permission List</th></tr>";
            print "<tr><td colspan='2'>Please select the areas you would like this user to have access too.</td></tr>";
            //GRAB MODULE LIST FROM DATABASE
              $sql = "SELECT * FROM ".$this->config->db_prefix."_modules ORDER BY id ASC";
              $result=$this->db->DB_Q_C($sql);           
            //COMPARE AGAINST USER PERM ARRAY, IF THE USER HAS ACCESS WE DISPLAY THE MODULE
              $count = 0;
              while($row = mysql_fetch_array($result)){
                if($user->user_perms[$row[0]-1][0]=='1'){
                 $module = new $row['name']($this->db, $this->config, $this->time);
                 $module->display_permissions($perms[$count], $user);
                }
                $count++;
              }
        	//SUBMIT
  					print "<tr><th colspan='2' align='right'>
              <input type='submit' name='submitok' value='Save User' onclick=\"clicked='submitok'\" />
              <input type='submit' name='submitexitok' value='Save User & Exit' onclick=\"clicked='submitexitok'\" />
            </th></tr>";
  			print "</table>";
  		print "</form>";
  		print "</div></div>
  		  <script>
  		    new FormValidator ('user_create', {
            onFormValidate: function(pass, form){ 
              if(pass==true){
                form.submitok.disabled=true;
                form.submitexitok.disabled=true;
              }
            }
          });
  		    FormValidator.add('UserExists', {
          	errorMsg: 'A user with that name allready exists, please choose another name.',
          	test: function(element) {
          	    var http = createRequestObject();
                http.open('post',  'includes/checkuserexsists.php', false);
      				  http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      				  http.send('u='+element.getValue());
      				  if(http.responseText=='false'){
      				    //the user does not exist
                  return true;
                }else if(http.responseText=='true'){
      				    //the user does exist, check to see if we are editing and the user is the same
      				    if(document.user_create.old_username.value==element.getValue()){
                    return true;
      				    }else{
                    return false;
                  }
                }
          	}
          });
  		  </script>
        ";
    }
    /******************************************************************************************
		about
		******************************************************************************************/
    function about(){ 
      print "<div id='forms'><div id='content'>";
      print "<h1>About Users</h1>";
      print "<div id='about'>";
        print "<ul>";
          print "<li><a href='#1'>Why can i not edit or delete a user?</a></li>";
          print "<hr noshade='noshade' />";
          //
          print "<a name='1'></a><li>Why can i not edit or delete a user?";
            print "<p>For security reseasons, you are only able to edit/delete users you have created. Giving users
            access to the user section of your site should be limited to avoid any potential problems.</p>";
          print "</li>";
        print "</ul>";
      print "</div></div></div>"; 
    }
	}
?>
