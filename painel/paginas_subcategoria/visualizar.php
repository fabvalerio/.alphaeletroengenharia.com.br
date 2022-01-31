<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
   $ativeMenu( "#products" ).addClass( "in show" );
 });
</script>


<?

/*Subcategoria*/
$InputSQL = new db();
$InputSQL->query( "SELECT * 
                   FROM paginas_subcategoria as s 
                   LEFT JOIN paginas_categoria as c 
                   ON c.cat_id = s.categoria_cat_id 
                   LEFT JOIN menu as m 
                   ON m.menu_id = c.cat_menu 
                   ORDER BY s.sub_titulo ASC" );
$InputSQL->execute();

 ?>

 <a class="btn btn-outline-success" href="<? echo $url?>!/<? echo $link[1]?>/cadastro">Novo cadastro</a>
 <hr>
 <h2 class="display-4 mb-3">Subcategorias <small> (<? echo $InputSQL->rowCount()?>)</small></h2>

 <? include('php/#conf-tabela.php');?>

 <div class="card">
  <div class="card-body">

    <div id="page-wrapper2">
      <div class="row">
        <div class="col-lg-12">

          <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
              <tr class="success">
                <th width="20">ID</th>
                <th>Subcategoria</th>
                <th>Categoria</th>
                <th>Menu</th>
                <th width="100" align="right"></th>
              </tr>
            </thead>
            <tbody>

              <?
              if( !empty($InputSQL->row()) ){
                foreach( $InputSQL->row() AS $row ){
                  ?>
                  <tr class="odd gradeX">
                    <td><? echo $row['sub_id']?></td>
                    <td><? echo $row['sub_titulo']?></td>
                    <td><? echo $row['cat_titulo']?></td>
                    <td><? echo $row['menu_titulo']?></td>
                    <td align="right" >
                      <a href="<? echo $url?>!/<? echo $link[1]?>/editar/<? echo $row['sub_id']?>" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
                      <a href="<? echo $url?>!/<? echo $link[1]?>/deletar/<? echo $row['sub_id']?>" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>
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


<script src="<? echo $url?>bower_components/jquery/dist/jquery.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<? echo $url?>bower_components/metisMenu/dist/metisMenu.js"></script>

<!-- DataTables JavaScript -->
<script src="<? echo $url?>bower_components/datatables/media/js/jquery.dataTables.js"></script>
<script src="<? echo $url?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
  var $tabelas = jQuery.noConflict(); 
  $tabelas(document).ready(function() {
    $tabelas('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>

