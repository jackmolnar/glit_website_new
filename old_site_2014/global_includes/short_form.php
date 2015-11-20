


<?

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

$depth_to_leads = '../../glit.edu/html/';

include "global_includes/mimemail/htmlMimeMail.php";

if($_REQUEST['submit_application']){
	include ($depth_to_leads.'leads/global_includes/connect.php');
include ($depth_to_leads.'leads/global_includes/functions.php');

echo $fb_tracking_pixel;
 
//GET VARIABLES
		
		if ($_REQUEST['eit'] != ''){
			$blocker = true;
		} else {
			$blocker = false;
		}

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
			/*
		if ($_REQUEST['text_message_yes'] == 'on'){
			$text_message_yes = 'Yes'; } else {$text_message_yes = ''; }
			*/
		$text_message_yes = $_REQUEST['text_message_yes'];
		$school = 3;
		
		//
		//PUT DATA INTO THE DATABASE
		include ($depth_to_leads.'leads/global_includes/req_more_info_dump.php');

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
<td width='125' height='25'><strong>Text Message?</strong>:</td><td> $text_message_yes </td>
</tr><tr>
<td width='125' height='25'><strong>Work Phone</strong>:</td><td> $work_phone </td>
</tr><tr>
<td width='125' height='25'><strong>Email</strong>:</td><td> $email </td></tr>";

$body .= "<tr><td><strong>Program</strong>:</td><td>";
$p = count($program_array);
for ($i=0; $i<=$p; $i++)
{
	$body.= $program_array[$i]." <br/>";
	
}

$body.="</td></tr></table>";

//THE SEND INFO
//THE SEND INFO
//THE SEND INFO

$success_response = "<div id='contact_form' >
<div id='contact_form_head' >
REQUEST MORE INFORMATION
</div>
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

			$mail->setHtml($body, $body_notags);
			
			$mail->setReturnPath('info@glit.edu');

			$mail->setFrom('contact_us@erieit.edu');

			$mail->setSubject($messageSubject);

			$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');
			
			//SEND TO BELOW \/
			
if (isset($_COOKIE["reachlocal"]) && $blocker == false){
	
	if($mail->send(array('jonm@glit.edu', 'info@glit.edu','chrisb@glit.edu'), 'mail')){
		$responder->send(array($email), 'mail');	
		print $success_response;
	}else{
		print $error_response;
	}
			
}else if ($blocker == false) {
	
	if($mail->send(array('info@glit.edu','chrisb@glit.edu'), 'mail')){
		$responder->send(array($email), 'mail');	
		print $success_response;
	}else{
		print $error_response;
	}
	
}
 
 
 //
}else{
//	
	print"

<div id='contact_form' >
<div id='contact_form_head' >
REQUEST MORE INFORMATION
</div>
<div id='form_body' >

<form action='' method='post' name='final' id='final'>
<table style='font-size:10px;' width='180px' cellpadding='0'>
<tr>
<td>First Name</td><td>Last Name</td>
</tr>
<tr>
<td><input  type='text' name='first_name' value='$first_name' size='13' /></td><td><input  type='text' name='last_name' value='$last_name' size='13' />

<input  type='text' name='eit' size='5' style='display:none;' />

</td>
</tr>
<tr>
<td>Address</td><td>City</td>
</tr>
<tr>
<td><input  type='text' name='address' value='$address' size='13' /></td><td><input  type='text' name='city' value='$city' size='13' /></td>
</tr>
<tr>
<td>State</td>
<td>Zip Code</td>
</tr>
<tr>
<td><input  type='text' name='state' value='$state' size='13' /></td><td><input  type='text' name='zip' value='$zip' size='13' /></td>
</tr>
<tr>
<td>Home Phone</td>
<td>Cell Phone</td>
</tr>
<tr>
<td><input  type='text' name='home_phone' value='$home_phone' size='13' id='home_phone' /></td><td><input  type='text' name='cell_phone' value='$cell_phone' size='13' id='cell_phone' /></td>
</tr>
</tr>
<tr>
<td id='text_message'></td><td id='text_message_box'></td>
</tr>
<tr>
<td>Email</td>
<td>Date of Birth</td>
</tr>
<tr>
<td><input  type='text' name='email' value='$email' size='13' /></td><td><input  type='text' name='date_of_birth' value='$date_of_birth' size='13' /></td>
</tr>
<tr>
<td colspan='2'>Program of Interest<br /><span style='font-size:10px;'>Hold CTRL and Click to Select More then One</span></td>
</tr>
<tr>
<td colspan='2'>
<select name='program[]' multiple='multiple' size='5' style='font-size:10px;'>";

for($i=0;$i<count($program_list);$i++){

print"
<option value='".$program_list[$i]."' />".$program_list[$i]."</option>";
}

print"

</select>
</td>
</tr>
<tr>
<td colspan='2' align='center'>
<input "; ?>onclick="track_side_form();"<? 
print "
type='submit' name='submit_application' value='   ' id='submit_application' style='width:180px; margin-top:5px; border:0;'  />
</td>
</tr>
</table>
</form>
</div>



</div>";

}

?>


<script language="JavaScript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>


<script>
$(document).ready(function(){
//LETTER BUTTONS
//LETTER BUTTONS
//LETTER BUTTONS
/*
$("#cell_phone, #home_phone").focus(function(){
		$("#text_message").html('May we text<br>message you?'),
		$("#text_message_box").html('<input type="checkbox" name="text_message_yes" style="float:left; margin-top:10px;" /><img src="http://www.glit.edu/images/help.png" id="help_button" style="float:left; margin-left:10px; margin-top:10px;"/> '),
		$("#text_message").css({'height' : '40px'});
		$("#help_button").css({'cursor' : 'pointer'});
		$("#help_button").click(function(){
			alert("Standard text message rates apply. Please contact your carrier for more details.");
		});

});
*/

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