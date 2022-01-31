<?

//videoss Produtos
$InputSQL = new CONNECT();
$InputSQL->SQL( "SELECT * FROM videos_materias WHERE video_tabela = '".$link[3]."' AND video_materia = '".$link[4]."' ORDER BY video_titulo ASC" );


?>

<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[3]?>/visualizar">Voltar</a>
<a class="btn btn-outline-success" href="<?=$url?>!/<?=$link[1]?>/cadastro/<?=$link[3]?>/<?=$link[4]?>">Novo cadastro</a>

<hr>

<h2 class="head">V&iacute;deos <small>(<?=$InputSQL->num_linha?>)</small></h2>


<div id="wrapper">


  <div id="page-wrapper2">
    <div class="row">
      <div class="col-lg-12">

        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr class="success">
              <th width="50">ID</th>
              <th>T&iacute;tulo</th>
              <th width="100">Status</th>
              <th width="150" align="right"></th>
            </tr>
          </thead>
          <tbody>

            <?
            do
            {
              if( !empty($InputSQL->exibi['video_id']) ){
                ?>

                <tr class="odd gradeX">
                  <td><?=$InputSQL->exibi['video_id']?></td>
                  <td><?=$InputSQL->exibi['video_titulo']?></td>
                  <td><?=status($InputSQL->exibi['video_status'])?></td>
                  <td align="right" >
                    <a href="<?=$url.$link[1]."/play.php?url=".$InputSQL->exibi['video_url']?>" class="btn btn-sm btn-outline-info yframe"><i class="fa fa-play-circle"></i></a>
                    <a href="<?=$url?>!/<?=$link[1]?>/editar/<?=$link[3]?>/<?=$link[4]?>/<?=$InputSQL->exibi['video_id']?>" class="btn btn-sm btn-outline-success"><i class="fa fa-pencil"></i></a>
                    <a href="<?=$url?>!/<?=$link[1]?>/deletar/<?=$link[3]?>/<?=$link[4]?>/<?=$InputSQL->exibi['video_id']?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-times"></i></a>
                  </td>
                </tr>


                <?
              }
            } 
            while( $InputSQL->exibi = mysql_fetch_assoc( $InputSQL->result ) );
            $InputSQL->FECHAR();	
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
