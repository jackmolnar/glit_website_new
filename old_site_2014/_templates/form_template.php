<?php

	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "[DEPTH]";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "[DEPTH]_admin/class/class_config.php";

		include "[DEPTH]_admin/class/class_db.php";

		include "[DEPTH]_admin/class/class_time.php";

	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;

		include "[DEPTH]_face/class/face_common.php";

	//CREATE OUR CONFIG

		$cfg = new class_config();

	//CREATE OUR DATABASE

		$db = new class_db($cfg->db_host,$cfg->db_name,$cfg->db_user,$cfg->db_pass);

	//CREATE OUR TIME

		$time = new class_time($db, $cfg);

	//CREATE OUR COMMON CLASS

		$common = new face_common();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

		<title><? echo $cfg->site_title; ?> | [TITLE]</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="" />

		<meta name="description" content=""/>

		<meta name="robots" content="index, follow" />

		<link href="[DEPTH]_scripts/master.css" rel="stylesheet" type="text/css" />

		<script src="[DEPTH]_scripts/js/mootools.v1.11.js" type="text/javascript" ></script>

		<script src="[DEPTH]_scripts/js/validation.js" type="text/javascript"></script>

		<style>

			th{vertical-align:top; text-align:right;};

			.validation-failed {

				border: 1px solid #990000;

				clear:both;	

			}

			.validation-passed {	

			}

			.validation-advice {

				margin: 2px; 

				padding: 2px; 

				color:#fff; 

				background-color:#990000;

			}

		</style>

	</head>

	<body>

		<div id="masterframe">

			<div id="header">

				<div id="search">

					<form action="[DEPTH]search/" method="post">

						<input class="txt" name="keys" type="text" value="Search..." maxlength="50" onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...';"/>

						<input class="img" type="image" src="[DEPTH]_images/searchtxt.gif" alt="Search" border="0"/>

					</form>

				</div>

			</div>

			<div id="menu">

				<block id='0' name='Global_Menu' description='The_main_menu_for_the_site' default='2'></block>

			</div>

		</div>

		<div id="content">

			<div id="subtop">

				<img src="[DEPTH]_images/why_eit.jpg" alt="#" />

				<div id="subtopleft"></div>

			</div>

			<table>

				<tr>

					<td id="subcontent">

						<div id="leftmenu">

							<block id='1' name='Default_Side_Menu' description='The_side_menu_for_a_default_page' default='0'></block>

						</div>

					</td>

					<td id="rightcontent">

						<block id='2' name='Default_Content' description='The_content_for_a_default_page' default='0'></block>

					</td>

				</tr>

			</table>

		</div>

		<div id="footer">

			<block id='3' name='Global_Footer' description='Global_footer_details' default='4'></block>

		</div>

	</body>

</html>



