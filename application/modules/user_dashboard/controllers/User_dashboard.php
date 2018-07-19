<?php

	class User_dashboard extends CI_Controller
	{
		function __construct() {
				parent::__construct();
				$this->load->helper(array('form','url'));
				$this->load->library(array('session','form_validation'));
				$this->load->database();
				$this->load->model('userdashboardmodel');
		}
		public function index() {
			if(null!=($this->session->userdata('logid'))){
				$user_id = $this->session->userdata('logid');

				if($user_name = $this->userdashboardmodel->get_user_name($user_id)){
					$employee_id = $this->userdashboardmodel->get_employee_id($user_id);
					$data['user_name'] = $user_name;
					$week['0']['date'] = date('Y-m-d');
					$week['0']['day'] = date('l',strtotime($week['0']['date']));
					$week['0']['display_date'] = date('(d M)',strtotime($week['0']['date']));
					if($q = $this->userdashboardmodel->get_attendance_record($employee_id,$week['0']['date'])){
						$temp_check_in = strtotime($q->check_in);
						$temp_check_out = strtotime($q->check_out);
						$week['0']['time'] = round(($temp_check_out-$temp_check_in)/3600);
					}else{
						$week['0']['time'] = 0;
					}
					for($i=1;$i<=6;$i++){
						$week[$i]['date'] = date('Y-m-d',strtotime("-$i days"));
						$week[$i]['day'] = date('l',strtotime($week[$i]['date']));
						$week[$i]['display_date'] = date('(d M)',strtotime($week[$i]['date']));
						if($q = $this->userdashboardmodel->get_attendance_record($employee_id,$week[$i]['date'])){
							$temp_check_in = strtotime($q->check_in);
							$temp_check_out = strtotime($q->check_out);
							$week[$i]['time'] = round(($temp_check_out-$temp_check_in)/3600);
						}else{
							$week[$i]['time'] = 0;
						}
					}
					$data['attendance_record'] = $week;
					$this->load->view('user_header');
					$this->load->view('user_dashboard',$data);
				}
			}else{
				redirect('user/login');
			}
		}
		public function switch_admin() {
			if (null!=($this->session->userdata('logid'))) {
				$user_id = $this->session->userdata('logid');
				$this->session->set_userdata('adminid',$user_id);
				$this->session->unset_userdata('switched');
				$this->session->unset_userdata('logid');
				redirect('dashboard');
			}
			else {
				redirect('user/login');
			}
		}
		public function apply_leave() {
			$user_id = $this->session->userdata('logid');
			$company_id = $this->userdashboardmodel->get_company_id($user_id);
			if($q = $this->userdashboardmodel->get_category_list($company_id)){
				$x = array();
				$x['0" disabled="disabled'] = '--------Select Leave Category -------';
				foreach ($q as $leave) {
					$x[$leave->id] = $leave->category_name; 
				}
				$leave = $x;
			}
			$data['company_id'] =$company_id;
			if(isset($leave)){
				$data['leave'] = $leave;
			}
			$this->load->view('apply_leave',$data);
		}
		public function leave_data() {
			$post = $this->input->post();
			$this->form_validation->set_rules('leave','Leave','required');
			$this->form_validation->set_rules('start','From','required');
			$this->form_validation->set_rules('end','To','required');
			if($this->form_validation->run()) {
				$user_id = $this->session->userdata('logid');
				$data = array(
					'leave_category'=> $post['leave'],
					'start_date'    => $post['start'],
					'end_date'      => $post['end'],
					'reason'        => $post['reason'],
					'half_day'      => $post['radio'],
					'user_id'       => $user_id
				);
				if($this->userdashboardmodel->leave_data($data)) {
					redirect('user_dashboard');
				}
				else {
				redirect('user_dashboard/apply_leave');
			}

			}
			else {
				redirect('user_dashboard/apply_leave');
			}

		}


	}
?>