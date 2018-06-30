<?php

class Dashboard extends CI_Controller
{
	function __construct() {
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('session');
		}

	public function index() {
		$this->load->view('dashboard');
	}

	public function verify_email(){
		echo "Please verify your email";
	}

}
?>