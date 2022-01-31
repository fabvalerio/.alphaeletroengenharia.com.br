<?
 if( $link[4] == 'lido' ) {		
		$editar = new db();
		$editar->query( "UPDATE contatos SET cont_status = :cont_status WHERE cont_id = :cont_id" );
    $editar->bind(':cont_status', '1');
    $editar->bind(':cont_id', $link[3]);
    $editar->execute();
		echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/visualizar" />';
}

$edi = new db();
$edi->query( "SELECT * FROM contatos WHERE cont_id = '".$link[3]."'" );
$edi->execute();
$row = $edi->object();

?>

<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>
<? if( empty($row->cont_status) ):?>
<a class="btn btn-outline-info" href="<?=$url?>!/<?=$link[1]?>/<?=$link[2]?>/<?=$link[3]?>/lido">Confirma Leitura</a>
<? endif;?>

<hr>

<h2 class="display-4 mb-3">Visualizar Email</h2>

<table class="table table-bordered">
  <tr>
    <th width="100" valign="middle">Data</th>
    <td valign="middle"><?=$row->cont_data?></td>
    </tr>
  <tr>
    <th>E-mail</th>
    <td><?=$row->cont_email?></td>
  </tr>
  <tr>
    <th>Assunto</th>
    <td><?=$row->cont_assunto?></td>
  </tr>
  <tr>
    <th>Texto</th>
    <td><?=nl2br($row->cont_descricao)?></td>
  </tr>
</table>
