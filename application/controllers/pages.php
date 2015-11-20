<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
	
	function __construct()
	{
        parent::__construct();
		$this->load->library('pagination');
		$this->load->model('pages_model','pages');
    }

	
	public function index($page='admissions', $page_number=null)
	{
		/*
		*
		*	
		*	This handles index blog page ONLY - pagenated blog pages handled in Blog controller
		*
		*	Get news if blog slug is passed - get news item if item slug is passed
		*
		*/
		if($page == 'blog' && $this->uri->segment(2) == false){
			
			//load news model and get all news
			$this->load->model('news_model','news');
			$data['news'] = $this->news->get_news(10, $page_number);
			$total_news_count = $this->news->get_total_news_count();
			
			//get page data
			$page_id = $this->pages->get_page_id($page);
			$data['page_data'] = $this->pages->page_data($page_id['page_id']);
			
			//pagination config options
			$config['base_url'] = site_url('/blog/');
			$config['total_rows'] = $total_news_count;
			$config['per_page'] = 10;
			$config['uri_segment'] = 2;
			$config['first_link'] = 'Newest';
			$config['last_link'] = 'Oldest';
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
						
			//build breadcrumbs
			$this->breadcrumb->clear();
			$this->breadcrumb->add_crumb('Home', base_url());
			$this->breadcrumb->add_crumb($page_id['name']);
			$data['breadcrumbs'] = $this->breadcrumb->output();
			
			//load view
			$this->template->load('default_template', 'blog_page_view', $data);
			
		
			
		} else if ($page == 'blog' && $this->uri->segment(2)){
			
			//load the model, get the slug, get the news item data
			$this->load->model('news_model','news');
			$slug = $this->uri->segment(2);
			$data = $this->news->get_news_item($slug);
			
			//echo 'hit this statement';
			
			//get page data
			$page_id = $this->pages->get_page_id($page);
			$data['page_data'] = $this->pages->page_data($page_id['page_id']);
			
			//build breadcrumbs
			$this->breadcrumb->clear();
			$this->breadcrumb->add_crumb('Home', base_url());
			$this->breadcrumb->add_crumb($page_id['name'], '../'.$page);
			$this->breadcrumb->add_crumb($data['blog_title']);
			$data['breadcrumbs'] = $this->breadcrumb->output();
			
			//load view
			$this->template->load('default_template', 'blog_item_page_view', $data);
		
		
		/*
		
		Get consumer info if that is passed
		
		*/
		} else if($page == 'consumer_info'){
			
			//get page data
			$page_id = $this->pages->get_page_id($page);
			$data = $this->pages->page_data($page_id['page_id']);
			
			//if a program is passed, get the template
			if ($this->uri->segment(2)){
				
				//clean and fix program segment
				$clean_segment = str_replace("_", " ", $this->uri->segment(2));
				$clean_segment = ucwords($clean_segment);
				
				//build breadcrumbs
				$this->breadcrumb->clear();
				$this->breadcrumb->add_crumb('Home', base_url());
				$this->breadcrumb->add_crumb($page_id['name'], '../'.$page);
				$this->breadcrumb->add_crumb($clean_segment);
				$data['breadcrumbs'] = $this->breadcrumb->output();
			
				$data['segment'] = $this->uri->segment(2);
			} else {
				//build breadcrumbs
				$this->breadcrumb->clear();
				$this->breadcrumb->add_crumb('Home', base_url());
				$this->breadcrumb->add_crumb($page_id['name']);
				$data['breadcrumbs'] = $this->breadcrumb->output();
			}
			
			
			//load view
			$this->template->load('default_template', 'consumer_info_page_view', $data);


		/*
		
		Get student handbook if that is passed
		
		*/
		} else if($page == 'student_handbook'){
			
			//get page data
			$page_id = $this->pages->get_page_id($page);
			$data = $this->pages->page_data($page_id['page_id']);
			
			//build breadcrumbs
			$this->breadcrumb->clear();
			$this->breadcrumb->add_crumb('Home', base_url());
			$this->breadcrumb->add_crumb($page_id['name']);
			$data['breadcrumbs'] = $this->breadcrumb->output();
			
			
			//load view
			$this->template->load('default_template', 'student_handbook_page_view', $data);



		} else if($page == 'request_information'){
			
			//GET PAGE ID AND RETURN
			$page_id = $this->pages->get_page_id($page);
			
			//GET PAGE DETAILS AND RETURN
			$page_details = $this->pages->page_data($page_id['page_id']);
			
			$page_details['name'] = $page_id['name'];
			$page_details['slug'] = $page_id['slug'];
			
			//build breadcrumbs
			$this->breadcrumb->clear();
			$this->breadcrumb->add_crumb('Home', base_url());
			$this->breadcrumb->add_crumb($page_id['name']);
			$page_details['breadcrumbs'] = $this->breadcrumb->output();
		
			$this->template->load('default_template', 'req_info_view', $page_details);
		
		
		} else if($page == 'apply_online'){
			
			
			//GET PAGE ID AND RETURN
			$page_id = $this->pages->get_page_id($page);
			
			//GET PAGE DETAILS AND RETURN
			$page_details = $this->pages->page_data($page_id['page_id']);
			
			$page_details['name'] = $page_id['name'];
			$page_details['slug'] = $page_id['slug'];
			
			//build breadcrumbs
			$this->breadcrumb->clear();
			$this->breadcrumb->add_crumb('Home', base_url());
			$this->breadcrumb->add_crumb($page_id['name']);
			$page_details['breadcrumbs'] = $this->breadcrumb->output();
		
			$this->template->load('default_template', 'apply_online_view', $page_details);
		
		
		} else if($page == 'schedule_tour'){
			
			
			//GET PAGE ID AND RETURN
			$page_id = $this->pages->get_page_id($page);
			
			//GET PAGE DETAILS AND RETURN
			$page_details = $this->pages->page_data($page_id['page_id']);
			
			$page_details['name'] = $page_id['name'];
			$page_details['slug'] = $page_id['slug'];
			
			//build breadcrumbs
			$this->breadcrumb->clear();
			$this->breadcrumb->add_crumb('Home', base_url());
			$this->breadcrumb->add_crumb($page_id['name']);
			$page_details['breadcrumbs'] = $this->breadcrumb->output();
		
			$this->template->load('default_template', 'schedule_tour_view', $page_details);
		
		
		} else if($page == 'contact'){
			
			
			//GET PAGE ID AND RETURN
			$page_id = $this->pages->get_page_id($page);
			
			//GET PAGE DETAILS AND RETURN
			$page_details = $this->pages->page_data($page_id['page_id']);
			
			$page_details['name'] = $page_id['name'];
			$page_details['slug'] = $page_id['slug'];
			
			//build breadcrumbs
			$this->breadcrumb->clear();
			$this->breadcrumb->add_crumb('Home', base_url());
			$this->breadcrumb->add_crumb($page_id['name']);
			$page_details['breadcrumbs'] = $this->breadcrumb->output();
		
			$this->template->load('default_template', 'contact_page_view', $page_details);
		
		
		} else if($page == 'training_programs'){
			
			
			//GET PROGRAM PAGE ID AND RETURN
			$page_id = $this->pages->get_page_id($page);
			
			//GET PROGRAM DETAILS AND RETURN
			$page_details = $this->pages->page_data($page_id['page_id']);
			
			$page_details['name'] = $page_id['name'];
			$page_details['slug'] = $page_id['slug'];
			
			//build breadcrumbs
			$this->breadcrumb->clear();
			$this->breadcrumb->add_crumb('Home', base_url());
			$this->breadcrumb->add_crumb($page_id['name']);
			$page_details['breadcrumbs'] = $this->breadcrumb->output();
		
			$this->template->load('default_template', 'training_programs_page_view', $page_details);
		
		
		} else {
			
		/*o
		
		Get page if another slug is passed
		
		*/
		
		//GET PROGRAM PAGE ID AND RETURN
		$page_id = $this->pages->get_page_id($page);
		
		//GET PROGRAM DETAILS AND RETURN
		$page_details = $this->pages->page_data($page_id['page_id']);
		
		$page_details['name'] = $page_id['name'];
		$page_details['slug'] = $page_id['slug'];
		
		//build breadcrumbs
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Home', base_url());
		$this->breadcrumb->add_crumb($page_id['name']);
		$page_details['breadcrumbs'] = $this->breadcrumb->output();
	
		$this->template->load('default_template', 'page_page_view', $page_details);
		}
		
	}
	
	
}

