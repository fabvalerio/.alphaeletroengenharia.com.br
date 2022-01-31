<?

include('assets/tinymce-4.6.5/index.php');

/* PAGINAS */
$__InputSQLSql = "SELECT * 
FROM paginas AS p 
ORDER BY p.pag_id ASC";

$__InputSQL = new db();     
$__InputSQL->query($__InputSQLSql);
$__InputSQL->execute();

?>

<a class="btn btn-outline-warning" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Voltar</a>

<div class="stepwizard">
  <div class="stepwizard-row setup-panel">
    <div class="stepwizard-step">
      <div class="btn btn-success btn-circulo">
        <i class="fas fa-info-circle"></i>
      </div>
      <p>Informa&ccedil;&otilde;es</p>
    </div>
    <div class="stepwizard-step">
      <div class="btn btn-secondary btn-circulo">
        <i class="fas fa-images"></i>
      </div>
      <p>Insirir Imagens</p>
    </div>
    <div class="stepwizard-step">
      <div class="btn btn-secondary btn-circulo">
        <i class="fas fa-check-double"></i>
      </div>
      <p>Finalizar</p>
    </div>
  </div>
</div>



<h2 class="head">Criar P&aacute;gina <span class="text-danger">Campos (*) obrigat&oacute;rios</span> <span style="font-size: 12px;">   &bull; 1 passo (Informa&ccedil;&otilde;es e Estrutura&ccedil;&atilde;o)</span></h2>

<hr>

<form id="cadastro" enctype="multipart/form-data" action="<? echo $url.'!/'.$link[1].'/'.$link[2]?>/envio" method="post">


  <div class="row">

    <div class="col-md-4 form-group">
      <label>
        <i class="fa fa-info-circle text-sm box-ico bg-danger" data-toggle="tooltip" data-placement="right" title="Selecione qual ser&aacute; a sess&atilde;o/p&aacute;gina que ir&aacute; aparecer" ></i>
      Menu/P&aacute;gina*</label>
      <select class="form-control" name="menu_menu_id" id="pag_menu" required="required" >
        <option value="">Selecione qual menu ir&aacute; aparecer!</option>
        <?
        $MenuSQL = "SELECT * FROM menu WHERE menu_status = '1' ORDER BY menu_titulo ASC";
        $Menu = new db();
        $Menu->query( $MenuSQL );
        $Menu->execute();

        foreach( $Menu->row() AS $row ){
         echo '<option value="'.$row['menu_id'].'">'.$row['menu_titulo'].'</option>'."\n";
       }
       ?>
     </select>
   </div>

   <? if(  $jsonConf->c_categoria == '1' ){ ?>
    <div class="col-md-4 form-group">
      <label>Categoria</label>
      <div id="result_menus">
       <input value="" disabled="no" class="form-control">
     </div>
   </div>
 <? } ?>

 <? if(  $jsonConf->c_subcategoria == '1' ){ ?>
   <div class="col-md-4 form-group">
    <label>Sub-Categoria</label>
    <div id="result_categoria">
     <input value="" disabled="no" class="form-control">
   </div>
 </div>
<? }  ?>

<div class="col-md-12 form-group">
  <label>T&iacute;tulo*</label>
  <input class="form-control" name="pag_titulo" type="text" id="pag_titulo" autocomplete="off" size="60" maxlength="60" required="required" />
</div>

<div class="col-md-12 form-group">
  <label>URL Amigável*</label>
  <div class="input-group mb-2" id="urlAmigavel">
    <div class="input-group-prepend">
      <div class="input-group-text" id="urlAmigavelResult">
        <i class="fas fa-exclamation-triangle text-warning"></i>
      </div>
    </div>
    <input class="form-control" name="pag_link" type="text" id="pag_link" autocomplete="off" size="60" maxlength="60" required="required" />
  </div>
  <small><strong>Url da página:</strong> <i><? echo $jsonConf->c_url; ?><strong><span id="urlAmigavelVis"></span></strong></i></small>
</div>

<div class="col-md-4 form-group">
  <label>
    <i class="fa fa-info-circle text-sm box-ico bg-danger" data-toggle="tooltip" data-placement="right" title="Com o campo de data, você poderá agendar as publicações." ></i>
    Data (opcional)
  </label>
  <input class="form-control" name="pag_data" type="date" id="pag_data" autocomplete="off" size="60" value="<? echo date('Y-m-d');?>" />
</div>

<div class="col-md-8 form-group">
  <label>
    <i class="fa fa-info-circle text-sm box-ico bg-danger" data-toggle="tooltip" data-placement="right" title="Este campo é muito importante, para a otimiza&ccedil;&atilde;o nos buscadores" ></i>
  Mini Descri&ccedil;&atilde;o*</label>
  <input class="form-control" name="pag_mini_descricao" type="text" id="pag_mini_descricao" autocomplete="off" size="200" required="required" />
</div>

<div class="col-md-12 form-group">
  <label>Texto*</label>

  <!-- HELP -->
  <? include('includes/#help.php'); ?>

  <textarea class="form-control" name="pag_texto" id="pag_texto" ></textarea>
</div>


