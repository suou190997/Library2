</section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="<?=base_url();?>js/jquery.js"></script>
  <script src="<?=base_url();?>js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="<?=base_url();?>js/jquery.scrollTo.min.js"></script>
  <script src="<?=base_url();?>js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="<?=base_url();?>js/scripts.js"></script>
  <script src="<?=base_url();?>js/actualizar_datos.js"></script>

</body>
<script>

    function actualizar_editorial(id,name)
    {
      $('#u_id_editorial').val(id);
      $('#u_editorial').val(name);
    }

    function actualizar_usuario(id,username,name,lastname,password,tipo)
    {
      $('#u_id').val(id);
      $('#u_user').val(username);
      $('#u_nombre').val(name);
      $('#u_apellido').val(lastname);
      $('#u_pass').val(password);
      $('#u_tipo_user').val(tipo);
    }
    function pasar_datos_actualizar_libros(id)
{

    tr_id = "#a-"+id;
    id = $(tr_id).find(".id").text();
    isbn = $(tr_id).find(".isbn").text();
    title=$(tr_id).find(".title").text();
    subtitle=$(tr_id).find(".subtitle").text();
    description=$(tr_id).find(".descripcion").text();
    n_pag = $(tr_id).find(".anio").text();
    year= $(tr_id).find(".npag").text();
    autor_id=$(tr_id).find(".autor").text();
    categoria_id= $(tr_id).find(".categoria").text();
    editorial_id= $(tr_id).find(".editorial").text();
    $('#u_id_book2').val(id);
    $('#id_isbn2').val(isbn);
    $('#id_titulo2').val(title);
    $('#id_subtitulo2').val(subtitle);
    $('#id_descripcion2').val(description);
    $('#id_pag2').val(n_pag);
    $('#id_anio2').val(year);
    $('#id_autor2').val(autor_id);
    $('#id_categoria2').val(categoria_id);
    $('#id_editorial2').val(editorial_id);
    console.log('ga');
    console.log(id);
  }

 function agregar_item(id,id2){
  $('#u_id_book').val(id);
  $('#ejemplar').val(id2);
 }
 function pasar_datos_actualizar_item(id){
  tr_id = "#a-"+id;
    idejemplar = $(tr_id).find(".id").text();
    book=$(tr_id).find(".book").text();
    codigo=$(tr_id).find(".code").text();
    status=$(tr_id).find(".status").text();
    $('#u_id_book2').val(book);
    $('#id_ejemplar2').val(idejemplar);
    $('#id_codigo2').val(codigo);
    $('#id_estado2').val(status);
 console.log(codigo);
 console.log(status);
 console.log(idejemplar);
 console.log(book);
 }

 function pasar_datos_actualizar_cliente(id,name,apellido,email,address,phone,is_active)
{
    $('#u_id').val(id);
    $('#nombre').val(name);
    $('#apellido').val(apellido);
    $('#Email').val(email);
    $('#Direccion').val(address);
    $('#Telefono').val(phone);
    $('#Estado_u').val(is_active);
}
  </script>

</html>