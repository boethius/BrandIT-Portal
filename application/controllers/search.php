<?php
class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('search_model');
	}
	
	
	
	public function index($query = ""){
		$data['search_results'] = $this->search_model->search_companies($query);
		
		$this->load->view('search/index.php', $data);
		
	}
	

}
?>