<?php

	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "_admin/class/class_config.php";

		include "_admin/class/class_db.php";

		include "_admin/class/class_time.php";
		
		include "global_includes/mimemail/htmlMimeMail.php";

	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;

		include "_face/class/face_common.php";

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

		<title>Admissions | Erie Institute of Technology</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="" />

		<meta name="description" content=""/>

		<meta name="robots" content="index, follow" />

		<link href="_scripts/master.css" rel="stylesheet" type="text/css" />

	</head>

	<body>

		<div id="masterframe">

			<div id="header">

				<div id="search">
                
                <? include('global_includes/head_contact.php'); ?>
                
				</div>


			</div>

			<div id="menu">

				<ul>
                
                <? include('global_includes/main_menu.php'); ?>
                
                </ul>

			</div>

		</div>

		<div id="content">

			<div id="subtop">

				<img src="_images/why_eit.jpg" alt="#" />

				<div id="subtopleft">

				<?

					$num = rand(1,7);

					print "<img src='_images/quote_00".$num.".gif' />";

				?>

				</div>

			</div>

			<table>

				<tr>

					<td id="subcontent">

						<div id="leftmenu">

							<ul>
                            
                            <? include('global_includes/admissions_menu.php'); ?>
                            
                            
                            </ul>

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



		$cell_phone = $_REQUEST['cell_phone'];

		

		$work_phone = $_REQUEST['work_phone'];

		

		$text_message = $_REQUEST['text_message'];

		

		$work_contact = $_REQUEST['work_contact'];



		$email = $_REQUEST['email'];

		

		$date_of_birth = $_REQUEST['date_of_birth'];

		

		$drivers_license = $_REQUEST['drivers_license'];

		

		$drivers_license_state = $_REQUEST['drivers_license_state'];

		

		$gender = $_REQUEST['gender'];

		

		$ethnic = $_REQUEST['ethnic'];

		

		$veteran = $_REQUEST['veteran'];

		

		$citizenship = $_REQUEST['citizenship'];

		

		$alt_contact_name = $_REQUEST['alt_contact_name'];

		

		$relationship = $_REQUEST['relationship'];

		

		$alt_phone = $_REQUEST['alt_phone'];

		

		$convicted_of_crime = $_REQUEST['convicted_of_crime'];

		

		$crime_explanation = $_REQUEST['crime_explanation'];

		

		$health = $_REQUEST['health'];

		

		$allergies = $_REQUEST['allergies'];



		$program = $_REQUEST['program'];



		$time = $_REQUEST['time'];

		

		$ged_completed = $_REQUEST['ged_completed'];

		

		$ged_state = $_REQUEST['ged_state'];



		$diploma_completed = $_REQUEST['diploma_completed'];



		$hs_name = $_REQUEST['hs_name'];

		

		$hs_city_state = $_REQUEST['hs_city_state'];

		

		$post_school_1 = $_REQUEST['post_school_1'];

		

		$post_school_1_year = $_REQUEST['post_school_1_year'];

		

		$post_school_1_city = $_REQUEST['post_school_1_city'];

		

		$post_school_1_graduated = $_REQUEST['graduated_1'];

		

		$post_school_1_description = $_REQUEST['post_school_1_description'];

		

		$post_school_2 = $_REQUEST['post_school_2'];

		

		$post_school_2_year = $_REQUEST['post_school_2_year'];

		

		$post_school_2_city = $_REQUEST['post_school_2_city'];

		

		$post_school_2_graduated = $_REQUEST['graduated_2'];

		

		$post_school_2_description = $_REQUEST['post_school_2_description'];

		

		$post_school_3 = $_REQUEST['post_school_3'];

		

		$post_school_3_year = $_REQUEST['post_school_3_year'];

		

		$post_school_3_city = $_REQUEST['post_school_3_city'];

		

		$post_school_3_graduated = $_REQUEST['graduated_3'];

		

		$post_school_3_description = $_REQUEST['post_school_3_description'];

		

		$employment_1 = $_REQUEST['employment_1'];

		

		$position_1 = $_REQUEST['position_1'];

		

		$date_from_1 = $_REQUEST['date_from_1'];

		

		$date_to_1 = $_REQUEST['date_to_1'];

		

		$employment_2 = $_REQUEST['employment_2'];

		

		$position_2 = $_REQUEST['position_2'];

		

		$date_from_2 = $_REQUEST['date_from_2'];

		

		$date_to_2 = $_REQUEST['date_to_2'];



		$employment_3 = $_REQUEST['employment_3'];

		

		$position_3 = $_REQUEST['position_3'];

		

		$date_from_3 = $_REQUEST['date_from_3'];

		

		$date_to_3 = $_REQUEST['date_to_3'];

		

		$reference_1 = $_REQUEST['reference_1'];

		

		$reference_address_1 = $_REQUEST['reference_address_1'];

		

		$reference_city_1 = $_REQUEST['reference_city_1'];

		

		$reference_zipcode_1 = $_REQUEST['reference_zipcode_1'];

		

		$reference_phone_1 = $_REQUEST['reference_phone_1'];

		

		$reference_relationship_1 = $_REQUEST['reference_relationship_1'];

		

		$reference_2 = $_REQUEST['reference_2'];

		

		$reference_address_2 = $_REQUEST['reference_address_2'];

		

		$reference_city_2 = $_REQUEST['reference_city_2'];

		

		$reference_zipcode_2 = $_REQUEST['reference_zipcode_2'];

		

		$reference_phone_2 = $_REQUEST['reference_phone_2'];

		

		$reference_relationship_2 = $_REQUEST['reference_relationship_2'];

		

		$reference_3 = $_REQUEST['reference_3'];

		

		$reference_address_3 = $_REQUEST['reference_address_3'];

		

		$reference_city_3 = $_REQUEST['reference_city_3'];

		

		$reference_zipcode_3 = $_REQUEST['reference_zipcode_3'];

		

		$reference_phone_3 = $_REQUEST['reference_phone_3'];

		

		$reference_relationship_3 = $_REQUEST['reference_relationship_3'];

		



		





//CONSTRUCT HTML EMAIL BODY





$body = "

<style type='text/css'>

<!--

h1 {

	font:Arial, Helvetica, sans-serif;

	font-size:14pt;

	text-align: center;

}

#address {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 10px;

}

body, table, td {

	font-family:Arial, Helvetica, sans-serif;



}

#top {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 8pt;

	list-style-position: outside;

	margin-left: 0px;

	

}

