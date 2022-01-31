
<div class="container wow bounceInDown" data-wow-delay=".8s">
	<div class="row my-4">
		<div class="col-12  d-flex align-items-center">
			<h1 id="menu_titulo"></h1>
			<div class=" ml-3 lead" id="menu_mini_texto"></div>
		</div>
		<?
		if( !empty($link[1]) ){
			?>
		<div class="col-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<? echo $url ?>">Home</a></li>
					<li class="breadcrumb-item"><a href="javascript:history.go(-1)">Voltar</a></li>
				</ol>
			</nav>
		</div>
			<?
		}
		?>
		<div class="col-12">
			<p class="pt-3" id="menu_descricao"></p>
		</div>
	</div>
</div>

<main id="pagina" class="mb-4">
	
	<div class="container">
		<div class="row">
			<!-- News 2 -->
			<div class="col-12 mb-5">
				<form class="card px-5 py-4 w-100 newsblog" method="post">
					<div class="row d-flex align-items-center">
						<div class="col-lg-6">
							<p>JUNTE-SE A MAIS DE 150.000 PESSOAS</p>
							<p class="font-weight-bold">Entre para nossa lista e receba conteúdos exclusivos e com prioridade</p>
						</div>
						<div class="col-lg-6">
							<div class="input-group mb-2">
								<input type="mail" name="email" class="form-control form-control-lg" id="inputNews" placeholder="Seu e-mail">
								<div class="input-group-prepend">
									<div class="input-group-text bg-success">
										<input type="hidden" name="pagina" value="news-blog">
										<button type="submit" class="btn btn-link p-0 text-white">Cadastrar email</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<?
			/* BUSCA */
			if( !empty( $_GET[q] ) ){
				?>
				<div class="col-12 mb-5">
					<div class="card bg-light">
						<div class="card-body">
							<b>Busca por:</b> <? echo $_GET['q'] ?>
						</div>
					</div>
				</div>
				<?
			}
			?>

			<!-- Blog -->
			<div class="col-lg-9 postagem order-2 order-lg-1">
				<div class="row conteudo-blog"></div>
			</div>
			
			<!--  Menu Navegação -->
			<div class="col-lg-3 order-1 order-lg-2">
				<div class="card p-2">
					<form class="buscablog" method="post">
						<input type="text" id="q" name="q" class="form-control border-0" placeholder="pesquisar..." autocomplete="off">
					</form>
				</div>

				<div class="categoria-blog">
					<h6>Categorias</h6>
					<ul id="lista-categorias">
					</ul>
				</div>

				<div class="my-3">
					<img src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" class="img-fluid" alt="placeholder+image">
				</div>


			</div>

			<div class="col-12 mt-4  order-lg-3">
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						
					</ul>
				</nav>
				</div
			</div>
		</div>

		<div class="clearfix"></div>
	</main>



