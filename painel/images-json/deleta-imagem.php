<script>
	var $ativeMenu = jQuery.noConflict(); 
	$ativeMenu(document).ready(function(){
		$ativeMenu( "#products" ).addClass( "show" );
	});
</script>

<?


if( $link[5] == 'sim' ):
	
	
			@unlink($link[3]."/".$link[4]); // Deletar
		echo '<meta http-equiv="refresh" content="0;URL='.$url.'!/'.$link[1].'/fotos/'.$link[3].'" />';
		
		
		elseif( $link[5] == 'nao' ):
			
			echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/fotos/'.$link[3].'" />';
		
		endif;

		?>
		<a class="btn btn-warning" href="<?=$url?>!/<?=$link[1]?>/fotos">Voltar</a>

		<hr>

		<h2 class="head">Excluir Imagem</h2>


		<div class="col-sm-4 col-md-4">
			<div style="margin:15px;" class="thumbnail"><img src="<?=$url?><?=$link[3]?>/<?=$link[4]?>" width="" height="" alt=""/> </div>

			<p align="center">
				<a href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/sim'?>" class="btn btn-success" />Sim</a>
				<a href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/nao'?>" class="btn btn-danger" />N&atilde;o</a>
			</p>
		</div>