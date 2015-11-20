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
		<title><? echo $cfg->site_title; ?> | Step Five</title>
		<meta name="author" content="Werkbot Studios" />
		<meta name="keywords" content="" />
		<meta name="description" content=""/>
		<meta name="robots" content="index, follow" />
		<link href="../../../_scripts/master.css" rel="stylesheet" type="text/css" />
		<script src="../../../_scripts/js/mootools.v1.11.js" type="text/javascript" ></script>
		<script src="../../../_scripts/js/validation.js" type="text/javascript"></script>
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
						<h2>Apply Online</h2>
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
		$contact_choice = $_REQUEST['contact_choice'];
		$email = $_REQUEST['email'];
		$program_count = $_REQUEST['program_count'];
		$program_array = array();
		for($i=0; $i<count($program_count); $i++){
			$program_array[$i] = $_REQUEST['program_$i'];
		}
		$date_of_birth = $_REQUEST['date_of_birth'];
		$gender_choice = $_REQUEST['gender_choice'];
		$veteran_choice = $_REQUEST['veteran_choice'];
		$citizen_choice = $_REQUEST['citizen_choice'];
		$resident_choice = $_REQUEST['resident_choice'];
		$conditions = $_REQUEST['conditions'];
		$training_date = $_REQUEST['training_date'];
		$status_choice = $_REQUEST['status_choice'];
		$highschool_name = $_REQUEST['highschool_name'];
		$highschool_city = $_REQUEST['highschool_city'];
		$highschool_state = $_REQUEST['highschool_state'];
		$graduation_year = $_REQUEST['graduation_year'];
		$state_exam = $_REQUEST['state_exam'];
		$year_exam = $_REQUEST['year_exam'];
		$school_name_1 = $_REQUEST['school_name_1'];
		$school_city_1 = $_REQUEST['school_city_1'];
		$school_state_1 = $_REQUEST['school_state_1'];
		$program_of_study_1 = $_REQUEST['program_of_study_1'];
		$degree_earned_1 = $_REQUEST['degree_earned_1'];
		$last_year_1 = $_REQUEST['last_year_1'];
		$school_name_2 = $_REQUEST['school_name_2'];
		$school_city_2 = $_REQUEST['school_city_2'];
		$school_state_2 = $_REQUEST['school_state_2'];
		$program_of_study_2 = $_REQUEST['program_of_study_2'];
		$degree_earned_2 = $_REQUEST['degree_earned_2'];
		$employer_name_1 = $_REQUEST['employer_name_1'];
		$address_1 = $_REQUEST['address_1'];
		$city_1 = $_REQUEST['city_1'];
		$state_1 = $_REQUEST['state_1'];
		$zip_1 = $_REQUEST['zip_1'];
		$position_1 = $_REQUEST['position_1'];
		$date_started_1 = $_REQUEST['date_started_1'];
		$date_ended_1 = $_REQUEST['date_ended_1'];
		$employer_name_2 = $_REQUEST['employer_name_2'];
		$address_2 = $_REQUEST['address_2'];
		$city_2 = $_REQUEST['city_2'];
		$state_2 = $_REQUEST['state_2'];
		$zip_2 = $_REQUEST['zip_2'];
		$position_2 = $_REQUEST['position_2'];
		$date_started_2 = $_REQUEST['date_started_2'];
		$date_ended_2 = $_REQUEST['date_ended_2'];
		$employer_name_3 = $_REQUEST['employer_name_3'];
		$address_3 = $_REQUEST['address_3'];
		$city_3 = $_REQUEST['city_3'];
		$state_3 = $_REQUEST['state_3'];
		$zip_3 = $_REQUEST['zip_3'];
		$position_3 = $_REQUEST['position_3'];
		$date_started_3 = $_REQUEST['date_started_3'];
		$date_ended_3 = $_REQUEST['date_ended_3'];
