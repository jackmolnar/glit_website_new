<?php
	//SET OUR DEPTH VARIABLE WHICH CAN BE USED BY CONTENT BLOCKS THROUGHOUT THE TEMPLATE
		$depth = "../../../../";
	//INCLUDE ALL OF OUR MODULE CLASSES
		include "../../../../_admin/class/class_config.php";
		include "../../../../_admin/class/class_db.php";
		include "../../../../_admin/class/class_time.php";
	//INCLUDE FACE MODULES NEEDED FOR THIS PAGE;
		include "../../../../_face/class/face_common.php";
                include "../../../../_admin/includes/meta_data.php";
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
		<title><? echo $cfg->site_title; ?> | Testimonials</title>
		<meta name="author" content="Werkbot Studios" />
		<meta name="keywords" content="<? echo $meta_keywords; ?>" />
		<meta name="description" content="<? echo $meta_description; ?>"/>
		<meta name="robots" content="index, follow" />
<meta name="googlebot" content="noodp">
		<link href="../../../../_scripts/master.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="masterframe">
			<div id="header">
				<div id="search">
					<span style="text-align:right; color:#360; font-family:'Arial Black', Gadget, sans-serif; font-size:10px">FOLLOW US!</span><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.facebook.com/erieinstituteoftechnology" layout="button_count" width="200"></fb:like>
				</div>
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
		<div id="submenu">
			<ul id="submid"><?
	if($common->checkurlForPageName("computers")){
		print "<li><a href='".$depth."programs/computers/'><span>Computers</span></a></li>";
	}else{
		print "<li><a href='".$depth."programs/computers/'><span>Computers</span></a></li>";
	}
	if($common->checkurlForPageName("electronics")){
		print "<li><a href='".$depth."programs/electronics/'><span>Electronics</span></a></li>";
	}else{
		print "<li><a href='".$depth."programs/electronics/'><span>Electronics</span></a></li>";
	} 
	if($common->checkurlForPageName("manufacturing")){
		print "<li><a href='".$depth."programs/manufacturing/'><span>Manufacturing & Technology</span></a></li>";
	}else{
		print "<li><a href='".$depth."programs/manufacturing/'><span>Manufacturing & Technology</span></a></li>";
	}  
	if($common->checkurlForPageName("continuing%20education")){
		print "<li><a href='".$depth."programs/continuing education/'><span>Continuing Education</span></a></li>";
	}else{
		print "<li><a href='".$depth."programs/continuing education/'><span>Continuing Education</span></a></li>";
	}  
	if($common->checkurlForPageName("customized%20training")){
		print "<li><a href='".$depth."programs/customized training/'><span>Customized Training</span></a></li>";
	}else{
		print "<li><a href='".$depth."programs/customized training/'><span>Customized Training</span></a></li>";
	} 
?></ul>
		</div>
		<div id="content">
			<div id="subtop">
				<p><img src="<? echo $depth;?>_images/programs_mgd.jpg" alt="#" /></p>
				<div id="subtopleft">
				<?
					$num = rand(1,7);
					print "<img src='../../../../_images/quote_00".$num.".gif' />";
				?>
				</div>
			</div>
<table>
<tr>
			<td id="subcontent">
				<div id="leftmenu">
					<ul><?
	if($common->checkurlForPageName("multimedia%20graphic%20design")){
		print "<li><div class='leftselect'>Multimedia Graphic Design</div></li>";
	}else{
		print "<li><a href='".$depth."programs/computers/multimedia graphic design/'>Multimedia Graphic Design</a></li>";
	}
	if($common->checkurlForPageName("network%20database%20professional")){
		print "<li><div class='leftselect'>Network & Database Professional</div></li>";
	}else{
		print "<li><a href='".$depth."programs/computers/network database professional/'>Network & Database Professional</a></li>";
	}
	if($common->checkurlForPageName("business%20office%20professional")){
		print "<li><div class='leftselect'>Business Office Professional</div></li>";
	}else{
		print "<li><a href='".$depth."programs/computers/business office professional/'>Business Office Professional</a></li>";
	}
