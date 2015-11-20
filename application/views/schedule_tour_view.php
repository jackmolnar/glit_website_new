


<?php

$assets_depth = base_url().'assets/';

?>

<link href="<?php echo $assets_depth;?>css/ui_smoothness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet"  type="text/css">


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

<h2>Schedule a Tour of EIT</h2>

<hr>

<div class="error"></div>

<p>If you would like to visit our facility and meet with admissions staff please fill out the form below. Someone will be in touch with you to confirm your appointment.</p>

<div class='well well-lg'><!-- start the form well -->

<form action='' method='post' name='final' id="final" role='form' class='form-inline req_info_form'>

<input type="hidden" value="tour" name="form_type" />

<input  type='text' name='date'  class='form-control half_size' id='main_date' placeholder='Date Available' />

<input  type='text' name='alt_date' class='form-control half_size' id='alt_date' placeholder='Alternate Date' />

<input  type='text' name='first_name'  class='form-control half_size' placeholder='First Name' />

<input  type='text' name='last_name' class='form-control half_size' placeholder='Last Name' />

<input  type='text' name='eit' size='5' style='display:none;' />

<input  type='text' name='address' class='form-control' placeholder='Address'/>

<input  type='text' name='city' class='form-control' placeholder='City Name'/>

<input  type='text' name='state' size='13' class='form-control half_size' placeholder='State'/>

<input  type='text' name='zip' class='form-control half_size' placeholder='Zip Code'/>

<input type='text' name='home_phone' size='13' id='home_phone' class='form-control half_size' placeholder='Home Phone'/>

<input  type='text' name='email' size='13' class='form-control half_size' placeholder='Email Address'/>

<div id='text_message' style='height:auto;'></div><div id='text_message_box'></div>

<?php
print "<table class='program_list_table' style='margin-top:15px;'><tr>

							<td colspan='2'><h3>Programs of Interest</h3></td>

						</tr>";

				$program_list = array("Auto Body Technician",
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

<input data-form='schedule_tour_form' type='submit' name='submit_application' value='SUBMIT' id='submit_application'  />

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