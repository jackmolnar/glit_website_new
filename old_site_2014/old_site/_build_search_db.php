<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>EIT - Build Search Database</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
body {
font-family: Verdana, Arial, Tahoma, sans-serif;
font-size: 11px;
margin: 0px;
}
h3 {
font-family: Verdana, Arial, Tahoma, sans-serif;
font-size: 14px;
margin: 0px;
}
p {
font-family: Verdana, Arial, Tahoma, sans-serif;
font-size: 11px;
margin: 0px;
}
</style>
</head>

<body>
<?php

if (!isset($_POST['username']) || !isset($_POST['password']) || $_POST['username'] != 'erieit' || $_POST['password'] != 'eit9977') {
?>
	<h3>You must login to view this page.</h3>
	<br>
	<form name='login' method='post' action='_build_search_db.php'>
	<table border='0'>
	<tr>
		<td><p>Username:</p></td>
		<td><input type='text' name='username' id='username' style='width: 150px;'></td>
	</tr>
	<tr>
		<td><p>Password:</p></td>
		<td><input type='password' name='password' id='password' style='width: 150px;'></td>
	</tr>
	<tr>
		<td colspan='2' align='center'><input type='submit' value=' Login '></td>
	</tr>
	</table>
	</form>
	</body>
	</html>
<?php
	exit;
}

set_time_limit(500);
/*
CREATE TABLE page (
   id int unsigned NOT NULL auto_increment primary key,
   url varchar(200) NOT NULL,
   title varchar(200) NOT NULL,
   content text NOT NULL,
   FULLTEXT (content)
) TYPE=MyISAM;

*/

// Simple function for retrieving the current timestamp in microseconds:
function getmicrotime()
{
   list($usec, $sec) = explode(" ",microtime());
   return ((float)$usec + (float)$sec);
}

$start_time = getmicrotime();



// Connect to the database
mysql_connect("localhost", "erieit", "eit9977")
    or die("ERROR: Could not connect to database!");
mysql_select_db("erieit")
	or die ("ERROR: Cound not select database!");

// Clear any database entries
mysql_query("delete from page");

// array of pages to be indexed
$urls = array(
"index.php",
"all_programs.php",
"business_programs.php",
	"prog_ac.php", "prog_ac.php?v=courses", "prog_ac.php?v=careers", 
	"prog_hc.php", "prog_hc.php?v=courses", "prog_hc.php?v=careers", 
	"prog_hm.php", "prog_hm.php?v=courses", "prog_hm.php?v=careers", 
	"prog_mk.php", "prog_mk.php?v=courses", "prog_mk.php?v=careers", 
"computer_programs.php",
	"prog_cgd.php", "prog_cgd.php?v=courses", "prog_cgd.php?v=careers", 
	"prog_dba.php", "prog_dba.php?v=courses", "prog_dba.php?v=careers", 
	"prog_mgd.php", "prog_mgd.php?v=courses", "prog_mgd.php?v=careers", 
	"prog_ndp.php", "prog_ndp.php?v=courses", "prog_ndp.php?v=careers", 
	"prog_oss.php", "prog_oss.php?v=courses", "prog_oss.php?v=careers", 
	"prog_pct.php", "prog_pct.php?v=courses", "prog_pct.php?v=careers", 
	"prog_sna.php", "prog_sna.php?v=courses", "prog_sna.php?v=careers", 
	"prog_wdd.php", "prog_wdd.php?v=courses", "prog_wdd.php?v=careers", 
"electronics_programs.php",
	"prog_bt.php", "prog_bt.php?v=courses", "prog_bt.php?v=careers", 
	"prog_bm.php", "prog_bm.php?v=courses", "prog_bm.php?v=careers", 
	"prog_ce.php", "prog_ce.php?v=courses", "prog_ce.php?v=careers", 
	"prog_ia.php", "prog_ia.php?v=courses", "prog_ia.php?v=careers", 
	"prog_om.php", "prog_om.php?v=courses", "prog_om.php?v=careers", 

"contact_us.php",
"webmaster.php",
"privacy_policy.php",
"tell_a_friend.php",
"legal_info.php",
// "site_map.php",
// "search.php",

"why_eit.php",
	"career_outlook.php",
	"success_stories.php",
	"student_services.php",
	"learning_environment.php",

"admissions.php",
	"admission_requirements.php",
	"request_info.php",
	"apply_online.php",
	"financial_aid_info.php",
	"transfer_info.php",
	"articulation_agreements.php",

"about_eit.php",
	"license_and_accreditation.php",
	"affiliations.php",
	"calendar.php",
	"faculty.php",
	"staff.php",
	"equipment.php",
	"testing_center.php",
	"map_and_directions.php",
	
"about_erie.php",
	"travel_info.php",
	"erie_entertainment.php",
	"links_of_interest.php"
);

