
<?php

$assets_depth = base_url().'assets/';

?>

<div class="<?php echo $slug; ?>">


	
    

    <div class="row program_page_header">
        <div class="container">
             <div class="row">
               
                	<div class="col-sm-4 col-md-4">
                        <h1><?php if(isset($h1)) echo $h1; ?></h1>
                        <?php if(isset($sub_text) && $sub_text != '')
								echo '<hr/><p class="sub_text">'.$sub_text.'</p>';
								?>
                        
                    </div>
                    
                    <div class="col-sm-8">
                    	<?php if(isset($primary_img) && $primary_img != '') echo "<img class='img-responsive' src='".$assets_depth.'images/'.$primary_img."' alt=". $primary_img_alt.">"; ?>
                    </div>
                    
             </div>
        </div>
    </div>
    
    <div class="row breadcrumb_bar">
    	<div class="container">
        	<?php echo $breadcrumbs; ?>
        </div>
    </div>

    <div class="container">

      <div class="row content_container_row">
      
        <div class="col-md-8">
          <?php if(isset($primary_text)) { echo $primary_text; } ?>
          

  	<hr>
  		</div>
  
        <div class="col-md-4 side_form_column">

          <div class="side_form"><?php include('assets/includes/side_form.php'); ?></div>
          
        </div>
        
    </div>

      

      
     

      <!-- /END THE FEATURETTES -->
      
</div>
</div>