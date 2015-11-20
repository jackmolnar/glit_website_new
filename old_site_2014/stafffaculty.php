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

		<title>Staff and Faculty | Erie Institute of Technology</title>

		<meta name="keywords" content="" />

		<meta name="description" content="Here is a listing of all Staff and Faculty of Erie Institute of Technology."/>

		<meta name="robots" content="index, follow" />

		<link href="_scripts/master.css" rel="stylesheet" type="text/css" />

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

				<ul>
                
                <? include('global_includes/main_menu.php'); ?>
                
                </ul>

			</div>

		</div>

		<div id="content">



			<table>

				<tr>

					<td id="fullcontent">

						<h2>Staff&nbsp;</h2>

<hr />

<p>The staff at EIT are committed to helping every student succeed, both academically and in the job market. Here are some of the people who will help you achieve your goals:</p>

<fieldset style="border: 1px solid rgb(204, 204, 204); padding: 10px; background-color: rgb(234, 234, 234); background-image: none; background-repeat: repeat; background-attachment: scroll; background-position: 0% 50%; -moz-background-size: auto auto; margin-bottom: 10px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">

<table cellspacing="0" cellpadding="0" border="0" style="width: 680px;">

    <tbody>

        <tr>

            <td style="vertical-align: top; width: 190px;"><em><em>

            <p><b>Tony Piccirillo</b><br />

            <i>Executive Director<br />

            <br />

            </i><b>Paul Fitzgerald</b><br />

            <i>EIT Director<br />

            <br />

            <b>Marie Whipple</b><br />

            Industry-Specific Training &amp; Continuing Education Director<br />

            </i><br />

            <b>Kate Hushon</b><br />

            <em>Education Director</em></p>

            </em></em></td>

            <td style="vertical-align: top; width: 190px;"><p><b>Barb Bolt </b><br />
              
              <em>&nbsp; Admissions Director<br />
                
                </em><b>Sherri Boyer</b><br />
              
              <em>&nbsp; Admissions Representative</em> <i>&nbsp;</i></p>
              <p><b>Daryl Parker</b><br />
                <em>&nbsp; Admissions Representative</em> <i>&nbsp;</i><i><br />
                
                </i><strong>Dan Albaugh</strong><br />
                
                <em>&nbsp; High School Admissions&nbsp;&nbsp; Representative<br />
                </em><em><br />
                    
                    <strong>Nicole Swan</strong><br />
                    
                    &nbsp; Receptionist</em><em><br />
                      
                </em></p></td>

            <td style="vertical-align: top; width: 190px;">

            <p><b>Craig Dobson</b><br />

            <em>&nbsp; Director of Financial Aid</em><em><br />

            </em><strong>Celeste Richardson</strong><br />

            <em>&nbsp; Financial Aid Officer</em><em><br />

            </em><strong>Andrea Campbell</strong><em> <br />

            <em><em>&nbsp; Finance Director</em></em></em><br />

            <b>Ross Ardillo</b><br />

            <em>&nbsp; Computer System Administrator</em><br />

            <b>Jon Molnar</b><br />

            <em>&nbsp; Marketing Manager<br />

            </em><em><br />

            </em></p>

            </td>

        </tr>

    </tbody>

</table>

<span style="display: none;" id="1210102359682E">&nbsp;</span></fieldset><br />

<h2>Faculty</h2>

<hr />

<p>The faculty members at EIT, through years of training and/or experience, are well qualified to serve our students in a professional and dedicated manner. Instructors offer comprehensive coverage in theory and practical laboratory training and have the ability to teach in a manner which is easily understood.</p>

<fieldset style="border: 1px solid rgb(204, 204, 204); padding: 10px; background-color: rgb(234, 234, 234); background-image: none; background-repeat: repeat; background-attachment: scroll; background-position: 0% 50%; -moz-background-size: auto auto; margin-bottom: 10px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">

