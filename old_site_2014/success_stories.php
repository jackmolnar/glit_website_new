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

		<title>Success Stories | Erie Institute of Technology</title>

		<meta name="keywords" content="" />

		<meta name="description" content="Here are a few success stories from past EIT graduates and employers of our graduates."/>

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

				<img src="_images/why_eit.jpg" alt="#" />

				<div id="subtopleft">

				<?

					$num = rand(1,7);

					print "<img src='../_images/quote_00".$num.".gif' />";

				?>

				</div>

			</div>

			<table>

				<tr>

					<td id="subcontent">

						<div id="leftmenu">

							<ul>
							
							<? include('global_includes/left_menu_1.php'); ?>
                            
                            </ul>

						</div>

					</td>

					<td id="rightcontent">

						<h2>Student Success Stories</h2>

<hr />

<p>EIT has a solid reputation for producing capable, well-trained students that employers seek. These are just a few of the many EIT student success stories.&nbsp;</p>

<table width="100%" cellspacing="0" cellpadding="0" border="0">

    <tbody>

        <tr>

            <td valign="top"><img width="100" height="80" border="0" alt="#" src="http://www.erieit.edu/_images/student_mozdy.jpg" /></td>

            <td valign="top"><strong>Jason Mozdy</strong>

            <p><em>Designer and Illustrator, Synctomi</em></p>

            <p>&quot;It happened within one year at EIT. I obtained the necessary tools, earned the credentials, and was given a tremendous opportunity as an intern. After applying what I had acquired, I now have a rewarding career which I love.&quot;</p>

            </td>

        </tr>

        <tr>

            <td colspan="2">&nbsp;</td>

        </tr>

        <tr>

            <td valign="top"><img width="100" height="80" border="0" alt="#" src="http://www.erieit.edu/_images/student_langer.jpg" /></td>

            <td valign="top"><strong>Scott Langer</strong>

            <p><em>Field Service Technician, Rabe Environmental Systems</em></p>

            <p>&quot;The education I received at the Erie Institute of Technology prepared me for my career as a Service Technician for Rabe Environmental Systems. If you're interested in a career change I would strongly urge you to call the Erie Institute of Technology. I'm certainly glad I did.&quot;</p>

            </td>

        </tr>

        <tr>

            <td colspan="2">&nbsp;</td>

        </tr>

        <tr>

            <td valign="top"><img width="100" height="80" border="0" alt="#" src="http://www.erieit.edu/_images/student_waller.jpg" /></td>

            <td valign="top"><strong>Brian Waller</strong>

            <p><em>Technical Support, Softek/Velocity.net</em></p>

            <p>&quot;After I graduated from Erie Institute of Technology's PC Technician and Software Support Program, they placed me with a great career here at Softek and Velocity.net. I urge anyone interested in a career in computers to check them out today. I'm glad I did.&quot;</p>

            </td>

        </tr>

        <tr>

            <td colspan="2">&nbsp;</td>

        </tr>

        <tr>

            <td valign="top"><img width="100" height="80" border="0" alt="#" src="http://www.erieit.edu/_images/student_lind.jpg" /></td>

            <td valign="top"><strong>Steve Lind</strong>

            <p><em>Field Service Technician, Hagan Business Machines</em></p>

            <p>&quot;I've always had an interest in Electronics. When my former employer closed their doors, I needed to find a new career. I chose Erie Institute of Technology's Electronic Technician Program. They gave me the training and helped place me in my new career as a Field Service Technician for Hagan Business Machines. If you're looking for a new career, I highly suggest you call Erie Institute of Technology. I'm glad I did.&quot;</p>

            </td>

        </tr>

        <tr>

            <td colspan="2">&nbsp;</td>

        </tr>

        <tr>

            <td valign="top"><img width="100" height="80" border="0" alt="#" src="http://www.erieit.edu/_images/student_fratus.jpg" /></td>

            <td valign="top"><strong>Rob Fratus</strong>

            <p><em>SMT Operator, Accuspec Electronics</em></p>

            <p>&quot;My Associates degree from Erie Institute of Technology as an Electronics Engineering Technician allowed me to obtain a position at Accuspec Electronics as a Surface Mount Technology Operator. The education that I received gave me the foundation to improve and be trained as a test technician. If you're interested in a career in Electronics, I encourage you to call Erie Institute of Technology.&quot;</p>

            </td>

        </tr>

    </tbody>

</table>

<p>&nbsp;</p>

<h2>Employer Testimonials</h2>

<p>&nbsp;</p>


<table width="100%" cellspacing="0" cellpadding="0" border="0">

    <tbody>

        <tr>

            <td colspan="2">&nbsp;</td>

        </tr>

        <tr>

            <td valign="top"><img width="100" height="80" border="0" alt="#" src="http://www.erieit.edu/_images/employer_mcquiston.jpg" /></td>

            <td valign="top"><strong>Tim McQuiston</strong>

            <p><em>Temperature Control Manager, Rabe Environmental Systems</em></p>

            <p>&quot;Here at Rabe Environmental Systems when we were searching for highly qualified personnel to service our hundreds of customers we turned to the Erie Institute of Technology. The Erie Institute of Technology supplies us with the highly qualified personnel we need to service our digital control systems.&quot;</p>

            </td>

        </tr>

    </tbody>

</table>

					</td>

				</tr>

			</table><br clear="all" />

				

<? include('global_includes/footer.php'); ?>


</body>

</html>





