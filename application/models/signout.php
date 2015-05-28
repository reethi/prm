<?php
class User extends CI_model {

	
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('datatable');
		$this->load->library("session");
	}

	public function index() 
	{
		$array_items = array('username' => $this->session->userdata['username'], 'user_id' => $this->session->userdata['user_id']);


		if($this->session->unset_userdata($array_items))
		{
			
			return 1;

		}
		else
		{
			
			return 0;
		}
	}

}
