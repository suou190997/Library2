
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row mb-2">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Editoriales</h3>
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
                    <th><i class="icon_profile"></i> Editorial</th>
                    <th><i class="icon_cogs"></i> Acción</th>
                  </tr>
                  <tr>
                <thead>
                <tbody>
                <?php foreach( $editoriales as $e ):?>
                    <td><?=$e->id?></td>
                    <td><?=$e->name?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success" onclick="actualizar_editorial('<?= $e->id ?>','<?= $e->name ?>')"  data-toggle="modal" data-target="#staticEditorial"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger" href="<?=base_url();?>adminController/d_editoriales?id=<?=$e->id?>"><i class="icon_close_alt2"></i></a>
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
    <form role="form" method="post" action="<?=base_url();?>adminController/i_editoriales">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Editorial</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editorial</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="i_editorial" placeholder="Escriba una editorial..">
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


<div class="modal fade" id="staticEditorial" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" action="<?=base_url();?>adminController/u_editoriales">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Actualizar Editorial</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Editorial</label>
                    <input type="hidden" class="form-control" id="u_id_editorial" name="u_id_editorial">
                    <input type="text" class="form-control" id="u_editorial" name="u_editorial">
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


