<?

$vis = new db();
$vis->query( "SELECT * FROM landpage WHERE land_id = '".$link[3]."'" );
$vis->execute();
$row = $vis->object();

include('assets/js/wideimage/lib/WideImage.php');

?>
<a class="btn btn-outline-warning" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Voltar</a>
<? echo $alertOrdenacao ?>

<hr>

<h2 class="display-4 mb-3">Fotos &bull; Itens</h2>

<div class="card">
	<div class="card-body">
		<p>
			P&aacute;gina: <strong><? echo $row->land_titulo?></strong>
		</p>
		<legend>Quantidade de fotos: Ilimitados</legend>
		<form action="<? echo $url.'!/'.$link[1].'/'.$link[2].'/'.$link[3]?>/enviar" method="post" enctype="multipart/form-data">
			<div class="input-group">
				<div class="custom-file">
					<label class="custom-file-label">selecione as fotos de seu computador</label>
					<input id="file" name="file[]" type="file" multiple required class="custom-file-input" accept="image/jpeg, image/png, image/gif" >
				</div>
				<div class="input-group-append"> 
					<input name="Enviar" type="submit" class="btn btn-success btn-envia" value="Enviar Arquivo" />
				</div>
			</div>
			<br>
			<b>Limite de 5 imagens</b> por envio &bull; Somente Imagens (jpg) &bull; <? echo $__config->c_tamanho_image?> &bull; M&aacute;ximo 2MB
		</form>
	</div>
</div>

<? if( $link[4] == 'enviar' ){ ?>
	<h2 class="lead my-3">Enviando</h2>
	<div>
		<?
		@mkdir( 'images', 0777 );
		@chmod( 'images', 0777 );
		$__pastaFotos = 'images/fotos-landpage/';
		@mkdir( $__pastaFotos, 0777 );
		@chmod( $__pastaFotos, 0777 );
		@mkdir( $__pastaFotos.'original', 0777 );
		@chmod( $__pastaFotos.'original', 0777 );
		@mkdir( $__pastaFotos.$link[3], 0777 );
		@chmod( $__pastaFotos.$link[3], 0777 );
		@mkdir( $__pastaFotos.$link[3].'/p', 0777 );
		@chmod( $__pastaFotos.$link[3].'/p', 0777 );
		@mkdir( $__pastaFotos.$link[3].'/m', 0777 );
		@chmod( $__pastaFotos.$link[3].'/m', 0777 );
		@mkdir( $__pastaFotos.$link[3].'/g', 0777 );
		@chmod( $__pastaFotos.$link[3].'/g', 0777 );
		
		for( $i=0; $i<count($_FILES['file']); $i++ ){
			if( !empty($_FILES['file']['name'][$i]) ){
				$_FILES['file']['name'][$i] = md5($_FILES['file']['name'][$i]).'.'.@end( @explode('.', $_FILES['file']['name'][$i]) );
				echo '<div>';
				if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $__pastaFotos.$link[3].'/g/'.$_FILES['file']['name'][$i]))
				{
					echo ($i+1).'-'.$_FILES['file']['name'][$i];
					$img = WideImage::load($__pastaFotos.$link[3].'/g/'.$_FILES['file']['name'][$i]);
					$img = $img->resize(600, 600, 'inside');
					$img->saveToFile($__pastaFotos.$link[3].'/p/'.$_FILES['file']['name'][$i]);
					$img = $img->resize(800, 800, 'inside');
					$img->saveToFile($__pastaFotos.$link[3].'/m/'.$_FILES['file']['name'][$i]);
					$img->destroy();
				}else{
					echo "Erro no envio!";
				}
				echo '</div>';
			}
		}
		?>
	</div>
<? } ?>


<!--Thumb-->    
<div class="row my-3">

	<?
	$pastaId = 'images/fotos-landpage/'.$link[3];
	$pasta = $pastaId.'/p/';
	$arquivos = glob("$pasta{*.jpg,*.png,*.gif}", GLOB_BRACE);
	foreach($arquivos as $img)
	{
		$nomeImagem = '/g/'.@end( @explode('/', $img) );
		?>
		<div class="col-sm-6 col-md-2">
			<div class="card">
			<div class="card-body text-center">
				<a href="<? echo $url.$pastaId.$nomeImagem; ?>" class="thumbnail group3">
					<div class="capa" style="background-image:url('<? echo $url.$img;?>'); height:100px;"></div>
				</a>
				<p align="center">
					<hr>
					<? 
					$nameImagem = @end( @explode('/', $img) );
					if( $row->land_capa != $nameImagem ){
						$imagemName = @end( @explode( '/', $img ) );
						?>
						<a href="<? echo $url?>!/<? echo $link[1]?>/deleta-imagem/<? echo $link[3]?>/<? echo $img?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
						<a href="<? echo $url?>!/<? echo $link[1]?>/capa-imagem/<? echo $link[3]?>/<? echo $img?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
						<? 
					}else{
						$imagemName = @end( @explode( '/', $img ) );
						?>
						<a class="btn btn-info"><i class="fa fa-eye"></i></a>
						<?
					}
					?>
				</p>
			</div>
			</div>
		</div>
		<?php 
	}
	?>
</div>   

<div class="row">
	<div class="col-md-12">
		<b>Legenda</b>
	</div>   
	<div class="col-md-3 col-sm-3 text-danger"> <i class="fa fa-times"></i> Deletar</div>
	<div class="col-md-3 col-sm-3 text-primary"> <i class="fa fa-eye"></i> Imagem capa</div>

</div>

<hr>
