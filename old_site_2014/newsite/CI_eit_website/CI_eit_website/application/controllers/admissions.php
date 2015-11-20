<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admissions extends CI_Controller {

	
	public function index($admissions_page='admissions')
	{
		$this->load->model('pages_model','pages');
		
		//GET PROGRAM PAGE ID AND RETURN
		$page_id = $this->pages->get_page_id($admissions_page);
		$page_id = $page_id['page_id'];
		
		//GET PROGRAM DETAILS AND RETURN
		$page_details = $this->pages->page_data($page_id);
			
		$page_details['name'] = $page_id['name'];
		
		$this->template->load('default_template', 'page_page_view', $page_details);
		
	}
	
	
}

