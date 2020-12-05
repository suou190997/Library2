<?php
defined('BASEPATH') or exit('No direct script access allowed');

class prestamoModel extends CI_Model
{

    public function l_prestamo(){
        $sql = "CALL crud_prestamo(null,null,null,0)";
        $query = $this->db->query($sql);
        return $query->result();
    } 

    public function u_prestamo($data){
        $sql = "CALL crud_prestamo(?,?,?,1)";
        $query = $this->db->query($sql,[$data['id'],$data['id2'],$data['id_user']]);
    }
    public function d_prestamo($data){
        $sql = "CALL crud_prestamo(null,?,null,2)";
        $query = $this->db->query($sql,[$data['id_item']]);
    }


}