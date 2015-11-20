<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$data = array(
			'title' => $this->site_meta->title('index'),
			'description' => $this->site_meta->description('index')
		);
		
		$this->template->load('default_template', 'index_page_view', $data);
		
	}
}

