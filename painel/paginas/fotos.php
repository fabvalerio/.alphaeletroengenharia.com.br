<?

$visSQL = "SELECT pag_id, pag_titulo, pag_capa FROM paginas WHERE pag_id = '".$link[3]."'";
$vis = new db();
$vis->query( $visSQL );
$vis->execute();
$row = $vis->object();


/*Imagem*/
$pastaId = 'images/fotos-paginas/'.$link[3];
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

<div class="d-flex">

  <div class="">
    <a class="btn btn-warning" href="<? echo $url?>!/<? echo $link[1]?>/editar/<? echo $link[3]?>">Voltar</a>
    <a class="btn btn-primary" href="<? echo $url?>!/<? echo $link[1]?>/ordenar/<? echo $link[3]?>">Ordenar sequencia das fotos</a>
    <a class="btn btn-success" href="<? echo $url?>!/<? echo $link[1]?>/cadastro">Novo cadastro</a>
    <a class="btn btn-danger" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Finalizar</a>
  </div>
  <div class="flex-grow-1 mt-1">
    <div class="stepwizard m-0">
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
  </div>
</div>

<div class="d-flex align-items-center">
<h2>Fotos </h2> <h4 class="ml-4"><strong class="badge badge-pill badge-dark"><? echo $row->pag_titulo?></strong></h4>
</div>
<div class="card">
  <div class="card-body">
    <form action="<? echo $url.'!/'.$link[1].'/'.$link[2].'/'.$link[3]?>/enviar" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="file-loading">
          <input id="file-5" name="file[]" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="<? echo $url ?>paginas/upload-paginas.php?pid=<? echo $link[3]?>" data-theme="fas">
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

      if( !empty(count($arquivos)) && empty($row->pag_capa) ){
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
              if( $row->pag_capa != $nameImagem ){
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
       <div class="col-md-3 col-sm-3 text-info"> <i class="fa fa-pencil-square-o"></i> Legenda e Link</div>
     </div>
     <hr>
   </div>

 </div>
</div>



<script>

  $("#file-5").fileinput({
    theme: 'fas',
    language: 'pt-BR',

    uploadUrl:  "upload-paginas.php",

    allowedFileExtensions: ['jpg', 'png', 'gif'],
    autoReplace: true,
    maxFileCount: 10,
    uploadAsync: false
  });

  $("#file-5").on('filebatchuploadsuccess', function(event, files, extra){
    window.location.href = '<? echo $url.'!/'.$link[1].'/'.$link[2].'/'.$link[3]?>';
  });

</script>
