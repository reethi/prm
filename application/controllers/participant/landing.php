<?php defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
class Landing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("user");
        $this->load->model("survey_model");
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
        $data['title']="Dashboard";
        $data['action']="dashboard";
        
        $data['participantprofile'] = $this->load->view('participant/participantprofile','',true);
        $data['checklist'] = $this->load->view('participant/checklist','',true);
        $data['participant_calander'] = $this->load->view('participant/participant_calander','',true);
        $data['participant_emails'] = $this->load->view('participant/participant_emails','',true);
        
        $data['participant_weight'] = $this->load->view('participant/participant_weight','',true);
        $data['participant_videos'] = $this->load->view('participant/participant_videos','',true);
        $data['participant_documents'] = $this->load->view('participant/participant_documents','',true);
        $data['participant_questions'] = $this->load->view('participant/participant_questions','',true);
        
        render_with_layout('participant/landing',$data,'participant');
    }
    
}