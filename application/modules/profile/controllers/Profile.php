<?php

class Profile extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Profilemodel','profile');
		$this->load->database();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form','url'));

	}
	public function displayprofile() {
		$q = $this->session->userdata('adminid');
		//print_r($q); die();
		$data  = $this->profile->select($q);
		$this->load->view('profile/displayprofile',['x' =>$data]);
	}
	public function editprofile() {
		$q = $this->session->userdata('adminid');
		//print_r($q); die();
		$data  = $this->profile->select($q);
		$this->load->view('profile/editprofile',['x' =>$data]);
	}
	public function updateprofile() {

		 $post  = $this->input->post();
					$this->form_validation->set_rules('contact','Address','required');
				 	$this->form_validation->set_rules('email','Email','required');
				 	$this->form_validation->set_rules('fname','First Name','required');
				 	$this->form_validation->set_rules('lname','Last Name','required');
				 	$this->form_validation->set_rules('add1','Address','required');
				 	$this->form_validation->set_rules('add2','Address','required');
				 	$this->form_validation->set_rules('city','City','required');
				 	$this->form_validation->set_rules('state', 'State','required');
					$this->form_validation->set_rules('pin', 'PinCode', 'required');
					$this->form_validation->set_rules('blood', 'BloodGroup', 'required');
				 	$this->form_validation->set_rules('gender','Gender','required');
				 	$this->form_validation->set_rules('MartailStatus','MartailStatus','required');
				 	$this->form_validation->set_rules('dob','DOB','required');
				 	$this->form_validation->set_rules('dis','Disability','required');
				 	$this->form_validation->set_rules('pan','PanNumber','required');
				 	$this->form_validation->set_rules('aadhar','AadharNumber','required');
				 	$this->form_validation->set_rules('pname','FatherName','required');
				 	$this->form_validation->set_rules('ps','ParentsSeniority','required');
				 	$this->form_validation->set_rules('pd','ParentsDisability','required');
				 	$this->form_validation->set_rules('children','Children','required');
				 	$this->form_validation->set_rules('hc','HostelerChildren','required');
				 	$this->form_validation->set_rules('submit','Submit','required');
					if($this->form_validation->run()) {
						$this->profile->update($post);
					}
					else {
						redirect('profile/editprofile');
					}





	}

}
?>