<?php
	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE
		$depth = "../../";
	//INCLUDE ALL OF OUR MODULE CLASSES
		include "../../_admin/class/class_config.php";
		include "../../_admin/class/class_db.php";
		include "../../_admin/class/class_time.php";
	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;
		include "../../_face/class/face_common.php";
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
		<title><? echo $cfg->site_title; ?> | Customized Training</title>
		<meta name="author" content="Werkbot Studios" />
		<meta name="keywords" content="erie institute of technology, eit, computer, electronics, manufacturing, technology, technical school, trade school, vocational school, tech school, Biomedical Equipment Technology, Business Office Professional, CNC Technician, Electrician, Electronic Engineering Technology, Electronics Technician, Industrial Automation and Robotics Technology, Maintenance Technician, Multimedia Graphic Design, Network and Database Technologies, Refrigeration, Heating, Ventilation, and Air Conditioning or RHVAC Technology, and Welding Technology, career training" />
		<meta name="description" content="Erie Technology School - Erie Institute of Technology or EIT offers the following Computer, Electronics, Manufacturing, and Technology Programs: Biomedical Equipment Technology, Business Office Professional, CNC Technician, Electrician, Electronic Engineering Technology, Electronics Technician, Industrial Automation and Robotics Technology, Maintenance Technician, Multimedia Graphic Design, Network and Database Technologies, Refrigeration, Heating, Ventilation, and Air Conditioning or RHVAC Technology, and Welding Technology."/>
		<meta name="robots" content="index, follow" />
<meta name="googlebot" content="noodp">
		<link href="../../_scripts/master.css" rel="stylesheet" type="text/css" />
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
						<h2>Meeting employer training needs in the region.</h2>
<hr />
<h3>Let us help you with your training needs.</h3>
<h4>We have trained over 2200 students since the beginning of 2006 -- over 600 in Warren, alone!</h4>
<br />
<p>With the recent opening of our new 50,000 sq.ft. training center in Erie, all Industry-Specific Training and Continuing Education is now being handled through Erie Institute of Technology.&nbsp; <a href="http://www.glit.edu/training/news.htm">Read more &gt;&gt;</a></p>
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
<u><font color="#810081"><a href="http://www.glit.edu/training/">Customized Corporate &amp; Industry Training Web Site &gt;&gt;</a></font></u><br />
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
<u><font color="#810081"><a href="http://www.glit.edu/training">Industry-Specific Custom Training Web Site &gt;&gt;</a></font></u></div>
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


