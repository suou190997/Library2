<section id="main-content">
      <section class="wrapper">
        <div class="row mb-2">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Libros</h3>
            
            </div>
        </div>
        <br>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Libro-Ejemplar
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url();?>prestarController/i_prestar">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Cliente<span class="required">*</span></label>
                      <div class="col-lg-10">
                      <select class="form-control" name="cliente">
                      <?php foreach( $cliente as $c ):?>
        <option value="<?=$c->id?>" ><?=$c->name?></option>
        <?php endforeach; ?>        
      </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">Ejemplar <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <?php if($item!=null){ ?>
                      <select class="form-control" name="ejemplar">
                     
                      <?php foreach( $item as $i ):?>
        <option value="<?=$i->id?>" ><?=$i->code?></option>
        <?php endforeach; ?>     

      </select> 
                      <?php }else{
                          echo('No hay Ejemplares');

                      } ?>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Inicio</label>
                      <div class="col-lg-10">
                      <input type="date" id="start" name="inicio" value="2020-01-01" min="2020-01-01" >
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Fin <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <input type="date" id="start" name="fin" value="2020-01-01" min="2020-01-01" >
                      </div>
                    </div>
                    
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                      <?php if($item!=null){ ?>   <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                        <?php } ?>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </section>
          </div>
        </div>
     
      </section>
    </section>

  </section>