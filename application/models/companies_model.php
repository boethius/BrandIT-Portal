<?php
class Companies_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_companies($company_id = FALSE)
	{
		if ($company_id === FALSE)
		{
			//$query = $this->db->get('companies');
			$query = $this->db->get_where('companies', array('active' => 1));
			return $query->result_array();
		}
		
		$query = $this->db->get_where('companies', array('active' => 1, 'company_id' => $company_id));
		return $query->row_array();
	}
	
	/* EDIT $company_id kjkjkjkj*/
	
	public function set_companies($company_id)
	{
		log_message('debug', "company_id {$company_id}"); 
		$this->load->helper('url');
		
		$data = array(
			'name' => $this->input->post('name'),
			'streetline1' => $this->input->post('streetline1') ,
			'streetline2' => $this->input->post('streetline2') ,
			'zip' => $this->input->post('zip') ,
			'city' => $this->input->post('city') ,
			'telefon' => $this->input->post('telefon') ,
			'telefax' => $this->input->post('telefax') ,
			'mobile' => $this->input->post('mobile') ,
			'email' => $this->input->post('email') ,
			'website' => $this->input->post('website') ,
			'tags' => $this->input->post('tags') ,
			'lat' => $this->input->post('lat') ,
			'long	' => $this->input->post('long') ,
			'description' => $this->input->post('description'),
			'billed' => $this->input->post('billed'), 
			'active' => 1
		);
		/*
		
		,
			'active' => $this->input->post('active')
			
			*/
		if($company_id == 0)
			return $this->db->insert('companies', $data);
		else{
			$this->db->where('company_id',$company_id);
			return $this->db->update('companies', $data);
		}
	}
	
	public function del_companies($company_id){
		log_message('debug', "deleted company_id {$company_id}");
		
		$data = array("company_id" => $company_id);
		
		return $this->db->delete('companies', $data);
		
	}
	
	public function set_live($company_id,$live = 1){
		
		log_message('debug', "live: {$live}, company_id {$company_id}");
		$this->load->helper('url');
		
		$data = array("active" => $live);
		$where = array("company_id" => $company_id);
		
		return $this->db->update('companies', $data, $where);
	}
	
}
?>