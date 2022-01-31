<header class="wow bounceInDown" data-wow-delay=".5s">
	<?  include('_home.php'); ?>

	<!-- Páginas dinâmicas -->
	
	
	<section class="home-card-box">
		<div class="container">
			<div class="row">
				<div id="pagina-home"></div>
			</div>
		</div>
	</section>

	<?
	StrReplace('painel/configuracao/wireframes/home/'.$home.'/home.php');
	?>

</header>