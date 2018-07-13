<?php 
	class Userdashboardmodel extends CI_Model {

		public function get_user_name($userid ){
			$q = $this->db->select(['first_name'])
				   				->where(['user_id'=> $userid])
				   				->get(USER_DETAILS)->row()->first_name;
				return $q;	
			
		}

	}
?> 