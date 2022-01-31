<?
/* UNIDADES JSON */

/* UNIDADES JSON */
$json_file = file_get_contents("https://astro.contabexpress.com.br/api/unidade/".$link[0]);
$json_str = json_decode($json_file, true);


if( !empty($json_str) ){
	$unidade = $json_str['codigo'];
	$cidade  = $json_str['cidade']['nome'];
	$estado  = $json_str['cidade']['estado']['nome'];
	$lat     = $json_str['lat'];
	$lng     = $json_str['lng'];
	$nome    = $json_str['usuario']['nome'].' '.$json_str['usuario']['sobrenome'];
	$endC     = $json_str['endereco'];
	$end     = $json_str['endereco'].' - '.$json_str["endBairro"].' - '.$json_str["cep"];

	$tel     = $json_str['telefone'];
	$cel     = $json_str['celular'];
	$email   = $json_str['usuario']['email'];

}
/* FIM UNIDADES JSON */


/* Armazenar no cache */

setcookie('uni_cel' , $tel  , (time() + (365 * 24 * 3600)), $url);
setcookie('uni_mail', $email, (time() + (365 * 24 * 3600)), $url);
setcookie('uni_url', $url.$unidade, (time() + (365 * 24 * 3600)), $url);

?>

<link rel="stylesheet" href="<? echo $url ?>assets/leaflet/leaflet.css">
<style>
.whastapp{
	background-color: #25D366;
	border-radius: 100px;
	position: fixed;
	left: 20px;
	bottom: 20px;
	z-index: 1000;
	padding: 14px 10px;
	width: 80px;
	height: 80px;
}

.whastapp a{
	color: #fff;
}


#map {
	width: 100%;
	height: 400px;
}
</style>

<div class="whastapp hvr-pop wow fadeInLeft" data-wow-delay="1s">
	<a target="_new" href="https://wa.me/55<? echo $cel; ?>">
		<i class="fab fa-whatsapp fa-3x fa-fw"></i>
	</a>
</div>	

<div class="container my-4">
	<div class="row">

		<div class="col-12"><h1>ContabExpress <? echo $cidade; ?></h1></div>

		<div class="col-12 my-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<? echo $url; ?>">Home</a></li>
					<li class="breadcrumb-item"><a href="<? echo $url; ?>onde-estamos">Unidades</a></li>
					<li class="breadcrumb-item active" aria-current="page"><? echo $estado; ?></li>
					<li class="breadcrumb-item active" aria-current="page"><? echo $cidade; ?></li>
				</ol>
			</nav>
		</div>

		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<div class="mb-3">
						<p class="lead m-0 p-0">Responsável</p>
						<p class="m-0 p-0"><? echo $nome; ?></p>
					</div>
					<? if( !empty( $endC ) ){ ?>
						<div class="mb-3">
							<p class="lead m-0 p-0">Endereço</p>
							<p class="m-0 p-0"><? echo $end; ?></p>
						</div>
					<? } ?>
					<div class="mb-3">
						<p class="lead m-0 p-0">Contatos</p>
						<? if( !empty( $tel ) ){ ?><p class="m-0 p-0"><i class="fa-fw fas fa-phone"></i> <? echo $tel; ?></p><? } ?>
						<? if( !empty( $cel ) ){ ?><p class="m-0 p-0"><i class="fa-fw fab fa-whatsapp"></i> <? echo $cel; ?><? } ?>
						<? if( !empty( $email ) ){ ?><p class="m-0 p-0"><i class="fa-fw fas fa-at"></i> <? echo $email; ?></p><? } ?>
					</div>

				</div>
			</div>

			<div class="card mt-3">
				
				<div class="card-body">
					<form class="contact-form row formulario" name="contact-form" method="post">
						<div class="col-12">
							<div class="form-group">
								<label>Nome *</label>
								<input type="text" name="nome" id="nome" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>E-mail *</label>
								<input type="email" name="email" id="email" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>Telefone</label>
								<input id="telefone" name="telefone" type="text" class="form-control">
							</div>               
							<div class="form-group">
								<label>Assunto *</label>
								<input type="text" name="assunto" id="assunto" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>Mensagem *</label>
								<textarea name="mensagem" id="mensagem" required class="form-control" rows="6"></textarea>
							</div>                        
							<div class="form-group">
								<input type="hidden" name="pagina" value="unidade">
								<input type="hidden" name="unidade" value="<? echo $unidade; ?>">
								<button type="submit" name="submit" class="btn btn-outline-success w-100">Enviar Mensagem</button>
							</div>
						</div>
					</form> 


				</div>
			</div>
		</div>

		<div class="col-md-6">


			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title">#sejacontab</h5>
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="" target="_new"><i class="fa-fw fab fa-facebook"></i> Facebook</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="" target="_new"><i class="fa-fw fab fa-instagram"></i> Instagram</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="" target="_new"><i class="fa-fw fab fa-linkedin-in"></i> Linkedin</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="" target="_new"><i class="fa-fw fab fa-youtube"></i> YouTube</a>
						</li>
					</ul>
				</div>
			</div>


			<div class="card">
				<div id='map'></div>
			</div>

			<div class="card mt-3">
				<div class="card-body">
					<h5 class="card-title">
						Acesso rápido
					</h5>
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="<? echo $url ?>blog"><i class="fas fa-blog fa-fw"></i> Blog</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<? echo $url ?>e-books"><i class="fas fa-laptop fa-fw"></i> E-books Gratuitos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="https://br.pinterest.com/contabexpress/infograficos/" target="_new"><i class="fas fa-file-invoice fa-fw"></i> Infográficos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<? echo $url ?>solucoes"><i class="fas fa-box-open fa-fw"></i> Soluções para sua empresa</a>
						</li>
					</ul>
				</div>
			</div>

		</div>



	</div>
</div>



<script>
	$(function($) {

		$(".navbar-topo").css({'background-color':'#00000005'});

		/* Mapa da Unidade */
		$(window).on("resize", function(){ 
			$('#map').width('100%');
			map.invalidateSize(); 
		}).trigger('resize');


		$('#valMail').html('<? echo $email; ?>');
		$('#valCel').html('<? echo $cel; ?>');

	});
</script>





<!-- Pagina Unidade -->
<script src="<? echo $url ?>assets/leaflet/leaflet.js"></script>
<script src="<? echo $url ?>assets/leaflet/leaflet-providers.js"></script>
<script>
	var cities = L.layerGroup();

	L.marker([<? echo $lat ?>, <? echo $lng ?>]).bindPopup('<? echo $cidade ?>').addTo(cities);


	var mbAttr = 'ContabExpress Unidade de <? echo $cidade ?>',
	mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

	var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr}),
	streets     = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});

	var map = L.map('map', {
		center: [<? echo $lat ?>, <? echo $lng ?>],
		zoom: 14,
		layers: [grayscale, cities]
	});


	L.tileLayer.provider('OpenStreetMap.Mapnik').addTo(map);

</script>

