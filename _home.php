<?


/* ***************************************************** */
/*  PÀGINAS EXTRAS */
$pag_extras =  new db();
$pag_extras->query( "SELECT * FROM pagina_home ORDER BY pag_extra_order, pag_extra_id ASC" );
$pag_extras->execute();

foreach( $pag_extras->row() AS $row ){
	if( !empty( $row['pag_extra_id'] ) ){
		?>
		<section class="extra-home" id="home-<? echo $row['pag_extra_id']; ?>" style="background-image: url('<? echo $row['pag_extra_background'] ?>');">
			<?



			$caracteres_atual = array( '&nbsp;', '../../../', '<p></p>' );
			$caracteres_pos = array( '', $url.'painel/', '' );
			

		if( strstr($row['pag_extra_texto'], "{{") ){
			/* LISTAR INCLUDES */
			$str_Includes_Direct = 'includes_srt_replace/';
			$str_Includes = glob("$str_Includes_Direct{*.php}", GLOB_BRACE);

			if( !empty($str_Includes) ){
				foreach($str_Includes as $files){
					$caracteres_atual[] = "{{".substr(@end(@explode('/', $files)), 0, -4)."}}";
					$caracteres_pos[] = file_get_contents($files);
				}
			}
		}
		
		
			echo str_replace($caracteres_atual, $caracteres_pos, stripslashes(trim($row['pag_extra_texto']))); 

  			/* *********** GALERIA DE FOTOS */
			$pasta = 'painel/images/fotos-pagina_home/'.$row['pag_extra_id'].'/';
			$pasta_grid = 'p/';
			$pasta_zoom = 'g/';

  			/* selecionar só imagens */
			$imagens = glob($pasta.$pasta_grid."*.jpg");

			if( (!empty($imagens)) ){
				?>
				<div class="container-fluid galeria mt-4">
					<div class="row justify-content-md-center">
						<? 
						foreach($imagens as $img){
							?>
							<div class="col col-lg-2 col-md-3 col-sm-4 col-12 p-sm-0 p-xs-2 hvr-grow">
								<a href="<? echo $url.str_replace($pasta_grid, $pasta_zoom, $img); ?>" data-fancybox="images-single" data-title="">
									<!-- <img src="<?=$url.$img;?>" alt="" class="img-fluid"> -->
									<div class="capa no-boerder-radius" style="background-image: url(<?=$url.$img;?>); height: 200px;"></div>
								</a>
							</div>
							<? } ?>
						</div>
					</div>
					<?
				}
				?>
			</section>
			<?
		}
	}

	?>
