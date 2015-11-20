


<?
include('assets/includes/mimemail/htmlMimeMail.php');

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

$program_list = array("Biomedical Equipment Tech.","Business and Info. Management","CNC Machinist Technician","Electrician","Electronics Engineering Tech.","Electronics Technician","Maintenance Technician","Multimedia Graphic Design","Network & Database Professional","RHVAC Technology", "Welding Technology");

if(isset($_REQUEST['submit_application'])){

echo $fb_tracking_pixel;
 
//GET VARIABLES
		
		if ($_REQUEST['eit'] != ''){
			$blocker = true;
		} else {
			$blocker = false;
		}
		
		//
		//Get all the variables from POST - set up new variables
		foreach ($_POST as $key => $value) {
			if(isset($value)){
				$$key = $value;
			} else {
				$$key = 'nothing';
			}
		}
		
		
		
		
		/*
		$first_name = $_REQUEST['first_name'];
		if(isset($middle_initial)) { $middle_initial = $_REQUEST['middle_initial']; };
		if(isset($last_name)) { $last_name = $_REQUEST['last_name'];};
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
		*/
		
			/*
		if ($_REQUEST['text_message_yes'] == 'on'){
			$text_message_yes = 'Yes'; } else {$text_message_yes = ''; }
			*/
		//$text_message_yes = $_REQUEST['text_message_yes'];
		//$school = 3;
		
		//
		//PUT DATA INTO THE DATABASE
		//include ($depth_to_leads.'leads/global_includes/req_more_info_dump.php');

		//
		//If email is send, include the responder info
		//include ('global_includes/responder.php');


//CONSTRUCT HTML EMAIL BODY


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

if(isset($text_message_yes)){ $body .= '$text_message_yes'; } else { $body .= 'No'; }

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

//THE SEND INFO
//THE SEND INFO
//THE SEND INFO

$success_response = "<div id='contact_form' >
<h2 >
REQUEST INFO
</h2>
<div id='form_body' >
Thank you for requesting more information!
</div></div>";

$error_response = "<div id='contact_form' >
<div id='contact_form_head' >
REQUEST MORE INFORMATION
</div>
<div id='form_body' >
An error has occured! Please click back and resubmit the form!
</div></div>";



 
if (isset($_COOKIE["reachlocal"])){
	$messageSubject = "Erie Institute of Technology - Side Form - ReachLocal - $first_name $last_name";
} else {
$messageSubject = "Erie Institute of Technology - Side Form - $first_name $last_name";
}
			$mail = new htmlMimeMail();

			$mail->setHtml($body);
			
			$mail->setReturnPath('info@glit.edu');

			$mail->setFrom('contact_us@erieit.edu');

			$mail->setSubject($messageSubject);

			$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');
			
			//SEND TO BELOW \/
			
if (isset($_COOKIE["reachlocal"]) && $blocker == false){
	
	if($mail->send(array('jonm@glit.edu'/*, 'info@glit.edu','chrisb@glit.edu'*/), 'mail')){
		$responder->send(array($email), 'mail');	
		print $success_response;
	}else{
		print $error_response;
	}
			
}else if ($blocker == false) {
	
	if($mail->send(array('jonm@glit.edu'/*'info@glit.edu','chrisb@glit.edu'*/), 'mail')){
		//$responder->send(array($email), 'mail');	
		print $success_response;
	}else{
		print $error_response;
	}
	
}
 
 
 //
}else{
//	
	print"

<h2>Request Info</h2>

";
		$first_name = '';
		$last_name = '';
		$address = '';
		$city = '';
		$state = '';
		$zip = '';
		$home_phone = '';
		$cell_phone = '';
		$work_phone = '';
		$email = '';
		$program_count = '';
		$program_array = '';
		$date_of_birth = '';
		

print "
<form action='' method='post' name='final' id='final' role='form' class='form-inline'>


<input  type='text' name='first_name' class='form-control half_size' placeholder='First Name' value='$first_name' />

<input  type='text' name='last_name' value='$last_name' class='form-control half_size' placeholder='Last Name' />

<input type='text' name='home_phone' value='$home_phone' size='13' id='home_phone' class='form-control half_size' placeholder='Phone'/>

<input  type='text' name='email' value='$email' size='13' class='form-control half_size' placeholder='Email'/>


<div id='text_message' class='half_size' style='float:left;'></div><div id='text_message_box' class='half_size'  style='float:left;'></div>

<input  type='text' name='eit' size='5' style='display:none;' />

<textarea class='form-control' placeholder='Message' name='message' id='message' style='height:75px;'></textarea>

<h3>Program of Interest</h3><span style='font-size:11px;'>Hold CTRL and Click to Select More then One</span>

<select name='program[]' multiple='multiple' class='form-control' >";

for($i=0;$i<count($program_list);$i++){

print"
<option value='".$program_list[$i]."' />".$program_list[$i]."</option>";
}

print"

</select>

<input "; ?>onclick="track_side_form();"<? 
print "
type='submit' name='submit_application' value='SUBMIT' id='submit_application'  />

</form>
";

}

?>


<script>

</script>