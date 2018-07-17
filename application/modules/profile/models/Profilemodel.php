<?php

class Profilemodel extends CI_Model
{
	
	public function select($q) {

		return  $this->db->where(['user_id' =>$q] )
					->get(USER_DETAILS)->row();

	}
	public function get_companyid( $uid ){

			$q = $this->db->where(['id'=>$uid])
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
	public function get_adminemail($adminid){
		$q = $this->db->where(['id' => $adminid])
					->get(USER);
		if( $q->num_rows()==1){
				return $q->row()->email;
			}
			else{
				return False;
			}

	}
	public function update_profile($id,$data,$Email) {

		$this->db->set('email', $Email)
						->where('id', $id)
						->update(USER);
		$this->db->where(['user_id' =>$id])
					->update(USER_DETAILS,$data);
					return true;
	}
	public function get_designation_name($designation_id) {
		 	return $this->db->select('name')
		 			 ->where(['id' => $designation_id])
		 			 ->get(DESIGNATIONS)->row()->name;

		}

	public function get_employement_details($user_id){
		if($q = $this->db->where(['user_id' => $user_id])
		 			 ->get(EMPLOYMENT_DETAILS)->row()){

		 	return $q;
		 }else{
		 	return false;
		 }
	}

	public function get_bank_details($user_id){
		if($q = $this->db->where(['user_id' => $user_id])
		 			 ->get(BANK_DETAILS)->row()){

		 	return $q;
		 }else{
		 	return false;
		 }	
	}

}
?>