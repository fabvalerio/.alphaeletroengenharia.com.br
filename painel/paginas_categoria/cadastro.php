<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
   $ativeMenu( "#products" ).addClass( "in show" );
 });
</script>


<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>

<hr>

<h2 class="display-4 mb-3">Categoria</h2>

<div class="card">
  <div class="card-body">

    <form enctype="multipart/form-data"  id="cadastro" method="post">
      <table class="table table-striped">
        <tr>
          <th width="200">T&iacute;tulo</th>
          <td valign="middle"><input class="form-control" name="cat_titulo" type="text" autofocus id="cat_titulo" maxlength="200" /> </td>
        </tr>
        <tr>
          <th width="200">Link Amigável</th>
          <td valign="middle"><input class="form-control" name="cat_link" type="text" autofocus id="cat_link" maxlength="100" /> </td>
        </tr>
        <tr>
          <th>Menu</th>
          <td>
            <? echo Select("menu", 'menu_titulo', 'menu_id', '', '',  'cat_menu'); ?>
          </td>
        </tr>
        <tr>
          <th>Ativar no menu?</th>
          <td>
           <? echo SelectON('cat_status'); ?>
         </td>
       </tr>
       <tr>
        <td colspan="2">
          <input type="button" name="Enviar" id="salvar" value="Enviar" class="btn btn-success w-100" />
          <input type="hidden" name="redirecionar" value="cadastro">  <!--Redirecionar-->
          <input type="hidden" name="tabela" value="paginas_categoria">      <!--Tabela de edição-->
          <input type="hidden" name="url" value="<? echo $url ?>"> <!--Url -->
        </td>
      </tr>
    </table>
  </form>

  <div id="result"></div>

</div>
</div>

<script src="<? echo $url ?>php/db.class.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
  /* REGISTRO */
  cadastro('<? echo $url; ?>', '');
</script>


<script src="<?=$url?>js/remover-acentos.js" type="text/javascript"></script>
<script type="text/javascript">
 jQuery(document).ready(function($) {
  jQuery('#cat_titulo').keyup(function(){
    jQuery('#cat_link').val( removeAcentos(jQuery('#cat_titulo').val()) );
  });
});
</script>