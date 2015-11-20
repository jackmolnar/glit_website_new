<?php
	/******************************************************************************************
	******************************************************************************************/
	class class_config{
		/******************************************************************************************
		CLASS VARIABLES
		******************************************************************************************/  
		  var $db_host;
		  var $db_user;
		  var $db_pass;
		  var $db_name;
		  var $db_prefix;
		  var $site_url;
		  var $site_title;
		  var $cookie_name;
		  var $site_description;
		  var $file_dir;
		  var $install_dir;
		  var $default_tz;
		  var $rss_page;
		  var $date_format;
		/******************************************************************************************
		class_config - constructor, initialize all variables. 
		******************************************************************************************/
		function class_config(){
		   $this->db_host = "internal-db.s33581.gridserver.com";
		   $this->db_user = "db33581_werkbot";
		   $this->db_pass = "mullet79";
		   $this->db_name = "db33581_erieit";
		   $this->db_prefix = "eit";
		   $this->site_url = "http://www.erieit.edu/";
		   $this->site_title = "Erie Institute of Technology";
		   $this->cookie_name = "cookie_eit";
		   $this->site_description = "";
		   $this->file_dir = "_files";
		   $this->install_dir = "_admin";
		   $this->default_tz = -5;
		   $this->rss_page = "news/";
		   $this->date_format = "M jS, Y - g:ia"; //Aug 30th, 2007 - 10:06am
		   //$this->date_format = "l, F jS - g:ia"; //Thursday, August 30th - 10:06am
		   //$this->date_format = "m-d-Y - g:ia"; //08-30-2007 - 10:06am
		}
		/******************************************************************************************
		class_config - constructor, initialize all variables. 
		******************************************************************************************/
		function load($host, $user, $pass, $name, $pre, $url, $dir){
		   $this->db_host = $host;
		   $this->db_user = $user;
		   $this->db_pass = $pass;
		   $this->db_name = $name;
		   $this->db_prefix = $pre;
		   $this->site_url = $url;
		   $this->file_dir = $dir;
		}
		/******************************************************************************************
		check_install
		******************************************************************************************/
		function check_install () { 
		  return $this->table_exists($this->db_prefix."_modules");
		}
		/******************************************************************************************
		table_exists
		******************************************************************************************/
		function table_exists ($table) { 
    	$tables = mysql_list_tables ($this->db_name); 
    	while (list ($temp) = mysql_fetch_array ($tables)) {
    		if ($temp == $table) {
    			return true;
    		}
    	}
    	return false;
    }
	}
?>
