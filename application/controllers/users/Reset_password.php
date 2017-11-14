<?php

class Reset_password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //also called model and other thing here
        $this->load->model('Signup');
    }
    public function index(){
         $activation_key = $_GET['verify'];

        $count = $this->Signup->key_exist($activation_key);
        if ($count>0){
            $page_info = array('page_name' => 'users/reset_password', 'page_title' => 'Reset Password');
            $this->load->view('users/main', $page_info);
           // redirect("http://localhost/ui");
        }
        else{
            redirect('http://localhost/ui/404_override');
        }

    }

    public  function new_password(){
        $activation_key = $_GET['verify'];
        $is_exist=$this->Signup->key_exist($activation_key);
        $message = array('message'=>false);
        if ($is_exist>0){
            //exist
            $new_password = array('activation_key'=>'0',
                'user_password'=>convert_password($this->input->post('register-password')));
            $is_create = $this->Signup->update_password($activation_key,$new_password);
            if ($is_create){
                $message = array('message'=>true);
            }
            else{
                $message = array('message'=>false);
            }
        }
        else{
            //not exist
            $message = array('message'=>false);
        }
        echo json_encode($message);
    }
}