// change when site is moved
$url_prefix = "http://www.erieit.edu/";
//$url_prefix = "http://localhost/eit/";

// status variables:
$tot_words = 0;
$tot_chars = 0;


// loop through pages
for ($page=0; $page<count($urls); $page++) {
//for ($page=4; $page<5; $page++) {
	$url = $urls[$page];
	
	// try to open the page
	if (!($fd = fopen($url_prefix . $url, "r")))
		die ("couldn't open url " . $url_prefix . $url);
		
	// read file
	$buf = "";
	do {
		$data = fread($fd, 8192);
		if (strlen($data) == 0) {
			break;
		}
		$buf .= $data;
	} while (true);
	fclose($fd);

	// status output
	echo "<h3>Indexing <span style='color: #000080'>$url</span></h3>\n";
	
	// first look for a title tag
	$title = "";
	$title_s = stristr($buf, "<title>");
	if ($title_s != FALSE) {
		$pos = strpos($title_s, "</title>");
		$title = substr($title_s, 7, $pos-7);
	}
	if (substr($title, 0, 3) == "EIT")
		$title = substr($title, 6, 999);
	if ($title == "")
		$title = $url;
	if ($page == 0) // special case for home page, which has a long title
		$title = "EIT - Welcome Page";
	$title = str_replace('|', '-', $title);
	echo "<p>Page title: <span style='color: #000080'>$title</span></p>\n";

	// convert to plain text
	$buf = getPlainText($buf, $count);
	
	// update status vars
	$tot_words += $count;
	$tot_chars += strlen($buf);
	
	// output
	echo "<p>Words: <span style='color: #000080'>$count</span> Characters: <span style='color: #000080'>" . strlen($buf) . "</span></p><br>\n";
//	echo "<p>" . stripslashes($buf) . "</p>\n";
	
	// create entry in page table
	$result = mysql_query("INSERT INTO page VALUES (NULL, '$url', '$title', '$buf')");
	
	if ($result) {
		echo "<p><span style='color: #008000'>Successfully inserted into database</span></p>";
	} else {
		die ("<p><span style='color: #800000'>Error inserting into database</span></p>");
	}
	
	echo "<br><br>";
}

//echo "<br><br><h1>$occur total occurances</h1>";
echo "<br><br><br><h3>Total Words: <span style='color: #000080'>$tot_words</span></h3>";
echo "<h3>Total Characters: <span style='color: #000080'>$tot_chars</span></h3>";
$end_time = getmicrotime();
echo "<h3>Indexing executed in ".(substr($end_time-$start_time,0,5))." seconds</h3>";

function getPlainText($str, &$count) {
	$search = array ("'<script[^>]*?>.*?</script>'si",  // Strip out javascript
                 "'<[\/\!]*?[^<>]*?>'si",          // Strip out HTML tags
				 "<!--[\s\S]*?-->",				   // Strip out HTML comments
                 "'([\r\n])[\s]+'",                // Strip out white space
                 "'&(quot|#34);'i",                // Replace HTML entities
                 "'&(amp|#38);'i",
                 "'&(lt|#60);'i",
                 "'&(gt|#62);'i",
                 "'&(nbsp|#160);'i",
                 "'&(iexcl|#161);'i",
                 "'&(cent|#162);'i",
                 "'&(pound|#163);'i",
                 "'&(copy|#169);'i",
				 "'&(\||-);'i",
                 "'&#(\d+);'e");                    // evaluate as php

	$replace = array (" ",
				 " ",
                 " ",
				 " ",
                 " ",
                 " ",
                 " ",
                 " ",
                 " ",
                 " ",
                 " ",
                 " ",
                 " ",
				 " ",
                 " ");

	$temp = preg_replace($search, $replace, $str);
	
	// extract all words matching the regexp from the current line:
	preg_match_all("/(\b[\w+|\']+\b)/",$temp,$words);
	
	// build new string
	$ret = "";
	for( $j = 0; $j < count($words[0]); $j++ ) {
		$ret .= addslashes( strtolower($words[0][$j]) );
		$ret .= " ";
	}
	
	$count = count($words[0]);
	return $ret;
}

?> 
</body>
</html>
