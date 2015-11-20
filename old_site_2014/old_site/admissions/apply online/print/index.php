<?
	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE
		$depth = "../../../";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>EIT - Completed Online Application</title>
<?php
$style = '
<style>
td.lt {
	border-left: 1px solid #000000;
	border-top: 1px solid #000000;
	vertical-align: top;
}
td.ltr {
	border-left: 1px solid #000000;
	border-top: 1px solid #000000;
	border-right: 1px solid #000000;
	vertical-align: top;
}
td.blt {
	border-bottom: 1px solid #000000;
	border-left: 1px solid #000000;
	border-top: 1px solid #000000;
	vertical-align: top;
}
td.bltr {
	border-bottom: 1px solid #000000;
	border-left: 1px solid #000000;
	border-top: 1px solid #000000;
	border-right: 1px solid #000000;
	vertical-align: top;
}
table.bg {
	background-color: #FFFFFF;
}
h1 {
font-family: Verdana, Tahoma, Arial, sans-serif;
font-size: 17px;
font-weight: bold;
margin: 0px;
color: #000000;
}
h2 {
font-family: Verdana, Tahoma, Arial, sans-serif;
font-size: 13px;
font-weight: bold;
margin: 0px;
color: #000040;
}
p {
font-family: Verdana, Tahoma, Arial, sans-serif;
font-size: 11px;
margin: 0px;
padding: 0px;
}
</style>';
echo $style;
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body style="background-color: #FFFFFF;">
	<?php

$tw = 650; // table width

$table1_display = "
<table width='$tw' cellpadding='0' cellspacing='0' border='0' align='center' bgcolor='#FFFFFF'>
<tr>
	<td>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center'>
				<td valign='top'><img src='".$depth."images/eit_logo.gif' border='0' width='400' height='84'></td>
				<td valign='top'><p align='right'>Erie Institute of Technology<br>940 Millcreek Mall<br>Erie, PA 16565<br>Phone: (814) 868-9900<br>Fax: (814) 868-9977<br>Web: www.erieit.edu</p></td>
			</tr>
		</table>
		<br><br><br>
		<h1 align='center'>Completed Admissions Application</h1>
		<p align='center'><strong>" .  date('l, F jS, Y') . "</strong></p>
		<br>";

$table1_mail = "
<table width='$tw' cellpadding='0' cellspacing='0' border='0' align='center' bgcolor='#FFFFFF'>
<tr>
	<td>
		<br><br>
		<h1 align='center'>Completed Admissions Application</h1>
		<p align='center'><strong>" .  date('l, F jS, Y') . "</strong></p>
		<br>";
