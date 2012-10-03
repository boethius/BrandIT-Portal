<?php
class Search_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function search_companies($ss = ""){
		$this->load->helper('domains');
		
		if($this->input->post('region')){
			
			$region = $this->input->post('region');
		}
		else {
			
			$region = "";
		}
		
		if($this->input->post('random')){
			//$this->db->where()
			//$this->db->like('name',$query);
			//$this->db->or_like('tags',$query);
			$sql = "SELECT
						*
					FROM
						companies
					WHERE 
					".($region == "" ? "" :
					"
						region = \"{$region}\"
					AND"
					)."
						portal_id = ?
					AND
						active = 1
					AND
						(	
							name LIKE ?
						OR
							tags LIKE ?
						)";
						
			//$query = $this->db->get_where('companies', array("portal_id" => get_portal_id()));
			$query = $this->db->query($sql, array(get_portal_id(), "%{$ss}%", "%{$ss}%"));
		}
		else {
			$sql = "SELECT
						*
					FROM
						companies
					WHERE 
					".($region == "" ? "" :
					"
						region = \"{$region}\"
					AND"
					)."
						portal_id = ?
					AND
						active = 1
					ORDER BY RAND()";
						
			//$query = $this->db->get_where('companies', array("portal_id" => get_portal_id()));
			$query = $this->db->query($sql, array(get_portal_id()));

			
		}
		return $query->result();
	}

}
?>