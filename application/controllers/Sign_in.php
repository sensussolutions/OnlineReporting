<?php
require_once APPPATH . 'controllers/users/my_helper.php';
class Sign_in extends My_helper
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->session->has_userdata('is_login')) {
            header('Location: dashboard');

        } else {
            $page_info = array('page_name' => $this->page_name['sign in'], 'page_title' => $this->page_title['sign in']);
            $this->load->view('users/main', $page_info);
        }
    }
public function remove_session(){
    $this->session->unset_userdata('is_login');
    $this->session->sess_destroy();
    redirect('http://localhost/OnlineReporting');
}
}