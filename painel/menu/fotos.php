<?

$visSQL = "SELECT * FROM menu WHERE menu_id = '".$link[3]."'";
$vis = new db();
$vis->query( $visSQL );
$vis->execute();
$row = $vis->object();

?>
<a class="btn btn-warning" href="<? echo $url?>!/<? echo $link[1]?>/editar/<? echo $link[3]?>">Voltar</a>
<a class="btn btn-success" href="<? echo $url?>!/<? echo $link[1]?>/cadastro">Novo cadastro</a>
<a class="btn btn-danger" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Finalizar</a>


<div class="stepwizard">
  <div class="stepwizard-row setup-panel">
    <div class="stepwizard-step">
      <div class="btn btn-secondary btn-circulo">
        <i class="fas fa-info-circle"></i>
      </div>
      <p>Informa&ccedil;&otilde;es</p>
    </div>
    <div class="stepwizard-step">
      <div class="btn btn-success btn-circulo">
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



<h2 class="display-4">Fotos</h2>


<div class="card">
  <div class="card-body">
    <p>
      P&aacute;gina: <strong><? echo $row->menu_titulo?></strong>
    </p>
    <legend>Quantidade de fotos: Ilimitados</legend>
    <form action="<? echo $url.'!/'.$link[1].'/'.$link[2].'/'.$link[3]?>/enviar" method="post" enctype="multipart/form-data">
      <div class="input-group">
        <div class="custom-file">
          <label class="custom-file-label">selecione as fotos de seu computador</label>
          <input id="file" name="file[]" type="file" required class="custom-file-input" accept="image/jpeg, image/png, image/gif, image/svg" >
        </div>
        <div class="input-group-append"> 
          <input name="Enviar" type="submit" class="btn btn-success btn-envia" value="Enviar Arquivo" />
        </div>
      </div>
      <br>
      <b>Limite de 1 imagens</b> por envio &bull; Somente Imagens (jpg) &bull; <? echo $__config->c_tamanho_image?> &bull; M&aacute;ximo 2MB
    </form>
  </div>
</div>
<? 
if( $link[4] == 'enviar' ){

  //class para reduzir imagem
	ini_set('max_execution_time', '60'); //Raise to 512 MB
	ini_set('memory_limit', '512M');     //Raise to 512 MB
  include('php/Redimensiona.php');
  ?>
  <fieldset>
    <legend>Enviando imamgem para redirecionamento</legend>
    <div>
      <?

		//criar pasta		

      @mkdir( 'images', 0777 );
      @chmod( 'images', 0777 );

      $__pastaFotos = 'images/fotos-menu/';

      @mkdir( $__pastaFotos, 0777 );
      @chmod( $__pastaFotos, 0777 );
      @mkdir( $__pastaFotos.'original', 0777 );
      @chmod( $__pastaFotos.'original', 0777 );
      @mkdir( $__pastaFotos.$link[3], 0777 );
      @chmod( $__pastaFotos.$link[3], 0777 );
      @mkdir( $__pastaFotos.$link[3].'/g', 0777 );
      @chmod( $__pastaFotos.$link[3].'/g', 0777 );

      for( $i=0; $i<count($_FILES['file']); $i++ ){
       if( !empty($_FILES['file']['name'][$i]) ){

        echo ($i+1).'-'.$__pastaFotos.$link[3].'/g/'.$_FILES['file']['name'][$i]."<br>";

        $foto = $_FILES['file']['name'][$i];	
        $type = $_FILES['file']['type'][$i];
        $tmp  = $_FILES['file']['tmp_name'][$i];
        $redim = new Redimensiona();
        $src=$redim->Redimensionar($foto, $type, $tmp, 1920, $__pastaFotos.$link[3].'/g');
      }
    }

    ?>
  </div>
</fieldset>
<? } ?>


<!--Thumb-->    
<div class="row my-5">

  <?
  $pastaId = 'images/fotos-menu/'.$link[3];
  $pasta = $pastaId.'/g/';
  $arquivos = glob("$pasta{*.jpg,*.png,*.gif}", GLOB_BRACE);

  foreach($arquivos as $img){
   $nomeImagem = '/g/'.@end( @explode('/', $img) );
   ?>
   <div class="col-sm-6 col-md-2">
    <div class="card">
      <div class="card-body  badge-secondary">
        <a href="<? echo $url.$pastaId.$nomeImagem; ?>" class="thumbnail group3" target="_new">
          <div class="capa" style="background-image:url('<? echo $url.$img;?>'); height:100px;"></div>
        </a>
        <div class="text-center">
          <? 
          $nameImagem = @end( @explode('/', $img) );
          if( $row->menu_capa != $nameImagem ){
            ?>
            <hr>
            <a href="<? echo $url?>!/<? echo $link[1]?>/deleta-imagem/<? echo $link[3]?>/<? echo $img?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
            <a href="<? echo $url?>!/<? echo $link[1]?>/capa-imagem/<? echo $link[3]?>/<? echo $img?>" class="btn btn-success"><i class="fas fa-check"></i></a>
          <?  }else{ ?>
            <hr>
            <a class="btn btn-info"><i class="fas fa-check"></i></a>
          <? } ?>
        </div>
      </div>
    </div>
  </div>
<? } ?>

<div class="clearfix"></div>

<div class="container-fluid">
  <hr>
  <div class="row">
   <div class="col-md-3 col-sm-3 text-danger"> <i class="fa fa-times"></i> Deletar</div>
   <div class="col-md-3 col-sm-3 text-success"> <i class="fa fa-pencil"></i> Definir como capa</div>
   <div class="col-md-3 col-sm-3 text-primary"> <i class="fa fa-eye"></i> Imagem capa</div>
 </div>
 <hr>
</div>

<script type="text/javascript">
	
	jQuery(function(){
    jQuery(".btn-envia").click(function(){
      var $fileUpload = jQuery(".input-envia");
      if (parseInt($fileUpload.get(0).files.length)>5){
       alert("Limite de 5 imagens!!!");
       return false;
     }
   });    
  });

</script>