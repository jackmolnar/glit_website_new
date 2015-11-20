<?php

include("global_includes/facebook/facebook_connect.php");

$reachlocal = strpos($_SERVER['HTTP_REFERER'], 'reachlocal');
if ($reachlocal>''){
	$expire=time()+60*60*24*30;
	setcookie("reachlocal", "yes", $expire);
}

//MOBILE DETECTION
if ($_REQUEST['mobile'] == 'no'){
$expire=time()+60*60;
setcookie("mobile", "no", $expire, '/', '.erieit.edu');
} else if ($_COOKIE["mobile"] == ''){
$mobile = 'http://mobile.erieit.edu'.$_SERVER["REQUEST_URI"];
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

		<title>Biomedical Equipment Technology Training Program | Erie Institute of Technology</title>

		<meta name="keywords" content="biomedical equipment, repair, erie, pa, hospital, ekg" />

		<meta name="description" content="Erie PA Biomedical Equipment Technology Training School- Erie Institute of Technology's Biomedical Equipment Technology program trains the student in the repair of many medical devices used in hospitals."/>

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
				
				<? include('global_includes/main_menu.php'); ?>
                
                </ul>

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

<table>

<tr>

			<td id="subcontent">

				<div id="leftmenu">
                <ul>
                
					
					<? include('global_includes/short_form_test.php');?>

</ul>
				</div>

			</td>

				<td id="rightcontent">

					<div id="rightcontentmenu">

						<? $current_program = 'biomedical_equipment_technology';
						
						include('global_includes/program_sub_menu.php'); ?>

</ul>

					</div>

<img style="border: 3px solid rgb(234, 234, 234); float: right; margin: 5px;" alt="Erie Bio Medical Classes" src="http://www.erieit.edu/_files/images/file_43.jpg" />

<h2>Biomedical Equipment Technology</h2>

<h3>Overview</h3>
<hr />
<p >Health care professionals rely on an array of critical electronic devices to diagnose and provide medical care for their patients.&nbsp; With lives at stake, the proper operation of this equipment is vital.</p>
<br />
<p >In the Biomedical Equipment Technology career training program you will learn to install, calibrate, troubleshoot, and repair medical equipment.&nbsp; Combining this with medical terminology and physiology, computer networking, and biomedical equipment systems, you will work on a wide range of health-related monitoring, diagnostic, therapeutic, and surgical apparatus and instrumentation.</p>

<h3>Virtual Tour Video</h3><p>
<iframe width="500" height="281" src="http://www.youtube.com/embed/hipcG3xVUdA" frameborder="0" allowfullscreen></iframe>

<h3>Comments from Graduates</h3><p>
<iframe width="500" height="281" src="http://www.youtube.com/embed/vOx43nhPEqM" frameborder="0" allowfullscreen></iframe>

				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>



<div id="disclosures1">

<a name="consumer_info">Consumer Information</a> | Program Name: Biomedical Equipment Technology | 
SOC Code: 49-9062.00 - Medical Equipment Repairers<br />
<a href="http://www.onetonline.org/link/summary/49-9062.00">http://www.onetonline.org/link/summary/49-9062.00</a>
 | Award Level: Associate Degree | 
 Program Length: 18 Months | 
 Program Costs (effective 7/1/12): Tuition: $20,700.00 Registration Fee: $100.00 Technology Fee: $300.00 Lab Fees: $2,300.00 Books (Estimated): $3,000.00 Equipment / Supplies (Estimated): $350.00 | 
 On-time Completion Rate: Rate: 93% (14/15) Range:  Graduates who began their studies between 1/08 – 12/08. | 
 Job placement rates as reported on the 2011 ACCSC annual report: Rate: 71% Range:  Graduates who began their studies between 1/08 – 12/08. 
 Job Titles: Tech 1, Electronic Tech, Biomed Tech 1 - Employers: UPMC - Greenville - Accuspec - GE Health -Buffalo | 
 Median Loan Debt of Graduates (graduated 2011 – 2012): Federal - $7,558.00 Alternative - $0.00 Institutional - $0.00<br />
</div>


	</body>

</html>







