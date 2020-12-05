

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Perfil</h3>
            
          </div>
        </div>
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4><?= $perfil[0]->name ?></h4>
                  <div class="follow-ava">
                    <img src="<?=base_url();?>img/profile-widget-avatar.jpg" alt="">
                  </div>
                  <h6><?= $perfil[0]->nombre ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#recent-activity">
                            <i class="icon-home"></i> Perfil
                        </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#edit-profile">
                            <i class="icon-envelope"></i>Editar Perfil
                        </a>
                  </li>
                </ul>
              </header>
            <div class="panel-body">
                <div class="tab-content">
                    <div id="recent-activity" class="tab-pane active">
                        <div class="profile-activity">
                            <div class="act-time">
                                <div class="activity-body act-in">
                                    <span class="arrow"></span>
                                <div class="text">

                                <div id="profile" class="tab-pane">
                    <section class="panel">
                        <div class="bio-graph-heading">
                        </div>
                      <div class="panel-body bio-graph-info">
                        <h1>Datos</h1>
                        <div class="row">
                          <div class="bio-row">
                            <p><span>Nombre </span>: <?= $perfil[0]->name ?> </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Apellido </span>: <?= $perfil[0]->lastname ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>usuario </span>: <?= $perfil[0]->username ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>email </span>: <?= $perfil[0]->email ?></p>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                  
                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Editar Perfil</h1>
                        <form class="form-horizontal" role="form" method="post" action="<?=base_url();?>adminController/editarPerfil">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nombre</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="f-name" name="e_name" value="<?= $perfil[0]->name ?>" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Apellido</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="l-name" name="e_lastname" value="<?= $perfil[0]->lastname ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">email</label>
                            <div class="col-lg-6">
                            <input type="text" class="form-control" id="l-name" name="e_email" value="<?= $perfil[0]->email ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">usuario</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="c-name" name="e_username" value="<?= $perfil[0]->username ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">contraseña</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" id="b-day" name="e_password" value="<?= $perfil[0]->password ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary">guardar</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

        <!-- page end-->
      </section>
    </section>
    <!--main content end-->

  