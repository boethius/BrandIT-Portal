<?php
class Companies extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('companies_model');
		$this->load->model('region_model');
		$this->load->model('i18n_model');
	}

	public function index()
	{
		$data['companies'] = $this->companies_model->get_companies();
		$data['portal'] = $this->companies_model->get_portal();
		$data['regions'] = $this->region_model->get_regions();
		$data['i18n'] = $this->i18n_model;;
		$data['title'] = 'Companies';
	
		
	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/custom.css.php',$data);
		$this->load->view('templates/search');
		$this->load->view('companies/index', $data);
		$this->load->view('templates/footer');
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
		

		
		$data['portal'] = $this->companies_model->get_portal();
		$data['title'] = $this->i18n_model->get_value('createcompany');
		$data['regions'] = $this->region_model->get_regions();
		$data['i18n'] = $this->i18n_model;
		
		//This is the Form Validation 
		//it checks the fields for xxs, e-mail validation ect.
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
		$this->form_validation->set_rules('streetline1', 'Streetline1', 'required|xss_clean');
		$this->form_validation->set_rules('streetline2', 'Streetline2', 'xss_clean');
		$this->form_validation->set_rules('zip', 'Zip', 'required|xss_clean');
		$this->form_validation->set_rules('city', 'City', 'required|xss_clean');
		$this->form_validation->set_rules('telefon', 'Telefon', 'required|xss_clean|numeric');
		$this->form_validation->set_rules('region', 'Region', 'required|xss_clean|numeric');
		$this->form_validation->set_rules('telefax', 'Telefax', 'xss_clean|numeric');
		$this->form_validation->set_rules('mobile', 'Mobile', 'xss_clean|numeric');
		$this->form_validation->set_rules('website', 'Website', 'xss_clean|prep_url');
		$this->form_validation->set_rules('tags', 'Tags', 'required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'required|xss_clean');
		
		
		

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);	
			$this->load->view('templates/custom.css.php',$data);
			$this->load->view('templates/pagehead');
			$this->load->view('companies/create', $data);
			$this->load->view('templates/footer');
			
		}
		else {
			$this->companies_model->set_companies(0);
			$this->load->view('templates/header', $data);	
			$this->load->view('templates/custom.css.php',$data);
			$this->load->view('templates/pagehead');
			$this->load->view('companies/success');
			$this->load->view('templates/footer');
		}

	}
	/*
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
	
*/
}




?>