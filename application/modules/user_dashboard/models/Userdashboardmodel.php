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

	}
?> 