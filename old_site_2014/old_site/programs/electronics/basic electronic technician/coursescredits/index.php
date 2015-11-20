<?php

	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "../../../../";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "../../../../_admin/class/class_config.php";

		include "../../../../_admin/class/class_db.php";

		include "../../../../_admin/class/class_time.php";

	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;

		include "../../../../_face/class/face_common.php";

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

		<title><? echo $cfg->site_title; ?> | Courses/Credits</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="" />

		<meta name="description" content=""/>

		<meta name="robots" content="index, follow" />

		<link href="../../../../_scripts/master.css" rel="stylesheet" type="text/css" />

	</head>

	<body>

		<div id="masterframe">

			<div id="header">

				<div id="search">

					<form action="../../../../search/" method="post">

						<input class="txt" name="keys" type="text" value="Search..." maxlength="50" onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...';"/>

						<input class="img" type="image" src="../../../../_images/searchtxt.gif" alt="Search" border="0"/>

					</form>

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

		<div id="submenu">

			<ul id="submid"><?

	if($common->checkurlForPageName("computers")){

		print "<li><a href='".$depth."programs/computers/'><span>Computers</span></a></li>";

	}else{

		print "<li><a href='".$depth."programs/computers/'><span>Computers</span></a></li>";

	}

	if($common->checkurlForPageName("electronics")){

		print "<li><a href='".$depth."programs/electronics/'><span>Electronics</span></a></li>";

	}else{

		print "<li><a href='".$depth."programs/electronics/'><span>Electronics</span></a></li>";

	} 

	if($common->checkurlForPageName("manufacturing")){

		print "<li><a href='".$depth."programs/manufacturing/'><span>Manufacturing & Technology</span></a></li>";

	}else{

		print "<li><a href='".$depth."programs/manufacturing/'><span>Manufacturing & Technology</span></a></li>";

	}  

	if($common->checkurlForPageName("continuing%20education")){

		print "<li><a href='".$depth."programs/continuing education/'><span>Continuing Education</span></a></li>";

	}else{

		print "<li><a href='".$depth."programs/continuing education/'><span>Continuing Education</span></a></li>";

	}  

	if($common->checkurlForPageName("customized%20training")){

		print "<li><a href='".$depth."programs/customized training/'><span>Customized Training</span></a></li>";

	}else{

		print "<li><a href='".$depth."programs/customized training/'><span>Customized Training</span></a></li>";

	} 

?></ul>

		</div>

		<div id="content">

			<div id="subtop">

				<p><img alt="#" src="<? echo $depth;?>_images/programs_electronics.jpg" /></p>

				<div id="subtopleft">

				<?

					$num = rand(1,7);

					print "<img src='../../../../_images/quote_00".$num.".gif' />";

				?>

				</div>

			</div>

<table>

<tr>

			<td id="subcontent">

				<div id="leftmenu">

					<ul><?

	if($common->checkurlForPageName("computer%20electronics%20engineering%20technology")){

		print "<li><div class='leftselect'>Electronics<br /> Engineering Technology</div></li>";

	}else{

		print "<li><a href='".$depth."programs/electronics/computer electronics engineering technology/'>Electronics<br /> Engineering Technology</a></li>";

	}

	if($common->checkurlForPageName("biomedical%20equipment%20technology")){

		print "<li><div class='leftselect'>Biomedical Equipment Technology</div></li>";

	}else{

		print "<li><a href='".$depth."programs/electronics/biomedical%20equipment%20technology/'>Biomedical Equipment Technology</a></li>";

	}

	if($common->checkurlForPageName("basic%20electronic%20technician")){

		print "<li><div class='leftselect'>Electronics Technician</div></li>";

	}else{

		print "<li><a href='".$depth."programs/electronics/basic electronic technician/'>Electronics Technician</a></li>";

	}

	if($common->checkurlForPageName("industrial%20automation%20robotics%20technology")){

		print "<li><div class='leftselect'>Industrial Automation &amp; Robotics Technology</div></li>";

	}else{

		print "<li><a href='".$depth."programs/electronics/industrial automation robotics technology/'>Industrial Automation &amp; Robotics Technology</a></li>";

	}

	/*if($common->checkurlForPageName("office%20machine%20service%20technology")){

		print "<li><div class='leftselect'>Office Machine Service Technology</div></li>";

	}else{

		print "<li><a href='".$depth."programs/electronics/office machine service technology/'>Office Machine Service Technology</a></li>";

	}*/

