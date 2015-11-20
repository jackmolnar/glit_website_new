<?php
	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE
		$depth = "../../";
	//INCLUDE ALL OF OUR MODULE CLASSES
		include "../../_admin/class/class_config.php";
		include "../../_admin/class/class_db.php";
		include "../../_admin/class/class_time.php";
	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;
		include "../../_face/class/face_common.php";
	//CREATE OUR CONFIG
		$cfg = new class_config();
	//CREATE OUR DATABASE
		$db = new class_db($cfg->db_host,$cfg->db_name,$cfg->db_user,$cfg->db_pass);
	//CREATE OUR TIME
		$time = new class_time($db, $cfg);
	//CREATE OUR COMMON CLASS
		$common = new face_common();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><? echo $cfg->site_title; ?> | financial aid</title>
		<meta name="author" content="Werkbot Studios" />
		<meta name="keywords" content="" />
		<meta name="description" content=""/>
		<meta name="robots" content="index, follow" />
		<link href="../../_scripts/master.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="masterframe">
			<div id="header">
				<div id="search">
					
<span style="text-align:right; color:#360; font-family:'Arial Black', Gadget, sans-serif; font-size:10px">FOLLOW US!</span><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.facebook.com/erieinstituteoftechnology" layout="button_count" width="200"></fb:like>				</div>
			</div>
			<div id="menu">
				<ul><?
	if($common->checkurlForPageName("INDEX")){
		print "<li><div class='navselect'>Home</div></li>";
	}else{
		print "<li><a href='".$depth."index.php'>Home</a></li>";
	} 
	if($common->checkurlForPageName("why%20eit")){
		print "<li><div class='navselect'>Why EIT?</div></li>";
	}else{
		print "<li><a href='".$depth."why eit/our mission/'>Why EIT?</a></li>";
	}
	if($common->checkurlForPageName("programs") ){
		print "<li><div class='navselect'>Programs</div></li>";
	}else{
		print "<li><a href='".$depth."programs/'>Programs</a></li>";
	}
	if($common->checkurlForPageName("admissions")){
		print "<li><div class='navselect'>Admissions</div></li>";
	}else{
		print "<li><a href='".$depth."admissions/overview/'>Admissions</a></li>";
	}
	if($common->checkurlForPageName("stafffaculty")){
		print "<li><div class='navselect'>Staff/Faculty</div></li>";
	}else{
		print "<li><a href='".$depth."stafffaculty/'>Staff/Faculty</a></li>";
	}
	if($common->checkurlForPageName("newsevents")){
		print "<li><div class='navselect'>News/Events</div></li>";
	}else{
		print "<li><a href='".$depth."newsevents/'>News/Events</a></li>";
	}
	if($common->checkurlForPageName("contact")){
		print "<li><div class='navselect'>Contact</div></li>";
	}else{
		print "<li><a href='".$depth."contact/'>Contact</a></li>";
	}

	print "<li><a href='http://www.thecareerschools.com'>The Career Schools</a></li>";

?></ul>
			</div>
		</div>
		<div id="content">
			<div id="subtop">
				<img src="../../_images/why_eit.jpg" alt="#" />
				<div id="subtopleft">
				<?
					$num = rand(1,7);
					print "<img src='../../_images/quote_00".$num.".gif' />";
				?>
				</div>
			</div>
			<table>
				<tr>
					<td id="subcontent">
						<div id="leftmenu">
							<ul><?
if($common->checkurlForPageName("overview")){
print "<li><div class='leftselect'>Overview</div></li>";
}else{
print "<li><a href='".$depth."admissions/overview/'>Overview</a></li>";
}
if($common->checkurlForPageName("admission%20requirements")){
print "<li><div class='leftselect'>Admission Requirements</div></li>";
}else{
print "<li><a href='".$depth."admissions/admission requirements/'>Admission Requirements</a></li>";
}
if($common->checkurlForPageName("campus%20tour")){
print "<li><div class='leftselect'>Campus Tour</div></li>";
}else{
print "<li><a href='".$depth."admissions/campus tour/'>Campus Tour</a></li>";
}
if($common->checkurlForPageName("financial%20aid")){
print "<li><div class='leftselect'>Financial Aid</div></li>";
}else{
print "<li><a href='".$depth."admissions/financial aid/'>Financial Aid</a></li>";
}
if($common->checkurlForPageName("student%20services")){
print "<li><div class='leftselect'>Student Services</div></li>";
}else{
print "<li><a href='".$depth."admissions/student services/'>Student Services</a></li>";
}
if($common->checkurlForPageName("career%20planning%20placement")){
print "<li><div class='leftselect'>Career Planning & Placement</div></li>";
}else{
print "<li><a href='".$depth."admissions/career planning placement/'>Career Planning & Placement</a></li>";
}
if($common->checkurlForPageName("request%20more%20information")){
print "<li><div class='leftselect'>Request More Information</div></li>";
}else{
print "<li><a href='http://erieit.edu/admissions/request%20more%20information/'>Request More Information</a></li>";
}
if($common->checkurlForPageName("apply%20online")){
print "<li><div class='leftselect'>Apply Online</div></li>";
}else{
print "<li><a href='".$depth."admissions/apply online/'>Apply Online</a></li>";
}
if($common->checkurlForPageName("schedule%20a%20tour%20of%20erie%20institute%20of%20technology")){
print "<li><div class='leftselect'>Schedule a Tour of EIT</div></li>";
}else{
print "<li><a href='".$depth."admissions/schedule a tour of erie institute of technology/'>Schedule a Tour of EIT</a></li>";
}
?></ul>
						</div>
					</td>
					<td id="rightcontent">
						<h2>Financial Aid Information</h2>
