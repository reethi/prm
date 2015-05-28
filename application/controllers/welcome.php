<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct() {
	parent::__construct();
	$this->load->model('user');
    	$this->load->helper('render');
	$this->load->helper('cookie');
	$this->load->library("session");
    }

    public function index(){
        if($this->session->userdata('invalid')!=''){
            $data['invalid'] = $this->session->userdata('invalid');
            $this->session->unset_userdata('invalid');
        }else{
            $this->session->unset_userdata('invalid');
            $data['invalid'] = '';
        }
        render_with_layout('layouts/login.php',$data,'login');
    }
    
    public function signup_user()
    {
    	$this->load->helper('render_helper');
      //service_url; 
    	$data['title']="User Sign Up ";
    	$data['action']="singup";
    	render_with_layout('login',$data,'admin');
    }
    
    public function fileupload()
    {
        $uploadpath = "uploads/";
        $filedata = $_POST['filedata'];
        $filename = $_POST['filename'];
        
        if ($filedata != '' && $filename != '')
            copy($filedata,$uploadpath.$filename);
        else
            echo "Sorry";
    }
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */