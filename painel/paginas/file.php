<?

$vis = new db();
$vis->query( "SELECT * FROM paginas WHERE pag_id = '".$link[3]."'" );
$vis->execute();
$row = $vis->object();

?>

<a class="btn btn-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>
<hr>

<h2 class="display-4 mb-3">Arquivos</h2>

<div class="card">
	<div class="card-body">
		<p>
			P&aacute;gina: <strong><? echo $row->pag_titulo?></strong>
		</p>
		<form action="<? echo $url.'!/'.$link[1].'/'.$link[2].'/'.$link[3]?>/enviar" method="post" enctype="multipart/form-data">
			<div class="input-group">
				<div class="custom-file">
					<label class="custom-file-label">selecione as fotos de seu computador</label>
					<input id="file" name="file" type="file" multiple required class="custom-file-input" accept="image/pdf" >
				</div>
				<div class="input-group-append"> 
					<input name="Enviar" type="submit" class="btn btn-success btn-envia" value="Enviar Arquivo" />
				</div>
			</div>
			<br>pdf
			<b>Limite de 5 imagens</b> por envio &bull; Somente Imagens (jpg) &bull; <? echo $__config->c_tamanho_image?> &bull; M&aacute;ximo 2MB
		</form>
	</div>
</div>


<? if( $link[4] == 'enviar' ){?>
	<legend>Enviando</legend>
	<?
	@mkdir( 'images', 0777 );
	@chmod( 'images', 0777 );
	$__pastaFotos = 'images/fotos-paginas/';
	@mkdir( $__pastaFotos, 0777 );
	@chmod( $__pastaFotos, 0777 );
	@mkdir( $__pastaFotos.'original', 0777 );
	@chmod( $__pastaFotos.'original', 0777 );
	@mkdir( $__pastaFotos.$link[3], 0777 );
	@chmod( $__pastaFotos.$link[3], 0777 );
	@mkdir( $__pastaFotos.$link[3].'/u', 0777 );
	@chmod( $__pastaFotos.$link[3].'/u', 0777 );

	if( !empty($_FILES['file']['name']) ){
		$_FILES['file']['name'] = md5($link[3]).'.'.@end(@explode('.', $_FILES['file']['name']));
		echo '<div>';
		if(move_uploaded_file($_FILES['file']['tmp_name'],$__pastaFotos.$link[3].'/u/'.$_FILES['file']['name'])){
			echo 'enviado com sucesso!';
		}else{
			echo "Erro no envio!";
		}
		echo '</div>';
	}
	?>
</div>
<? } ?>

<hr>
<!--Thumb-->    
<div class="row">
	<?
	$pastaId = 'images/fotos-paginas/'.$link[3];
	$pasta = $pastaId.'/u/';

	$arquivos = glob("$pasta{*.*}", GLOB_BRACE);

	foreach($arquivos as $img)
	{

		$nomeImagem = @end(@explode('/', $img));
		?>
		<div class="col-md-6">
			<div class="bg-dark text-white p-3">
				<div class="d-flex align-items-center">
					<div>
						<i class="fa fa-paperclip"></i> <?=$nomeImagem?>
					</div>
					<div class="ml-auto">
						<a href="<?=$url?>!/<?=$link[1]?>/deleta-imagem/<?=$link[3]?>/<?=$img?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
						<a href="<?=$url.$img?>" class="btn btn-success" target="_blank"><i class="fa fa-search-plus"></i></a>
					</div>
				</div>
			</div>
			<?php 
		}
		?>

	</div>   