<table cellspacing="0" cellpadding="0" border="0" style="width: 680px;">

    <tbody>

        <tr>

            <td style="vertical-align: top; width: 190px;"><img src="http://www.erieit.edu/_files/images/file_12.jpg" alt="Electronics Instructors at EIT" /></td>

            <td style="vertical-align: top; width: 190px;">

            <p><b>Eric Erikson</b><br />

            Biomedical Equipment Technology Program Director<br />

            <br />

            <strong>Gordon Leubke<br />

            </strong>Electronics Program Director<br />

            &nbsp;</p>

            </td>

            <td style="vertical-align: top; width: 190px;">

            <p><b>Instructors</b><br />

            Bonnie Clark</p>
            <p>Rick Devore</p>
            <p>Jim Roos</p>
            <p>Al Rial</p>
            <p>Larry Kephart</p>
            <p>Fred Tuholski </p></td>

        </tr>

    </tbody>

</table>

</fieldset> <fieldset style="border: 1px solid rgb(204, 204, 204); padding: 10px; background-color: rgb(234, 234, 234); background-image: none; background-repeat: repeat; background-attachment: scroll; background-position: 0% 50%; -moz-background-size: auto auto; margin-bottom: 10px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">

<table cellspacing="0" cellpadding="0" border="0" style="width: 680px;">

    <tbody>

        <tr>

            <td style="vertical-align: top; width: 190px;"><img src="http://www.erieit.edu/_files/images/file_10.jpg" alt="Computer Instructors at EIT" /></td>

            <td style="vertical-align: top; width: 190px;"><p><b>Scott Domowicz</b><br />
              
              Network &amp; Database Professional<br />
              
              Program Director<br />
              
              <br />
              
              <b>Linda Kester</b><br />
              
              Computer Program Director<br />
              
              <strong><br />
                
                Instructors<br />
                
              </strong>Debbie Harmon</p>
              <p>Jim Huff</p>
              <p>Marion Lipski</p>
              <p>Michelle Littler</p>
              <p>Kevin Mosgrave</p></td>

            <td style="vertical-align: top; width: 190px;"><p>Kerr Robinson</p>
              <p>Phil Carideo</p>
              <p>Brian Rasmussen</p>
              <p>Rodger Trask</p>
              <p>Chris Shultz</p>
              <p>Maureen Schwab</p>
              <p>Ed Wieczorek</p></td>

        </tr>

    </tbody>

</table>

</fieldset> <fieldset style="border: 1px solid rgb(204, 204, 204); padding: 10px; background-color: rgb(234, 234, 234); background-image: none; background-repeat: repeat; background-attachment: scroll; background-position: 0% 50%; -moz-background-size: auto auto; margin-bottom: 10px; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">

<table cellspacing="0" cellpadding="0" border="0" style="width: 680px;">

    <tbody>

        <tr>

            <td style="vertical-align: top; width: 190px;"><img src="http://www.erieit.edu/_files/images/file_14.jpg" alt="Manufacturing Instructors at EIT" /></td>

            <td style="vertical-align: top; width: 190px;"><strong>Chris Snyder<br />

            </strong>CNC/Machninist Program Director<br />

            <br />

            <b>Jim Wright</b><br />

            RHVAC Program Director<br />

            <br />

            <b>Don Haupin</b><br />

            Welding Program Director<br />
            
                        <br />

            <b>Patrick Ball</b><br />

            Electrician Program Director

</td>

            <td style="vertical-align: top; width: 190px;">&nbsp;<strong>Instructors<br />

            </strong>Brandon Slee<br />Mark Mikolajczak<br />Jennifer Munoz<br />Sam Benninghoff<br />John Benny<br />Mike Miller<br />Vinny Albano<br />Brian Conroe</td>

        </tr>

    </tbody>

</table>

</fieldset>

					</td>

				</tr>

			</table>

<? include('global_includes/footer.php'); ?>



	</body>

</html>



