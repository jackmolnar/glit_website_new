<script>
$(window).resize(function() {
  $( "body" ).prepend( "<div>" + $( window ).width() + "</div>" );
});

alert('javascript works');
</script>


		<link href="<?php echo site_url("assets/css/eit_theme_test.css?".rand());?>" rel="stylesheet">


<!-- Carousel
    ================================================== -->
    
    <div class="jumbotron" style=" padding:0px; background-color:#000; position:relative">
    
    	<div class="home_tagline" style="position: absolute;z-index: 100;left: 18%;bottom: 50px; color: white;">
        	<h1 style="text-shadow: 3px 3px 5px #000;">Hands-on Training for<br/>In-Demand Careers</h1>
         </div>
            
    	
        <div class="left_grad" style="position: absolute; left: 6%; transform: rotate(180deg); -webkit-transform: rotate(180deg);z-index: 0;"><img src="<?php echo site_url('../assets/images/jumbo_grad_right.png?1'); ?>" style="max-height:720px;" /></div>
    	<div class="right_grad" style="position: absolute; right: 7%;"><img src="<?php echo site_url('../assets/images/jumbo_grad_right.png?1'); ?>" style="max-height:720px;"" /></div>
    
       <video width="1280" height="720" autoplay loop muted style=" text-align:center; margin-left:auto; margin-right:auto; display:block">
          <source src="<?php echo site_url('../assets/video/00109.mp4'); ?>" type="video/mp4">
          <source src="movie.ogg" type="video/ogg">
          Your browser does not support the video tag.
       </video> 
   
   </div>
    
    
    <!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
        
    <div class="container marketing">
    
      <!-- Three columns of text below the carousel -->
      <div class="row icon_row">
      
      <div class="row programs_intro wow fadeInLeftBig">
    	<h2>EIT offers programs in many different areas to suit your interests and talents. Explore below and see the many career paths available to you.</h2>
        <hr/>
       </div>
      
        <div class="col-sm-3 reveal_button">
        	<div class="back">
                <div class="computer_i program_icon wow fadeInDown"></div>
            </div>
            <div class="front">
                <h2 class="icon_header">COMPUTER<br />TRAINING</h2>
                  <ul>
                    <li><?php echo anchor("training_programs/business_information_management","Business and Information Management");?></li>
                    <br />
                    <li><?php echo anchor("training_programs/multimedia_graphic_design","Multimedia Graphic Design");?></li>
                    <br />
                    <li><?php echo anchor("training_programs/network_database_professional","Network and Database Professional");?></li> 
                  </ul>
          </div>
        </div><!-- /.col-lg-4 -->
        
        <div class="col-sm-3 reveal_button">
          <div class="back">
              <div class="electronics_i program_icon wow fadeInDown"></div>
          </div>
          <div class="front">
              <h2 class="icon_header">ELECTRONICS TRAINING</h2>
              <ul>
              <li><?php echo anchor("training_programs/biomedical_equipment_technology","Biomedical Equipment Technology");?></li>
              <br />
              <li><?php echo anchor("training_programs/electronics_technician","Electronics Technician");?></li>
              <br />
              <li><?php echo anchor("training_programs/electronics_engineering_technology","Electronics Engineering Technology");?></li>
              </ul>
          </div>
        </div><!-- /.col-lg-4 -->
        
        
        <div class="col-sm-3 reveal_button">
          <div class="back">
              <div class="manufacturing_i program_icon wow fadeInDown"></div>
          </div>
          <div class="front">
              <h2 class="icon_header">MANUFACTURING TRAINING</h2>
              <ul>
              <li><?php echo anchor("training_programs/cnc_machinist_technician","CNC / Machinist Technician");?></li> 
              <br />
              <li><?php echo anchor("training_programs/maintenance_technician","Maintenance Technician");?></li>
              <br />
              </ul>
          </div>
        </div><!-- /.col-lg-4 -->
        
        <div class="col-sm-3 reveal_button">
          <div class="back">
              <div class="skilled_trades_i program_icon wow fadeInDown"></div>
          </div>
          <div class="front">
              <h2 class="icon_header">SKILLED TRADES TRAINING</h2>
              <ul>
              <li><?php echo anchor("training_programs/auto_body_tech","Auto Body Technician");?></li>
              <br />
              <li><?php echo anchor("training_programs/electrician","Electrician");?></li>
              <br />
              <li><?php echo anchor("training_programs/rhvac_technology","HVAC/R Technology");?></li>
              <br />
              <li><?php echo anchor("training_programs/welding_technology", "Welding Technology");?></li>
              </ul>
          </div>
        </div><!-- /.col-lg-4 -->

      </div><!-- /.row -->
      
</div>

      <!-- START THE FEATURETTES -->

      <!-- START THE FEATURETTES -->

      <div class="row eit_summary parallax" data-velocity="-.3">
	       <div class="container marketing">
                <div class="col-sm-6 wow fadeInLeftBig" style="background-color:#fff; padding-bottom:10px; padding-left:25px;">
                
                  <h1 class="featurette-heading"><span class="text-muted">A Little About </span><br/>Erie Institute of Technology</h1>
                  <p style="font-size:16px;">Erie Institute of Technology or EIT is an Erie Pennsylvania technical or trade school providing training programs for computer, electronics, manufacturing, technology careers.</p>
                  <p style="font-size:16px;">
            Training programs include Welding, RHVAC, Electrician, Graphic Design, CNC, Network and Database Administrator, and Biomedical Equipment Technology.</p>
            
                </div>
                
                <div class="col-sm-6 wow fadeInRightBig">
                  <img class="img-thumbnail img-responsive" src="<?php echo site_url('../assets/images/eit_outside2.jpg'); ?>" alt="Erie Institute of Technology in Erie Pennsylvania">
                </div>
                
			</div>
      </div>

      <div class="row news_row">
      <div class="container marketing">
      
      <?php if (isset($news) && count($news) > 0){
		   echo '<h2>Recent News</h2>';
			  
			  foreach($news as $row){
				  
				  	print "
				  		<a href='".site_url('blog/'.$row['slug'])."' class='col-sm-6'>
							<div class='row'><h4>".$row['title']."</h4><span class='index_date'>".$row['news_date']."</span></div>
							<div class='row' style='padding-top:10px;'>
								<div class='news_image_index img-circle' ><img src='".site_url('../'.$row['image'])."' ".$row['image_alt_text']." style='".$row['max_size_dimension'].$row['img_offset']."' /></div>
								<div class='news_text_index'>".$row['content']."<br/><br/>
									<button type='button' class='btn btn-default btn-xs' href='".site_url('blog/'.$row['slug'])."'>Read More</button>
								</div>
							 </div>
						</a>
          
          			";
				  
			  }
	  }
	  
	  ?>
      
      <?php echo anchor('blog', 'View All News >') ?>
     
      </div>
      </div>

      <!-- /END THE FEATURETTES -->
      
</div>