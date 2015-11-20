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

		<title>Erie CNC Machinist Technician Training School | Erie Institute of Technology</title>

		<meta name="keywords" content="cnc machining, machining, cnc, erie, pa, drill presses, mills, lathes, grinders, cnc milling, cnc turning, setting up cnc machines" />

		<meta name="description" content="Erie CNC School - Erie Machinist School - Erie Institute of Technology's CNC Machinist Technician program trains the student in drill presses, mills, lathes, grinders, cnc milling, cnc turning, setting up cnc machines, and computer numerical control programs."/>

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

						<? $current_program = 'cnc_machinist_technician';
						
						include('global_includes/program_sub_menu.php'); ?>

</ul>

					</div>

					

<img src="http://www.erieit.edu/_files/images/file_53.jpg" alt="CNC/Machinist Technician" style="border: 3px solid rgb(234, 234, 234); float: right; margin: 5px;" />
<h2>CNC / Machinist Technician</h2>
<h3>Overview</h3>
<hr />
<p>CNC machines have radically changed the manufacturing industry. Curves are as easy to cut as straight lines, complex 3-D structures are relatively easy to produce, and the number of steps that require human action have been considerably reduced.</p>
<p>In the CNC / Machinist Technician career training program you will get your hands on drill presses, mills, lathes, and grinders, then advance to CNC milling and CNC turning.&nbsp; You will learn to efficiently set up and run CNC machines.&nbsp; Be capable of controlling the 3 axes of lathes and mills through Computer Numerical Control programs.&nbsp; Problem solving skills, troubleshooting techniques and use of engineering materials and processes learned at EIT will enable you to take your place in tomorrow&rsquo;s industry.</p>

<h2>Virtual Tour</h2>
<iframe  width="510" height="287" src="http://www.youtube.com/embed/dx6O8_XBmJo" frameborder="0" allowfullscreen></iframe>

				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>



	</body>

</html>







