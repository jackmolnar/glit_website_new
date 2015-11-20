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

		<title>Multimedia Graphic Design Training Program | Erie Institute of Technology</title>

		<meta name="keywords" content="graphic design, web design, erie, pa, photoshop, illustrator, dreamweaver, 3D modeling, video game design, digital illustration, digital photography, maya, html, indesign" />

		<meta name="description" content="Web and Graphic Design Training School- Erie Institute of Technology's Multimedia Graphic Design program trains the student in graphic design, web design, 3D modeling, video game design, digital illustration, and digital photography."/>

		<meta name="robots" content="index, follow" />

<meta name="googlebot" content="noodp">

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

						<? $current_program = 'multimedia_graphic_design';
						
						include('global_includes/program_sub_menu.php'); ?>
                        
                         
                        </ul>

					</div>

					<img src="http://www.erieit.edu/_files/images/file_31.jpg" style="border: 3px solid rgb(234, 234, 234); margin: 5px; float: right;" alt="Erie Graphic Design" />

<h2>Multimedia Graphic Design</h2>

<h3>Overview</h3>

<hr />

<p>In the Multimedia Graphic Design career training program at EIT you will learn design fundamentals as well as gain education in the newest design software including Adobe Photoshop, Illustrator, InDesign, Dreamweaver, and Flash.<br />

<br />

If you have artistic talent, you might want to design corporate logos, magazine layouts, or posters. Or maybe video game design or 3D animation appeals to you.&nbsp; You could even express yourself through creative web design.</p>

<p>Combine computers with art. EIT gives you a digital education. You already love what you&rsquo;re doing, so imagine getting paid to do digital illustration, desktop publishing, web design &amp; development, digital photography, 3D modeling, multimedia presentation design, video game design and more. EIT is one of only a hand-full of schools on the east coast that teaches Maya, which is widely used by film and video artists, game developers, and visualization professionals in today&rsquo;s graphic-rich media.</p>

<p><br />

<a href="http://www.erieit.edu/student_gallery.php"><img width="191" height="59" alt="Student Gallery" src="http://www.erieit.edu/_files/images/file_8.gif" /></a></p>

				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>

	</body>

</html>







