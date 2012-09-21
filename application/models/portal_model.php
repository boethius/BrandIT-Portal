<?php
class Companies_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_info(){
		
		
		$sql = " 
			SELECT * FROM
				portals
			WHERE
				id = ?
		
		";
		$query = $this->db->query($sql, array(get_portal_id()));
		
		
		
	}
}


