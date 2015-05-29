<?php defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
class Myparticipants extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("user");
        $this->load->model("survey_model");
        $this->load->library('RestCallRequest');
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
        $data['action']="participants";
        
        $data['videos'] = $this->survey_model->getVideos();  
        $data['docs'] = $this->survey_model->getDocs();
        $where_participantdetails=array('user_type' => '0');
        $data['participant_details']= $this->user->getParticipantsDetails('users','*',$where_participantdetails);
         $where_participantdetails=array('users.user_type' => '0');
        $data['myparticipants_details']= $this->user->myparticipants_details('users users','users.*,c.class_name',$where_participantdetails);
       // print_r($data['myparticipants_details']);exit;
        $data['class_details']= $this->user->getClassDetails('class_names');
        $where=array('user_type' => '2');
        $data['health_educator']= $this->user->getClassDetails('users',$where); 
        $data['diet']= $this->user->getClassDetails('diet');
        $data['color']= $this->user->getClassDetails('color');
        $data['class_time']= $this->user->getClassDetails('class_time');
        $data['location']= $this->user->getClassDetails('location');
        //$data['participant_details']= $this->user->participant_Details();
        //echo "<pre>";print_r($data['participant_details']);exit;
        $data['class_participants'] = $this->load->view('admin/class_participants',$data,true);
        
        $data['quicktools_doc'] = $this->load->view('admin/quicktools_doc','',true);
        $data['quicktools_video'] = $this->load->view('admin/quicktools_video','',true);
        $data['quicktools_weight'] = $this->load->view('admin/quicktools_weight','',true);
        $data['quicktools_attendance'] = $this->load->view('admin/quicktools_attendance',$data,true);
        $data['quicktools_participant'] = $this->load->view('admin/quicktools_participant','',true);
        $data['create_checklist'] = $this->load->view('admin/create_checklist','',true);
        $data['create_class'] = $this->load->view('admin/create_class',$data,true);
        
        render_with_layout('admin/participants_intro',$data,'newadmin');
    }

    private function redcapFetch(){
        $records = array();
        $events = array();
        $fields = array();
        $forms = array();

        $fields = array('study_id',
                        'redcap_event_name',
                        'old_record_id',
                        'scr_firstname',                    
                        'scr_middlename',
                        'scr_lastname',
                        'scr_nickname',
                        'mrn',
                        'scr_gender',
                        'scr_dob',
                        'scr_mail_street',
                        'scr_mail_city',
                        'scr_mail_state',
                        'scr_mail_zip',
                        'scr_work',
                        'scr_home',
                        'scr_cell','scr_email','random_cohort');

        # an array containing all the elements that must be submitted to the API
        $resp_data = array('content' => 'record', 'type' => 'flat', 'format' => 'json', 'records' => $records,
        'fields' => $fields, 'forms' => $forms, 'exportSurveyFields'=>'false', 'exportDataAccessGroups'=>'false', 
            'token' => REDCAPTOKEN);

        $request = new RestCallRequest(REDCAP_URL."api/", 'POST', $resp_data);

        $request->execute();

        $response = $request->getResponseInfo();
       // echo "<pre>";print_r($response);exit;
        $type = explode(";", $response['content_type']);
        $contentType = $type[0];

        $resp  = $request->getResponseBody();
        $array = json_decode($resp);
        //echo "<pre>";print_r($array);exit;
        $final_array = array();

        foreach ($array as $key => $value) {
            //if($value->redcap_event_name == 'screening_arm_1'){
                $final_array[$value->study_id] = $value;
            //}

            //if($value->redcap_event_name == 'baseline_arm_1'){
                if(isset($final_array[$value->study_id])){
                    $final_array[$value->study_id]->random_cohort = $value->random_cohort;
                }
            //}

        }
        //echo "<pre>";print_r($final_array);exit;
        if(count($final_array)>0){
           // $insert = $this->insertParticipantsList($final_array);
        }   

        return $final_array;
    }
}
