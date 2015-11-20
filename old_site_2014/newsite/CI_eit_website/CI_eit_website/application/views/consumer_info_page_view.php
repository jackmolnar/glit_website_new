<div class="row program_page_header">
<div class="container">
	<h1><?php if(isset($h1)) echo $h1; ?></h1>
    </div>
</div>
<div class="row breadcrumb_bar">
<div class="container">
	<?php echo $breadcrumbs; ?>
    </div>
</div>

      <div class="row consumer_info">
      <div class="container marketing">
      
      <h2>Consumer Info Program Links</h2>
      
      <?php
	  
	  if (empty($segment)){
		  
		  ?>
          <ul>
              <!--the program links-->
              <li><?php echo anchor("consumer_info/business_information_management","BUSINESS AND INFORMATION MANAGEMENT");?></li>
              <li><?php echo anchor("consumer_info/multimedia_graphic_design","MULTIMEDIA GRAPHIC DESIGN");?></li>
              <li><?php echo anchor("consumer_info/network_database_professional","NETWORK AND DATABASE PROFESSIONAL");?></li>
          </ul>
          <ul>
              <li><?php echo anchor("consumer_info/biomedical_equipment_technology","BIOMEDICAL EQUIPMENT TECHNOLOGY");?></li>
              <li><?php echo anchor("consumer_info/electronics_technician","ELECTRONICS TECHNICIAN");?></li>
              <li><?php echo anchor("consumer_info/electronics_engineering_technology","ELECTRONICS ENGINEERING TECHNOLOGY");?></li>
          </ul>
          <ul>
              <li><?php echo anchor("consumer_info/cnc_machinist_technician","CNC / MACHINIST TECHNICIAN");?></li>
              <li><?php echo anchor("consumer_info/electrician","ELECTRICIAN");?></li>
              <li><?php echo anchor("consumer_info/maintenance_technician","MAINTENANCE TECHNICIAN");?></li>
              <li><?php echo anchor("consumer_info/rhvac_technology","RHVAC TECHNOLOGY");?></li>
              <li><?php echo anchor("consumer_info/welding_technology", "WELDING TECHNOLOGY");?></li>
	  	 </ul>
         
         <div class="consumer_info_guide"><?php echo anchor("consumer_info/consumer_information_guide.pdf", "Click here to view the full Consumer Info Guide");?></div>
         
         <?php
		 
	  } else if (isset($segment)){
		  
		  $depth =  '../../assets/';
		  
		  include 'assets/includes/ge_templates/'.$segment.'.php';
		  
	  }
	  
	  ?>
      
      
      
      
      
      
     <!-- <?php if (isset($news) && count($news) > 0){
		   
		   //set even odd iterator
		   	$r = 0;
			
			print '<div class="row">';
			  
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
					
					//check whether iterator is even or odd, print appropriate <div> tag
				  if($r % 2 != 0){
					  print "</div><div class='row'>";
				  }
				  
				  $r++;
				  
			  }
			  
	  }
	  
	  ?>-->
     
      </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->
      
</div>