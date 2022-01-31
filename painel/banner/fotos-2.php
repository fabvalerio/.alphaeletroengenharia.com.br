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

?>

<a class="btn btn-outline-warning" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Voltar</a>
<hr>
<h2 class="display-4 mb-3">Fotos <span> &bull; Banner</span></h2>

<div class="card">
  <div class="card-body">
    <table class="table table-striped">
      <tr>
        <th width="100" valign="middle">T&iacute;tulo</th>
        <td valign="middle"><strong><? echo $row->ban_titulo?></strong></td>
      </tr>
      <tr>
        <td colspan="2">

          <fieldset>
            <legend style="color:#333">Enviar</legend>
            <form action="<? echo $url.'!/'.$link[1].'/'.$link[2].'/'.$link[3]?>/enviar" method="post" enctype="multipart/form-data">
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

        </td>
      </tr>  
      <? if( $link[4] == 'enviar' ):?>
        <tr>
          <td colspan="2">
            <fieldset>
              <legend>Enviando</legend>
              <div>
                <?
                include('php/Redimensiona.php');

                /*criar pasta*/

                @mkdir( 'images', 0777 );
                @chmod( 'images', 0777 );
                $__pastaFotos = 'images/fotos-banners/';

                @mkdir( $__pastaFotos, 0777 );
                @chmod( $__pastaFotos, 0777 );
                @mkdir( $__pastaFotos.$link[3], 0777 );
                @chmod( $__pastaFotos.$link[3], 0777 );
                @mkdir( $__pastaFotos.$link[3].'/u', 0777 );
                @chmod( $__pastaFotos.$link[3].'/u', 0777 );


                if( !empty($_FILES['file']['name']) ){

                 $extensaoFile = ".".@end(@explode('.', $_FILES['file']['name']));

                 echo '<div class="p-3 bg-success text-white">';

                 $NomeArquivoBanner = strtolower( md5($_FILES['file']['name']) . $extensaoFile );

                 echo  $foto = $_FILES['file']['name'];  
                 $type = $_FILES['file']['type'];
                 $tmp  = $_FILES['file']['tmp_name'];
                 $redim = new Redimensiona();
                 $src=$redim->Redimensionar($foto, $type, $tmp, 1600, $__pastaFotos.$link[3].'/u');

                 echo '</div>';

               }

               ?>
             </div>
           </fieldset>
         </td>
       </tr>
     <? endif;?>
   </table>

 </div>
</div>

<hr>

<!--Thumb-->    
<div class="row">

  <?
  $pastaId = 'images/fotos-banners/'.$link[3];
  $pasta = $pastaId.'/u/';

  $arquivos = glob("$pasta{*.jpg,*.png,*.gif}", GLOB_BRACE);

  foreach($arquivos as $img)
  {
   $nomeImagem = '/u/'.@end( @explode('/', $img) );
   ?>
   <div class="col-sm-6 col-md-2">
    <div class="card">
      <div class="card-body">
        <a href="<? echo $url.$pastaId.$nomeImagem; ?>" class="img-fluid group3 box-img">
          <img src="<? echo $url.$img; ?>" alt="..." class="img">
        </a>
        <hr>

        <p align="center">
          <? 
          $nameImagem = @end( @explode('/', $img) );
          if( $row->ban_capa != $nameImagem ){ 
            ?>
            <a href="<? echo $url?>!/<? echo $link[1]?>/deleta-imagem/<? echo $link[3]?>/<? echo $img?>" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
            <a href="<? echo $url?>!/<? echo $link[1]?>/capa-imagem/<? echo $link[3]?>/<? echo $img?>" class="btn btn-outline-success"><i class="fas fa-check"></i></a>
            <? 
          }else{
            ?>
            <i class="fa fa-check text-success fa-3x"></i>
            <?
          }
          ?>
        </p>
      </div>
    </div>
  </div>
  <?php 
}
?>

</div>   
