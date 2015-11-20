<?php
	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE
		$depth = "../";
	//INCLUDE ALL OF OUR MODULE CLASSES
		include "../_admin/class/class_config.php";
		include "../_admin/class/class_db.php";
		include "../_admin/class/class_time.php";
	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;
		include "../_face/class/face_common.php";
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
		<title><? echo $cfg->site_title; ?> | Site Map</title>
		<meta name="author" content="Werkbot Studios" />
		<meta name="keywords" content="" />
		<meta name="description" content=""/>
		<meta name="robots" content="index, follow" />
		<link href="../_scripts/master.css" rel="stylesheet" type="text/css" />
	</head>
	<body onload="load();" onunload="GUnload();">
		<div id="masterframe">
			<div id="header">
				<div id="search">
					<span style="text-align:right; color:#360; font-family:'Arial Black', Gadget, sans-serif; font-size:10px">FOLLOW US!</span><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.facebook.com/erieinstituteoftechnology" layout="button_count" width="200"></fb:like>
				</div>
			</div>
			<div id="menu">
				<ul><?
	if($common->checkurlForPageName("INDEX")){
		print "<li><div class='navselect'>Home</div></li>";
	}else{
		print "<li><a href='".$depth."index.php'>Home</a></li>";
	} 
	if($common->checkurlForPageName("why%20eit")){
		print "<li><div class='navselect'>Why EIT?</div></li>";
	}else{
		print "<li><a href='".$depth."why eit/our mission/'>Why EIT?</a></li>";
	}
	if($common->checkurlForPageName("programs") ){
		print "<li><div class='navselect'>Programs</div></li>";
	}else{
		print "<li><a href='".$depth."programs/'>Programs</a></li>";
	}
	if($common->checkurlForPageName("admissions")){
		print "<li><div class='navselect'>Admissions</div></li>";
	}else{
		print "<li><a href='".$depth."admissions/overview/'>Admissions</a></li>";
	}
	if($common->checkurlForPageName("stafffaculty")){
		print "<li><div class='navselect'>Staff/Faculty</div></li>";
	}else{
		print "<li><a href='".$depth."stafffaculty/'>Staff/Faculty</a></li>";
	}
	if($common->checkurlForPageName("newsevents")){
		print "<li><div class='navselect'>News/Events</div></li>";
	}else{
		print "<li><a href='".$depth."newsevents/'>News/Events</a></li>";
	}
	if($common->checkurlForPageName("contact")){
		print "<li><div class='navselect'>Contact</div></li>";
	}else{
		print "<li><a href='".$depth."contact/'>Contact</a></li>";
	}

	print "<li><a href='http://www.thecareerschools.com'>The Career Schools</a></li>";

?></ul>
			</div>
		</div>
		<div id="content">
			<div id="subtop">
				<img src="<? echo $depth;?>_images/programs_main.jpg" alt="#" />
				<div id="subtopleft">
				<?
					$num = rand(1,7);
					print "<img src='../_images/quote_00".$num.".gif' />";
				?>
				</div>
			</div>
			<table>
				<tr>
					<td id="fullcontent">
						<h2>EIT Website Directory</h2>
<p>&nbsp;</p>
<table cellspacing="0" cellpadding="0" style="float: left; padding-left: 20px;">
    <tbody>
        <tr>
            <td><a href="http://www.erieit.edu/"><b>Home</b></a></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> <a href="http://www.erieit.edu/why eit/"><strong>Why Eit?</strong></a></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <a href="http://www.erieit.edu/why eit/links of interest/">Links of Interest</a></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Success Stories</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Program Overview</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Our Mission</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> <strong>Programs</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Customized Training</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Continuing Education</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Registration</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Schedules</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Manufacturing</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Quality Control Technician</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Plastics Technician</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Maintenance Technician</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Manufacturing Technician</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Moldmaker Mold Designer</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>CNC / Machinist Technician</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Electronics</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Office Machine Service Technology</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Industrial Automation &amp; Robotics Technology</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Basic Electronic Technician</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Biomedical Equipment Technology</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Computer &amp; Electronics Engineering Technology</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
    </tbody>
</table>
<table style="float: right; padding-top: 20px;">
    <tbody>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Computers</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Office Software Specialist</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Network &amp; Database Professional</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Multimedia Graphic Design</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Testimonials</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Opportunities</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Courses/Credits</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> <strong>Admissions</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> financial aid</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Campus Tour</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Admission Requirements</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Tell A Friend</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> <strong>Apply Online</strong></td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Step Five</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Step Four</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Step Three</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Step Two</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Student Services</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Career Planning &amp; Placement</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /><img src="http://www.erieit.edu/_admin/images/tree_hor.gif" alt="" /> Overview</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> Staff/Faculty</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> News/Events</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> Contact</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> Search</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> careers</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> Alumni</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> privacy</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> Site Map</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> Student Gallery</td>
        </tr>
        <tr>
            <td><img src="http://www.erieit.edu/_admin/images/tree_cross.gif" alt="" /> Directions</td>
        </tr>
    </tbody>
</table>
					</td>
				</tr>
			</table>
		</div>
		<div id="footer">
			<?php
		function getYear(){
		$theday = getdate();
		$y = $theday[year];
		return $y;
	}
?>
<p><a target="_blank" href="http://www.glit.edu"><img width="107" height="41" border="0" align="middle" alt="Visit the Great Lakes Institute of Technology Website" src="http://www.erieit.edu/_files/images/glit_logo.png" /></a><a href="http://www.youtube.com/thecareerschools" target="_blank"><img width="80" height="41" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_120.png" alt="See EIT videos on YouTube.com/thecareerschools" /></a>&nbsp;&nbsp; <a href="http://www.facebook.com"><img width="100" height="38" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_118.png" alt="Become a friend of EIT
on Facebook:  thecareerschools" /></a>&nbsp;&nbsp; <a href="http://www.twitter.com/EITCareerServ" target="_blank"><img width="100" height="23" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_108.png" alt="Follow EIT Career Services Office on Twitter:  EITCareerServ" /></a><br />
Home |&nbsp;<a href="http://www.erieit.edu/alumni/">Career Services (Alumni &amp; Employers)</a>&nbsp;|&nbsp;<a href="http://www.erieit.edu/careers/">Employment</a> | <a href="http://www.erieit.edu/contact/">Contact Us</a> | <a href="http://www.erieit.edu/site map/">Site Map</a> | <a href="http://www.erieit.edu/privacy/">Privacy Policy</a> | <a href="mailto:info@erieit.edu">Webmaster</a> | <a href="http://www.glit.edu">glit.edu</a>  | <a href="http://toniguy.com/academy/erie/default.aspx">toniguy.com</a> <br />
&copy; <? echo getYear(); ?>Erie Institute of Technology, All Rights Reserved</p>
<br />
		</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2137940-3");
pageTracker._initData();
pageTracker._trackPageview();



</script>

	</body>
</html>

