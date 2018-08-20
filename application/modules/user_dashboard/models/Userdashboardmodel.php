<?php 
	class Userdashboardmodel extends CI_Model {


		public function get_employee_id($user_id){
			if($q = $this->db->select('employee_id')
		 			 ->where(['user_id' => $user_id])
		 			 ->get(EMPLOYMENT_DETAILS)->row()){

		 	return $q->employee_id;
			 }else{
			 	return false;
			 }
		}

		public function get_companyid( $user_id ){

			$q = $this->db->where(['id'=>$user_id])
							->get(USER);

			if( $q->num_rows()==1){
				return $q->row()->company_id;
			}
			else{
				return False;
			}
		}

		public function get_attendance_record($user_id,$date){
			if($q = $this->db->select(['check_in','check_out'])
		 			 ->where(['user_id' => $user_id,'date'=>$date])
		 			 ->get(ATTENDANCE)->row()){
  	
		 	return $q;
			 }else{
			 	return false;
			 }
		}
		public function get_company_id( $user_id ){

			$q = $this->db->where(['id'=>$user_id])
							->get(USER);
			if( $q->num_rows()==1){
				return $q->row()->company_id;
			}
			else{
				return False;
			}
		}
		public function get_category_list($company_id) {
			if($q = $this->db->where(['company_id' => $company_id])
							->get(LEAVE_CATEGORY)->result()) {
					return $q;
			}
			else {
				return false;
			}
		}
		public function leave_data($data) {
			return $this->db->insert(LEAVE_REQ,$data);			
		}

		public function dispaly_leave_data($user_id,$limit,$offset) {
			if($q = $this->db->where(['user_id' => $user_id])
							 ->order_by('start_date','DESC')
							 ->limit($limit,$offset)
							->get(LEAVE_REQ)->result()) {
					return $q;
			}
			else {
				
				return false;
			}
		}

		public function num_row() {
			if($q=$this->db->count_all_results(LEAVE_REQ)) {
					return $q;
			}
			else {
				return false;
			}
		}
		
		public function get_category_name($category_id) {
				if($q = $this->db->select('category_name')
							->where(['id' => $category_id])
							->get(LEAVE_CATEGORY)->row()) {
					return $q;
				}
				else {
					return false;
				}
		}

		public function select_user_details($user_id) {

		return  $this->db->where(['id' =>$user_id] )
					->get(USER)->row();
					

		}

		public function fetch_employee_data($user_id) {
		 	return $this->db->select()
		 				->where(['user_id' => $user_id])
		 				->get(EMPLOYMENT_DETAILS)->result();
		 }

		 public function get_designationname($designation_id) {
		 	return $this->db->select('name')
		 			 ->where(['id' => $designation_id])
		 			 ->get(DESIGNATIONS)->row()->name;

		}
		public function get_team_id($designation_id){
			if($q = $this->db->select(['team_id'])
		 			 ->where(['id' => $designation_id])
		 			 ->get(DESIGNATIONS)->row()){
  	
		 	return $q->team_id;
			 }else{
			 	return false;
			 }	
		}

		public function get_team_name($team_id){
			if($q = $this->db->select(['name'])
		 			 ->where(['id' => $team_id])
		 			 ->get(TEAM)->row()){
  	
		 	return $q->name;
			 }else{
			 	return false;
			 }	
		}
		public function get_users($company_id) {
			if($subquery = $this->db->select('user_id')
									->get(REP_SUP)->result()) {
					foreach ($subquery as $row) {
						$data[] = $row->user_id;
					}
				return $this->db->select('id')
						->where(['company_id' => $company_id])
						->where_not_in('id',$data)
						->get(USER)->result();
			}
			else {
				return $this->db->select('id')
						->where(['company_id' => $company_id])
						->get(USER)->result();
			}
		}

		public function check_emp_under_supervisor($rep_sup_id) {
			  if($q =$this->db->select('user_id')
						->where(['rep_sup' => $rep_sup_id])
						->get(REP_SUP)->result()) {
			  	 return $q;
			  }
			  else {
			  	false;
			  }
		}

		public function get_admin_id($company_id) {
			if ($q = $this->db->select('user_id')
						->where(['company_id' => $company_id])
						->get(ADMIN)->row()) {
					return $q->user_id;

			}
			else {
				return false;
			}
		}

		public function get_emp_leave_req($data,$limit,$offset) {
			if ($data) {
				if($q = $this->db->where_in('user_id',$data)
							 ->order_by('start_date','DESC')
							 ->limit($limit,$offset)
							->get(LEAVE_REQ)->result()) {
					return $q;
				}
			}
			else {
				
				return false;
			}
		}
		public function get_category_details($user_id) {

			if($q = $this->db->select()
							->where(['user_id'=>$user_id])
							->get(LEAVE_ALLOWANCE)->result()) {
				return $q;
			}
			else {
				return false;
			}

		}

		public function action_request($id,$approvation_status) {
				return $this->db->set('approvation_status',$approvation_status)
							->where(['id'=>$id])
							->update(LEAVE_REQ);
		}
		public function get_userid($compid) {

			return $this->db->select('id')
							->where(['company_id' => $compid,'account_status'=>1])
							->get(USER)->result();					
		}

		public function empdetails($uid) {
				  $q = $this->db->select(['first_name','last_name','img','email'])
				   				->where(['id'=> $uid])
				   				->get(USER)->result(); 
				  $x = $this->db->select(['designation','employee_id'])
				 	   			->where(['user_id' =>$uid])
				 	   			->get(EMPLOYMENT_DETAILS)->result();
				 	   		if($x) {	
				 	   			$designationid = $x['0']->designation; 	   			
				 				$designationname = $this->db->select('name')
				 	   										->where(['id' =>$designationid])
				 	   										->get(DESIGNATIONS)->result();
				 	   		 	$data = array('fname' =>$q['0']->first_name,'lname'=>$q['0']->last_name,'img'=>$q['0']->img,'email'=> $q['0']->email ,'designationname'=>$designationname['0']->name ,'employee_id'=>$x['0']->employee_id,'user_id'=>$uid);
				 	   		 }
				 		else {

				 			$data = array('fname' =>$q['0']->first_name,'lname'=>$q['0']->last_name,'img'=>$q['0']->img ,'email'=> $q['0']->email ,'designationname'=>' ','user_id'=>$uid );
				 	}
				 	return $data;
		}

		public function get_leave_req($leave_id) {
			return $this->db->where(['id' =>$leave_id])
						->get(LEAVE_REQ)->row();

		}

		public function update_leave_balance($remaining_days,$id,$leaves_taken,$user_id) {
			return $this->db->set(['balance' => $remaining_days,'leaves_taken'=>$leaves_taken])
								->where(['user_id'=>$user_id,'category_id'=>$id])
								->update(LEAVE_ALLOWANCE);
		}
		public function get_total_leave_user($user_id) {

			if($q = $this->db->where(['user_id'=>$user_id,'approvation_status' => 1])
						->get(LEAVE_REQ)->result()) {
				return $q;
			} 
			else {
				return false;
			}
		}
		public function announcement($company_id) {
			return $this->db->select(['id','announcement','date_till_display'])
								->where(['company_id' => $company_id,'deleted'=>0,'date_till_display >=' =>date('Y-m-d')])
								->get(ANNOUNCEMENT)->result();
		}
	}
?> 