<?php

class Profilemodel extends CI_Model
{
	
	public function select($q) {

		return  $this->db->where(['UserId' =>$q] )
					->get('UsersDetails')->row();

	}
	public function update($post) {



	}
}
?>