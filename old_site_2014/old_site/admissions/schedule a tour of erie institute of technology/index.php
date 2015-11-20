<?php

	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "../../";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "../../_admin/class/class_config.php";

		include "../../_admin/class/class_db.php";

		include "../../_admin/class/class_time.php";

	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;

		include "../../_face/class/face_common.php";

		include "../../_face/class/mimemail/htmlMimeMail.php";

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

		<title><? echo $cfg->site_title; ?> | Schedule a Tour of Erie Institute of Technology</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="" />

		<meta name="description" content=""/>

		<meta name="robots" content="index, follow" />

		<link href="../../_scripts/master.css" rel="stylesheet" type="text/css" />

		<script src="../../_scripts/js/mootools.v1.11.js" type="text/javascript" ></script>

		<script src="../../_scripts/js/validation.js" type="text/javascript"></script>

		<style>

			th{vertical-align:top; text-align:right;};

			.validation-failed {

				border: 1px solid #990000;

				clear:both;	

			}

			.validation-passed {	

			}

			.validation-advice {

				margin: 2px; 

				padding: 2px; 

				color:#fff; 

				background-color:#990000;

			}

		</style>

	</head>

	<body>

		<div id="masterframe">

			<div id="header">

				<div id="search">

					<span style="text-align:right; color:#360; font-family:'Arial Black', Gadget, sans-serif; font-size:10px">FOLLOW US!</span><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.facebook.com/erieinstituteoftechnology" layout="button_count" width="200"></fb:like>

				</div>

			</div>

			<div id="menu">

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

			<div id="subtop">

				<img src="../../_images/why_eit.jpg" alt="#" />

				<div id="subtopleft">

				<?

					$num = rand(1,7);

					print "<img src='../../_images/quote_00".$num.".gif' />";

				?>

				</div>

			</div>

			<table>

				<tr>

					<td id="subcontent">

						<div id="leftmenu">

							<ul><?

if($common->checkurlForPageName("overview")){

print "<li><div class='leftselect'>Overview</div></li>";

}else{

print "<li><a href='".$depth."admissions/overview/'>Overview</a></li>";

}

if($common->checkurlForPageName("admission%20requirements")){

print "<li><div class='leftselect'>Admission Requirements</div></li>";

}else{

print "<li><a href='".$depth."admissions/admission requirements/'>Admission Requirements</a></li>";

}

if($common->checkurlForPageName("campus%20tour")){

print "<li><div class='leftselect'>Campus Tour</div></li>";

}else{

print "<li><a href='".$depth."admissions/campus tour/'>Campus Tour</a></li>";

}

if($common->checkurlForPageName("financial%20aid")){

print "<li><div class='leftselect'>Financial Aid</div></li>";

}else{

print "<li><a href='".$depth."admissions/financial aid/'>Financial Aid</a></li>";

}

if($common->checkurlForPageName("student%20services")){

print "<li><div class='leftselect'>Student Services</div></li>";

}else{

print "<li><a href='".$depth."admissions/student services/'>Student Services</a></li>";

}

if($common->checkurlForPageName("career%20planning%20placement")){

print "<li><div class='leftselect'>Career Planning & Placement</div></li>";

}else{

print "<li><a href='".$depth."admissions/career planning placement/'>Career Planning & Placement</a></li>";

}

if($common->checkurlForPageName("request%20more%20information")){

print "<li><div class='leftselect'>Request More Information</div></li>";

}else{

print "<li><a href='http://erieit.edu/admissions/request%20more%20information/'>Request More Information</a></li>";

}

if($common->checkurlForPageName("apply%20online")){

print "<li><div class='leftselect'>Apply Online</div></li>";

}else{

print "<li><a href='".$depth."admissions/apply online/'>Apply Online</a></li>";

}

if($common->checkurlForPageName("schedule%20a%20tour%20of%20erie%20institute%20of%20technology")){

print "<li><div class='leftselect'>Schedule a Tour of EIT</div></li>";

}else{

print "<li><a href='".$depth."admissions/schedule a tour of erie institute of technology/'>Schedule a Tour of EIT</a></li>";

}

