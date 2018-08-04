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

		public function get_immediate_emp_leave_req($user_id) {
			if ($user_id) {
				if($q = $this->db->where('user_id',$user_id)
							->get(LEAVE_REQ)->result()) {
					return $q;
				}
			}
			else {
		
				return false;
			}
		}



	}
?> 