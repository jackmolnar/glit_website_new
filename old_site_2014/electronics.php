<?php

include("global_includes/facebook/facebook_connect.php");

//MOBILE DETECTION
if ($_REQUEST['mobile'] == 'no'){
$expire=time()+60*60;
setcookie("mobile", "no", $expire, '/', '.erieit.edu');
} else if ($_COOKIE["mobile"] == ''){
$mobile = 'http://mobile.erieit.edu';
} else if ($_COOKIE["mobile"] == 'no') {
	
}

$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");

if ($iphone || $android || $palmpre || $ipod || $berry == true) 
{ 
header('Location: '.$mobile);

}
//END MOBILE DETECTION

	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "_admin/class/class_config.php";

		include "_admin/class/class_db.php";

		include "_admin/class/class_time.php";

	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;

		include "_face/class/face_common.php";


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

		<title>Electronics | Erie Institute of Technology</title>

		<meta name="keywords" content="electronics, engineering, biomedical, equipment, industrial, automation, robotics, circuit design" />

		<meta name="description" content="Electronics Training School - Erie Institute of Technology's Electronics programs consist of electronics engineering technology, biomedical equipment technology, electronics technician, and industrial automation &amp; Robotics Technology."/>

		<meta name="robots" content="index, follow" />

		<link href="_scripts/master.css" rel="stylesheet" type="text/css" />

	</head>

	<body>

		<div id="masterframe">

			<div id="header">

				<div id="search">
                
                <? include('global_includes/head_contact.php'); ?>
                
				</div>

			</div>

			<div id="menu">

				<ul>
                
                <? include('global_includes/main_menu.php');?></ul>

			</div>

		</div>

		

		<div id="content">

			<div id="subtop">

				<p><img alt="#" src="_images/programs_electronics.jpg" /></p>

				<div id="subtopleft">

				<?

					$num = rand(1,7);

					print "<img src='_images/quote_00".$num.".gif' />";

				?>

				</div>

			</div>

			<div id="subcontent">

				<div id="leftmenu">

					<ul>
                    
                    <? include('global_includes/electronics_menu.php');?>
                    
                    </ul>

				</div>

				<div id="rightcontent">

					<h2 align="justify">Electronics Programs</h2>

<hr />

<img style="border-right: rgb(234,234,234) 3px solid; border-top: rgb(234,234,234) 3px solid; float: right; margin: 5px; border-left: rgb(234,234,234) 3px solid; border-bottom: rgb(234,234,234) 3px solid" alt="Erie Electronics Program" src="http://www.erieit.edu/_files/images/file_26.jpg" /><br />

<p>The electronics programs at EIT can prepare you for a&nbsp;technical career in many exciting electronics fields.</p>

<ul>

    <li>Biomedical Equipment Technology - AST*</li>

    <li>Electronic Engineering Technology - AST*</li>

    <li>Electronics Technician</li>

    <li>Industrial Automation and Robotics Technology</li>

</ul>

<br />

<p style="font-size: 10px">*Associate in Specialized Technology degree</p>

				</div>				



				

			</div><br clear="all" />



<? include('global_includes/footer.php');?>



	</body>

</html>



