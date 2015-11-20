<?

include('mimemail/htmlMimeMail.php');

include('Mailchimp.php');


/*
 *
 *
 * FB Tracking pixel
*/
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


/*
 *
 *
 * Set up program list
*/
$program_list = array("Autobody Tech.","Biomedical Equipment Tech.","Business and Info. Management","CNC Machinist Technician","Electrician","Electronics Engineering Tech.","Electronics Technician","Industrial Maintenance & Mechatronics","Multimedia Graphic Design","Network & Database Professional","RHVAC Technology", "Welding Technology");

echo $fb_tracking_pixel;
 

		
/*
 *
 *
 * Get variables, set up values
*/
if ($_REQUEST['eit'] != ''){
	$blocker = true;
} else {
	$blocker = false;
}

foreach ($_POST as $key => $value) {
	if(isset($value)){
		$$key = $value;
	} else {
		$$key = 'nothing';
	}
}
		
		
/*
 *
 *
 * Side Form Email Body
*/
if($form_type == 'side_form') {

$body = "

<table ><tr >
<td width='125' height='25'><strong>First Name</strong>:</td><td> $first_name </td>
</tr><tr>
<td width='125' height='25'><strong>Last Name</strong>:</td><td> $last_name </td>
</tr><tr>
<td width='125' height='25'><strong>Phone</strong>:</td><td> $home_phone </td>
</tr><tr>
<td width='125' height='25'><strong>Comments</strong>:</td><td> $message </td>
</tr><tr>
<td width='125' height='25'><strong>Text Message?</strong>:</td><td>";

if(isset($text_message_yes)){ $body .= $text_message_yes; } else { $body .= 'No'; }

$body .=" </td>

</tr><tr>
<td width='125' height='25'><strong>Email</strong>:</td><td> $email </td></tr>";

$body .= "<tr><td><strong>Program</strong>:</td><td>";

//check if program was selected
if (isset($_REQUEST['program'])){
	foreach ($_REQUEST['program'] as $program){
		$body.= $program." <br/>";
	}
}
$body.="</td></tr></table>";

}

/*
 *
 *
 * Request Info Email Body
*/
else if ($form_type == 'req_info'){
	
	$body = "
<table ><tr >
<td width='125' height='25'><strong>First Name</strong>:</td><td> $first_name </td>
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
<td width='125' height='25'><strong>Text Message?</strong>:</td><td>";

if(isset($text_message_yes)){ $body .= $text_message_yes; } else { $body .= 'No'; }

$body .=" </td>

</tr><tr>
<td width='125' height='25'><strong>Comments</strong>:</td><td> $message </td>
</tr><tr>
<td width='125' height='25'><strong>Email</strong>:</td><td> $email </td></tr>";
$body .= "<tr><td><strong>Program</strong>:</td><td>";
//check if program was selected
if (isset($_REQUEST['program'])){
	foreach ($_REQUEST['program'] as $program){
		$body.= $program." <br/>";
	}
}
$body.="</td></tr></table>";
	
	
}

/*
 *
 *
 * Schedule Tour Email Body
*/
else if ($form_type == 'tour'){
	$body = "

<table ><tr >
<td width='125' height='25'><strong>Date</strong>:</td><td> $date </td>
</tr><tr>
<td width='125' height='25'><strong>Alt Date</strong>:</td><td> $alt_date </td>
</tr><tr >
<td width='125' height='25'><strong>First Name</strong>:</td><td> $first_name </td>
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
<td width='125' height='25'><strong>Phone</strong>:</td><td> $home_phone </td>
</tr><tr>
<td width='125' height='25'><strong>Text Message?</strong>:</td><td>";

if(isset($text_message_yes)){ $body .= $text_message_yes; } else { $body .= 'No'; }

$body .=" </td>

</tr><tr>
<td width='125' height='25'><strong>Email</strong>:</td><td> $email </td></tr>";
$body .= "<tr><td><strong>Program</strong>:</td><td>";
//check if program was selected
if (isset($_REQUEST['program'])){
	foreach ($_REQUEST['program'] as $program){
		$body.= $program." <br/>";
	}
}
$body.="</td></tr></table>";

}

//APPLY EMAIL BODY
//APPLY EMAIL BODY
//APPLY EMAIL BODY
else if ($form_type == 'apply'){
	
}

//THE SEND INFO
//THE SEND INFO
//THE SEND INFO

$success_response = "<div id='contact_form' >
<div id='form_body' >
Thank you for requesting more information! Someone will contact you shortly.
</div></div>";

$error_response = "<div id='contact_form' >
<div id='form_body' >
An error has occured, sorry for the inconvenience! Please click back and resubmit the form or call us at 814-868-9900.
</div></div>";

/*
 *
 *
 * Format the form type for the subject
*/
$form_type = str_replace('_', ' ', $form_type);
$form_type = ucwords($form_type);
 //

/*
 *
 *
 * Set the senders arrays
*/			
$reach_local_senders = array('jonm@glit.edu', 'info@glit.edu','jenniferh@glit.edu');
$regular_senders = array('info@glit.edu','jenniferh@glit.edu');
$test_senders = array('jonm@glit.edu');
			
/*
 *
 *
 * Choose subject based on cookies
*/				
if (isset($_COOKIE["reachlocal"])){
	$messageSubject = "Erie Institute of Technology - ".$form_type." - ReachLocal ".$_COOKIE["reachlocal"]." - $first_name $last_name";
} else {
	$messageSubject = "Erie Institute of Technology - ".$form_type." - $first_name $last_name";
}



/*
 *
 *
 * Create the mail object
*/
$mail = new htmlMimeMail();
$mail->setHtml($body);
$mail->setReturnPath('info@glit.edu');
$mail->setFrom('contact_us@erieit.edu');
$mail->setSubject($messageSubject);
$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');
			
			
			
if (isset($_COOKIE["reachlocal"]) && $blocker == false){
	
	if($mail->send($reach_local_senders, 'mail')){
		//$responder->send(array($email), 'mail');	
		print $success_response;
	}else{
		print $error_response;
	}
			
}else if ($blocker == false) {
	
	if($mail->send($reach_local_senders, 'mail')){
		//$responder->send(array($email), 'mail');	
		print $success_response;
	}else{
		print $error_response;
	}
	
}

/*
*
*	Mailchimp stuff
*/
try {
	if (isset($email)){
		$mc_api = 'd36345c44634f76b80673bfcd0b52397-us3';
		$mc_list = '5ea322b908';
		$mc_email = array('email' => $email);
		$mc_merge = array('FNAME' => $first_name, 'LNAME' => $last_name);
		$mailchimp = new Mailchimp('d36345c44634f76b80673bfcd0b52397-us3');
		$mc_result = $mailchimp->lists->subscribe($mc_list, $mc_email, $mc_merge, 'html', FALSE, TRUE, FALSE, FALSE  );
		//print_r($mc_result);
		
	}
} catch (Exception $e){
	echo "Exception: ".$e->getMessage();	
}
