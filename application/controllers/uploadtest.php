<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploadtest extends CI_Controller {

    public function __construct() {
        parent::__construct();
	    $this->load->model('user');
        $this->load->helper('render');
	    $this->load->helper('cookie');
	    $this->load->library("session");
    }

    public function index(){
        $data = array();
        $this->load->view('fileupload');
    }

    public function uploadfile(){
        $config['upload_path'] = 'assets/files/'; 
        $config['allowed_types'] = 'gif|jpg|png';   
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('study_file')) {
              $error = array('error' => $this->upload->display_errors());
              echo "<pre>";print_r($error);exit();
             
        } else {
            echo "File Uploaded";
        }

    }
   
}