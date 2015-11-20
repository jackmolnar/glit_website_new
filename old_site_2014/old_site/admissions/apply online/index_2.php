<?php

	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "../../";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "../../_admin/class/class_config.php";

		include "../../_admin/class/class_db.php";

		include "../../_admin/class/class_time.php";

	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;

		include "../../_face/class/face_common.php";

		include "../../_face/class/mimemail/htmlMimeMail.php";

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

		<title><? echo $cfg->site_title; ?> | Apply Online</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="" />

		<meta name="description" content=""/>

		<meta name="robots" content="index, follow" />

		<link href="../../_scripts/master.css" rel="stylesheet" type="text/css" />

		<script src="../../_scripts/js/mootools.v1.11.js" type="text/javascript" ></script>

		<script src="../../_scripts/js/validation.js" type="text/javascript"></script>

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

	</head>

	<body>

		<div id="masterframe">

			<div id="header">

				<div id="search">

					<form action="../../search/" method="post">

						<input class="txt" name="keys" type="text" value="Search..." maxlength="50" onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...';"/>

						<input class="img" type="image" src="../../_images/searchtxt.gif" alt="Search" border="0"/>

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

if($common->checkurlForPageName("apply%20online")){

print "<li><div class='leftselect'>Apply Online</div></li>";

}else{

print "<li><a href='".$depth."admissions/apply online/'>Apply Online</a></li>";

}

if($common->checkurlForPageName("tell%20a%20friend")){

print "<li><div class='leftselect'>Tell A Friend</div></li>";

}else{

print "<li><a href='".$depth."admissions/tell a friend/'>Tell A Friend</a></li>";

}

?></ul>

						</div>

					</td>

					<td id="rightcontent">
