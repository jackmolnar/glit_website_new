<?

$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


	if($url == 'http://erieit.edu/multimedia_graphic_design.php'){

		print "<li><div class='leftselect'>Multimedia Graphic Design</div></li>";

	}else{

		print "<li><a href='multimedia_graphic_design.php'>Multimedia Graphic Design</a></li>";

	}

	if($url == 'http://erieit.edu/network_database_professional.php'){

		print "<li><div class='leftselect'>Network & Database Professional</div></li>";

	}else{

		print "<li><a href='network_database_professional.php'>Network & Database Professional</a></li>";

	}

	if($url == 'http://erieit.edu/business_office_professional.php'){

		print "<li><div class='leftselect'>Business Office Professional</div></li>";

	}else{

		print "<li><a href='business_office_professional.php'>Business Office Professional</a></li>";

	}

?>