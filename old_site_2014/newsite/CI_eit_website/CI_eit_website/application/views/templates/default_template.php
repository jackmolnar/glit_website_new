<? 
if(isset($_GET['source']) && $_GET['source'] == 'reachlocal') {
	$reachlocal = 'reachlocal';
} else {
	$reachlocal = '';
}
if ($reachlocal>''){
	$expire=time()+60*60*24*30;
	setcookie("reachlocal", "yes", $expire);
}
?>
<!DOCTYPE html>
<html>
 
   <head>
	<meta charset="utf-8">
	<meta charset="utf-8">
      	<title><?php if(isset($page_title)) {echo $page_title;} else if (isset($blog_title)) {echo $blog_title.' | Erie Institute of Technology';} ?></title>
      	<meta name="description" content="<? if(isset($page_description)) echo $page_description; ?>">
        
        <?php $rand_num = rand(); ?>
      
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">
      	<link href="<?php echo base_url("assets/css/bootstrap.min.css?".$rand_num);?>" rel="stylesheet">
		<link href="<?php echo base_url("assets/css/eit_theme.css?".$rand_num);?>" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Varela|Titillium+Web:700' rel='stylesheet' type='text/css'>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
       <script type="text/javascript" >stLight.options({publisher: "6b0bfeb1-eb5b-4b0e-b3c9-9d3a3a21fff2", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

    
   </head>
 
   <body>
   
   <script type="text/javascript">
	 /*
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-3586660-5']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	  */
	</script>

	   <?php include("assets/includes/navigation.php") ; ?>
	   
	   <?php echo $body; ?>
	   
	   <?php include("assets/includes/footer.php") ; ?>
       
       
	<div class="after_footer"></div>
   </body>
   <script src="<?php echo base_url("assets/js/jquery.js?");?>"></script>
   <script src="<?php echo base_url("assets/js/jquery-ui-1.10.4.custom.min.js");?>"></script>
   <script src="<?php echo base_url("assets/js/bootstrap.js?".$rand_num);?>"></script>
   <script src="<?php echo base_url("assets/js/site.js?".$rand_num);?>"></script>
   <script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
    
</html>