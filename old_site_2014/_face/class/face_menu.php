<?php

  	class face_menu{

		/******************************************************************************************

		CLASS VARIABLES

		******************************************************************************************/

	

		/******************************************************************************************

		face_news - constructor, initialize all variables. 

		******************************************************************************************/

		function face_menu(){

		}

		/******************************************************************************************

		******************************************************************************************/

		function printMenu($depth){							

		  print "<ul>";

  		if($this->checkurlForPageName("INDEX")){

  			print "<li class='selected'><a href='".$depth."'>home</a></li>";

  		}else{

  			print "<li><a href='".$depth."'>home</a></li>";

  		}

  		if($this->checkurlForPageName("about")){

  			print "<li class='selected'><a href='".$depth."about/'>about</a></li>";

  		}else{

  			print "<li><a href='".$depth."about/'>about</a></li>";

  		}

  		print "</ul>";

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

  }

?>

