<? 

if(isset($_GET["utm_source"])){
	$source = $_GET["utm_source"];
}
if(isset($_GET["utm_medium"])){
	$medium = $_GET["utm_medium"];
}
$expire = time()+60*60*24*30;

if(isset($source)){
	setcookie($source, $medium, $expire); 
}
?>
<!DOCTYPE html>
<html>
 
   <head>
	<meta charset="utf-8">
	<meta charset="utf-8">
      	<title><?php if(isset($page_title)) {echo $page_title;} else if (isset($blog_title)) {echo $blog_title.' | Erie Institute of Technology';} else { echo 'Erie Institute of Technology | Erie PA Computer, Electronics and Manufacturing School'; } ?></title>
      	<meta name="description" content="<? if(isset($page_description)) { echo $page_description; } else { echo 'Erie Institute of Technology is a technical trade school located in Erie Pennsylvania. We offer programs in Computers, Electronics, and Manufacturing.'; } ?>">
        
        <meta property="og:title" content="<?php if(isset($page_title)) {echo $page_title;} else if (isset($blog_title)) {echo $blog_title;} else { echo 'Erie Institute of Technology | Erie PA Computer, Electronics and Manufacturing School'; } ?>" />
        <meta property="og:site_name" content="Erie Institute of Technology" />
        <meta property="og:url" content="<?php echo current_url(); ?>" />
        <meta property="og:description" content="<?php if(isset($page_description)) { echo $page_description; } else { echo 'Erie Institute of Technology is a technical trade school located in Erie Pennsylvania. We offer programs in Computers, Electronics, and Manufacturing.'; } ?>" />
        
        <meta property="og:image" content="<?php 
			if (isset($image) && $image != ''){
				echo base_url()."assets/images/news/".$image;
			} else if (isset($primary_img) && $primary_img != ''){
				echo base_url()."assets/images/programs/".$primary_img;
			}
			?>" />
        
        
        <?php $rand_num = rand(); ?>
      
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">
      	<link href="<?php echo site_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">
		<link href="<?php echo site_url("assets/css/eit_theme.css?".rand());?>" rel="stylesheet">
        <link href="<?php echo site_url("assets/css/animate.css?");?>" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Varela|Titillium+Web:700' rel='stylesheet' type='text/css'>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
       <script type="text/javascript" >stLight.options({publisher: "6b0bfeb1-eb5b-4b0e-b3c9-9d3a3a21fff2", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
       
       <meta name="google-site-verification" content="VHIwFyBziWdINZtx1zcdtz4htpmmLlZsI27iJOCX_io" />

    
   </head>
   
 
   <body>
   
      	<?php include("assets/includes/testing_code.php") ; ?>

   
   <script type="text/javascript" src="<?php echo site_url("assets/js/analytics.js");?>"></script>
   
   
<img height="1" width="1" border="0" alt="" style="display:none" src="https://www.facebook.com/tr?id=274704609354688&amp;ev=NoScript" />

	   <?php include("assets/includes/navigation.php") ; ?>
	   
	   <?php echo $body; ?>
	   
	   <?php include("assets/includes/footer.php") ; ?>
       
       
	<div class="after_footer"></div>
    
    <!-- chat script -->
    <script type='text/javascript'>(function () { var done = false;var script = document.createElement('script');script.async = true;script.type = 'text/javascript';script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript';document.getElementsByTagName('HEAD').item(0).appendChild(script);script.onreadystatechange = script.onload = function (e) {if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {var w = new PCWidget({ c: '0bff99f8-679c-4761-b41a-5f0e38590705', f: true });done = true;}};})();</script>
    <!-- chat script -->
    
    
   </body>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
   <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
   <script src="<?php echo site_url("assets/js/bootstrap.js");?>"></script>
   <script src="<?php echo site_url("assets/js/wow.min.js?1");?>"></script>
   <script src="<?php echo site_url("assets/js/jquery.scrolly.js");?>"></script>
   
   <!-- retargeting -->
   <img src="http://ad.yieldmanager.com/pixel?id=1048490&id=1048499&t=2" width="1" height="1" />
   <script src="http://i.simpli.fi/dpx.js?cid=25&action=100&segment=3201235&m=1"></script>
   <!-- retargeting -->

   <script>
	 new WOW().init();
	 
	 
    $(document).ready(function(){
       $('.parallax').scrolly({bgParallax: true});
    });

	</script>
   <script src="<?php echo site_url("assets/js/site.js?".rand());?>"></script>
   <script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
    
</html>