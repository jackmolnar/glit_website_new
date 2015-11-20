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

		<title>Industrial Automation and Robotics Technology Training Program | Erie Institute of Technology</title>

		<meta name="keywords" content="industrial automation, automation, robotics, erie, pa, install, clalibrate, troubleshoot, repair, electro mechanical, devices, programmable logic controls, motor controls, relays, timers, hydraulic components, pneumatic components." />

		<meta name="description" content="Industrial Automation &amp; Robotics Technology Training School- Erie Institute of Technology's Industrial Automation &amp; Robotics Technology program trains the student in installation, calibration, troubleshooting, and repairing sophisticated electro mechanical devices including programmable logic and motor controls, relays and timers, and hydraulic and pneumatic components."/>

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

						<? $current_program = 'industrial_automation_robotics_technology';
						
						include('global_includes/program_sub_menu.php'); ?>

</ul>

					</div>

					

<img src="http://www.erieit.edu/_files/images/file_45.jpg" style="border: 3px solid rgb(234, 234, 234); margin: 5px; float: right;" alt="Erie Technology Careers" />
<h2>Industrial Automation &amp; Robotics Technology</h2>
<h3>Overview</h3>
<hr />

<p>Many of today&rsquo;s industrial processes, assembly, and warehousing rely on automation and robotics. Even though this equipment may have reduced manual labor, the human touch is still necessary to make it all work.</p>
<p>Automation and Robotics Technicians install, calibrate, troubleshoot, and repair sophisticated electro-mechanical devices including programmable logic and motor controls, relays and timers, and hydraulic and pneumatic components, in addition to sensor and transducers for measurements of temperature, pressure, flow, position and motion. With your core training in electronics you&rsquo;ll learn how the various types of robots, such as cylindrical, rectilinear, spherical, and jointed spherical are used in virtually any kind of industrial automated production equipment and robotics system.</p>

				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>


<div id="disclosures1">

<a name="consumer_info">Consumer Information</a> | 
Program Name: 
Industrial Automation & Robotoics Technology | 

SOC Code: 17-3024.01 - Robotics Technicians
<a href="http://www.onetonline.org/link/summary/17-3024.01">http://www.onetonline.org/link/summary/17-3024.01</a> | 

Award Level: 
Diploma | 

Program Length: 
18 Months | 


Program Costs (effective 7/1/12): Tuition: $20,025.00 Registration Fee: $100.00 Technology Fee: $300.00 Lab Fees: $2,225.00 Books (Estimated): $3,000.00 Equipment / Supplies (Estimated): $400.00 | 

On-time Completion Rate: 
No graduates in date range of 1/08 – 12/08. | 
Job placement rates as reported on the 2011 ACCSC annual report: 
No graduates in date range of 1/08 – 12/08. | 

Job Titles: 
NA | 

Employers: 
NA | 
Median Loan Debt of Graduates (graduated 2011 – 2012): No grads in 2011 – 2012
</div>


	</body>
    
    

</html>







