<h1>Apply Online</h1>
<?
	print "
		<form action='../step three/' method='post' name='form_step_2' id='form_step_2'>
			<input type='hidden' name='first_name' value='".$_REQUEST['first_name']."' />
			<input type='hidden' name='middle_initial' value='".$_REQUEST['middle_initial']."' />
			<input type='hidden' name='last_name' value='".$_REQUEST['last_name']."' />
			<input type='hidden' name='maiden_name' value='".$_REQUEST['maiden_name']."' />
			<input type='hidden' name='address' value='".$_REQUEST['address']."' />
			<input type='hidden' name='city' value='".$_REQUEST['city']."' />
			<input type='hidden' name='state' value='".$_REQUEST['state']."' />
			<input type='hidden' name='zip' value='".$_REQUEST['zip']."' />
			<input type='hidden' name='home_phone' value='".$_REQUEST['home_phone']."' />
			<input type='hidden' name='work_phone' value='".$_REQUEST['work_phone']."' />
			<input type='hidden' name='contact_choice' value='".$_REQUEST['contact_choice']."' />
			<input type='hidden' name='email' value='".$_REQUEST['email']."' />
			<input type='hidden' name='program_count' value='".$_REQUEST['program_count']."' />";
			for($i=0;$i<$_REQUEST['program_count'] ;$i++){
				print "<input type='hidden' name='program_$i' value='".$_REQUEST['program_$i']."' />";
			}
	/******/
		print "
			<table cellpadding='5' cellspacing='5'>
				<tr>
					<td colspan='2'><h2>Personal Information</h2></td>
				</tr>";
	/******/
		print "<tr>
					<th>Date of Birth</th>
					<td><input class='required' type='text' name='date_of_birth' value='$date_of_birth' size='50' /></td>
				</tr>";
	/******/
		print "<tr>
					<th>Gender</th>";
					if($gender_choice=="male"){
						print "<td><input type='radio' id='gender_choice_1' name='gender_choice' value='yes'/> <label for='gender_choice_1'>Male</label> 
									<input type='radio' id='gender_choice_2'  name='gender_choice' value='no' selected='selected' /> <label for='gender_choice_2'>Female</label></td></tr>";
					}else{
						print "<td><input type='radio' id='gender_choice_1' name='gender_choice' value='yes' selected='selected' /> <label for='gender_choice_1'>Male</label> 
									<input type='radio' id='gender_choice_2'  name='gender_choice' value='no' /> <label for='gender_choice_2'>Female</label></td></tr>";
					}
	/******/
		print "<tr>
					<th>US Veteran?</th>";
					if($veteran_choice=="yes"){
						print "<td><input type='radio' id='veteran_choice_1' name='veteran_choice' value='yes'/> <label for='veteran_choice_1'>Yes</label> 
									<input type='radio' id='veteran_choice_2'  name='veteran_choice' value='no' selected='selected' /> <label for='veteran_choice_2'>No</label></td></tr>";
					}else{
						print "<td><input type='radio' id='veteran_choice_1' name='veteran_choice' value='yes' selected='selected' /> <label for='veteran_choice_1'>Yes</label> 
									<input type='radio' id='veteran_choice_2'  name='veteran_choice' value='no' /> <label for='veteran_choice_2'>No</label></td></tr>";
					}
	/******/
		print "<tr>
					<th>US Citizen?</th>";
					if($citizen_choice=="yes"){
						print "<td><input type='radio' id='citizen_choice_1' name='citizen_choice' value='yes'/> <label for='citizen_choice_1'>Yes</label> 
									<input type='radio' id='citizen_choice_2' name='citizen_choice' value='no' selected='selected' /> <label for='citizen_choice_2'>No</label></td></tr>";
					}else{
						print "<td><input type='radio' id='citizen_choice_1' name='citizen_choice' value='yes' selected='selected' /> <label for='citizen_choice_1'>Yes</label> 
									<input type='radio' id='citizen_choice_2' name='citizen_choice' value='no' /> <label for='citizen_choice_2'>No</label></td></tr>";
					}
	/******/
		print "<tr>
					<th>PA Resident?</th>";
					if($citizen_choice=="yes"){
						print "<td><input type='radio' id='resident_choice_1' name='resident_choice' value='yes'/> <label for='resident_choice_1'>Yes</label> 
									<input type='radio' id='resident_choice_2'  name='resident_choice' value='no' selected='selected' /> <label for='resident_choice_2'>No</label></td></tr>";
					}else{
						print "<td><input type='radio' id='resident_choice_1' name='resident_choice' value='yes' selected='selected' /> <label for='resident_choice_1'>Yes</label> 
									<input type='radio' id='resident_choice_2'  name='resident_choice' value='no' /> <label for='resident_choice_2'>No</label></td></tr>";
					}
	/******/
		print "<tr>
				<td colspan='2'>Note any special conditions (health, etc.) that may affect your ability to receive training:</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<textarea name='conditions' cols='50' rows='7'>$conditions</textarea>
				</td>
			</tr>";
	/******/
		print "<tr>
				<th>I would like to being my training:</th>
				<td><input class='required' size='50' type='text' name='training_date' value='$training_date' /> (Enter in format Month, YYYY)</td>
			</tr>";
	/******/
		print "<tr>
					<th>Status</th>";
					if($status_choice=="full-time"){
						print "<td><input type='radio' id='status_choice_1' name='status_choice' value='full-time'/> <label for='status_choice_1'>Full-time</label> 
									<input type='radio' id='status_choice_2'  name='status_choice' value='part-time' selected='selected' /> <label for='status_choice_2'>Part-time</label></td></tr>";
					}else{
						print "<td><input type='radio' id='status_choice_1' name='status_choice' value='full-time' selected='selected' /> <label for='status_choice_1'>Full-time</label> 
									<input type='radio' id='status_choice_2'  name='status_choice' value='part-time' /> <label for='status_choice_2'>Part-time</label></td></tr>";
					}	
	/******/
		print "<tr>
					<td colspan='2' align='right'><input type='submit' name='submitok' value='next' /></td>
				</tr>
			</table>
		</form>
		<script type='text/javascript'>new FormValidator ('form_step_2');</script>";
?>