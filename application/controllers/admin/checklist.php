<?php defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
class Checklist extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("user");
        $this->load->model("class_assign");
        $this->load->library("session");
        $this->load->helper(array('form', 'url','app'));
        $this->load->library('form_validation');
        
        if(@$this->session->userdata['email']=='')
        {
            redirect(base_url());
        }
    } 
 
 
/*******************************Admin Panel data*******************************/
    public function index(){

    }

    public function create(){
        $data['title'] = $this->input->post('title', true);
        $data['url'] = $this->input->post('url', true);
        $data['start_date'] = $this->input->post('start_date', true);
        $data['end_date'] = $this->input->post('end_date', true);

        $insert = $this->class_assign->insertChecklist($data);        
        
        if($insert)
            echo json_encode(array('success'=>1));
        else
            echo json_encode(array('success'=>2));
    }
    
    public function create_class(){
        $data=$_POST;
        $return = $this->user->create_class($data);
        if($return==1)
        {
            $redirect = base_url().'index.php/admin/dashboard/alert/created_class';
        }
        else{
            $redirect = base_url().'index.php/admin/dashboard/alert/create_class_failure';
        }
        header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
        exit;
    }
}