
<?php

switch ($_GET['c'])
{
case 'bmt_overview':

print '<span style="font-size:20px; font-weight:bold; color:#039; line-height:26px; margin-top:10px; ">Biomedical Equipment Technology Overview</span>
<br>
<br>
<span style="font-weight:bold; font-size:16px;">16 Month Associate Degree Program</span>
<br>
<br>
For Pittsburgh area residents looking to join the exciting field of Biomedical Equipment Repair, EIT offers a comprehensive curriculum that is well-suited for people eager to join the work force. It takes just 16 months to receive an Associate Degree in this program. Our job placement office will then assist you in finding employment in facilities across the region.
<br>
<br>
Medical Equipment Repairers play a critical role in any medical facility. Health care professionals rely on an array of critical electronic devices to diagnose and provide medical care for their patients. With lives at stake, the proper operation of this equipment is vital.
<p>
In the Biomedical Equipment Technology career training program you will learn to install, calibrate, troubleshoot, and repair medical equipment.  Combining this with medical terminology and physiology, computer networking, and biomedical equipment systems, you will work on a wide range of health-related monitoring, diagnostic, therapeutic, and surgical apparatus and instrumentation.
<br /><br />
Upon Graduating You Could Become a:
  <ul style="margin-bottom:15px;">
  <li>Biomedical Equipment Technician</li><br />
  <li>Medical Equipment Repairer</li><br />
  <li>Imaging Equipment Technician</li>
  </ul>

<div id="vt_side">
<a style="font-size:12px; font-weight:bold; color:#039; line-height:25px; text-align:center; " class="vt_button">View Our Virtual Tour To Learn More!</a>
<div id="vt_thumb" class="vt_button"></div>
</div>

<div id="test_side">
<a style="font-size:12px; font-weight:bold; color:#039; line-height:25px; text-align:center; " class="test_button">What Recent Grads Say About the Program!</a>
<div id="test_thumb" class="test_button"></div>
</div>


<div class="jqmWindow" id="vt_dialog"></div>

<div class="jqmWindow" id="test_dialog"></div>

<script type="text/javascript">
 $("#vt_dialog").jqm({ajax: "videos/bmt_video.html", trigger: ".vt_button"});
	 $("#test_dialog").jqm({ajax: "videos/test_video.html", trigger: ".test_button"});
	</script> 
';
  break;
  
case 'eit_overview':
 print" <span style='font-size:20px; font-weight:bold; color:#039; line-height:25px; '>Overview of EIT</span>
<br><br>
<img src='images/eit_image.jpg' />
<br><br>
EIT is dedicated to developing the individual abilities of each student by providing them with the necessary skills and supporting knowledge to meet the entry-level job requirements for computer, electronics, manufacturing, and technology careers. In order to achieve this, programs at EIT provide students with a combination of practical laboratory training and classroom instruction. EIT then offers placement assistance to aid its graduates in locating gainful employment.<br><br>
Consider these benefits of EIT:
<ul>
<li>Focused electronics, computer, and advanced manufacturing curricula</li>
<br />
<li>Practical hands-on laboratory training along with classroom instruction</li>
<br />
<li>Learn from instructors who have years of industry experience in their fields</li>
<br />
<li>Job placement assistance and preparation for tomorrow's job market</li>
<br />
<li>Financial Aid available to those who qualify</li>
</ul>
If you would like to move forward in your career or get the education necessary to begin a new one, contact us today.
<div id='accreditation'>EIT Is Accredited by ACCSC<br><br><img src='images/accsc.jpg'></div>
";

  break;
  
  case 'admissions':
  
  print"<span style='font-size:20px; font-weight:bold; color:#039; line-height:25px; '>Admissions Information</span>
<br>
<br>
Your arrival here means you've taken a significant and important step in doing something about your career dream. Now, EIT's job is to supply you with the information necessary to launch this passion of yours into a career you can be proud of.<br><br>
EIT welcomes applications from all persons whose academic records or personal background suggest that they may benefit from our programs. Erie Institute of Technology is an equal opportunity institution, admitting students and employees without regard to race, color, religion, national/ethnic origin, sex, age, handicap, financial status or military status. Employment and placement practices adhere to the same non-discrimination policy.<br>";
 
  break;
  
  case 'erie_info':
  
  print"
  <span style='font-size:20px; font-weight:bold; color:#039; line-height:25px; '>Erie PA - A Great Place to Live and Learn!</span>
<br><br>
<img src='images/erie_image.jpg' />
 <br><br>
The transition to Erie from living in the Pittsburgh area will be an easy one. 
<br><br>
  Erie PA has a safe small town atmosphere but doesn’t lack in things to do. Not only is there a beach and beautiful state park called Presque Isle located here, there are countless other things to do such as:
  <ul>
  <li>Presque Isle Downs and Casino</li>
  <li>Sporting events hosted by the Sea Wolves and the Bayhawks</li>
  <li>Skiing and Snowboarding at Peak N' Peek Ski Resort</li>
  <li>Amusement park Waldemeer and Waterworld</li>
  <li>A vibrant downtown nightlife</li>
  <li>Live music performances year round</li>
  </ul>
  <br>
  All local attractions are located just a few short miles from each other and all are accessable by Erie's wonderful public transportation system. Housing is among the most affordable in the country and commutes are no longer than 20 minutes no matter where you live.

  ";
 
  break;
  
  
default:
 
}





?>