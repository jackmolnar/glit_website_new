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
    <style>
	@font-face {font-family:testfont; src:url('fonts/swz924n.TTF') }
	#test {font-family:testfont;}
	</style>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

		<title>Maintenance Technician Training Program | Erie Institute of Technology</title>

		<meta name="keywords" content="maintenance, erie, pa, electrician, electricity, hydraulics, pneumatics, electric motor control, plumbing, air conditioning, heating" />

		<meta name="description" content="Maintenance Technician Training School - Erie Institute of Technology's Maintenance Technician program trains the student in basic electricity, hydraulics, pneumatics, electric motor control, maintenance plumbing, air conditioning, programmable logic controllers, and ac dc theory."/>

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

						<? $current_program = 'maintenance_technician';
						
						include('global_includes/program_sub_menu.php'); ?>

</ul>

					</div>

					

<img alt="Maintenance Technician" style="border: 3px solid rgb(234, 234, 234); margin: 5px; float: right;" src="http://www.erieit.edu/_files/images/file_49.jpg" />
<h2 >Maintenance Technician</h2>
<h3>Overview</h3>
<hr />
<p>Do you love fixing things?&nbsp; Do you have mechanical aptitude and manual dexterity?&nbsp; Employers are offering excellent opportunities to technically skilled employees &ndash; someone like you &ndash; who can be responsible for maintaining all types of building systems.</p>

<p>In the Maintenance Technician career training program you&rsquo;ll gain the expertise that is used in making sure buildings &ndash; all types of buildings -- are properly maintained.&nbsp; Computerized controls may do a lot of the work in maintaining proper temperature, humidity, light, security, access and general monitoring of the functioning building.&nbsp; But, you&rsquo;ll be needed for maintenance analysis and diagnosis, troubleshooting electrical and plumbing applications, hydraulics, pneumatics, industrial air conditioning, and building systems. Plus you&rsquo;ll learn the OSHA and National Electric Codes, and train for your refrigeration certification.&nbsp; So to the question &ndash; &ldquo;Where could EIT graduates work?&rdquo;&nbsp; The answer &ndash; &ldquo;Anywhere there are buildings.&quot;</p>

<h3>Virtual Tour Video</h3><p>
<iframe width="500" height="281" src="http://www.youtube.com/embed/TuvBnajNWv8" frameborder="0" allowfullscreen></iframe>

				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>



	</body>

</html>







