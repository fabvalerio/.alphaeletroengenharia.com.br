<?
		
		$cat = new CONNECT();
		$cat->SQL("SELECT * FROM textos WHERE tex_id = '".$link[3]."'");
		
		if( $link[4] == 'sim' ):
		
		
			excluir('textos',   "tex_id = '".$link[3]."'");
			echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/visualizar" />';
			
		
		elseif( $link[4] == 'nao' ):
		  
			echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/visualizar" />';
		
		endif;

?>

<h2>Deseja excluir o texto da p&aacute;gina <small><?=$cat->exibi['tex_titulo']?></small> ?</h2>


<div class="box-btns">
<a class="btn btn-warning" href="javascript:window.history.back()" style="background:#FFB600 !important; text-decoration:none">Voltar</a>
</div>

<br><br>

<input class="btn btn-primary" name="Sim" value="Sim" type="button" onclick="javascript:url('<?='!/'.$link[1].'/'.$link[2].'/'.$link[3].'/sim'?>');" />
<input class="btn btn-danger" name="Nao" value="N&atilde;o" type="button" onclick="javascript:url('<?='!/'.$link[1].'/'.$link[2].'/'.$link[3].'/nao'?>');" />
