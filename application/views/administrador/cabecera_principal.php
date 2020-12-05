<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Admin</title>

  <!-- Bootstrap CSS -->
  <link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?=base_url();?>css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?=base_url();?>css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?=base_url();?>css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?=base_url();?>css/style.css" rel="stylesheet">
  <link href="<?=base_url();?>css/style-responsive.css" rel="stylesheet" />

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="<?=base_url();?>adminController/inicio" class="logo">Library <span class="lite">V2</span></a>
      <!--logo end-->

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="<?=base_url();?>img/avatar1_small.jpg">
                            </span>
                            <span class="username"><?= $this->session->userdata('s_name');?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="<?=base_url();?>adminController/perfil_administrador"><i class="icon_profile"></i> Mi Perfil</a>
              </li>
              
              <li>
                <a href="<?=base_url();?>adminController/desconectar"><i class="icon_key_alt"></i> Salir</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
            <a class="" href="<?=base_url();?>prestarController/l_prestar">
                          <i class="icon_house_alt"></i>
                          <span>Prestar</span>
                      </a>
          </li>
          <li class="">
            <a class="" href="<?=base_url();?>prestamoController/l_prestamo">
                          <i class="icon_house_alt"></i>
                          <span>Prestamos</span>
                      </a>
          </li>
          <li class="">
            <a class="" href="<?=base_url();?>adminController/l_libros">
                          <i class="icon_house_alt"></i>
                          <span>Libros</span>
                      </a>
          </li>
          <li class="">
            <a class="" href="<?=base_url();?>clientController/l_cliente">
                          <i class="icon_house_alt"></i>
                          <span>Clientes</span>
                      </a>
          </li>
          <li class="">
            <a class="" href="<?=base_url();?>adminController/l_categorias">
              <i class="icon_house_alt"></i><span>Categorias</span>
            </a>
          </li>
          <li class="">
            <a class="" href="<?=base_url();?>adminController/l_editoriales">
              <i class="icon_house_alt"></i><span>Editoriales</span>
            </a>
          </li>
          <li class="">
            <a class="" href="<?=base_url();?>authorController/l_author">
                          <i class="icon_house_alt"></i>
                          <span>Autores</span>
                      </a>
          </li>
          <?php
          if($this->session->userdata('tipo_id')==1){
          ?>
          <li class="">
            <a class="" href="<?=base_url();?>reporteController/l_reporte">
                          <i class="icon_house_alt"></i>
                          <span>Reporte</span>
                      </a>
          </li>
          <?php 
          }            
          ?>
          <li class="">
            <a class="" href="<?=base_url();?>adminController/l_usuarios">
              <i class="icon_house_alt"></i><span>Usuarios</span>
            </a>
          </li>

          

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>