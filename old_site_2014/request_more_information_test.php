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

		$address = $_REQUEST['address'];

		$city = $_REQUEST['city'];

		$state = $_REQUEST['state'];

		$zip = $_REQUEST['zip'];

		$home_phone = $_REQUEST['home_phone'];

		$cell_phone = $_REQUEST['cell_phone'];	

		$work_phone = $_REQUEST['work_phone'];

		$email = $_REQUEST['email'];

		$program_count = $_REQUEST['program_count'];

		$program_array = $_REQUEST['program'];

		$date_of_birth = $_REQUEST['date_of_birth'];


//
		//If email is send, include the responder info
		include ('global_includes/responder.php');



//CONSTRUCT HTML EMAIL BODY





$body = "



<table ><tr >

<td width='125' height='25'><strong>First Name</strong>:</td><td> $first_name </td>

</tr><tr>

<td width='125' height='25'><strong>Middle Initial</strong>:</td><td> $middle_initial </td>

</tr><tr>

<td width='125' height='25'><strong>Last Name</strong>:</td><td> $last_name </td>

</tr><tr>

<td width='125' height='25'><strong>Address</strong>:</td><td>$address</td>

</tr><tr>

<td width='125' height='25'><strong>City</strong>:</td><td>$city</td>

</tr><tr>

<td width='125' height='25'><strong>State</strong>:</td><td>$state</td>

</tr><tr>

<td width='125' height='25'><strong>Zip Code</strong>:</td><td>$zip</td>

</tr><tr>

<td width='125' height='25'><strong>Home Phone</strong>:</td><td> $home_phone </td>

</tr><tr>

<td width='125' height='25'><strong>Cell Phone</strong>:</td><td> $cell_phone </td>

</tr><tr>

<td width='125' height='25'><strong>Work Phone</strong>:</td><td> $work_phone </td>

</tr><tr>

<td width='125' height='25'><strong>Email</strong>:</td><td> $email </td>

<tr><td><strong>Program</strong>:</td><td>";

$p = count($program_array);

for ($i=0; $i<=$p; $i++)

{

	$body.= $program_array[$i]." <br/>";

	

}



echo ("</td></tr></table>");





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

echo ("</td></tr></table>");



//

if (isset($_COOKIE["goerie"]))

{

	$messageSubject = "Erie Institute of Technology - Online Request - $first_name $last_name - From goerie.com";
	
	}elseif (isset($_COOKIE["reachlocal_display"])){

$messageSubject = "Erie Institute of Technology - Online Request - $first_name $last_name - FROM REACH LOCAL DISPLAY";

}elseif (isset($_COOKIE["reachlocal"])){

$messageSubject = "Erie Institute of Technology - Online Request - $first_name $last_name - FROM REACH LOCAL PPC";



	

} else {

$messageSubject = "Erie Institute of Technology - Online Request - $first_name $last_name";

}

			$mail = new htmlMimeMail();



			$mail->setHtml($body, $body_notags);

			

			$mail->setReturnPath('info@erieit.edu');



			$mail->setFrom('contact_us@erieit.edu');



			$mail->setSubject($messageSubject);



			$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');

			

			//SEND TO BELOW /

			

			if (isset($_COOKIE["goerie"]))

{

			if($mail->send(array('jonm@glit.edu'), 'mail')){
				
				$responder->send(array($email), 'mail');

				print "<h1>Thank you for Submitting an Application!</h1>";

			}else{

				print "<h1>An error has occured!</h1>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";

			}
			
			}elseif (isset($_COOKIE["reachlocal_display"])){

	if($mail->send(array('jonm@glit.edu'), 'mail')){

				$responder->send(array($email), 'mail');

				print "<h1>Thank you for Submitting an Application!</h1>";

			}else{

				print "<h1>An error has occured!</h1>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}

}elseif (isset($_COOKIE["reachlocal"])){

	if($mail->send(array('jonm@glit.edu'), 'mail')){

			$responder->send(array($email), 'mail');	

				print "<h1>Thank you for Submitting an Application!</h1>";

			}else{

				print "<h1>An error has occured!</h1>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";

			}
			
}else{

	

	if($mail->send(array('jonm@glit.edu'), 'mail')){

				print "<h1>Thank you for Submitting an Information Request!</h1>";

$responder->send(array($email), 'mail');

			}else{

				print "<h1>An error has occured!</h1>";



				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}

}

			

		}else{



				print "



						<h2>Request More Information</h2>



<hr />



We would be glad to send you additional information about the school or any of our programs. Please complete all sections of this form and click submit.



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



							<td><input  type='text' name='first_name' value='$first_name' size='50' /></td>



						</tr>";



			/******/



				print "<tr>



							<th>Middle Initial</th>



							<td><input type='text' name='middle_initial' value='$middle_initial' size='20'  /></td>



						</tr>";



			/******/



				print "<tr>



							<th><span class='star_required'>*</span>Last Name</th>



							<td><input  type='text' name='last_name' value='$last_name' size='50' /></td>



						</tr>";



			/******/



				print "<tr>



							<th><span class='star_required'>*</span>Address</th>



							<td><input  type='text' name='address' value='$address'  size='50' /></td>



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



				print "<tr>



							<th><span class='star_required'>*</span>Home Phone</th>



							<td><input  type='text' name='home_phone' value='$home_phone' size='30' /></td>



						</tr>";



			/******/



				print "<tr>



							<th>Cell Phone</th>



							<td><input type='text' name='work_phone' value='$cell_phone' size='30' /></td>



						</tr>";



			/******/

			

							print "<tr>



							<th>Work Phone</th>



							<td><input type='text' name='work_phone' value='$work_phone' size='30' /></td>



						</tr>";



			/******/



				

				print "<tr>



							<th><span class='star_required'>*</span>Email Address</th>



							<td><input type='text' name='email' value='$email' size='50' /></td>



						</tr>";



			/******/

			

			



		print "<tr>



					<th><span class='star_required'>*</span>Date of Birth</th>



					<td><input  type='text' name='date_of_birth' value='$date_of_birth' size='50' /></td>



				</tr>";



	/******/





				print "<tr>



							<td colspan='2'><h3>Programs of Interest</h3></td>



						</tr>";



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



					print "<tr><td><input type='hidden' name='program_count' value='".count($program_list)."' /></td>";



					if($program_values[$i]){



						print "<td><input type='checkbox' id='program_$i' name='program[]' selected='selected' value='".$program_list[$i]."'/> ".$program_list[$i]."</td></tr>";



					}else{



						print "<td><input type='checkbox' id='program_$i' name='program[]' value='".$program_list[$i]."'/> ".$program_list[$i]."</td></tr>";



					}



				}



			/******/



					

					

				print "<tr>



						<td colspan='2' align='right'><input type='submit' name='submit_application' value='Submit Request' /></td>



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





