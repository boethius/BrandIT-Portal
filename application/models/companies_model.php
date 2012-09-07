<?php
class Companies_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_portal(){

		$this->load->helper('domains');

		//$this->db->where()
		//$this->db->like('name',$query);
		//$this->db->or_like('tags',$query);
		$sql = "SELECT
					*
				FROM
					portals
				WHERE
					portal_id = ?";

		//$query = $this->db->get_where('companies', array("portal_id" => get_portal_id()));
		$query = $this->db->query($sql, array(get_portal_id()));
		return $query->row_array();

	}

	public function get_companies($company_id = FALSE)
	{

		$this->load->helper('domains');


		if ($company_id === FALSE)
		{
			//$query = $this->db->get('companies');
			//$this->db->order_by("name","random");
			//$query = $this->db->get_where('companies', array('active' => 1, "portal_id" => get_portal_id()));

			$sql = "SELECT
						*
					FROM
						companies
					WHERE
						portal_id = ?
					AND
						active = 1
					ORDER BY rand()";

			//$query = $this->db->get_where('companies', array("portal_id" => get_portal_id()));
			$query = $this->db->query($sql, array(get_portal_id()));
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
		$this->load->helper('domains');


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
			'region' => $this->input->post('region') ,
			'tags' => $this->input->post('tags') ,
			'lat' => $this->input->post('lat') ,
			'long	' => $this->input->post('long') ,
			'description' => $this->input->post('description'),
			'portal_id' => get_portal_id(),
			'billed' => 0,
			'active' => 0
		);



		/*

		,
			'active' => $this->input->post('active')

			*/
		if($company_id == 0){


			/*
$portal = get_portal_property();
			$this->load->library('email');

			$this->email->from('info@'.get_domain(), $portal['name']);
			$this->email->to('sb@toweb.ch');

			$this->email->subject('Email Test');
			$this->email->message('Testing the email class.');

			$this->email->send();
*/

			return $this->db->insert('companies', $data);
		}
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