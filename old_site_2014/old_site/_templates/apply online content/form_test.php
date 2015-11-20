<h1>Apply Online</h1>
<ul>
	<li>To determine whether you can gain from our courses of study, we ask that you complete this form. Please answer all questions as fully as you can. All information will be held in strict confidence. Upon graduation, the information on this form may assist with placement.
	</li>
	<li>This form is an information-gathering tool, therefore, school admission will not be solely based on the information provided. See <a href="admission_requirements.php">Admission Requirements</a> for more information.</li>
	<li>Please complete all sections of this form.</li>
</ul>
<?
		print "
			<form name='form_step_1' id='form_step_1' action='step two/' method='post'>
				<table cellpadding='5' cellspacing='5'>
					<tr>
						<td colspan='2'><h2>General Information</h2></td>
					</tr>";
			/******/
				print "<tr>
							<th>First Name</th>
							<td><input class='required' type='text' name='first_name' value='$first_name' size='50' /></td>
						</tr>";
			/******/
				print "<tr>
							<th>Middle Initial</th>
							<td><input type='text' name='middle_initial' value='$middle_initial' size='20'  /></td>
						</tr>";
			/******/
				print "<tr>
							<th>Last Name</th>
							<td><input class='required' type='text' name='last_name' value='$last_name' size='50' /></td>
						</tr>";
			/******/
				print "<tr>
							<th>Maiden Name</th>
							<td><input type='text' name='maiden_name' value='$maiden_name'  size='50' /></td>
						</tr>";
			/******/
				print "<tr>
							<th>Address</th>
							<td><input class='required' type='text' name='address' value='$address'  size='50' /></td>
						</tr>";
			/******/
				print "<tr>
							<th>City</th>
							<td><input class='required' type='text' name='city' value='$city'  size='50' /></td>
						</tr>";
			/******/
				print "<tr>
							<th>State</th><td>
							<select name='state'>
								".$common->printSelectState($state)." 
							</select>
							Zip <input class='required' type='text' name='zip' value='$zip'  size='20' /></td>
						</tr>";
			/******/
				print "<tr>
							<th>Home Phone</th>
							<td><input class='required' type='text' name='home_phone' value='$home_phone' size='30' /></td>
						</tr>";
			/******/
				print "<tr>
							<th>Work Phone</th>
							<td><input type='text' name='work_phone' value='$work_phone' size='30' /></td>
						</tr>";
			/******/
				print "<tr>
							<th>May we contact you at work?</th>";
							if($contact_choice=="no"){
								print "<td><input type='radio' id='contact_choice_1' name='contact_choice' value='yes'/> <label for='contact_choice_1'>Yes</label> 
											<input type='radio' id='contact_choice_2'  name='contact_choice' value='no'  selected='selected' /> <label for='contact_choice_2'>No</label></td></tr>";
							}else{
								print "<td><input type='radio' id='contact_choice_1' name='contact_choice' value='yes' selected='selected' /> <label for='contact_choice_1'>Yes</label> 
											<input type='radio' id='contact_choice_2'  name='contact_choice' value='no'/> <label for='contact_choice_2'>No</label></td></tr>";
							}
			/******/
				print "<tr>
							<th>Email Address</th>
							<td><input class='required validate-email' type='text' name='email' value='$email' size='50' /></td>
						</tr>";
			/******/
				print "<tr>
							<td colspan='2'><h2>Programs of Interest</h2></td>
						</tr>";
				$program_list = array("Multimedia Graphic Design",
									  "Network and Database Professional",
									  "Office Software Specialist",
									  "Basic Electronics Technician",
									  "Biomedical Equipment Technology",
									  "Computer and Electronics Engineering Technology",
									  "Industrial Automation and Robotics Technology",
									  "Office Machine Service Technology",
									  "CNC / Machinist Technician",
									  "Maintenance Technician",
									  "Manufacturing Technician",
									  "Moldmaker / Mold Design",
									  "Plastics Molding Technician",
									  "Quality Control Technician"
									);
				for($i=0;$i<count($program_list);$i++){
					print "<tr><td><input type='hidden' name='program_count' value='".count($program_list)."' /></td>";
					if($program_values[$i]){
						print "<td><input type='checkbox' id='program_$i' name='program_$i' selected='selected' /> <label for='program_$i'>".$program_list[$i]."</label></td></tr>";
					}else{
						print "<td><input type='checkbox' id='program_$i' name='program_$i' /> <label for='program_$i'>".$program_list[$i]."</label></td></tr>";
					}
				}
			/******/
				print "<tr>
						<td colspan='2' align='right'><input type='submit' name='submitok' value='next' /></td>
					</tr>
				</table>
			</form>
			<script type='text/javascript'>new FormValidator ('form_step_1');</script>
		";
?>