<h3>Our Mission</h3>
<hr />
<p>We want to assist every Financial Aid applicant in obtaining the financial aid assistance he/she is legally entitled to receive. The student's eligibility, the school's packaging criteria, and the amount and types of financial aid available determine the types of grants and loans for which you will qualify. Our Financial Aid department has a number of packages consisting of grants and loans available to those who qualify. These packages are tailored to each student's financial need. Trust us, these help, and most EIT students can take advantage of them.</p>
<p>We take pride in having a staff that is committed to working one-on-one with every person that enters our doors in search of financial assistance.</p>
<br />
<h2>Financial Aid Eligibility</h2>
<hr />
<p>Over 80% of current students, as well as those who have completed their education and are now successful graduates, have used financial aid to cover some or all of their educational expenses.</p>
<p>Everyone's financial aid package is unique to them. The type of financial package that will work for you is not necessarily the best one for the next person. There are several factors that come into play when completing a financial package. We will work personally with each individual to ensure that the plan we set is the best for you.</p>
<p>EIT students may qualify for:</p>
<ul>
    <li>Veterans Education under the provisions of Title 38, United States Code Section 3675.</li>
    <li>Trade Adjustment Act</li>
    <li>Workforce Investment Act</li>
    <li>Pennsylvania Higher Education Assistance Agency (PHEAA)</li>
    <li>Federal Family Education Loan Program (Stafford Loans)</li>
    <li>Federal PELL Grants</li>
    <li>Office of Vocational Rehabilitation for training of rehabilitation students.</li>
    <li>FSEOG</li>
    <li>Chafee Education &amp; Training Grant</li>
    <li>New Economy Technology Scholarship (NETS) for PA residents</li>
    <li>Academic Competitiveness Grant (ACG) for PELL eligible recent high school grads (regardless of the state) who graduated high school after completing a rigorous training schedule</li>
</ul>
<p>Information on all educational assistance programs is available at the school or may be obtained by contacting the various local agencies such as: Veteran Affairs, Office of Vocational Rehabilitation, Office of the Visually Handicapped, CareerLink, etc.</p>
<br />
<h2>Financial Aid Process</h2>
<hr />
<object width="200" height="160" align="left"><param name="movie" value="http://www.youtube.com/v/kor_9cK593M&hl=en&fs=1&rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/kor_9cK593M&hl=en&fs=1&rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="200" height="160"></embed></object>
<ul>
    <li>Apply for admissions with an Admissions Representative at EIT, or <a href="http://erieit.edu/admissions/apply%20online/">apply online</a> to get the admissions process started.</li>
    <li>Schedule your first financial aid consultation with the Financial Aid Administrator.</li>
    <li>Apply for an electronic signature PIN @ <a href="http://www.pin.edu.gov">www.pin.edu.gov</a></li>
    <li>Complete the <a target="_blank" href="http://www.fafsa.ed.gov/">FAFSA</a> (Free Application for Federal Student Aid). Note Erie Institute of Technology as your school of interest, <strong>school code 014695</strong>.&nbsp; NOTE: starting in 2008-2009, all students must file on their own online.</li>
    <li>Bring your completed FAFSA (or a printout if you applied online) and your previous year's income tax returns with you to the financial aid appointment. (In the case of a dependent student, bring your parents' tax returns as well.)</li>
    <li>At the financial aid interview we will discuss a package that will work for you. You will be given an estimate that will show the loans and grants that fit your package.</li>
    <li>We will continue to work with you throughout your schooling at EIT to ensure the package meets your needs.</li>
