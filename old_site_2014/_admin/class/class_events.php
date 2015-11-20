<?php

  	/******************************************************************************************

	  PERMISSION'S BREAK DOWN

	    [0] = OVERALL ACCESS TO THIS MODULE

	    [1] = CREATE AN EVENT

	    [2] = EDIT AN EVENT

	    [3] = DELETE AN EVENT

	*******************************************************************************************  

	*******************************************************************************************

	  SUB-MODULE ID'S

	     1 - EVENT

	******************************************************************************************/

	class class_events{

		/******************************************************************************************

		CLASS VARIABLES

		******************************************************************************************/

		var $name;

		var $id;

		var $config;

		var $time;

		var $db;

		/******************************************************************************************

		class_events - constructor, initialize all variables. 

		******************************************************************************************/

		function class_events($db, $cfg, $t){

		  //MODULE NAME

		    $this->name = "Events";

		  //STORE THE DATABASE

		    $this->db = $db;

		  //STORE THE SITES CONFIG SETTINGS

		    $this->config = $cfg;

		  //STORE THE ID OF THIS MODULE

		    $sql = "SELECT * FROM ".$this->config->db_prefix."_modules WHERE name = 'class_events'";

		    $result = $db->DB_Q_C($sql);

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

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_modules` (name) VALUES ('class_events')";

  		  $results = $this->db->DB_Q_C($sql);

      	$lastid = mysql_insert_id();

      //SET PERMISSIONS FOR OUR DEFAULT USER

  		  $sql = "INSERT INTO `".$this->config->db_prefix."_perms` (user_id, module_id, perm) VALUES (1, $lastid, '1111')";

  		  $results = $this->db->DB_Q_C($sql);

  		//CREATE THE TABLE FOR THIS MODULE

	   	  $sql = "

          CREATE TABLE `".$this->config->db_prefix."_events` (

              `id` int(11) NOT NULL auto_increment,

              `title` text NOT NULL,

              `body` text NOT NULL,

              `summary` text NOT NULL,

              PRIMARY KEY  (`id`)

            ) ENGINE=MyISAM ;

          ";

  		  $results = $this->db->DB_Q_C($sql);

  		  $sql = "

          CREATE TABLE `".$this->config->db_prefix."_events_data` (

              `id` int(11) NOT NULL auto_increment,

              `event_id` int(11) NOT NULL,

              `event_date` datetime NOT NULL default '0000-00-00 00:00:00',

              `duration` time NOT NULL default '00:00:00',

              `tz` double default '0',

              PRIMARY KEY  (`id`)

            ) ENGINE=MyISAM ;

          ";

  		  $results = $this->db->DB_Q_C($sql);  		   

		}

		/******************************************************************************************

		display_log

		******************************************************************************************/

		function display_log($action, $subid, $date, $theid){

		  $ret = "";

		  if($subid==1){

        //EVENT

        if($action==1){

          //CREATE

          $ret = "Created an <a class='toolTipElement' title='View Details::View more information on this event.' href='?pid=$this->id&cid=2&amp;theid=$theid'>event</a> on $date";

        }else if($action==2){

          //EDIT

          $ret = "Edited an <a class='toolTipElement' title='View Details::View more information on this event.' href='?pid=$this->id&cid=2&amp;theid=$theid'>event</a> on $date";

        }else if($action==3){

          //DELETE

          $ret = "Deleted an <a class='toolTipElement' title='View Details::View more information on this event.' href='?pid=$this->id&cid=2&amp;theid=$theid'>event</a> on $date";

        }else{

          //UNKNOWN

          $ret = "Did unknown action to an <a class='toolTipElement' title='View Details::View more information on this event.' href='?pid=$this->id&cid=2&amp;theid=$theid'>event</a> on $date";

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

        print "<div id='event_perms_advanced'>";

          //TOTAL SUB-PERMISSION COUNT

            print "<input type='hidden' name='perm_".$this->name."_count' value='3' />";

            print "<table>";

            print "<tr><th colspan='2'>Advanced Permissions</th></tr>";

          //CREATE EVENTS

            if($user->user_perms[$this->id-1][1]==1){

              print "<tr><th>Create Events</th><td>";

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

          //EDIT EVENTS

            if($user->user_perms[$this->id-1][2]==1){

              print "<tr><th>Edit Events</th><td>";

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

          //DELETE EVENTS

            if($user->user_perms[$this->id-1][3]==1){

              print "<tr><th>Delete Events</th><td>";

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

          var eventSlide = new Fx.Slide('event_perms_advanced');

					$('perm_".$this->name."').addEvent('change', function(e){

					   var tmp = $('perm_".$this->name."').options[$('perm_".$this->name."').selectedIndex].value;

					   if(tmp==0){

              eventSlide.slideOut();

             }else{

              eventSlide.slideIn();

             }

						});

					  var tmp = $('perm_".$this->name."').options[$('perm_".$this->name."').selectedIndex].value;

					  if(tmp==0){

              eventSlide.hide();

             }else{

              eventSlide.show();

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

        }else if($cid==5 && $user->user_perms[$this->id-1][3]==1){

          //DELETE

	         $ret_code = $this->process_delete_listing($user, $theid);

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

	         $this->display_edit($_REQUEST['theid'], $_REQUEST['rc']);

        }else if($cid==4 && $user->user_perms[$this->id-1][3]==1){

          //DELETE

	         $this->display_delete($user, $_REQUEST['theid']);

        }else if($cid==5  && $user->user_perms[$this->id-1][3]==1){

          //DELETE

	         $this->display_delete_listing($user, $_REQUEST['theid']);

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

      print "<div id='forms'><div id='content'>

      <table cellpadding='0' cellspacing='0' width='100%'>

      <tr><th class='record_head' colspan='2'>Delete News Article?</th></tr>

      <tr><td>

      <form id='delete_id' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">

      <input type='hidden' name='the_action' value='submitok' />

      <input type='hidden' name='theid' value='$theid' />

      <input type='hidden' name='formprocess' value='yes' />

      <select name='choice' class='required'>

      <option value='no'>No, do not delete the event</option>

      <option value='yes'>Yes, delete the event</option>

      </select>

      <input type='submit' name='submitexitok' value='Submit' onclick=\"clicked='submitexitok'\"/>

      </form>

      </table>

      </div></div>

      <script>new FormValidator ('delete_id', {

        onFormValidate: function(pass, form){ 

          if(pass==true){;

            form.submitexitok.disabled=true;

          }

        }

      });</script>";

      $this->view_content($user, $theid);

    }

    /******************************************************************************************

		display_delete

		******************************************************************************************/

    function display_delete_listing($user, $theid){

      print "<div id='forms'><div id='content'>

      <table cellpadding='0' cellspacing='0' width='100%'>

      <tr><th class='record_head' colspan='2'>Delete Date/Time Listing?</th></tr>

      <tr><td>

      <form id='delete_id' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">

      <input type='hidden' name='the_action' value='submitok' />

      <input type='hidden' name='theid' value='$theid' />

      <input type='hidden' name='formprocess' value='yes' />

      <select name='choice' class='required'>

      <option value='no'>No, do not delete the Date/Time Listing?</option>

      <option value='yes'>Yes, delete the Date/Time Listing?</option>

      </select>

      <input type='submit' name='submitexitok' value='Submit' onclick=\"clicked='submitexitok'\"/>

      </form>

      </table>

      </div></div>

      <script>new FormValidator ('delete_id', {

        onFormValidate: function(pass, form){ 

          if(pass==true){;

            form.submitexitok.disabled=true;

          }

        }

      });</script>";

    }

		/******************************************************************************************

		display_edit

		******************************************************************************************/

    function display_edit($theid=0, $ret_code=0){

      if($ret_code==0){

      }else if($ret_code==1){

        print "<div id='records'><table width='100%'>

        <tr><th class='notice_record_head'>The event has been saved.</th></tr>

        </table></div>";

      }

      //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE

        $sql = "SELECT * FROM ".$this->config->db_prefix."_events WHERE

                ".$this->config->db_prefix."_events.id = $theid LIMIT 1";

        $result=$this->db->DB_Q_C($sql);

        $row = mysql_fetch_array($result);

      //GRAB OUR DATA FOR EACH DATE/TIME FOR THIS EVENT

        $sql = "SELECT * FROM ".$this->config->db_prefix."_events_data WHERE

                ".$this->config->db_prefix."_events_data.event_id = $theid 

                ORDER BY event_date ASC";

        $result1=$this->db->DB_Q_C($sql);

        $id_array = array();

        $date_array = array();

        $time_array = array();

        $duration_array = array();

        while($row1 = mysql_fetch_array($result1)){

          $tmp = explode(" ", $row1['event_date']);

          array_push($id_array, $row1[0]);

          $tmp_date = explode("-", $tmp[0]);

          array_push($date_array, $tmp_date[1]."/".$tmp_date[2]."/".$tmp_date[0]);

          array_push($time_array, $tmp[1]);

          array_push($duration_array, $row1['duration']);

        }

        $this->create_form(stripslashes($row['title']), stripslashes($row['body']), stripslashes($row['summary']), count($date_array), $id_array, $date_array, $time_array, $duration_array, $theid);

    }

		/******************************************************************************************

		display_create

		******************************************************************************************/

    function display_create($theid=0, $ret_code=0){

      $this->create_form();

    }

		/******************************************************************************************

		create_form - displays the form to create a news article

		******************************************************************************************/

    function create_form($title="", $body="", $summary="", $event_count=0, $id_array=array(), $date_array=array(), $time_array=array(), $duration_array=array(), $theid=0){

       print "<div id='forms'><div id='content'>

        <form name='create_events' id='create_events' method='post' action='' onSubmit=\"this.the_action.value=clicked;\">

        <input type='hidden' name='the_action' value='submitok' />

        <input type='hidden' name='theid' value='$theid' />

        <input type='hidden' name='formprocess' value='yes' />

        <table width='100%' cellspacing='0' cellpadding='0'>

        <tr><th class='record_head' colspan='2'>Event Submission Form</th></tr>

        <tr><td colspan='2'>Please fill in required fields below and click <b>Save Event</b> to enter your content into the system.</td></tr>";

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

  				//ADD EVENT INFORMATION

  				   print "<tr><th>Event</th><td>";

          //CHECK TO SEE IF WE ARE EDITING A RECORD

            if($theid>0){

              print "<div id='new_events'>";

              $current_event = 1;

              for($i=0;$i<$event_count;$i++){

                $tmp = explode(":",$time_array[$i]);

                $time_hours = $tmp[0];

                $time_minutes = $tmp[1];

                $tmp = explode(":",$duration_array[$i]);

                $duration_hours = $tmp[0];

                $duration_minutes = $tmp[1];

                print "

                        <input type='hidden' name='event_date_".$current_event."_id' value='".$id_array[$i]."' />

                        <table>

                          <tr>

                            <th colspan='2'>

                              Date/Time $current_event 

                              <a href='?pid=".$this->id."&amp;cid=5&amp;theid=".$id_array[$i]."' class='toolTipElement' title='Remove Date/Time Listing::Removes this Date/Time Listing.'><img src='images/delete.png' alt='delete' /></a>

                            </th>

                          </tr>

                          <tr>

                            <th>

                              Date

                            </th>

                            <td>

                              <input type='text' class='DatePicker' id='event_date_$current_event' name='event_date_$current_event' value='".$date_array[$i]."' maxlength='10' />

                            </td>

                          </tr>

                          <tr>

                            <th>

                              Time

                            </th>

                            <td>

                              <select name='time_hours_$current_event'>

                  				      ".$this->printHours($time_hours)."

                  				    </select>

                  				    <select name='time_minutes_$current_event'>

                  				      ".$this->printMinutes($time_minutes)."

                  				    </select>

                            </td>

                          </tr>

                          <tr>

                            <th>

                              Duration

                            </th>

                            <td>

                              <select name='duration_hours_$current_event'>

                  				      ".$this->printDurationHours($duration_hours)."

                  				    </select>

                  				    <select name='duration_minutes_$current_event'>

                  				      ".$this->printDurationMinutes($duration_minutes)."

                  				    </select>

                            </td>

                          </tr>

                        </table>

                      <div id='add_days_$current_event'>

                    

                      </div>

                 ";

                $current_event++;

              }

              print "</div>

               <input type='button' onclick='addDay();' value='add another date/time'/>";

              print "

                  <input type='hidden' id='event_num' name='event_num' value='$event_count' />

                  ";

            }else{

              //WE ARE CREATNG A NEW EVENT

                print "

                  <input type='hidden' id='event_num' name='event_num' value='1' />

                  <div id='new_events'><div id='add_days_0'></div></div>

                 <input type='button' onclick='addDay();' value='add another date/time'/>";

            }

  				   print "</td></tr>";

  				//SUBMIT

  					print "<tr><th colspan='2' align='right'><input type='submit' name='submitok' value='Save Event' onclick=\"clicked='submitok'\"/>

            <input type='submit' name='submitexitok' value='Save Event & Exit' onclick=\"clicked='submitexitok'\"/></th></tr>

              </table>

              </form>

              </div></div>

              <script>new FormValidator ('create_events', {

                  onFormValidate: function(pass, form){ 

                    if(pass==true){

                      form.submitok.disabled=true;

                      form.submitexitok.disabled=true;

                    }

                  }

                });</script>";

        if($theid>0){

          print "<script>

                    var event_count = $event_count;

                    function addDay(){

                      event_count++;

                      var old = event_count;

                      $('event_num').value=event_count;

                      $('add_days_'+(old-1)).innerHTML+= \"<a name='e_\"+event_count+\"'></a><table><tr><th colspan='2'>Date/Time  \"+old+\"</th></tr><tr><th>Date</th><td><input type='text' class='DatePicker' id='event_date_\"+event_count+\"' name='event_date_\"+event_count+\"' value='".$date_array[0]."' /></td></tr><tr><th>Time</th><td><select name='time_hours_\"+event_count+\"'>".$this->printHours($time_hours)."</select><select name='time_minutes_\"+event_count+\"'>".$this->printMinutes($time_minutes)."</select></td></tr><tr><th>Duration</td><td><select name='duration_hours_\"+event_count+\"'>".$this->printDurationHours($duration_hours)."</select><select name='duration_minutes_\"+event_count+\"'>".$this->printDurationMinutes($duration_minutes)."</select></td></tr></table><div id='add_days_\"+event_count+\"'></div>\";

                      $$('input.DatePicker').each( function(el){

            						new DatePicker(el);

            					});

            					window.location='#e_'+event_count;

                    }

                  </script>";

        }else{

          print "

                  <script>

                    var event_count = $event_count;

                    addDay();

                    function addDay(){

                      var old = event_count;

                      event_count++;

                      $('event_num').value=event_count;

                      $('add_days_'+old).innerHTML+= \"<a name='e_\"+event_count+\"'></a><table><tr><th colspan='2'>Date/Time \"+(old+1)+\"</th></tr><tr><th>Date</th><td><input type='text' class='DatePicker' id='event_date_\"+event_count+\"' name='event_date_\"+event_count+\"' value='".date('m/d/Y')."' maxlength='10' /></td></tr><tr><th>Time</th><td><select name='time_hours_\"+event_count+\"'>".$this->printHours($time_hours)."</select><select name='time_minutes_\"+event_count+\"'>".$this->printMinutes($time_minutes)."</select></td></tr><tr><th>Duration</th><td><select name='duration_hours_\"+event_count+\"'>".$this->printDurationHours($duration_hours)."</select><select name='duration_minutes_\"+event_count+\"'>".$this->printDurationMinutes($duration_minutes)."</select></td></tr></table><div id='add_days_\"+event_count+\"'></div>\";

                      $$('input.DatePicker').each( function(el){

            						new DatePicker(el);

            					});

            					window.location='#e_'+event_count;

                    }

                  </script>";

        }

    }

    /******************************************************************************************

		printHours

		******************************************************************************************/

		function printHours($hour){

		  $hour_list = array("12 am", "1 am", "2 am", "3 am", "4 am", "5 am", "6 am", "7 am", "8 am", "9 am", "10 am", "11 am", 

                        "12 pm", "1 pm", "2 pm", "3 pm", "4 pm", "5 pm", "6 pm", "7 pm", "8 pm", "9 pm", "10 pm", "11 pm");

		  $val_list = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", 

                        "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");

      for($i=0;$i<count($hour_list);$i++){

        if($hour==$val_list[$i]){

          $ret.="<option selected='selected' value='".$val_list[$i]."'>".$hour_list[$i]."</option>";

        }else{

          $ret.="<option value='".$val_list[$i]."'>".$hour_list[$i]."</option>";

        }

      }

      return $ret;

    }

    /******************************************************************************************

		printDurationHours

		******************************************************************************************/

		function printDurationHours($hour){

		  $hour_list = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");

      for($i=0;$i<count($hour_list);$i++){

        if($hour==$hour_list[$i]){

          $ret.="<option selected='selected' value='".$hour_list[$i]."'>".$hour_list[$i]." hrs</option>";

        }else{

          $ret.="<option value='".$hour_list[$i]."'>".$hour_list[$i]." hrs</option>";

        }

      }

      return $ret;

    }

    /******************************************************************************************

		printminutes

		******************************************************************************************/

		function printMinutes($min){

		  $min_list = array("00", "15", "30", "45");

      for($i=0;$i<count($min_list);$i++){

        if($min==$min_list[$i]){

          $ret.="<option selected='selected' value='".$min_list[$i]."'>:".$min_list[$i]."</option>";

        }else{

          $ret.="<option value='".$min_list[$i]."'>:".$min_list[$i]."</option>";

        }

      }

      return $ret;

    }

    /******************************************************************************************

		printminutes

		******************************************************************************************/

		function printDurationMinutes($min){

		  $min_list = array("0", "15", "30", "45");

      for($i=0;$i<count($min_list);$i++){

        if($min==$min_list[$i]){

          $ret.="<option selected='selected' value='".$min_list[$i]."'>".$min_list[$i]." mins</option>";

        }else{

          $ret.="<option value='".$min_list[$i]."'>".$min_list[$i]." mins</option>";

        }

      }

      return $ret;

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

        //REMOVE OUR EVENT

          $sql = "DELETE FROM ".$this->config->db_prefix."_events WHERE id = $theid";

          $result=$this->db->DB_Q_C($sql);

        //REMOVE OUR EVENTS DATA

          $sql = "DELETE FROM ".$this->config->db_prefix."_events_data WHERE event_id = $theid";

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

      }else{

        //RETURN CODE - NO DELETE

          $ret_code[0] = -2;

      }

      return $ret_code;

    }

    /******************************************************************************************

		process_delete

		******************************************************************************************/

    function process_delete_listing($user, $theid){

      $ret_code = array(0,0);

      if($_REQUEST['choice']=="yes"){

        //CREATE A UNIX TIMESTAMP

					$stamp = time();

					$date = gmdate("Y-m-d H:i:s", $stamp);

        //REMOVE OUR EVENTS DATA

          $sql = "DELETE FROM ".$this->config->db_prefix."_events_data WHERE id = $theid";

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

      }else{

        //RETURN CODE - NO DELETE

          $ret_code[0] = -2;

      }

      return $ret_code;

    }

    /******************************************************************************************

		process_create

		******************************************************************************************/

    function process_create($user){

      $ret_code = array(0,0);

      //GRAB OUR POST DATA

        $title = addslashes($_REQUEST['title']);

  			$body = addslashes($_REQUEST['body']);

  			$summary = addslashes($_REQUEST['summary']);

  			//GRAB THE NUMBER OF DATE/TIMES TIED TO THIS EVENT

          $total_events = $_REQUEST['event_num'];

          $date_array = array();

          $time_array = array();

          $duration_array = array();

          $current_event = 1;

        //CYCLE THROUGH ALL OF OUR EVENT DATES AND STORE THEIR DATA IN AN ARRAY

          for($i=0;$i<$total_events;$i++){

    	      $tmp = explode("/", $_REQUEST['event_date_'.$current_event]);

    	      $date_array[$i]=$tmp[2]."/".$tmp[0]."/".$tmp[1];

            $time_array[$i]=$_REQUEST['time_hours_'.$current_event].":".$_REQUEST['time_minutes_'.$current_event];

            $duration_array[$i]=$_REQUEST['duration_hours_'.$current_event].":".$_REQUEST['duration_minutes_'.$current_event];

            $current_event++;

            //echo $date_array[$i]." ".$time_array[$i]." for ".$duration_array[$i];

          }

      //CREATE A UNIX TIMESTAMP

				$stamp = time();

				$date = gmdate("Y-m-d H:i:s", $stamp);

			//INSERT INTO OUR EVENT OBJECT

       	$sql = "INSERT INTO ".$this->config->db_prefix."_events(title, body, summary) 

    					   VALUES('$title', '$body', '$summary')";

        $results=$this->db->DB_Q_C($sql);

    		$lastid = mysql_insert_id();

    	//INSERT ALL ARE EVENT DATES/TIMES

    	  for($i=0;$i<count($date_array);$i++){

          	$sql = "INSERT INTO ".$this->config->db_prefix."_events_data(event_id, event_date, duration, tz) 

    					   VALUES('$lastid', '$date_array[$i] $time_array[$i]', '$date_array[$i] $duration_array[$i]', '$user->user_timezone')";

            $results=$this->db->DB_Q_C($sql);

        }

      //LOG THE ACTION

    	  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 

    					   VALUES('$date', '$user->user_id')";

    		$results=$this->db->DB_Q_C($sql);

    		$lastobjectid = mysql_insert_id();

    	  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)

                VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 1, $lastid, 1)";

        $results=$this->db->DB_Q_C($sql);

      //SET THE RETURN CODE TO SUCCESS, AND ALSO STORE THE ID

        $ret_code[0] = 1;

        $ret_code[1] = $lastid;

        return $ret_code; 	

    }

    /******************************************************************************************

		process_edit

		******************************************************************************************/

    function process_edit($user, $theid){

        $ret_code = array(0,$theid);

      //GRAB OUR POST DATA

        $title = addslashes($_REQUEST['title']);

  			$body = addslashes($_REQUEST['body']);

  			$summary = addslashes($_REQUEST['summary']);

  			//GRAB THE NUMBER OF DATE/TIMES TIED TO THIS EVENT

          $total_events = $_REQUEST['event_num'];

          $id_array = array();

          $date_array = array();

          $time_array = array();

          $duration_array = array();

          $current_event = 1;

        //CYCLE THROUGH ALL OF OUR EVENT DATES AND STORE THEIR DATA IN AN ARRAY

          for($i=0;$i<$total_events;$i++){

    	      $tmp = explode("/", $_REQUEST['event_date_'.$current_event]);

    	      $id_array[$i] = $_REQUEST['event_date_'.$current_event.'_id'];

    	      $date_array[$i]=$tmp[2]."-".$tmp[0]."-".$tmp[1];

            $time_array[$i]=$_REQUEST['time_hours_'.$current_event].":".$_REQUEST['time_minutes_'.$current_event].":00";

            $duration_array[$i]=$_REQUEST['duration_hours_'.$current_event].":".$_REQUEST['duration_minutes_'.$current_event].":00";

            $current_event++;

            //echo $date_array[$i]." ".$time_array[$i]." for ".$duration_array[$i];

          }

			//CREATE A UNIX TIMESTAMP

				$stamp = time();

				$date = gmdate("Y-m-d H:i:s", $stamp);

     	//UPDATE OUR EVENTS OBJECT

				$sql = "UPDATE ".$this->config->db_prefix."_events

                SET title = '$title', body = '$body', summary = '$summary'

                WHERE id = $theid";

				$results=$this->db->DB_Q_C($sql);

			//UPDATE ALL ARE EVENT DATES/TIMES

    	  for($i=0;$i<count($date_array);$i++){

    	     if($id_array[$i]==""){

              $sql = "INSERT INTO ".$this->config->db_prefix."_events_data(event_id, event_date, duration, tz) 

    					   VALUES('$theid', '$date_array[$i] $time_array[$i]', '$date_array[$i] $duration_array[$i]', '$user->user_timezone')";

              $results=$this->db->DB_Q_C($sql);

           }else{

              $sql = "UPDATE ".$this->config->db_prefix."_events_data

                      SET 

                        event_date = '$date_array[$i] $time_array[$i]', 

                        duration = '$date_array[$i] $duration_array[$i]',

                        tz = '$user->user_timezone'

                      WHERE id = ".$id_array[$i];

              $results=$this->db->DB_Q_C($sql);

           } 

           //echo $sql."<br/></br>";

        }

			//LOG THE ACTION

			  $sql = "INSERT INTO ".$this->config->db_prefix."_object(create_date, create_who) 

							   VALUES('$date', '$user->user_id')";

				$results=$this->db->DB_Q_C($sql);

				$lastobjectid = mysql_insert_id();

			  $sql = "INSERT INTO ".$this->config->db_prefix."_logs(object_id, user_id, module_id, sub_module_id, record_id, action)

                VALUES($lastobjectid, '".$user->user_id."', '".$this->id."', 1, $theid, 2)";

        $results=$this->db->DB_Q_C($sql);

      //SET THE RETURN CODE TO SUCCESS

		   $ret_code[0] = 1;

       return $ret_code;

    }

		/******************************************************************************************

		menu - displays the menu for this module

		******************************************************************************************/

		function menu($user, $pid){

		  $content = "";

      if($user->user_perms[$this->id-1][0]==1){

        if($pid==$this->id){

          $content = "<li id='menu_".$this->id."_style' class='active_module'><a id='menu_".$this->id."' name='menu_".$this->id."' class='toolTipElement' title='Events Section::View, Edit or Delete Events'  href='#'>events</a></li>";

        }else{

          $content = "<li id='menu_".$this->id."_style'><a id='menu_".$this->id."' name='menu_".$this->id."' class='toolTipElement' title='Events Section::View, Edit or Delete Events' href='#'>events</a></li>";

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

          $content .= "<li class='active_module'><a class='toolTipElement' title='View Events::View all events in the system.' href='?pid=$this->id&amp;cid=0'>view</a></li>";

        }else{

          $content .= "<li><a class='toolTipElement' title='View Events::View all events in the system.' href='?pid=$this->id&amp;cid=0'>view</a></li>";

        }

        if($user->user_perms[$this->id-1][1]==1){

          if($cid==1 && $pid == $this->id){

            $content .= "<li class='active_module'><a class='toolTipElement' title='Create Events::Create an event.' href='?pid=$this->id&amp;cid=1'>create</a></li>";

          }else{

            $content .= "<li><a class='toolTipElement' title='Create Events::Create an event.' href='?pid=$this->id&amp;cid=1'>create</a></li>";

          }

        }

        if($cid==100 && $pid == $this->id){

          $content .= "<li class='active_module'><a class='toolTipElement' title='Further Help::Learn more about the events seciton of your site.' href='?pid=$this->id&amp;cid=100'>help</a></li>";

        }else{

          $content .= "<li><a class='toolTipElement' title='Further Help::Learn more about the events seciton of your site.' href='?pid=$this->id&amp;cid=100'>help</a></li>";

        }

		    $content.= "</ul></div>";

      }

      return $content; 

		}

		/******************************************************************************************

		view_content

		******************************************************************************************/

    function view_content($user, $theid){

       //GRAB THE DATA FOR THIS RECORD FROM THE DATABASE

          $sql = "SELECT * FROM ".$this->config->db_prefix."_events, ".$this->config->db_prefix."_user WHERE

                  ".$this->config->db_prefix."_events.id = $theid 

                  LIMIT 1";

          $result=$this->db->DB_Q_C($sql);

          $row = mysql_fetch_array($result);

       //

         $sql = "SELECT * FROM ".$this->config->db_prefix."_events_data 

                    WHERE event_id = ".$row[0]." 

                    ORDER BY event_date ASC";

          $results3 = $this->db->DB_Q_C($sql);

          $total_dates = mysql_affected_rows();

          $more_dates = "";

          $check_date = date('Y-m-d');

          while($row3=mysql_fetch_array($results3)){

            $tmp1 = explode(" ", $row3['event_date']);

            //ADD OUR START DATE'S TIME WITH THE DURATION OF THE EVENT TO GET THE END TIME

              $tmp_start = explode(":", $tmp1[1]);

              $tmp_end = explode(":", $row3['duration']);

                $tmp_min = $tmp_start[1]+$tmp_end[1];

                $tmp_hour1 = $tmp_start[0]+$tmp_end[0];

                $tmp_hour = floor($tmp_min/60)+$tmp_hour1;

                if($tmp_hour<10){

                  $tmp_hour = "0$tmp_hour";

                }

                $tmp_min = (($tmp_min/60)-$tmp_hour_add)*60;

              $tmp3 = $tmp_hour.":".$tmp_min.":00";

              $end_time = $tmp1[0]." ".$tmp3;

            //CONVERT OUR DATES FOR DISPLAy

              if($user->user_timezone!=$row3['tz']){

                $tmp_date = $this->time->convertTime($user->user_timezone, $row3['event_date']);

                $event_date = DateFormat($tmp_date, "l m/d/Y");

                $time_start = DateFormat($tmp_date, "g:ia");

                $tmp_date = $this->time->convertTime($user->user_timezone, $end_time);

                $time_end = DateFormat($tmp_date, "g:ia");

              }else{

                $event_date = DateFormat($row3['event_date'], "l m/d/Y");

                $time_start = DateFormat($row3['event_date'], "g:ia");

                $time_end = DateFormat($end_time, "g:ia");

              }

            //

              if($row3['event_date']>=$check_date){

                if($time_start==$time_end){

                  $time_str = $time_start;

                }else{

                  $time_str = "$time_start - $time_end";

                }

                $more_dates.= "<a href='#' class='toolTipElement' title='$event_date::$time_str'><img src='images/calendar_view_day.png' /></a>";

              }else{

                $more_dates.= "<a href='#' class='toolTipElement' title='$event_date::This event has expired.'><img src='images/calendar_view_day_expired.png' /></a>";

              }

          }

       print "<div id='forms'><div id='content'>

       <table cellpadding='0' cellspacing='0' width='100%'>

       <tr><th class='record_head' colspan='2'>Event</th></tr>

       <tr><td colspan='2'>The details of this event are below.</td></tr>

       <tr><th>Title</th><td>".stripslashes($row['title'])."</td></tr>

       <tr><th>Body</th><td>".stripslashes($row['body'])."</td></tr>

       <tr><th>Summary</th><td>".stripslashes($row['summary'])."</td></tr>

       <tr><th>Event Date</th><td>$more_dates</td></tr>

       </table>";

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

		view - view entries in the database, in a table format

		******************************************************************************************/

		function view($user, $ret_code=0, $start=0, $limit=10){   

        print "<div id='records'><div id='content'>"; 

        /******************************************************************************************

    		EXPIRED EVENTS

    		******************************************************************************************/

          print "<table cellpadding='0' cellspacing='0'>

          <tr><th colspan='5' class='record_head'>Expired Events</th></tr>";

          $sql = "SELECT * FROM ".$this->config->db_prefix."_events 

                  WHERE

                    ".$this->config->db_prefix."_events.id NOT IN

                    (

                      SELECT event_id 

                      FROM ".$this->config->db_prefix."_events_data 

                      WHERE 

                        event_date >= '".date('Y-m-d')."'

                    ) 

                  ORDER BY (

                              SELECT event_date 

                              FROM ".$this->config->db_prefix."_events_data 

                              WHERE 

                                event_id = ".$this->config->db_prefix."_events.id

                              ORDER BY event_date DESC LIMIT 1 

                            ) ASC";

          $results = $this->db->DB_Q_C($sql);

          $count = mysql_affected_rows();

          //COUNT ALL THE RECORDS IN THE SYSTEM

          $sql = "SELECT * FROM ".$this->config->db_prefix."_events 

                  WHERE

                    ".$this->config->db_prefix."_events.id NOT IN

                    (

                      SELECT event_id 

                      FROM ".$this->config->db_prefix."_events_data 

                      WHERE 

                        event_date >= '".date('Y-m-d')."'

                    ) 

                  ORDER BY (

                              SELECT event_date 

                              FROM ".$this->config->db_prefix."_events_data 

                              WHERE 

                                event_id = ".$this->config->db_prefix."_events.id

                              ORDER BY event_date DESC LIMIT 1 

                            ) ASC

                  LIMIT $start, $limit";

          $results2 = $this->db->DB_Q_C($sql);

          $total = mysql_affected_rows();

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

                    <td width='23'><a class='toolTipElement' title='View Details::View details about the event.' href='?pid=".$this->id."&amp;cid=2&amp;theid=".$row[0]."'><img src='images/preview.png' border='0' alt='view' /></a></td>";

              //

                if($user->user_perms[$this->id-1][2]==1){

                  print "<td width='23'><a class='toolTipElement' title='Edit Events::Edit this event.' href='?pid=".$this->id."&amp;cid=3&amp;theid=".$row[0]."'><img src='images/edit.png' border='0' alt='' /></a></td>";

                }else{

                  print "<td width='23'><img src='images/edit_disabled.png' border='0' alt='' /></td>";

                }

              //

                if($user->user_perms[$this->id-1][3]==1){

                  print "<td width='23'><a class='toolTipElement' title='Delete Events::Delete this event from the system.' href='?pid=".$this->id."&amp;cid=4&amp;theid=".$row[0]."'><img src='images/delete.png' border='0' alt='' /></a></td>";

                }else{

                  print "<td width='23'><img src='images/delete_disabled.png' border='0' alt='' /></td>";

                }

              print "</tr>";

            }

            if($count>1){

              print "<tr><th colspan='5' class='record_footer'>There are a total of <b>$total</b> records in the system</th></tr>";

            }else{

              print "<tr><th colspan='5' class='record_footer'>There is <b>$total</b> record in the system</th></tr>";

            }

          }else{

            print "<tr><td colspan='5'>There are no expired events in the system.</td></tr>";

          }

        print "</table>";

    		/******************************************************************************************

    		ACTIVE/UPCOMING EVENTS

    		******************************************************************************************/

          print "<table cellpadding='0' cellspacing='0'>

          <tr><th colspan='6' class='record_head'>Active/Upcoming Events</th></tr>";

          $sql = "SELECT * FROM ".$this->config->db_prefix."_events 

                  WHERE

                    ".$this->config->db_prefix."_events.id IN

                    (

                      SELECT event_id 

                      FROM ".$this->config->db_prefix."_events_data 

                      WHERE 

                        event_date >= '".date('Y-m-d')."'

                    ) 

                  ORDER BY (

                              SELECT event_date 

                              FROM ".$this->config->db_prefix."_events_data 

                              WHERE 

                                event_id = ".$this->config->db_prefix."_events.id

                              ORDER BY event_date DESC LIMIT 1 

                            ) ASC

                  LIMIT $start, $limit";

          $results = $this->db->DB_Q_C($sql);

          $count = mysql_affected_rows();

          //COUNT ALL THE RECORDS IN THE SYSTEM

          $sql = "SELECT * FROM ".$this->config->db_prefix."_events 

                  WHERE

                    ".$this->config->db_prefix."_events.id IN

                    (

                      SELECT event_id 

                      FROM ".$this->config->db_prefix."_events_data 

                      WHERE 

                        event_date >= '".date('Y-m-d')."'

                    ) 

                  ORDER BY (

                              SELECT event_date 

                              FROM ".$this->config->db_prefix."_events_data 

                              WHERE 

                                event_id = ".$this->config->db_prefix."_events.id

                              ORDER BY event_date DESC LIMIT 1 

                            ) ASC

                  LIMIT $start, $limit";

          $results2 = $this->db->DB_Q_C($sql);

          $total = mysql_affected_rows();

          if($count>0){

            print "<tr><th>Title</th><th>Event Date/Times</th><th colspan='3'>Options</th></tr>";

          $check_date = date('Y-m-d');

            while($row=mysql_fetch_array($results)){

              if($striper){

                $effect = "class='odd' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='odd'\"";

              }else{

                $effect = "class='even' onMouseOver=\"this.className='over'\" onMouseout=\"this.className='even'\"";             

              }

              $striper=!$striper;

              //COUNT THE NUMBER OF THE EVENT DATES

                //IF MORE THEN ONE DISPLAY EARLIEST TO THE LATEST

                  $sql = "SELECT * FROM ".$this->config->db_prefix."_events_data 

                            WHERE event_id = ".$row[0]." 

                            ORDER BY event_date ASC";

                  $results3 = $this->db->DB_Q_C($sql);

                  $total_dates = mysql_affected_rows();

                  $more_dates = "";

                  while($row3=mysql_fetch_array($results3)){

                    $tmp1 = explode(" ", $row3['event_date']);

                    //ADD OUR START DATE'S TIME WITH THE DURATION OF THE EVENT TO GET THE END TIME

                      $tmp_start = explode(":", $tmp1[1]);

                      $tmp_end = explode(":", $row3['duration']);

                        $tmp_min = $tmp_start[1]+$tmp_end[1];

                        $tmp_hour1 = $tmp_start[0]+$tmp_end[0];

                        $tmp_hour = floor($tmp_min/60)+$tmp_hour1;

                        if($tmp_hour<10){

                          $tmp_hour = "0$tmp_hour";

                        }

                        $tmp_min = (($tmp_min/60)-$tmp_hour_add)*60;

                      $tmp3 = $tmp_hour.":".$tmp_min.":00";

                      $end_time = $tmp1[0]." ".$tmp3;

                    //CONVERT OUR DATES FOR DISPLAy

                      if($user->user_timezone!=$row3['tz']){

                        $tmp_date = $this->time->convertTime($user->user_timezone, $row3['event_date']);

    		                $event_date = DateFormat($tmp_date, "l m/d/Y");

    		                $time_start = DateFormat($tmp_date, "g:ia");

    		                $tmp_date = $this->time->convertTime($user->user_timezone, $end_time);

    		                $time_end = DateFormat($tmp_date, "g:ia");

                      }else{

                        $event_date = DateFormat($row3['event_date'], "l m/d/Y");

    		                $time_start = DateFormat($row3['event_date'], "g:ia");

    		                $time_end = DateFormat($end_time, "g:ia");

                      }

  		              //

  		                if($row3['event_date']>=$check_date){

  		                  if($time_start==$time_end){

  		                    $time_str = $time_start;

                        }else{

  		                    $time_str = "$time_start - $time_end";

                        }

                        $more_dates.= "<a href='#' class='toolTipElement' title='$event_date::$time_str'><img src='images/calendar_view_day.png' /></a>";

                      }else{

                        $more_dates.= "<a href='#' class='toolTipElement' title='$event_date::This event has expired.'><img src='images/calendar_view_day_expired.png' /></a>";

                      }

  		                //$more_dates.= "<a href='#' class='toolTipElement' title='$event_date::$time_start - $time_end'><img src='images/calendar_view_day.png' /></a>";

                  }

                  //$more_dates.=" - <i>$total_dates</i>";

              print "<tr $effect>

                    <td>".stripslashes($row['title'])."</td>

                    <td>$more_dates</td>

                    <td width='23'><a class='toolTipElement' title='View Details::View details about the event.' href='?pid=".$this->id."&amp;cid=2&amp;theid=".$row[0]."'><img src='images/preview.png' border='0' alt='view' /></a></td>

                    <td width='23'><a class='toolTipElement' title='Edit Events::Edit this event.' href='?pid=".$this->id."&amp;cid=3&amp;theid=".$row[0]."'><img src='images/edit.png' border='0' alt='' /></a></td>

                    <td width='23'><a class='toolTipElement' title='Delete Events::Delete this event from the system.' href='?pid=".$this->id."&amp;cid=4&amp;theid=".$row[0]."'><img src='images/delete.png' border='0' alt='' /></a></td>

                    </tr>";

            }

            if($total>$count){

              $name = array("pid", "cid");

              $data = array($_REQUEST['pid'], $_REQUEST['cid']); 

              pageNav($start, $limit, $total, $name, $data);

              print "<tr><th colspan='5' class='record_footer'>

              Showing $count out of a total of <b>$total</b> records in the system</th></tr>";

            }else{

              if($count>1){

                print "<tr><th colspan='6' class='record_footer'>There are a total of <b>$total</b> records in the system</th></tr>";

              }else{

                print "<tr><th colspan='6' class='record_footer'>There is <b>$total</b> record in the system</th></tr>";

              }

            }      

          }else{

            print "<tr><td>There are no events in the system.</td></tr>";

            }

        print "</table>";

        print "</div></div>";

		}

    /******************************************************************************************

		about

		******************************************************************************************/

    function about(){ 

      print "<div id='forms'><div id='content'>";

      print "<h1>Events FAQ (Frequently Asked Questions)</h1>";

      print "<div id='about'>";

        print "<ul>";

          print "<li><a href='#1'>Events</a></li>";

        print "</ul>";

      print "</div></div></div>"; 

    }

	}

?>

