<?php

class Profile extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Profilemodel','profile');

	}
	public function adminprofile() {
		$this->profile->select();
		$this->load->view('profile/adminprofile');
	}
}
?>