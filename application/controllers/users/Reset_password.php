<?php
require_once APPPATH . 'controllers/users/my_helper.php';
class Reset_password extends My_helper
{

    public function __construct()
    {
        parent::__construct();
        //also called model and other thing here
    }
    public function index(){

            $page_info = array('page_name' => $this->page_name['new password'], 'page_title' => $this->page_title['new password']);
            $this->load->view('users/main', $page_info);
    }

}