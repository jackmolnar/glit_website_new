    <nav class="navbar navbar-inverse " role="navigation">
      <div class="container">
        <div class="navbar-header">
         
          <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
          <a class="navbar-brand" href="<?php echo base_url("index.php");?>"><img src="<?php echo base_url("assets/images/eit_logo.png");?>" /></a>
        </div>

	<div class="right_content">

		
		<div class="reg_nav">
        <!-- contact_info -->
        <div class="contact">
		<div id="phone_number">
		<span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;814-868-9900<br/>
        </div>
        <!--
        <div class="address">940 Millcreek Mall<br/>
        Erie, Pennsylvania 19565</div>
		</div>
        -->
        </div>
        <!-- contact_info -->

        <!-- req more info button -->
		<div id="top_req_info">
        <div class="btn-group">
		<button type="button" class="btn btn-warning btn-sm" onclick="location.href='<?php echo base_url('index.php/request_information'); ?>'" ><span class="glyphicon glyphicon-envelope"></span><span class="top_req_info_text">&nbsp;&nbsp;REQUEST INFO</span></button>
        <button type="button" class="btn btn-warning btn-sm" onclick="location.href='<?php echo 'https://www.google.com/maps?saddr=My+Location&daddr=940+Millcreek+Mall,+Erie,+PA+16565'; ?>'"><span class="glyphicon glyphicon-map-marker"></span><span class="top_req_info_text">&nbsp;&nbsp;DIRECTIONS</span></button>
        </div>
		</div>
        <!-- req more info button -->
          
        
        <div class="btn-group">
         <!-- nav button -->
         <button type="button" class="navbar-toggle btn btn-warning btn-sm" data-toggle="collapse" data-target=".navbar-ex1-collapse">
         <span class="glyphicon glyphicon-list"></span>
          <span class="nav_dropdown_text">NAVIGATION&nbsp;&nbsp;</span>
          
          </button>
          <!-- nav button --> 
          <!-- call button -->
          <button type="button" class="btn btn-warning btn-sm call_button" >
            <span class="glyphicon glyphicon-earphone"></span><span class="call_button_text">&nbsp;CALL</span>
          </button>
          <!-- call button -->
          </div>
          
          </div><!-- end reg nav -->
          
          <!-- start mobile nav -->
          <div class="mobile_nav">
          	<div class="btn-group btn-group-justified">
            
            	<div class="btn-group">
                <button type="button" class="navbar-toggle btn btn-warning btn-sm" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="glyphicon glyphicon-list"></span>
                <span class="nav_dropdown_text">NAV</span>
                </button>
                </div>
                <div class="btn-group">
                 <button type="button" class="btn btn-warning btn-sm call_button" >
                 <span class="glyphicon glyphicon-earphone"></span><span class="call_button_text">CALL</span>
              	 </button>
                 </div>
                <div class="btn-group">
                 <button type="button" class="btn btn-warning btn-sm" onclick="location.href='<?php echo base_url('index.php/request_information'); ?>'" >
                 <span class="glyphicon glyphicon-envelope"></span><span class="top_req_info_text">INFO</span>
                 </button>
                 </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-warning btn-sm" onclick="location.href='<?php echo 'https://www.google.com/maps?saddr=My+Location&daddr=940+Millcreek+Mall,+Erie,+PA+16565'; ?>'">
                  <span class="glyphicon glyphicon-map-marker"></span><span class="top_req_info_text">FIND</span>
                  </button>
                  </div>
                  
            </div>
          
          </div><!-- END mobile nav -->
          
          
          </div><!-- end right content -->
          
          
          <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="<?php echo base_url('index.php/training_programs'); ?>" class="dropdown-toggle" data-toggle="dropdown">PROGRAMS <b class="caret"></b></a>
              <ul class="dropdown-menu">
		<li class="program_header">COMPUTER PROGRAMS</li>
		<li><?php echo anchor("training_programs/business_information_management","BUSINESS AND INFORMATION MANAGEMENT");?></li>
        <li><?php echo anchor("training_programs/multimedia_graphic_design","MULTIMEDIA GRAPHIC DESIGN");?></li>
        <li><?php echo anchor("training_programs/network_database_professional","NETWORK AND DATABASE PROFESSIONAL");?></li>   
        
		
		
		<li class="program_header">ELECTRONICS PROGRAMS</li>
        <li><?php echo anchor("training_programs/biomedical_equipment_technology","BIOMEDICAL EQUIPMENT TECHNOLOGY");?></li>
        <li><?php echo anchor("training_programs/electronics_technician","ELECTRONICS TECHNICIAN");?></li>
        <li><?php echo anchor("training_programs/electronics_engineering_technology","ELECTRONICS ENGINEERING TECHNOLOGY");?></li>
        

		<li class="program_header">MANUFACTURING PROGRAMS</li>
        <li><?php echo anchor("training_programs/cnc_machinist_technician","CNC / MACHINIST TECHNICIAN");?></li> 
        <li><?php echo anchor("training_programs/electrician","ELECTRICIAN");?></li>
        <li><?php echo anchor("training_programs/maintenance_technician","MAINTENANCE TECHNICIAN");?></li>
        <li><?php echo anchor("training_programs/rhvac_technology","RHVAC TECHNOLOGY");?></li>
        <li><?php echo anchor("training_programs/welding_technology", "WELDING TECHNOLOGY");?></li>
        
                
              </ul>
            </li>
       
            <li class="dropdown" ><a href="<?php echo base_url('index.php/admissions'); ?>" class="dropdown-toggle" data-toggle="dropdown">ADMISSIONS<b class="caret"></b></a>
			                <ul class="dropdown-menu">
                    <li class="mobile_hide"><?php echo anchor("admissions","ADMISSIONS");?></li>
                    <li><?php echo anchor("adult_students","ADULT STUDENTS");?></li>
                    <li><?php echo anchor("high_school_students","HIGH SCHOOL STUDENTS");?></li>
                  </ul>
              </li>
            <li ><?php echo anchor("financial_aid","FINANCIAL AID");?></li> 
            <li ><?php echo anchor("job_placement","JOB PLACEMENT");?></li> 
            <li class="dropdown">
              <a href="<?php echo base_url('index.php/about_eit'); ?>" class="dropdown-toggle" data-toggle="dropdown">ABOUT EIT<b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li class="mobile_hide"><?php echo anchor("about_eit","ABOUT EIT");?></li>
                <li><?php echo anchor("blog","NEWS");?></li>
                <li><?php echo anchor("consumer_info","CONSUMER INFO");?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?php echo base_url('index.php/contact'); ?>" class="dropdown-toggle" data-toggle="dropdown">CONTACT<b class="caret"></b></a>
              <ul class="dropdown-menu">
		<li><?php echo anchor("request_information","REQUEST MORE INFO");?></li>
                <li><?php echo anchor("apply_online","APPLY ONLINE");?></li>
                <li><?php echo anchor("schedule_tour","SCHEDULE A TOUR");?></li>
              </ul>
            </li>
           
          </ul>
        </div>
        
		
	</div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- /.navbar-collapse -->

    </nav>