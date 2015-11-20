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
		<title><? echo $cfg->site_title; ?> | Step Two</title>
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
						<h1>Apply Online</h1>
<?
	print "
		<form action='../step three/' method='post' name='form_step_2' id='form_step_2'>
			<input type='hidden' name='first_name' value='".$_REQUEST['first_name']."' />
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
	/******/
		print "
			<table cellpadding='5' cellspacing='5'>
				<tr>
					<td colspan='2'><h2>Personal Information</h2></td>
				</tr>";
	/******/
		print "<tr>
					<th><span class='star_required'>*</span>Date of Birth</th>
					<td><input class='required' type='text' name='date_of_birth' value='$date_of_birth' size='50' /></td>
				</tr>";
	/******/
		print "<tr>
					<th>Gender</th>";
					if($gender_choice=="male"){
						print "<td><input type='radio' id='gender_choice_1' name='gender_choice' value='yes'/> <label for='gender_choice_1'>Male</label> 
									<input type='radio' id='gender_choice_2'  name='gender_choice' value='no' selected='selected' /> <label for='gender_choice_2'>Female</label></td></tr>";
					}else{
						print "<td><input type='radio' id='gender_choice_1' name='gender_choice' value='yes' selected='selected' /> <label for='gender_choice_1'>Male</label> 
									<input type='radio' id='gender_choice_2'  name='gender_choice' value='no' /> <label for='gender_choice_2'>Female</label></td></tr>";
					}
	/******/
		print "<tr>
					<th>US Veteran?</th>";
					if($veteran_choice=="yes"){
						print "<td><input type='radio' id='veteran_choice_1' name='veteran_choice' value='yes'/> <label for='veteran_choice_1'>Yes</label> 
									<input type='radio' id='veteran_choice_2'  name='veteran_choice' value='no' selected='selected' /> <label for='veteran_choice_2'>No</label></td></tr>";
					}else{
						print "<td><input type='radio' id='veteran_choice_1' name='veteran_choice' value='yes' selected='selected' /> <label for='veteran_choice_1'>Yes</label> 
									<input type='radio' id='veteran_choice_2'  name='veteran_choice' value='no' /> <label for='veteran_choice_2'>No</label></td></tr>";
					}
	/******/
		print "<tr>
					<th>US Citizen?</th>";
					if($citizen_choice=="yes"){
						print "<td><input type='radio' id='citizen_choice_1' name='citizen_choice' value='yes'/> <label for='citizen_choice_1'>Yes</label> 
									<input type='radio' id='citizen_choice_2' name='citizen_choice' value='no' selected='selected' /> <label for='citizen_choice_2'>No</label></td></tr>";
					}else{
						print "<td><input type='radio' id='citizen_choice_1' name='citizen_choice' value='yes' selected='selected' /> <label for='citizen_choice_1'>Yes</label> 
									<input type='radio' id='citizen_choice_2' name='citizen_choice' value='no' /> <label for='citizen_choice_2'>No</label></td></tr>";
					}
	/******/
		print "<tr>
					<th>PA Resident?</th>";
					if($citizen_choice=="yes"){
						print "<td><input type='radio' id='resident_choice_1' name='resident_choice' value='yes'/> <label for='resident_choice_1'>Yes</label> 
									<input type='radio' id='resident_choice_2'  name='resident_choice' value='no' selected='selected' /> <label for='resident_choice_2'>No</label></td></tr>";
					}else{
						print "<td><input type='radio' id='resident_choice_1' name='resident_choice' value='yes' selected='selected' /> <label for='resident_choice_1'>Yes</label> 
									<input type='radio' id='resident_choice_2'  name='resident_choice' value='no' /> <label for='resident_choice_2'>No</label></td></tr>";
					}
	/******/
		print "<tr>
				<td colspan='2'>Note any special conditions (health, etc.) that may affect your ability to receive training:</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<textarea name='conditions' cols='50' rows='7'>$conditions</textarea>
				</td>
			</tr>";
	/******/
		print "<tr>
				<th>I would like to being my training:</th>
				<td>
					<select name='training_date'>
						<option value='Fall term'>Fall term</option>
						<option value='Winter term'>Winter term</option>
						<option value='Spring term'>Spring term</option>
						<option value='Summer term'>Summer term</option>
						<option value='Right Away'>Right Away</option>
						<option value='After high school graduation'>After high school graduation</option>
					</select>
				</td>
			</tr>";
	/******/
		print "<tr>
					<th>Status</th>";
					if($status_choice=="full-time"){
						print "<td><input type='radio' id='status_choice_1' name='status_choice' value='full-time'/> <label for='status_choice_1'>Full-time</label> 
									<input type='radio' id='status_choice_2'  name='status_choice' value='part-time' selected='selected' /> <label for='status_choice_2'>Part-time</label></td></tr>";
					}else{
						print "<td><input type='radio' id='status_choice_1' name='status_choice' value='full-time' selected='selected' /> <label for='status_choice_1'>Full-time</label> 
									<input type='radio' id='status_choice_2'  name='status_choice' value='part-time' /> <label for='status_choice_2'>Part-time</label></td></tr>";
					}	
	/******/
		print "<tr>
					<td colspan='2' align='right'><input type='submit' name='submitok' value='next' /></td>
				</tr>
			</table>
		</form>
		<script type='text/javascript'>new FormValidator ('form_step_2');</script>";
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

