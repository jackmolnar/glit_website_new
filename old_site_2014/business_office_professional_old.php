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

		<title>Business Office Professional Training Program | Erie Institute of Technology</title>

		<meta name="keywords" content="business, business professional, office, erie, pa, accounting, human resources, quickbooks, microsoft, word, excel, access, powerpoint, project, outlook" />

		<meta name="description" content="Business Office Professional Training School- Erie Institute of Technology's Business Office Professional program trains the student in Accounting, Human Resources, QuickBooks Pro, Microsoft Word, Excel, Access, PowerPoint, Project, and Outlook."/>

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

		<div id="submenu">

			<ul id="submid">
            
            <? include('global_includes/sub_menu.php'); ?>
            
            </ul>

		</div>

		<div id="content">

			<div id="subtop">

				<p><img src="_images/programs_mgd.jpg" alt="#" /></p>

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
					
                    <? include('global_includes/computer_menu.php');?>
                    
                    </ul>

				</div>

			</td>

				<td id="rightcontent">

					<div id="rightcontentmenu">

						<? $current_program = 'business_office_professional';
						
						include('global_includes/program_sub_menu.php'); ?>
                        
                         
                        </ul>

					</div>

					




<img style="border-right: rgb(234,234,234) 3px solid; border-top: rgb(234,234,234) 3px solid; float: right; margin: 5px; border-left: rgb(234,234,234) 3px solid; border-bottom: rgb(234,234,234) 3px solid" alt="Erie Technology Careers" src="http://www.erieit.edu/_files/images/file_33.jpg" />
<h2>Business Office Professional</h2>
<h3>Overview</h3>
<hr />
<p>Today's business office is highly automated, thanks to computer networks and advanced software.&nbsp; Business professionals need higher level abilities to perform computerized accounting, communications, human resource, customer service and marketing tasks.&nbsp; Combined with word processing, spreadsheet, and database skills, the graduate is prepared for an entry-level position in a modern business organization.</p>
<p>Can you see yourself working in an office -- using word processing, spreadsheets, presentation media, desktop publishing, Internet, and database applications? EIT is a Microsoft IT Academy, which means you will not only learn to use the Microsoft Office Suite, but also prepare for Microsoft Office Specialist (MOS) certifications; these demonstrate expertise. You will also be able to round out your skills by being able to perform basic PC upgrades &amp; maintenance, as well as operate office equipment and keep the books.</p>





				</td>
</tr>
			</table>


				</td>
</tr>
			</table>


		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>

	</body>

</html>






