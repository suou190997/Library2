<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?=base_url()?>img/favicon.png">

  <title>Inicio</title>

  <!-- Bootstrap CSS -->
  <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">

  <!-- bootstrap theme -->
  <link href="<?=base_url()?>css/bootstrap-theme.css" rel="stylesheet">

  <!-- font icon -->
  <link href="<?=base_url()?>css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?=base_url()?>css/font-awesome.css" rel="stylesheet" />

  <!-- Custom styles -->
  <link href="<?=base_url()?>css/style.css" rel="stylesheet">
  <link href="<?=base_url()?>css/style-responsive.css" rel="stylesheet" />

</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" method="post" action="<?=base_url();?>loginController/login">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Username" autofocus name="user">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="Password" name="pass">
        </div>
        <input class="btn btn-primary btn-lg btn-block" type="submit" value="login">
      </div>
      <?php if ($this->session->flashdata("error")): ?>
        <div class="text-dark text-center"><?= $this->session->flashdata("error"); ?></div>
      <?php endif;?>
    </form>
  </div>


</body>

</html>
