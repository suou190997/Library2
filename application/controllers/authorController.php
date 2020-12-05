<?php
defined('BASEPATH') or exit('No direct script access allowed');

class authorController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("authorModel");
    }

    public function l_author(){
        $data['categorias'] = $this->authorModel->l_author();
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/author",$data);
        $this->load->view("administrador/pie_principal");

    }

    public function i_author(){
        $data['name'] = $_POST['nombre'];
        $data['lastname'] = $_POST['apellidos'];
        $this->authorModel->i_author($data);
        redirect(base_url()."authorController/l_author");
    }   

    public function u_author(){
        $data['id'] = $_POST['u_id'];
        $data['name'] = $_POST['nombre'];
        $data['lastname'] = $_POST['apellido'];
        $this->authorModel->u_author($data);
        redirect(base_url()."authorController/l_author");
    } 

    public function d_author(){
        $data['id'] = $_GET['id'];
        $this->authorModel->d_author($data);
        redirect(base_url()."authorController/l_author");
    }
}