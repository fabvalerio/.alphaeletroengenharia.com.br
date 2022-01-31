<?

if( $link[4] == 'sim' ):

	
$__pastaFotos = 'images/fotos-paginas/';

$ids = @explode(',', $link[3]);


for( $i=0; $i<count($ids); $i++ ){

echo '<div class="alert alert-danger">Deletando ID['.$ids[$i].']</div>';
	
	@excluir('paginas'         , "pag_id        = '".$ids[$i]."'");
	@excluir('pagina_mapa'     , "pagm_pagina   = '".$ids[$i]."'");
	@excluir('videos_materias' , "video_materia = '".$ids[$i]."'");
}

for( $i=0; $i<count($ids); $i++ ){
	@apagar($__pastaFotos."/".$ids[$i]."/p" );
	@apagar($__pastaFotos."/".$ids[$i]."/m" );
	@apagar($__pastaFotos."/".$ids[$i]."/p" );
	@apagar($__pastaFotos."/".$ids[$i]."/original" );
}

echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/visualizar" />';

elseif( $link[4] == 'nao' ):
	
	echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/visualizar" />';

endif;

?>

<h2>Deseja realmente excluir <small>ID <? echo $link[3]?></small> ?</h2>

<hr>


<input class="btn btn-outline-primary" name="Sim" value="Sim" type="button" onclick="javascript:url('<?='!/'.$link[1].'/'.$link[2].'/'.$link[3].'/sim'?>');" />
<input class="btn btn-outline-danger" name="Nao" value="N&atilde;o &bull; Voltar" type="button" onclick="javascript:url('<?='!/'.$link[1].'/'.$link[2].'/'.$link[3].'/nao'?>');" />
