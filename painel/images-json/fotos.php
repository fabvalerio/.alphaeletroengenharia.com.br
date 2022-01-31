<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
   $ativeMenu( "#products" ).addClass( "show" );
 });
</script>


<?
include('assets/js/wideimage/lib/WideImage.php');
?>

<h2 class="display-4 mb-3">Galeria de Imagens</h2>

<table class="table">
  <tr>
    <td colspan="2">
      <fieldset>
        <legend style="color:#333">Enviar</legend>
        <form action="<? echo $url.'!/'.$link[1].'/'.$link[2]?>/enviar" method="post" enctype="multipart/form-data">
          <div class="input-group">
            <div class="custom-file">
              <label class="custom-file-label">selecione as fotos de seu computador</label>
              <input id="file" name="file" type="file" required class="custom-file-input" accept="image/jpeg, image/png, image/gif" >
            </div>
            <div class="input-group-append"> 
              <input name="Enviar" type="submit" class="btn btn-success btn-envia" value="Enviar Arquivo" />
            </div>
          </div>
        </form>
      </fieldset>
      <hr>
    </td>
  </tr>  
  <? if( $link[3] == 'enviar' ):?>
    <tr>
      <td colspan="2" bgcolor="#FFFFFF">
        <fieldset>
          <legend>Enviando</legend>
          <div>
            <?

            @mkdir( 'images', 0777 );
            @chmod( 'images', 0777 );
            $__pastaFotos = 'images-json/';

            @mkdir( $__pastaFotos, 0777 );
            @chmod( $__pastaFotos, 0777 );

            if( !empty($_FILES['file']['name']) ){
             $extensaoFile = ".".@end(@explode('.', $_FILES['file']['name']));
             echo '<div class="alert alert-success">';
             $NomeArquivoBanner = strtolower( c($_FILES['file']['name']) );
             if(move_uploaded_file($_FILES['file']['tmp_name'],$__pastaFotos."/".$NomeArquivoBanner ))
             {					
              echo "Enviado com sucesso!";
              echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/fotos" />';
            }
            }else{
            {
             echo "Erro no envio!";
           }
           echo '</div>';

         }

         ?>
       </div>
     </fieldset>
   </td>
 </tr>
<? endif;?>
</table>

<hr>

<!--Thumb-->    
<div class="row">

  <?
  $pastaId = 'images-json/';
  $pasta = $pastaId;

  $arquivos = glob("$pasta{*.jpg,*.png,*.gif}", GLOB_BRACE);

  $i = 0;
  foreach($arquivos as $img)
  {
   $nomeImagem = '/g/'.@end( @explode('/', $img) );
   ?>
   <div class="col-sm-6 col-md-2 text-center">
    <div class="badge-light p-2 bg-light">
        <img src="<? echo $url.$img; ?>" alt="..." class="img-fluid">
      <hr>
        <a href="<? echo $url?>!/<? echo $link[1]?>/deleta-imagem/<? echo $img?>" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
        <a class="btn btn-outline-primary"  data-toggle="modal" data-target="#modal_<? echo $i;?>_"><i class="fa fa-code"></i></a>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modal_<? echo $i;?>_" tabindex="-1" role="dialog" aria-labelledby="modal_<? echo $i;?>_Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">URL da Imagem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            <input class="form-group w-100 form-control-lg" id="copy_<? echo $i?>" type="text" value="<? echo $url.$img?>">
            <span class="text-danger p-2" id="msg_<? echo $i; ?>"></span>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal" onclick="myFunction('<? echo $i?>')"><i class="fa fa-files-o"></i> Copy</button>
        </div>
      </div>
    </div>
  </div>
  <?php 
  $i++;
}
?>

</div>   

<script>
  function myFunction(ID) {
    /* Get the text field */
    var copyText = document.getElementById('copy_'+ID);
    /* Select the text field */
    copyText.select();
    /* Copy the text inside the text field */
    document.execCommand("Copy");
    $('#msg_'+ID).html("Copiado!");
  }
</script>