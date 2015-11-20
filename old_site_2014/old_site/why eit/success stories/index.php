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
		<title><? echo $cfg->site_title; ?> | Success Stories</title>
		<meta name="author" content="Werkbot Studios" />
		<meta name="keywords" content="" />
		<meta name="description" content=""/>
		<meta name="robots" content="index, follow" />
		<link href="../../_scripts/master.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="masterframe">
			<div id="header">
				<div id="search">
					
<span style="text-align:right; color:#360; font-family:'Arial Black', Gadget, sans-serif; font-size:10px">FOLLOW US!</span><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.facebook.com/erieinstituteoftechnology" layout="button_count" width="200"></fb:like>				</div>
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
				<img src="../../_images/why_eit.jpg" alt="#" />
				<div id="subtopleft">
				<?
					$num = rand(1,7);
					print "<img src='../../_images/quote_00".$num.".gif' />";
				?>
				</div>
			</div>
			<table>
				<tr>
					<td id="subcontent">
						<div id="leftmenu">
							<ul><?
	if($common->checkurlForPageName("our%20mission")){
		print "<li><div class='leftselect'>Our Mission</div></li>";
	}else{
		print "<li><a href='".$depth."why eit/our mission/'>Our Mission</a></li>";
	}
	if($common->checkurlForPageName("programs")){
		print "<li><div class='leftselect'>Program Overview</div></li>";
	}else{
		print "<li><a href='".$depth."programs/'>Program Overview</a></li>";
	} 
	if($common->checkurlForPageName("success%20stories")){
		print "<li><div class='leftselect'>Success Stories</div></li>";
	}else{
		print "<li><a href='".$depth."why eit/success stories/'>Success Stories</a></li>";
	} 
	if($common->checkurlForPageName("faculty%20staff")){
		print "<li><div class='leftselect'>Faculty/Staff</div></li>";
	}else{
		print "<li><a href='".$depth."stafffaculty/'>Faculty/Staff</a></li>";
	}
	if($common->checkurlForPageName("links%20of%20interest")){		
		print "<li><div class='leftselect'>Links of Interest</div></li>";	
	}else{		
		print "<li><a href='".$depth."why eit/links of interest/'>Links of Interest</a></li>";	} 
?></ul>
						</div>
					</td>
					<td id="rightcontent">
						<h2>Student Success Stories</h2>
<hr />
<p>EIT has a solid reputation for producing capable, well-trained students that employers seek. These are just a few of the many EIT student success stories.&nbsp;</p>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <td valign="top"><img width="100" height="80" border="0" alt="#" src="http://www.erieit.edu/_images/student_mozdy.jpg" /></td>
            <td valign="top"><strong>Jason Mozdy</strong>
            <p><em>Designer and Illustrator, Synctomi</em></p>
            <p>&quot;It happened within one year at EIT. I obtained the necessary tools, earned the credentials, and was given a tremendous opportunity as an intern. After applying what I had acquired, I now have a rewarding career which I love.&quot;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td valign="top"><img width="100" height="80" border="0" alt="#" src="http://www.erieit.edu/_images/student_langer.jpg" /></td>
            <td valign="top"><strong>Scott Langer</strong>
            <p><em>Field Service Technician, Rabe Environmental Systems</em></p>
            <p>&quot;The education I received at the Erie Institute of Technology prepared me for my career as a Service Technician for Rabe Environmental Systems. If you're interested in a career change I would strongly urge you to call the Erie Institute of Technology. I'm certainly glad I did.&quot;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td valign="top"><img width="100" height="80" border="0" alt="#" src="http://www.erieit.edu/_images/student_waller.jpg" /></td>
            <td valign="top"><strong>Brian Waller</strong>
            <p><em>Technical Support, Softek/Velocity.net</em></p>
            <p>&quot;After I graduated from Erie Institute of Technology's PC Technician and Software Support Program, they placed me with a great career here at Softek and Velocity.net. I urge anyone interested in a career in computers to check them out today. I'm glad I did.&quot;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td valign="top"><img width="100" height="80" border="0" alt="#" src="http://www.erieit.edu/_images/student_lind.jpg" /></td>
            <td valign="top"><strong>Steve Lind</strong>
            <p><em>Field Service Technician, Hagan Business Machines</em></p>
            <p>&quot;I've always had an interest in Electronics. When my former employer closed their doors, I needed to find a new career. I chose Erie Institute of Technology's Electronic Technician Program. They gave me the training and helped place me in my new career as a Field Service Technician for Hagan Business Machines. If you're looking for a new career, I highly suggest you call Erie Institute of Technology. I'm glad I did.&quot;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td valign="top"><img width="100" height="80" border="0" alt="#" src="http://www.erieit.edu/_images/student_fratus.jpg" /></td>
            <td valign="top"><strong>Rob Fratus</strong>
            <p><em>SMT Operator, Accuspec Electronics</em></p>
            <p>&quot;My Associates degree from Erie Institute of Technology as an Electronics Engineering Technician allowed me to obtain a position at Accuspec Electronics as a Surface Mount Technology Operator. The education that I received gave me the foundation to improve and be trained as a test technician. If you're interested in a career in Electronics, I encourage you to call Erie Institute of Technology.&quot;</p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<h2>Employer Testimonials</h2>
<p>&nbsp;</p>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td valign="top"><img width="100" height="80" border="0" alt="#" src="http://www.erieit.edu/_images/employer_mcquiston.jpg" /></td>
            <td valign="top"><strong>Tim McQuiston</strong>
            <p><em>Temperature Control Manager, Rabe Environmental Systems</em></p>
            <p>&quot;Here at Rabe Environmental Systems when we were searching for highly qualified personnel to service our hundreds of customers we turned to the Erie Institute of Technology. The Erie Institute of Technology supplies us with the highly qualified personnel we need to service our digital control systems.&quot;</p>
            </td>
        </tr>
    </tbody>
</table>
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


