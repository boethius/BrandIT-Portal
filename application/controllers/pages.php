<?php

class Pages extends CI_Controller {

	public function view($page = 'home')
	{
				
		if ( ! file_exists('/home/httpd/vhosts/portalseite.ch/httpdocs/application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			echo 'boh';
			//show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	
	}
}
?>