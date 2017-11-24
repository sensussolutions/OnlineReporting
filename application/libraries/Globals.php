<?php

class Globals
{
    public function user_variables(){
         $url = array('api'=>'http://localhost/authentication/users/request_handler/','login'=>'login','register'=>'register',
            'account activation'=>'account_activation','forgot password'=>'forgot_password','password reset'=>'password_reset',
            'password update'=>'password_update');
        $page_name = array('sign in'=>'users/sign_in','forgot password'=>'users/forgot_password','register'=>'users/sign_up',
            'new password'=>'users/new_password');
        $page_title = array('sign in'=>'Sign In','register'=>'Register','forgot password'=>'Forgot Password',
            'new password'=>'Password Reset');
        return array($url,$page_name,$page_title);

    }

}