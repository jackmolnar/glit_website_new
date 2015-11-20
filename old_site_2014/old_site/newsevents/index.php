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
		include "../_face/class/face_events.php";
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
		<title><? echo $cfg->site_title; ?> | News/Events</title>
		<meta name="author" content="Werkbot Studios" />
		<meta name="keywords" content="" />
		<meta name="description" content="News and events of Erie Institute of Technology"/>
		<meta name="robots" content="index, follow" />
		<link href="../_scripts/master.css" rel="stylesheet" type="text/css" />
		<?
			//SPIT OUT OUR RSS FEEDS
				$face_news = new face_news($db, $cfg, $time);
				$cats = array();
				$cats = $face_news->getCategories();
				for($i=0;$i<count($cats);$i++){
					print "<link rel='alternate' type='application/rss+xml' href='../_files/rss/rss_".$cats[$i]['id'].".xml' title='".$cats[$i]['name']." rss feed' />";
				}
		?>
	</head>
	<body>
		<div id="masterframe">
			<div id="header">
				<div id="search">
					
<span style="text-align:right; color:#360; font-family:'Arial Black', Gadget, sans-serif; font-size:10px">FOLLOW US!</span><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.facebook.com/erieinstituteoftechnology" layout="button_count" width="200"></fb:like>				</div>
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
													print "<li class='odd'><a href='../newsevents/?theid=".$results_array[$i]['id']."&type=".$results_array[$i]['type']."'><span class='date'>".$date."</span>".$results_array[$i]['title']."</a></li>";
												}else {
													print "<li class='even'><a href='../newsevents/?theid=".$results_array[$i]['id']."&type=".$results_array[$i]['type']."'><span class='date'>".$date."</span>".$results_array[$i]['title']."</a></li>";
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
										print "<h2>".$news_list[0]['title']."</h2>";
										print "<p>".$news_list[0]['body']."</p>";
									}else{
										print "<h1>Article not found.</h1>";
									}
								}else if($type=="event"){
									$event_list = array();
									$event_list = $events->view_events($theid);
									print "<h2>".$event_list[0]['title']."</h2>";
									print "<p>".$event_list[0]['body']."</p>";
								}
							}else{
								//GRAB THE LATEST NEWS ITEM
									$news_list = array();
									$news_list = $news->view(0,0,1);
									if($news_list[0]['totals']>0){
										print "<h2>".$news_list[0]['title']."</h2>";
										print "<p>".$news_list[0]['body']."</p>";
									}else{
										print "<h2>No articles to display.</h2>";
									}
							}
						?>
					</td>
				</tr>
			</table>
<div class="hblob">
					<a href="http://erieit.edu/contact/"><img src="<? echo $depth;?>_images/contact.png" alt="#" /></a>
				</div>
<div class="hblob">
					<a href="http://erieit.edu/admissions/schedule%20a%20tour%20of%20erie%20institute%20of%20technology/"><img src="<? echo $depth;?>_images/schedule_tour.png" alt="#" /></a>
				</div>
				<div class="hblob">
					<a href="http://erieit.edu/admissions/apply%20online/"><img src="<? echo $depth;?>_images/apply_online.png" alt="#" /></a>
				</div>
                <div class="hblob">
					<a href="http://erieit.edu/admissions/request%20more%20information/"><img src="<? echo $depth;?>_images/req_more_info.png" alt="#" /></a>
				</div>		</div>		<br clear="all" />
				
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
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2137940-3");
pageTracker._initData();
pageTracker._trackPageview();


</script>

	</body>
</html>
<?
	//CLOSE OUT CONNECTION TO THE DATABASE
		$db->DB_CLOSE($database_connection);
?>



