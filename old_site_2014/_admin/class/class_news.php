<?php
	/******************************************************************************************
	  PERMISSION'S BREAK DOWN
	    [0] = OVERALL ACCESS TO THIS MODULE
	    [1] = CREATE AN ARTICLE
	    [2] = EDIT AN ARTICLE
	    [3] = DELETE AN ARTICLE
	    [4] = PUBLISH AN ARTICLE
	    [5] = CREATE A CATEGORY
	    [6] = EDIT A CATEGORY
	    [7] = DELETE A CATEGORY
	*******************************************************************************************  
	*******************************************************************************************
	  SUB-MODULE ID'S
	     1 - ARTICLE
	     2 - CATEGORY
	******************************************************************************************/
	class class_news{
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
		function class_news($db, $cfg, $t){
		  //MODULE NAME
		    $this->name = "News";
		  //STORE THE DATABASE
		    $this->db = $db;
		  //STORE THE SITES CONFIG SETTINGS
		    $this->config = $cfg;
		  //STORE THE ID OF THIS MODULE
		    $sql = "SELECT * FROM ".$this->config->db_prefix."_modules WHERE name = 'class_news'";
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
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_modules` (name) VALUES ('class_news')";
  		  $results = $this->db->DB_Q_C($sql);
      	$lastid = mysql_insert_id();
      //SET PERMISSIONS FOR OUR DEFAULT USER
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_perms` (user_id, module_id, perm) VALUES (1, $lastid, '11111111')";
  		  $results = $this->db->DB_Q_C($sql);
  		//CREATE THE TABLE FOR THIS MODULE
	   	  $sql = "
          CREATE TABLE `".$this->config->db_prefix."_news` (
              `id` int(11) NOT NULL auto_increment,
              `title` text NOT NULL,
              `body` text NOT NULL,
              `summary` text NOT NULL,
              `published` tinyint(11) NOT NULL default '0',
              `cat_id` int(11) NOT NULL default '0',
              PRIMARY KEY  (`id`),
              FULLTEXT KEY `full_index` (`title`,`body`)
            ) ENGINE=MyISAM ;
          ";
  		  $results = $this->db->DB_Q_C($sql);
  		//INSTALL OUR COMMENT TABLE
  		  $sql = "
          CREATE TABLE `".$this->config->db_prefix."_news_comments` (
              `id` int(11) NOT NULL auto_increment,
              `news_id` int(11) NOT NULL,
              `body` text NOT NULL,
              `date` datetime NOT NULL default '0000-00-00 00:00:00',
              `user_name` varchar(255) NOT NULL default '',
              PRIMARY KEY  (`id`)
            ) ENGINE=MyISAM ;
          ";
  		  $results = $this->db->DB_Q_C($sql);
  		//INSTAll OUR CATEGORY
  		//CREATE THE TABLE FOR THIS MODULE
	   	  $sql = "
          CREATE TABLE `".$this->config->db_prefix."_cat` (
            `id` int(11) NOT NULL auto_increment,
            `name` varchar(200) NOT NULL default '',
            `parent_id` int(11) NOT NULL default '0',
            PRIMARY KEY  (`id`)
          ) ENGINE=MyISAM;
          ";
  		  $results = $this->db->DB_Q_C($sql);
      //CREATE OUR DFAULT RSS DIRECTORY
        mkdir($this->config->file_dir."/rss/");
      //CREATE OUR GENERAL RSS FEED, BLANK TO START
        $file = $this->config->file_dir."/rss/rss_1.xml";
        if (!$handle = fopen($file, 'w+')) {
          echo "Cannot open file ($file)";
          exit;
        }
      //STORE THE INFORMATION ABOUT OUR DEFAULT INDEX PAGE
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_cat` (name, parent_id) VALUES ('General', '0')";
  		  $results = $this->db->DB_Q_C($sql);
      	$record_id = mysql_insert_id();
  		//STORE OUR OBJECT
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
  		  $results = $this->db->DB_Q_C($sql);
      	$object_id = mysql_insert_id();
  		//STORE OUR LOG INFO
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, 1, $lastid, 2, $record_id, 1)";
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
        }else if($cid==5 && $user->user_perms[$this->id-1][4]==1){
          //PUBLISH
	        $ret_code = $this->process_publish($user, $theid);
        }else if($cid==11 && $user->user_perms[$this->id-1][5]==1){
          //CREATE CATEGORY
		      $ret_code = $this->process_create_cat($user);
		    }else if($cid==13 && $user->user_perms[$this->id-1][5]==1){
          //UPDATE FEED
	         $ret_code = $this->feeds($theid);
		    }else if($cid==14 && $user->user_perms[$this->id-1][6]==1){
          //EDIT CATEGORY
		      $ret_code = $this->process_edit_cat($user, $theid);
		    }else if($cid==15 && $user->user_perms[$this->id-1][7]==1){
          //DELETE CATEGORY
		      $ret_code = $this->process_delete_cat($user, $theid);
		    }else if($cid==17 && $user->user_perms[$this->id-1][1]==1){
          //CREATE COMMENT
		      $ret_code = $this->process_create_comment($user);
		    }else if($cid==18 && $user->user_perms[$this->id-1][1]==1){
          //CREATE COMMENT
		      $ret_code = $this->process_edit_comment($user, $theid);
		    }else if($cid==19 && $user->user_perms[$this->id-1][1]==1){
          //DELETE
	        $ret_code = $this->process_delete_comment($user, $theid);
        }else{
          //THE USER IS NOT AUTHORIZED TO PERFORM THIS ACTION
        }
		    //CONSTRUCT OUR RETURN ADDRESS
          if($_REQUEST['the_action']=='submitexitok'){
            //RETURN TO THE DEFAULT VIEW - NEWS VIEW SECTION
              $extra = "?pid=".$this->id."&rc=".$ret_code[0];
          }else if($_REQUEST['the_action']=='submitexitok_cats'){
            //RETURN TO THE DEFAULT VIEW - CATS VIEW SECTION
              $extra = "?pid=".$this->id."&cid=10&rc=".$ret_code[0];
          }else if($_REQUEST['the_action']=='submitexitok_comments'){
            //RETURN TO THE DEFAULT VIEW - NEWS VIEW SECTION
              $extra = "?pid=".$this->id."&rc=".$ret_code[0];
          }else if($_REQUEST['the_action']=='submitok_comments'){
            //RETURN TO THE CAT EDIT'S SECTION IF THIS USER HAS PERMISSION TO EDIT
              $extra = "?pid=".$this->id."&cid=18&theid=".$ret_code[1]."&rc=".$ret_code[0];
          }else if($_REQUEST['the_action']=='submitok_cats'){
              if($user->user_perms[$this->id-1][6]==1){
                //RETURN TO THE CAT EDIT'S SECTION IF THIS USER HAS PERMISSION TO EDIT  
                  $extra = "?pid=".$this->id."&cid=14&theid=".$ret_code[1]."&rc=".$ret_code[0];
              }else{
                //RETURN TO THE DEFAULT VIEW - CATS VIEW SECTION
                  $extra = "?pid=".$this->id."&cid=10&rc=".$ret_code[0];
              }
          }else{
            if($user->user_perms[$this->id-1][2]==1){
              //RETURN TO THE NEWS EDIT'S SECTION
                $extra = "?pid=".$this->id."&cid=3&theid=".$ret_code[1]."&rc=".$ret_code[0];
            }else{
              //RETURN TO THE DEFAULT VIEW - NEWS VIEW SECTION
                $extra = "?pid=".$this->id."&rc=".$ret_code[0];
            }
          }
          //WHEN DEALING WITH FILES THE DIR VAR WILL BE SET, SO LETS SET IT ON THE RETURN TRIP
            if(isset($_REQUEST['dir'])){
              $extra.= "&dir=".$_REQUEST['dir'];
            }
		  }else{
        //THE USER IS NOT AUTHORIZED TO PERFORM THIS ACTION
          //print "<div id='error'><div id='content'>You are not authorized to perform this action!</div></div>";
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
	         $this->display_create($user, $_REQUEST['theid']);
        }else if($cid==2){
          //VIEW
	         $this->view_content($user, $_REQUEST['theid']);
        }else if($cid==3 && $user->user_perms[$this->id-1][2]==1){
          //EDIT
	         $this->display_edit($_REQUEST['theid'], $_REQUEST['rc'], $user);
        }else if($cid==4 && $user->user_perms[$this->id-1][3]==1){
          //DELETE
	         $this->display_delete($user, $_REQUEST['theid']);
        }else if($cid==5 && $user->user_perms[$this->id-1][4]==1){
          //PUBLISH
	         $this->display_publish($user, $_REQUEST['theid']);
        }else if($cid==10){
          //VIEW CATEGORIES
	         $this->view_cats($user, $_REQUEST['rc'], $start, $limit);
        }else if($cid==11 && $user->user_perms[$this->id-1][5]==1){
          //CREATE CATS
	         $this->display_create_cat($user, $_REQUEST['theid']);
        }else if($cid==12){
          //CREATE CATS
	         $this->view_content_cat($user, $_REQUEST['theid']);
        }else if($cid==14 && $user->user_perms[$this->id-1][6]==1){
          //EDIT
	         $this->display_edit_cat($_REQUEST['theid'], $_REQUEST['rc'], $user);
        }else if($cid==15 && $user->user_perms[$this->id-1][7]==1){
          //DELETE
	         $this->display_delete_cat($user, $_REQUEST['theid']);
        }else if($cid==16){
          //SEARCH
           $this->search($user, $start, $limit);
        }else if($cid==17 && $user->user_perms[$this->id-1][1]==1){
          //CREATE COMMENT
	         $this->display_create_comment($user, $_REQUEST['theid']);
        }else if($cid==18 && $user->user_perms[$this->id-1][1]==1){
          //EDIT COMMENT
	         $this->display_edit_comment($_REQUEST['theid'], $_REQUEST['rc'], $user);
        }else if($cid==19 && $user->user_perms[$this->id-1][1]==1){
          //DELETE
	         $this->display_delete_comment($user, $_REQUEST['theid']);
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
		search
		******************************************************************************************/
		function search($user, $start, $limit){
		  if($_REQUEST['submitok']){
		    //GRAB OUR SEARCH VARS
		      $title = $_REQUEST['title'];
		      $string_keys = $_REQUEST['keys'];
		      $keys = explode(" ", $_REQUEST['keys']);
		      $published = $_REQUEST['published'];
		      if(strlen($_REQUEST['end_date'])>0){
  		      $tmp = explode("/", $_REQUEST['end_date']);
  		      $end_date = $tmp[2]."-".$tmp[0]."-".$tmp[1];
          }
		      if(strlen($_REQUEST['start_date'])>0){
  		      $tmp = explode("/", $_REQUEST['start_date']);
  		      $start_date = $tmp[2]."-".$tmp[0]."-".$tmp[1];
  		    }
		      $search_user = $_REQUEST['search_user'];
		    //CONSTRUCT SQL SEARCH STATEMENT
		      $sql = "SELECT * FROM 
            ".$this->config->db_prefix."_news, 
            ".$this->config->db_prefix."_logs, 
            ".$this->config->db_prefix."_object,
            ".$this->config->db_prefix."_user
         WHERE
            ".$this->config->db_prefix."_news.id = ".$this->config->db_prefix."_logs.record_id AND
            ".$this->config->db_prefix."_logs.module_id = ".$this->id." AND
            ".$this->config->db_prefix."_logs.sub_module_id = 1 AND
            ".$this->config->db_prefix."_logs.object_id = ".$this->config->db_prefix."_object.id AND
            ".$this->config->db_prefix."_logs.action = 1 AND
            ".$this->config->db_prefix."_user.id = ".$this->config->db_prefix."_logs.user_id AND
            ".$this->config->db_prefix."_logs.user_id = ".$this->config->db_prefix."_object.create_who";
        //TITLE
          if(strlen($title)>0){
              $sql.= " AND ".$this->config->db_prefix."_news.title LIKE \"%$title%\"";
          }
        //KEYS
          if(count($keys)>0){
            $sql.= " AND (";
            for($i=0;$i<count($keys);$i++){
              $sql.= $this->config->db_prefix."_news.body LIKE '%".$keys[$i]."%' OR ";
            }
            $sql = substr($sql, 0, (strlen($sql)-3));
            $sql.= ") ";
          }
        //PUBLISHED
          if($published==1 || $published==0){
              $sql.= " AND ".$this->config->db_prefix."_news.published = $published";
          }
        //START DATE
          if(strlen($start_date)>0 && strlen($end_date)>0){
            $sql.= " AND ".$this->config->db_prefix."_object.create_date >= '$start_date'
                      AND ".$this->config->db_prefix."_object.create_date <= '$end_date'";
          }
        //USER
          if(is_numeric($search_user)){
            $sql.= " AND ".$this->config->db_prefix."_user.id = $search_user";
          }
        $other_sql = $sql;
        $sql.= " ORDER BY ".$this->config->db_prefix."_news.id DESC LIMIT $start, $limit";
        //
          $results = $this->db->DB_Q_C($sql);
          $count = mysql_affected_rows();
          //COUNT ALL THE RECORDS IN THE SYSTEM
          $results2 = $this->db->DB_Q_C($other_sql);
          $total = mysql_affected_rows();
          //
          print "<div id='records'><div id='content'>
            <table cellpadding='0' cellspacing='0'>
            <tr><th colspan='4' class='record_head'>Search Results</th></tr>
            <tr><td colspan='4'>Your search returned $total records</td></tr>";
          if($count>0){
            print "<tr><th>Title</th><th colspan='3'>Options</th></tr>";
            while($row=mysql_fetch_array($results)){
              if($striper){
                  $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
                }else{
                  $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
                }
                $striper=!$striper;
                print "<tr $effect>
                      <td>".stripslashes($row['title'])."</td>
                      <td width='23'><a title='View details about the news article.' href='?pid=".$this->id."&amp;cid=2&amp;theid=".$row[0]."'><img src='images/preview.png' border='0' alt='view' /></a></td>
                      <td width='23'><a title='Edit this news article.' href='?pid=".$this->id."&amp;cid=3&amp;theid=".$row[0]."'><img src='images/edit.png' border='0' alt='' /></a></td>
                      <td width='23'><a title='Delete this news article from the system.' href='?pid=".$this->id."&amp;cid=4&amp;theid=".$row[0]."'><img src='images/delete.png' border='0' alt='' /></a></td>
                      </tr>";
            }
            if($total>$count){
              print "<tr><th colspan='4' class='record_footer' align='right'>";  
              $name_list = array("title", "published", "start_date", "end_date");
              $data_list = array("$title", "$published", "$start_date", "$end_date");
              pageNav($start, $limit, $total, $name_list, $data_list);
              print "</th></tr>
                <tr><th colspan='4' class='record_footer'>
                Showing $count out of a total of <b>$total</b> records in the system</th></tr>";
            }else{
              if($count>1){
                print "<tr><th colspan='4' class='record_footer'>There are a total of <b>$total</b> records in the system</th></tr>";
              }else{
                print "<tr><th colspan='4' class='record_footer'>There is <b>$total</b> record in the system</th></tr>";
              }
            }      
          }
          print "</table>
            </div></div>";
        if(strlen($_REQUEST['end_date'])>0){
		      $tmp = explode("-", $end_date);
		      $end_date = $tmp[1]."/".$tmp[2]."/".$tmp[0];
        }
	      if(strlen($_REQUEST['start_date'])>0){
		      $tmp = explode("-", $start_date);
		      $start_date = $tmp[1]."/".$tmp[2]."/".$tmp[0];
		    }
        $this->search_form($title, $string_keys, $published, $end_date, $start_date, $search_user);
		  }else{
        $this->search_form();
      }
		}
		/******************************************************************************************
		search
		******************************************************************************************/
		function search_form($title="", $keys="", $published=-1, $end_date="", $start_date="", $search_user=""){
		  print "<div id='forms'><div id='content'>
          <form method='get'>
          <input type='hidden' name='pid' value='".$this->id."' />
          <input type='hidden' name='cid' value='16' />
          <table width='100%' cellspacing='0' cellpadding='0'>
          <tr><th class='record_head' colspan='2'>News Article Search Form</th></tr>
          <tr><td colspan='2'></td></tr>
          <tr><th>Title</th>
          <td><input name='title' type='text' size='75' value=\"$title\" /></td></tr>
          <tr><th>Keywords</th>
          <td><input name='keys' type='text' size='75' value=\"$keys\" /></td></tr>
          <tr><th>Published</th>
          <td><select name='published'>";
  					  if($published==-1){
  							print "<option value='-1' selected='selected'>all pages</option>";	
  						}else{
  							print "<option value='-1'>all pages</option>";
  						}
  						if($published==1){
  							print "<option value='1' selected='selected'>published pages</option>";	
  						}else{
  							print "<option value='1'>published pages</option>";
  						}
  						if($published==0){
  							print "<option value='0' selected='selected'>non-published pages</option>";
  						}else{
  							print "<option value='0'>non-published pages</option>";
  						}
  		print "</select>
            </td></tr>
            <tr><th>Start Date</th><td>
              <input type='text' class='DatePicker' id='start_date' name='start_date' value='$start_date'/>
            </td></tr>
            <tr><th>End Date</th><td>
              <input type='text' class='DatePicker' id='end_date' name='end_date' value='$end_date'/>
            </td></tr>
            <tr><th>User</th><td>";
      print "<select name='search_user'>";
      if($search_user=="all"){
        print "<option value='all' selected='selected'>all users</option>";
      }else{
        print "<option value='all'>all users</option>";
      }
      $sql = "SELECT * FROM ".$this->config->db_prefix."_user";
      $results = $this->db->DB_Q_C($sql);
      while($row=mysql_fetch_array($results)){
        if($search_user==$row['id']){
          print "<option selected='selected' value='".$row['id']."'>".$row['username']."</option>";
        }else{
          print "<option value='".$row['id']."'>".$row['username']."</option>";
        }
      }
      print "</select></td></tr>
            <tr><th colspan='2' align='right'><input type='submit' name='submitok' value='Search' /></th></tr>
          </table>
          </form>
          </div></div>";
		}
		/******************************************************************************************
		view - view entries in the database, in a table format
		******************************************************************************************/
		function view_cats($user, $ret_code=0, $start=0, $limit=10){
	    $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE parent_id = 0 ORDER BY id ASC";
      $results = $this->db->DB_Q_C($sql);
      $count = mysql_affected_rows();
      print "<div id='records'><div id='content'>";
      if($ret_code==0){
      }else  if($ret_code==1){
         print "<table width='100%'>
        <tr><th class='notice_record_head'>The category has been saved.</th></tr>
        </table>";
      }else if($ret_code==2){
        print "<table width='100%'>
        <tr><th class='notice_record_head'>The category has been deleted.</th></tr>
        </table>";
      }else if($ret_code==-2){
        print "<table width='100%'>
        <tr><th class='notice_record_head'>The category has not been deleted.</th></tr>
        </table>";
      }else if($ret_code==3){
        print "<table width='100%'>
        <tr><th class='notice_record_head'>The rss feed has been updated.</th></tr>
        </table>";
      }
      print "<table cellpadding='0' cellspacing='0'>
          <tr><th colspan='5' class='record_head'>Categories</th></tr>";
        if($count>0){
          print "<tr><th>Name</th><th>Files</th><th colspan='4'>Options</th></tr>";
          while($row=mysql_fetch_array($results)){
            if($row[0]==1){
              $depth = 0;
              //COUNT THE NUMBER OF FILES THAT ARE UNDER THIS CATEGORY
                $sql = "SELECT COUNT(*) FROM ".$this->config->db_prefix."_news WHERE
                ".$this->config->db_prefix."_news.published = 1";
                $results3 = $this->db->DB_Q_C($sql);
                $row3 = mysql_fetch_array($results3);
                $rec_count = $row3[0];
            }else{
              $depth = 1;
              //COUNT THE NUMBER OF FILES THAT ARE UNDER THIS CATEGORY
                $sql = "SELECT COUNT(*) FROM ".$this->config->db_prefix."_news WHERE 
                ".$this->config->db_prefix."_news.cat_id = ".$row[0]." AND
                ".$this->config->db_prefix."_news.published = 1";
                $results3 = $this->db->DB_Q_C($sql);
                $row3 = mysql_fetch_array($results3);
                $rec_count = $row3[0];
            }
             
             //
              $striper=!$striper;
              if($striper){
                $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
              }else{
                $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
              }
              print "<tr $effect>
                    <td>".$this->padImage($depth)." ".$row['name']."</td>
                    <td>".$rec_count."</td>
                    <td width='23'><a class='toolTipElement' title='View Category::View the details of this category.' href='?pid=".$this->id."&amp;cid=12&amp;theid=".$row[0]."'><img src='images/preview.png' border='0' alt='view' /></a></td>";
             //
              if($user->user_perms[$this->id-1][5]==1){
                print "<td width='23'><a class='toolTipElement' title='Update Feed::Update the RSS feed for this category.' href='?pid=".$this->id."&amp;cid=13&amp;theid=".$row[0]."&amp;formprocess=yes&amp;the_action=submitexitok_cats'><img src='images/rss.png' border='0' alt='update feed' /></a></td>";
              }else{
                print "<td width='23'><img src='images/rss_disabled.png' border='0' alt='update feed' /></td>";
              }
             //
              if($user->user_perms[$this->id-1][6]==1){
                print "<td width='23'><a class='toolTipElement' title='Edit Category::Edit this category.' href='?pid=".$this->id."&amp;cid=14&amp;theid=".$row[0]."'><img src='images/edit.png' border='0' alt='' /></a></td>";
              }else{
                print "<td width='23'><img src='images/edit_disabled.png' border='0' alt='edit' /></td>";
              }
             //
              if($user->user_perms[$this->id-1][7]==1){
                print "<td width='23'><a class='toolTipElement' title='Delete Category::Delete this categry from the system.' href='?pid=".$this->id."&amp;cid=15&amp;theid=".$row[0]."'><img src='images/delete.png' border='0' alt='' /></a></td>";
              }else{
                print "<td width='23'><img src='images/delete_disabled.png' border='0' alt='delete' /></td>";
              }           
              print "</tr>";
            $striper = $this->getChildsForView($user, $row[0], $striper, $depth);
          }   
        }else{
          print "<tr><td>There are no categories in the system.</td></tr>";
        }
        print "</table>
          </div></div>";
		}
		/******************************************************************************************
		view - view entries in the database, in a table format
		******************************************************************************************/
		function view($user, $ret_code=0, $start=0, $limit=10){
		  /********************************************************************
      NOT PUBLISHED ARTICLES      
      ********************************************************************/    
        $sql = "SELECT * FROM ".$this->config->db_prefix."_news WHERE
                    ".$this->config->db_prefix."_news.published = 0
                    ORDER BY id DESC ";
        $results = $this->db->DB_Q_C($sql);
        $count = mysql_affected_rows();
        print "<div id='records'><div id='content'>";
        //CHECK RETURN CODE, SPIT OUT THE CORRECT MESSAGE
        if($ret_code==-100){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>There was an error with the request. Please try again.</th></tr>
          </table>";
        }else if($ret_code==0){
        }else if($ret_code==1){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The news article has been published and is live on your site.</th></tr>
          </table>";
        }else if($ret_code==-1){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The news article has not been published.</th></tr>
          </table>";
        }else if($ret_code==2){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The news article has been deleted.</th></tr>
          </table>";
        }else if($ret_code==-2){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The news article has not been deleted.</th></tr>
          </table>";
        }else if($ret_code==3){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The news article has been saved.</th></tr>
          </table>";
        }else if($ret_code==4){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The news comment has been saved.</th></tr>
          </table>";
        }else if($ret_code==5){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The news comment has been deleted.</th></tr>
          </table>";
        }else if($ret_code==-5){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The news comment has not been deleted.</th></tr>
          </table>";
        }
        print "<table cellpadding='0' cellspacing='0'>
          <tr><th colspan='5' class='record_head'>Articles waiting to be published</th></tr>";
        if($count>0){
          print "<tr><th>Title</th><th colspan='4'>Options</th></tr>";
          while($row=mysql_fetch_array($results)){
              if($striper){
                $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
              }else{
                $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
              }
              $striper=!$striper;
              print "<tr $effect>
                    <td width='100%'>".stripslashes($row['title'])."</td>
                    <td width='23'><a class='toolTipElement' title='Article Details::View details about the news article.' href='?pid=".$this->id."&amp;cid=2&amp;theid=".$row[0]."'><img src='images/preview.png' border='0' alt='view' /></a></td>";
              //
                if($user->user_perms[$this->id-1][4]==1){
                  print "<td width='23'><a class='toolTipElement' title='Article Publishing::Publish this news article.' href='?pid=".$this->id."&amp;cid=5&amp;theid=".$row[0]."'><img src='images/publish.png' border='0' alt='publish' /></a></td>";
                }else{
                  print "<td width='23'><img src='images/publish_disabled.png' border='0' alt='' /></td>";
                }
              //
                if($user->user_perms[$this->id-1][2]==1){
                  print "<td width='23'><a class='toolTipElement' title='Article Editing::Edit this news article.' href='?pid=".$this->id."&amp;cid=3&amp;theid=".$row[0]."'><img src='images/edit.png' border='0' alt='' /></a></td>";
                }else{
                  print "<td width='23'><img src='images/edit_disabled.png' border='0' alt='' /></td>";
                }
              //
                if($user->user_perms[$this->id-1][3]==1){
                  print "<td width='23'><a class='toolTipElement' title='Article Deletion::Delete this news article from the system.' href='?pid=".$this->id."&amp;cid=4&amp;theid=".$row[0]."'><img src='images/delete.png' border='0' alt='' /></a></td>";
                }else{
                  print "<td width='23'><img src='images/delete_disabled.png' border='0' alt='' /></td>";
                }
              print "</tr>";
          }
          if($count>1){
            print "<tr><th colspan='5' class='record_footer'>There are a total of <b>$count</b> records waiting to be published</th></tr>";
          }else{
            print "<tr><th colspan='5' class='record_footer'>There is <b>$count</b> record waiting to be published</th></tr>";
          }
        }else{
          print "<tr><td colspan='5'>There are no news articles in the system.</td></tr>";
        }
        print "</table>
          </div></div>";
      /********************************************************************
      PUBLISHED ARTICLES      
      ********************************************************************/      		 
        $sql = "SELECT * FROM ".$this->config->db_prefix."_news WHERE
                    ".$this->config->db_prefix."_news.published = 1
                    ORDER BY id DESC LIMIT $start, $limit";
        $results = $this->db->DB_Q_C($sql);
        $count = mysql_affected_rows();
        //COUNT ALL THE RECORDS IN THE SYSTEM
        $sql = "SELECT * FROM ".$this->config->db_prefix."_news WHERE
                   ".$this->config->db_prefix."_news.published = 1
                    ORDER BY id DESC";
        $results2 = $this->db->DB_Q_C($sql);
        $total = mysql_affected_rows();
        //
        print "<div id='records'><div id='content'>
          <table cellpadding='0' cellspacing='0'>
          <tr><th colspan='4' class='record_head'>Published Articles</th></tr>";
        if($count>0){
          print "<tr><th>Title</th><th colspan='3'>Options</th></tr>";
          while($row=mysql_fetch_array($results)){
            if($striper){
                $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
              }else{
                $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
              }
              $striper=!$striper;
              print "<tr $effect>
                    <td width='100%'>".stripslashes($row['title'])."</td>
                    <td width='23'><a class='toolTipElement' title='Article Details::View details about the news article.' href='?pid=".$this->id."&amp;cid=2&amp;theid=".$row[0]."'><img src='images/preview.png' border='0' alt='view' /></a></td>";
              //
                if($user->user_perms[$this->id-1][2]==1){
                  print "<td width='23'><a class='toolTipElement' title='Article Editing::Edit this news article.' href='?pid=".$this->id."&amp;cid=3&amp;theid=".$row[0]."'><img src='images/edit.png' border='0' alt='' /></a></td>";
                }else{
                  print "<td width='23'><img src='images/edit_disabled.png' border='0' alt='' /></td>";
                }
              //
                if($user->user_perms[$this->id-1][3]==1){
                  print "<td width='23'><a class='toolTipElement' title='Article Deletion::Delete this news article from the system.' href='?pid=".$this->id."&amp;cid=4&amp;theid=".$row[0]."'><img src='images/delete.png' border='0' alt='' /></a></td>";
                }else{
                  print "<td width='23'><img src='images/delete_disabled.png' border='0' alt='' /></td>";
                }
              print "</tr>";
          }
          if($total>$count){
           $name = array("pid", "cid");
            $data = array($_REQUEST['pid'], $_REQUEST['cid']); 
            pageNav($start, $limit, $total, $name, $data);
            print "<tr><th colspan='4' class='record_footer'>
            Showing $count out of a total of <b>$total</b> records in the system</th></tr>";
          }else{
            if($count>1){
              print "<tr><th colspan='4' class='record_footer'>There are a total of <b>$total</b> records in the system</th></tr>";
            }else{
              print "<tr><th colspan='4' class='record_footer'>There is <b>$total</b> record in the system</th></tr>";
            }
          }      
        }else{
          print "<tr><td colspan='4'>There are no news articles in the system.</td></tr>";
        }
        print "</table>
          </div></div>";
		}
		/******************************************************************************************
		menu - displays the menu for this module
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
        print "<div id='news_perms_advanced'>";
          //TOTAL SUB-PERMISSION COUNT
            print "<input type='hidden' name='perm_".$this->name."_count' value='7' />";
            print "<table>";
            print "<tr><th colspan='2'>Advanced Permissions</th></tr>";
          //CREATE ARTICLES
           if($user->user_perms[$this->id-1][1]==1){
              print "<tr><th>Create Articles</th><td>";
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
          //EDIT ARTICLES
           if($user->user_perms[$this->id-1][2]==1){
              print "<tr><th>Edit Articles</th><td>";
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
          //DELETE ARTICLES
           if($user->user_perms[$this->id-1][3]==1){
              print "<tr><th>Delete Articles</th><td>";
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
          //PUBLISH ARTICLES
           if($user->user_perms[$this->id-1][4]==1){
              print "<tr><th>Publish Articles</th><td>";
                print "<select name='perm_".$this->name."_4'>";
                if($perm[4]=='1'){
                  print "<option value='0'>No Access</option>";
                  print "<option value='1' selected='selected'>Full Access</option>";
                }else if($perm[4]=='0'){
                  print "<option value='0' selected='selected'>No Access</option>";
                  print "<option value='1'>Full Access</option>";
                }else{
                  print "<option value='0'>No Access</option>";
                  print "<option value='1' selected='selected'>Full Access</option>";
                }
                print "</select>";
              print "</td></tr>";
            }else{
              print "<input type='hidden' name='perm_".$this->name."_4' value='0' />";
            }
          //CREATE CATEGORIES
           if($user->user_perms[$this->id-1][5]==1){
              print "<tr><th>Create Categories</th><td>";
                print "<select name='perm_".$this->name."_5'>";
                if($perm[5]=='1'){
                  print "<option value='0'>No Access</option>";
                  print "<option value='1' selected='selected'>Full Access</option>";
                }else if($perm[5]=='0'){
                  print "<option value='0' selected='selected'>No Access</option>";
                  print "<option value='1'>Full Access</option>";
                }else{
                  print "<option value='0'>No Access</option>";
                  print "<option value='1' selected='selected'>Full Access</option>";
                }
                print "</select>";
              print "</td></tr>";
            }else{
              print "<input type='hidden' name='perm_".$this->name."_5' value='0' />";
            }
          //EDIT CATEGORIES
           if($user->user_perms[$this->id-1][6]==1){
              print "<tr><th>Edit Categories</th><td>";
                print "<select name='perm_".$this->name."_6'>";
                if($perm[6]=='1'){
                  print "<option value='0'>No Access</option>";
                  print "<option value='1' selected='selected'>Full Access</option>";
                }else if($perm[6]=='0'){
                  print "<option value='0' selected='selected'>No Access</option>";
                  print "<option value='1'>Full Access</option>";
                }else{
                  print "<option value='0'>No Access</option>";
                  print "<option value='1' selected='selected'>Full Access</option>";
                }
                print "</select>";
              print "</td></tr>";
            }else{
              print "<input type='hidden' name='perm_".$this->name."_6' value='0' />";
            }
          //DELETE CATEGORIES
           if($user->user_perms[$this->id-1][7]==1){
              print "<tr><th>Delete Categories</th><td>";
                print "<select name='perm_".$this->name."_7'>";
                if($perm[7]=='1'){
                  print "<option value='0'>No Access</option>";
                  print "<option value='1' selected='selected'>Full Access</option>";
                }else if($perm[7]=='0'){
                  print "<option value='0' selected='selected'>No Access</option>";
                  print "<option value='1'>Full Access</option>";
                }else{
                  print "<option value='0'>No Access</option>";
                  print "<option value='1' selected='selected'>Full Access</option>";
                }
                print "</select>";
              print "</td></tr>";
            }else{
              print "<input type='hidden' name='perm_".$this->name."_7' value='0' />";
            }
            print "</table>";
        print "</div>";
      print "</td></tr>";
      print "<script>
          var formSlide = new Fx.Slide('news_perms_advanced');
					$('perm_".$this->name."').addEvent('change', function(e){
					   var tmp = $('perm_".$this->name."').options[$('perm_".$this->name."').selectedIndex].value;
					   if(tmp==0){
              formSlide.slideOut();
             }else{
              formSlide.slideIn();
             }
						});
					  var tmp = $('perm_".$this->name."').options[$('perm_".$this->name."').selectedIndex].value;
					  if(tmp==0){
              formSlide.hide();
             }else{
              formSlide.show();
             }
        </script>";
		}
		/******************************************************************************************
		menu - displays the menu for this module
		******************************************************************************************/
		function menu($user, $pid){
		  $content = "";
      if($user->user_perms[$this->id-1][0]==1){
        if($pid==$this->id){
          $content = "<li id='menu_".$this->id."_style' class='active_module'><a id='menu_".$this->id."' name='menu_".$this->id."' class='toolTipElement' title='News Section ::View, Edit, Delete or Publish News articles' href='#'>news</a></li>";
        }else{
          $content = "<li id='menu_".$this->id."_style'><a id='menu_".$this->id."' name='menu_".$this->id."' class='toolTipElement' title='News Section :: View, Edit, Delete, Publish News articles' href='#'>news</a></li>";
        }
      }
      return $content; 
		}
		/******************************************************************************************
		submenu - displays the submenu for this module
		******************************************************************************************/
		function submenu($user, $pid, $cid){
		  $content = "";
		    //subtract one from the result, so it will match up with the user perm array
      if($user->user_perms[$this->id-1][0]==1){
		    $content = "<div id='submenu_".$this->id."'><ul>";
        if($cid==0 && $pid == $this->id){
          $content .= "<li class='active_module'><a class='toolTipElement' title='View News :: View all news articles on the system.' href='?pid=$this->id&amp;cid=0'>view</a></li>";
        }else{
          $content .= "<li><a class='toolTipElement' title='View News :: View all news articles on the system.' href='?pid=$this->id&amp;cid=0'>view</a></li>";
        }
        if($user->user_perms[$this->id-1][1]==1){
          if($cid==1 && $pid == $this->id){
            $content .= "<li class='active_module'><a class='toolTipElement' title='Create News ::Create a news article.' href='?pid=$this->id&amp;cid=1'>create</a></li>";
          }else{
            $content .= "<li><a class='toolTipElement' title='Create News ::Create a news article.' href='?pid=$this->id&amp;cid=1'>create</a></li>";
          }
        }
        if($user->user_perms[$this->id-1][5]==1){
          if($cid==10 && $pid == $this->id){
            $content .= "<li class='active_module'><a class='toolTipElement' title='View Categories::View all categories in the system.' href='?pid=$this->id&amp;cid=10'>view categories</a></li>";
          }else{
            $content .= "<li><a class='toolTipElement' title='View Categories::View all categories in the system.' href='?pid=$this->id&amp;cid=10'>view categories</a></li>";
          }
        }
        if($user->user_perms[$this->id-1][5]==1){
          if($cid==11 && $pid == $this->id ){
            $content .= "<li class='active_module'><a class='toolTipElement' title='Create Categories::Create a new category.' href='?pid=$this->id&amp;cid=11'>create categories</a></li>";
          }else{
            $content .= "<li><a class='toolTipElement' title='Create Categories::Create a new category.' href='?pid=$this->id&amp;cid=11'>create categories</a></li>";
          }
        }
        if($cid==16 && $pid == $this->id){
          $content .= "<li class='active_module'><a class='toolTipElement' title='Search News ::Search for news articles in the system.' href='?pid=$this->id&amp;cid=16'>search</a></li>";
        }else{
          $content .= "<li><a class='toolTipElement' title='Search News ::Search for news articles in the system.' href='?pid=$this->id&amp;cid=16'>search</a></li>";
        }
        if($cid==100 && $pid == $this->id){
          $content .= "<li class='active_module'><a class='toolTipElement' title='Further Help ::Learn more about the news seciton of your site.' href='?pid=$this->id&amp;cid=100'>help</a></li>";
        }else{
          $content .= "<li><a class='toolTipElement' title='Further Help ::Learn more about the news seciton of your site.' href='?pid=$this->id&amp;cid=100'>help</a></li>";
        }
		    $content.= "</ul></div>";
      }
      return $content; 
		}
		/******************************************************************************************
		view_content
		******************************************************************************************/
    function view_content_cat($user, $theid){
       //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE
          $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE
                  ".$this->config->db_prefix."_cat.id = $theid
                  LIMIT 1";
          $result=$this->db->DB_Q_C($sql);
          $row = mysql_fetch_array($result);
          if(mysql_affected_rows()==0){
            $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE
                  ".$this->config->db_prefix."_cat.id = $theid
                  LIMIT 1";
            $result=$this->db->DB_Q_C($sql);
            $row = mysql_fetch_array($result);
            $row['username'] = "The System";
          }
       //COUNT THE NUMBER OF FILES THAT ARE UNDER THIS CATEGORY
          $sql = "SELECT COUNT(*) FROM ".$this->config->db_prefix."_news WHERE 
          ".$this->config->db_prefix."_news.cat_id = ".$row[0]." AND
          ".$this->config->db_prefix."_news.published = 1";
          $results3 = $this->db->DB_Q_C($sql);
          $row3 = mysql_fetch_array($results3);
          $rec_count = $row3[0];
       print "<div id='forms'><div id='content'>
        <table cellpadding='0' cellspacing='0' width='100%'>
        <tr><th class='record_head' colspan='2'>Category</th></tr>
        <tr><td colspan='2'>Vew details of this category below or <a href='../".$this->config->file_dir."/rss/rss_".$theid.".xml'>view the rss feed by clicking here</a></td></tr>
        <tr><th>Name</th><td>".$row['name']."</td></tr>
        <tr><th>Files</th><td>".$rec_count."</td></tr>
        </table>"; 
       //DISPLAY THE HISTORY OF THIS RECORD
        $sql = "SELECT * FROM ".$this->config->db_prefix."_logs, ".$this->config->db_prefix."_object, ".$this->config->db_prefix."_user WHERE
                ".$this->config->db_prefix."_logs.record_id = $theid AND 
                ".$this->config->db_prefix."_logs.module_id = ".$this->id." AND
                ".$this->config->db_prefix."_logs.sub_module_id = 2 AND
                ".$this->config->db_prefix."_logs.object_id =  ".$this->config->db_prefix."_object.id AND
                ".$this->config->db_prefix."_logs.user_id =  ".$this->config->db_prefix."_user.id
                    ORDER BY ".$this->config->db_prefix."_logs.id DESC";
        $result2=$this->db->DB_Q_C($sql);
        print "<div id='records'><div id='content'>
          <table cellpadding='0' cellspacing='0'>
          <tr><th class='record_head'>Article History</th></tr>
          <tr><th>action</th></tr>";
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
                      This category was created by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";
            }else if($row2['action']==2){
              //EDIT
                print "<tr $effect><td colspan='2'>
                      This category was edited by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";
            }else if($row2['action']==4){
              //PUBLISHED   
                print "<tr $effect><td colspan='2'>
                      This category was published by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";       
            }
        }
        print "</table></div></div>
          </div></div>";
    }
		/******************************************************************************************
		view_content
		******************************************************************************************/
    function view_content($user, $theid){
       //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE
          $sql = "SELECT * FROM ".$this->config->db_prefix."_news, ".$this->config->db_prefix."_user WHERE
                  ".$this->config->db_prefix."_news.id = $theid 
                  LIMIT 1";
          $result=$this->db->DB_Q_C($sql);
          $row = mysql_fetch_array($result);
       print "<div id='forms'><div id='content'>
       <table cellpadding='0' cellspacing='0' width='100%'>
       <tr><th class='record_head' colspan='2'>News Article</th></tr>
       <tr><td colspan='2'>The details of this article are below.</td></tr>
       <tr><th>Title</th><td>".stripslashes($row['title'])."</td></tr>
       <tr><th>Body</th><td>".stripslashes($row['body'])."</td></tr>
       <tr><th>Summary</th><td>".stripslashes($row['summary'])."</td></tr>
       </table>";
       //DISPLAY ALL COMMENTS FOR THIS ARTICLE
        $sql = "SELECT * FROM ".$this->config->db_prefix."_news_comments WHERE news_id = $theid ORDER by date DESC";
        $result2=$this->db->DB_Q_C($sql);
        print "<div id='records'><div id='content'>
        <table cellpadding='0' cellspacing='0'>
        <tr><th class='record_head'>Article Comments</th></tr>
        <tr><th>user</th><th>date</th><th colspan='2'>options</th></tr>";
        while($row2=mysql_fetch_array($result2)){
          if($striper){
            $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
          }else{
            $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
          }
          $striper=!$striper;
          //GET AND CONVERT DATE ACCORDINGLY
				   $tmp_date = $this->time->convertTime($user->user_timezone, $row2['date']);
				   $create_date = DateFormat($tmp_date, $this->config->date_format);
          print "<tr $effect>
                  <td class='toolTipElement' title='Comment::".$row2['body']."'>".$row2['user_name']."</td>
                  <td>".$create_date."</td>
                  <td width='23'><a href='?pid=".$this->id."&cid=18&theid=".$row2[0]."' class='toolTipElement' title='Edit Comment::Edit this comment.'><img src='images/edit.png' /></a></td>
                  <td width='23'><a href='?pid=".$this->id."&cid=19&theid=".$row2[0]."' class='toolTipElement' title='Delete Comment::Remove this comment from the system.'><img src='images/delete.png' /></a></td>
                </tr>";
        }
       //DISPLAY THE HISTORY OF THIS RECORD
        $sql = "SELECT * FROM ".$this->config->db_prefix."_logs, ".$this->config->db_prefix."_object, ".$this->config->db_prefix."_user WHERE
                ".$this->config->db_prefix."_logs.record_id = $theid AND 
                ".$this->config->db_prefix."_logs.module_id = ".$this->id." AND
                ".$this->config->db_prefix."_logs.sub_module_id = 1 AND
                ".$this->config->db_prefix."_logs.object_id =  ".$this->config->db_prefix."_object.id AND
                ".$this->config->db_prefix."_logs.user_id =  ".$this->config->db_prefix."_user.id
                    ORDER BY ".$this->config->db_prefix."_logs.id DESC";
        $result2=$this->db->DB_Q_C($sql);
        print "<div id='records'><div id='content'>
        <table cellpadding='0' cellspacing='0'>
        <tr><th class='record_head'>Article History</th></tr>
        <tr><th>action</th></tr>";
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
                      This article was created by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";
            }else if($row2['action']==2){
              //EDIT
                print "<tr $effect><td colspan='2'>
                      This article was edited by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";
            }else if($row2['action']==4){
              //PUBLISHED   
                print "<tr $effect><td colspan='2'>
                      This article was published by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";       
            }
        }
        print "</table></div></div>
        </div></div>";
    }
    /******************************************************************************************
		process_delete
		******************************************************************************************/
    function process_delete_cat($user, $theid){
        $ret_code = array(0,0);
          if($_REQUEST['choice']=="yes"){
            $ret_code[0] = 2;
             //CREATE A UNIX TIMESTAMP
    					$stamp = time();
    					$date = gmdate("Y-m-d H:i:s", $stamp);
             //SET ALL FILES THAT ARE IN THIS CATEGORY TO ONE -GENERAL
              $sql = "UPDATE ".$this->config->db_prefix."_news SET cat_id = 1 WHERE cat_id = $theid";
              $results = $this->db->DB_Q_C($sql);
             //DELETE THE CAT AND THE OBJECT
              $sql = "DELETE FROM ".$this->config->db_prefix."_cat WHERE id = $theid";
              $results=$this->db->DB_Q_C($sql);
            //DELETE ANY SUB CATEGORIES UNDER THIS CATEGORY
              $sql = "DELETE FROM ".$this->config->db_prefix."_cat WHERE parent_id = $theid";
              $results=$this->db->DB_Q_C($sql);
            //LOG THE ACTION
    				  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 
  									   VALUES('$date', '$user->user_id')";
    					$results=$this->db->DB_Q_C($sql);
    					$lastobjectid = mysql_insert_id();
    				  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)
                      VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 2, $theid, 3)";
              $results=$this->db->DB_Q_C($sql);
            //REMOVE THE FEED
              $filename = "../".$this->config->file_dir."/rss/rss_".$theid.".xml";
      		    unlink($filename);
          }else{
            $ret_code[0] = -2;
          }
        return $ret_code;
    }
    /******************************************************************************************
		process_delete_comment
		******************************************************************************************/
    function process_delete_comment($user, $theid){
        $ret_code = array(0,0);
          if($_REQUEST['choice']=="yes"){
            $ret_code[0] = 5;
             //CREATE A UNIX TIMESTAMP
    					$stamp = time();
    					$date = gmdate("Y-m-d H:i:s", $stamp);
             //DELETE THE CAT AND THE OBJECT
              $sql = "DELETE FROM ".$this->config->db_prefix."_news_comments WHERE id = $theid";
              $results=$this->db->DB_Q_C($sql);
          }else{
            $ret_code[0] = -5;
          }
        return $ret_code;
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
				//GRAB OUR CATEGORY ID
				  $sql = "SELECT * FROM ".$this->config->db_prefix."_news WHERE id = $theid";
          $result=$this->db->DB_Q_C($sql);
          $row = mysql_fetch_array($result);
          $cats = $row['cat_id'];
        //REMOVE OUR NEWS
          $sql = "DELETE FROM ".$this->config->db_prefix."_news WHERE id = $theid";
          $result=$this->db->DB_Q_C($sql);
        //LOG THE ACTION
  				  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 
									   VALUES('$date', '$user->user_id')";
  					$results=$this->db->DB_Q_C($sql);
  					$lastobjectid = mysql_insert_id();
  				  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)
                    VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 1, $theid, 3)";
            $results=$this->db->DB_Q_C($sql);
        //RETURN CODE - SUCCESS
          $ret_code[0] = 2;
        //UPDATE OUR FEED
          $this->feeds($cats);
      }else{
        //RETURN CODE - NO DELETE
          $ret_code[0] = -2;
      }
      return $ret_code;
    }
    /******************************************************************************************
		display_delete
		******************************************************************************************/
    function display_delete_cat($user, $theid){
      if($theid==1){
         print "<div id='error'><div id='content'>You do not have permission to delete this category!</div></div>";
        $this->view_content_cat($user,$theid);
      }else{
          print "<div id='forms'><div id='content'>
            <table cellpadding='0' cellspacing='0' width='100%'>
            <tr><th class='record_head' colspan='2'>Delete Category?</th></tr>
            <tr><td>
            <form id='delete_category' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">
            <input type='hidden' name='the_action' value='submitok' />
            <input type='hidden' name='theid' value='$theid' />
            <input type='hidden' name='formprocess' value='yes' />
            <select name='choice' class='required'>
            <option value='no'>No, do not delete the category</option>
            <option value='yes'>Yes, delete the category</option>
            </select>
            <input type='submit' name='submitexitok_cats' value='Submit' onclick=\"clicked='submitexitok_cats'\"/>
            </form>
            </table>
            </div></div>
            <script>new FormValidator ('delete_category', {
              onFormValidate: function(pass, form){ 
                if(pass==true){
                  form.submitexitok_cats.disabled=true;
                }
              }
            });</script>";
          $this->view_content_cat($user,$theid);
      }
    }
    /******************************************************************************************
		display_delete
		******************************************************************************************/
    function display_delete_comment($user, $theid){
        print "<div id='forms'><div id='content'>
          <table cellpadding='0' cellspacing='0' width='100%'>
          <tr><th class='record_head' colspan='2'>Delete Comment?</th></tr>
          <tr><td>
          <form id='delete_comment' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">
          <input type='hidden' name='the_action' value='submitok' />
          <input type='hidden' name='theid' value='$theid' />
          <input type='hidden' name='formprocess' value='yes' />
          <select name='choice' class='required'>
          <option value='no'>No, do not delete the comment</option>
          <option value='yes'>Yes, delete the comment</option>
          </select>
          <input type='submit' name='submitexitok_comments' value='Submit' onclick=\"clicked='submitexitok_comments'\"/>
          </form>
          </table>
          </div></div>
          <script>new FormValidator ('delete_comment', {
            onFormValidate: function(pass, form){ 
              if(pass==true){
                form.submitexitok_comments.disabled=true;
              }
            }
          });</script>";
    }
    /******************************************************************************************
		display_delete
		******************************************************************************************/
    function display_delete($user, $theid){
        print "<div id='forms'><div id='content'>
        <table cellpadding='0' cellspacing='0' width='100%'>
        <tr><th class='record_head' colspan='2'>Delete News Article?</th></tr>
        <tr><td>
        <form id='delete_news' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">
        <input type='hidden' name='the_action' value='submitexitok' />
        <input type='hidden' name='theid' value='$theid' />
        <input type='hidden' name='formprocess' value='yes' />
        <select name='choice' class='required'>
        <option value='no'>No, do not delete the article</option>
        <option value='yes'>Yes, delete the article</option>
        </select>
        <input type='submit' name='submitexitok' value='Submit' onclick=\"clicked='submitexitok'\" />
        </form>
        </table>
        </div></div>
        <script>new FormValidator ('delete_news', {
            onFormValidate: function(pass, form){ 
              if(pass==true){
                form.submitexitok.disabled=true;
              }
            }
          });</script>";
        $this->view_content($user, $theid);
    }
    /******************************************************************************************
		process_publish
		******************************************************************************************/
    function process_publish($user, $theid){
      $ret_code = array(0,0);
      if($_REQUEST['choice']=="yes"){
        //CREATE A UNIX TIMESTAMP
					$stamp = time();
					$date = gmdate("Y-m-d H:i:s", $stamp);
				//GRAB OUR CATEGORY ID
				  $sql = "SELECT * FROM ".$this->config->db_prefix."_news WHERE id = $theid";
          $result=$this->db->DB_Q_C($sql);
          $row = mysql_fetch_array($result);
          $cats = $row['cat_id'];
        //UPDATE OUR NEWS
          $sql = "UPDATE ".$this->config->db_prefix."_news SET published = '1' WHERE id = $theid";
          $result=$this->db->DB_Q_C($sql);
      	//LOG THE ACTION
				  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 
								   VALUES('$date', '$user->user_id')";
					$results=$this->db->DB_Q_C($sql);
					$lastobjectid = mysql_insert_id();
				  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)
                  VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 1, $theid, 4)";
          $results=$this->db->DB_Q_C($sql);
        //UPDATE OUR FEED
          $this->feeds($cats);
        //RETURN CODE - SUCCESS
          $ret_code[0]=1;
      }else{
        //RETURN CODE - NO PUBLISH
          $ret_code[0]=-1;
      }
      return $ret_code;
    }
    /******************************************************************************************
		display_publish
		******************************************************************************************/
    function display_publish($user, $theid){
      print "<div id='forms'><div id='content'>
      <table cellpadding='0' cellspacing='0' width='100%'>
      <tr><th class='record_head' colspan='2'>Publish News Article?</th></tr>
      <tr><td>
      <form method='post' action='' id='publish_news' onSubmit=\"this.the_action.value=clicked;\">
      <input type='hidden' name='the_action' value='submitok' />
      <input type='hidden' name='theid' value='$theid' />
      <input type='hidden' name='formprocess' value='yes' />
      <select name='choice' class='required'>
      <option value='no'>No, do not publish the article</option>
      <option value='yes'>Yes, publish the article</option>
      </select>
      <input type='submit' name='submitexitok' value='Submit' onclick=\"clicked='submitexitok'\" />
      </form>
      </table>
      </div></div>
      <script>new FormValidator ('publish_news', {
        onFormValidate: function(pass, form){ 
          if(pass==true){
            form.submitexitok.disabled=true;
          }
        }
      });</script>";
      $this->view_content($user, $theid);
    }
    /******************************************************************************************
		display_log
		******************************************************************************************/
		function display_log($action, $subid, $date, $theid){
		  $ret = "";
		  if($subid==1){
        //NEWS
        if($action==1){
          //CREATE
          $ret = "Created a <a class='toolTipElement' title='View Details::View more information on this news article.' href='?pid=$this->id&cid=2&amp;theid=$theid'>news article</a> on $date";
        }else if($action==2){
          //EDIT
          $ret = "Edited a <a class='toolTipElement' title='View Details::View more information on this news article.' href='?pid=$this->id&cid=2&amp;theid=$theid'>news article</a> on $date";
        }else if($action==3){
          //DELETE
          $ret = "Deleted a <a class='toolTipElement' title='View Details::View more information on this news article.' href='?pid=$this->id&cid=2&amp;theid=$theid'>news article</a> on $date";
        }else{
          //UNKNOWN
          $ret = "Did unknown action to a <a class='toolTipElement' title='View Details::View more information on this news article.' href='?pid=$this->id&cid=2&amp;theid=$theid'>news article</a> on $date";
        }
      }else if($subid==2){
        //CATEGORY
        if($action==1){
          //CREATE
          $ret = "Created a <a class='toolTipElement' title='View Details::View more information on this category.' href='?pid=$this->id&cid=12&amp;theid=$theid'>a category</a> on $date";
        }else if($action==2){
          //EDIT
          $ret = "Edited a <a class='toolTipElement' title='View Details::View more information on this category.' href='?pid=$this->id&cid=12&amp;theid=$theid'>a category</a> on $date";
        }else if($action==3){
          //DELETE
          $ret = "Deleted a <a class='toolTipElement' title='View Details::View more information on this category.' href='?pid=$this->id&cid=12&amp;theid=$theid'>a category</a> on $date";
        }else{
          //UNKNOWN
          $ret = "Did unknown action to a <a class='toolTipElement' title='View Details::View more information on this category.' href='?pid=$this->id&cid=12&amp;theid=$theid'>a category</a> on $date";
        }
      }else{
        //UNKNOWN
          $ret = "Did unknown action to an unknown section on $date";
      }
      return $ret;
		}
		/******************************************************************************************
		process_create
		******************************************************************************************/
    function process_create($user){
      $ret_code = array(0,0);
      //GRAB ALL THE INFORMATION FROM THE POST ACTION
				$title = addslashes($_REQUEST['title']);
				$body = addslashes($_REQUEST['body']);
				$summary = addslashes($_REQUEST['summary']);
				$published = $_REQUEST['published'];
				$cats = $_REQUEST['cats'];
			//CHECK DATA FOR ERRORS
			 if(strlen($title)>0){
  			//CREATE A UNIX TIMESTAMP
  				$stamp = time();
  				$date = gmdate("Y-m-d H:i:s", $stamp);
        //CHECK FOR SUMMARY, IF NONE CREATE ONE.
         if(strlen($summary)==0){
          $summary = addslashes(substr(strip_tags(stripslashes($body)), 0, 200));
         }
       	//INSERT INTO OUR NEWS OBJECT
         	$sql = "INSERT INTO ".$this->config->db_prefix."_news(title, body, summary, published, cat_id) 
      					   VALUES('$title', '$body', '$summary', '$published', '$cats')";
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
      	//CHECK TO SEE IF RSS FEED SHOULD BE UPDATED
      	 if($published==1){
          $this->feeds($cats);
         }
        //SET THE RETURN CODE TO SUCCESS, AND ALSO STORE THE ID
          $ret_code[0] = 3;
          $ret_code[1] = $lastid;
        }else{
          //WE HAVE BAD DATA RETURN AN ERROR MESSAGE
            $ret_code[0] = -100;
            $ret_code[1] = 0;
        }
       return $ret_code;
    }
    /******************************************************************************************
		display_create
		******************************************************************************************/
    function display_create($user, $theid=0, $ret_code=0){
      $this->create_form();
    }
    /******************************************************************************************
		display_create
		******************************************************************************************/
     function display_create_cat($user, $theid=0, $ret_code=0){
      $this->create_form_cat();
     }
    /******************************************************************************************
		display_create
		******************************************************************************************/
     function display_create_comment($user, $theid=0, $ret_code=0){
      $this->create_form_comment();
     }
    /******************************************************************************************
		display_edit
		******************************************************************************************/
    function display_edit($theid=0, $ret_code=0, $user){
        if($ret_code==-100){
            print "<div id='records'><div id='content'><table width='100%'>
            <tr><th class='notice_record_head'>There was an error with the request. Please try again.</th></tr>
            </table></div></div>";
        }else if($ret_code==0){
        }else if($ret_code==3){
          print "<div id='records'><div id='content'><table width='100%'>
          <tr><th class='notice_record_head'>The news article has been saved.</th></tr>
          </table></div></div>";
        }
        //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE
          $sql = "SELECT * FROM ".$this->config->db_prefix."_news WHERE
                  ".$this->config->db_prefix."_news.id = $theid LIMIT 1";
          $result=$this->db->DB_Q_C($sql);
          $row = mysql_fetch_array($result);
          $this->create_form(stripslashes($row['title']), stripslashes($row['body']), stripslashes($row['summary']), $row['published'], $row['cat_id'], $theid);
    }
    /******************************************************************************************
		display_edit
		******************************************************************************************/
    function display_edit_comment($theid=0, $ret_code=0, $user){
        if($ret_code==4){
          print "<div id='records'><div id='content'><table width='100%'>
          <tr><th class='notice_record_head'>The news comment has been saved.</th></tr>
          </table></div></div>";
        }
        //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE
          $sql = "SELECT * FROM ".$this->config->db_prefix."_news_comments WHERE
                  id = $theid LIMIT 1";
          $result=$this->db->DB_Q_C($sql);
          $row = mysql_fetch_array($result);
          $this->create_form_comment($row['id'], stripslashes($row['user_name']), stripslashes($row['body']), $row['date'], $row['news_id']);
    }
    /******************************************************************************************
		display_edit
		******************************************************************************************/
   function display_edit_cat($theid, $ret_code, $user){
      if($user->user_perms[$this->id-1][6]==1){
        if($ret_code==0){
        }else if($ret_code==1){
          print "<div id='records'><div id='content'><table width='100%'>
          <tr><th class='notice_record_head'>The category has been saved.</th></tr>
          </table></div></div>";
        }else if($ret_code==-1){
        }
        //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE
            $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE
                    ".$this->config->db_prefix."_cat.id = $theid LIMIT 1";
            $result=$this->db->DB_Q_C($sql);
            $row = mysql_fetch_array($result);
            $this->create_form_cat($row['name'], $theid, $row['parent_id']);
      }else{
        print "<div id='error'><div id='content'>You do not have permission to access this page!</div></div>";
      }
   }
    /******************************************************************************************
		process_edit
		******************************************************************************************/
   function process_edit_cat($user, $theid){
      $ret_code = array(0,0);
      //
        $ret_code = array(1, $theid);
      //GRAB ALL THE INFORMATION FROM THE POST ACTION
				$name = stripslashes($_REQUEST['name']);
				$parent_id = stripslashes($_REQUEST['parent']);
				$object_id = $_REQUEST['object_id'];
			//CREATE A UNIX TIMESTAMP
				$stamp = time();
				$date = gmdate("Y-m-d H:i:s", $stamp);
     	//UPDATE OUR NEWS OBJECT
				$sql = "UPDATE ".$this->config->db_prefix."_cat
                SET name = '$name',
                parent_id = '$parent_id'
                WHERE id = $theid";
				$results=$this->db->DB_Q_C($sql);
			//LOG THE ACTION
			  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 
							   VALUES('$date', '$user->user_id')";
				$results=$this->db->DB_Q_C($sql);
				$lastobjectid = mysql_insert_id();
			  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)
                VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 2, $theid, 2)";
        $results=$this->db->DB_Q_C($sql);
			//GENERATE THE FEED
			  $this->feeds($theid);
			return $ret_code;
    }
    /******************************************************************************************
		process_edit
		******************************************************************************************/
   function process_edit_comment($user, $theid){
      $ret_code = array(0,0);
      //
        $ret_code = array(4, $theid);
      //GRAB ALL THE INFORMATION FROM THE POST ACTION
				$name = stripslashes($_REQUEST['name']);
				$comment = stripslashes($_REQUEST['comment']);
				$date = stripslashes($_REQUEST['date']);
				$news_id = stripslashes($_REQUEST['news_id']);
				
			//CREATE A UNIX TIMESTAMP
				$stamp = time();
				$date = gmdate("Y-m-d H:i:s", $stamp);
     	//UPDATE OUR NEWS OBJECT
				$sql = "UPDATE ".$this->config->db_prefix."_news_comments
                SET user_name = '$name',
                body = '$comment'
                WHERE id = $theid";
				$results=$this->db->DB_Q_C($sql);
			//LOG THE ACTION
			  /*$sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 
							   VALUES('$date', '$user->user_id')";
				$results=$this->db->DB_Q_C($sql);
				$lastobjectid = mysql_insert_id();
			  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(user_id, object_id, module_id, record_id, action)
                VALUES('".$user->user_id."', $lastobjectid, '".$this->id."', $theid, 2)";
        $results=$this->db->DB_Q_C($sql);*/
			//GENERATE THE FEED
			  $this->feeds($theid);
			return $ret_code;
    }
    /******************************************************************************************
		process_edit
		******************************************************************************************/
    function process_edit($user, $theid){
      $ret_code = array(0,$theid);
      //GRAB ALL THE INFORMATION FROM THE POST ACTION
				$title = addslashes($_REQUEST['title']);
				$body = addslashes($_REQUEST['body']);
				$summary = addslashes($_REQUEST['summary']);
				$published = $_REQUEST['published'];
				$cats = $_REQUEST['cats'];
			//CHECK DATA FOR ERRORS
			 if(strlen($title)>0){
  			//CREATE A UNIX TIMESTAMP
  				$stamp = time();
  				$date = gmdate("Y-m-d H:i:s", $stamp);
       	//UPDATE OUR NEWS OBJECT
  				$sql = "UPDATE ".$this->config->db_prefix."_news
                  SET title = '$title', body = '$body', summary = '$summary', published = '$published', cat_id = '$cats'
                  WHERE id = $theid";
  				$results=$this->db->DB_Q_C($sql);
  			//LOG THE ACTION
  			  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 
  							   VALUES('$date', '$user->user_id')";
  				$results=$this->db->DB_Q_C($sql);
  				$lastobjectid = mysql_insert_id();
  			  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)
                  VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 1, $theid, 2)";
          $results=$this->db->DB_Q_C($sql);
  			//CHECK TO SEE IF THE USER WANTS TO UPDATE THE RSS FILE
          if($published==1){
            $this->feeds($cats);
          }
        //SET THE RETURN CODE TO SUCCESS
  		   $ret_code[0] = 3;
  		  }else{
          //WE HAVE BAD DATA RETURN AN ERROR MESSAGE
            $ret_code[0] = -100;
        }
       return $ret_code;
    }
    /******************************************************************************************
		create_form_cat - displays the form to create a news article
		******************************************************************************************/
    function create_form_cat($name="", $theid="", $parent_id=0){
        print "<div id='forms'><div id='content'>
          <form name='create_cats' id='create_cats' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">
          <input type='hidden' name='the_action' value='submitok' />
          <input type='hidden' name='theid' value='$theid' />
          <input type='hidden' name='formprocess' value='yes' />
          <table width='100%' cellspacing='0' cellpadding='0'>
          <tr><th class='record_head' colspan='2'>Category Submission Form</th></tr>
          <tr><td colspan='2'>Please fill in required fields below and click <b>Save Category</b> to enter your category into the system.</td></tr>
          <tr><th>Name</th><td><input class='required' name='name' type='text' size='75' value=\"$name\" /></td></tr>";
        //PRINT OUT ALL OF OUR CATEGORIES MINUS THIS ONE
          $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE parent_id = 0";
          $results=$this->db->DB_Q_C($sql);
          if($theid>1 || $theid==""){
            print "<tr><th>Parent</th><td>";
            $depth = 1;
            while($row = mysql_fetch_array($results)){
              if($row[0]==1){
                $depth = 0;
              }else{
                $depth = 1;
              }
              $striper=!$striper;
              if($striper){
                $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
              }else{
                $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
              }
                if($parent_id==$row[0] || $theid==""){
                  print "<div $effect><input checked='checked' type='radio' name='parent' value='".$row['id']."' id='opt".$row['id']."' />
                    ".$this->padImage($depth)." <label for='opt".$row['id']."'>".$row['name']."</label></div>
                  ";
                }else{
                  print "<div $effect><input type='radio' name='parent' value='".$row['id']."' id='opt".$row['id']."' />
                    ".$this->padImage($depth)." <label for='opt".$row['id']."'>".$row['name']."</label></div>";
                }
                //if($parent_id!=$row[0]){
                  $striper = $this->getChilds($row[0], $parent_id, $striper, $depth, $theid);
               // }
              }
            print "</td></tr>";
          }else{
            print "<input type='hidden' name='parent' value='0' />";
          }
        print "<tr><th colspan='2' align='right'>
          <input type='submit' name='submitok_cats' value='Save Category' onclick=\"clicked='submitok_cats'\"/>
          <input type='submit' name='submitexitok_cats' value='Save Category & Exit' onclick=\"clicked='submitexitok_cats'\"/>
          </th></tr>
          </table>
          </form>
          </div></div>
          <script>new FormValidator ('create_cats', {
            onFormValidate: function(pass, form){ 
              if(pass==true){
                form.submitok_cats.disabled=true;
                form.submitexitok_cats.disabled=true;
              }
            }
          });</script>";
    }
    /******************************************************************************************
		create_form_comment - 
		******************************************************************************************/
    function create_form_comment($theid="", $name="", $comment="", $date="", $news_id=""){
        print "<div id='forms'><div id='content'>
          <form name='create_comment' id='create_comment' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">
          <input type='hidden' name='the_action' value='submitok' />
          <input type='hidden' name='theid' value='$theid' />
          <input type='hidden' name='news_id' value='$news_id' />
          <input type='hidden' name='formprocess' value='yes' />
          <table width='100%' cellspacing='0' cellpadding='0'>
          <tr><th class='record_head' colspan='2'>Comment Submission Form</th></tr>
          <tr><td colspan='2'>Please fill in required fields below and click <b>Save Comment</b> to enter your comment into the system.</td></tr>
          <tr><th>Name</th><td><input class='required' name='name' type='text' size='75' value=\"$name\" /></td></tr>
          <tr><th>Comment</th><td><textarea class='required' name='comment'>$comment</textarea></td></tr>
          <tr><th>Date</th><td><input type='text' class='DatePicker' id='date' name='date' value='".$date."' maxlength='10' /></td></tr>";
        
        print "<tr><th colspan='2' align='right'>
          <input type='submit' name='submitok_comments' value='Save Comment' onclick=\"clicked='submitok_comments'\"/>
          <input type='submit' name='submitexitok_comments' value='Save Comment & Exit' onclick=\"clicked='submitexitok_comments'\"/>
          </th></tr>
          </table>
          </form>
          </div></div>
          <script>new FormValidator ('create_comment', {
            onFormValidate: function(pass, form){ 
              if(pass==true){
                form.submitok_comments.disabled=true;
                form.submitexitok_comments.disabled=true;
              }
            }
          });</script>";
    }
    /******************************************************************************************
		
		******************************************************************************************/
    function getChilds($theid="", $parent_id=0, $striper=false, $depth=0, $oid=""){
      $depth++;
      //PRINT OUT ALL OF OUR CATEGORIES MINUS THIS ONE
        $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE parent_id = $theid";
        $results=$this->db->DB_Q_C($sql);
        $count = mysql_affected_rows();
        if($count>0){
          while($row = mysql_fetch_array($results)){
              if($oid!=$row[0]){
                $striper=!$striper;
                $pad = $depth*10;
                if($striper){
                  $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
                }else{
                  $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
                }
                if($parent_id==$row[0]){
                  print "<div $effect><input checked='checked' type='radio' name='parent' value='".$row['id']."' id='opt".$row['id']."' />
                    ".$this->padImage($depth)." <label for='opt".$row['id']."'>".$row['name']."</label></div>
                  ";
                }else{
                  print "<div $effect><input type='radio' name='parent' value='".$row['id']."' id='opt".$row['id']."' />
                    ".$this->padImage($depth)." <label for='opt".$row['id']."'>".$row['name']."</label></div>";
                }
                $striper = $this->getChilds($row[0], $parent_id, $striper, $depth, $oid);
              }
          }
        }else{
        
        }
        return $striper;
    }
    /******************************************************************************************
		
		******************************************************************************************/
    function getChildsForForm($theid="", $parent_string="", $cats=""){
      //PRINT OUT ALL OF OUR CATEGORIES MINUS THIS ONE
        $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE parent_id = $theid";
        $results=$this->db->DB_Q_C($sql);
        $count = mysql_affected_rows();
        $o_string = $parent_string;
        if($count>0){
          while($row = mysql_fetch_array($results)){
           $parent_string= $o_string." -> ".$row['name'];
           if($row[0]==$cats){
              print "<option value='".$row['id']."' selected='selected'>$parent_string</option>";
           }else{
              print "<option value='".$row['id']."'>$parent_string</option>";
           }
           $this->getChildsForForm($row[0], $parent_string, $cats);
          }
        }else{
        
        }
    }
    /******************************************************************************************
		
		******************************************************************************************/
    function getChildsForView($user, $theid="", $striper=false, $depth=0){
      $depth++;
      //PRINT OUT ALL OF OUR CATEGORIES MINUS THIS ONE
        $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE parent_id = $theid";
        $results=$this->db->DB_Q_C($sql);
        $count = mysql_affected_rows();
        if($count>0){
          while($row = mysql_fetch_array($results)){
            //COUNT THE NUMBER OF FILES THAT ARE UNDER THIS CATEGORY
              $sql = "SELECT COUNT(*) FROM ".$this->config->db_prefix."_news WHERE 
              ".$this->config->db_prefix."_news.cat_id = ".$row[0]." AND
              ".$this->config->db_prefix."_news.published = 1";
              $results3 = $this->db->DB_Q_C($sql);
              $row3 = mysql_fetch_array($results3);
              $rec_count = $row3[0];
            $striper=!$striper;
            $pad = $depth*10;
            if($striper){
              $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
            }else{
              $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
            }
            print "<tr $effect>
                    <td>".$this->padImage($depth)." ".$row['name']."</td>
                    <td>".$rec_count."</td>
                    <td width='23'><a class='toolTipElement' title='View Category::View the details of this category.' href='?pid=".$this->id."&amp;cid=12&amp;theid=".$row[0]."'><img src='images/preview.png' border='0' alt='view' /></a></td>";
             //
              if($user->user_perms[$this->id-1][5]==1){
                print "<td width='23'><a class='toolTipElement' title='Update Feed::Update the RSS feed for this category.' href='?pid=".$this->id."&amp;cid=13&amp;theid=".$row[0]."&amp;formprocess=yes&amp;the_action=submitexitok_cats'><img src='images/rss.png' border='0' alt='update feed' /></a></td>";
              }else{
                print "<td width='23'><img src='images/rss_disabled.png' border='0' alt='update feed' /></td>";
              }
             //
              if($user->user_perms[$this->id-1][6]==1){
                print "<td width='23'><a class='toolTipElement' title='Edit Category::Edit this category.' href='?pid=".$this->id."&amp;cid=14&amp;theid=".$row[0]."'><img src='images/edit.png' border='0' alt='' /></a></td>";
              }else{
                print "<td width='23'><img src='images/edit_disabled.png' border='0' alt='edit' /></td>";
              }
             //
              if($user->user_perms[$this->id-1][7]==1){
                print "<td width='23'><a class='toolTipElement' title='Delete Category::Delete this categry from the system.' href='?pid=".$this->id."&amp;cid=15&amp;theid=".$row[0]."'><img src='images/delete.png' border='0' alt='' /></a></td>";
              }else{
                print "<td width='23'><img src='images/delete_disabled.png' border='0' alt='delete' /></td>";
              }           
              print "</tr>";
            $striper = $this->getChildsForView($user, $row[0], $striper, $depth);
          }
        }else{
        
        }
        return $striper;
    }
    /******************************************************************************************
		padImage
		******************************************************************************************/
    function padImage($depth){
      for($i=0;$i<$depth;$i++){
        if($i==0){
          $picname = "tree_cross";
        }else if($i>0){
          $picname = "tree_hor";
        }
        $tmp.="<img src='images/".$picname.".gif' alt='' />";
      }
      return $tmp;
    }
		/******************************************************************************************
		create_form - displays the form to create a news article
		******************************************************************************************/
    function create_form($title="", $body="", $summary="", $published="", $cats=0, $theid=0){
       print "<div id='forms'><div id='content'>
        <form name='create_news' id='create_news' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">
        <input type='hidden' name='the_action' value='submitok' />
        <input type='hidden' name='theid' value='$theid' />
        <input type='hidden' name='formprocess' value='yes' />
        <table width='100%' cellspacing='0' cellpadding='0'>
        <tr><th class='record_head' colspan='2'>News Article Submission Form</th></tr>
        <tr><td colspan='2'>Please fill in required fields below and click <b>Save Article</b> to enter your content into the system.</td></tr>";
  				//CATEGORY
  				  $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE parent_id = 0";
  				  $results=$this->db->DB_Q_C($sql);
  				  print "<tr><th>Category</th>
              <td><select name='cats'>";
  				  while($row = mysql_fetch_array($results)){
  				    if($cats==$row['id']){
                print "<option selected='selected' value='".$row['id']."'>".$row['name']."</option>";
              }else{
                print "<option value='".$row['id']."'>".$row['name']."</option>";
              }
              //GRAB ALL SUB CATEGORIES
                $this->getChildsForForm($row['id'], $row['name'], $cats);
            }  
            print "</select></td></tr>";
          //TITLE
  					print "<tr><th>Title</th>
              <td><input class='required' name='title' type='text' size='75' value=\"$title\" /></td></tr>";
  				//BODY
  					print "<tr><th>Body</th><td>";
  				 	 $oFCKeditor = new FCKeditor('body') ;
  					 $oFCKeditor->Value = $body;
  					 $oFCKeditor->Create();
  					print "</td></tr>";
  				//SUMMARY
  					print "<tr><th>Summary</th><td>";
  					$oFCKeditor = new FCKeditor('summary') ;
  					$oFCKeditor->Value = $summary;
  					$oFCKeditor->Create();
  					print "</td></tr>";
  				//PUBLISHING
  					print "<tr><th>Published</th>
              <td><select name='published'>";
  						if($published==1){
  							print "<option value='1' selected='selected'>Yes, publish the page</option>";	
  						}else{
  							print "<option value='1'>Yes, publish the page</option>";
  						}
  						if($published==0){
  							print "<option value='0' selected='selected'>No, do not publish this page yet</option>";
  						}else{
  							print "<option value='0'>No, do not publish this page yet</option>";
  						}
  					print "</select>
            </td></tr>";
  				//SUBMIT
  					print "<tr><th colspan='2' align='right'>
                <input type='submit' name='submitok' value='Save Article' onclick=\"clicked='submitok'\"/>
                <input type='submit' name='submitexitok' value='Save Article & Exit'  onclick=\"clicked='submitexitok'\"/></th></tr>
              </table>
              </form>
              </div></div>
                <script>new FormValidator ('create_news', {
                  onFormValidate: function(pass, form){ 
                    if(pass==true){
                      form.submitok.disabled=true;
                      form.submitexitok.disabled=true;
                    }
                  }
                });</script>";
    }
    /******************************************************************************************
		about
		******************************************************************************************/
    function about(){ 
      print "<div id='forms'><div id='content'>";
      print "<h1>News FAQ (Frequently Asked Questions)</h1>";
      print "<div id='about'>";
        print "<ul>";
          print "<li><a href='#1'>Should I enter a summary with my article?</a></li>";
          print "<li><a href='#2'>What is the publishing status of an article all about?</a></li>";
          print "<li><a href='#3'>How does the category of a news article effect the article?</a></li>";
          print "<li><a href='#4'>What does an RSS Feed have to do with anything?</a></li>";
          print "<li><a href='#5'>What is a category?</a></li>";
          print "<li><a href='#6'>What does an RSS Feed have to do with anything?</a></li>";
          print "<li><a href='#7'>Why can't I delete the general category?</a></li>";
          print "<hr noshade='noshade' />";
          //
          print "<a name='1'></a><li>Should I enter a summary with my article?";
            print "<p>The summary field is optional though if you leave it blank a summary will be automatically generated from the
            content you entered in the body field. All auto-generated summaries will have images and any other sort of formatting
            removed, so if you want to create a summary with certain formatting and images enter it yourself.</p>
            <p>Your rss feed automatically will use the summary field as the content that is displayed in the feed. For more information
            about that subject please look at the category section of the site</p>";
          print "</li>";
          //
           print "<a name='2'></a><li>What is the publishing status of an article all about?";
            print "<p>The publishing status of an article is a way for you to create news articles and make them not be seen
            by your visitors. Why would you want to do that? For many reasons, for example maybe you have a person designated
            to edit all articles for grammar and punctuation, before an article is pushed live.</p>";
          print "</li>";
          //
           print "<a name='3'></a><li>How does the category of a news article effect the article?";
            print "<p>Categories are a way of organizing your content into...categories. It also handles and generates your rss feeds
            that users can subscribe too to keep updated on your site.</p>";
          print "</li>";
          //
           print "<a name='4'></a><li>What does an RSS Feed have to do with anything?";
            print "<p>RSS is a family of web feed formats used to publish frequently updated digital content, such as blogs, news feeds or podcasts.</p>";
          print "</li>";
          //
          print "<a name='5'></a><li>What is a category?";
            print "<p>Categories are a way of organizing your content into...categories. It also handles and generates your rss feeds
            that users can subscribe too to keep updated on your site.</p>";
          print "</li>";
          //
           print "<a name='6'></a><li>What does an RSS Feed have to do with anything?";
            print "<p>RSS is a family of web feed formats used to publish frequently updated digital content, such as blogs, news feeds or podcasts.</p>";
          print "</li>";
           //
           print "<a name='7'></a><li>Why can't I delete the general category?";
            print "<p>The general category considers all content on the site to be under itself, so you will always have atleast one
            category to store files under.</p>";
          print "</li>";
        print "</ul>";
      print "</div></div></div>"; 
    }
    /******************************************************************************************
		process_create
		******************************************************************************************/
     function process_create_cat($user){
        //GRAB ALL THE INFORMATION FROM THE POST ACTION
  				$name = stripslashes($_REQUEST['name']);
				  $parent_id = $_REQUEST['parent'];
				//CREATE A UNIX TIMESTAMP
					$stamp = time();
					$date = gmdate("Y-m-d H:i:s", $stamp);
       	//INSERT INTO OUR NEWS OBJECT
	       	$sql = "INSERT INTO ".$this->config->db_prefix."_cat(name, parent_id) 
								   VALUES('$name', '$parent_id')";
					$results=$this->db->DB_Q_C($sql);
					$lastid = mysql_insert_id();
				//LOG THE ACTION
				  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 
								   VALUES('$date', '$user->user_id')";
					$results=$this->db->DB_Q_C($sql);
					$lastobjectid = mysql_insert_id();
				  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)
                  VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 2, $lastid, 1)";
          $results=$this->db->DB_Q_C($sql);
				//GENERATE THE FEED
				  $this->feeds($lastid);
        $ret_code = array(4,$lastid);
        return $ret_code;
    }
    /******************************************************************************************
		process_create
		******************************************************************************************/
     function process_create_comment($user){
        //GRAB ALL THE INFORMATION FROM THE POST ACTION
  				$name = stripslashes($_REQUEST['name']);
  				$comment = stripslashes($_REQUEST['comment']);
  				$date = stripslashes($_REQUEST['date']);
  				$news_id = stripslashes($_REQUEST['news_id']);
				//CREATE A UNIX TIMESTAMP
					$stamp = time();
					$date = gmdate("Y-m-d H:i:s", $stamp);
				//INSERT INTO OUR COMMENT TABLE
						$sql = "INSERT INTO ".$this->config->db_prefix."_news_comments(news_id, body, date, user_name) 
								VALUES
									('$news_id', \"".addslashes($comment)."\", '$date', \"".addslashes($name)."\")";
						$results = $db->DB_Q_C($sql);
      			$lastid = mysql_insert_id();
				//LOG THE ACTION
				  /*$sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 
								   VALUES('$date', '$user->user_id')";
					$results=$this->db->DB_Q_C($sql);
					$lastobjectid = mysql_insert_id();
				  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(user_id, object_id, module_id, record_id, action)
                  VALUES('".$user->user_id."', $lastobjectid, '".$this->id."', $lastid, 1)";
          $results=$this->db->DB_Q_C($sql);*/
				//GENERATE THE FEED
				  $this->feeds($lastid);
        $ret_code = array(1,$lastid);
        return $ret_code;
    }
    /******************************************************************************************
		feeds
		******************************************************************************************/
    function feeds($theid){
      $this->updateFeed($theid);
  		$ret_code = array(3,$theid);
  		return $ret_code;
    }
    /******************************************************************************************
		GET CHILDEREN CONTENT
		******************************************************************************************/
		function getChilderenContent($theid){
       $sql = "
          SELECT 
            *
          FROM 
            ".$this->config->db_prefix."_news, 
            ".$this->config->db_prefix."_cat, 
            ".$this->config->db_prefix."_logs, 
            ".$this->config->db_prefix."_object
          WHERE
            ".$this->config->db_prefix."_news.id = ".$this->config->db_prefix."_logs.record_id AND
            ".$this->config->db_prefix."_logs.module_id = ".$this->id." AND
            ".$this->config->db_prefix."_logs.object_id = ".$this->config->db_prefix."_object.id AND
            ".$this->config->db_prefix."_news.cat_id = $theid AND
            ".$this->config->db_prefix."_news.cat_id = ".$this->config->db_prefix."_cat.id AND
            ".$this->config->db_prefix."_news.published = 1 AND
            ".$this->config->db_prefix."_logs.action = 1
          ORDER BY create_date DESC";
        $results=$this->db->DB_Q_C($sql);
			  $count = mysql_affected_rows();
			  $xmlfile = "";
			  if($count>0){
          while($row = mysql_fetch_array($results)){
            $name = htmlspecialchars(stripslashes($row['title']));
    				$sum = htmlspecialchars(stripslashes($row['summary']));
    				$date = DateFormat($row['create_date'], $this->config->date_format);
    				$xmlfile .= "<item>
                      			<title>$name ~ $date</title>
                      			<description>$sum</description>
                      			<link>".$this->config->site_url.$this->config->rss_page."?theid=".$row[0]."</link>
                      		</item>";
          }
        }
        //GRAB FEEDS THAT ARE CATEGORIZED BELOW THIS ONE AND ALL THEIR CONTENT
  		    $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE parent_id = $theid";
  		    $results=$this->db->DB_Q_C($sql);
  			  $count = mysql_affected_rows();
  			  if($count>0){
  			   while($row = mysql_fetch_array($results)){
  			     $xmlfile.= $this->getChilderenContent($row[0]);
  			   }
  			  }
          
        return $xmlfile;
    }
    /******************************************************************************************
		UPDATE FEED
		******************************************************************************************/
		function updateFeed($theid){
		  //GRAB DATA ABOUT THIS FEED
			 $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE id = $theid";
			 $results=$this->db->DB_Q_C($sql);
			 $row = mysql_fetch_array($results);
			 $cat = $row['name'];
			 $parent_id = $row['parent_id'];
		  //GET FEED CONTENT FOR SPECIFIED ID
		    $xml = $this->getChilderenContent($theid);
			//UPDATE ALL FEEDS ABOVE THIS ONE, UNTIL WE REACH THE GENERAL FEED
			 if($parent_id>0){
        $this->updateFeed($parent_id);
       }
			//WRITE OUT THIS FEED
			 $xmlfile .= "<?xml version=\"1.0\" ?>
<rss version=\"2.0\">
	<channel>
		<title>".$this->config->site_title." ~ $cat</title>
		<description>".$this->config->site_description."</description>
		<link>".$this->config->site_url."</link>
		$xml
  </channel>
</rss>";
      //WRITE THE FILE OUT
  			$filename = "../".$this->config->file_dir."/rss/rss_".$theid.".xml";
  			$fh = fopen($filename, 'w+');
  			fwrite($fh, "$xmlfile");
  			fclose($fh);
		}
  }
?>
