<?php defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
class Dashboard extends CI_Controller
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
        $email = $this->session->userdata('email');
        $data['values']= $this->user->getUserByEmail($email);
        $data['editlink'] = 1;
        $data['videos'] = $this->survey_model->getVideos();  
        $data['docs'] = $this->survey_model->getDocs();
        $data['classes'] = $this->survey_model->getClasses();
        $where_participantdetails=array('user_type' => '0');
        $data['participant_details']= $this->user->getParticipantsDetails('users','username,email',$where_participantdetails);
        //echo "<pre>";print_r($data);exit;
        $data['class_details']= $this->user->getClassDetails('class_names');
        $data['health_educator']= $this->user->getClassDetails('health_educator');
        $data['diet']= $this->user->getClassDetails('diet');
        $data['color']= $this->user->getClassDetails('color');
        $data['class_time']= $this->user->getClassDetails('class_time');
        $data['location']= $this->user->getClassDetails('location');
        $data['adminprofile'] = $this->load->view('admin/adminprofile',$data,true);
        $data['quicktools'] = $this->load->view('admin/quicktools','',true);
        $data['quicktools_participant'] = $this->load->view('admin/quicktools_participant','',true);
        $data['quicktools_weight'] = $this->load->view('admin/quicktools_weight','',true);
        $data['quicktools_attendance'] = $this->load->view('admin/quicktools_attendance',$data,true);
        $data['quicktools_doc'] = $this->load->view('admin/quicktools_doc',$data,true);
        $data['quicktools_video'] = $this->load->view('admin/quicktools_video','',true);
        $data['quicktools_push'] = $this->load->view('admin/quicktools_push',$data,true);
        
        $data['classdata'] = $this->load->view('admin/classdata','',true);
        $data['classlist'] = $this->load->view('admin/classlist','',true);
        $data['participantslist'] = $this->load->view('admin/participantslist','',true);
        $data['create_checklist'] = $this->load->view('admin/create_checklist','',true);
        $data['create_class'] = $this->load->view('admin/create_class',$data,true);
        
        
        render_with_layout('admin/dashboard',$data,'newadmin');
    }
    
    public function admin_update_details()
    {
        
        $data['full_name'] = $this->input->post('admin_name', true);
        $data['email']  = $this->input->post('admin_email', true);
        $data['phone']     = $this->input->post('admin_phone', true);
        $data['password']    = $this->input->post('admin_new_password', true);
        //$data['admin_old_password']    = $this->input->post('admin_old_password', true);

        //echo $data['admin_email'];exit;
        $email_list = $this->user->getUserByEmail($data['email']);
       // echo "<pre>";print_r($email_list ->id);exit;
        $id = $email_list ->id;
        $admin_old_password = $email_list ->password;
        //print_r($admin_old_password);exit;
        $new_password = $this->input->post('admin_new_password', true);
        
        if($admin_old_password != $new_password){        
                $redirect = base_url().'index.php/admin/dashboard/alert/password_update_failure';      
            }    
        else{
             $update = $this->user->UpdateProfile($data,$id);
             $redirect = base_url().'index.php/admin/dashboard/alert/password_update_failure'; 
        }   
           
        else if($new_password!=''){
            $data['password'] = md5($new_password);
        }

            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));      
                    exit;   
        
        //print_r($data . "hiii" . $id);exit;
       
        

    }
    
    public function admin_update(){
        $data['title']="Dashboard";
        $data['action']="dashboard";
        $email = $this->session->userdata('email');
        $data['values']= $this->user->getUserByEmail($email);
        $data['editlink'] = 0;
      $data['videos'] = $this->survey_model->getVideos();  
        $data['docs'] = $this->survey_model->getDocs();
        $where_participantdetails=array('user_type' => '0');
        $data['participant_details']= $this->user->getParticipantsDetails('users','username,email',$where_participantdetails);
        //echo "<pre>";print_r($data);exit;
        $data['class_details']= $this->user->getClassDetails('class_names');
        $data['health_educator']= $this->user->getClassDetails('health_educator');
        $data['diet']= $this->user->getClassDetails('diet');
        $data['color']= $this->user->getClassDetails('color');
        $data['class_time']= $this->user->getClassDetails('class_time');
        $data['location']= $this->user->getClassDetails('location');
        $data['adminprofile'] = $this->load->view('admin/adminprofile',$data,true);

        $data['quicktools_doc'] = $this->load->view('admin/quicktools_doc','',true);
        $data['quicktools_video'] = $this->load->view('admin/quicktools_video','',true);
        $data['quicktools_weight'] = $this->load->view('admin/quicktools_weight','',true);
        $data['quicktools_attendance'] = $this->load->view('admin/quicktools_attendance',$data,true);
        $data['quicktools_participant'] = $this->load->view('admin/quicktools_participant','',true);
        $data['create_checklist'] = $this->load->view('admin/create_checklist','',true);
        $data['create_class'] = $this->load->view('admin/create_class',$data,true);

        
        render_with_layout('admin/admin_update',$data,'newadmin');
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
    public function alert()
    {
        $data['title']="Dashboard";
        $data['action']="dashboard";
        $email = $this->session->userdata('email');
        $data['values']= $this->user->getUserByEmail($email);
        $data['editlink'] = 1;
        $data['videos'] = $this->survey_model->getVideos();  
        $data['docs'] = $this->survey_model->getDocs();
        $where_participantdetails=array('user_type' => '0');
        $data['participant_details']= $this->user->getParticipantsDetails('users','username,email',$where_participantdetails);
        //echo "<pre>";print_r($data);exit;
        $data['class_details']= $this->user->getClassDetails('class_names');
        $data['health_educator']= $this->user->getClassDetails('health_educator');
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
        $data['password_update_failure'] = $this->load->view('admin/admin_update','',true);
        
        
        render_with_layout('admin/dashboard',$data,'newadmin');

    }
    public function push_data(){        
        $data['videos'] = $this->survey_model->push_data();     
        if($result = 1){        
                echo 'success';     
                $redirect = base_url().'index.php/admin/dashboard/alert/push_success';      
            }       
            else{       
                $redirect = base_url().'index.php/admin/dashboard/alert/push_failure';      
            }       
            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));      
                    exit;       
        //$this->load->view('admin/index',$data);       
    }
    public function upload()
{
    $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if ((($_FILES["file"]["type"] == "video/mp4"))

        && ($_FILES["file"]["size"] < 20000000)
        && in_array($extension, $allowedExts))

      {
      if ($_FILES["file"]["error"] > 0)
        {
            echo 'hi';exit;
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
      else
        {
        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        echo "Type: " . $_FILES["file"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

        if (file_exists("uploads/videos" . $_FILES["file"]["name"]))
          {
          echo $_FILES["file"]["name"] . " already exists. ";
          }
        else
          {
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "uploads/videos/" . $_FILES["file"]["name"]);
          //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
            $data['files']=$_FILES["file"]["name"];
            $data['user_id'] = $this->session->userdata('user_id');
            //echo($data);
            $data['url'] = $this->input->post('url');
            $data['title'] = $this->input->post('title');
            $result = $this->survey_model->SaveVideos($data);
            //echo $result;exit;
            if($result = 1){
                echo 'success';
                $redirect = base_url().'index.php/admin/dashboard/alert/video_success';
            }
            else{
                $redirect = base_url().'index.php/admin/dashboard/alert/video_failure';
            }
            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
          }
        }
      }
else
  {
  //echo "Invalid file";
                    $redirect = base_url().'index.php/admin/dashboard/alert/upload_video_fail';
            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 

  }
}
   public function do_upload()
    {
        
    
    $allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma", "pdf");
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if ((($_FILES["file"]["type"] == "application/pdf"))

        && ($_FILES["file"]["size"] < 20000000)
        && in_array($extension, $allowedExts))

      {
      if ($_FILES["file"]["error"] > 0)
        {
            echo 'hi';exit;
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
      else
        {
        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        echo "Type: " . $_FILES["file"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

        if (file_exists("uploads/docs" . $_FILES["file"]["name"]))
          {
          echo $_FILES["file"]["name"] . " already exists. ";
          }
        else
          {
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "uploads/docs/" . $_FILES["file"]["name"]);
          //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
           
             $data['files']=$_FILES["file"]["name"];
            $data['user_id'] = $this->session->userdata('user_id');
            //echo($data);
            $result = $this->survey_model->save_docs($data);
            //echo $result;exit;
            if($result = 1){
                echo 'success';
                $redirect = base_url().'index.php/admin/dashboard/alert/doc_success';
            }
            else{
                $redirect = base_url().'index.php/admin/dashboard/alert/doc_failure';
            }
            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
                    exit; 
          }
        }
      }
else
  {
  //echo "Invalid file";
                    $redirect = base_url().'index.php/admin/dashboard/alert/upload_doc_fail';
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
                            //echo "<pre>";print_r($aryCsvData);

            //exit;
            $data_array=$this->user->insertcsvcity('users',$aryCsvData);
            //print_r($handle);
            
            fclose($handle);
        }
        return $aryData;
    }

}