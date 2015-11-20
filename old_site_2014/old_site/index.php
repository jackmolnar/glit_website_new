<?php

	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "_admin/class/class_config.php";

		include "_admin/class/class_db.php";

		include "_admin/class/class_time.php";

	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;

		include "_face/class/face_common.php";

		include "_face/class/face_events.php";

		include "_face/class/face_news.php";

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

		<link rel="shortcut icon" href="favicon.ico">

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

		<title><? echo $cfg->site_title; ?> | Home</title>

<meta name="google-site-verification" 

content="VHIwFyBziWdINZtx1zcdtz4htpmmLlZsI27iJOCX_io" />

		<meta name="keywords" content="erie institute of technology, technical school, trade school, tech school, vocational school, college, erie, erie technology, erie job, computer training school, electronics training school, advanced manufacturing training school, Pennsylvania, Ohio, New York, computer training academy, computer training institute, electronic engineering technology, electronics technician training, biomedical equipment technician, Microsoft IT Academy, multimedia graphic design, web design, 3d animation, Maya, video game design, computer network, network security, database, Cisco technician, industrial automation, PLC, programmable logic control, robotics,  CNC, machining, manufacturing, maintenance, machinist, refrigeration, HVAC, RHVAC, air conditioning, welding, MIG, TIG, cutting torch, plasma cutting, pipe welding, metal fabrication" />

		<meta name="description" content="description" content="Erie Institute of Technology or EIT is a computer, electronics, technical, and manufacturing technology training school located in Erie Pennsylvania. Our goal is educating students from Pennsylvania, New York, and Ohio in Biomedical Equipment Technology, Business Office Professional, CNC Technician, Electrician, Electronic Engineering Technology, Electronics Technician, Industrial Automation and Robotics Technology, Maintenance Technician, Multimedia Graphic Design, Network and Database Technologies, Refrigeration, Heating, Ventilation, and Air Conditioning or RHVAC Technology, and Welding Technology."/>

		<meta name="robots" content="index, follow" />

		<link href="_scripts/master.css" rel="stylesheet" type="text/css" /> 

<script type="text/javascript" src="_scripts/slimbox.js"></script>

<script src="_scripts/js/mootools.v1.11.js" type="text/javascript" ></script>

<script src="_scripts/js/swfobject.js" type="text/javascript" ></script>

<script type="text/javascript" language="javascript">	

			window.addEvent('domready', function(){

				var so = new SWFObject('_images/flash/home.swf', 'home', '760', '225', '8', '#f2f2f2');

				so.write('htop');

			}); 

		</script>

<link rel="stylesheet" href="_scripts/slimbox.css" type="text/css" media="screen" />

<script type="text/javascript" language="javascript">	

	window.addEvent('domready', function(){

		Lightbox.show('_images/postit.jpg', 'Erie Institute of Technology  Latest News');

	}); 

</script>

</head>

	<body>

<div id="framehome">

			<div id="masterframe">

				<div id="header">

					<div id="search">

						<form action="search/" method="post">

							<input class="txt" name="keys" type="text" value="Search..." maxlength="50" onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...';"/>

							<input class="img" type="image" src="_images/searchtxt.gif" alt="Search" border="0"/>

						</form>

					</div>

				</div>

				<div id="menu">

					<!-- <block></block> --> 

                    <ul><?

	if($common->checkurlForPageName("INDEX")){

		print "<li><div class='navselect'>Home</div></li>";

	}else{

		print "<li><a href='".$depth."index.php'>Home</a></li>";

	} 

	if($common->checkurlForPageName("why%20eit")){

		print "<li><div class='navselect'>Why EIT?</div></li>";

	}else{

		print "<li><a href='".$depth."why eit/our mission/'>Why EIT?</a></li>";

	}

	if($common->checkurlForPageName("programs") ){

		print "<li><div class='navselect'>Programs</div></li>";

	}else{

		print "<li><a href='".$depth."programs/'>Programs</a></li>";

	}

	if($common->checkurlForPageName("admissions")){

		print "<li><div class='navselect'>Admissions</div></li>";

	}else{

		print "<li><a href='".$depth."admissions/overview/'>Admissions</a></li>";

	}

	if($common->checkurlForPageName("stafffaculty")){

		print "<li><div class='navselect'>Staff/Faculty</div></li>";

	}else{

		print "<li><a href='".$depth."stafffaculty/'>Staff/Faculty</a></li>";

	}

	if($common->checkurlForPageName("newsevents")){

		print "<li><div class='navselect'>News/Events</div></li>";

	}else{

		print "<li><a href='".$depth."newsevents/'>News/Events</a></li>";

	}

	if($common->checkurlForPageName("contact")){

		print "<li><div class='navselect'>Contact</div></li>";

	}else{

		print "<li><a href='".$depth."contact/'>Contact</a></li>";

	}





	print "<li><a href='http://www.thecareerschools.com'>The Career Schools</a></li>";





?></ul>

				</div>

			</div>

			<div id="content">

				<div id="htop"></div>

				<div id="hnews">

					<!-- <block></block> -->

                    <h4>News/Events</h4>

