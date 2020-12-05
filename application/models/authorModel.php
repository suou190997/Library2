<?php
defined('BASEPATH') or exit('No direct script access allowed');

class authorModel extends CI_Model
{

    public function l_author(){
        $sql = "CALL sp_all_author(null,'','',0)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function i_author($data){
        $sql = "CALL sp_all_author(?,?,?,?)";
        $query = $this->db->query($sql,[null,$data['name'],$data['lastname'],1]);
    }

    public function u_author($data){
        $sql = "CALL sp_all_author(?,?,?,2)";
        $id=(int)$data['id'];
        $query = $this->db->query($sql,[$id,$data['name'],$data['lastname']]);
    }

    public function d_author($data){
        $sql = "CALL sp_all_author(?,?,?,?)";
        $query = $this->db->query($sql,[$data['id'],'','',3]);
    }

}