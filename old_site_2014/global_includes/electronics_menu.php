<?

$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];



	if($url == 'http://erieit.edu/computer_electronics_engineering_technology.php'){

		print "<li><div class='leftselect'>Electronics<br />Engineering Technology</div></li>";

	}else{

		print "<li><a href='computer_electronics_engineering_technology.php'>Electronics<br /> Engineering Technology</a></li>";

	}

	if($url == 'http://erieit.edu/biomedical_equipment_technology.php'){

		print "<li><div class='leftselect'>Biomedical Equipment Technology</div></li>";

	}else{

		print "<li><a href='biomedical_equipment_technology.php'>Biomedical Equipment Technology</a></li>";

	}

	if($url == 'http://erieit.edu/electronics_technician.php'){

		print "<li><div class='leftselect'>Electronics Technician</div></li>";

	}else{

		print "<li><a href='electronics_technician.php'>Electronics Technician</a></li>";

	}

	if($url == 'http://erieit.edu/industrial_automation_robotics_technology.php'){

		print "<li><div class='leftselect'>Industrial Automation &amp; Robotics Technology</div></li>";

	}else{

		print "<li><a href='industrial_automation_robotics_technology.php'>Industrial Automation &amp; Robotics Technology</a></li>";

	}


?>