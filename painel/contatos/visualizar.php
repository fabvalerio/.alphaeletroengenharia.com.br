<?

$InputSQL = new db();
$InputSQL->query( "SELECT * FROM contatos ORDER BY cont_data DESC" );
$InputSQL->execute();

?>


<h2 class="display-4 mb-3">Contato<small> (<? echo $InputSQL->rowCount()?>)</small></h2>

<hr>

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
      buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
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
          <th>Email</th>
          <th>Status</th>
          <th width="70" align="right"></th>
        </tr>
      </thead>
      <tbody>
        <?
        if( !empty($InputSQL->row()) ){
          foreach( $InputSQL->row() AS $row ){
            ?>
            <tr class="odd gradeX <? if( empty($row['cont_status']) ) echo 'font-weight-bold'; ?>">
              <td><? echo $row['cont_id']?></td>
              <td><? echo $row['cont_data']?></td>
              <td><? echo $row['cont_email']?></td>
              <td><? echo empty($row['cont_status']) ? 'Aberto' : 'Lido'?></td>
              <td align="right" >
                <a href="<? echo $url?>!/<? echo $link[1]?>/editar/<? echo $row['cont_id']?>" class="btn btn-sm btn-outline-success"><i class="fas fa-vote-yea"></i></a>
                <a href="<? echo $url?>!/<? echo $link[1]?>/deletar/<? echo $row['cont_id']?>" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>
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
