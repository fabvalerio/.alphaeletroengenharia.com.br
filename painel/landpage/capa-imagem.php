<?
if( $link[9] == 'sim' ){
	
	$edit = new db();
	$edit->query("UPDATE landpage SET land_capa = :land_capa WHERE land_id = :land_id");
	$edit->bind(':land_capa', $link[8]);
	$edit->bind(':land_id', $link[3]);

	if( $edit->execute() ){
		echo '<p class="badge-success p-3">Capa adicionada com sucesso!!</p>';
	}else{
		echo '<p class="badge-danger p-3">Ops, ocorreu um erro!!</p>';
	}

	echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/fotos/'.$link[3].'" />';
}elseif( $link[9] == 'nao' ){
	echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/fotos/'.$link[3].'" />';
}
?>

<a class="btn btn-warning" href="javascript:window.history.back()">Voltar</a>
<hr>

<h2 class="display-4 mb-4">Definir Imagem como Capa?</h2>

<h5 class="badge-warning p-3 mb-3"><i class="fas fa-exclamation-triangle"></i> Ao definir uma imagem como capa, é necessário selecionar outra imagem, para deletar</h5>

<div class="card">
	<div class="card-body text-center">
		<img src="<?=$url?><?=$link[4]?>/<?=$link[5]?>/<?=$link[6]?>/<?=$link[7]?>/<?=$link[8]?>" class="img-fluid" alt=""/>

		<div class="my-3">
			<a href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/'.$link[5].'/'.$link[6].'/'.$link[7].'/'.$link[8].'/sim'?>" class="btn-lg btn btn-success" />Sim</a>
			<a href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/'.$link[5].'/'.$link[6].'/'.$link[7].'/'.$link[8].'/nao'?>" class="btn-lg btn btn-danger" />N&atilde;o</a>
		</div>
	</div>
</div>