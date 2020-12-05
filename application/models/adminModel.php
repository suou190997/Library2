<?php
defined('BASEPATH') or exit('No direct script access allowed');

class adminModel extends CI_Model
{


    public function l_prestamo(){
        $sql = "CALL crud_prestamo(null,null,null,0)";
        $query = $this->db->query($sql);
        return $query->result();
    } 


    public function perfil($codigo){
        $sql = "select * from v_usuarios where id = ?";
        $query = $this->db->query($sql,[$codigo['id']]);
        return $query->result();
    }

    public function editarPerfil($data){
        $sql = "update user set name = ?, lastname = ?, email = ?, username = ?, password = ? where id = ?";
        $query = $this->db->query($sql,[$data['name'],$data['lastname'],$data['email'],$data['username'],$data['password'],$data['id']]);
    }

    public function l_categorias(){
        $sql = "CALL crud_category(null,'',0)";
        $query = $this->db->query($sql);
        $query->next_result();
        return $query->result();
    }

    public function i_categorias($data){
        $sql = "CALL crud_category(?,?,?)";
        $query = $this->db->query($sql,[null,$data['name'],1]);
    }

    public function u_categorias($data){
        $sql = "CALL crud_category(?,?,?)";
        $query = $this->db->query($sql,[$data['id'],$data['name'],2]);
    }

    public function d_categorias($data){
        $sql = "CALL crud_category(?,?,?)";
        $query = $this->db->query($sql,[$data['id'],'',3]);
    }

    /* FUNCIONES EDITORIAL */

    public function l_editoriales(){
        $sql = "CALL crud_editorial(null,'',0)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function i_editoriales($data){
        $sql = "CALL crud_editorial(?,?,?)";
        $query = $this->db->query($sql,[null,$data['name'],1]);
    }

    public function u_editoriales($data){
        $sql = "CALL crud_editorial(?,?,?)";
        $query = $this->db->query($sql,[$data['id'],$data['name'],2]);
    }

    public function d_editoriales($data){
        $sql = "CALL crud_editorial(?,?,?)";
        $query = $this->db->query($sql,[$data['id'],'',3]);
    }

    /* FIN FUNCIONES EDITORIAL */

    /* FUNCIONES USUARIOS */
    public function l_usuarios(){
        $sql = "select * from v_usuarios";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function tipos_usuarios(){
        $sql = "select * from tipo_user ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function l_editorial(){
        $sql = "select * from editorial";
        $query = $this->db->query($sql);

        return $query->result();
    }
    public function l_autores(){
        $sql = "select * from author";
        $query = $this->db->query($sql);

        return $query->result();
    }
    public function l_status(){
        $sql = "select * from status";
        $query = $this->db->query($sql);

        return $query->result();
    }


    public function i_usuarios($data){
        $sql = "insert into user (username,name,lastname,email,password,tipo_user_id) values (?,?,?,?,?,?)";
        $query = $this->db->query($sql,[$data['user'],$data['name'],$data['lastname'],$data['correo'],$data['pass'],$data['tipo_user']]);
    }

    public function u_usuarios($data){
        $sql = "update user set username = ? , name = ?, lastname = ?, password = ?, tipo_user_id = ? where id = ?";
        $query = $this->db->query($sql,[$data['user'],$data['name'],$data['lastname'],$data['pass'],$data['tipo_user'],$data['id']]);
    }

    public function activar_user($data){
        $sql= "update user set is_active = ? where id = ?";
        $query = $this->db->query($sql,[1,$data['id']]);
    }

    public function desactivar_user($data){
        $sql= "update user set is_active = ? where id = ?";
        $query = $this->db->query($sql,[0,$data['id']]);
    }

    /* FIN FUNCIONES USUARIOS */

    public function l_libros(){
        $sql = "select * from v_libros_detallado";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function i_libros($data){
        $sql = "CALL crud_books(?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->db->query($sql,[ $data['isbn'], $data['titulo'],  $data['subtitulo'], $data['descripcion'], $data['anio'], $data['pag'] , $data['autor'],$data['editorial'],$data['categoria'],1,null]);
    }

    public function u_libros($data){
        $sql = "CALL crud_books(?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->db->query($sql,[ $data['isbn'], $data['titulo'],  $data['subtitulo'], $data['descripcion'], $data['anio'], $data['pag'] , $data['autor'],$data['editorial'],$data['categoria'],2, $data['id']]);
    }

    public function d_libros($data){
        $sql = "CALL crud_books(?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->db->query($sql,[ '','', '','','','' ,0,0,0,3, $data['id']]);
    }
    public function l_ejemplares($data){
        $sql = "select * from v_libros where book_id=?";
        $query = $this->db->query($sql,[$data['id']]);
        return $query->result();
   }

   public function i_ejemplares($data){
    $sql = "CALL crud_item(?,?,?,?,?)";
    $query = $this->db->query($sql,[null,$data['codigo'],$data['estado'],$data['u_id'],1]);
}

public function u_ejemplares($data){
    $sql = "CALL crud_item(?,?,?,?,?)";
    $query = $this->db->query($sql,[$data['codigoejemplar'],$data['codigo'],$data['estado'],$data['id_libro'],2]);
}
public function d_ejemplares($data){
    $sql = "CALL crud_item(?,?,?,?,?)";
    $query = $this->db->query($sql,[ $data['id'],"",0,0,3]);
}

}