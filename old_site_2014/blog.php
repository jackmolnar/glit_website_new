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

<html xmlns="http://www.w3.org/1999/xhtml" >

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <?
		
        if(isset($_REQUEST['title'])){

			$the_title = $_REQUEST['title'];
			
			$clean_title = str_ireplace("_", " ", $the_title);
			$con = mysql_connect("internal-db.s33581.gridserver.com","db33581_werkbot","mullet79");
			if (!$con){die('Could not connect: ' . mysql_error()); }
			$result = mysql_query("SELECT * FROM news_table WHERE title='$clean_title'");
			while($row = mysql_fetch_array($result))
  									{
	  										$global_title = $row['title'];
											$description = $row['content'];
											$content = $row['content'];
											$image = $row['image'];
											$id = $_REQUEST['id'];
									}
		} else {
			$result = mysql_query("SELECT * FROM news_table ORDER BY id DESC LIMIT 0, 1");
			while($row = mysql_fetch_array($result))
  									{
	  										$global_title = $row['title'];
											$description = $row['content'];
											$content = $row['content'];
											$id = $_REQUEST['id'];
									}
		}
											
								
								?>

		<title><? echo $global_title; ?> | Erie Institute of Technology</title>

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

$result = mysql_query("SELECT * FROM news_table ORDER BY id DESC LIMIT 0, 15");

while($row = mysql_fetch_array($result))
  {
	  $title = $row['title'];
	  $clean_title = str_ireplace(" ", "_", $row['title']);
	  echo "<li class='odd'><a href='".$clean_title.".html'><span class='date'>".$row['date']."</span>".$title."</a></li>";
	  
	  
  }

							?>

							</ul>

					

						</div>

					</td>

					<td id="rightcontent">

						<?
	  										 echo "<h2>".$global_title."</h2><br>";
											 if ($image != ''){echo "<img src='_images/news/".$image."' alt='".$global_title."' style='max-width:475px; float:left; padding-right:8px; padding-bottom:8px;' />";}
											 echo "<p>".$content."</p><br>";
											
									
								?>

					</td>

				</tr>

			</table>

<? include('global_includes/footer.php'); ?>


<?
if (isset($_GET['title']) ){
	print'
<style>
#floatingbuttons
{
background:#aaa;
background:-webkit-gradient(linear, left top, left bottom, color-stop(0, #f2f2f2), color-stop(1, #aaa));
background:-moz-linear-gradient(top, #f2f2f2, #aaa);
border:1px solid #808080;
float:left;
padding:0 0 3px 0;
position:absolute;
bottom:45%; left:75%;
z-index:10;
border-radius:0 5px 5px 0;
box-shadow:2px 2px 5px rgba(0,0,0,0.3);
}

#floatingbuttons .floatbutton{float:left;clear:both;margin:5px 4px 0 4px;}

.addbuttons{clear:both;text-align:center;padding-top:5px;}

.addbuttons a span.getfloat, .addbuttons a span.sharebuttons{color:#fff;background:none;font-family:arial, sans-serif;display:block;font-size:9px;font-weight:bold;text-decoration:none;line-height:11px;}

.addbuttons a:hover span{color:#fff;background:none;text-decoration:underline;}

</style>
<br />
<div id="floatingbuttons" title="Share this post!">
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
<script type="text/javascript"> (function() { var s = document.createElement("SCRIPT"), s1 = document.getElementsByTagName("SCRIPT")[0]; s.type = "text/javascript"; s.async = true; s.src = "http://widgets.digg.com/buttons.js"; s1.parentNode.insertBefore(s, s1); })(); </script>
<!-- Medium Button -->
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<div class="floatbutton" id="facebook">
<fb:like layout="box_count" show_faces="false" font=""></fb:like>
</div>
<div class="floatbutton" id="google+1">
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"> {lang: "en-US"} </script>
<g:plusone size="tall"></g:plusone>
</div>
<div class="floatbutton" id="twitter">
<a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" >Tweet</a>
</div>
<div class="floatbutton" id="linkedin">
<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script>
<script type="in/share" data-counter="top"></script>
</div>
</div>';
}

?>
	</body>

</html>

<?

	//CLOSE OUT CONNECTION TO THE DATABASE

		$db->DB_CLOSE($database_connection);

?>







