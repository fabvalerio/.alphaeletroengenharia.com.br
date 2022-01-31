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
$InputSQL->query( "SELECT * FROM textos ORDER BY tex_id ASC" );
$InputSQL->execute();

if(  $jsonConf->c_texto == '1' ){
  ?>
  <a class="btn btn-outline-success" href="<? echo $url?>!/<? echo $link[1]?>/cadastro">Novo cadastro</a>
  <hr>
  <? 
}else{    
  $block = 'disabled';
}
?>

<h2 class="display-4 mb-3">P&aacute;ginas com Textos <small>(<? echo $InputSQL->rowCount()?>)</small></h2>

<div class="card">
  <div class="card-body">
    <table class="table table-striped table-hover" id="dataTables-example">
      <thead>
        <tr>
          <th width="20">ID</th>
          <th>T&iacute;tulo</th>
          <th>Implanta&ccedil;&atilde;o</th>
          <th width="140" align="right"></th>
        </tr>
      </thead>
      <tbody>
       <?
       if( !empty($InputSQL->row()) ){
        foreach( $InputSQL->row() AS $row ){
          ?>
          <tr class="odd gradeX">
            <td><? echo $row['tex_id']?></td>
            <td><? echo $row['tex_titulo']?></td>
            <td>[[texto-<? echo $row['tex_id']?>]]</td>
            <td width="150" class="text-right">
              <a href="<? echo $url?>!/<? echo $link[1]?>/editar/<? echo $row['tex_id']?>" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></a>
              <a  href="<? echo $url?>!/<? echo $link[1]?>/deletar/<? echo $row['tex_id']?>" class="btn btn-outline-danger btn-sm <? echo $block?> <? if( $row['tex_id'] <= 4 ) echo 'disabled' ?>"><i class="far fa-trash-alt"></i></a>
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

