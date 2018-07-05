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
		$adminid = $this->session->userdata('adminid');
		$companyid = $this->profile->get_companyid($adminid);
		$data['companyname'] = $this->profile->get_companyname($companyid);
		$data['Email'] = $this->profile->get_adminemail($adminid);
		$data['x']  = $this->profile->select($adminid);
		$this->load->view('displayprofile',$data);
	}
	public function editprofile() {
		$adminid = $this->session->userdata('adminid');
		$companyid = $this->profile->get_companyid($adminid);
		$data['companyname'] = $this->profile->get_companyname($companyid);
		$data['Email'] = $this->profile->get_adminemail($adminid);
		$data['x']  = $this->profile->select($adminid);
		$this->load->view('editprofile',$data);
	}
	public function updateprofile() {

		 $post  = $this->input->post();
		 $id = $post['adminid'];
		 $Email = $post['email'];
		 unset($post['email']);
		 unset($post['adminid']);
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
						//$x = $post['img'];
						//die();
						   $img  = $this->img_upload();
						$data = array(
								'FirstName' => $post['fname'],
								'LastName' => $post['lname'],
								'ContactNo' => $post['contact'],
								'BloodGroup' => $post['blood'],
								'Disability' => $post['dis'],
								'Dob' => $post['dob'],
								'MartailStatus' => $post['MartailStatus'],
								'Gender' => $post['gender'],
								'Address1' => $post['add1'],
								'Address2' => $post['add2'],
								'City' => $post['city'],
								'State' => $post['state'],
								'PinCode' => $post['pin'],
								'PAN' => $post['pan'],
								'AadharNO' => $post['aadhar'],
								'FatherName' => $post['pname'],
								'ParentsSeniority' => $post['ps'],
								'ParentsDisability' => $post['pd'],
								'children' => $post['children'],
								'Hostelerchildren' => $post['hc'],
								'img' => $img
			 					);

						if($this->profile->update($id,$data,$Email)) {

							print_r("okkkkkkkk");
						}
					}
					else {
						redirect('profile/editprofile');
					}





	}

	public function img_upload(){
		$config['upload_path']          = './assets/img/user/';
		$config['allowed_types']        = 'jpg|png|gif|jpeg';
		$config['max_size']             = 10000;

		$this->load->library('upload', $config);
		if($this->upload->do_upload('img')){


			$uploaddata = $this->upload->data();
			$filename = $uploaddata['file_name'];
			return  $filename;
			}
			else{
			$error = array('error' => $this->upload->display_errors());
			
			print_r($error);	
		}
	}

}

?>