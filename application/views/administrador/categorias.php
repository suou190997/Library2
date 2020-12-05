
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row mb-2">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Categorias</h3>
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
                    <th><i class="icon_profile"></i> Categoria</th>
                    <th><i class="icon_cogs"></i> Acción</th>
                  </tr>
                  <tr>
                <thead>
                <tbody>
                <?php foreach( $categorias as $c ):?>
                    <td><?=$c->id?></td>
                    <td><?=$c->name?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success" onclick="pasar_datos_actualizar('<?= $c->id ?>','<?= $c->name ?>')"  data-toggle="modal" data-target="#staticBackdrop_update"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger" href="<?=base_url();?>adminController/d_categorias?id=<?=$c->id?>"><i class="icon_close_alt2"></i></a>
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
    <form role="form" method="post" action="<?=base_url();?>adminController/i_categorias">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Categoria</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Categoria</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="i_categoria" placeholder="Escriba una categoria..">
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
    <form role="form" method="post" action="<?=base_url();?>adminController/u_categorias">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Actualizar Categoria</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Categoria</label>
                    <input type="hidden" class="form-control" id="u_id" name="u_id">
                    <input type="text" class="form-control" id="u_categoria" name="u_categoria">
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