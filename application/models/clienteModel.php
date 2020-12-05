<?php
defined('BASEPATH') or exit('No direct script access allowed');

class clienteModel extends CI_Model
{

    public function l_cliente(){
        $sql = "CALL crud_client(null,'','','','','',null,0)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function i_cliente($data){
        $sql = "CALL crud_client(?,?,?,?,?,?,?,?)";
        $query = $this->db->query($sql,[null,$data['name'],$data['lastname'],$data['email'],$data['address'],$data['phone'],$data['is_active'],1]);
    }

    public function u_cliente($data){
        $sql = "CALL crud_client(?,?,?,?,?,?,?,?)";
        $query = $this->db->query($sql,[$data['id'],$data['name'],$data['lastname'],$data['email'],$data['address'],$data['phone'],$data['is_active'],2]);
    }

    public function d_cliente($data){
        $sql = "CALL crud_client(?,?,?,?,?,?,?,?)";
        $query = $this->db->query($sql,[$data['id'],'','','','','','',3]);
    }

}