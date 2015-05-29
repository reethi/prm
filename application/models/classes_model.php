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
		$this->db->select('id, full_name,username, email');
        $this->db->from('users');
        $this->db->where('user_type',1);
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

        public function getClassListbyHealthEducator($id){
                $this->db->select('a.id as classid, class_name,c.class_time_name, COUNT(particiant_id) as particiant_count');
                $this->db->from('class_list a');
                $this->db->join('class_assignment b', 'a.id = b.class_assigned', 'left');
                $this->db->join('class_time c', 'a.class_time = c.id', 'left');
                $this->db->where('a.health_educator', $id);
                $this->db->group_by('class_name');
                $query = $this->db->get();
                $ret = $query->result_object();

                return $ret;
        }

        public function getParticiantsListbyHealthEducator($id,$particiant_id =''){
                       
                $this->db->select('a.*,a.id as userid,a.username as username,b.*,c.*,d.*,c.class_name, d.diet_name, e.username as healtheducator,e.email as healtheducator_email, f.class_time_name');
                $this->db->from('users a');
                $this->db->join('class_assignment b', 'b.particiant_id = a.id', 'left');
                $this->db->join('class_list c', 'b.class_assigned = c.id', 'left');
                $this->db->join('diet_list d', 'c.diet = d.id', 'left');
                $this->db->join('users e', 'c.health_educator = e.id', 'left');
                $this->db->join('class_time f', 'c.class_time = f.id', 'left');
                $this->db->where('c.health_educator', $id);
                if($particiant_id!='')
                    $this->db->where('a.id', $particiant_id);
                $query = $this->db->get();
                $ret = $query->result_object();

                return $ret;
        }

        public function isUserClass($class,$user){
                $this->db->select('*');
                $this->db->from('class_list');
                $this->db->where('health_educator', $user);
                $this->db->where('id', $class);
                $query = $this->db->get();
                $ret = $query->result_object();
                if(count($ret) > 0){
                  return 1;
                }else{
                  return 0;
                }
        }

        public function getClassInfoById($id){
                $this->db->select('*,COUNT(particiant_id) as particiant_count');
                $this->db->from('class_list a');
                $this->db->join('class_time b', 'a.class_time = b.id', 'left');
                $this->db->join('class_assignment c', 'a.id = c.class_assigned', 'left');
                $this->db->where('a.id', $id);
                $this->db->group_by('class_name');
                $query = $this->db->get();
                
                $ret = $query->row();
                return $ret;        
        }

        public function getParticiantsListbyclassEducator($userid,$classid,$particiant_id=''){
                       
                $this->db->select('a.*, a.id as userid, b.*,c.*');
                $this->db->from('users a');
                $this->db->join('class_assignment b', 'b.particiant_id = a.id', 'left');
                $this->db->join('class_list c', 'b.class_assigned = c.id', 'left');
                $this->db->join('diet_list d', 'c.diet = d.id', 'left');
                $this->db->where('c.health_educator', $userid);
                $this->db->where('c.id', $classid);
                if($particiant_id!='')
                    $this->db->where('a.id', $particiant_id);

                $query = $this->db->get();
                $ret = $query->result_object();

                return $ret;
        }


        
}
?>