<!--main content start-->
<section id="main-content">
      <section class="wrapper">
        <div class="row mb-2">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Libros Reservados</h3>
             </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class="icon_pin_alt"></i> Ejemplar</th>
                    <th><i class="icon_profile"></i> Libro</th>
                    <th><i class="icon_profile"></i> Cliente</th>
                    <th><i class="icon_profile"></i> Inicio</th>
                    <th><i class="icon_profile"></i> Fin</th>
                    <th><i class="icon_cogs"></i> Acción</th>
                  </tr>
                  <tr>
                <thead>
                <tbody>
                <?php foreach( $prestamo as $c ):?>
                    <td><?=$c->code?></td>
                    <td><?=$c->title?></td> 
                    <td><?=$c->name?></td>
                    <td><?=$c->start_at?></td>
                    <td><?=$c->finish_at?></td>
                    <td>
                      <div class="btn-group">
                          <a class="btn btn-danger" href="<?=base_url();?>prestamoController/d_prestamo?id=<?=$c->id?>&id_status=<?=$c->status_id?>&id_item=<?=$c->iditem?>">Finalizar</a>
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
    <form role="form" method="post" action="<?=base_url();?>authorController/i_author">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Author</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nombre" placeholder="Escriba una categoria..">
                  </div>         
              </div> 
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Apellidos</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="apellidos" placeholder="Escriba una categoria..">
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
    <form role="form" method="post" action="<?=base_url();?>authorController/u_author">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Actualizar Author</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="hidden" class="form-control" id="u_id" name="u_id">
                    <input type="text" class="form-control" id="nombre" name="nombre">
                  </div>         
              </div> 
              <div class="panel-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido">
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