<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
    $ativeMenu( "#products" ).addClass( "in show" );
  });
</script>

<?
include('assets/tinymce-4.6.5/index.php');
?>

<h2>Menu &bull; Cadastro</h2>

<hr>

<a class="btn btn-outline-warning" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Voltar</a>

<hr>

<form enctype="multipart/form-data" id="cadastro" method="post">
  <table class="table table-bordered">
    <tr>
      <th width="250">T&iacute;tulo do Menu</th>
      <td valign="middle" colspan="8"><input class="form-control" name="menu_titulo" type="text" autofocus id="menu_titulo" maxlength="200" /></td>
    </tr>
    <tr>
     <th class="align-middle">URL Amigável </th>
     <td valign="middle" valign="middle" colspan="8"><input class="form-control" name="menu_link" type="text" autofocus id="menu_link" maxlength="200" />
      <small><strong>Url da página:</strong> <i><? echo $jsonConf->c_url; ?><strong><span id="urlAmigavel"></span></strong></small></i>
    </td>
  </tr>
  
  <tr>
   <td colspan="8">
    <label><b>Descri&ccedil;&atilde;o</b></label>
    <textarea class="form-control" name="menu_descricao" id="menu_descricao" ></textarea>
  </td>
</tr>

<tr>

 <th class="align-middle">Status</th>
 <td>
  <select name="menu_status" class="custom-select">
    <option value="1" selected>Ativo</option>
    <option value="0">Inativo</option>
  </select> 
</td>
<th class="align-middle">Aparecer na Home?</th>
<td>
 <select name="menu_home" class="custom-select">
  <option value="1">Ativo</option>
  <option value="0" selected>Inativo</option>
</select> 
</td>

<? if(  $jsonConf->c_menu_rodape == '1' ){ ?>
 <th class="align-middle">Aparecer na Rodap&eacute;?</th>
 <td>
   <select name="menu_rodape" class="custom-select">
    <option value="1">Ativo</option>
    <option value="0" selected>Inativo</option>
  </select> 
</td>
<? }?>

<? if(  $jsonConf->c_categoria == '1' ){ ?>
 <th class="align-middle">Ocultar as categorias</th>
 <td>
   <select name="menu_sem_categoria" class="custom-select">
    <option value="1">Ativo</option>
    <option value="0" selected>Inativo</option>
  </select> 
</td>
</tr>

<? }?>

<? if(  $jsonConf->c_bar == '1' ){ ?>
 <th class="align-middle">Aparecer no Topo Header</th>
 <td>
   <select name="menu_bar" class="custom-select">
    <option value="1">Ativo</option>
    <option value="0" selected>Inativo</option>
  </select> 
</td>
<? }?>
</tr>
<tr>

 <th class="align-middle">Paginização</th>
 <td>
   <select name="menu_paginizacao" class="custom-select">
    <option value="1">Ativo</option>
    <option value="0" selected>Inativo</option>
  </select> 
</td>

<th class="align-middle">Quantidade de conteúdo por página</th>
<td>
  <input type="number" class="form-control" id="menu_quantidade" name="menu_quantidade" minlength="0"> 
</td>
</tr>


<tr>
  <td colspan="8">

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
  <td colspan="8"><h2><i class="fa fa-sitemap"></i> SEO</h2></td>
</tr>

<tr>
  <th class="align-middle">Descri&ccedil;&atilde;o</th>
  <td colspan="8"><input type="text" name="menu_mini_texto" value="" placeholder="" class="form-control" maxlength="200"></td>
</tr>

<tr>
  <th class="align-middle">Keyworks</th>
  <td colspan="8"><input type="text" name="menu_keyworks" value="" placeholder="" class="form-control" maxlength="200"></td>
</tr>

<tr>
  <td colspan="8">
    <input type="hidden" name="tabela" value="menu"> 
    <input type="hidden" name="url" value="<? echo $url ?>">
    <input type="hidden" name="redirecionar" value="visualizar">
    <input type="hidden" name="tinyMCE" value="true"> 
    <input type="button" name="Enviar" id="salvar" value="Enviar" class="btn btn-outline-success" />
  </td>
</tr>
</table>
</form>

<div id="result"></div>

<script src="<? echo $url ?>php/db.class.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
  /* REGISTRO */
  cadastro('<? echo $url; ?>', 'tinyMCE');
</script>

<script src="<? echo $url?>js/remover-acentos.js" type="text/javascript"></script>
<script type="text/javascript">

 jQuery(document).ready(function($) {
  jQuery('#menu_titulo').keyup(function(){
    jQuery('#menu_link').val( removeAcentos(jQuery('#menu_titulo').val()) );
    jQuery('#urlAmigavel').text( removeAcentos(jQuery('#menu_titulo').val()) );
  });
  
  jQuery('#menu_link').keyup(function(){
    jQuery('#urlAmigavel').text( removeAcentos(jQuery('#menu_link').val()) );
  });
});

</script>

