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

		<title>Erie Electrician Training School | Erie Institute of Technology in Erie PA - Enroll in our Electrical Training Program Today!</title>

		<meta name="keywords" content="electrician, erie, pa, residential electricity, commercial electricity, industrial electricity, circuit design, transformers, electric luminaires, ac dc motors, low voltage motor control circuits, programmable logic controllers, industrial controls" />

		<meta name="description" content="Erie Electrician School - Erie Institute of Technology's Electrician program in Erie PA trains the student in residential, commercial, and industrial electricity, circuit design, transformers, electric luminaires, ac dc motors, low voltage motor control circuits, programmable logic controllers, and industrial controls."/>

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

						<? $current_program = 'electrician';
						
						include('global_includes/program_sub_menu.php'); ?>

</ul>

					</div>

					

<h2>Electrician</h2>
<h3>Overview</h3>

<hr />
           <img width="200" height="183" style="border: 3px solid rgb(234, 234, 234); margin: 5px; float: right;" src="http://www.erieit.edu/_images/electrician.jpg" alt="" />
<p>Upon completion of  the Electrical Technology Program, students will understand the  practices and applications found in residential, commercial and  industrial electricity. Students will be  qualified for entry level employment in the electrical field in positions which include electrician, electricians&rsquo; helper, electrical  technician, electrical maintenance technician and utility technician. </p>
Students will:<br /><br />
<ul>
<li>Become familiar with power systems in homes, businesses, and factories</li>
<li>Maintain electrical systems and install them in new construction</li>
<li>Become familiar with tools of the electrical trade</li>
<li>Learn national electrical code requirements</li>
</ul>

<h2>Virtual Tour</h2>
<iframe width="510" height="287" src="http://www.youtube.com/embed/A2o8WXrYvgU" frameborder="0" allowfullscreen></iframe>

    </tbody>
</table>






				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>



	</body>

</html>







