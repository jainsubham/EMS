<?php
class User extends CI_Controller
{
	function __construct() {
			parent::__construct();

			$this->load->helper('form');
			$this->load->library('session');
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
		if($this->session->userdata('logid') or $this->session->userdata('adminid')){
			redirect('dashboard');
		}
		$this->load->view('login');
	}

	public function verify_login(){
		$emailfield = $this->input->post('emailfield');
		$password = $this->input->post('passwordfield');
		if(!isset($emailfield) or !isset($password)){
			redirect('user/login');
		}


		$this->load->model('loginmodel');
		$passwordenc = md5($password);
		$userdata = $this->loginmodel->validate_login($emailfield,$passwordenc);
			$userid = $userdata->UserId;
			$accountlevel = $userdata->accountlevel;
			$emailverified = $userdata->emailverified;
			if($userid){
				
				if($accountlevel==0){
					$this->session->set_userdata('logid',$userid);
				}
				if($accountlevel==1){
					$this->session->set_userdata('adminid',$userid);
				}
				if($emailverified==0){
					$this->session->set_userdata('emailunverified','1');
					redirect('dashboard/verify_mail');
				}
				else{	
					redirect('dashboard');
				}
			}
			else{
				
				redirect('user/login');
			}
		

	}	

	public function init_mail(){
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'subham3996@gmail.com',
		    'smtp_pass' => 'subham@@3996',
		    'charset'   => 'utf-8',
		    'mailtype'  => 'html',
		    'starttls'  => true,
		    'newline'   => "\r\n"
		);
		$this->load->library('email', $config);
	}


	public function sendmail($subject , $msgbody , $emailto){
		
			        $message = '<!DOCTYPE html>
			        <html>
			        <head>
			        	<title>Email</title>
			        </head>
			        <body>
			        '.$msgbody.'
			        </body>
			        </html>';
			    
			      $this->email->from('EMS'); 
			      $this->email->to($emailto);
			      $this->email->subject($subject);
			      $this->email->message($message);
			      if($this->email->send())
			     {
			      $datareturn = 'Sent';
			     }
			     else
			    {
			    $datareturn = show_error($this->email->print_debugger());
			    }
			    return $datareturn;

	}

	public function send_verification_mail($name,$emailto,$mail_hash){
		$subject = "Verify Your Account";
		$msgbody = "<h2>Hi ".$name." , Welcome to EMS </h2><br> Verify your Ems account by clicking the following link : <br> <a href='".base_url('user/verify/').$mail_hash."'>Verify Your Account</a><br>Warm regards ,<br> Team EMS";
		$this->init_mail();
		$this->sendmail($subject,$msgbody,$emailto);
	}

	public function comp_reg(){
		$post = $this->input->post();
		if(!isset($post['pass1'])){
			redirect('user/company_reg');
		}else{
		if($post['pass1'] == $post['pass2']) {
				 	$this->form_validation->set_rules('companyname', 'Companyname', 'required');
				 	$this->form_validation->set_rules('address','Address','required');
				 	$this->form_validation->set_rules('website','Website','required');
				 	$this->form_validation->set_rules('mail','Email','required');
				 	$this->form_validation->set_rules('phoneno','Phone Number','required');
				 	$this->form_validation->set_rules('fname','First Name','required');
				 	$this->form_validation->set_rules('lname','Last Name','required');
				 	$this->form_validation->set_rules('contactno','Phone Number','required');
				 	$this->form_validation->set_rules('maill','Email','required');
				 	$this->form_validation->set_rules('gender', 'Gender','required');
					$this->form_validation->set_rules('pass1', 'Password', 'required');
					$this->form_validation->set_rules('pass2', 'Password Confirmation', 'required');
					if($this->form_validation->run()) {
						$encpass = md5($post['pass1']);
							if($mail_hash = $this->loginmodel->comp_reg($post,$encpass)) {
									$name = $post['fname'];
									$emailto = $post['maill'];
									$this->send_verification_mail($name,$emailto,$mail_hash);
									$this->session->set_userdata('emailunverified','1');
									redirect('dashboard/verify_mail');
									
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
	}



	public function logout(){
			$this->session->sess_destroy();

			redirect('user/login');

		}
	public function reg() {
		$this->load->library('uri');

		if ($this->uri->segment(1) === FALSE){
        	$hash = 0;
		}
		else{
        	$hash = $this->uri->segment(3);
		}
		if($hash!=NULL){
			if($dbdata = $this->loginmodel->verify_invite_hash($hash)){
				if($dbdata->used==0){
				$data['emailid'] = $dbdata->emailid;
				$data['companyid'] = $dbdata->companyid;
				$data['hash'] = $dbdata->hash;
				$this->load->view('user/userreg',$data);

				}else{
					redirect('user/invalid_invite');	
				}

			}else{
				redirect('user/invalid_invite');
			}
		}else{
			redirect('user/invalid_invite');
		}

		
	}

	
	public function reg_user() {

		$post = $this->input->post();
		if(!isset($post['fname'])){
			redirect('user/reg/');
		}
		if($post['hidemail']!=$post['email']){
			redirect('user/invalid_email');
		}
		$data = array(
			'FirstName' => $post['fname'],
			'LastName' => $post['lname'],
			'ContactNo' => $post['phone'],
			'BloodGroup' => $post['blood'],
			'Disability' => $post['Disability'],
			'Dob' => $post['dob'],
			'MartailStatus' => $post['MartailStatus'],
			'Gender' => $post['gender'],
			'Address1' => $post['address1'],
			'Address2' => $post['address2'],
			'City' => $post['city'],
			'State' => $post['state'],
			'PinCode' => $post['pin'],
			'PAN' => $post['pan'],
			'AadharNO' => $post['aadhar'],
			'FatherName' => $post['pname'],
			'ParentsSeniority' => $post['parents'],
			'ParentsDisability' => $post['PDisability'],
			'children' => $post['Children'],
			'Hostelerchildren' => $post['Hchildren'],
			 );
			$Email = $post['email'];
			$password = $post['password'];
			$encpass = md5($password);
			$companyid = $post['hidcompid'];
			$hashed = $post['hidhash'];

		if($mail_hash = $this->loginmodel->user_reg($data,$Email,$encpass,$companyid,$hashed)) {
			$emailto = $Email;
			$name =$post['fname'];
			$this->send_verification_mail($name,$emailto,$mail_hash);
			$this->session->set_userdata('emailunverified','1');
			redirect('dashboard/verify_mail');
		}


	}

	public function invalid_invite(){
		$this->load->view('invalid_invite');
	}

	public function email_verified(){
		$this->load->view('email_verified');
	}

	public function invalid_email(){
		$this->load->view('invalid_email');
	}


	public function invalid_verification(){
		$this->load->view('invalid_verification_link');
	}

	public function verify(){
		$this->load->library('uri');

		if ($this->uri->segment(1) === FALSE){
        	$hash = 0;
		}
		else{
        	$hash = $this->uri->segment(3);
		}
		if($hash!=NULL){
			if($this->loginmodel->account_email_verify($hash)){
				$this->session->sess_destroy();
				$this->load->view('email_verified');
			}


		}else{
			redirect('user/invalid_verification');
		}
		redirect('user/invalid_verification');
	}

}
?>