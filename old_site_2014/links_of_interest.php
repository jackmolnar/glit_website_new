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

		<title>Links of Interest | Erie Institute of Technology</title>

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

					print "<img src='_images/quote_00".$num.".gif' />";

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

						<h2>Links of Interest</h2>

<hr />

<h3><a href="http://www.eriepa.com/" target="_blank">EriePA.com</a></h3>

<p>The Erie Regional Chamber and Growth Partnership is the unified voice of the business community. As such, the Chamber leads the effort to identify key regional initiatives that promote economic health while providing the leadership for business attraction, retention, and expansion.</p>

<h3><a href="http://www.erieathome.com/" target="_blank">ErieatHome</a></h3>

<p>Find what to do, where to stay, where to eat, information about attractions and much more here.</p>

<h3><a href="http://www.yeperie.org/" target="_blank">yeperie.org</a></h3>

<p>Young Erie Professionals is a networking group that provides opportunities for young professionals in Erie.</p>

<h3><a href="http://www.ecls.lib.pa.us/" target="_blank">Erie County Library System</a></h3>

<p>Find information about our local libraries.</p>

<table width="200" cellspacing="1" cellpadding="1" border="0" align="center">

    <tbody>

        <tr>

            <td><img border="0" align="left" src="http://www.erieit.edu/images/erie_boat.jpg" alt="" /></td>

        </tr>

        <tr>

            <td align="center"><i>Presque Isle</i></td>

        </tr>

    </tbody>

</table>

					</td>

				</tr>

			</table><br clear="all" />

				

<? include('global_includes/footer.php'); ?>

</body>

</html>





