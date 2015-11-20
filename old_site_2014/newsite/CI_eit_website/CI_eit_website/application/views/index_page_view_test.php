<script>
$(window).resize(function() {
  $( "body" ).prepend( "<div>" + $( window ).width() + "</div>" );
});

alert('javascript works');
</script>
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
	<!-- carousel item -->
        <div class="item active">  
	<img src="<?php echo base_url("assets/images/slides/slide9.jpg");?>" width="100%">
            <div class="carousel-caption caption_1">
             <h1 class="caption_1_head">Train for a Technology Career ... In Less Time Than You Think</h1>
             <hr />
              <p class="caption_1_text">EIT offers many programs that suit your interests. All programs are short in length and only feature classes that pertain to your program of choice.</p>
              <p class="caption_1_text"><?php echo anchor('training_programs', 'View All Our Programs'); ?></p>
          </div>
        </div>
	<!--end carousel item -->
	<!-- carousel item -->
        <div class="item">
		<img src="<?php echo base_url("assets/images/slides/slide4.jpg");?>" width="100%">
            <div class="carousel-caption caption_2">
              <h1>Tour EIT's Impressive Facilities</h1>
              <hr />
              <p>EIT is a 40,000 square foot building that come equipped with modern computers and software, labs with realistic settings, 15 welding booths, and a large manufacturing lab.</p>
              <p class="caption_1_text"><?php echo anchor('schedule_tour', 'Schedule Your Tour'); ?></p>
            </div>
        </div>
	<!--end carousel item -->
    <!-- carousel item -->
        <div class="item">
		<img src="<?php echo base_url("assets/images/slides/slide7.jpg");?>" width="100%">
            <div class="carousel-caption caption_3">
              <h1>Get Hands-on Training in Real-World Settings</h1>
              <hr />
              <p>Going to EIT is a lot like on-the-job training. Much of the course work is hands-on and similar to what you would find in the professional world.</p>
            </div>
        </div>
	<!--end carousel item -->
    <!-- carousel item -->
        <div class="item">
		<img src="<?php echo base_url("assets/images/slides/slide8.jpg");?>" width="100%">
            <div class="carousel-caption caption_4">
              <h1>Learn from Instructors who have Years of Industry Experience</h1>
              <hr />
              <p>Our instructors are well-trained, professional individuals, with years of experience in the fields they teach.</p>
            </div>
        </div>
	<!--end carousel item -->
	
	
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    
    <hr class="featurette-divider" >
    

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row icon_row">
        <div class="col-sm-4">
        <div class="computer_icon"></div>
          <h2 class="icon_header">COMPUTER<br />TRAINING</h2>
          <hr class="featurette-divider" >
          <ul>
          	<li><?php echo anchor("training_programs/business_information_management","Business and Information Management");?></li>
            <br />
            <li><?php echo anchor("training_programs/multimedia_graphic_design","Multimedia Graphic Design");?></li>
            <br />
        	<li><?php echo anchor("training_programs/network_database_professional","Network and Database Professional");?></li> 
          </ul>
         
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-4">
          <div class="electronics_icon"></div>
          <h2 class="icon_header">ELECTRONICS TRAINING</h2>
          <hr class="featurette-divider" >
          <ul>
          <li><?php echo anchor("training_programs/biomedical_equipment_technology","Biomedical Equipment Technology");?></li>
          <br />
          <li><?php echo anchor("training_programs/electronics_technician","Electronics Technician");?></li>
          <br />
          <li><?php echo anchor("training_programs/electronics_engineering_technology","Electronics Engineering Technology");?></li>
          </ul>
          
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-4">
          <div class="manufacturing_icon"></div>
          <h2 class="icon_header">MANUFACTURING TRAINING</h2>
          <hr class="featurette-divider" >
          <ul>
          <li><?php echo anchor("training_programs/cnc_machinist_technician","CNC / Machinist Technician");?></li> 
          <br />
          <li><?php echo anchor("training_programs/electrician","ELECTRICIAN");?></li>
          <br />
          <li><?php echo anchor("training_programs/maintenance_technician","Maintenance Technician");?></li>
          <br />
          <li><?php echo anchor("training_programs/rhvac_technology","RHVAC Technology");?></li>
          <br />
          <li><?php echo anchor("training_programs/welding_technology", "Welding Technology");?></li>
          </ul>
        
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      
</div>

<hr/>


      <!-- START THE FEATURETTES -->

      <div class="row eit_summary">
	       <div class="container marketing">
        <div class="col-sm-8">
          <h1 class="featurette-heading"><span class="text-muted">A Little About </span><br/>Erie Institute of Technology</h1>
          <p style="font-size:16px;">Erie Institute of Technology or EIT is an Erie Pennsylvania technical or trade school providing training programs for computer, electronics, manufacturing, technology careers.</p>
	  <p style="font-size:16px;">
Training programs include Welding, RHVAC, Electrican, Graphic Design, CNC, Network and Database Administrator, and Biomedical Equipment Technology.</p>
        </div>
        <div class="col-sm-4">
          <img class="img-circle img-responsive" src="<?php echo site_url('../assets/images/eit_outside.jpg'); ?>" style="max-height:250px; max-width:250px;" alt="Erie Institute of Technology">
        </div>
</div>
      </div>

      <hr class="featurette-divider">

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

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->
      
</div>