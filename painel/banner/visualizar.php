<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
   $ativeMenu( "#products" ).addClass( "show" );
 });
</script>

<?

$bannerSQL = "SELECT * FROM banner ORDER BY ban_titulo ASC";

$banner = new db();     
$banner->query($bannerSQL);
$banner->execute();

?>

<a class="btn btn-outline-success" href="<? echo $url.'!/'.$link[1]?>/cadastro">Novo cadastro</a>

<hr>

<h2 class="display-4 mb-3">Banners  &bull; <span>Lista (<? echo $banner->rowCount()?>)</span></h2>

<h5 class="badge-warning p-3">Tamanho: <? echo $jsonConf->c_tamanho_banner; ?> pixels - m&aacute;ximo 500KB</h5>



<div class="card">
      <div class="card-body">
        <table class="table table-striped table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th width="50">ID</th>
              <th>T&iacute;tulo</th>
              <th>Capa</th>
              <th align="right" width="150"></th>
            </tr>
          </thead>
          <tbody>
           <?
            if( !empty($banner->row()) ){
                foreach( $banner->row() AS $row ){
              ?>
              <tr class="odd gradeX">
                <td><? echo $row['ban_id']?></td>
                <td><? echo $row['ban_titulo']?></td>
                <td width="50">
                  <? echo !empty($row['ban_capa']) ? '<i class="fas fa-check-circle text-success fa-2x"></i>' : '<i class="fas fa-times-circle text-danger fa-2x"></i>'; ?>
                  </td>
                <td align="right" >
                  <a href="<? echo $url?>!/<? echo $link[1]?>/fotos/<? echo $row['ban_id']?>" class="btn btn-sm btn-outline-warning">
                    <i class="far fa-images"></i>
                  </a>
                  <a href="<? echo $url?>!/<? echo $link[1]?>/editar/<? echo $row['ban_id']?>" class="btn btn-sm btn-outline-success">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="<? echo $url?>!/<? echo $link[1]?>/deletar/<? echo $row['ban_id']?>/&titulo=<? echo $row['ban_titulo']; ?>" class="btn btn-sm btn-outline-danger">
                    <i class="far fa-trash-alt"></i>
                  </a>
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


<!-- jQuery -->
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

