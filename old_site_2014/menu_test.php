<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

  <style type="text/css">
   #program_menu {
	   display:none;
	   width:300px;
	   background-color:#9F0;

   }
   #program_button {
	   display:block;
	   width:300px;
	   background-color:#9F0;
   }
   </style>
   
   </head>
   
   <body>
 
   
   <ul>
    
<li id='program_button'>
		<a href='programs.php'>Programs</a>
		<div id='program_menu'>
		<span class='program_heading'>Electronics</span>
		<a href='biomedical_equipment_technology.php' >Biomedical Equipment Technology</a>
		<a href='electronic_engineering_technology.php' >Electronic Engineering Technology</a>
		<a href='electronics_technician.php' >Electronics Technician</a>
		</div>
		
		
				</li>
                
                </ul>

</body>
</html>



  <script type="text/javascript">
$('#program_button').hover(
	function () {
		$('#program_menu').css({'display':'block'});
	},
	function () {
		$('#program_menu').css({'display':'none'});
	}
	);
$('#program_menu').hover(
	function () {
		$('#program_menu').css({'display':'block'});
	},
	function () {
		$('#program_menu').css({'display':'none'});
	}
	);

	
	
//$('#button').mouseover(function(){$('#the_menu').css({'display':'block'});})


/*
$("#button").hover(
  function () {
    $('#the_menu').css({'display':'block'});
  }, 
  function () {
    $('#the_menu').css({'display':'none'});
  }
);
*/


//li with fade class

</script>

