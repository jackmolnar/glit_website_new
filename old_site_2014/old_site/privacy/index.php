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
		<title><? echo $cfg->site_title; ?> | privacy</title>
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
						<h2>Privacy Policy</h2>
<p>Erie Institute of Technology is committed to protecting your privacy, however, this statement only covers information that is collected through this site. It does not cover information collected through high school or open house presentations; giveaways, contests, direct, or telemarketing promotions; PA Career Link; job fairs; and/or interest card submissions.</p>
<p>&nbsp;</p>
<hr />
<h3>The following discloses our privacy policy:</h3>
<br />
<div style="padding-left: 20px;">
<h3>Personal Information</h3>
<p><strong>What Information We Gather and Track</strong><br />
We request information when you fill out several forms on this site.</p>
<div style="padding-left: 40px;">
<ol>
    <li>For the <a href="http://www.erieit.edu/contact/">Contact Us</a> form:<br />
    Only your email address is collected so we may contact you with a reply to your questions or comments in an individualized manner.</li>
    <li>For the <a href="http://www.erieit.edu/contact/">Webmaster Contact</a> form:<br />
    Only your email is collected so the Webmaster may contact you in reference to your submission.</li>
    <li>For the <a href="http://www.erieit.edu/admissions/tell%20a%20friend/">Tell a Friend</a> form:<br />
    Only your email and your friend's email are collected. The message will be sent to your friend's email address showing your email address as the sender.</li>
    <li>For the <a href="http://www.erieit.edu/contact/">Request More Information</a> form:<br />
    Your name, address and email address are collected so we may send printed information to you by mail.</li>
    <li>For the <a href="http://www.erieit.edu/admissions/apply%20online/">Apply Online</a> form:<br />
    Only information necessary to contact you, ascertain your employment and educational histories, personal references, identification and demographic groupings is collected. Financial information will not be collected online.</li>
</ol>
</div>
<br />
<p><strong>How We Use the Information We Gather and Track</strong></p>
<div style="padding-left: 40px;">
<ol>
    <li>To provide you with information that is tailored to your personal situation.</li>
    <li>To attempt to determine your eligibility for our programs.</li>
    <li>To contact you for a personal appointment with our admissions representatives and to tour our facilities.</li>
</ol>
</div>
<br />
<p><strong>With Whom We May Share Your Information</strong></p>
<div style="padding-left: 40px;">In some instances your information may be shared with the Admissions Departments of our sister schools, <a href="http://www.glit.org">Great Lakes Institute of Technology</a> and <a href="http://www.glit.org/GL/cosme.html">Toni &amp; Guy Hairdressing Academy</a>. Your personal information will never be sold to any persons or organizations for any reason.
<p>&nbsp;</p>
</div>
<h3>Security and Personal Information</h3>
<div style="padding-left: 40px;">
<p>We have taken security measures, consistent with international practices, to protect your personal information. These measures include technical and procedural steps to protect your data from misuse, unauthorized access or disclosure, loss, alteration or destruction. Your information may be transmitted on paper or any electronic means only to authorized staff and management personnel of Erie Institute of Technology, Great Lakes Institute of Technology and/or Toni &amp; Guy Hairdressing Academy.</p>
</div>
<h3>Cookies</h3>
<div style="padding-left: 40px;">
<p>At this time, we do not use cookies. A cookie is a unique text file that a Web site can send to your browser software. Cookies enable a Web site to tailor information presented to you based on your browsing preferences, to personalize your pages, to remember you when you fill out a form, etc. If your browser is set to reject cookies, it will not impair your viewing of this site.</p>
</div>
<h3>Web Site Traffic</h3>
<div style="padding-left: 40px;">
<p>We may track domain names, IP addresses and browser types from people who visit our site. We use this information to track aggregate traffic patterns throughout our Web site. This information is used to optimize our site and is not correlated with any personal information.</p>
</div>
<h3>Links to External Sites</h3>
<div style="padding-left: 40px;">
<p>At the EIT site we have a number of links to useful and informative external Web sites. We are not responsible for the privacy practices of these sites. We encourage you to read their privacy statements, as they likely differ from ours.</p>
</div>
<h3>Information Submission is Voluntary</h3>
<div style="padding-left: 40px;">
<p>All information that we request is voluntarily provided to us by you. If you chose not to provide this information, it will in some circumstances prevent you from completing the transaction.</p>
</div>
<h3>Policy Changes</h3>
<div style="padding-left: 40px;">
<p>Any major changes to this privacy policy will immediately be reflected as an update to the information on this page. We encourage you to review this page every time you visit our site to ensure that you are current on changes to this privacy statement, as it may change from time to time without prior notice.</p>
</div>
</div>
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

