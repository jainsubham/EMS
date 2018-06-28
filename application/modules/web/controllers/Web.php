<?php

	class Web extends CI_Controller{
		function __construct() {
			parent::__construct();
			$this->load->helper('url');
			header('Access-Control-Allow-Origin: *');


		}

		public function index(){
			$this->load->view('web_view');
		}

		public function contact(){
			$this->load->view('contact');
		}

		public function about(){
			$this->load->view('about');
		}

		public function faq(){
			$this->load->view('faq');
		}

		public function  terms(){
			$this->load->view('terms');
		}

	}

?>