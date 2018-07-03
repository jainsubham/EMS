<?php

class Profilemodel extends CI_Model
{
	
	public function select() {
		$q = $this->db->select(['companyId','name'])
					->get('compTbl');
			print_r($q);
			die();

	}
}
?>