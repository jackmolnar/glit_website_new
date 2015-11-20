
<?php

$assets_depth = base_url().'assets/';

?>

<div class="<?php echo $slug; ?>">

    <div class="row program_page_header">
        <div class="container">
                <h1><?php if(isset($blog_title)) echo $blog_title; ?></h1>	
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
          
          <div class="news_date"><?php if(isset($news_date)) { echo 'Posted on '.$news_date; } ?></div>
          
          <div class="social_share_buttons well well-sm">
          	<span class='st_facebook_vcount' displayText='Facebook'></span>
            <span class='st_twitter_vcount' displayText='Tweet'></span>
            <span class='st_googleplus_vcount' displayText='Google +'></span>
            <span class='st_pinterest_vcount' displayText='Pinterest'></span>
            <span class='st_linkedin_vcount' displayText='LinkedIn'></span>
          </div>
          	
          <div class="news_image"><?php if($image != '') { echo '<img src="../../assets/images/news/'.$image.'" alt="'.$image_alt_text.'" />'; } ?></div>
          <div class="news_content"><?php if(isset($content)) { echo $content; } ?></div>
          
          

  	<hr>
  		</div>
  
        <div class="col-md-4 side_form_column">

          <div class="side_form"><?php include('assets/includes/side_form.php'); ?></div>
          
        </div>
        
    </div>

      

      
     

      <!-- /END THE FEATURETTES -->
      
</div>
</div>