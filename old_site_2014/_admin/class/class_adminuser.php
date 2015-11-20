<?

class class_adminuser

{

	//-----------------------------------------------------------------

	//PROPERTIES

	//-----------------------------------------------------------------

	var $id;

	var $user_name;	//

	var $user_id;	//

	var $user_email;	//

	var $user_pass;	//

	var $user_db_id;	//

	var $user_log;	//

	var $user_ip;

	var $user_timezone;

	var $user_reclimit;

	var $user_perms;

	var $user_help;

	var $user_reset;

	var $user_dst;

	var $user_salt;

	//

	var $cookie;

	var $reset_cookie;

	var $config;

	var $db;

	//

	var $timestamp;

	var $timeout;

	//-----------------------------------------------------------------

	//NAME:USER_CLASS

	//DATE:11-15-06

	//DECRIP:

	//-----------------------------------------------------------------

	function class_adminuser($db, $cookie_name, $cfg){

    $this->cookie = "cookie_".$cookie_name;

    $this->reset_cookie = false;

    //STORE THE SITES CONFIG SETTINGS

		  $this->config = $cfg;

		  $this->db = $db;

		//STORE THE ID OF THIS MODULE

	    $sql = "SELECT * FROM ".$this->config->db_prefix."_modules WHERE name = 'class_users'";

	    $result = $db->DB_Q_C($sql);

	    if(mysql_affected_rows()>0){

	      $this->id = mysql_result($result,0,'id');

	    }

	}

	//

	function ipCheck() {

    /*

    This function checks if user is coming behind proxy server. Why is this important?

    If you have high traffic web site, it might happen that you receive lot of traffic

    from the same proxy server (like AOL). In that case, the script would count them all

        as 1 user.

    This function tryes to get real IP address.

    Note that getenv() function doesn't work when PHP is running as ISAPI module

    */

        if (getenv('HTTP_CLIENT_IP')) {

            $ip = getenv('HTTP_CLIENT_IP');

        }

        elseif (getenv('HTTP_X_FORWARDED_FOR')) {

            $ip = getenv('HTTP_X_FORWARDED_FOR');

        }

        elseif (getenv('HTTP_X_FORWARDED')) {

            $ip = getenv('HTTP_X_FORWARDED');

        }

        elseif (getenv('HTTP_FORWARDED_FOR')) {

            $ip = getenv('HTTP_FORWARDED_FOR');

        }

        elseif (getenv('HTTP_FORWARDED')) {

            $ip = getenv('HTTP_FORWARDED');

        }

        else {

            $ip = $_SERVER['REMOTE_ADDR'];

        }

        return $ip;

    }

    function new_user() {

        $sql = "INSERT INTO ".$this->config->db_prefix."_useronline(timestamp, ip, user_id) VALUES ('$this->timestamp', '$this->user_ip', '$this->user_id')";

        $result = $this->db->DB_Q_C($sql);

    }

    function delete_user() {

        $sql = "DELETE FROM ".$this->config->db_prefix."_useronline WHERE timestamp < ($this->timestamp - $this->timeout)";

        $result = $this->db->DB_Q_C($sql);

    }

    function count_users() {

        $sql = "SELECT DISTINCT user_id FROM ".$this->config->db_prefix."_useronline";

        $result = $this->db->DB_Q_C($sql);

        $count = mysql_affected_rows();

        return $count;

    } 

    function get_users() {

        $sql = "SELECT 

                  DISTINCT user_id,

                  username 

                FROM 

                  ".$this->config->db_prefix."_useronline,

                  ".$this->config->db_prefix."_user 

                WHERE

                  ".$this->config->db_prefix."_useronline.user_id = ".$this->config->db_prefix."_user.id";

        $result = $this->db->DB_Q_C($sql);

        $count = mysql_affected_rows();

        $user_list = array();

        if($count>0){

          while($row = mysql_fetch_array($result)){

            array_push($user_list, $row['username']);

          }

        }

        return $user_list;

    } 

	//-----------------------------------------------------------------

	//NAME:USER_CLASS

	//DATE:11-15-06

	//DECRIP:

	//-----------------------------------------------------------------

	function logout(){

		unset($_SESSION['uid']);

		unset($_SESSION['pwd']);

		setcookie ($this->cookie, "", time()-60*60*24*30);

	}

	//-----------------------------------------------------------------

	//NAME:USER_CLASS

	//DATE:11-15-06

	//DECRIP:

	//-----------------------------------------------------------------

