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
            
      <?php
	  
	  if (empty($segment)){
		  
		  ?>
          
        <h2>Consumer Info Program Links</h2>

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
              <li><?php echo anchor("consumer_info/industrial_maintenance_mechatronics","INDUSTRIAL MAINTENANCE & MECHATRONICS");?></li>
              <li><?php echo anchor("consumer_info/rhvac_technology","RHVAC TECHNOLOGY");?></li>
              <li><?php echo anchor("consumer_info/welding_technology", "WELDING TECHNOLOGY");?></li>
	  	 </ul>
         
         <div class="consumer_info_guide"><a href="<?php echo site_url("assets/linked_docs/consumer_information_guide.pdf?2014");?>">Click Here to View the Consumer Information Guide</a></div>
         
         <div class="consumer_info_guide"><?php echo anchor("consumer_info/npcalc", "Click here to view the Net Price Calculator");?></div>
         
         <?php
		 
	  } else if (isset($segment)){
		  
		  ?>
          
              <style type="text/css">
        body {
           font-family:Arial;
           font-size:12px; 
 
        }
		
		.program-name
		{
		    font-family:Palatino Linotype, Times New Roman;	
		    font-size:18px;
		    font-weight:normal;
		    color:#f7941d;
		}
		
		.program-level-length
		{
		    font-family:Palatino Linotype, Times New Roman;	
		    font-size:13px;
		    font-weight:normal;
		    color:#e6e2c8;
		}
		
		
		.question-icon
		{
		    float:left; 
		    width:12px; 
		    height:8px;
		    margin-top:3px;
		    background-image:url(<?php echo $depth; ?>images/ge_template/icon_q.png);
		    background-repeat:no-repeat;
		}
		
		.answer-icon
		{
		    float:left; 
		    width:12px; 
		    height:8px;
		    margin-top:3px;
		    background-image:url(<?php echo $depth; ?>images/ge_template/icon_a.png);
		    background-repeat:no-repeat;
		}
		
		.qa-text
		{
		    float:left; 
		    width:270px;
		    margin-left:5px;
		    
		    font-family:Arial;
		    font-size:12px;
		    font-weight:bold;
		    color:#333333;
		}
		
		.qa-text-long
		{
		    float:left; 
		    width:304px;
		    margin-left:5px;
		    
		    font-family:Arial;
		    font-size:12px;
		    font-weight:bold;
		    color:#333333;
		}
		
		.qa-space
		{
		    height:15px;
		}
		
		.divider
		{
		    background-image: url(<?php echo $depth; ?>images/ge_template/dotdivider.gif);
		    background-repeat:repeat-x;
		    height:1px;
		    margin-top:15px;
		    padding-bottom:15px;
		    margin-left:0px; 
		    margin-right:15px;
		}
		
		#divAdditionalInfoLink
		{
		    background-image:url(<?php echo $depth; ?>images/ge_template/icon_question.png); 
		    background-repeat:no-repeat; 
		    background-position:0px 1px; 
		    height:15px; 
		    padding-left:18px; 
		    margin-left:5px;
		    margin-top:80px;
		}
		
		a:link
		{
		    font-family:Arial;
		    font-size:11px;
		    color:#333333;
		    font-weight:normal;
		    text-decoration:underline;
		}
		a:visited
		{
		    font-family:Arial;
		    font-size:11px;
		    color:#333333;
		    font-weight:normal;
		    text-decoration:underline;
		}
		a:hover
		{
		    font-family:Arial;
		    font-size:11px;
		    color:#333333;
		    font-weight:normal;
		    text-decoration:underline;
		}
		
		.small-text
		{
		    font-family:Arial;
		    font-size:11px;
		    color:#333333;
		    font-weight:normal;
		}
		
		.popup-close
		{
			cursor:pointer;
		}
        
    </style>

          
          <?php
		  
		  $depth =  '../../assets/';
		  
		  include 'assets/includes/ge_templates/'.$segment.'.php';
		  
	  }
	  
	  ?>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->
      
</div>