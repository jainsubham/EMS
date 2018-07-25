<?php 
	class Loginmodel extends CI_Model {

		public function validate_login( $emailfield, $passwordenc ){

			$q = $this->db->where(['email'=>$emailfield,'password'=>$passwordenc,'account_status'=>'1'])
							->get(USER);

			if( $q->num_rows()==1){
				return $q->row();
			}
			else{
				return False;
			}
		}
		public function comp_reg($post ,$encpass) {
			 $this->db->insert(COMPANY,array('name' =>$post['companyname'],'address' =>$post['address'],'website' =>$post['website'],'mail' =>$post['mail'],'contact_no' =>$post['phoneno'],'date_of_reg'=> date('Y-m-d H:i:s',time()) ));
			$q = $this->db->where(['name'=>$post['companyname']])
								->get(COMPANY)->row();
								$id = $q->id;
								$data[] = $q->name;
								

			 $this->db->insert(USER,array('password' =>$encpass,'account_status' =>1,'email' =>$post['maill'],'account_level' =>1,'company_id' => $id,'first_name' =>$post['fname'],'last_name' =>$post['lname'],'contact_no' =>$post['contactno'])); 
			 $uid = $this->db->where(['email' =>$post['maill']])
			 					->get(USER)->row()->id;


			 
			 		$mail_hash = md5(time());
			 		

			 $this->db->insert(VERIFY_HASH,array('user_id' =>$uid,'hash' =>$mail_hash));
			 $this->db->insert(ADMIN,array('company_id' =>$id,'user_id'=>$uid,'date' =>date('Y-m-d H:i:s',time())));	
			 return $mail_hash;


		}	

		public function user_reg($data,$hashed) {

			 $this->db->insert(USER,$data);
			  $this->db->set('used', '1')
						->where('hash', $hashed)
						->update(INVITES);
				return true;



		}

		public function verify_invite_hash($hash){
			$sql = "SELECT * FROM invites WHERE hash = ? AND invite_time > ? ";
			$q = $this->db->query($sql, array($hash, 'DATE_SUB(NOW(), INTERVAL 1 WEEK)'))->row();
			return $q;
		}

		public function account_email_verify($hash){
			if($this->db->where(['hash' =>$hash,'active'=>1])
			 			->get(VERIFY_HASH)->num_rows()!=0){

				$q = $this->db->where(['hash' =>$hash,'active'=>1])
			 			->get(VERIFY_HASH)->row()->user_id;
			 
			 	$this->db->set('active', '0')
						->where('hash', $hash)
						->update(VERIFY_HASH);
				$this->db->set('email_verified', '1')
						->where('id', $q)
						->update(USER);
					return TRUE;
			 }			
		}

	}


?> 