?></ul>

						</div>

					</td>

					<td id="rightcontent">

						<?



	if($_REQUEST['submit_application']){



		$name = $_REQUEST['name'];



		$address = $_REQUEST['address'];



		$city = $_REQUEST['city'];



		$state = $_REQUEST['state'];



		$zip = $_REQUEST['zip'];



		$home_phone = $_REQUEST['home_phone'];



		$date = $_REQUEST['date'];

		

		$alt_date = $_REQUEST['alt_date'];



		$email = $_REQUEST['email'];



			$program_count = $_REQUEST['program_count'];



		$program_array = $_REQUEST['program'];

        

		//for($i=0; $i<count($program_count); $i++){



			//$program_array[$i] = $_REQUEST['program_$i'];



		//}





//CONSTRUCT HTML EMAIL BODY





$body = "



<table ><tr >

<td width='125' height='25'><strong>Name</strong>:</td><td> $name </td>

</tr><tr>

<td width='125' height='25'><strong>Address</strong>:</td><td>$address</td>

</tr><tr>

<td width='125' height='25'><strong>City</strong>:</td><td>$city</td>

</tr><tr>

<td width='125' height='25'><strong>State</strong>:</td><td>$state</td>

</tr><tr>

<td width='125' height='25'><strong>Zip Code</strong>:</td><td>$zip</td>

</tr><tr>

<td width='125' height='25'><strong>Home Phone</strong>:</td><td> $home_phone </td>

</tr><tr>

<td width='125' height='25'><strong>Date Available for Tour</strong>:</td><td> $date </td>

</tr><tr>

<td width='125' height='25'><strong>Alternate Date Available</strong>:</td><td> $alt_date </td>

</tr><tr>

<td width='125' height='25'><strong>Email</strong>:</td><td> $email </td>

<tr><td><strong>Program</strong>:</td><td>";

$p = count($program_array);

for ($i=0; $i<=$p; $i++)

{

	$body.= $program_array[$i]." <br/>";

	

}



echo ("</td></tr></table>");





//CONSTRUCT TEXT EMAIL BODY



$body_notags ="



<table ><tr >

<td width='125' height='25'><strong>Name</strong>:</td><td> $name </td>

</tr><tr>

<td width='125' height='25'><strong>Address</strong>:</td><td>$address</td>

</tr><tr>

<td width='125' height='25'><strong>City</strong>:</td><td>$city</td>

</tr><tr>

<td width='125' height='25'><strong>State</strong>:</td><td>$state</td>

</tr><tr>

<td width='125' height='25'><strong>Zip Code</strong>:</td><td>$zip</td>

</tr><tr>

<td width='125' height='25'><strong>Home Phone</strong>:</td><td> $home_phone </td>

</tr><tr>

<td width='125' height='25'><strong>Date Available for Tour</strong>:</td><td> $date </td>

</tr><tr>

<td width='125' height='25'><strong>Alternate Date Available</strong>:</td><td> $alt_date </td>

</tr><tr>

<td width='125' height='25'><strong>Email</strong>:</td><td> $email </td>

<tr><td><strong>Program</strong>:</td><td>";

$p = count($program_array);

for ($i=0; $i<=$p; $i++)

{

	$body_notags.= $program_array[$i]." <br/>";

	

}

echo ("</td></tr></table>");



//

if (isset($_COOKIE["goerie"]))

{

	$messageSubject = "Erie Institute of Technology - Tour Request - $name - From goerie.com";

	}elseif (isset($_COOKIE["reachlocal"])){

$messageSubject = "Erie Institute of Technology - Tour Request - $name - From REACH LOCAL PPC";

}elseif (isset($_COOKIE["reachlocal_display"])){

$messageSubject = "Erie Institute of Technology - Tour Request - $name - From REACH LOCAL DISPLAY";

} else {

$messageSubject = "Erie Institute of Technology - Tour Request - $name";

}

			$mail = new htmlMimeMail();



			$mail->setHtml($body, $body_notags);

			

			$mail->setReturnPath('info@erieit.edu');



			$mail->setFrom('contact_us@erieit.edu');



			$mail->setSubject($messageSubject);



			$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');

			

			//SEND TO BELOW /

			

			if (isset($_COOKIE["goerie"]))

{

			if($mail->send(array('info@glit.edu','info@erieit.edu'), 'mail')){

				

				print "<h1>Thank you for Submitting an Application!</h1>";



			}else{



				print "<h1>An error has occured!</h1>";



				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}

			

}elseif (isset($_COOKIE["reachlocal"])){

	

	if($mail->send(array('info@glit.edu', 'jonm@glit.edu','info@erieit.edu'), 'mail')){

				

				print "<h1>Thank you for Submitting an Application!</h1>";



			}else{



				print "<h1>An error has occured!</h1>";



				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}
			
			}elseif (isset($_COOKIE["reachlocal_display"])){

	

	if($mail->send(array('info@glit.edu', 'jonm@glit.edu','info@erieit.edu'), 'mail')){

				

				print "<h1>Thank you for Submitting an Application!</h1>";



			}else{



				print "<h1>An error has occured!</h1>";



				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}

			

}else{

	

	if($mail->send(array('info@glit.edu','info@erieit.edu'), 'mail')){

				

				print "<h1>Thank you for Submitting an Application!</h1>";



			}else{



				print "<h1>An error has occured!</h1>";



				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}

}

			

		}else{



				print "



						<h2>Schedule a Tour</h2>



<hr />



<br/>*Fields Are Required



<br />";







//SEND TO danb@glit.edu

//<form name='form_step_1' id='form_step_1' action='step two/index2.php' method='post'>

		print "



			<form action='' method='post' name='final' id='final'>

			



				<table cellpadding='5' cellspacing='5'>



					";



			/******/



				print "<tr>



							<th>Date Available</th>



							<td><input  type='text' name='date' value='$date' size='50' /></td>



						</tr>";



			/******/



				print "<tr>



							<th>Alternate Date</th>



							<td><input type='text' name='alt_date' value='$alt_date' size='50'  /></td>



						</tr>";



			/******/



				print "<tr>



							<th>Name</th>



							<td><input  type='text' name='name' value='$name' size='50' /></td>



						</tr>";



			/******/



				print "<tr>



							<th>Address</th>



							<td><input  type='text' name='address' value='$address'  size='50' /></td>



						</tr>";



			/******/



				print "<tr>



							<th>City</th>



							<td><input  type='text' name='city' value='$city'  size='50' /></td>



						</tr>";



			/******/



				print "<tr>



							<th>State</th>



							<td><input  type='text' name='state' value='$state'  size='15' /></td>

							

							</tr><tr>

							

							<th>Zip Code</th>



							<td><input  type='text' name='zip' value='$zip'  size='15' /></td>



						</tr>";



			/******/



				print "<tr>



							<th>Home Phone</th>



							<td><input  type='text' name='home_phone' value='$home_phone' size='30' /></td>



						</tr>";





			/******/



				

				print "<tr>



							<th>Email Address</th>



							<td><input type='text' name='email' value='$email' size='50' /></td>



						</tr>";



	/******/





				print "<tr>



							<td colspan='2'><h3>Programs of Interest</h3></td>



						</tr>";



				$program_list = array("Biomedical Equipment Technology",



									  "Business Office Professional",

									  

									  "CNC / Machinist Technician",



									  "Electrician",



									  "Electronic Engineering Technology",



									  "Electronics Technician",



									  "Industrial Automation & Robotics Technology",



									  "Maintenance Technician",



									  "Multimedia Graphic Design",



									  "Network & Database Professional",



									  "RHVAC Technology",



									  "Welding Technology",



									);



			for($i=0;$i<count($program_list);$i++){



					print "<tr><td><input type='hidden' name='program_count' value='".count($program_list)."' /></td>";



					if($program_values[$i]){



						print "<td><input type='checkbox' id='program_$i' name='program[]' selected='selected' value='".$program_list[$i]."'/> ".$program_list[$i]."</td></tr>";



					}else{



						print "<td><input type='checkbox' id='program_$i' name='program[]' value='".$program_list[$i]."'/> ".$program_list[$i]."</td></tr>";



					}



				}



			/******/



					

					

				print "<tr>



						<td colspan='2' align='right'><input type='submit' name='submit_application' value='Submit Request' /></td>



					</tr>



				</table>



			</form>



			<script type='text/javascript'>new FormValidator ('final');</script>



		";

		}



