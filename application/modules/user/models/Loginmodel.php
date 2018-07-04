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
			 
			 		$mail_hash = md5(time());
			 		

			 $this->db->insert('Verifyhash',array('userid' =>$uid,'hash' =>$mail_hash));
			 $this->db->insert('AdminTbl',array('companyId' =>$id,'UserId'=>$uid,'Date' =>date('Y-m-d H:i:s',time())));	
			 return $mail_hash;


		}	

		public function user_reg($data,$Email,$password,$companyid,$hashed) {

			 $this->db->insert('Usertbl',array('Email' => $Email,'password' =>$password,'companyId' =>$companyid));
			 $q = $data['UserId'] = $this->db->where(['Email' =>$Email])
			 			->get('Usertbl')->row()->UserId;
			  $this->db->insert('UsersDetails',$data);
			  $this->db->set('used', '1')
						->where('hash', $hashed)
						->update('Invites');
				$mail_hash = md5(time());
				$this->db->insert('Verifyhash',array('userid' =>$q,'hash' =>$mail_hash));
			  return $mail_hash;



		}

		public function verify_invite_hash($hash){
			$sql = "SELECT * FROM Invites WHERE hash = ? AND invitetime > ? ";
			$q = $this->db->query($sql, array($hash, 'DATE_SUB(NOW(), INTERVAL 1 WEEK)'))->row();
			return $q;
		}

		public function account_email_verify($hash){
			if($this->db->where(['hash' =>$hash,'active'=>1])
			 			->get('Verifyhash')->num_rows()!=0){

				$q = $this->db->where(['hash' =>$hash,'active'=>1])
			 			->get('Verifyhash')->row()->userid;
			 
			 	$this->db->set('active', '0')
						->where('hash', $hash)
						->update('Verifyhash');
				$this->db->set('emailverified', '1')
						->where('UserId', $q)
						->update('Usertbl');
					return TRUE;
			 }			
		}

	}


?> 