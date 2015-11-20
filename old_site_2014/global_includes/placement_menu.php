<?

$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

if($url == 'http://erieit.edu/career_planning_placement.php'){

print "<li><div class='leftselect'>Career Planning and Placement</div></li>";

}else{

print "<li><a href='career_planning_placement.php'>Career Planning and Placement</a></li>";

}

if($url == 'http://erieit.edu/employer_form.php'){

print "<li><div class='leftselect'>Employer Job Submission Form</div></li>";

}else{

print "<li><a href='employer_form.php'>Employer Job Submission Form</a></li>";

}


?>