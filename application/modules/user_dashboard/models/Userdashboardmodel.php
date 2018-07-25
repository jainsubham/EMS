<?php 
	class Userdashboardmodel extends CI_Model {

		public function get_user_name($user_id ){
			$q = $this->db->select(['first_name'])
				   				->where(['user_id'=> $user_id])
				   				->get(USER_DETAILS)->row()->first_name;
				return $q;	
			
		}

		public function get_employee_id($user_id){
			if($q = $this->db->select('employee_id')
		 			 ->where(['user_id' => $user_id])
		 			 ->get(EMPLOYMENT_DETAILS)->row()){

		 	return $q->employee_id;
			 }else{
			 	return false;
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
		public function get_company_id( $admin_id ){

			$q = $this->db->where(['user_id'=>$admin_id])
							->get(ADMIN);
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

		return  $this->db->where(['user_id' =>$user_id] )
					->get(USER_DETAILS)->row();
					

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

	}
?> 