<?php
class User extends CI_Controller
{
	function __construct() {
			parent::__construct();

			$this->load->helper('form');
			$this->load->library('session');
			$this->load->model('loginmodel');
			$this->load->database();
			$this->load->library('form_validation');
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
					$this->session->set_userdata('adminid',$userid);
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
		$post = $this->input->post();
		if(!isset($post['pass1'])){
			redirect('user/company_reg');
		}else{
		if($post['pass1'] == $post['pass2']) {
				 	$this->form_validation->set_rules('companyname', 'Companyname', 'required');
				 	$this->form_validation->set_rules('address','Address','required');
				 	$this->form_validation->set_rules('website','Website','required');
				 	$this->form_validation->set_rules('mail','Email','required');
				 	$this->form_validation->set_rules('phoneno','Phone Number','required');
				 	$this->form_validation->set_rules('fname','First Name','required');
				 	$this->form_validation->set_rules('lname','Last Name','required');
				 	$this->form_validation->set_rules('contactno','Phone Number','required');
				 	$this->form_validation->set_rules('maill','Email','required');
				 	$this->form_validation->set_rules('gender', 'Gender','required');
					$this->form_validation->set_rules('pass1', 'Password', 'required');
					$this->form_validation->set_rules('pass2', 'Password Confirmation', 'required');
					if($this->form_validation->run()) {
						$encpass = md5($post['pass1']);
							if($this->loginmodel->comp_reg($post,$encpass)) {
									print_r("successfully");
							}

					}
					else {
						$this->load->view('user/companyreg');
					}
		}
		else {
			
			$this->load->view('user/companyreg');
		}
		}
	}

	public function reg_user() {
		print_r("hello");
	}

	public function logout(){
			$this->session->sess_destroy();

			redirect('user/login');

		}

}
?>