?></ul>

				</div>

			</td>

				<td id="rightcontent">

					<div id="rightcontentmenu">

						<?

	$tmp = explode("/", $_SERVER['REQUEST_URI']);

	if($tmp[count($tmp)-3]=="multimedia%20graphic%20design"){

		$link = $depth."programs/computers/multimedia graphic design/";

		$overview_name = " ";	

	}else if($tmp[count($tmp)-3]=="network%20database%20professional"){

		$link = $depth."programs/computers/network database professional/";

		$overview_name = " ";	

	}else if($tmp[count($tmp)-3]=="business%20office%professional"){

		$link = $depth."programs/computers/business office professional/";

		$overview_name = " ";	

	}else if($tmp[count($tmp)-3]=="biomedical%20equipment%20technology"){

		$link = $depth."programs/electronics/biomedical equipment technology/";

		$overview_name = " ";	

	}else if($tmp[count($tmp)-3]=="computer%20electronics%20engineering%20technology"){

		$link = $depth."programs/electronics/computer%20electronics%20engineering%20technology/";

		$overview_name = " ";	

	}else if($tmp[count($tmp)-3]=="basic%20electronic%20technician"){

		$link = $depth."programs/electronics/basic electronic technician/";

		$overview_name = " ";

	}else if($tmp[count($tmp)-3]=="industrial%20automation%20robotics%20technology"){

		$link = $depth."programs/electronics/industrial automation robotics technology/";

		$overview_name = " ";

	}else if($tmp[count($tmp)-3]=="office%20machine%20service%20technology"){

		$link = $depth."programs/electronics/office machine service technology/";

		$overview_name = " ";		

	}else if($tmp[count($tmp)-3]=="cnc%20machinist%20technician"){

		$link = $depth."programs/manufacturing/cnc machinist technician/";

		$overview_name = " ";	

	}else if($tmp[count($tmp)-3]=="moldmaker%20mold%20designer"){

		$link = $depth."programs/manufacturing/moldmaker mold designer/";

		$overview_name = " ";	

	}else if($tmp[count($tmp)-3]=="manufacturing%20technician"){

		$link = $depth."programs/manufacturing/manufacturing technician/";

		$overview_name = " ";	

	}else if($tmp[count($tmp)-3]=="maintenance%20technician"){

		$link = $depth."programs/manufacturing/maintenance technician/";

		$overview_name = " ";	

	}else if($tmp[count($tmp)-3]=="rhvac%20technology"){

		$link = $depth."programs/manufacturing/rhvac technology/";

		$overview_name = " ";	

	}else if($tmp[count($tmp)-3]=="welding%20technology"){

		$link = $depth."programs/manufacturing/welding technology/";

		$overview_name = " ";	

	}

?>

<ul><?

	if($common->checkurlForPageName($overview_name)){

		print "<li><a href='".$link."'><span>Overview</span></a></li>";

	}else{

		print "<li><a href='".$link."'><span>Overview</span></a></li>";

	}

	if($common->checkurlForPageName("coursescredits")){

		print "<li><a href='".$link."coursescredits/'><span>Courses/Credits</span></a></li>";

	}else{

		print "<li><a href='".$link."coursescredits/'><span>Courses/Credits</span></a></li>";

	}

	if($common->checkurlForPageName("career%20opportunities")){

		print "<li><a href='".$link."career%20opportunities/'><span>Opportunities</span></a></li>";

	}else{

		print "<li><a href='".$link."career%20opportunities/'><span>Opportunities</span></a></li>";

	}

	if($common->checkurlForPageName("testimonials")){

		print "<li><a href='".$link."testimonials/'><span>Testimonials</span></a></li>";

	}else{		

		print "<li><a href='".$link."testimonials/'><span>Testimonials</span></a></li>";	

	}

?></ul>

					</div>

					<h2>Electronic Technician</h2>

<h3>Courses/Credits</h3>

<h4>Diploma, Full-time&nbsp;12-month program</h4>

<p><b><span style="color: #993300"><i>UPDATED Fall 2008</i></span></b><br />

68&nbsp;Credits --&nbsp;1290 Hours<br />

<br />

EIT has added one more term, added more math &amp; circuit design,&nbsp;and updated the electronics and lab classes to make this program stronger for those who want to work in the electronics industry.&nbsp; More information is available from the Admissions Department.</p>

				</td>

</tr>

			</table>

		<br clear="all" />

				<div class="hblob">

					<a href="<? echo $depth;?>admissions/tell%20a%20friend/"><img src="<? echo $depth;?>_images/chat.gif" alt="#" /></a>

				</div>

				<div class="hblob">

					<a href="<? echo $depth;?>contact/"><img src="<? echo $depth;?>_images/phone.gif" alt="#" /></a>

				</div>

				<div class="hblob">

					<a href="<? echo $depth;?>admissions/apply%20online/"><img src="<? echo $depth;?>_images/apply.gif" alt="#" /></a>

				</div></div>

		<div id="footer">

			<?php

		function getYear(){

		$theday = getdate();

		$y = $theday[year];

		return $y;

	}

?>

<p><a target="_blank" href="http://www.youtube.com/thecareerschools"><img height="41" alt="See EIT videos on YouTube.com/thecareerschools" width="80" align="middle" border="0" src="http://www.erieit.edu/_files/images/file_120.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="http://www.facebook.com/home.php?#/pages/Erie-PA/Erie-Institute-of-Technology/186675069112"><img height="38" alt="Become a friend of EIT on Facebook:  thecareerschools" width="100" align="middle" border="0" src="http://www.erieit.edu/_files/images/file_118.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a target="_blank" href="http://www.twitter.com/EITCareerServ"><img height="23" alt="Follow EIT Career Services Office on Twitter:  EITCareerServ" width="100" align="middle" border="0" src="http://www.erieit.edu/_files/images/file_108.png" /></a><br />

Home |&nbsp;<a href="http://www.erieit.edu/alumni/">Career Services (Alumni &amp; Employers)</a>&nbsp;|&nbsp;<a href="http://www.erieit.edu/careers/">Employment</a> | <a href="http://www.erieit.edu/contact/">Contact Us</a> | <a href="http://www.erieit.edu/site map/">Site Map</a> | <a href="http://www.erieit.edu/privacy/">Privacy Policy</a> | <a href="mailto:info@erieit.edu">Webmaster</a> <br />

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