<ul><?

		//EVENTS

			$events = new face_events($db, $cfg, $time);

			$events_list = array();

			$time = time();

			$year = date('Y', $time);

			$month = date('n', $time);

			$events_list = $events->view_month_events($year, $month, 0, 4);

		//NEWS

			$news = new face_news($db, $cfg, $time);

			$news_list = array();

			$news_list = $news->view(0,0,4);

		//

			$results_array = array_merge($events_list, $news_list);

		//

			if(count($results_array)>0){

				$test=true;

				for($i=0;$i<count($results_array);$i++){

					if($results_array[$i]['id']>0){

						$date = $common->DateFormat($results_array[$i]['date'], "M j");

						if ($test==true) {

							print "<li class='odd'><a href='".$depth."newsevents/?theid=".$results_array[$i]['id']."&type=".$results_array[$i]['type']."'><span class='date'>".$date."</span>".$results_array[$i]['title']."</a></li>";

						}else {

							print "<li class='even'><a href='".$depth."newsevents/?theid=".$results_array[$i]['id']."&type=".$results_array[$i]['type']."'><span class='date'>".$date."</span>".$results_array[$i]['title']."</a></li>";

						}

						$test=!$test;

					}

				}

			}else{

				print "<li class='even'><a href='#'>There are no news or events to display.</a></li>";

			}

?></ul>

				</div>

				<div class="hpod">

					<h4>Contact</h4>

					Erie Institute of Technology<br />

					940 Millcreek Mall<br />

					Erie, PA 16565<br />

					<br />

					Phone: (814) 868-9900<br />

					Fax: (814) 868-9977<br />

					Toll-free: (866) 868-ERIE (3743)<br /><br />

					<a href="directions/"> <img src="_images/directions.gif" alt="Take a Tour" /> </a>

				</div>

				<div class="hpod">

					<h4>Campus Tour</h4>

					<img src="_images/tour.jpg" alt="#" />

					<p>Take a 3D tour of the EIT Campus and visit our school from your home. </p>

					<a href="admissions/campus tour/"> <img src="_images/tour.gif" alt="Take a Tour" /> </a>

				</div>

				<br clear="all" />

				



				<div class="hblob">

					<a href="http://erieit.edu/contact/"><img src="<? echo $depth;?>_images/contact.png" alt="#" /></a>

				</div>

<div class="hblob">

					<a href="http://erieit.edu/admissions/schedule%20a%20tour%20of%20erie%20institute%20of%20technology/"><img src="<? echo $depth;?>_images/schedule_tour.png" alt="#" /></a>

				</div>

				<div class="hblob">

					<a href="http://erieit.edu/admissions/apply%20online/"><img src="<? echo $depth;?>_images/apply_online.png" alt="#" /></a>

				</div>

                <div class="hblob">

					<a href="http://erieit.edu/admissions/request%20more%20information/"><img src="<? echo $depth;?>_images/req_more_info.png" alt="#" /></a>

				</div>



			</div>

			<div id="footer">

				<!-- <block></block> -->

<?php

		function getYear(){

		$theday = getdate();

		$y = $theday[year];

		return $y;

	}

?>

<p><a target="_blank" href="http://www.youtube.com/thecareerschools"><img height="41" alt="See EIT videos on YouTube.com/thecareerschools" width="80" align="middle" border="0" src="http://www.erieit.edu/_files/images/file_120.png" /></a>  <a href="http://www.facebook.com"><img height="38" alt="Become a friend of EIT on Facebook:  thecareerschools" width="100" align="middle" border="0" src="http://www.erieit.edu/_files/images/file_118.png" /></a> <a target="_blank" href="http://www.twitter.com/EITCareerServ"><img height="23" alt="Follow EIT Career Services Office on Twitter:  EITCareerServ" width="100" align="middle" border="0" src="http://www.erieit.edu/_files/images/file_108.png" /></a><br />

<p><a href="http://www.erieit.edu">Home</a> | <a href="http://www.erieit.edu/alumni/">Career Services (Alumni & Employers)</a> | <a href="http://www.erieit.edu/contact/">Contact Us</a> | <a href="http://www.erieit.edu/site map/">Site Map</a> | <a href="http://www.erieit.edu/privacy/">Privacy Policy</a> | <a href="mailto:info@erieit.edu">Webmaster</a> <br />

© <? echo getYear(); ?> Erie Institute of Technology, All Rights Reserved</p>			

</div>

		</div>





<script type="text/javascript">

var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");

document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

</script>

<script type="text/javascript">

var pageTracker = _gat._getTracker("UA-2137940-3");

pageTracker._initData();

pageTracker._trackPageview();





</script>

	</body>

<img src="http://ad.reachlocal.com/pixel?id=1048490&id=1048499&t=2" width="1" height="1" />


</html>

<?

	//CLOSE OUT CONNECTION TO THE DATABASE

		$db->DB_CLOSE($database_connection);

?>





















































































































