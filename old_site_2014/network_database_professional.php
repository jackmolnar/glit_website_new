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
    
    <meta property="og:title" content="Network and Database Program - Erie Institute of Technology"/>
    <meta property="og:type" content="school"/>
    <meta property="og:url" content="http://erieit.edu/network_database_professional.php"/>
    <meta property="og:image" content="http://erieit.edu/_images/fb_open_graph/ndp.jpg"/>
    <meta property="og:site_name" content="Erie Institute of Technology"/>
    <meta property="og:description"
          content="Erie Network and Database Adminstrator Training School - Erie IT School - Erie Institute of Technology's Network &amp; Database Professional program trains the student in computers, IT, networking, security, exchange server, and database server."/>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

		<title>Erie Network and Database Professional Training Program | Erie Institute of Technology</title>

		<meta name="keywords" content="network administrator, database administrator, erie, pa, linux, legacy, cisco, networking, it security, it, exchange server" />

		<meta name="description" content="Erie Network and Database Adminstrator Training School - Erie IT School - Erie Institute of Technology's Network &amp; Database Professional program trains the student in computers, IT, networking, security, exchange server, and database server."/>

		<meta name="robots" content="index, follow" />

<meta name="googlebot" content="noodp">

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

						<? $current_program = 'network_database_professional';
						
						include('global_includes/program_sub_menu.php'); ?>
                        
                         
                        </ul>

					</div>


<h2>Network and Database Professional</h2>

<h3>Overview</h3>

<hr />

<iframe width="510" height="287" src="http://www.youtube.com/embed/xOFzw0T6BSg" frameborder="0" allowfullscreen></iframe>
<br /><br />
<p>With the growth of the Internet, networking and infrastructure management are areas of IT that are developing rapidly, especially with new developments in wireless communication and wireless networking. LAN and WAN systems can range from a connection between two offices in the same building to globally distributed networks, voice mail, and e-mail systems of a multinational organization.</p>

<p>In the Network and Database Professional career training program you learn to deploy networks, ensures reliability and consistency of the network, handles problems, and reduces the risk of network failure. Database administrators perform report generation, backup management, security management, and performance monitoring and tuning &ndash; you&rsquo;ll make sure data is secure, available and is used productively.</p>








				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>



	</body>

</html>







