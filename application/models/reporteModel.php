<?php
defined('BASEPATH') or exit('No direct script access allowed');

class reporteModel extends CI_Model
{

    public function l_reporte(){
        $sql = "CALL reporte()";
        $query = $this->db->query($sql);
        return $query->result();
    }

}