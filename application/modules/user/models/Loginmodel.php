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
			 return $mail_hash;
		}	

		public function user_reg($data,$hashed) {

			$this->db->insert(USER,$data);
			$this->db->set('used', '1')
						->where('hash', $hashed)
						->update(INVITES);
			$q = $this->db->where(['email' =>$data['email']])
			 					->get(USER)->row();
			$x = $this->db->select(array('id','leave_default_value'))
			 				->where(['company_id' => $q->company_id,'leave_default_value >' => '0'])
			 				->get(LEAVE_CATEGORY)->result();
			 $x['user_id'] = $q->id;
			 $x['company_id'] = $q->company_id; 
			return $x;
		}

		public function verify_invite_hash($hash){
			$sql = "SELECT * FROM invites WHERE hash = ? AND invite_time > ? ";
			$q = $this->db->query($sql, array($hash, 'DATE_SUB(NOW(), INTERVAL 1 WEEK)'))->row();
			return $q;
		}

		public function account_email_verify($hash) {
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

		public function insert_leave_allowance_data($user_id,$category_id,$company_id,$opening_balance) {
			$this->db->insert(LEAVE_ALLOWANCE,array('user_id'=>$user_id,'category_id'=>$category_id,'company_id'=>$company_id,'opening_balance'=>$opening_balance,'balance' =>$opening_balance));
			return true;
		}

	}


?> 