<?

class Program_model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
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

    
}

?>