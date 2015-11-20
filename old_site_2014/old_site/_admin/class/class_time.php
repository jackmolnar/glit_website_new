<?php
/*	File: timezone.php
 *	By: Tom Watts
 *	Email: wattst@uoguelph.ca or tomwatts@secondsite.biz
 *	GPL:
 *	This script is free software; you can redistribute it and/or modify
 *	it under the terms of the GNU Lesser General Public License as published by
 *	the Free Software Foundation; either version 2.1 of the License, or
 *	(at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU Lesser General Public License for more details.
 *
 *	You can receive a copy of GNU Lesser General Public License at the
 *	World Wide Web address <http://www.gnu.org/licenses/lgpl.html>.
 *
 *	Description:
 *	This is a PHP script that calculates your local time via an HTML page.
 *	A drop-down menu, checkbox, and submit button allow you to choose a
 *	location and whether or not you would like to observe DST.
 *	
 *	There may be a few cases where some countries' DST change rules are off.
 *	This would only cause problems the night of the actual change to or from
 *	DST causing time to be off by an hour.  If you find an error with the
 *	DST rules as I just described, please email me with the actual
 *	rule for observation of DST so I can fix it.
 *
 *	Feel free to use/modify this script as you like.  What we ask in return
 *	is that you include a link to us (www.anicon.ca) on the webpage that
 *	you use it.  If you see something that could be improved upon, send an
 *	email to me explaining what you would like to see added/modified and
 *	I'll consider adding it.
 *	
 *	I would also like to see how this script is used, so if you do use it,
 *	email me a link to the page in which it's used.
 */
	/******************************************************************************************
	******************************************************************************************/
	class class_time{
		/******************************************************************************************
		CLASS VARIABLES
		******************************************************************************************/
		var $config;
		var $dst;
		var $db;
		/******************************************************************************************
		class_news - constructor, initialize all variables. 
		******************************************************************************************/
		function class_time($db, $cfg, $dst=1){
		  //STORE THE DATABASE
		    $this->db = $db;
		  //STORE THE SITES CONFIG SETTINGS
		    $this->config = $cfg;
		  //
		    if($dst==1){
		      $this->dst = true;
        }else{
		      $this->dst = false;
        }
		}
		function getZoneId($num){
      $sql = "SELECT * FROM ".$this->config->db_prefix."_timezone WHERE gmt_offset = '$num' AND dst_offset = ".$this->dst." LIMIT 1";
      $result = $this->db->DB_Q_C($sql);
      $row = mysql_fetch_array($result);
      return $row['timezoneid'];
    }
		/******************************************************************************************
		convertTime - 
		******************************************************************************************/
    function convertTime($input_location_id, $thedate){
      /* Check for valid location ID, return 0 date if invalid */
      if ($input_location_id > 0){
        $sql ="SELECT timezoneid, gmt_offset, dst_offset, timezone_code FROM ".$this->config->db_prefix."_timezone WHERE 
                    timezoneid = '$input_location_id'";
        $result = $this->db->DB_Q_C($sql);
        list($timezoneid, $gmt_offset, $dst_offset, $timezone_code) = mysql_fetch_array($result);
      }else{
         /*	This is the default date returned upon first accessing the page */
        return date('Y-m-d H:i:s');
      }
      if ($dst_offset > 0){
        if (!($this->dst)){
          /*	Set the DST offset to zero if the box is not checked
          and append the standard time acronym to the timezone code */
          $dst_offset = 0;
          $timezone_code = $this->getTimeZoneCode($timezone_code, $gmt_offset + $dst_offset, "ST");
        }else if (!$this->isDaylightSaving($timezoneid, $gmt_offset)){
          /*	Set the DST offset to zero if the timezone is not currently
          in DST and append the standard time acronym to the timezone code */
          $dst_offset = 0;
          $timezone_code = $this->getTimeZoneCode($timezone_code, $gmt_offset + $dst_offset, "ST");
        }else if ($timezone_code != ''){
          /*	Leave the DST offset and append the daylight saving time acronym
          to the timezone code */
          $timezone_code = $this->getTimeZoneCode($timezone_code, $gmt_offset + $dst_offset, "DT");
        }else{
          /*	Assign a timezone code */
          $timezone_code = $this->getTimeZoneCode($timezone_code, $gmt_offset + $dst_offset, "");
        }
    }else{
       /*	Does not observe DST at all */
      $timezone_code = $this->getTimeZoneCode($timezone_code, $gmt_offset + $dst_offset, "ST");
    }
    /* Get the DST offset in minutes */
      $dst_offset *= 60;
    /* Get the GMT offset in minutes */
      $gmt_offset *= 60;
    /* Convert time back into hours and minutes when returning */
      $tmp_var = explode(" ", $thedate);
      $tmp_date = explode("-", $tmp_var[0]);
      $tmp_time = explode(":", $tmp_var[1]);
      $time = $tmp_time[0] * 60 + $tmp_time[1] + $gmt_offset + $dst_offset;
    return date('Y-m-d H:i:s', mktime($time / 60, $time % 60, 0, $tmp_date[1], $tmp_date[2], $tmp_date[0])) . " $timezone_code";
  }
	/******************************************************************************************
	isDaylightSaving - This function returns true if the specified timezone ID is in daylight
	saving time and false if it is not
	******************************************************************************************/
  function isDaylightSaving($timezoneid, $gmt_offset){
	/*	Get the current year by geting GMT time and date and then adding
		offset */
		$gmt_minute = gmdate("i");
		$gmt_hour = gmdate("H");
		$gmt_month = gmdate("m");
		$gmt_day = gmdate("d");
		$gmt_year = gmdate("Y");
		$cur_year = date("Y", mktime($gmt_hour + $gmt_offset, $gmt_minute, 0, $gmt_month, $gmt_day, $gmt_year));

		switch ($timezoneid)
		{
	/*	North American cases: begins at 2 am on the first Sunday in April
		and ends on the last Sunday in October.  Note: Monterrey does not
		actually observe DST */
			case 4:		/*	Alaska */
			case 5:		/*	Pacific Time (US & Canada); Tijuana */
			   if ($this->afterFirstDayInMonth($cur_year, $cur_year, 3, "Sun", $gmt_offset) &&
				$this->beforeLastDayInMonth($cur_year, $cur_year, 10, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;
			case 8:		/*	Mountain Time (US & Canada) */
			   if ($this->afterFirstDayInMonth($cur_year, $cur_year, 3, "Sun", $gmt_offset) &&
				$this->beforeLastDayInMonth($cur_year, $cur_year, 10, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;
			case 10:	/*	Central Time (US & Canada) */
			   if ($this->afterFirstDayInMonth($cur_year, $cur_year, 3, "Sun", $gmt_offset) &&
				$this->beforeLastDayInMonth($cur_year, $cur_year, 10, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;
			case 11:	/*	Guadalajara, Mexico City, Monterrey */
			case 14:	/*	Eastern Time (US & Canada) */
			   if ($this->afterFirstDayInMonth($cur_year, $cur_year, 3, "Sun", $gmt_offset) &&
				$this->beforeLastDayInMonth($cur_year, $cur_year, 10, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;
			case 16:	/*	Atlantic Time (Canada) */
			case 19:	/*	Newfoundland */
				if ($this->afterFirstDayInMonth($cur_year, $cur_year, 4, "Sun", $gmt_offset) &&
				$this->beforeLastDayInMonth($cur_year, $cur_year, 10, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;

			case 7:		/*	Chihuahua, La Paz, Mazatlan */
				if ($this->afterFirstDayInMonth($cur_year, $cur_year, 5, "Sun", $gmt_offset) &&
				$this->beforeLastDayInMonth($cur_year, $cur_year, 9, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;

			case 18:	/*	Santiago, Chile */
				if ($this->afterSecondDayInMonth($cur_year, 10, "Sat", $gmt_offset) &&
				$this->beforeSecondDayInMonth($cur_year + 1, $cur_year, 3, "Sat", $gmt_offset))
					return true;

				else
					return false;
				break;

			case 20:	/*	Brasilia, Brazil */
				if ($this->afterFirstDayInMonth($cur_year, $cur_year, 11, "Sun", $gmt_offset) &&
				$this->beforeThirdDayInMonth($cur_year, $cur_year, 2, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;

			case 23:	/*	Mid-Atlantic */
				if ($this->afterLastDayInMonth($cur_year, $cur_year, 3, "Sun", $gmt_offset) &&
				$this->beforeLastDayInMonth($cur_year, $cur_year, 9, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;

	/*	EU, Russia, other cases: begins at 1 am GMT on the last Sunday
		in March and ends on the last Sunday in October */
			case 22:	/*	Greenland */
			case 24:	/*	Azores */
			case 27:	/*	Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London */
			case 28:	/*	Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna */
			case 29:	/*	Belgrade, Bratislava, Budapest, Ljubljana, Prague */
			case 30:	/*	Brussels, Copenhagen, Madrid, Paris */
			case 31:	/*	Sarajevo, Skopje, Warsaw, Zagreb */
			case 33:	/*	Athens, Istanbul, Minsk */
			case 34:	/*	Bucharest */
			case 37:	/*	Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius */
			case 41:	/*	Moscow, St. Petersburg, Volgograd */
			case 47:	/*	Ekaterinburg */
			case 45:	/*	Baku, Tbilisi, Yerevan */
			case 51:	/*	Almaty, Novosibirsk */
			case 56:	/*	Krasnoyarsk */
			case 58:	/*	Irkutsk, Ulaan Bataar */
			case 64:	/*	Yakutsk, Sibiria */
			case 71:	/*	Vladivostok */
				if ($this->afterLastDayInMonth($cur_year, $cur_year, 3, "Sun", $gmt_offset) &&
				$this->beforeLastDayInMonth($cur_year, $cur_year, 10, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;

			case 35:	/*	Cairo, Egypt */
				if ($this->afterLastDayInMonth($cur_year, $cur_year, 4, "Fri", $gmt_offset) &&
				$this->beforeLastDayInMonth($cur_year, $cur_year, 9, "Thu", $gmt_offset))
					return true;
				else
					return false;
				break;

			case 39:	/*	Baghdad, Iraq */
				if ($this->afterFirstOfTheMonth($cur_year, $cur_year, 4, $gmt_offset) &&
				$this->beforeFirstOfTheMonth($cur_year, $cur_year, 10, $gmt_offset))
					return true;
				else
					return false;
				break;

			case 43:	/*	Tehran, Iran - Note: This is an approximation to 
							the actual DST dates since Iran goes by the Persian
							calendar.  There are tools for converting between
							Gregorian and Persian calendars at www.farsiweb.info.
							This may be added at a later date for better accuracy */
				if ($this->afterLastDayInMonth($cur_year, $cur_year, 3, "Sun", $gmt_offset) &&
				$this->beforeLastDayInMonth($cur_year, $cur_year, 9, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;

			case 65:	/*	Adelaide */
			case 68:	/*	Canberra, Melbourne, Sydney */
				if ($this->afterLastDayInMonth($cur_year, $cur_year, 10, "Sun", $gmt_offset) &&
				$this->beforeLastDayInMonth($cur_year, $cur_year + 1, 3, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;

			case 70:	/*	Hobart */
				if ($this->afterFirstDayInMonth($cur_year, $cur_year, 10, "Sun", $gmt_offset) &&
				$this->beforeLastDayInMonth($cur_year, $cur_year + 1, 3, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;

			case 73:	/*	Auckland, Wellington */
				if ($this->afterFirstDayInMonth($cur_year, $cur_year, 10, "Sun", $gmt_offset) &&
				$this->beforeThirdDayInMonth($cur_year, $cur_year + 1, 3, "Sun", $gmt_offset))
					return true;
				else
					return false;
				break;

			default:
				break;
		}
		return false;
	}
  /******************************************************************************************
	afterFirstDayInMonth - This function returns true if the current date (at the specified GMT
	offset) is after the first specified day of the week in specified
	month and false if it is not
	******************************************************************************************/
  function afterFirstDayInMonth($curYear, $year, $month, $day, $gmt_offset)
	{
		for ($i = 1; $i < 8; $i++)
		{
			if (date("D", mktime(0,0,0,$month,$i)) == $day)
			{
				$first_day = $i;
				break;
			}
		}
		
		$curDay = gmdate("d");
		$curMonth = gmdate("m");
		$curHour = gmdate("H") + $gmt_offset;
	/* The current time stamp */
		$cur_stamp = mktime($curHour, 0, 0, $curMonth, $curDay, $curYear);

	/* Time stamp for the first occurence for the specified day in the month */
		$first_day_stamp = mktime(2, 0, 0, $month, $first_day, $year);
				
		if ($cur_stamp >= $first_day_stamp)
			return true;
			
		return false;
	}
	/******************************************************************************************
	beforeLastDayInMonth - This function returns true if the current date (at the specified GMT
	offset) is before the last specified day of the week in specified
	month and false if it is not 
	******************************************************************************************/
  function beforeLastDayInMonth($curYear, $year, $month, $day, $gmt_offset)
	{
		$days_in_month = $this->getDaysInMonth($month);
		
		for ($i = $days_in_month; $i > ($days_in_month - 8); $i--)
		{
			if (date("D", mktime(0,0,0,$month,$i)) == $day)
			{
				$last_day = $i;
				break;
			}
		}
		
		$curDay = gmdate("d");
		$curMonth = gmdate("m");
		$curHour = gmdate("H") + $gmt_offset;
	/* The current time stamp */
		$cur_stamp = mktime($curHour, 0, 0, $curMonth, $curDay, $curYear);

	/* Time stamp for the last occurrence of the day in the month at 2 am */
		$last_sun_stamp = mktime(2, 0, 0, $month, $last_day, $year);
				
		if ($cur_stamp < $last_sun_stamp)
			return true;
			
		return false;
	}
  /******************************************************************************************
	afterLastDayInMonth - This function returns true if the current date (at the specified GMT
	offset) is after the last specified day of the week in specified
	month and false if it is not
	******************************************************************************************/
  function afterLastDayInMonth($curYear, $year, $month, $day, $gmt_offset)
	{
		$days_in_month = $this->getDaysInMonth($month);

		for ($i = $days_in_month; $i > ($days_in_month - 8); $i--)
		{
			if (date("D", mktime(0,0,0,$month,$i)) == $day)
			{
				$last_day = $i;
				break;
			}
		}
		
		$curDay = gmdate("d");
		$curMonth = gmdate("m");
	/* All EU countries observe the DST change at 1 am GMT */
		$curHour = gmdate("H");
	/* The current time stamp */
		$cur_stamp = mktime($curHour, 0, 0, $curMonth, $curDay, $curYear);

	/* Time stamp for the first occurence for the specified day in the month */
		$last_day_stamp = mktime(1, 0, 0, $month, $last_day, $year);
				
		if ($cur_stamp >= $last_day_stamp)
			return true;
			
		return false;
	}
  /******************************************************************************************
	afterFirstOfTheMonth - This function returns true if the current date (at the specified GMT
	offset) is after the first day of the specified month and false if
	it is not
	******************************************************************************************/
	function afterFirstOfTheMonth($curYear, $year, $month, $gmt_offset)
	{
		$curDay = gmdate("d");
		$curMonth = gmdate("m");
		$curHour = gmdate("H") + $gmt_offset;
	/* The current time stamp */
		$cur_stamp = mktime($curHour, 0, 0, $curMonth, $curDay, $curYear);

	/* Time stamp for the first of the month */
		$last_day_stamp = mktime(3, 0, 0, $month, 1, $year);
				
		if ($cur_stamp >= $last_day_stamp)
			return true;
			
		return false;
	}
  /******************************************************************************************
	beforeFirstOfTheMonth - This function returns true if the current date (at the specified GMT
	offset) is before the first day of the specified month and false if
	it is not
	******************************************************************************************/
	function beforeFirstOfTheMonth($curYear, $year, $month, $gmt_offset)
	{
		$curDay = gmdate("d");
		$curMonth = gmdate("m");
		$curHour = gmdate("H") + $gmt_offset;
	/* The current time stamp */
		$cur_stamp = mktime($curHour, 0, 0, $curMonth, $curDay, $curYear);

	/* Time stamp for the first of the month */
		$first_day_stamp = mktime(3, 0, 0, $month, 1, $year);
				
		if ($cur_stamp < $first_day_stamp)
			return true;
			
		return false;
	}
  /******************************************************************************************
	beforeThirdDayInMonth - This function returns true if the current date (at the specified GMT
	offset) is before the third occurrence of the specified day of the
	week in the specified month and false if it is not
	******************************************************************************************/
	function beforeThirdDayInMonth($curYear, $year, $month, $day, $gmt_offset)
	{
		$count = 0;
		
		for ($i = 1; $i < 22; $i++)
		{
			if (date("D", mktime(0,0,0,$month,$i)) == $day)
			{
				$count++;
				if ($count == 3)
				{
					$third_day = $i;
					break;
				}
			}
		}
		
		$curDay = gmdate("d");
		$curMonth = gmdate("m");
		$curHour = gmdate("H") + $gmt_offset;
	/* The current time stamp */
		$cur_stamp = mktime($curHour, 0, 0, $curMonth, $curDay, $curYear);

	/* Time stamp for the third occurence for the specified day in the month */
		$third_day_stamp = mktime(2, 0, 0, $month, $third_day, $year);
				
		if ($cur_stamp < $third_day_stamp)
			return true;
			
		return false;
	}
  /******************************************************************************************
	beforeSecondDayInMonth - This function returns true if the current date (at the specified GMT
	offset) is before the second occurrence of the specified day of the
	week in the specified month and false if it is not
	******************************************************************************************/
  function beforeSecondDayInMonth($curYear, $year, $month, $day, $gmt_offset)
	{
		$count = 0;
		
		for ($i = 1; $i < 15; $i++)
		{
			if (date("D", mktime(0,0,0,$month,$i)) == $day)
			{
				$count++;
				if ($count == 2)
				{
					$second_day = $i;
					break;
				}
			}
		}
		
		$curDay = gmdate("d");
		$curMonth = gmdate("m");
		$curHour = gmdate("H") + $gmt_offset;
	/* The current time stamp */
		$cur_stamp = mktime($curHour, 0, 0, $curMonth, $curDay, $curYear);

	/*	Time stamp for the second occurence of the specified day in the month;
		change in Chile occurs at midnight */
		$second_day_stamp = mktime(0, 0, 0, $month, $second_day, $year);

		if ($cur_stamp < $second_day_stamp)
			return true;
			
		return false;
	}
  /******************************************************************************************
	afterSecondDayInMonth - This function returns true if the current date (at the specified GMT
	offset) is after the second occurrence of the specified day of the
	week in the specified month and false if it is not
	******************************************************************************************/
	function afterSecondDayInMonth($curYear, $year, $month, $day, $gmt_offset)
	{
		$count = 0;
		
		for ($i = 1; $i < 15; $i++)
		{
			if (date("D", mktime(0,0,0,$month,$i)) == $day)
			{
				$count++;
				if ($count == 2)
				{
					$second_day = $i;
					break;
				}
			}
		}
		
		$curDay = gmdate("d");
		$curMonth = gmdate("m");
		$curHour = gmdate("H") + $gmt_offset;
	/* The current time stamp */
		$cur_stamp = mktime($curHour, 0, 0, $curMonth, $curDay, $curYear);

	/*	Time stamp for the second occurence of the specified day in the month;
		change in Chile occurs at midnight */
		$second_day_stamp = mktime(0, 0, 0, $month, $second_day, $year);

		if ($cur_stamp >= $second_day_stamp)
			return true;
			
		return false;
	}
  /******************************************************************************************
	getDaysInMonth - A function that returns the number of days in the specified month
	******************************************************************************************/
	function getDaysInMonth($month)
	{
		switch ($month)
		{
		/*	The February case, check for leap year */
			case 2:
				return (date("L")?29:28);
				break;
		/* Months with 31 days */
			case 1:
			case 3:
			case 5:
			case 7:
			case 8:
			case 10:
			case 12:
				return 31;
				break;
			default:
				return 30;
				break;
		}
	}
	/******************************************************************************************
	getTimeZoneCode - This function returns a formated time zone code based on the
	value of the input code, the offset, any suffix that might apply
	******************************************************************************************/
  function getTimeZoneCode($timezone_code, $total_offset, $suffix)
	{
		if ($timezone_code == '')
		{
		/* If the code is NULL, create one */
			if ($total_offset > 0)
				return ("GMT +$total_offset");
			else if ($total_offset == 0)
				return ("GMT");
			else
				return ("GMT $total_offset");
		}
		else
		/* If not, append the suffix */
			return $timezone_code . "$suffix";
	}
	}
?>
