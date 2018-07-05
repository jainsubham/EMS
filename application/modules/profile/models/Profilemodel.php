<?php

class Profilemodel extends CI_Model
{
	
	public function select($q) {

		return  $this->db->where(['UserId' =>$q] )
					->get('UsersDetails')->row();

	}
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
	public function get_adminemail($adminid){
		$q = $this->db->where(['UserId' => $adminid])
					->get('Usertbl');
		if( $q->num_rows()==1){
				return $q->row()->Email;
			}
			else{
				return False;
			}

	}
	public function update($id,$data,$Email) {

		$this->db->set('Email', $Email)
						->where('UserId', $id)
						->update('Usertbl');
		$this->db->where(['UserId' =>$id])
					->update('UsersDetails',$data);
					return true;
	}
}
?>