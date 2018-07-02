<?php

class Dashboard extends CI_Controller
{
	function __construct() {
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('session');
		}

	public function index() {
		if(null==($this->session->userdata('logid')) and null==($this->session->userdata('adminid'))){

				redirect('user/login');
			}
			/*$this->load->library('email');
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'mail.creativebuddies.co.in';
			$config['smtp_port'] = '587';
			$config['smtp_user'] = 'nd@creativebuddies.co.in';
			$config['smtp_pass'] = 'nd@creativebuddies';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);
			$this->email->from('nd@creativebuddies.co.in', 'creative Buddies');
			$this->email->to('123justdoitman@gmail.com');
			$this->email->subject('Testing the ci feature for mailing');
			$this->email->message('Hi , Narender Singh , Testing the ci feature for mailing
				fuck , thats awesome');
			if($this->email->send()){
				echo "email sent";
			}else{
				show_error($this->email->print_debugger());
			}*/




			    /*$config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'smtp.googlemail.com',
			  'smtp_port' => 587,
			  'smtp_user' => 'shubham3996@gmail.com', // change it to yours
			  'smtp_pass' => 'subham@@3996', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
			);

			        $message = 'jhbnbsdjhvnsm,v snb skjsvkscvs nlxcvnlsv snnvsd sdnvsv sdvjhsvsv dsvbnsv ,csvn,dc ,mscvn ,sfmnbkznb,mdnb kjzdfnb,nzdf,bnzdf,mb , dvndsvm bmnvbsvsn  jsbnkzchc hkzhx';
			        $this->load->library('email', $config);
			    $this->email->set_newline("\r\n");  
			      $this->email->set_newline("\r\n");
			      $this->email->from('123justdoitman@gmail.com'); // change it to yours
			      $this->email->to('subham3996@gmail.com');// change it to yours
			      $this->email->subject('Resume from JobsBvdghdsghsdghgfghgfhgfhuddy for your Job posting');
			      $this->email->message($message);
			      if($this->email->send())
			     {
			      echo 'Email sent.';
			     }
			     else
			    {
			     show_error($this->email->print_debugger());
			    }



*/

		$this->load->view('dashboard');

	}

	public function verify_mail(){
		/*if(null==($this->session->userdata('emailunverified'))){

				redirect('user/login');
			}*/

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

		if ( $this->upload->do_upload('csvfile')){
			$uploaddata = $this->upload->data();
			$filename = $uploaddata['file_name'];
			$link = base_url('assets/csv/'.$filename);
			$data = fopen($link,"r");
	


			while($dataa = fgetcsv($data,"1000",",")){
			echo "<pre>";
				print_r($dataa);
				echo "</pre>";
			}
			unlink('assets/csv/'.$filename);
						
		}else{
			$error = array('error' => $this->upload->display_errors());
			
			print_r($error);	
		}

	}
}
?>