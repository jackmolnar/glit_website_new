        
        
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
     
      
       <div class="carousel-inner">
	<!-- carousel item -->
        <div class="item active">  
        
        
	<img src="<?php echo base_url("assets/images/slides/slide3_full.jpg?1");?>" width="100%" id="image_1">
            <div class="carousel-caption caption_1">
             <h1 class="caption_1_head">Train for a Technology Career ... In Less Time Than You Think</h1>
             <hr />
              <p class="caption_1_text">EIT offers many programs that suit your interests. All programs are short in length and only feature classes that pertain to your program of choice.</p>
              <p class="caption_1_text"><?php echo anchor('training_programs', 'View All Our Programs', array('class' => 'btn btn-danger')); ?></p>
          </div>
        </div>
	<!--end carousel item -->
    
    
	<!-- carousel item -->
        <div class="item">
		<img src="<?php echo base_url("assets/images/slides/slide4_full.jpg?1");?>" width="100%">
            <div class="carousel-caption caption_2">
              <h1>Tour EIT's Facilities</h1>
              <hr />
              <p class="caption_2_text">EIT is a 40,000 square foot building that comes equipped with modern computers and software, labs with realistic settings, 15 welding booths, and a large manufacturing lab.</p>
              <p class="caption_2_text"><?php echo anchor('schedule_tour', 'Schedule Your Tour', array('class' => 'btn btn-danger')); ?></p>
            </div>
        </div>
	<!--end carousel item -->
    
    
    <!-- carousel item -->
        <div class="item">
		<img src="<?php echo base_url("assets/images/slides/slide7_full.jpg?1");?>" width="100%">
            <div class="carousel-caption caption_3">
              <h1>Get Hands-on Training in Real-World Settings</h1>
              <hr />
              <p class="caption_3_text">Going to EIT is a lot like on-the-job training. Much of the course work is hands-on and similar to what you would find in the professional world.</p>
              <p class="caption_2_text"><?php echo anchor('apply_online', 'Apply Online', array('class' => 'btn btn-danger')); ?></p>
            </div>
        </div>
	<!--end carousel item -->
    
    
    <!-- carousel item -->
        <div class="item">
		<img src="<?php echo base_url("assets/images/slides/slide8_full.jpg?1");?>" width="100%">
            <div class="carousel-caption caption_4">
              <h1>Learn from Instructors who have Years of Industry Experience</h1>
              <hr />
              <p class="caption_4_text">Our instructors are well-trained, professional individuals, with years of experience in the fields they teach.</p>
              <?php echo anchor('request_information', 'Request More Info', array('class' => 'btn btn-danger')); ?></p>
            </div>
        </div>
	<!--end carousel item -->
	
	
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      
      
       <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="button active">Short Term Career Training</li>
            <li data-target="#myCarousel" data-slide-to="1" class="button" >Tour EIT's Facilities</li>
            <li data-target="#myCarousel" data-slide-to="2" class="button" >Hands-on Training</li>
            <li data-target="#myCarousel" data-slide-to="3" class="button" >Instructors Have Years of Experience</li>
          </ol>
          
      
    </div><!-- /.carousel -->
    
     <!-- Indicators -->
     
     <!--
     <div class="row carousel-indicators">
     	<div data-target="#myCarousel" data-slide-to="0" class="col-md-3 button"></div>
        <div data-target="#myCarousel" data-slide-to="0" class="col-md-3 button"></div>
        <div data-target="#myCarousel" data-slide-to="0" class="col-md-3 button"></div>
        <div data-target="#myCarousel" data-slide-to="0" class="col-md-3 button"></div>
     
     </div>
     -->
     
     


         


      <!-- end Indicators -->

    
    <hr class="featurette-divider" >
    

    <div class="container marketing">
    
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
              <li><?php echo anchor("training_programs/industrial_maintenance_mechatronics","Industrial Maintenance & Mechatronics");?></li>
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

<hr/>


      <!-- EIT Summary -->

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
     
       <!-- Recent News -->

      <div class="row news_row">
      <div class="container marketing">
      
      <?php if (isset($news) && count($news) > 0){
		   echo '<h2>Recent News</h2>';
			  
			  foreach($news as $row){
				  
				  	print "
				  		<a href='".site_url('blog/'.$row['slug'])."' class='col-sm-6 wow fadeInUp'>
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
      
       <!-- Upcoming Events -->
     
      <?php if (isset($events) && count($events) > 0){
		  
		  print '<hr class="featurette-divider">
				 <div class="row news_row events_row">
      	  		 <div class="container marketing">';
	  
		   echo '<h2>Upcoming Events</h2>';
			  
			  foreach($events as $row){
				  
				  	print "
				  		<a href='".site_url('blog/'.$row['slug'])."' class='col-sm-6 wow fadeInUp'>
							<div class='row'><h4>".$row['title']."</h4><span class='index_date'>".$row['event_date']."</span></div>
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
	  
	  print '</div>
      		 </div>';
	  
	  ?>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->
      
</div>