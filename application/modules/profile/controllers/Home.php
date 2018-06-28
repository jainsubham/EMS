<?php

class Home extends CI_Controller
{
	
	public function index() {
		$x = 2;
		if($x == 2) {
			print_r("true");
		}
		else {
			print_r("false");
		}
	}
}
?>