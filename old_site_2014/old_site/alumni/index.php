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
		<title><? echo $cfg->site_title; ?> | Alumni</title>
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
						<h2><span style="color: #808000">Career Services </span></h2>
<hr />
<img height="35" alt="" width="150" src="http://www.erieit.edu/_files/images/file_108.png" /><img height="78" alt="" width="100" align="right" src="http://www.erieit.edu/_files/images/file_112.png" />Career Services is now on Twitter!&nbsp; People follow the sources most relevant to them and access information via Twitter as it happens&mdash;from breaking world news to updates from friends.&nbsp;&nbsp; Now you can get up-to-the-minute information from EIT's Career Services office.&nbsp; Stay in touch with the latest job leads, career fairs, tips for job searches, and more!&nbsp; Join Twitter to access much more ... even get this information delivered to your mobile phone.&nbsp;<br />
<br />
<a style="textdecoration: 'none'" target="_blank" href="http://www.twitter.com/eitcareerserv"><img height="34" alt="FOLLOW me ! to twitter.com/EITCareerServ ...!" width="285" align="left" border="0" src="http://www.erieit.edu/_files/images/file_114.gif" /></a><br />
<br />
<hr />
<br />
<a textdecoration="none" href="mailto:jamiem@erieit.edu?subject=Message%20from%20EIT%20Career%20Services%20website"><img height="61" alt="Jamie Murphy - Career Services Coordinator" hspace="5" width="50" align="left" border="0" src="http://www.erieit.edu/_files/images/file_110.png" /></a>EIT provides an active placement assistance office, for current students and all graduates of EIT - since its start in 1958 - who desire assistance.&nbsp; You are welcome to call the office or &nbsp;<a href="mailto:jamiem@erieit.edu?subject=EIT%20Career%20Services%20-%20Alumni%20Registration&amp;body=Glad%20to%20hear%20from%20you!%20%20Please%20update%20the%20following%20information%20...%0D%0AName%3A%0D%0AAddress%3A%0D%0ACity%2FST%2FZIP%3A%0D%0AE-mail%3A%0D%0ACell%20Phone%3A%0D%0AHome%20Phone%3A%0D%0AWork%20Phone%3A%0D%0AEmployer%3A%0D%0AJob%20Title%3A%0D%0AOther%20info%3A">register online.</a>&nbsp; We especially like to hear from our past graduates -- let us know how you're doing.
<div>&nbsp;</div>
<p>EIT feels strongly about job placement, and will assist in every way possible.*&nbsp; While you are in school, the success of the placement program is greatly influenced by your attendance, overall attitude, and academic record.&nbsp; <br />
<br />
For current students and alumni, the placement assistant program will include, but not be limited to:</p>
<div style="margin-left: 40px">-- class instruction in job searching and interviewing techniques <br />
-- assistance in preparation of applications, letters, and resumes <br />
-- assistance in establishing job interviews.&nbsp;<br />
&nbsp;</div>
<a href="mailto:jamiem@erieit.edu?subject=Career%20Services%20web%20reply">Contact the Career Services Office</a><br />
<br />
<span style="color: #ff0000">*Law prohibits any school from guaranteeing a job.&nbsp; Employment opportunities may require relocation.<br />
<br />
</span><hr />
<h3><span style="color: #808000"><b>Employers</b></span><b><font color="#000080"><br />
</font></b></h3>
<p><b>Need a new employee or an Externship student? </b><br />
We can provide resumes and referrals -- contact the <a href="mailto:jamiem@erieit.edu?subject=Web%20reply%20to%20hire%20Graduates">Career Services Department</a> for graduates or externs. <br type="_moz" />
<b><br />
Share your expertise.</b><br />
We would love to have you share your expertise&nbsp;-- be a guest speaker for one of our classes. Contact the <a href="mailto:kateh@erieit.edu?subject=Web%20reply%20about%20guest%20speakers.">Education Department</a></p>
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

