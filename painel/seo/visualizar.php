<?

//seos Produtos
$vis = new db();
$vis->query( "SELECT * FROM seo ORDER BY seo_pagina ASC" );
$vis->execute();

?>

<? include('php/#conf-tabela.php');?>

<div id="wrapper">
  <!-- Navigation -->
  <div id="page-wrapper2">

    <div class="row d-flex align-items-center">
      <div class="col-sm-6"><h2 class="display-4">Editar SEO<span> (<? echo $vis->rowCount()?>)</span></h2></div>
      <div class="col-sm-6 text-sm-right"><a class="btn btn-outline-success" href="<? echo $url?>!/<? echo $link[1]?>/cadastro"><i class="fas fa-plus-circle"></i> Novo cadastro</a></div>
    </div>

    <hr>

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover" id="dataTables-example">
              <thead>
                <tr class="success">
                  <th width="50">ID</th>
                  <th width="150">P&aacute;gina</th>
                  <th>T&iacute;tulo</th>
                  <th width="100" align="right"></th>
                </tr>
              </thead>
              <tbody>

                <?
                foreach( $vis->row() AS $row ){
                  ?>
                  <tr class="odd gradeX">
                    <td><? echo $row['seo_id']?></td>
                    <td><? echo $row['seo_pagina']?></td>
                    <td><? echo $row['seo_titulo']?></td>
                    <td align="right" >
                      <a href="<? echo $url?>!/<? echo $link[1]?>/editar/<? echo $row['seo_id']?>" class="btn btn-outline-success btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                      <a href="<? echo $url?>!/<? echo $link[1]?>/deletar/<? echo $row['seo_id']?>&titulo=<? echo $row['seo_titulo']?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-fw fa-times"></i></a>
                    </td>
                  </tr>
                  <?
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

