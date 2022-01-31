

<?


/*biblioteca*/
include('php/phpqrcode/qrlib.php');

/* PAGINAS */

$__InputSQLSql = "SELECT * 
FROM paginas AS p 
LEFT JOIN menu AS m
ON m.menu_id = p.menu_menu_id
LEFT JOIN paginas_categoria AS c
ON c.cat_id = p.categoria_cat_id
LEFT JOIN paginas_subcategoria AS s
ON s.sub_id = subcategoria_sub_id
ORDER BY p.pag_id ASC";

$__InputSQL = new db();     
$__InputSQL->query($__InputSQLSql);
$__InputSQL->execute();

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
      "pageLength": 25,
      stateSave: true,
      responsive: true,
        rowReorder: true, //Organizador por id
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

<div class="row d-flex align-items-center">
  <div class="col-sm-6">
    <h2 class="display-4">P&aacute;ginas <small>(<? echo count($__InputSQL->row())?>)</small> </h2>
  </div>
  <div class="col-sm-6 text-sm-right">
    <a class="btn btn-outline-success" href="<? echo $url?>!/<? echo $link[1]?>/cadastro"><i class="fas fa-plus-circle"></i> Novo cadastro</a>
  </div>
</div>

<hr>

<div id="wrapper">

  <!-- Navigation -->

  <div class="card">
    <div class="card-body">
      <div id="page-wrapper2">
        <div class="row">
          <div class="col-lg-12">

            <table class="table table-striped table-hover display" id="dataTables">
              <thead>
                <tr class="align-middle">
                  <th width="10">ID</th>
                  <th width="50">Post</th>
                  <th>T&iacute;tulo</th>
                  <th>P&aacute;gina</th> 

                  <? if(  $jsonConf->c_categoria == '1' ): ?>
                    <th>Categoria</th> 
                  <? endif;?>

                  <? if(  $jsonConf->c_subcategoria == '1' ): ?>
                    <th>Sub-Categoria</th>
                  <? endif;?>

                  <th>URL</th>

                  <th align="right" width="20">Capa</th>
                  <th align="right" width="20">Home</th>
                  <th align="right" width="20"><i class="fas fa-file-alt"></i></th>
                  <th align="right" width="20">Status</th>
                  <th width="" align="right"></th>
                </tr>
              </thead>
              <tbody>

                <?
                if( !empty($__InputSQL->row()) ){
                  foreach( $__InputSQL->row() AS $InputSQL ){
                    ?>

                    <tr class="align-middle">
                      <td class="align-middle"><? echo str_pad($InputSQL['pag_id'], 2, '0', STR_PAD_LEFT)?></td>
                      <td class="align-middle"><? echo $InputSQL['pag_data']?></td>
                      <td class="align-middle"><? echo $InputSQL['pag_titulo']?></td>
                      <td class="align-middle"><? echo $InputSQL['menu_titulo']?></td>

                      <? if(  $jsonConf->c_categoria == '1' ){ ?>
                        <td class="align-middle"><? echo $InputSQL['cat_titulo']?></td>
                      <? }?>

                      <? if(  $jsonConf->c_subcategoria == '1' ){ ?>
                        <td class="align-middle"><? echo $InputSQL['sub_titulo']?></td>
                      <? }?>

                      <td class="align-middle"><? echo $InputSQL['pag_link']?></td>

                      <td class="text-center align-middle">
                        <? if( !empty($InputSQL['pag_capa']) ){?>
                          <i class="fa fa-check-circle btn-lg" style="color:green"></i>
                          <? }else{?><i class="fa fa-times-circle btn-lg" style="color:red"></i>
                        <? } ?>
                      </td>
                      <td class="text-center align-middle">
                        <? if( !empty($InputSQL['pag_home']) ){?>
                          <i class="fa fa-check-circle btn-lg" style="color:green"></i>
                          <? }else{?><i class="fa fa-times-circle btn-lg" style="color:red"></i>
                        <? } ?>
                      </td>
                      <td class="align-middle text-center"><span class="badge badge-pill badge-warning p-2"><? echo $InputSQL['paginas_wireframes_wf_id']?></span></td>
                      <td class="text-center align-middle">
                        <? if( !empty($InputSQL['pag_status']) ){?>
                          <i class="fa fa-check-circle btn-lg" style="color:green"></i>
                          <? }else{?><i class="fa fa-times-circle btn-lg" style="color:red"></i>
                        <? } ?>
                      </td>
                      <td align="right" >

                        <div class="btn-group dropup">

                          <button class="btn btn-default dropdown-toggle btn-sm" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            A&ccedil;&atilde;o
                            <span class="caret"></span>
                          </button>

                          <div class="dropdown-menu dropdown-menu-right alertdropdown-menu" aria-labelledby="dropdownMenu1">

                            <!-- QR CODE -->
                            <? if(  $jsonConf->c_qrcode == '1' ){ ?>
                              <a class="dropdown-item text-link" data-toggle="modal" data-target="#myModal<? echo $InputSQL['pag_id']?>">
                                <span class="btn btn-sm btn-secondary"><i class="fas fa-qrcode"></i></span> QrCode
                              </a>
                            <? } ?>

                        <? /*if(  $jsonConf->c_mapa == '1' ){ ?>
                          <a class="dropdown-item text-primary " href="<? echo $url?>!/<? echo $link[1]?>/mapa/<? echo $InputSQL['pag_id']?>">
                            <span class="btn btn-sm btn-primary"><i class="fas fa-map-marker-alt"></i></span> Maps
                          </a>
                        <? }*/ ?>

                        <a class="dropdown-item text-warning " href="<? echo $url?>!/<? echo $link[1]?>/fotos/<? echo $InputSQL['pag_id']?>">
                          <span class="btn btn-sm btn-warning"><i class="fas fa-images"></i></span> Fotos
                        </a>


                        <? /*if(  $jsonConf->c_videos == '1' ){ ?>
                          <a class="dropdown-item text-info " href="<? echo $url?>!/videos_materias/visualizar/paginas/<? echo $InputSQL['pag_id']?>">
                            <span class="btn btn-sm btn-info"><i class="fab fa-youtube"></i></span> V&iacute;deos
                          </a>
                        <? }*/ ?>

                        <? if(  $jsonConf->c_anexo == '1' ){ ?>
                          <a class="dropdown-item text-primary"  href="<? echo $url?>!/<? echo $link[1]?>/file/<? echo $InputSQL['pag_id']?>">
                            <span class="btn btn-sm btn-primary"><i class="fas fa-file-export"></i></span> Anexos
                          </a>
                        <? } ?>

                        <a class="dropdown-item text-success" href=" <? echo $url?>!/<? echo $link[1]?>/editar/<? echo $InputSQL['pag_id']?>">
                          <span class="btn btn-sm btn-success"><i class="fas fa-edit"></i></span> Editar
                        </a>

                        <? if(  $jsonConf->pag_fixed != '1' ){ ?>
                          <a class="dropdown-item text-danger" href="<? echo $url?>!/<? echo $link[1]?>/deletar/<? echo $InputSQL['pag_id']?>&titulo=<? echo $InputSQL['pag_titulo']?>">
                            <span class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></span> Deletar
                          </a>
                        <? } ?>

                      </div>
                    </div>

                  </td>
                </tr>

                <!-- Modal -->

                <div class="modal fade" id="myModal<? echo $InputSQL['pag_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Gerador de Qr-Code</h4>
                      </div>
                      <div class="modal-body">
                        <? include('paginas/qr-code.php'); ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>

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