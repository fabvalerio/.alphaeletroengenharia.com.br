<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
    $ativeMenu( "#products" ).addClass( "in show" );
  });
</script>


<?
		
		
		if( $link[9] == 'sim' ):
		
		
			@unlink($link[4]."/".$link[5]."/".$link[6]."/p/".$link[8]); // Deletar
			@unlink($link[4]."/".$link[5]."/".$link[6]."/m/".$link[8]); // Deletar
			@unlink($link[4]."/".$link[5]."/".$link[6]."/g/".$link[8]); // Deletar
			echo '<meta http-equiv="refresh" content="0;URL='.$url.'!/'.$link[1].'/fotos/'.$link[3].'" />';
			
		
		elseif( $link[8] == 'nao' ):
		  
			echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/fotos/'.$link[3].'" />';
		
		endif;

?>
<a class="btn btn-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>

<hr>

<h2 class="head">Texto &bull; <span>Excluir Imagem<span></span></span></h2>


<div class="col-sm-4 col-md-3">
<div style="margin:15px;" class="thumbnail"><img src="<?=$url?><?=$link[4]?>/<?=$link[5]?>/<?=$link[6]?>/<?=$link[7]?>/<?=$link[8]?>" width="" height="300" alt=""/> </div>

<p align="center">
<a href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/'.$link[5].'/'.$link[6].'/'.$link[7].'/'.$link[8].'/sim'?>" class="btn btn-success" />Sim</a>
<a href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/'.$link[5].'/'.$link[6].'/'.$link[7].'/'.$link[8].'/nao'?>" class="btn btn-danger" />N&atilde;o</a>
</p>
</div>