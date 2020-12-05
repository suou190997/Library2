<?php
defined('BASEPATH') or exit('No direct script access allowed');

class administradorControlador extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("subAdministradorModelo");
    }

    public function desconectar()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}