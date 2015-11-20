<?
    //--------------------------------------------------
    //index.php
    //--------------------------------------------------
    //START OUR USER SESSION
	   session_start();
    //INCLUDE OUR FILES RESIDE OUTSIDE OF MAIN DIR FOR SECURITY
	//REMEMBER TO MOVE THESE OUTSIDE MAIN DIRECTORY WHEN WE PUSH LIVE
    	include_once '../../../../../../../_admin/class/class_config.php';			/*HOLDS OUR SENSITIVE DATA OUTSIDE MAIN DIRECTORY*/
    	include_once '../../../../../../../_admin/class/class_db.php';			/*CLASS THAT HOLDS OUT DATABASE FUNCTIONS*/
    	include_once '../../../../../../../_admin/includes/functions_common.php';		/*HOLDS OUR COMMON FUNCTIONS*/
    	include_once '../../../../../../../_admin/class/class_adminuser.php';			/*OUR USER CLASS FOR THE CMS*/
  //INCLUDE ALL OF OUR MODULE CLASSES
    	include '../../../../../../../_admin/class/class_files.php';			/**/
      include "../../../../../../../_admin/class/class_time.php";
	//CREATE OUR CONFIG
    $cfg = new class_config();
	//CREATE OUR DATABASE
	   $db = new class_db($cfg->db_host,$cfg->db_name,$cfg->db_user,$cfg->db_pass);
	//CONNECT TO OUR DATABASE
	   $database_connection = $db->DB_CONNECT();
	//CREATE OUR USER
	   $user = new class_adminuser($db, $cfg->cookie_name, $cfg);
	//CHECK TO SEE IF OUR USER IS LOGGED IN
		//CHECK TO SEE IF THE USER WANTS A COOKIE KEPT ON HIS/HER COMP
		if($_REQUEST['cook']=="yes"){
	   		$user_logged=$user->checkUserLog($db, "YES");
		}else{
	   		$user_logged=$user->checkUserLog($db, "NO");
		}
    //CREATE OUR TIME
      $time = new class_time($db, $cfg, $user->user_dst);
   //GET/SET OPTIONS IF ANY
    	if(!isset($_REQUEST['start'])){
    		$start = 0;
    	}else{
    		$start = $_REQUEST['start'];
    	}
		$limit = 10;
?>
<html>
<head>
		<title>Werkbot Studios - Content Management</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	    <link href="../../../../../../../_admin/scripts/default.css" rel="stylesheet" type="text/css" />
		<link href="../../../../../../../_admin/scripts/datepicker.css" rel="stylesheet" type="text/css" />
	    <script src="../../../../../../../_admin/scripts/js/scriptaculous/lib/prototype.js" type="text/javascript"></script>
  		<script src="../../../../../../../_admin/scripts/js/scriptaculous/src/effects.js" type="text/javascript"></script>
  		<script src="../../../../../../../_admin/scripts/js/validation.js" type="text/javascript"></script>
		<script src="../../../../../../../_admin/scripts/js/swfobject.js" type="text/javascript" ></script>
  		<script src="../../../../../../../_admin/scripts/js/datepicker.js" type="text/javascript"></script>
  		<script src="../../../../../../../_admin/scripts/js/custom.js" type="text/javascript"></script>
		<?
		  	//CHECK TO SEE IF THE USER HAS HELP TURNED ON
			if($user->user_help==1){
			  //IF SO TURN ON THE TOOLTIPS
				print '	<script type="text/javascript">window.onload=function(){enableTooltips()};</script>';
			}
		?>
	</head>
<body>
<script language="JavaScript">
        //alert('begining test\n\nsetting image\n url to "url"\nwidth=11\nheight=12\nalt text = "alt"');
        function setImage(url){
          window.opener.SetUrl(url, 11, 12, "" );
          window.close();
        }
</script>
<? 
$module = new class_files($db, $cfg, $time);
$module->fck_file_view($user, $start, $limit);
?>
</body>
</html>
<?
    //CLOSE OUT CONNECTION TO THE DATABASE
    $db->DB_CLOSE($database_connection);
?>
