<!--Thumb-->    
<div class="row">

  <div class="col-12 mb-4">
    <form method="post" enctype="multipart/form-data" id="imagejson">
      <fieldset>
        <legend style="color:#333">Enviar</legend>
        <form action="<? echo $url.'!/'.$link[1].'/'.$link[2]?>/enviar" method="post" enctype="multipart/form-data">
          <div class="input-group">
            <div class="custom-file">
              <label class="custom-file-label">selecione as fotos de seu computador</label>
              <input id="file" name="file" type="file" required class="custom-file-input" accept="image/jpeg, image/png, image/gif" >
            </div>
            <div class="input-group-append"> 
              <input name="Enviar" type="button" id="salvarImagem" class="btn btn-success btn-envia" value="Enviar Arquivo" />
            </div>
          </div>
        </form>
      </fieldset>
    </form>
    <div id="resultImagem"></div>
  </div>

  <script>

     jQuery(document).ready(function() {
      jQuery('#salvarImagem').click(function() {

        var form = jQuery('#imagejson')[0];

        var dados = new FormData(form);
        var registro = '<? echo $_GET['url'] ?>/images-json/imagem-upload.php';

        jQuery.ajax({
          type : 'post',
          enctype: 'multipart/form-data',
          url : registro,
          data : dados,
            processData: false,
            contentType: false,
            cache: false,
          success : function(data){
                /*Efeito subir e aprecer*/
                jQuery("#salvarImagem").fadeToggle("slow");
                setTimeout(function() { jQuery('#salvarImagem').fadeIn('show');}, 5000);

           jQuery("#resultImagem").html("ENVIANDO...");

           jQuery("#resultImagem").html(data);
         }
       })
      });
    });
  
  </script>


  <?

  $pasta = "./";

  $arquivos = glob("$pasta{*.jpg,*.png,*.gif}", GLOB_BRACE);

  foreach($arquivos as $img){
    $img = str_replace(array('./', '../'), 'images-json/', $img);

    $url = $_GET['url'].$img;
    ?>
    <div class="col-sm-6 col-md-2 text-center my-2">
      <div class="badge-light p-2 bg-light d-flex align-items-start flex-column" style="height: 350px;">
        <div><img src="<? echo $url ?>" alt="..." class="img-fluid"></div>
        <div class="mt-auto text-center w-100">
          <? if( $_POST['pag_extra_background'] == $url ){ ?>
            <i class="fas fa-check fa-2x text-success"></i>
          <? }else{ ?>
            <a class="btn btn-link text-danger" href="#" data-dismiss="modal" onclick="javascript:ativar('<? echo $url ?>')"><i class="fas fa-arrow-alt-circle-up fa-2x"></i></a>
          <? } ?>
        </div>
      </div>
    </div>
    <?php 
  }
  ?>

</div>   

<script src="<? echo $_GET['url'] ?>js/jquery-3.3.1.min.js"></script>
<script>
  function ativar( img ){
    console.log(img);
    jQuery("#pag_extra_background").val(img);
  }
</script>