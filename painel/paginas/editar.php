<?
if( $link[4] == 'envio' ){

  $_POST['pag_status']     = StatusPost($_POST['pag_status']);
  $_POST['pag_home']       = StatusPost($_POST['pag_home']);
  $_POST['pag_comentario'] = StatusPost($_POST['pag_comentario']);
  $_POST['pag_fixed']      = StatusPost($_POST['pag_fixed']);
  editar('paginas', 'pag_id', $link[3]);
  echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/visualizar" />';

}

$editarSQL = "SELECT * FROM paginas WHERE pag_id = '".$link[3]."'";

$editar = new db();
$editar->query( $editarSQL );
$editar->execute();
$vis = $editar->object();

include('assets/tinymce-4.6.5/index.php');  

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


<h2 cla]ss="mb-5">Editar &bull; P&aacute;gina <span class="text-danger">Campos (*) obrigat&oacute;rios</span></h2>

<form id="form" enctype="" method="post">

  <div class="row">

    <div class="col-md-4 form-group">
      <label>
        <i class="fa fa-info-circle text-sm box-ico bg-danger" data-toggle="tooltip" data-placement="right" title="Selecione qual ser&aacute; a sess&atilde;o/p&aacute;gina que ir&aacute; aparecer" ></i>
      Menu/P&aacute;gina *</label>

      <select class="form-control" name="menu_menu_id" id="pag_menu"required="required">
        <option value="">Selecione qual menu ir&aacute; aparecer!</option>
        <?
        $MenuSQL = "SELECT * FROM menu WHERE menu_status = '1' ORDER BY menu_titulo ASC";
        $Menu = new db();
        $Menu->query( $MenuSQL );
        $Menu->execute();

        foreach( $Menu->row() AS $row ){

         if($vis->menu_menu_id == $row['menu_id'] ) $selected = 'selected';
         echo '<option '.$selected.' value="'.$row['menu_id'].'">'.$row['menu_titulo'].'</option>'."\n";
         $selected = '';
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
  <? } ?>

  <div class="col-md-12 form-group">
    <label>T&iacute;tulo *</label>
    <input value="<? echo $vis->pag_titulo; ?>" class="form-control" name="pag_titulo" type="text" id="pag_titulo" required="required" autocomplete="off" size="60" maxlength="200" />
  </div>

  <div class="col-md-12 form-group">
    <label>URL Amigável*</label>
    <div class="input-group mb-2" id="urlAmigavel">
      <div class="input-group-prepend">
        <div class="input-group-text" id="urlAmigavelResult">
          <i class="fas fa-exclamation-triangle text-warning"></i>
        </div>
      </div>
      <input class="form-control" name="pag_link" type="text" value="<? echo $vis->pag_link; ?>" id="pag_link" autocomplete="off" size="60" maxlength="60" required="required" />
    </div>
    <small><strong>Url da página:</strong> <i><? echo $jsonConf->c_url; ?><strong><span id="urlAmigavelVis"></span></strong></i></small>
  </div>


  <div class="col-md-4 form-group">
    <label>
      <i class="fa fa-info-circle text-sm box-ico bg-danger" data-toggle="tooltip" data-placement="right" title="Com o campo de data, você poderá agendar as publicações." ></i>
      Data *opcional
    </label>
    <input class="form-control" value="<? echo $vis->pag_data; ?>"  name="pag_data" type="date" id="pag_data" autocomplete="off" size="60" />
  </div>

  <div class="col-md-8 form-group">
    <label>
      <i class="fa fa-info-circle text-sm box-ico bg-danger" data-toggle="tooltip" data-placement="right" title="Este campo é muito importante, para a otimiza&ccedil;&atilde;o nos buscadores" ></i>
    Mini Descri&ccedil;&atilde;o*</label>
    <input class="form-control" name="pag_mini_descricao" type="text" id="pag_mini_descricao" required="required" value="<? echo $vis->pag_mini_descricao?>" autocomplete="off" size="200" />
  </div>


  <div class="col-md-12 form-group">
    <label>Texto *</label>

    <!-- HELP -->
    <? include('includes/#help.php'); ?>

    <textarea class="form-control" name="pag_texto" id="pag_texto"><? echo $vis->pag_texto?></textarea>
  </div>

  <div class="col-md-12 form-group">
    <label>
      <i class="fa fa-info-circle text-sm box-ico bg-danger" data-toggle="tooltip" data-placement="right" title="Este campo é muito importante, para a otimiza&ccedil;&atilde;o nos buscadores" ></i>
    Palavras Metas para busca e SEO *</label> 
    <input value="<? echo $vis->pag_keyworks?>" class="form-control" name="pag_keyworks" type="text" id="pag_keyworks" required="required" autocomplete="off" size="60" /> 
    <em>M&aacute;ximo 200 caracteres: site, site responsivo, site onepage, site cms</em>
  </div>

  <div class="col-md-3 form-group">
    <label>Status</label>
    <br>
    <!-- <input name="pag_status" type="checkbox" <? if( $vis->pag_status == '1' ){ echo 'checked'; }else{ echo 'unchecked'; } ?>  data-toggle="toggle" /> -->
    <select name="pag_status" class="custom-select">
      <option value="" selected disabled>Selecione</option>
      <option value="1" <? if( $vis->pag_status == '1' ){ echo 'selected'; } ?>>Ativo</option>
      <option value="0" <? if( $vis->pag_status == '0' ){ echo 'selected'; } ?>>Inativo</option>
    </select>   
  </div>

  <div class="col-md-3 form-group">
    <label>
      <i class="fa fa-info-circle text-sm box-ico bg-danger" data-toggle="tooltip" data-placement="right" title="Deseja que est&aacute; p&aacute;gina apare&ccedil;a na home do site?" ></i>
    Destaque na Home?</label>
    <br>
    <select name="pag_home" class="custom-select">
      <option value="" selected disabled>Selecione</option>
      <option value="1" <? if( $vis->pag_home == '1' ){ echo 'selected'; } ?>>Ativo</option>
      <option value="0" <? if( $vis->pag_home == '0' ){ echo 'selected'; } ?>>Inativo</option>
    </select>     
  </div>

  <div class="col-md-3 face">
    <label>
      Coment&aacute;rio do Face
    </label>
    <br>
    <select name="pag_comentario" class="custom-select">
      <option value="" selected disabled>Selecione</option>
      <option value="1" <? if( $vis->pag_comentario == '1' ){ echo 'selected'; } ?>>Ativo</option>
      <option value="0" <? if( $vis->pag_comentario == '0' ){ echo 'selected'; } ?>>Inativo</option>
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

        if( $vis->paginas_wireframes_wf_id == $modelo_wiri ) $checked = 'checked="checked"';
        ?>
        <div class="col-lg-3 col-md-6 col-sm-6 text-sm-center p-3">
          <div class="btn btn-secondary">
            <label>
             <input <? echo $checked; ?> type="radio" name="paginas_wireframes_wf_id" value="<? echo $modelo_wiri; ?>">
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

