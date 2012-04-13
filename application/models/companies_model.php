<?php
class Companies_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_news($company_id = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('companies');
			$query = $this->db->get_where('companies', array('active' => 1));
			return $query->result_array();
		}
		
		$query = $this->db->get_where('companies', array('active' => 1, 'company_id' => $company_id));
		return $query->row_array();
	}
	
	public function set_news()
	{
		$this->load->helper('url');
		
		$data = array(
			'name' => $this->input->post('name') 
			'streetline1' => $this->input->post('streetline1') ,
			'company_id' => $this->input->post('company_id'),
			'streetline2' => $this->input->post('streetline2') ,
			'zip' => $this->input->post('zip') ,
			'city' => $this->input->post('city') ,
			'telefon' => $this->input->post('telefon') ,
			'telefax' => $this->input->post('telefax') ,
			'mobile' => $this->input->post('mobile') ,
			'email' => $this->input->post('email') ,
			'website' => $this->input->post('website') ,
			'tags' => $this->input->post('tags') ,
			'description' => $this->input->post('description'),
			'billed' => $this->input->post('billed') ,
			'active' => $this->input->post('active')
		);
		
		return $this->db->insert('news', $data);
	}
	
}
?>