$table2 = "
		<h1>General and Personal Information</h1>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='25%'><p>Last Name</p><h2>" . $_POST['lname'] . "&nbsp;</h2></td>
				<td class='lt' width='25%'><p>First Name</p><h2>" . $_POST['fname'] . "&nbsp;</h2></td>
				<td class='lt' width='25%'><p>Middle Initial</p><h2>" . $_POST['minitial'] . "&nbsp;</h2></td>
				<td class='ltr' width='25%'><p>Maiden Name</p><h2>" . $_POST['mname'] . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='50%'><p>Address</p><h2>" . $_POST['address'] . "&nbsp;</h2></td>
				<td class='lt' width='25%'><p>City</p><h2>" . $_POST['city'] . "&nbsp;</h2></td>
				<td class='lt' width='13%'><p>State</p><h2>" . $_POST['state'] . "&nbsp;</h2></td>
				<td class='ltr' width='12%'><p>ZIP Code</p><h2>" . $_POST['zip'] . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='25%'><p>Home Phone</p><h2>" . $_POST['homephone'] . "&nbsp;</h2></td>
				<td class='lt' width='25%'><p>Work Phone</p><h2>" . $_POST['workphone'] . "&nbsp;</h2></td>
				<td class='lt' width='25%'><p>May we contact you at work?</p><h2>" . $_POST['workcontact'] . "&nbsp;</h2></td>
				<td class='ltr' width='25%'><p>Social Security Number</p></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='50%'><p>Email address</p><h2>" . $_POST['email'] . "&nbsp;</h2></td>
				<td class='lt' width='25%'><p>Driver's License Number</p></td>
				<td class='ltr' width='25%'><p>Driver's License State</p></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='33%'><p>Date of Birth</p><h2>" . $_POST['dob'] . "&nbsp;</h2></td>
				<td class='lt' width='34%'><p>Gender</p><h2>" . $_POST['gender'] . "&nbsp;</h2></td>
				<td class='ltr' width='33%'>Ethnic Background</td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='33%'><p>Are you a U.S. Veteran?</p><h2>" . $_POST['veteran'] . "&nbsp;</h2></td>
				<td class='lt' width='34%'><p>Are you a U.S. Citizen?</p><h2>" . $_POST['citizen'] . "&nbsp;</h2></td>
				<td class='ltr' width='33%'><p>Are you a PA Resident?</p><h2>" . $_POST['resident'] . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='33%'><p>In case of an Emergency, Nofity</p></td>
				<td class='lt' width='34%'><p>Relationship</p></td>
				<td class='ltr' width='33%'><p>Phone Number</p></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='bltr'><p>Note any special conditions (health, etc.) that may affect your ability to receive training</p><h2>" . $_POST['specialcond'] . "&nbsp;</h2></td>
			</tr>
		</table>
		<br>
		<h1>Desired Training</h1>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='ltr'><p>Program(s) of Interest</p><h2>" . $_POST['program'] . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='blt' width='67%'><p>When would you like to begin your training?</p><h2>" . $_POST['begindate'] . "&nbsp;</h2></td>
				<td class='bltr' width='33%'><p>Desired enrollment</p><h2>" . $_POST['begintype'] . "&nbsp;</h2></td>
			</tr>
		</table>
	</td>
