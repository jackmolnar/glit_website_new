<?php
  	class face_events{
		/******************************************************************************************
		CLASS VARIABLES
		******************************************************************************************/
		var $id;
		var $config;
		var $time;
		var $db;
		/******************************************************************************************
		face_events - constructor, initialize all variables. 
		******************************************************************************************/
		function face_events($db, $cfg, $t, $module_name="class_events"){
		  //STORE THE DATABASE
		    $this->db = $db;
		  //STORE THE SITES CONFIG SETTINGS
		    $this->config = $cfg;
		  //STORE THE TIME OBJECT
		    $this->time = $t;
		  //STORE THE ID OF THIS MODULE
		    $sql = "SELECT * FROM ".$this->config->db_prefix."_modules WHERE name = '$module_name'";
		    $result = $this->db->DB_Q_C($sql);
		    if(mysql_affected_rows()>0){
		      $this->id = mysql_result($result,0,'id'); 
        };
		}
		/******************************************************************************************	
		view_events -
		******************************************************************************************/
		function view_events($id){
      $events = array();
		  $sql = "SELECT * FROM 
                  ".$this->config->db_prefix."_events 
              WHERE
                ".$this->config->db_prefix."_events.id = $id";
      //GRAB OUR RESULT SET
        $results = $this->db->DB_Q_C($sql);
        $count = mysql_affected_rows();
      //
        if($count>0){
          while($row = mysql_fetch_array($results)){
            //PACK UP OUR ARRAY
              $events[0] = array("title" => stripslashes($row['title']), 
                                "body" => stripslashes($row['body']), 
                                "sum" => stripslashes($row['summary']));
          }
        }else{
          //NO RECORDS WERE FOUND
        }
      return $events;
		}
		/******************************************************************************************	
		view_month_events -
		******************************************************************************************/
		function view_month_events($year, $month, $start=0, $limit=-1){
      $events = array();
		  $date = "$year-$month-1";
		  $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		  $end_date = "$year-$month-$days";
		  /*$sql = "SELECT * FROM ".$this->config->db_prefix."_events 
                  WHERE
                    ".$this->config->db_prefix."_events.id IN
                    (
                      SELECT event_id 
                      FROM ".$this->config->db_prefix."_events_data 
                      WHERE 
                        event_date >= '$date' && 
                        event_date < '$end_date'
                    ) 
                  ORDER BY (
                              SELECT event_date 
                              FROM ".$this->config->db_prefix."_events_data 
                              WHERE 
                                event_id = ".$this->config->db_prefix."_events.id
                              ORDER BY event_date DESC LIMIT 1 
                            ) ASC";*/
      $sql = "SELECT * FROM ".$this->config->db_prefix."_events_data 
              WHERE 
                    event_date >= '$date' && 
                    event_date < '$end_date'
              ORDER BY event_date ASC";
      //TOTALS
        $totals = $this->getTotalFromQuery($sql); 
      if($limit>0){
        $sql.= " LIMIT $start, $limit";
      }
      //GRAB OUR RESULT SET
        $results = $this->db->DB_Q_C($sql);
        $count = mysql_affected_rows();
      //
        if($count>0){
          $pos = 0;
          while($row = mysql_fetch_array($results)){
            //PACK UP OUR ARRAY
              $tmp = explode(" ", $row['event_date']);
              $date = $tmp[0];
              $start_time = $tmp[1];
              //ADD OUR START DATE'S TIME WITH THE DURATION OF THE EVENT TO GET THE END TIME
                $tmp_start = explode(":", $tmp[1]);
                $tmp_end = explode(":", $row['duration']);
                  $tmp_min = $tmp_start[1]+$tmp_end[1];
                  $tmp_hour1 = $tmp_start[0]+$tmp_end[0];
                  $tmp_hour = floor($tmp_min/60)+$tmp_hour1;
                  if($tmp_hour<10){
                    $tmp_hour = "0$tmp_hour";
                  }
                  $tmp_min = (($tmp_min/60)-$tmp_hour_add)*60;
                $tmp3 = $tmp_hour.":".$tmp_min.":00";
                $end_time = $tmp[0]." ".$tmp3;
              //
                $sql = "SELECT * FROM ".$this->config->db_prefix."_events WHERE id = ".$row['event_id'];
                $results1 = $this->db->DB_Q_C($sql);
                $row1 = mysql_fetch_array($results1);
              //   
                $events[$pos] = array("title" => stripslashes($row1['title']), 
                                  "body" => stripslashes($row1['body']), 
                                  "sum" => stripslashes($row1['summary']),
                                  "date" => $row['event_date'],  
                                  "start_time" => $row['event_date'], 
                                  "end_time" => $end_time, 
                                  "duration" => $row['duration'],
                                  "tz" => $row['tz'], 
                                  "id" => $row[0], 
                                  "event_id" => $row['event_id'], 
                                  "totals" => $totals, 
                                  "type" => "event");
              $pos++;
          }
        }else{
          //NO RECORDS WERE FOUND
        }
      return $events;
    }
    /******************************************************************************************
    getTotalFromQuery 
		******************************************************************************************/
		function getTotalFromQuery($sql){
        $results = $this->db->DB_Q_C($sql);
        return mysql_affected_rows();
    }
  }
?>
