<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
   $ativeMenu( "#products" ).addClass( "in show" );
 });
</script>


<?
/*CATEGORIA*/
$InputSQL = new db();
$InputSQL->query( "SELECT * FROM paginas_categoria ORDER BY cat_titulo ASC" );
$InputSQL->execute();

/*MENU*/
$ListMenu = new db();
$ListMenu->query( "SELECT * FROM menu" );
$ListMenu->execute();

if( !empty($ListMenu->row()) ){
  foreach( $ListMenu->row() AS $row ){
    $VisMenu[$row['menu_id']] = $row['menu_titulo'];
  }
}
?>

<a class="btn btn-outline-success" href="<? echo $url?>!/<? echo $link[1]?>/cadastro">Novo cadastro</a>
<hr>

<h2 class="display-4 mb-3">Categoria<small> (<? echo $InputSQL->rowCount()?>)</small></h2>

<div id="wrapper">
  <div id="page-wrapper2">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

            <table class="table table-striped table-hover" id="dataTables-example">
              <thead>
                <tr class="success">
                  <th width="20">ID</th>
                  <th>T&iacute;tulo da Categoria</th>
                  <th>Menu</th>
                  <th width="20"></th>
                  <th width="100" align="right"></th>
                </tr>
              </thead>
              <tbody>
               <?
               if( !empty($InputSQL->row()) ){
                foreach( $InputSQL->row() AS $row ){
                  ?>
                  <tr class="odd gradeX">
                    <td><? echo $row['cat_id']?></td>
                    <td><? echo $row['cat_titulo']?></td>
                    <td><? echo $VisMenu[$row['cat_menu']]?></td>
                    <td class="text-md-center">
                      <? if( !empty($row['cat_status']) ){?>
                        <i class="fas fa-check text-success"></i>
                      <? }else{?>
                        <i class="fas fa-times text-danger"></i>
                      <? } ?>
                    </td>
                    <td align="right" >
                      <a href="<? echo $url?>!/<? echo $link[1]?>/editar/<? echo $row['cat_id']?>" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
                      <a href="<? echo $url?>!/<? echo $link[1]?>/deletar/<? echo $row['cat_id']?>" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  <?
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

</div>

