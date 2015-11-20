<?php
	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE
		$depth = "../../../";
	//INCLUDE ALL OF OUR MODULE CLASSES
		include "../../../_admin/class/class_config.php";
		include "../../../_admin/class/class_db.php";
		include "../../../_admin/class/class_time.php";
	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;
		include "../../../_face/class/face_common.php";
		include "../../../_face/class/mimemail/htmlMimeMail.php";
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
		<title><? echo $cfg->site_title; ?> | Submit</title>
		<meta name="author" content="Werkbot Studios" />
		<meta name="keywords" content="" />
		<meta name="description" content=""/>
		<meta name="robots" content="index, follow" />
		<link href="../../../_scripts/master.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript" src="../../../_scripts/js/formcheck.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="masterframe">
			<div id="header">
				<div id="search">
					<form action="../../../search/" method="post">
						<input class="txt" name="keys" type="text" value="Search..." maxlength="50" onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...';"/>
						<input class="img" type="image" src="../../../_images/searchtxt.gif" alt="Search" border="0"/>
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
			<div id="subtop">
				<img src="../../../_images/why_eit.jpg" alt="#" />
				<div id="subtopleft">
				<?
					$num = rand(1,7);
					print "<img src='../../../_images/quote_00".$num.".gif' />";
				?>
				</div>
			</div>
			<table>
				<tr>
					<td id="subcontent">
						<div id="leftmenu">
							<ul><?
if($common->checkurlForPageName("overview")){
print "<li><div class='leftselect'>Overview</div></li>";
}else{
print "<li><a href='".$depth."admissions/overview/'>Overview</a></li>";
}
if($common->checkurlForPageName("admission%20requirements")){
print "<li><div class='leftselect'>Admission Requirements</div></li>";
}else{
print "<li><a href='".$depth."admissions/admission requirements/'>Admission Requirements</a></li>";
}
if($common->checkurlForPageName("campus%20tour")){
print "<li><div class='leftselect'>Campus Tour</div></li>";
}else{
print "<li><a href='".$depth."admissions/campus tour/'>Campus Tour</a></li>";
}
if($common->checkurlForPageName("financial%20aid")){
print "<li><div class='leftselect'>Financial Aid</div></li>";
}else{
print "<li><a href='".$depth."admissions/financial aid/'>Financial Aid</a></li>";
}
if($common->checkurlForPageName("student%20services")){
print "<li><div class='leftselect'>Student Services</div></li>";
}else{
print "<li><a href='".$depth."admissions/student services/'>Student Services</a></li>";
}
if($common->checkurlForPageName("career%20planning%20placement")){
print "<li><div class='leftselect'>Career Planning & Placement</div></li>";
}else{
print "<li><a href='".$depth."admissions/career planning placement/'>Career Planning & Placement</a></li>";
}
if($common->checkurlForPageName("request%20more%20information")){
print "<li><div class='leftselect'>Request More Information</div></li>";
}else{
print "<li><a href='http://erieit.edu/admissions/request%20more%20information/'>Request More Information</a></li>";
}
if($common->checkurlForPageName("apply%20online")){
print "<li><div class='leftselect'>Apply Online</div></li>";
}else{
print "<li><a href='".$depth."admissions/apply online/'>Apply Online</a></li>";
}
if($common->checkurlForPageName("schedule%20a%20tour%20of%20erie%20institute%20of%20technology")){
print "<li><div class='leftselect'>Schedule a Tour of EIT</div></li>";
}else{
print "<li><a href='".$depth."admissions/schedule a tour of erie institute of technology/'>Schedule a Tour of EIT</a></li>";
}
?></ul>
						</div>
					</td>
					<td id="rightcontent">
						<h1>Tell a Friend Form Submission</h1>
<br />
<?php
// fields: fromemail, name, toemail, subject, message

require($depth."_globalvars.php");

