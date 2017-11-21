<?php

class Request_handler extends CI_Controller
{
    private  $url = "http://localhost/user/Authentication/request_handler/manage_request";

    public function login(){
      //  $this->load->helper('apimanager');
         echo "login";
        /*$payload = array('user_email'=>$this->input->post('register_email'),'pass'=>$this->input->post('register-password'),
            'request'=>'login','customer_id'=>'1');
        $payload = json_encode($payload);
        auth_request($this->url,$payload);*/
    }
    public function authentication_signup(){
        $payload = array('user_email'=>$this->input->post('register_email'),'pass'=>$this->input->post('register-password'),
            'request'=>'sign up','customer_id'=>'1');
        $payload = json_encode($payload);
        auth_request($this->url,$payload);
    }
    public function authentication_forget_pass(){
        $payload = array('user_email'=>$this->input->post('register_email'),'pass'=>$this->input->post('register-password'),
            'request'=>'forgot pass','customer_id'=>'1');
        $payload = json_encode($payload);
        auth_request($this->url,$payload);
    }
}