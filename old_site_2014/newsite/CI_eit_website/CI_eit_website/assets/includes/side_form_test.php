<h2>Request Info</h2>

<form action='' method='post' name='final' id='final' role='form' class='form-inline'>

<input type="hidden" value="side_form" name="form_type" />

<input  type='text' name='first_name' class='form-control half_size' placeholder='First Name'  />

<input  type='text' name='last_name'  class='form-control half_size' placeholder='Last Name' />

<input type='text' name='home_phone' size='13' id='home_phone' class='form-control half_size' placeholder='Phone'/>

<input  type='text' name='email' size='13' class='form-control half_size' placeholder='Email'/>


<div id='text_message' class='half_size' style='float:left;'></div><div id='text_message_box' class='half_size'  style='float:left;'></div>

<input  type='text' name='eit' size='5' style='display:none;' />

<textarea class='form-control' placeholder='Message' name='message' id='message' style='height:75px;'></textarea>

<h3>Program of Interest</h3><span style='font-size:11px;'>Hold CTRL and Click to Select More then One</span>

<select name='program[]' multiple='multiple' class='form-control' >";

<?

$program_list = array("Biomedical Equipment Tech.","Business and Info. Management","CNC Machinist Technician","Electrician","Electronics Engineering Tech.","Electronics Technician","Maintenance Technician","Multimedia Graphic Design","Network & Database Professional","RHVAC Technology", "Welding Technology");


for($i=0;$i<count($program_list);$i++){

print"
<option value='".$program_list[$i]."' />".$program_list[$i]."</option>";
}

?>

</select>

<input onclick="track_side_form();" type='submit' name='submit_application' value='SUBMIT' id='submit_application'  />

</form>
