<?
		
		$cat = new CONNECT();
		$cat->SQL("SELECT * FROM videos_materias WHERE video_id = '".$link[5]."'");
		
		if( $link[6] == 'sim' ):
		
		
			excluir('videos_materias',   "video_id = '".$link[5]."'");
			echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/visualizar/'.$link[3].'/'.$link[4].'" />';
			
		
		elseif( $link[6] == 'nao' ):
		  
			echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/visualizar/'.$link[3].'/'.$link[4].'" />';
		
		endif;

?>

<h2 class="head">Deseja Excluir o V&iacute;deo - <small><?=$cat->exibi['video_titulo']?></small> ?</h2>


<hr>

<a class="btn btn-outline-danger"  href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/'.$link[5].'/sim'?>">Sim &bull; Deletar</a>
<a class="btn btn-outline-primary" href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/'.$link[5].'/nao'?>">N&atilde;o &bull; Cancelar</a>