.form_header {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 10pt;

	font-weight: bold;

	color: #FFF;

	background-color: #666;

	text-align: center;

		height: 30px;

			vertical-align: center;

}

.head_text {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 10pt;

	text-align: center;

	vertical-align: center;

}

#personal_info, #personal_info td, #references tr td, #education_info tr td  {



	border: .04em solid #000;

}

.disclaimer {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 10pt;

	display: block;

	width: 800px;

	margin-left: 5px;

}

.line {

	width: 350px;

}



#personal_info {

	width: 800px;



	border: .04em solid #000;

}

#education_info {

	width: 800px;

	border: .04em solid #000;

	margin-top: 10px;

}

#program_info {

	width: 800px;

	border: .04em solid #000;

	margin-top: 10px;

}

.halves {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 7pt;

	height: 40px;

	width: 50%;

	vertical-align: top;

	border: .04em solid #000;

}

.fourths {

	height: 40px;

	width: 25%;

	font-family: Arial, Helvetica, sans-serif;

	font-size: 7pt;

	vertical-align: top;

	border: .04em solid #000;

}

.singles {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 7pt;

	vertical-align: top;

	width: 100%;

	height: 40px;

}

.thirds {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 7pt;

	width: 75%;

	vertical-align: top;

}

.eigths {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 7pt;

	width: 12.5%;

	border: .04em solid #000;

}

.info2 {

	font-family: 'Courier New', Courier, monospace;

	font-size: 8pt;

	margin-left: 5px;

	text-align: left;

}

#info_health {

	font-family: 'Courier New', Courier, monospace;

	font-size: 8pt;

	text-align: left;

	margin-left: 5px;

	padding-left: 5px;

	vertical-align: top;

	border-left-width: 0px;

}

h2 {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 12px;

	font-weight: bold;

	text-align: center;

	width: 800px;

}

.info1 {

	font-family: 'Courier New', Courier, monospace;

	font-size: 10pt;

	vertical-align: bottom;

	line-height: 25px;

	margin-left: 10px;

}

.program_1 {
	font-family: Courier New, Courier, monospace;
	font-size: 7pt;
	text-align: right;
	width: 8%;
	vertical-align: middle;
	text-transform: uppercase;
	padding-right: 7px;
}
.program_2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10pt;
	text-align: left;
	width: 23%;
	vertical-align: top;
}
.program_3 {
	font-family: Courier New, Courier, monospace;
	font-size: 7pt;
	text-align: right;
	width: 8%;
	vertical-align: middle;
	text-transform: uppercase;
	padding-right: 7px;
}
.program_4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10pt;
	text-align: left;
	vertical-align: top;
	width: 30%;
}
.program_5 {
	font-family: Courier New, Courier, monospace;
	font-size: 7pt;
	text-align: right;
	width: 8%;
	vertical-align: middle;
	text-transform: uppercase;
	padding-right: 7px;
}
.program_6 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10pt;
	text-align: left;
	vertical-align: top;
	width: 23%;
}

.program_x tr td {

	height: 16px;

	font-family: 'Courier New', Courier, monospace;

	font-size: 7pt;

}

h3 {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 12px;

	font-weight: bold;



}

#bottom_box {

	font-family: Arial, Helvetica, sans-serif;

	font-size: 9pt;

	line-height: 30px;

	vertical-align: top;

}

#bottom_box_right {

	font-size: 9pt;

	line-height: 20px;

	padding-left: 20px;

	padding-top: 10px;

	padding-bottom: 10px;

}

.bottom_box_small {

	font-size: 6pt;

	line-height: 10px;

}

-->

</style>



</style>



<table width='800' border='0' cellspacing='0' cellpadding='00' id='header_table'>

<tr>

  <td><table width='800' border='0' cellspacing='0' cellpadding='00' id='header_table2'>

    <tr>

      <td><img src='http://www.erieit.edu/_images/eit_email_logo.jpg' alt='' width='184' height='75' /></td>

      <td width='50%' align='right' id='address'><p>940 Millcreek Mall<br />

        Erie, PA 16565<br />

        Phone: 814.868.9900<br />

        Fax: 814.868.9977<br />

        Web: www.ERIEIT.edu </p></td>

    </tr>

    <tr>

      <td colspan='2'><h1>ENROLLMENT APPLICATION</h1></td>

    </tr>

    <tr>

      <td colspan='2' ><ul id='top'>

        <li>To determine whether you can gain from our course of study, we ask that you answer the questions on this form. Please answer all questions as fully as you can. All information will be held in strict confidence and will be used to determine your aptitude for a technology career. Upon graduation, information on this form may assist with placement.</li>

        <li>Admissions requirements/criteria are listed in the School Catalog.</li>

        <li>EIT does not discriminate against any person because of race, color, religion, sex, disabilities, age, national origin, or ancestry regarding admission to programs or placement activities.</li>

      </ul></td>

    </tr>

  </table></td>

</tr>

</table>

