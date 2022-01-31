<?
include('assets/php/jsonConf.php');
?>
<footer class="">
	<div class="<? echo $jsonConf->c_footer_largura?>">
		<div class="row">
			<div class="col-lg-6">
				[[texto-3]]
			</div>
			<div class="col-lg-6">
					[[texto-2]]
				<form class="news" method="post">
					<label class="sr-only" for="inputNews">Seu e-mail</label>
					<div class="input-group mb-2">
						<input type="mail" name="email" class="form-control form-control-lg" id="inputNews" placeholder="Seu e-mail" required>
						<div class="input-group-prepend">
							<div class="input-group-text">
								<input type="hidden" value="newsletter" name="pagina">
								<button type="submit" class="btn btn-link p-0">
									<i class="fas fa-check"></i>
								</button>
							</div>
						</div>
					</div>
					<small>*Fique tranquilo, nós também não gostamos de SPAM.</small>
				</form>

			</div>
		</div>

		<div class="row mt-5">

			<div class="col-lg-2">
				<h3>MENU</h3>
				<ul class="nav-footer">
					[[menu]]
				</ul>	
			</div>

			<div class="col-lg-2">
				<h3>PARCEIROS</h3>
				<ul class="nav-footer">
					<li><a href="#" class="hvr-backward"><i class="fas fa-angle-double-right"></i> Nucont</a></li>
					<li><a href="#" class="hvr-backward"><i class="fas fa-angle-double-right"></i> Nibo</a></li>
					<li><a href="#" class="hvr-backward"><i class="fas fa-angle-double-right"></i> Conta Azul</a></li>
				</ul>	
			</div>

			<div class="col-lg-2">
				<h3>#SEJACONTAB</h3>
				<ul class="nav-footer">
					[[midias-sociais]]
				</ul>
			</div>

			<div class="col-lg-6 text-center d-flex align-items-center justify-content-center">
				<img src="<? echo $url ?>painel/logo//footer/logo.png" class="logo-footer" alt="<? echo $jsonConf->c_nome ?>">
			</div>

		</div>
	</div>
</footer>
