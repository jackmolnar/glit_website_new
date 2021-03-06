

	<script type="text/javascript">
        var _isIE = (window.navigator.appName.toLowerCase().indexOf('explorer') != -1);
        var currenGuid;
        
        var dict = [];
        dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'] = {};
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].opeId='02203900';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].currentYear='2013';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].prevYear='2012';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].programName='Computer Technology/Computer Systems Technology';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].customProgramName='Electronics Technician';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].cipCode='15.1202';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].awardLevel='Undergraduate certificate';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].tutionAndFees='19345';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].booksAndSupplies='2460';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].roomAndBoard='0';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].roomAndBoardNotOffered=true;
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].additionalFeeAndExpenses='No additional information provided.';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].urlForProgramCost='http://www.erieit.edu/electronics_technician.php';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].numberOfStudentsCompletedProgram='2';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].numberOfStudentsCompletedProgramWithDebt='0';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].isLessThanTenGraduatesReceivedLoan=false;
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].title4MedianDebt='5500';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].privateMedianDebt='0';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].financingPlanDebt='0';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].normalTimeToCompleteProgram='12';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].durationTypeInWeeksMonthsYears='months';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].numberOfStudentsCompletedProgramInNormalTime='1';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].reportedToAgency=true;
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].jobPlacementRateForAgency='100';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].agencyToReport='ACCSC';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].completedStudentsIncludedForAgency='All students who completed between October 2010 and September 2011 are included in this calculation';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].jobTypesForAgency='fieldrelated';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].positionsRecentCompletersHiredForAgency='Electro Mechanical Assembler';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].formerStudentsEmploymentTimeForAgency='Within 1 Year';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].trackingMethodForAgency='3';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].trackingValueForAgency='Job Placement Department';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].additionalNotes='No additional information provided.';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].dateCreated='1/22/2014';
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].relatedOccupations=[];
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].relatedOccupations.push({ oneTitle: ' Electrical Engineering Technicians', oneCode: '17-3023.03' });
dict['c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1'].otherInstitutions=[];



        // find dom element and set text to it
        function setText(domElId, text) {
            var domEl = document.getElementById(domElId);
            if (domEl)
                domEl.innerHTML = text;
        }		

        // display information on page
        function displayTemplate(guid) {
            if (!dict[guid]) {
                alert('Error: cannot find program');
                return;
            }
            currenGuid = guid;
            setText('spanProgramName', dict[guid].programName);
            if(dict[guid].customProgramName != '')
                setText('spanProgramName', dict[guid].customProgramName);
            setText('spanAwardType', dict[guid].awardLevel);            
            setText('spanNormalTimeToCompleteProgram', dict[guid].normalTimeToCompleteProgram);
            setText('spanDurationTypeInWeeksMonthsYears', dict[guid].durationTypeInWeeksMonthsYears);
            setText('spanTutionAndFees', formatCurrency(dict[guid].tutionAndFees));
            
			// COST BOX ==========================================================================================			
			setText('spanTutionAndFees', formatCurrency(dict[guid].tutionAndFees));
            setText('spanBooksAndSupplies', formatCurrency(dict[guid].booksAndSupplies));
            if(dict[guid].roomAndBoardNotOffered == false)
                setText('spanRoomAndBoard', formatCurrency(dict[guid].roomAndBoard));
            else
                setText('spanRoomAndBoard', '<i>not offered</i>');
            
            document.getElementById("hlUrlToProgramCost").href = dict[guid].urlForProgramCost;
            /*
			if(dict[guid].urlForProgramCost.indexOf('http://') !=-1 || dict[guid].urlForProgramCost.indexOf('https://') !=-1)
				document.getElementById("hlUrlToProgramCost").href= dict[guid].urlForProgramCost;
			else
				document.getElementById("hlUrlToProgramCost").href= "http://"+dict[guid].urlForProgramCost;
            */
			// END COST BOX =======================================================================================



			// FINANCING BOX ======================================================================================
			if(dict[guid].isLessThanTenGraduatesReceivedLoan == true || dict[guid].isLessThanTenGraduatesReceivedLoan =='yes') {
				setText('spanTitle4Loan', '*');
				setText('spanPrivateEducationLoan', '*');
				setText('spanInstitutionFinancingPlanLoan', '*');
				var divLessThan10 = document.getElementById('divLessThan10');
				var divFinancingDivider = document.getElementById('divFinancingDivider');
				divLessThan10.style.display = "";
				divFinancingDivider.style.display = "";				
			}
			else {
				setText('spanTitle4Loan', formatCurrency(dict[guid].title4MedianDebt));
				setText('spanPrivateEducationLoan', formatCurrency(dict[guid].privateMedianDebt));
				setText('spanInstitutionFinancingPlanLoan', formatCurrency(dict[guid].financingPlanDebt));
			}

			var divFinancingDivider = document.getElementById('divFinancingDivider');
			var divFinancePercentageInfo = document.getElementById('divFinancePercentageInfo');
			if (dict[guid].numberOfStudentsCompletedProgramWithDebt * 1 > 0) {
				setText('spanPercentWhoUsedLoansForThisProgram', roundNumber((dict[guid].numberOfStudentsCompletedProgramWithDebt * 100) / dict[guid].numberOfStudentsCompletedProgram));
				divFinancePercentageInfo.style.display = "";
				divFinancingDivider.style.display = "";
			}
			else {
				divFinancePercentageInfo.style.display = "none";
			}
			// END OF FINANCING BOX =================================================================================
						

			// SUCCESS BOX ==========================================================================================
			setText('span1NormalTimeToCompleteProgram', dict[guid].normalTimeToCompleteProgram);
			setText('span1DurationType', dict[guid].durationTypeInWeeksMonthsYears);
			setText('span2NormalTimeToCompleteProgram', dict[guid].normalTimeToCompleteProgram);
			setText('span2DurationType', dict[guid].durationTypeInWeeksMonthsYears);

			//calculate percent of students who completed the program in normal given time.
			if (dict[guid].numberOfStudentsCompletedProgram < 10) {
				var divTimeToCompleteProgramDivider = document.getElementById('divTimeToCompleteProgramDivider');
				var divTimeToCompleteProgramNote = document.getElementById('divTimeToCompleteProgramNote');
				divTimeToCompleteProgramDivider.style.display = '';
				divTimeToCompleteProgramNote.style.display = '';
				setText('spanPercentOfStudentsCompletedProgramInNormalTime', '*');
			}
			else {
				if (dict[guid].numberOfStudentsCompletedProgramInNormalTime == '0')
					setText('spanPercentOfStudentsCompletedProgramInNormalTime', '0');
				else
					setText('spanPercentOfStudentsCompletedProgramInNormalTime', roundNumber((dict[guid].numberOfStudentsCompletedProgramInNormalTime * 100) / dict[guid].numberOfStudentsCompletedProgram));
			}

			var reportedToState = false;
			var reportedToAgency = false;
			if(typeof(dict[guid].reportedToState) != 'undefined' && dict[guid].reportedToState == true)
				reportedToState=true;
			if(typeof(dict[guid].reportedToAgency) != 'undefined' && dict[guid].reportedToAgency == true)
				reportedToAgency=true;

			// Job placement section
			if (reportedToState == true && reportedToAgency == true) {
				document.getElementById('divQuestionForJobPlacementRate').style.display = '';
				document.getElementById('BothRate').style.display = '';
				showJobPlacementForAgency(guid);
				showJobPlacementForState(guid);

				setText('spanJobPlacementRateState', dict[guid].jobPlacementRateForState);
				setText('spanJobPlacementRateAgency', dict[guid].jobPlacementRateForAgency);
			}
			else if (reportedToState) {
				//show question for job placement rate
				document.getElementById('divQuestionForJobPlacementRate').style.display = '';
				document.getElementById('divSingleRate').style.display = '';
				document.getElementById('hlJobPlacementForState').style.display = '';
				showJobPlacementForState(guid);
				setText('spanJobPlacementRateSingle', dict[guid].jobPlacementRateForState);
			}
			else if (reportedToAgency) {
				//show question for job placement rate
				document.getElementById('divQuestionForJobPlacementRate').style.display = '';
				document.getElementById('divSingleRate').style.display = '';
				document.getElementById('hlJobPlacementForAgency').style.display = '';
				showJobPlacementForAgency(guid);
				setText('spanJobPlacementRateSingle', dict[guid].jobPlacementRateForAgency);
			}
			if (reportedToState == false && reportedToAgency == false) {
				//hide question for job placement rate
				document.getElementById('divQuestionForJobPlacementRate').style.display = '';
				document.getElementById('divSingleRate').style.display = '';
				document.getElementById('divResponseRateDivider').style.display = '';
				document.getElementById('divResponseRateNote').style.display = '';
				setText('spanJobPlacementRateSingle', '*');
			}	
			// END SUCCESS BOX ======================================================================================


			setText('spanDateCreated', dict[guid].dateCreated);			
			// popup div for additional fee and expenses
			setText('divAdditionalFeesAndExpenses', dict[guid].additionalFeeAndExpenses.replace(/&&&/gi, "<br/>"));
			//additional information section
			setText('divAdditionalInformationContent', dict[guid].additionalNotes.replace(/&&&/gi, "<br/>"));
						
			
            // display related occipations
            var divRelatedOccupationsContent = document.getElementById('divRelatedJobsToTheProgramContent');
            if(dict[guid].relatedOccupations.length > 0) {
                for (var i = 0; i < dict[guid].relatedOccupations.length; i++) {
                    var link = document.createElement('a');
                    link.href= 'http://online.onetcenter.org/link/summary/' + dict[guid].relatedOccupations[i].oneCode;
                    link.target = '_blank';
                    link.innerHTML = dict[guid].relatedOccupations[i].oneTitle;
					//link.style.textDecoration = 'none';
                
                    var div = document.createElement('div');
                    div.style.marginBottom = '6px';
					div.className = "popup-link";
                    div.appendChild(link);
                    if (divRelatedOccupationsContent)
                        divRelatedOccupationsContent.appendChild(div);
                }
            }
            else
            {
                var div = document.createElement('div');
                div.style.marginBottom = '6px';
                div.style.marginTop = '10px';
                div.innerHTML= "<i>No related occupations</i>";
                if (divRelatedOccupationsContent)
                    divRelatedOccupationsContent.appendChild(div);
            }           
        }

		function showJobPlacementForState(guid) {
			var jobTypesForState;
			setText('divStateNameOrAccreditingAgencyForState', dict[guid].stateToReport);
			setText('divWhoIsIncludedForState', dict[guid].completedStudentsIncludedForState);
			if(dict[guid].jobTypesForState !=null && dict[guid].jobTypesForState =="any")
				jobTypesForState="Any jobs";
			else if(dict[guid].jobTypesForState !=null  && dict[guid].jobTypesForState =="fieldrelated")
				jobTypesForState="Jobs within the field";
			if(dict[guid].positionsRecentCompletersHiredForState.length > 0)
				setText('divTypeOfJobsForState', 'The job placement rate includes completers hired for: '+jobTypesForState+'<br/><br/>Positions that recent completers were hired for include: '+dict[guid].positionsRecentCompletersHiredForState);
			else
				setText('divTypeOfJobsForState', 'The job placement rate includes completers hired for: '+jobTypesForState);
			
			setText('divFormerStudentEmploymentTimeForState', dict[guid].formerStudentsEmploymentTimeForState);
			if(dict[guid].trackingMethodForState == '1')
				setText('divCompletersTrackingForState', 'Completer/alumni survey (' + dict[guid].trackingValueForState+'% response rate)');
			if(dict[guid].trackingMethodForState == '2')
				setText('divCompletersTrackingForState', 'State data system');
			if(dict[guid].trackingMethodForState == '3')
				setText('divCompletersTrackingForState', dict[guid].trackingValueForState);
		}

		function showJobPlacementForAgency(guid) {
			var jobTypesForAgency;
			setText('divStateNameOrAccreditingAgencyForAgency', dict[guid].agencyToReport);
			setText('divWhoIsIncludedForAgency', dict[guid].completedStudentsIncludedForAgency);
			if(dict[guid].jobTypesForAgency !=null && dict[guid].jobTypesForAgency =="any")
				jobTypesForAgency = "Any jobs";
			else if(dict[guid].jobTypesForAgency !=null && dict[guid].jobTypesForAgency =="fieldrelated")
				jobTypesForAgency="Jobs within the field";
			
			if(dict[guid].positionsRecentCompletersHiredForAgency.length > 0)
				setText('divTypeOfJobsForAgency', 'The job placement rate includes completers hired for: '+jobTypesForAgency+'<br/><br/>Positions that recent completers were hired for include: '+dict[guid].positionsRecentCompletersHiredForAgency);
			else
				setText('divTypeOfJobsForAgency', 'The job placement rate includes completers hired for: '+jobTypesForAgency);
			
			setText('divFormerStudentEmploymentTimeForAgency', dict[guid].formerStudentsEmploymentTimeForAgency);
			if(dict[guid].trackingMethodForAgency == '1')
				setText('divCompletersTrackingForAgency', 'Completer/alumni survey (' + dict[guid].trackingValueForAgency+'% response rate)');
			if(dict[guid].trackingMethodForAgency == '2')
				setText('divCompletersTrackingForAgency', 'State data system');
			if(dict[guid].trackingMethodForAgency == '3')
				setText('divCompletersTrackingForAgency', dict[guid].trackingValueForAgency);
		}        

		function openPopUp(divId, enableOverflow, headerTitle) {
        	var width = 532;
        	var height =350;
			clearPopUp();
        	var divPopUpContainer = document.getElementById('divPopUpContainer');
        	var divPopUpContent = document.getElementById('divPopUpContent');
			document.getElementById('divPopUpHeader').innerHTML = headerTitle;
			divPopUpContainer.style.display = 'block';
			divPopUpContent.style.height = height + 'px';
			try
			{
				if (enableOverflow)
					divPopUpContent.style.overflowY = 'scroll';
				else
					divPopUpContent.style.overflowY = '';
			}
			catch(err) {}			
			var div = document.getElementById(divId);
            if (div)
            	div.style.display = '';
        }

		function clearPopUp() {
        	document.getElementById('divOtherInstitutions').style.display = 'none';
        	document.getElementById('divOtherCostInformation').style.display = 'none';
        	document.getElementById('divSectionForWhatDoesThisMean').style.display = 'none';
        	document.getElementById('divJobPlacementRateForState').style.display = 'none';
			document.getElementById('divJobPlacementRateForAgency').style.display = 'none';
        	document.getElementById('divAdditionalInformation').style.display = 'none';
        	document.getElementById('divRelatedJobsToTheProgram').style.display = 'none';
        }

        function closePopUp() {
        	document.getElementById('divPopUpContainer').style.display = 'none';
        	document.getElementById('divOtherInstitutions').style.display = 'none';
        	document.getElementById('divOtherCostInformation').style.display = 'none';
        	document.getElementById('divSectionForWhatDoesThisMean').style.display = 'none';
        	document.getElementById('divJobPlacementRateForState').style.display = 'none';
			document.getElementById('divJobPlacementRateForAgency').style.display = 'none';
        	document.getElementById('divAdditionalInformation').style.display = 'none';
        	document.getElementById('divRelatedJobsToTheProgram').style.display = 'none';
        }

		

        function formatCurrency(num) {
            num = num.toString().replace(/\$|\,/g, '');
            if (isNaN(num))
                num = "0";
            sign = (num == (num = Math.abs(num)));
            num = Math.floor(num * 100 + 0.50000000001);
            cents = num % 100;
            num = Math.floor(num / 100).toString();
            if (cents < 10)
                cents = "0" + cents;
            for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
                num = num.substring(0, num.length - (4 * i + 3)) + ',' +
            num.substring(num.length - (4 * i + 3));
            return (((sign) ? '' : '-') + '$' + num ); //+ '.' + cents
        }

        function roundNumber(num) {
            if(!isNaN(num))            
                return Math.round(num);            
            else
                return num;
        }
    </script>




	<div style="width:814px; margin-left:auto; margin-right:auto;padding-left:0px; padding-right:0px;">
		
		<!--popup div-->
		<div style="position:relative; z-index:710;">
			<div id="divPopUpContainer" style="display:none; position:absolute; left:130px; top:200px; z-index:710;">
				<div style="background-image:url(<?php echo $depth; ?>_images/ge_template/popup_top.png); width:532px; height:27px;"></div>
				<div style="background-image:url(<?php echo $depth; ?>_images/ge_template/popup_repeater.png); background-repeat:repeat-y; width:532px;">
					<div id="divPopUpHeader" class="popup-header" style="float:left; padding-left:28px; color:#333333; font-weight:bold; font-size:13px; margin-top:4px;"></div>
					<div class="popup-close" style="float:right; margin-right:32px;"><a href="javascript:closePopUp()"><img src="<?php echo $depth; ?>_images/ge_template/popup_close.gif" alt="Close" title="Close" style="border-width:0px;" /></a></div>
					<div style="clear:both;"></div>
					<div id="divDotDivider" style="width:532px; margin-top:10px; margin-bottom:5px;"><img src="<?php echo $depth; ?>_images/ge_template/popup_dotdivider.png" alt="" title=""/> </div>
					<div id="divPopUpContent" class="popup-content" style="margin-top:15px; margin-left:32px; margin-right:15px;">
						<div id="divOtherInstitutions" style="display:none;">
							<div style="margin-bottom:5px;margin-left:30px;">
								<div style="float:left; width:90px;">Filter states</div>
								<div style="float:left; width:150px;"><select id="ddlStates" style="width:100px;" onchange="showSelectedState()"></select></div>
								<div style="clear:both;"></div>
							</div>
							<div style="height:630px;width:792px;margin-left:30px;margin-right:7px; overflow-y:scroll;overflow-x:hidden;">
								<table id="tblInstitutions" border="0" cellpadding="2" cellspacing="0" style="width:99%;">
									<tr>
										<td style="text-align:left; border-bottom:1px solid #336699;color:#336699; font-weight:bold;font-size:12px;width:50px;">UnitID</td>
										<td style="text-align:left; border-bottom:1px solid #336699;color:#336699; font-weight:bold;font-size:12px;">Name</td>
										<td style="text-align:left; border-bottom:1px solid #336699;color:#336699; font-weight:bold;font-size:12px;">Address</td>
										<td style="text-align:left; border-bottom:1px solid #336699;color:#336699; font-weight:bold;font-size:12px;">City</td>
										<td style="text-align:left; border-bottom:1px solid #336699;color:#336699; font-weight:bold;font-size:12px;width:50px;">State</td>
										<td style="text-align:left; border-bottom:1px solid #336699;color:#336699; font-weight:bold;font-size:12px;width:70px;">Zip</td>
										<td style="text-align:left; border-bottom:1px solid #336699;color:#336699; font-weight:bold;font-size:12px;width:70px;">&nbsp;</td>
									</tr>
								</table>
							</div>
						</div>
						<div id="divOtherCostInformation" style="display:none;">
							<div id="divAdditionalFeesAndExpenses"></div>
						</div>
						<div id="divSectionForWhatDoesThisMean" style="display:none;">						
							<div id="divStandardTextForWhatDoesThisMean">The ability to pay off your student loans is dependent on several factors, two of which are how much debt you accrue to complete your program and how much you are earning at your job after completing it. These two measures ( the "repayment rate" and the "debt-to-earnings ratio") are included to inform you about whether previous students in this program are successfully paying back their loans and how much of a burden it is on their monthly budget to do so.</div>
						</div>
						<div id="divJobPlacementRateForState" style="display:none;">						
							<div style="font-weight:bold;">Name of the <span id="spanJobPlacementRateStateLabel">state</span> this placement rate is calculated for:</div>
							<div id="divStateNameOrAccreditingAgencyForState" style="margin-top:2px;"></div>
							<div style="margin-top:10px; font-weight:bold;">Who is included in the calculation of this rate?</div>
							<div id="divWhoIsIncludedForState" style="margin-top:2px;"></div>
							<div style="margin-top:10px;font-weight:bold; ">What types of jobs were these students placed in?</div>
							<div id="divTypeOfJobsForState" style="margin-top:2px;"></div>							
							<div style="margin-top:10px; font-weight:bold;">When were the former students employed?</div>
							<div id="divFormerStudentEmploymentTimeForState" style="margin-top:2px;"></div>
							<div style="margin-top:10px;font-weight:bold;">How were completers tracked?</div>
							<div id="divCompletersTrackingForState" style="margin-top:2px;"></div>
						</div>
						<div id="divJobPlacementRateForAgency" style="display:none;">						
							<div style="font-weight:bold;">Name of the accrediting agency this placement rate is calculated for:</div>
							<div id="divStateNameOrAccreditingAgencyForAgency" style="margin-top:4px;"></div>
							<div style="margin-top:12px; font-weight:bold;">Who is included in the calculation of this rate?</div>
							<div id="divWhoIsIncludedForAgency" style="margin-top:4px;"></div>
							<div style="margin-top:12px;font-weight:bold; ">What types of jobs were these students placed in?</div>
							<div id="divTypeOfJobsForAgency" style="margin-top:4px;"></div>							
							<div style="margin-top:12px; font-weight:bold;">When were the former students employed?</div>
							<div id="divFormerStudentEmploymentTimeForAgency" style="margin-top:4px;"></div>
							<div style="margin-top:12px;font-weight:bold;">How were completers tracked?</div>
							<div id="divCompletersTrackingForAgency" style="margin-top:2px;"></div>
						</div>
						<div id="divAdditionalInformation" style="display:none;">
							<div id="divAdditionalInformationContent"></div>
						</div>
						<div id="divRelatedJobsToTheProgram" style="display:none;">
							<div>Click on the links below for more information on jobs related to this program:</div>
							<div id="divRelatedJobsToTheProgramContent" style="margin-top:25px;"></div>
						</div>
					</div>
				</div>
				<div style="background-image:url(<?php echo $depth; ?>_images/ge_template/popup_bottom.png); width:532px; height:34px;"></div>			
			</div>
		</div>
		<!--pop up ended-->
			
		
		<!-- header div with program name and length -->
		<div style="background-image:url(<?php echo $depth; ?>_images/ge_template/bg_top.jpg); background-repeat:no-repeat; width:814px; height:112px;">
			<div style="padding:17px 0px 0px 32px;"><span id="spanProgramName" class="program-name">Program name</span></div>
			<div style="padding:5px 0px 0px 32px;" class="program-level-length">Program Level - <span id="spanAwardType"></span></div>
			<div style="padding:0px 0px 0px 32px;" class="program-level-length">
				<span>Program Length -</span>&nbsp;<span id="spanNormalTimeToCompleteProgram"></span>&nbsp;<span id="spanDurationTypeInWeeksMonthsYears"></span>
			</div>
		</div><!-- end of header div with program name and length -->
		<div style="background-image:url(<?php echo $depth; ?>_images/ge_template/output_bg_repeater.gif); background-repeat:repeat-y; width:814px;">
			<!-- This div contains info for Cost, Financing and Sucess -->
			<div style="padding:15px 30px 10px 35px;">

				<!-- left div with cost and financing -->
				<div style="float:left; width:350px;">
					<!-- Cost box -->
					<div style="width:345px;height:18px; background-image:url(<?php echo $depth; ?>_images/ge_template/info_box_top.gif); background-repeat:no-repeat;"></div>
					<div style="width:345px; background-image:url(<?php echo $depth; ?>_images/ge_template/info_box_repeater.gif); background-repeat:repeat-y; position:relative;">
						<div style="position:absolute; top:0px; left:8px;"><img src="<?php echo $depth; ?>_images/ge_template/title_cost.gif" alt="Cost" title="Cost" /></div>
						<div style="margin-left:42px;">
							<div class="question-icon"></div>
							<div class="qa-text">How much will this program cost me?*</div>
							<div style="clear:both;"></div>
							<div class="qa-space"></div>
							<div class="answer-icon"></div>
							<div class="qa-text">
								<div >Tuition and fees: <span id="spanTutionAndFees"></span></div>
								<div style="margin-top:5px;">Books and supplies: <span id="spanBooksAndSupplies"></span></div>
								<div style="margin-top:5px;">On-campus room & board: <span id="spanRoomAndBoard"></span></div>	
							</div>
							<div style="clear:both;"></div>
							<div class="divider"></div>
							<!-- link with info about other costs -->
							<div id="divOtherCostLink" style=""><a href="javascript:void(0)" onclick="openPopUp('divOtherCostInformation', true, 'What other costs are there for this program?')">What other costs are there for this program?</a></div>
							<!-- link with info about futher costs -->
							<div class="small-text" style="margin-top:18px;">For further program cost information <a id="hlUrlToProgramCost" style="color:#333333;" href="javascript:void(0);" target="_blank">click here.</a></div>
							<!-- text with * note -->
							<div class="small-text" style="margin-top:12px; margin-right:10px; line-height:14px;">*The amounts shown above include costs for the entire program, assuming normal time to completion. Note that this information is subject to change.</div>
						</div>
					</div>
					<div style="width:345px;height:18px; background-image:url(<?php echo $depth; ?>_images/ge_template/info_box_bottom.gif); background-repeat:no-repeat;"></div>
					<!-- end of Cost box -->
				
					<div style="height:30px;"></div>

					<!-- Financing box -->
					<div style="width:345px;height:18px; background-image:url(<?php echo $depth; ?>_images/ge_template/info_box_top.gif); background-repeat:no-repeat;"></div>
					<div style="width:345px; background-image:url(<?php echo $depth; ?>_images/ge_template/info_box_repeater.gif); background-repeat:repeat-y; position:relative;">
						<div style="position:absolute; top:0px; left:8px;"><img src="<?php echo $depth; ?>_images/ge_template/title_financing.gif" alt="Financing" title="Financing" /></div>
						<div style="margin-left:42px;">
							<div class="question-icon"></div>
							<div class="qa-text">What financing options are available to help me pay for this program?</div>
							<div style="clear:both;"></div>
							<div class="qa-space"></div>
							<div class="answer-icon"></div>
							<div class="qa-text">
								<div>Financing for this program may be available through grants, scholarships, loans (federal and private) and institutional financing plans. The median amount of debt for program graduates is shown below:</div>
								<div style="margin-top:16px;margin-left:20px;">
									<div>Federal loans: <span id="spanTitle4Loan"></span></div>
									<div style="margin-top:3px;">Private education loans: <span id="spanPrivateEducationLoan"></span></div>
									<div style="margin-top:3px;">Institutional financing plan: <span id="spanInstitutionFinancingPlanLoan"></span></div>
								</div>								
							</div>							
							<div style="clear:both;"></div>
							<div id="divFinancingDivider" class="divider" style="display:none;"></div>
							<div id="divLessThan10" class="small-text" style="display:none; padding-bottom:15px;">* Less than 10 graduates received loans. Median amounts are withheld to preserve the confidentiality of the loan recipients.</div>
							<div id="divFinancePercentageInfo" class="small-text" style="line-height:14px;display:none;">The school has elected to provide the following additional information: <span id="spanPercentWhoUsedLoansForThisProgram">XX</span>% of program graduates used loans to help finance their costs for this program.</div>
							
							
						</div>
					</div>
					<div style="width:345px;height:18px; background-image:url(<?php echo $depth; ?>_images/ge_template/info_box_bottom.gif); background-repeat:no-repeat;"></div>
					<!-- end of Financing box -->
				</div>
				<!-- end of left div with cost and financing -->

				<!-- right div with cost and financing -->
				<div style="float:left; width:375px; margin-left:22px;">
					<!-- Success box -->
					<div style="width:370px;height:18px; background-image:url(<?php echo $depth; ?>_images/ge_template/info_box_top_long.gif); background-repeat:no-repeat;"></div>
					<div style="width:370px; background-image:url(<?php echo $depth; ?>_images/ge_template/info_box_repeater_long.gif); background-repeat:repeat-y; position:relative;">
						<div style="position:absolute; top:0px; left:8px;"><img src="<?php echo $depth; ?>_images/ge_template/title_success.gif" alt="Success" title="Success" /></div>
						<div style="margin-left:42px;">
							<div class="question-icon"></div>
							<div class="qa-text-long">How long will it take me to complete this program?</div>
							<div style="clear:both;"></div>
							<div class="qa-space"></div>
							<div class="answer-icon"></div>
							<div class="qa-text">
								The program is designed to take <span id="span1NormalTimeToCompleteProgram">XX</span> <span id="span1DurationType">months</span> to complete.
								Of those that completed the program in 2012-2013, <span id="spanPercentOfStudentsCompletedProgramInNormalTime">XX</span>% finished in <span id="span2NormalTimeToCompleteProgram">XX</span> <span id="span2DurationType"> months</span>.
							</div>
							<div style="clear:both;"></div>
							<div id="divTimeToCompleteProgramDivider" class="divider" style="display:none;"></div>
							<div id="divTimeToCompleteProgramNote" class="small-text" style="padding-bottom:15px;display:none;">*Less than 10 students completed this program in 2012-13. The number who finished within the normal time has been withheld to preserve the confidentiality of the students.</div>
						</div>

						<div id="divQuestionForJobPlacementRate" style="margin-left:42px; margin-top:22px; display:none;">
							<div style="border:1px solid #f7f7f4;">
								<div class="question-icon"></div>
								<div class="qa-text-long">What are my chances of getting a job when I graduate?</div>
								<div style="clear:both;"></div>
							</div>
							<div class="qa-space"></div>
							<div style="border:1px solid #f7f7f4;">
								<div class="answer-icon"></div>
								<div class="qa-text-long">
									<div id="divSingleRate" style="display:none">
										<div>The job placement rate for students who completed this program in 2012-2013 is <span id="spanJobPlacementRateSingle">XX</span>%.</div>
										<div id="hlJobPlacementForAgency" class="small-text" style="padding-top:10px; display:none;">For futher information about this job placement rate, <a href="javascript:openPopUp('divJobPlacementRateForAgency', true, 'Job Placement Rate Information')">click here</a>.</div>
										<div id="hlJobPlacementForState" class="small-text" style="padding-top:10px; display:none;">For futher information about this job placement rate, <a href="javascript:openPopUp('divJobPlacementRateForState', true, 'Job Placement Rate Information')">click here</a>.</div>
									</div>
									<div id="BothRate" style="display:none;">
										<div>Both the institution's state and accreditor require the calculation of a job placement rate for this program.</div>									
										<div style="margin-top:15px;">Accreditor Rate: The job placement rate for students who completed the program is <span id="spanJobPlacementRateAgency">XX</span>%.</div>
										<div style="margin-top:7px;" id="hlJobPlacementForAgency2" class="small-text">For futher information about this job placement rate, <a href="javascript:openPopUp('divJobPlacementRateForAgency', true, 'Job Placement Rate Information')">click here</a>.</div>
										<div style="margin-top:15px;">State Rate: The job placement rate for students who completed the program is <span id="spanJobPlacementRateState">XX</span>%.</div>
										<div style="margin-top:7px;" id="hlJobPlacementForState2" class="small-text">For futher information about this job placement rate, <a href="javascript:openPopUp('divJobPlacementRateForState', true, 'Job Placement Rate Information')">click here</a>.</div>									
									</div>
								</div>
								<div style="clear:both;"></div>
								<div id="divResponseRateDivider" class="divider" style="display:none;"></div>
								<div id="divResponseRateNote" class="small-text" style="display:none; padding-bottom:15px;">* This institution is not currently required to calculate a job placement rate for program completers.</div>
								
							
							</div>
						</div>
					</div>
					<div style="width:370px;height:18px; background-image:url(<?php echo $depth; ?>_images/ge_template/info_box_bottom_long.gif); background-repeat:no-repeat;"></div>
					<!--end of Success box -->

					<!-- image link to jobs related to program -->
					<div style="margin-top:50px; padding-left:30%;">		
						<a href="javascript:openPopUp('divRelatedJobsToTheProgram', true, 'Jobs related to this program')"><img style="cursor:pointer;border-width:0px;" src="<?php echo $depth; ?>_images/ge_template/image_memo.png" alt="Click here for more information on jobs related to this program" title="Click here for more information on jobs related to this program" /></a>
					</div>	

				</div>
				<!-- end of right div with cost and financing -->
				<div style="clear:both;"></div>


				
				


				<!-- div with additional information -->
				<div id="divAdditionalInfoLink" class="small-text">
					<div style="float:left;">For additional information related to this program and/or the information provided above, <a href="javascript:openPopUp('divAdditionalInformation', true, 'Additional Information');">click here</a>.</div>
					<div style="float:right; font-weight:bold; margin-right:13px;">Date Created: <span id="spanDateCreated"></span></div>
				</div>

			</div>
			<!-- End of div containing info for Cost, Financing and Sucess -->

			

		</div>
		<div style="background-image:url(<?php echo $depth; ?>_images/ge_template/output_bg_bottom.gif); background-repeat:no-repeat; width:814px; height:22px;"></div>
	</div>
	<script type="text/javascript">
		// Call function to display program
		//displayTemplate('guid');
		displayTemplate('c8d41a6c-dec3-4fb3-bab8-124b36ea6fd1');
    </script>    
