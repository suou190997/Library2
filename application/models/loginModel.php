<?php
defined('BASEPATH') or exit('No direct script access allowed');

class loginModel extends CI_Model
{
    public function login($data){
        $sql = "select * from user where username = ? and password = ? and is_active=1";
        $result = $this->db->query($sql, [$data['user'], $data['pass']]);
        if ($result->num_rows() == 1) 
        {
            $r = $result->row();
            $s_admin = array(
                's_username' => $r->username,
                's_name' => $r->name,
                's_id_user' => $r->id,
                'tipo_id'=> $r->tipo_user_id
            );
            $this->session->set_userdata($s_admin);
            return $result->result();
        } else {
            return false;
        }
    }

}