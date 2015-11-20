<?

	//START OUR USER SESSION

		session_start();

	//INCLUDE BASE

		require 'includes/functions_common.php';

		require 'scripts/fck/fckeditor.php';

		require 'class/class_config.php';			

		require 'class/class_adminuser.php';			

		require 'class/class_db.php';	

		require 'class/class_time.php';

	//CREATE OUR CONFIG

		$cfg = new class_config();

	//CREATE OUR DATABASE

		$db = new class_db($cfg->db_host,$cfg->db_name,$cfg->db_user,$cfg->db_pass);

	//CONNECT TO OUR DATABASE

		$database_connection = $db->DB_CONNECT();

	//CHECK TO SEE IF THE BOOTY IS INSTALLED CORRECTLY

	if($cfg->check_install()){

		//GRAB PID - TELLS US WHAT MODULE WE ARE WORKING WITH

			if(!isset($_REQUEST['pid'])){

				$pid = 1;

			}else{

				$pid = $_REQUEST['pid'];

			}

		//GRAB CID - TELLS US WHAT SECTION OF THE MODULE WE ARE WORKING WITH

			if(!isset($_REQUEST['cid'])){

				$cid = 0;

			}else{

				$cid = $_REQUEST['cid'];

			}

		//GRAB THEID IF THERE IS ANY

			$theid = $_REQUEST['theid'];

		//INCLUDE OUR INSTALLED MODULES

			$sql = "SELECT * FROM ".$cfg->db_prefix."_modules";

			$result = $db->DB_Q_C($sql);

			$count = mysql_affected_rows();

			if($count>0){

				while($row = mysql_fetch_array($result)){

					require 'class/'.$row['name'].'.php';

				}

			}

		//CREATE OUR USER

			$user = new class_adminuser($db, $cfg->cookie_name, $cfg);

		//CHECK TO SEE IF OUR USER IS LOGGED IN

			if($_REQUEST['cook']=="yes"){

				$user_logged=$user->checkUserLog($db, "YES");

			}else{

				$user_logged=$user->checkUserLog($db, "NO");

			}

		//CONSTRUCT OUR MENU SCRIPT FOR THIS USER

			if($user_logged){

				//GRAB THIS USERS MODULES THEY HAVE ACCESS TO FROM THE DB

					$sql = "SELECT * FROM 

								".$cfg->db_prefix."_modules, 

								".$cfg->db_prefix."_perms 

							WHERE 

								".$cfg->db_prefix."_modules.id = ".$cfg->db_prefix."_perms.module_id AND

								".$cfg->db_prefix."_perms.perm LIKE '1%' AND

								".$cfg->db_prefix."_perms.user_id = ".$user->user_id;

				$result = $db->DB_Q_C($sql);

				$count = mysql_affected_rows();

				if($count>0){

					$menu_list = array();

					$i=0;

					//PUT OUR SCRIPT TOGETHER

						$menu_script.= "var open_menu = '';

										var reset_menu = '';

										var trans = false;";

						while($row = mysql_fetch_array($result)){

							$menu_list[$i] = $row['module_id'];

							$menu_script.= "var submenu_".$menu_list[$i]."_slide = new Fx.Slide('submenu_".$menu_list[$i]."', {

												onStart: function(){

													trans = true;

												},

												onComplete: function(){

													trans = false;

												}

											});";

							$i++;

						}

						for($i=0;$i<count($menu_list);$i++){

							if($pid==$menu_list[$i]){

								$menu_script.= "submenu_".$menu_list[$i]."_slide.show();";

							}else{

								$menu_script.= "

									$('menu_".$menu_list[$i]."').addEvent('click', function(e){

										if(trans==false){

											if(open_menu!=''){

												open_menu.slideOut();

											}

											if(reset_menu!=''){

												$(reset_menu).className='';

											}

											$('submenu_".$menu_list[$i]."').className='select_module';

											$('menu_".$menu_list[$i]."_style').className='select_module';

											reset_menu = 'menu_".$menu_list[$i]."_style';

											open_menu = submenu_".$menu_list[$i]."_slide;

											e = new Event(e);

											submenu_".$menu_list[$i]."_slide.slideIn();

											e.stop();

										}

									});";

								$menu_script.= "submenu_".$menu_list[$i]."_slide.hide();";

							}

						}

					}

				}

				//CREATE OUR TIME

					$time = new class_time($db, $cfg, $user->user_dst);

				//CHECK FOR A USER LOG OUT

					if($pid==-1){

						$user->logout();

						$user_logged = false;

					}

				//GET/SET OPTIONS IF ANY

					if(!isset($_REQUEST['start'])){

						$start = 0;

					}else{

						$start = $_REQUEST['start'];

					}

					$limit = $user->user_reclimit;

				//ALL POST FORM PROCESSING DONE HERE

					include 'includes/page_process.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<title>(beta) Werkbot - Content Management</title>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

		<link href="scripts/default.css" rel="stylesheet" type="text/css" />

		<script src="scripts/js/codepress/codepress.js" type="text/javascript"></script>

		<script src="scripts/js/swfobject.js" type="text/javascript" ></script>

		<script src="scripts/js/mootools.v1.11.js" type="text/javascript"></script>

		<script src="scripts/js/validation.js" type="text/javascript"></script>

		<script src="scripts/js/DatePicker.js" type="text/javascript"></script>

		<script src="scripts/js/custom.js" type="text/javascript"></script>

		<?

			//CHECK TO SEE IF THE USER HAS HELP TURNED ON

				if($user->user_help==1){

					//IF SO TURN ON THE TOOLTIPS;

						$tooltips = "var myTips = new Tips($$('.toolTipElement'), {

							timeOut: 700,

							maxTitleChars: 50, 

							maxOpacity: .9 

						});";

				}else{

					$tooltips = "";

				}

			//WRITE OUT OUR JAVASCRIPT

			print "

				<script type='text/javascript' language='javascript'>

					window.addEvent('domready', function(){	

						$tooltips

						$menu_script

						$$('input.DatePicker').each( function(el){

							new DatePicker(el);

						});

					});

				</script>";	

		?>

	</head>

	<body>

		<div id='center'>

			<div id='top'>

				<div id='top_box'>  

					<div id='content'>

						<img src="images/logo.gif" alt="Booty CMS, Erie PA Web Site" width="158" height="45" />

						<?

							print "<i>".$cfg->site_title."'s booty &mdash; (beta)</i>";

						?>

					</div>

				</div>

			</div>

			<div id='menu'>

				<?

					//CHECK FOR USER LOGIN AND/OR DISPLAY OUR MENU

						include "includes/page_login.php";

				?>

			</div>

			<noscript>

				<div id='content'>

					<div id='error'>

						It is highly recommended to enable javascript in your browser, the system may not function <em>as intended</em> with it disabled.

					</div>

				</div>

			</noscript>

			<div id='page'>

				<div id='page_box'>  

					<?

						include "includes/page_content.php";

					?>

				</div>

			</div>

			<div id='bottom'>

				<div id='bottom_box'>  

					<div id='content' align='right'>

						©<?=getYear()?> Werkbot Studios. All rights reserved.

					</div>

				</div>

			</div>

		</div>

	</body>

</html>

<?

	}else{

		print "<h1>The content management system is not installed, <a href='../install.php'>please go to the install page</a>.</h1>";

	}

	//CLOSE OUT CONNECTION TO THE DATABASE

		$db->DB_CLOSE($database_connection);

?>

