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

		<title>Continuing Education | Erie Institute of Technology</title>

		<meta name="keywords" content="continuing, education, erie, pa, electronics, computers, manufacturing, microsoft, word, excell, powerpoint, cnc, welding, dreamweaver, web design" />

		<meta name="description" content="Continuing Education Training School - Erie Institute of Technology offers continuing education to further your understanding of your field in electronics, computers, manufacturing and technology."/>

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
				
				<? include('global_includes/main_menu.php');?>
                
                </ul>

			</div>

		</div>

	
		<div id="content">

			<div id="subtop">

				<p><img alt="#" src="_images/programs_education.jpg" /></p>

				<div id="subtopleft">

				<?

					$num = rand(1,7);

					print "<img src='_images/quote_00".$num.".gif' />";

				?>

				</div>

			</div>

			<div id="subcontent">

				<div id="leftmenu">

					<ul><?

	if($common->checkurlForPageName("schedules")){

		print "<li><div class='leftselect'>Schedules</div></li>";

	}else{

		print "<li><a href='http://eit-continuinged.com/classes.php'>Schedules</a></li>";

	}

	if($common->checkurlForPageName("registration")){

		print "<li><div class='leftselect'>Registration</div></li>";

	}else{

		print "<li><a href='http://eit-continuinged.com/register.php'>Registration</a></li>";

	}

?></ul>

				</div>

				<div id="rightcontent">

					<img style="border-right: rgb(234,234,234) 3px solid; border-top: rgb(234,234,234) 3px solid; float: right; margin: 5px; border-left: rgb(234,234,234) 3px solid; border-bottom: rgb(234,234,234) 3px solid" alt="Erie Continuing Ed. Training" src="http://www.erieit.edu/_files/images/file_41.jpg" />

<h2>Continuing Education</h2>

<h3>Overview</h3>

<hr />

<p>&ldquo;Learning never stops. Just because you have a college degree, or hold a diploma or certificate for specialized training, doesn&rsquo;t mean that the world hasn&rsquo;t changed around you.</p>

<p>Our classes are developed to keep current with ever-changing technology. Classes are small, with hands-on learning, taught by experienced professionals. Tuition is reasonable, and various payment plans are available.&nbsp; <u><font color="#810081"><a href="http://www.eit-continuinged.com">Web Site &gt;&gt;</a></font></u></p>

<h3>Classes, Workshops, Seminars</h3>

<p>Take a class to enhance your skills, or learn something new. It could be career-related, or just for fun. Don&rsquo;t worry about competing for a grade &hellip; just come and learn!&nbsp; <u><font color="#810081"><a href="http://www.eit-continuinged.com">Web Site &gt;&gt;</a> </font></u></p>

<h3>Certification Updates &amp; CEUs</h3>

<p>Many certifications require CEUs to stay current. EIT can provide relevant courses in various disciplines to meet these requirements, or to stay current with new trends.&nbsp; <u><font color="#810081"><a href="http://www.eit-continuinged.com">Web Site &gt;&gt;</a></font></u></p>

<hr />

<a href="http://www.eit-continuinged.com">Continuing Education &amp; Customized Training Web Site &gt;&gt;</a>

				</div>				



				

			</div><br clear="all" />



<? include('global_includes/footer.php'); ?>



	</body>

</html>



