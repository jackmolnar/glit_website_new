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
		<div id="submenu">
			<block id='1' name='Programs_Sub_Menu' description='The_sub_menu_for_the_program_page' default='10'></block>
		</div>
		<div id="content">
			<div id="subtop">
				<block id='2' name='Programs_Image_Head' description='The_image_at_the_top_of_the_specified_courses_page' default='0'></block>
				<div id="subtopleft"></div>
			</div>
			<div id="subcontent">
				<div id="leftmenu">
					<block id='3' name='Programs_Course_Menu' description='The_courses_side_menu' default='0'></block>
				</div>
				<div id="rightcontent">
					<div id="rightcontentmenu">
						<block id='4' name='Programs_Course_Sub_Menu' description='The_programs_sub_menu' default='0'></block>
					</div>
					<block id='5' name='Programs_Course_Content' description='The_programs_content' default='0'></block>
				</div>
			</div>
		</div>
		<div id="footer">
			<block id='6' name='Global_Footer' description='Global_footer_details' default='4'></block>
		</div>
	</body>
</html>