<table id='personal_info' width='800' border='1' cellspacing='0' cellpadding='0'  bordercolorlight='#000000'   c>

  <tr>

    <td colspan='4' class='form_header'>Please print clearly and complete all sections of this form.</td>

  </tr>

  <tr>

    <td width='35%' class='fourths'>Last Name: <br/> <span class='info1'>$last_name</span></td>

    <td width='20%' class='fourths'>First Name: <br/> <span class='info1'>$first_name</span></td>

    <td width='21%' class='fourths'>Middle Initial or Name:  <br/> <span class='info1'>$middle_initial</span></td>

    <td width='24%' class='fourths'>Maiden Name:  <br/> <span class='info1'>$maiden_name</span></td>

  </tr>

  <tr>

    <td colspan='2' class='halves'>Address: <br/> <span class='info1'>$address</span></td>

    <td colspan='2' class='halves'>City, State, Zip Code:  <br/> <span class='info1'>$city, $state  $zip</span></td>

  </tr>

  <tr>

    <td class='fourths'>Home Phone #: <br/> <span class='info1'>$home_phone</span></td>

    <td class='fourths'>Cell Phone #: <br/> <span class='info1'>$cell_phone</span></td>

    <td class='fourths'>Work Phone #: <br/> <span class='info1'>$work_phone</span></td>

    <td class='fourths'>May we contact you at work? <span class='info1'>$work_contact</span><br/>May we text your cell phone? <span class='info1'>$text_message</span></td>

  </tr>

  <tr>

    <td colspan='2' class='halves'>Email Address: <br/> <span class='info1'>$email</span></td>

    <td class='fourths'>Driver's License # & State: <br/> <span class='info1'>$drivers_license</span> - <span class='info1'>$drivers_license_state</span></td>

    <td class='fourths'>Social Security #</td>



  </tr>

  <tr>

    <td colspan='2' class='halves'>Alternative contact Name: <br/> <span class='info1'>$alt_contact_name</span></td>

    <td class='fourths'>Relationship: <br/> <span class='info1'>$relationship</span></td>

    <td class='fourths'>Phone Number: <br/> <span class='info1'>$alt_phone</span></td>

  </tr>

  <tr>

    <td class='fourths'>Date of Birth: <br/> <span class='info1'>$date_of_birth</span></td>

    <td class='fourths'>Gender: <br/> <span class='info1'>$gender</span></td>

    <td colspan='2' class='halves'>Ethnic Background <br/> <span class='info1'>$ethnic</span></td>

  </tr>

  <tr>

    <td class='fourths'>Have you ever been convicted of or have pleaded guilty to any crime? <br/> <span class='info1'>$convicted_of_crime</span></td>

    <td colspan='3' class='thirds'>If yes, please explain: <br/><span class='info2'>$crime_explanation</span></td>



 

  </tr>

  <tr>

    <td class='fourths' >Condition of Health - Special Health Requirements - Any Physical Problems:</td>

    <td colspan='3' id='info_health'>$health</td>

  </tr>

  <tr>

    <td colspan='2' class='halves'>Known Allergies: <br/><span class='info2'>$allergies</span></td>

    <td class='fourths'>Are you a US Veteran? <br/><span class='info1'>$veteran</span></td>

    <td class='fourths'>Are you a US Citizen? <br/><span class='info1'>$citizenship</span></td>



  </tr>



</table>



<table width='800' border='0' cellspacing='0' cellpadding='0' id='program_info'>
  <tr>
    <td colspan='6' class='form_header'>Program of Interest:</td>

  </tr>
  <tr>
    <td  >
	<table  border='0' cellspacing='0' cellpadding='0' >
    <tr><td class='program_1'>";
	
	if ($program == 'Biomedical Equipment Technology'){
		$body.= "X";
	}
	
	$body.= "</td><td class='program_2' >Biomedical Equipment Tech.</td><td class='program_3'>";
	
	if ($program == 'Electronic Engineering Technology'){
		$body.= "X";
	}
	
	$body.= "</td><td class='program_4' >Electronic Engineering Tech.</td><td class='program_5'>";
	
	if ($program == 'Multimedia Graphic Design'){
		$body.= "X";
	}
	
	$body.= "</td><td class='program_6' >Multimedia Graphic Design</td></tr><tr><td class='program_1'>";
	
	if ($program == 'Business Office Professional'){
		$body.= "X";
	}
	
	$body.= "</td><td class='program_2' >Business Office Prof.</td><td class='program_3'>";
	
	if ($program == 'Electronics Technician'){
		$body.= "X";
	}
	
	$body.= "</td><td class='program_4' >Electronics Technician</td><td class='program_5'>";
	
	if ($program == 'Network & Database Professional'){
		$body.= "X";
	}
	
	$body.= "</td><td class='program_6' >Network & Database Prof.</td></tr><tr><td class='program_1'>";
	
	if ($program == 'CNC / Machinist Technician'){
		$body.= "X";
	}
	
	$body.= "</td><td class='program_2' >CNC Machinist Technician</td><td class='program_3'>";
	
	if ($program == 'Industrial Automation & Robotics Technology'){
		$body.= "X";
	}
	
	$body.= "</td><td class='program_4' >Ind. Auto. & Robotics Tech.</td><td class='program_5'>";
	
	if ($program == 'RHVAC Technology'){
		$body.= "X";
	}
	
	$body.= "</td><td class='program_6' >RHVAC Technology</td></tr><tr><td class='program_1'>";
	
 	if ($program == 'Electrician'){
		$body.= "X";
	}
	
	$body.= "</td><td class='program_2' >Electrician</td><td class='program_3'>";
	
	if ($program == 'Maintenance Technician'){
		$body.= "X";
	}
	
	$body.= "</td><td class='program_4' >Maintenance Technician</td><td class='program_5'>";
	
	if ($program == 'Welding Technology'){
		$body.= "X";
	}
	
	$body.= "</td><td class='program_6' >Welding Technology</td></tr></table>";
	

  $body.= "</tr>
  <tr>
    <td colspan='6' class='singles'><br/>When would you like to begin your training? <br/><span class='info1'>$time</span></td>

  </tr>
</table>









<table width='800' border='0' cellspacing='0' cellpadding='0' id='education_info'>

  <tr>

    <td colspan='4' class='form_header'>Education Information</td>



  </tr>

  <tr>

    <td class='fourths'>HS Diploma:";

	

	if (isset ($diploma_completed)){

		$body.="<br/><span class='info1'>Yes</span>";

	}

	

	$body.="</td>

    <td class='fourths'>Year Graduated: <br/><span class='info1'>$diploma_completed</span></td>

    <td class='fourths'>High School: <br/><span class='info1'>$hs_name</span></td>

    <td class='fourths'>City/State: <br/><span class='info1'>$hs_city_state</span></td>

  </tr>

  <tr>

    <td class='fourths'>GED:";

	

	if (isset ($ged_completed)){

		$body.="<br/><span class='info1'>Yes</span>";

	}

	

	$body.="</td>

    <td class='fourths'>Year Graduated: <br/><span class='info1'>$ged_completed</span></td>

    <td colspan='2' class='halves'>State In Which Exam Was Taken: <br/><span class='info1'>$ged_state</span></td>



  </tr>

</table>

<h2>Beginning immediately after High School, list all other training you have started and/or completed, including college / trade / business schools.</h2>

