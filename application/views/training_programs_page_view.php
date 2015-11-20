
<?php

$assets_depth = base_url().'assets/';

?>

<div class="<?php echo $slug; ?>">

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

    <div class="container">

      <div class="row content_container_row">
      
        <div class="col-md-8">
          <?php if(isset($primary_text)) { echo $primary_text; } ?>
          
          <h2>COMPUTER PROGRAMS</h2>
          <?php echo anchor("training_programs/business_information_management","BUSINESS AND INFORMATION MANAGEMENT");?></p>
        <p><?php echo anchor("training_programs/multimedia_graphic_design","MULTIMEDIA GRAPHIC DESIGN");?></p>
        <p><?php echo anchor("training_programs/network_database_professional","NETWORK AND DATABASE PROFESSIONAL");?></p>

  	<hr>
    
     <h2>ELECTRONICS PROGRAMS</h2>
          <p><?php echo anchor("training_programs/biomedical_equipment_technology","BIOMEDICAL EQUIPMENT TECHNOLOGY");?></p>
        <p><?php echo anchor("training_programs/electronics_technician","ELECTRONICS TECHNICIAN");?></p>
        <p><?php echo anchor("training_programs/electronics_engineering_technology","ELECTRONICS ENGINEERING TECHNOLOGY");?></p>

  	<hr>
    
    <h2>MANUFACTURING PROGRAMS</h2>
        <p><?php echo anchor("training_programs/cnc_machinist_technician","CNC / MACHINIST TECHNICIAN");?></p> 
        <p><?php echo anchor("training_programs/industrial_maintenance_mechatronics","INDUSTRIAL MAINTENANCE & MECHATRONICS");?></p>
        
  	<hr>
        
     <h2>SKILLED TRADE PROGRAMS</h2>
        <p><?php echo anchor("training_programs/auto_body_technician","AUTO BODY TECHNICIAN");?></p> 
        <p><?php echo anchor("training_programs/electrician","ELECTRICIAN");?></p>
        <p><?php echo anchor("training_programs/rhvac_technology","RHVAC TECHNOLOGY");?></p>
        <p><?php echo anchor("training_programs/welding_technology", "WELDING TECHNOLOGY");?></p>
        
        <hr>
        
     <h2>CONTINUING EDUCATION</h2>
        <p>EIT offers continuing education to area employers and employees. This allows individuals to learn new skills and employers to make sure their employees have the skills they require</p>		<p><?php echo anchor("http://eit-continuinged.com/","VIEW THE WEBSITE");?></p> 
        
  		</div>
  
        <div class="col-md-4 side_form_column">

          <div class="side_form"><?php include('assets/includes/side_form.php'); ?></div>
          
        </div>
        
    </div>

      

      
     

      <!-- /END THE FEATURETTES -->
      
</div>
</div>