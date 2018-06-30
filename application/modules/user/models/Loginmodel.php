<?php 
	class Loginmodel extends CI_Model {

		public function validate_login( $emailfield, $password ){

			$q = $this->db->where(['Email'=>$emailfield,'password'=>$password ,'accountstatus'=>'1'])
							->get('Usertbl');

			if( $q->num_rows()==1){
				return $q->row();
			}
			else{
				return False;
			}
		}
		public function comp_reg($post) {
			return $this->db->insert('CompTbl',$post);
		}	

	}

?>