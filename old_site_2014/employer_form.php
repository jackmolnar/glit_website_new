<?php

	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "_admin/class/class_config.php";

		include "_admin/class/class_db.php";

		include "_admin/class/class_time.php";

include "global_includes/mimemail/htmlMimeMail.php";

$depth_to_leads = '../../glit.edu/html/';

if($_REQUEST['submit_application']){
include ($depth_to_leads.'leads/global_includes/connect.php');
include ($depth_to_leads.'leads/global_includes/functions.php');
}

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

		<title>Position Submission Form | Erie Institute of Technology</title>

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
                            
                           <? include('global_includes/placement_menu.php'); ?>
                            
                            
                            </ul>

						</div>

					</td>

					<td id="rightcontent">
                    
                    
                    

						<?



	if($_REQUEST['submit_application']){

		$company_name = $_REQUEST['company_name'];
		$mailing_address = $_REQUEST['mailing_address'];
		$street_address = $_REQUEST['street_address'];
		$city = $_REQUEST['city'];
		$state = $_REQUEST['state'];
		$zip = $_REQUEST['zip'];
		$name = $_REQUEST['name'];
		$title = $_REQUEST['title'];
		$phone = $_REQUEST['phone'];	
		$fax = $_REQUEST['fax'];
		$email = $_REQUEST['email'];
		$job_title = $_REQUEST['job_title'];
		$job_description = $_REQUEST['job_description'];	
		$skills_required = $_REQUEST['skills_required'];
		$benefits = $_REQUEST['benefits'];
		$salary = $_REQUEST['salary'];
		$number_of_pos = $_REQUEST['number_of_pos'];
		$hours_per_week = $_REQUEST['hours_per_week'];	
		$schedule = $_REQUEST['schedule'];
		$shift = $_REQUEST['shift'];
		$preferred_format = $_REQUEST['preferred_format'];
		//$school = 3;


		//
		//PUT DATA INTO THE DATABASE
		//include ($depth_to_leads.'leads/global_includes/req_more_info_dump.php');
		
		//
	
//
		//If email is send, include the responder info
		//include ('global_includes/responder.php');



//CONSTRUCT HTML EMAIL BODY





$body = "



<table ><tr >

<td width='125' height='25'><strong>Company Name</strong>:</td><td> $company_name </td>

</tr><tr>

<td width='125' height='25'><strong>Mailing Address</strong>:</td><td> $mailing_address </td>

</tr><tr>

<td width='125' height='25'><strong>Street Address</strong>:</td><td> $street_address </td>

</tr><tr>

<td width='125' height='25'><strong>City</strong>:</td><td>$city</td>

</tr><tr>

<td width='125' height='25'><strong>State</strong>:</td><td>$state</td>

</tr><tr>

<td width='125' height='25'><strong>Zip Code</strong>:</td><td>$zip</td>

</tr><tr>

<td width='125' height='25'><strong>Contact Name</strong>:</td><td>$name</td>

</tr><tr>

<td width='125' height='25'><strong>Title</strong>:</td><td> $title </td>

</tr><tr>

<td width='125' height='25'><strong>Phone</strong>:</td><td> $phone </td>

</tr><tr>

<td width='125' height='25'><strong>Fax Number</strong>:</td><td> $fax </td>

</tr><tr>

<tr>

<td width='125' height='25'><strong>Email</strong>:</td><td> $email </td>

</tr><tr>

<td width='125' height='25'><strong>Job Title</strong>:</td><td> $job_title </td>

</tr><tr>

<td width='125' height='25'><strong>Job Description</strong>:</td><td> $job_description </td>

</tr><tr>

<td width='125' height='25'><strong>Skills Required</strong>:</td><td> $skills_required </td>

</tr><tr>

<td width='125' height='25'><strong>Benefits</strong>:</td><td> $benefits </td>

</tr><tr>

<td width='125' height='25'><strong>Salary Range</strong>:</td><td> $salary </td>

</tr><tr>

<td width='125' height='25'><strong>Number of Positions Available</strong>:</td><td> $number_of_pos </td>

</tr><tr>

<td width='125' height='25'><strong>Number of Hours Per Week</strong>:</td><td> $hours_per_week </td>

</tr><tr>

<td width='125' height='25'><strong>Schedule</strong>:</td><td> $schedule </td>

</tr><tr>

<td width='125' height='25'><strong>Shift</strong>:</td><td> $shift </td>

</tr><tr>

<td width='125' height='25'><strong>Preferred Resume Format</strong>:</td><td> $preferred_format </td>

</tr>";



$body.="</td></tr></table>";





//CONSTRUCT TEXT EMAIL BODY



$body_notags ="
<strong>First Name</strong>: $first_name <br/>
<strong>Middle Initial</strong>: $middle_initial <br/>
<strong>Last Name</strong>: $last_name <br/>
<strong>Address</strong>: $address $city $state $zip<br/>
<strong>Home Phone</strong>: $home_phone <br/>
<strong>Cell Phone</strong>: $cell_phone <br/>
<strong>Work Phone</strong>: $work_phone <br/>
<strong>Email</strong>: $email <br/>";

$p = count($program_array);
for ($i=0; $i<=$p; $i++)
{
	$body_notags.= $program_array[$i]." <br/>";
}
$body_notags.="</td></tr></table>";



//

if (isset($_COOKIE["goerie"]))

{

	$messageSubject = "Erie Institute of Technology - Employer Job Submission - $first_name $last_name - From goerie.com";
	
	}elseif (isset($_COOKIE["reachlocal_display"])){

$messageSubject = "Erie Institute of Technology - Employer Job Submission - $first_name $last_name - FROM REACH LOCAL DISPLAY";

}elseif (isset($_COOKIE["reachlocal"])){

$messageSubject = "Erie Institute of Technology - Employer Job Submission - $first_name $last_name - FROM REACH LOCAL PPC";



	

} else {

$messageSubject = "Position Submission - EIT";

}

			$mail = new htmlMimeMail();
			$mail->setHtml($body, $body_notags);
			$mail->setReturnPath('info@erieit.edu');
			$mail->setFrom('position_submission@erieit.edu');
			$mail->setSubject($messageSubject);
			$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');

			

			//SEND TO BELOW /

			

			if (isset($_COOKIE["goerie"]))
{
			if($mail->send(array('davidt@erieit.edu'), 'mail')){
				
				//$responder->send(array($email), 'mail');

				print "<h1>Thank you for Submitting a Position! An employment specialist will contact you about potential candidates.</h1>";

			}else{

				print "<h1>An error has occured!</h1>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";

			}
			
			}elseif (isset($_COOKIE["reachlocal_display"])){

	if($mail->send(array('davidt@erieit.edu'), 'mail')){

				//$responder->send(array($email), 'mail');

				print "<h1>Thank you for Submitting a Position! An employment specialist will contact you about potential candidates.</h1>";

			}else{

				print "<h1>An error has occured!</h1>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}

}elseif (isset($_COOKIE["reachlocal"])){

	if($mail->send(array('davidt@erieit.edu'), 'mail')){

			//$responder->send(array($email), 'mail');	

				print "<h1>Thank you for Submitting a Position! An employment specialist will contact you about potential candidates.</h1>";

			}else{

				print "<h1>An error has occured!</h1>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";

			}
			
}else{

	

	if($mail->send(array('davidt@erieit.edu'), 'mail')){

				print "<h1>Thank you for Submitting a Position! An employment specialist will contact you about potential candidates.</h1>";

//$responder->send(array($email), 'mail');

			}else{

				print "<h1>An error has occured!</h1>";
				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}

}
		}else{

				print "

						<h2>Position Submission Form for Employers</h2>
<hr />
If you have available positions that you need filled, please complete the position submission form below. Our employment specialists will work with you to find qualified candidates to meet your needs.
<br />";







//SEND TO danb@glit.edu

//<form name='form_step_1' id='form_step_1' action='step two/index2.php' method='post'>

		print "
				<form action='' method='post' name='final' id='final' >

					<table cellpadding='5' cellspacing='5'>

					<tr>

						<td colspan='2'><h3>Employer Information</h3></td>

					</tr>";



			/******/

				print "<tr>

							<th><span class='star_required'>*</span>Company Name</th>

							<td><input  type='text' name='company_name' value='$company_name' size='50' /></td>

						</tr>";



			/******/

				print "<tr>

							<th>Mailing Address</th>

							<td><input type='text' name='mailing_address' value='$mailing_address' size='50'  /></td>

						</tr>";
			/******/
				print "<tr>

							<th><span class='star_required'>*</span>Street Address</th>
							
							<td><input  type='text' name='street_address' value='$street_address' size='50' /></td>

						</tr>";
			/******/
				print "<tr>

							<th><span class='star_required'>*</span>City</th>

							<td><input  type='text' name='city' value='$city'  size='50' /></td>

						</tr>";
			/******/

				print "<tr>

							<th><span class='star_required'>*</span>State</th>

							<td><input  type='text' name='state' value='$state'  size='15' /></td>

							</tr><tr>

							<th><span class='star_required'>*</span>Zip Code</th>

							<td><input  type='text' name='zip' value='$zip'  size='15' /></td>

						</tr>";

			/******/

				print "
				<tr>

							<td><h3>Contact Information</h3></td>

						</tr>
						
						<tr>

							<th><span class='star_required'>*</span>Contact Name</th>

							<td><input  type='text' name='name' value='$name' size='50' /></td>

						</tr>";

			/******/

				print "
				<tr>

							<th>Title</th>

							<td><input type='text' name='title' value='$title' size='50' /></td>

						</tr>
						
						<tr>

							<th><span class='star_required'>*</span>Phone</th>

							<td><input type='text' name='phone' value='$phone' size='30' /></td>

						</tr>";

			/******/

							print "<tr>

							<th>Fax Number</th>

							<td><input type='text' name='fax' value='$fax' size='30' /></td>

						</tr>";

			/******/

				print "<tr>

							<th><span class='star_required'>*</span>Email Address</th>

							<td><input type='text' name='email' value='$email' size='50' /></td>

						</tr>";

			/******/

		print "
		<tr>

							<td><h3>Position Information</h3></td>

						</tr>
						
						<tr>

					<th><span class='star_required'>*</span>Job Title</th>

					<td><input  type='text' name='job_title' value='$job_title' size='50' /></td>

				</tr>
				
				<tr>

					<th><span class='star_required'>*</span>Job Description</th>

					<td><textarea  type='text' name='job_description' value='$job_description' size='50' cols='40' /></textarea></td>

				</tr>
				
				<tr>

					<th>Skills Required</th>

					<td><textarea  type='text' name='skills_required' value='$skills_required' size='50' cols='40' /></textarea></td>

				</tr>
				
				<tr>

					<th>Benefits</th>

					<td><textarea  type='text' name='benefits' value='$benefits' size='50' cols='40' /></textarea></td>

				</tr>
				
				<tr>

					<th>Salary Range</th>

					<td><input  type='text' name='salary' value='$salary' size='30' /></td>

				</tr>
				
				<tr>

					<th>Number of Available Positions</th>

					<td><input  type='text' name='number_of_pos' value='$number_of_pos' size='10' /></td>

				</tr>
				
				<tr>

					<th>Number of Hours Per Week</th>

					<td><input  type='text' name='hours_per_week' value='$hours_per_week' size='20' /></td>

				</tr>
				
				<tr>

					<th>Schedule</th>

					<td><select name='schedule' id='schedule'>
					<option value='Full-Time'>Full-Time</option>
					<option value='Part-Time'>Part-Time</option>
					</select>
					
					</td>

				</tr>
				
				<tr>

					<th>Shift</th>

					<td><select name='shift' id='shift'>
					<option value='First'>First</option>
					<option value='Second'>Second</option>
					<option value='Third'>Third</option>
					</select>
					
					</td>

				</tr>
				
				<tr>

					<th>Preferred Resume Format</th>

					<td><input  type='text' name='preferred_format' value='$preferred_format' size='20' /></td>

				</tr>
				
				";


			/******/

				print "<tr>
						<td colspan='2' align='right'><input type='submit' name='submit_application' value='Send Position Information' id='input_button' /></td>

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

				

<? include('global_includes/footer.php'); ?>

</body>

</html>





