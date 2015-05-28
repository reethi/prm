<?php
class classes_model extends CI_model {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('datatable');
		$this->load->library("session");
	}

	public function getClasses(){		
	 	$query = $this->db->get('class_names');
	 	$ret = $query->result();
	    return $ret; 
	}

	public function getClassById($id){
		//echo $id;exit;
		$this->db->select('class_name,class_time_name');
        $this->db->from('class_list');
        $this->db->join('class_time', 'class_list.class_time = class_time.id', 'left');
        $this->db->where('health_educator', $id);
        $query = $this->db->get();
        
        $ret = $query->result_object();
        return $ret;        
	}

	public function getEducatorsList(){
		$this->db->select('id, full_name, email');
        $this->db->from('users');
        $this->db->where('user_type',2);
        //echo $this->db->last_query();exit;
        $query = $this->db->get();
        $ret = $query->result_object();

        return $ret;        
	}

	public function getLocationList(){
		$this->db->select('*');
        $this->db->from('location');
        //$this->db->where('user_type',2);
        //echo $this->db->last_query();exit;
        $query = $this->db->get();
        $ret = $query->result_object();

        return $ret;        
	}

	public function getDietList(){
		$this->db->select('*');
        $this->db->from('diet');
        //$this->db->where('user_type',2);
        //echo $this->db->last_query();exit;
        $query = $this->db->get();
        $ret = $query->result_object();

        return $ret;        
	}

	public function getClasstimeList(){
		$this->db->select('*');
        $this->db->from('class_time');
        //$this->db->where('user_type',2);
        //echo $this->db->last_query();exit;
        $query = $this->db->get();
        $ret = $query->result_object();

        return $ret;        
	}

	public function getColorsList(){
		$this->db->select('*');
        $this->db->from('color');
        //$this->db->where('user_type',2);
        //echo $this->db->last_query();exit;
        $query = $this->db->get();
        $ret = $query->result_object();

        return $ret;        
	}

        public function getClassList(){
        $this->db->select('*');
        $this->db->from('class_list');
        $query = $this->db->get();
        $ret = $query->result_object();

        return $ret; 
        }
}
?>