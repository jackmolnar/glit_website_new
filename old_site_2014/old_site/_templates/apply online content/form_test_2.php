<h1>Apply Online</h1>
<?
	print "
		<form name='form_step_3' id='form_step_3' action='../step four/' method='post'>";
			/************
			STEP ONE VARIABLES
			************/
			print "<input type='hidden' name='first_name' value='".$_REQUEST['first_name']."' />
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
			/************
			STEP TWO VARIABLES
			************/
			print "<input type='hidden' name='date_of_birth' value='".$_REQUEST['date_of_birth']."' />
				<input type='hidden' name='gender_choice' value='".$_REQUEST['gender_choice']."' />
				<input type='hidden' name='veteran_choice' value='".$_REQUEST['veteran_choice']."' />
				<input type='hidden' name='citizen_choice' value='".$_REQUEST['citizen_choice']."' />
				<input type='hidden' name='resident_choice' value='".$_REQUEST['resident_choice']."' />
				<input type='hidden' name='conditions' value='".$_REQUEST['conditions']."' />
				<input type='hidden' name='training_date' value='".$_REQUEST['training_date']."' />
				<input type='hidden' name='status_choice' value='".$_REQUEST['status_choice']."' />";
		/******/
			print "
				<table cellpadding='5' cellspacing='5'>
					<tr>
						<td colspan='2'><h2>Education Information</h2></td>
					</tr>";
		/******/
			print "<tr>
					<td colspan='2'>Complete this section if you have a high school diploma</td>
				</tr>";
			/******/
				print "<tr>
						<th>High School Name</th>
						<td><input size='50' type='text' name='highschool_name' value='$highschool_name' /></td>
					</tr>";
			/******/
				print "<tr>
						<th>High School City</th>
						<td><input size='50' type='text' name='highschool_city' value='$highschool_city' /></td>
					</tr>";
			/******/
				print "<tr>
						<th>High School State</th>
						<td><select name='highschool_state'>
								".$common->printSelectState($highschool_state)." 
							</select>
						</td>
					</tr>";
			/******/
				print "<tr>
						<th>Graduation Year</th>
						<td><input type='text' size='20' name='graduation_year' value='$graduation_year' /></td>
					</tr>";
		/******/
			print "<tr>
					<td colspan='2'>Complete this section if you have a GED</td>
				</tr>";
			/******/
				print "<tr>
						<th>State Exam was Taken:</th>
						<td>
							<select name='state_exam'>
								".$common->printSelectState($state_exam)." 
							</select>
						</td>
					</tr>";
			/******/
				print "<tr>
						<th>Year Exam was Taken:</th>
						<td><input type='text' size='20' name='year_exam' value='$year_exam' /></td>
					</tr>";
		/******/
			print "<tr>
					<td colspan='2'>List all other additional training you have had, including college and trade/business schools.</td>
				</tr>";
		/******/
			print "<tr>
					<td></td>
					<td><h2>School 1</h2></td>
				</tr>";
			/******/
				print "<tr>
						<th>School Name</th>
						<td><input type='text' size='50' name='school_name_1' value='$school_name_1' /></td>
					</tr>";
			/******/
				print "<tr>
						<th>School City</th>
						<td><input type='text' size='50' name='school_city_1' value='$school_city_1' /></td>
					</tr>";
			/******/
				print "<tr>
						<th>School State</th>
						<td>
							<select name='school_state_1'>
								".$common->printSelectState($school_state_1)." 
							</select>
						</td>
					</tr>";
			/******/
				print "<tr>
						<th>Program of Study</th>
						<td><input type='text' size='50' name='program_of_study_1' value='$program_of_study_1' /></td>
					</tr>";
			/******/
				print "<tr>
						<th>Year Graduated/Last Attended</th>
						<td><input type='text' size='20' name='last_year_1' value='$last_year_1' /></td>
					</tr>";
			/******/
				print "<tr>
					<th>Graduated</th>";
					if($graduated_choice_1=="yes"){
						print "<td><input type='radio' id='graduated_choice_1_1' name='graduated_choice_1' value='yes' selected='selected' /> <label for='graduated_choice_1_1'>Yes</label> 
									<input type='radio' id='graduated_choice_1_2'  name='graduated_choice_1' value='no' /> <label for='graduated_choice_1_2'>No</label></td></tr>";
					}else{
						print "<td><input type='radio' id='graduated_choice_1_1' name='graduated_choice_1' value='yes' /> <label for='graduated_choice_1_1'>Yes</label> 
									<input type='radio' id='graduated_choice_1_2'  name='graduated_choice_1' value='no'  selected='selected' /> <label for='graduated_choice_1_2'>No</label></td></tr>";
					}
			/******/
				print "<tr>
						<th>Type of Degree Earned</th>
						<td><input type='text' size='50' name='degree_earned_1' value='$degree_earned_1' /></td>
					</tr>";
		/******/
			print "<tr>
					<td></td>
					<td><h2>School 2</h2></td>
				</tr>";
			/******/
				print "<tr>
						<th>School Name</th>
						<td><input type='text' size='50' name='school_name_2' value='$school_name_2' /></td>
					</tr>";
			/******/
				print "<tr>
						<th>School City</th>
						<td><input type='text' size='50' name='school_city_2' value='$school_city_2' /></td>
					</tr>";
			/******/
				print "<tr>
						<th>School State</th>
						<td>
							<select name='school_state_2'>
								".$common->printSelectState($school_state_2)." 
							</select>
						</td>
					</tr>";
			/******/
				print "<tr>
						<th>Program of Study</th>
						<td><input type='text' size='50' name='program_of_study_2' value='$program_of_study_2' /></td>
					</tr>";
			/******/
				print "<tr>
						<th>Year Graduated/Last Attended</th>
						<td><input type='text' size='20' name='last_year_2' value='$last_year_2' /></td>
					</tr>";
			/******/
				print "<tr>
					<th>Graduated</th>";
					if($graduated_choice_2=="yes"){
						print "<td><input type='radio' id='graduated_choice_2_1' name='graduated_choice_2' value='yes' selected='selected' /> <label for='graduated_choice_2_1'>Yes</label> 
									<input type='radio' id='graduated_choice_2_2'  name='graduated_choice_2' value='no' /> <label for='graduated_choice_2_2'>No</label></td></tr>";
					}else{
						print "<td><input type='radio' id='graduated_choice_2_1' name='graduated_choice_2' value='yes' /> <label for='graduated_choice_2_1'>Yes</label> 
									<input type='radio' id='graduated_choice_2_2'  name='graduated_choice_2' value='no'  selected='selected' /> <label for='graduated_choice_2_2'>No</label></td></tr>";
					}
			/******/
				print "<tr>
						<th>Type of Degree Earned</th>
						<td><input type='text' size='50' name='degree_earned_2' value='$degree_earned_2' /></td>
					</tr>";
				
				
		/******/
			print "<tr>
					<td colspan='2' align='right'><input type='submit' name='submitok' value='next' /></td>
				</tr>
			</table>
		</form>";
?>