//CONSTRUCT HTML EMAIL BODY
$body = "
<strong>First Name</strong>: $first_name <br/>
<strong>Middle Initial</strong>: $middle_initial <br/>
<strong>Last Name</strong>: $last_name <br/>
<strong>Maiden Name</strong>: $maiden_name <br/>
<strong>Address</strong>: $address <br/>
$city, $state $zip <br/>
<strong>Home Phone</strong>: $home_phone <br/>
<strong>Work Phone</strong>: $work_phone <br/>
<strong>Contact Choice</strong>: $contact_choice <br/>
<strong>Email</strong>: $email <br/>
";
for($i=0; $i<count($program_array); $i++){
	$body.= "<strong>Program ".$program_array[$i]."</strong>: ".$program_array[$i]." <br/>";
}
$body.= "<br/><br/>
<strong>Date of Birth</strong>: $date_of_birth <br/>
<strong>Gender</strong>: $gender_choice <br/>
<strong>Veteran</strong>: $veteran_choice <br/>
<strong>Citizen</strong>: $citizen_choice <br/>
<strong>Resident</strong>: $resident_choice <br/>
<strong>Conditions</strong>: $conditions <br/>
<strong>Training Date</strong>: $training_date <br/>
<strong>Status</strong>: $status_choice <br/>
<br/><br/>
<strong>Highschool Name</strong>: $highschool_name <br/>
<strong>Highschool City</strong>: $highschool_city <br/>
<strong>Highschool State</strong>: $highschool_state <br/>
<strong>Graduation Year</strong>: $graduation_year <br/>
<strong>Exam State</strong>: $state_exam <br/>
<strong>Exam Year</strong>: $year_exam <br/>
<strong>School Name</strong>: $school_name_1 <br/>
<strong>School City</strong>: $school_city_1 <br/>
<strong>School State</strong>: $school_state_1 <br/>
<strong>Program of Study</strong>: $program_of_study_1 <br/>
<strong>Graduated</strong>: $graduated_choice_1 <br/>
<strong>Degree Earned</strong>: $degree_earned_1 <br/>
<strong>Last Year</strong>: $last_year_1 <br/>
<strong>School Name</strong>: $school_name_2 <br/>
<strong>School City</strong>: $school_city_2 <br/>
<strong>School State</strong>: $school_state_2 <br/>
<strong>Program of Study</strong>: $program_of_study_2 <br/>
<strong>Graduated</strong>: $graduated_choice_2 <br/>
<strong>Degree Earned</strong>: $degree_earned_2 <br/>
<strong>Last Year</strong>: $last_year_2 <br/>
<br/><br/>
<strong>Employer Name</strong>: $employer_name_1 <br/>
<strong>Address</strong>: $address_1 <br/>
$city_1, $state_1 $zip_1 <br/>
<strong>Position</strong>: $position_1 <br/>
<strong>Date Started</strong>: $date_started_1 <br/>
<strong>Date Ended</strong>: $date_ended_1 <br/>
<strong>Employer Name</strong>: $employer_name_2 <br/>
<strong>Address</strong>: $address_2 <br/>
$city_2, $state_2 $zip_2 <br/>
<strong>Position</strong>: $position_2 <br/>
<strong>Date Started</strong>: $date_started_2 <br/>
<strong>Date Ended</strong>: $date_ended_2 <br/>
<strong>Employer Name</strong>: $employer_name_3 <br/>
<strong>Address</strong>: $address_3 <br/>
$city_3, $state_3 $zip_3 <br/>
<strong>Position</strong>: $position_3 <br/>
<strong>Date Started</strong>: $date_started_3 <br/>
<strong>Date Ended</strong>: $date_ended_3 <br/>
";
//CONSTRUCT TEXT EMAIL BODY
$body_notags ="First Name: $first_name 
Middle Initial: $middle_initial 
Last Name: $last_name 
Maiden Name: $maiden_name 
Address: $address 
$city, $state $zip 
Home Phone: $home_phone 
Work Phone: $work_phone 
Contact Choice: $contact_choice 
Email: $email 
";
for($i=0; $i<count($program_array); $i++){
	$body_notags.= "Program ".$program_array[$i].": ".$program_array[$i]." ";
}
$body_notags.= "
Date of Birth: $date_of_birth 
Gender: $gender_choice 
Veteran: $veteran_choice 
Citizen: $citizen_choice 
Resident: $resident_choice 
Conditions: $conditions 
Training Date: $training_date 
Status: $status_choice 

Highschool Name: $highschool_name 
Highschool City: $highschool_city 
Highschool State: $highschool_state 
Graduation Year: $graduation_year 
Exam State: $state_exam 
Exam Year: $year_exam 
School Name: $school_name_1 
School City: $school_city_1 
School State: $school_state_1 
Program of Study: $program_of_study_1 
Graduated: $graduated_choice_1 
Degree Earned: $degree_earned_1 
Last Year: $last_year_1 
School Name: $school_name_2 
School City: $school_city_2 
School State: $school_state_2 
Program of Study: $program_of_study_2 
Graduated: $graduated_choice_2 
Degree Earned: $degree_earned_2 
Last Year: $last_year_2 

