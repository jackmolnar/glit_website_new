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

		<title>Industrial Automation and Robotics Technology Training Program | Erie Institute of Technology</title>

		<meta name="keywords" content="industrial automation, automation, robotics, erie, pa, install, clalibrate, troubleshoot, repair, electro mechanical, devices, programmable logic controls, motor controls, relays, timers, hydraulic components, pneumatic components." />

		<meta name="description" content="Industrial Automation &amp; Robotics Technology Training School- Erie Institute of Technology's Industrial Automation &amp; Robotics Technology program trains the student in installation, calibration, troubleshooting, and repairing sophisticated electro mechanical devices including programmable logic and motor controls, relays and timers, and hydraulic and pneumatic components."/>

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

		<div id="submenu">

			<ul id="submid">
			
			<? include('global_includes/sub_menu.php');?>
            
            </ul>

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

						<? $current_program = 'industrial_automation_robotics_technology';
						
						include('global_includes/program_sub_menu.php'); ?>

</ul>

					</div>

					

<img src="http://www.erieit.edu/_files/images/file_45.jpg" style="border: 3px solid rgb(234, 234, 234); margin: 5px; float: right;" alt="Erie Technology Careers" />
<h2>Industrial Automation &amp; Robotics Technology</h2>
<h3>Overview</h3>
<hr />

<p>Many of today&rsquo;s industrial processes, assembly, and warehousing rely on automation and robotics. Even though this equipment may have reduced manual labor, the human touch is still necessary to make it all work.</p>
<p>Automation and Robotics Technicians install, calibrate, troubleshoot, and repair sophisticated electro-mechanical devices including programmable logic and motor controls, relays and timers, and hydraulic and pneumatic components, in addition to sensor and transducers for measurements of temperature, pressure, flow, position and motion. With your core training in electronics you&rsquo;ll learn how the various types of robots, such as cylindrical, rectilinear, spherical, and jointed spherical are used in virtually any kind of industrial automated production equipment and robotics system.</p>




				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>

	</body>

</html>