</div>

<hr>

<div class="col-md-12 form-group">
  <input  type="button" name="Enviar" id="salvar" value="Editar" class="btn btn-success btn-lg w-100" />
</div>

<input type="hidden" name="redirecionar" value="visualizar">
<input type="hidden" name="tabela" value="paginas">
<input type="hidden" name="url" value="<? echo $url ?>">
<input type="hidden" name="pag_id" value="<? echo $vis->pag_id?>">

</div>


</form>

<div id="result"></div>


<script src="<? echo $url ?>php/db.class.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
  /* EDITAR */
  editar('<? echo $url; ?>', 'pag_id', '<? echo $vis->pag_id ?>', 'tinyMCE');
</script>



<script src="<? echo $url?>js/remover-acentos.js" type="text/javascript"></script>
<script type="text/javascript">

jQuery(document).ready(function($) {

  $("#salvar").hide();

  jQuery('#pag_titulo').keyup(function(){

    var url_verificar = '<? echo $url ?>paginas/-verificar-url.php?pid=<? echo $link[3] ?>&url='+removeAcentos(jQuery('#pag_titulo').val());

    jQuery('#pag_link').val( removeAcentos(jQuery('#pag_titulo').val()) );
    jQuery('#urlAmigavelVis').text( removeAcentos(jQuery('#pag_titulo').val()) );

    jQuery.ajax({url: url_verificar, success: function(result){
      jQuery("#urlAmigavelResult").html(result);
    }});

  });

  /*------------------------------------------------------*/

  jQuery('#pag_link').keyup(function(){

    var url_verificar = '<? echo $url ?>paginas/-verificar-url.php?pid=<? echo $link[3] ?>&url='+removeAcentos(jQuery('#pag_titulo').val());

    jQuery('#pag_link').val( removeAcentos(jQuery('#pag_titulo').val()) );
    jQuery('#urlAmigavelVis').text( removeAcentos(jQuery('#pag_titulo').val()) );

    jQuery.ajax({url: url_verificar, success: function(result){
      jQuery("#urlAmigavelResult").html(result);
      jQuery('#urlAmigavelVis').text( removeAcentos(jQuery('#pag_titulo').val()) );
    }});
  });
  
});

</script>


<script type="text/javascript">


  function Menu(){
    var valor = jQuery('#pag_menu').val();
    /*categoria*/
    jQuery.get( "<? echo $url?>paginas/-categoria.php?pid="+valor+"&cat=<? echo $vis->categoria_cat_id; ?>", function( data ) {
      jQuery( "#result_menus" ).html( data );
    });


    /* Ativar botão de cadastro */
    if(valor != ''){
      $("#salvar").show();
    }else{
      $("#salvar").hide();
    }

  }


  jQuery(document).ready(function(jQuery) {

    /*categoria onload*/
    <? if( !empty($vis->categoria_cat_id) ){ ?>
      var valor = jQuery('#pag_menu').val();
      jQuery.get( '<? echo $url?>paginas/-categoria.php?pid=<? echo $vis->menu_menu_id; ?>&cat=<? echo $vis->categoria_cat_id; ?>', function( data ) {
        jQuery( "#result_menus" ).html( data );
      });
    <? } ?>

    /*subcategoria onload*/
    <? if( !empty($vis->subcategoria_sub_id) ){ ?>
      jQuery.get( "<? echo $url?>paginas/-subcategoria.php?pid=<? echo $vis->categoria_cat_id; ?>&sub=<? echo $vis->subcategoria_sub_id; ?>", function( data ) {
        jQuery( "#result_categoria" ).html( data );
      });
    <? } ?>

    jQuery('#pag_menu').change(function(){
      Menu();
    });

    Menu();

  });
</script>