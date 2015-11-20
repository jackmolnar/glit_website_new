<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training_programs extends CI_Controller {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('program_model','program');
    }
	
	public function index()
	{
		$data = array(
			'title' => $this->site_meta->title('training_programs'),
			'description' => $this->site_meta->description('training_programs')
		);
		
		$this->template->load('default_template', 'program_page_view', $data);
		
	}
	
	public function program($program_slug)
	{
		if (isset($program_slug)){
			
			//GET PROGRAM PAGE ID AND RETURN
			$program = $this->program->get_page_id($program_slug);
			$page_id = $program['page_id'];
			
			//GET PROGRAM DETAILS AND RETURN
			$program_details = $this->program->get_program_data($page_id);
			
			$program_details['name'] = $program['name'];
			
			$program_details['slug'] = $program_slug;
						
			$this->template->load('default_template', 'program_page_view', $program_details);
			
		}
				
	}
}

