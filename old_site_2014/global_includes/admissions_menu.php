<?

$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

if($url == 'http://erieit.edu/admissions.php'){

print "<li><div class='leftselect'>Overview</div></li>";

}else{

print "<li><a href='admissions.php'>Overview</a></li>";

}

if($url == 'http://erieit.edu/admissions_requirements.php'){

print "<li><div class='leftselect'>Admission Requirements</div></li>";

}else{

print "<li><a href='admissions_requirements.php'>Admission Requirements</a></li>";

}

if($url == 'http://erieit.edu/campus_tour.php'){

print "<li><div class='leftselect'>Campus Tour</div></li>";

}else{

print "<li><a href='campus_tour.php'>Campus Tour</a></li>";

}

if($url == 'http://erieit.edu/financial_aid.php'){

print "<li><div class='leftselect'>Financial Aid</div></li>";

}else{

print "<li><a href='financial_aid.php'>Financial Aid</a></li>";

}

if($url == 'http://erieit.edu/student_services.php'){

print "<li><div class='leftselect'>Student Services</div></li>";

}else{

print "<li><a href='student_services.php'>Student Services</a></li>";

}

if($url == 'http://erieit.edu/request_more_information.php'){

print "<li><div class='leftselect'>Request More Information</div></li>";

}else{

print "<li><a href='request_more_information.php'>Request More Information</a></li>";

}

if($url == 'http://erieit.edu/apply_online.php'){

print "<li><div class='leftselect'>Apply Online</div></li>";

}else{

print "<li><a href='apply_online.php'>Apply Online</a></li>";

}

if($url == 'http://erieit.edu/schedule_a_tour.php'){

print "<li><div class='leftselect'>Schedule a Tour of EIT</div></li>";

}else{

print "<li><a href='schedule_a_tour.php'>Schedule a Tour of EIT</a></li>";

}

?>