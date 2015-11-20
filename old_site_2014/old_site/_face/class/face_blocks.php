<?php
  	class face_blocks{
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
		function face_blocks($db, $cfg, $t, $module_name="class_block"){
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
                      ".$this->config->db_prefix."_block_content.name, 
                      ".$this->config->db_prefix."_block_content.body
                    ) 
                  AGAINST
                    ('$keywords') 
                  AS 
                    score 
                FROM 
                  ".$this->config->db_prefix."_block_content,
                  ".$this->config->db_prefix."_block_list,
                  ".$this->config->db_prefix."_block_page
               WHERE
                  MATCH 
                    (
                      ".$this->config->db_prefix."_block_content.name, 
                      ".$this->config->db_prefix."_block_content.body
                    ) 
                  AGAINST
                    ('$keywords') 
                  AND
                    ".$this->config->db_prefix."_block_content.id = ".$this->config->db_prefix."_block_list.block_id AND
                    ".$this->config->db_prefix."_block_list.page_id = ".$this->config->db_prefix."_block_page.id AND
                    ".$this->config->db_prefix."_block_content.search = 1
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
              if($row['page_id']==1){
                $url = $this->config->site_url;
              }else{
                $url = $this->config->site_url.$this->getParentName($row['parent_id']).$row['file_title']."/";
              }
            //
              $tmp_body = stripslashes($row['body']);
              $tmp_body = strip_tags($tmp_body);
              $tmp_body =substr($tmp_body, 0, 200);
            //PACK UP OUR ARRAY
              $pages[$pos] = array("title" => stripslashes($row['title']), 
                                "body" => stripslashes($row['body']), 
                                "sum" => $tmp_body, 
                                "date" => "", 
                                "user" => "",
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
      $sql = "SELECT * FROM ".$this->config->db_prefix."_block_page WHERE id = $parent_page";
      $results=$this->db->DB_Q_C($sql);
      if(mysql_affected_rows()>0){
        $row = mysql_fetch_array($results);
        if($row['parent_id']!=0){
          $tmp.= $this->getParentName($row['parent_id']);
        }
        $tmp.= $row['file_title']."/";
      }
      return $tmp;
    }
  }
?>
