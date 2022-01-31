<?
	    if( $link[3] == 'envio' ):
		
		
		  $verificar = new CONNECT();
		  $verificar->SQL( "SELECT * FROM midias WHERE midia_link = '".$_POST['midia_link']."' AND midia_tipo = '".$_POST['midia_tipo']."'" );
			
		  if( empty($verificar->num_linha) ):
		  
				cadastro('midias');
				echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/cadastro" />';
          else:
			   
			   echo ERRO("Cadastro existente!!");
			
		   endif;


		endif;
    ?>

<h2>Cadastro &bull; Midia</h2>

<hr>

<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>

<hr>

<form enctype="multipart/form-data" action="<?=$url.'!/'.$link[1].'/'.$link[2]?>/envio" method="post">
<table class="table table-bordered">
  <tr class="success">
    <th width="200">Link</th>
    <td valign="middle"><input class="form-control" name="midia_link" type="text" autofocus id="midia_link" maxlength="200" /></td>
    </tr>
  <tr>
    <th>Tipo</th>
    <td bgcolor="#FFFFFF">
    <select name="midia_tipo" id="select" class="form-control">
      <?=option('midias_tipo', 'midia_nome', 'midias_tipo_id', '', '')?>
    </select>
    </td>
  </tr>

 

  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><input type="submit" name="Enviar" id="Enviar" value="Enviar" class="btn btn-outline-success" /></td>
  </tr>
</table>
</form>
