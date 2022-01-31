<?

ini_set('display_errors', 1);
//error_reporting(E_ALL);


if( $_SERVER['SERVER_NAME'] != 'localhost' ){


		if( $_SERVER['HTTPS'] != 'on' ) {
			$urlCom = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           echo '<meta http-equiv="refresh" content="0; '.$urlCom.'">'; exit;
		}
		
		if( !strstr($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], "www.")){ 
			$urlCom = "https://www.".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           echo '<meta http-equiv="refresh" content="0; '.$urlCom.'">'; exit;
		}

}

/*
ob_start();
session_start();
*/
?>
<!DOCTYPE html>


<html lang="pt">
<head>
	<meta charset="utf-8">
	<?

	include('painel/php/db.class.php');
	include('assets/php/htaccess.php');
	include('assets/php/script.php');
	include('assets/php/jsonConf.php');
	include('assets/php/funcaoStringParaBusca.php');
	include('painel/php/data.php');

	include('assets/php/db-conteudo.php');

	$nabvar = $jsonConf->c_nav;
	$header = $jsonConf->c_header;
	$footer = $jsonConf->c_footer;
	$navbar = $jsonConf->c_nav;
	$navbar_top = 1;
	$slider = $jsonConf->c_slider;
	$ver = $__wire['paginas_wireframes_wf_id'];
	$home = $jsonConf->c_home;
	$visualizar = $__menuRow->menu_wireframes_wf_id;

	echo "\n".'<!--'."\n";
	echo 'nabvar'.'-'.$nabvar."\n".
	'header'.'-'.$header."\n".
	'footer'.'-'.$footer."\n".
	'navbar'.'-'.$navbar."\n".
	'navbar_top'.'-'.$navbar_top."\n".
	'slider'.'-'.$slider."\n".
	'ver'.'-'.$ver."\n".
	'home'.'-'.$home."\n".
	'visualizar'.'-'.$__menuRow->menu_wireframes_wf_id."\n";
	echo '-->';


	$FileAnexo = 'paginas-fixas/'.$link[0];

	/* METASTAG + SEO */
	include('assets/php/seo.php');


	?>



	<link rel="stylesheet" href="<? echo $url; ?>assets/css/bootstrap.min.css">

	<style type="text/less">
		<?
		echo WireframesStyle('navbar', $navbar );
		if( $jsonConf->c_bar == 1 ) echo WireframesStyle('navbar_top', $navbar_top );
		if( empty( $link[0] ) ){
			echo WireframesStyle('header', $header );
			echo WireframesStyle('slider', $slider );
			echo WireframesStyle('home', $home );
		}else{
			echo WireframesStyle('ver', $ver ); 
			echo WireframesStyle('visualizar', $visualizar ); 
		}
		echo WireframesStyle('footer', $footer ); 
		?>
	</style>
	<?
	if( is_file( $FileAnexo.".less" ) ){
		echo '<link rel="stylesheet/less" type="text/css" href="'.$url.$FileAnexo.".less".'" />';
	}
	?>
	<link rel="stylesheet/less" type="text/css" href="<? echo $url; ?>painel/configuracao/wireframes/footer/diretos.less" />
	<link rel="stylesheet/less" type="text/css" href="<? echo $url; ?>assets/css/estrutura.less" />

	<link rel="stylesheet" type="text/css" href="<? echo $url; ?>assets/css/animate.min.css" />
	<link rel="stylesheet" type="text/css" href="<? echo $url; ?>assets/css/hover.css" />

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- BIBLIOTECA JQUERY  -->
	<script  src="<? echo $url; ?>assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>

	
  
  <link href="<? echo $url; ?>painel/assets/jReject-master/css/jquery.reject.css" rel="stylesheet">



</head>
<body>


<a href="https://wa.me/551239422277" target="_new" style="z-index:1000; position:fixed; left: 18px; bottom: 30px;  text-align: center; color: #000">
  <img alt="Whatsapp" width="50" src="data:image/png;base64,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">
  </a>
		<?

		/* nabbar-topo  */ 
		if( $jsonConf->c_bar == 1 ) StrReplace('painel/configuracao/wireframes/navbar_top/'.$navbar_top.'/navbar_top.php', $url);

		/* nabbar  */ 
		StrReplace('painel/configuracao/wireframes/navbar/'.$navbar.'/navbar.php', $url);

		if( empty( $link[0] ) ){
			/* slider */ 
			StrReplace('painel/configuracao/wireframes/slider/'.$slider.'/slider.php', $url);

			/* header */ 
			StrReplace('painel/configuracao/wireframes/header/'.$header.'/header.php', $url);
		}else{

			/* header */ 

			/* verificar arquivo existente */
			if( is_file( $FileAnexo.".php" ) ){
				include($FileAnexo.".php");
			}else{

				/* verificar se numero de registro */
				if( $__numero_conteudos === 1 AND  $tr <= 1 ){
					StrReplace('painel/configuracao/wireframes/ver/'.$ver.'/ver.php', $url);
				}elseif($__numero_conteudos > 1){
					StrReplace('painel/configuracao/wireframes/visualizar/'.$visualizar.'/visualizar.php', $url);
				}else{
					include($paginaExibi);
				}

			}

		}

		/* footer */ 
		StrReplace('painel/configuracao/wireframes/footer/'.$footer.'/footer.php', $url);

		?>

		<? include('painel/configuracao/wireframes/footer/direitos.php');?>


	</div>

	<div class="result-formulario"></div>

	<script src="<? echo $url ?>assets/js/popper.min.js"></script>
	<script src="<? echo $url ?>assets/js/bootstrap.min.js"></script>



	<!-- DATA -->
	<script src="<? echo $url ?>assets/js/data/moment.js" ></script>
	<script src="<? echo $url ?>assets/js/data/pt-br.js" ></script>


	<?
	/* JAVASCRIPTS */ 

	WireframesJS('navbar', $nabvar, $url ); 


	/* verificar se numero de registro */
	if( $__numero_conteudos == 1 AND  $tr <= 1 ){
		WireframesJS('ver', $ver, $url ); 
	}else{
		WireframesJS('visualizar', $visualizar, $url ); 
	}

	if( empty( $link[0] ) ){
		WireframesJS('home', $home, $url );
		WireframesJS('slider', $slider, $url );
	}
	?>


	<script src="<? echo $url ?>assets/js/less.min.js"></script>
	
	<script src="<? echo $url; ?>assets/js/cidades.min.js" ></script>


	<!-- WOW  -->
	<script src="<? echo $url ?>assets/js/wow.js"></script>
	<script> new WOW().init(); </script>

	<? include('assets/php/analytics.php'); ?>

	
	<script src="<? echo $url; ?>assets/js/scripts.js"></script>

</body>
</html>