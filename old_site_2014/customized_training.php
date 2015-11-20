<?php

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

		<title>Customized Training | Erie Institute of Technology</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="erie institute of technology, eit, computer, electronics, manufacturing, technology, technical school, trade school, vocational school, tech school, Biomedical Equipment Technology, Business Office Professional, CNC Technician, Electrician, Electronic Engineering Technology, Electronics Technician, Industrial Automation and Robotics Technology, Maintenance Technician, Multimedia Graphic Design, Network and Database Technologies, Refrigeration, Heating, Ventilation, and Air Conditioning or RHVAC Technology, and Welding Technology, career training" />

		<meta name="description" content="Erie Technology School - Erie Institute of Technology or EIT offers the following Computer, Electronics, Manufacturing, and Technology Programs: Biomedical Equipment Technology, Business Office Professional, CNC Technician, Electrician, Electronic Engineering Technology, Electronics Technician, Industrial Automation and Robotics Technology, Maintenance Technician, Multimedia Graphic Design, Network and Database Technologies, Refrigeration, Heating, Ventilation, and Air Conditioning or RHVAC Technology, and Welding Technology."/>

		<meta name="robots" content="index, follow" />

<meta name="googlebot" content="noodp">

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



			<table>

				<tr>

					<td id="fullcontent">

						<h2>Meeting employer training needs in the region.</h2>

<hr />

<h3>Let us help you with your training needs.</h3>

<h4>We have trained over 3400 students since the beginning of 2006!</h4>

<br />

<p>With the recent opening of our new 40,000 sq.ft. training center in Erie, all Industry-Specific Training and Continuing Education is now being handled through Erie Institute of Technology.&nbsp; <a href="http://www.eit-continuinged.com">Read more &gt;&gt;</a></p>

<br />

<hr />

<br />

<h3>Customized Corporate &amp; Industry training</h3>

<p>We can set up a customized training plan to meet your needs.&nbsp; We offer employers:</p>

<div style="padding-left: 40px">

<ul>

    <li>Customized training at your facility</li>

    <li>Knowledgeable instructors</li>

    <li>Computer instruction at your facility or in our networked computer lab</li>

    <li>Instruction on all shifts to meet your needs</li>

</ul>

</div>

<u><font color="#810081"><a href="http://www.eit-continuinged.com">Customized Corporate &amp; Industry Training Web Site &gt;&gt;</a></font></u><br />

<hr />

<br />

<h3>Industry-Specific or Custom Training</h3>

<p>Customized courses, meeting the specific needs of businesses, industries, agencies, and other organizations, can be provided. Classes are flexible and can be delivered at your convenience at our facility or yours.&rdquo;&nbsp;&nbsp;</p>

<div style="padding-left: 40px">

<ul>

    <li><a href="http://www.glit.edu/"><strong>Great Lakes Institute of Technology</strong></a> - Medical, Massage, Veterinary Assistant, and Allied Health programs.</li>

    <li><a href="http://www.toniguy-erie.edu/"><strong>TONI&amp;GUY Hairdressing Academy</strong></a> (offered by Great Lakes Institute of Technology) - International Cosmetology , Cosmetology Teacher, Manicurist programs.</li>

    <li><a href="http://www.erieit.edu/"><strong>Erie Institute of Technology</strong></a> - Computer, Electronics, and Advanced Manufacturing&nbsp;programs</li>

</ul>

<br />

<u><font color="#810081"><a href="http://www.eit-continuinged.com">Industry-Specific Custom Training Web Site &gt;&gt;</a></font></u></div>

					</td>

				</tr>

			</table><br clear="all" />

				

<? include('global_includes/footer.php'); ?>

</html>





