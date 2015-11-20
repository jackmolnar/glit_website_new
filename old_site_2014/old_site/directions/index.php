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
		<title><? echo $cfg->site_title; ?> | Directions</title>
		<meta name="author" content="Werkbot Studios" />
		<meta name="keywords" content="" />
		<meta name="description" content=""/>
		<meta name="robots" content="index, follow" />
		<link href="../_scripts/master.css" rel="stylesheet" type="text/css" />
    		<script src="../_scripts/js/mootools.v1.11.js" type="text/javascript" ></script>
		<script src="../_scripts/js/validation.js" type="text/javascript"></script>
		<style>
			th{vertical-align:top; text-align:right;};
			.validation-failed {
				border: 1px solid #990000;
				clear:both;	
			}
			.validation-passed {	
			}
			.validation-advice {
				margin: 2px; 
				padding: 2px; 
				color:#fff; 
				background-color:#990000;
			}
		</style>
		<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAaQG6bzu9PaUR2BFSP7zkwRQPhSgyUlEP0l_lfsNTumek3jFtgxSU5602g9iO8dnXIkV6MlKG1MY07A" type="text/javascript"></script>		
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

			<table>
				<tr>
					<td id="fullcontent">
						<h2>Directions</h2>
<fieldset style="border: 1px solid rgb(204, 204, 204); padding: 10px; background: rgb(234, 234, 234) none repeat scroll 0% 50%; margin-bottom: 10px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">
<p>Follow these directions to get to EIT if you're in the Erie area.&nbsp;</p>
<div style="padding-left: 40px;">
<p><strong>From I-90:</strong></p>
<ul>
    <li>Take Route 19 Exit (Peach Street)</li>
    <li>Head north toward Millcreek Mall / Erie</li>
    <li>Turn left (west) on Interchange Road (by Barnes &amp; Noble)</li>
    <li>Turn right (north) at 2nd light into Millcreek Pavillion Drive</li>
    <li>Go all the way to the end of the road &amp; bear to the right after the sharp right turn.</li>
    <li>EIT is the large building on your right.</li>
</ul>
<br />
<p><strong>From I-79:</strong></p>
<ul>
    <li>Take Kearsarge Exit (Interchange Rd.)</li>
    <li>Head east toward the Millcreek Mall to Millcreek Pavillion Drive</li>
    <li>Go all the way to the end of the road &amp; bear to the right after the sharp right turn.</li>
    <li>EIT is the large building on your right.</li>
</ul>
<br />
<p><strong>From Erie:</strong></p>
<ul>
    <li>Head south on Peach Street (Rt. 19) toward the Millcreek Mall</li>
    <li>Turn right (west) into the Millcreek Square entrance (by Pier 1)</li>
    <li>Turn right (north) at the &quot;T&quot; intersection</li>
    <li>Drive straight ahead &amp; go past the Firestone store</li>
    <li>Turn left (west) on the drive behind Firestone</li>
    <li>EIT is the large building at the end of the drive on your left.</li>
</ul>
</div>
</fieldset>
<h2>Travel Information</h2>
<p>There are many transportation options for getting to Erie. Use the links below to find information about getting to Erie by air, rail or automobile.</p>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <td><a href="http://www.erieairport.org/" target="_blank"><img width="153" height="74" border="0" alt="" src="../../../../images/travel_airport.jpg" style="margin-right: 20px;" /></a></td>
            <td>
            <h2><a href="http://www.erieairport.org/" target="_blank">Erie International Airport</a></h2>
            <p>The Erie International Airport's Web site provides access to flight schedules, rate information and other travel related resources. The Erie terminal is located on West 12th Street, a short drive from downtown Erie.</p>
            </td>
        </tr>
        <tr>
            <td align="center"><a href="http://www.amtrak.com/" target="_blank"><img width="109" height="23" border="0" alt="" src="../../../../images/travel_amtrak.jpg" style="margin-right: 20px;" /></a></td>
            <td>
            <h2><a href="http://www.amtrak.com/" target="_blank">Amtrak</a></h2>
            <p>Amtrak provides passenger rail service to 46 states. The Erie station is conveniently located in the downtown area. Their Web site provides rate and schedule information, as well as an online reservation system.</p>
            </td>
        </tr>
        <tr>
            <td align="center"><a href="http://maps.yahoo.com//dd?taddr=&amp;tcsz=Erie%2C+PA&amp;country=us" target="_blank"><img width="141" height="38" border="0" alt="" src="../../../../images/travel_driving.jpg" style="margin-right: 20px;" /></a></td>
            <td>
            <h2><a href="http://maps.yahoo.com//dd?taddr=&amp;tcsz=Erie%2C+PA&amp;country=us" target="_blank">Driving Directions</a></h2>
            <p>Use Yahoo! Maps to get driving directions to Erie.</p>
            </td>
        </tr>
    </tbody>
</table>
					</td>
				</tr>
			</table>
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
				</div>		</div>
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

