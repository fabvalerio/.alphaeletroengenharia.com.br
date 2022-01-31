<?
include('../php/db.class.php');
include('../php/htaccess.php');

$___cat = new db();
$___cat->query("SELECT * FROM paginas_categoria WHERE cat_menu = '".$_GET['pid']."' ");
$___cat->execute();

if( $___cat->execute() ){
  ?>

  <select name="categoria_cat_id" id="pagina_categoria" class="form-control" required>
    <option value="">Selecione</option>
    <?
    if( !empty($___cat->row()) ){
      foreach( $___cat->row() AS $row ){
       ?>
       <option <? if( $_GET['cat'] == $row['cat_id'] ){ echo 'selected';} ?> value="<? echo $row['cat_id']?>"><? echo $row['cat_titulo']?></option>
       <?
     }
   }
   ?>
 </select>


 <script src="../js/jquery.min.js"></script>
 <script type="text/javascript">

  jQuery(document).ready(function() {

   jQuery('#pagina_categoria').change(function(e, v){
    var valor = jQuery('#pagina_categoria').val();

    //alert("<? echo $url; ?>paginas/-subcategoria.php?pid="+valor);

    jQuery.get( "<? echo $url; ?>paginas/-subcategoria.php?pid="+valor, function( data ) {
      jQuery( "#result_categoria" ).html( data );
      Query( "#result_categoria" ).html( "Carregando p&aacute;gina!!" );
    });

  });

 });
</script>

<?
}else{
  ?>
  <input value="" disabled="no" class="form-control">
  <?
}

?>