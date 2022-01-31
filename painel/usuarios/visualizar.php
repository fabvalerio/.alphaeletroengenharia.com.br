<?

$InputSQL = new db();
$InputSQL->query( "SELECT * FROM usuario WHERE user_id != '1' ORDER BY user_email ASC" );
$InputSQL->execute();

?>

<a class="btn btn-outline-success" href="<? echo $url?>!/<? echo $link[1]?>/cadastro">Novo cadastro</a>
<hr>
<h2 class="display-4 mb-3">Usu&aacute;rio <span>Lista (<? echo $InputSQL->rowCount()?>)</span></h2>

<div class="card">
  <div class="card-body">
    <table class="table table-striped table-hover" id="dataTables-example">
      <thead>
        <tr>
          <th>ID</th>
          <th>Email</th>
          <th class="text-md-center">Status</th>
          <th width="110" align="right"></th>
        </tr>
      </thead>
      <tbody>
        <?
        if( !empty($InputSQL->row()) ){
          foreach( $InputSQL->row() AS $row ){
            ?>
            <tr class="odd gradeX">
              <td><? echo $row['user_id']?></td>
              <td><? echo $row['user_email']?></td>
              <td class="text-md-center"><? echo status($row['user_status'])?></td>
              <td align="right" >
                <a href="<? echo $url?>!/<? echo $link[1]?>/editar/<? echo $row['user_id']?>" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></a>
                <a href="<? echo $url?>!/<? echo $link[1]?>/deletar/<? echo $row['user_id']?>" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></a>
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

