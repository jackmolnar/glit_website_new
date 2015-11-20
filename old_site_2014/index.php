<?php


if ($_GET['from']=='newspaper'){
$expire=time()+60*60*24*30;
setcookie("newspaper", "yes", $expire, '/', 'erieit.edu');
$phone_number = '814-474-7808';
} 

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

		<title>Erie Institute of Technology | Technical School Training for Computer, Electronics, Manufacturing, Technology, Welding, Careers in Erie and Northwest Pennsylvania</title>

<meta name="google-site-verification" 

content="VHIwFyBziWdINZtx1zcdtz4htpmmLlZsI27iJOCX_io" />

<meta name="y_key" content="b68c96dd8c0740d0">

<meta name="msvalidate.01" content="932E54236588192F9B15AAFA7CE15D7B" />


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>


<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

<link rel="icon" href="favicon.ico" type="image/x-icon" />





		<meta name="keywords" content="erie institute of technology, technical school, trade school, tech school, vocational school, college, erie, erie technology, erie job, erie career, computer training school, electronics training school, advanced manufacturing training school, Pennsylvania, Ohio, New York, computer training academy, computer training institute, electronic engineering technology, electronics technician training, biomedical equipment technician, Microsoft IT Academy, multimedia graphic design, web design, 3d animation, Maya, video game design, computer network, network security, database, Cisco technician, industrial automation, PLC, programmable logic control, robotics,  CNC, machining, manufacturing, maintenance, machinist, refrigeration, HVAC, RHVAC, air conditioning, welding, MIG, TIG, cutting torch, plasma cutting, pipe welding, metal fabrication" />

<meta name="description" content="Erie Electronics, Computer, Technical, and Manufacturing Training School. Erie Institute of Technology or EIT educates students in Biomedical Equipment, Business, CNC Machining, Electrician, Electronic Engineering, Electronics,Automation and Robotics, Maintenance,Graphic Design, Network and Database, Refrigeration, Heating, Ventilation, and Air Conditioning or RHVAC, and Welding. We serve Erie, Northwest Pennsylvania, Ohio, and New York residents. "/>

	<!--	<meta name="description" content="Erie Institute of Technology or EIT is a computer, electronics, technical, manufacturing, welding, graphic design, and electrician career training school in Erie Pennsylvania. We educate students in Biomedical Equipment, Business, CNC Machining, Electrician, Electronic Engineering, Electronics,Automation and Robotics, Maintenance,Graphic Design, Network and Database, Refrigeration, Heating, Ventilation, and Air Conditioning or RHVAC, and Welding. We serve Erie, Northwest Pennsylvania, Ohio, and New York residents."/> -->

		<meta name="robots" content="index, follow" />

		<link href="_scripts/master.css" rel="stylesheet" type="text/css" /> 
        
        

<script type="text/javascript" src="_scripts/slimbox.js"></script>

<script src="_scripts/js/mootools.v1.11.js" type="text/javascript" ></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
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

</head>

	<body>

<div id="framehome">

			<div id="masterframe">

				<div id="header">

					<div id="search">
                
                <? include('global_includes/head_contact.php'); ?>
                
				</div>

				</div>

				<div id="menu" style="margin-top:4px;">

			
                   <ul>


                 
                    
                    <? include('global_includes/main_menu.php'); ?>
                    
                   
                    </ul>


				</div>

			</div>

			<div id="content">

				<div id="htop">
                  
<? include ('swf_test.php'); ?>

	      </div>

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
	  $title = $row['title'];
	  
	  $clean_title = str_ireplace(" ", "_", $title);
	  
	  
	  echo "<li class='odd'><a href='".$clean_title.".html'><span class='date'>".$row['date']."</span>".$title."</a></li>";
	  
	  
  }

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

<p>Erie Institute of Technology or EIT is an Erie Pennsylvania technical or trade school providing training programs for computer, electronics, manufacturing, technology careers.<br><br>Training programs include Welding, RHVAC, Electrican, Graphic Design, CNC, Network and Database Administrator, and Biomedical Equipment Technology.</p>

				</div>

				<br clear="all" />

<? include('global_includes/footer.php'); ?>

	</body>
    

</html>

