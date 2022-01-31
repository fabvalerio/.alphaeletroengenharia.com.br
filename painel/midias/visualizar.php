<?



//Categorias Produtos
$InputSQL = new db();
$InputSQL->query( "SELECT * FROM midias ORDER BY midia_id ASC" );
$InputSQL->execute();

?>

<a class="btn btn-outline-success" href="<?=$url?>!/<?=$link[1]?>/cadastro">Novo cadastro</a>

<hr>

<h2>M&iacute;dias Sociais<small> (<?=$InputSQL->num_linha?>)</small></h2>


    <div id="wrapper">

        <!-- Navigation -->
        

        <div id="page-wrapper2">
            <div class="row">
                <div class="col-lg-12">

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <tr class="success">
                          <th width="20">ID</th>
                          <th>Midia</th>
                          <th>Link</th>
                          <th width="100" align="right"></th>
                        </tr>
                      </thead>
                      <tbody>
                      
                       <?
                        foreach( $InputSQL->row() AS $row )
                        {
                        ?>
                        
                        <tr class="odd gradeX">
                          <td><? echo $row['midia_id']?></td>
                          <td><? echo $row['midia_nome']?> &bull; <i class="fa <? echo $row['midia_ico']?>"></i></td>
                          <td><? echo $row['midia_link']?></td>
                          
                          <td align="right" >
                              <a href="<?=$url?>!/<?=$link[1]?>/editar/<? echo $row['midia_id']?>" class="btn btn-sm btn-outline-success"><i class="fa fa-pencil"></i></a>
                              <a href="<?=$url?>!/<?=$link[1]?>/deletar/<? echo $row['midia_id']?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                       
                       
                        <?
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


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    var $tabelas = jQuery.noConflict(); 
    $tabelas(document).ready(function() {

        $tabelas('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

