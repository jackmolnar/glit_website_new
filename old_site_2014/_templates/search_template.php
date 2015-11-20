<?php

	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "[DEPTH]";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "[DEPTH]_admin/class/class_config.php";

		include "[DEPTH]_admin/class/class_db.php";

		include "[DEPTH]_admin/class/class_time.php";

	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;

		include "[DEPTH]_face/class/face_common.php";

		include "[DEPTH]_face/class/face_news.php";

		include "[DEPTH]_face/class/face_blocks.php";

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

		<title><? echo $cfg->site_title; ?> | [TITLE]</title>

		<meta name="author" content="Werkbot Studios" />

		<meta name="keywords" content="" />

		<meta name="description" content=""/>

		<meta name="robots" content="index, follow" />

		<link href="[DEPTH]_scripts/master.css" rel="stylesheet" type="text/css" />

	</head>

	<body>

		<div id="masterframe">

			<div id="header">

				<div id="search">

					<form action="[DEPTH]search/" method="post">

						<input class="txt" name="keys" type="text" value="Search..." maxlength="50" onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...';"/>

						<input class="img" type="image" src="[DEPTH]_images/searchtxt.gif" alt="Search" border="0"/>

					</form>

				</div>

			</div>

			<div id="menu">

				<block id='0' name='Global_Menu' description='The_main_menu_for_the_site' default='2'></block>

			</div>

		</div>

		<div id="content">

			<div id="subtop">

				<img src="<? echo $depth;?>_images/programs_main.jpg" alt="#" />

				<div id="subtopleft"></div>

			</div>

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

									print "<h1>There were no results in the search.</h1>";

								}else{

									$count = $start;

									$total_search = $news_array[0]["totals"]+$pages_array[0]["totals"];

									print "<h1>Your search for \"$keywords\" returned $total_search result".$common->singleCheck($total_search)."!</h1>";

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

			<block id='2' name='Global_Footer' description='Global_footer_details' default='4'></block>

		</div>

	</body>

</html>

<?

	//CLOSE OUT CONNECTION TO THE DATABASE

		$db->DB_CLOSE($database_connection);

?>