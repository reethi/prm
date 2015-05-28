<?php defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("user");
        $this->load->model("survey_model");
        $this->load->model("classes_model");
        
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
        $email = $this->session->userdata('email');
        $admin['values']= $this->user->getUserByEmail($email);
       
        $admin['editlink'] = 1;
        $where_participantdetails=array('user_type' => '2');
        
        $data['participant_details']= $this->user->getParticipantsDetails('users','*',$where_participantdetails);
        //echo"<pre>";print_r($data['participant_details']);exit;
        $admin['classes'] = $this->classes_model->getClassById($admin['values']->id);
        $class['health_educator'] = $this->classes_model->getEducatorsList();
        $class['locations'] = $this->classes_model->getLocationList();
        $class['diets'] = $this->classes_model->getDietList();
        $class['class_times'] = $this->classes_model->getClasstimeList();
        $class['colors'] = $this->classes_model->getColorsList();
        $attendance['classes'] = $this->classes_model->getClassList();
        $attendance['participant_details'] = $this->user->getParticipantsList($where_participantdetails);

        $data['adminprofile'] = $this->load->view('admin/adminprofile',$admin,true);
        $data['quicktools'] = $this->load->view('admin/quicktools','',true);
        $data['quicktools_participant'] = $this->load->view('admin/quicktools_participant','',true);
        $data['quicktools_weight'] = $this->load->view('admin/quicktools_weight','',true);
        $data['quicktools_attendance'] = $this->load->view('admin/quicktools_attendance',$attendance,true);
        $data['quicktools_doc'] = $this->load->view('admin/quicktools_doc',$data,true);
        $data['quicktools_video'] = $this->load->view('admin/quicktools_video','',true);
        $data['quicktools_push'] = $this->load->view('admin/quicktools_push',$data,true);
        
        $data['classdata'] = $this->load->view('admin/classdata','',true);
        $data['classlist'] = $this->load->view('admin/classlist','',true);
        $data['participantslist'] = $this->load->view('admin/participantslist','',true);
        $data['create_checklist'] = $this->load->view('admin/create_checklist','',true);

        $data['create_class'] = $this->load->view('admin/create_class',$class,true);

        
        render_with_layout('admin/dashboard',$data,'newadmin');
    }
    
    public function admin_update(){
        $data['title']="Dashboard";
        $data['action']="dashboard";
        $email = $this->session->userdata('email');
        $admin['values']= $this->user->getUserByEmail($email);
        $admin['editlink'] = 1;
        $admin['classes'] = $this->classes_model->getClassById($admin['values']->id);
                
        $data['adminprofile'] = $this->load->view('admin/adminprofile',$admin,true);

        $data['quicktools_doc'] = $this->load->view('admin/quicktools_doc','',true);
        $data['quicktools_video'] = $this->load->view('admin/quicktools_video','',true);
        $data['quicktools_weight'] = $this->load->view('admin/quicktools_weight','',true);
        $data['quicktools_attendance'] = $this->load->view('admin/quicktools_attendance',$data,true);
        $data['quicktools_participant'] = $this->load->view('admin/quicktools_participant','',true);
        $data['create_checklist'] = $this->load->view('admin/create_checklist','',true);
        $data['create_class'] = $this->load->view('admin/create_class',$data,true);

        
        render_with_layout('admin/admin_update',$data,'newadmin');
    }
    public function edit_profile(){

        $allowedExts = array("jpg", "jpeg", "gif", "png");
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if (($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/gif")
         && ($_FILES["file"]["size"] < 20000000)
            && in_array($extension, $allowedExts))  {
              if ($_FILES["file"]["error"] > 0) {
               // echo "hi";exit;
                $redirect = base_url().'index.php/admin/dashboard/alert/upload_image_failure';
                         header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                            exit;
                }
                 else
                  { 
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                    "assets/images/" . $_FILES["file"]["name"]);
                    $data['full_name']  = $this->input->post('admin_name', true);
                    $data['email']      = $this->input->post('admin_email', true);
                    $data['work_phone']      = $this->input->post('admin_phone', true);
                    $data['profile_pic'] = $_FILES['file']['name'];
                    
                    $new_password           = $this->input->post('admin_new_password', true);
                    $admin_old_password     = $this->input->post('admin_old_password', true);
                   // echo $admin_old_password;exit;
                   // print_r($data);exit;
                    $success = 1;
                    if($admin_old_password!=''){

                        $email_list = $this->user->getUserByEmail($data['email']);
                       // echo "<pre>";print_r($email_list);exit();
                        $exist_password = $email_list->password;
                       // echo md5($admin_old_password);echo "<br>"; echo $exist_password;exit;
                        if($admin_old_password != '' && md5($admin_old_password) == $exist_password){
                            
                            $data['password'] = md5($new_password);
                            $update = $this->user->UpdateProfilebyEmail($data,$data['email']);
                            $success = $update;
                           // echo $update;exit;
                        $redirect = base_url().'index.php/admin/dashboard/admin_update/Update_Success';
                        header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                            exit;
                        }else{
                            $success = 0;
                        $redirect = base_url().'index.php/admin/dashboard/admin_update/Update_failed';
                        header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                            exit;
                        }  
                    }
                    else{
                        $success = 0;
                        $redirect = base_url().'index.php/admin/dashboard/admin_update/Update_failed';
                        header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                            exit;
                    }    
                    
            }  
                
        } 
        else{
                $success = 0;
                $redirect = base_url().'index.php/admin/dashboard/admin_update/Update_failed';
                header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                exit;
            }        
    }
    public function delete_profile(){
        $data=$_POST;
        $data['profile_pic']='profile_image.png';
        $return=$this->user->delete_profile($data);
        if($return==1)
        {
        $redirect = base_url().'index.php/admin/dashboard/admin_update/delete_Success';
                        header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                            exit;
        }
        else{
            $redirect = base_url().'index.php/admin/dashboard/admin_update/delete_failed';
                        header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                            exit;
        }
    }
    public function admin_update_details(){
        $data['full_name']  = $this->input->post('admin_name', true);
        $data['email']      = $this->input->post('admin_email', true);
        $data['work_phone']      = $this->input->post('admin_phone', true);
        
        $new_password           = $this->input->post('admin_new_password', true);
        $admin_old_password     = $this->input->post('admin_old_password', true);

        $success = 1;
        if($new_password!=''){

            $email_list = $this->user->getUserByEmail($data['email']);
            //echo "<pre>";print_r($email_list);exit();
            $exist_password = $email_list->password;
            
            if($admin_old_password != '' && md5($admin_old_password) == $exist_password){
                
                $data['password'] = md5($new_password);
                $update = $this->user->UpdateProfilebyEmail($data,$data['email']);
                $success = $update;
            }else{
                $success = 0;
            }      
        }else{
            $update = $this->user->UpdateProfilebyEmail($data,$data['email']);
            $success = $update;
        }
        
        echo json_encode(array('success'=>$success));
    }
    
    
    public function participants()
    {
        $data['login'] = 0;
        $data['title']="Participants";
        $data['action']="Participants";
        render_with_layout('admin/participants',$data,'admin');
    }
    public function update_info(){
     
        $id = $this->session->userdata('user_id');
        $email = $this->session->userdata('email');
        $userdets = $this->user->getUserByEmail($email);
        $data['first_name'] = $this->input->post('first_name', true);
        $data['last_name'] = $this->input->post('last_name', true);
        $data['address']  = $this->input->post('address', true);
        $data['city']     = $this->input->post('city', true);
        $data['state']    = $this->input->post('state', true);
        $data['zip']    = $this->input->post('zip', true);
        $data['phone']    = $this->input->post('phone', true);
        $data['email']    = ($this->input->post('email', true)=='')?$email:$this->input->post('email', true); 
     
        $new_password = $this->input->post('new_password', true);
        if($new_password!=''){
            $data['password'] = md5($new_password);
        }
        $update = $this->user->UpdateProfile($data,$id);
        if($update){
            redirect('/admin/dashboard');
        }else{
            redirect('/admin/dashboard/admin_update_details');
        }
    }
    
    public function create_class(){
        //$data['full_name'] = $this->input->post('participant_name', true);

        $data=$_POST;
        //echo "<pre>";print_r($data);exit();
        $return = $this->user->create_class($data);
        
        if($return==1)
        {
            //$redirect = base_url().'index.php/admin/dashboard/alert/created_class';
            echo json_encode(array('success'=>1));
        }
        else if($return==2)
        {
            //$redirect = base_url().'index.php/admin/dashboard/alert/created_class_exists';
            echo json_encode(array('success'=>2));
        }
        else{
            //$redirect = base_url().'index.php/admin/dashboard/alert/create_class_failure';
            echo json_encode(array('success'=>3));
        }
    }
    
    public function alert()
    {
        $data['title']="Dashboard";
        $data['action']="dashboard";
        $email = $this->session->userdata('email');
        $data['values']= $this->user->getUserByEmail($email);
        $data['editlink'] = 1;
        $where=array('file_type' => 'video/mp4');
        $data['videos'] = $this->survey_model->getVideos($where);
        $where=array('file_type' => 'application/pdf');  
        $data['docs'] = $this->survey_model->getDocs($where);
        $where_participantdetails=array('user_type' => '2');
        $data['participant_details']= $this->user->getParticipantsDetails('users','username,email',$where_participantdetails);
        //echo "<pre>";print_r($data);exit;
        $data['class_details']= $this->user->getClassDetails('class_names');
        $where=array('user_type' => '2');
        
        $data['health_educator']= $this->user->getClassDetails('users',$where);
        $data['diet']= $this->user->getClassDetails('diet');
        $data['color']= $this->user->getClassDetails('color');
        $data['class_time']= $this->user->getClassDetails('class_time');
        $data['location']= $this->user->getClassDetails('location');
        $data['adminprofile'] = $this->load->view('admin/adminprofile',$data,true);
        $data['quicktools'] = $this->load->view('admin/quicktools','',true);
        $data['quicktools_participant'] = $this->load->view('admin/quicktools_participant','',true);
        $data['quicktools_weight'] = $this->load->view('admin/quicktools_weight','',true);
        $data['quicktools_attendance'] = $this->load->view('admin/quicktools_attendance',$data,true);
        $data['quicktools_doc'] = $this->load->view('admin/quicktools_doc','',true);
        $data['quicktools_video'] = $this->load->view('admin/quicktools_video','',true);
        $data['quicktools_push'] = $this->load->view('admin/quicktools_push','',true);
        
        $data['classdata'] = $this->load->view('admin/classdata','',true);
        $data['classlist'] = $this->load->view('admin/classlist','',true);
        $data['participantslist'] = $this->load->view('admin/participantslist','',true);
        $data['create_checklist'] = $this->load->view('admin/create_checklist','',true);
        $data['create_class'] = $this->load->view('admin/create_class',$data,true);
        $data['create_class'] = $this->load->view('admin/admin_update',$data,true);
        
        render_with_layout('admin/dashboard',$data,'newadmin');

    }
    public function push_data(){        
        $data['videos'] = $this->survey_model->push_data();     
        if($result = 1){        
                   
                $redirect = base_url().'index.php/admin/dashboard/alert/push_success'; 
                header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));      
                    exit;       
            }       
            else{       
                $redirect = base_url().'index.php/admin/dashboard/alert/push_failure'; 
                header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));      
                    exit;       
            }       
                 
        //$this->load->view('admin/index',$data);       
    }
