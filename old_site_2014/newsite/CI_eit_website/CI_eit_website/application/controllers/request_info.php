<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_info extends CI_Controller {
	
	function __construct()
	{
        parent::__construct();
		
    }

	
	public function index()
	{
		
		$this->template->load('default_template', 'req_info_view');
		
	}
	
	
}

