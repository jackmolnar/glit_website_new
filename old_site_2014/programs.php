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

		<title>Programs | Erie Institute of Technology</title>

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

				<ul>
                
                <? include('global_includes/main_menu.php'); ?>
                
                </ul>

			</div>

		</div>

		

		<div id="content">



			<table>

				<tr>

					<td id="fullcontent">

						

<div><br clear="all" />

<h2>Program Overview</h2>

<hr />

<p>EIT offers a wide range of training programs for entry into&nbsp;technical careers. Our programs provide thorough, focused coverage of topics related to your chosen career, preparing you for the job market.<br />

<br />

&nbsp;</p>

<table width="750" cellspacing="5" cellpadding="1" border="0" align="center">

    <tbody>

        <tr>

            <td><span style="font-size: larger;"><b>Computer Programs</b></span></td>

            <td><span style="font-size: larger;"><b>Electronics Programs</b></span></td>

            <td><b><span style="font-size: larger;">Manufacturing / Technology Programs</span></b></td>

        </tr>

        <tr>

            <td><a href="multimedia_graphic_design.php">Multimedia Graphic Design</a></td>

            <td><a href="biomedical_equipment_technology.php">Biomedical Equipment Technology</a></td>

            <td><a href="cnc_machinist_technician.php">CNC/Machinist Technician</a></td>

        </tr>

        <tr>

            <td><a href="network_database_professional.php">Network and Database Professional</a></td>

            <td><a href="computer_electronics_engineering_technology.php">Electronic Engineering Technology</a></td>

            <td><a href="electrician.php">Electrician</a></td>

        </tr>

        <tr>

            <td><a href='business_information_management.php'  >Business and Information Management</a></td>

            <td><a href="electronics_technician.php">Electronics Technician</a></td>

            <td><a href="maintenance_technician.php">Maintenance Technician</a></td>

        </tr>

        <tr>

            <td>&nbsp;</td>

            <td>&nbsp;</td>

            <td><a href="rhvac_technology.php">Refrigeration, Heating, Ventilating and Air <br />

            Conditioning (RHVAC)  Technology</a></td>

        </tr>

        <tr>

            <td>&nbsp;</td>

            <td>&nbsp;</td>

            <td><a href="welding_technology.php">Welding Technology</a></td>

        </tr>

    </tbody>

</table>

<p><br />

<br />

&nbsp;</p>

</div>

					</td>

				</tr>

			</table><br clear="all" />

				

<? include('global_includes/footer.php'); ?>

</body>

</html>





