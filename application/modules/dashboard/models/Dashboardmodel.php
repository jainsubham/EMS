<?php 
	class Dashboardmodel extends CI_Model {

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

		public function get_companyname($companyid){
			$q = $this->db->where(['id'=>$companyid])
							->get(COMPANY);			
			if( $q->num_rows()==1){
				return $q->row()->name;
			}
			else{
				return False;
			}
		}

		public function select_user_details($user_id) {

		return  $this->db->where(['id' =>$user_id] )
					->get(USER)->row();
		}

		public function get_reporting_supervisor_detail($user_id) {
			if($q =$this->db->select('rep_sup')
						->where(['user_id' => $user_id])
						->get(REP_SUP)->row()) {
				return  $q->rep_sup;
			}
			else {
				return false;			
			}		
		}

		public function send_invite($emailid,$companyid,$hash){

			if($this->db->insert(INVITES,array('email_id' =>$emailid,'hash' =>$hash,'company_id' =>$companyid,'invite_time'=> date('Y-m-d H:i:s',time()) )) ){
			
				return True;
			}
		}

		public function get_userid($compid) {

			return $this->db->select('id')
							->where(['company_id' => $compid,'account_status'=>1])
							->get(USER)->result();					
		}

		public function empdetails($uid) {
				  $q = $this->db->select(['first_name','last_name','img'])
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
				 	   		 	$data = array('fname' =>$q['0']->first_name,'lname'=>$q['0']->last_name,'img'=>$q['0']->img ,'designationname'=>$designationname['0']->name ,'employee_id'=>$x['0']->employee_id,'user_id'=>$uid);
				 	   		 }
				 		else {

				 			$data = array('fname' =>$q['0']->first_name,'lname'=>$q['0']->last_name,'img'=>$q['0']->img ,'designationname'=>' ','user_id'=>$uid );
				 	}
				 	return $data;
		}
		

		public function get_designations_list($companyid){
			if($q = $this->db->select(['name','id'])
							->where(['company_id'=>$companyid])
							->get(DESIGNATIONS)->result()){
				return $q;
				}else{
					return false;
				}
		}

		public function add_designation($designation,$companyid,$team){
			if($this->db->insert(DESIGNATIONS,array('name' =>$designation,'company_id' =>$companyid,'team_id'=>$team))){
			
				return True;
			}
		}

		public function get_team_list($companyid){
			if($q = $this->db->where(['company_id'=>$companyid])
							->get(TEAM)->result()){
				return $q;
				}else{
					return false;
				}
		}

		public function add_team($team,$companyid){
			if($this->db->insert(TEAM,array('name' =>$team,'company_id' =>$companyid))){
			
				return True;
			}
		}

	    public function fetch_employee_data($user_id) {
		 	if($q = $this->db->select()
		 				->where(['user_id' => $user_id])
		 				->get(EMPLOYMENT_DETAILS)->result()) {
		 		return $q;
		 	}
		 	else {
		 		return false;
		 	}
		 }

		public function updatedata($data) {
		 		
		 	 $q  = $this->db->select('user_id')
		 	  			->where(['user_id' => $data['user_id']])
		 	  			->get(EMPLOYMENT_DETAILS)->row();
		 	  			
		 	  if($q) {
		 	  		$this->db->where(['user_id' =>$q->user_id])
								->update(EMPLOYMENT_DETAILS,$data);
					$team_id = $this->db->select('team_id')
		 	  							 ->where(['id' => $data['designation']])
		 	  							 ->get(DESIGNATIONS)->row();
		 	  							 
					$this->db->set('team_id',$team_id->team_id)
								->where(['user_id' =>$q->user_id])
								->update(TEAM_ALLOTED);		
					return true;
		 	  }
		 	  else {

		 	  	$this->db->insert(EMPLOYMENT_DETAILS,$data);
		 	  	$team_id = $this->db->select('team_id')
		 	  				->where(['id' => $data['designation']])
		 	  				->get(DESIGNATIONS)->row();

		 	  	$this->db->insert(TEAM_ALLOTED,array('user_id'=>$data['user_id'], 'team_id' => $team_id->team_id));
		 	  	 return true;

		 	  }
		}

		public function get_designationname($designation_id) {
		 	return $this->db->select('name')
		 			 ->where(['id' => $designation_id])
		 			 ->get(DESIGNATIONS)->row()->name;

		}

		public function update_personal_info($data,$user_id) {
			$this->db->where(['id' => $user_id])
						->update(USER,$data);
						return true;
		}

		public function img_update($user_id,$img) {
		 	return $this->db->set('img',$img)
		 				->where(['id' => $user_id])
		 				->update(USER);
		}

		public function attendance($attendance) {
			 $this->db->insert(ATTENDANCE,$attendance);
		}

		public function count_employees($company_id) {
				
			return  $this->db->where(['company_id' => $company_id,'account_status'=>1,'email_verified'=>1])
					   		->count_all_results(USER);
		}

		public function get_leave_category($company_id) {
			return $this->db->select()
						->where(['company_id'=>$company_id])
						->get(LEAVE_CATEGORY)->result();
						
		} 

		public function add_category($category,$company_id,$nature,$leave_default_value) {
			return $this->db->insert(LEAVE_CATEGORY,array('category_name' => $category, 'company_id' => $company_id,'nature'=>$nature,'leave_default_value'=>$leave_default_value));
		}

		public function announcement($company_id) {
			return $this->db->select(['id','announcement','date_till_display'])
								->where(['company_id' => $company_id,'deleted'=>0,'date_till_display >=' =>date('Y-m-d')])
								->get(ANNOUNCEMENT)->result();
		}

		public function get_announcement($id) {
			return $this->db->select(['announcement','date_till_display'])
								->where(['id' => $id])
								->get(ANNOUNCEMENT)->row();

		}

		public function add_announcement($data) {
			return $this->db->insert(ANNOUNCEMENT,$data); 
		}

		public function update_announcement($data,$id) {
			return $this->db->where(['id' => $id])
								->update(ANNOUNCEMENT,$data);
		}

		public function delete_announcement($id) {
			return $this->db->set('deleted',1)
							->where(['id' => $id])
							->update(ANNOUNCEMENT);
		}

		public function validate_employee($employee_id){
			if($q = $this->db->select(['user_id'])
								->where(['employee_id'=>$employee_id])
								->get(EMPLOYMENT_DETAILS)->row()){
				return $q->user_id;
			}else{
				return false;
			}
		}

		public function count_present_employees($company_id,$date){
			return $this->db->where(['company_id'=>$company_id,'date'=>$date])
								->count_all_results(ATTENDANCE);
		}

		public function get_attendance_status($user_id,$date){
			if($q = $this->db->where(['user_id' => $user_id,'date'=>$date])
		 			 ->count_all_results(ATTENDANCE)){
  	
		 	return $q;
			 }else{
			 	return false;
			 }
		}

		public function get_employee_id($user_id){
			if($q = $this->db->select(['employee_id'])
								->where(['user_id'=>$user_id])
								->get(EMPLOYMENT_DETAILS)->row()){
		 			return $q->employee_id;
			} 
		    else {
			 	return false;
			 }
		}
		public function insert_supervisor($user_id,$rep_sup) {
			return $this->db->insert(REP_SUP,array('user_id' => $user_id,'rep_sup'=> $rep_sup ));
		}

		public function select_user($reporting_id) {
			if($q = $this->db->select('user_id')
						->where(['rep_sup' =>$reporting_id])
						->get(REP_SUP)->result()) {
				return $q;
			}
			else {
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

		public function get_reporting_user($user_id,$data) {
			if($team_id = $this->db->select('team_id')
						->where(['user_id'=> $user_id])
						->get(TEAM_ALLOTED)->row()) {
				return $this->db->select('user_id')
			 				->where(['team_id' => $team_id->team_id])
				 			->where_not_in('user_id',$data)
				 			->get(TEAM_ALLOTED)->result();
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

		public function get_leave_balance($category_id,$company_id) {
			if($q = $this->db->select()
								->where(['category_id'=>$category_id,'company_id'=>$company_id])
								->get(LEAVE_ALLOWANCE)->result()) {

				return $q;
			}
			else {
				false;
			}
		}

		public function get_leave_balance_single_user($user_id) {
			if($q = $this->db->select()
							 ->where(['user_id'=>$user_id])
								->get(LEAVE_ALLOWANCE)->result()) {

				return $q;
			}
			else {
				false;
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

		/*public function update_leave_data($user_id,$data) {
			return $this->db->set(array('casual_leaves_allowed'=>$data['casual'],'earning_leave_allowed'=>$data['earning']))
					  		->where(['user_id'=>$user_id])
					  		->update(LEAVE_ALLOWANCE);

		}*/

		public function upload_leave_data($user_id,$category_id,$company_id,$casual,$year) {
			return $this->db->set(array('user_id'=>$user_id,'category_id'=>$category_id,'company_id'=>$company_id,'opening_balance'=>$casual,'balance'=>$casual,'years' =>$year))
					  		->where(['user_id'=>$user_id,'category_id'=>$category_id])
					  		->update(LEAVE_ALLOWANCE);

		}

		public function num_row() {
			if($q=$this->db->count_all_results(LEAVE_REQ)) {
					return $q;
			}
			else {
				return false;
			}
		}

		public function get_emp_leave_req($data,$limit,$offset) {
			if($q = $this->db->where_in('user_id',$data)
							 ->order_by('start_date','DESC')
							 ->limit($limit,$offset)
							->get(LEAVE_REQ)->result()) {
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

		public function get_user_id($employee_id) {
			if($q = $this->db->select('user_id')
						->where(['employee_id'=>$employee_id])
						->get(EMPLOYMENT_DETAILS)->row()) {
				return $q->user_id;
			}
			else {
				return false;
			}
		}

		public function get_monthly_crone_job() {
			if($q = $this->db->select()
						->where(['nature'=>'month'])
						->get(LEAVE_CATEGORY)->result()) {
				return $q;
			}
			else {
				return false;
			}
		}

		public function update_crone_job($category_id,$company_id,$accrued_balance,$balance) {
			return $this->db->set(['accrued_balance'=>$accrued_balance,'balance'=>$balance])
						->where(['category_id'=>$category_id,'company_id'=>$company_id])
						->update(LEAVE_ALLOWANCE);
		}

	}
?> 