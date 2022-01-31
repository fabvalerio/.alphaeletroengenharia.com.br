
<?
$edi = new db();
$edi->query( "SELECT * FROM textos WHERE tex_id = '".$link[3]."'" );
$edi->execute();
$row = $edi->object();

include('assets/tinymce-4.6.5/index.php'); 
?>

<style>
.mce-notification{
  display: none !important;
}
</style>

<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>
<hr>
<h2 class="display-4 mb-3">Editar &bull; Texto</h2>

<div class="card">
  <div class="card-body">
    <form enctype="multipart/form-data" id="form" method="post">
      <table class="table table-striped">
        <tr class="success">
          <td valign="middle">
            <p>T&iacute;tulo</p>
            <input class="form-control" name="tex_titulo" type="text" autofocus id="tex_titulo" autocomplete="off" value="<? echo $row->tex_titulo; ?>" size="60" maxlength="200" /> 
          </td>
        </tr>
        <tr>
          <!-- HELP -->
          <? include('includes/#help.php'); ?>
          <td><textarea class="form-control" name="tex_texto" id="tex_texto"><? echo $row->tex_texto; ?></textarea></td>
        </tr>
        <tr>
          <td colspan="2">
            <input  type="button" name="Enviar" id="salvar" value="Editar" class="btn btn-success w-100" />
            <input type="hidden" name="redirecionar" value="visualizar">  <!--Redirecionar-->
            <input type="hidden" name="tabela" value="textos">           <!--Tabela-->
            <input type="hidden" name="url" value="<? echo $url ?>">      <!--URL-->
            <input type="hidden" name="tex_id" value="<? echo $link[3]?>">                <!--Valor Editar-->
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
  editar('<? echo $url; ?>', 'tex_id', '<? echo $link[3]?> ', 'tinyMCE');
</script>