<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
    $ativeMenu( "#products" ).addClass( "in show" );
  });
</script>

<?

$vis = new db();
$vis->query( "SELECT * FROM menu ORDER BY menu_titulo ASC" );
$vis->execute();

?>


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
      "pageLength": 50,
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



<? include('php/#conf-tabela.php');?>


<div id="wrapper">

  <!-- Navigation -->
  <div id="page-wrapper2">

    <div class="row d-flex align-items-center">
      <div class="col-sm-6">
        <h2 class="display-4">Menu<small> (<? echo $vis->rowCount()?>)</small></h2>
      </div> 
      <div class="col-sm-6 text-sm-right">
        <a class="btn btn-outline-success" href="<? echo $url?>!/<? echo $link[1]; ?>/cadastro"><i class="fas fa-plus-circle"></i> Novo cadastro</a>
        <a class="btn btn-outline-info" href="<? echo $url?>!/<? echo $link[1]; ?>/ordenar"><i class="fas fa-sort"></i> Ordenar</a>
      </div> 
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <table class="table table-striped table-hover" id="dataTables">
              <thead>
                <tr class="success">
                  <th width="20">ID</th>
                  <th>T&iacute;tulo do menu</th>
                  <th>Aparecer na Home</th>
                  <th>Aparecer no Rodap&eacute;</th>
                  <th>DropDown</th>
                  <th>Top Header</th>
                  <th>Ordem</th>
                  <th>Status</th>
                  <th>Paginização</th>
                  <th width="150" align="right"></th>
                </tr>
              </thead>
              <tbody>
                <?
                if( !empty($vis->row()) ){
                  foreach( $vis->row() AS $row ){
                    ?>
                    <tr class="odd gradeX text-center">
                      <td class="align-middle"><? echo $row['menu_id']; ?></td>
                      <td class="text-left  align-middle"><? echo $row['menu_titulo']; ?></td>
                      <td class="text-md-center align-middle"><? echo status($row['menu_home'])?></td>
                      <td class="text-md-center align-middle"><? echo status($row['menu_rodape'])?></td>
                      <td class="text-md-center align-middle"><? echo status($row['menu_sem_categoria'])?></td>
                      <td class="text-md-center align-middle"><? echo status($row['menu_bar'])?></td>
                      <td class="text-md-center align-middle"><? echo $row['menu_order']; ?></td>
                      <td class="text-md-center align-middle"><? echo status($row['menu_status'])?></td>
                      <td class="text-md-center align-middle"><? echo status($row['menu_paginizacao'])?> <? if( !empty($row['menu_paginizacao']) ){ ?><span class="badge badge-pill badge-success float-right"><? echo $row['menu_quantidade']; ?></span><? } ?></td>
                      <td align="right" class="align-middle" >
                        <a href="<? echo $url; ?>!/<? echo $link[1]; ?>/fotos/<? echo $row['menu_id']; ?>" class="btn btn-sm btn-outline-warning"><i class="fas fa-camera"></i></a>
                        <a href="<? echo $jsonConf->c_url; ?><? echo $row['menu_link']; ?>" class="btn btn-sm btn-outline-info" target="_new"><i class="fas fa-globe"></i></a>
                        <a href="<? echo $url; ?>!/<? echo $link[1]; ?>/editar/<? echo $row['menu_id']; ?>" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
                        <a href="<? echo $url; ?>!/<? echo $link[1]; ?>/deletar/<? echo $row['menu_id']; ?>/&titulo=<? echo $row['menu_titulo']; ?>" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>
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
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

  </div>
  <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->