// check count of form fields
if (count($_POST) != 5) {
	// ERROR: no POST data submitted
	echo "<p>There was an error submitting your request. It appears that invalid data were submitted. Contact the <a href='webmaster.php'>Webmaster</a> to report the problem.</p>";
} else {
	// check referer environment variable
	if (!getenv('HTTP_REFERER')) {
		// ERROR: no HTTP_REFERER sent
		echo "<p>There was an error submitting your request. Your browser is not sending an HTTP_REFERER. If you are using Norton Firewall (any version), please see the <a href='http://service1.symantec.com/SUPPORT/nip.nsf/5a5e9c8a8ac2ec3c882568f60060f23a/0181a150098795a285256910005e6f0d?OpenDocument' target='_blank'>Norton support site</a></p>";
	} else {
		// make sure referer is valid
		if (getenv('HTTP_REFERER') != "http://www.erieit.edu/admissions/tell%20a%20friend/") {
			// ERROR: coming from an unathorized domain
			echo "<p>There was an error submitting your request. This page must be submitted from the <a href='tell_a_friend.php'>Tell a Friend</a> page of the EIT site.</p>";
		} else {
			// fill in sender's email address and validate
			$sender = $_POST['fromemail'];
			if (!eregi("^['+\./0-9A-Z^_`a-z{|}~-]+@[a-zA-Z0-9_-]+(.[a-zA-Z0-9_-]+){1,6}$", $sender)) {
				// ERROR: user entered an invalid email address
				echo "<p>The from email address you entered is invalid. Please go <a href='javascript:history.back();'>back</a> and try again.</p>";
			} else {
				// fill in recipeint and validate
				$recipient = $_POST['toemail'];
				if (!eregi("^['+\./0-9A-Z^_`a-z{|}~-]+@[a-zA-Z0-9_-]+(.[a-zA-Z0-9_-]+){1,6}$", $recipient)) {
					// ERROR: user entered an invalid email address
					echo "<p>The to email address you entered is invalid. Please go <a href='javascript:history.back();'>back</a> and try again.</p>";
				} else {
					// fill in subject
					$subject = stripslashes($_POST['subject']);

					// build body
					$body = stripslashes($_POST['message']);
					
					// build header
					//$header = 'From: ' . $sender . "rn";
					//$header .= "X-Priority: 3" . "rn";
					//$header .= 'X-Mailer: PHPFormMail (http://www.boaddrink.com)' . "rn";
					
					// try sending
					if (!log_mail($sender, $recipient, $subject, $body, $header)) {
						// ERROR: mail couldn't be sent
						echo "<p>There was an error attempting to send the message. Contact the <a href='webmaster.php'>Webmaster</a> to report the problem.</p>";
					} else {
						// output thank you and submitted fields ($body) if desired
						echo "<h2>Your message was successfully sent. Thank you!</h2><br> ";
						$table  = "";
						$table .= "<table border='0' width='100%' cellpadding='5'> ";
						$table .= "  <tr> ";
						$table .= "    <th valign='top' align='right'><p>From:</p></th> ";
						$table .= "    <td><p>$_POST[fromemail]</p></td> ";
						$table .= "  </tr> ";
						$table .= "  <tr> ";
						$table .= "    <th valign='top' align='right'><p>To:</p></th> ";
						$table .= "    <td><p>$_POST[toemail]</p></td> ";
						$table .= "  </tr> ";
						$table .= "  <tr> ";
						$table .= "    <th valign='top' align='right'><p>Subject:</p></th> ";
						$table .= "    <td><p>$subject</p></td> ";
						$table .= "  </tr> ";
						$table .= "  <tr> ";
						$table .= "    <th valign='top' align='right'><p>Message:</p></th> ";
						$table .= "    <td><p>" . nl2br($body) . "</p></td> ";
						$table .= "  </tr> ";
						$table .= "</table> ";

						echo $table;
					}
				}
			}
		}
	}
}
?>
					</td>
				</tr>
			</table><div class="hblob">
					<a href="<? echo $depth;?>admissions/tell%20a%20friend/"><img src="<? echo $depth;?>_images/chat.gif" alt="#" /></a>
				</div>
				<div class="hblob">
					<a href="<? echo $depth;?>contact/"><img src="<? echo $depth;?>_images/phone.gif" alt="#" /></a>
				</div>
				<div class="hblob">
					<a href="<? echo $depth;?>admissions/apply%20online/"><img src="<? echo $depth;?>_images/apply.gif" alt="#" /></a>
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
</html>