	function checkUserLog($db, $cook){

    $stat = false;

    $cookie_reset = false;

    $set_log = false;

    //GRAB INFO FOR THE USER ID WHERE EVER IT CAME FROM, EXCEPT COOKIE  

      if(isset($_REQUEST['uid'])){

        $uid = $_REQUEST['uid'];

        $set_log = true;

      }else if(isset($_SESSION['uid'])){

        $uid = $_SESSION['uid'];

      }else if(isset($_COOKIE[$this->cookie])){

        $cookie_info = explode("-", $_COOKIE[$this->cookie]);  

      	$uid = $cookie_info[0];

        $set_log = true;

      }

      $sql = "SELECT * FROM 

                ".$this->config->db_prefix."_user 

            WHERE

        		    username = '$uid'";

      $result = $db->DB_Q_C($sql);

      $count = mysql_affected_rows();

    //CHECK FOR ANY RESULTS

      if($count>0){

        //CHECK FOR A COOKIE RESET

          if(mysql_result($result, 0, 'reset')==1){

          	$this->logout();

        	  $sql = "UPDATE 

                      ".$this->config->db_prefix."_user 

                    SET 

                      reset = 0 

                    WHERE 

                      id = ".mysql_result($result, 0, 'id');

        	  $result = $db->DB_Q_C($sql);

        	  $cookie_reset = true;

          }

        //GRAB OUR PASSWORD

          if(isset($_COOKIE[$this->cookie]) && $cookie_reset == false && !isset($_SESSION['pwd'])){

      		   	$cookie_info = explode("-", $_COOKIE[$this->cookie]);  

      			  $uid = $cookie_info[0];

         			$pwd = $cookie_info[1];

      		}else{

      		  if(isset($_REQUEST['pwd'])){

              $tmp_pwd = $_REQUEST['pwd'];

              $tmp_pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : $_SESSION['pwd'];

        			$sql = "SELECT * FROM 

                    ".$this->config->db_prefix."_user, 

                    ".$this->config->db_prefix."_logs, 

                    ".$this->config->db_prefix."_object

                 WHERE

                    ".$this->config->db_prefix."_user.username = '$uid' AND

                   ".$this->config->db_prefix."_user.id = ".$this->config->db_prefix."_logs.record_id AND

                    ".$this->config->db_prefix."_logs.module_id = ".$this->id." AND

                    ".$this->config->db_prefix."_logs.object_id = ".$this->config->db_prefix."_object.id AND

                    ".$this->config->db_prefix."_logs.action = 1";

        			$result = $db->DB_Q_C($sql);

        			$count = mysql_affected_rows();

        			if($count>0){

        			 $pwd = generateHash($tmp_pwd, mysql_result($result,0,'salt'));

              }

            }else if(isset($_SESSION['pwd'])){

              $pwd = $_SESSION['pwd'];

            }

      		}

      	//CHECK OUR USERNAME AND PASSWORD

          $sql = "SELECT * FROM 

                    ".$this->config->db_prefix."_user 

                  WHERE

                    username = '$uid' AND 

                    password = '$pwd'";

          $result = $db->DB_Q_C($sql);

          $count = mysql_affected_rows();

          if($count>0){

            //THE USER EXISTS WITH THE USERNAME AND PASSWORD CONFIG, LOG THEM IN

              $stat = true;

            //SET OUR SESSION

              $_SESSION['uid'] = $uid;

              $_SESSION['pwd'] = $pwd;

    			  //GRAB AND STORE USER VARIABLES

              $this->user_ip = $_SERVER['REMOTE_ADDR'];

              $this->user_id  = mysql_result($result,0,'id');

              $this->user_name  = mysql_result($result,0,'username');

              $this->user_pass  = mysql_result($result,0,'password');

              $this->user_email  = mysql_result($result,0,'email');

              $this->user_log = mysql_result($result,0,'last_log');

              $this->user_timezone = mysql_result($result,0,'tz');

              $this->user_reclimit = mysql_result($result,0,'reclimit');

              $this->user_help = mysql_result($result,0,'help');

              $this->user_dst = mysql_result($result,0,'dst');

              $this->user_salt = mysql_result($result,0,'salt');

            //SET A COOKIE THAT WILL EXPIRE IN 30 DAYS

              if($cook=="YES"){

                $cookie_data = $this->user_name.'-'.$this->user_pass;

                setcookie ($this->cookie, $cookie_data, time()+60*60*24*30);

              }

            //GRAB AND STORE THIS USERS PERMISSIONS

              $sql = "SELECT * FROM ".$this->config->db_prefix."_perms WHERE user_id = $this->user_id ORDER BY module_id ASC";

              $result1 = mysql_query($sql);

              $this->user_perms = array();

              while($row = mysql_fetch_array($result1)){

                array_push($this->user_perms, $row['perm']);

              }

            //TRACK OUR USER

        	    $this->timeout = 600;

              $this->timestamp = time();

              $this->user_ip = $this->ipCheck();

              $this->new_user();

              $this->delete_user();

      //$this->count_users(); 

          //UPDATE LAST LOGIN

            if($set_log){

              //CREATE A UNIX TIMESTAMP

                $stamp = time();

                $date = gmdate("Y-m-d H:i:s", $stamp);

              //UPDATE THE DATABASE

                $sql = "UPDATE 

                          ".$this->config->db_prefix."_user 

                        SET 

                          last_log = '$date',

                          ip = '".$this->user_ip."'

                        WHERE 

                          id = ".$this->user_id;

                $result1 = mysql_query($sql);

            }

          }

      }else{

        $stat = false;

      }

    return $stat;

	}

}

?>

