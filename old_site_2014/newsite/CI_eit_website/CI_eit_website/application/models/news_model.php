<?

class News_model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		$this->load->helper('text');
    }
	
	function get_all_news($number_of_items=null,$offset_number=null)
	{
		//build DB query
		$this->db->order_by('id','desc');
		$query = $this->db->get('news',$number_of_items,$offset_number);
		
		//get total number of rows
		$total_rows = $this->db->count_all('news');
		
		foreach($query->result() as $row){
			
			//check if there is img alt text available
			if($row->image_alt_text != ''){
				$alt = "alt='".$row->image_alt_text."'";
			} else {
				$alt = "alt='".$row->title."'";
			}
			
			//clean content for index page blurb
			$content = $row->content;
			if (strlen($content) > 180){
				$blog_content_blurb = strip_tags($content);
				$blog_content_blurb = character_limiter($blog_content_blurb, 175);
			} else {
			  	$blog_content_blurb = strip_tags($content);
			}
			
			//find the image size - strip off any variables
			$image = 'assets/images/news/'.$row->image;
			$image_url = strtok($image, '?');
			
			//get image size and set variables
			if($row->image == ''){
				$image_url = 'assets/images/news/placeholder.jpg';
				$offset_amount = '';
				$max_size_dimension = '';
			}else{
				$img_size = getimagesize($image_url);
				$image_width = $img_size['0'];
				$image_height = $img_size['1'];
				
				//get resized dimensions with max as 150 px - get amount to offset the image and which direction
				if(isset($image_width) && isset($image_height) && $image_width > $image_height){
					$resize_multiplier = 150 / $image_height;
					$max_size_dimension = 'max-height:150px;';
					$short_side = $resize_multiplier*$image_height;
					$long_side = $resize_multiplier*$image_width;
					$offset_amount = 'margin-left:-'.(($long_side - 150)/2).'px;';
				} else if(isset($image_width) && isset($image_height) && $image_width < $image_height) {
					$resize_multiplier = 150 / $image_width;
					$max_size_dimension = 'max-width:150px;';
					$short_side = $resize_multiplier*$image_width;
					$long_side = $resize_multiplier*$image_height;
					$offset_amount = 'margin-top:-'.(($long_side - 150)/2).'px;';
				}
			} 
				
			
			
			//create details[news] array
			$details['news'][] = array(
				'news_date' => $row->news_date,
				'slug' => $row->slug,
				'title' => $row->title,
				'image' => $image_url,
				'img_offset' => $offset_amount,
				'max_size_dimension' => $max_size_dimension,
				'image_alt_text' => $alt,
				'content' => $blog_content_blurb,
			);
			$details['total_rows'] = $total_rows;
		}
		return $details;
	}
	
	
	function get_news_item($slug)
	{
		//build DB query
		$this->db->where('slug',$slug);
		$query = $this->db->get('news');
		
		//get the results
		foreach($query->result() as $row){
			
			//check if there is img alt text available
			if($row->image_alt_text != ''){
				$alt = "alt='".$row->image_alt_text."'";
			} else {
				$alt = "alt='".$row->title."'";
			}
			
			//get image if exists, if not return empty variable
			if($row->image != ''){
				$image_url = $row->image;
			} else {
				$image_url = '';
			}
			
			//clean content for index page blurb
			$content = $row->content;
			if (strlen($content) > 150 && empty($row->description)){
				$blog_content_blurb = strip_tags($content);
				$blog_content_blurb = character_limiter($blog_content_blurb, 145);
			} else if (isset($row->description)){
			  	$blog_content_blurb = $row->description;
			}
			
			//create details array
			$details = array(
				'news_date' => $row->news_date,
				'slug' => $row->slug,
				'blog_title' => $row->title,
				'page_description' => $blog_content_blurb,
				'image' => $image_url,
				'image_alt_text' => $alt,
				'content' => $row->content,
			);
		}
		return $details;
	}
	/*
    
    function get_page_id($page)
    {
		$this->db->where('slug', $page);
        $query = $this->db->get('pages');
		
		foreach($query->result() as $row){
			$details = array(
				'page_id' => $row->id,
				'name' => $row->name
			);
		}
		
        return $details;
    }
	
	function get_program_data($program_id)
    {
		$this->db->where('page_id', $program_id);
        $query = $this->db->get('page_details');
		
		foreach($query->result() as $row){
			$details = array(
				'page_title' => $row->title,
				'page_description' => $row->description,
				'h1' => $row->h1,
				'h2' => $row->h2,
				'length' => $row->length,
				'degree' => $row->degree,
				'vtour' => $row->vtour,
				'sub_text' => $row->sub_text,
				'primary_img' => $row->primary_img,
				'primary_img_alt' => $row->primary_img_alt,
				'primary_text' => $row->primary_text
			);
		}
		
		$this->db->where('page_id', $program_id);
		$query = $this->db->get('testimonial');
		
		foreach($query->result() as $row){
			$details['testimonial'][] = array(
				'name' => $row->name,
				'position_title' => $row->position_title,
				'company' => $row->company,
				'testimonial' => $row->testimonial,
				'image' => $row->image,
				'image_alt' => $row->image_alt,
			);
		}
		
        return $details;
    }
	
	*/

    
}

?>