</ul>
<b><br />
Code of Conduct</b><br />
Erie Institute of Technology is committed to providing students and their families with the best information and processing alternatives available regarding student borrowing. In support of this and in an effort to rule out any perceived or actual conflict of interest between The Institute&rsquo;s officers, employees or agents and education loan lenders, the Institute has adopted the following policy:&nbsp; [<a target="_blank" href="http://www.erieit.edu/_files/docs/file_107.pdf">pdf download]</a><br />
<br />
<br />
<h2>Frequently Asked Questions</h2>
<hr />
<p><strong>Q. What requirements must I meet to be eligible for financial aid at Erie Institute of Technology?</strong></p>
<p><strong>A.</strong> The basic requirements that you must meet are:</p>
<ul>
    <li>You must be a US citizen or an eligible non-citizen.</li>
    <li>You must be registered with Selective Service if you are a male over the age of 18.</li>
    <li>You must be able to present a High School Diploma or equivalent degree (GED).</li>
    <li>You must not owe a refund on any previous government grants, taxes, or be in default on any previous government loans.</li>
    <li>You must enroll in one of EIT's programs with at least part-time status.</li>
</ul>
<br />
<p><strong>Q. How do I apply for the Stafford Loans?</strong></p>
<p><strong>A.</strong> After completing the FAFSA, you can pick up a Master Promissary Note in the Financial Aid Office.<br />
&nbsp;</p>
<p><strong>Q. How far in advance should I begin the financial aid process?</strong></p>
<p><strong>A.</strong>&nbsp;Transfer and returning students should file prior to May 1st.&nbsp; Recent&nbsp;high school graduates or first time students should file prior to August 1st in&nbsp;order to ensure they are considered on-time for state funding source.&nbsp; However, it is best complete your financial aid paperwork as soon as you have made the decision to go to school.&nbsp; Once the paperwork is complete you will be able to focus on your schooling.</p>
<p><strong>Q. What if my educational costs are not covered by the Stafford Loan and Pell Grants?</strong></p>
<p><strong>A.</strong> There are several types of alternative loan funding available to those interested in further education. We also offer interest free payment plans to those students who would rather make payments directly to the school.</p>
<p><em>Financial aid is dependent on maintaining satisfactory progress as defined by school policy and/or agency requirements.</em></p>
					</td>
				</tr>
			</table><br clear="all" />
				
<div class="hblob">
					<a href="http://erieit.edu/contact/"><img src="<? echo $depth;?>_images/contact.png" alt="#" /></a>
				</div>
<div class="hblob">
					<a href="http://erieit.edu/admissions/schedule%20a%20tour%20of%20erie%20institute%20of%20technology/"><img src="<? echo $depth;?>_images/schedule_tour.png" alt="#" /></a>
				</div>
				<div class="hblob">
					<a href="http://erieit.edu/admissions/apply%20online/"><img src="<? echo $depth;?>_images/apply_online.png" alt="#" /></a>
				</div>
                <div class="hblob">
					<a href="http://erieit.edu/admissions/request%20more%20information/"><img src="<? echo $depth;?>_images/req_more_info.png" alt="#" /></a>
				</div>

</div>
		<div id="footer">
			<?php
		function getYear(){
		$theday = getdate();
		$y = $theday[year];
		return $y;
	}
?>
<p><a target="_blank" href="http://www.glit.edu"><img width="107" height="41" border="0" align="middle" alt="Visit the Great Lakes Institute of Technology Website" src="http://www.erieit.edu/_files/images/glit_logo.png" /></a><a href="http://www.youtube.com/thecareerschools" target="_blank"><img width="80" height="41" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_120.png" alt="See EIT videos on YouTube.com/thecareerschools" /></a>&nbsp;&nbsp; <a href="http://www.facebook.com"><img width="100" height="38" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_118.png" alt="Become a friend of EIT
on Facebook:  thecareerschools" /></a>&nbsp;&nbsp; <a href="http://www.twitter.com/EITCareerServ" target="_blank"><img width="100" height="23" border="0" align="middle" src="http://www.erieit.edu/_files/images/file_108.png" alt="Follow EIT Career Services Office on Twitter:  EITCareerServ" /></a><br />
Home |&nbsp;<a href="http://www.erieit.edu/alumni/">Career Services (Alumni &amp; Employers)</a>&nbsp;|&nbsp;<a href="http://www.erieit.edu/careers/">Employment</a> | <a href="http://www.erieit.edu/contact/">Contact Us</a> | <a href="http://www.erieit.edu/site map/">Site Map</a> | <a href="http://www.erieit.edu/privacy/">Privacy Policy</a> | <a href="mailto:info@erieit.edu">Webmaster</a> | <a href="http://www.glit.edu">glit.edu</a>  | <a href="http://toniguy.com/academy/erie/default.aspx">toniguy.com</a> <br />
&copy; <? echo getYear(); ?>Erie Institute of Technology, All Rights Reserved</p>
<br />
		</div>
	</body>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2137940-3");
pageTracker._initData();
pageTracker._trackPageview();


</script>
</html>


