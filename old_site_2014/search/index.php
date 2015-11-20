<?php

	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "../";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "../_admin/class/class_config.php";

		include "../_admin/class/class_db.php";

		include "../_admin/class/class_time.php";

	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;

		include "../_face/class/face_common.php";

		include "../_face/class/face_news.php";

		include "../_face/class/face_blocks.php";

	//CREATE OUR CONFIG

		$cfg = new class_config();

	//CREATE OUR DATABASE

		$db = new class_db($cfg->db_host,$cfg->db_name,$cfg->db_user,$cfg->db_pass);

	//CREATE OUR TIME

		$time = new class_time($db, $cfg);

	//CREATE OUR COMMON CLASS

		$common = new face_common();

	//CONNECT TO OUR DATABASE

		$database_connection = $db->DB_CONNECT();

	//SET DEFAULT PAGE OPTIONS HERE

		if(isset($_REQUEST['start'])){

			$start = $_REQUEST['start'];

		}else{

			$start = 0;

		}

		if(isset($_REQUEST['limit'])){

			$limit = $_REQUEST['limit'];

		}else{

			$limit = 20;

		}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

		<title><? echo $cfg->site_title; ?> | Search</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="" />

		<meta name="description" content=""/>

		<meta name="robots" content="index, follow" />

		<link href="../_scripts/master.css" rel="stylesheet" type="text/css" />

	</head>

	<body>

		<div id="masterframe">

			<div id="header">

				<div id="search">

					<form action="../search/" method="post">

						<input class="txt" name="keys" type="text" value="Search..." maxlength="50" onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...';"/>

						<input class="img" type="image" src="../_images/searchtxt.gif" alt="Search" border="0"/>

					</form>

				</div>

			</div>

			<div id="menu">

				<ul><?

	if($common->checkurlForPageName("INDEX")){

		print "<li><div class='navselect'>Home</div></li>";

	}else{

		print "<li><a href='".$depth."index.php'>Home</a></li>";

	} 

	if($common->checkurlForPageName("why%20eit")){

		print "<li><div class='navselect'>Why EIT?</div></li>";

	}else{

		print "<li><a href='".$depth."why eit/our mission/'>Why EIT?</a></li>";

	}

	if($common->checkurlForPageName("programs") ){

		print "<li><div class='navselect'>Programs</div></li>";

	}else{

		print "<li><a href='".$depth."programs/'>Programs</a></li>";

	}

	if($common->checkurlForPageName("admissions")){

		print "<li><div class='navselect'>Admissions</div></li>";

	}else{

		print "<li><a href='".$depth."admissions/overview/'>Admissions</a></li>";

	}

	if($common->checkurlForPageName("stafffaculty")){

		print "<li><div class='navselect'>Staff/Faculty</div></li>";

	}else{

		print "<li><a href='".$depth."stafffaculty/'>Staff/Faculty</a></li>";

	}

	if($common->checkurlForPageName("newsevents")){

		print "<li><div class='navselect'>News/Events</div></li>";

	}else{

		print "<li><a href='".$depth."newsevents/'>News/Events</a></li>";

	}

	if($common->checkurlForPageName("contact")){

		print "<li><div class='navselect'>Contact</div></li>";

	}else{

		print "<li><a href='".$depth."contact/'>Contact</a></li>";

	}



	print "<li><a href='http://www.thecareerschools.com'>The Career Schools</a></li>";



?></ul>

			</div>

		</div>

		<div id="content">



			<table>

				<tr>

					<td id="fullcontent">

						<?

							//GRAB OUR KEYWORDS

								$keywords = $_REQUEST['keys'];

							//CREATE OUR FACE NEWS

								$face_news = new face_news($db, $cfg, $time);

								$face_blocks = new face_blocks($db, $cfg, $time);

							//GRAB OUR NEWS

								$news_array = array();

								$news_array = $face_news->search($keywords,$start,$limit);

							//WE MUST LIMIT OUR PAGE RETURNS WITH HOW MANY NEWS ARTICLES WE GET BACK

								$new_limit = $limit - $news_array[0]['totals'];

							//GRAB OUR PAGES

								$pages_array = array();

								$pages_array = $face_blocks->search($keywords,$start,$new_limit);

							//MERGE OUR ARRAYS

								$search_array = array();

								$search_array = array_merge($news_array, $pages_array);

							//CYCLE THROUGH NEWS ARRAY AND PRINT OUT THE DATA

								if($search_array[0]["title"]==""){

									print "<h2>There were no results in the search.</h2>";

								}else{

									$count = $start;

									$total_search = $news_array[0]["totals"]+$pages_array[0]["totals"];

									print "<h2>Your search for <i>$keywords</i> returned $total_search result".$common->singleCheck($total_search)."!</h2>";

									for($i=0;$i<count($search_array);$i++){

										$count++;

										print "<h3>$count. <a href='".$search_array[$i]["url"]."'>".$search_array[$i]["title"]."</a></h3>";

										print "<p>".substr(strip_tags($search_array[$i]["sum"]), 0, 200)."...";

										print "<br/><a href='".$search_array[$i]["url"]."'><i>".$search_array[$i]["url"]."</i></a></p>";

									}

									if($total_search>$limit){

										$data_list = array($keywords);

										$name_list = array("keywords");

										$common->pageNav($start, $limit, $total_search, $name_list, $data_list);

									}

								}

						?>

					</td>

				</tr>

			</table>

		</div>

		<div id="footer">

			<?php

		function getYear(){

		$theday = getdate();

		$y = $theday[year];

		return $y;

	}

?>

<p><a target="_blank" href="http://www.glit.edu"><img width="107" height="41" border="0" align="middle" alt="Visit the Great Lakes Institute of Technology Website" src="http://www.erieit.edu/_files/images/glit_logo.png" /></a><a href="http://www.youtube.com/thecareerschools" target="_blank"><img width="80" height="41" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_120.png" alt="See EIT videos on YouTube.com/thecareerschools" /></a>&nbsp;&nbsp; <a href="http://www.facebook.com"><img width="100" height="38" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_118.png" alt="Become a friend of EIT

on Facebook:  thecareerschools" /></a>&nbsp;&nbsp; <a href="http://www.twitter.com/EITCareerServ" target="_blank"><img width="100" height="23" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_108.png" alt="Follow EIT Career Services Office on Twitter:  EITCareerServ" /></a><br />

Home |&nbsp;<a href="http://www.erieit.edu/alumni/">Career Services (Alumni &amp; Employers)</a>&nbsp;|&nbsp;<a href="http://www.erieit.edu/careers/">Employment</a> | <a href="http://www.erieit.edu/contact/">Contact Us</a> | <a href="http://www.erieit.edu/site map/">Site Map</a> | <a href="http://www.erieit.edu/privacy/">Privacy Policy</a> | <a href="mailto:info@erieit.edu">Webmaster</a> | <a href="http://www.glit.edu">glit.edu</a>  | <a href="http://toniguy.com/academy/erie/default.aspx">toniguy.com</a> <br />

&copy; <? echo getYear(); ?>Erie Institute of Technology, All Rights Reserved</p>

<br />

		</div>

	</body>

</html>

<?

	//CLOSE OUT CONNECTION TO THE DATABASE

		$db->DB_CLOSE($database_connection);

?>