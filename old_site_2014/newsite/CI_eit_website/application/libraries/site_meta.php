<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
   class Site_meta 
   {
      var $ci;
       
      function __construct() 
      {
         $this->ci =& get_instance();
      }
      
      public function title($page = null) 
      {
	      switch ($page)
	      {
		      //
		     case 'index':
		     return 'Erie Institute of Technology | Technical School Training for Computer, Electronics, Manufacturing, Technology, Welding, Careers in Erie and Northwest Pennsylvania';
		     break;
		     //
	     }
      }
      
      public function description($page = null) 
      {
	      switch ($page)
	      {
		      //
		      case 'index':
		      return 'Erie Electronics, Computer, Technical, and Manufacturing Training School. Erie Institute of Technology or EIT educates students in Biomedical Equipment, Business, CNC Machining, Electrician, Electronic Engineering, Electronics,Automation and Robotics, Maintenance,Graphic Design, Network and Database, Refrigeration, Heating, Ventilation, and Air Conditioning or RHVAC, and Welding. We serve Erie, Northwest Pennsylvania, Ohio, and New York residents.';
		      break;
		      //
	      }
      }
   }