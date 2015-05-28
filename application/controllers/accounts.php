<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user');
	    $this->load->helper(array('form', 'url','app','render'));
		$this->load->helper('cookie');
		$this->load->library("session");

	}

    public function nameYu(){
        echo "rrrrrrrrrrrrrrrrrrrrrrrrrrrrrr";
        exit();
    }

	public function login() {
	    
        
	    $username = $this->input->post('username', true);
		$password = ($this->input->post('password', true));


        if (!empty($_POST)){
            if(empty($username)){
                $this->session->set_userdata('invalid','* Missing email. * ');
                redirect_to(base_url().'index.php/welcome/index/');
            }elseif ($password == '') {
                $this->session->set_userdata('invalid','* Missing password. * ');
                redirect_to(base_url().'index.php/welcome/index/');
            }else{
                $admin=$this->user->signin($username,md5($password));
                if($admin==1){
                    redirect(base_url().'index.php/admin/dashboard/index');
                    exit();
                }else if($admin==0){
                    redirect(base_url().'index.php/participant/landing/index');
                    exit();
                }else if($admin==2){
                    $this->session->set_userdata('invalid','* Login error, please try again. * ');
                    redirect_to(base_url().'index.php/welcome/index');
                }
            }
        }
	}

	public function signout()
	{
		if($this->session->userdata('user_browse_session_id')!="" && $this->session->userdata('user_browse_session_id')>0)
		{
		 $logoutupdate_data=array('logout_time'=>date('Y-m-d H:i:s'));
		 $status = $this->user->updateAdminSession($logoutupdate_data,$this->session->userdata('user_browse_session_id'));
		}
		$this->session->sess_destroy();
 
		//$user=$this->user->signout();

			 redirect(base_url());
	}



/*******************************Admin Panel data*******************************/

	public function forgot_password(){
        $email = $this->input->post('email', true);
        
        $email_exist = $this->user->checkUserByEmail($email);
        if($email_exist){
            $password = $this->generatePassword(7);
            $update = $this->user->updatePassword($email,$password);
            if($update){
                $this->sendmailParticpant($email,$password);
                redirect_to(base_url().'index.php/welcome/index?invalid=1');
            }else{
                redirect_to(base_url().'index.php/welcome/index?invalid=3');
            }
        }else{
            redirect_to(base_url().'index.php/welcome/index?invalid=2');
        }
    }
    
    public function generatePassword($length = 7) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }
    
    public function sendmailParticpant($email,$password){
        //$email = 'ram@vendus.com';
        //$password= $this->generatePassword(7);
        $send_email = $email;
        //$send_email = 'ram@vendus.com';
        
        $message = 'We have reset your password as per your request!.<br>';
        $message .= '<b>Please find the credentials below to log in:</b><br>';
        $message .= '<div style="width:40%;"><b><hr></b><br/>';
        $message .= '<b>Email: </b>'.$email.'<br/>';
        $message .= '<b>Password: </b>'.$password.'<br/><br/>';
        $message .= '<b><hr></b><br/></div>';
        $message .= 'Thanks,<br/><br/>';
        $message .= '<i>Stanford School of Medicine</i><br/>';
        $message .= '<a href="'.base_url().'"><img src="'.base_url().'assets/images/stanford_login_logo.png"></a><br>';


        $this->email->set_newline("\r\n");
        $this->email->from('noreply@stanford.edu.com', 'Stanford Medicine');
        $this->email->to($send_email);
        $this->email->subject('Stanford Medicine - Forgot password');
        $this->email->message($message);
        $this->email->send();
        //echo $this->email->print_debugger();
    }

/*********************************Admin panel Data Ends**********************************/
}
