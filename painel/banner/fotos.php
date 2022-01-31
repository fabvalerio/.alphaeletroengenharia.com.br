<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
   $ativeMenu( "#products" ).addClass( "show" );
 });
</script>

<?

$vis = new db();
$vis->query( "SELECT ban_titulo, ban_id, ban_capa FROM banner WHERE ban_id = '".$link[3]."'" );
$vis->execute();
$row = $vis->object();

/*Imagem*/
$pastaId = 'images/fotos-banner/'.$link[3];
$pasta = $pastaId.'/p/';
$arquivos = glob("$pasta{*.jpg,*.png,*.gif}", GLOB_BRACE);

?>


<link href="<? echo $url ?>assets/fileinput-master/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<link href="<? echo $url ?>assets/fileinput-master/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>

<script src="<? echo $url ?>assets/fileinput-master/js/plugins/sortable.js" type="text/javascript"></script>
<script src="<? echo $url ?>assets/fileinput-master/js/fileinput.js" type="text/javascript"></script>
<script src="<? echo $url ?>assets/fileinput-master/js/locales/pt-BR.js" type="text/javascript"></script>
<script src="<? echo $url ?>assets/fileinput-master/themes/fas/theme.js" type="text/javascript"></script>
<script src="<? echo $url ?>assets/fileinput-master/js/plugins/piexif.js" type="text/javascript"></script>


<div class="d-flex align-items-center">
<h2 class="display-4 mb-3">Fotos <span> &bull; Banner</span></h2>
<hr>
<a class="btn btn-outline-warning" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Voltar</a>
</div>

<div class="card">
  <div class="card-body">
    <form action="<? echo $url.'!/'.$link[1].'/'.$link[2].'/'.$link[3]?>/enviar" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="file-loading">
          <input id="file-5" name="file[]" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="<? echo $url ?>banner/upload-banner.php?pid=<? echo $link[3]?>" data-theme="fas">
        </div>
      </div>
    </form>
  </div>
</div>


<!--Thumb-->    
<div class="card my-3">
  <div class="card-body">
    <div class="row">

      <? 

      if( !empty(count($arquivos)) && empty($row->ban_capa) ){
        echo '<div class="col-md-12"><p class="mb-4 p-3 badge-danger"><b>Atenção:</b> necessário selecionar uma imagem como capa!!!<p/></div>';
      }
      else{
        echo '<div class="col-md-12"><p class="mb-4 p-3 badge-info">Galeria de imagens! <b>[ '.count($arquivos).' ]</b><p/></div>';
      }
      ?>

      <?

      foreach($arquivos as $img){
       $nomeImagem = '/g/'.@end( @explode('/', $img) );
       ?>
       <div class="col-sm-6 col-md-2 mb-4">
        <div class="card">
          <div class="card-body badge-light">
            <a href="<? echo $url.$pastaId.$nomeImagem; ?>" class="thumbnail group3" target="_new">
              <div class="capa" style="background-image:url('<? echo $url.$img;?>'); height:100px;"></div>
            </a>
            <div class="text-center">
              <? 
              $nameImagem = @end( @explode('/', $img) );
              if( $row->ban_capa != $nameImagem ){
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

 </div>
</div>



<script>

  $("#file-5").fileinput({
    theme: 'fas',
    language: 'pt-BR',
    uploadUrl:  "banner/upload-banner.php",
    allowedFileExtensions: ['jpg'],
    autoReplace: true,
    maxFileCount: 1,
    uploadAsync: false
  });

  $("#file-5").on('filebatchuploadsuccess', function(event, files, extra){
    window.location.href = '<? echo $url.'!/'.$link[1].'/'.$link[2].'/'.$link[3]?>';
  });

</script>