</tr>
</table>
<br style='page-break-after: always;'>
<table width='$tw' cellpadding='0' cellspacing='0' border='0' align='center' bgcolor='#FFFFFF'>
<tr>
	<td>
		<h1>Education Information</h1>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='25%'><p>High School Diploma</p><h2>" . ($_POST['hsname'] == "" ? "No" : "Yes") . "&nbsp;</h2></td>
				<td class='lt' width='21%'><p>Year Graduated</p><h2>" . ($_POST['hsname'] == "" ? "" : $_POST['hsyear']) ."&nbsp;</h2></td>
				<td class='lt' width='21%'><p>High School</p><h2>" . ($_POST['hsname'] == "" ? "" : $_POST['hsname']) . "&nbsp;</h2></td>
				<td class='lt' width='17%'><p>City</p><h2>" . ($_POST['hsname'] == "" ? "" : $_POST['hscity']) . "&nbsp;</h2></td>
				<td class='ltr' width='16%'><p>State</p><h2>" . ($_POST['hsname'] == "" ? "" : $_POST['hsstate']) . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='blt' width='25%'><p>GED</p><h2>" . ($_POST['gedyear'] == "" ? "No" : "Yes") . "&nbsp;</h2></td>
				<td class='blt' width='42%'><p>Year Completed</p><h2>" . ($_POST['gedyear'] == "" ? "" : $_POST['gedyear']) . "&nbsp;</h2></td>
				<td class='bltr' width='33%'><p>State Where Exam was Taken</p><h2>" . ($_POST['gedyear'] == "" ? "" : $_POST['gedstate']) . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='67%'><p>Higher Education/Training</p><h2>" . $_POST['sname1']  . "&nbsp;</h2></td>
				<td class='lt' width='17%'><p>City</p><h2>" . $_POST['scity1']  . "&nbsp;</h2></td>
				<td class='ltr' width='16%'><p>State</p><h2>" . $_POST['sstate1']  . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='blt' width='25%'><p>Program of Study</p><h2>" . $_POST['sprogram1']  . "&nbsp;</h2></td>
				<td class='blt' width='21%'><p>Year Grad/Last Attended</p><h2>" . $_POST['syear1']  . "&nbsp;</h2></td>
				<td class='blt' width='21%'><p>Graduated?</p><h2>" . $_POST['sgrad1']  . "&nbsp;</h2></td>
				<td class='bltr' width='33%'><p>Degree Earned</p><h2>" . $_POST['sdegree1']  . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='67%'><p>Higher Education/Training</p><h2>" . $_POST['sname2']  . "&nbsp;</h2></td>
				<td class='lt' width='17%'><p>City</p><h2>" . $_POST['scity2']  . "&nbsp;</h2></td>
				<td class='ltr' width='16%'><p>State</p><h2>" . $_POST['sstate2']  . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='blt' width='25%'><p>Program of Study</p><h2>" . $_POST['sprogram2']  . "&nbsp;</h2></td>
				<td class='blt' width='21%'><p>Year Grad/Last Attended</p><h2>" . $_POST['syear2']  . "&nbsp;</h2></td>
				<td class='blt' width='21%'><p>Graduated?</p><h2>" . $_POST['sgrad2']  . "&nbsp;</h2></td>
				<td class='bltr' width='33%'><p>Degree Earned</p><h2>" . $_POST['sdegree2']  . "&nbsp;</h2></td>
			</tr>
		</table>
		<br>
		<h1>Employment History</h1>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='ltr'><p>Employer Name</p><h2>" . $_POST['ename1']  . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='50%'><p>Address</p><h2>" . $_POST['eaddress1']  . "&nbsp;</h2></td>
				<td class='lt' width='25%'><p>City</p><h2>" . $_POST['ecity1']  . "&nbsp;</h2></td>
				<td class='lt' width='13%'><p>State</p><h2>" . $_POST['estate1']  . "&nbsp;</h2></td>
				<td class='ltr' width='12%'><p>ZIP</p><h2>" . $_POST['ezip1']  . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='blt' width='50%'><p>Position Held</p><h2>" . $_POST['eposition1']  . "&nbsp;</h2></td>
				<td class='blt' width='25%'><p>Started:</p><h2>" . $_POST['estart1']  . "&nbsp;</h2></td>
				<td class='bltr' width='25%'><p>Ended:</p><h2>" . $_POST['eend1']  . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='ltr'><p>Employer Name</p><h2>" . $_POST['ename2']  . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='50%'><p>Address</p><h2>" . $_POST['eaddress2']  . "&nbsp;</h2></td>
				<td class='lt' width='25%'><p>City</p><h2>" . $_POST['ecity2']  . "&nbsp;</h2></td>
				<td class='lt' width='13%'><p>State</p><h2>" . $_POST['estate2']  . "&nbsp;</h2></td>
				<td class='ltr' width='12%'><p>ZIP</p><h2>" . $_POST['ezip2']  . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='blt' width='50%'><p>Position Held</p><h2>" . $_POST['eposition2']  . "&nbsp;</h2></td>
				<td class='blt' width='25%'><p>Started:</p><h2>" . $_POST['estart2']  . "&nbsp;</h2></td>
				<td class='bltr' width='25%'><p>Ended:</p><h2>" . $_POST['eend2']  . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='ltr'><p>Employer Name</p><h2>" . $_POST['ename3']  . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='50%'><p>Address</p><h2>" . $_POST['eaddress3']  . "&nbsp;</h2></td>
				<td class='lt' width='25%'><p>City</p><h2>" . $_POST['ecity3']  . "&nbsp;</h2></td>
				<td class='lt' width='13%'><p>State</p><h2>" . $_POST['estate3']  . "&nbsp;</h2></td>
				<td class='ltr' width='12%'><p>ZIP</p><h2>" . $_POST['ezip3']  . "&nbsp;</h2></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='blt' width='50%'><p>Position Held</p><h2>" . $_POST['eposition3']  . "&nbsp;</h2></td>
				<td class='blt' width='25%'><p>Started:</p><h2>" . $_POST['estart3']  . "&nbsp;</h2></td>
				<td class='bltr' width='25%'><p>Ended:</p><h2>" . $_POST['eend3']  . "&nbsp;</h2></td>
			</tr>
		</table>
	</td>
