<?php
  	class face_news{
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
		function face_news($db, $cfg, $t, $module_name="class_news"){
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
		view - RETURNS NEWS ARTICLES IN AN ARRAY   	
		******************************************************************************************/
		function view_comments($theid=0, $start=0, $limit=-1, $order="DESC"){
		  $comments = array();
		  $sql = "SELECT * FROM 
		                ".$this->config->db_prefix."_news_comments 
		              WHERE
		                news_id = $theid
		  ";
		  //TACK ON OUR ORDER BY CLASS
        $sql.= " ORDER BY date $order";
      //TOTALS
        $totals = $this->getTotalFromQuery($sql); 
      //IF THE LIMIT IS SET ADD IT TO OUR QUERY
        if($limit>-1){ 
          $sql.= " LIMIT $start, $limit";
        }
      //GRAB OUR RESULTS 
        $results = $this->db->DB_Q_C($sql);
      //CHECK TO SEE IF WE GOT ANY RESULTS
        $count = mysql_affected_rows();
        if($count>0){
          //WE GOT SOME RESULTS, PACK THEM UP
            $pos = 0;
            while($row = mysql_fetch_array($results)){
              //STUFF OUR ARRAY
                $comments[$pos] = array("user" => stripslashes($row['user_name']), 
                                    "body" => stripslashes($row['body']), 
                                    "date" => $row['date'], 
                                    "id" => $row[0], 
                                    "news_id" => $row['news_id'], 
                                    "totals" => $totals);
                $pos++;
            }
        }else{
          //NO COMMENTS FOUND, RETURN EMPTY ARRAY
        }
      //RETURN OUR ARRAY
        return $comments;
		}
		/******************************************************************************************	
		view - RETURNS NEWS ARTICLES IN AN ARRAY   	
		******************************************************************************************/
		function view($theid=0, $start=0, $limit=-1, $cat=0, $order="DESC"){
      $news = array();
      $sql = "SELECT * FROM 
                    ".$this->config->db_prefix."_news, 
                    ".$this->config->db_prefix."_logs, 
                    ".$this->config->db_prefix."_object,
                    ".$this->config->db_prefix."_user,
                    ".$this->config->db_prefix."_cat
                  WHERE
                    ".$this->config->db_prefix."_news.id = ".$this->config->db_prefix."_logs.record_id AND
                    ".$this->config->db_prefix."_logs.module_id = ".$this->id." AND
                    ".$this->config->db_prefix."_logs.sub_module_id = 1 AND
                    ".$this->config->db_prefix."_logs.object_id = ".$this->config->db_prefix."_object.id AND
                    ".$this->config->db_prefix."_news.published = 1 AND
                    ".$this->config->db_prefix."_logs.action = 1 AND
                    ".$this->config->db_prefix."_cat.id = ".$this->config->db_prefix."_news.cat_id AND
                    ".$this->config->db_prefix."_user.id = ".$this->config->db_prefix."_object.create_who";
      //IF THE ID OF NEWS ARTICLE IS SPECIFIED, RETURN JUST THAT ARTICLE
        if($theid>0){
          $sql.= " AND ".$this->config->db_prefix."_news.id = $theid";
        }
      //IF A CATEGORY IS SPECIFIED ADD TO OUR QUERY, SO WE WILL JUST SHOW NEWS STORIES IN THE SPECIFIED CATEGORIES
        if($cat>0){
          $sql.= " AND ".$this->config->db_prefix."_news.cat_id = $cat ";
        }
      //TACK ON OUR ORDER BY CLASS
        $sql.= " ORDER BY ".$this->config->db_prefix."_object.create_date $order";     
      //TOTALS
        $totals = $this->getTotalFromQuery($sql); 
      //IF THE LIMIT IS SET ADD IT TO OUR QUERY
        if($limit>-1){ 
          $sql.= " LIMIT $start, $limit";
        }
      //GRAB OUR RESULTS 
        $results = $this->db->DB_Q_C($sql);
      //CHECK TO SEE IF WE GOT ANY RESULTS
        $count = mysql_affected_rows();
        if($count>0){
          //WE GOT SOME RESULTS, PACK THEM UP
          $pos = 0;
          while($row = mysql_fetch_array($results)){
            //GET OUR CATEGORIES
              $cats = $this->getCategory(0, stripslashes($row['name']));
            //STUFF OUR ARRAY
              $news[$pos] = array("title" => stripslashes($row['title']), 
                                  "body" => stripslashes($row['body']), 
                                  "sum" => stripslashes($row['summary']), 
                                  "date" => $row['create_date'], 
                                  "user" => $row['username'],
                                  "cat" => $cats, 
                                  "id" => $row[0], 
                                  "totals" => $totals, 
                                  "type" => "news");
              $pos++;
          }
        }else{
          //NO NEWS FOUND, RETURN EMPTY ARRAY
        }
        //GRAB ARTICLES IN SUB-CATEGORIES IF A CATEGORY IS SPECIFIED
          if($cat>0){
            $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE parent_id = $cat";
            $results = $this->db->DB_Q_C($sql);
            if(mysql_affected_rows()>0){
              while($row = mysql_fetch_array($results)){
                $tmp_array = array();
                $tmp_array = $this->view($theid, $start, $limit, $row['id'], $order);
                if(count($tmp_array)>0){
                  $news = array_merge($news, $tmp_array);
                }
              }
            }
          }
      //RETURN OUR ARRAY
        return $news;
    }
    /******************************************************************************************
    getTotalFromQuery 
		******************************************************************************************/
		function getTotalFromQuery($sql){
        $results = $this->db->DB_Q_C($sql);
        return mysql_affected_rows();
    }
    /******************************************************************************************
    getTotalComments
		******************************************************************************************/
		function getTotalComments($theid){
      $sql = "SELECT * FROM 
		                ".$this->config->db_prefix."_news_comments 
		              WHERE
		                news_id = $theid
		  ";
      $results = $this->db->DB_Q_C($sql);
      return mysql_affected_rows();
    }
    /******************************************************************************************
    getCategories - RETURNS AN ARRAY OF ALL CATEGORIES
		******************************************************************************************/
		function getCategories(){
      $ret_cat = array();
      $sql = "SELECT * FROM ".$this->config->db_prefix."_cat";
      $results=$this->db->DB_Q_C($sql);
      if(mysql_affected_rows()>0){
        while($row = mysql_fetch_array($results)){
          $cat = array(
                          "id" => $row[0], 
                          "name" => stripslashes($row['name']), 
                          "parent_id" => $row['parent_id']
                        );
          array_push($ret_cat, $cat);
        }
      }else{
        $cat = array(
                        "id" => "", 
                        "name" => "", 
                        "parent_id" => ""
                    );
        array_push($ret_cat, $cat);
      }
      return $ret_cat;
    }
    /******************************************************************************************
    getCategoryByName - RETURNS AN ARRAY OF THE CATEGORY SPECIFIED BY THE NAME
		******************************************************************************************/
		function getCategoryByName($name=""){
      $cat = array();
      //IF THE CATEGORY NAME IS SPECIFIED GET THE ID AND RETURN IT
        if(strlen($name)>0){
            $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE ".$this->config->db_prefix."_cat.name = '$name' LIMIT 1";
            $results=$this->db->DB_Q_C($sql);
            if(mysql_affected_rows()>0){
              $row = mysql_fetch_array($results);
              $cat = array(
                                "id" => $row[0], 
                                "name" => stripslashes($row['name']), 
                                "parent_id" => $row['parent_id']
                              );
            }else{
              $cat = array(
                              "id" => "", 
                              "name" => "", 
                              "parent_id" => ""
                          );
            }
        }else{
              $cat = array(
                              "id" => "", 
                              "name" => "", 
                              "parent_id" => ""
                          );
        }
        return $cat;
    }
    /******************************************************************************************
    getCategoryById - RETURNS AN ARRAY OF THE CATEGORY SPECIFIED BY THE ID NUMBER  
		******************************************************************************************/
		function getCategoryById($id=0){
      $cat = array();
      //IF THE CATEGORY NAME IS SPECIFIED GET THE ID AND RETURN IT
        if($id>0){
            $sql = "SELECT * FROM ".$this->config->db_prefix."_cat WHERE ".$this->config->db_prefix."_cat.id = '$id' LIMIT 1";
            $results=$this->db->DB_Q_C($sql);
            if(mysql_affected_rows()>0){
              $row = mysql_fetch_array($results);
              $cat = array(
                                "id" => $row[0], 
                                "name" => stripslashes($row['name']), 
                                "parent_id" => $row['parent_id']
                              );
            }else{
              $cat = array(
                              "id" => "", 
                              "name" => "", 
                              "parent_id" => ""
                          );
            }
        }else{
          $cat = array(
                          "id" => "", 
                          "name" => "", 
                          "parent_id" => ""
                      );
        }
        return $cat;
    }
    /******************************************************************************************
    getCategory - RETURNS AN ARRAY OF CATEGORIES IN THEIR PARENT-CHILD RELATIONSHIP ORDER, FIRST
      WOULD BE THE BOTTOM CATEGORY, SECOND WOULD BE PARENT TO THAT CATEGORY AND SO ON...
		******************************************************************************************/
		function getCategory($id=0, $name=""){
      $ret_cat = array();
      $cat = array();
      //IF THE ID IS SET FIND BY THE CATEGORY, IF THE NAME IS SET THEN FIND BY THE NAME
        if($id>0){
  		    $cat = $this->getCategoryById($id);
          //ADD IT TO OUR ARRAY THAT WE WILL BE RETURNING
		        array_push($ret_cat, $cat);
        }else if(strlen($name)>0){
  		    $cat = $this->getCategoryByName($name);
          //ADD IT TO OUR ARRAY THAT WE WILL BE RETURNING
		        array_push($ret_cat, $cat);
        }
		  //IF THE PARENT ID IS NOT SET THEN LETS NOT RECURSE :)
  		  if($cat['parent_id']!=""){
  		    $tmp_array = array();
  		    $tmp_array = $this->getCategory($cat['parent_id']);
  		    $ret_cat = array_merge($ret_cat, $tmp_array);
        }
      return $ret_cat;
    }
    /******************************************************************************************	
		 search - RETURNS NEWS IN AN ARRAY, IN DESC ORDER    	
		******************************************************************************************/
		function search($keywords="", $start=0, $limit=10){
      $news = array();
      //CHECK TO SEE IF ANY KEYWORDS WERE PASSED IN
		  if(strlen($keywords)>0){
        $sql = "SELECT 
                  *,
                  MATCH
                    (
                      ".$this->config->db_prefix."_news.title, 
                      ".$this->config->db_prefix."_news.body
                    ) 
                  AGAINST
                    ('$keywords') 
                  AS 
                    score 
                FROM 
                  ".$this->config->db_prefix."_news, 
                  ".$this->config->db_prefix."_logs, 
                  ".$this->config->db_prefix."_object,
                  ".$this->config->db_prefix."_user
               WHERE
                  MATCH 
                    (
                      ".$this->config->db_prefix."_news.title, 
                      ".$this->config->db_prefix."_news.body
                    ) 
                  AGAINST
                    ('$keywords') 
                  AND
                    ".$this->config->db_prefix."_news.id = ".$this->config->db_prefix."_logs.record_id AND
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
              $url = $this->config->site_url.$this->config->rss_page."?theid=".$row[0];
            //PACK UP OUR ARRAY
              $news[$pos] = array("title" => stripslashes($row['title']), 
                                "body" => stripslashes($row['body']), 
                                "sum" => stripslashes($row['summary']), 
                                "date" => $row['create_date'], 
                                "user" => $row['username'],
                                "cat" => $cats, 
                                "id" => $row[0], 
                                "url" => $url,
                                "totals" => $totals, 
                                "type" => "news");
            $pos++;
          }
        }else{
          //NO RECORDS WERE FOUND
        }
      }else{
        //NO KEYWORDS WERE PASSED IN SO RETURN AND EMPTY ARRAY
      }
      return $news;
		}
  }
?>
