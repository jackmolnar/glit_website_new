<!DOCTYPE html>
<html>
 
   <head>
	<meta charset="utf-8">
	<meta charset="utf-8">
      	<title><?php echo $title; ?></title>
      	<meta name="description" content="<? echo $description; ?>">
      
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">
      	<link href="<?php echo base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">
	<link href="<?php echo base_url("assets/css/eit_theme.css");?>" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Varela|Titillium+Web:700' rel='stylesheet' type='text/css'>
   </head>
 
   <body>
	   <?php include("assets/includes/navigation.php") ; ?>
	   
	   <?php echo $body; ?>
	   
	   <?php include("assets/includes/footer.php") ; ?>
	
   </body>
   <script src="<?php echo base_url("assets/js/jquery.js");?>"></script>
   <script src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>
    
</html>