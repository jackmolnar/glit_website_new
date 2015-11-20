<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>

<link href="_scripts/menu_all.css" rel="stylesheet" type="text/css" />

<!--[if IE]>
<link href="_scripts/menu_ie.css" rel="stylesheet" type="text/css"  />

<![endif]-->

<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="_scripts/menu_ie7.css" />

<![endif]-->



<?

$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

if($url == 'http://erieit.edu/index.php'){

		print "<li><div class='navselect'>Home</div></li>";

	}else{

		print "<li><a href='index.php'>Home</a></li>";

	} 

	if($url == 'http://erieit.edu/why_eit.php'){

		print "<li><div class='navselect'>Why EIT?</div></li>";

	}else{

		print "<li><a href='why_eit.php'>Why EIT?</a></li>";

	}

	if($url == 'http://erieit.edu/programs.php'){

		print "<li id='program_button'>
		<a href='programs.php'>Programs</a>
		<div id='program_menu'>
		<span class='program_heading'>Electronics</span>
		<a href='biomedical_equipment_technology.php'  >Biomedical Equipment Technology</a>
		<a href='computer_electronics_engineering_technology.php'  >Electronics Engineering Technology</a>
		<a href='electronics_technician.php' >Electronics Technician</a>
		<!--<a href='industrial_automation_robotics_technology.php' >Industrial Automation & Robotics Technology</a>-->
		
		<div class='line'></div>
		
		<span class='program_heading' style='margin-top:13px;'>Computers</span>
		<a href='business_information_management.php'  >Business and Information Management</a>
		<a href='multimedia_graphic_design.php'  >Multimedia Graphic Design</a>
		<a href='network_database_professional.php' >Network and Database Professional</a>
		
		<div class='line'></div>

		<span class='program_heading' style='margin-top:13px;'>Advanced Manufacturing</span>
		<a href='cnc_machinist_technician.php'  >CNC / Machinist Technician</a>
		<a href='electrician.php'  >Electrician</a>
		<a href='maintenance_technician.php' >Maintenance Technician</a>
		<a href='rhvac_technology.php' >RHVAC Technology</a>
		<a href='welding_technology.php' >Welding Technology</a>
		
		<span class='program_heading' style='margin-top:13px;'><a href='continuing_education.php'>Continuing Education</a></span>
		
		<span class='program_heading' style='margin-top:13px;'><a href='customized_training.php'>Customized Training</a></span>
		</div>
		
		
				</li>";

	}else{

		print "<li id='program_button'>
		<a href='programs.php'>Programs</a>
		<div id='program_menu'>
		<span class='program_heading'>Electronics</span>
		<a href='biomedical_equipment_technology.php'  >Biomedical Equipment Technology</a>
		<a href='computer_electronics_engineering_technology.php'  >Electronics Engineering Technology</a>
		<a href='electronics_technician.php' >Electronics Technician</a>
		<!--<a href='industrial_automation_robotics_technology.php' >Industrial Automation & Robotics Technology</a>-->
		
		<div class='line'></div>
		
		<span class='program_heading' style='margin-top:13px;'>Computers</span>
		<a href='business_information_management.php'  >Business and Information Management</a>
		<a href='multimedia_graphic_design.php'  >Multimedia Graphic Design</a>
		<a href='network_database_professional.php' >Network and Database Professional</a>
		
		<div class='line'></div>

		<span class='program_heading' style='margin-top:13px;'>Advanced Manufacturing</span>
		<a href='cnc_machinist_technician.php'  >CNC / Machinist Technician</a>
		<a href='electrician.php'  >Electrician</a>
		<a href='maintenance_technician.php' >Maintenance Technician</a>
		<a href='rhvac_technology.php' >RHVAC Technology</a>
		<a href='welding_technology.php' >Welding Technology</a>
		<div class='line'></div>
		<a href='continuing_education.php'><span class='program_heading' >Continuing Education</span></a>
		<div class='line'></div>
		<a href='customized_training.php'><span class='program_heading' >Customized Training</span></a>
		
		</div>
		
		
				</li>";

	}

	if($url == 'http://erieit.edu/admissions.php'){

		print "<li><div class='navselect'>Admissions</div></li>";

	}else{

		print "<li><a href='admissions.php'>Admissions</a></li>";

	}

	if($url == 'http://erieit.edu/career_planning_placement.php'){

		print "<li><div class='navselect'>Career Services</div></li>";

	}else{

		print "<li><a href='career_planning_placement.php'>Career Services</a></li>";

	}

	if($url == 'http://erieit.edu/blog.php'){

		print "<li><div class='navselect'>News/Events</div></li>";

	}else{

		print "<li><a href='blog.php'>News/Events</a></li>";

	}

	if($url == 'http://erieit.edu/contact.php'){

		print "<li><div class='navselect'>Contact</div></li>";

	}else{

		print "<li><a href='contact.php'>Contact</a></li>";

	}


if($url == 'http://erieit.edu/disclosures'){

		print "<li><div class='navselect'>Consumer Info</div></li>";

	}else{

		print "<li><a href='/disclosures/'>Consumer Info</a></li>";

	}





?>


<script type="text/javascript">
$('#program_button').hover(
	function () {
		$('#program_menu').css({'display':'block'});
	},
	function () {
		$('#program_menu').css({'display':'none'});
	}
	);
$('#program_menu').hover(
	function () {
		$('#program_menu').css({'display':'block'});
	},
	function () {
		$('#program_menu').css({'display':'none'});
	}
	);
</script>