<?php
	/******************************************************************************************
	  PERMISSION'S BREAK DOWN
	    [0] = OVERALL ACCESS TO THIS MODULE
	    [1] = CREATE A TEMPLATE
	    [2] = EDIT A TEMPLATE
	    [3] = DELETE A TEMPLATE
	    [4] = CREATE A PAGE
	    [5] = EDIT A PAGE
	    [6] = DELETE A PAGE
	    [7] = CREATE A BLOCK
	    [8] = EDIT A BLOCK
	    [9] = DELETE A BLOCK
	*******************************************************************************************  
	*******************************************************************************************
	  SUB-MODULE ID'S
	     1 - TEMPLATE
	     2 - PAGE
	     3 - BLOCK
	******************************************************************************************/
	class class_block{
		/******************************************************************************************
		CLASS VARIABLES
		******************************************************************************************/
		var $name;
		var $id;
		var $config;
		var $time;
		var $db;
		/******************************************************************************************
		class_projects - constructor, initialize all variables. 
		******************************************************************************************/
		function class_block($db, $cfg, $t){
		  //MODULE NAME
		    $this->name = "Blocks";
		  //STORE THE DATABASE
		    $this->db = $db;
      //STORE THE SITES CONFIG SETTINGS
		    $this->config = $cfg;
		  //STORE THE ID OF THIS MODULE
		    $sql = "SELECT * FROM ".$this->config->db_prefix."_modules WHERE name = 'class_block'";
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
		  //CREATE OUR MAIN INDEX PAGE
        $file = "index.php";
        $file_data = "<html><head><title>index.php</title></head><body>Quit Checking my booty out!</body></html>";
        if (!$handle = fopen($file, 'w+')) {
         echo "Cannot open file ($file)";
         exit;
        }
        $file = "index.php";
        if (!$handle = fopen($file, 'w+')) {
         echo "Cannot open file ($file)";
         exit;
        }
        if (fwrite($handle, $file_data) === FALSE) {
         echo "Cannot write to file ($file)";
         exit;
        }
        fclose($handle);
      //STORE OUR MODULE
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_modules` (name) VALUES ('class_block')";
  		  $results = $this->db->DB_Q_C($sql);
      	$lastid = mysql_insert_id();
      	$this->id = $lastid;
      //SET PERMISSIONS FOR OUR DEFAULT USER
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_perms` (user_id, module_id, perm) VALUES (1, $lastid, '1111111111')";
  		  $results = $this->db->DB_Q_C($sql);
		  //CREATE THE TABLE FOR THIS MODULE
		    //TEMPLATE TABLE
  		    $sql = "
            CREATE TABLE `".$this->config->db_prefix."_block_template` (
              `id` int(11) NOT NULL auto_increment,
              `name` varchar(200) NOT NULL default '',
              `body` text NOT NULL,
              PRIMARY KEY  (`id`)
            ) ENGINE=MyISAM ;";
    		  $results = $this->db->DB_Q_C($sql);
    		//PAGE TABLE
    		  $sql = "
            CREATE TABLE `".$this->config->db_prefix."_block_page` (
              `id` int(11) NOT NULL auto_increment,
              `title` text NOT NULL,
              `file_title` text NOT NULL,
              `parent_id` int(11) NOT NULL default '0',
              `template_id` int(11) NOT NULL default '0',
              PRIMARY KEY  (`id`)
            ) ENGINE=MyISAM ;";
    		  $results = $this->db->DB_Q_C($sql);
    		//BLOCK CONTENT TABLE
    		  $sql = "
            CREATE TABLE `".$this->config->db_prefix."_block_content` (
              `id` int(11) NOT NULL auto_increment,
              `name` text NOT NULL,
              `body` text NOT NULL,
              `search` int(1) NOT NULL default '0',
              PRIMARY KEY  (`id`),
              FULLTEXT KEY `full_index` (`name`,`body`)
            ) ENGINE=MyISAM ;";
    		  $results = $this->db->DB_Q_C($sql);
    		//BLOCK LIST TABLE
    		  $sql = "
            CREATE TABLE `".$this->config->db_prefix."_block_list` (
              `id` int(11) NOT NULL auto_increment,
              `block_id` int(11) NOT NULL,
              `page_id` int(11) NOT NULL,
              `template_block_id` int(11) NOT NULL,
              PRIMARY KEY  (`id`)
            ) ENGINE=MyISAM ;";
    		  $results = $this->db->DB_Q_C($sql);
    	//CREATE OUR DEFAULT TEMPLATE
    	  $sql = "INSERT INTO ".$this->config->db_prefix."_block_template(name, body) 
    					   VALUES('Home', \"<html>
<head>
<title></title>
</head>
<body>
<block id='0' name='Main_Header' description='This_is_the_main_header_block' perms='1'></block>
<block id='1' name='Main_Menu' description='This_is_the_main_menu_block' perms='1'></block>
<block id='2' name='Main_Content' description='This_is_the_main_content_block' perms='1'></block>
<block id='3' name='Main_Footer' description='This_is_the_main_footer_block' perms='1'></block>
</body>
</html>\")";
    		$results = $this->db->DB_Q_C($sql);
    		$template_id = mysql_insert_id();
    		//LOG INFORMATION
      		//STORE OUR OBJECT
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
      		  $results = $this->db->DB_Q_C($sql);
          	$object_id = mysql_insert_id();
      		//STORE OUR LOG INFO
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, 1, $this->id, 1, $template_id, 1)";
      		  $results = $this->db->DB_Q_C($sql);
    	//INSERT OUT CONTENT BLOCK FOR THE DEFAULT INDEX PAGE
    	  $sql = "INSERT INTO ".$this->config->db_prefix."_block_content(name, body) 
    					   VALUES('Header', 'Main Header of the site goes here'),
                        ('Menu', 'Main Menu of the site goes here'),
                        ('Content', 'Main Content of the site goes here'),
                        ('Footer', 'Main Footer of the site goes here')";
    		$results = $this->db->DB_Q_C($sql);
    		$blockid = mysql_insert_id();
    		for($i=1;$i<5;$i++){
          //LOG INFORMATION
        		//STORE OUR OBJECT
        		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
        		  $results = $this->db->DB_Q_C($sql);
            	$object_id = mysql_insert_id();
        		//STORE OUR LOG INFO
        		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, 1, $this->id, 3, $i, 1)";
              $results = $this->db->DB_Q_C($sql);
        }
    	//STORE THE INFORMATION ABOUT OUR DEFAULT INDEX PAGE
  		  $sql = "INSERT INTO `".$this->config->db_prefix."_block_page` (title, file_title, parent_id, template_id) VALUES ('Home Page', 'Home Page', '0', 1);";
  		  $results = $this->db->DB_Q_C($sql);
    		$pageid = mysql_insert_id();
    		//LOG INFORMATION
      		//STORE OUR OBJECT
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
      		  $results = $this->db->DB_Q_C($sql);
          	$object_id = mysql_insert_id();
      		//STORE OUR LOG INFO
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, 1, $this->id, 2, $pageid, 1)";
      		  $results = $this->db->DB_Q_C($sql);
  		//
    	  $sql = "INSERT INTO ".$this->config->db_prefix."_block_list(block_id, page_id, template_block_id) 
    					   VALUES('1', '$pageid', '0'),
                        ('2', '$pageid', '1'),
                        ('3', '$pageid', '2'),
                        ('4', '$pageid', '3')";
    		$results = $this->db->DB_Q_C($sql);
		}
		/******************************************************************************************
		create_page_form
		******************************************************************************************/
    function create_page_form($theid=0, $title="Page Title", $file_title="Page Title", $template_id="", $parent_page=0){
      print "
        <div id='forms'><div id='content'>
        <form id='create_page' name='create_page' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">
        <input type='hidden' name='the_action' value='submitok' />
        <input type='hidden' name='theid' id='theid' value='$theid' />";
          if($file_title==""){
            print "<input type='hidden' name='old_title' value='!!!!!!' />";
          }else{
            print "<input type='hidden' name='old_title' value='$file_title' />";
          }
        print "<input type='hidden' name='formprocess' value='yes' />
        <input type='hidden' name='old_parent_page' value='$parent_page' />
        <table width='100%' cellspacing='0' cellpadding='0'>
        <tr><th class='record_head' colspan='2'>Page Submission Form</th></tr>
        <tr><td colspan='2'>Please fill in required fields below and click <b>Save Page</b> to enter your page into the system.</td></tr>";
          //TITLE
  					print "<tr><th>Title</th>
            <td><input id='page_title' class='required PageExists' name='title' type='text' size='75' value=\"$title\" onchange=\"doAddress('".$this->config->site_url."');Validation.validate('proposedpage');\" /></td></tr>";
          //FILE NAME
  					print "<input id='file_title' name='file_title' type='hidden' value=\"$file_title\" />";
  				//ADDRESS PREVIEW
  				  print "<tr><th>Page Address Preview</th><td><input readonly='readonly' class='required validate-fileexists' size='100' type='text' id='proposedpage' name='proposedpage' value='".$this->config->site_url."' /></td></tr>";
  				//LOCATION
            if($theid==1){
            }else{
  				    print "<tr><th>Location</th><td>";
              //LIST OUT ALL PAGES THIS PAGE COULD BE A SUBPAGE UNDER
                $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page WHERE id!=$theid AND parent_id = 0 AND id>1 ORDER by id ASC";
                $results=$this->db->DB_Q_C($sql);
                //print "<input type='button' onclick=\"$('page_select').style='display:show;'\"; return false\" value='Choose A Location For This Page' />";
                //print "<div id='page_select' style='display:none;'>";
                print "<h1><a class='toolTipElement' title='Site Structure::Click to expand the site structure and choose a location for this page.' id='site_structure' href='#'>Site Structure &raquo;</a></h1>";
                print "<div id='page_select'>";
  				      $striper=!$striper;
                if($striper){
                  $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
                }else{
                  $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
                }
                print "<script>doAddress('".$this->config->site_url."');</script>
                <div $effect><input checked='checked' type='radio' name='parent_page' value='0' id='opt1' onchange=\"doAddress('".$this->config->site_url."');\"/><label for='opt1'><strong>".$this->config->site_url."</strong></label></div>";
                $depth = 1;
                while($row = mysql_fetch_array($results)){
                  $striper=!$striper;
                if($striper){
                  $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
                }else{
                  $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
                }
    				        if($parent_page==$row['id']){
    				          print "<div $effect>
    				                <script>doAddress('".$this->config->site_url.$row['file_title']."/');</script>
    				                    <input checked='checked' type='radio' name='parent_page' value='".$row['id']."' id='opt".$row['id']."' onchange=\"doAddress('".$this->config->site_url.$row['file_title']."/');\" />
    				                    ".$this->padImage($depth)."
                                <label for='opt".$row['id']."'>
                                ".$row['title']."
                                </label>
                            </div>";
    				        }else{
    				          print "<div $effect>
    				                    <input type='radio' name='parent_page' value='".$row['id']."' id='opt".$row['id']."'  onchange=\"doAddress('".$this->config->site_url.$row['file_title']."/');\"/>
                                ".$this->padImage($depth)."
                                <label for='opt".$row['id']."'>
                                ".$row['title']."
                                </label>
                            </div>"; 
                    }
                    $total_path = $row['file_title'];
                    $this->getChild($row['id'], $depth, $parent_page, $theid, $total_path, $striper);
  				      }
  				    print "</div>";
  				    print "<script defer='defer'>
                var formSlide = new Fx.Slide('page_select');
                $('site_structure').addEvent('click', function(e){
                  formSlide.toggle();
      						});
      						formSlide.hide();
              </script>";
              print "</td></tr>";
            }
          //TEMPLATE
            print "
            <tr><th>Template</th>
            <td><select id='template' name='template'>";
  				    $sql = "SELECT * FROM ".$this->config->db_prefix."_block_template ORDER BY name ASC";
              $results=$this->db->DB_Q_C($sql);
              while($row = mysql_fetch_array($results)){
    				    if($template_id==$row['id']){
                  print "<option selected='selected' value='".$row['id']."'>".$row['name']."</option>";
                }else{
                  print "<option value='".$row['id']."'>".$row['name']."</option>";
                }
              } 
  				  print "</select></td></tr>";
          //GRAB ALL BLOCKS FOR THIS PAGE
            print "<tr><th>Content Blocks</th><td>";
            print "<div id='log'>Loading Blocks...</div>";
            print "</td></tr>
                  <script>getBlocks(".$this->id.");</script>";
          //
            print "<tr><th colspan='2' align='right'><input type='submit' name='submitok_page' value='Save Page' onclick=\"clicked='submitok_page'\"/>
            <input type='submit' name='submitexitok_page' value='Save Page & Exit' onclick=\"clicked='submitexitok_page'\"/></th></tr>
            </table>
            </form>
            </div></div>
            <script defer='defer'>
              $('template').addEvent('change', function(e) {
              	e = new Event(e).stop();
                getBlocks(); //located in custom.js
              });
      		    new FormValidator ('create_page', {
                  onFormValidate: function(pass, form){ 
                    if(pass==true){
                      form.submitok_page.disabled=true;
                      form.submitexitok_page.disabled=true;
                    }
                  }
                });
      		    FormValidator.add('PageExists', {
              	errorMsg: 'A page by that name allready exists, please use a different name or select a different location.',
              	test: function(element) {
                  var http = createRequestObject();
                  http.open('post',  'includes/checkpageexsists.php', false);
        				  http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        				  var url= document.create_page.file_title.value+'/';
        				  for (i=0;i<document.create_page.parent_page.length;i++) {
                  	if (document.create_page.parent_page[i].checked) {
                  		var ppage = document.create_page.parent_page[i].value;
                  	}
                  }
        				  http.send('file='+url+'&parent_page='+ppage);
        				  if(http.responseText=='false'){
        				    //the file does not exist
                    return true;
                  }else if(http.responseText=='true'){
        				    //the file does exist, check to see if we are editing and the title is the same
        				    if(document.create_page.old_title.value==document.create_page.file_title.value){
                      return true;
        				    }else{
                      return false;
                    }
                  } 
              	}
              });
              function createRequestObject(){
              	var request_o; //declare the variable to hold the object.
              	var browser = navigator.appName; //find the browser name
              	if(browser == 'Microsoft Internet Explorer'){
              		/* Create the object using MSIE's method */
              		request_o = new ActiveXObject('Microsoft.XMLHTTP');
              	}else{
              		/* Create the object using other browser's method */
              		request_o = new XMLHttpRequest();
              	}
              	return request_o; //return the object
              }
      		  </script>";
    }
    /******************************************************************************************
		create_form - displays the form to create a news article
		******************************************************************************************/
    function create_block_form($theid=0, $title="", $body="", $search=""){
      print "
        <div id='forms'><div id='content'>
        <form id='create_block' name='create_block' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">
        <input type='hidden' name='the_action' value='submitok_block' />
        <input type='hidden' name='theid' value='$theid' />";
        print "<input type='hidden' name='formprocess' value='yes' />
        <table width='100%' cellspacing='0' cellpadding='0'>
        <tr><th class='record_head' colspan='2'>Block Submission Form</th></tr>
        <tr><td colspan='2'>Please fill in required fields below and click <b>Save Block</b> to enter your block into the system.</td></tr>";
          //TITLE
  					print "<tr><th>Title</th>
            <td><input id='page_title' class='required' name='title' type='text' size='75' value=\"$title\" /></td></tr>";
  				//BODY
  					print "<tr><th>Body</th><td>";
  					$oFCKeditor = new FCKeditor('body');
  					$oFCKeditor->Value = $body;
  					$oFCKeditor->Create() ;
  					print "</td></tr>";
  				//SEARCHABLE
  				  print "<tr><th>Search</th><td>
            <select name='search'>";
            if($search==1){
              print "<option value='1' selected='selected'>Yes I would like this block to be searchable.</option>";
              print "<option value='0'>No I do not want this block to be searchable.</option>";
            }else if($search==0){
              print "<option value='1'>Yes I would like this block to be searchable.</option>";
              print "<option value='0' selected='selected'>No I do not want this block to be searchable.</option>";
            }
            print "</select></td></tr>";
  				//
            print "<tr><th colspan='2' align='right'><input type='submit' name='submitok_block' value='Save Block' onclick=\"clicked='submitok_block'\"/>
            <input type='submit' name='submitexitok_block' value='Save Block & Exit' onclick=\"clicked='submitexitok_block'\"/></th></tr>
            </table>
            </form>
            </div></div>
            <script defer='defer'>
      		    new FormValidator ('create_block', {
                  onFormValidate: function(pass, form){ 
                    if(pass==true){
                      form.submitok_block.disabled=true;
                      form.submitexitok_block.disabled=true;
                    }
                  }
                });
      		  </script>";
    }
    /******************************************************************************************
		getChild
		******************************************************************************************/
    function getChild($parent, $depth, $page_check, $theid, $total_path, $striper){
      $depth++;
      $tmpval = $depth*10;
      $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page WHERE id!=$theid AND parent_id = ".$parent." ORDER by id ASC";
      $results=$this->db->DB_Q_C($sql);
      $count = mysql_affected_rows();
      if($count>0){
        while($row = mysql_fetch_array($results)){
          $striper=!$striper;
            if($striper){
              $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
            }else{
              $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
            }
          //SEE IF THIS PAGE HAS ANY CHILDEREN
	          $sql = "SELECT COUNT(*) FROM ".$this->config->db_prefix."_block_page WHERE parent_id = ".$row[0];
            $results1=$this->db->DB_Q_C($sql);
            $row1 = mysql_fetch_array($results1);
            if($row1[0]>0){
              $button = "<input type='button' onclick=\"$('parent_".$row[0]."').toggle();if(this.value=='+'){this.value='-';}else{this.value='+';} return false\" value='+' />";
            
              $button = "";
              }else{
              $button = "";
            }
          if($page_check==$row['id']){
            //print "<div $effect style='padding-left:".$tmpval."px'>
            print "<div $effect>
    				                <script>doAddress('".$this->config->site_url.$total_path."/".$row['file_title']."/');</script>
	                    <input checked='checked' type='radio' name='parent_page' value='".$row['id']."' id='opt".$row['id']."' onchange=\"doAddress('".$this->config->site_url.$total_path."/".$row['file_title']."/');Validation.validate('proposedpage');\" />
                      ".$this->padImage($depth)."
                      <label  for='opt".$row['id']."'>
                      ".$row['title']."
                      </label>
                      $button
                  </div>";
          }else{
            //print "<div $effect style='padding-left:".$tmpval."px'>
            print "<div $effect>
	                  <input type='radio' name='parent_page' value='".$row['id']."' id='opt".$row['id']."' onchange=\"doAddress('".$this->config->site_url.$total_path."/".$row['file_title']."/');Validation.validate('proposedpage');\" />
                    ".$this->padImage($depth)."
                    <label for='opt".$row['id']."'>
                    ".$row['title']."
                    </label>
                    $button
                  </div>";
          }
          $tmp  = $total_path."/".$row['file_title'];
          $this->getChild($row['id'], $depth, $page_check, $theid, $tmp, $striper);
        }
      }
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
		create_template_form
		******************************************************************************************/
    function create_template_form($theid=0, $title="", $body=""){
      print "<div id='forms'><div id='content'>
        <form id='create_template' name='create_template' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">
        <input type='hidden' name='the_action' value='submitok_template' />
        <input type='hidden' name='formprocess' value='yes' />
        <table width='100%' cellspacing='0' cellpadding='0'>
        <input type='hidden' name='theid' value='$theid' />
        <tr><th class='record_head' colspan='2'>Template Submission Form</th></tr>
        <tr><td colspan='2'>Please fill in required fields below and click <b>Save Template</b> to save your template.</td></tr>";
          //TITLE
  					print "<tr><th>Title</th>
            <td><input class='required' name='title' type='text' size='75' value=\"$title\" /></td></tr>";
  				//BODY
  					print "<tr><th>Body</th><td>
              <textarea id='myCpWindow' class='codepress php linenumbers-on' name='body' rows='50'>$body</textarea>";
  					print "</td></tr>";
            print "<tr><th colspan='2' align='right'>
              <input type='submit' name='submitok_template' value='Save Template' onclick=\"myCpWindow.toggleEditor();clicked='submitok_template';\" />
              <input type='submit' name='submitexitok_template' value='Save Template & Exit'  onclick=\"myCpWindow.toggleEditor();clicked='submitexitok_template';\" /></th></tr>
            </table>
            </form>
            </div></div>
        <script>new FormValidator ('create_template', {
                  onFormValidate: function(pass, form){ 
                    if(pass==true){
                      form.submitok_template.disabled=true;
                      form.submitexitok_template.disabled=true;
                    }
                  }
                });</script>";
    }
    /******************************************************************************************
		display_create_page
		******************************************************************************************/
    function display_create_page(){
      $this->create_page_form();
    }
    /******************************************************************************************
		display_create_template
		******************************************************************************************/
    function display_create_template(){
      $this->create_template_form();
    }
    /******************************************************************************************
		display_create_block
		******************************************************************************************/
    function display_create_block(){
      $this->create_block_form();
    }
    /******************************************************************************************
		display_edit_template
		******************************************************************************************/
    function display_edit_template($theid, $ret_code=0){
      //DISPLAY ANY MESSAGES IF NECCESARY
        if($ret_code==0){
        }else if($ret_code==1){
          print "<div id='records'><table width='100%'>
          <tr><th class='notice_record_head'>The template has been saved.</th></tr>
          </table></div>";
        }
      //GRAB OUR TEMPLATE
        $sql = "SELECT * FROM ".$this->config->db_prefix."_block_template WHERE
                ".$this->config->db_prefix."_block_template.id = $theid LIMIT 1";
        $result=$this->db->DB_Q_C($sql);
        $row = mysql_fetch_array($result);
      //DISPLAY FORM WITH POPULATED INFO
        $this->create_template_form($theid, stripslashes($row['name']), stripslashes($row['body']));
    }
    /******************************************************************************************
		display_edit_block
		******************************************************************************************/
    function display_edit_block($theid, $ret_code=0){
      //DISPLAY ANY MESSAGES IF NECCESARY
        if($ret_code==0){
        }else if($ret_code==1){
          print "<div id='records'><table width='100%'>
          <tr><th class='notice_record_head'>The block has been saved.</th></tr>
          </table></div>";
        }
      //GRAB OUR BLOCK
        $sql = "SELECT * FROM ".$this->config->db_prefix."_block_content WHERE
                ".$this->config->db_prefix."_block_content.id = $theid LIMIT 1";
        $result=$this->db->DB_Q_C($sql);
        $row = mysql_fetch_array($result);
      //DISPLAY FORM WITH POPULATED INFO
        $this->create_block_form($theid, stripslashes($row['name']), stripslashes($row['body']), $row['search']);
    }
    /******************************************************************************************
		display_edit_page
		******************************************************************************************/
    function display_edit_page($theid, $ret_code=0){
      //DISPLAY ANY MESSAGES IF NECCESARY
        if($ret_code==0){
        }else if($ret_code==1){
          print "<div id='records'><table width='100%'>
          <tr><th class='notice_record_head'>The page has been saved.</th></tr>
          </table></div>";
        }
      //GRAB OUR PAGE
        $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page WHERE
                ".$this->config->db_prefix."_block_page.id = $theid LIMIT 1";
        $result=$this->db->DB_Q_C($sql);
        $row = mysql_fetch_array($result);
      //DISPLAY FORM WITH POPULATED INFO
        $this->create_page_form($theid, stripslashes($row['title']), stripslashes($row['file_title']), $row['template_id'], $row['parent_id']);
    }
    /******************************************************************************************
		display_delete_page
		******************************************************************************************/
    function display_delete_page($user, $theid){
      if($theid==1){
        //SPECIAL CASE FOR OUT INDEX PAGE, WE DO NOT WANT TO EVER DELETE IT
      }else{
        print "<div id='forms'><div id='content'>
          <table cellpadding='0' cellspacing='0' width='100%'>
          <tr><th class='record_head' colspan='2'>Delete Page?</th></tr>
          <tr><td colspan='2'><div id='error'>If this page has any childeren they will be removed from the system as well</div></td></tr>
          <tr><td>
          <form method='post' id='delete_page' action='' onSubmit=\"this.the_action.value=clicked;\">
          <input type='hidden' name='the_action' value='submitok' />
          <input type='hidden' name='formprocess' value='yes' />
          <input type='hidden' name='theid' value='$theid' />
          <select name='choice' class='required'>
          <option value='no'>No, do not delete the page</option>
          <option value='yes'>Yes, delete the page</option>
          </select>
          <input type='submit' name='submitexitok_page' value='Submit' onclick=\"clicked='submitexitok_page'\" />
          </form>
          </table>
          </div></div>
          <script>new FormValidator ('delete_page', {
            onFormValidate: function(pass, form){ 
              if(pass==true){
                form.submitexitok_page.disabled=true;
              }
            }
          });</script>";
      }
    }
    /******************************************************************************************
		display_delete_template
		******************************************************************************************/
    function display_delete_template($user, $theid){
        print "<div id='forms'><div id='content'>
          <table cellpadding='0' cellspacing='0' width='100%'>
          <tr><th class='record_head' colspan='2'>Delete Template?</th></tr>
          <tr><td>
          <form method='post' id='delete_template' action='' onSubmit=\"this.the_action.value=clicked;\">
          <input type='hidden' name='the_action' value='submitok' />
          <input type='hidden' name='formprocess' value='yes' />
          <input type='hidden' name='theid' value='$theid' />
          <select name='choice' class='required'>
          <option value='no'>No, do not delete the template</option>
          <option value='yes'>Yes, delete the template</option>
          </select>
          <input type='submit' name='submitexitok_template' value='Submit' onclick=\"clicked='submitexitok_template'\" />
          </form>
          </table>
          </div></div>
          <script>new FormValidator ('delete_template', {
            onFormValidate: function(pass, form){ 
              if(pass==true){
                form.submitexitok_template.disabled=true;
              }
            }
          });</script>";
    }
    /******************************************************************************************
		display_delete_template
		******************************************************************************************/
    function display_delete_block($user, $theid){
        print "<div id='forms'><div id='content'>
          <table cellpadding='0' cellspacing='0' width='100%'>
          <tr><th class='record_head' colspan='2'>Delete Block?</th></tr>
          <tr><td>
          <form method='post' id='delete_block' action='' onSubmit=\"this.the_action.value=clicked;\">
          <input type='hidden' name='the_action' value='submitok' />
          <input type='hidden' name='formprocess' value='yes' />
          <input type='hidden' name='theid' value='$theid' />
          <select name='choice' class='required'>
          <option value='no'>No, do not delete the block</option>
          <option value='yes'>Yes, delete the block</option>
          </select>
          <input type='submit' name='submitexitok_block' value='Submit' onclick=\"clicked='submitexitok_block'\" />
          </form>
          </table>
          </div></div>
          <script>new FormValidator ('delete_block', {
            onFormValidate: function(pass, form){ 
              if(pass==true){
                form.submitexitok_block.disabled=true;
              }
            }
          });</script>";
    }
    /******************************************************************************************
		getParentName
		******************************************************************************************/
    function getParentName($parent_page){
      $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page WHERE id = $parent_page";
      $results=$this->db->DB_Q_C($sql);
      $row = mysql_fetch_array($results);
      if(mysql_affected_rows()>0){
        $tmp.= $row['file_title']."/";
        if($row['parent_id']!=0){
          $tmp.= $this->getParentname($row['parent_id']);
        }
      }
      return $tmp;
    }
    /******************************************************************************************
		process_create
		******************************************************************************************/
     function process_create_page($user){
      //RETURN CODE - SUCCESS
        $ret_code = array(1,0);
      //GRAB ALL THE INFORMATION FROM THE POST ACTION
      	$title = stripslashes($_REQUEST['title']);
      	//STRING SHOULD ALLREADY BE CLEAN FROM JAVASCRIPT, BUT JUST IN CASE CLEAN IT WITH PHP
      	$file_title = rtrim(stripslashes(cleanstr($_REQUEST['file_title'])));	
      	$template = $_REQUEST['template'];
      	$parent_page = $_REQUEST['parent_page'];
      	$block_count = $_REQUEST['block_count'];
      //CREATE A UNIX TIMESTAMP
      	$stamp = time();
      	$date = gmdate("Y-m-d H:i:s", $stamp);
      //CONSTRUCT THE FILEPATH
        $tmp_array = explode("/",$this->getParentName($parent_page));
        $depth = 0;
        for($i=count($tmp_array)-2;$i>=0;$i--){
          //echo $tmp_array[$i]."<br/>";
          $tmp_path.= $tmp_array[$i]."/";
          $depth++;
        }
        $file_path = "../$tmp_path$file_title";
        //echo $file_path;
      //INSERT INTO OUR PAGE OBJECT
       	$sql = "INSERT INTO ".$this->config->db_prefix."_block_page(title, file_title, parent_id, template_id) 
    					   VALUES(\"$title\", '$file_title', '$parent_page','$template')";
    		$results=$this->db->DB_Q_C($sql);
    		$lastid = mysql_insert_id();
    		$ret_code[1] = $lastid;
      		//STORE OUR OBJECT
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
      		  $results = $this->db->DB_Q_C($sql);
          	$object_id = mysql_insert_id();
      		//STORE OUR LOG INFO
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, $user->user_id, $this->id, 2, $lastid, 1)";
      		  $results = $this->db->DB_Q_C($sql);
    	//LOAD UP OUR TEMPLATE AND STICK THE USER DATA IN IT
      	$sql = "SELECT * FROM ".$this->config->db_prefix."_block_template WHERE id = $template";
    		$results=$this->db->DB_Q_C($sql);
    		$row = mysql_fetch_array($results);
    		$template_body = $this->strip_attributes($row['body'], "block", array());
      //CREATE ALL OF OUR CONTENT BLOCKS
        $replacements = array();
        $pattern = array();
        for($i=0;$i<$block_count;$i++){
          $name = "text_block_".$i;
          $block_id = $_REQUEST[$name];
          if($block_id!=""){
      			//INSERT INTO OUR LIST
      			  $sql = "INSERT INTO ".$this->config->db_prefix."_block_list(block_id, page_id, template_block_id) 
      					   VALUES('$block_id', '$lastid', '$i')";
      				$results=$this->db->DB_Q_C($sql);
      			//GRAB THE CONTENT OF THIS BLOCK
      			  $sql = "SELECT * FROM ".$this->config->db_prefix."_block_content WHERE id = $block_id";
      			  $results=$this->db->DB_Q_C($sql);
      			  $tmp = mysql_affected_rows();
      			  if($tmp>0){
      		      $row = mysql_fetch_array($results);
              }
      		  //
      		    $pattern[$i] = "/<block>(.|\s)*?<\/block>/";
      		    $replacements[$i] = stripslashes($row['body']);
          }
        }
    	//REPLACE OUR [TITLE] KEYWORD
    		$template_body = str_replace("[TITLE]", $title, $template_body);
      //REPLACE OUR [DEPTH] KEYWORD
        $retval = "";
    	  for($i=0;$i<=$depth;$i++){
    			$retval.= "../";
    		}
    		$template_body = str_replace("[DEPTH]", $retval, $template_body);
      //REPLACE OUR BLOCKS WITH THE CONENT BLOCKS
    		$file_data = preg_replace($pattern, $replacements, $template_body, 1);
      //CREATE THE FOLDER
         mkdir($file_path,0777);
      //CREATE THE INDEX PAGE
         $file = "$file_path/index.php";
         if (!$handle = fopen($file, 'w+')) {
      		 echo "Cannot open file ($file)";
      		 exit;
         }
         if (fwrite($handle, $file_data) === FALSE) {
      	   echo "Cannot write to file ($file)";
      	   exit;
         }
        fclose($handle);
      return $ret_code;
    }
    /******************************************************************************************
		strip_attributes
		******************************************************************************************/
    function strip_attributes($msg, $tag, $attr, $suffix = ""){
      $lengthfirst = 0;
      while (strstr(substr($msg, $lengthfirst), "<$tag ") != ""){
        $tag_start = $lengthfirst + strpos(substr($msg, $lengthfirst), "<$tag ");
        $partafterwith = substr($msg, $tag_start);
        $img = substr($partafterwith, 0, strpos($partafterwith, ">") + 1);
        $img = str_replace(" =", "=", $img);
        $out = "<$tag";
        for($i=0; $i < count($attr); $i++){
          if (empty($attr[$i])) {
            continue;
          }
          $long_val =
            (strpos($img, " ", strpos($img, $attr[$i] . "=")) === FALSE) ?
            strpos($img, ">", strpos($img, $attr[$i] . "=")) - (strpos($img, $attr[$i] . "=") + strlen($attr[$i]) + 1) :
            strpos($img, " ", strpos($img, $attr[$i] . "=")) - (strpos($img, $attr[$i] . "=") + strlen($attr[$i]) + 1);
            $val = substr($img, strpos($img, $attr[$i] . "=" ) + strlen($attr[$i]) + 1, $long_val);
          if (!empty($val)) {
            $out .= " " . $attr[$i] . "=" . $val;
          }
        }
        if (!empty($suffix)) {
          $out .= " " . $suffix;
        }
        $out .= ">";
        $partafter = substr($partafterwith, strpos($partafterwith,">") + 1);
        $msg = substr($msg, 0, $tag_start). $out. $partafter;
        $lengthfirst = $tag_start + 3;
      }
      return $msg; 
    }
    /******************************************************************************************
		process_rebuild_all_pages
		******************************************************************************************/
    function process_rebuild_all_pages(){
      $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page";
    	$results=$this->db->DB_Q_C($sql);
    	while($row = mysql_fetch_array($results)){
        $this->process_rebuild_page($row[0]);
      }
    }
    /******************************************************************************************
		process_edit_page
		******************************************************************************************/
     function process_rebuild_page($theid){
      //SET THE RETURN CODE TO SUCCESS, AND THE ID
        $ret_code = array(1, $theid);
      //GRAB ALL THE INFORMATION 
        $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page WHERE id = $theid";
    		$results=$this->db->DB_Q_C($sql);
    		$row = mysql_fetch_array($results);
      	$title = stripslashes($row['title']);
      	//STRING SHOULD ALLREADY BE CLEAN FROM JAVASCRIPT, BUT JUST IN CASE CLEAN IT WITH PHP
      	$file_title = stripslashes($row['file_title']);
      	$template = $row['template_id'];
      	$parent_page = $row['parent_id'];
      //CREATE A UNIX TIMESTAMP
      	$stamp = time();
      	$date = gmdate("Y-m-d H:i:s", $stamp);
      //LOAD UP OUR TEMPLATE AND STICK THE USER DATA IN IT
      	$sql = "SELECT * FROM ".$this->config->db_prefix."_block_template WHERE id = $template";
    		$results=$this->db->DB_Q_C($sql);
    		$row = mysql_fetch_array($results);
    		$template_body = $this->strip_attributes($row['body'], "block", array());
      //CREATE ALL OF OUR CONTENT BLOCKS
        $replacements = array();
        $pattern = array();
			  $sql = "SELECT * FROM ".$this->config->db_prefix."_block_list WHERE page_id = $theid ORDER BY template_block_id ASC";
			  $results=$this->db->DB_Q_C($sql);
			  $i = 0;
			  while($row = mysql_fetch_array($results)){
			    $sql = "SELECT * FROM ".$this->config->db_prefix."_block_content WHERE id = ".$row['block_id'];
			    $results1=$this->db->DB_Q_C($sql);
			    $row1 = mysql_fetch_array($results1);
          $pattern[$i] = "/<block>(.|\s)*?<\/block>/";
    		  $replacements[$i] = stripslashes($row1['body']);
    		  $i++;
        }
      //SET UP OUR FILE INFO
        //SPECIAL CASE FOR OUR MAIN INDEX PAGE
        if($theid==1){
        	//REPLACE OUR [TITLE] KEYWORD
        		$template_body = str_replace("[TITLE]", $title, $template_body);
          //REPLACE OUR [DEPTH] KEYWORD
            $retval = "";
        		$template_body = str_replace("[DEPTH]", $retval, $template_body);
        	//
        		$file_data = preg_replace($pattern, $replacements, $template_body, 1);
          //CREATE THE INDEX PAGE
            $file = "../index.php";
          //
          	//if(file_exists($file)){
              if (!$handle = fopen($file, 'w+')) {
            		 //display error message, since this function is called with a header, the page will not display correctly
            		 //echo "Cannot open file ($file)";
            		 exit;
               }
               if (fwrite($handle, $file_data) === FALSE) {
            		 //display error message, since this function is called with a header, the page will not display correctly
            	   //echo "Cannot write to file ($file)";
            	   exit;
               }
               fclose($handle); 
            //}else{
              
           // }
        }else{
          //CONSTRUCT THE FILEPATH
            $tmp_array = explode("/",$this->getParentName($parent_page));
            $depth = 0;
            for($i=count($tmp_array)-2;$i>=0;$i--){
              $tmp_path.= $tmp_array[$i]."/";
              $depth++;
            }
            $file_path = "../$tmp_path$file_title";
        	  $file = "$file_path/index.php";
        	//REPLACE OUR [TITLE] KEYWORD
        		$template_body = str_replace("[TITLE]", $title, $template_body);
        	//REPLACE OUR [DEPTH] KEYWORD
            $retval = "";
        	  for($i=0;$i<=$depth;$i++){
        			$retval.= "../";
        		}
        		$template_body = str_replace("[DEPTH]", $retval, $template_body);
        	//
        		$file_data = preg_replace($pattern, $replacements, $template_body, 1);
        	//CHECK THE DIRECTORY TO SEE IF IT EXISTS
        	 if(!file_exists($file_path)){
            //DIRECTORY DOES NOT EXIST SO CREATE IT
              mkdir($file_path, 0777);
           }
          //CREATE THE INDEX PAGE
           if (!$handle = fopen($file, 'w+')) {
        		 //display error message, since this function is called with a header, the page will not display correctly
        		 //echo "Cannot open file ($file)";
        		 exit;
           }
           if (fwrite($handle, $file_data) === FALSE) {
        		 //display error message, since this function is called with a header, the page will not display correctly
        	   //echo "Cannot write to file ($file)";
        	   exit;
           }
           fclose($handle);
        }
      //UPDATE OUR PAGE OBJECT
        $sql = "UPDATE ".$this->config->db_prefix."_block_page
                SET title = \"$title\", file_title = '$file_title', template_id = '$template', parent_id = '$parent_page'
                WHERE id = $theid";
        $results=$this->db->DB_Q_C($sql);
      return $ret_code;
     }
    /******************************************************************************************
		process_edit_page
		******************************************************************************************/
     function process_edit_page($user, $theid){
      //SET THE RETURN CODE TO SUCCESS, AND THE ID
        $ret_code = array(1, $theid);
      //GRAB ALL THE INFORMATION FROM THE POST ACTION
      	$title = stripslashes($_REQUEST['title']);
      	//STRING SHOULD ALLREADY BE CLEAN FROM JAVASCRIPT, BUT JUST IN CASE CLEAN IT WITH PHP
      	$file_title = rtrim(stripslashes(cleanstr($_REQUEST['file_title'])));
      	$template = stripslashes($_REQUEST['template']);
      	$parent_page = $_REQUEST['parent_page'];
      	$old_parent_page = $_REQUEST['old_parent_page'];
      	$old_title = rtrim(stripslashes(cleanstr($_REQUEST['old_title'])));
      	$block_count = $_REQUEST['block_count'];
      //CREATE A UNIX TIMESTAMP
      	$stamp = time();
      	$date = gmdate("Y-m-d H:i:s", $stamp);
      //LOAD UP OUR TEMPLATE AND STICK THE USER DATA IN IT
      	$sql = "SELECT * FROM ".$this->config->db_prefix."_block_template WHERE id = $template";
    		$results=$this->db->DB_Q_C($sql);
    		$row = mysql_fetch_array($results);
    		$template_body = $this->strip_attributes($row['body'], "block", array());
    	//REMOVE ALL BLOCKS IN OUR LIST
        $sql = "DELETE FROM ".$this->config->db_prefix."_block_list WHERE page_id = $theid";     
				$results=$this->db->DB_Q_C($sql);
      //CREATE ALL OF OUR CONTENT BLOCKS
        $replacements = array();
        $pattern = array();
        for($i=0;$i<$block_count;$i++){
          $name = "text_block_".$i;
          $block_id = $_REQUEST[$name];
    			//INSERT INTO OUR LIST
    			  $sql = "INSERT INTO ".$this->config->db_prefix."_block_list(block_id, page_id, template_block_id) 
    					   VALUES('$block_id', '$theid', '$i')";
    				$results=$this->db->DB_Q_C($sql);
    			//GRAB THE CONTENT OF THIS BLOCK
    			  $sql = "SELECT * FROM ".$this->config->db_prefix."_block_content WHERE id = $block_id";
    			  $results=$this->db->DB_Q_C($sql);
    		    $row = mysql_fetch_array($results);
    		  //
    		    $pattern[$i] = "/<block>(.|\s)*?<\/block>/";
    		    $replacements[$i] = stripslashes($row['body']);
        }
      //SET UP OUR FILE INFO
        //SPECIAL CASE FOR OUR MAIN INDEX PAGE
        if($theid==1){
        	//REPLACE OUR [TITLE] KEYWORD
        		$template_body = str_replace("[TITLE]", $title, $template_body);
          //REPLACE OUR [DEPTH] KEYWORD
            $retval = "";
        		$template_body = str_replace("[DEPTH]", $retval, $template_body);
        	//
        		$file_data = preg_replace($pattern, $replacements, $template_body, 1);
          //CREATE THE INDEX PAGE
            $file = "../index.php";
           if (!$handle = fopen($file, 'w+')) {
        		 //display error message, since this function is called with a header, the page will not display correctly
        		 echo "Cannot open file ($file)";
        		 exit;
           }
           if (fwrite($handle, $file_data) === FALSE) {
        		 //display error message, since this function is called with a header, the page will not display correctly
        	   echo "Cannot write to file ($file)";
        	   exit;
           }
           fclose($handle); 
        }else{
          //CONSTRUCT THE FILEPATH
            $tmp_array = explode("/",$this->getParentName($parent_page));
            $depth = 0;
            for($i=count($tmp_array)-2;$i>=0;$i--){
              $tmp_path.= $tmp_array[$i]."/";
              $depth++;
            }
            $file_path = "../$tmp_path$file_title";
        	  $file = "$file_path/index.php";
        	//REPLACE OUR [TITLE] KEYWORD
        		$template_body = str_replace("[TITLE]", $title, $template_body);
        	//REPLACE OUR [DEPTH] KEYWORD
            $retval = "";
        	  for($i=0;$i<=$depth;$i++){
        			$retval.= "../";
        		}
        		$template_body = str_replace("[DEPTH]", $retval, $template_body);
        	//
        		$file_data = preg_replace($pattern, $replacements, $template_body, 1);
        	//CONSTRUCT THE FILEPATH
        	  $tmp_path = "";
            $tmp_array = explode("/",$this->getParentName($old_parent_page));
            for($i=count($tmp_array)-2;$i>=0;$i--){
              $tmp_path.= $tmp_array[$i]."/";
            }
            $old_file_path = "../$tmp_path$old_title";
          	$old_file = "$old_file_path/index.php";
          //RENAME IF THE TITLE HAS CHANGED, OR IF THE FOLDER HAS BEEN MOVED
            if($old_title!=$file_title || $old_parent_page!=$parent_page){
              rename($old_file_path, $file_path);
            }
          //CREATE THE INDEX PAGE
           if (!$handle = fopen($file, 'w+')) {
        		 //display error message, since this function is called with a header, the page will not display correctly
        		 echo "Cannot open file ($file)";
        		 exit;
           }
           if (fwrite($handle, $file_data) === FALSE) {
        		 //display error message, since this function is called with a header, the page will not display correctly
        	   echo "Cannot write to file ($file)";
        	   exit;
           }
           fclose($handle);
        }
      //UPDATE OUR PAGE OBJECT
        $sql = "UPDATE ".$this->config->db_prefix."_block_page
                SET title = \"$title\", file_title = '$file_title', template_id = '$template', parent_id = '$parent_page'
                WHERE id = $theid";
        $results=$this->db->DB_Q_C($sql);
      		//STORE OUR OBJECT
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
      		  $results = $this->db->DB_Q_C($sql);
          	$object_id = mysql_insert_id();
      		//STORE OUR LOG INFO
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, $user->user_id, $this->id, 2, $theid, 2)";
            $results = $this->db->DB_Q_C($sql);
      return $ret_code;
    }
    /******************************************************************************************
		process_create_template
		******************************************************************************************/
     function process_create_template($user){
      //RETURN CODE - SUCCESS
        $ret_code = array(1,0);
      //GRAB ALL THE INFORMATION FROM THE POST ACTION
      	$title = stripslashes($_REQUEST['title']);
      	$body = stripslashes($_REQUEST['body']);
      //CREATE A UNIX TIMESTAMP
      	$stamp = time();
      	$date = gmdate("Y-m-d H:i:s", $stamp);
     	//INSERT
       	$sql = "INSERT INTO ".$this->config->db_prefix."_block_template(name, body) 
    					   VALUES('".addslashes($title)."', '".addslashes($body)."')";
    		$results=$this->db->DB_Q_C($sql);
    		$lastid = mysql_insert_id();
    		$ret_code[1] = $lastid;
      		//STORE OUR OBJECT
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
      		  $results = $this->db->DB_Q_C($sql);
          	$object_id = mysql_insert_id();
      		//STORE OUR LOG INFO
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, $user->user_id, $this->id, 1, $lastid, 1)";
      		  $results = $this->db->DB_Q_C($sql);
      return $ret_code;
    }
    /******************************************************************************************
		process_create_block
		******************************************************************************************/
     function process_create_block($user){
      //RETURN CODE - SUCCESS
        $ret_code = array(1,0);
      //GRAB ALL THE INFORMATION FROM THE POST ACTION
      	$title = stripslashes($_REQUEST['title']);
      	$body = stripslashes($_REQUEST['body']);
      	$search = stripslashes($_REQUEST['search']);
      //CREATE A UNIX TIMESTAMP
      	$stamp = time();
      	$date = gmdate("Y-m-d H:i:s", $stamp);
     	//INSERT
       	$sql = "INSERT INTO ".$this->config->db_prefix."_block_content(name, body, search) 
    					   VALUES('".addslashes($title)."', '".addslashes($body)."', $search)";
    		$results=$this->db->DB_Q_C($sql);
    		$lastid = mysql_insert_id();
    		$ret_code[1] = $lastid;
      		//STORE OUR OBJECT
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
      		  $results = $this->db->DB_Q_C($sql);
          	$object_id = mysql_insert_id();
      		//STORE OUR LOG INFO
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, $user->user_id, $this->id, 3, $lastid, 1)";
      		  $results = $this->db->DB_Q_C($sql);
      return $ret_code;
    }
    /******************************************************************************************
		process_edit_template
		******************************************************************************************/
     function process_edit_template($user, $theid){
      //RETURN CODE - SUCCESS
        $ret_code = array(1,0);
      //GRAB ALL THE INFORMATION FROM THE POST ACTION
      	$title = stripslashes($_REQUEST['title']);
      	$body = stripslashes($_REQUEST['body']);
      //CREATE A UNIX TIMESTAMP
      	$stamp = time();
      	$date = gmdate("Y-m-d H:i:s", $stamp);
     	//INSERT
       	$sql = "UPDATE ".$this->config->db_prefix."_block_template SET name = '".addslashes($title)."', body = '".addslashes($body)."' WHERE id = $theid";
    		$results=$this->db->DB_Q_C($sql);
    		$ret_code[1] = $theid;
      		//STORE OUR OBJECT
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
      		  $results = $this->db->DB_Q_C($sql);
          	$object_id = mysql_insert_id();
      		//STORE OUR LOG INFO
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, $user->user_id, $this->id, 1, $theid, 2)";
      		  $results = $this->db->DB_Q_C($sql);
    	//UPDATE ALL PAGES THAT USE THIS TEMPLATE
    	  $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page WHERE template_id = $theid";
    	  $results=$this->db->DB_Q_C($sql);
    	  if(mysql_affected_rows()>0){
      	  while($row = mysql_fetch_array($results)){
            $this->process_rebuild_page($row['id']);
          }
        }
      return $ret_code;
    }
    /******************************************************************************************
		process_edit_block
		******************************************************************************************/
     function process_edit_block($user, $theid){
      //RETURN CODE - SUCCESS
        $ret_code = array(1,0);
      //GRAB ALL THE INFORMATION FROM THE POST ACTION
      	$title = stripslashes($_REQUEST['title']);
      	$body = stripslashes($_REQUEST['body']);
      	$search = stripslashes($_REQUEST['search']);
      //CREATE A UNIX TIMESTAMP
      	$stamp = time();
      	$date = gmdate("Y-m-d H:i:s", $stamp);
     	//INSERT
       	$sql = "UPDATE ".$this->config->db_prefix."_block_content SET name = '".addslashes($title)."', body = '".addslashes($body)."', search = ".$search." WHERE id = $theid";
    		$results=$this->db->DB_Q_C($sql);
    		$ret_code[1] = $theid;
      		//STORE OUR OBJECT
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
      		  $results = $this->db->DB_Q_C($sql);
          	$object_id = mysql_insert_id();
      		//STORE OUR LOG INFO
      		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, $user->user_id, $this->id, 3, $theid, 2)";
      		  $results = $this->db->DB_Q_C($sql);
    	//UPDATE ALL PAGES THAT USE THIS BLOCK
    	  $sql = "SELECT * FROM ".$this->config->db_prefix."_block_list WHERE block_id = $theid";
    	  
    	  $results=$this->db->DB_Q_C($sql);
    	  if(mysql_affected_rows()>0){
      	  while($row = mysql_fetch_array($results)){
            $this->process_rebuild_page($row['page_id']);
          }
        }
      return $ret_code;
    }
    /******************************************************************************************
		process_delete_template
		******************************************************************************************/
     function process_delete_template($user, $theid){
      //RETURN CODE - SUCCESS
          $ret_code = array(0,0);
      //CHECK USERS CHOICE
        if($_REQUEST['choice']=="yes"){ 
          //THE USER CHOSE TO DELETE THE TEMPLATE RETURN CODE 2
            $ret_code[0] = 2;
          //CREATE A UNIX TIMESTAMP
          	$stamp = time();
          	$date = gmdate("Y-m-d H:i:s", $stamp);
         	//DELETE
           	$sql = "DELETE FROM ".$this->config->db_prefix."_block_template WHERE id = $theid";
        		$results=$this->db->DB_Q_C($sql);
        		//STORE OUR OBJECT
        		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
        		  $results = $this->db->DB_Q_C($sql);
            	$object_id = mysql_insert_id();
        		//STORE OUR LOG INFO
        		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, $user->user_id, $this->id, 1, $theid, 3)";
        		  $results = $this->db->DB_Q_C($sql);
        }else{
          //THE USER CHOSE NOT TO DELETE THE TEMPLATE RETURN CODE 3
            $ret_code[0] = 3;
        }
      return $ret_code;
    }
    /******************************************************************************************
		process_delete_template
		******************************************************************************************/
     function process_delete_block($user, $theid){
      //RETURN CODE - SUCCESS
          $ret_code = array(0,0);
      //CHECK USERS CHOICE
        if($_REQUEST['choice']=="yes"){ 
          //THE USER CHOSE TO DELETE THE TEMPLATE RETURN CODE 2
            $ret_code[0] = 2;
          //CREATE A UNIX TIMESTAMP
          	$stamp = time();
          	$date = gmdate("Y-m-d H:i:s", $stamp);
         	//DELETE
           	$sql = "DELETE FROM ".$this->config->db_prefix."_block_content WHERE id = $theid";
        		$results=$this->db->DB_Q_C($sql);
        		//STORE OUR OBJECT
        		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
        		  $results = $this->db->DB_Q_C($sql);
            	$object_id = mysql_insert_id();
        		//STORE OUR LOG INFO
        		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, $user->user_id, $this->id, 3, $theid, 3)";
        		  $results = $this->db->DB_Q_C($sql);
        }else{
          //THE USER CHOSE NOT TO DELETE THE TEMPLATE RETURN CODE 3
            $ret_code[0] = 3;
        }
      return $ret_code;
    }
    /******************************************************************************************
		process_delete_page
		******************************************************************************************/
    function process_delete_page($user, $theid){
      $ret_code = array(0,0);
      if($_REQUEST['choice']=="yes"){
        //CREATE A UNIX TIMESTAMP
					$stamp = time();
					$date = gmdate("Y-m-d H:i:s", $stamp);
        //GRAB INFO FROM THE DB
          $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page WHERE id = $theid";
          $results = $this->db->DB_Q_C($sql);
          $row = mysql_fetch_array($results);
			  //CONSTRUCT PAGE PATH
          $tmp_array = explode("/",$this->getParentName($row['parent_id']));
          for($i=count($tmp_array)-2;$i>=0;$i--){
            $tmp_path.= $tmp_array[$i]."/";
          }
			    $file_dir = "../$tmp_path".$row['file_title']."/";
       //REMOVE ALL ENTRIES IN THE DATABASE FOR THE FILES IN THE DIRECTORY
        //
        $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page WHERE parent_id = $theid";
        $results1=$this->db->DB_Q_C($sql);
        while($row1 = mysql_fetch_array($results1)){
          $sql = "DELETE FROM ".$this->config->db_prefix."_block_list WHERE page_id = ".$row1['id'];
          $results=$this->db->DB_Q_C($sql);
        }
        /*if($row['parent_id']>0){
          $sql = "DELETE FROM 
                ".$this->config->db_prefix."_block_list, 
                ".$this->config->db_prefix."_block_page 
              WHERE 
                ".$this->config->db_prefix."_block_page.parent_id = $theid AND 
                ".$this->config->db_prefix."_block_list.page_id = ".$this->config->db_prefix."_block_page.parent_id AND 
                ".$this->config->db_prefix."_block_list.page_id = ".$this->config->db_prefix."_block_page.id";
          $results=$this->db->DB_Q_C($sql);
        }*/
        //ALL CONTENT BLOCKS IN THE CONTENT BLOCK LIST
          $sql = "DELETE FROM ".$this->config->db_prefix."_block_list WHERE page_id = $theid";
          $results=$this->db->DB_Q_C($sql);
        //INCLUDING ALL PAGES THAT ARE UNDER THIS PAGE
          $sql = "DELETE FROM ".$this->config->db_prefix."_block_page WHERE id = $theid OR parent_id = $theid";
          $results=$this->db->DB_Q_C($sql);
        		//STORE OUR OBJECT
        		  $sql = "INSERT INTO `".$this->config->db_prefix."_object` (create_date, create_who) VALUES ('$date', 1);";
        		  $results = $this->db->DB_Q_C($sql);
            	$object_id = mysql_insert_id();
        		//STORE OUR LOG INFO
        		  $sql = "INSERT INTO `".$this->config->db_prefix."_logs` (object_id, user_id, module_id, sub_module_id, record_id, action) VALUES ($object_id, $user->user_id, $this->id, 2, $theid, 3)";
        		  $results = $this->db->DB_Q_C($sql);
        //REMOVE THE FILE FROM THE SERVER
          if(file_exists($file_dir)){
            $this->rmdirtree($file_dir);
          }
        //SET THE RETURN CODE TO SUCCESS
          $ret_code[0] = 2;
      }else{
        //SET THE RETURN CODE TO NO DELETE
          $ret_code[0] = -2;
      }
      return $ret_code;
    }
    /******************************************************************************************
		rmdirtree
		******************************************************************************************/
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
		processAction
		******************************************************************************************/
		function processAction($cid, $user, $theid){
		  $extra = "";
		  if($user->user_perms[$this->id-1][0]==1){
        $ret_code = array();
        if($cid==1 && $user->user_perms[$this->id-1][1]==1){
          //CREATE TEMPLATE
		      $ret_code = $this->process_create_template($user);
		    }else if($cid==3 && $user->user_perms[$this->id-1][2]==1){
		      //EDIT TEMPLATE
      	  $ret_code = $this->process_edit_template($user, $theid);
      	}else if($cid==4 && $user->user_perms[$this->id-1][3]==1){
		      //DELETE TEMPLATE
      	  $ret_code = $this->process_delete_template($user, $theid);
      	}else if($cid==6 && $user->user_perms[$this->id-1][4]==1){
          //CREATE PAGE
		      $ret_code = $this->process_create_page($user);
		    }else if($cid==7 && $user->user_perms[$this->id-1][5]==1){
		      //EDIT PAGE
      	  $ret_code = $this->process_edit_page($user, $theid);
      	}else if($cid==8 && $user->user_perms[$this->id-1][6]==1){
		      //DELETE PAGE
      	  $ret_code = $this->process_delete_page($user, $theid);
      	}else if($cid==11 && $user->user_perms[$this->id-1][7]==1){
          //CREATE BLOCK
		      $ret_code = $this->process_create_block($user);
		    }else if($cid==12 && $user->user_perms[$this->id-1][8]==1){
		      //EDIT BLOCK
      	  $ret_code = $this->process_edit_block($user, $theid);
      	}else if($cid==13 && $user->user_perms[$this->id-1][9]==1){
		      //DELETE BLOCK
      	  $ret_code = $this->process_delete_block($user, $theid);
      	}else if($cid==14 && $user->user_perms[$this->id-1][4]==1){
		      //REBUILD ALL PAGES
      	  $ret_code = $this->process_rebuild_all_pages();
      	}
		    //CONSTRUCT OUR RETURN ADDRESS
          if($_REQUEST['the_action']=='submitexitok_template'){
            //THE USER CREATED A TEMPLATE AND CLICKED TO SAVE AND EXIT - RETURN TO MAIN TEMPLATE VIEW
            $extra = "?pid=".$this->id."&rc=".$ret_code[0];
          }else if($_REQUEST['the_action']=='submitok_template'){
            //THE USER HAS CREATED A TEMPLATE AND CLICK SAVE TEMPLATE - RETURN TO EDIT TEMPLATE FORM
            $extra = "?pid=".$this->id."&cid=3&theid=".$ret_code[1]."&rc=".$ret_code[0];
          }else if($_REQUEST['the_action']=='submitexitok_page'){
            //THE USER CREATED A PAGE AND CLICKED TO SAVE AND EXIT - RETURN TO MAIN PAGE VIEW
            $extra = "?pid=".$this->id."&cid=5&rc=".$ret_code[0];
          }else if($_REQUEST['the_action']=='submitok_page'){
            //THE USER HAS CREATED A PAGE AND CLICK SAVE TEMPLATE - RETURN TO EDIT PAGE FORM
            $extra = "?pid=".$this->id."&cid=7&theid=".$ret_code[1]."&rc=".$ret_code[0];
          }else if($_REQUEST['the_action']=='submitexitok_block'){
            //THE USER CREATED A TEMPLATE AND CLICKED TO SAVE AND EXIT - RETURN TO MAIN TEMPLATE VIEW
            $extra = "?pid=".$this->id."&cid=10&rc=".$ret_code[0];
          }else if($_REQUEST['the_action']=='submitok_block'){
            //THE USER HAS CREATED A TEMPLATE AND CLICK SAVE TEMPLATE - RETURN TO EDIT TEMPLATE FORM
            $extra = "?pid=".$this->id."&cid=12&theid=".$ret_code[1]."&rc=".$ret_code[0];
          }else{
            $extra = "?pid=".$this->id."&cid=5&rc=".$ret_code[0];
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
		      //VIEW TEMPLATES
	         $this->view_templates($user, $_REQUEST['rc'], $start, $limit);
        }else if($cid==1 && $user->user_perms[$this->id-1][1]==1){
          //CREATE TEMPLATES
	         $this->display_create_template();
        }else if($cid==2 && $user->user_perms[$this->id-1][1]==1){
          //VIEW CONTENT TEMPLATES
	         $this->view_templates_content($user, $_REQUEST['theid']);
        }else if($cid==3 && $user->user_perms[$this->id-1][1]==1){
          //EDIT TEMPLATES
	         $this->display_edit_template($_REQUEST['theid'], $_REQUEST['rc']);
        }else if($cid==4 && $user->user_perms[$this->id-1][3]==1){
          //DELETE TEMPLATES
	         $this->display_delete_template($user, $_REQUEST['theid']);
        }else if($cid==5){
		      //VIEW PAGES
	         $this->view_pages($user, $_REQUEST['rc'], $start, $limit);
        }else if($cid==6 && $user->user_perms[$this->id-1][4]==1){
          //CREATE PAGES
	         $this->display_create_page();
        }else if($cid==7 && $user->user_perms[$this->id-1][5]==1){
          //EDIT PAGES
	         $this->display_edit_page($_REQUEST['theid'], $_REQUEST['rc']);
        }else if($cid==8 && $user->user_perms[$this->id-1][6]==1){
          //DELETE PAGES
	         $this->display_delete_page($user, $_REQUEST['theid']);
        }else if($cid==9 && $user->user_perms[$this->id-1][1]==1){
          //VIEW CONTENT PAGES
	         $this->view_pages_content($user, $_REQUEST['theid']);
        }else if($cid==10){
		      //VIEW BLOCKS
	         $this->view_blocks($user, $_REQUEST['rc'], $start, $limit);
        }else if($cid==11 && $user->user_perms[$this->id-1][7]==1){
          //CREATE BLOCKS
	         $this->display_create_block();
        }else if($cid==12 && $user->user_perms[$this->id-1][8]==1){
          //EDIT BLOCKS
	         $this->display_edit_block($_REQUEST['theid'], $_REQUEST['rc']);
        }else if($cid==13 && $user->user_perms[$this->id-1][9]==1){
          //DELETE BLOCKS
	         $this->display_delete_block($user, $_REQUEST['theid']);
        }else if($cid==14 && $user->user_perms[$this->id-1][1]==1){
          //VIEW CONTENT BLOCKS
	         $this->view_blocks_content($user, $_REQUEST['theid']);
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
    function view_templates_content($user, $theid){
      //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE
          $sql = "SELECT * FROM 
                    ".$this->config->db_prefix."_block_template
                  WHERE
                    ".$this->config->db_prefix."_block_template.id = $theid 
                  LIMIT 1";
          $result=$this->db->DB_Q_C($sql);
          $row = mysql_fetch_array($result);
      //PRINT OUT THIS BLOCKS INFORMATION
         print "
                <div id='records'>
                  <div id='content'>
                    <table cellpadding='0' cellspacing='0' width='100%'>
                      <tr>
                        <th class='record_head' colspan='2'>Template Information</th>
                      </tr>
                      <tr>
                        <td>
                          <p><b>Template Name: </b>".$row['name']."</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>"; 
      //PRINT OUT ALL PAGES THAT USE THIS TEMPLATE
          $sql = "SELECT * FROM 
                    ".$this->config->db_prefix."_block_page 
                  WHERE
                    ".$this->config->db_prefix."_block_page.template_id = $theid
                  ";
          $result=$this->db->DB_Q_C($sql);
          //
            print "
                    <div id='records'><div id='content'>
                      <table cellpadding='0' cellspacing='0' width='100%'>
                        <tr>
                          <th class='record_head'>Pages that use this template</th>
                        </tr>";
            while($row = mysql_fetch_array($result)){
              //CONSTRUCT OUR PAGE'S URL
                if($row['page_id']==1){
                  $url = $this->config->site_url;
                }else{
                  $url = $this->config->site_url.$this->getParentName($row['parent_id']).$row['file_title']."/";
                }
              print "<tr>
                        <td><a href='?pid=$this->id&cid=9&theid=".$row['page_id']."'>".$url."</a></td>
                      </tr>";
            }
            print "</table></div>";
        
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
        <tr><th class='record_head'>Block History</th></tr>
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
                      This template was created by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";
            }else if($row2['action']==2){
              //EDIT
                print "<tr $effect><td colspan='2'>
                      This template was edited by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";
            }else if($row2['action']==4){
              //PUBLISHED   
                print "<tr $effect><td colspan='2'>
                      This template was published by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";       
            }
        }
        print "</table></div></div>";
    }
    /******************************************************************************************
		view_content
		******************************************************************************************/
    function view_blocks_content($user, $theid){
      //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE
          $sql = "SELECT * FROM 
                    ".$this->config->db_prefix."_block_content
                  WHERE
                    ".$this->config->db_prefix."_block_content.id = $theid 
                  LIMIT 1";
          $result=$this->db->DB_Q_C($sql);
          $row = mysql_fetch_array($result);
      //SEARCHABLE
        if($row['search']==0){
          $search = "This block can not be searched, if enabled on your site.";
        }else{
          $search = "This block can be searched, if enabled on your site";
        }
      //PRINT OUT THIS BLOCKS INFORMATION
         print "
                <div id='records'>
                  <div id='content'>
                    <table cellpadding='0' cellspacing='0' width='100%'>
                      <tr>
                        <th class='record_head' colspan='2'>Block Information</th>
                      </tr>
                      <tr>
                        <td>
                          <p><b>Block Name: </b>".$row['name']."</p>
                          <p>".$search."</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>"; 
      //PRINT OUT ALL PAGES THAT THIS BLOCK EXISTS ON
          $sql = "SELECT * FROM 
                    ".$this->config->db_prefix."_block_list,
                    ".$this->config->db_prefix."_block_page 
                  WHERE
                    ".$this->config->db_prefix."_block_list.block_id = $theid AND
                    ".$this->config->db_prefix."_block_page.id = ".$this->config->db_prefix."_block_list.page_id 
                  ";
          $result=$this->db->DB_Q_C($sql);
          //
            print "
                    <div id='records'><div id='content'>
                      <table cellpadding='0' cellspacing='0' width='100%'>
                        <tr>
                          <th class='record_head'>Pages that use this block</th>
                        </tr>";
            while($row = mysql_fetch_array($result)){
              //CONSTRUCT OUR PAGE'S URL
                if($row['page_id']==1){
                  $url = $this->config->site_url;
                }else{
                  $url = $this->config->site_url.$this->getParentName($row['parent_id']).$row['file_title']."/";
                }
              print "<tr>
                        <td><a href='?pid=$this->id&cid=9&theid=".$row['page_id']."'>".$url."</a> at &lt;block id='".$row['template_block_id']."'&gt;</td>
                      </tr>";
            }
            print "</table></div>";
        
      //DISPLAY THE HISTORY OF THIS RECORD
        $sql = "SELECT * FROM ".$this->config->db_prefix."_logs, ".$this->config->db_prefix."_object, ".$this->config->db_prefix."_user WHERE
                ".$this->config->db_prefix."_logs.record_id = $theid AND 
                ".$this->config->db_prefix."_logs.module_id = ".$this->id." AND
                ".$this->config->db_prefix."_logs.sub_module_id = 3 AND
                ".$this->config->db_prefix."_logs.object_id =  ".$this->config->db_prefix."_object.id AND
                ".$this->config->db_prefix."_logs.user_id =  ".$this->config->db_prefix."_user.id
                    ORDER BY ".$this->config->db_prefix."_logs.id DESC";
        $result2=$this->db->DB_Q_C($sql);
        print "<div id='records'><div id='content'>
        <table cellpadding='0' cellspacing='0'>
        <tr><th class='record_head'>Block History</th></tr>
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
                      This block was created by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";
            }else if($row2['action']==2){
              //EDIT
                print "<tr $effect><td colspan='2'>
                      This block was edited by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";
            }else if($row2['action']==4){
              //PUBLISHED   
                print "<tr $effect><td colspan='2'>
                      This block was published by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";       
            }
        }
        print "</table></div></div>";
    }
    /******************************************************************************************
		view_content
		******************************************************************************************/
    function view_pages_content($user, $theid){
       //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE
          $sql = "SELECT * FROM 
                    ".$this->config->db_prefix."_block_page,
                    ".$this->config->db_prefix."_block_template
                  WHERE
                    ".$this->config->db_prefix."_block_page.id = $theid AND
                    ".$this->config->db_prefix."_block_page.template_id = ".$this->config->db_prefix."_block_template.id 
                  LIMIT 1";
          $result=$this->db->DB_Q_C($sql);
          $row = mysql_fetch_array($result);
      //CONSTRUCT OUR PAGE'S URL
        if($row[0]==1){
          $url = $this->config->site_url;
        }else{
          $url = $this->config->site_url.$this->getParentName($row['parent_id']).$row['file_title']."/";
        }
      //PRINT OUT THIS PAGES INFORMATION
         print "
                <div id='records'>
                  <div id='content'>
                    <table cellpadding='0' cellspacing='0' width='100%'>
                      <tr>
                        <th class='record_head' colspan='2'>Page Information</th>
                      </tr>
                      <tr>
                        <td>
                          <table cellpadding='0' cellspacing='0' width='100%'>
                            <tr>
                              <th class='record_head' >".$row['title']."</th>
                            </tr>
                            <tr>
                              <td>
                                <p>Located at: <a href='$url' target='_blank'><i>$url</i></a></p>
                                <p>
                                  Template used: <a href='?pid=$this->id&cid=2&theid=".$row['id']."'>".$row['name']."</a> 
                                </p>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>";  
      //PRINT OUT THE BLOCKS USED ON THIS PAGE
        $this->view_blocks($user, 0, 0, -1, $theid);
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
        <tr><th class='record_head'>Page History</th></tr>
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
                      This page was created by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";
            }else if($row2['action']==2){
              //EDIT
                print "<tr $effect><td colspan='2'>
                      This page was edited by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";
            }else if($row2['action']==4){
              //PUBLISHED   
                print "<tr $effect><td colspan='2'>
                      This page was published by <b>".$row2['username']."</b> on $create_date.
                  </td></tr>";       
            }
        }
        print "</table></div></div>
        </div></div>";
    }
    /******************************************************************************************
		view_templates 
		******************************************************************************************/
		function view_blocks($user, $ret_code=0, $start=0, $limit=10, $page_id=0){ 
		  if($page_id>0){
        //GRAB OUR TEMPLATES  		 
          $sql = "SELECT * FROM 
                    ".$this->config->db_prefix."_block_content,
                    ".$this->config->db_prefix."_block_list
                  WHERE
                    ".$this->config->db_prefix."_block_content.id = ".$this->config->db_prefix."_block_list.block_id AND
                    ".$this->config->db_prefix."_block_list.page_id = $page_id
                      ORDER BY ".$this->config->db_prefix."_block_content.id DESC";
          if($limit>0){
            $sql.= " LIMIT $start, $limit ";
          }
          $results = $this->db->DB_Q_C($sql);
          $count = mysql_affected_rows();
        //COUNT ALL THE RECORDS IN THE SYSTEM
          $sql = "SELECT * FROM 
                    ".$this->config->db_prefix."_block_content,
                    ".$this->config->db_prefix."_block_list
                  WHERE
                    ".$this->config->db_prefix."_block_content.id = ".$this->config->db_prefix."_block_list.block_id AND
                    ".$this->config->db_prefix."_block_list.page_id = $page_id
                      ORDER BY ".$this->config->db_prefix."_block_content.id DESC";
          $results2 = $this->db->DB_Q_C($sql);
          $total = mysql_affected_rows();
      }else{
        //GRAB OUR TEMPLATES  		 
          $sql = "SELECT * FROM ".$this->config->db_prefix."_block_content
                      ORDER BY id DESC LIMIT $start, $limit";
          $results = $this->db->DB_Q_C($sql);
          $count = mysql_affected_rows();
        //COUNT ALL THE RECORDS IN THE SYSTEM
          $sql = "SELECT * FROM ".$this->config->db_prefix."_block_content
                      ORDER BY id DESC";
          $results2 = $this->db->DB_Q_C($sql);
          $total = mysql_affected_rows();
      }
      //
        print "<div id='records'><div id='content'>";
      //DISPLAY ANY MESSAGES HERE
        if($ret_code==0){
        }else if($ret_code==1){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The block has been saved.</th></tr>
          </table>";
        }else if($ret_code==2){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The block has been removed from the system.</th></tr>
          </table>";
        }else if($ret_code==3){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The block has not been removed from the system.</th></tr>
          </table>";
        }
      //PRINT OUR OUR TEMPLATES
        print "<table cellpadding='0' cellspacing='0'>
          <tr><th colspan='6' class='record_head'>Content Blocks</th></tr>";
        if($count>0){
          print "<tr><th>ID</th><th>Title</th><th>Pages</th><th>Searchable</th><th colspan='3'>Options</th></tr>";
          while($row=mysql_fetch_array($results)){
            if($striper){
              $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
            }else{
              $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
            }
            $striper=!$striper;
            //COUNT THE NUMBER OF PAGES THIS BLOCK IS USED ON
              $sql = "SELECT * FROM ".$this->config->db_prefix."_block_list WHERE block_id = ".$row[0];
              $results1 = $this->db->DB_Q_C($sql);
              $block_count = mysql_affected_rows();
            //
              if($row['search']==0){
                $search = "no";
              }else{
                $search = "yes";
              }
            print "<tr $effect>
                  <td>".$row[0]."</td>
                  <td width='60%'>".stripslashes($row['name'])."</td>
                  <td width='20%'>$block_count</td>
                  <td width='20%'>$search</td>
                  <td width='23'><a class='toolTipElement' title='Block Details::View details about this content block.' href='?pid=".$this->id."&amp;cid=14&amp;theid=".$row[0]."'><img src='images/preview.png' border='0' alt='view' /></a></td>";
            //
              if($user->user_perms[$this->id-1][2]==1){
                print "<td width='23'><a class='toolTipElement' title='Block Editing::Edit this block.' href='?pid=".$this->id."&amp;cid=12&amp;theid=".$row[0]."'><img src='images/edit.png' border='0' alt='' /></a></td>";
              }else{
                print "<td width='23'><img src='images/edit_disabled.png' border='0' alt='' /></td>";
              }
            //
              if($user->user_perms[$this->id-1][3]==1){
                print "<td width='23'><a class='toolTipElement' title='Block Deletion::Delete this block from the system.' href='?pid=".$this->id."&amp;cid=13&amp;theid=".$row[0]."'><img src='images/delete.png' border='0' alt='' /></a></td>";
              }else{
                print "<td width='23'><img src='images/delete_disabled.png' border='0' alt='' /></td>";
              }
            print "</tr>";
          }
          if($total>$count){
            $name = array("pid", "cid");
            $data = array($_REQUEST['pid'], $_REQUEST['cid']); 
            pageNav($start, $limit, $total, $name, $data);
            print "<tr><th colspan='6' class='record_footer'>
            Showing $count out of a total of <b>$total</b> records in the system</th></tr>";
          }else{
            if($count>1){
              print "<tr><th colspan='6' class='record_footer'>There are a total of <b>$total</b> records in the system</th></tr>";
            }else{
              print "<tr><th colspan='6' class='record_footer'>There is <b>$total</b> record in the system</th></tr>";
            }
          }      
        }else{
          print "<tr><td colspan='6'>There are no blocks in the system.</td></tr>";
        }
        print "</table>
          </div></div>";
		}
    /******************************************************************************************
		view - view entries in the database, in a table format
		******************************************************************************************/
		function view_pages($user, $ret_code=0, $start=0, $limit=10){
		  $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page WHERE parent_id <= 0
                    ORDER BY id ASC";
      $results = $this->db->DB_Q_C($sql);
      $count = mysql_affected_rows();
      //COUNT ALL THE RECORDS IN THE SYSTEM
      $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page
                  ORDER BY id DESC";
      $results2 = $this->db->DB_Q_C($sql);
      $total = mysql_affected_rows();
      //
      print "<div id='records'><div id='content'>";
      if($ret_code==0){
      }else if($ret_code==1){
        print "<table width='100%'>
        <tr><th class='notice_record_head'>The page has been saved.</th></tr>
        </table>";
      }else if($ret_code==2){
        print "<table width='100%'>
        <tr><th class='notice_record_head'>The page has been deleted.</th></tr>
        </table>";
      }else if($ret_code==-2){
        print "<table width='100%'>
        <tr><th class='notice_record_head'>The page has not been deleted.</th></tr>
        </table>";
      }
      print "<table cellpadding='0' cellspacing='0'>
      <tr><th colspan='4' class='record_head'>Pages</th></tr>";
      $depth = 0;
      if($count>0){
        print "<tr><th>Title</th><th colspan='3'>Options</th></tr>";
        while($row=mysql_fetch_array($results)){
          if($striper){
              $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
            }else{
              $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
            }
            $striper=!$striper;
            if($this->check_for_subpages($row[0])){
              $title = "<strong>".$row['title']."</strong>";
            }else{
              $title = $row['title'];
            }
            if($row[0]==1){
              $depth = 0;
            }else{
              $depth = 1;
            }
            print "<tr $effect>
                  <td>".$this->padImage($depth)." ".$title."</td>
                  <td width='23'><a class='toolTipElement' title='Page Details::View the details of this page.' href='?pid=".$this->id."&amp;cid=9&amp;theid=".$row[0]."'><img src='images/preview.png' border='0' alt='view' /></a></td>";
            //
              if($user->user_perms[$this->id-1][5]==1){
                print "<td width='23'><a class='toolTipElement' title='Page Editing::Edit this page.' href='?pid=".$this->id."&amp;cid=7&amp;theid=".$row[0]."'><img src='images/edit.png' border='0' alt='' /></a></td>";
              }else{
                print "<td width='23'><img src='images/edit_disabled.png' alt=''/></td>";
              }
            //
              if($row['id']>1 && $user->user_perms[$this->id-1][6]==1){
                print "<td width='23'><a class='toolTipElement' title='Page Deletion::Delete this page from the system.' href='?pid=".$this->id."&amp;cid=8&amp;theid=".$row[0]."'><img src='images/delete.png' border='0' alt='' /></a></td>";
              }else{
                print "<td width='23'><img src='images/delete_disabled.png' alt=''/></td>";
              }
            print "</tr>";
           //GRAB ALL SUBPAGES
            $striper = $this->view_subpages($row[0], $depth, $striper, $user);
        }
        if($count>1){
          print "<tr><th colspan='4' class='record_footer'>There are a total of <b>$total</b> records in the system</th></tr>";
        }else{
          print "<tr><th colspan='4' class='record_footer'>There is <b>$total</b> record in the system</th></tr>";
        }    
      }else{
        print "<tr><td colspan='4'>There are no pages in the system.</td></tr>";
      }
      print "</table>
      </div></div>";
		}
		/******************************************************************************************
		check_for_subpages
		******************************************************************************************/
		function check_for_subpages($parent_page=0){
		  $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page WHERE parent_id = ".$parent_page." ORDER BY id DESC";
      $results1 = $this->db->DB_Q_C($sql);
      $count1 = mysql_affected_rows();
      if($count1>0){
        return true;
      }else{
        return false;
      }
		}
		/******************************************************************************************
		view_subpages
		******************************************************************************************/
		function view_subpages($parent_page=0, $depth, $striper, $user){
		  $depth++;
      $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page WHERE parent_id = ".$parent_page." ORDER BY id DESC";
      $results1 = $this->db->DB_Q_C($sql);
      $count1 = mysql_affected_rows();
      if($count1>0){
        while($row1=mysql_fetch_array($results1)){
          if($striper){
            $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";
          }else{
            $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             
          }
          $striper=!$striper;
          $pad = $depth*10;
          if($this->check_for_subpages($row1[0])){
            $title = "<strong>".$row1['title']."</strong>";
          }else{
            $title = $row1['title'];
          }
          print "<tr $effect>
                <td>".$this->padImage($depth)." ".$title."</td>
                <td width='23'><a class='toolTipElement' title='Page Details::View the details of this page.' href='?pid=".$this->id."&amp;cid=9&amp;theid=".$row1[0]."'><img src='images/preview.png' border='0' alt='view' /></a></td>";
          //
            if($user->user_perms[$this->id-1][5]==1){
              print "<td width='23'><a class='toolTipElement' title='Page Editing::Edit this page.' href='?pid=".$this->id."&amp;cid=7&amp;theid=".$row1[0]."'><img src='images/edit.png' border='0' alt='' /></a></td>";
            }else{
              print "<td width='23'><img src='images/edit_disabled.png' alt=''/></td>";
            }
          //
            if($user->user_perms[$this->id-1][6]==1){
              print "<td width='23'><a class='toolTipElement' title='Page Deletion::Delete this page from the system.' href='?pid=".$this->id."&amp;cid=8&amp;theid=".$row1[0]."'><img src='images/delete.png' border='0' alt='' /></a></td>";
            }else{
              print "<td width='23'><img src='images/delete_disabled.png' alt=''/></td>";
            }
            print "</tr>";
          if(strlen($row1[0])>0){
            $striper=$this->view_subpages($row1[0], $depth, $striper, $user);
          }
        }
      }
      return $striper;
    }
		/******************************************************************************************
		view_templates 
		******************************************************************************************/
		function view_templates($user, $ret_code=0, $start=0, $limit=10){ 
      //GRAB OUR TEMPLATES  		 
        $sql = "SELECT * FROM ".$this->config->db_prefix."_block_template
                    ORDER BY id DESC LIMIT $start, $limit";
        $results = $this->db->DB_Q_C($sql);
        $count = mysql_affected_rows();
      //COUNT ALL THE RECORDS IN THE SYSTEM
        $sql = "SELECT * FROM ".$this->config->db_prefix."_block_template
                    ORDER BY id DESC";
        $results2 = $this->db->DB_Q_C($sql);
        $total = mysql_affected_rows();
      //
        print "<div id='records'><div id='content'>";
      //DISPLAY ANY MESSAGES HERE
        if($ret_code==0){
        }else if($ret_code==1){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The template has been saved.</th></tr>
          </table>";
        }else if($ret_code==2){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The template has been removed from the system.</th></tr>
          </table>";
        }else if($ret_code==3){
          print "<table width='100%'>
          <tr><th class='notice_record_head'>The template has not been removed from the system.</th></tr>
          </table>";
        }
      //PRINT OUR OUR TEMPLATES
        print "<table cellpadding='0' cellspacing='0'>
          <tr><th colspan='4' class='record_head'>Templates</th></tr>";
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
                  <td width='100%'>".stripslashes($row['name'])."</td>
                  <td width='23'><a class='toolTipElement' title='Template Details::View details about this template.' href='?pid=".$this->id."&amp;cid=2&amp;theid=".$row[0]."'><img src='images/preview.png' border='0' alt='view' /></a></td>";
            //
              if($user->user_perms[$this->id-1][2]==1){
                print "<td width='23'><a class='toolTipElement' title='Template Editing::Edit this template.' href='?pid=".$this->id."&amp;cid=3&amp;theid=".$row[0]."'><img src='images/edit.png' border='0' alt='' /></a></td>";
              }else{
                print "<td width='23'><img src='images/edit_disabled.png' border='0' alt='' /></td>";
              }
            //
              if($user->user_perms[$this->id-1][3]==1){
                print "<td width='23'><a class='toolTipElement' title='Template Deletion::Delete this template from the system.' href='?pid=".$this->id."&amp;cid=4&amp;theid=".$row[0]."'><img src='images/delete.png' border='0' alt='' /></a></td>";
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
          print "<tr><td colspan='4'>There are no templates in the system.</td></tr>";
        }
        print "</table>
          </div></div>";
		}
		/******************************************************************************************
		menu - displays the menu for this module
		******************************************************************************************/
		function menu($user, $pid){
      $content = "";
      if($user->user_perms[$this->id-1][0]==1){
        if($pid==$this->id){
          $content = "<li id='menu_".$this->id."_style' class='active_module'><a id='menu_".$this->id."' name='menu_".$this->id."' class='toolTipElement' title='Template Section::View, Edit or Delete templates.' href='#'>pages</a></li>";
        }else{
          $content = "<li id='menu_".$this->id."_style' ><a id='menu_".$this->id."' name='menu_".$this->id."' class='toolTipElement' title='Template Section::View, Edit or Delete templates.' href='#'>pages</a></li>";
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
		    if($cid==5 && $pid == $this->id){
          $content .= "<li class='active_module'><a class='toolTipElement' title='View Pages::View all pages in the system.' href='?pid=$this->id&amp;cid=5'>view pages</a></li>";
        }else{
          $content .= "<li><a class='toolTipElement' title='View Pages::View all pages in the system.' href='?pid=$this->id&amp;cid=5'>view pages</a></li>";
        }
         if($user->user_perms[$this->id-1][4]==1){
          if($cid==6 && $pid == $this->id){
            $content .= "<li class='active_module'><a class='toolTipElement' title='Page Creation::Create a page.' href='?pid=$this->id&amp;cid=6'>create pages</a></li>";
          }else{
            $content .= "<li><a class='toolTipElement' title='Page Creation::Create a page.' href='?pid=$this->id&amp;cid=6'>create pages</a></li>";
          }
        }
        if($cid==10 && $pid == $this->id){
          $content .= "<li class='active_module'><a class='toolTipElement' title='View Blocks::View all content blocks in the system.' href='?pid=$this->id&amp;cid=10'>view blocks</a></li>";
        }else{
          $content .= "<li><a class='toolTipElement' title='View Blocks::View all content blocks in the system.' href='?pid=$this->id&amp;cid=10'>view blocks</a></li>";
        }
        if($user->user_perms[$this->id-1][7]==1){
          if($cid==11 && $pid == $this->id){
            $content .= "<li class='active_module'><a class='toolTipElement' title='Content Block Creation::Create a content block.' href='?pid=$this->id&amp;cid=11'>create blocks</a></li>";
          }else{
            $content .= "<li><a class='toolTipElement' title='Content Block Creation::Create a content block.' href='?pid=$this->id&amp;cid=11'>create blocks</a></li>";
          }
        }
        if($cid==0 && $pid == $this->id){
          $content .= "<li class='active_module'><a class='toolTipElement' title='View Templates::View all templates in the system.' href='?pid=$this->id&amp;cid=0'>view templates</a></li>";
        }else{
          $content .= "<li><a class='toolTipElement' title='View Templates::View all templates in the system.' href='?pid=$this->id&amp;cid=0'>view templates</a></li>";
        }
        if($user->user_perms[$this->id-1][1]==1){
          if($cid==1 && $pid == $this->id){
            $content .= "<li class='active_module'><a class='toolTipElement' title='Template Creation::Create a template.' href='?pid=$this->id&amp;cid=1'>create templates</a></li>";
          }else{
            $content .= "<li><a class='toolTipElement' title='Template Creation::Create a template.' href='?pid=$this->id&amp;cid=1'>create templates</a></li>";
          }
        }
        if($user->user_perms[$this->id-1][4]==1){
          if($cid==6 && $pid == $this->id){
            $content .= "<li class='active_module'><a class='toolTipElement' title='Rebuild Pages::Rebuild all pages in the system.' href='?pid=$this->id&amp;cid=14&amp;formprocess=yes'>rebuild pages</a></li>";
          }else{
            $content .= "<li><a class='toolTipElement' title='Rebuild Pages::Rebuild all pages in the system.' href='?pid=$this->id&amp;cid=14&amp;formprocess=yes'>rebuild pages</a></li>";
          }
        }
        if($cid==100 && $pid == $this->id){
          $content .= "<li class='active_module'><a class='toolTipElement' title='Further help::Learn more about the block section of your site.' href='?pid=$this->id&amp;cid=100'>help</a></li>";
        }else{
          $content .= "<li><a class='toolTipElement' title='Further help::Learn more about the block section of your site.' href='?pid=$this->id&amp;cid=100'>help</a></li>";
        }
		    $content.= "</ul></div>";
      }
      return $content; 
		}
		/******************************************************************************************
		about
		******************************************************************************************/
    function about(){ 
      print "<div id='forms'><div id='content'>";
      print "<h1>News FAQ (Frequently Asked Questions)</h1>";
      print "<div id='about'>";
        print "<ul>";
          print "<li><a href='#1'>What is a Page?</a></li>";
          print "<li><a href='#2'>What is a Block?</a></li>";
          print "<li><a href='#3'>What is a Template?</a></li>";
          print "<hr noshade='noshade' />";
          //
          print "<a name='1'></a><li>What is a Page?";
            print "<p>A page is an page on your site that contains content blocks, defined by the srtucture of the template.</p>";
          print "</li>";
          //
           print "<a name='2'></a><li>What is a Block?";
            print "<p>A block is a piece of content that you can use on any page that you create.</p>";
          print "</li>";
          //
           print "<a name='3'></a><li>What is a Template?";
            print "<p>A template is the defined structure of your site. You can have as many templates as you want.</p>";
          print "</li>";
        print "</ul>";
      print "</div></div></div>"; 
    }
    /******************************************************************************************
		display_log
		******************************************************************************************/
		function display_log($action, $subid, $date, $theid){
		  $ret = "";
		  if($subid==1){
        //TEMPLATE
        if($action==1){
          //CREATE
          $ret = "Created a <a class='toolTipElement' title='View Details::View more information on this template.' href='?pid=$this->id&cid=2&amp;theid=$theid'>template</a> on $date";
        }else if($action==2){
          //EDIT
          $ret = "Edited a <a class='toolTipElement' title='View Details::View more information on this template.' href='?pid=$this->id&cid=2&amp;theid=$theid'>template</a> on $date";
        }else if($action==3){
          //DELETE
          $ret = "Deleted a <a class='toolTipElement' title='View Details::View more information on this template.' href='?pid=$this->id&cid=2&amp;theid=$theid'>template</a> on $date";
        }else{
          //UNKNOWN
          $ret = "Did unknown action to a <a class='toolTipElement' title='View Details::View more information on this template.' href='?pid=$this->id&cid=2&amp;theid=$theid'>template</a> on $date";
        }
      }else if($subid==2){
        //PAGE
        if($action==1){
          //CREATE
          $ret = "Created a <a class='toolTipElement' title='View Details::View more information on this page.' href='?pid=$this->id&cid=9&amp;theid=$theid'>page</a> on $date";
        }else if($action==2){
          //EDIT
          $ret = "Edited a <a class='toolTipElement' title='View Details::View more information on this page.' href='?pid=$this->id&cid=9&amp;theid=$theid'>page</a> on $date";
        }else if($action==3){
          //DELETE
          $ret = "Deleted a <a class='toolTipElement' title='View Details::View more information on this page.' href='?pid=$this->id&cid=9&amp;theid=$theid'>page</a> on $date";
        }else{
          //UNKNOWN
          $ret = "Did unknown action to a <a class='toolTipElement' title='View Details::View more information on this page.' href='?pid=$this->id&cid=9&amp;theid=$theid'>page</a> on $date";
        }
      }else if($subid==3){
        //BLOCK
        if($action==1){
          //CREATE
          $ret = "Created a <a class='toolTipElement' title='View Details::View more information on this block.' href='?pid=$this->id&cid=14&amp;theid=$theid'>block</a> on $date";
        }else if($action==2){
          //EDIT
          $ret = "Edited a <a class='toolTipElement' title='View Details::View more information on this block.' href='?pid=$this->id&cid=14&amp;theid=$theid'>block</a> on $date";
        }else if($action==3){
          //DELETE
          $ret = "Deleted a <a class='toolTipElement' title='View Details::View more information on this block.' href='?pid=$this->id&cid=14&amp;theid=$theid'>block</a> on $date";;
        }else{
          //UNKNOWN
          $ret = "Did unknown action to a <a class='toolTipElement' title='View Details::View more information on this block.' href='?pid=$this->id&cid=14&amp;theid=$theid'>block</a> on $date";
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
        print "<div id='block_perms_advanced'>";
          //TOTAL SUB-PERMISSION COUNT
            print "<input type='hidden' name='perm_".$this->name."_count' value='9' />";
            print "<table>";
            print "<tr><th colspan='2'>Advanced Permissions</th></tr>";
          //CREATE TEMPLATES
            if($user->user_perms[$this->id-1][1]==1){
              print "<tr><th>Create Templates</th><td>";
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
          //EDIT TEMPLATES
            if($user->user_perms[$this->id-1][2]==1){
              print "<tr><th>Edit Templates</th><td>";
                print "<select name='perm_".$this->name."_2'>";
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
              print "<input type='hidden' name='perm_".$this->name."_2' value='0' />";
            }
          //DELETE TEMPLATES
            if($user->user_perms[$this->id-1][3]==1){
              print "<tr><th>Delete Templates</th><td>";
                print "<select name='perm_".$this->name."_3'>";
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
              print "<input type='hidden' name='perm_".$this->name."_3' value='0' />";
            }
          //CREATE PAGES
            if($user->user_perms[$this->id-1][4]==1){
              print "<tr><th>Create Pages</th><td>";
                print "<select name='perm_".$this->name."_4'>";
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
              print "<input type='hidden' name='perm_".$this->name."_4' value='0' />";
            }
          //EDIT PAGES
            if($user->user_perms[$this->id-1][5]==1){
              print "<tr><th>Edit Pages</th><td>";
                print "<select name='perm_".$this->name."_5'>";
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
              print "<input type='hidden' name='perm_".$this->name."_5' value='0' />";
            }
          //DELETE PAGES
            if($user->user_perms[$this->id-1][6]==1){
              print "<tr><th>Delete Pages</th><td>";
                print "<select name='perm_".$this->name."_6'>";
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
              print "<input type='hidden' name='perm_".$this->name."_6' value='0' />";
            }
          //CREATE BLOCKS
            if($user->user_perms[$this->id-1][7]==1){
              print "<tr><th>Create Blocks</th><td>";
                print "<select name='perm_".$this->name."_7'>";
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
              print "<input type='hidden' name='perm_".$this->name."_7' value='0' />";
            }
          //EDIT BLOCKS
            if($user->user_perms[$this->id-1][8]==1){
              print "<tr><th>Edit Blocks</th><td>";
                print "<select name='perm_".$this->name."_8'>";
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
              print "<input type='hidden' name='perm_".$this->name."_8' value='0' />";
            }
          //DELETE BLOCKS
            if($user->user_perms[$this->id-1][9]==1){
              print "<tr><th>Delete Blocks</th><td>";
                print "<select name='perm_".$this->name."_9'>";
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
              print "<input type='hidden' name='perm_".$this->name."_9' value='0' />";
            }
          //
            print "</table>";
        print "</div>";
      print "</td></tr>";
      print "<script>
          var blockSlide = new Fx.Slide('block_perms_advanced');
					$('perm_".$this->name."').addEvent('change', function(e){
					   var tmp = $('perm_".$this->name."').options[$('perm_".$this->name."').selectedIndex].value;
					   if(tmp==0){
              blockSlide.slideOut();
             }else{
              blockSlide.slideIn();
             }
						});
					  var tmp = $('perm_".$this->name."').options[$('perm_".$this->name."').selectedIndex].value;
					  if(tmp==0){
              blockSlide.hide();
             }else{
              blockSlide.show();
             }
        </script>";
		}
	}
?>
