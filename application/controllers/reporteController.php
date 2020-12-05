<?php
defined('BASEPATH') or exit('No direct script access allowed');

class reporteController extends CI_Controller
{
    public function __construct()
    { 
        parent::__construct();
        $this->load->model("reporteModel");
    }

    public function l_reporte(){
        $data['reporte'] = $this->reporteModel->l_reporte();
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/reporte",$data);
        $this->load->view("administrador/pie_principal");
    }
}