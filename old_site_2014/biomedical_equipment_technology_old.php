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

		<title>Biomedical Equipment Technology Training Program | Erie Institute of Technology</title>

		<meta name="keywords" content="biomedical equipment, repair, erie, pa, hospital, ekg" />

		<meta name="description" content="Biomedical Equipment Technology Training School- Erie Institute of Technology's Biomedical Equipment Technology program trains the student in the repair of many medical devices used in hospitals."/>

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
					
					<? include('global_includes/electronics_menu.php');?>
                    
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
<p>Health care professionals rely on an array of critical electronic devices to diagnose and provide medical care for their patients.&nbsp; With lives at stake, the proper operation of this equipment is vital.</p>

<p>In the Biomedical Equipment Technology career training program you will learn to install, calibrate, troubleshoot, and repair medical equipment.&nbsp; Combining this with medical terminology and physiology, computer networking, and biomedical equipment systems, you will work on a wide range of health-related monitoring, diagnostic, therapeutic, and surgical apparatus and instrumentation.</p>

				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>



<div id="disclosures1">

<a name="consumer_info">Consumer Information</a> | Program Name: Biomedical Equipment Technology | SOC Code: 49-9062.00 - Medical Equipment Repairers<br />
<a href="http://www.onetonline.org/link/summary/49-9062.00">http://www.onetonline.org/link/summary/49-9062.00</a>
 | Award Level: Associate Degree | Program Length: 18 Months | Program Costs (effective 7/1/11): Tuition: $20,700.00 Registration Fee: $100.00 Technology Fee: $300.00 Lab Fees: $2,300.00 Books (Estimated): $3,000.00 Equipment / Supplies (Estimated): $350.00 | On-time Completion Rate: Rate: 96% (26/27) Range:  Graduates who began their studies between 1/07 – 12/07. | Job placement rates as reported on the 2010 ACCSC annual report: Rate: 73% Range:  Graduates who began their studies between 1/07 – 12/07. Job Titles: Tech 1, BMET 1, Biomed Tech 1 - Employers: DaVita, St. Mary's Health, Kaleida Health | Median Loan Debt of Graduates (graduated 7/1/09 – 6/30/10): Federal - $12,000 Alternative - $0.00 Institutional - $0.00<br />
</div>


	</body>

</html>







