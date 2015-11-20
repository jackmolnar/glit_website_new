<?php

$reachlocal = strpos($_SERVER['HTTP_REFERER'], 'reachlocal');
if ($reachlocal>''){
	$expire=time()+60*60*24*30;
	setcookie("reachlocal", "yes", $expire);
}

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

		<title>Erie Welding Training School | Erie Institute of Technology in Erie PA - Enroll in our Welding Technology Training Program Today!</title>

		<meta name="keywords" content="welding school, welding training, welding, erie, pa, gtaw, gas tungsten arc welding, gmaw, gas metal arc welding, pipe welding" />

		<meta name="description" content="Erie Welding School - Welding Training program at Erie Institute of Technology prepares the student for entry level employment as a welder. The student will learn welding techniques like GTAW or Gas Tungsten Arc Welding, GMAW or Gas Metal Arc Welding, and Pipe welding."/>

		<meta name="robots" content="index, follow" />


		<link href="_scripts/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        
<script>
		$(document).ready(function(){
$("#weld_video").click(function(){
	  $("#weld_video").html('<iframe width="545" height="307" src="http://www.youtube.com/embed/OWU6AhdfI8o?modestbranding=1&controls=0&showinfo=0&autoplay=1&rel=0" frameborder="0" allowfullscreen></iframe>');
});


});
</script>

<style>
#weld_video {
	z-index:50;
	position:relative;
	float:left;
	width: 545px;
	height: 307px;
	cursor:pointer;
	background-repeat:no-repeat;
	background-position:0px -307px;
	overflow:hidden;
}
#weld_video:hover{
	z-index:50;
	position:relative;
	float:left;
	width: 545px;
	height: 307px;
	background-repeat:no-repeat;
	background-position:0px 0px;
	overflow:hidden;
	cursor:pointer;
}
</style>

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

				<div id="subtopleft" style="height:292px; position:relative; float:left; color:#FFF; font-size:16px; text-align:center; line-height:24px;">

				<strong>Watch the<br />Welding Technology<br />Virtual Tour</strong>

				</div>
                
                <div id="weld_video" style=" background-image:url(_images/video_buttons/weld.jpg)"></div>

			</div>

<table style="margin-top:180px;">

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

						<? $current_program = 'welding_technology';
						
						include('global_includes/program_sub_menu.php'); ?>

</ul>

					</div>

					

<h2>Welding Technology</h2>
<h3>Overview</h3>
<hr />



<table width="100%" cellspacing="1" cellpadding="1" border="0" style="margin-top:10px;">
    <tbody>
        <tr>
            <td><p>Upon completion of the Welding Technology career training program, students will understand the common welding processes and applications at the foundation, intermediate and advanced levels.</p><p>Students will be qualified for entry level employment in the welding field in positions which include Welder, Welding Specialist, Welding Technologist or Welding Engineer.</p><p>Our school contains 15 welding booths to train in, each equiped with Lincoln Electric Welding equipment.</p>
            <br />
            <a href="http://www.aws.org" target="_blank"><img width="116" height="114" border="0" style="float:left;" align="middle" src="http://www.erieit.edu/_files/images/file_124.jpg" alt="American Welding Society" /></a>
            
            <a href="http://www.asme.org" target="_blank"><img width="116" height="63" border="0" align="middle" style="float:left;" src="http://www.erieit.edu/_files/images/file_126.jpg" alt="American Society of Mechanical Engineers" /></a>
            </td>
         
        </tr>
       
    </tbody>
</table>





				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>


 <div id="disclosures1">
        <a name="consumer_info">Consumer Information</a> | 

Program Name: 
Welding Technology | 

SOC Code: 
51-4121.06 - Welders, Cutters, and Welder Fitters - 
<a href="http://www.onetonline.org/link/summary/51-4121.06">http://www.onetonline.org/link/summary/51-4121.06</a> | 

Award Level: 
Diploma | 

Program Length: 
15 Months | 

Program Costs (effective 7/1/11): 
Tuition: $18,900.00 Registration Fee: $100.00 Technology Fee: $300.00 Lab Fees: $2,100.00 Books (Estimated): $2,500.00 Equipment / Supplies (Estimated): $650.00 | 

On-time Completion Rate: 
No graduates in date range of 6/07 – 5/08 | 

Job placement rates as reported on the 2010 ACCSC annual report: 
No graduates in date range of 6/07 – 5/08 | 

Job Titles: 
NA | 

Employers: 
NA | 

Median Loan Debt of Graduates (graduated 2010 - 2011): 

Federal - $16,500 Alternative - $0.00 Institutional - $0.00

</div>

	</body>

</html>







