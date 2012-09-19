<?php

class Region_model extends CI_Model {
	
	public function __construct()
	{
		
		//parent::__construct();
		//$this->load->database();
		

		
	}
	
	public function get_region($region_id){
		
		$query = $this->db->get_where('regions', array("id" => $region_id));
		if($query->num_rows() == 1){
			
			return $query;
		}else{
			
			return "fail";
		}
		
	}
	
	
	public function get_regions($aid = 1){
		
		$query = $this->db->get_where('regions', array("active" => $aid));
		
		return $query->result_array();
			
			
	}
	
	
}

?>
