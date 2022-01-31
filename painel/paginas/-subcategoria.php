<?
include('../php/db.class.php');

$___sub = new db();
$___sub->query("SELECT * FROM paginas_subcategoria WHERE categoria_cat_id = '".$_GET['pid']."' ");

if( !empty( $___sub->execute() ) ){
  ?>

  <select name="subcategoria_sub_id" class="form-control" required>
   <option value="" selected="">Selecione</option>
   <?
   if( !empty($___sub->row()) ){
    foreach( $___sub->row() AS $row ){
        if( $_GET['sub'] ==  $row['sub_id'] ){ $selected = 'selected'; }
     ?>
     <option <? echo $selected ; ?> value="<? echo $row['sub_id']?>"><? echo $row['sub_titulo']?></option>
     <?
       $selected = '';
   }
 }
 ?>
</select>

<?
}else{
  ?>
  <input value="" disabled="no" class="form-control">
  <?
}
?>