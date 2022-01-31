<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
    $ativeMenu( "#products" ).addClass( "in show" );
  });
</script>

<?
include('assets/tinymce-4.6.5/index.php');
?>

<style>
.mce-notification{
  display: none !important;
}
</style>

<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>
<hr>
<h2 class="display-4 mb-3">Cadastrar &bull; Section Home</h2>
<div class="card">
  <div class="card-body">
<form enctype="multipart/form-data"  id="cadastro" method="post">
  <table class="table ">
    <tr>
      <th width="100" class="align-middle">T&iacute;tulo</th>      
      <td colspan="5" class="align-middle">
        <input class="form-control" name="pag_extra_titulo" type="text" autofocus id="pag_extra_titulo" autocomplete="off" size="60" maxlength="200" />
      </td>
    </tr>
    <tr>
      <th class="align-middle">Padding</th>
      <td>
        <div class="input-group">
          <input type="range" class="form-control-range" id="padding" name="pag_extra_padding" min="0" max="100" value="50"> 
          <p><b>Espaçamento:</b> <span id="valuePadding"></span></p> 
        </div>              
      </td>
          <th class="align-middle">Color</th>
          <td>
            <input type="color" class="form-control" name="pag_extra_color" value="#ffffff">            
          </td>
      <th class="align-middle">Bckground</th>
      <td>
        <div class="input-group">
          <input type="text" class="form-control" readonly placeholder="imagem de fundo" aria-label="imagem de fundo" aria-describedby="bg" id="pag_extra_background" name="pag_extra_background">
          <div class="input-group-append">
            <span class="input-group-text" id="bg">
              <a href="#" data-toggle="modal" data-target="#Gallery" id="CarregaGallery">Selecionar</a>
            </span>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="Gallery" tabindex="-1" role="dialog" aria-labelledby="GalleryLabel" aria-hidden="true">
          <div class="modal-dialog modal-ll" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="GalleryLabel">Galeria de Fotos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="result-galeria"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" id="AtualizarFotos"><i class="fas fa-redo"></i> Atualizar Galeria</button>
              </div>
            </div>
          </div>
        </div>

        <script>

          function onloadGaleria(){
            jQuery.ajax({
              url: "<? echo $url ?>images-json/jqueryGaleria.php?url=<? echo $url?>", 
              type : 'POST',
              data : jQuery('#pag_extra_background').serialize(),
              success: function(data){
                jQuery("#result-galeria").html(data);
              }});
          }

          jQuery('#AtualizarFotos').click(function(event) {

           onloadGaleria();
           console.log('carregar');

           jQuery("#AtualizarFotos").fadeToggle("slow");
           setTimeout(function() { jQuery('#AtualizarFotos').fadeIn('show');}, 3000);
         });

          jQuery('#CarregaGallery').click(function(event) {
           onloadGaleria();
         });

       </script>

     </td>
   </tr>
   <tr>
    <th class="align-middle">Status</th>
    <td>
      <select name="pag_extra_status" class="custom-select">
        <option value="1" selected>Ativo</option>
        <option value="0">Inativo</option>
      </select> 
    </td>
    <th class="align-middle">Container</th>
    <td>
      <select name="pag_extra_container" class="custom-select">
        <option value="container" selected>Container</option>
        <option value="container-fluid">Container-Fluid</option>
      </select> 
    </td>
    <th></th>
    <td></td>
  </tr>
  <tr>
    <td colspan="6">
      <? include('includes/#help.php'); ?>
      <textarea class="form-control" name="pag_extra_texto" id="pag_extra_texto"></textarea>
    </td>
  </tr>
  <tr>
    <td colspan="6">
      <input type="hidden" name="tabela" value="pagina_home">      <!--Tabela de edição-->
      <input type="hidden" name="url" value="<? echo $url ?>">     <!--Url -->
      <input type="button" name="Enviar" id="salvar" value="Enviar" class="btn btn-success w-100" />

    </td>
  </tr>
</table>
</form>
</div>
</div>

<div id="result"></div>

<script src="<? echo $url ?>php/db.class.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
  /* REGISTRO */
  cadastro('<? echo $url; ?>', 'tinyMCE');
</script>


<script>
  var slider = document.getElementById("padding");
  var output = document.getElementById("valuePadding");
  output.innerHTML = slider.value;

  slider.oninput = function() {
    output.innerHTML = this.value;
  }
</script>