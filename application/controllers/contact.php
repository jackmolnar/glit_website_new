<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	function __construct()
	{
        parent::__construct();
		
    }

	
	public function req_info()
	{
		
		$this->template->load('default_template', 'req_info_view');
		
	}
	
	
}

