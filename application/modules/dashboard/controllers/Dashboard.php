<?php

class Dashboard extends CI_Controller
{
	function __construct() {
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('session');
		}

	public function index() {
		if(null==($this->session->userdata('logid')) and null==($this->session->userdata('adminid'))){

				redirect('user/login');
			}
		$this->load->view('dashboard');
	}

	public function verify_mail(){
		$this->load->view('verify_mail');
	}

	public function invite(){
		$this->load->view('email_invite');
	}

}
?>