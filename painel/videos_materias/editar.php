
<?
 if( $link[6] == 'envio' ):
		
		editar('videos_materias', 'video_id', $link[5]);
		echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/visualizar/'.$link[3].'/'.$link[4].'" />';

endif;

$edi = new CONNECT();
$edi->SQL( "SELECT * FROM videos_materias WHERE video_id = '".$link[5]."'" );

 
?>

<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar/<?=$link[3]?>/<?=$link[4]?>">Voltar</a>

<hr>

<h2 class="head">Editar V&iacute;deo</h2>

<form enctype="multipart/form-data" action="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/'.$link[5]?>/envio" method="post">
<table class="table table-bordered">
  <tr>
    <th width="100" valign="middle">Videos</th>
    <td valign="middle"><input class="form-control" name="video_titulo" type="text" autofocus id="video_titulo" autocomplete="off" value="<?=$edi->exibi['video_titulo']?>" size="60" maxlength="200" /> 
      <p>M&aacute;ximo 200 Caracteres</p></td>
    </tr>
  <tr>
    <th>Status</th>
    <td><select class="form-control" name="video_status" id="video_status">
      <option value="1" <?=select('1', '1', $edi->exibi['video_status']);?>>Ativo</option>
      <option value="0" <?=select('1', '0', $edi->exibi['video_status']);?>>Inativo</option>
      </select></td>
  </tr>
  <tr>
    <th>URL</th>
    <td><input class="form-control" name="video_url" type="text" autofocus id="video_url" autocomplete="off" size="60" value="<?=$edi->exibi['video_url']?>" /> 
      <p class="text-danger"> <strong>ERRADO:</strong> https://www.youtube.com/watch?v=lyH918YyMsk<s>&t=1794s</s></p>
      <p class="text-success"> <strong>CORRETO:</strong> https://www.youtube.com/watch?v=lyH918YyMsk</p>
     </td>
  </tr>
  <tr>
    <th>Texto</th>
    <td><textarea class="form-control" name="video_texto" id="video_texto"><?=$edi->exibi['video_texto']?></textarea></td>
  </tr>
  <tr>
    <td colspan="2">
      <input class="btn btn-outline-primary" type="submit" name="Enviar" id="Enviar" value="Enviar" />
      <input type="hidden" name="video_id" value="<?=$edi->exibi['video_id']?>">
    	<input type="hidden" name="video_tabela" id="video_tabela" value="<?=$link[3]?>">
    	<input type="hidden" name="video_materia" id="video_materia" value="<?=$link[4]?>">
      </td>
  </tr>
</table>
</form>
