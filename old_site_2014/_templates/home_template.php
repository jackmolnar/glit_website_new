<?php

	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "[DEPTH]";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "[DEPTH]_admin/class/class_config.php";

		include "[DEPTH]_admin/class/class_db.php";

		include "[DEPTH]_admin/class/class_time.php";

	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;

		include "[DEPTH]_face/class/face_common.php";

		include "[DEPTH]_face/class/face_events.php";

		include "[DEPTH]_face/class/face_news.php";

	//CREATE OUR CONFIG

		$cfg = new class_config();

	//CREATE OUR DATABASE

		$db = new class_db($cfg->db_host,$cfg->db_name,$cfg->db_user,$cfg->db_pass);

	//CREATE OUR TIME

		$time = new class_time($db, $cfg);

	//CREATE OUR COMMON CLASS

		$common = new face_common();

	//CONNECT TO OUR DATABASE

		$database_connection = $db->DB_CONNECT();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

		<title><? echo $cfg->site_title; ?> | [TITLE]</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="" />

		<meta name="description" content=""/>

		<meta name="robots" content="index, follow" />

		<link href="[DEPTH]_scripts/master.css" rel="stylesheet" type="text/css" />

		<script src="[DEPTH]_scripts/js/mootools.v1.11.js" type="text/javascript" ></script>

    	<script src="[DEPTH]_scripts/js/swfobject.js" type="text/javascript" ></script>

		<script type="text/javascript" language="javascript">	

			window.addEvent('domready', function(){

				var so = new SWFObject('[DEPTH]_images/flash/home.swf', 'home', '760', '200', '8', '#f2f2f2');

				so.write('htop');

			}); 

		</script>

	</head>

	<body>

		<div id="framehome">

			<div id="masterframe">

				<div id="header">

					<div id="search">

						<form action="[DEPTH]search/" method="post">

							<input class="txt" name="keys" type="text" value="Search..." maxlength="50" onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...';"/>

							<input class="img" type="image" src="[DEPTH]_images/searchtxt.gif" alt="Search" border="0"/>

						</form>

					</div>

				</div>

				<div id="menu">

					<block id='0' name='Global_Menu' description='The_main_menu_for_the_site' default='0'></block>

				</div>

			</div>

			<div id="content">

				<div id="htop"></div>

				<div id="hnews">

					<block id='1' name='Home_News/Events' description='List_of_news/events_displayed_on_the_home_page' default='0'></block>

				</div>

				<div class="hpod">

					<h4>Contact</h4>

					Erie Institute of Technology<br />

					940 Millcreek Mall Drive<br />

					Erie, PA 16565<br />

					<br />

					Phone: (814) 868-9900<br />

					Fax: (814) 868-9977<br />

					<br />

					<a href="http://maps.google.com/maps?f=l&hl=en&geocode=&q=&near=940+Millcreek+Mall+Drive+Erie+PA+16565&sll=42.119591,-80.115685&sspn=0.010966,0.020084&ie=UTF8&om=1&z=16&iwloc=addr"> <img src="[DEPTH]_images/directions.gif" alt="Take a Tour" /> </a>

				</div>

				<div class="hpod">

					<h4>Campus Tour</h4>

					<img src="[DEPTH]_images/tour.jpg" alt="#" />

					<p>Take a 3D tour of the EIT Campus and visit our school from your home. </p>

					<a href="admissions/campus tour/"> <img src="_images/tour.gif" alt="Take a Tour" /> </a>

				</div>

				<br clear="all" />

				<div class="hblob">

					<a href="admissions/tell%20a%20friend/"><img src="<? echo $depth;?>_images/chat.gif" alt="#" /></a>

				</div>

				<div class="hblob">

					<a href="contact/"><img src="<? echo $depth;?>_images/phone.gif" alt="#" /></a>

				</div>

				<div class="hblob">

					<a href="admissions/apply%20online/"><img src="<? echo $depth;?>_images/apply.gif" alt="#" /></a>

				</div>

			</div>

			<div id="footer">

				<block id='2' name='Global_Footer' description='Global_footer_details' default='0'></block>

			</div>

		</div>

	</body>

</html>

<?

	//CLOSE OUT CONNECTION TO THE DATABASE

		$db->DB_CLOSE($database_connection);

?>



