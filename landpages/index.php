<?

date_default_timezone_set('America/Sao_Paulo');

/***************************/
/** BIBIOTECAS            **/
/***************************/
include('../painel2/php/db.class.php');

include('../assets/php/acentos.php');
include('../assets/php/data.php');
include('../assets/php/uf.php');
include('../assets/php/tags.php');
include('../assets/php/funcaoStringParaBusca.php');
include('../assets/php/capa.php');
include('../assets/php/scripts.php');
include('assets/php/htaccess.php');


/***************************/
/** CONFIGURAÇÂO          **/
/***************************/
$conf = new CONNECT();
$conf->SQL( "SELECT * FROM configuracao WHERE c_id = '1'" );

/***************************/
/** DADOS DA LANDPAGE     **/
/***************************/
$land = new CONNECT();
$land->SQL("SELECT * FROM landpage WHERE land_url = '".$link[1]."'");

/* ************************************************** */
/* UNIDADES */
/* ************************************************** */
$__unidade = new CONNECT();
$__unidade->SQL( "SELECT * FROM cliente WHERE cli_url = '".$link[0]."'" );


?>

<!DOCTYPE html>
<html lang="en" class="js">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="robot" content="All">
	<meta name="rating" content="general">
	<meta name="distribuition" content="global">
	<meta name="language" content="PT">
	<meta name="author" content="WebFreelancer"> 
	<meta name="robots" content="index,follow">

	<meta name="description" content="Saiba a importância de escolher um bom escritório de contabilidade especializada, para direcionar a situação econômico-financeira da sua empresa.">
	<meta name="keywords" content="contabilidade <? echo $__unidade->exibi['cli_cidade'] ?>, contabil <? echo $__unidade->exibi['cli_cidade'] ?>, escritorio de contabilidad <? echo $__unidade->exibi['cli_cidade'] ?>e, fiscal, serviços contabeis <? echo $__unidade->exibi['cli_cidade'] ?>, contador <? echo $__unidade->exibi['cli_cidade'] ?>, contador especializados, consultoria, consultoria tributaria">

	<meta property="og:title" content="ContabExpress - <? echo $land->exibi['land_titulo'];?> - <? echo $__unidade->exibi['cli_cidade'] ?>">
	<meta property="og:description" content="Saiba a importância de escolher um bom escritório de contabilidade especializada, para direcionar a situação econômico-financeira da sua empresa.">
	<meta property="og:image" content="<? echo $url;?>/img-facebook.jpg">

	<meta property="og:url" content="<? echo $url.$link[0].'/'.$link[1];?>">
	<meta property="og:type" content="website" /> 
	<meta property="og:site_name" content="Grupo Dicon">
	<meta property="og:locale" content="pt_BR">
	<meta property="og:image:type" content="image/jpeg">
	<meta property="og:image:width" content="500">
	<meta property="og:image:height" content="500">

	<base href="<? echo $url.$link[0].'/'.$link[1];?>">

	<!-- Fav Icon  -->
	<link rel="shortcut icon" href="<? echo $url;?>images/ico/favicon.png">
	<link href="<? echo $url;?>images/ico/favicon.png" rel="shortcut icon" type="image/x-icon">
	<link href="<? echo $url;?>images/ico/favicon.png" rel="icon" type="image/x-icon">

	<!-- Site Title  -->
	<title>ContabExpress | <? echo $land->exibi['land_titulo'] ?></title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

	<!-- WOW animation -->
	<link rel="stylesheet" href="<? echo $url;?>assets/wow/animate.css" />

	<!-- Style -->
	<link rel="stylesheet" href="<? echo $url;?>assets/css/style.css" />


	<style>
	.slider{
		background-image: url('<? echo $url_site ?>painel/images/fotos-landpage/<? echo $land->exibi['land_id'];?>/g/<? echo $land->exibi['land_capa'];?>');
		background-size: cover;
		background-position: center;
	}
</style>


