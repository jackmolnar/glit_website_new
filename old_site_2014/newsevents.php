<?php

	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE

		$depth = "";

	//INCLUDE ALL OF OUR MODULE CLASSES

		include "_admin/class/class_config.php";

		include "_admin/class/class_db.php";

		include "_admin/class/class_time.php";

	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;

		include "_face/class/face_common.php";

		include "_face/class/face_news.php";

		include "_face/class/face_events.php";

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
        <?
		
        if(isset($_REQUEST['theid'])){

			$theid = $_REQUEST['theid'];
			$con = mysql_connect("internal-db.s33581.gridserver.com","db33581_werkbot","mullet79");
			if (!$con){die('Could not connect: ' . mysql_error()); }
			$result = mysql_query("SELECT * FROM news_table WHERE id=$theid");
			while($row = mysql_fetch_array($result))
  									{
	  										$title = $row['title'];
											$description = $row['content'];
									}
		}
											
								
								?>

		<title><? echo $title; ?> | Erie Institute of Technology</title>

		<meta name="keywords" content="" />
        
        <?
		if (strlen($description) > 140) {
			$final_description = substr($description, 0, 139);
			$final_description .= '...';
		} else {
			$final_description = $description;
		}
		
		?>

		<meta name="description" content="<? echo strip_tags($final_description); ?>"/>

		<meta name="robots" content="index, follow" />

		<link href="_scripts/master.css" rel="stylesheet" type="text/css" />

		<?

			//SPIT OUT OUR RSS FEEDS

				$face_news = new face_news($db, $cfg, $time);

				$cats = array();

				$cats = $face_news->getCategories();

				for($i=0;$i<count($cats);$i++){

					print "<link rel='alternate' type='application/rss+xml' href='_files/rss/rss_".$cats[$i]['id'].".xml' title='".$cats[$i]['name']." rss feed' />";

				}

		?>

	</head>

	<body>
    
    <!--facebook sdk -->
    
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=106894392760628";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--facebook sdk -->

		<div id="masterframe">

			<div id="header">

				<div id="search">
                
                <? include('global_includes/head_contact.php'); ?>
                
				</div>

			</div>

			<div id="menu">

				<ul><?

	include('global_includes/main_menu.php'); ?>



</ul>

			</div>

		</div>

		<div id="content">



			<table>

				<tr>

					<td id="subcontent">

						<div id="leftmenu">

							<ul>
                            
                            <?

							$con = mysql_connect("internal-db.s33581.gridserver.com","db33581_werkbot","mullet79");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


$result = mysql_query("SELECT * FROM news_table ORDER BY id DESC");

while($row = mysql_fetch_array($result))
  {
	  
	  echo "<li class='odd'><a href='newsevents.php?theid=".$row['id']."'><span class='date'>".$row['date']."</span>".$row['title']."</a></li>";
	  
	  
  }

							?>

							</ul>

					

						</div>

					</td>

					<td id="rightcontent">

						<?

							if(isset($_REQUEST['theid'])){

								$theid = $_REQUEST['theid'];
								
								
								$con = mysql_connect("internal-db.s33581.gridserver.com","db33581_werkbot","mullet79");
								if (!$con)
 										 {
 										 die('Could not connect: ' . mysql_error());
 										 }


								$result = mysql_query("SELECT * FROM news_table WHERE id=$theid");

								while($row = mysql_fetch_array($result))
  									{
	  										 echo "<h2>".$row['title']."</h2><br>";
											 echo "<p>".$row['content']."</p><br>";
											 echo "<div class='fb-like' data-href='http://erieit.edu/newsevents.php?theid=".$theid."' data-send='true' data-width='450' data-show-faces='true'></div>";
	  								}
									
									
									
							}
									
								?>

								

						

					</td>

				</tr>

			</table>

<? include('global_includes/footer.php'); ?>



	</body>

</html>

<?

	//CLOSE OUT CONNECTION TO THE DATABASE

		$db->DB_CLOSE($database_connection);

?>







