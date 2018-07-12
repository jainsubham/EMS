<?php

	class User_dashboard extends CI_Controller
	{
		function __construct() {
				parent::__construct();
				$this->load->helper('form');
				$this->load->library('session');
				$this->load->database();
				//$this->load->model('dashboardmodel');
		}

		public function index() {
			if(null!=($this->session->userdata('logid'))){
				$this->load->view('user_dashboard');
			}else{
				redirect('user/login');
			}
	}

	}
?>