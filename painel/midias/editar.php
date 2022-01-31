<?

if( $link[4] == 'envio' ):


    editar("midias", 'midia_id', $link[3]);
		
		echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/visualizar" />';

endif;



$edi = new CONNECT();
$edi->SQL( "SELECT * FROM midias WHERE midia_id = '".$link[3]."'" );

?>

<h2>Midia &bull; Editar</h2>


<hr>

<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>

<hr>

<form enctype="multipart/form-data" action="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3]?>/envio" method="post">
<table class="table table-bordered">
  <tr class="success">
    <th width="200" valign="middle">Link</th>
    <td valign="middle">
      <input class="form-control" name="midia_link" type="text" autofocus id="midia_link" autocomplete="off" value="<?=$edi->exibi['midia_link']?>" size="60" maxlength="200" /></td>
    </tr>
  <tr>
    <th>Tipo</th>
    <td bgcolor="#FFFFFF">
    <select name="midia_tipo" id="select" class="form-control">
      <?=option('midias_tipo', 'midia_nome', 'midias_tipo_id', '', $edi->exibi['midia_tipo'])?>
    </select>
    </td>
  </tr>

    
  <tr>
    <td colspan="2">
      <input type="submit" name="Enviar" id="Enviar" value="Enviar" class="btn btn-outline-success"/>
      <input type="hidden" name="midia_id" id="midia_id" value="<?=$link[3]?>">
    </td>
  </tr>
</table>
</form>
