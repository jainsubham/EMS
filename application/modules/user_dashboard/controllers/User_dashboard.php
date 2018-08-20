<?php
	class User_dashboard extends CI_Controller
	{
		function __construct() {
				parent::__construct();
				$this->load->helper(array('form','url'));
				$this->load->library(array('session','form_validation'));
				$this->load->database();
				$this->load->model('userdashboardmodel');
				if (null == $this->session->userdata('logid')) {
					redirect('user/login');
				}
				$this->x = [];
		}
		public function index() {
			if(null!=($this->session->userdata('logid'))){
				$user_id = $this->session->userdata('logid');
				if($user_name = $this->userdashboardmodel->select_user_details($user_id)->first_name){
					$data['user_name'] = $user_name;
					$week['0']['date'] = date('Y-m-d');
					$week['0']['day'] = date('l',strtotime($week['0']['date']));
					$week['0']['display_date'] = date('(d M)',strtotime($week['0']['date']));
					if($q = $this->userdashboardmodel->get_attendance_record($user_id,$week['0']['date'])){
						$temp_check_in = strtotime($q->check_in);
						$temp_check_out = strtotime($q->check_out);
						$week['0']['time'] = round(($temp_check_out-$temp_check_in)/3600);
						
					}
					else {
						if (null!=($this->session->userdata('logid'))) {
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
			}
			else {
				redirect('user/login');
			}
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
			$user_id = $this->session->userdata('logid');
			$post = $this->input->post();
			$start_date    = $post['start'];
			$date1 = 	strtotime($start_date);	
			$end_date     = $post['end'];
			$date2 = 	strtotime($end_date);
			$datediff = $date2 - $date1;
			$no_of_days = floor($datediff/(60*60*24));
			$leave_category = $post['leave'];
			$data = $this->userdashboardmodel->get_category_details($user_id);
			foreach ($data as $row) {
				$id = $row->category_id;
				if ($id == $leave_category) {
					$leave_balance = $row->balance;
					if ($leave_balance >= $no_of_days) {
					}
					elseif($leave_balance < $no_of_days) {
							$this->session->set_flashdata('Error', 'Leave Balance Not Remains');
							redirect('user_dashboard/apply_leave');		 
					}
					else {
						redirect('user_dashboard/apply_leave');	
					}
				}
			}
			if($start_date<date('Y-m-d',time())){
				redirect('user_dashboard/apply_leave');
			}
			if($end_date<$start_date){
				redirect('user_dashboard/apply_leave');
			}
			$this->form_validation->set_rules('leave','Leave','required');
			$this->form_validation->set_rules('start','From','required');
			$this->form_validation->set_rules('end','To','required');
			if($this->form_validation->run()) {
				$data = array(
					'leave_category'=>$leave_category,
					'start_date'	=> $start_date,
					'end_date'		=> $end_date,
					'reason'        => $post['reason'],
					'half_day'      => $post['radio'],
					'user_id'       => $user_id
				);
				if($this->userdashboardmodel->leave_data($data)) {
					redirect('user_dashboard/leave');
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
			$user_id = $this->session->userdata('logid');
			$q = $this->userdashboardmodel->get_category_details($user_id);
			foreach ($q as $row) {
				$row->category_id = $this->userdashboardmodel->get_category_name($row->category_id)->category_name;
			}
			$data['q'] = $q;
			$this->load->view('leave_balance',$data);
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


			$today = date('Y-m-d', time());
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

				$this->load->view('attendance',$data);
			
	}	



			public function get_under_me($user_id){
				if($res = $this->userdashboardmodel->check_emp_under_supervisor($user_id)){

				$this->x[$user_id] = $res;

					if(count($res) > 0){			
						foreach ($res as $key => $value) {
							$this->get_under_me($value->user_id);
						}
					}
				}else{
					$this->x[$user_id] = $res;
				}
			}

	public function organization() {
		$user_id = $this->session->userdata('logid');
		$company_id = $this->userdashboardmodel->get_companyid($user_id);
		$user_list = $this->userdashboardmodel->get_users($company_id);
				
			foreach ($user_list as $row) {
				$user = $row->id;
				$this->get_under_me($user);
				$supervisor_id = key($this->x);
				$node = $this->x;
					foreach ($node as $key => $row) {
						$row_data = $row;
						unset($node[$key]);
						$data_p['parent'] = $key;
						if(isset($row_data)){
							foreach ($row_data as $user_list) {
								$id =  $user_list->user_id;
								$data_p['child'][] = $id;
							}
						}
						$target[] = $data_p;
						unset($data_p);
						$user_data = $this->userdashboardmodel->select_user_details($key);
						if($employee_data = $this->userdashboardmodel->fetch_employee_data($key)['0']) {
							$node[$key]['employee_id'] = $employee_data->employee_id;
							$node[$key]['designation'] = $this->userdashboardmodel->get_designationname($employee_data->designation);
						}
						$node[$key]['name'] = $user_data->first_name." ".$user_data->last_name;
						$node[$key]['img'] = $user_data->img;
								
							}
							
							foreach ($target as $row) {
								if(isset($row['child'])){
									foreach ($row['child'] as $child_list) {
										$node[$child_list]['parent'] = $row['parent'];
									}
								}
							}

							$data['data'][] = $node;
							unset($this->x);
							unset($target);
						}
						$data['count']= count($data['data']);
					

						$this->load->view('organization',$data);
	}

	public function team_leave() {
		if (null!=($this->session->userdata('logid'))) {
				$user_id = $this->session->userdata('logid');
				$this->load->library('pagination');
				$config = array(
					'base_url' => 'http://localhost/ems/user_dashboard/team_leave/',
					'per_page' => '10',
					'total_rows' => $this->useruserdashboardmodel->num_row(),
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
				$this->get_under_me($user_id);
				/*$data = $this->x[$user_id];
				if (isset($data)) {
					$this->notification_for_leave($user_id,$data);	
				}*/
				$array = array_keys($this->x);
				unset($array['0']);
				$this->pagination->initialize($config);
				if($q = $this->userdashboardmodel->get_emp_leave_req($array,$config['per_page'],$this->uri->segment(3))) {
					 foreach ($q as $row) {
					 	$user_id = $row->user_id;
						$employee_id = $this->userdashboardmodel->get_employee_id($user_id);
						$name_data = $this->userdashboardmodel->select_user_details($user_id);
						$row->user_id = $employee_id.'/'.$name_data->first_name.' '.$name_data->last_name; 
					 	$category_id = $row->leave_category;
					 	$row->leave_category = $this->userdashboardmodel->get_category_name($category_id)->category_name;	
					 }
				}
					 $data['q'] = $q;

					$this->load->view('team_leave',$data);
			}
			else {
				redirect('user/login');
			}
	}

	public function action_leave_request() {
		$id = $this->uri->segment(3);
		$approvation_status	= $this->uri->segment(4);
		if($approvation_status == 1) {
			if($this->userdashboardmodel->action_request($id,$approvation_status)) {
				$q = $this->userdashboardmodel->get_leave_req($id);
				$user_id = $q->user_id;
				$date1 = strtotime($q->start_date);
				$date2 = strtotime($q->end_date);
				$datediff = $date2 - $date1;
				$no_of_days = floor($datediff/(60*60*24));
				$data = $this->userdashboardmodel->get_category_details($user_id);
				foreach ($data as $row) {
					$id = $row->category_id;
					if ($id == $q->leave_category) {
						$leave_balance = $row->balance;
						$leaves_taken = $row->leaves_taken + $no_of_days;
						if ($leave_balance >= $no_of_days) {
							$remaining_days = $leave_balance - $no_of_days;
							$this->userdashboardmodel->update_leave_balance($remaining_days,$id,$leaves_taken,$user_id);
						}
					}
				}
				redirect('user_dashboard/team_leave');
			}
		}
		else {
			if($this->userdashboardmodel->action_request($id,$approvation_status)) {
				redirect('user_dashboard/team_leave');
			}	
		}
	}

	
	/*public function notification_for_leave($user_id,$data) {
		foreach ($data as $row) {
			$id = $row->user_id;
			$x = array();
			if($q = $this->userdashboardmodel->get_immediate_emp_leave_req($id)) {	
				$employee_id = $this->userdashboardmodel->get_employee_id($user_id);
				$name_data = $this->userdashboardmodel->select_user_details($user_id);
				$row->user_id = $employee_id.'/'.$name_data->first_name.' '.$name_data->last_name; 
				$user_data = $this->userdashboardmodel->select_user_details($user_id);
				$full_name = $user_data->first_name.' '.$user_data->last_name;
				$email = $user_data->email;
				$subject = "EMS Account Invitation";
				$name = '';	
				$web_link = base_url('');
				$invite_link=  base_url('user_dashboard/team_leave');
				$part1 = "<div> Hello ";
				$part2 = " ,<br><br>
					You have leave request of your under employee";
				$name = $full_name;
				$email_to = $email;
				$tobehashed = $user_id.$email_to;
				$hash = md5($tobehashed);
				$invite_link = $invite_link."/".$hash;
				$msg_body = $part1.$name.$part2.$invite_link;
				$this->init_mail();
				$this->sendmail($subject , $msg_body , $email_to);	
				if($this->dashboardmodel->send_invite($email_to,$company_id,$hash)){
					echo $name." is invited"."<br>";
				}
				else{
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				}
			}

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

	}*/

	public function announcement() {
		$user_id = $this->session->userdata('logid');
		$company_id = $this->userdashboardmodel->get_companyid($user_id);
		$data['x'] = $this->userdashboardmodel->announcement($company_id);

		$this->load->view('announcement',$data);
	}

	public function employee_directory(){
		if (null!=($this->session->userdata('logid'))) {
				$user_id = $this->session->userdata('logid');
				$company_id = $this->userdashboardmodel->get_companyid($user_id);

				$q		=  $this->userdashboardmodel->get_userid($company_id);
				foreach ($q as $row) {
					 $uid  = $row->id;
					if($z = $this->userdashboardmodel->empdetails($uid)){
					 $data[]= $z;
					}
				}
				$view['data'] = $data;

				$this->load->view('employee_directory',$view);
			}
	}
}

?>