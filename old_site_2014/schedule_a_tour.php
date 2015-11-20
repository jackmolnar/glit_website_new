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
		
		$fb_tracking_pixel = '<script type="text/javascript">
var fb_param = {};
fb_param.pixel_id = "6014244798975";
fb_param.value = "0.00";
fb_param.currency = "USD";
(function(){
  var fpw = document.createElement("script");
  fpw.async = true;
  fpw.src = "//connect.facebook.net/en_US/fp.js";
  var ref = document.getElementsByTagName("script")[0];
  ref.parentNode.insertBefore(fpw, ref);
})();
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6014244798975&amp;value=0&amp;currency=USD" /></noscript>';
		
		
$depth_to_leads = '../../glit.edu/html/';

if($_REQUEST['submit_application']){
include ($depth_to_leads.'leads/global_includes/connect.php');
include ($depth_to_leads.'leads/global_includes/functions.php');

echo $fb_tracking_pixel;
}


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
        
        <link href="http://glit.edu/leads/styles/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />

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
		
		if ($_REQUEST['eit'] != ''){
			$blocker = true;
		} else {
			$blocker = false;
		}
		
		
		$first_name = $_REQUEST['first_name'];
		$last_name = $_REQUEST['last_name'];
		$address = $_REQUEST['address'];
		$city = $_REQUEST['city'];
		$state = $_REQUEST['state'];
		$zip = $_REQUEST['zip'];
		$home_phone = $_REQUEST['home_phone'];
		$home_phone = $_REQUEST['cell_phone'];
			/*
		if ($_REQUEST['text_message_yes'] == 'on'){
			$text_message_yes = 'Yes'; } else {$text_message_yes = ''; }
			*/
		$text_message_yes = $_REQUEST['text_message_yes'];
		$date = $_REQUEST['date'];
		$alt_date = $_REQUEST['alt_date'];
		$email = $_REQUEST['email'];
		$program_count = $_REQUEST['program_count'];
		$program_array = $_REQUEST['program'];
		$school=3;
		
			//PUT DATA INTO THE DATABASE
		include ($depth_to_leads.'leads/global_includes/req_tour_info_dump.php');

//CONSTRUCT HTML EMAIL BODY


$body = "

<table ><tr >

<td width='125' height='25'><strong>Name</strong>:</td><td> $first_name $last_name </td>

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

<td width='125' height='25'><strong>Text Message?</strong>:</td><td> $text_message_yes </td>

</tr><tr>

<td width='125' height='25'><strong>Date Available for Tour</strong>:</td><td> $date </td>

</tr><tr>

<td width='125' height='25'><strong>Alternate Date Available</strong>:</td><td> $alt_date </td>

</tr><tr>

<td width='125' height='25'><strong>Email</strong>:</td><td> $email </td></tr>";

print "<tr><td><strong>Program</strong>:</td><td>";

$p = count($program_array);

for ($i=0; $i<=$p; $i++)

{
	$body.= $program_array[$i]." <br/>";

}

echo ("</td></tr></table>");

//CONSTRUCT TEXT EMAIL BODY

$body_notags ="

<table ><tr >

<td width='125' height='25'><strong>Name</strong>:</td><td> $name </td>

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

<td width='125' height='25'><strong>Text Message?</strong>:</td><td> $text_message_yes </td>

</tr><tr>

<td width='125' height='25'><strong>Date Available for Tour</strong>:</td><td> $date </td>

</tr><tr>

<td width='125' height='25'><strong>Alternate Date Available</strong>:</td><td> $alt_date </td>

</tr><tr>

<td width='125' height='25'><strong>Email</strong>:</td><td> $email </td>

<tr><td><strong>Program</strong>:</td><td>";

$p = count($program_array);

for ($i=0; $i<=$p; $i++)

{
	$body_notags.= $program_array[$i]." <br/>";

}

echo ("</td></tr></table>");



//

if (isset($_COOKIE["reachlocal_display"])){
	$messageSubject = "Erie Institute of Technology - Request a Tour - ReachLocal Display - $name";
}elseif (isset($_COOKIE["reachlocal"])){
	$messageSubject = "Erie Institute of Technology - Request a Tour - ReachLocal - $name";
} else {
	$messageSubject = "Erie Institute of Technology - Request a Tour - $first_name $last_name";
}

			$mail = new htmlMimeMail();

			$mail->setHtml($body, $body_notags);

			$mail->setReturnPath('info@erieit.edu');

			$mail->setFrom('contact_us@erieit.edu');

			$mail->setSubject($messageSubject);

			$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');

			//SEND TO BELOW /
			
