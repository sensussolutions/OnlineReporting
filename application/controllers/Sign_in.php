<?php

class Sign_in extends CI_Controller
{
    public function index()
    {
        if ($this->session->has_userdata('is_login')) {
            header('Location: dashboard');

        } else {
            $page_info = array('page_name' => 'users/sign_in', 'page_title' => 'Sign In');
            $this->load->view('users/main', $page_info);
        }
    }
    public function user_auth()
    {
        $this->load->model('Signin');
        $this->load->helper('encryptpass');
        $userProfile = array('exist'=>false);
        $userInformation = $this->Signin->userAuth($this->input->post('login-username'), convert_password($this->input->post('login-password')));
        if ($userInformation['exist']){
            $userProfile = array('exist'=>true);
            foreach ($userInformation['userInformation'] as $row){
                if ($row->activation_key == '0'){
                    $userProfile = array('exist'=>true,'active'=>true);
                    //create session here
                    $login_information = array('id'=>$row->id,'is_login'=>true);
                    $this->session->set_userdata($login_information);
                }
                else{
                    $userProfile = array('exist'=>true,'active'=>false);
                }
            }
        }
        echo  json_encode($userProfile);
    }

public function remove_session(){
    $this->session->unset_userdata('is_login');
    $this->session->sess_destroy();
    redirect('http://localhost/ui');
}
}