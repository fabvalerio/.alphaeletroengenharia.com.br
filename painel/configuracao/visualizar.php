<?
/*configuração*/


$__configSql = "SELECT * FROM configuracao WHERE tipo = 'conf'";

$__config = new db();     
$__config->query($__configSql);
$__config->execute();
$result__config = $__config->object();

$result__config->estruturacao;

$edi = json_decode($result__config->estruturacao);

//echo $jsonConf->c_tamanho_image;
//

/*  \configuracao */


?>

<a class="btn btn-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>

<hr>

<h2 class="head">Editar Configura&ccedil;&atilde;o</h2>

<form enctype="multipart/form-data" action="<?=$url.'!/'.$link[1].'/'.$link[2]?>/envio" id="cadUsuario" method="post" class="row mb-5">

  <div class="col-md-1 py-2">
    <label>
      PX de Imagem
    </label>
    <br>
    <input class="form-control" name="c_tamanho_image" type="text" id="c_tamanho_image" autocomplete="off" value="<?=$edi->c_tamanho_image?>" maxlength="200" />
  </div>

  <div class="col-md-3 py-2">
    <label>
      URL Desenvolvedor
    </label>
    <br>
    <input class="form-control" name="c_url" type="text" id="c_url" autocomplete="off" value="<?=$edi->c_url?>" maxlength="200" />
  </div>

  <div class="col-md-3 py-2">
    <label>
      URL Site
    </label>
    <br>
    <input class="form-control" name="c_site" type="text" id="c_site" autocomplete="off" value="<?=$edi->c_site?>" maxlength="200" />
  </div>

  <div class="col-md-2 py-2">
    <label>
      Banner Home
    </label>
    <br>
    <input class="form-control" name="c_tamanho_banner" type="text" id="c_tamanho_banner" autocomplete="off" value="<?=$edi->c_tamanho_banner?>" maxlength="200" />
  </div>


  <div class="col-md-3 py-2">
    <label>
      TITLE - Head
    </label>
    <br>
    <input class="form-control" name="c_nome" type="text" id="c_nome" autocomplete="off" value="<?=$edi->c_nome?>" maxlength="50" max="50" />
  </div>

  <div class="col-md-5 py-2">
    <label>
      Título Home
    </label>
    <br>
    <input class="form-control" name="c_titulo_home" type="text" id="c_titulo_home" autocomplete="off" value="<?=$edi->c_titulo_home?>" maxlength="50" max="50" />
  </div>

  <div class="col-md-7 py-2">
    <label>
      Título Formul&aacute;rio (Wiriframe 8)
    </label>
    <br>
    <input class="form-control" name="c_titulo_orcamento" type="text" id="c_titulo_orcamento" autocomplete="off" value="<?=$edi->c_titulo_orcamento?>" maxlength="100" max="100" />
  </div>


  <div class="col-md-12 py-2">
    <h3>SEO | GOOGLE</h3>
  </div>

  <div class="col-md-6 py-2">
    <label>
      Chave do Google Analytics
    </label>
    <br>
    <input class="form-control" name="c_google_analytics" type="text" id="c_google_analytics" autocomplete="off" value="<?=$edi->c_google_analytics?>" maxlength="50" max="50" />
  </div>


  <div class="col-md-6 py-2">
    <label>
      Chave do Google Webmaster
    </label>
    <br>
    <input class="form-control" name="c_google_webmaster" type="text" id="c_google_webmaster" autocomplete="off" value="<?=$edi->c_google_webmaster?>" maxlength="50" max="50" />
  </div>


  <div class="col-md-6 py-2">
    <label>
      Chave do Google Tags
    </label>
    <br>
    <input class="form-control" name="c_google_tags" type="text" id="c_google_tags" autocomplete="off" value="<?=$edi->c_google_tags?>" maxlength="50" max="50" />
  </div>



  <div class="col-md-6 py-2">
    <label>
      Chave do Google Otmize
    </label>
    <br>
    <input class="form-control" name="c_google_otimize" type="text" id="c_google_otimize" autocomplete="off" value="<?=$edi->c_google_otimize?>" maxlength="50" max="50" />
  </div>


  <div class="col-12 py-2">
    <label>SCRIPTS</label>
    <textarea name="c_scripts" id="c_scripts" class="form-control" style="font-size: 11px; height: 300px"></textarea>
  </div>


  <div class="col-md-12 py-2">
    <h3>&Iacute;CONES M&Iacute;DIAS</h3>
  </div>

  <div class="col-md-6 py-2">
    <label>
      Style Icon Mídias (top) <code>color|outline|circulo|quadrado|size-midia</code>
    </label>
    <br>
    <input class="form-control" name="c_style_midias_top" type="text" id="c_style_midias_top" autocomplete="off" value="<?=$edi->c_style_midias_top?>" maxlength="50" max="50" />
  </div>



  <div class="col-md-6 py-2">
    <label>
      Style Icon Mídias (footer) <code>color|outline|circulo|quadrado|size-midia</code>
    </label>
    <br>
    <input class="form-control" name="c_style_midias_footer" type="text" id="c_style_midias_footer" autocomplete="off" value="<?=$edi->c_style_midias_footer?>" maxlength="50" max="50" />
  </div>



  <div class="col-md-12 py-2 form-group wireframes">
    <h2>Wireframes* Home</h2>
    <hr>
  <div class="container-fluid">
    <div class="row" role="group" aria-label="...">
      <?

      $pasta = 'configuracao/wireframes/home/';
      $diretorio = dir($pasta);

      while($arquivo = $diretorio -> read()){
        $dirNumer = $pasta.$arquivo.'/';

        $arquivos = glob("$dirNumer{*.jpg,*.png,*.gif}", GLOB_BRACE);

        foreach($arquivos as $img){

          $modelo_wiri = @end( @explode('/', $img) );
          $modelo_wiri = @current( @explode('.', $modelo_wiri) );
          $modelo_wiri = @end( @explode('-', $modelo_wiri) );

          if( $edi->c_home == $modelo_wiri ) $checked = 'checked="checked"';
          ?>
          <div class="col-lg-3 col-md-6 col-sm-6 text-sm-center p-3">
            <div class="btn btn-secondary">
              <label>
               <input <? echo $checked; ?> type="radio" name="c_home" value="<? echo $modelo_wiri; ?>">
               HOME #<? echo $modelo_wiri; ?>
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
     <div class="clearfix"></div>
   </div>
 </div>


 <hr>




 <div class="col-md-12 py-2 form-group wireframes">
  <h2>WIREFRAMES* NAVBAR</h2>
  <hr>
  <div class="container-fluid">
    <div class="row" role="group" aria-label="...">
      <?

      $pasta = 'configuracao/wireframes/navbar/';
      $diretorio = dir($pasta);

      while($arquivo = $diretorio -> read()){
        $dirNumer = $pasta.$arquivo.'/';

        $arquivos = glob("$dirNumer{*.jpg,*.png,*.gif}", GLOB_BRACE);

        foreach($arquivos as $img){

          $modelo_wiri = @end( @explode('/', $img) );
          $modelo_wiri = @current( @explode('.', $modelo_wiri) );
          $modelo_wiri = @end( @explode('-', $modelo_wiri) );

          if( $edi->c_nav == $modelo_wiri ) $checked = 'checked="checked"';
          ?>
          <div class="col-lg-3 col-md-6 col-sm-6 text-sm-center p-3">
            <div class="btn btn-secondary">
              <label>
               <input <? echo $checked; ?> type="radio" name="c_nav" value="<? echo $modelo_wiri; ?>">
               NAV #<? echo $modelo_wiri; ?>
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
   <div class="clearfix"></div>


 </div>
</div>

<div class="col-md-3 py-2">
  <label>
    Organizar menu
  </label>
  <br>
  <select name="c_menu_direcao" id="c_menu_direcao" class="custom-select">
    <option value="mr-auto" <? if( $edi->c_menu_direcao == 'mr-auto' ) echo 'selected' ?>>Esquerda</option>
    <option value="ml-auto" <? if( $edi->c_menu_direcao == 'ml-auto' ) echo 'selected' ?>>Direita</option>
    <option value="mx-auto" <? if( $edi->c_menu_direcao == 'mx-auto' ) echo 'selected' ?>>Centro</option>
  </select>
</div>

<div class="col-md-3 py-2">
  <label>
    Menu Largura
  </label>
  <br>
  <select name="c_menu_largura" id="c_menu_largura" class="custom-select">
    <option value="container" <? if( $edi->c_menu_largura == 'container' ) echo 'selected' ?>>Container</option>
    <option value="container-fluid" <? if( $edi->c_menu_largura == 'container-fluid' ) echo 'selected' ?>>Container-Fluid</option>
  </select>
</div>

<div class="col-md-3 py-2">
  <label>
    Categoria
  </label>
  <br>
  <? echo SelectON( 'c_categoria', $edi->c_categoria ); ?>
</div>

<div class="col-md-3 py-2">
  <label>
    Sub-Categoria
  </label>
  <br>
  <? echo SelectON( 'c_subcategoria', $edi->c_subcategoria ); ?> 
</div>

<div class="col-md-3 py-2">
  <label>
    Menu
  </label>
  <br>
  <? echo SelectON( 'c_menu', $edi->c_menu ); ?>
</div>

<div class="col-md-3 py-2">
  <label>
    Busca no NaV (Dependendo do tema)
  </label>
  <br>
  <? echo SelectON( 'c_busca', $edi->c_busca ); ?>
</div>


<div class="col-md-3 py-2">
  <label>
    Barra Topo Site
  </label>
  <br>
  <? echo SelectON( 'c_bar', $edi->c_bar ); ?>
</div>


<hr>






<div class="col-md-12 py-2 form-group wireframes">
  <h2>WIEREFRAMES* HEADER</h2>
  <hr>
  <div class="container-fluid">
    <div class="row" role="group" aria-label="...">
      <?

      $pasta = 'configuracao/wireframes/header/';
      $diretorio = dir($pasta);

      while($arquivo = $diretorio -> read()){
        $dirNumer = $pasta.$arquivo.'/';

        $arquivos = glob("$dirNumer{*.jpg,*.png,*.gif}", GLOB_BRACE);

        foreach($arquivos as $img){

          $modelo_wiri = @end( @explode('/', $img) );
          $modelo_wiri = @current( @explode('.', $modelo_wiri) );
          $modelo_wiri = @end( @explode('-', $modelo_wiri) );

          if( $edi->c_header == $modelo_wiri ) $checked = 'checked="checked"';
          ?>
          <div class="col-lg-3 col-md-6 col-sm-6 text-sm-center p-3">
            <div class="btn btn-secondary">
              <label>
               <input <? echo $checked; ?> type="radio" name="c_header" value="<? echo $modelo_wiri; ?>">
               HEADER #<? echo $modelo_wiri; ?>
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
   <div class="clearfix"></div>
 </div>
</div>


<hr>




<div class="col-md-12 py-2 form-group wireframes">
  <h2>WIREFRAMES* SLIDER</h2>
  <hr>
  <div class="container-fluid">
    <div class="row" role="group" aria-label="...">
      <?

      $pasta = 'configuracao/wireframes/slider/';
      $diretorio = dir($pasta);

      while($arquivo = $diretorio -> read()){
        $dirNumer = $pasta.$arquivo.'/';

        $arquivos = glob("$dirNumer{*.jpg,*.png,*.gif}", GLOB_BRACE);

        foreach($arquivos as $img){

          $modelo_wiri = @end( @explode('/', $img) );
          $modelo_wiri = @current( @explode('.', $modelo_wiri) );
          $modelo_wiri = @end( @explode('-', $modelo_wiri) );

          if( $edi->c_slider == $modelo_wiri ) $checked = 'checked="checked"';
          ?>
          <div class="col-lg-3 col-md-6 col-sm-6 text-sm-center p-3">
            <div class="btn btn-secondary">
              <label>
               <input <? echo $checked; ?> type="radio" name="c_slider" value="<? echo $modelo_wiri; ?>">
               SLIDER #<? echo $modelo_wiri; ?>
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
   <div class="clearfix"></div>
 </div>
</div>


<hr>


<div class="col-md-12 py-2 form-group wireframes">
  <h2>WIREFRAMES* FOOTER</h2>
  <hr>
  <div class="container-fluid">
    <div class="row" role="group" aria-label="...">
      <?

      $pasta = 'configuracao/wireframes/footer/';
      $diretorio = dir($pasta);

      while($arquivo = $diretorio -> read()){
        $dirNumer = $pasta.$arquivo.'/';

        $arquivos = glob("$dirNumer{*.jpg,*.png,*.gif}", GLOB_BRACE);

        foreach($arquivos as $img){

          $modelo_wiri = @end( @explode('/', $img) );
          $modelo_wiri = @current( @explode('.', $modelo_wiri) );
          $modelo_wiri = @end( @explode('-', $modelo_wiri) );

          if( $edi->c_footer == $modelo_wiri ) $checked = 'checked="checked"';
          ?>
          <div class="col-lg-3 col-md-6 col-sm-6 text-sm-center p-3">
            <div class="btn btn-secondary">
              <label>
               <input <? echo $checked; ?> type="radio" name="c_footer" value="<? echo $modelo_wiri; ?>">
               FOOTER #<? echo $modelo_wiri; ?>
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
   <div class="clearfix"></div>
 </div>
</div>


<div class="col-md-3 py-2">
  <label>
    Footer Largura
  </label>
  <br>
  <select name="c_footer_largura" id="c_footer_largura" class="custom-select">
    <option value="container" <? if( $edi->c_footer_largura == 'container' ) echo 'selected' ?>>Container</option>
    <option value="container-fluid" <? if( $edi->c_footer_largura == 'container-fluid' ) echo 'selected' ?>>Container-Fluid</option>
  </select>
</div>


<hr>



<div class="col-md-12 py-2">
  <h3>CONFIGURAÇÕES</h3>
</div>

<div class="col-md-3 py-2">
  <label>
    SEO
  </label>
  <br>
  <? echo SelectON( 'c_seo', $edi->c_seo ); ?>
</div>

<div class="col-md-3 py-2">
  <label>
    Bloco de Texto TEXTEARE
  </label>
  <br>
  <? echo SelectON( 'c_texto', $edi->c_texto ); ?>
</div>


<div class="col-md-3 py-2">
  <label>
    Configura&ccedil;&atilde;o do Send Email
  </label>
  <br>
  <? echo SelectON( 'c_email', $edi->c_email ); ?>
</div>

<div class="col-md-3 py-2">
  <label>
    Mapa
  </label>
  <br>
  <? echo SelectON( 'c_mapa', $edi->c_mapa ); ?> 
</div>

<div class="col-md-3 py-2">
  <label>
    Mapa + Dados
  </label>
  <br>
  <? echo SelectON( 'c_mapa_dados', $edi->c_mapa_dados ); ?> 
</div>

<div class="col-md-3 py-2">
  <label>
    Menu Rodap&eacute;
  </label>
  <br>
  <? echo SelectON( 'c_menu_rodape', $edi->c_menu_rodape ); ?>
</div>

<div class="col-md-3 py-2">
  <label>
    QrCode
  </label>
  <br>
  <? echo SelectON( 'c_qrcode', $edi->c_qrcode ); ?>
</div>

<div class="col-md-3 py-2">
  <label>
    Anexo
  </label>
  <br>
  <? echo SelectON( 'c_anexo', $edi->c_anexo ); ?>
</div>

<div class="col-md-3 py-2">
  <label>
    NewsLetter no Site?
  </label>
  <br>
  <? echo SelectON( 'c_news', $edi->c_news ); ?> 
</div>


<div class="col-md-3 py-2">
  <label>
    Breadcrumb nas P&aacute;ginas
  </label>
  <br>
  <? echo SelectON( 'c_breadcrumb', $edi->c_breadcrumb ); ?>
</div>


<div class="col-md-3 py-2">
  <label>
    RSS
  </label>
  <br>
  <? echo SelectON( 'c_rss', $edi->c_rss ); ?>
</div>

<div class="col-md-3 py-2">
  <label>
    CSS
  </label>
  <br>
  <? echo SelectON( 'c_css', $edi->c_css ); ?>
</div>

<div class="col-md-3 py-2">
  <label>
   <i class="fab fa-dev"></i>  Desenvolvedor 
 </label>
 <br>
 <? echo SelectON( 'c_dev', $edi->c_dev ); ?>
</div>



<div class="col-md-3 py-2">
  <label>
    Landpage
  </label>
  <br>
  <? echo SelectON( 'c_land', $edi->c_land ); ?>
</div>


<div class="col-md-6 py-2">
  <label>
    Efeito Slider <code>(Ativo = Fade / Inativo = Deslisar)</code>
  </label>
  <br>
  <? echo SelectON( 'c_efeito_slider', $edi->c_efeito_slider ); ?>
</div>



<div class="clearfix"></div>
<hr>
<div class="clearfix"></div>
<div class="col-md-12 py-2">

  <input type="button" value="Salvar" id="salvar"  class="btn btn-danger form-control" /> 

</div>

</form>

<div id="mascara"> -- </div>



<script type="text/javascript" language="javascript">




  /* REGISTRO */

  $(document).ready(function() {
    $('#salvar').click(function() {

      var dados = $('#cadUsuario').serialize();
      var registro = '<? echo $url; ?>configuracao/registro.php';

      $.ajax({
        url : registro,
        type : 'post',
        data : dados,
        beforeSend : function(){
         $("#mascara").html("ENVIANDO...");
       }
     })
      .done(function(msg){
        $("#mascara").html(msg);
      })
      .fail(function(jqXHR, textStatus, msg){
        $("#mascara").html(msg);
      }); 

    });
  });
</script>