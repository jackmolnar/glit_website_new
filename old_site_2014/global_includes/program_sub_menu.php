

<ul><?

	if($common->checkurlForPageName($overview_name)){

		print "<li><a href='".$current_program.".php'><span>Overview</span></a></li>";

	}else{

		print "<li><a href='".$current_program.".php'><span>Overview</span></a></li>";

	}

	if($common->checkurlForPageName("career_opportunities")){

		print "<li><a href='".$current_program."_career_opportunities.html'><span>Opportunities</span></a></li>";

	}else{

		print "<li><a href='".$current_program."_career_opportunities.html'><span>Opportunities</span></a></li>";

	}

	if($common->checkurlForPageName("testimonials")){

		print "<li><a href='".$current_program."_testimonials.html'><span>Testimonials</span></a></li>";

	}else if ($current_program == "business_information_management"){	
		echo 'bim works';
	} else {

		print "<li><a href='".$current_program."_testimonials.html'><span>Testimonials</span></a></li>";	

	}

?>