?></ul>
				</div>
			</td>
				<td id="rightcontent">
					<div id="rightcontentmenu">
						<?
	$tmp = explode("/", $_SERVER['REQUEST_URI']);
	if($tmp[count($tmp)-3]=="multimedia%20graphic%20design"){
		$link = $depth."programs/computers/multimedia graphic design/";
		$overview_name = " ";	
	}else if($tmp[count($tmp)-3]=="network%20database%20professional"){
		$link = $depth."programs/computers/network database professional/";
		$overview_name = " ";	
	}else if($tmp[count($tmp)-3]=="business%20office%professional"){
		$link = $depth."programs/computers/business office professional/";
		$overview_name = " ";	
	}else if($tmp[count($tmp)-3]=="biomedical%20equipment%20technology"){
		$link = $depth."programs/electronics/biomedical equipment technology/";
		$overview_name = " ";	
	}else if($tmp[count($tmp)-3]=="computer%20electronics%20engineering%20technology"){
		$link = $depth."programs/electronics/computer%20electronics%20engineering%20technology/";
		$overview_name = " ";	
	}else if($tmp[count($tmp)-3]=="basic%20electronic%20technician"){
		$link = $depth."programs/electronics/basic electronic technician/";
		$overview_name = " ";
	}else if($tmp[count($tmp)-3]=="industrial%20automation%20robotics%20technology"){
		$link = $depth."programs/electronics/industrial automation robotics technology/";
		$overview_name = " ";
	}else if($tmp[count($tmp)-3]=="office%20machine%20service%20technology"){
		$link = $depth."programs/electronics/office machine service technology/";
		$overview_name = " ";		
	}else if($tmp[count($tmp)-3]=="cnc%20machinist%20technician"){
		$link = $depth."programs/manufacturing/cnc machinist technician/";
		$overview_name = " ";	
	}else if($tmp[count($tmp)-3]=="moldmaker%20mold%20designer"){
		$link = $depth."programs/manufacturing/moldmaker mold designer/";
		$overview_name = " ";	
	}else if($tmp[count($tmp)-3]=="manufacturing%20technician"){
		$link = $depth."programs/manufacturing/manufacturing technician/";
		$overview_name = " ";	
	}else if($tmp[count($tmp)-3]=="maintenance%20technician"){
		$link = $depth."programs/manufacturing/maintenance technician/";
		$overview_name = " ";	
	}else if($tmp[count($tmp)-3]=="rhvac%20technology"){
		$link = $depth."programs/manufacturing/rhvac technology/";
		$overview_name = " ";	
	}else if($tmp[count($tmp)-3]=="welding%20technology"){
		$link = $depth."programs/manufacturing/welding technology/";
		$overview_name = " ";	
}else if($tmp[count($tmp)-3]=="electrician"){
		$link = $depth."programs/manufacturing/electrician/";
		$overview_name = " ";	
	}
?>
<ul><?
	if($common->checkurlForPageName($overview_name)){
		print "<li><a href='".$link."'><span>Overview</span></a></li>";
	}else{
		print "<li><a href='".$link."'><span>Overview</span></a></li>";
	}
	if($common->checkurlForPageName("coursescredits")){
		print "<li><a href='".$link."coursescredits/'><span>Courses/Credits</span></a></li>";
	}else{
		print "<li><a href='".$link."coursescredits/'><span>Courses/Credits</span></a></li>";
	}
	if($common->checkurlForPageName("career%20opportunities")){
		print "<li><a href='".$link."career%20opportunities/'><span>Opportunities</span></a></li>";
	}else{
		print "<li><a href='".$link."career%20opportunities/'><span>Opportunities</span></a></li>";
	}
	if($common->checkurlForPageName("testimonials")){
		print "<li><a href='".$link."testimonials/'><span>Testimonials</span></a></li>";
	}else{		
		print "<li><a href='".$link."testimonials/'><span>Testimonials</span></a></li>";	
	}
