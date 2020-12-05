<?php
defined('BASEPATH') or exit('No direct script access allowed');

class clientController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("clienteModel");
    }

    public function l_cliente(){
        $data['cliente'] = $this->clienteModel->l_cliente();
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/cliente",$data);
        $this->load->view("administrador/pie_principal");

    }

    public function i_cliente(){
        $data['name'] = $_POST['nombre'];
        $data['lastname'] = $_POST['apellidos'];
        $data['email'] = $_POST['Email'];
        $data['address'] = $_POST['Direccion'];
        $data['phone'] = $_POST['Telefono'];
        $data['is_active'] = $_POST['Estado'];
        $this->clienteModel->i_cliente($data);
        redirect(base_url()."clientController/l_cliente");
    }   

    public function u_cliente(){
        $data['id'] = $_POST['u_id'];
        $data['name'] = $_POST['nombre'];
        $data['lastname'] = $_POST['apellido'];
        $data['email'] = $_POST['Email'];
        $data['address'] = $_POST['Direccion'];
        $data['phone'] = $_POST['Telefono'];
        $data['is_active'] = $_POST['Estado'];
        $this->clienteModel->u_cliente($data);
        redirect(base_url()."clientController/l_cliente");
    } 

    public function d_cliente(){
        $data['id'] = $_GET['id'];
        $this->clienteModel->d_cliente($data);
        redirect(base_url()."clientController/l_cliente");
    }
}