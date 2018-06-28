<?php
class User extends CI_Controller
{
	function __construct() {
			parent::__construct();
			$this->load->helper('form');
		}
	
	public function index() {
		redirect('user/login');
	}

	public function company_reg(){
		$this->load->view('companyreg');
	}

	public function login(){
		$this->load->view('login');
	}

	public function verify(){
		$emailfield = $this->input->post('emailfield');
		$password = $this->input->post('passwordfield');
		if(!isset($emailfield) or !isset($password)){
			redirect('user/login');
		}

		$this->load->model('loginmodel');

		$userdata = $this->loginmodel->validate_login($emailfield,$password);
			$userid = $userdata->UserId;
			$accountlevel = $userdata->accountlevel;
			if($userid){
				$this->load->library('session');
				if($accountlevel==0){
					$this->session->set_userdata('logid',$userid);
				}
				else{
					$this->session->set_userdata('admid',$userid);
				}
				redirect('dashboard');
			}
			else{
				
				redirect('user/login');
			}
		

	}	

}
?>