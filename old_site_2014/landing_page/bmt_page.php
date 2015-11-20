<?
$expire=time()+60*60*24*30;
setcookie("reachlocal_display", "yes", $expire);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<head>
<meta http-equiv="Cache-Control" content="no-store" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Biomedical Equipment Technician - Erie Institute of Technology - Erie PA's premier short-term technology training school.</title>

<meta name="robots" content="index,follow, noodp" /> 
<meta name="description" content="Erie Institute of Technology offers focused short-term training in computers, electronics, manufacturing, welding, and electricity." /> 
<meta name="keywords" content="EIT, Erie Institute of Technology, Erie, PA, Technology, School, Training, Classes, Computers, Electronics, Manufacturing, Welding, Electrician, CNC, Maintenance, Career College " /> 



<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://dev.iceburg.net/jquery/jqModal/jqModal.js"></script>

<script src="../_scripts/nivo-slider/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<link rel="stylesheet" href="../_scripts/nivo-slider/nivo-slider.css" type="text/css" media="screen" />

<link href="css/bmt_landing.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet" type="text/css" />

<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="<? echo $depth ; ?>css/ie6_styles.css" />

<![endif]-->



<script type="text/javascript">
$(document).ready(function(){
	
	$('#bmt_info').click(function() { 
  $('#right_side').html('<img src="images/loader.gif" style="margin-left:50%; margin-top:50px;" />')
  $.get('text_files/bmt_content.php?c=bmt_overview', function(result) {
       $('#right_side').html(result);

    });
  });
  
  	$('#eit_info').click(function() { 
  $('#right_side').html('<img src="images/loader.gif" style="margin-left:50%; margin-top:50px;"/>')
  $.get('text_files/bmt_content.php?c=eit_overview', function(result) {
       $('#right_side').html(result);

    });
  });
  
  $('#admissions_info').click(function() { 
  $('#right_side').html('<img src="images/loader.gif" style="margin-left:50%; margin-top:50px;"/>')
  $.get('text_files/bmt_content.php?c=admissions', function(result) {
       $('#right_side').html(result);

    });
  });
  
   $('#erie_info').click(function() { 
  $('#right_side').html('<img src="images/loader.gif" style="margin-left:50%; margin-top:50px;"/>')
  $.get('text_files/bmt_content.php?c=erie_info', function(result) {
       $('#right_side').html(result);

    });
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
  
   
   
    $('#vt_dialog').jqm({ajax: 'videos/bmt_video.html', trigger: '.vt_button'});
	 $('#test_dialog').jqm({ajax: 'videos/test_video.html', trigger: '.test_button'});

  
  
});

$(window).load(function() {
    $('.nivoSlider').nivoSlider({
		effect:'random', // Specify sets like: 'fold,fade,sliceDown'
        animSpeed:1000, // Slide transition speed
        pauseTime:10000,// How long each slide will show
		 directionNav:false, // Next & Prev navigation
		 controlNav:false, // 1,2,3... navigation
		
	});
});


</script>





<?
include "../global_includes/mimemail/htmlMimeMail.php";

?>

</head>















<body style="background-color:#036; background-image:url(images/back.jpg); background-position:center top; background-repeat:no-repeat;">

<div id="wrapper" >
<div id="logo"><a href="http://www.erieit.edu"><img src="images/logo.jpg" width="320" height="100" alt="Erie Institute of Technology" /></a></div>
<div id="contact_info"><span style="font-size:20px">Call Today!<br>866.868.3743<br /></span><span style="font-size:10px">940 Millcreek Mall<br />Erie, PA 16565</span></div>
<div id="line"></div>







<div id="slider" >
<div id="headline_background">

</div>

</div>


<div id="navigation">
<ul>
<li id="bmt_info">BMET Program Overview</li>
<li id="erie_info">Living in Erie</li>
<li id="eit_info">EIT Overview</li>
<!--<li id="admissions_info">Admissions</li>-->
</ul>

</div>







<div id="right_side">

<span style="font-size:20px; font-weight:bold; color:#039; line-height:26px; margin-top:10px; ">Biomedical Equipment Technology Overview</span>
<br>
<br>
<span style="font-weight:bold; font-size:16px;">16 Month Associate Degree Program</span>
<br>
<br>
For Pittsburgh area residents looking to join the exciting field of Biomedical Equipment Repair, EIT offers a comprehensive curriculum that is well-suited for people eager to join the work force. It takes just 16 months to receive an Associate Degree in this program. Our job placement office will then assist you in finding employment in facilities across the region.
<br>
<br>
Medical Equipment Repairers play a critical role in any medical facility. Health care professionals rely on an array of critical electronic devices to diagnose and provide medical care for their patients. With lives at stake, the proper operation of this equipment is vital.
<p>
In the Biomedical Equipment Technology career training program you will learn to install, calibrate, troubleshoot, and repair medical equipment.  Combining this with medical terminology and physiology, computer networking, and biomedical equipment systems, you will work on a wide range of health-related monitoring, diagnostic, therapeutic, and surgical apparatus and instrumentation.
<br /><br />
Upon Graduating You Could Become a:
  <ul style="margin-bottom:15px;">
  <li>Biomedical Equipment Technician</li><br />
  <li>Medical Equipment Repairer</li><br />
  <li>Imaging Equipment Technician</li>
  </ul>

<div id="vt_side">
<a style="font-size:12px; font-weight:bold; color:#039; line-height:25px; text-align:center; " class="vt_button">View Our Virtual Tour To Learn More!</a>
<div id="vt_thumb" class="vt_button"></div>
</div>

<div id="test_side">
<a style="font-size:12px; font-weight:bold; color:#039; line-height:25px; text-align:center; " class="test_button">What Recent Grads Say About the Program!</a>
<div id="test_thumb" class="test_button"></div>
</div>


<div class="jqmWindow" id="vt_dialog" ></div>

<div class="jqmWindow" id="test_dialog"></div>

</div>








<div id="form_side">
<div id="phone_text">Call Us at <span style="color:#FF9">866.868.3743</span></div>
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

		$program_array = 'Biomedical Equipment Technician';

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

	$messageSubject = "Erie Institute of Technology - BMT Landing Page - Online Request - $first_name $last_name";
	
	}elseif (isset($_COOKIE["reachlocal_display"])){

$messageSubject = "Erie Institute of Technology - BMT Landing Page - Online Request - $first_name $last_name";

}elseif (isset($_COOKIE["reachlocal"])){

$messageSubject = "Erie Institute of Technology - BMT Landing Page - Online Request - $first_name $last_name";

} else {

$messageSubject = "Erie Institute of Technology - BMT Landing Page - Online Request - $first_name $last_name";

}

			$mail = new htmlMimeMail();

			$mail->setHtml($body, $body_notags);

			$mail->setReturnPath('info@erieit.edu');

			$mail->setFrom('contact_us@erieit.edu');

			$mail->setSubject($messageSubject);

			$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://www.phpguru.org)');
			
			$success_response = "<h3>Thank you for Submitting an Information Request!</h3><span style='font-size:12px; width:275px;'>An admissions representative will contact you shortly. In the mean time log in to the email account you provided and read some additional information we have sent you regarding this program.</span>";
			
			$failure_response = "<h3>An error has occured!</h3><p>We are sorry for the inconvenience, you may try to submit again.</p>";

			//SEND TO BELOW /

			if (isset($_COOKIE["goerie"]))

{

			if($mail->send(array('info@glit.edu','chrisb@glit.edu','jonm@glit.edu'), 'mail')){
				
				$responder->send(array($email), 'mail');

				echo $success_response;

			}else{

				echo $failure_response;

			}
			
			}elseif (isset($_COOKIE["reachlocal_display"])){

	if($mail->send(array('info@glit.edu','chrisb@glit.edu','jonm@glit.edu'), 'mail')){

				$responder->send(array($email), 'mail');

				echo $success_response;

			}else{

				echo $failure_response;
			}

}elseif (isset($_COOKIE["reachlocal"])){

	if($mail->send(array('info@glit.edu','chrisb@glit.edu','jonm@glit.edu'), 'mail')){

			$responder->send(array($email), 'mail');	

			echo $success_response;

			}else{

				echo $failure_response;

			}
			
}else{

	

	if($mail->send(array('info@glit.edu','chrisb@glit.edu','jonm@glit.edu'), 'mail')){

				echo $success_response;

$responder->send(array($email), 'mail');

			}else{

				echo $failure_response;
			}

}

			

		}else{


//SEND TO danb@glit.edu

//<form name='form_step_1' id='form_step_1' action='step two/index2.php' method='post'>

		print "

			<form action='' method='post' name='final' id='final'"; ?> onsubmit="return ConversionCount()" <? print " >

				<table cellpadding='1' cellspacing='1' style='font-size:12px;'>";

			/******/



				print "<tr>

							<td><input  type='text' name='first_name' onclick=clickclear('First Name*') value='First Name*' onblur='recalltext('First Name*')' onclick='cleartext('First Name*')'  /></td>
						</tr>
					
						<tr>
							<td><input  type='text' name='last_name' value='Last Name*'  /></td>
						</tr>
						
						<tr>
							<td ><input  type='text' name='address' value='Address*'   /></td>
						</tr>	
							
						<tr>
							<td><input  type='text' name='city' value='City*'   /></td>
						</tr>
						
						<tr>
							<td><input  type='text' name='state' value='State*'   /></td>
						</tr>
							
						<tr>
							<td><input  type='text' name='zip' value='Zip Code*'   /></td>
						</tr>
						
						<tr>
							<td><input  type='text' name='home_phone' value='Home Phone*'  /></td>
						</tr>
						
						<tr>	
							<td><input type='text' name='cell_phone' value='Cell Phone' /></td>
						</tr>
						
						<tr>
							<td ><input type='text' name='email' value='Email Address*'  /></td>
						</tr>
						
						<tr>
							<td><input  type='text' name='date_of_birth' value='Date of Birth*'  /></td>
						</tr>
						
						
						";
			/******/

				

				print "<tr>

<td align='left' style='font-size:10px; color:#666;'>
						
					Erie Institute of Technology respects your privacy. EIT will never share your personal information with third parties.
						
</td>
</tr>

						<tr>
						<td  align='center' style='padding-top:10px;' >
						
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
	  _gaq.push(['_trackPageview', '/landing_page/bmt_page_submitted.php']);
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

<div id="headline">
<span style="font-weight:bold"><span style="color:#039;">Biomedical Equipment Technicians</span> are <span style=" color:#039;">IN DEMAND</span> in the Pittsburgh area!<br /><br />Find out how you can start training for this rewarding career.</span>
<br /><br />
<span style="font-size:14px; top:10px;">EIT offers a 16 month Associate Degree program just a short distance away in beautiful Erie PA!</span>
</div>
<!--
<div id="headline_shadow">
<span style="font-weight:bold">Biomedical Equipment Technicians are IN DEMAND in the Pittsburgh area!<br /><br />Find out how you can start training for this rewarding career.</span>
<br /><br />
<span style="font-size:14px; top:10px;">EIT offers a 16 month Associate Degree program just a short distance away in beautiful Erie PA!</span>
</div>
-->


</body>
</html>