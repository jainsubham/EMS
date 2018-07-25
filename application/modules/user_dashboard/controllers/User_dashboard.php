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
					$data['user_name'] = $user_name;
					$week['0']['date'] = date('Y-m-d');
					$week['0']['day'] = date('l',strtotime($week['0']['date']));
					$week['0']['display_date'] = date('(d M)',strtotime($week['0']['date']));
					if($q = $this->userdashboardmodel->get_attendance_record($user_id,$week['0']['date'])){
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
						if($q = $this->userdashboardmodel->get_attendance_record($user_id,$week[$i]['date'])){
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
		public function leave() {
			if (null!=($this->session->userdata('logid'))) {
				$user_id = $this->session->userdata('logid');
				$this->load->library('pagination');
				$config = array(
					'base_url' => 'http://localhost/ems/user_dashboard/leave/',
					'per_page' => '10',
					'total_rows' => $this->userdashboardmodel->num_row(),
					'full_tag_open' => '<ul class = "pagination">',
					'full_tag_close' => '</ul>',
					'first_tag_open' => '<li>',
					'first_tag_close' => '</li>',
					'last_tag_open' => '<li>',
					'last_tag_close' => '</li>',
					'next_tag_open'  => '<li>', 
					'next_tag_close'  => '</li>', 
					'prev_tag_open'  => '<li>', 
					'prev_tag_close'  => '</li>', 
					'num_tag_open'  => '<li>', 
					'num_tag_close'  => '</li>', 
					'cur_tag_open' => "<li class ='active'><a>",
					'cur_tag_close' => '</a></li>'
				);
				$this->pagination->initialize($config);
				if($q = $this->userdashboardmodel->dispaly_leave_data($user_id,$config['per_page'],$this->uri->segment(3))) {
					 foreach ($q as $row) {
					 	$category_id = $row->leave_category;
					 	$row->leave_category = $this->userdashboardmodel->get_category_name($category_id)->category_name;	
					 }
				}
					 $data['q'] = $q;
					$this->load->view('leave',$data);
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

		public function leave_balance() {
			$this->load->view('leave_balance');
		}

		public function attendance(){
			if(null!=($this->session->userdata('logid'))){
				$user_id = $this->session->userdata('logid');
			}
			date_default_timezone_set('Asia/Kolkata');

			if (!$this->uri->segment(4)){
	        	
	        	$ym = date('Y-m',time());
			}
			else{
	        	$ym = $this->uri->segment(3);
			}

			$timestamp = strtotime($ym,"-01");
			if ($timestamp === false) {
			  $timestamp = time();
			}

			if($user_details = $this->userdashboardmodel->select_user_details($user_id)){
				$data['employee_name'] = $user_details->first_name." ".$user_details->last_name;
				$data['img_link'] = $user_details->img;
			}


			$today = date('Y-m-j', time());
			$employee_data = $this->userdashboardmodel->fetch_employee_data($user_id)['0'];
			if(!$employee_data){
				redirect('dashboard/attendance');
			}
			$joining_date = $employee_data->joining_date;
			$data['employee_id'] = $employee_data->employee_id;
			$data['designation'] =  $this->userdashboardmodel->get_designationname($employee_data->designation);
	 		$team_id = $this->userdashboardmodel->get_team_id($employee_data->designation);
	 		$data['team_name'] = $this->userdashboardmodel->get_team_name($team_id);

			$data['html_title'] = date('M - Y', $timestamp);

			$data['prev'] = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
			$data['next'] = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
			$data['user_id'] = $user_id;
			$day_count = date('t', $timestamp);

			$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

			$weeks = array();
			$week = '';

			$week .= str_repeat('<td></td>', $str);
			$present_days = 0;
			$sunday_count = 0;
			$not_avail_count = 0;

			for ( $day = 1; $day <= $day_count; $day++, $str++) {

			  $day = $day > 9 ? $day : "0".$day;	

			  $date = $ym.'-'.$day;

			  $attendance_record[$day]['day'] = date('l',strtotime($date));
			  $attendance_record[$day]['display_date'] = date('(d M)',strtotime($date));

			  if(date('l',strtotime($date))=="Sunday"){
			  	$daystatus = "btn btn-info self-calendar-btn";
			  	$attendance_record[$day]['time'] = 0;
			  	$sunday_count++;
			  }else{
			  	if($attendance_data = $this->userdashboardmodel->get_attendance_record($user_id,$date)){
			  		$temp_check_in = strtotime($attendance_data->check_in);
					$temp_check_out = strtotime($attendance_data->check_out);
					$attendance_record[$day]['time'] = round(($temp_check_out-$temp_check_in)/3600);

			  		$daystatus = "btn btn-success self-calendar-btn";
			  		$present_days++;
			  	}else{
			  		$attendance_record[$day]['time'] = 0;
			  		$daystatus = "btn btn-danger self-calendar-btn";
			  	}
			  }


			  if ($today == $date) {
			    $week .= '<td ><button class="btn btn-primary self-calendar-btn">'.$day.'</button>';
			  } else {
			  	if($date>$today || $date<$joining_date){
			  		$week .= '<td ><button class="btn self-calendar-btn">'.$day.'</button>';
			  		if(date('l',strtotime($date))!="Sunday"){
			  			$not_avail_count++;	
			  		}
			  	}else{
			    	$week .= '<td><button class="'.$daystatus.'">'.$day.'</button>';
			   	}
			  }
			  $week .= '</td>';

			  // End of the week OR End of the month
			  if ($str % 7 == 6 || $day == $day_count) {

			    if($day == $day_count) {
			      // Add empty cell
			      $week .= str_repeat('<td></td>', 6 - ($str % 7));
			    }

			    $weeks[] = '<tr>'.$week.'</tr>';

			    $week = '';
			  }
			}

			$data['present_days'] = $present_days;
			$data['absent_days'] = $day_count-($present_days+$not_avail_count+$sunday_count+1);
			$data['joining_date'] = date('d M, Y',strtotime($joining_date));
			$data['day_count'] = date('d',time());
			$data['weeks'] = $weeks;
			$data['attendance_record'] = $attendance_record;

		/*	echo "<pre>";
			print_r($data);
			die();*/

				$this->load->view('attendance',$data);
			
			}	

	}
?>