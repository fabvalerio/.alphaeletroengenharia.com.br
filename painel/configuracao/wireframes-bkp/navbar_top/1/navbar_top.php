<div class="bar p-3 wow bounceInDown">
	<div class="container">
		<div class="row d-flex align-items-center">
			<div class="col-lg-8 d-flex">
				<div class="flex-fill">
					<a href="faq"><i class="fas fa-info-circle"></i> Podemos te ajudar?</a>
				</div>
				<div class="flex-fill">
					<a href="onde-estamos"><i class="fas fa-map-marker-alt"></i> Onde Estamos <span class="badge badge-pill badge-dark" id="countUnidades">00</span></a>
				</div>
				<?
				if( !empty($_COOKIE['uni_cel']) ){
					?>
					<div class="flex-fill">
						<a href="https://wa.me/55<? echo $_COOKIE['uni_cel']; ?>" target="_new"><i class="fab fa-whatsapp"></i> <span id="valCel"><? echo $_COOKIE['uni_cel']; ?></span></a>
					</div>
					<?  
				}
				?>
				<?
				if( !empty($_COOKIE['uni_mail']) ){
					?>
					<div class="flex-fill">
						<a href="<? echo $uni_url ?>" target="_new"><i class="fas fa-at"></i> <span id="valMail"><? echo $_COOKIE['uni_mail'] ?></span></a>
					</div>
					<?  
				}else{
					?>
					<div class="flex-fill" id="valMail">
						<a href="<? echo $url ?>contato" target="_new"><i class="fas fa-at"></i> contato@contabexpress.com.br</a>
					</div>
					<?
				}
				?>
			</div>

			<div class="col-lg-2 text-lg-right">
			</div>
			<div class="col-lg-2">
				<a href="http://franquiacontabexpress.com.br" class="btn btn-info" target="_NEW"> Quero ser um franqueado</a>
			</div>
		</div>
	</div>
</div>