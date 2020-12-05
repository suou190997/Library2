<section id="main-content">
      <section class="wrapper">
        <div class="row mb-2">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Ejemplares</h3>
          </div>
        </div>
        <a class="btn btn-primary" onclick="agregar_item('<?= $id ?>','<?php ?>')" data-toggle="modal" data-target="#staticBackdrop_agregar_item"><i class="icon_plus_alt2"></i> Agregar</a>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                   <th><i class="icon_profile"></i> id</th>
                    <th><i class="icon_profile"></i> book id</th>
                    <th><i class="icon_cogs"></i> Codigo</th>
                    <th  ><i class="icon_cogs"></i> Status_id</th>
                    <th style=""><i class="icon_cogs"></i> Nombre</th>
                    <th><i class="icon_cogs"></i> Opciones</th>
                  </tr>
                  
                  <tr>

                  </tr>
                <thead>
                <tbody>
                <?php foreach( $item as $c ):?>
                <tr id = a-<?=    $c->id ?>>
                    <td  class="id userData table--item"><?=$c->id?></td>
                    <td class="book userData table--item"><?=$c->book_id?></td>
                    <td  class="code userData table--item"><?=$c->code?></td>
                    <td  class="status userData table--item" ><?=$c->status_id?></td>
                    <td  class="name userData table--item" ><?=$c->name?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success" onclick="pasar_datos_actualizar_item('<?= $c->id ?>')" data-toggle="modal" data-target="#staticBackdrop_editar_item"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger" href="<?=base_url();?>adminController/d_ejemplares?id=<?=$c->id?>&&idbook=<?=$c->book_id?>"><i class="icon_close_alt2"></i></a>
                        
                      </div>
                    </td>
                </tr> 
                <?php endforeach;?>        
                </tbody>
              </table>
            </section>
          </div>
        </div>
     
      </section>
    </section>

  </section>
  <div class="modal fade" id="staticBackdrop_agregar_item" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" action="<?=base_url();?>adminController/i_ejemplares">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Ejemplar</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="id_isbn"></label>
                    <input type="hidden" class="form-control" id="u_id_book" name="u_id">
                    <input type="hidden" class="form-control" id="id_ejemplar" name="ejemplar">
                    <label for="id_codigo">Codigo</label>
                    <input type="text" class="form-control" id="id_codigo" name="codigo" placeholder="Escriba el codigo ..">
                    <label for="id_descripcion">Estado</label>
                    <select class="form-control" id="id_estado" name="estado">
                    <?php foreach ($status as $c): ?>
                       <option value="<?=    $c->id ?>"><?=    $c->name ?></option>
                    <?php endforeach; ?>
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

<div class="modal fade" id="staticBackdrop_editar_item" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" action="<?=base_url();?>adminController/u_ejemplares">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Ejemplar</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="id_isbn"></label>
                    <input type="hidden" class="form-control" id="u_id_book2" name="u_id2">
                    <input type="hidden" class="form-control" id="id_ejemplar2" name="ejemplar2">
                    <label for="id_codigo">Codigo</label>
                    <input type="text" class="form-control" id="id_codigo2" name="codigo2" placeholder="Escriba el codigo ..">
                    <label for="id_descripcion">Estado</label>
                    <select class="form-control" id="id_estado2" name="estado2">
                    <?php foreach ($status as $c): ?>
                       <option value="<?=    $c->id ?>"><?=    $c->name ?></option>
                    <?php endforeach; ?>
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


