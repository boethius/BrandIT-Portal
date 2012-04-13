<?php
class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('companies_model');
	}

	public function index()
	{
		$data['companies'] = $this->companies_model->get_companies();
		$data['title'] = 'News archive';
	
		$this->load->view('templates/header', $data);
		$this->load->view('companies/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($company_id)
	{
		$data['companies_item'] = $this->companies_model->get_companies($company_id);
	
		if (empty($data['companies_item']))
		{
			show_404();
		}
	
		$data['title'] = $data['companies_item']['title'];
	
		$this->load->view('templates/header', $data);
		$this->load->view('companies/view', $data);
		$this->load->view('templates/footer');
	}
	
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Create a company';
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);	
			$this->load->view('companies/create');
			$this->load->view('templates/footer');
			
		}
		else
		{
			$this->companies_model->set_companies();
			$this->load->view('companies/success');
		}
	}

	
}




?>