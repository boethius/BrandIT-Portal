<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user_model','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
		
		$data['output'] = "test {$this->session->userdata('logged_in')}";
     //Field validation failed.&nbsp; User redirected to login page
     $this->load->view('login/index',$data);
   }
   else
   {
     //Go to private area
     //$this->load->view('companies/index');
     redirect('admin', 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user_model->login($username, $password);

   //$this->load->library('session');
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', true);
       $this->session->set_userdata('logged_user', $sess_array);
     }
     return TRUE;
   }
   else
   {
       $this->session->set_userdata('logged_in', false);
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>
