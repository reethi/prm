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
        $this->load->model("classes_model");
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
        $data['videos'] = $this->survey_model->getVideos();  
        $data['docs'] = $this->survey_model->getDocs();
        $classid = $this->input->get('classid');
        //echo "hi";print_r($classid);exit;
        $userid  = $this->session->userdata['user_id'];
        $user_class_check = $this->classes_model->isUserClass($classid,$userid);
       /* if(!$user_class_check){
          redirect(base_url().'index.php/admin/dashboard/index'); 
        } */

        $where_participantdetails=array('user_type' => '2');
        $data['participant_details']= $this->user->getParticipantsDetails('users','*',$where_participantdetails);
        //echo "<pre>";print_r($data);exit;
        $data['class_details']= $this->user->getClassDetails('class_names');$where=array('user_type' => '2');
        $data['health_educator']= $this->user->getClassDetails('users',$where); 
        $data['diet']= $this->user->getClassDetails('diet');
        $data['color']= $this->user->getClassDetails('color');
        $data['class_time']= $this->user->getClassDetails('class_time');
        $data['location']= $this->user->getClassDetails('location');
        $data['class_info'] = $this->classes_model->getClassInfoById($classid);
        $data['classblock'] = $this->load->view('admin/classblock',$data,true);
        $data['quicktools_participant'] = $this->load->view('admin/quicktools_participant','',true);
        $data['quicktools_weight'] = $this->load->view('admin/quicktools_weight','',true);
        $data['quicktools_attendance'] = $this->load->view('admin/quicktools_attendance',$data,true);
        $data['class_averages'] = $this->load->view('admin/class_averages','',true);
        $data['class_participants'] = $this->load->view('admin/class_participants','',true);
        $data['quicktools_doc'] = $this->load->view('admin/quicktools_doc','',true);
        $data['quicktools_video'] = $this->load->view('admin/quicktools_video',$data,true);
        $data['create_checklist'] = $this->load->view('admin/create_checklist','',true);
        $data['create_class'] = $this->load->view('admin/create_class',$data,true);
        
        render_with_layout('admin/classinfo',$data,'newadmin');
    }
    public function participant()
    {
      $participantid = $this->input->get('participantid');
      $data['title']="Check List";
      $data['action']="participants";
      $classid = $this->input->get('classid');    
        $userid  = $this->session->userdata['user_id'];   
        $particiantinfo = $this->classes_model->getParticiantsListbyHealthEducator($userid,$participantid);   
       /* if(count($particiantinfo) == 0){    
            redirect(base_url().'index.php/admin/dashboard/index');     
        } */  
      
        //$data['participants'] = $particiantinfo[0];   
        //echo "<pre>";print_r($data['participants']);exit;   
        //$data['participant_docs']=$this->session->userdata('participant_details');
      //echo "<pre>";print_r($data['participant_docs']);exit;
      $data['participant_docs']=$this->session->userdata('participant_details');
     // echo "<pre>";print_r($data['participant_docs']);exit;
      //$where=array('user_id' => $data['participant_docs'][0]['id']);
     // print_r($this->session->all_userdata());exit;
       $where=array('user_id' => $data['participant_docs'][0]['id']);
      $where1=array('u.id' => $data['participant_docs'][0]['id'], 'f.file_type' => 'application/pdf');
      $where2=array('u.id' => $data['participant_docs'][0]['id'], 'f.file_type' => 'video/mp4');

    // print_r($where);exit;
       $data['videos'] = $this->survey_model->getVideos_push($where2);  
        $data['docs'] = $this->survey_model->getDocs_push($where1);
       
        //echo "<pre>";print_r($data['videos']);exit;

        $data['class_details']= $this->user->getClassDetails('class_names');$where=array('user_type' => '2');
        $data['health_educator']= $this->user->getClassDetails('users',$where); 
        $data['diet']= $this->user->getClassDetails('diet');
        $data['color']= $this->user->getClassDetails('color');
        $data['class_time']= $this->user->getClassDetails('class_time');
        $data['location']= $this->user->getClassDetails('location');
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
      $data['create_class'] = $this->load->view('admin/create_class',$data,true);

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
        $participant_details= $this->user->myparticipants_details('users','*',$where_participantdetails);
        //print_r($participant_details);exit;
        $user = objectToArray($participant_details);
        //print_r($user);exit;
       
     // echo "<pre>";print_r($user);exit;
        $this->session->set_userdata('participant_details',$user);
        //print_r($this->session->userdata('participant_details'));exit;
        $redirect = base_url().'index.php/admin/cohort/participant';      
        header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));      
        exit;  
      }
     else{

        $data['videos'] = $this->survey_model->getVideos();  
        $data['docs'] = $this->survey_model->getDocs();
        $where_participantdetails=array('user_type' => '0');
        $data['participant_details']= $this->user->getParticipantsDetails('users','*',$where_participantdetails);
        //echo "<pre>";print_r($data);exit;
        $data['class_details']= $this->user->getClassDetails('class_names');$where=array('user_type' => '2');
        $data['health_educator']= $this->user->getClassDetails('users',$where); 
        $data['diet']= $this->user->getClassDetails('diet');
        $data['color']= $this->user->getClassDetails('color');
        $data['class_time']= $this->user->getClassDetails('class_time');
        $data['location']= $this->user->getClassDetails('location');
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