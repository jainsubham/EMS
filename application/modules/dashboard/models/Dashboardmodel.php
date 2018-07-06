<?php 
	class Dashboardmodel extends CI_Model {

		public function get_companyid( $adminid ){

			$q = $this->db->where(['UserId'=>$adminid])
							->get('AdminTbl');

			if( $q->num_rows()==1){
				return $q->row()->companyId;
			}
			else{
				return False;
			}
		}

		public function get_companyname($companyid){
			$q = $this->db->where(['id'=>$companyid])
							->get('CompTbl');			
			if( $q->num_rows()==1){
				return $q->row()->name;
			}
			else{
				return False;
			}
		}

		public function send_invite($emailid,$companyid,$hash){

			if($this->db->insert('Invites',array('emailid' =>$emailid,'hash' =>$hash,'companyId' =>$companyid,'invitetime'=> date('Y-m-d H:i:s',time()) )) ){
			
				return True;
			}
		}
		public function get_userid($compid) {

			return $this->db->select('UserId')
							->where(['companyId' => $compid])
							->get('Usertbl')->result();					
		}
		public function empdetails($uid) {

				  $q = $this->db->select(['FirstName','LastName','img'])
				   				->where(['UserID'=> $uid])
				   				->get('UsersDetails')->result();
				  $designationid = $this->db->select('Designation')
				 	   			->where(['UserId' =>$uid])
				 	   			->get('EmploymentDetails')->result();
				 	   	print_r($designationid);
				 		
		}
		

		public function get_designations_list($companyid){
			$q = $this->db->where(['CompanyId'=>$companyid])
							->get('Designations')->result();
				return $q;
		}

		public function add_designation($designation,$companyid){
			if($this->db->insert('Designations',array('Name' =>$designation,'CompanyId' =>$companyid))){
			
				return True;
			}
		}

	}
?> 