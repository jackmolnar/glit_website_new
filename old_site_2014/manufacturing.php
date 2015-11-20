<?php

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

		<title>Manufacturing and Technology Programs | Erie Institute of Technology</title>

		<meta name="keywords" content="manufacturing, technology, cnc, machining, maintenance, plumbing, HVAC, RHVAC, HVAC-R, welding, electrician" />

		<meta name="description" content="Manufacturing and Technology Training School - Erie Institute of Technology's Manufacturing and Technology programs consist of CNC Machinist Technician, Maintenance, HVAC or RHVAC technology, Welding technology, and Electrician."/>

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

				<ul><?

	include('global_includes/main_menu.php');



?></ul>

			</div>

		</div>

	
		<div id="content">

			<div id="subtop">

				<p><img alt="#" src="_images/programs_man.jpg" /></p>

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
                    
                    <? include('global_includes/manufacturing_menu.php'); ?>
                    
                    </ul>

				</div>

				<div id="rightcontent">

					<h2>Manufacturing &amp; Technical Programs</h2>

<hr />

<br />

<p>EIT's new 50,000+ square foot facility at the Millcreek Mall has plenty of space to house technology training.&nbsp;&nbsp;&nbsp;Advanced Manufacturing programs, once taught at the former <i>CAMtech, </i>are now offered here, in addition to new technology programs being added to meet the Erie area's training needs.</p>

<ul>

    <li>CNC/Machinist Technician</li>

    <li>Electrician</li>

    <li>Maintenance Technician</li>

    <li>Refrigeration, Heating, Ventilating and Air Conditioning (RHVAC) Technology</li>

    <li>Welding Technology</li>

</ul>

<img width="120" height="147" align="left" src="http://www.erieit.edu/_files/images/file_47.jpg" alt="CNC Machinist Technician" /><img width="110" height="147" align="left" src="http://www.erieit.edu/_files/images/file_130.jpg" alt="Maintenance Technician" /><img width="110" height="147" align="left" src="http://www.erieit.edu/_files/images/file_84.jpg" alt="Refrigeration, Heating, Ventilation and Air Conditioning Technology (RHVAC)" /><img width="100" height="147" align="left" src="http://www.erieit.edu/_files/images/file_128.gif" alt="Welding Technology" />

				</div>				



				

			</div><br clear="all" />



<? include('global_includes/footer.php');?>
		 



	</body>

</html>



