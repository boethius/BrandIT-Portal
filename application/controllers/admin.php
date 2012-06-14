<?php
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('companies_model');
	   $this->load->model('user_model','',TRUE);
	}

	public function index(){
		
		$this->load->library('form_validation');
		
		$data['output'] = "test {$this->session->userdata('logged_in')}";
		
		if($this->session->userdata('logged_in') == 1){
			$data['companies'] = $this->companies_model->get_companies();
			$data['title'] = 'Companies';
		
			$this->load->view('templates/header', $data);
			$this->load->view('companies/index', $data);
			$this->load->view('templates/footer');
		}
		else {
			
			$this->load->view('login/index', $data);
		
			//This method will have the credentials validation
		}
		
		
	}
		
	
	public function logout(){
		$this->session->set_userdata('logged_in',false);
     redirect('login', 'refresh');
	}


	public function view($company_id){
		$data['companies_item'] = $this->companies_model->get_companies($company_id);
	
		if (empty($data['companies_item']))
		{
			show_404();
		}
	
		$data['name'] = $data['companies_item']['name'];
	
		$this->load->view('templates/header', $data);
		$this->load->view('companies/view', $data);
		$this->load->view('templates/footer');
	}
	
	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		

		
		$data['title'] = 'Create a company';
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);	
			$this->load->view('companies/create');
			$this->load->view('templates/footer');
			
		}
		else
		{
			$this->companies_model->set_companies(0);
			$this->load->view('companies/success');
		}
	}
	
	public function edit($company_id){
	
		$data['companies_item'] = $this->companies_model->get_companies($company_id);
	
			if (empty($data['companies_item']))
			{
				show_404();
			}
		$data['company_id'] = $company_id;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Edit a company';
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);	
			$this->load->view('companies/edit', $data);
			$this->load->view('templates/footer');
			
		}
		else
		{
			$this->companies_model->set_companies($company_id);
			$this->load->view('companies/success');
		}
	}
	
	public function live($company_id, $live){
		//$question_id = $this->uri->segment(2);
		$data['output'] = "{$company_id} {$live}";
		$this->load->view('companies/success', $data);
		
		$this->companies_model->set_live($company_id, $live);
		
	}
	
	
	public function delete($company_id){
		
		$this->companies_model->del_companies($company_id);
		$data['output'] = "Deleted {$company_id}";
		$this->load->view('companies/success', $data);
	}
	

}




?>