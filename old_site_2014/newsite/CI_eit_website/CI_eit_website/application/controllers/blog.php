<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		
		$this->load->library('pagination');
		
		
    }
	
	public function index($page_number=null)
	{
		$this->load->model('news_model','news');
		
		$data = $this->news->get_all_news(10, $page_number);
		
		$config['base_url'] = site_url('/blog/');
		$config['total_rows'] = $data['total_rows'];
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
		$config['first_link'] = 'Newest';
		$config['last_link'] = 'Oldest';
		$this->pagination->initialize($config);
		
		$data['pagination'] = $this->pagination->create_links();
		
		//build breadcrumbs
			$this->breadcrumb->clear();
			$this->breadcrumb->add_crumb('Home', base_url());
			$this->breadcrumb->add_crumb('News');
			$data['breadcrumbs'] = $this->breadcrumb->output();
		
		/*
		$data = array(
			'title' => $this->site_meta->title('index'),
			'description' => $this->site_meta->description('index')
		);
		*/
		
		$this->template->load('default_template', 'blog_page_view', $data);
		
	}
}

