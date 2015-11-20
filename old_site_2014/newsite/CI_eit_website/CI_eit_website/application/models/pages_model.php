<?

class Pages_model extends CI_Model {


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
				'name' => $row->name,
				'slug' => $row->slug
			);
		}
		
        return $details;
    }
	
	function page_data($page_id)
    {
		$this->db->where('page_id', $page_id);
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
		
        return $details;
    }

    
}

?>