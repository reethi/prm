<?php defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
class Cohort extends CI_Controller
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
        $data['title']="Update Profile";
        $data['action']="class";
        $where_participantdetails=array('user_type' => '0');
        $data['participant_details']= $this->user->getParticipantsDetails('admin','username,email',$where_participantdetails);
        //echo "<pre>";print_r($data);exit;
        $data['class_details']= $this->user->getClassDetails('classes');//echo "<pre>";print_r($data);exit;
        $data['classblock'] = $this->load->view('admin/classblock',$data,true);
        $data['quicktools_participant'] = $this->load->view('admin/quicktools_participant','',true);
        $data['quicktools_weight'] = $this->load->view('admin/quicktools_weight','',true);
        $data['quicktools_attendance'] = $this->load->view('admin/quicktools_attendance',$data,true);
        $data['class_averages'] = $this->load->view('admin/class_averages','',true);
        $data['class_participants'] = $this->load->view('admin/class_participants','',true);
        $data['quicktools_doc'] = $this->load->view('admin/quicktools_doc','',true);
        $data['quicktools_video'] = $this->load->view('admin/quicktools_video','',true);
        $data['create_checklist'] = $this->load->view('admin/create_checklist','',true);
        $data['create_class'] = $this->load->view('admin/create_class',$data,true);
        
        render_with_layout('admin/classinfo',$data,'newadmin');
    }
    public function participant()
    {
      $data['login'] = $this->input->get('login');
      $data['title']="Check List";
      $data['action']="participants";
      $data['participant_docs']=$this->session->userdata('participant_details');
    

      $this->load->view('admin/participant_documents',$data,true);
      //print_r($this->session->userdata('participant_details'));exit;
     // echo "<pre>";print_r($data['participant_docs']);exit;
      $data['participantprofile'] = $this->load->view('admin/participantprofile',$data,true);
      $data['checklist'] = $this->load->view('admin/checklist','',true);
      $data['participant_calander'] = $this->load->view('admin/participant_calander','',true);
      $data['participant_emails'] = $this->load->view('admin/participant_emails','',true);
      
      $data['participant_weight'] = $this->load->view('admin/participant_weight','',true);
      $data['quicktools_attendance'] = $this->load->view('admin/quicktools_attendance','',true);
      $data['participant_videos'] = $this->load->view('admin/participant_videos',$data,true);
      $data['participant_documents'] = $this->load->view('admin/participant_documents',$data,true);
      $data['participant_questions'] = $this->load->view('admin/participant_questions','',true);
      $data['quicktools_weight'] = $this->load->view('admin/quicktools_weight','',true);
      $data['quicktools_doc'] = $this->load->view('admin/quicktools_doc','',true);
      $data['quicktools_video'] = $this->load->view('admin/quicktools_video','',true);
      $data['quicktools_participant'] = $this->load->view('admin/quicktools_participant','',true);
      $data['create_checklist'] = $this->load->view('admin/create_checklist','',true);
      $data['create_class'] = $this->load->view('admin/create_class','',true);

      render_with_layout('admin/participantinfo',$data,'newadmin');
    }
     public function checklist()
    { 
      
      $data['login'] = $this->input->get('login');
      $data['title']="Check List";
      $data['action']="participants";
      if(isset($_POST))
      {
        //print_r($_POST);
        $where_participantdetails=array('user_type' => '0',
                                        'username' => $_POST['user_name']);
       $participant_details= $this->user->getParticipantsDetails('admin','*',$where_participantdetails);
        //print_r($participant_details);exit;
        $user = objectToArray($participant_details);
        //print_r($user);exit;
        $where_participantdetails=array('user_id' => $user[0]['id']);
       $user['videos_details']= $this->user->getParticipantsDetails('upload_videos','*',$where_participantdetails);
       $user['docs_details']= $this->user->getParticipantsDetails('upload_docs','*',$where_participantdetails);
       //echo "<pre>";print_r($user['docs_details']);exit;
      
        $this->session->set_userdata('participant_details',$user);
        //print_r($this->session->userdata('participant_details'));exit;
        $redirect = base_url().'index.php/admin/cohort/participant';      
        header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));      
        exit;  
      }
     else{

        
      $data['class_details']= $this->user->getClassDetails('classes');
      $data['participantprofile'] = $this->load->view('admin/participantprofile',$data,true);
      $data['checklist'] = $this->load->view('admin/checklist','',true);
      $data['participant_calander'] = $this->load->view('admin/participant_calander','',true);
      $data['participant_emails'] = $this->load->view('admin/participant_emails','',true);
      
      $data['participant_weight'] = $this->load->view('admin/participant_weight','',true);
      $data['quicktools_attendance'] = $this->load->view('admin/quicktools_attendance',$data,true);
      $data['participant_videos'] = $this->load->view('admin/participant_videos','',true);
      $data['participant_documents'] = $this->load->view('admin/participant_documents','',true);
      $data['participant_questions'] = $this->load->view('admin/participant_questions','',true);
      $data['quicktools_weight'] = $this->load->view('admin/quicktools_weight','',true);
      $data['quicktools_doc'] = $this->load->view('admin/quicktools_doc','',true);
      $data['quicktools_video'] = $this->load->view('admin/quicktools_video','',true);
      $data['quicktools_participant'] = $this->load->view('admin/quicktools_participant','',true);
      $data['create_checklist'] = $this->load->view('admin/create_checklist','',true);
      $data['create_class'] = $this->load->view('admin/create_class',$data,true);

      render_with_layout('admin/participantinfo',$data,'newadmin');
     }
      
    }
}