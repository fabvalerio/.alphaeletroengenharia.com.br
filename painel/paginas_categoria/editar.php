<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
   $ativeMenu( "#products" ).addClass( "in show" );
 });
</script>

<?
$edi = new db();
$edi->query( "SELECT * FROM paginas_categoria WHERE cat_id = '".$link[3]."'" );
$edi->execute();
$row = $edi->object();
?>

<a class="btn btn-outline-warning" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Voltar</a>
<hr>
<h2 class="display-4 mb-3">Categoria &bull; Editar</h2>


<div class="card">
  <div class="card-body">

    <form enctype="multipart/form-data" id="form" method="post">
      <table class="table table-striped">
        <tr class="success">
          <th width="200">Categoria</th>
          <td>
            <input class="form-control" name="cat_titulo" type="text" autofocus id="cat_titulo" autocomplete="off" value="<? echo $row->cat_titulo?>" size="60" maxlength="200" /> 
          </td>
        </tr>
        <tr>
          <th width="200">Link Categoria</th>
          <td>
            <input class="form-control" name="cat_link" type="text" autofocus id="cat_link" value="<? echo $row->cat_link?>" maxlength="100" /> 
            <small><strong>Url da página:</strong> <i><? echo $jsonConf->c_url; ?><strong><span id="urlAmigavel"></span></strong></small></i>
          </td>
        </tr>
        <tr>
          <th>Menu</th>
          <td>
            <? echo Select('menu', 'menu_titulo', 'menu_id', '', $row->cat_menu, 'cat_menu'); ?>
          </td>
        </tr>

        <tr>
          <th>Ativo no menu?</th>
          <td>
           <? echo SelectON('cat_status', $row->cat_status); ?>
         </td>
       </tr>
       <tr>
        <td colspan="2">
          <input type="button" name="Enviar" id="salvar" value="Editar" class="btn btn-success w-100" />
          <input type="hidden" name="redirecionar" value="visualizar">   <!--Redirecionar-->
          <input type="hidden" name="tabela" value="paginas_categoria">  <!--Tabela-->
          <input type="hidden" name="url" value="<? echo $url ?>">       <!--URL-->
          <input type="hidden" name="cat_id" value="<? echo $row->cat_id?>"> <!--Valor Editar-->
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
  editar('<? echo $url; ?>', 'cat_id', '<? echo $row->cat_id?>');
</script>