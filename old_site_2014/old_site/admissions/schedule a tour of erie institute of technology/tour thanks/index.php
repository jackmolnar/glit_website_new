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
		<title><? echo $cfg->site_title; ?> | tour thanks</title>
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
<hr />
<ul>
    <li>To determine whether you can gain from our courses of study, we ask that you complete this form. Please answer all questions as fully as you can. All information will be held in strict confidence. Upon graduation, the information on this form may assist with placement.</li>
    <li>This form is an information-gathering tool, therefore, school admission will not be solely based on the information provided. See <a href="http://www.erieit.edu/admissions/admission%20requirements/">Admission Requirements</a> for more information.</li>
    <li>Please complete all sections of this form.</li>
</ul>
<br />
<?
//SEND TO danb@glit.edu
		print "
			<form name='form_step_1' id='form_step_1' action='step two/' method='post'>
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
							<th>Work Phone</th>
							<td><input type='text' name='work_phone' value='$work_phone' size='30' /></td>
						</tr>";
			/******/
				print "<tr>
							<th>May we contact you at work?</th>";
							if($contact_choice=="no"){
								print "<td><input type='radio' id='contact_choice_1' name='contact_choice' value='yes'/> <label for='contact_choice_1'>Yes</label> 
											<input type='radio' id='contact_choice_2'  name='contact_choice' value='no'  selected='selected' /> <label for='contact_choice_2'>No</label></td></tr>";
							}else{
								print "<td><input type='radio' id='contact_choice_1' name='contact_choice' value='yes' selected='selected' /> <label for='contact_choice_1'>Yes</label> 
											<input type='radio' id='contact_choice_2'  name='contact_choice' value='no'/> <label for='contact_choice_2'>No</label></td></tr>";
							}
			/******/
				print "<tr>
							<th><span class='star_required'>*</span>Email Address</th>
							<td><input class='required validate-email' type='text' name='email' value='$email' size='50' /></td>
						</tr>";
			/******/
				print "<tr>
							<td colspan='2'><h3>Programs of Interest</h3></td>
						</tr>";
				$program_list = array("Multimedia Graphic Design",
									  "Network and Database Professional",
									  "Office Software Specialist",
									  "Basic Electronics Technician",
									  "Biomedical Equipment Technology",
									  "Computer and Electronics Engineering Technology",
									  "Industrial Automation and Robotics Technology",
									  "Office Machine Service Technology",
									  "CNC / Machinist Technician",
									  "Maintenance Technician",
									  "Manufacturing Technician",
									  "Moldmaker / Mold Design",
									  "Plastics Molding Technician",
									  "Quality Control Technician"
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
						<td colspan='2' align='right'><input type='submit' name='submitok' value='next' /></td>
					</tr>
				</table>
			</form>
			<script type='text/javascript'>new FormValidator ('form_step_1');</script>
		";
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

