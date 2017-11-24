<?php
require_once APPPATH . 'controllers/users/my_helper.php';
class Sign_up extends My_helper
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){

        $page_info = array('page_name'=>$this->page_name['register'],'page_title'=>$this->page_title['register']);
        $this->load->view('users/main',$page_info);
    }
}