<?php

//MOBILE DETECTION
if ($_REQUEST['mobile'] == 'no'){
$expire=time()+60*60;
setcookie("mobile", "no", $expire, '/', '.erieit.edu');
} else if ($_COOKIE["mobile"] == ''){
$mobile = 'http://mobile.erieit.edu';
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

		<title>Erie Computer Training School | Erie Institute of Technology - Computer Programs we offer are Multimedia Graphic Design, Network Database Professional, and Business Office Professional.</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="computer training, graphic design, web design, 3d desing, video game design, network administrator, database administrator, business, office, human resources, accounting, microsoft, word, excell, professional" />

		<meta name="description" content="Erie Computer Training School - Erie Institute of Technology's Computer training programs consist of multimedia graphic and web design, network and database administrator or professional, and business office professional."/>

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

				<p><img src="_images/programs_mgd.jpg" alt="#" /></p>

				<div id="subtopleft">

				<?

					$num = rand(1,7);

					print "<img src='_images/quote_00".$num.".gif' />";

				?>

				</div>

			</div>

			<div id="subcontent">

				<div id="leftmenu">

					<ul>
                    
                    <? include('global_includes/computer_menu.php'); ?>
                    
                    
                    
                    </ul>

				</div>

				<div id="rightcontent">

					<h2>Computer Programs</h2>

<hr />

<img style="border-right: rgb(234,234,234) 3px solid; border-top: rgb(234,234,234) 3px solid; float: right; margin: 5px; border-left: rgb(234,234,234) 3px solid; border-bottom: rgb(234,234,234) 3px solid" alt="Erie Computer Programs" src="http://www.erieit.edu/_files/images/file_24.jpg" /><br />

<p>Our computer programs provide education and training for the technical careers in demand around the country.</p>

<ul>

    <li>Multimedia Graphic Design - AST*</li>

    <li>Network and Database Professional- AST*</li>

    <li>Business Office Professional- Diploma</li>

</ul>

<br />

<p style="font-size: 10px">*Associate in Specialized Technology degree</p>

				</div>				



				

			</div><br clear="all" />



<? include('global_includes/footer.php'); ?>



	</body>

</html>



