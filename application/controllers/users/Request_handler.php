<?php
require_once APPPATH . 'controllers/users/my_helper.php';
class Request_handler extends My_helper
{
   public $url = null;
   public function __construct()
    {
        parent::__construct();
        $this->load->helper('apimanager');
        $this->variables = $this->variables[0];
        $this->url = $this->variables['api'];
    }
    public function login()
    {
         echo $result = file_get_contents($this->url.$this->variables['login'].'?email='.$this->input->post('login-username').
             '&password='.$this->input->post('login-password').'&application_id=1&company_id=1',true);
    }
    public function register()
    {
        echo $result = file_get_contents($this->url.$this->variables['register'].'?user_name='.$this->input->post('register-username').
            '&email='.$this->input->post('register-email'). '&password='.$this->input->post('register-password').
            '&application_id=1&company_id=1',true);
    }
    public function account_activate()
    {
        $activation_key = $_GET['verify'];
        $is_active = file_get_contents($this->url.$this->variables['account activation'].'?activation_key='.$activation_key,true);
        $is_active = json_decode($is_active);
        if ($is_active->status == 200) {
            redirect("http://localhost/OnlineReporting");
        } else {
            redirect('http://localhost/OnlineReporting/404_override');
        }
    }
    public function forgot_password()
    {
       echo  $is_exist = file_get_contents($this->url.$this->variables['forgot password'].'?reminder_email='.$this->input->post('reminder-email'),true);
    }
    public function password_reset()
    {
        $activation_key = $_GET['verify'];
        $is_exist = file_get_contents($this->url.$this->variables['password reset'].'?activation_key='.$activation_key,true);
         $is_exist = json_decode($is_exist);
        if ($is_exist->status == 200) {
            $activation = array('activation_key' => $activation_key);
            $this->session->set_userdata($activation);
            redirect("http://localhost/OnlineReporting/password-reset");
        } else {
            redirect('http://localhost/OnlineReporting/404');
        }
    }
    public function password_update()
    {
       echo $is_update = file_get_contents($this->url.$this->variables['password update'].'?activation_key='. $this->session->userdata('activation_key').'&password='
            .$this->input->post('register-password'),true);
    }
}