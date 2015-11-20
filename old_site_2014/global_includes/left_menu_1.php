<?

$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

if($url == 'http://erieit.edu/programs.php'){

		print "<li><div class='leftselect'>Program Overview</div></li>";

	}else{

		print "<li><a href='programs.php'>Program Overview</a></li>";

	} 

	if($url == 'http://erieit.edu/success_stories.php'){

		print "<li><div class='leftselect'>Success Stories</div></li>";

	}else{

		print "<li><a href='success_stories.php'>Success Stories</a></li>";

	} 


	if($url == 'http://erieit.edu/links_of_interest.php'){	

		print "<li><div class='leftselect'>Links of Interest</div></li>";	

	}else{		

		print "<li><a href='links_of_interest.php'>Links of Interest</a></li>";	} 

?>