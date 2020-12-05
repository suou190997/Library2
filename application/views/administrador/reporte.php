<!--main content start-->
<section id="main-content">
      <section class="wrapper">
        <div class="row mb-2">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Reporte</h3>
            <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar..">
           
            </div>
        </div>
        <br>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <table class="table table-striped table-advance table-hover order-table">
                <thead>
                  <tr>
                    <th><i class="icon_pin_alt"></i> Libro</th>
                    <th><i class="icon_profile"></i> Ejemplar</th>
                    <th><i class="icon_profile"></i> Nombre</th>
                    <th><i class="icon_cogs"></i> Fecha Prestamo</th>
                    <th><i class="icon_cogs"></i> Fecha Fin</th>
                    <th><i class="icon_cogs"></i> Fecha Retornado</th>
                  </tr>
                  <tr>
                <thead>
                <tbody>
                <?php foreach( $reporte as $c ):?>
                    <td><?=$c->title?></td>
                    <td><?=$c->code?></td>
                    <td><?=$c->name?></td>
                    <td><?=$c->start_at?></td>
                    <td><?=$c->finish_at?></td>
                    <td><?=$c->returned_at?></td>
                    
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
  <script type="text/javascript">
    (function(document) {
      'use strict';

      var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
          _input = e.target;
          var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
          Arr.forEach.call(tables, function(table) {
            Arr.forEach.call(table.tBodies, function(tbody) {
              Arr.forEach.call(tbody.rows, _filter);
            });
          });
        }

        function _filter(row) {
          var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
          row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('light-table-filter');
            Arr.forEach.call(inputs, function(input) {
              input.oninput = _onInputEvent;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          LightTableFilter.init();
        }
      });

    })(document);
    </script>