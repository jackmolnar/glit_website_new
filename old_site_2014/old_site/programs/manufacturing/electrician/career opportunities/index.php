<?php
	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE
		$depth = "../../../../";
	//INCLUDE ALL OF OUR MODULE CLASSES
		include "../../../../_admin/class/class_config.php";
		include "../../../../_admin/class/class_db.php";
		include "../../../../_admin/class/class_time.php";
	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;
		include "../../../../_face/class/face_common.php";
                include "../../../../_admin/includes/meta_data.php";
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
		<title><? echo $cfg->site_title; ?> | Career Opportunities</title>
		<meta name="author" content="Werkbot Studios" />
		<meta name="keywords" content="<? echo $meta_keywords; ?>" />
		<meta name="description" content="<? echo $meta_description; ?>"/>
		<meta name="robots" content="index, follow" />
<meta name="googlebot" content="noodp">
		<link href="../../../../_scripts/master.css" rel="stylesheet" type="text/css" />
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
			<div id="subtop">
				<p><img alt="#" src="<? echo $depth;?>_images/programs_man.jpg" /></p>
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
if($common->checkurlForPageName("cnc%20machinist%20technician")){

		print "<li><div class='leftselect'>CNC/Machinist Technician</div></li>";

	}else{

		print "<li><a href='".$depth."programs/manufacturing/cnc machinist technician/'>CNC/Machinist Technician</a></li>";

	}
if($common->checkurlForPageName("maintenance%20technician")){

		print "<li><div class='leftselect'>Maintenance Technician</div></li>";

	}else{

		print "<li><a href='".$depth."programs/manufacturing/maintenance technician/'>Maintenance Technician</a></li>";

	}

	if($common->checkurlForPageName("rhvac%20technology")){

		print "<li><div class='leftselect'>RHVAC Technology</div></li>";

	}else{

		print "<li><a href='".$depth."programs/manufacturing/rhvac technology/'>RHVAC Technology</a></li>";

	}

	if($common->checkurlForPageName("welding%20technology")){

		print "<li><div class='leftselect'>Welding Technology</div></li>";

	}else{

		print "<li><a href='".$depth."programs/manufacturing/welding%20technology/'>Welding Technology</a></li>";

	}
		if($common->checkurlForPageName("electrician")){

		print "<li><div class='leftselect'>Electrician</div></li>";

	}else{

		print "<li><a href='".$depth."programs/manufacturing/electrician/'>Electrician</a></li>";

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
}else if($tmp[count($tmp)-3]=="electrician"){
		$link = $depth."programs/manufacturing/electrician/";
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
					<h2>Electrician</h2>
<h3>Career Opportunities</h3>
<hr />
<br />
Graduates can work in Residential, Commercial, and Industrial electricity. Graduates also have the ability to become self employed.<br />
<br />
Job prospects are expected to be good in coming years.<br />
<br />
<a href="http://www.bls.gov">www.bls.gov</a><br type="_moz" />
				</td>
</tr>
			</table>
		<br clear="all" />
				
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



