<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->model('news_model','news');
		
		$data['news'] = $this->news->get_news(2);
		$data['events'] = $this->news->get_all_events(2);
		
		//print_r($data);
				
		/*
		$data = array(
			'title' => $this->site_meta->title('index'),
			'description' => $this->site_meta->description('index')
		);
		*/
		
		$this->template->load('default_template', 'index_page_view', $data);
		
	}
	
	public function test()
	{
				
		$this->load->model('news_model','news');
		
		$data = $this->news->get_all_news(2);
		
		/*
		$data = array(
			'title' => $this->site_meta->title('index'),
			'description' => $this->site_meta->description('index')
		);
		*/
		
		$this->template->load('default_template', 'index_page_view_test', $data);
		
	}
}

