<?php
defined('BASEPATH') or exit('No direct script access allowed');

class prestamoController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("prestamoModel");
    }

    public function l_prestamo(){
        $data['prestamo'] = $this->prestamoModel->l_prestamo();
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/prestamo",$data);
        $this->load->view("administrador/pie_principal");

    }


    public function d_prestamo(){
        $data['id'] = $_GET['id'];
        $data['id2'] = $_GET['id_status'];
        $data['id_item'] = $_GET['id_item'];
        $data['id_user']=$this->session->userdata('s_id_user');
      $this->prestamoModel->u_prestamo($data);
        $this->prestamoModel->d_prestamo($data);
        redirect(base_url()."prestamoController/l_prestamo");
    }
}