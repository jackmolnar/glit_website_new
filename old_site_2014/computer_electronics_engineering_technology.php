<?php



$reachlocal = strpos($_SERVER['HTTP_REFERER'], 'reachlocal');
if ($reachlocal>''){
	$expire=time()+60*60*24*30;
	setcookie("reachlocal", "yes", $expire);
}

//MOBILE DETECTION
if ($_REQUEST['mobile'] == 'no'){
$expire=time()+60*60;
setcookie("mobile", "no", $expire, '/', '.erieit.edu');
} else if ($_COOKIE["mobile"] == ''){
$mobile = 'http://mobile.erieit.edu'.$_SERVER["REQUEST_URI"];
} else if ($_COOKIE["mobile"] == 'no') {
	
}

$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");

if ($iphone || $android || $palmpre || $ipod || $berry == true) 
{ 
header('Location: '.$mobile);

}
//END MOBILE DETECTION




	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "_admin/class/class_config.php";

		include "_admin/class/class_db.php";

		include "_admin/class/class_time.php";

	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;

		include "_face/class/face_common.php";


	//CREATE OUR CONFIG

		$cfg = new class_config();

	//CREATE OUR DATABASE

		$db = new class_db($cfg->db_host,$cfg->db_name,$cfg->db_user,$cfg->db_pass);

	//CREATE OUR TIME

		$time = new class_time($db, $cfg);

	//CREATE OUR COMMON CLASS

		$common = new face_common();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

		<title>Computer & Electronics Engineering Technology Training Program | Erie Institute of Technology</title>

		<meta name="keywords" content="electronics, engineering, computer, erie, pa, dc, ac, active components, circuit design, microprocessors, computer networking, computer programming" />

		<meta name="description" content="Computer &amp; Electronics Engineering Technology Training School- Erie Institute of Technology's Computer &amp; Electronics Engineering Technology program trains the student Electronics, DC, AC, Active Components, Circuit Design, Microprocessors, Computer Networking, and Computer Programming."/>

		<meta name="robots" content="index, follow" />


		<link href="_scripts/master.css" rel="stylesheet" type="text/css" />

	</head>

	<body>

		<div id="masterframe">

			<div id="header">

				<div id="search">
                
                <? include('global_includes/head_contact.php'); ?>
                
				</div>

			</div>

			<div id="menu">

				<ul>
				
				<? include('global_includes/main_menu.php'); ?>
                
                </ul>

			</div>

		</div>

		

		<div id="content">

			<div id="subtop">

				<p><img alt="#" src="_images/programs_electronics.jpg" /></p>

				<div id="subtopleft">

				<?

					$num = rand(1,7);

					print "<img src='_images/quote_00".$num.".gif' />";

				?>

				</div>

			</div>

<table>

<tr>

			<td id="subcontent">

				<div id="leftmenu">

					<ul>
					
					<? include('global_includes/short_form.php');?>
                    
                    </ul>

				</div>

			</td>

				<td id="rightcontent">

					<div id="rightcontentmenu">

						<? $current_program = 'computer_electronics_engineering_technology';
						
						include('global_includes/program_sub_menu.php'); ?>

</ul>

					</div>

					<h2>Electronics Engineering Technology</h2>

<h3>Overview</h3>

<hr />

<iframe width="510" height="287" src="http://www.youtube.com/embed/hnC8qcRcLGQ" frameborder="0" allowfullscreen></iframe>
<p>
<p>This program will prepare students for entry assignments in the Electronic Engineering Field. The in-depth science and mathematics is sufficient to qualify graduates for entry-level Engineering Technician positions in field service, research and development, broadcast and other associated engineering functions.</p>

<h4>Certifications</h4>

<p>The Computer and Engineering Technology Program will prepare the student for electronics certification exams offered by ISCET (International Society of Certified Electronics Technicians) and ETA (Electronics Technicians Association). Holders of the ISCET and ETA certifications possess knowledge in electronics industry standards, troubleshooting techniques, test equipment and installation procedures.
</p>






				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>



	</body>

</html>






