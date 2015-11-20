<?php

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

		<title>Admissions | Erie Institute of Technology</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="" />

		<meta name="description" content=""/>

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

				<ul><?

	include('global_includes/main_menu.php'); ?>

</ul>

			</div>

		</div>

		<div id="content">

			<div id="subtop">

				<img src="_images/why_eit.jpg" alt="#" />

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
                            
                            <? include('global_includes/admissions_menu.php'); ?>
                            
                            
                            </ul>

						</div>

					</td>

					<td id="rightcontent">

						<h2>Admissions</h2>

<hr />

<p><img style="border-right: rgb(234,234,234) 3px solid; border-top: rgb(234,234,234) 3px solid; border-left: rgb(234,234,234) 3px solid; border-bottom: rgb(234,234,234) 3px solid" height="213" alt="Bryan Boyce - EIT Admissions Rep" width="160" src="http://www.erieit.edu/_files/images/file_22.jpg" /></p>

<p>Your arrival here means you've taken a significant and important step in doing something about your career dream. Now, EIT's job is to supply you with the information necessary to launch this passion of yours into a career you can be proud of.</p>

<p>EIT welcomes applications from all persons whose academic records or personal background suggest that they may benefit from our programs. Erie Institute of Technology is an equal opportunity institution, admitting students and employees without regard to race, color, religion, national/ethnic origin, sex, age, handicap, financial status or military status. Employment and placement practices adhere to the same non-discrimination policy.</p>

					</td>

				</tr>

			</table><br clear="all" />

				

<? include('global_includes/footer.php'); ?>

</body>

</html>





