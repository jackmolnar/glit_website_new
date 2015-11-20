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
		<title><? echo $cfg->site_title; ?> | Staff/Faculty</title>
		<meta name="author" content="Werkbot Studios" />
		<meta name="keywords" content="" />
		<meta name="description" content=""/>
		<meta name="robots" content="index, follow" />
		<link href="../_scripts/master.css" rel="stylesheet" type="text/css" />
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
						<h2>Staff&nbsp;</h2>
<hr />
<p>The staff at EIT are committed to helping every student succeed, both academically and in the job market. Here are some of the people who will help you achieve your goals:</p>
<fieldset style="border: 1px solid rgb(204, 204, 204); padding: 10px; background-color: rgb(234, 234, 234); background-image: none; background-repeat: repeat; background-attachment: scroll; background-position: 0% 50%; -moz-background-size: auto auto; margin-bottom: 10px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">
<table cellspacing="0" cellpadding="0" border="0" style="width: 680px;">
    <tbody>
        <tr>
            <td style="vertical-align: top; width: 190px;"><em><em>
            <p><b>Tony Piccirillo</b><br />
            <i>Executive Director<br />
            <br />
            </i><b>Paul Fitzgerald</b><br />
            <i>EIT Director<br />
            <br />
            <b>Marie Whipple</b><br />
            Industry-Specific Training &amp; Continuing Education Director<br />
            </i><br />
            <b>Kate Hushon</b><br />
            <em>Education Director</em></p>
            </em></em></td>
            <td style="vertical-align: top; width: 190px;"><b>Barb Bolt </b><br />
            <em>&nbsp; Admissions Director<br />
            </em><b>Brian Boyce</b><br />
            <em>&nbsp; Admissions Representative</em> <i>&nbsp; </i><i><br />
            </i><strong>Dan Albaugh</strong><br />
            <em>&nbsp; High School Admissions&nbsp;&nbsp; Representative<br />
            <br />
            </em><em><strong>Kim Daugherty<br />
            </strong>&nbsp; Administrative Assistant<br />
            <strong>Kim Forrester</strong><br />
            &nbsp; Receptionist</em><em><br />
            </em></td>
            <td style="vertical-align: top; width: 190px;">
            <p><b>Alyssa Dobson</b><br />
            <em>&nbsp; Director of Financial Aid</em><em><br />
            </em><strong>Edward Jaggie</strong><br />
            <em>&nbsp; Financial Aid Officer</em><em><br />
            </em><strong>Andrea Campbell</strong><em> <br />
            <em><em>&nbsp; Finance Director</em></em></em><br />
            <b>Ross Ardillo</b><br />
            <em>&nbsp; Computer System Administrator</em><br />
            <b>Jon Molnar</b><br />
            <em>&nbsp; Marketing Manager<br />
            </em><em><br />
            </em></p>
            </td>
        </tr>
    </tbody>
</table>
<span style="display: none;" id="1210102359682E">&nbsp;</span></fieldset><br />
<h2>Faculty</h2>
<hr />
<p>The faculty members at EIT, through years of training and/or experience, are well qualified to serve our students in a professional and dedicated manner. Instructors offer comprehensive coverage in theory and practical laboratory training and have the ability to teach in a manner which is easily understood.</p>
<fieldset style="border: 1px solid rgb(204, 204, 204); padding: 10px; background-color: rgb(234, 234, 234); background-image: none; background-repeat: repeat; background-attachment: scroll; background-position: 0% 50%; -moz-background-size: auto auto; margin-bottom: 10px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">
<table cellspacing="0" cellpadding="0" border="0" style="width: 680px;">
    <tbody>
        <tr>
            <td style="vertical-align: top; width: 190px;"><img src="http://www.erieit.edu/_files/images/file_12.jpg" alt="Erie Electronics" /></td>
            <td style="vertical-align: top; width: 190px;">
            <p><b>Eric Erikson</b><br />
            Biomedical Equipment Technology Program Director<br />
            <br />
            <strong>Gordon Leubke<br />
            </strong>Electronics Program Director<br />
            &nbsp;</p>
            </td>
            <td style="vertical-align: top; width: 190px;">
            <p><b>Instructors</b><br />
            Jon Blanchard<br />
            Rick Cutter<br />
            Rick DeVore<br />
            Ray Dunsworth<br />
            Joe Maas<br />
            Alfred Rial<br />
            Jim Roos<br />
            Fred Tuholski<br />
            Jill Woodridge</p>
            </td>
        </tr>
    </tbody>
</table>
</fieldset> <fieldset style="border: 1px solid rgb(204, 204, 204); padding: 10px; background-color: rgb(234, 234, 234); background-image: none; background-repeat: repeat; background-attachment: scroll; background-position: 0% 50%; -moz-background-size: auto auto; margin-bottom: 10px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">
<table cellspacing="0" cellpadding="0" border="0" style="width: 680px;">
    <tbody>
        <tr>
            <td style="vertical-align: top; width: 190px;"><img src="http://www.erieit.edu/_files/images/file_10.jpg" alt="Erie Computer Training" /></td>
            <td style="vertical-align: top; width: 190px;"><b>Scott Domowicz</b><br />
            Network &amp; Database Professional<br />
            Program Director<br />
            <br />
            <b>Linda Kester</b><br />
            Computer Program Director<br />
            <strong><br />
            Instructors<br />
            </strong>Elizabeth Bille<br />
            Phillip Carideo<br />
            Michael Edgerly<br />
            Yvonne Folmar<br />
            Terry Bowersox<br />
            Rodger Trask</td>
            <td style="vertical-align: top; width: 190px;">Debbie Harmon<br />
            Lani Harmon<br />
            Jim Huff<br />
            Fauzia Jalalia<br />
            Marion Lipski<br />
            Michele Littler<br />
            Kevin Mosgrave<br />
            Brian Rasmussen<br />
            Dave Scaletto<br />
            Ann St. George Simpson<br />
            Dave Smith<br />
            Staci Toy<br />
            Gwendolyn Albaugh</td>
        </tr>
    </tbody>
</table>
</fieldset> <fieldset style="border: 1px solid rgb(204, 204, 204); padding: 10px; background-color: rgb(234, 234, 234); background-image: none; background-repeat: repeat; background-attachment: scroll; background-position: 0% 50%; -moz-background-size: auto auto; margin-bottom: 10px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">
<table cellspacing="0" cellpadding="0" border="0" style="width: 680px;">
    <tbody>
        <tr>
            <td style="vertical-align: top; width: 190px;"><img src="http://www.erieit.edu/_files/images/file_14.jpg" alt="Erie Manufacturing Training" /></td>
            <td style="vertical-align: top; width: 190px;"><strong>Jay Chandley<br />
            </strong>CNC/Machninist Program Director<br />
            <br />
            <b>Michael Hilbert</b><br />
            RHVAC Program Director<br />
            <br />
            <b>Clayton Webber</b><br />
            Welding Program Director</td>
            <td style="vertical-align: top; width: 190px;">&nbsp;<strong>Instructors<br />
            </strong>Nick Cooling<br />
            Rob Sanford<br />
            Bill Sundberg<br />
            Mike Garofalo<br />
            Jim Wright<br />
            Mike Militello<br />
            Dana Cruz<br />
            Brian Okicki<br />
            Chris Snyder<br />
            George Shumaker</td>
        </tr>
    </tbody>
</table>
</fieldset>
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

