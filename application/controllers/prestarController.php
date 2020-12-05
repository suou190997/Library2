<?php
defined('BASEPATH') or exit('No direct script access allowed');

class prestarController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("prestarModel");
        $this->load->model("authorModel");
    }

    public function l_prestar(){
        $data['prestar'] = $this->prestarModel->l_prestar();
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/prestar",$data);
        $this->load->view("administrador/pie_principal");

    }

    public function plantilla_prestar(){ 
        $data['id'] = $_GET['id'];
        $date['cliente'] = $this->prestarModel->l_prestar_cliente();
        $date['item'] = $this->prestarModel->l_prestar_item($data['id']);
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/prestar2",$date);
        $this->load->view("administrador/pie_principal");

    } 

    public function i_prestar(){
        $data['cliente'] = $_POST['cliente'];
        $data['ejemplar'] = $_POST['ejemplar'];
        $data['inicio'] = $_POST['inicio'];
        $data['fin'] = $_POST['fin'];
        $data['id_user']=$this->session->userdata('s_id_user');
        print($data['id_user']);
        $this->prestarModel->i_prestar($data);
        $this->prestarModel->u_prestar($data);
        redirect(base_url()."prestarController/l_prestar");
    }  
}