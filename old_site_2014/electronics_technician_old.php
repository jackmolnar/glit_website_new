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

		<title>Electronics Technician Training Program | Erie Institute of Technology</title>

		<meta name="keywords" content="electronics, technician, repair, erie, pa" />

		<meta name="description" content="Electronics Technician Training School - Erie Institute of Technology's Electronics Technician program trains the student in the repair and setting up of many electronic systems."/>

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

						<? $current_program = 'electronics_technician';
						
						include('global_includes/program_sub_menu.php'); ?>

</ul>

					</div>

					

<img src="http://www.erieit.edu/_files/images/file_39.jpg" alt="Erie Electronics Training" style="border: 3px solid rgb(234, 234, 234); float: right; margin: 5px;" />
<h2>Electronics Technician</h2>
<h3>Overview</h3>
<hr />
<p>Electronic devices make our high-tech world possible. In the Electronics Technician career training program you will learn the level of technical expertise needed to install, troubleshoot, and maintain this equipment.</p>

<p>If you are the kind of person who loves hooking things up or fixing things, the Electronics Technician will give you the background you need for electronic installation, troubleshooting, repair, and maintenance.With the core of basic theory, as well as analog and digital devices, the program also paves the way for other specialized electronics training at EIT: you could go on to specialize in Biomedical Equipment Technology, or Industrial Automation &amp; Robotics Technology.</p>



				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>

	</body>

</html>







