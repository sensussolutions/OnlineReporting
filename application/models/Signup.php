<?php

class Signup extends CI_Model
{
    public function email_exist($user_email){
        $this->db->where('user_email',$user_email);
        $this->db->from('users');
        $query_result = $this->db->get();
      return $result = $query_result->num_rows();
    }
    public function insert_new_user($new_user_information){
       return $result = $this->db->insert('users',$new_user_information);
    }
    public function active_user($activation_key){
        $this->db->where('activation_key',$activation_key);
        $this->db->from('users');
        $query_result = $this->db->get();
        $count = $query_result->num_rows();
        if ($count>0){
            $active_user = array('is_active'=>'1','activation_key'=>'0');
            $this->db->where('activation_key',$activation_key);
            $this->db->update('users',$active_user);
            return $query_result =$this->db->affected_rows();

        }
        else{
            return 0;
        }
    }

    public function update_activation_key($email,$new_key){
        $result = false;
        $this->db->where('user_email',$email);
        $this->db->update('users',$new_key);
        if (($this->db->affected_rows() > 0)){
            $result = true;
        }
       return $result;

    }

    public function update_password($activation_key,$new_password){
        $this->db->where('activation_key',$activation_key);
        $this->db->from('users');
        $query_result = $this->db->get();
        $count = $query_result->num_rows();
        if ($count>0){
            $active_user = array('is_active'=>'1','activation_key'=>'0','user_password'=>$new_password);
            $this->db->where('activation_key',$activation_key);
            $this->db->update('users',$active_user);
            return $query_result =$this->db->affected_rows();

        }
        else{
            return 0;
        }
    }

    public function key_exist($activation_key){
        $this->db->where('activation_key',$activation_key);
        $this->db->from('users');
        $query_result = $this->db->get();
        $count = $query_result->num_rows();
        if ($count>0){
            return 1;

        }
        else{
            return 0;
        }
    }

}