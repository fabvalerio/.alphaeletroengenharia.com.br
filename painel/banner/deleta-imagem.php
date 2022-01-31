<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
         $ativeMenu( "#products" ).addClass( "show" );
  });
</script>

<?
		
		
		if( $link[9] == 'sim' ):
		
		
			@unlink($link[4]."/".$link[5]."/".$link[6]."/u/".$link[8]); // Deletar
			echo '<meta http-equiv="refresh" content="0;URL='.$url.'!/'.$link[1].'/fotos/'.$link[3].'" />';
			
		
		elseif( $link[9] == 'nao' ):
		  
			echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/fotos/'.$link[3].'" />';
		
		endif;

?>

<h2 class="head">Banner &bull; <span>Excluir Imagem</h2>

<hr>


<div class="col-sm-4 col-md-4 text-xs-center">
<div style="margin:15px;" class="thumbnail"><img src="<?=$url?><?=$link[4]?>/<?=$link[5]?>/<?=$link[6]?>/<?=$link[7]?>/<?=$link[8]?>" width="" height="200" alt=""/> </div>

<p align="center">
<a href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/'.$link[5].'/'.$link[6].'/'.$link[7].'/'.$link[8].'/sim'?>" class="btn btn-outline-success" />Sim</a>
<a href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/'.$link[5].'/'.$link[6].'/'.$link[7].'/'.$link[8].'/nao'?>" class="btn btn-outline-danger" />N&atilde;o</a>
</p>
</div>