</tr>
</table>
<br style='page-break-after: always;'>
<table width='$tw' cellpadding='0' cellspacing='0' border='0' align='center' bgcolor='#FFFFFF'>
<tr>
	<td>
		<h1>References</h1>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='50%'><p>Name</p></td>
				<td class='lt' width='25%'><p>Phone</p></td>
				<td class='ltr' width='25%'><p>Relationship</p></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='blt' width='50%'><p>Address</p></td>
				<td class='blt' width='25%'><p>City</p></td>
				<td class='blt' width='13%'><p>State</p></td>
				<td class='bltr' width='12%'><p>ZIP</p></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='50%'><p>Name</p></td>
				<td class='lt' width='25%'><p>Phone</p></td>
				<td class='ltr' width='25%'><p>Relationship</p></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='blt' width='50%'><p>Address</p></td>
				<td class='blt' width='25%'><p>City</p></td>
				<td class='blt' width='13%'><p>State</p></td>
				<td class='bltr' width='12%'><p>ZIP</p></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='lt' width='50%'><p>Name</p></td>
				<td class='lt' width='25%'><p>Phone</p></td>
				<td class='ltr' width='25%'><p>Relationship</p></td>
			</tr>
		</table>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' class='bg'>
			<tr> 
				<td class='blt' width='50%'><p>Address</p></td>
				<td class='blt' width='25%'><p>City</p></td>
				<td class='blt' width='13%'><p>State</p></td>
				<td class='bltr' width='12%'><p>ZIP</p></td>
			</tr>
		</table>
		<br><br>
		<table border='0' cellpadding='4' cellspacing='0' width='$tw' align='center'>
			<tr>
				<td colspan='2'><p>As part of the admission requirements, there is a .00 Application Fee due upon applying. The Application Fee is refundable if the applicant decides not to attend or is not accepted, provided the request is made in writing