<?

	if($_REQUEST['submit_application']){

		$first_name = $_REQUEST['first_name'];

		$middle_initial = $_REQUEST['middle_initial'];

		$last_name = $_REQUEST['last_name'];

		$maiden_name = $_REQUEST['maiden_name'];

		$address = $_REQUEST['address'];

		$city = $_REQUEST['city'];

		$state = $_REQUEST['state'];

		$zip = $_REQUEST['zip'];

		$home_phone = $_REQUEST['home_phone'];

		$work_phone = $_REQUEST['work_phone'];

		$email = $_REQUEST['email'];

		$program_count = $_REQUEST['program_count'];

		$program_array = array();

		for($i=0; $i<count($program_count); $i++){

			$program_array[$i] = $_REQUEST['program_$i'];

		}

		$date_of_birth = $_REQUEST['date_of_birth'];


//CONSTRUCT HTML EMAIL BODY


$body = "

<strong>First Name</strong>: $first_name <br/>

<strong>Middle Initial</strong>: $middle_initial <br/>

<strong>Last Name</strong>: $last_name <br/>

<strong>Maiden Name</strong>: $maiden_name <br/>

<strong>Address</strong>: $address <br/>

$city, $state $zip <br/>

<strong>Home Phone</strong>: $home_phone <br/>

<strong>Cell Phone</strong>: $work_phone <br/>

<strong>Email</strong>: $email <br/>

<strong>Date of Birth</strong>: $date_of_birth <br/>";


for($i=0; $i<count($program_array); $i++){

	$body.= "<strong>Program ".$program_array[$i]."</strong>: ".$program_array[$i]." <br/>";

}
//CONSTRUCT TEXT EMAIL BODY

$body_notags ="<strong>First Name</strong>: $first_name <br/>

<strong>Middle Initial</strong>: $middle_initial <br/>

<strong>Last Name</strong>: $last_name <br/>

<strong>Maiden Name</strong>: $maiden_name <br/>

<strong>Address</strong>: $address <br/>

$city, $state $zip <br/>

<strong>Home Phone</strong>: $home_phone <br/>

<strong>Cell Phone</strong>: $work_phone <br/>

<strong>Email</strong>: $email <br/>

<strong>Date of Birth</strong>: $date_of_birth <br/>";


for($i=0; $i<count($program_array); $i++){

	$body.= "<strong>Program ".$program_array[$i]."</strong>: ".$program_array[$i]." <br/>";

}


//

$messageSubject = "Online Application - $first_name $last_name";

			$mail = new htmlMimeMail();

			$mail->setHtml($body, $body_notags);
			
			$mail->setReturnPath('info@erieit.edu');

			$mail->setFrom('contact_us@erieit.edu');

			$mail->setSubject($messageSubject);

			$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');
			
			//SEND TO BELOW \/
			
			if($mail->send(array('jonm@glit.edu'), 'mail')){
				
				print "<h1>Thank you for your application!</h1>";

			}else{

				print "<h1>An error has occured!</h1>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";

			}
			
		}else{

				print "

						<h2>Apply Online</h2>

<hr />

<ul>

    

    <li>This form is an information-gathering tool, therefore, school admission will not be solely based on the information provided. See <a href='http://www.erieit.edu/admissions/admission%20requirements/'>Admission Requirements</a> for more information.</li>

    <li>Please complete all sections of this form.</li>

</ul>

<br />";



//SEND TO danb@glit.edu
//<form name='form_step_1' id='form_step_1' action='step two/index2.php' method='post'>
		print "

			<form action='' method='post' name='final' id='final'>
			

				<table cellpadding='5' cellspacing='5'>

					<tr>

						<td colspan='2'><h3>General Information</h3></td>

					</tr>";

			/******/

				print "<tr>

							<th><span class='star_required'>*</span>First Name</th>

							<td><input class='required' type='text' name='first_name' value='$first_name' size='50' /></td>

						</tr>";

			/******/

				print "<tr>

							<th>Middle Initial</th>

							<td><input type='text' name='middle_initial' value='$middle_initial' size='20'  /></td>

						</tr>";

			/******/

				print "<tr>

							<th><span class='star_required'>*</span>Last Name</th>

							<td><input class='required' type='text' name='last_name' value='$last_name' size='50' /></td>

						</tr>";

			/******/

				print "<tr>

							<th>Maiden Name</th>

							<td><input type='text' name='maiden_name' value='$maiden_name'  size='50' /></td>

						</tr>";

			/******/

				print "<tr>

							<th><span class='star_required'>*</span>Address</th>

							<td><input class='required' type='text' name='address' value='$address'  size='50' /></td>

						</tr>";

			/******/

				print "<tr>

							<th><span class='star_required'>*</span>City</th>

							<td><input class='required' type='text' name='city' value='$city'  size='50' /></td>

						</tr>";

			/******/

				print "<tr>

							<th><span class='star_required'>*</span>State</th><td>

							<select name='state'>

								".$common->printSelectState($state)." 

							</select>

							Zip <input class='required' type='text' name='zip' value='$zip'  size='20' /></td>

						</tr>";

			/******/

				print "<tr>

							<th><span class='star_required'>*</span>Home Phone</th>

							<td><input class='required' type='text' name='home_phone' value='$home_phone' size='30' /></td>

						</tr>";

			/******/

				print "<tr>

							<th>Cell Phone</th>

							<td><input type='text' name='work_phone' value='$work_phone' size='30' /></td>

						</tr>";

			/******/

				
				print "<tr>

							<th><span class='star_required'>*</span>Email Address</th>

							<td><input class='required validate-email' type='text' name='email' value='$email' size='50' /></td>

						</tr>";

			/******/
			
			

		print "<tr>

					<th><span class='star_required'>*</span>Date of Birth</th>

					<td><input class='required' type='text' name='date_of_birth' value='$date_of_birth' size='50' /></td>

				</tr>";

	/******/


				print "<tr>

							<td colspan='2'><h3>Programs of Interest</h3></td>

						</tr>";

				$program_list = array("Biomedical Equipment Technology",

									  "Business Office Professional",

									  "CNC / Machinist Technician",

									  "Electronic Engineering Technology",

									  "Electronics Technician",

									  "Industrial Automation & Robotics Technology",

									  "Maintenance Technician",

									  "Multimedia Graphic Design",

									  "Network & Database Professional",

									  "RHVAC Technology",

									  "Welding Technology",

									);

				for($i=0;$i<count($program_list);$i++){

					print "<tr><td><input type='hidden' name='program_count' value='".count($program_list)."' /></td>";

					if($program_values[$i]){

						print "<td><input type='checkbox' id='program_$i' name='program_$i' selected='selected' /> <label for='program_$i'>".$program_list[$i]."</label></td></tr>";

					}else{

						print "<td><input type='checkbox' id='program_$i' name='program_$i' /> <label for='program_$i'>".$program_list[$i]."</label></td></tr>";

					}

				}

			/******/

print "<tr>

						<td colspan='2' align='left'><br><h3>Disclaimer</h3>
<p>Class sizes are limited and will be closed to enrollment when the maximum number of students is reached. Applicants who do not enroll before a class is filled have the option to register for a future class.</p>
</td>

					</tr>";
					
					
				print "<tr>

						<td colspan='2' align='right'><input type='submit' name='submit_application' value='Submit Application' /></td>

					</tr>

				</table>

			</form>

			<script type='text/javascript'>new FormValidator ('final');</script>

		";
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

<p><a target="_blank" href="http://www.youtube.com/thecareerschools"><img height="41" alt="See EIT videos on YouTube.com/thecareerschools" width="80" align="middle" border="0" src="http://www.erieit.edu/_files/images/file_120.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="http://www.facebook.com/home.php?#/pages/Erie-PA/Erie-Institute-of-Technology/186675069112"><img height="38" alt="Become a friend of EIT on Facebook:  thecareerschools" width="100" align="middle" border="0" src="http://www.erieit.edu/_files/images/file_118.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a target="_blank" href="http://www.twitter.com/EITCareerServ"><img height="23" alt="Follow EIT Career Services Office on Twitter:  EITCareerServ" width="100" align="middle" border="0" src="http://www.erieit.edu/_files/images/file_108.png" /></a><br />

Home |&nbsp;<a href="http://www.erieit.edu/alumni/">Career Services (Alumni &amp; Employers)</a>&nbsp;|&nbsp;<a href="http://www.erieit.edu/careers/">Employment</a> | <a href="http://www.erieit.edu/contact/">Contact Us</a> | <a href="http://www.erieit.edu/site map/">Site Map</a> | <a href="http://www.erieit.edu/privacy/">Privacy Policy</a> | <a href="mailto:info@erieit.edu">Webmaster</a> <br />

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