$success_response = '<h1>Thank you for Requesting a Tour!</h1>';
$error_response = '<h1>An error has occured!</h1><p>We are sorry for the inconvenience, you may try to submit again.</p>';
			

if (isset($_COOKIE["reachlocal"])&& $blocker == false){

	if($mail->send(array('info@glit.edu', 'jonm@glit.edu', 'chrisb@glit.edu'), 'mail')){
		print $success_response;
	}else{
		print $error_response;
	}

}else if ($blocker == false){

	if($mail->send(array('info@glit.edu', 'chrisb@glit.edu'), 'mail')){
		print $success_response;
	}else{
		print $error_response;
	}

}

		}else{

				print "



<h2>Schedule a Tour</h2>



<hr />



<br/>*Fields Are Required



<br />";


//SEND TO danb@glit.edu

//<form name='form_step_1' id='form_step_1' action='step two/index2.php' method='post'>

		print "

			<form action='' method='post' name='final' id='final'>

				<table cellpadding='5' cellspacing='5'>

					";



			/******/

				print "<tr>

							<th>Date Available</th>

							<td><input  type='text' name='date' value='$date' size='50' id='date' /></td>

						</tr>";



			/******/

				print "<tr>

			<th>Alternate Date</th>

		<td><input type='text' name='alt_date' value='$alt_date' size='50' id='alt_date'  /></td>

						</tr>";

			/******/

				print "<tr>

							<th>First Name</th>

							<td><input  type='text' name='first_name' value='$first_name' size='50' />
							
							<input  type='text' name='eit' size='5' style='display:none;' />
							
							</td>

						</tr>";

			/******/
			
			print "<tr>

							<th>Last Name</th>

							<td><input  type='text' name='last_name' value='$last_name' size='50' /></td>

						</tr>";

			/******/



				print "<tr>



							<th>Address</th>



							<td><input  type='text' name='address' value='$address'  size='50' /></td>



						</tr>";

			/******/

				print "<tr>

							<th>City</th>

							<td><input  type='text' name='city' value='$city'  size='50' /></td>

						</tr>";

			/******/

				print "<tr>

							<th>State</th>

							<td><input  type='text' name='state' value='$state'  size='15' /></td>

							</tr><tr>

							<th>Zip Code</th>

							<td><input  type='text' name='zip' value='$zip'  size='15' /></td>

						</tr>";



			/******/

				print "<tr>

							<th>Home Phone</th>

							<td><input  type='text' name='home_phone' value='$home_phone' size='30' id='home_phone' /></td>

						</tr>";
						
						print "<tr>

							<th>Cell Phone</th>

							<td><input  type='text' name='cell_phone' value='$cell_phone' size='30' id='cell_phone' /></td>

						</tr>";
						
				print "<tr>

							<th id='text_message'></th>

							<td id='text_message_box'></td>

						</tr>";


			/******/

				print "<tr>



							<th>Email Address</th>



							<td><input type='text' name='email' value='$email' size='50' /></td>



						</tr>";



	/******/





				print "<tr>



							<td colspan='2'><h3>Programs of Interest</h3></td>



						</tr>";



				$program_list = array("Biomedical Equipment Technology",



									  "Business and Information Managment",

									  

									  "CNC / Machinist Technician",



									  "Electrician",



									  "Electronic Engineering Technology",



									  "Electronics Technician",



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

						<td colspan='2' align='right'><input " ?> onclick="track_sched_tour();" <? print "type='submit' name='submit_application' value='Schedule Tour Now' id='input_button' /></td>

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

<script language="JavaScript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script language="JavaScript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script language="JavaScript" src="http://glit.edu/leads/calendar/ui_datepicker.js"></script>

<script>

	$(function() {
$('#date').datetimepicker({
	ampm:true,
	stepMinute: 15,
	numberOfMonths:2
	
});
$('#alt_date').datetimepicker({
	ampm:true,
	stepMinute: 15,
	numberOfMonths:2
	
});
});

$(document).ready(function(){
//LETTER BUTTONS
//LETTER BUTTONS
//LETTER BUTTONS
$("#cell_phone, #home_phone").focus(function(){
		$("#text_message").html('May we text message you?'),
		$("#text_message_box").html('<select style="float:left" name="text_message_yes"><option value="Yes">Yes</option><option value="No">No</option></select><img src="../images/help.png" id="help_button" style="float:left; margin-left:10px;"/> '),
		$("#text_message").css({'height' : '40px'});
		$("#help_button").css({'cursor' : 'pointer'});
		$("#help_button").click(function(){
			alert("Standard text message rates apply. Please contact your carrier for more details.");
		});
});



});
	</script>

</html>



