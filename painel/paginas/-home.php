 <?
   include('../php/db.class.php');

  //echo $_GET['pid'];

   $menuVisResult = new CONNECT();
   $menuVisResult->SQL("SELECT * FROM menu WHERE menu_id = '".$_GET['pid']."' ");

   if( $menuVisResult->exibi['menu_home'] == '1' ):


?>

    <label>Destaque na Home?</label>
    <select class="form-control" name="pag_home" id="pag_home">
      <option value="1" <?=select('1', '1', $_GET['id']);?>>Ativo</option>
      <option value="0" <?=select('1', '0', $_GET['id']);?> <? if( empty( $_GET['id'] ) ): ?>selected="selected"<? endif;?>>Inativo</option>
    </select>

 <?
   endif;
 ?>