<div class="col-md-12 form-group">
  <label>
    <i class="fa fa-info-circle text-sm box-ico bg-danger" data-toggle="tooltip" data-placement="right" title="Este campo é muito importante, para a otimiza&ccedil;&atilde;o nos buscadores" ></i>
  Palavras Metas para busca e SEO*</label>
  <input class="form-control" name="pag_keyworks" type="text" id="pag_keyworks" autocomplete="off" size="60" required="required" />
  <em>M&aacute;ximo 200 caracteres: site, site responsivo, site onepage, site cms</em>
</div>


<div class="col-md-3 form-group">
  <label>Status</label>
  <br>
  <select name="pag_status" class="custom-select">
    <option value="1" selected>Ativo</option>
    <option value="0">Inativo</option>
  </select>   
</div>

<div class="col-md-3 form-group">
  <label>
    <i class="fa fa-info-circle text-sm box-ico bg-danger" data-toggle="tooltip" data-placement="right" title="Deseja que est&aacute; p&aacute;gina apare&ccedil;a na home do site?" ></i>
  Destaque na Home?</label>
  <br>
  <select name="pag_home" class="custom-select">
    <option value="1">Ativo</option>
    <option value="0" selected>Inativo</option>
  </select>   
</div>

<div class="col-md-3 face">
  <label>
    Coment&aacute;rio do Face
  </label>
  <br>
  <select name="pag_comentario" class="custom-select">
    <option value="1">Ativo</option>
    <option value="0" selected>Inativo</option>
  </select>    
</div>


<div class="col-md-12 form-group wireframes">
  <h2>Wireframes*</h2> <span class="label label-danger">Modelo de diagrama&ccedil;&atilde;o da p&aacute;gina</span>


    <hr>
    <div class="row">
     <?

     $pasta = 'configuracao/wireframes/ver/';
     $diretorio = dir($pasta);

     while($arquivo = $diretorio -> read()){
      $dirNumer = $pasta.$arquivo.'/';

      $arquivos = glob("$dirNumer{*.jpg,*.png,*.gif}", GLOB_BRACE);

      foreach($arquivos as $img){

        $modelo_wiri = @end( @explode('/', $img) );
        $modelo_wiri = @current( @explode('.', $modelo_wiri) );
        $modelo_wiri = @end( @explode('-', $modelo_wiri) );

        ?>
        <div class="col-lg-3 col-md-6 col-sm-6 text-sm-center p-3">
          <div class="btn btn-secondary">
            <label>
             <input type="radio" name="paginas_wireframes_wf_id" value="<? echo $modelo_wiri; ?>">
             VER #<? echo $modelo_wiri; ?>
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

   <div class="col-md-12 form-group">
    <label>
      <i class="fa fa-info-circle text-sm box-ico bg-danger" data-toggle="tooltip" data-placement="right" title="Cuidado ao manipular a inclus&atilde;o de p&aacute;ginas externa" ></i>
      Include (Incluir p&aacute;ginas externas) 
    </label>
    <?
    $pages_includes = glob("../includes_pages/{*.php}", GLOB_BRACE);
    ?>
    <select name="pag_include" class="form-control">
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
  </div>
  <hr>

  <div class="col-md-12 form-group">
    <hr>
    <input type="hidden" name="tinyMCE" value="true">            <!--tue ou null-->
    <input type="hidden" name="redirecionar" value="fotos">
    <input type="hidden" name="tabela" value="paginas">
    <input type="hidden" name="url" value="<? echo $url ?>">
    <input type="button" value="Salvar" id="salvar"  class="btn btn-danger form-control" /> 
  </div>
</div>
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

  $("#salvar").hide();

  jQuery('#pag_titulo').keyup(function(){

    var url_verificar = '<? echo $url ?>paginas/-verificar-url.php?url='+removeAcentos(jQuery('#pag_titulo').val());

    jQuery('#pag_link').val( removeAcentos(jQuery('#pag_titulo').val()) );
    jQuery('#urlAmigavelVis').text( removeAcentos(jQuery('#pag_titulo').val()) );

    jQuery.ajax({url: url_verificar, success: function(result){
      jQuery("#urlAmigavelResult").html(result);
    }});

  });

  /*------------------------------------------------------*/

  jQuery('#pag_link').keyup(function(){

    var url_verificar = '<? echo $url ?>paginas/-verificar-url.php?url='+removeAcentos(jQuery('#pag_titulo').val());

    jQuery('#pag_link').val( removeAcentos(jQuery('#pag_titulo').val()) );
    jQuery('#urlAmigavelVis').text( removeAcentos(jQuery('#pag_titulo').val()) );

    jQuery.ajax({url: url_verificar, success: function(result){
      jQuery("#urlAmigavelResult").html(result);
      jQuery('#urlAmigavelVis').text( removeAcentos(jQuery('#pag_titulo').val()) );
    }});
  });
  
});

 /*------------------------------------------------------*/

 jQuery(document).ready(function(jQuery) {

   jQuery('#pag_menu').change(function(e, v){
    var valor = jQuery('#pag_menu').val();
    /*categoria*/
    jQuery.get( "<? echo $url?>paginas/-categoria.php?pid="+valor, function( data ) {
      jQuery( "#result_menus" ).html( data );
    });

    /* Ativar botão de cadastro */
    if(valor != ''){
        $("#salvar").show();
    }else{
      $("#salvar").hide();
    }


  });

  //console.log(jQuery("#menu_menu_id option").val());


 });
</script>

