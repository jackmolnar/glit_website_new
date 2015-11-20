<?

$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

if($url == 'http://erieit.edu/cnc_machinist_technician.php'){
	

		print "<li><div class='leftselect'>CNC/Machinist Technician</div></li>";



	}else{



		print "<li><a href='cnc_machinist_technician.php'>CNC/Machinist Technician</a></li>";



	}

if($url == 'http://erieit.edu/maintenance_technician.php'){



		print "<li><div class='leftselect'>Maintenance Technician</div></li>";



	}else{



		print "<li><a href='maintenance_technician.php'>Maintenance Technician</a></li>";



	}



	if($url == 'http://erieit.edu/rhvac_technology.php'){



		print "<li><div class='leftselect'>RHVAC Technology</div></li>";



	}else{



		print "<li><a href='rhvac_technology.php'>RHVAC Technology</a></li>";



	}



	if($url == 'http://erieit.edu/welding_technology.php'){



		print "<li><div class='leftselect'>Welding Technology</div></li>";



	}else{



		print "<li><a href='welding_technology.php'>Welding Technology</a></li>";



	}

		if($url == 'http://erieit.edu/electrician.php'){



		print "<li><div class='leftselect'>Electrician</div></li>";



	}else{



		print "<li><a href='electrician.php'>Electrician</a></li>";



	}

	/*if($common->checkurlForPageName("office%20machine%20service%20technology")){

		print "<li><div class='leftselect'>Office Machine Service Technology</div></li>";

	}else{

		print "<li><a href='".$depth."programs/electronics/office machine service technology/'>Office Machine Service Technology</a></li>";

	}*/

?>