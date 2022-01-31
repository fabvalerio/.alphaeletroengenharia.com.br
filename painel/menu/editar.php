<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
    $ativeMenu( "#products" ).addClass( "in show" );
  });
</script>

<?
$vis = new db();
$vis->query( "SELECT * FROM menu WHERE menu_id = '".$link[3]."'" );
$vis->execute();

$edi = $vis->object();

include('assets/tinymce-4.6.5/index.php');
?>

<a class="btn btn-outline-warning" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Voltar</a>
<a class="btn btn-outline-success" href="<? echo $url?>!/<? echo $link[1]; ?>/cadastro">Novo cadastro</a>

<hr>

<h2 class="display-4 mt-3">Menu &bull; Editar</h2>

<form enctype="multipart/form-data" id="form" method="post">
  <table class="table">
    <tr>
      <th valign="middle">T&iacute;tulo</th>
      <td valign="middle" colspan="8">
        <input class="form-control" name="menu_titulo" type="text" autofocus id="menu_titulo" autocomplete="off" value="<? echo $edi->menu_titulo; ?>" size="60" maxlength="200" /> 
      </td>
    </tr>
    <tr>
     <th valign="middle">Url Amigável</th>
     <td valign="middle" colspan="8"><input class="form-control" name="menu_link" type="text" autofocus id="menu_link" autocomplete="off" value="<? echo $edi->menu_link?>" size="60" maxlength="200" />
     </td>
   </tr>
   
   <tr>
     <td colspan="8">
      <label><b>Descri&ccedil;&atilde;o</b></label>
      <textarea class="form-control" name="menu_descricao" id="menu_descricao" ><? echo $edi->menu_descricao?></textarea>
    </td>
  </tr>
  <tr>

   <th>Status</th>
   <td>
    <select name="menu_status" class="custom-select">
      <option value="1" <? if( $edi->menu_status == '1' ){ echo 'selected'; } ?>>Ativo</option>
      <option value="0" <? if( $edi->menu_status == '0' ){ echo 'selected'; } ?>>Inativo</option>
    </select> 
  </td>
  <th>Aparecer na Home?</th>
  <td>
   <select name="menu_home" class="custom-select">
    <option value="1" <? if( $edi->menu_home == '1' ){ echo 'selected'; } ?>>Ativo</option>
    <option value="0" <? if( $edi->menu_home == '0' ){ echo 'selected'; } ?>>Inativo</option>
  </select> 
</td>

<? if(  $jsonConf->c_menu_rodape == '1' ){ ?>
 <th>Aparecer na Rodap&eacute;?</th>
 <td>
   <select name="menu_rodape" class="custom-select">
    <option value="1" <? if( $edi->menu_rodape == '1' ){ echo 'selected'; } ?>>Ativo</option>
    <option value="0" <? if( $edi->menu_rodape == '0' ){ echo 'selected'; } ?> >Inativo</option>
  </select> 
</td>
<? }?>

<? if(  $jsonConf->c_categoria == '1' ){ ?>
 <th>Ocultar as categorias</th>
 <td>
   <select name="menu_sem_categoria" class="custom-select">
    <option value="1"  <? if( $edi->menu_sem_categoria == '1' ){ echo 'selected'; } ?>>Ativo</option>
    <option value="0"  <? if( $edi->menu_sem_categoria == '0' ){ echo 'selected'; } ?>>Inativo</option>
  </select> 
</td>
</tr>
<? }?>

<? if(  $jsonConf->c_bar == '1' ){ ?>
 <th>Aparecer no Topo Header</th>
 <td>
   <select name="menu_bar" class="custom-select">
    <option value="1" <? if( $edi->menu_bar == '1' ){ echo 'selected'; } ?>>Ativo</option>
    <option value="0" <? if( $edi->menu_bar == '0' ){ echo 'selected'; } ?>>Inativo</option>
  </select> 
</td>
<? }?>
</tr>

<tr>

 <th>Paginização</th>
 <td>
   <select name="menu_paginizacao" class="custom-select">
    <option value="1" <? if( $edi->menu_paginizacao == '1' ){ echo 'selected'; } ?>>Ativo</option>
    <option value="0" <? if( $edi->menu_paginizacao == '0' ){ echo 'selected'; } ?>>Inativo</option>
  </select> 
</td>

<th>Quantidade de conteúdo por página</th>
<td>
  <input type="number" class="form-control" id="menu_quantidade" name="menu_quantidade" minlength="0" value="<? echo $edi->menu_quantidade?>"> 
</td>

</tr>
<tr>
  <td  colspan="8">

    <div class="col-md-12 form-group">
      <h2>Wireframes*</h2>


      <div class="btn-group row" role="group" aria-label="...">

 <?

      $pasta = 'configuracao/wireframes/visualizar/';
      $diretorio = dir($pasta);

      while($arquivo = $diretorio -> read()){
        $dirNumer = $pasta.$arquivo.'/';

        $arquivos = glob("$dirNumer{*.jpg,*.png,*.gif}", GLOB_BRACE);

        foreach($arquivos as $img){

          $modelo_wiri = @end( @explode('/', $img) );
          $modelo_wiri = @current( @explode('.', $modelo_wiri) );
          $modelo_wiri = @end( @explode('-', $modelo_wiri) );

          if( $edi->menu_wireframes_wf_id == $modelo_wiri ) $checked = 'checked="checked"';
          ?>
          <div class="col-lg-3 col-md-6 col-sm-6 text-sm-center p-3">
            <div class="btn btn-secondary">
              <label>
               <input <? echo $checked; ?> type="radio" name="menu_wireframes_wf_id" value="<? echo $modelo_wiri; ?>">
               VISUALIZAR #<? echo $modelo_wiri; ?>
               <hr>
               <img  class="img-fluid" data-toggle="tooltip" data-placement="bottom" title="MODELO <? echo $modelo_wiri; ?>" src="<? echo $url.$img; ?>" >
             </label>
           </div>
         </div>
         <?
         $checked = '';
       }
     }
     $diretorio -> close();

     ?>

      </div>

    </div>

  </td>
</tr>

<tr>
  <td  colspan="8"><h2><i class="fa fa-sitemap"></i> SEO</h2></td>
</tr>

<tr>
  <th>Descri&ccedil;&atilde;o</th>
  <td colspan="8"><input type="text" name="menu_mini_texto" value="<? echo $edi->menu_mini_texto?>" class="form-control" maxlength="200"></td>
</tr>

<tr>
  <th>Keyworks</th>
  <td colspan="8"><input type="text" name="menu_keyworks" value="<? echo $edi->menu_keyworks?>" class="form-control" maxlength="200"></td>
</tr>

<tr>
  <td  colspan="8">
    <input type="button" name="Enviar" id="salvar" value="Salvar" class="btn btn-success w-100"/>
    <input type="hidden" name="menu_id" id="menu_id" value="<? echo $link[3]?>">
    <!--<input type="hidden" name="redirecionar" value="visualizar">  Redirecionar-->
    <input type="hidden" name="tabela" value="menu">              <!--Tabela-->
    <input type="hidden" name="url" value="<? echo $url ?>">      <!--URL-->
  </td>
</tr>
</table>
</form>

<div id="result"></div>

<script src="<? echo $url ?>php/db.class.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
  /* EDITAR */
  editar('<? echo $url; ?>', 'menu_id', '<? echo $edi->menu_id ?>', 'tinyMCE');
</script>