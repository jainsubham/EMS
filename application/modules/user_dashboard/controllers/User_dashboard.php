<?php

	class User_dashboard extends CI_Controller
	{
		function __construct() {
				parent::__construct();
				$this->load->helper('form');
				$this->load->library('session');
				$this->load->database();
				$this->load->model('userdashboardmodel');
		}

		public function index() {
			if(null!=($this->session->userdata('logid'))){
				$userid = $this->session->userdata('logid');

				if($user_name = $this->userdashboardmodel->get_user_name($userid)){
					$data['user_name'] = $user_name;
					$this->load->view('user_header');
					$this->load->view('user_dashboard',$data);
				}
			}else{
				redirect('user/login');
			}
	}

	}
?>