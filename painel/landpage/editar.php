
<?

$edi = new db();
$edi->query( "SELECT * FROM landpage WHERE land_id = '".$link[3]."'" );
$edi->execute();
$row = $edi->object();

include('assets/tinymce-4.6.5/index.php');

?>

<style>
.mce-notification{
  display: none !important;
}
</style>

<a class="btn btn-outline-warning" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Voltar</a>

<hr>

<h2 class="display-4 mb-3">Editar &bull; LandPage</h2>

<div class="card">
  <div class=card-body>

    <form enctype="multipart/form-data"  id="form" method="post">
      <table class="table table-striped">
        <tr>
          <th width="100" valign="middle">T&iacute;tulo</th>
          <td valign="middle"><input class="form-control" name="land_titulo" type="text" id="land_titulo" autocomplete="off" value="<? echo $row->land_titulo?>" size="60" maxlength="200" /> 
          </td>
        </tr>
        <tr>
          <th width="100" valign="middle">URL da Landpage</th>
          <td valign="middle">
            <input class="form-control" name="land_url" type="text" id="land_url" value="<? echo $row->land_url?>" autocomplete="off" size="60" maxlength="200" />
            <code>Obs.: Toda alteração realizada na URL poderá prejudicar no SEO e na divulgação da landpage</code>
          </td>
        </tr>
        <tr>
          <th width="100" valign="middle">T&iacute;tulo Formul&aacute;rio</th>
          <td valign="middle"><input class="form-control" name="land_titulo_form" type="text" id="land_titulo_form" value="<? echo $row->land_titulo_form?>"  autocomplete="off" size="25" maxlength="25" /></td>
        </tr>
        <th>Segmento</th>
        <td><input class="form-control" name="land_ramo_atividade" type="text" id="land_ramo_atividade" autocomplete="off" size="60" value="<? echo $row->land_ramo_atividade?>" /></td>
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
        <td colspan="2"><textarea class="form-control" name="land_descricao" id="land_descricao"><? echo stripcslashes($row->land_descricao)?></textarea></td>
      </tr>
      <tr>
       <th>Status</th>
       <td>
        <select name="land_status" class="custom-select">
          <option value="1" <? if( $row->land_status == '1' ) echo 'selected'; ?> >Ativo</option>
          <option value="0" <? if( $row->land_status == '0' ) echo 'selected'; ?> >Inativo</option>
        </select>   
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input class="btn btn-success w-100" type="buttom" name="Enviar" id="salvar" value="Enviar" />
        <input type="hidden" name="redirecionar" value="visualizar">  <!--Redirecionar-->
        <input type="hidden" name="tabela" value="landpage">           <!--Tabela-->
        <input type="hidden" name="url" value="<? echo $url ?>">      <!--URL-->
        <input type="hidden" name="land_id" value="<? echo $row->land_id ?>">                <!--Valor Editar-->
      </td>
    </tr>
  </table>
</form>

<div id="result"></div>

<script src="<? echo $url ?>php/db.class.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
  /* EDITAR */
  editar('<? echo $url; ?>', 'land_id', '<? echo $row->land_id ?> ', 'tinyMCE');
</script>

</div>
</div>