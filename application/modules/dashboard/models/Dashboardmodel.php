<?php 
	class Dashboardmodel extends CI_Model {

		public function get_companyid( $adminid ){

			$q = $this->db->where(['user_id'=>$adminid])
							->get(ADMIN);

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

		public function send_invite($emailid,$companyid,$hash){

			if($this->db->insert(INVITES,array('email_id' =>$emailid,'hash' =>$hash,'company_id' =>$companyid,'invite_time'=> date('Y-m-d H:i:s',time()) )) ){
			
				return True;
			}
		}
		public function get_userid($compid) {

			return $this->db->select('id')
							->where(['company_id' => $compid])
							->get(USER)->result();					
		}
		public function empdetails($uid) {

				  $q = $this->db->select(['first_name','last_name','img'])
				   				->where(['user_iD'=> $uid])
				   				->get(USER_DETAILS)->result();
				  $x = $this->db->select('designation')
				 	   			->where(['user_id' =>$uid])
				 	   			->get(EMPLOYMENT_DETAILS)->result();
				 	   			$designationid = $x['0']->designation;
				 	   			
				  $designationname = $this->db->select('name')
				 	   			->where(['id' =>$designationid])
				 	   			->get(DESIGNATION)->result();
				 	   		 $data = array('fname' =>$q[0]->first_name,'lname'=>$q['0']->last_name,'img'=>$q['0']->img ,'designationname'=>$designationname['0']->name );
				 		return $data;
				 		
		}
		

		public function get_designations_list($companyid){
			$q = $this->db->where(['company_id'=>$companyid])
							->get(DESIGNATION)->result();
				return $q;
		}

		public function add_designation($designation,$companyid){
			if($this->db->insert(DESIGNATION,array('name' =>$designation,'company_id' =>$companyid))){
			
				return True;
			}
		}

	}
?> 