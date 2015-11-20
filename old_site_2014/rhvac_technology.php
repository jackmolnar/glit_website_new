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

	<head prefix="og: http://ogp.me/ns#">

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        
        <meta property="og:title" content="Erie HVAC Training School - Erie Institute of Technology" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://erieit.edu/rhvac_technology.php" />
<meta property="og:image" content="http://erieit.edu/_images/rhvac.jpg" />

		<title>Erie HVAC Training School (Heating, Ventilation, Air Conditioning, and Refrigeration) | Erie Institute of Technology in Erie PA - Enroll in our HVAC Training Program Today!</title>

		<meta name="keywords" content="hvac, rhvac, hvac-r, erie, pa, residential, commercial, industrial, refrigeration, heating, ventilation, air conditioning, electricity, electronics, heat pumps, and environmental control systems" />

		<meta name="description" content="Erie HVAC School - Erie Heating, Ventilation, Air Conditioning, and Refrigeration Training - Erie Institute of Technology's HVAC Technology program trains the student in residential, commercial, and industrial refrigeration, heating, ventilation, air conditioning, electricity, electronics, heat pumps, and environmental control systems."/>

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

				<p><img alt="#" src="_images/programs_electronics.jpg"  /></p>

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

						<? $current_program = 'rhvac_technology';
						
						include('global_includes/program_sub_menu.php'); ?>

</ul>

					</div>

					

<h2>Heating, Ventilation, Air Conditioning, and Refrigeration (RHVAC) Technology</h2>
<h3>Overview</h3>
<hr />

<iframe width="510" height="287" src="http://www.youtube.com/embed/nePzkMGWcNA" frameborder="0" allowfullscreen></iframe>
<p>In the Heating, Ventilation, Air Conditioning, and Refrigeration (RHVAC) Technology career training program you&nbsp;will learn how to install, adjust, troubleshoot, maintain, and repair residential and commercial refrigeration, heating, ventilation and air conditioning equipment for proper operation and efficiency.&nbsp; You will gain skills in installing RHVAC units, including electronic and mechanical components; ductwork installation, including flexible tubing and sheet metal; installation and repair of fuel and water supply lines; installation and recycling of refrigerants; installation and repair of electrical connections to RHVAC components; and the installation and repair of RHVAC system automation components.<br />

<img src="_images/rhvac.jpg" style="float:none" alt="HVAC Technology Training Program"/>

				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>



	</body>

</html>







