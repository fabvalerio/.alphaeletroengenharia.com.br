<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
   $ativeMenu( "#products" ).addClass( "show" );
 });
</script>

<?

$edi = new db();
$edi->query( "SELECT * FROM banner WHERE ban_id = '".$link[3]."'" );
$edi->execute();
$row = $edi->object();


?>

<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>

<hr>

<h2 class="head">Editar Banner &bull; <span>Cadastro</span></h2>

<form enctype="multipart/form-data" id="form" method="post">
  <table class="table">
    <tr>
      <th width="100" valign="middle">T&iacute;tulo</th>
      <td valign="middle">
        <input name="ban_titulo" class="form-control" type="text" autofocus id="ban_titulo" autocomplete="off" value="<? echo $row->ban_titulo?>" maxlength="50" /> 
        <small>*50 caract&eacute;res</small>
      </td>
    </tr>
    <tr>
      <th width="100" valign="middle">Texto</th>
      <td valign="middle"><input class="form-control" name="ban_descricao" type="text" id="ban_descricao" maxlength="100" value="<? echo $row->ban_descricao?>" />
       <small>*100 caract&eacute;res</small>
     </td>
   </tr>
   <tr>
    <th>Link</th>
    <td><input name="ban_link" type="text" class="form-control" id="ban_link" autocomplete="off" value="<? echo $row->ban_link?>" /></td>
  </tr>


   <tr>
    <td colspan="2">
      <label>
      <i class="fa fa-info-circle text-sm box-ico bg-danger" data-toggle="tooltip" data-placement="right" title="Cuidado ao manipular a inclus&atilde;o de p&aacute;ginas externa" ></i>
      Include (Incluir p&aacute;ginas externas) 
    </label>

    <?
    $pages_includes = glob("../pages/{*.php}", GLOB_BRACE);
    ?>
    <select name="ban_include" class="form-control">
      <option value="0">Nenhum</option>
      <?
      foreach( $pages_includes as $valPages ){
        $valPages = @end( @explode('/', $valPages) );
        ?>
        <option value="<? echo $valPages?>" <? if( $row->ban_include == $valPages ){ echo 'selected'; } ?>><? echo $valPages?></option>
        <?
      }
      ?>
    </select>
  </td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="button" name="Enviar" id="salvar" value="Enviar" class="btn btn-success w-100" /> 
      <input type="hidden" name="redirecionar" value="visualizar">  <!--Redirecionar-->
      <input type="hidden" name="tabela" value="banner">            <!--Tabela-->
      <input type="hidden" name="url" value="<? echo $url ?>">      <!--URL-->
      <input type="hidden" name="ban_id" value="<? echo $row->ban_id?>">                <!--Valor Editar-->
    </td>
  </tr>
</table>
</form>

<div id="result"></div>

<script src="<? echo $url ?>php/db.class.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
  /* EDITAR */
  editar('<? echo $url; ?>', 'ban_id', '<? echo $row->ban_id ?> ', '');
</script>