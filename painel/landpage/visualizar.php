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
$InputSQL->query( "SELECT * FROM landpage ORDER BY land_titulo ASC" );
$InputSQL->execute();

if(  $jsonConf->c_land == '1' ){

  ?>
  <a class="btn btn-outline-success" href="<?=$url?>!/<?=$link[1]?>/cadastro">Novo cadastro</a>
  <hr>
  <? 
}else{
  $block = 'disabled';
}
?>

<h2 class="display-4 mb-3">LandingPages <small>(<?=$InputSQL->rowCount()?>)</small></h2>

<div id="wrapper">

  <!-- Navigation -->
  <div id="page-wrapper2">
    <div class="row">
      <div class="col-lg-12">

        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr class="success">
              <th>ID</th>
              <th>T&iacute;tulo</th>
              <th>Segmento</th>
              <th>URL</th>
              <th>Status</th> 
              <th align="right" width="20">Capa</th>
              <th width="140" align="right"></th>
            </tr>
          </thead>
          <tbody>

           <?
           if( !empty($InputSQL->row()) ){
            foreach( $InputSQL->row() AS $row ){
              ?>

              <tr class="odd gradeX">
                <td class="align-middle"><? echo $row['land_id']?></td>
                <td class="align-middle"><? echo $row['land_titulo']?></td>
                <td class="align-middle"><? echo $row['land_ramo_atividade']?></td>
                <td class="align-middle"><? echo $row['land_url']?></td>
                <td class="align-middle"><?=status($row['land_status'])?></td>
                <td width="10" class="text-md-center">
                  <? if( !empty($row['land_capa']) ){?><i class="fa fa-check-circle text-md text-success"></i><? }else{?><i class="fa fa-times-circle text-md text-danger"></i><? } ?>
                </td>
                <td width="300" class="text-right">
                  <a href="<?=$url_site?>emkt/<? echo $row['land_url']?>" target="new" class="btn btn-outline-primary btn-sm"><i class="fas fa-envelope-open-text"></i></a>
                  <a href="<?=$url_site?>landpages/<? echo $row['land_url']?>" target="new" class="btn btn-outline-info btn-sm"><i class="fas fa-globe"></i></a>
                  <a href="<?=$url?>!/<?=$link[1]?>/fotos/<? echo $row['land_id']?>" class="btn btn-outline-warning btn-sm"><i class="fas fa-images"></i></a>
                  <a href="<?=$url?>!/<?=$link[1]?>/editar/<? echo $row['land_id']?>" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></a>
                  <a href="<?=$url?>!/<?=$link[1]?>/deletar/<? echo $row['land_id']?>/titulo=<? echo $row['land_titulo']?>" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                </td>
              </tr>

              <?
            }
          }
          ?>

        </tbody>
      </table>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

