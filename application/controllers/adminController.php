<?php
defined('BASEPATH') or exit('No direct script access allowed');

class adminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("adminModel");
    }

    public function inicio(){
        /*$this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/inicio");
        $this->load->view("administrador/pie_principal");*/

        $data['prestamo'] = $this->adminModel->l_prestamo();
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/prestamo",$data);
        $this->load->view("administrador/pie_principal");
    }

    public function perfil_administrador(){
        $codigo['id'] = $this->session->userdata('s_id_user');
        $data['perfil'] = $this->adminModel->Perfil($codigo);
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/perfil",$data);
        $this->load->view("administrador/pie_principal");
    }

    public function editarPerfil(){
        $data['id'] = $this->session->userdata('s_id_user');
        $data['name'] = $_POST['e_name']; 
        $data['lastname'] = $_POST['e_lastname']; 
        $data['email'] = $_POST['e_email']; 
        $data['username'] = $_POST['e_username']; 
        $data['password'] = $_POST['e_password']; 
        $this->adminModel->editarPerfil($data);
        redirect(base_url()."adminController/perfil_administrador");
    }

    public function l_categorias(){
        $data['categorias'] = $this->adminModel->l_categorias();
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/categorias",$data);
        $this->load->view("administrador/pie_principal");

    }

    public function i_categorias(){
        $data['name'] = $_POST['i_categoria'];
        $this->adminModel->i_categorias($data);
        redirect(base_url()."adminController/l_categorias");
    }   

    public function u_categorias(){
        $data['id'] = $_POST['u_id'];
        $data['name'] = $_POST['u_categoria'];
        $this->adminModel->u_categorias($data);
        redirect(base_url()."adminController/l_categorias");
    } 

    public function d_categorias(){
        $data['id'] = $_GET['id'];
        $this->adminModel->d_categorias($data);
        redirect(base_url()."adminController/l_categorias");
    }

    /* FUNCIONES EDITORIAL */

    public function l_editoriales(){
        $data['editoriales'] = $this->adminModel->l_editoriales();
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/editoriales",$data);
        $this->load->view("administrador/pie_principal");

    }

    public function i_editoriales(){
        $data['name'] = $_POST['i_editorial'];
        $this->adminModel->i_editoriales($data);
        redirect(base_url()."adminController/l_editoriales");
    }   

    public function u_editoriales(){
        $data['id'] = $_POST['u_id_editorial'];
        $data['name'] = $_POST['u_editorial'];
        $this->adminModel->u_editoriales($data);
        redirect(base_url()."adminController/l_editoriales");
    } 

    public function d_editoriales(){
        $data['id'] = $_GET['id'];
        $this->adminModel->d_editoriales($data);
        redirect(base_url()."adminController/l_editoriales");
    }

    /* FIN FUNCIONES EDITORIAL */
    
    /* FUNCIONES USUARIOS */
    public function l_usuarios(){
        $data['usuarios'] = $this->adminModel->l_usuarios();
        $data['tipos'] = $this->adminModel->tipos_usuarios();
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/usuarios",$data);
        $this->load->view("administrador/pie_principal");
    }

    public function i_usuarios(){
        $data['user'] = $_POST['i_user'];
        $data['name'] = $_POST['i_nombre'];
        $data['lastname'] = $_POST['i_apellido'];
        $data['pass'] = $_POST['i_pass'];
        $data['correo'] = $_POST['i_correo'];
        $data['tipo_user'] = $_POST['i_tipo_user'];
        $this->adminModel->i_usuarios($data);
        redirect(base_url()."adminController/l_usuarios");
    }

    public function u_usuarios(){
        $data['id'] = $_POST['u_id'];
        $data['user'] = $_POST['u_user'];
        $data['name'] = $_POST['u_nombre'];
        $data['lastname'] = $_POST['u_apellido'];
        $data['pass'] = $_POST['u_pass'];
        $data['tipo_user'] = $_POST['u_tipo_user'];
        $this->adminModel->u_usuarios($data);
        redirect(base_url()."adminController/l_usuarios");
    }

    public function activar_user(){
        $data['id'] = $_GET['id'];
        $this->adminModel->activar_user($data);
        redirect(base_url()."adminController/l_usuarios");
    }

    public function desactivar_user(){
        $data['id'] = $_GET['id'];
        $this->adminModel->desactivar_user($data);
        redirect(base_url()."adminController/l_usuarios");
    }

    /* FIN FUNCIONES USUARIOS */

    public function desconectar()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    public function l_libros(){
        $data['book'] = $this->adminModel->l_libros();
        $data['autores'] = $this->adminModel->l_autores();
        $data['editoriales'] = $this->adminModel->l_editorial();
        $data['categorias'] = $this->adminModel->l_categorias();
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/libros",$data);
        $this->load->view("administrador/pie_principal");
       
    }
    public function i_libros(){
        $data['isbn'] = $_POST['isbn'];
        $data['titulo'] = $_POST['titulo'];
        $data['subtitulo'] = $_POST['subtitulo'];
        $data['descripcion'] = $_POST['descripcion'];
        $data['anio'] = $_POST['anio'];
        $data['pag'] = $_POST['pag'];
        $data['autor'] = $_POST['autor'];
        $data['editorial'] = $_POST['editorial'];
        $data['categoria'] = $_POST['categoria'];
        $this->adminModel->i_libros($data);
        redirect(base_url()."adminController/l_libros");
    }   
    public function u_libros(){
        $data['id'] = $_POST['u_id2'];
        $data['isbn'] = $_POST['isbn2'];
        $data['titulo'] = $_POST['titulo2'];
        $data['subtitulo'] = $_POST['subtitulo2'];
        $data['descripcion'] = $_POST['descripcion2'];
        $data['anio'] = $_POST['anio2'];
        $data['pag'] = $_POST['pag2'];
        $data['autor'] = $_POST['autor2'];
        $data['editorial'] = $_POST['editorial2'];
        $data['categoria'] = $_POST['categoria2'];
        $this->adminModel->u_libros($data);
        redirect(base_url()."adminController/l_libros");
    }  

    public function d_libros(){
        $data['id'] = $_GET['id'];
        $this->adminModel->d_libros($data);
        redirect(base_url()."adminController/l_libros");
    }

    
    public function l_ejemplares(){
        $data['id'] = $_GET['id'];
        $date['status'] = $this->adminModel->l_status();
        $date['item']=$this->adminModel->l_ejemplares($data);
        $date['id'] = $_GET['id'];
        $this->load->view("administrador/cabecera_principal");
        $this->load->view("administrador/item",$date);
        $this->load->view("administrador/pie_principal");
    }

    public function i_ejemplares(){
        $data['u_id'] = $_POST['u_id'];
        $data['codigolibro'] = $_POST['u_id'];
        $data['codigo'] = $_POST['codigo'];
        $data['estado'] = $_POST['estado'];
        $this->adminModel->i_ejemplares($data);
        redirect(base_url()."adminController/l_ejemplares?id=".$data['codigolibro']);
    }   
    public function u_ejemplares(){
        $data['id_libro'] =  $_POST['u_id2'];
        $data['codigoejemplar'] = $_POST['ejemplar2'];
        $data['codigo'] = $_POST['codigo2'];
        $data['estado'] = $_POST['estado2'];
        $this->adminModel->u_ejemplares($data);
        redirect(base_url()."adminController/l_ejemplares?id=".$data['id_libro']);
    }
    public function d_ejemplares(){
        $data['id'] = $_GET['id'];
        $data['id_book'] = $_GET['idbook'];
        $this->adminModel->d_ejemplares($data);
        redirect(base_url()."adminController/l_ejemplares?id=".$data['id_book']);
    }  
    
}