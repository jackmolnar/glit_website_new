<?

	if($common->checkurlForPageName("computers")){

		print "<li><a href='computers.php'><span>Computers</span></a></li>";

	}else{

		print "<li><a href='computers.php'><span>Computers</span></a></li>";

	}

	if($common->checkurlForPageName("electronics")){

		print "<li><a href='electronics.php'><span>Electronics</span></a></li>";

	}else{

		print "<li><a href='electronics.php'><span>Electronics</span></a></li>";

	} 

	if($common->checkurlForPageName("manufacturing")){

		print "<li><a href='manufacturing.php'><span>Manufacturing & Technology</span></a></li>";

	}else{

		print "<li><a href='manufacturing.php'><span>Manufacturing & Technology</span></a></li>";

	}  

	if($common->checkurlForPageName("continuing%20education")){

		print "<li><a href='continuing_education.php'><span>Continuing Education</span></a></li>";

	}else{

		print "<li><a href='continuing_education.php'><span>Continuing Education</span></a></li>";

	}  

	if($common->checkurlForPageName("customized%20training")){

		print "<li><a href='customized_training.php'><span>Customized Training</span></a></li>";

	}else{

		print "<li><a href='customized_training.php'><span>Customized Training</span></a></li>";

	} 

?>