?></ul>
					</div>
					<table width="500" cellspacing="0" cellpadding="1" border="0">
    <tbody>
        <tr>
            <td><!--[if gte mso 9]><xml>
            <w:WordDocument>
            <w:View>Normal</w:View>
            <w:Zoom>0</w:Zoom>
            <w:PunctuationKerning />
            <w:ValidateAgainstSchemas />
            <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
            <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
            <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
            <w:Compatibility>
            <w:BreakWrappedTables />
            <w:SnapToGridInCell />
            <w:WrapTextWithPunct />
            <w:UseAsianBreakRules />
            <w:DontGrowAutofit />
            </w:Compatibility>
            <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
            </w:WordDocument>
            </xml><![endif]--><!--[if gte mso 9]><xml>
            <w:LatentStyles DefLockedState="false" LatentStyleCount="156">
            </w:LatentStyles>
            </xml><![endif]--><!--[if !mso]><object
            classid="clsid:38481807-CA0E-42D2-BF39-B33AF135CC4D" id=ieooui></object>
            <style>
            st1:*{behavior:url(#ieooui) }
            </style>
            <![endif]--><!--[if gte mso 10]>
            <style>
            /* Style Definitions */
            table.MsoNormalTable
            {mso-style-name:"Table Normal";
            mso-tstyle-rowband-size:0;
            mso-tstyle-colband-size:0;
            mso-style-noshow:yes;
            mso-style-parent:"";
            mso-padding-alt:0in 5.4pt 0in 5.4pt;
            mso-para-margin:0in;
            mso-para-margin-bottom:.0001pt;
            mso-pagination:widow-orphan;
            font-size:10.0pt;
            font-family:"Times New Roman";
            mso-ansi-language:#0400;
            mso-fareast-language:#0400;
            mso-bidi-language:#0400;}
            </style>
            <![endif]-->
            <h2>Chris Norris</h2>
            <h3>Director of Entertainment &ndash; Erie Seawolves</h3>
            <p class="MsoNormal">&nbsp;</p>
            <p class="MsoNormal">The EIT student working with us always put forth maximum effort in every project assigned. Both the student and the student&rsquo;s work ethic exemplified the professionalism portrayed by EIT and their program.</p>
            </td>
            <td><img src="http://erieit.edu/_images/testimonials/chris_norris.jpg" alt="Chris Norris" /></td>
        </tr>
        <tr>
            <td>
            <h2>Curtis Ferber</h2>
            <h3>Marketing Manager<br />
            Glenwood Beer Distributors, Inc.</h3>
            <br />
            Our experience with the past 2 EIT graduates has been that they are prepared, knowledgeable, and have a willingness to explore new ventures in the design world.<br />
            <br />
            We've had success with EIT graduates!</td>
            <td><img src="http://erieit.edu/_images/testimonials/Curtis-Ferber.jpg" alt="Curtis Ferber" /></td>
        </tr>
        <tr>
            <td><!--[if gte mso 9]><xml>
            <w:WordDocument>
            <w:View>Normal</w:View>
            <w:Zoom>0</w:Zoom>
            <w:PunctuationKerning />
            <w:ValidateAgainstSchemas />
            <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
            <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
            <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
            <w:Compatibility>
            <w:BreakWrappedTables />
            <w:SnapToGridInCell />
            <w:WrapTextWithPunct />
            <w:UseAsianBreakRules />
            <w:DontGrowAutofit />
            </w:Compatibility>
            <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
            </w:WordDocument>
            </xml><![endif]--><!--[if gte mso 9]><xml>
            <w:LatentStyles DefLockedState="false" LatentStyleCount="156">
            </w:LatentStyles>
            </xml><![endif]--><!--[if gte mso 10]>
            <style>
            /* Style Definitions */
            table.MsoNormalTable
            {mso-style-name:"Table Normal";
            mso-tstyle-rowband-size:0;
            mso-tstyle-colband-size:0;
            mso-style-noshow:yes;
            mso-style-parent:"";
            mso-padding-alt:0in 5.4pt 0in 5.4pt;
            mso-para-margin:0in;
            mso-para-margin-bottom:.0001pt;
            mso-pagination:widow-orphan;
            font-size:10.0pt;
            font-family:"Times New Roman";
            mso-ansi-language:#0400;
            mso-fareast-language:#0400;
            mso-bidi-language:#0400;}
            </style>
            <![endif]-->
            <h2>Garrett Geib</h2>
            <h3>President &ndash; SkyRocket Group</h3>
            <p class="MsoNormal">&nbsp;</p>
            <p class="MsoNormal">EIT has been a valuable resource for web and graphic design interns. Whenever the SkyRocket Group is looking to hire, we turn to EIT for recommendations.</p>
            </td>
            <td><img src="http://erieit.edu/_images/testimonials/garrett_geib.jpg" alt="Garrett Geib" /></td>
        </tr>
        <tr>
            <td>
            <h2>Jim Parker</h2>
            <h3>President<br />
            Digitell Inc.</h3>
            <br />
            We always look to EIT when it comes time to hire new employees. We are happy with the quality of students from EIT.<br />
            &nbsp;</td>
            <td><img src="http://erieit.edu/_images/testimonials/jim_parker.jpg" alt="Jim Parker" /></td>
        </tr>
        <tr>
            <td>
            <h2>Nathan Birkner</h2>
            <h3>Graphic Designer<br />
            Sun Your Buns<!--[if !mso]>
            <style>
            v:* {behavior:url(#default#VML);}
            o:* {behavior:url(#default#VML);}
            b:* {behavior:url(#default#VML);}
            .shape {behavior:url(#default#VML);}
            </style>
            <![endif]--><!--[if pub]><xml>
            <b:Publication type="OplPub" oty="68" oh="256">
            <b:OhPrintBlock priv="30E">285</b:OhPrintBlock>
            <b:DptlPageDimensions type="OplPt" priv="1211">
            <b:Xl priv="104">7772400</b:Xl>
            <b:Yl priv="204">10058400</b:Yl>
            </b:DptlPageDimensions>
            <b:OhGallery priv="180E">259</b:OhGallery>
            <b:OhFancyBorders priv="190E">261</b:OhFancyBorders>
            <b:OhCaptions priv="1A0E">257</b:OhCaptions>
            <b:OhQuillDoc priv="200E">280</b:OhQuillDoc>
            <b:OhMailMergeData priv="210E">262</b:OhMailMergeData>
            <b:OhColorScheme priv="220E">283</b:OhColorScheme>
            <b:DwNextUniqueOid priv="2304">1</b:DwNextUniqueOid>
            <b:IdentGUID priv="2A07">0]RV_M4&quot;_1D6Y_S3)'L(89@</b:IdentGUID>
            <b:DpgSpecial priv="2C03">5</b:DpgSpecial>
            <b:CTimesEdited priv="3C04">1</b:CTimesEdited>
            <b:NuDefaultUnitsEx priv="4104">0</b:NuDefaultUnitsEx>
            </b:Publication>
            <b:PrinterInfo type="OplPrb" oty="75" oh="285">
            <b:OhColorSepBlock priv="30E">286</b:OhColorSepBlock>
            <b:FInitComplete priv="1400">False</b:FInitComplete>
            <b:DpiX priv="2203">0</b:DpiX>
            <b:DpiY priv="2303">0</b:DpiY>
            </b:PrinterInfo>
            <b:ColorSeperationInfo type="OplCsb" oty="79" oh="286">
            <b:Plates type="OplCsp" priv="214">
            <b:OplCsp type="OplCsp" priv="11">
            <b:EcpPlate type="OplEcp" priv="213">
            <b:Color priv="104">-1</b:Color>
            </b:EcpPlate>
            </b:OplCsp>
            </b:Plates>
            <b:DzlOverprintMost priv="304">304800</b:DzlOverprintMost>
            <b:CprOverprintMin priv="404">243</b:CprOverprintMin>
            <b:FKeepawayTrap priv="700">True</b:FKeepawayTrap>
            <b:CprTrapMin1 priv="904">128</b:CprTrapMin1>
            <b:CprTrapMin2 priv="A04">77</b:CprTrapMin2>
            <b:CprKeepawayMin priv="B04">255</b:CprKeepawayMin>
            <b:DzlTrap priv="C04">3175</b:DzlTrap>
            <b:DzlIndTrap priv="D04">3175</b:DzlIndTrap>
            <b:PctCenterline priv="E04">70</b:PctCenterline>
            <b:FMarksRegistration priv="F00">True</b:FMarksRegistration>
            <b:FMarksJob priv="1000">True</b:FMarksJob>
            <b:FMarksDensity priv="1100">True</b:FMarksDensity>
            <b:FMarksColor priv="1200">True</b:FMarksColor>
            <b:FLineScreenDefault priv="1300">True</b:FLineScreenDefault>
            </b:ColorSeperationInfo>
            <b:TextDocProperties type="OplDocq" oty="91" oh="280">
            <b:OhPlcqsb priv="20E">282</b:OhPlcqsb>
            <b:EcpSplitMenu type="OplEcp" priv="A13">
            <b:Color>134217728</b:Color>
            </b:EcpSplitMenu>
            </b:TextDocProperties>
            <b:StoryBlock type="OplPlcQsb" oty="101" oh="282">
            <b:IqsbMax priv="104">1</b:IqsbMax>
            <b:Rgqsb type="OplQsb" priv="214">
            <b:OplQsb type="OplQsb" priv="11">
            <b:Qsid priv="104">1</b:Qsid>
            <b:TomfCopyfitBase priv="80B">-9999996.000000</b:TomfCopyfitBase>
            <b:TomfCopyfitBase2 priv="90B">-9999996.000000</b:TomfCopyfitBase2>
            </b:OplQsb>
            </b:Rgqsb>
            </b:StoryBlock>
            <b:ColorScheme type="OplSccm" oty="92" oh="283">
            <b:Cecp priv="104">8</b:Cecp>
            <b:Rgecp type="OplEcp" priv="214">
            <b:OplEcp priv="F">Empty</b:OplEcp>
            <b:OplEcp type="OplEcp" priv="111">
            <b:Color>16711680</b:Color>
            </b:OplEcp>
            <b:OplEcp type="OplEcp" priv="211">
            <b:Color>52479</b:Color>
            </b:OplEcp>
            <b:OplEcp type="OplEcp" priv="311">
            <b:Color>26367</b:Color>
            </b:OplEcp>
            <b:OplEcp type="OplEcp" priv="411">
            <b:Color>13421772</b:Color>
            </b:OplEcp>
            <b:OplEcp type="OplEcp" priv="511">
            <b:Color>16737792</b:Color>
            </b:OplEcp>
            <b:OplEcp type="OplEcp" priv="611">
            <b:Color>13382502</b:Color>
            </b:OplEcp>
            <b:OplEcp type="OplEcp" priv="711">
            <b:Color>16777215</b:Color>
            </b:OplEcp>
            </b:Rgecp>
            <b:SzSchemeName priv="618">Bluebird</b:SzSchemeName>
            </b:ColorScheme>
            </xml><![endif]--><!--[if pub]><xml>
            <b:Page type="OplPd" oty="67" oh="266">
            <b:PtlvOrigin type="OplPt" priv="511">
            <b:Xl>-87325200</b:Xl>
            <b:Yl>-87325200</b:Yl>
            </b:PtlvOrigin>
            <b:Oid priv="605">(`@`````````</b:Oid>
            <b:OhoplWebPageProps priv="90E">267</b:OhoplWebPageProps>
            <b:OhpdMaster priv="D0D">263</b:OhpdMaster>
            <b:PgtType priv="1004">5</b:PgtType>
            </b:Page>
            </xml><![endif]--><!--[if gte mso 9]><xml>
            <o:shapedefaults v:ext="edit" spidmax="3075" fill="f" fillcolor="white [7]"
            strokecolor="black [0]">
            <v:fill color="white [7]" color2="white [7]" on="f" />
            <v:stroke color="black [0]" color2="white [7]">
            <o:left v:ext="view" color="black [0]" color2="white [7]" />
            <o:top v:ext="view" color="black [0]" color2="white [7]" />
            <o:right v:ext="view" color="black [0]" color2="white [7]" />
            <o:bottom v:ext="view" color="black [0]" color2="white [7]" />
            <o:column v:ext="view" color="black [0]" color2="white [7]" />
            </v:stroke>
            <v:shadow color="#ccc [4]" />
            <v:textbox inset="2.88pt,2.88pt,2.88pt,2.88pt" />
            <o:colormenu v:ext="edit" fillcolor="blue [1]" strokecolor="black [0]"
            shadowcolor="#ccc [4]" />
            </o:shapedefaults><o:shapelayout v:ext="edit">
            <o:idmap v:ext="edit" data="1" />
            </o:shapelayout></xml><![endif]--></h3>
            <br />
            EIT Definitely taught me what I need to know. Even if you don't know something going into class, the instructors do a good job of teaching you what you need. They are really dedicated!</td>
            <td><img src="http://erieit.edu/_images/testimonials/nathan_birkner.jpg" alt="Nathan Birkner" /></td>
        </tr>
    </tbody>
</table>
<br />
				</td>
</tr>
			</table>
		<br clear="all" />
				
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
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2137940-3");
pageTracker._initData();
pageTracker._trackPageview();


</script>
	</body>
</html>



