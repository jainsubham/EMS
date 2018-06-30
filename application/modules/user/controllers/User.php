<?php
class User extends CI_Controller
{
	function __construct() {
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('session');
		}
	
	public function index() {
		redirect('user/login');
	}

	public function company_reg(){
		$this->load->view('companyreg');
	}

	public function login(){
		if($this->session->userdata('logid') or $this->session->userdata('adminid')){
			redirect('dashboard');
		}
		$this->load->view('login');
	}

	public function verify(){
		$emailfield = $this->input->post('emailfield');
		$password = $this->input->post('passwordfield');
		if(!isset($emailfield) or !isset($password)){
			redirect('user/login');
		}

		$this->load->model('loginmodel');
		$passwordenc = md5($password);
		$userdata = $this->loginmodel->validate_login($emailfield,$passwordenc);
			$userid = $userdata->UserId;
			$accountlevel = $userdata->accountlevel;
			$emailverified = $userdata->emailverified;
			if($userid){
				
				if($accountlevel==0){
					$this->session->set_userdata('logid',$userid);
				}
				if($accountlevel==1){
					$this->session->set_userdata('admind',$userid);
				}
				if($emailverified==0){
					$this->session->set_userdata('emailunverified','1');
					redirect('dashboard/verify_mail');
				}
				else{
					redirect('dashboard');
				}
			}
			else{
				
				redirect('user/login');
			}
		

	}	

	public function comp_reg(){
		echo "Data submitted";
	}

	public function reg_user() {
		print_r("hello");
	}

}
?>