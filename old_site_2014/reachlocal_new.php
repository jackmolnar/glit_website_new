<?php

$expire=time()+60*60*24*30;
setcookie("reachlocal", "yes", $expire);


function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 $findme = 'reachlocal.net';
 $if_rl = strpos($pageURL, $findme);
 return $if_rl;

 
}

echo curPageURL();

//echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

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

		<title>Erie Institute of Technology | Technical School Training for Computer, Electronics, Manufacturing, and Technology Careers.</title>

<meta name="google-site-verification" 

content="VHIwFyBziWdINZtx1zcdtz4htpmmLlZsI27iJOCX_io" />

<meta name="y_key" content="b68c96dd8c0740d0">

<meta name="msvalidate.01" content="932E54236588192F9B15AAFA7CE15D7B" />





<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

<link rel="icon" href="favicon.ico" type="image/x-icon" />





		<meta name="keywords" content="erie institute of technology, technical school, trade school, tech school, vocational school, college, erie, erie technology, erie job, erie career, computer training school, electronics training school, advanced manufacturing training school, Pennsylvania, Ohio, New York, computer training academy, computer training institute, electronic engineering technology, electronics technician training, biomedical equipment technician, Microsoft IT Academy, multimedia graphic design, web design, 3d animation, Maya, video game design, computer network, network security, database, Cisco technician, industrial automation, PLC, programmable logic control, robotics,  CNC, machining, manufacturing, maintenance, machinist, refrigeration, HVAC, RHVAC, air conditioning, welding, MIG, TIG, cutting torch, plasma cutting, pipe welding, metal fabrication" />

		<meta name="description" content="Erie Institute of Technology or EIT is a computer, electronics, technical, and manufacturing career training school in Erie Pennsylvania. We educate students from Pennsylvania, New York, and Ohio in Biomedical Equipment, Business, CNC Machining, Electrician, Electronic Engineering, Electronics,Automation and Robotics, Maintenance,Graphic Design, Network and Database, Refrigeration, Heating, Ventilation, and Air Conditioning or RHVAC, and Welding."/>

		<meta name="robots" content="index, follow" />

<meta name="googlebot" content="noodp">

		<link href="_scripts/master.css" rel="stylesheet" type="text/css" /> 

<script type="text/javascript" src="_scripts/slimbox.js"></script>

<script src="_scripts/js/mootools.v1.11.js" type="text/javascript" ></script>

<script src="_scripts/js/swfobject.js" type="text/javascript" ></script>

<script type="text/javascript" language="javascript">	

			window.addEvent('domready', function(){

				var so = new SWFObject('home.swf', 'home', '760', '225', '8', '#f2f2f2');

				so.write('htop');

			}); 

		</script>

<link rel="stylesheet" href="_scripts/slimbox.css" type="text/css" media="screen" />

<script type="text/javascript" language="javascript">	

	window.addEvent('domready', function(){

		Lightbox.show('_images/postit.jpg', 'Erie Institute of Technology  Latest News');

	}); 

</script>

<style type="text/css">

<!--

-->

</style>

<!-- Experiment Control -->
<script>
function utmx_section(){}function utmx(){}
(function(){var k='2785177795',d=document,l=d.location,c=d.cookie;function f(n){
if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.indexOf(';',i);return escape(c.substring(i+n.
length+1,j<0?c.length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;
d.write('<sc'+'ript src="'+
'http'+(l.protocol=='https:'?'s://ssl':'://www')+'.google-analytics.com'
+'/siteopt.js?v=1&utmxkey='+k+'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='
+new Date().valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"></sc'+'ript>')})();
</script><script>utmx("url",'A/B');</script>
<!-- Experiment Control -->
<!-- Experiment Tracking -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['gwo._setAccount', 'UA-7126988-1']);
  _gaq.push(['gwo._trackPageview', '/2785177795/test']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- Experiment Tracking -->

</head>

	<body>

<div id="framehome">

			<div id="masterframe">

				<div id="header">

					<div id="search">
                
                <? include('global_includes/head_contact.php'); ?>
                
				</div>

				</div>

				<div id="menu">

					<!-- <block></block> --> 

                    <ul>
                    
                    <? include('global_includes/main_menu.php'); ?>
                    
                    </ul>

				</div>

			</div>

			<div id="content">

				<div id="htop"></div>

				<div id="hnews" style="height:262px;">

					<!-- <block></block> -->

                    <h4>News/Events</h4>

<ul><?

		   
		   

$con = mysql_connect("internal-db.s33581.gridserver.com","db33581_werkbot","mullet79");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


$result = mysql_query("SELECT * FROM news_table ORDER BY id DESC LIMIT 0, 5");

while($row = mysql_fetch_array($result))
  {
	  
	  echo "<li class='odd'><a href='newsevents.php?theid=".$row['id']."'><span class='date'>".$row['date']."</span>".$row['title']."</a></li>";
	  
	  
  }








//print "<li class='odd'><a href='".$depth."newsevents.php?theid=".$results_array[$i]['id']."&type=".$results_array[$i]['type']."'><span class='date'>".$date."</span>".$results_array[$i]['title']."</a></li>";


		//
		//
		//
		//EVENTS
/*
			$events = new face_events($db, $cfg, $time);

			$events_list = array();

			$time = time();

			$year = date('Y', $time);

			$month = date('n', $time);

			$events_list = $events->view_month_events($year, $month, 0, 4);

		//NEWS

			$news = new face_news($db, $cfg, $time);

			$news_list = array();

			$news_list = $news->view(0,0,5);

		//

			$results_array = array_merge($events_list, $news_list);

		//

			if(count($results_array)>0){

				$test=true;

				for($i=0;$i<count($results_array);$i++){

					if($results_array[$i]['id']>0){

						$date = $common->DateFormat($results_array[$i]['date'], "M j");

						if ($test==true) {

							

						}else {

							print "<li class='even'><a href='".$depth."newsevents.php?theid=".$results_array[$i]['id']."&type=".$results_array[$i]['type']."'><span class='date'>".$date."</span>".$results_array[$i]['title']."</a></li>";

						}

						$test=!$test;

					}

				}

			}else{

				print "<li class='even'><a href='#'>There are no news or events to display.</a></li>";

			}
*/
?>





</ul>

				</div>

				<div class="hpod" style="line-height:20px; font-size:10px;">

					<h4>Career Training Programs</h4>
      
                    <? include("global_includes/program_list.php"); ?>

				</div>

				<div class="hpod" style="height:262px;">

					<h4>About Erie Institute of Technology</h4>

                                        <img src="_images/eit_outside.jpg" alt="#" />

<p>Erie Institute of Technology or EIT is an Erie Pennsylvania technical or trade school providing training programs for computer, electronics, manufacturing, and technology careers.<br><br>Training programs include Welding, RHVAC, Electrican, Graphic Design, CNC, Network and Database Administrator, and Biomedical Equipment Technology.</p>

				</div>

				<br clear="all" />

<? include('global_includes/footer.php'); ?>

	</body>
    
     <img src="http://ad.reachlocal.com/pixel?id=1048490&id=1048499&t=2" width="1" height="1" />

</html>

<?
	//CLOSE OUT CONNECTION TO THE DATABASE

		$db->DB_CLOSE($database_connection);

?>





















































































































































































