<!-- 
//=============================================================
// GOOGLE ANALYTICS
//=============================================================
-->
<? if( !empty($conf->exibi['c_google_analytics']) ){ ?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=<? echo $conf->exibi['c_google_analytics'];?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', '<? echo $conf->exibi['c_google_analytics'];?>');
	</script>
<? } ?>

<!-- 
//=============================================================
// GOOGLE OTIMIZE
//=============================================================
-->
<? if( !empty($conf->exibi['c_google_otimize']) ){ ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', '<? echo $conf->exibi['c_google_analytics'];?>', 'auto');
		ga('require', '<? echo $conf->exibi['c_google_otimize'];?>');
		ga('send', 'pageview');
	</script>
<? } ?>

<!-- 
//=============================================================
// GOOGLE WEBMASTER
//=============================================================
-->
<? if( !empty($conf->exibi['c_google_webmaster']) ){ ?>
	<meta name="google-site-verification" content="<? echo $conf->exibi['c_google_webmaster'];?>" />
<? } ?>

<!-- 
//=============================================================
// GOOGLE TAG
//=============================================================
-->
<? if( !empty($conf->exibi['c_google_tags']) ){ ?>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<? echo $conf->exibi['c_google_tags']; ?>');</script>
<!-- End Google Tag Manager -->
<? } ?>



</head>
<body id="topo">

	<? if( empty( $land->exibi['land_id'] ) ){ ?>

    <!--
	<div style="width: 500px; text-align: center; margin: 20px auto; font-family: lato">
		<h1>Ops! Selecione um segmento!</h1>
		<select name="segmento" id="segmento" style="padding: 10px; font-size: 15px;">
			<option value="0" disabled selected>....</option>
			<?
			$land = new CONNECT();
			$land->SQL("SELECT * FROM landpage ORDER BY land_ramo_atividade ASC");

			do{
				?>
				<option value="<? echo $land->exibi['land_url'] ?>"><? echo $land->exibi['land_ramo_atividade'] ?></option>
				<?
			}while( $land->exibi = mysql_fetch_assoc( $land->result ) );
			?>
		</select>
    <br>
    <br>
-->

        <? include('#lista-segmentos.php'); ?>
        <!--
		<select name="unidade" id="unidade" style="padding: 10px; font-size: 15px;">
			<option value="0" disabled selected>Cidade</option>
			<?

			if( !empty( $_GET['franquia'] ) ){ $Where = " WHERE cli_url = '".$_GET['franquia']."' "; }

			$__unidade = new CONNECT();
			$__unidade->SQL( "SELECT * FROM cliente {$Where} ORDER BY cli_url ASC" );

			do{
				?>
				<option <? if( $__unidade->exibi['cli_url'] == $_GET['franquia'] ){ echo 'selected'; } ?> value="<? echo $__unidade->exibi['cli_url'] ?>"><? echo $__unidade->exibi['cli_cidade'] ?></option>
				<?
			}while( $__unidade->exibi = mysql_fetch_assoc( $__unidade->result ) );
			?>
		</select>
    <br>

		<button type="button" id="btn-envia" style="padding: 10px; font-size: 15px; margin-top: 10px;">Acessar</button>
	-->

</div>

<script src="http://www.webfreelancer.com.br/code/jquery/jquery-1.12.2.min.js" type="text/javascript"></script>
<script>
	jQuery(document).ready(function() {
		jQuery( '#unidade' ).change(function() {
			var cidade = jQuery('#unidade').val();
				window.location = '<? echo $url?>?franquia='+cidade;
		});
	});
</script>

<? }else{ ?>

	<? include('wireframes/'.$land->exibi['land_wireframe'].'/#home.php'); ?>

<? } ?>


<!--<script src="js/jquery.js"></script>-->
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



		<!-- WOW
			================================================== -->
			<script src="<? echo $url;?>assets/wow/wow.min.js" type="text/javascript"></script>
			<script>
				new WOW().init();
			</script>

		</body>

		</html>
