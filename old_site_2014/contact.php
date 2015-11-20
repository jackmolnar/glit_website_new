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

		<title>Contact | Erie Institute of Technology</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="" />

		<meta name="description" content=""/>

		<meta name="robots" content="index, follow" />

		<link href="_scripts/master.css" rel="stylesheet" type="text/css" />

    		<script src="_scripts/js/mootools.v1.11.js" type="text/javascript" ></script>

		<script src="_scripts/js/validation.js" type="text/javascript"></script>

		<style>

			th{vertical-align:top; text-align:right;};

			.validation-failed {

				border: 1px solid #990000;

				clear:both;	

			}

			.validation-passed {	

			}

			.validation-advice {

				margin: 2px; 

				padding: 2px; 

				color:#fff; 

				background-color:#990000;

			}

		</style>

		<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAaQG6bzu9PaUR2BFSP7zkwRQPhSgyUlEP0l_lfsNTumek3jFtgxSU5602g9iO8dnXIkV6MlKG1MY07A" type="text/javascript"></script>		

	</head>

	<body onload="load();" onunload="GUnload();">

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



			<table>

				<tr>

					<td id="fullcontent">

						<div style="float: left; width: 50%;">

<h2>Contact us today!</h2>

<hr />

<fieldset style="border: 1px solid rgb(204, 204, 204); padding: 10px; background-color: rgb(234, 234, 234); background-image: none; background-repeat: repeat; background-attachment: scroll; background-position: 0% 50%; -moz-background-size: auto auto; margin-bottom: 10px; width: 310px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Erie Institute of Technology<br />

940 Millcreek Mall<br />

Erie, PA 16565<br />

<br />

Phone: <? echo $phone_number; ?><br />

Fax: (814) 868-9977<br />

Toll-free: (866) 868-ERIE (3743)</fieldset></div>

<div id="cntmap">&nbsp;</div>

<script type="text/javascript">

	//<![CDATA[

	var map = null;

	function load() {

		if (GBrowserIsCompatible()) {

			map = new GMap2(document.getElementById("cntmap"));

			map.addControl(new GSmallMapControl());

			var ll = new GLatLng(42.066893, -80.094719);

			map.setCenter(ll,13);

			var point = new GLatLng(42.066893, -80.094719);

			var marker = createMarker(point,'<b>Erie Institute of Technology</b><br />940 Millcreek Mall<br />Erie, PA 16565');

			map.addOverlay(marker);

			marker.openInfoWindowHtml('<b>Erie Institute of Technology</b><br />940 Millcreek Mall<br />Erie, PA 16565');

		}

	}

	function createMarker(point,html) {

		var marker = new GMarker(point);

		GEvent.addListener(marker, "click", function() {

			marker.openInfoWindowHtml(html);

		});

		return marker;

	}

	//]]>

</script>

					</td>

				</tr>

			</table>

<? include('global_includes/footer.php'); ?>



	</body>

</html>



