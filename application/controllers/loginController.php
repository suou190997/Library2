<?php
defined('BASEPATH') or exit('No direct script access allowed');

class loginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("loginModel");
    }

    public function index(){
        $this->load->view("index");
    }

    public function login(){
        $data['user'] = $_POST['user'];
        $data['pass'] = $_POST['pass'];
        $res = $this->loginModel->login($data);
        $tipo = $res[0]->tipo_user_id;        
        if (!$res)
        {
            $this->session->set_flashdata("error", "El usuario y/o contraseña son incorrectos");
            redirect(base_url());
        } else {
            switch($tipo){
                case "1":
                    redirect(base_url() . "adminController/inicio");
                break;
                case "2":
                    redirect(base_url() . "adminController/inicio");
                break;
            }
        }
    }

}