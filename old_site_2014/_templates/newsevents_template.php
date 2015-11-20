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

		include "[DEPTH]_face/class/face_events.php";

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

			$limit = 10;

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

		<?

			//SPIT OUT OUR RSS FEEDS

				$face_news = new face_news($db, $cfg, $time);

				$cats = array();

				$cats = $face_news->getCategories();

				for($i=0;$i<count($cats);$i++){

					print "<link rel='alternate' type='application/rss+xml' href='[DEPTH]_files/rss/rss_".$cats[$i]['id'].".xml' title='".$cats[$i]['name']." rss feed' />";

				}

		?>

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

				<img src="[DEPTH]_images/why_eit.jpg" alt="#" />

				<div id="subtopleft"></div>

			</div>

			<table>

				<tr>

					<td id="subcontent">

						<div id="leftmenu">

							<ul>

							<?

								//EVENTS

									$events = new face_events($db, $cfg, $time);

									$events_list = array();

									$time = time();

									$year = date('Y', $time);

									$month = date('n', $time);

									$events_list = $events->view_month_events($year, $month, $start, $limit);

								//NEWS

									$news = new face_news($db, $cfg, $time);

									$news_list = array();

									$news_list = $news->view(0, $start, $limit);

								//

									$totals = $news_list[0]['totals'] + $events_list[0]['totals'];

								//

									$results_array = array_merge($events_list, $news_list);

								//

									if(count($results_array)>0){

										$test=true;

										for($i=0;$i<count($results_array);$i++){

											if($results_array[$i]['id']>0){

												$tmp_date = explode(" ", $results_array[$i]['date']);

												$date = $common->DateFormat($tmp_date[0], "M j", $cfg->default_tz);

												if ($test==true) {

													print "<li class='odd'><a href='[DEPTH]newsevents/?theid=".$results_array[$i]['id']."&type=".$results_array[$i]['type']."'><span class='date'>".$date."</span>".$results_array[$i]['title']."</a></li>";

												}else {

													print "<li class='even'><a href='[DEPTH]newsevents/?theid=".$results_array[$i]['id']."&type=".$results_array[$i]['type']."'><span class='date'>".$date."</span>".$results_array[$i]['title']."</a></li>";

												}

												$test=!$test;

											}

										}

									}else{

										print "<li class='even'><a href='#'>There are no news or events to display.</a></li>";

									}

							?>

							</ul>

							<?

								if($totals>$limit){

									$common->pageNav($start, ($limit*2), $totals);

								}

							?>

						</div>

					</td>

					<td id="rightcontent">

						<?

							if(isset($_REQUEST['theid'])){

								$type = $_REQUEST['type'];

								$theid = $_REQUEST['theid'];

								if($type=="news"){

									$news_list = array();

									$news_list = $news->view($theid);

									if($news_list[0]['totals']>0){

										print "<h1>".$news_list[0]['title']."</h1>";

										print "<p>".$news_list[0]['body']."</p>";

									}else{

										print "<h1>Article not found.</h1>";

									}

								}else if($type=="event"){

									$event_list = array();

									$event_list = $events->view_events($theid);

									print "<h1>".$event_list[0]['title']."</h1>";

									print "<p>".$event_list[0]['body']."</p>";

								}

							}else{

								//GRAB THE LATEST NEWS ITEM

									$news_list = array();

									$news_list = $news->view(0,0,1);

									if($news_list[0]['totals']>0){

										print "<h1>".$news_list[0]['title']."</h1>";

										print "<p>".$news_list[0]['body']."</p>";

									}else{

										print "<h1>No articles to display.</h1>";

									}

							}

						?>

					</td>

				</tr>

			</table>

		</div>

		<div id="footer">

			<block id='1' name='Global_Footer' description='Global_footer_details' default='4'></block>

		</div>

	</body>

</html>

<?

	//CLOSE OUT CONNECTION TO THE DATABASE

		$db->DB_CLOSE($database_connection);

?>



