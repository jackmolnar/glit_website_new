<?

$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

if($url == 'http://erieit.edu/index.php'){

		print "<li><div class='navselect'>Home</div></li>";

	}else{

		print "<li><a href='index.php'>Home</a></li>";

	} 

	if($url == 'http://erieit.edu/why_eit.php'){

		print "<li><div class='navselect'>Why EIT?</div></li>";

	}else{

		print "<li><a href='why_eit.php'>Why EIT?</a></li>";

	}

	if($url == 'http://erieit.edu/programs.php'){

		print "<li><div class='navselect'>Programs</div></li>";

	}else{

		print "<li><a href='programs.php'>Programs</a></li>";

	}

	if($url == 'http://erieit.edu/admissions.php'){

		print "<li><div class='navselect'>Admissions</div></li>";

	}else{

		print "<li><a href='admissions.php'>Admissions</a></li>";

	}

	if($url == 'http://erieit.edu/stafffaculty.php'){

		print "<li><div class='navselect'>Staff/Faculty</div></li>";

	}else{

		print "<li><a href='stafffaculty.php'>Staff/Faculty</a></li>";

	}

	if($url == 'http://erieit.edu/newsevents.php'){

		print "<li><div class='navselect'>News/Events</div></li>";

	}else{

		print "<li><a href='newsevents.php'>News/Events</a></li>";

	}

	if($url == 'http://erieit.edu/contact.php'){

		print "<li><div class='navselect'>Contact</div></li>";

	}else{

		print "<li><a href='contact.php'>Contact</a></li>";

	}


if($url == 'http://erieit.edu/disclosures'){

		print "<li><div class='navselect'>Consumer Info</div></li>";

	}else{

		print "<li><a href='/disclosures/'>Consumer Info</a></li>";

	}





?>