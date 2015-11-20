<?php

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

		<title>Admissions | Erie Institute of Technology</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="" />

		<meta name="description" content=""/>

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

				<ul><?

	include('global_includes/main_menu.php'); ?>



?></ul>

			</div>

		</div>

		<div id="content">

			<div id="subtop">

				<img src="_images/why_eit.jpg" alt="#" />

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
                            
                            <? include('global_includes/admissions_menu.php'); ?>
                            
                            
                            </ul>

						</div>

					</td>

					<td id="rightcontent">
                    
                    
                    

						<h2>Admission Requirements</h2>
<hr />
<p><b>In order to be considered for admission, an individual must satisfy the following:</b></p>
<ul>
    <li>Submit a completed Admissions Application accompanied by the required twenty-five dollar Application Fee.</li>
    <li>Request an official secondary school transcript using EIT's Student Transcript Request Form and provide copies of any postsecondary transcripts. Enrollees must possess a high school diploma or equivalent.</li>

    <li>Schedule a personal interview and tour at the school with an Admissions Representative prior to enrollment. All prospective students must have a tour of the school prior to enrollment. At EIT every prospective student is viewed as an individual, and we make a concerted effort to satisfy each person's educational needs. In order to make an appointment for a personal interview and tour, please call the Admissions Office at (814) 868-9900.</li>
    <li>Candidates for the ASSOCIATE IN SPECIALIZED TECHNOLOGY DEGREE in Computer and Electronic Engineering Technology must meet ONE of the following requirements: (A) Show evidence of a &quot;C&quot; average (or greater) in 1 unit of algebra or (B) Successfully complete EIT's Algebra for Technology Course.</li>
    <li>Attending an orientation program prior to the class start is required before final acceptance of the enrollee.</li>
    <li>Approximately 80 percent of EIT students receive financial assistance. In order to be considered, each prospective must have a personal interview with the Financial Aid Administrator.</li>
    <li>Applicants for all programs will be required to complete a Wonderlic Basic Skills Test to verify the applicant's reading level. Applicants for the following programs must demonstrate a reading level equal to or greater than the 12th grade reading level: Basic Electronics Technician, Biomedical Equipment Technology, Industrial Automation &amp; Robotics Technology,&nbsp; Multimedia Graphic Design and Network &amp; Database Professional.</li>

    <li>Candidates for the Web Design and Development or Computer Graphic Design programs must show evidence of reading level of 9th grade or above.</li>
    <li>To reserve a seat in a chosen class, applicants must complete an Enrollment Agreement and pay the one-hundred dollar Registration Fee.</li>
</ul>
<br />
<p>The school is open Monday through Friday between 8:00 AM and 4:00 PM to all visitors who wish to view the facilities and classes in session. It would be appreciated if arrangements for visits and interviews were made in advance by phoning the school. Special arrangements for appointments other than the above times can be arranged.</p>
<p>In order to make an appointment for a personal interview and tour, call the Admissions Office at (814) 868-9900.</p>





					</td>

				</tr>

			</table><br clear="all" />

				

<? include('global_includes/footer.php'); ?>

</body>

</html>





