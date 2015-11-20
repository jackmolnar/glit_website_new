
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
         
<?php
$program_list = array("Auto Body Technician","Biomedical Equipment Tech.","Business and Info. Management","CNC Machinist Technician","Electrician","Electronics Engineering Tech.","Electronics Technician","Industrial Maintenance & Mechatronics","Multimedia Graphic Design","Network & Database Professional","RHVAC Technology", "Welding Technology");

?>

<h2>Request More Info</h2>

<hr>

<div class="error"></div>

<div class='well well-lg'><!-- start the form well -->

<form action='' method='post' id='final' name='final' role='form' class='form-inline req_info_form'>

<input type="hidden" value="req_info" name="form_type" />

<input  type='text' name='first_name' class='form-control half_size' placeholder='First Name' />

<input  type='text' name='last_name' class='form-control half_size' placeholder='Last Name' />

<input type='text' name='home_phone' size='13' id='home_phone' class='form-control half_size' placeholder='Phone'/>

<input  type='text' name='email' size='13' class='form-control half_size' placeholder='Email'/>

<div id='text_message' style='height:auto;'></div><div id='text_message_box'></div>

<input  type='text' name='eit' size='5' style='display:none;' />

<input  type='text' name='address' class='form-control' placeholder='Address'/>

<input  type='text' name='city' class='form-control' placeholder='City'/>

<input  type='text' name='state' size='13' class='form-control half_size' placeholder='State'/>

<input  type='text' name='zip' class='form-control half_size' placeholder='Zip Code'/>

<textarea class='form-control' placeholder='Message' name='message' id='message' style='height:100px;'></textarea>

<table class='program_list_table'><tr>

<td colspan='2'><h3>Programs of Interest</h3></td>

</tr>

				<?php $program_list = array("Auto Body Technician",
									  "Biomedical Equipment Technology",
									  "Business and Information Management",		  
									  "CNC / Machinist Technician",
									  "Electrician",
									  "Electronic Engineering Technology",
									  "Electronics Technician",
									  "Industrial Maintenance & Mechatronics",
									  "Multimedia Graphic Design",
									  "Network & Database Professional",
									  "RHVAC Technology",
									  "Welding Technology",
									);
									
			//$half_program_list_count = (count($program_list))/2;

			for($i=0;$i<count($program_list);$i++){
					print "<tr><td><input type='hidden' name='program_count' value='".count($program_list)."' />";
					print "<input type='checkbox' id='program_$i' name='program[]' value='".$program_list[$i]."'/></td><td> ".$program_list[$i]."<br/></td></tr>";
				}

print"</table>";

?>

<hr>

<input data-form='req_info_form' type='submit' name='submit_application' value='SUBMIT' id='submit_application'  />

</form>

</div><!-- end the form well -->


  	<hr>
  		</div>
  
        <div class="col-md-4">

          
          
        </div>
        
    </div>

      <!-- /END THE FEATURETTES -->
      
</div>
</div>