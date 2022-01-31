<?

    //DB
$land = new CONNECT();
$land->SQL("SELECT * FROM landpage ORDER BY land_ramo_atividade ASC");

	//CIDADE
if( !empty( $_GET['franquia'] ) ){ $Where = " WHERE cli_url = '".$_GET['franquia']."' "; }

$__unidade = new CONNECT();
$__unidade->SQL( "SELECT * FROM cliente {$Where} ORDER BY cli_url ASC" );

?>

<main>

	<section class="jumbotron text-center">
		<div class="container">

			<h1 class="jumbotron-heading">Landing Pages 🚀 Segmentos [<? echo $land->num_linha; ?>]</h1>

			<? if( $__unidade->exibi['cli_url'] == $_GET['franquia'] ){ ?>

				<h2 class="text-center py-3">Unidade de <? echo $__unidade->exibi['cli_cidade'] ?> / <? echo $__unidade->exibi['cli_estado'] ?></h1>

			<? }else{?>

					<select name="unidade" id="unidade" style="padding: 10px; font-size: 15px;">
						<option value="0" disabled selected>Cidade</option>
						<? do{ ?>
						<option <? if( $__unidade->exibi['cli_url'] == $_GET['franquia'] ){ echo 'selected'; } ?> value="<? echo $__unidade->exibi['cli_url'] ?>"><? echo $__unidade->exibi['cli_cidade'] ?></option>
						<? }while( $__unidade->exibi = mysql_fetch_assoc( $__unidade->result ) ); ?>
				    </select>

			<? } ?>

			<p class="lead text-muted">Landing page é uma página que possui todos os elementos voltados à conversão do visitante em lead, oportunidade ou cliente. Também conhecidas como páginas de aterrissagem ou páginas de conversão, as landing pages são muito usadas em campanhas de marketing digital, pois costumam ter altas taxas de conversão.</p>
			<p><a href="http://contabexpress.com.br/marketing/briefing.php?pid=" class="btn btn-secondary my-2">Solicitar novo seguimento</a></p>
		</div>
	</section>

	<div class="album py-5 bg-light">
		<div class="container-fluid">
			<div class="row">

				<?

				do{
					?>

					<div class=" col-xl-3 col-md-4 col-sm-6 col-12">
						<div class="card mb-3 shadow-sm">
							<div style="height:200px; width: 100%; background-size: cover; background-position: center; background-image: url('http://contabexpress.com.br/painel/images/fotos-landpage/<? echo $land->exibi['land_id'] ?>/p/<? echo $land->exibi['land_capa'] ?>');">
							</div>
							<div class="card-body">
								<p class="card-text"><? echo $land->exibi['land_ramo_atividade'] ?></p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<a href="http://contabexpress.com.br/landpages/<? echo $__unidade->exibi['cli_url'] ?>/<? echo $land->exibi['land_url'] ?>" class="btn btn-sm btn-outline-secondary">Acessar</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?
				}
				while( $land->exibi = mysql_fetch_assoc( $land->result ) );
				?>

			</div>
		</div>
	</div>
</main>


<footer class="text-muted">
	<div class="container py-5">
		<p class="py-5 text-warning">Todos os direitos reservados a ContabExpress.</p>
	</div>
</footer>