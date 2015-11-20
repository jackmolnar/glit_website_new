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

		<title>Why Eit? | Erie Institute of Technology</title>

		<meta name="keywords" content="Erie Institute of Technology, Electronics, Computers, Manufacturing, technical school, trade school, erie, pa, welding, electrician, rhvac, graphic design" />

		<meta name="description" content="Erie Institute of Technology is a technical or trade school offering career training in Electronics, Computers, and Manufacturing."/>

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

				<img src="_images/why_eit.jpg" alt="#" />

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
							
							<? include ('global_includes/left_menu_1.php'); ?>
                            

                            </ul>

						</div>

					</td>

					<td id="rightcontent">

						<h2>Erie Institute of Technology</h2>

<h3>is an educational facility providing career training for the technology careers of tomorrow.</h3>

<p>Whether you're just starting on your career path or looking to expand your career opportunities, EIT is committed to helping you achieve your goals.<br />

<br />

<span style="font-size: smaller;"><i>EIT Manufacturing Lab</i></span></p>

<p><img alt="EIT Manufacturing Lab" src="http://erieit.edu/_images/manu_shop.jpg" /></p>

<p>Conveniently located in Erie, PA, EIT is an easy commute for students from Pennsylvania, New York, and Ohio. We provide a wide variety of training services to our students. Consider these unique EIT benefits:</p>

<ul>

    <li>Focused electronics, computer, and advanced manufacturing curricula</li>

    <li>Practical hands-on laboratory training along with classroom instruction</li>

    <li>Preparation for tomorrow's job market</li>

    <li>Safe, small-town atmosphere with a high quality of life</li>

    <li>Job placement assistance</li>

</ul><br />

<h2>EIT: Erie's Manufacturing Technology School</h2><br />

<p>When the Center for Advanced Manufacturing &amp; Technology (CAMtech) closed it's doors several years ago, a void developed for industrial training. EIT -- Erie's Techology School -- stepped up to the forefront to continue providing this training in Erie County and the surrounding region. In fact, the training never stopped ... EIT has trained over 900 students in classrooms and at employers' sites. We've improved the former CAMtech programs based upon the needs of Erie employers and have what it takes to get you into the job market.</p>

					</td>

				</tr>

			</table><br clear="all" />		

<? include('global_includes/footer.php'); ?>

	</body>

</html>





