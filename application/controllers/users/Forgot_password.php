<?php
require_once APPPATH . 'controllers/users/my_helper.php';
class Forgot_password extends My_helper
{
    public function __construct()
    {
        parent::__construct();
    }
        public function index(){
            $page_info = array('page_name'=> $this->page_name['forgot password'],'page_title'=>$this->page_title['forgot password']);
            $this->load->view('users/main',$page_info);
        }
}