print "



					</td>



				</tr>



			</table>";

               

          ?>

					</td>

				</tr>

			</table>

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

				</div>		</div>

		<div id="footer">

			<?php

		function getYear(){

		$theday = getdate();

		$y = $theday[year];

		return $y;

	}

?>

<p><a target="_blank" href="http://www.glit.edu"><img width="107" height="41" border="0" align="middle" alt="Visit the Great Lakes Institute of Technology Website" src="http://www.erieit.edu/_files/images/glit_logo.png" /></a><a href="http://www.youtube.com/thecareerschools" target="_blank"><img width="80" height="41" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_120.png" alt="See EIT videos on YouTube.com/thecareerschools" /></a>&nbsp;&nbsp; <a href="http://www.facebook.com"><img width="100" height="38" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_118.png" alt="Become a friend of EIT

on Facebook:  thecareerschools" /></a>&nbsp;&nbsp; <a href="http://www.twitter.com/EITCareerServ" target="_blank"><img width="100" height="23" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_108.png" alt="Follow EIT Career Services Office on Twitter:  EITCareerServ" /></a><br />

Home |&nbsp;<a href="http://www.erieit.edu/alumni/">Career Services (Alumni &amp; Employers)</a>&nbsp;|&nbsp;<a href="http://www.erieit.edu/careers/">Employment</a> | <a href="http://www.erieit.edu/contact/">Contact Us</a> | <a href="http://www.erieit.edu/site map/">Site Map</a> | <a href="http://www.erieit.edu/privacy/">Privacy Policy</a> | <a href="mailto:info@erieit.edu">Webmaster</a> | <a href="http://www.glit.edu">glit.edu</a>  | <a href="http://toniguy.com/academy/erie/default.aspx">toniguy.com</a> <br />

&copy; <? echo getYear(); ?>Erie Institute of Technology, All Rights Reserved</p>

<br />

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

</html>