<table width='800' border='1' cellspacing='0' cellpadding='0'>

  <tr>

    <td class='halves'>1. School Name, City & State: <br/><span class='info2'>$post_school_1 - $post_school_1_city</span></td>

    <td class='fourths'>Year Attend/Graduated: <span class='info2'>$post_school_1_year</span><br/>Graduated?";

	

	if (isset($post_school_1_graduated)){

			  $body.="<span class='info1'>Yes</span>";

			  }

			  

			  $body.="

			  </td>

    <td class='fourths'>Program of Study, Type of degree or diploma earned: <span class='info2'>$post_school_1_description</span></td>

  </tr>

  <tr>

    <td class='halves'>2. School Name, City & State: <br/><span class='info2'>$post_school_2 - $post_school_2_city</span></td>

    <td class='fourths'>Year Attend/Graduated: <span class='info2'>$post_school_2_year</span><br/>Graduated?";

	

	if (isset($post_school_2_graduated)){

			  $body.="<span class='info1'>Yes</span>";

			  }

			  

			  $body.="

			  </td>

    <td class='fourths'>Program of Study, Type of degree or diploma earned: <span class='info2'>$post_school_2_description</span></td>

  </tr>

  <tr>

    <td class='halves'>3. School Name, City & State: <br/><span class='info2'>$post_school_3 - $post_school_3_city</span></td>

    <td class='fourths'>Year Attend/Graduated: <span class='info2'>$post_school_3_year</span><br/>Graduated?";

	

	if (isset($post_school_3_graduated)){

			  $body.="<span class='info1'>Yes</span>";

			  }

			  

			  $body.="</td>

    <td class='fourths'>Program of Study, Type of degree or diploma earned: <span class='info2'>$post_school_3_description</span></td>

  </tr>

</table><br />

<h2>Employment History - Please list job experience, starting with the most recent job first.</h2>

<table width='800' border='0' cellspacing='0' cellpadding='0' id='education_info'>

  <tr>

    <td class='form_header'><span class='head_text'>Employer Name & Address</span></td>

    <td  class='form_header'><span class='head_text'>Position Held</span></td>

    <td colspan='2' class='form_header'><span class='head_text'>Length</span></td>

  </tr>

  <tr>

    <td class='halves' ><span class='info1'>$employment_1</span></td>

    <td class='fourths'><span class='info1'>$position_1</span></td>

    <td class='eigths'>From: <span class='info1'>$date_from_1</span></td>

    <td class='eigths'>To: <span class='info1'>$date_to_1</span></td>

  </tr>

  <tr>

    <td class='halves' ><span class='info1'>$employment_2</span></td>

    <td class='fourths'><span class='info1'>$position_2</span></td>

    <td class='eigths'>From: <span class='info1'>$date_from_2</span></td>

    <td class='eigths'>To: <span class='info1'>$date_to_2</span></td>

  </tr>

    <tr>

  <td class='halves' ><span class='info1'>$employment_3</span></td>

    <td class='fourths'><span class='info1'>$position_3</span></td>

    <td class='eigths'>From: <span class='info1'>$date_from_3</span></td>

    <td class='eigths'>To: <span class='info1'>$date_to_3</span></td>

  </tr>

</table><br/>

<h2>References</h2>

<table width='800' border='0' cellspacing='0' cellpadding='0' id='references'>

  <tr>

    <td class='form_header'>Name</td>

    <td class='form_header'>Address</td>

    <td class='form_header'>City, State, Zip</td>

    <td class='form_header'>Phone #</td>

    <td class='form_header'>Relationship</td>

  </tr>

  <tr>

    <td class='fourths'><span class='info1'>$reference_1</span></td>

    <td class='fourths'><span class='info1'>$reference_address_1</span></td>

    <td class='fourths'><span class='info1'>$reference_city_1 - $reference_zipcode_1</span></td>

    <td class='eigths'><span class='info1'>$reference_phone_1</span></td>

    <td class='eigths'><span class='info1'>$reference_relationship_1</span></td>

  </tr>

  <tr>

    <td class='fourths'><span class='info1'>$reference_2</span></td>

    <td class='fourths'><span class='info1'>$reference_address_2</span></td>

    <td class='fourths'><span class='info1'>$reference_city_2 -$reference_zipcode_2</span></td>

    <td class='eigths'><span class='info1'>$reference_phone_2</span></td>

    <td class='eigths'><span class='info1'>$reference_relationship_2</span></td>

  </tr>

  <tr>

    <td class='fourths'><span class='info1'>$reference_3</span></td>

    <td class='fourths'><span class='info1'>$reference_address_3</span></td>

    <td class='fourths'><span class='info1'>$reference_city_3 - $reference_zipcode_3</span></td>

    <td class='eigths'><span class='info1'>$reference_phone_3</span></td>

    <td class='eigths'><span class='info1'>$reference_relationship_3</span></td>

  </tr>

</table>

<p class='disclaimer'>As part of the admission requirements, there is a .00 Application Fee due when you apply. The Application Fee is refundable if requested in writing within 60 days fo the submitted Application for Admission if the applicant decides not to attend, or is not accepted.<br/>

Applicants must complete a High School Transcript and / or a GED Transcript release form. An exam will be given to determine the students reading level; consult the catalog for minimum program reading levels.</p>

<p class='disclaimer'>*If you opted-in to receive SMS / Text messages on your cell phone, it will only be used to send you communication pertaining to your enrollment. Please be aware your cell phone carrier may charge a fee for delivery of messages based on your current calling plan. Your number will not be given to any third party. You may opt-out in writing at any time.</p>

<p class='disclaimer'>Class sizes are limited to a maximum number of students per program and will be closed to enrollment when that number is reached. Enrollment is granted on a first-come first-serve bases only to registered applicants who have completed all admission requirements. Applicants who have not become enrolled in a class that has been closed have the option to register for a future class.</p>

<p class='disclaimer'>I authorize investigation of all statements contained in this application. I understand that misrepresentation or omission of facts called for is cause for rejection of this application or dismissal, if enrolled.</p>

<p>

<table width='800' border='0' cellspacing='0' cellpadding='0'>

  <tr>

    <td>___________________________________________________<br /> <h3>Signature of Applicant</h3></td>

    <td>_________________________________<br /> <h3>Date</h3></td>

  </tr>

</table>



<table width='800' border='1' cellspacing='0' cellpadding='0'>

  <tr>

    <td width='616' id='bottom_box'><strong>FOR OFFICE USE ONLY</strong><br />

    Interviewed by ________________&nbsp;&nbsp;&nbsp;Date of Application&nbsp;&nbsp;_______________&nbsp;&nbsp;&nbsp;Tour? Y / N<br />

    Program ____________________&nbsp;&nbsp;&nbsp;___Day ___Afternoon ___ Eve.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___Full-time ___Part-time<br />

    Start Date ___________________&nbsp;&nbsp;&nbsp;End Date ______________<br />

    FA Interview Date _____________&nbsp;&nbsp;&nbsp;Time ______________<br />

    Comments:</td>

    <td width='178' id='bottom_box_right'><strong>Office Use Only</strong><br />

    <strong>Application Fee</strong><br />

    Date ______ $_______<br />

    Receipt# ___________<br />

    <span class='bottom_box_small'>___Cash ___Check ___MO<br />

    ___MC ___Visa ___Disc.</span><br />

    <strong>Registration Pmt.</strong><br />

      Date ______ $_______<br />

    Receipt# ___________<br />

    <span class='bottom_box_small'>___Cash ___Check ___MO<br />

    ___MC ___Visa ___Disc.</span><br />

    <strong>Transcript/GED. Pmt.</strong><br />

      Date ______ $_______<br />

    Receipt# ___________<br />

    <span class='bottom_box_small'>___Cash ___Check ___MO<br />

    ___MC ___Visa ___Disc.</span><br />

    </td>

  </tr>

