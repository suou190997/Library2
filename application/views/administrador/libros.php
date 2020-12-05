<section id="main-content">
      <section class="wrapper">
        <div class="row mb-2">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Libros</h3>
            <a class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop_agregar_book"><i class="icon_plus_alt2"></i> Agregar</a>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                   <th style="display:none;"><i class="icon_profile"></i> Codigo Libro</th>
                    <th><i class="icon_profile"></i> ISBN</th>
                    <th><i class="icon_cogs"></i> Titulo</th>
                    <th  style="display:none;"><i class="icon_cogs"></i> Subtitulo</th>
                    <th style="display:none;"><i class="icon_cogs"></i> Descripcion</th>
                    <th style="display:none;"><i class="icon_cogs"></i> Year</th>
                    <th style="display:none;"><i class="icon_cogs"></i> N_pag</th>
                    <th style="display:none;"><i class="icon_cogs"></i> Autor_id</th>
                    <th><i class="icon_cogs"></i> Autor</th>
                    <th style="display:none;"><i class="icon_cogs"></i> Cateogira</th>
                    <th><i class="icon_cogs"></i> Categoria</th>
                    <th style="display:none;"><i class="icon_cogs"></i> editorial_id</th>
                    <th><i class="icon_cogs"></i> editorial</th>
                    <th><i class="icon_cogs"></i> Opciones</th>
                  </tr>
                  
                  <tr>

                  </tr>
                <thead>
                <tbody>
                <?php foreach( $book as $c ):?>
                <tr id = a-<?=    $c->id ?>>
                    <td style="display:none;" class="id userData table--item"><?=$c->id?></td>
                    <td class="isbn userData table--item"><?=$c->isbn?></td>
                    <td  class="title userData table--item"><?=$c->title?></td>
                    <td  class="subtitle userData table--item"  style="display:none;"><?=$c->subtitle?></td>
                    <td  class="descripcion userData table--item"  style="display:none;"><?=$c->description?></td>
                    <td class="anio userData table--item"   style="display:none;"><?=$c->year?>
                    <td class="npag userData table--item"   style="display:none;"><?=$c->n_pag?>
                    <td  class="autor userData table--item" style="display:none;"><?=$c->author_id?></td>
                    <td><?=$c->autor?> <?=$c->lastname?></td>
                    <td  class="categoria userData table--item" style="display:none;" ><?=$c->category_id?></td>
                    <td ><?=$c->categoria?></td>
                    <td  class="editorial userData table--item" style="display:none;"><?=$c->editorial_id?></td>
                    <td><?=$c->editorial?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success" onclick="pasar_datos_actualizar_libros('<?= $c->id ?>')" data-toggle="modal" data-target="#staticBackdrop_editar_book"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger" href="<?=base_url();?>adminController/d_libros?id=<?=$c->id?>"><i class="icon_close_alt2"></i></a>
                        <a class="btn btn-secondary"  href="<?=base_url();?>adminController/l_ejemplares?id=<?=$c->id?>">ejemplares<i class="icon_plus_alt2"></i></a>
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
  <div class="modal fade" id="staticBackdrop_agregar_book" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" action="<?=base_url();?>adminController/i_libros">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Categoria</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="id_isbn">ISBN</label>
                    <input type="text" class="form-control" id="id_isbn" name="isbn" placeholder="Escriba ISBN..">
                    <label for="id_titulo">Titulo</label>
                    <input type="text" class="form-control" id="id_titulo" name="titulo" placeholder="Escriba un titulo..">
                    <label for="id_autor">Autor</label>
                    <select class="form-control" id="id_autor" name="autor">
                    <?php foreach ($autores as $c): ?>
                       <option value="<?=    $c->id ?>"><?=    $c->name ?></option>
                    <?php endforeach; ?>
                    </select>
                    <label for="id_subtitulo">Subtitulo</label>
                    <input type="text" class="form-control" id="id_subtitulo" name="subtitulo" placeholder="Escriba una categoria..">
                    <label for="id_descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="id_descripcion" name="descripcion" placeholder="Escriba una categoria..">
                    <label for="id_anio">Año</label>
                    <input type="text" class="form-control" id="id_anio" name="anio" placeholder="Escriba una categoria..">
                    <label for="id_pag">N° Paginas</label>
                    <input type="text" class="form-control" id="id_pag" name="pag" placeholder="Escriba una categoria..">
                    <label for="id_editorial">Editorial</label>
                    <select class="form-control" id="id_editorial" name="editorial">
                    <?php foreach ($editoriales as $c): ?>
                       <option value="<?=    $c->id ?>"><?=    $c->name ?></option>
                    <?php endforeach; ?>
                    </select>
                    <label for="id_categoria">Categoria</label>
                    <select class="form-control" id="id_categoria" name="categoria">
                    <?php foreach ($categorias as $c): ?>
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

<div class="modal fade" id="staticBackdrop_editar_book" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form" method="post" action="<?=base_url();?>adminController/u_libros">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Categoria</h5>
      </div>
      <div class="modal-body">
              <div class="panel-body">
                  <div class="form-group">
                    <label for="id_isbn2">ISBN</label>
                    <input type="text" class="form-control" id="id_isbn2" name="isbn2" placeholder="Escriba ISBN..">
                    <label for="id_titulo2">Titulo</label>
                    <input type="text" class="form-control" id="id_titulo2" name="titulo2" placeholder="Escriba un titulo..">
                    <label for="id_autor2">Autor</label>
                    <select class="form-control" id="id_autor2" name="autor2">
                    <?php foreach ($autores as $c): ?>
                       <option value="<?=    $c->id ?>"><?=    $c->name ?></option>
                    <?php endforeach; ?>
                    </select>
                    <input type="hidden" class="form-control" id="u_id_book2" name="u_id2">
                    <label for="id_subtitulo2">Subtitulo</label>
                    <input type="text" class="form-control" id="id_subtitulo2" name="subtitulo2" placeholder="Escriba una categoria..">
                    <label for="id_descripcion2">Descripcion</label>
                    <input type="text" class="form-control" id="id_descripcion2" name="descripcion2" placeholder="Escriba una categoria..">
                    <label for="id_anio2">Año</label>
                    <input type="text" class="form-control" id="id_anio2" name="anio2" placeholder="Escriba una categoria..">
                    <label for="id_pag2">N° Paginas</label>
                    <input type="text" class="form-control" id="id_pag2" name="pag2" placeholder="Escriba una pagina..">
                    <label for="id_editorial2">Editorial</label>
                    <select class="form-control" id="id_editorial2" name="editorial2">
                    <?php foreach ($editoriales as $c): ?>
                       <option value="<?=    $c->id ?>"><?=    $c->name ?></option>
                    <?php endforeach; ?>
                    </select>
                    <label for="id_categoria2">Categoria</label>
                    <select class="form-control" id="id_categoria2" name="categoria2">
                    <?php foreach ($categorias as $c): ?>
                       <option value="<?=    $c->id ?>"><?=    $c->name ?></option>
                    <?php endforeach; ?>
                    </select>
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