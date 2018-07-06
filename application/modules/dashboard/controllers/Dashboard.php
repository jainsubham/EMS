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
		if(null==($this->session->userdata('logid')) and null==($this->session->userdata('adminid'))){

				redirect('user/login');
			}
			
			if(null!=($this->session->userdata('adminid'))){
				$this->load->view('admindashboard');
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
		if(null==($this->session->userdata('emailunverified'))){

				redirect('user/login');
			}

		$this->load->view('verify_mail');
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
		$this->load->view('EmpDetails');
	}
	public function designations(){
		$adminid = $this->session->userdata('adminid');
		$companyid = $this->dashboardmodel->get_companyid($adminid);
		if($q = $this->dashboardmodel->get_designations_list($companyid)){
			$data['q'] = $q;
			$data['companyid'] =$companyid;
			$this->load->view('designations_form',$data);
		}
		
	}
	public function add_designation(){
		$designation = $this->input->post('designation');
		if(isset($designation)){
			$companyid = $this->input->post('companyid');
			$this->dashboardmodel->add_designation($designation,$companyid);
			
			redirect('dashboard/designations');
		}
		redirect('dashboard/designations');
	}

}
?>