</table>";



//CONSTRUCT TEXT EMAIL BODY



$body_notags ="



<style type='text/css'>

body, td {

font-family: Verdana, Arial, Helvetica, sans-serif;

font-size: 10pt;

}



</style>



<table cellpadding='10'><tr >



<td ><strong>Personal Information</strong><hr /></td>



</tr><tr>



<td  >First Name:</td>

<td> $first_name </td>



</tr><tr>



<td  >Middle Initial:</td>

<td> $middle_initial </td>



</tr><tr>



<td  >Last Name:</td>

<td> $last_name </td>



</tr><tr>



<td  >Address:</td>

<td> $address, $city, $state  $zip</td>



</tr><tr>



<td  >Home Phone:</td>

<td> $home_phone </td>



</tr><tr>



<td  >Cell Phone:</td>

<td> $cell_phone </td>



</tr><tr>



<td  >Work Phone:</td>

<td> $work_phone </td>



</tr><tr>



<td  >Email:</td>

<td> $email </td>



</tr><tr>



<td  >Program:</td>

<td> $program </td>



</tr><tr>



<td  >Time:</td>

<td> $time </td>



</tr><tr>



<td  >Date of Birth:</td>

<td> $date_of_birth </td>



</tr><tr>



<td  >Driver's Licence Number:</td>

<td> $drivers_license </td>



</tr><tr>



<td  >Gender:</td>

<td> $gender </td>



</tr><tr>



<td  >Ethnicity:</td>

<td> $ethnic </td>



</tr><tr>



<td  >Veteran Status:</td>

<td> $veteran </td>



</tr><tr>



<td  >Citizenship:</td>

<td> $citizenship </td>



</tr><tr>



<td  >Alternate Contact:</td>

<td> $alt_contact_name </td>



</tr><tr>



<td  >Relationship:</td>

<td> $relationship </td>



</tr><tr>



<td  >Phone Number:</td>

<td> $alt_phone </td>



</tr><tr>

</tr><tr>



<td ><strong>Health and Background Information</strong><hr /></td>



</tr><tr>



<td  >Convicted of a Crime?:</td>

<td> $convicted_of_crime </td>



</tr><tr>



<td  >Explanation of Crime:</td>

<td> $crime_explanation </td>



</tr><tr>

</tr><tr>



<td  >Health:</td>

<td> $health </td>



</tr><tr>



<td  >Allergies:</td>

<td> $Allergies </td>



</tr><tr>

</tr><tr>



<td ><strong>Education Information</strong><hr /></td>



</tr><tr>



<td  >GED?:</td>

<td> $ged_completed </td>



</tr><tr>



<td  >State in which completed?:</td>

<td> $ged_completed </td>



</tr><tr>



<td  >High School Diploma?:</td>

<td> $ged_completed </td>



</tr><tr>



<td  >Name of High School:</td>

<td> $hs_name </td>



</tr><tr>



<td  >High School City - State:</td>

<td> $hs_city_state </td>



</tr><tr>

</tr><tr>";



if (isset($post_school_1))



{



$body_notags.= "

<td  >Secondary School:</td>

<td> $post_school_1 </td>



</tr><tr>



<td  >Year Attended / Graduated:</td>

<td> $post_school_1_year </td>



</tr><tr>



<td  >Program of Study - Type of Degree:</td>

<td> $post_school_1_description </td>



</tr><tr>

</tr><tr>



<td  >Secondary School:</td>

<td> $post_school_2 </td>



</tr><tr>



<td  >Year Attended / Graduated:</td>

<td> $post_school_2_year </td>



</tr><tr>



<td  >Program of Study - Type of Degree:</td>

<td> $post_school_2_description </td>



</tr><tr>

</tr><tr>



<td  >Secondary School:</td>

<td> $post_school_3 </td>



</tr><tr>



<td  >Year Attended / Graduated:</td>

<td> $post_school_3_year </td>



</tr><tr>



<td  >Program of Study - Type of Degree:</td>

<td> $post_school_3_description </td>



</tr><tr>";



}



if (isset($employment_1)){



$body_notags.="

<td ><strong>Employment Information</strong><hr /></td>



</tr><tr>



<td  >Employer Name - Address:</td>

<td> $employment_1 </td>



</tr><tr>



<td  >Position Held:</td>

<td> $position_1 </td>



</tr><tr>



<td  >Worked From - To:</td>

<td> $date_from_1 - $date_to_1 </td>



</tr><tr>

</tr><tr>



<td  >Employer Name - Address:</td>

<td> $employment_2 </td>



</tr><tr>



<td  >Position Held:</td>

<td> $position_2 </td>



</tr><tr>



<td  >Worked From - To:</td>

<td> $date_from_2 - $date_to_2 </td>



</tr><tr>

</tr><tr>



<td  >Employer Name - Address:</td>

<td> $employment_3 </td>



</tr><tr>



<td  >Position Held:</td>

<td> $position_3 </td>



</tr><tr>



<td  >Worked From - To:</td>

<td> $date_from_3 - $date_to_3 </td>



</tr><tr>";



}



if(isset($reference_1)){

	

$body_notags.="



<td ><strong>Reference Information</strong><hr /></td>



</tr><tr>



<td  >Name - Relationship:</td>

<td> $reference_1 </td>



</tr><tr>



<td  >Address:</td>

<td> $reference_address_1 </td>



</tr><tr>



<td  >Phone:</td>

<td> $reference_phone_1 </td>



</tr><tr>

</tr><tr>



<td  >Name - Relationship:</td>

<td> $reference_2 </td>



</tr><tr>



<td  >Address:</td>

<td> $reference_address_2 </td>



</tr><tr>



<td  >Phone:</td>

<td> $reference_phone_2 </td>



</tr><tr>

</tr><tr>



<td  >Name - Relationship:</td>

<td> $reference_3 </td>



</tr><tr>



<td  >Address:</td>

<td> $reference_address_3 </td>



</tr><tr>



<td  >Phone:</td>

<td> $reference_phone_3 </td>";



}



