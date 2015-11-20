<?php

	/******************************************************************************************

	******************************************************************************************/

	class class_html_parser{

		/******************************************************************************************

		CLASS VARIABLES

		******************************************************************************************/

		var $tag;

		var $source;

		var $outputTagArray;

		/******************************************************************************************

		class_html_parser 

		******************************************************************************************/

		function class_html_parser($s){

		  $this->source = $s;

		}

		/******************************************************************************************

		fetchTagIntoArray 

		******************************************************************************************/

		function fetchTagIntoArray($tag = "<img>") {

      $this->tag = $tag;

      $data = $this->strip_text($this->source);

      $data = ">".$data;

      //echo $data."END_HTML";

      $striped_data = strip_tags($data,$this->tag);

      $this->outputTagArray = explode("><", $striped_data);

      $my_array = $this->outputTagArray; 

      $count=0;

      $stat = false;

      foreach ($my_array as $main_key=>$main_value){

        $my_space_array[$main_key]= explode(" ",$main_value);

          foreach ($my_space_array[$main_key] as $sub_key=>$sub_value){

            $my_pre_fetched_tag_array = explode("=",$sub_value);

              // check for null attributes ...

              //echo $main_key.": ".$my_pre_fetched_tag_array[1]."</br>";

                if (($my_pre_fetched_tag_array[1] != '""') && ($my_pre_fetched_tag_array[1] != NULL)){

                  $my_tag_array[$count][$my_pre_fetched_tag_array[0]] = $my_pre_fetched_tag_array[1];

                  $stat = true;

                }

          }

          if($stat){

            $count++;

            $stat = false;

          }

      }

      $this->outputTagArray = $my_tag_array; 

      return $this->outputTagArray;

    }     

    function strip_bad_tags($html)

{

   $s = preg_replace ("@</?[^>]*>*@", "", $html);

   return $s;

}

                                               

		/******************************************************************************************

		strip_text 

		******************************************************************************************/

		function strip_text($s){

		  $tag_flag = false;

		  $php_flag = false;

		  $ret = "";

		  for($i=0;$i<strlen($s);$i++){

		    if($php_flag){

          if($s[$i]=="?" && $s[$i+1]==">"){

            //PHP TAG CHECK SET FLAG

              $php_flag = false;

          }

        }else if($tag_flag){

		      if($s[$i]==">"){

            //ADD IT TO OUR SOURCE 

              $ret.=$s[$i];

            //WE FOUND END TAG, RESET FLAG

              $tag_flag = false;

          }else{

            if($s[$i]=="<" && $s[$i+1]=="?"){

              //PHP TAG CHECK SET FLAG

                $php_flag = true;

            }else{

              $ret.=$s[$i];

            }

          }

        }else{

          if($s[$i]=="<" && $s[$i+1]=="?"){

            //PHP TAG CHECK SET FLAG

              $php_flag = true;

          }else if($s[$i]=="<"){

            //ADD IT TO OUR SOURCE 

              $ret.=$s[$i];

            //SET FLAG UNTIL WE REACH END TAG

              $tag_flag = true;

          }

        }

      }

      return $ret;

    }

	}

?>

