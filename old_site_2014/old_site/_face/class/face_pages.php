<?php
  	class face_pages{
		/******************************************************************************************
		CLASS VARIABLES
		******************************************************************************************/
		var $id;
		var $config;
		var $time;
		var $db;
		/******************************************************************************************
		face_news - constructor, initialize all variables. 
		******************************************************************************************/
		function face_pages($db, $cfg, $t, $module_name="class_page"){
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
		 search - RETURNS NEWS IN AN ARRAY, IN DESC ORDER    	
		******************************************************************************************/
		function search($keywords="", $start=0, $limit=10){
      $pages = array();
      //CHECK TO SEE IF ANY KEYWORDS WERE PASSED IN
		  if(strlen($keywords)>0){
        $sql = "SELECT 
                  *,
                  MATCH
                    (
                      ".$this->config->db_prefix."_page.title, 
                      ".$this->config->db_prefix."_page.body
                    ) 
                  AGAINST
                    ('$keywords') 
                  AS 
                    score 
                FROM 
                  ".$this->config->db_prefix."_page, 
                  ".$this->config->db_prefix."_logs, 
                  ".$this->config->db_prefix."_object,
                  ".$this->config->db_prefix."_user
               WHERE
                  MATCH 
                    (
                      ".$this->config->db_prefix."_page.title, 
                      ".$this->config->db_prefix."_page.body
                    ) 
                  AGAINST
                    ('$keywords') 
                  AND
                    ".$this->config->db_prefix."_page.id = ".$this->config->db_prefix."_logs.record_id AND
                    ".$this->config->db_prefix."_logs.module_id = ".$this->id." AND
                    ".$this->config->db_prefix."_logs.object_id = ".$this->config->db_prefix."_object.id AND
                    ".$this->config->db_prefix."_logs.action = 1 AND
                    ".$this->config->db_prefix."_user.id = ".$this->config->db_prefix."_object.create_who
                  ORDER BY score DESC";
                  
        //GRAB RESULTS AND STORE THE TOTAL RECORDS FOUND
          $total_results = $this->db->DB_Q_C($sql);
          $totals = mysql_affected_rows();
        //GRAB OUR RESULT SET
          $sql.= " LIMIT $start, $limit";
          $results = $this->db->DB_Q_C($sql);
          $count = mysql_affected_rows();
        //
        if($count>0){
          $pos = 0;
          while($row = mysql_fetch_array($results)){
            //CONSTRUCT THE URL FOR THIS PAGE
              if($row[0]==1){
                $url = $this->config->site_url;
              }else{
                $url = $this->config->site_url.$this->getParentName($row['parent_page']).$row['file_title']."/";
              }
            //PACK UP OUR ARRAY
              $pages[$pos] = array("title" => stripslashes($row['title']), 
                                "body" => stripslashes($row['body']), 
                                "sum" => substr(strip_tags(stripslashes($row['body'])),0, 100), 
                                "date" => $row['create_date'], 
                                "user" => $row['username'],
                                "id" => $row[0],
                                "url" => $url,
                                "totals" => $totals);
            $pos++;
          }
        }else{
          //NO RECORDS WERE FOUND
        }
      }else{
        //NO KEYWORDS WERE PASSED IN SO RETURN AND EMPTY ARRAY
      }
      return $pages;
		}
		/******************************************************************************************	 
		getParentName     	
  	******************************************************************************************/
    function getParentName($parent_page){
      $tmp = "";
      $sql = "SELECT * FROM ".$this->config->db_prefix."_page WHERE id = $parent_page";
      $results=$this->db->DB_Q_C($sql);
      if(mysql_affected_rows()>0){
        $row = mysql_fetch_array($results);
        if($row['parent_page']!=0){
          $tmp.= $this->getParentName($row['parent_page']);
        }
        $tmp.= $row['file_title']."/";
      }
      return $tmp;
    }
  }
?>
