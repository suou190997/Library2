<!--main content start-->
<section id="main-content">
      <section class="wrapper">
        <div class="row mb-2">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Cliente</h3>
            <a class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"><i class="icon_plus_alt2"></i> Agregar</a>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class="icon_pin_alt"></i> Id</th>
                    <th><i class="icon_profile"></i> Nombre</th>
                    <th><i class="icon_profile"></i> Apellidos</th>
                    <th><i class="icon_profile"></i> Email</th>
                    <th><i class="icon_profile"></i> Direccion</th>
                    <th><i class="icon_profile"></i> Telefono</th>
                    <th><i class="icon_profile"></i> Estado</th>
                    <th><i class="icon_cogs"></i> Acción</th>
                  </tr>
                  <tr>
                <thead>
                <tbody>
                <?php foreach( $cliente as $c ):?>
                    <td><?=$c->id?></td>
                    <td><?=$c->name?></td>
                    <td><?=$c->lastname?></td>
                    <td><?=$c->email?></td>
                    <td><?=$c->address?></td>
                    <td><?=$c->phone?></td>
                    <td><?php
                    if($c->is_active==1){
                        echo("Activo");
                    }else{
                        echo("No Activo");
                    }?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success" onclick="pasar_datos_actualizar_cliente('<?= $c->id ?>','<?= $c->name ?>','<?= $c->lastname ?>','<?= $c->email ?>','<?= $c->address ?>','<?= $c->phone ?>','<?= $c->is_active ?>')"  data-toggle="modal" data-target="#staticBackdrop_update"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger" href="<?=base_url();?>clientController/d_cliente?id=<?=$c->id?>"><i class="icon_close_alt2"></i></a>
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


<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" action="<?=base_url();?>clientController/i_cliente">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Cliente</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nombre" placeholder="Escriba una Nombre..">
                    <label for="exampleInputEmail1">Apellidos</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="apellidos" placeholder="Escriba una Apellidos..">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="Email" placeholder="Escriba una Email..">
                    <label for="exampleInputEmail1">Direccion</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="Direccion" placeholder="Escriba una Direccion..">
                    <label for="exampleInputEmail1">Telefono</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="Telefono" placeholder="Escriba una Telefono..">
                    <label for="exampleInputEmail1">Estado</label>
                    <select name="Estado" id="Estado" class="form-control">
                      <option value="1">Activo</option>
                      <option value="0">No Activo</option>
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


<div class="modal fade" id="staticBackdrop_update" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" action="<?=base_url();?>clientController/u_cliente">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Actualizar Cliente</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="hidden" class="form-control" id="u_id" name="u_id">
                    <input type="text" class="form-control" id="nombre" name="nombre">
                    <label for="exampleInputEmail1">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="Email" name="Email">
                    <label for="exampleInputEmail1">Direccion</label>
                    <input type="text" class="form-control" id="Direccion" name="Direccion">
                    <label for="exampleInputEmail1">Telefono</label>
                    <input type="text" class="form-control" id="Telefono" name="Telefono">
                    <label for="exampleInputEmail1">Estado</label>
                    <select name="Estado" id="Estado_u" class="form-control">
                      <option value="1">Activo</option>
                      <option value="0">No Activo</option>
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