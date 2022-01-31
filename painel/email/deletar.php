<?
		
		$cat = new CONNECT();
		$cat->SQL("SELECT * FROM email WHERE mail_id = '".$link[3]."'");
		
		if( $link[4] == 'sim' ):
		
		
			excluir('email',   "mail_id = '".$link[3]."'");
			echo '<meta http-equiv="refresh" content="0;URL='.$url.'!/'.$link[1].'/visualizar" />';
			
		
		elseif( $link[4] == 'nao' ):
		  
			echo '<meta http-equiv="refresh" content="0;URL='.$url.'!/'.$link[1].'/visualizar" />';
		
		endif;

?>

<h2>Deseja Excluir <small><?=$cat->exibi['mail_email']?></small> ?</h2>




<hr>


<a class="btn btn-outline-danger"  href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/sim'?>">Deletar</a>
<a class="btn btn-outline-warning" href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/nao'?>">Cancelar</a>
