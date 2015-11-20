<?php

   header( 'Location: http://www.eit-continuinged.com' ) ;

?>
<!DOCTYPE html >
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Continuing Education By EIT</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="royalslider/royalslider.css">
<link rel="stylesheet" href="royalslider/skins/default/rs-default.css"> 


<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="css/global_styles.css?<?php echo time(); ?>">

<link href='http://fonts.googleapis.com/css?family=Exo:700' rel='stylesheet' type='text/css'>

</head>

<body>

<!-- nav -->

             <?php include('includes/navigation.php'); ?>

<!-- end nav -->

<!-- header -->

	<div class="row head">
    	<div class="container">
            <div class="row">
                <div class="span1"></div>
                <div class="span10"><h1 class="main_text_main_page text-center">Continuing Education and Industry Specific Training By Erie Institute of Technology</h1>
                <h2 class="second_text_main_page text-center">EIT has been meeing employer training needs since 2006. Whether you need to train employees with new skills or you are an individual with a desire to learn a new skill, EIT has the classes for you.</h2>
                <div class="span4 offset3">
                <a href="classes.php" class="btn btn-success btn-large main_button_main_page">Check Out Our Current Classes ></a>
                </div>
                </div>
                <div class="span1"></div>
            </div>
        </div>
    </div>
    
<!-- end header -->



<div class="container">

	<ul class="thumbnails">
    	<li class="span1"></li>
    	<li class="span5 industry_side">
        	<img src="images/factory.jpg" style="margin-left:auto; margin-right:auto; display:block; margin-top:20px;" />
            <h3 class="text-center">Industry Specific Training</h3>
            <p>
            	EIT offers a wide variety of training options to bring your employees up to speed. Train your workforce quickly by using our professional instructors with years of industry experience.<br/>We offer employers
                <ul>
                	<li>Customized training at our facility or yours</li>
                    <li>Knowledgeable instructors</li>
                    <li>Computer instruction at your faciitly or in our networked computer lab</li>
                    <li>Instruction on all shifts to meet your needs</li>
                </ul>
            </p>
            <p>
            To learn more about setting up a training program for your employees ...
            </p>
           
        </li>
    	<li class="span5 continuing_side">
        	<img src="images/graduate.jpg?1" style="margin-left:auto; margin-right:auto; display:block; margin-top:20px;" />
            <h3 class="text-center">Continuing Education</h3>
            <p>
            	Learn new skills in our continuing education classes. We offer many different classes you can take to aid in your performance at work or new skills you can apply in your every day life. Classes are short-term, low-cost, and are being added all the time. Here is just a small selection of the types of classes we offer:
                 <ul>
                	<li>Manual and CNC Machining</li>
                    <li>Programmable Logic Controlers</li>
                    <li>Welding</li>
                    <li>Computer classes such as Excell, Word, and Access</li>
                </ul>
                Click below to view the full schedule of classes currently being offered.
            </p>
         
        
        </li>
        <li class="span1"></li>
    </ul>
    
    <div class="row">
        <div class="span5 offset1"> <a href="contact.php" class="btn btn-info btn-large main_button_main_page btn-block">Contact Us</a></div>
        <div class="span5 "><a href="classes.php" class="btn btn-info btn-large main_button_main_page btn-block">Class Schedule</a></div>
    </div>

</div>

<div class="row foot">

</div>





<script src="http://code.jquery.com/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="royalslider/jquery.royalslider.min.js"></script>

</body>
  
  
  
  
  
</html>