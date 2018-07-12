<?php

class Dashboard extends CI_Controller
{
	function __construct() {
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('session');
			$this->load->database();
			$this->load->model('dashboardmodel');
		}

	public function index() {
			if(null!=($this->session->userdata('adminid'))){
				$this->load->view('admindashboard');
			}else{
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

	public function verify_mail(){
		if($this->session->userdata('emailunverified')==1){

				$this->load->view('verify_mail');
			}else{
				redirect('user/login');
			}

		
	}

	public function invite(){
		
		$this->load->view('email_invite');
	}

	public function do_upload(){
		$config['upload_path']          = './assets/csv/';
		$config['allowed_types']        = 'csv';
		$config['max_size']             = 100;

		$this->load->library('upload', $config);
		$adminid = $this->session->userdata('adminid');

		$companyid = $this->dashboardmodel->get_companyid($adminid);		
		if ( $this->upload->do_upload('csvfile')){
			$uploaddata = $this->upload->data();
			$filename = $uploaddata['file_name'];
			$link = base_url('assets/csv/'.$filename);
			$data = fopen($link,"r");
			
			$subject = "EMS Account Invitation";
			$name = '';	
			$companyname = $this->dashboardmodel->get_companyname($companyid);
			$weblink = base_url('');
			$invitelin=  base_url('user/reg');

			$part1 = "<div> Hello ";
			$part2 = " ,<br><br>
			 You have been invited by ".$companyname." to create your account on EMS .<br>
			Please create your account on EMS by clicking on the following link : <br>
			<a href='";
			$part3 = "'> Accept Invitation </a>.<br>
			If you have any questions , please contact us on ".$weblink."
			<br> Regards ,<br>EMS Team
			</div>";		
			

			while($dataa = fgetcsv($data,"1000",",")){

			$name = $dataa['0'];
			$emailto = $dataa['1'];
			$tobehashed = $companyid.$emailto;
			$hash = md5($tobehashed);
			$invitelink = $invitelin."/".$hash;
			
			$msgbody = $part1.$name.$part2.$invitelink.$part3;
			

			$this->init_mail();
			$this->sendmail($subject , $msgbody , $emailto);

			if($this->dashboardmodel->send_invite($emailto,$companyid,$hash)){
				echo $name." is invited"."<br>";
			}


			}
			unlink('assets/csv/'.$filename);
						
		}else{
			$error = array('error' => $this->upload->display_errors());
			
			print_r($error);	
		}

	}
	
	public function attendance() {
		$this->load->view('attendance');
	}
	public function announcement() {
		$this->load->view('announcement');
	}
	public function organization() {
		$this->load->view('organization');
	}
	public function EmpDetails() {
		$userid = $this->session->userdata('adminid');
		$compid = $this->dashboardmodel->get_companyid($userid);
		$q		=  $this->dashboardmodel->get_userid($compid);
		foreach ($q as $row) {
			 $uid  = $row->id;
			if($z = $this->dashboardmodel->empdetails($uid)){
			 $data[]= $z;
			}
		}
		$view['data'] = $data;
		$this->load->view('EmpDetails',$view);
	}

	public function designations(){
		$adminid = $this->session->userdata('adminid');
		$companyid = $this->dashboardmodel->get_companyid($adminid);
		$companyid = $this->dashboardmodel->get_companyid($adminid);	
		if($q = $this->dashboardmodel->get_designations_list($companyid)){
			$data['q'] = $q;
			
		}else{
			$data['data'] = "No designations are registered till now . Kindly add a new designation for your organization";
		}
		if($q = $this->dashboardmodel->get_team_list($companyid)){
			$x = array();
			$x['0" disabled="disabled'] = '--------Select Team -------';
			foreach ($q as $team) {
				$x[$team->id] = $team->name; 
			}
			$teams = $x;
		}
		$data['companyid'] =$companyid;
		if(isset($teams)){
			$data['teams'] = $teams;
		}else{
			$data['msg'] = "There are not teams registered till now .<br>To add new designations , you need to add a new team/s <br><a href='".base_url('dashboard/teams')."'> Add new team </a>";
		}
			$this->load->view('designations_form',$data);
		
	}

	public function add_designation(){
		$designation = $this->input->post('designation');
		$team = $this->input->post('team');
		if(isset($designation) and $team!=0){
			$companyid = $this->input->post('company_id');
			$this->dashboardmodel->add_designation($designation,$companyid,$team);
			
			redirect('dashboard/designations');
		}
		redirect('dashboard/designations');
	}

	public function displayempdetails() {
		$user_id = $this->input->post('user_id');
		$admin_id  = $this->session->userdata('adminid');
		$company_id = $this->dashboardmodel->get_companyid($admin_id);
		$company_name = $this->dashboardmodel->get_companyname($company_id);
		$q  =  $this->dashboardmodel->fetchdata($user_id);
		if ($q) {
			$x['joining_date'] = $q->joining_date;
			$x['employee_id'] = $q->employee_id;
			$x['confirmation_date'] = $q->confirmation_date;
			$x['effective_from'] = $q->effective_from;
			$x['effective_to'] = $q->effective_to;
			$data['x']=$x;

			$data['company_name'] = $companyname;
			$this->load->view('displayempdetails',$data);
		}
		else {
			
				 $q['employee_id'] = 'NULL';
				 $q['joining_date'] = 'NULL';
				 $q['confirmation_date'] = 'NULL';
				 $q['effective_from'] = 'NULL';
				 $q['effective_to'] = 'NULL';
			$data['x'] = $q;
			$data['company_name'] = $company_name;
			//print_r($data);
			//die();
			$this->load->view('displayempdetails',$data);

		}	

	}
	public function display() {
		print_r("helllo");
	}
	public function teams(){
		$adminid = $this->session->userdata('adminid');
		$companyid = $this->dashboardmodel->get_companyid($adminid);
		if($q = $this->dashboardmodel->get_team_list($companyid)){
			$data['q'] = $q;
			
		}else{
			$data['data'] = "No teams/departments are registered till now . Kindly add a new team/department for your organization";
		}
		$data['companyid'] =$companyid;
			$this->load->view('team_form',$data);
		
	}

	public function add_team(){
		$team = $this->input->post('team');
		if(isset($team)){
			$companyid = $this->input->post('company_id');
			$this->dashboardmodel->add_team($team,$companyid);
			
			redirect('dashboard/teams');
		}
		redirect('dashboard/teams');

	}

}
?>