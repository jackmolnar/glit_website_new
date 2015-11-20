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

		<title>Erie Multimedia Graphic Design Training School | Erie Institute of Technology</title>

		<meta name="keywords" content="graphic design, web design, school, erie, pa, photoshop, illustrator, dreamweaver, 3D modeling, video game design, digital illustration, digital photography, maya, html, indesign" />

		<meta name="description" content="Erie Graphic Design School- Erie Institute of Technology's Multimedia Graphic Design training program trains the student in graphic design, web design, 3D modeling, video game design, digital illustration, and digital photography."/>

		<meta name="robots" content="index, follow" />

<meta name="googlebot" content="noodp">

		<link href="_scripts/master.css" rel="stylesheet" type="text/css" />
        
        <meta property="og:title" content="Multi Media Graphic Design" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://erieit.edu/multimedia_graphic_design.php" />
<meta property="og:image" content="http://erieit.edu/_images/fb_open_graph/mgd.jpg" />
<meta property="fb:admins" content="jonathan.molnar.5"/>


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

						<? $current_program = 'multimedia_graphic_design';
						
						include('global_includes/program_sub_menu.php'); ?>
                        
                         
                        </ul>

					</div>

<h2>Multimedia Graphic Design</h2>

<h3>Overview</h3>

<hr />

<iframe width="510" height="287" src="http://www.youtube.com/embed/XE11YE7j7Ck" frameborder="0" allowfullscreen></iframe>

<p>In the Multimedia Graphic Design career training program at EIT you will learn design fundamentals as well as gain education in the newest design software including Adobe Photoshop, Illustrator, InDesign, Dreamweaver, and Flash.<br />

<br />

If you have artistic talent, you might want to design corporate logos, magazine layouts, or posters. Or maybe video game design or 3D animation appeals to you.&nbsp; You could even express yourself through creative web design.</p>

<p>Combine computers with art. EIT gives you a digital education. You already love what you&rsquo;re doing, so imagine getting paid to do digital illustration, desktop publishing, web design &amp; development, digital photography, 3D modeling, multimedia presentation design, video game design and more. EIT is one of only a hand-full of schools on the east coast that teaches Maya, which is widely used by film and video artists, game developers, and visualization professionals in today&rsquo;s graphic-rich media.</p>

<p><br />



<!-- DISCLOSURES -->
<!-- DISCLOSURES -->
<!-- DISCLOSURES -->
<!-- DISCLOSURES -->



<!-- END DISCLOSURES -->










				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>



	</body>
    
    

</html>







