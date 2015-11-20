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
		<title><? echo $cfg->site_title; ?> | Programs</title>
		<meta name="author" content="Werkbot Studios" />
		<meta name="keywords" content="erie institute of technology, eit, computer, electronics, manufacturing, technology, technical school, trade school, vocational school, tech school, Biomedical Equipment Technology, Business Office Professional, CNC Technician, Electrician, Electronic Engineering Technology, Electronics Technician, Industrial Automation and Robotics Technology, Maintenance Technician, Multimedia Graphic Design, Network and Database Technologies, Refrigeration, Heating, Ventilation, and Air Conditioning or RHVAC Technology, and Welding Technology, career training" />
		<meta name="description" content="Erie Technology School - Erie Institute of Technology or EIT offers the following Computer, Electronics, Manufacturing, and Technology Programs: Biomedical Equipment Technology, Business Office Professional, CNC Technician, Electrician, Electronic Engineering Technology, Electronics Technician, Industrial Automation and Robotics Technology, Maintenance Technician, Multimedia Graphic Design, Network and Database Technologies, Refrigeration, Heating, Ventilation, and Air Conditioning or RHVAC Technology, and Welding Technology."/>
		<meta name="robots" content="index, follow" />
<meta name="googlebot" content="noodp">
		<link href="../_scripts/master.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
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

			<table>
				<tr>
					<td id="fullcontent">
						<div align="center" style="padding-left: 2px;"><a href="<? echo $depth;?>programs/computers"><img width="185" height="167" border="0" src="http://www.erieit.edu/_files/images/file_10.jpg" alt="Business Office Professional, Multimedia Graphic Design, Network &amp; Database Professional programs" /></a>&nbsp; <a href="<? echo $depth;?>programs/electronics"><img width="185" height="167" border="0" src="http://www.erieit.edu/_files/images/file_12.jpg" alt="Biomedical Equipment Technology, Electronic Engineering Technology, Electronics Technician, Industrial Automation &amp; Robotics programs" /></a>&nbsp; <a href="<? echo $depth;?>programs/manufacturing"><img width="185" height="167" border="0" src="http://www.erieit.edu/_files/images/file_122.jpg" alt="CNC/Machinist, Maintenance, RHVAC, Welding programs" /></a></div>
<div><br clear="all" />
<h2>Program Overview</h2>
<hr />
<p>EIT offers a wide range of training for entry into&nbsp;technical careers. Our programs provide thorough, focused coverage of topics related to your chosen career, preparing you for the job market.<br />
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
            <td><a href="http://erieit.edu/programs/computers/multimedia%20graphic%20design/">Multimedia Graphic Design</a></td>
            <td><a href="http://erieit.edu/programs/electronics/biomedical%20equipment%20technology/">Biomedical Equipment Technology</a></td>
            <td><a href="http://erieit.edu/programs/manufacturing/cnc%20machinist%20technician/">CNC/Machinist Technician</a></td>
        </tr>
        <tr>
            <td><a href="http://erieit.edu/programs/computers/network%20database%20professional/">Network and Database Professional</a></td>
            <td><a href="http://erieit.edu/programs/electronics/computer%20electronics%20engineering%20technology/">Electronic Engineering Technology</a></td>
            <td><a href="http://erieit.edu/programs/manufacturing/electrician/">Electrician</a></td>
        </tr>
        <tr>
            <td><a href="http://erieit.edu/programs/computers/business%20office%20professional/">Business Office Professional</a></td>
            <td><a href="http://erieit.edu/programs/electronics/electronic%20technician/">Electronics Technician</a></td>
            <td><a href="http://erieit.edu/programs/manufacturing/maintenance%20technician/">Maintenance Technician</a></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="http://erieit.edu/programs/electronics/industrial%20automation%20robotics%20technology/">Industrial Automation and Robotics<br />
            Technology<br />
            </a></td>
            <td><a href="http://erieit.edu/programs/manufacturing/rhvac%20technology/">Refrigeration, Heating, Ventilating and Air <br />
            Conditioning (RHVAC)  Technology</a></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><a href="http://erieit.edu/programs/manufacturing/welding%20technology/">Welding Technology</a></td>
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
				
<div class="hblob">
					<a href="http://erieit.edu/contact/"><img src="<? echo $depth;?>_images/contact.png" alt="#" /></a>
				</div>
<div class="hblob">
					<a href="http://erieit.edu/admissions/schedule%20a%20tour%20of%20erie%20institute%20of%20technology/"><img src="<? echo $depth;?>_images/schedule_tour.png" alt="#" /></a>
				</div>
				<div class="hblob">
					<a href="http://erieit.edu/admissions/apply%20online/"><img src="<? echo $depth;?>_images/apply_online.png" alt="#" /></a>
				</div>
                <div class="hblob">
					<a href="http://erieit.edu/admissions/request%20more%20information/"><img src="<? echo $depth;?>_images/req_more_info.png" alt="#" /></a>
				</div>


&nbsp;</div>				
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
	</body>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2137940-3");
pageTracker._initData();
pageTracker._trackPageview();


</script>
</html>


