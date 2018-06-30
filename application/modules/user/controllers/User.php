<?php
class User extends CI_Controller
{
	function __construct() {
			parent::__construct();
			$this->load->helper(array('form','url'));
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
		$this->load->view('login');
	}

	public function verify(){
		$emailfield = $this->input->post('emailfield');
		$password = $this->input->post('passwordfield');
		if(!isset($emailfield) or !isset($password)){
			redirect('user/login');
		}


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

	public function comp_reg(){
		$post = $this->input->post();
		//	print_r($post['pass1']);die();
		if($post['pass1'] == $post['pass2']) {
				 	$this->form_validation->set_rules('companyname', 'Companyname', 'required');
				 	$this->form_validation->set_rules('address','Address','required');
				 	$this->form_validation->set_rules('website','Website','required');
				 	$this->form_validation->set_rules('mail','Email','required');
				 	$this->form_validation->set_rules('phoneno','Phone Number','required');
				 	$this->form_validation->set_rules('fname','First Name','required');
				 	$this->form_validation->set_rules('lname','Lirst Name','required');
				 	$this->form_validation->set_rules('gender', 'Gender','required');
					$this->form_validation->set_rules('pass1', 'Password', 'required');
					$this->form_validation->set_rules('pass2', 'Password Confirmation', 'required');
					if($this->form_validation->run()) {
							if($this->loginmodel->comp_reg($post)) {
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
	public function userprofile() {
		$this->load->view('userprofile');
	}
	public function reg_user() {
		print_r("hello");
	}

}
?>