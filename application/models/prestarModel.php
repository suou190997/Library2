<?php
defined('BASEPATH') or exit('No direct script access allowed');

class prestarModel extends CI_Model
{

    public function l_prestar(){
        $sql = "CALL prestar(null,null,null,'','','',0)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function l_prestar_item($data){
        $sql = "CALL prestar(?,null,null,'','','',2)";
        $query = $this->db->query($sql,[$data]);
        return $query->result();    
    }
    public function l_prestar_cliente(){
        $sql = "CALL prestar(null,null,null,'','','',1)";
        $query = $this->db->query($sql);
        $query->next_result(); 
        return $query->result();    
    }


    //hacer
    public function i_prestar($data){
        $sql = "CALL prestar(?,null,?,?,?,?,3)";
        $query = $this->db->query($sql,[$data['ejemplar'],$data['cliente'],$data['inicio'],$data['fin'],$data['id_user']]);
        //$query->next_result(); 
    }
    public function u_prestar($data){
        $sql = "CALL prestar(?,null,null,'','','',4)";
        $query = $this->db->query($sql,[$data['ejemplar']]);
    }

}