Employer Name: $employer_name_1 
Address: $address_1 
$city_1, $state_1 $zip_1 
Position: $position_1 
Date Started: $date_started_1 
Date Ended: $date_ended_1 
Employer Name: $employer_name_2 
Address: $address_2 
$city_2, $state_2 $zip_2 
Position: $position_2 
Date Started: $date_started_2 
Date Ended: $date_ended_2 
Employer Name: $employer_name_3 
Address: $address_3 
$city_3, $state_3 $zip_3 
Position: $position_3 
Date Started: $date_started_3 
Date Ended: $date_ended_3 ";
		//
			$messageSubject = "Online Application - $first_name $last_name";
			$mail = new htmlMimeMail();
			$mail->setHtml($body, $body_notags);
			//$mail->setReturnPath($email);
			//$mail->setFrom('"'.$name.'" <noreply@erieit.org>');
			$mail->setReturnPath('info@erieit.edu');
			$mail->setFrom('contact_us@erieit.edu');
			$mail->setSubject($messageSubject);
			$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');
		//
			if($mail->send(array('info@erieit.edu'), 'mail')){
			//if($mail->send(array('jay@werkbot.com'), 'mail')){
				print "<h1>Thank you for your application!</h1>";
			}else{
				print "<h1>An error has occured!</h1>";
				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";
			}
	}else{
		print "
			<p>As part of the admission requirements, there is a .00 Application Fee due upon applying. Applicants must complete a High School Transcript and/or GED Transcript release form.</p>
<p>Class sizes are limited per program and will be closed to enrollment when that number is reached. Enrollment is granted on a first-come, first-served basis only to registered applicants who have completed all admission requirements. Applicants who do not enroll before a class is filled have the option to register for a future class.</p>
<p>By clicking the Submit button below, I certify that the information I have provided on this application is accurate to the best of my knowledge and that any misrepresentation by me on this form could lead to future disciplinary action by Erie Institute of Technology.</p>
			<form action='' method='post'>";
				/************
				STEP ONE VARIABLES
				************/
				print "<input type='hidden' name='first_name' value='".$_REQUEST['first_name']."' />
					<input type='hidden' name='middle_initial' value='".$_REQUEST['middle_initial']."' />
					<input type='hidden' name='last_name' value='".$_REQUEST['last_name']."' />
					<input type='hidden' name='maiden_name' value='".$_REQUEST['maiden_name']."' />
					<input type='hidden' name='address' value='".$_REQUEST['address']."' />
					<input type='hidden' name='city' value='".$_REQUEST['city']."' />
					<input type='hidden' name='state' value='".$_REQUEST['state']."' />
					<input type='hidden' name='zip' value='".$_REQUEST['zip']."' />
					<input type='hidden' name='home_phone' value='".$_REQUEST['home_phone']."' />
					<input type='hidden' name='work_phone' value='".$_REQUEST['work_phone']."' />
					<input type='hidden' name='contact_choice' value='".$_REQUEST['contact_choice']."' />
					<input type='hidden' name='email' value='".$_REQUEST['email']."' />
					<input type='hidden' name='program_count' value='".$_REQUEST['program_count']."' />";
					for($i=0;$i<$_REQUEST['program_count'] ;$i++){
						print "<input type='hidden' name='program_$i' value='".$_REQUEST['program_$i']."' />";
					}
				/************
				STEP TWO VARIABLES
				************/
				print "<input type='hidden' name='date_of_birth' value='".$_REQUEST['date_of_birth']."' />
					<input type='hidden' name='gender_choice' value='".$_REQUEST['gender_choice']."' />
					<input type='hidden' name='veteran_choice' value='".$_REQUEST['veteran_choice']."' />
					<input type='hidden' name='citizen_choice' value='".$_REQUEST['citizen_choice']."' />
					<input type='hidden' name='resident_choice' value='".$_REQUEST['resident_choice']."' />
					<input type='hidden' name='conditions' value='".$_REQUEST['conditions']."' />
					<input type='hidden' name='training_date' value='".$_REQUEST['training_date']."' />
					<input type='hidden' name='status_choice' value='".$_REQUEST['status_choice']."' />";
				/************
				STEP THREE VARIABLES
				************/
				print "<input type='hidden' name='highschool_name' value='".$_REQUEST['highschool_name']."' />
						<input type='hidden' name='highschool_city' value='".$_REQUEST['highschool_city']."' />
						<input type='hidden' name='highschool_state' value='".$_REQUEST['highschool_state']."' />
						<input type='hidden' name='graduation_year' value='".$_REQUEST['graduation_year']."' />
						<input type='hidden' name='state_exam' value='".$_REQUEST['state_exam']."' />
						<input type='hidden' name='year_exam' value='".$_REQUEST['year_exam']."' />
						<input type='hidden' name='school_name_1' value='".$_REQUEST['school_name_1']."' />
						<input type='hidden' name='school_city_1' value='".$_REQUEST['school_city_1']."' />
						<input type='hidden' name='school_state_1' value='".$_REQUEST['school_state_1']."' />
						<input type='hidden' name='program_of_study_1' value='".$_REQUEST['program_of_study_1']."' />
						<input type='hidden' name='graduated_choice_1' value='".$_REQUEST['graduated_choice_1']."' />
						<input type='hidden' name='degree_earned_1' value='".$_REQUEST['degree_earned_1']."' />
						<input type='hidden' name='last_year_1' value='".$_REQUEST['last_year_1']."' />
						<input type='hidden' name='school_name_2' value='".$_REQUEST['school_name_2']."' />
						<input type='hidden' name='school_city_2' value='".$_REQUEST['school_city_2']."' />
						<input type='hidden' name='school_state_2' value='".$_REQUEST['school_state_2']."' />
						<input type='hidden' name='program_of_study_2' value='".$_REQUEST['program_of_study_2']."' />
						<input type='hidden' name='graduated_choice_2' value='".$_REQUEST['graduated_choice_2']."' />
						<input type='hidden' name='degree_earned_2' value='".$_REQUEST['degree_earned_2']."' />
						<input type='hidden' name='last_year_2' value='".$_REQUEST['last_year_2']."' />";
				/************
				STEP FOUR VARIABLES
				************/
				print "<input type='hidden' name='employer_name_1' value='".$_REQUEST['employer_name_1']."' />
					<input type='hidden' name='address_1' value='".$_REQUEST['address_1']."' />
					<input type='hidden' name='city_1' value='".$_REQUEST['city_1']."' />
					<input type='hidden' name='state_1' value='".$_REQUEST['state_1']."' />
					<input type='hidden' name='zip_1' value='".$_REQUEST['zip_1']."' />
					<input type='hidden' name='position_1' value='".$_REQUEST['position_1']."' />
					<input type='hidden' name='date_started_1' value='".$_REQUEST['date_started_1']."' />
					<input type='hidden' name='date_ended_1' value='".$_REQUEST['date_ended_1']."' />
					<input type='hidden' name='employer_name_2' value='".$_REQUEST['employer_name_2']."' />
					<input type='hidden' name='address_2' value='".$_REQUEST['address_2']."' />
					<input type='hidden' name='city_2' value='".$_REQUEST['city_2']."' />
					<input type='hidden' name='state_2' value='".$_REQUEST['state_2']."' />
					<input type='hidden' name='zip_2' value='".$_REQUEST['zip_2']."' />
					<input type='hidden' name='position_2' value='".$_REQUEST['position_2']."' />
					<input type='hidden' name='date_started_2' value='".$_REQUEST['date_started_2']."' />
					<input type='hidden' name='date_ended_2' value='".$_REQUEST['date_ended_2']."' />
					<input type='hidden' name='employer_name_3' value='".$_REQUEST['employer_name_3']."' />
					<input type='hidden' name='address_3' value='".$_REQUEST['address_3']."' />
					<input type='hidden' name='city_3' value='".$_REQUEST['city_3']."' />
					<input type='hidden' name='state_3' value='".$_REQUEST['state_3']."' />
					<input type='hidden' name='zip_3' value='".$_REQUEST['zip_3']."' />
					<input type='hidden' name='position_3' value='".$_REQUEST['position_3']."' />
					<input type='hidden' name='date_started_3' value='".$_REQUEST['date_started_3']."' />
					<input type='hidden' name='date_ended_3' value='".$_REQUEST['date_ended_3']."' />
					";
				
			/******/
				print "
				<table>
					<tr>
						<td colspan='2' align='right'><input type='submit' name='submit_application' value='Submit Application' /></td>
					</tr>
				</table>
			</form>";
		}
?>
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

