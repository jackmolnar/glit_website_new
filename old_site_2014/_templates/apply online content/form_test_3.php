<h1>Apply Online</h1>

<?

	print "<form name='form_step_4' id='form_step_4' action='../step five/' method='post'>";

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

			/************

			STEP THREE VARIABLES

			************/

			print "<input type='hidden' name='highschool_name' value='".$_REQUEST['highschool_name']."' />

					<input type='hidden' name='highschool_city' value='".$_REQUEST['highschool_city']."' />

					<input type='hidden' name='highschool_state' value='".$_REQUEST['highschool_state']."' />

					<input type='hidden' name='graduation_year' value='".$_REQUEST['graduation_year']."' />

					<input type='hidden' name='state_exam' value='".$_REQUEST['state_exam']."' />

					<input type='hidden' name='year_exam' value='".$_REQUEST['year_exam']."' />

					<input type='hidden' name='school_name_1' value='".$_REQUEST['school_name_1']."' />

					<input type='hidden' name='school_city_1' value='".$_REQUEST['school_city_1']."' />

					<input type='hidden' name='school_state_1' value='".$_REQUEST['school_state_1']."' />

					<input type='hidden' name='program_of_study_1' value='".$_REQUEST['program_of_study_1']."' />

					<input type='hidden' name='graduated_choice_1' value='".$_REQUEST['graduated_choice_1']."' />

					<input type='hidden' name='degree_earned_1' value='".$_REQUEST['degree_earned_1']."' />

					<input type='hidden' name='last_year_1' value='".$_REQUEST['last_year_1']."' />

					<input type='hidden' name='school_name_2' value='".$_REQUEST['school_name_2']."' />

					<input type='hidden' name='school_city_2' value='".$_REQUEST['school_city_2']."' />

					<input type='hidden' name='school_state_2' value='".$_REQUEST['school_state_2']."' />

					<input type='hidden' name='program_of_study_2' value='".$_REQUEST['program_of_study_2']."' />

					<input type='hidden' name='graduated_choice_2' value='".$_REQUEST['graduated_choice_2']."' />

					<input type='hidden' name='degree_earned_2' value='".$_REQUEST['degree_earned_2']."' />

					<input type='hidden' name='last_year_2' value='".$_REQUEST['last_year_2']."' />";

		/******/

			print "

				<table cellpadding='5' cellspacing='5'>

					<tr>

						<td colspan='2'><h2>Employment History</h2></td>

					</tr>";

		/******/

			print "<tr>

					<td colspan='2'>Please list past job experience, starting with the most recent.</td>

				</tr>";	

			/******/

				print "<tr>

							<td></td>

							<td><h2>Job 1</h2></td>

						</tr>";	

					/******/

						print "<tr>

									<th>Employer Name</th>

									<td><input type='text' size='50' name='employer_name_1' value='$employer_name_1' /></td>

								</tr>";	

					/******/

						print "<tr>

									<th>Address</th>

									<td><input type='text' size='50' name='address_1' value='$address_1' /></td>

								</tr>";	

					/******/

						print "<tr>

									<th>City</th>

									<td><input type='text' size='50' name='city_1' value='$city_1' /></td>

								</tr>";	

					/******/

						print "<tr>

								<th>State</th>

								<td>

									<select name='state_1'>

										".$common->printSelectState($state_1)." 

									</select> 

								Zip <input size='20' class='required' type='text' name='zip_1' value='$zip_1' /></td>

							</tr>";	

					/******/

						print "<tr>

									<th>Position</th>

									<td><input type='text' size='50' name='position_1' value='$position_1' /></td>

								</tr>";		

					/******/

						print "<tr>

									<th>Date Started</th>

									<td><input type='text' size='20' name='date_started_1' value='$date_started_1' /></td>

								</tr>";		

					/******/

						print "<tr>

									<th>Date Ended</th>

									<td><input type='text' size='20' name='date_ended_1' value='$date_ended_1' /></td>

								</tr>";

					/******/

				print "<tr>

							<td></td>

							<td><h2>Job 2</h2></td>

						</tr>";	

					/******/

						print "<tr>

									<th>Employer Name</th>

									<td><input size='50' type='text' name='employer_name_2' value='$employer_name_2' /></td>

								</tr>";	

					/******/

						print "<tr>

									<th>Address</th>

									<td><input size='50' type='text' name='address_2' value='$address_2' /></td>

								</tr>";	

					/******/

						print "<tr>

									<th>City</th>

									<td><input size='50' type='text' name='city_2' value='$city_2' /></td>

								</tr>";	

					/******/

						print "<tr>

								<th>State</th>

								<td><select name='state_2'>

										".$common->printSelectState($state_2)." 

									</select>  

								Zip <input class='required' size='20' type='text' name='zip_2' value='$zip_2' /></td>

							</tr>";	

					/******/

						print "<tr>

									<th>Position</th>

									<td><input type='text' size='50' name='position_2' value='$position_2' /></td>

								</tr>";		

					/******/

						print "<tr>

									<th>Date Started</th>

									<td><input type='text' size='20' name='date_started_2' value='$date_started_2' /></td>

								</tr>";		

					/******/

						print "<tr>

									<th>Date Ended</th>

									<td><input type='text' size='20' name='date_ended_2' value='$date_ended_2' /></td>

								</tr>";	

				print "<tr>

							<td></td>

							<td><h2>Job 3</h2></td>

						</tr>";	

					/******/

						print "<tr>

									<th>Employer Name</th>

									<td><input type='text' size='50' name='employer_name_3' value='$employer_name_3' /></td>

								</tr>";	

					/******/

						print "<tr>

									<th>Address</th>

									<td><input type='text' size='50' name='address_3' value='$address_3' /></td>

								</tr>";	

					/******/

						print "<tr>

									<th>City</th>

									<td><input type='text' size='50' name='city_3' value='$city_3' /></td>

								</tr>";	

					/******/

						print "<tr>

								<th>State</th>

								<td><select name='state_3'>

										".$common->printSelectState($state_3)." 

									</select>  

								Zip <input class='required' type='text' name='zip_3' value='$zip_3' /></td>

							</tr>";	

					/******/

						print "<tr>

									<th>Position</th>

									<td><input size='50' type='text' name='position_3' value='$position_3' /></td>

								</tr>";		

					/******/

						print "<tr>

									<th>Date Started</th>

									<td><input type='text' size='20' name='date_started_3' value='$date_started_3' /></td>

								</tr>";		

					/******/

						print "<tr>

									<th>Date Ended</th>

									<td><input type='text' size='20' name='date_ended_3' value='$date_ended_3' /></td>

								</tr>";			

			

		/******/

			print "<tr>

					<td colspan='2' align='right'><input type='submit' name='submitok' value='next' /></td>

				</tr>

			</table>

		</form>";

?>