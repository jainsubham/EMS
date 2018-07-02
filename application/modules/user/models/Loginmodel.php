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
			$q = $this->db->where(['name'=>$post['companyname']])
								->get('CompTbl')->row();
								$id = $q->id;
								$data[] = $q->name;
								

			 $this->db->insert('Usertbl',array('password' =>$encpass,'accountstatus' =>1,'Email' =>$post['maill'],'accountlevel' =>1,'companyId' => $id)); 
			 $uid = $this->db->where(['Email' =>$post['maill']])
			 					->get('Usertbl')->row()->UserId;

			 $this->db->insert('UsersDetails',array('FirstName' =>$post['fname'],'LastName' =>$post['lname'],'ContactNo' =>$post['contactno'],'UserId' =>$uid));
			 $userid = $this->db->where(['FirstName' =>$post['fname']])
			 				->get('UsersDetails')->row()->UserId;
			 		$hash = md5($userid.date('Y-m-d H:i:s',time()));
			 		$data[]=  $hash;

			 $this->db->insert('Verifyhash',array('userid' =>$userid,'hash' =>$hash));
			 $this->db->insert('AdminTbl',array('companyId' =>$id,'UserId'=>$userid,'Date' =>date('Y-m-d H:i:s',time())));	
			 return $data;


		}	
		public function user_reg($post) {

			return $this->db->insert('UsersDetails','');



		}

	}

?>