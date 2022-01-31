<?
include('assets/tinymce-4.6.5/index.php');
?>

<style>
.mce-notification{
  display: none !important;
}
</style>


<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>
<hr>
<h2 class="display-4 mb-3">Cadastrar &bull; Texto para P&aacute;gina</h2>
<div class="card">
  <div class="card-body">
    <form enctype="multipart/form-data" id="cadastro" method="post">
      <table class="table table-striped">
        <tr>
          <th width="100" valign="middle">T&iacute;tulo</th>
          <td valign="middle"><input class="form-control" name="tex_titulo" type="text" autofocus id="tex_titulo" autocomplete="off" size="60" maxlength="200" /></td>
        </tr>
        <tr>
          <th colspan="3">Texto</th>
          <!-- HELP -->
          <? include('includes/#help.php'); ?>
        </tr>
        <tr>
          <td colspan="3"><textarea class="form-control" name="tex_texto" id="tex_texto"></textarea></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="hidden" name="tabela" value="textos">      <!--Tabela de edição-->
            <input type="hidden" name="url" value="<? echo $url ?>"> <!--Url -->
            <input type="button" name="Enviar" id="salvar" value="Enviar" class="btn btn-success w-100" />
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