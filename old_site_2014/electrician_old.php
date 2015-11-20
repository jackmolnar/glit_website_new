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

		<title>Electrician Training Program | Erie Institute of Technology</title>

		<meta name="keywords" content="electrician, erie, pa, residential electricity, commercial electricity, industrial electricity, circuit design, transformers, electric luminaires, ac dc motors, low voltage motor control circuits, programmable logic controllers, industrial controls" />

		<meta name="description" content="Erie Electrician Training School - Erie Institute of Technology's Electrician program trains the student in residential, commercial, and industrial electricity, circuit design, transformers, electric luminaires, ac dc motors, low voltage motor control circuits, programmable logic controllers, and industrial controls."/>

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

						<? $current_program = 'electrician';
						
						include('global_includes/program_sub_menu.php'); ?>

</ul>

					</div>

					

<h2>Electrician</h2>
<h3>Overview</h3>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="ProgId" content="Word.Document">
<meta name="Generator" content="Microsoft Word 11">

<hr />
<table width="500" cellspacing="1" cellpadding="1" border="0">
    <tbody>
        <tr>
            <td><span style="font-size: 9.5pt; font-family: Arial;">Upon completion of  the Electrical Technology Program, students will understand the  practices and applications found in residential, commercial and  industrial electricity.<span style="">&nbsp; </span>Students will be  qualified for entry level employment in the electrical field in  positions which include electrician, electricians&rsquo; helper, electrical  technician, electrical maintenance technician and utility technician. </span></td>
            <td><img width="200" height="183" src="http://www.erieit.edu/_images/electrician.jpg" alt="" /></td>
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







