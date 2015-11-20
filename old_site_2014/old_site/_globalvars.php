
<?php

$webmaster_email = "danb@glit.edu";
$requestinfo_email = "info@erieit.edu"; 
$applyonline_email = "info@erieit.edu"; 
$contactus_email = "info@erieit.edu"; 

function getIP() {
	if (getenv("HTTP_CLIENT_IP")) $ip = getenv("HTTP_CLIENT_IP");
	else if(getenv("HTTP_X_FORWARDED_FOR")) $ip = getenv("HTTP_X_FORWARDED_FOR");
	else if(getenv("REMOTE_ADDR")) $ip = getenv("REMOTE_ADDR");
	else $ip = "UNKNOWN";

	return $ip;
}

function log_mail($sender, $recipient, $subject, $body, $header="")
{
	// build header
		$header  = "From: " . $sender . "\r\n";
		$header .= 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
		
	$status = date("l F j, Y  h:i:s a") . "\r\n";
	$status .= "IP:      " . getIP() . "\r\n";
	$status .= "From:    $sender\r\n";
	$status .= "To:      $recipient\r\n";
	$status .= "Subject: $subject\r\n";
	
	$result = mail($recipient, $subject, $body, $header);
	
	if ($result == true) {
		$status .= "Message sent successfully\r\n\r\n";
	} else {
		$status .= "Error sending message\r\n\r\n";
	}
	
$fp = fopen("sendmail.log", "a");
$write = fputs($fp, $status);
fclose($fp);

	return $result;
}

?>
