
<?php

$assets_depth = base_url().'assets/';

?>


<div class="row program_page_header">
<div class="container">
	
	<div class="row">
    <div class="col-sm-4 col-md-4">
			<h1><?php if(isset($h1)) echo $h1; ?></h1>
			<p class="program_length"><?php if(isset($length)) echo $length; echo ' - '; if(isset($degree)) echo $degree; ?></p>
		</div>
		<div class="col-sm-8"><img class="img-responsive" src="<?php if(isset($primary_img)) echo $assets_depth.'images/programs/'.$primary_img;?>" alt="<?php echo $primary_img_alt; ?>"></div>
		
	</div>
	
</div>
</div>

    <div class="container">

      <div class="row content_container_row">
      
        <div class="col-md-8">
          <h2>Program Overview</h2>
          <p><?php if(isset($primary_text)) { echo $primary_text; } ?></p>

  	<hr>
    
    	  <?php if(isset($vtour)) {
			  
			  print '
			  	<h2>Video Virtual Tour</h2>
  		  		<iframe class="virtual_tour" src="'.$vtour.'" frameborder="0" allowfullscreen></iframe>
          
          		<hr class="featurette-divider">';
		  }
		  
		  ?>
  
  		  
          
          <?php
		  
		  if (isset($testimonial) && count($testimonial) > 0){
			  echo '<h2>Testimonials</h2>';
			  
			  foreach($testimonial as $row){
				  	print "
				  
				  	<div class='testimonial'>
          	
						<img src='".$assets_depth."images/testimonials/".$row['image']."'  class='img-circle' alt='".$row['image_alt']."' />
						<div class='testimonial_text'>
							<h3>".$row['name']."</h3>
							<h4>".$row['position_title']."<br/>".$row['company']."</h4>
							<p>".$row['testimonial']."</p>
						</div>
					
				  	</div>
          
          			";
				  
			  }
		  }
		  
		  ?>
          
          
          
          
  
  		</div>
  
        <div class="col-md-4 side_form_column">

          <div class="side_form "><?php include('assets/includes/side_form_test.php'); ?></div>
          
        </div>
        
    </div>

      

      
     

      <!-- /END THE FEATURETTES -->
      
</div>