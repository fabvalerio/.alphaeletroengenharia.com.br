
<?

$InputSQL = new db();
$InputSQL->query( "SELECT * FROM css ORDER BY css_titulo ASC" );
$InputSQL->execute();

?>
<a class="btn btn-outline-success" href="<? echo $url?>!/<? echo $link[1]?>/cadastro">Novo LESS/CSS</a>

<hr>

<h2 class="display-4 mb-3">CSS/LESS<small> (<? echo $InputSQL->rowCount()?>)</small></h2>

<div class="card">
  <div class="card-body">

    <table class="table table-striped table-hover" id="dataTables">
      <thead>
        <tr class="success">
          <th width="20">ID</th>
          <th>T&iacute;tulo</th>
          <th width="100" align="right"></th>
        </tr>
      </thead>
      <tbody>

        <?
        if( !empty($InputSQL->row()) ){
          foreach( $InputSQL->row() AS $row ){
            ?>  
            <tr class="odd gradeX text-center">
              <td><? echo $row['css_id'];?></td>
              <td class="text-left"><? echo $row['css_titulo']?></td>
              <td align="right" >
                <a href="<? echo $url?>!/<? echo $link[1]?>/editar/<? echo $row['css_id']?>" class="btn btn-sm btn-outline-success<? echo $block?>"><i class="fas fa-edit"></i></a>
                <a href="<? echo $url?>!/<? echo $link[1]?>/deletar/<? echo $row['css_id']?>" class="btn btn-sm btn-outline-danger<? echo $block?>"><i class="far fa-trash-alt"></i></a>
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
