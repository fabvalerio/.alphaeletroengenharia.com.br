<?

$copy = new db();
$copy->query("SELECT * FROM landpage WHERE land_id = '".$link[3]."'");
$copy->execute();

include('assets/tinymce-4.6.5/index.php');

?>

<style>
.mce-notification{
  display: none !important;
}
</style>

<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>
<hr>
<h2 class="display-4 mb-3">Cadastrar &bull; LandPage</h2>

<div class="card">
  <div class="card-body">
    <form enctype="multipart/form-data" id="cadastro" method="post">
      <table class="table table-striped">
        <tr>
          <th width="100" valign="middle">T&iacute;tulo</th>
          <td valign="middle"><input class="form-control" name="land_titulo" type="text" id="land_titulo" autocomplete="off" size="60" maxlength="200" /></td>
        </tr>
        <tr>
          <th width="100" valign="middle">URL da Landpage</th>
          <td valign="middle">
           <input class="form-control" name="land_url" type="text" id="land_url" autocomplete="off" size="60" maxlength="200" />
           <code>Obs.: Toda alteração realizada na URL poderá prejudicar no SEO e na divulgação da landpage</code>
         </td>
       </tr>
       <tr>
        <th width="100" valign="middle">T&iacute;tulo Formul&aacute;rio</th>
        <td valign="middle"><input class="form-control" name="land_titulo_form" type="text" id="land_titulo_form" autocomplete="off" size="25" maxlength="25" /></td>
      </tr>
      <tr>
        <th>Segmento</th>
        <td><input class="form-control" name="land_ramo_atividade" type="text" id="land_ramo_atividade" autocomplete="off" size="60" /></td>
      </tr>
      <tr>
        <th>Wireframes</th>
        <td>
          <select name="land_wireframe" class="form-control">
            <option value="0" disabled>Selecione</option>
            <option value="1">Modelo - 01</option>
          </select>
        </td>
      </tr>
      <tr>
        <th colspan="3">Conte&uacute;do</th>
      </tr>
      <tr>
        <td colspan="3"><textarea class="form-control" name="land_descricao" id="land_descricao"><? echo stripcslashes($copy->exibi['land_descricao'])?></textarea></td>
      </tr>
      <tr>
       <th>Status</th>
       <td>
        <select name="land_status" class="custom-select">
          <option value="1" selected>Ativo</option>
          <option value="0">Inativo</option>
        </select> 
       </td>
     </tr>

     <tr>
      <td colspan="2">
        <input type="button" name="Enviar" id="salvar" value="Enviar" class="btn btn-success w-100" />
       <input type="hidden" name="redirecionar" value="fotos">  <!--Redirecionar-->
       <input type="hidden" name="tabela" value="landpage">      <!--Tabela de edição-->
       <input type="hidden" name="url" value="<? echo $url ?>"> <!--Url -->
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
  cadastro('<? echo $url; ?>', 'tinyMCE');
</script>

<script src="<? echo $url?>js/remover-acentos.js" type="text/javascript"></script>
<script type="text/javascript">
 jQuery(document).ready(function($) {
  jQuery('#land_titulo').keyup(function(){
    jQuery('#land_url').val( removeAcentos(jQuery('#land_titulo').val()) );
  });
});
</script>


