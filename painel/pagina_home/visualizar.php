
<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
    $ativeMenu( "#products" ).addClass( "in show" );
  });
</script>

<link rel="stylesheet" type="text/css" href="<? echo $url; ?>assets/datatables/jquery.dataTables.min.css"></style>
<script src="<? echo $url; ?>assets/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('#dataTables').DataTable( {
      stateSave: true,
      responsive: true,
      "order": [[ 1, 'asc' ]],
      "pagingType": "full_numbers"
    } );
    jQuery('.dataTables_length select').addClass('input-control');
    jQuery('.dataTables_filter label input').addClass('input-control');
    jQuery('.table').addClass('font-12');
  } );
</script>

<?
$InputSQL = new db();
$InputSQL->query( "SELECT * FROM pagina_home ORDER BY pag_extra_id ASC" );
$InputSQL->execute();
?>

<a class="btn btn-outline-success" href="<? echo $url?>!/<? echo $link[1]?>/cadastro">Novo cadastro</a>
<hr>

<h2 class="display-4 mb-3">P&aacute;ginas Home <small>(<? echo $InputSQL->rowCount()?>)</small></h2>

<div class="card">
  <div class="card-body">

    <table class="table table-striped table-hover" id="dataTables-example">
      <thead>
        <tr>
          <th width="20">ID</th>
          <th>T&iacute;tulo</th>
          <th>ID Style</th>
          <th width="140" align="right"></th>
        </tr>
      </thead>
      <tbody>

       <?
       if( !empty($InputSQL->row()) ){
        foreach( $InputSQL->row() AS $row ){
          ?>
          <tr class="odd gradeX">
            <td><? echo $row['pag_extra_id']?></td>
            <td><? echo $row['pag_extra_titulo']?></td>
            <td>
             #extra-<? echo $row['pag_extra_id']?> 
           </td>
           <td class="text-right">
            <a href="<? echo $url?>!/<? echo $link[1]?>/fotos/<? echo $row['pag_extra_id']?>" class="btn btn-outline-warning btn-sm">
              <i class="fas fa-images"></i>
            </a>
            <a href="<? echo $url?>!/<? echo $link[1]?>/editar/<? echo $row['pag_extra_id']?>" class="btn btn-outline-success btn-sm">
              <i class="fas fa-edit"></i>
            </a>
            <a  href="<? echo $url?>!/<? echo $link[1]?>/deletar/<? echo $row['pag_extra_id']?>/&titulo=<? echo $row['pag_extra_titulo']?>" class="btn btn-outline-danger btn-sm ">
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