$body_notags.="



</tr></table>";







//

if (isset($_COOKIE["goerie"]))

{

	$messageSubject = "Erie Institute of Technology - Online Application - $first_name $last_name - From goerie.com";
	
	}elseif (isset($_COOKIE["reachlocal_display"])){

$messageSubject = "Erie Institute of Technology - Online Application - $first_name $last_name - From REACH LOCAL DISPLAY";

	}elseif (isset($_COOKIE["reachlocal"])){

$messageSubject = "Erie Institute of Technology - Online Application - $first_name $last_name - From REACH LOCAL PPC";



} else {

$messageSubject = "Erie Institute of Technology - Online Application - $first_name $last_name";

}

			$mail = new htmlMimeMail();



			$mail->setHtml($body, $body_notags);

			

			$mail->setReturnPath('info@erieit.edu');



			$mail->setFrom('apply_online@erieit.edu');



			$mail->setSubject($messageSubject);



			$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');

			

			//SEND TO BELOW /

			

			if (isset($_COOKIE["goerie"]))

{

			if($mail->send(array('info@glit.edu', 'jonm@glit.edu', 'ashleyd@glit.edu'), 'mail')){

				

				print "<h1>Thank you for Submitting an Application!</h1>";



			}else{



				print "<h1>An error has occured!</h1>";



				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}
			
			}elseif (isset($_COOKIE["reachlocal_display"])){

	

	if($mail->send(array('info@glit.edu', 'jonm@glit.edu', 'ashleyd@glit.edu'), 'mail')){

				

				print "<h1>Thank you for Submitting an Application!</h1>";



			}else{



				print "<h1>An error has occured!</h1>";



				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}

			

}elseif (isset($_COOKIE["reachlocal"])){

	

	if($mail->send(array('info@glit.edu', 'jonm@glit.edu', 'ashleyd@glit.edu'), 'mail')){

				

				print "<h1>Thank you for Submitting an Application!</h1>";



			}else{



				print "<h1>An error has occured!</h1>";



				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}
			
			

			

}else{

	

	if($mail->send(array('info@glit.edu', 'ashleyd@glit.edu'), 'mail')){

				

				print "<h1>Thank you for Submitting an Application!</h1>";



			}else{



				print "<h1>An error has occured!</h1>";



				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}

}



}else{

	



				print "



						<h2>Enrollment Application</h2>



<hr />



 <ul>

                  <li>To determine whether you can gain from our course of study, we ask that you answer the questions on this form. Please answer all questions as                    fully as you can. All information will be held in strict confidence and will be used to determine your aptitude for a technology career. Upon

                    graduation, information on this form may assist with placement.</li>

                  <li>Admissions requirements/criteria are listed in the School Catalog.</li>

                  <li>EIT does not discriminate against any person because of race, color, religion, sex, disabilities, age, national origin, or ancestry regarding 	admission to programs or placement activities.</li>

                  </ul>



<br />";







//SEND TO danb@glit.edu

//<form name='form_step_1' id='form_step_1' action='step two/index2.php' method='post'>

		print "<form action='' method='post' name='final' id='final'>

			



				<table cellpadding='3' cellspacing='3'>



					<tr>



						<td colspan='4'><h3>Personal Information</h3><hr /></td>



					</tr>";



			/******/



				print "<tr>



							<th><span class='star_required'>*</span>First Name</th>



							<td><input type='text' name='first_name' value='$first_name' size='20' /></td>

							

							<th><span class='star_required'>*</span>Last Name</th>



							<td><input type='text' name='last_name' value='$last_name' size='20' /></td>



						</tr>";



			/******/



				print "<tr>



							<th>Middle Initial</th>



							<td><input type='text' name='middle_initial' value='$middle_initial' size='20'  /></td>

							

							<th>Maiden Name</th>



							<td><input type='text' name='maiden_name' value='$maiden_name' size='20'  /></td>



						</tr>";



			/******/





				print "<tr>



							<th><span class='star_required'>*</span>Address</th>



							<td><input type='text' name='address' value='$address'  size='20' /></td>

							

							<th><span class='star_required'>*</span>City</th>



							<td><input type='text' name='city' value='$city'  size='20' /></td>



						</tr>";



			/******/





				print "<tr>



							<th><span class='star_required'>*</span>State</th>



							<td><input type='text' name='state' value='$state'  size='15' /></td>

							

							<th>Zipcode</th>



							<td><input type='text' name='zip' value='$zip'  size='15' /></td>



						</tr>";



			/******/



				print "<tr>



							<th><span class='star_required'>*</span>Home Phone</th>



							<td><input type='text' name='home_phone' value='$home_phone' size='15' /></td>

							

							<th>Cell Phone</th>



							<td><input type='text' name='cell_phone' value='$cell_phone' size='15' /></td>

							



						</tr>";





			/******/

			

					print "<tr>



							<th>Work Phone</th>



							<td><input type='text' name='work_phone' value='$work_phone' size='15' /></td>



						</tr>";



			/******/

			

				print "<tr>



							<th>May we contact you at work?</th>



							<td><select name='work_contact'><option value ='No'>No</option><option value='Yes'>Yes</option></select></td>

							

							<th>May we text your cell phone?</th>



							<td><select name='text_message'><option value ='No'>No</option><option value='Yes'>Yes</option></select></td>



						</tr>";



			/******/



				

				print "<tr>



							<th><span class='star_required'>*</span>Email Address</th>



							<td><input type='text' name='email' value='$email' size='20' /></td>

							

							<th>Date of Birth</th>



							<td><input type='text' name='date_of_birth' value='$date_of_birth' size='20' /></td>



						</tr>";



			/******/

			

							print "<tr>



							<th>Driver's License #</th>



							<td><input type='text' name='drivers_license' value='$drivers_license' size='20' /></td>

							

							<th>Driver's License State</th>



							<td><input type='text' name='drivers_license_state' value='$drivers_license_state' size='20' /></td>



						</tr>";



			/******/

			

			print "<tr>



							<th>Gender</th>



							<td><select name='gender'><option value ='Male'>Male</option><option value='Female'>Female</option></select></td>

							

							<th>Ethnic</th>



							<td><select name='ethnic'><option value ='caucasian'>Caucasian</option><option value='African American'>African American</option><option value='asian'>Asian</option><option value='hispanic'>Hispanic</option><option value='native american'>Native American</option></select></td>



						</tr>";



			/******/

			

			print "<tr>



							<th>Veteran?</th>



							<td><select name='veteran'><option value='no'>No</option><option value ='yes'>Yes</option></select></td>

							

							<th>Citizenship</th>



							<td><select name='citizenship'><option value ='us'>US Citizen</option><option value='not us'>Not a US Citizen</option><option value='green card'>I-551 Green Card</option></select></td>



						</tr>";



			/******/

			

			print "<tr>



							<th>Alt. Contact Name</th>



							<td><input type='text' name='alt_contact_name' value='$alt_contact_name' size='20' /></td>

							

							<th>Relationship</th>



							<td><input type='text' name='relationship' value='$relationship' size='20' /></td>



						</tr>";



			/******/

			

			print "<tr>



							<th>Alt. Phone</th>



							<td><input type='text' name='alt_phone' value='$alt_alt_phone' size='20' /></td>

							

							</tr>

							

							</table><p><p>";

							

			/******/

			

			print "<table><tr><td colspan='2'><h3>Background and Health</h3><hr /></td></tr><tr>



							<th>Have you ever been convicted or pleaded guilty to a crime?</th>



							<td><select name='convicted_of_crime'><option value='no'>No</option><option value ='yes'>Yes</option></select></td>

							

							</tr>";

							

							

			/******/

			

			print "<tr>



							<th>If yes, please explain:</th>



							<td><textarea rows='2' cols='28' name='crime_explanation' value='$crime_explanation' /></textarea></td>

							

							</tr>";

							

							

			/******/

			

				print "<tr>



							<th>Condition of Health: Please explain any special health requirements or any physical problems?</th>



							<td><textarea rows='2' cols='28' name='health' value='$health' /></textarea></td>

							

							</tr>";

							

							

			/******/

			

			print "<tr>



							<th>List known allergies.</th>



							<td><textarea rows='2' cols='28' name='allergies' value='$allergies' /></textarea></td>

							

							</tr></table><p><p>";

							

							

			/******/

			

			print "<table><tr><td colspan='3'><h3>Program of Interest</h3><hr /></td></tr><tr>



							<th>I am applying for:</th>

							

							<td><select name='program'>";

							

							$program_list = array("Biomedical Equipment Technology",



									  "Business Office Professional",



									  "CNC / Machinist Technician",

									  

									  "Electrician",



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

									print "<option value='".$program_list[$i]."'>".$program_list[$i]."</option>";

								}

								

								print "</select></td>

								

								<td><select name='time'><option value='day'>Day Time</option><option value='night'>Night Time</option></select></td>

								

								</tr>

								

								<th>When would you like to begin?</th>

							

							<td><select name='desired_start'>

									<option value='unsure'>Unsure</option>

									<option value='ASAP'>As Soon as Possible</option>

									<option value='within_6_months'>Within 6 Months</option>

									<option value='within_1_year'>Within 1 Year</option>

									<option value='more_than_1_year'>More Than 1 Year</option>

								</select></td>

								

								</tr>

								

								

								</table><p><p>";



							

							

			/******/

			

			print "<table><tr ><td colspan='4'><h3>Education Information</h3><hr /></td></tr><tr>



							<th>GED - Year Completed</th>

							

							<td ><input type='text' name='ged_completed' value='$ged_completed' size='20' /></td>

							

							<th>State Where Completed</th>

							

							<td><input type='text' name='ged_state' value='$ged_state' size='20' /></td>

							

							</tr>";

							

							

			/******/

			

				

			

			print "<tr>

			

							<th>High School Diploma - Year Graduated:</th>

							

							<td><input type='text' name='diploma_completed' value='$diploma_completed' size='20' /></td>

							

							

							</tr>

							

							<tr>

			

							<th>High School Name</th>

							

							<td><input type='text' name='hs_name' value='$hs_name' size='20' /></td>

							

							<th>City / State</th>

							

							<td><input type='text' name='hs_city_state' value='$hs_city_state' size='20' /></td>

							

							

							</tr></table><br/>";

			

			

			/******/

			

			print "<table><tr>

			

							<th colspan='3' style='text-align:center;'>Beginning immediately after high school, list all other training you have started and/or completed, including college, trade, or business schools: </th>				

							

							</tr><tr><td><p></td></tr>

							

							<tr>			

							<td >School Name</td><td >City, State</td><td >Program of Study, type of degree earned:</td>				

							</tr>

							

							<tr>			

							<td ><input type='text' name='post_school_1' value='$post_school_1' size='26'></input></td>

							<td><input type='text' name='post_school_1_city' value='$post_school_1_year' size='15'></input></td>

							<td><input type='text' name='post_school_1_description' value='$post_school_1_description' size='20'></input></td>									

							</tr>

							

							<tr>			

							<td >Years Attended</td><td >Did You Graduate</td><td ></td>				

							</tr>

							

							<tr>

							<td><input type='text' name='post_school_1_year' value='$post_school_1_year' size='26'></input>

							<td>Yes?<input type='checkbox' name='graduated_1' value='Yes' size='15'/></td>

							</tr>

							

							<tr>			

							<td colspan='3'><hr/></td>				

							</tr>

							

							<tr>			

							<td >School Name</td><td >City, State</td><td >Program of Study, type of degree earned:</td>				

							</tr>

							

							<tr>			

							<td ><input type='text' name='post_school_2' value='$post_school_2' size='26'></input></td>

							<td><input type='text' name='post_school_2_city' value='$post_school_2_year' size='15'></input></td>

							<td><input type='text' name='post_school_2_description' value='$post_school_2_description' size='20'></input></td>									

							</tr>

							

							<tr>			

							<td >Years Attended</td><td >Did You Graduate</td><td ></td>				

							</tr>

							

							<tr>

							<td><input type='text' name='post_school_2_year' value='$post_school_2_year' size='26'></input>

							<td>Yes?<input type='checkbox' name='graduated_2' value='Yes' size='15'/></td>

							</tr>

							

							<tr>			

							<td colspan='3'><hr/></td>				

							</tr>

							

							<tr>			

							<td >School Name</td><td >City, State</td><td >Program of Study, type of degree earned:</td>				

							</tr>

							

							<tr>			

							<td ><input type='text' name='post_school_3' value='$post_school_3' size='26'></input></td>

							<td><input type='text' name='post_school_3_city' value='$post_school_3_year' size='15'></input></td>

							<td><input type='text' name='post_school_3_description' value='$post_school_3_description' size='20'></input></td>									

							</tr>

							

							<tr>			

							<td >Years Attended</td><td >Did You Graduate</td><td ></td>				

							</tr>

							

							<tr>

							<td><input type='text' name='post_school_3_year' value='$post_school_3_year' size='26'></input>

							<td>Yes?<input type='checkbox' name='graduated_3' value='Yes' size='15'/></td>

							</tr>

							

							</table><p><p>";

			

			

			

			/******/			

			

			print "<table><tr>

			

							<td colspan='4'><h3>Employment History</h3><hr /></td>				

							

							</tr><tr><th colspan='4' style='text-align:center;'>Please list job experience, starting with the most recent job first.</th>	</tr>

							

							<tr>

			

							<td >Employer Name & Address</td><td >Position Held</td><td >From (date)</td><td >To (date)</td>			

							

							</tr>

							

							<tr>

			

							<td >1. <input type='text' name='employment_1' value='$employment_1' size='26'></input></td>

							<td><input type='text' name='position_1' value='$position_1' size='20'></input></td>

							<td><input type='text' name='date_from_1' value='$date_from_1' size='6'></input></td>	

							<td><input type='text' name='date_to_1' value='$date_to_1' size='6'></input></td>	

							

							</tr>

							

							<tr>

			

							<td >2. <input type='text' name='employment_2' value='$employment_2' size='26'></input></td>

							<td><input type='text' name='position_2' value='$position_2' size='20'></input></td>

							<td><input type='text' name='date_from_2' value='$date_from_2' size='6'></input></td>		

							<td><input type='text' name='date_to_2' value='$date_to_2' size='6'></input></td>	

							

							</tr>

							

							<tr>

			

							<td >3. <input type='text' name='employment_3' value='$employment_3' size='26'></input></td>

							<td><input type='text' name='position_3' value='$position_3' size='20'></input></td>

							<td><input type='text' name='date_from_3' value='$date_from_3' size='6'></input></td>	

							<td><input type='text' name='date_to_3' value='$date_to_3' size='6'></input></td>	

							

							</tr></table><p><p>";

			

			

			

			/******/

			

			print "<table><tr>

			

							<td colspan='3'><h3>References</h3><hr /></td>				

							

							</tr>

							

							<tr>			

							<td >Name</td><td >Address</td><td >City, State</td>			

							</tr>

							

							<tr>

							<td ><input type='text' name='reference_1' value='$reference_1' size='26'></input></td>

							<td><input type='text' name='reference_address_1' value='$reference_address_1' size='26'></input></td>

							<td><input type='text' name='reference_city_1' value='$reference_city_1' size='12'></input></td>

							</tr>

							

							<tr>		

							<td >Phone #</td><td >Relationship</td><td >Zip Code</td>				

							</tr>

							

							<tr>

							<td><input type='text' name='reference_phone_1' value='$reference_phone_1' size='26'></input></td>

							<td><input type='text' name='reference_relationship_1' value='$reference_relationship_1' size='26'></input></td>

							<td><input type='text' name='reference_zipcode_1' value='$reference_zipcode_1' size='26'></input></td>

							</tr>

							

							<tr><td colspan='3'><hr/></td></tr>

							

							<tr>			

							<td >Name</td><td >Address</td><td >City, State</td>			

							</tr>

							

							<tr>

							<td ><input type='text' name='reference_2' value='$reference_2' size='26'></input></td>

							<td><input type='text' name='reference_address_2' value='$reference_address_2' size='26'></input></td>

							<td><input type='text' name='reference_city_2' value='$reference_city_2' size='12'></input></td>	

							</tr>

							

							<tr>

							<td >Phone #</td><td >Relationship</td><td >Zip Code</td>			

							</tr>

							

							<tr>

							<td><input type='text' name='reference_phone_2' value='$reference_phone_2' size='26'></input></td>

							<td><input type='text' name='reference_relationship_2' value='$reference_relationship_2' size='26'></input></td>

							<td><input type='text' name='reference_zipcode_2' value='$reference_zipcode_2' size='26'></input></td>

							</tr>

							

							<tr><td colspan='3'><hr/></td></tr>

							

							<tr>			

							<td >Name</td><td >Address</td><td >City, State</td>			

							</tr>

							

							<tr>

							<td ><input type='text' name='reference_3' value='$reference_3' size='26'></input></td>

							<td><input type='text' name='reference_address_3' value='$reference_address_3' size='26'></input></td>

							<td><input type='text' name='reference_city_3' value='$reference_city_3' size='12'></input></td>

							</tr>

							

							<tr>

							<td >Phone #</td><td >Relationship</td><td >Zip Code</td>			

							</tr>

							

							<tr>



							<td><input type='text' name='reference_phone_3' value='$reference_phone_3' size='26'></input></td>

							<td><input type='text' name='reference_relationship_3' value='$reference_relationship_3' size='26'></input></td>

							<td><input type='text' name='reference_zipcode_2' value='$reference_zipcode_2' size='26'></input></td>

							</tr>

							

							</table><p><p>";

			

			

			

			/******/

			

			print "<table><tr>

			

							<td ><hr /><h3>Disclaimer</h3></td>				

							

							</tr>

							

							<tr>

			

							<td >As part of the admission requirements, there is a  Application Fee due when you apply. The Application Fee is refundable if requested in writing within 60 days of the submitted Application for Admission if the applicant decides not to attend, or is not accepted.<p>



Applicants must complete a High School Transcript and/or a GED Transcript release form. An exam will be given to determine the student's reading grade level; consult the Catalog for minimum program reading levels.<p>



Class sizes are limited to a maximum number of students per program and will be closed to enrollment when that number is reached. Enrollment is granted on a first-come first-serve basis only to registered applicants who have completed all admission requirements. Applicant who have not become enrolled in a class that has been closed have the option to register for a future class.<p><hr /></td>	

							

							</tr></table>";

			

			

			

			/******/





			



			/******/



					

					

				print "<tr>



						<td colspan='2' align='right'><br/><input";?> onclick="track_apply_online();" <? print " type='submit' name='submit_application' value='Submit Request' /></td>



					</tr>



				</table>



			</form>



			<script type='text/javascript'>new FormValidator ('final');</script>



		";

		}



print "



					</td>



				</tr>



			</table>";

               

          ?>






					</td>

				</tr>

			</table><br clear="all" />
		</div>
    <div id="content2">
	      <? include('global_includes/footer.php'); ?>
    </div>
	</body>

</html>





