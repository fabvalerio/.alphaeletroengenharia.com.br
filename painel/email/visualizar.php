<?
$vis = new db();
$vis->query( "SELECT * FROM email ORDER BY mail_email ASC" );
$vis->execute();
?>

<h2 class="display-4 mb-3">Configuração de Email<small> (<? echo $vis->rowCount()?>)</small></h2>

<hr>
<div class="card">
  <div class="card-body">

    <table class="table table-striped table-hover" id="dataTables-example">
      <thead>
        <tr>
          <th width="20">ID</th>
          <th>Email</th>
          <th width="220" align="right"></th>
        </tr>
      </thead>
      <tbody>
        <?
        if( !empty($vis->row()) ){
          foreach( $vis->row() AS $row ){
            ?>

            <tr class="odd gradeX text-center">
              <td><? echo $row['mail_id']?></td>
              <td class="text-left"><? echo $row['mail_email']?></td>
              <td align="right" >
                <a target="_new" href="<? echo $url?>/email/teste.php" class="btn btn-sm btn-outline-info btn-md"><i class="fas fa-envelope-open-text"></i></a>
                <a href="<? echo $url?>!/<? echo $link[1]?>/editar/<? echo $row['mail_id']?>" class="btn btn-sm btn-outline-success btn-md"><i class="fas fa-edit"></i></a>
                <a href="<? echo $url?>!/<? echo $link[1]?>/deletar/<? echo $row['mail_id']?>" class="btn btn-sm btn-outline-danger btn-md"><i class="fas fa-trash-alt"></i></a>
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
