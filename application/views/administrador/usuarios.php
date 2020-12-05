<section id="main-content">
      <section class="wrapper">
        <div class="row mb-2">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Usuarios</h3>
            <a class="btn btn-primary" data-toggle="modal" data-target="#agregarUser"><i class="icon_plus_alt2"></i> Agregar</a>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th> Username</th>
                    <th> Nombre</th>
                    <th> Apellido</th>
                    <th> Fecha de Creación</th>
                    <th> Tipo de Usuario</th>
                    <th> Estado</th>
                    <th><i class="icon_cogs"></i> Acción</th>
                  </tr>
                  <tr>
                <thead>
                <tbody>
                <?php foreach($usuarios as $u): ?>
                    <td><?=$u->username?></td>
                    <td><?=$u->name?></td>
                    <td><?=$u->lastname?></td>
                    <td><?=$u->created_at?></td>
                    <td><?=$u->nombre?></td>
                <?php if ($u->is_active==1) {?>
                    <td>Habilitado</td>
                <?php } else {  ?>
                    <td>Deshabilitado</td>
                <?php }  ?>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-warning" onclick="actualizar_usuario('<?= $u->id ?>','<?= $u->username ?>','<?=$u->name?>','<?=$u->lastname?>','<?= $u->password ?>','<?=$u->tipo_user_id?>')" data-toggle="modal" data-target="#staticUsuario"><i class="icon_plus_alt2"></i>Editar</a>
                        <?php if ($u->is_active==1) {?>    
                        <a class="btn btn-danger" href="<?=base_url();?>adminController/desactivar_user?id=<?=$u->id?>"><i class="icon_close_alt2"></i>Deshabilitar </a>
                        <?php } else {  ?>
                        <a class="btn btn-success" href="<?=base_url();?>adminController/activar_user?id=<?=$u->id?>"><i class="icon_close_alt2"></i>Habilitar </a>
                        <?php }  ?>
                      </div>
                    </td>
                  </tr> 
                <?php endforeach; ?>     
                </tbody>
              </table>
            </section>
          </div>
        </div>
     
      </section>
    </section>

  </section>


  <div class="modal fade" id="agregarUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" action="<?=base_url();?>adminController/i_usuarios">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Usuario</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="i_user">Usuario</label>
                    <input type="text" class="form-control" id="i_user" name="i_user" placeholder="Escriba un usuario..">
                    <label for="i_nombre">Nombre</label>
                    <input type="text" class="form-control" id="i_nombre" name="i_nombre" placeholder="Escriba un nombre..">
                    <label for="i_apellido">Apellido</label>
                    <input type="text" class="form-control" id="i_apellido" name="i_apellido" placeholder="Escriba un apellido..">
                    <label for="i_pass">Contaseña</label>
                    <input type="password" class="form-control" id="i_pass" name="i_pass" placeholder="Escriba una contraseña..">
                    <label for="i_correo">Correo</label>
                    <input type="email" class="form-control" id="i_correo" name="i_correo" placeholder="Escriba un correo..">
                    <label for="i_tipo_user">Tipo Usuario</label>
                    <select id="i_tipo_user" name="i_tipo_user" class="form-control">
                    <?php foreach($tipos as $t): ?>
                        <option value="<?=$t->id?>"><?=$t->nombre?></option>
                    <?php endforeach;?>
                    </select>
                  </div>         
              </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade" id="staticUsuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" action="<?=base_url();?>adminController/u_usuarios">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Usuario</h5>
      </div>
      <div class="modal-body">
                <div class="panel-body">
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="u_id" name="u_id">
                    <label for="u_user">Usuario</label>
                    <input type="text" class="form-control" id="u_user" name="u_user">
                    <label for="u_nombre">Nombre</label>
                    <input type="text" class="form-control" id="u_nombre" name="u_nombre">
                    <label for="u_apellido">Apellido</label>
                    <input type="text" class="form-control" id="u_apellido" name="u_apellido">                  
                    <label for="u_pass">Contaseña</label>
                    <input type="password" class="form-control" id="u_pass" name="u_pass">
                    <label for="u_tipo_user">Tipo Usuario</label>
                    <select id="u_tipo_user" name="u_tipo_user" class="form-control">
                    <?php foreach($tipos as $t): ?>
                        <option value="<?=$t->id?>"><?=$t->nombre?></option>
                    <?php endforeach;?>
                    </select>
                  </div>         
              </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
      </form>
    </div>
  </div>
</div>