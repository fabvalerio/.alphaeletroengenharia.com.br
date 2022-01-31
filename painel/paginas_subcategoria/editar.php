<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
   $ativeMenu( "#products" ).addClass( "in show" );
 });
</script>

<?
$vis = new db();
$vis->query("SELECT * FROM paginas_subcategoria WHERE sub_id = '".$link[3]."'");
$vis->execute();
$row = $vis->object();
?>

<a class="btn btn-outline-warning" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Voltar</a>
<hr>
<h2 class="display-4 mb-3">Subcategoria &bull; Editar</h2>

<div class="card">
  <div class="card-body">
    <form enctype="multipart/form-data" id="form" method="post">
      <table class="table table-striped">
        <tr>
          <th width="200" valign="middle">Subcategoria</th>
          <td valign="middle">
            <input class="form-control" name="sub_titulo" type="text" id="sub_titulo" autocomplete="off" value="<? echo $row->sub_titulo;?>" size="60" maxlength="200" /> 
          </td>
        </tr>
        <tr>
          <th width="200" valign="middle">Link Subcategoria</th>
          <td valign="middle">
            <input class="form-control" name="sub_link" type="text" id="sub_link" autocomplete="off" value="<? echo $row->sub_link;?>" size="60" maxlength="200" /> 
          </td>
        </tr>
        <tr>
          <th>Categoria</th>
          <td>
            <? echo Select('paginas_categoria', 'cat_titulo', 'cat_id', '', $row->categoria_cat_id, 'categoria_cat_id') ?>
          </td>
        </tr>
        <tr>
          <th>Status</th>
          <td>
           <? echo SelectON('sub_status', $row->sub_status); ?>
         </td>
       </tr>
       <tr>
        <td colspan="2">
          <input type="button" name="Enviar" id="salvar" value="Enviar" class="btn btn-success w-100"/>
          <input type="hidden" name="redirecionar" value="visualizar">      <!--Redirecionar-->
          <input type="hidden" name="tabela" value="paginas_subcategoria">  <!--Tabela-->
          <input type="hidden" name="url" value="<? echo $url ?>">          <!--URL-->
          <input type="hidden" name="sub_id" value="<? echo $link[3]?>">    <!--Valor Editar-->
        </td>
      </tr>
    </table>
  </form>    
</div>
</div>

<div id="result"></div>

<script src="<? echo $url ?>php/db.class.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
  /* EDITAR */
  editar('<? echo $url; ?>', 'sub_id', '<? echo $row->sub_id ?> ', '');
</script>

<script src="<? echo $url?>js/remover-acentos.js" type="text/javascript"></script>
<script type="text/javascript">

 jQuery(document).ready(function($) {

  jQuery('#sub_titulo').blur(function(){

                    //alert(jQuery('#menu_menu').val());
                    jQuery('#sub_link').val( removeAcentos(jQuery('#sub_titulo').val()) );
                  });

});


</script>