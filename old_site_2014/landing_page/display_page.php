<?
$expire=time()+60*60*24*30;
setcookie("reachlocal_display", "yes", $expire);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Erie Institute of Technology - Erie PA's premier short-term technology training school.</title>

<meta name="robots" content="index,follow, noodp" /> 
<meta name="description" content="Erie Institute of Technology offers focused short-term training in computers, electronics, manufacturing, welding, and electricity." /> 
<meta name="keywords" content="EIT, Erie Institute of Technology, Erie, PA, Technology, School, Training, Classes, Computers, Electronics, Manufacturing, Welding, Electrician, CNC, Maintenance, Career College " /> 



<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $("#testimonial1").click(function(){
    $("#testimonial_box1").show();
	$("#testimonial_box2").css("display","none");
	$("#testimonial_box3").css("display","none");
  });
   $("#testimonial1_close").click(function(){
    $("#testimonial_box1").hide();
  });
   $("#testimonial2").click(function(){
    $("#testimonial_box2").show();
	$("#testimonial_box1").css("display","none");
	$("#testimonial_box3").css("display","none");
  });
   $("#testimonial2_close").click(function(){
    $("#testimonial_box2").hide();
  });
     $("#testimonial3").click(function(){
    $("#testimonial_box3").show();
	$("#testimonial_box1").css("display","none");
	$("#testimonial_box2").css("display","none");
  });
   $("#testimonial3_close").click(function(){
    $("#testimonial_box3").hide();
  });
  
  $(":text").focus(function(){
	old_attribute =  $(this).attr("value"); 
   $(this).attr("value", "");
  });
  $(":text").blur(function(){
	  new_attribute = $(this).attr("value");
	  if(new_attribute == "")
	  {
		  $(this).attr("value", old_attribute);
	  }
  });
});



</script>



<link href="css/display_landing.css" rel="stylesheet" type="text/css" />

<?
include "../global_includes/mimemail/htmlMimeMail.php";

?>

</head>

<body style="background-color:#036; background-image:url(images/back.jpg); background-position:center top; background-repeat:no-repeat;">

<div id="wrapper" >
<div id="logo"><a href="http://www.erieit.edu"><img src="images/logo.jpg" width="320" height="100" alt="Erie Institute of Technology" /></a></div>
<div id="contact_info"><span style="font-size:20px">Call Today!<br>814.868.9900<br /></span><span style="font-size:10px">Toll Free: 1.866.868.3743<br />940 Millcreek Mall<br />Erie, PA 16565</span></div>
<div id="line"></div>
<div id="main_image">
<div id="main_text">
<span style="font-size:18px">EIT provides great technology training</span><br /><span style="font-size:28px;">for the careers of tomorrow.</span>
<br /><br />
Whether you're just starting on your career path or looking to expand your career opportunities, EIT is committed to helping you achieve your goals. </div>
</div>

<div id="form_side">
<div id="phone_text">Call Us at <span style="color:#FF9">814-868-9900</span></div>
<div id="req_text">Or <span style="color:#FF9">Request For More Information</span> Below</div>
<div id="the_form">

