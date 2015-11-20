<h2>Apply Online</h2>
<?
	if($_REQUEST['submit_application']){
		print "Mail the application!";
	}else{
		print "
			<p>As part of the admission requirements, there is a $25.00 Application Fee due upon applying. Applicants must complete a High School Transcript and/or GED Transcript release form.</p>
			<p>Class sizes are limited to 25 students per program and will be closed to enrollment when that number is reached. Enrollment is granted on a first-come, first-served basis only to registered applicants who have completed all admission requirements. Applicants who do not enroll before a class is filled have the option to register for a future class.</p>
			<p>By click the Submit button below, I certify that the information I have provided on this application is accurate to the best of my knowledge and that any misrepresentation by me on this form could lead to future disciplinary action by Erie Institute of Technology.</p>
			<form action='' method='post'>";
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
				/************
				STEP FOUR VARIABLES
				************/
				print "<input type='hidden' name='employer_name_1' value='".$_REQUEST['employer_name_1']."' />
					<input type='hidden' name='address_1' value='".$_REQUEST['address_1']."' />
					<input type='hidden' name='city_1' value='".$_REQUEST['city_1']."' />
					<input type='hidden' name='state_1' value='".$_REQUEST['state_1']."' />
					<input type='hidden' name='zip_1' value='".$_REQUEST['zip_1']."' />
					<input type='hidden' name='position_1' value='".$_REQUEST['position_1']."' />
					<input type='hidden' name='date_started_1' value='".$_REQUEST['date_started_1']."' />
					<input type='hidden' name='date_ended_1' value='".$_REQUEST['date_ended_1']."' />
					<input type='hidden' name='employer_name_2' value='".$_REQUEST['employer_name_2']."' />
					<input type='hidden' name='address_2' value='".$_REQUEST['address_2']."' />
					<input type='hidden' name='city_2' value='".$_REQUEST['city_2']."' />
					<input type='hidden' name='state_2' value='".$_REQUEST['state_2']."' />
					<input type='hidden' name='zip_2' value='".$_REQUEST['zip_2']."' />
					<input type='hidden' name='position_2' value='".$_REQUEST['position_2']."' />
					<input type='hidden' name='date_started_2' value='".$_REQUEST['date_started_2']."' />
					<input type='hidden' name='date_ended_2' value='".$_REQUEST['date_ended_2']."' />
					<input type='hidden' name='employer_name_3' value='".$_REQUEST['employer_name_3']."' />
					<input type='hidden' name='address_3' value='".$_REQUEST['address_3']."' />
					<input type='hidden' name='city_3' value='".$_REQUEST['city_3']."' />
					<input type='hidden' name='state_3' value='".$_REQUEST['state_3']."' />
					<input type='hidden' name='zip_3' value='".$_REQUEST['zip_3']."' />
					<input type='hidden' name='position_3' value='".$_REQUEST['position_3']."' />
					<input type='hidden' name='date_started_3' value='".$_REQUEST['date_started_3']."' />
					<input type='hidden' name='date_ended_3' value='".$_REQUEST['date_ended_3']."' />
					";
				
			/******/
				print "
				<table>
					<tr>
						<td colspan='2' align='right'><input type='submit' name='submit_application' value='Submit Application' /></td>
					</tr>
				</table>
			</form>";
		}
?>