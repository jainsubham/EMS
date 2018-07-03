<?php

class Profile extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

	}
	public function adminprofile() {
		$this->load->view('profile/adminprofile');
	}
}
?>