<?



	if($_REQUEST['submit_application']){

		$first_name = $_REQUEST['first_name'] == 'First Name*' ? '' : $_REQUEST['first_name'];

		$middle_initial = $_REQUEST['middle_initial'] == 'Middle Initial' ? '' : $_REQUEST['middle_initial'];

		$last_name = $_REQUEST['last_name'] == 'Last Name*' ? '' : $_REQUEST['last_name'];

		$address = $_REQUEST['address'] == 'Address*' ? '' : $_REQUEST['address'];

		$city = $_REQUEST['city'] == 'City*' ? '' : $_REQUEST['city'];

		$state = $_REQUEST['state'] == 'State*' ? '' : $_REQUEST['state'];

		$zip = $_REQUEST['zip'] == 'Zip Code*' ? '' : $_REQUEST['zip'];

		$home_phone = $_REQUEST['home_phone'] == 'Home Phone*' ? '' : $_REQUEST['home_phone'];

		$cell_phone = $_REQUEST['cell_phone'] == 'Cell Phone' ? '' : $_REQUEST['cell_phone'];

		$work_phone = $_REQUEST['work_phone'] == 'Work Phone' ? '' : $_REQUEST['work_phone'];

		$email = $_REQUEST['email'] == 'Email Address*' ? '' : $_REQUEST['email'];

		$program_count = $_REQUEST['program_count'];

		$program_array = $_REQUEST['program'];

		$date_of_birth = $_REQUEST['date_of_birth'] == 'Date of Birth' ? '' : $_REQUEST['date_of_birth'];


//
		//If email is send, include the responder info
		include ('../global_includes/responder.php');



//CONSTRUCT HTML EMAIL BODY





$body = "



<table ><tr >

<td width='125' height='25'><strong>First Name</strong>:</td><td> $first_name </td>

</tr><tr>

<td width='125' height='25'><strong>Middle Initial</strong>:</td><td> $middle_initial </td>

</tr><tr>

<td width='125' height='25'><strong>Last Name</strong>:</td><td> $last_name </td>

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

<td width='125' height='25'><strong>Cell Phone</strong>:</td><td> $cell_phone </td>

</tr><tr>

<td width='125' height='25'><strong>Work Phone</strong>:</td><td> $work_phone </td>

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



<strong>First Name</strong>: $first_name <br/>



<strong>Middle Initial</strong>: $middle_initial <br/>



<strong>Last Name</strong>: $last_name <br/>



<strong>Address</strong>: $address $city $state $zip<br/>



<strong>Home Phone</strong>: $home_phone <br/>



<strong>Cell Phone</strong>: $cell_phone <br/>



<strong>Work Phone</strong>: $work_phone <br/>



<strong>Email</strong>: $email <br/>";



$p = count($program_array);

for ($i=0; $i<=$p; $i++)

{

	$body_notags.= $program_array[$i]." <br/>";

	

}

echo ("</td></tr></table>");



//

if (isset($_COOKIE["goerie"]))

{

	$messageSubject = "Erie Institute of Technology - Display Landing Page - Online Request - $first_name $last_name";
	
	}elseif (isset($_COOKIE["reachlocal_display"])){

$messageSubject = "Erie Institute of Technology - Display Landing Page - Online Request - $first_name $last_name";

}elseif (isset($_COOKIE["reachlocal"])){

$messageSubject = "Erie Institute of Technology - Display Landing Page - Online Request - $first_name $last_name";



	

} else {

$messageSubject = "Erie Institute of Technology - Display Landing Page - Online Request - $first_name $last_name";

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

			if($mail->send(array('info@glit.edu', 'jonm@glit.edu', 'ashleyd@glit.edu'), 'mail')){
				
				$responder->send(array($email), 'mail');

				print "<h3>Thank you for Submitting an Application!</h3>";

			}else{

				print "<h3>An error has occured!</h3>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";

			}
			
			}elseif (isset($_COOKIE["reachlocal_display"])){

	if($mail->send(array('info@glit.edu', 'jonm@glit.edu', 'ashleyd@glit.edu'), 'mail')){

				$responder->send(array($email), 'mail');

				print "<h3>Thank you for Submitting an Information Request!</h3><span style='font-size:12px; width:275px;'>An admissions representative will contact you shortly. In the mean time log in to the email account you provided and read some additional information we have sent you regarding the programs you showed an interest in.</span>";

			}else{

				print "<h3>An error has occured!</h3>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}

}elseif (isset($_COOKIE["reachlocal"])){

	if($mail->send(array('info@glit.edu', 'jonm@glit.edu', 'ashleyd@glit.edu'), 'mail')){

			$responder->send(array($email), 'mail');	

				print "<h3>Thank you for Submitting an Information Request!</h3><span style='font-size:12px; width:275px;'>An admissions representative will contact you shortly. In the mean time log in to the email account you provided and read some additional information we have sent you regarding the programs you showed an interest in.</span>";

			}else{

				print "<h3>An error has occured!</h3>";

				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";

			}
			
}else{

	

	if($mail->send(array('info@glit.edu', 'jonm@glit.edu', 'ashleyd@glit.edu'), 'mail')){

				print "<h3>Thank you for Submitting an Information Request!</h3><span style='font-size:12px; width:275px;'>An admissions representative will contact you shortly. In the mean time log in to the email account you provided and read some additional information we have sent you regarding the programs you showed an interest in.</span>";

$responder->send(array($email), 'mail');

			}else{

				print "<h3>An error has occured!</h3>";



				print "<p>We are sorry for the inconvenience, you may try to submit again.</p>";



			}

}

			

		}else{


//SEND TO danb@glit.edu

//<form name='form_step_1' id='form_step_1' action='step two/index2.php' method='post'>

		print "

			<form action='' method='post' name='final' id='final'>

				<table cellpadding='1' cellspacing='1' style='font-size:12px;'>";

			/******/



				print "<tr>

							<td><input  type='text' name='first_name' onclick=clickclear('First Name*') value='First Name*' onblur='recalltext('First Name*')' onclick='cleartext('First Name*')' size='30' /></td>
							
							<td><input  type='text' name='last_name' value='Last Name*' size='30' /></td>

						</tr>";
			/******/

				print "<tr>

							<td ><input type='text' name='middle_initial' value='Middle Initial' size='10'  /></td>
							
							<td><input  type='text' name='date_of_birth' value='Date of Birth*' size='30' /></td>
		

						</tr>";

			/******/

				print "<tr>


							<td ><input  type='text' name='address' value='Address*'  size='30' /></td>
							
							<td><input  type='text' name='city' value='City*'  size='30' /></td>
						

						</tr>";

			/******/

				print "<tr>

							
							
							<td><input  type='text' name='state' value='State*'  size='30' /></td>
							
							<td><input  type='text' name='zip' value='Zip Code*'  size='30' /></td>

						</tr>";



			/******/



				print "<tr>

							<td><input  type='text' name='home_phone' value='Home Phone*' size='30' /></td>
							
							<td><input type='text' name='work_phone' value='Cell Phone' size='30' /></td>

						</tr>";



			/******/


			

							print "<tr>

							<td ><input type='text' name='work_phone' value='Work Phone' size='30' /></td>
							
								<td ><input type='text' name='email' value='Email Address*' size='30' /></td>


						</tr>";


	

	/******/

				print "<tr>



							<td colspan='2' height='25'><span style='font-size:12px; font-weight:bold;'>Programs of Interest (check all that apply)</span></td>



						</tr>
						
				

						
						
						
						";



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



					print "<tr><td colspan='2'><input type='hidden' name='program_count' value='".count($program_list)."' />";



					if($program_values[$i]){



						print "<input type='checkbox' id='program_$i' name='program[]' selected='selected' value='".$program_list[$i]."'/> ".$program_list[$i]."</td></tr>";



					}else{



						print "<input type='checkbox' id='program_$i' name='program[]' value='".$program_list[$i]."'/> ".$program_list[$i]."</td></tr>";



					}



				}



			/******/



					

					

				print "<tr>

<td align='left' style='font-size:10px; color:#666;'>
						
					Erie Institute of Technology respects your privacy. EIT will never share your personal information with third parties.
						
						
						</td>


						<td colspan='2' align='right'>
						
						<input " ?> onclick="track_req_info();" <? print "type='submit' name='submit_application' value='   ' id='submit_button' />
						
						
						</td>



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

</div>
</div>


<div id="right_side">
<span style="font-size:18px; font-weight:bold; color:#039">Find out how EIT can help you take the first step!</span>
<br />
<br />
Conveniently located at the Millcreek Mall in Erie, PA, EIT is an easy commute for students from Pennsylvania, New York, and Ohio. We provide a wide variety of training services to our students.
<p >Consider these benefits of EIT:
<ul>
<li>Focused electronics, computer, and advanced manufacturing curricula</li>
<br />
<li>Practical hands-on laboratory training along with classroom instruction</li>
<br />
<li>Learn from instructors who have years of industry experience in their fields</li>
<br />
<li>Job placement assistance and preparation for tomorrow's job market</li>
<br />
<li>Financial Aid available to those who qualify</li>
</ul>
If you would like to move forward in your career or get the education necessary to begin a new one, contact us today.

<br /><br />
<span style="font-size:13px; font-weight:bold; color:#063; text-align:center;">Find Out What Employers Say About EIT! Click Below!</span>
<br /><br />
<span id="testimonial1">Patrick Kilgallon - Erie Times News</span>
<br />
<span id="testimonial2">Chris Norris - Erie Seawolves</span>
<br />
<span id="testimonial3">Richard Welton - Composiflex</span>



<div id="testimonial_box1">
<div class="testimonial_containter">
<div id="testimonial1_close">X Close</div>
<div class="testimonial_photo"><img src="images/testimonials/patrick_kilgallon.jpg" width="155" height="202" alt="Patrick Kilgallon" /></div>
<div class="testimonial_text">
<span style="font-weight:bold;">
Patrick Kilgallon<br />
Technology Service Manager<br />
Erie Times News<br />
</span>
<br />
"In filling any position I look for someone who has a fundamental knowledge of the skills needed. EIT students are getting the necessary training I need and when hired become more productive in a shorter timeframe."
</div>
</div>
</div>

<div id="testimonial_box2">
<div class="testimonial_containter">
<div id="testimonial2_close">X Close</div>
<div class="testimonial_photo"><img src="images/testimonials/chris_norris.jpg" width="155" height="202" alt="Chris Norris" /></div>
<div class="testimonial_text">
<span style="font-weight:bold;">
Chris Norris<br />
Director of Entertainment<br />
Erie Seawolves<br />
</span>
<br />
"The EIT student working with us always put forth maximum effort in every project assigned. Both the student and the student's work ethic exemplified the professionalism portrayed by EIT and their program."
</div>
</div>
</div>


<div id="testimonial_box3">
<div class="testimonial_containter">
<div id="testimonial3_close">X Close</div>
<div class="testimonial_photo"><img src="images/testimonials/richard_welton.jpg" width="155" height="202" alt="Richard Welton" /></div>
<div class="testimonial_text">
<span style="font-weight:bold;">
Richard Welton<br />
CNC Supervisor<br />
Composiflex<br />
</span>
<br />
"In today's advancing technology in the CNC Machining field it is a real asset to have a school like EIT to provide us with skilled entry level machinists."
</div>
</div>
</div>




</div>






<div id="bottom">
<div id="bottom_text">
<a href="http://www.erieit.edu">Erie Institute of Technology</a><br />814-868-9900  -  Toll Free 1-866-868-3743  -  <a href="http://www.erieit.edu">erieit.edu</a>  -  940 Millcreek Mall  -  Erie, PA 16565<br /><br />
<span id="disclaimer">For more information about our graduation rates, the median debt of students who completed the program, and other important information,<br />please visit our website at <a href="http://www.erieit.edu/disclosures">erieit.edu/disclosures</a></span>
</div>
</div>

</div>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3586660-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

  function track_req_info(){
	  _gaq.push(['_trackPageview', '/landing_page/display_page_submitted.php']);
  }
  
  
</script>




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