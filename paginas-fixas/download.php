<?

if( $_SESSION['down'] == 'ativo' ){


	$down_folder = "painel/images/fotos-paginas/".$link[2]."/u/";

	$arquivos = glob($down_folder."{*.xlsx,*.docx,*.pdf}", GLOB_BRACE);

	?>
	<div class="container my-3">
		<div class="row">
			<div class="col-12">
				<h1 class="display-4 my-5">Download</h1>
			</div>
			<div class="col-12">
				<?
				$aux = 1;
				foreach($arquivos as $img){
					?>
					<div class="card my-3">
						<div class="card-body">
							<a target="_blank" href="<? echo $url.$img; ?>" download>
								<span class="badge badge-pill badge-info"><? echo $aux++ ?></span> <i class="fas fa-download"></i>  Link para download do material
							</a>
						</div>
					</div>
					<?
				}
				?>
			</div>
		</div>
	</div>

	<script type="text/javascript" charset="utf-8" async>
		$(function() {
			$(".navbar-topo").css({'background-color':'#00000005'});
		});
	</script>
	<?

}else{

	$VerificarEbook = new db();
	$VerificarEbook->query( "SELECT pag_link FROM paginas WHERE pag_id = '".$link[2]."' " );
	$VerificarEbook->execute();
	$rowBook = $VerificarEbook->object();

	echo '<meta http-equiv="refresh" content="2;URL='.$url.$rowBook->pag_link.'" />';
	echo '<div class="container">
	<div class="card my-5">
	<div class="card-body">
	<h2>Acesso negado</h2>
	<p>Por favor, faça o cadastro para realizar o download gratuito... redirecionando</p>
	</div></div>
	</div>';
}

?>


