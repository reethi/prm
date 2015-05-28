<?php
class Class_assign extends CI_model {
	
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('datatable');
        $this->load->library("session");

    }

    public function getClassList($id){
        $this->db->select('a.*, b.*');
        $this->db->from('class_assignment as a');
        $this->db->join('class_names as b', 'a.class_assigned = b.id');
        $this->db->where('a.health_educator', $id);
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        $ret = $query->result_array();
        return $ret;
    }
    
    public function insertChecklist($data){
        try{
            $this->db->trans_begin();
            $useradd=$this->db->insert('checklist',$data);
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return 0;
            }else{
                $this->db->trans_commit();
                return 1;
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return 0;
        }   
    }
}