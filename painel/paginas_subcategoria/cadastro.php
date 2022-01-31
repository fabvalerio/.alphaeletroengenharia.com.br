<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
   $ativeMenu( "#products" ).addClass( "in show" );
 });
</script>

<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>
<hr>
<h2 class="display-4 mb-3">Subcategoria</h2>


<div class="card">
  <div class="card-body">
    <form enctype="multipart/form-data"  id="cadastro" method="post">
      <table class="table table-striped">
        <tr>
          <th width="200">Subcategoria</th>
          <td valign="middle"><input class="form-control" name="sub_titulo" type="text" autofocus id="sub_titulo" maxlength="200" /> 
          </td>
        </tr>
        <tr>
          <th width="200">Link Amigável</th>
          <td valign="middle"><input class="form-control" name="sub_link" type="text" autofocus id="sub_link" maxlength="100" /> </td>
        </tr>
        <tr>
          <th>Categoria</th>
          <td>
            <? echo Select('paginas_categoria', 'cat_titulo', 'cat_id', '', '', 'categoria_cat_id') ?>
          </td>
        </tr>
        <tr>
          <th>Status</th>
          <td>
           <? echo SelectON('sub_status'); ?>
         </td>
       </tr>
       <tr>
        <td colspan="2">
          <input type="hidden" name="redirecionar" value="cadastro">            <!--Redirecionar-->
          <input type="hidden" name="tabela" value="paginas_subcategoria">      <!--Tabela de edição-->
          <input type="hidden" name="url" value="<? echo $url ?>">              <!--Url -->
          <input type="button" name="Enviar" id="salvar" value="Salvar" class="btn btn-success w-100" />
        </td>
      </tr>
    </table>
  </form>
</div>
</div>

<div id="result"></div>

<script src="<? echo $url ?>php/db.class.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
  /* REGISTRO */
  cadastro('<? echo $url; ?>', '');
</script>


<script src="<?=$url?>js/remover-acentos.js" type="text/javascript"></script>
<script type="text/javascript">
 jQuery(document).ready(function($) {
  jQuery('#sub_titulo').keyup(function(){
    jQuery('#sub_link').val( removeAcentos(jQuery('#sub_titulo').val()) );
  });
});
</script>