public function upload() {
    $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (($_FILES["file"]["type"] == "video/mp4") && ($_FILES["file"]["size"] < 20000000)
        && in_array($extension, $allowedExts))  {
          if ($_FILES["file"]["error"] > 0) {
            $redirect = base_url().'index.php/admin/dashboard/alert/video_failure';
                     header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                        exit;
            }
            else
              { 
                move_uploaded_file($_FILES["file"]["tmp_name"],
                "uploads/videos/" . $_FILES["file"]["name"]);
              //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
                $data['files']=$_FILES["file"]["name"];
                $data['type']=$_FILES["file"]["type"];
                $data['user_id'] = $this->session->userdata('user_id');
                //echo($data);
                $data['url'] = $this->input->post('url');
                $data['title'] = $this->input->post('title');
                $result = $this->survey_model->save_files($data);
                //echo $result;exit;
                if($result == 1){
                    
                    $redirect = base_url().'index.php/admin/dashboard/alert/video_success';
                    header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));      
                        exit;  
                }
                else{
                    $redirect = base_url().'index.php/admin/dashboard/alert/video_exists';
                     header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                        exit; 
                }
               
              }
            }
            else{ $redirect = base_url().'index.php/admin/dashboard/alert/video_failure';
                     header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                        exit;
            }
        }


   public function do_upload()
    {
        
    
    $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma", "pdf");
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (($_FILES["file"]["type"] == "application/pdf")&& ($_FILES["file"]["size"] < 20000000)
        && in_array($extension, $allowedExts)){
        if ($_FILES["file"]["error"] > 0) {
            $redirect = base_url().'index.php/admin/dashboard/alert/doc_failure';
                     header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                        exit;
        }
        else
        {
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "uploads/docs/" . $_FILES["file"]["name"]);
          //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
           
             $data['files']=$_FILES["file"]["name"];
             $data['type']=$_FILES["file"]["type"];
            $data['user_id'] = $this->session->userdata('user_id');
            //echo "<pre>";print_r($_FILES);exit;
            $result = $this->survey_model->save_files($data);
            //echo $result;exit;
            if($result == 1){
               
                $redirect = base_url().'index.php/admin/dashboard/alert/doc_success';
                 header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
            }
            else if($result == 'updated'){
                $redirect = base_url().'index.php/admin/dashboard/alert/doc_exists';
                header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
            }
            else{
                $redirect = base_url().'index.php/admin/dashboard/alert/doc_failure';
                     header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                        exit;
            }
        }
    }
    else{ $redirect = base_url().'index.php/admin/dashboard/alert/doc_failure';
                     header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                        exit;
        }
}
public function do_upload_edit()
    {
        
    
    $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma", "pdf");
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (($_FILES["file"]["type"] == "application/pdf")&& ($_FILES["file"]["size"] < 20000000)
        && in_array($extension, $allowedExts)){
        if ($_FILES["file"]["error"] > 0) {
            $redirect = base_url().'index.php/admin/dashboard/alert/doc_failure';
                     header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                        exit;
        }
        else
        {
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "uploads/docs/" . $_FILES["file"]["name"]);
          //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
           
             $data['files']=$_FILES["file"]["name"];
             $data['type']=$_FILES["file"]["type"];
            $data['user_id'] = $this->session->userdata('user_id');
            //echo "<pre>";print_r($_FILES);exit;
            $result = $this->survey_model->save_files_edit($data);
            //echo $result;exit;
            if($result == 1){
               
                $redirect = base_url().'index.php/admin/dashboard/get_doc_lists/doc_edit_success';
                 header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
            }
            
            else{
                $redirect = base_url().'index.php/admin/dashboard/get_doc_lists/doc_edit_failure';
                     header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                        exit;
            }
        }
    }
    else{ $redirect = base_url().'index.php/admin/dashboard/alert/doc_failure';
                     header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                        exit;
        }
}
public function videoUploadEdit(){
    $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (($_FILES["file"]["type"] == "video/mp4") && ($_FILES["file"]["size"] < 20000000)
        && in_array($extension, $allowedExts))  {
          if ($_FILES["file"]["error"] > 0) {
            $redirect = base_url().'index.php/admin/dashboard/alert/video_failure';
                     header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                        exit;
            }
            else
              { 
                move_uploaded_file($_FILES["file"]["tmp_name"],
                "uploads/videos/" . $_FILES["file"]["name"]);
              //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
                $data['files']=$_FILES["file"]["name"];
                $data['type']=$_FILES["file"]["type"];
                $data['user_id'] = $this->session->userdata('user_id');
                //echo($data);
                $data['url'] = $this->input->post('url');
                $data['title'] = $this->input->post('title');
                $result = $this->survey_model->save_files_edit($data);
                //echo $result;exit;
            if($result == 1){
               
                $redirect = base_url().'index.php/admin/dashboard/get_video_lists/video_edit_success';
                 header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
            }
            
            else{
                $redirect = base_url().'index.php/admin/dashboard/get_video_lists/video_edit_failure';
                     header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                        exit;
            }
        }
    }
    else{ $redirect = base_url().'index.php/admin/dashboard/alert/video_failure';
                     header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                        exit;
        }
}


    public function readCSV() {
        $aryData = array();
        $header = NULL;
        $handle = fopen(base_url().'assets/ParticipantsList.csv', "r");
        if($handle) {
            while (!feof($handle) ) {
                $aryCsvData[] = fgetcsv($handle);
                if(!is_array($aryCsvData)) {
                    continue;
                }
                if(is_null($header)) {
                    $header = $aryCsvData;
                } elseif (is_array($header) && count($header) == count($aryCsvData)) {
                    $aryData[] = array_combine($header, $aryCsvData);
                }
            
            }
                           

            //exit;
            $data_array=$this->user->insertcsvcity('users',$aryCsvData);
            //print_r($handle);
            
            fclose($handle);
        }
        return $aryData;
    }
     public function add_participant(){
        $data['full_name'] = $this->input->post('participant_name', true);
        $data['diet'] = $this->input->post('diet', true);
        $data['participant_id'] = $this->input->post('participant_id', true);
        $data['class'] = $this->input->post('class_name', true);
        $data['address'] = $this->input->post('address', true);
        $data['work_phone'] = $this->input->post('phone', true);
        $data['email'] = $this->input->post('email', true);
        $data['user_type'] = 0;
        $data['password'] = md5('Admin123');

        $insert=$this->user->addUser($data);
        
        if($insert!=0)
            echo json_encode(array('success'=>1));
        else
            echo json_encode(array('success'=>0));
    }
    public function create_attendance()
    {
        //echo "<pre>";print_r($_POST);exit; 
        $data = $_POST;

        $insert=$this->user->addAttendance($data);
        
        if($insert!=0)
            echo json_encode(array('success'=>1));
        else
            echo json_encode(array('success'=>0));

    }
    public function get_doc_lists(){
        $data['title']="Document List";
        $data['action']="docslist";
         //echo "<pre>";print_r($users['users_list']);exit;
         $where=array('file_type' => 'video/mp4');
        $data['videos'] = $this->survey_model->getVideos($where);  
        $where=array('file_type' => 'application/pdf');  
        $data['docs'] = $this->survey_model->getDocs($where);
        $where_participantdetails=array('user_type' => '0');
        $data['participant_details']= $this->user->getParticipantsDetails('users','username,email',$where_participantdetails);
        //echo "<pre>";print_r($data);exit;
        $data['class_details']= $this->user->getClassDetails('class_names');$where=array('user_type' => '2');
        $data['health_educator']= $this->user->getClassDetails('users',$where); 
        $data['diet']= $this->user->getClassDetails('diet');
        $data['color']= $this->user->getClassDetails('color');
        $data['class_time']= $this->user->getClassDetails('class_time');
        $data['location']= $this->user->getClassDetails('location');
        $data['participant_details']= $this->user->participant_Details();
        //echo "<pre>";print_r($data['participant_details']);exit;
        //$data['class_participants'] = $this->load->view('admin/class_participants',$data,true);
        
        $data['quicktools_doc'] = $this->load->view('admin/quicktools_doc',$data,true);
        $data['quicktools_video'] = $this->load->view('admin/quicktools_video','',true);
        $data['quicktools_weight'] = $this->load->view('admin/quicktools_weight','',true);
        $data['quicktools_attendance'] = $this->load->view('admin/quicktools_attendance',$data,true);
        $data['quicktools_participant'] = $this->load->view('admin/quicktools_participant','',true);
        $data['create_checklist'] = $this->load->view('admin/create_checklist','',true);
        $data['create_class'] = $this->load->view('admin/create_class',$data,true);
        
        render_with_layout('admin/listing_intro.php',$data,'newadmin');
        $where=array('file_type' => 'application/pdf');  
        $data['result'] = $this->survey_model->getDocs($where);
       // $ret['result']=$this->survey_model->getDocs();
            //print_r($ret);exit;
        $data['docs_list'] = $this->load->view('admin/doc_list',$data);

                
    }
    public function get_video_lists(){
        $data['title']="Videos List";
        $data['action']="videoslist";
         //echo "<pre>";print_r($users['users_list']);exit;
         $where=array('file_type' => 'video/mp4');
        $data['videos'] = $this->survey_model->getVideos($where);
        $where=array('file_type' => 'application/pdf');  
        $data['docs'] = $this->survey_model->getDocs($where);
        $where_participantdetails=array('user_type' => '0');
        $data['participant_details']= $this->user->getParticipantsDetails('users','username,email',$where_participantdetails);
        //echo "<pre>";print_r($data);exit;
        $data['class_details']= $this->user->getClassDetails('class_names');$where=array('user_type' => '2');
        $data['health_educator']= $this->user->getClassDetails('users',$where); 
        $data['diet']= $this->user->getClassDetails('diet');
        $data['color']= $this->user->getClassDetails('color');
        $data['class_time']= $this->user->getClassDetails('class_time');
        $data['location']= $this->user->getClassDetails('location');
        $data['participant_details']= $this->user->participant_Details();
        //echo "<pre>";print_r($data['participant_details']);exit;
        //$data['class_participants'] = $this->load->view('admin/class_participants',$data,true);
        
        $data['quicktools_doc'] = $this->load->view('admin/quicktools_doc','',true);
        $data['quicktools_video'] = $this->load->view('admin/quicktools_video','',true);
        $data['quicktools_weight'] = $this->load->view('admin/quicktools_weight','',true);
        $data['quicktools_attendance'] = $this->load->view('admin/quicktools_attendance',$data,true);
        $data['quicktools_participant'] = $this->load->view('admin/quicktools_participant','',true);
        $data['create_checklist'] = $this->load->view('admin/create_checklist','',true);
        $data['create_class'] = $this->load->view('admin/create_class',$data,true);
        
        render_with_layout('admin/listing_intro.php',$data,'newadmin');
        $where=array('file_type' => 'video/mp4');
        $data['result'] = $this->survey_model->getVideos($where);
       // $ret['result']=$this->survey_model->getVideos();
            //print_r($ret);exit;
        $data['videos_list'] = $this->load->view('admin/videos_list',$data);

                
    }
    public function edit_docs(){
        $data=$_POST;
        $where=array('id'=>$data['id'],
                    'file_type' => 'application/pdf');
        $data['result']=$this->survey_model->getDocs($where);
        if(isset($data['result'][0]) && count($data['result'][0])>0)
        {
            $this->session->set_userdata('edit_docs',$data['result']);
                $redirect = base_url().'index.php/admin/dashboard/get_doc_lists/doc_edit_popup';
                 header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
        }
        else{
                $redirect = base_url().'index.php/admin/dashboard/get_doc_lists/doc_edit_failure';
                header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
            }
        //print_r($data['result']);exit;
    }
    public function edit_videos(){
        $data=$_POST;
        $where=array('id'=>$data['id'],
                    'file_type' => 'video/mp4');
        $data['result']=$this->survey_model->getVideos($where);
        //print_r($data);exit;
        if(isset($data['result'][0]) && count($data['result'][0])>0)
        {
            $this->session->set_userdata('edit_videos',$data['result']);
                $redirect = base_url().'index.php/admin/dashboard/get_video_lists/video_edit_popup';
                 header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
        }
        else{
                $redirect = base_url().'index.php/admin/dashboard/get_video_lists/video_edit_failure';
                header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
            }
        //print_r($data['result']);exit;
    }
    public function delete_docs(){
        $data=$_POST;
        $where=array('id'=>$data['id'],
                    'file_type' => 'application/pdf');
        $data['result']=$this->survey_model->getDocs($where);
        if(isset($data['result'][0]) && count($data['result'][0])>0)
        {
            $this->session->set_userdata('edit_docs',$data['result']);
                $redirect = base_url().'index.php/admin/dashboard/get_doc_lists/doc_delete_popup';
                 header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
        }
        else{
                $redirect = base_url().'index.php/admin/dashboard/get_doc_lists/doc_delete_failure';
                header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
            }
    }
    public function delete_videos(){
        $data=$_POST;
        $where=array('id'=>$data['id'],
                    'file_type' => 'video/mp4');
        $data['result']=$this->survey_model->getVideos($where);
        if(isset($data['result'][0]) && count($data['result'][0])>0)
        {
            $this->session->set_userdata('edit_videos',$data['result']);
                $redirect = base_url().'index.php/admin/dashboard/get_video_lists/video_delete_popup';
                 header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
        }
        else{
                $redirect = base_url().'index.php/admin/dashboard/get_video_lists/video_delete_failure';
                header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
            }
    }
    public function delete_docs_row(){
        $data=$_POST;
        $where=array('id' => $data['id']);
        $result=$this->survey_model->deleteDocs($where);
        if($result==1)
        {
            $this->session->set_userdata('edit_docs',$data['result']);
                $redirect = base_url().'index.php/admin/dashboard/get_doc_lists';
                 header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
        }
        else{
                $redirect = base_url().'index.php/admin/dashboard/get_doc_lists/doc_delete_failure';
                header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
            }
    }
    public function delete_video_row(){
        $data=$_POST;
        $where=array('id' => $data['id']);
        $result=$this->survey_model->deleteVideos($where);
        if($result==1)
        {
            $this->session->set_userdata('edit_videos',$data['result']);
                $redirect = base_url().'index.php/admin/dashboard/get_video_lists';
                 header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
        }
        else{
                $redirect = base_url().'index.php/admin/dashboard/get_video_lists/video_delete_failure';
                header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
            }
    }

    public function submit_weight(){
        
        //$data=$_POST;
        $data['participant_id'] = $this->input->post('participant_name', true);
        $data['class_date'] = $this->input->post('class_date', true);
        $data['weight'] = $this->input->post('weight', true);
        $return = $this->user->insert_weight($data);
        

        if($return==1)
        {
            echo json_encode(array('success'=>1));
        }
        else if($return==2)
        {
            echo json_encode(array('success'=>2));
        }
        else{
            echo json_encode(array('success'=>3));
        }
    }
}