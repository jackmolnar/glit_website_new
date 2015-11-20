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
<title><? echo $cfg->site_title; ?> | Student Gallery</title>
<meta name="author" content="Werkbot Studios" />
<meta name="keywords" content="" />
<meta name="description" content=""/>
<meta name="robots" content="index, follow" />
<link href="../_scripts/master.css" rel="stylesheet" type="text/css" />
<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAaQG6bzu9PaUR2BFSP7zkwRQPhSgyUlEP0l_lfsNTumek3jFtgxSU5602g9iO8dnXIkV6MlKG1MY07A" type="text/javascript"></script>
<style type="text/css">
#gmenu {
float:right;
width:200px;
}
iframe {
float:left;
}
#gmenu a:link, #gmenu a:visited {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 12px;
  text-decoration:none;
  text-align:left;
  background-color:#003399; 
  color:#ffffff;
  display:block;  
  padding:3px;
  border-left:4px solid #fff;
  font-size:11px;
  font-weight:bold;
  margin-right:5px;
  margin-top:1px;
  }
#gmenu a:hover {
  border-left:4px solid #0e8c1f;
  background-color:#19ae36;
  }
</style>
</head>
<body onload="load();" onunload="GUnload();">
<div id="masterframe">
<div id="header">
<div id="search">
<form action="../search/" method="post">
<input class="txt" name="keys" type="text" value="Search..." maxlength="50" onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...';"/>
<input class="img" type="image" src="../_images/searchtxt.gif" alt="Search" border="0"/>
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
<div id="content">
<iframe width="550" height="480" scrolling="no" frameborder="0" src="../gallery/gallery.html" name="display"></iframe>
 <div id="gmenu">
	<a href="../gallery/3d/index.htm" target="display">3D</a>
      <a href="../gallery/photo/index.htm" target="display">Photo</a>
      <a href="../gallery/print/index.htm" target="display">Print</a>
      <a href="../gallery/web/index.htm" target="display">Web</a>
    <a href="../gallery/featured/index.htm" target="display">Featured Student</a>
</div>
<br clear="all" />
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

