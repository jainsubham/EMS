<?php 

class MY_Controller extends CI_Controller
{
	function __construct() {
			parent::__construct();
			$this->load->helper(array('form','url'));
			$this->load->library(array('session','form_validation'));
			$this->load->database();
	}
	public function index() {
		if(null!=($this->session->userdata('logid')))
		{
			$this->load->view('user_dashboard');
		}
		else {

			redirect('user/login');
		}
	}
}



 ?>