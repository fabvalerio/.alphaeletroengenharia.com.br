<script>
  var $ativeMenu = jQuery.noConflict(); 
  $ativeMenu(document).ready(function(){
    $ativeMenu( "#products" ).addClass( "in show" );
  });
</script>

<?
$fotos = new db();
$fotos->query( "SELECT * FROM pagina_home WHERE pag_extra_id = '".$link[3]."'" );
$fotos->execute();
$vis = $fotos->object();

include('assets/js/wideimage/lib/WideImage.php');
?>
<a class="btn btn-outline-warning" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Voltar</a>
<hr>
<h2 class="display-4 mb-3">Fotos &bull; P&aacute;gina home</h2>

<div class="card">
	<div class="card-body">
		<p>
			P&aacute;gina: <strong><? echo $vis->pag_extra_titulo?></strong>
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
	<fieldset>
		<legend>Enviando</legend>
		<div>
			<?
		//criar pasta
			@mkdir( 'images', 0777 );
			@chmod( 'images', 0777 );
			$__pastaFotos = 'images/fotos-pagina_home/';
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
					// Carrega a imagem de um arquivo
						$img = WideImage::load($__pastaFotos.$link[3].'/g/'.$_FILES['file']['name'][$i]);
					// Redimensiona a imagem para caber em um quadrado
						$img = $img->resize(600, 600, 'inside');
						$img->saveToFile($__pastaFotos.$link[3].'/p/'.$_FILES['file']['name'][$i]);
						$img = $img->resize(800, 800, 'inside');
						$img->saveToFile($__pastaFotos.$link[3].'/m/'.$_FILES['file']['name'][$i]);
					// Limpa a imagem da memória
						$img->destroy();
					}else{
						echo "Erro no envio!";
					}
					echo '</div>';
				}
			}
			?>
		</div>
	</fieldset>
<? 
}
?>


<!--Thumb-->    
<h3 class="py-3">Imagens enviadas</h3>
<div class="row">
	<?
	$pastaId = 'images/fotos-pagina_home/'.$link[3];
	$pasta = $pastaId.'/p/';
	$arquivos = glob("$pasta{*.jpg,*.png,*.gif}", GLOB_BRACE);
	foreach($arquivos as $img)
	{
		?>
		<div class="col-sm-6 col-md-2">
			<div class="card p-1">
				<div class="capa" style="background-image:url('<? echo $url.$img;?>'); height:100px;"></div>
				<p>
					<hr>
					<a href="<? echo $url?>!/<? echo $link[1]?>/deleta-imagem/<? echo $link[3]?>/<? echo $img?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
				</p>
			</div>
		</div>
		<?php 
	}
	?>

</div>   
