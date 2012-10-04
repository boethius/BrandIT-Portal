<?php
class Admin_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	
	public function get_companies($company_id = FALSE)
	{
	
		$this->load->helper('domains');

		
		if ($company_id === FALSE)
		{
			//$query = $this->db->get('companies');
			$query = $this->db->get_where('companies', array("portal_id" => get_portal_id()));
			return $query->result_array();
		}
		
		$query = $this->db->get_where('companies', array('company_id' => $company_id));
		return $query->row_array();
	}
	
	/* EDIT $company_id */
	
	public function set_companies($company_id)
	{
		log_message('debug', "company_id {$company_id}");
		$this->load->helper('url');
		$this->load->helper('domains');
		$this->load->library('image_lib');
		$this->load->model('file_model');
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '0';
		$this->load->library('upload', $config);
		
		if( $this->upload->data()!= "" && ! $this->upload->do_upload())
		{
			
			
			$data["error"] = array('error' => $this->upload->display_errors());
			print_r($data['error']);
			$filename = "";
			echo "no data in $filename";
		}
		else
		{
			
			//Loding the Uploaded Image into $data
			$data["image"] = $this->upload->data();
			
			//extracting various information out of the $data
			$imagetype = $data['image']['image_type'];
			$filename = $data['image']['file_name'];
			$filetype= $data['image']['file_type'];
			$image_widht = $data['image']['image_width'];
			$image_height = $data['image']['image_height'];
			
			//tearing the string appart
			$data_type = explode("/", $filetype);
			
			$datatype = $data_type[0];
			
			$data['error'] = $this->file_model->resizeImage($datatype ,$filename,$image_widht, $image_height);
		}
		
		if( $filename != ""){
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
			'long ' => $this->input->post('long') ,
			'description' => $this->input->post('description'),
			'billed' => $this->input->post('billed'), 
			'portal_id' => get_portal_id(),
			'active' => $this->input->post('active') == 1 ? 1 : 0,
			'thumb' => $filename
		);
			echo "Into DB";
		}else{
			
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
			'long ' => $this->input->post('long') ,
			'description' => $this->input->post('description'),
			'billed' => $this->input->post('billed'), 
			'portal_id' => get_portal_id(),
			'active' => $this->input->post('active') == 1 ? 1 : 0
		);
			echo "not into db";
		}
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