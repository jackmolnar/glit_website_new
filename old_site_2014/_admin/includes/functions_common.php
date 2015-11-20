<?
	//--------------------------------------------------
    //5/08/2006
    //ph_common.php
    //--------------------------------------------------
	/***************************************************
	***************************************************/
  define('SALT_LENGTH', 9);
  function generateHash($plainText, $salt = null)
  {
      if ($salt === null)
      {
          $salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
      }
      else
      {
          $salt = substr($salt, 0, SALT_LENGTH);
      }
  
      return $salt . sha1($salt . $plainText);
  }
	/***************************************************
	***************************************************/
	function cleanstr($string){
		 $search = array (
                "'[^\w ]'",                 // Strip out punctuation
                );
        $replace = array (
                "",
                 );
        $string = preg_replace ($search, $replace, $string);
		return $string;
	}
	/***************************************************
	***************************************************/
	function clean_file_str($string){
		 $search = array (
                "''/[^0-9a-z\[\]\(\)<>. ]/i''",                 // Strip out punctuation
                );
        $replace = array (
                "",
                 );
        $string = preg_replace ($search, $replace, "$string");
		return $string;
	}
	/***************************************************
	***************************************************/
	function pageNav($start, $limit, $num_posts, $name_list = array(), $data_list = array()){
		//
		if($num_posts>0){
			$pages = ceil($num_posts/$limit);
			$count=1;
			print "<table cellpadding='0' cellspacing='0'>";
			print "<tr><td>";
      $end = $start+$limit;
      print "<h1 class='form_inline'><i>showing record $start - $end</i></h1>";
			/***************************************************************
			PREVIOUS			
			****************************************************************/
    		$previous_start = $start - $limit;
          print "<form class='form_inline' name='nav_prev' method='get'>";
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
      /***************************************************************
			JUMP MENU			
			****************************************************************/
  			print "<form class='form_inline' name='nav_jump' method='get'>";	
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
			/***************************************************************
			NEXT			
			****************************************************************/
    		$next_start = $start + $limit;
    		  print "<form class='form_inline' name='nav_next' method='get'>";
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
			print "</td></tr></table>";
		}
	}
	/***************************************************
	RETURNS THE CURRENT YEAR
	***************************************************/
	function getYear(){
		$theday = getdate();
		$y = $theday[year];
		return $y;
	}
	/***************************************************
	CONVERTS OUR DATABASE DATETIME FIELD INTO A NICER VERSION
	 EX: DateConvert($footer, "l, F jS ");
	***************************************************/
	function DateFormat($old_date, $layout, $tz=0){
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
	function printSelectState($state){	
				print "<option value='$state' selected='selected'>$state</option>";
				print "<option value='AL'>AL</option>
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
	}
	/***************************************************
	REDIRECTS TO A NEW PAGE, DEFAULT WILL BE 1 WHICH 
	SHOULD ALWAYS BE THE HOMEPAGE
	***************************************************/
	function redirect1($where=1, $secs=1){
		print "<script language='JavaScript'>";
		print "var sTargetURL = '?$where';";
		print "setTimeout( 'window.location.href = sTargetURL', $secs*1000 );";
		print "</script>";
	}
?>
