<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
   $ativeMenu( "#products" ).addClass( "show" );
 });
</script>


<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>
<a href="<?=$url.'!/'.$link[1].'/'.$link[2]?>/enviar" class="btn btn-outline-danger" />Cadastrar sem t&iacute;tulo e link</a>
<hr>


<h2 class="display-4 mb-4">Banner <span style="font-size: 12px;">&bull; 1 passo (Informa&ccedil;&otilde;es e Estrutura&ccedil;&atilde;o)</span></h2>

<div class="card">
  <div class="card-body">

    <form enctype="multipart/form-data" id="cadastro" method="post">
      <table class="table">
        <tr>
          <th width="100" valign="middle">T&iacute;tulo </th>
          <td valign="middle"><input class="form-control" name="ban_titulo" type="text" id="ban_titulo" size="40" />
           <small>*50 caract&eacute;res</small>
         </td>
       </tr>
       <tr>
        <th width="100" valign="middle">Texto</th>
        <td valign="middle"><input class="form-control" name="ban_descricao" type="text" id="ban_descricao" size="100" />
         <small>*100 caract&eacute;res</small>
       </td>
     </tr>
     <tr>
      <th>Link</th>
      <td><input name="ban_link" class="form-control" type="text" id="ban_link" size="60" placeholder="http://www.site.com.br" /></td>
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
        <option value="<? echo $valPages?>"><? echo $valPages?></option>
        <?
      }
      ?>
    </select>
  </td>
  </tr>

    <tr>
      <td colspan="2">
        <input type="hidden" name="redirecionar" value="fotos">  <!--Redirecionar-->
        <input type="hidden" name="tabela" value="banner">      <!--Tabela de edição-->
        <input type="hidden" name="url" value="<? echo $url ?>"> <!--Url -->
        <input type="hidden" name="ban_data" value="<? echo date('Y-m-d H:i:s') ?>">
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
  cadastro('<? echo $url; ?>', '');
</script>