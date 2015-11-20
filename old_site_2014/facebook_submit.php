<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

include "global_includes/mimemail/htmlMimeMail.php";

		$first_name = $_REQUEST['first_name'];

		$middle_initial = $_REQUEST['middle_initial'];

		$last_name = $_REQUEST['last_name'];

		$address = $_REQUEST['address'];

		$city = $_REQUEST['city'];

		$state = $_REQUEST['state'];

		$zip = $_REQUEST['zip_code'];

		$home_phone = $_REQUEST['home_phone'];

		$cell_phone = $_REQUEST['cell_phone'];
		
		$work_phone = $_REQUEST['work_phone'];

		$email = $_REQUEST['email'];

		$program = $_REQUEST['program'];

		$date_of_birth = $_REQUEST['date_of_birth'];


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
<tr><td><strong>Program</strong>:</td><td> $program

</td></tr></table>";


//CONSTRUCT TEXT EMAIL BODY

$body_notags ="

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
<tr><td><strong>Program</strong>:</td><td> $program

</td></tr></table>";

//
if (isset($_COOKIE["goerie"]))
{
	$messageSubject = "From goerie.com - EIT - Request More Information - $first_name $last_name";
}elseif (isset($_COOKIE["reachlocal"])){
	$messageSubject = "FROM REACH LOCAL - EIT - Facebook Request More Information - $first_name $last_name";
} else {
$messageSubject = "EIT - Facebook Request More Information - $first_name $last_name";
}
			$mail = new htmlMimeMail();

			$mail->setHtml($body, $body_notags);
			
			$mail->setReturnPath('info@glit.edu');

			$mail->setFrom('facebook_contact@glit.edu');

			$mail->setSubject($messageSubject);

			$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');
			
			//SEND TO BELOW \/
			
			if (isset($_COOKIE["goerie"]))
{
			if($mail->send(array('jonm@glit.edu', 'info@erieit.edu'), 'mail')){
				
				print "<h2 style='text-align:center'>Thank you for Requesting More Information!</h2>";
				
				print "<p style='text-align:center'><a href='http://www.facebook.com/erieinstituteoftechnology' style='text-align:center'>Return To Facebook</a>";

			}else{

				print "<h1>An error has occured!</h1>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";

			}
			
}elseif (isset($_COOKIE["reachlocal"])){
	
	if($mail->send(array('jonm@glit.edu', 'info@erieit.edu'), 'mail')){
				
				print "<h2 style='text-align:center'>Thank you for Requesting More Information!</h2>";
				
				print "<p style='text-align:center'><a href='http://www.facebook.com/erieinstituteoftechnology' style='text-align:center'>Return To Facebook</a>";

			}else{

				print "<h1>An error has occured!</h1>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";

			}
			
}else{
	
	if($mail->send(array('jonm@glit.edu','info@erieit.edu'), 'mail')){
				
				print "<h2 style='text-align:center'>Thank you for Requesting More Information!</h2>";
				
				print "<p style='text-align:center'><a href='http://www.facebook.com/erieinstituteoftechnology' >Return To Facebook</a>";

			}else{

				print "<h1>An error has occured!</h1>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";

			}
}



?>
</body>
</html>