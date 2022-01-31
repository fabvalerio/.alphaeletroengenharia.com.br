<?
$InputSQL = new db();
$InputSQL->query( "SELECT * FROM newsletter ORDER BY new_data DESC" );
$InputSQL->execute();
?>

<a class="btn btn-outline-primary" href="<? echo $url?>!/<? echo $link[1]?>/lista">Gerar Lista</a>
<hr>
<h2 class="display-4 mb-3">Newsletter<small> (<? echo $InputSQL->rowCount()?>)</small></h2>

<link rel="stylesheet" type="text/css" href="<? echo $url; ?>assets/datatables/jquery.dataTables.min.css"></style>
<link rel="stylesheet" type="text/css" href="<? echo $url; ?>assets/datatables/buttons.dataTables.min.css"></style>
<script src="<? echo $url; ?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<? echo $url; ?>assets/datatables/buttons.flash.min.js"></script>
<script src="<? echo $url; ?>assets/datatables/buttons.html5.min.js"></script>
<script src="<? echo $url; ?>assets/datatables/buttons.print.min.js"></script>
<script src="<? echo $url; ?>assets/datatables/dataTables.buttons.min.js"></script>
<script src="<? echo $url; ?>assets/datatables/jszip.min.js"></script>
<script src="<? echo $url; ?>assets/datatables/pdfmake.min.js"></script>
<script src="<? echo $url; ?>assets/datatables/vfs_fonts.js"></script>
<script src="<? echo $url; ?>assets/datatables/dataTables.select.min.js"></script>
<script src="<? echo $url; ?>assets/datatables/dataTables.rowReorder.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('#dataTables').DataTable( {
      select: true,
      stateSave: true,
      responsive: true,
      rowReorder: true,
      "order": [[ 0, 'DESC' ], [ 1, 'asc' ]],
      "dom": '<"top"i>lft<"bottom"Bi><"clear">',
      buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      "pagingType": "full_numbers"
    } );
    jQuery('.dataTables_length select').addClass('input-control');
    jQuery('.dataTables_filter label input').addClass('input-control');
    jQuery('.table').addClass('font-12');
    jQuery('.top #dataTables_info').css({'display':'none'});
    jQuery('.dt-buttons').css({'margin-top':'10px'});
  } );
</script>

<div id="card">
  <div class="card-body">
    <table class="table table-striped table-hover" id="dataTables">
      <thead>
        <tr class="success">
          <th>ID</th>
          <th>Data</th>
          <th>E-mail</th>
          <th>Nome</th>
          <th width="70" align="right"></th>
        </tr>
      </thead>
      <tbody>
        <?
        if( !empty($InputSQL->row()) ){
          foreach( $InputSQL->row() AS $row ){
            ?>
            <tr class="odd gradeX">
              <td><? echo $row['new_id']?></td>
              <td><? echo $row['new_data']?></td>
              <td><? echo $row['new_email']?></td>
              <td><? echo $row['new_nome']?></td>
              <td align="right" >
                <a href="<? echo $url?>!/<? echo $link[1]?>/deletar/<? echo $row['new_id']?>/&titulo=<? echo $row['new_email']?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-times"></i></a>
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