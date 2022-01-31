<?
	if( $link[5] == 'envio' ):
	
			cadastro('videos_materias');
			echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/visualizar/'.$link[3].'/'.$link[4].'" />';

	endif;
 
   
?>

<h2 class="head">Cadastro de V&iacute;deos (YOUTUBE)</h2>

<hr>
<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar/<?=$link[3]?>/<?=$link[4]?>">Voltar</a>

<hr>

<form enctype="multipart/form-data" action="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4]?>/envio" method="post">
<table class="table table-bordered">
  <tr class="success">
    <th width="100" valign="middle">T&iacute;tulo</th>
    <td valign="middle"><input class="form-control" name="video_titulo" type="text" autofocus id="video_titulo" autocomplete="off" maxlength="200" />
      <p>M&aacute;ximo 200 Caracteres</p></td>
  </tr>
  <tr>
    <th>Status</th>
    <td><select class="form-control"  name="video_status" id="video_status">
      <option value="1" selected="selected">Ativo</option>
      <option value="0">Inativo</option>
      </select></td>
  </tr>
  <tr>
    <th>URL</th>
    <td>
    <input class="form-control"  name="video_url" type="text" autofocus id="video_url" autocomplete="off" />
      <p class="text-danger"> <strong>ERRADO:</strong> https://www.youtube.com/watch?v=lyH918YyMsk<s>&t=1794s</s></p>
      <p class="text-success"> <strong>CORRETO:</strong> https://www.youtube.com/watch?v=lyH918YyMsk</p>
    </td>
  </tr>
  <tr>
    <th>Texto</th>
    <td><textarea class="form-control"  name="video_texto" id="video_texto"></textarea></td>
  </tr>
  <tr>
    <td colspan="2">
    	<input class="btn btn-outline-primary"  type="submit" name="Enviar" id="Enviar" value="Enviar" />
    	<input type="hidden" name="video_tabela" id="video_tabela" value="<?=$link[3]?>">
    	<input type="hidden" name="video_materia" id="video_materia" value="<?=$link[4]?>">
    </td>
  </tr>
</table>
</form>
