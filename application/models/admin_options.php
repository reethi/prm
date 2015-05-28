<?php
class Admin_options extends CI_model {

	protected $table = "javascript_tools";
	public $table1="save_query";
	
	function __construct() {
		parent::__construct();
	//$this->load->database('adhoc', TRUE);	
	}
	
	public function getDetails(){
		$query = $this->db->get_where($this->table, array('id'=>1));
		$user = $query->row();
		return $user;
	}
		
	public function run_query($query){
		$result = $this->db->query($query);
		$data = $result->result();
		return $data;
		//$close = $this->db->close();
	}

	public function insert_query(){
		$data['query'] = $this->input->post('query');
		$data = array('query' => $data['query']);

		$this->db->insert('save_query', $data); 
	}
	
	public function get_save_queries(){
			//$this->db->distinct();
			//$this->db->select('query');
			$query=$this->db->get($this->table1); 
            $result = $query->result_object();
		    return $result;
		    if ($query->num_rows() > 0) 
		    {
				foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	
	public function run_save_queries()
	{
		
		$id=$this->input->get('id');
		//$query_display=$this->db->('select query from save_query where id='$id' ');
		//echo $query_display;

		$query = $this->db->get_where('save_query', array('id' => $id));

		$result = $query->result_object();
		    return $result;
		    if ($query->num_rows() > 0) 
		    {
				foreach ($query->result() as $row) {
				$data[] = $row;
			}
			print_r($data);

			return $data;
			
		}
		return false;

	}


}