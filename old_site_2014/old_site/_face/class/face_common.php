<?php
  	class face_common{
		/******************************************************************************************
		CLASS VARIABLES
		******************************************************************************************/
  		/******************************************************************************************
  		face_common - constructor, initialize all variables. 
  		******************************************************************************************/
  		function face_common(){
  		}
  		/******************************************************************************************
    	
  		******************************************************************************************/
  		function singleCheck($num){
        if($num==1){
          return "";
        }else{
          return "s";
        }
      }
      /******************************************************************************************
  		******************************************************************************************/
      function checkurlForPageName($name){
        if($_SERVER['REQUEST_URI']=="/" && $name=="INDEX"){
        	return true;
        }else{
        	$tmp = explode("/", $_SERVER['REQUEST_URI']);
        	for($i=0;$i<count($tmp);$i++){
        		if($tmp[$i]==$name){
        			return true;
        		}
        	}
        	return false;
        }
      }
  		/******************************************************************************************
    	DateFormat - CONVERTS OUR DATABASE DATETIME FIELD INTO A NICER VERSION
  		******************************************************************************************/
    	function dateFormat($old_date, $layout, $tz=0){
    		$old_date = ereg_replace('[^0-9]', '', $old_date);
    		
    		//Extract the different elements that make up the date and time
    		$_year = substr($old_date,0,4);
    		$_month = substr($old_date,4,2);
    		$_day = substr($old_date,6,2);
    		$_hour = substr($old_date,8,2);
    		$_minute = substr($old_date,10,2);
    		$_second = substr($old_date,12,2);
    		
    		//Combine the date function with mktime to produce a user-friendly date & time
    		$new_date = date($layout, mktime($_hour, $_minute, $_second, $_month, $_day, $_year));
    		return $new_date;
    	}
    	/***************************************************
    	***************************************************/
    	function checkFields($values){
    		$injection = false;
    		for ($n=0;$n<count($values);$n++){
    			if (eregi("%0A",$values[$n]) || eregi("%0D",$values[$n]) || eregi("\r",$values[$n]) || eregi("\n",$values[$n])){
    				$injection = true;
    			}
    		}
    		return $injection;
    	}
    	/*****************************************************************************************************************************************/
      /*****************************************************************************************************************************************/
      function contactForm($contact="", $address="", $city="", $state="", $zip="", $email="", $phone="", $comments=""){
      	$ret = "
      	<form action='".$_REQUEST['PHP_SELF']."' id='contactform' name='contactform' method='post'>
          <table cellpadding='5' cellspacing='5'>
            <tr>
              <th>Name</th>
              <td colspan='3'><input class='required' type='text' name='Contact' id='css_Contact' value=\"$contact\" /></td>
            </tr>
            <tr>
              <th>Address</th>
              <td colspan='3'><input type='text' name='Address' id='css_Address' value=\"$address\" /></td>
            </tr>
            <tr>
              <th>City</th>
              <td colspan='3'><input type='text' name='City' id='css_City' value=\"$city\" /></td>
            </tr>
            <tr>
              <th>State</th>
              <td>
                <select name='State'>
      					 ".$this->printSelectState($state)."
      				  </select>
                <strong>Zip</strong>
                <input id='css_Zip' type='text' name='Zip' value=\"$zip\" /></td>
            </tr>
            <tr>
              <th>E-mail</th>
              <td colspan='3'><input class='required validate-email' type='text' name='Email' id='css_Email' value=\"$email\" /></td>
            </tr>
            <tr>
              <th>Phone</th>
              <td colspan='3'><input type='text' name='Phone' id='css_Phone' value=\"$phone\" /></td>
            </tr>
            <tr>
              <th>What can we help you with?</th>
              <td colspan='3'><textarea name='Comments'>$comments</textarea></td>
            </tr>
            <tr>
              <td colspan='4' align='right'><input name='submitok' type='submit' value='send' /></td>
            </tr>
          </table>
      	</form>
      	<script type='text/javascript'>new FormValidator ('contactform');</script>
      ";
      return $ret;
      }
    	/*****************************************************************************************************************************************/
      /*****************************************************************************************************************************************/
      function printSelectState($state){
        $ret = "<option value='$state' selected='selected'>-$state</option>
        <option value='AL'>AL</option>
        <option value='AK'>AK</option>
        <option value='AZ'>AZ</option>
        <option value='AR'>AR</option>
        <option value='CA'>CA</option>
        <option value='CO'>CO</option>
        <option value='CT'>CT</option>
        <option value='DE'>DE</option>
        <option value='DC'>DC</option>
        <option value='FL'>FL</option>
        <option value='GA'>GA</option>
        <option value='HI'>HI</option>
        <option value='ID'>ID</option>
        <option value='IL'>IL</option>
        <option value='IN'>IN</option>
        <option value='IA'>IA</option>
        <option value='KS'>KS</option>
        <option value='KY'>KY</option>
        <option value='LA'>LA</option>
        <option value='ME'>ME</option>
        <option value='MD'>MD</option>
        <option value='MA'>MA</option>
        <option value='MI'>MI</option>
        <option value='MN'>MN</option>
        <option value='MS'>MS</option>
        <option value='MO'>MO</option>
        <option value='MT'>MT</option>
        <option value='NE'>NE</option>
        <option value='NV'>NV</option>
        <option value='NH'>NH</option>
        <option value='NJ'>NJ</option>
        <option value='NM'>NM</option>
        <option value='NY'>NY</option>
        <option value='NC'>NC</option>
        <option value='ND'>ND</option>
        <option value='OH'>OH</option>
        <option value='OK'>OK</option>
        <option value='OR'>OR</option>
        <option value='PA'>PA</option>
        <option value='RI'>RI</option>
        <option value='SC'>SC</option>
        <option value='SD'>SD</option>
        <option value='TN'>TN</option>
        <option value='TX'>TX</option>
        <option value='UT'>UT</option>
        <option value='VT'>VT</option>
        <option value='VA'>VA</option>
        <option value='WA'>WA</option>
        <option value='WV'>WV</option>
        <option value='WI'>WI</option>
        <option value='WY'>WY</option>";
        return $ret;
      }
    	/***************************************************
    	***************************************************/
    	function pageNav($start, $limit, $num_posts, $name_list = array(), $data_list = array()){
    		//
    		if($num_posts>0){
    			$pages = ceil($num_posts/$limit);
    			$count=1;
    			print "<table cellpadding='0' cellspacing='0'>";
    			print "<tr>";
    			/***************************************************************
    			PREVIOUS			
    			****************************************************************/
        		$previous_start = $start - $limit;
    			    print "<td>";
              print "<form name='nav_prev' method='post' action='".$_REQUEST['PHP_SELF']."'>";
        			print "<input type='hidden' name='start' value='$previous_start' />";
        			//
      				for($i=0;$i<count($name_list);$i++){
      					print "<input name='".$name_list[$i]."' type='hidden' value='".$data_list[$i]."' />";
      				}
    			  if($previous_start>=0){
        			print "<input type='submit' name='submitok' value='<<' />";
            }else{
        			print "<input type='submit' name='submitok' value='<<' disabled='disabled' />";
            }
        			print "</form>";
        			print "</td>";
          /***************************************************************
    			JUMP MENU			
    			****************************************************************/
    			print "<td>";
      			print "<form name='nav_jump' method='post' action='".$_REQUEST['PHP_SELF']."'>";
      			print "<select name='start'>";
      			while($count<=$pages){
      				$newstart = $limit*($count-1);
      				if($newstart == $start){
      					print "<option selected value='$newstart'> $count </option>";
      				}else{
      					print "<option value='$newstart'> $count </option>";
      				}
      				$count++;
      			}
      			print "</select>";
      			//
      				for($i=0;$i<count($name_list);$i++){
      					print "<input name='".$name_list[$i]."' type='hidden' value='".$data_list[$i]."' />";
      				}
      			print "<input type='submit' name='submitok' value='jump' />";
      			print "</form>";
    			print "</td>";
    			/***************************************************************
    			NEXT			
    			****************************************************************/
        		$next_start = $start + $limit;
    			  
    			    print "<td>";
        		  print "<form name='nav_next' method='post' action='".$_REQUEST['PHP_SELF']."'>";
        			print "<input type='hidden' name='start' value='$next_start' />";
        			//
      				for($i=0;$i<count($name_list);$i++){
      					print "<input name='".$name_list[$i]."' type='hidden' value='".$data_list[$i]."' />";
      				}
      				if($next_start<$num_posts){
        			 print "<input type='submit' name='submitok' value='>>' />";
        			}else{
        			 print "<input type='submit' name='submitok' value='>>' disabled='disabled' />";
              }
        			print "</form>";
        			print "</td>";
    			print "</tr></table>";
    		}
    	}
  		/******************************************************************************************
    	RETURNS THE CURRENT YEAR
  		******************************************************************************************/
    	function getYear(){
    		$theday = getdate();
    		$y = $theday[year];
    		return $y;
    	} 
    	/******************************************************************************************
  		******************************************************************************************/
    	function getPrevMonth($m){
      	if($m==1){
      		return 12;
      	}else{
      		return $m-1;
      	}
      }
    	/******************************************************************************************
  		******************************************************************************************/
      function getNextMonth($m){
      	if($m==12){
      		return 1;
      	}else{
      		return $m+1;
      	}
      }
    	/******************************************************************************************
  		******************************************************************************************/
      function getMonth($m=0) {
      	return (($m==0 ) ? date(m) : date(m, mktime(0,0,0,$m)));
      }
    	/******************************************************************************************
      PHP Calendar (version 2.3), written by Keith Devens
      # http://keithdevens.com/software/php_calendar
      #  see example at http://keithdevens.com/weblog
      # License: http://keithdevens.com/software/license    	
  		******************************************************************************************/
      function generate_calendar($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array()){
      	$first_of_month = gmmktime(0,0,0,$month,1,$year);
      	#remember that mktime will automatically correct if invalid dates are entered
      	# for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
      	# this provides a built in "rounding" feature to generate_calendar()
      
      	$day_names = array(); #generate all the day names according to the current locale
      	for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) #January 4, 1970 was a Sunday
      		$day_names[$n] = ucfirst(gmstrftime('%A',$t)); #%A means full textual day name
      
      	list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month));
      	$weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day
      	$title   = htmlentities(ucfirst($month_name)).'&nbsp;'.$year;  #note that some locales don't capitalize month and day names
      
      	#Begin calendar. Uses a real <caption>. See http://diveintomark.org/archives/2002/07/03
      	@list($p, $pl) = each($pn); @list($n, $nl) = each($pn); #previous and next links, if applicable
      	if($p) $p = '<span class="calendar-prev">'.($pl ? '<a href="'.htmlspecialchars($pl).'">'.$p.'</a>' : $p).'</span>&nbsp;';
      	if($n) $n = '&nbsp;<span class="calendar-next">'.($nl ? '<a href="'.htmlspecialchars($nl).'">'.$n.'</a>' : $n).'</span>';
      	$calendar = '<table class="calendar">'."\n".
      		'<caption class="calendar-month">'.$p.($month_href ? '<a href="'.htmlspecialchars($month_href).'">'.$title.'</a>' : $title).$n."</caption>\n<tr>";
      
      	if($day_name_length){ #if the day names should be shown ($day_name_length > 0)
      		#if day_name_length is >3, the full name of the day will be printed
      		foreach($day_names as $d)
      			$calendar .= '<th abbr="'.htmlentities($d).'">'.htmlentities($day_name_length < 4 ? substr($d,0,$day_name_length) : $d).'</th>';
      		$calendar .= "</tr>\n<tr>";
      	}
      
      	if($weekday > 0) $calendar .= '<td colspan="'.$weekday.'">&nbsp;</td>'; #initial 'empty' days
      	for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){
      		if($weekday == 7){
      			$weekday   = 0; #start a new week
      			$calendar .= "</tr>\n<tr>";
      		}
      		if(isset($days[$day]) and is_array($days[$day])){
      			@list($link, $classes, $content) = $days[$day];
      			if(is_null($content))  $content  = $day;
      			$calendar .= '<td'.($classes ? ' class="'.htmlspecialchars($classes).'">' : '>').
      				($link ? '<a href="'.htmlspecialchars($link).'">'.$content.'</a>' : $content).'</td>';
      		}
      		else $calendar .= "<td>$day</td>";
      	}
      	if($weekday != 7) $calendar .= '<td colspan="'.(7-$weekday).'">&nbsp;</td>'; #remaining "empty" days
      
      	return $calendar."</tr>\n</table>\n";
      }
    }
?>