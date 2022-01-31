<?
$pesquisa = empty($_GET['q']) ? '' : $_GET['q'];

if(!empty($pesquisa)){
	$SQLPes = "
		SELECT     * 
		FROM       paginas
		WHERE      pag_titulo     REGEXP '" . stringParaBusca($pesquisa) . "'
		OR         pag_texto      REGEXP '" . stringParaBusca($pesquisa) . "'
		OR         pag_keyworks   REGEXP '" . stringParaBusca($pesquisa) . "'
		";
	$busca = new db();
	$busca->query( $SQLPes );
	$busca->execute();

}else{
	$busca = new db();
	$busca->exibi = '';
	$busca->result = 'Resource id #0';
}


?>

<section id="busca">

	<div class="container">

	<div class="busca-title lead">

		<h1>Pesquisa no site</h1>
		<? if( !empty($pesquisa) ){ ?>
		<h5><i class="fa fa-angle-right"></i>  busca pela palavra chave: <? echo  $pesquisa; ?></h5>
		<? } ?>

	</div>

	<div class="container">


		<div class="row">

			<?
			foreach( $busca->row() AS $row ){

				// VAZIO
				if( empty($busca->rowCount()) or empty($pesquisa) ){
					?>
					<form id="form-busca-site" method="post" action="<? echo $url;?>busca" class="w-100 badge-light p-3">
						<h2 class="display-3 text-danger">OPS!</h2>
							<p>A sua pesquisa por &quot;<? echo $_GET['q'] ?>&quot;, n&atilde;o foi econtrato...</p>
							<div class="form-group">
								<label for="formGroupExampleInput">Pesquisa novamente</label>
								<input name="q" id="q-site" class="form-control" type="text" placeholder="Busca" value="<? echo $_GET['q']?>">
							</div>
							<p><button class="btn btn-lg btn-danger" id="form-busca-site" type="submit">buscar</button></p>
					</form>

					<script type="text/javascript">

						jQuery(document).ready(function($) {

							jQuery('#form-busca-site').submit(function() {

								var q = jQuery('#q-site').val();
								window.location = "<? echo $url?>busca&q="+q;
								return false;
							});

						});  

					</script>

					<?
				}
				// EXIBIR
				else{

					$capa = 'painel/images/fotos-paginas/'.$row['pag_id'].'/p/'.$row['pag_capa'];

					?>
					<div class="col-md-6 mb-4">
							<a href="<? echo $url.$row['pag_link'] ?>">
						<div class="my-3">

								<div class="card">
								<div class="card-body">
									<h4 class="text-dark"><? echo $row['pag_titulo']?></h4>
									<p class="p-0 text-success"> <i class="fa fa-caret-down"></i> <? echo $url.$row['pag_link']?></p>
									<p class="text-secondary"><? echo $row['pag_mini_descricao']?></p>

								</div>
								</div>
						</div>
							</a>
					</div>

					<?

					$capa = '';
				}

			}
			?>

		</div>

	</div>
	</div>
	
</section>


<script>
	$(function($) {
		$(".navbar-topo").css({'background-color':'#00000005'});
	});
</script>
