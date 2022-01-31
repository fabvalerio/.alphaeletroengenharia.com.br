	<?

	ob_start();
	session_start();

	if( $_SERVER['SERVER_NAME'] != 'localhost' ){

		/*HTTPS*/
		if( $_SERVER['HTTPS'] != 'on' ) {
			$urlCom = "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
			echo '<meta http-equiv="refresh" content="0; '.$urlCom.'">'; exit;
		}
		
		/*WWW*/
		if( !strstr($_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI], "www.")){ 
			$urlCom = "https://www.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
			echo '<meta http-equiv="refresh" content="0; '.$urlCom.'">'; exit;
		}

	}


	include('painel/php/db.class.php');
	include('amp/php/htaccess.php');
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
	
	?>
	
	
	<!doctype html>
	<html ⚡ lang="en">
	
	<head>
		<meta charset="utf-8">

		<link rel="canonical" href="<? echo "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI] ?>">
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

		<title><? echo $__menuRow->menu_titulo;?> | <? echo $jsonConf->c_nome ?></title>

		<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>


		<script  src="<? echo $url; ?>assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script async src="https://cdn.ampproject.org/v0.js"></script>
		<script async custom-element="amp-position-observer" src="https://cdn.ampproject.org/v0/amp-position-observer-0.1.js"></script>
		<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
		<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
		<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
		<script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
		<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
		<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
		<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.1.js"></script>
		<script async custom-element="amp-animation" src="https://cdn.ampproject.org/v0/amp-animation-0.1.js"></script>
		<script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>

		<script async src="<? echo $url; ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script async src="<? echo $url; ?>assets/js/popper.min.js" type="text/javascript"></script>
		<script async src="<? echo $url; ?>assets/js/scripts.js" type="text/javascript"></script>

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<style amp-custom>
		<? 
			echo file_get_contents('amp/css/estrutura.css'); 
			echo file_get_contents('assets/css/bootstrap.min.css'); 
		?>
	</style>


</head>
<body>
	
	<!-- Start Navbar -->
	<? include('amp/includes/header.php'); ?>
	
	<!-- Start Sidebar -->
	<? include('amp/includes/nav.php'); ?>


	<main id="content" role="main" class="">
		<article class="recipe-article">

			<?

			//print_r($link);

			if( empty( $link[0] ) ){
				StrReplace('amp/wireframes/slider/slider.php', $url);
			}



			if( !empty( $link[0] ) ){

				/* verificar arquivo existente */
				if( is_file( $FileAnexo.".php" ) ){
					include($FileAnexo.".php");
				}else{

					/* verificar se numero de registro */
					if( $__numero_conteudos === 1 AND  $tr <= 1 ){
						$linkpage = '>>>>>>>>>>>>> ver';
						StrReplace('amp/wireframes/ver/ver.php', $url);
					}elseif($__numero_conteudos > 1){
						$linkpage = '>>>>>>>>>>>>> visualizar';
						StrReplace('amp/wireframes/visualizar/visualizar.php', $url);
					}else{
						include($paginaExibi);
					}
				}
			}else{
				include($paginaExibi);
				StrReplace('amp/wireframes/home/home.php', $url);
			}


			//echo $linkpage;

			/* footer */ 
			//StrReplace('painel/configuracao/wireframes/footer/'.$footer.'/footer.php', $url);


			?>


		</article>
	</main>

	<div class="result-formulario"></div>

	<footer class="ampstart-footer flex flex-column items-center px3 ">

		<small>
			©<? echo $jsonConf->c_nome ?> , <? echo date('Y') ?>
		</small>

	</footer>
</body>
</html>