within 60 days of the signed Admissions Application date. A 0.00 Registration Deposit is due a minimum of 30 days prior to the school start date. Applicants must complete a High School Transcript and/or a GED Transcript
Release form. An exam will be given to determine the student’s reading grade level. Consult the Catalog for minimum program reading levels.
<p>Class sizes are limited to 25 students per program and will be closed to enrollment when that number is reached. Enrollment is granted on a first-come, first-served basis only to registered applicants who have completed all
admission requirements. Applicants who do not enroll before a class is filled have the option to register for a future class.
<p>I certify that the information provided on this application is accurate to the best of my knowledge and that any misrepresentation by me on this form could lead to future disciplinary action by the Erie Institute of Technology.</tr>
			<tr>
				<td width='75%'><br><br><p style='border-top: 1px solid #000000;'>Signature of Applicant</p></td>
				<td width='25%'><br><br><p style='border-top: 1px solid #000000;'>Date</p></td>
			</tr>
		</table>
		<br>
		
		<br><br><br><br>
		<table  border='0' cellpadding='4' cellspacing='0' width='$tw' align='center' style='border: 1px solid #808080'>
			<tr>
				<td colspan='4'><h2>For Office Use Only</h2></td>
			</tr>
			<tr>
				<td width='25%'><p><small>Interviewed by:</small></p></td>
				<td width='25%'><p style='border-bottom: 1px solid #000000'>&nbsp;</p></td>
				<td width='25%'><p><small>Date of application:</small></p></td>
				<td width='25%'><p style='border-bottom: 1px solid #000000'>&nbsp;</p></td>
			</tr>
			<tr>
				<td width='25%'><p><small>Program:</small></p></td>
				<td width='25%'><p style='border-bottom: 1px solid #000000'>&nbsp;</p></td>
				<td width='25%'><p><small>Start date:</small></p></td>
				<td width='25%'><p style='border-bottom: 1px solid #000000'>&nbsp;</p></td>
			</tr>
			<tr>
				<td width='25%'><p><small>FA interview date:</small></p></td>
				<td width='25%'><p style='border-bottom: 1px solid #000000'>&nbsp;</p></td>
				<td width='25%'><p><small>FA interview time:</small></p></td>
				<td width='25%'><p style='border-bottom: 1px solid #000000'>&nbsp;</p></td>
			</tr>

			<tr>
				<td colspan='4'>&nbsp;</td>
			</tr>
			<tr>
				<td width='50%' colspan='2'><p align='center'><strong>Application Fee</strong></p></td>
				<td width='50%' colspan='2'><p align='center'><strong>Registration Fee</strong></p></td>
			</tr>
			<tr>
				<td width='25%'><p><small>Amount Paid:</small></p></td>
				<td width='25%'><p style='border-bottom: 1px solid #000000'>&nbsp;</p></td>
				<td width='25%'><p><small>Amount Paid:</small></p></td>
				<td width='25%'><p style='border-bottom: 1px solid #000000'>&nbsp;</p></td>
			</tr>
			<tr>
				<td width='25%'><p><small>Date Paid:</small></p></td>
				<td width='25%'><p style='border-bottom: 1px solid #000000'>&nbsp;</p></td>
				<td width='25%'><p><small>Date Paid:</small></p></td>
				<td width='25%'><p style='border-bottom: 1px solid #000000'>&nbsp;</p></td>
			</tr>
			<tr>
				<td width='25%'><p><small>Receipt Number:</small></p></td>
				<td width='25%'><p style='border-bottom: 1px solid #000000'>&nbsp;</p></td>
				<td width='25%'><p><small>Receipt Number:</small></p></td>
				<td width='25%'><p style='border-bottom: 1px solid #000000'>&nbsp;</p></td>
			</tr>
			<tr>
				<td width='50%' colspan='2'><p align='center'><small>__Cash&nbsp;&nbsp;__Check&nbsp;&nbsp;__MO&nbsp;&nbsp;__MC&nbsp;&nbsp;__Visa&nbsp;&nbsp;__Disc</small></p></td>
				<td width='50%' colspan='2'><p align='center'><small>__Cash&nbsp;&nbsp;__Check&nbsp;&nbsp;__MO&nbsp;&nbsp;__MC&nbsp;&nbsp;__Visa&nbsp;&nbsp;__Disc</small></p></td>
			</tr>
		</table>
		<br>
	</td>
</tr>
</table>";
require($depth."_globalvars.php");

$recipient = $applyonline_email;
$subject = "WWW Submission: Online Admission Application";

$body  = "<html> ";
$body .= "<head> ";
$body .= "</head> ";
$body .= "<body> ";
$body .= $style;
$body .= $table1_mail;
$body .= $table2;
$body .= "</body></html>";

// try sending
if (!log_mail($_POST['email'], $recipient, $subject, $body, $header)) {
//if (!log_mail($_POST['email'], "jay@werkbot.com", $subject, $body, $header)) {
	// ERROR: mail couldn't be sent
	echo "<br><br><p>There was an error attempting to submit your application. Contact the <a href='webmaster.php'>Webmaster</a> to report the problem.</p>";
} else {
	// output thank you and submitted fields ($body) if desired
	echo "<h2>Your application was successfully submitted. Please wait while your completed application loads. Please print this page and retain it for your records. The admissions department will be in contact with you regarding your application. Thank you!</h2><br> ";
	echo $table1_display;
	echo $table2;
}


?>
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