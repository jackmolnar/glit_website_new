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

		<title>Welding Technology Training Program | Erie Institute of Technology</title>

		<meta name="keywords" content="welding training, welding school, welding, erie, pa, gtaw, gas tungsten arc welding, gmaw, gas metal arc welding, pipe welding" />

		<meta name="description" content="Erie Welding Training School - Erie Institute of Technology's Welding Training program prepares the student for entry level employment as a welder. The student will learn welding techniques like GTAW or Gas Tungsten Arc Welding, GMAW or Gas Metal Arc Welding, and Pipe welding."/>

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
			
			<? include('global_includes/sub_menu.php');?>
            
            </ul>

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
					
					<? include('global_includes/manufacturing_menu.php');?>
                    
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
<table width="100%" cellspacing="1" cellpadding="1" border="0">
    <tbody>
        <tr>
            <td>Upon completion of the Welding Technology career training program, students will understand the common welding processes and applications at the foundation, intermediate and advanced levels. Students will be qualified for entry level employment in the welding field in positions which include Welder, Welding Specialist, Welding Technologist or Welding Engineer.             <br />
            <br />

            <i>EIT Welding Lab</i>
            <p><img align="left" src="http://www.erieit.edu/_files/images/welding.jpg" alt="EIT Welding Lab" /></p>
            </td>
            <td><a href="http://www.aws.org" target="_blank"><img width="116" height="114" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_124.jpg" alt="American Welding Society" /></a><a href="http://www.asme.org" target="_blank"><img width="116" height="170" align="left" src="http://www.erieit.edu/_files/images/file_128.gif" alt="" /><img width="116" height="63" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_126.jpg" alt="American Society of Mechanical Engineers" /></a></td>
        </tr>
    </tbody>
</table>





				</td>

</tr>

			</table>

		<br clear="all" />

				

<? include('global_includes/footer.php'); ?>

	</body>

</html>







