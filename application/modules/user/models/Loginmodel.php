<?php 
	class Loginmodel extends CI_Model {

		public function validate_login( $emailfield, $passwordenc ){

			$q = $this->db->where(['Email'=>$emailfield,'password'=>$passwordenc,'accountstatus'=>'1'])
							->get('Usertbl');

			if( $q->num_rows()==1){
				return $q->row();
			}
			else{
				return False;
			}
		}
		public function comp_reg($post ,$encpass) {
			 $this->db->insert('CompTbl',array('name' =>$post['companyname'],'address' =>$post['address'],'website' =>$post['website'],'mail' =>$post['mail'],'contactno' =>$post['phoneno'],'DateofReg'=> date('Y-m-d H:i:s',time()) ));
			$id = $this->db->where(['name'=>$post['companyname']])
								->get('CompTbl')->row()->id;

			 $this->db->insert('Usertbl',array('password' =>$encpass,'accountstatus' =>1,'Email' =>$post['maill'],'accountlevel' =>1,'companyId' => $id)); 
			 $uid = $this->db->where(['Email' =>$post['maill']])
			 					->get('Usertbl')->row()->UserId;

			 $q = $this->db->insert('UsersDetails',array('FirstName' =>$post['fname'],'LastName' =>$post['lname'],'ContactNo' =>$post['contactno'],'UserId' =>$uid));

			 	print_r($q);

		}	

	}

?>