	
<section class="slider p-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12"> 
				<div class="mr-md-3 pt-3 px-4 pt-md-5 px-md-5 overflow-hidden">
					<div class="my-3 py-3 text-md-right text-xs-center">
						<p class="lead wow fadeInDown">
							<img src="<? echo $url_site; ?>painel/logo/principal/logo.png?<? echo date('Ymdhis'); ?>" alt="<? echo $conf->exibi['c_nome']?>" class="img-fluid logo-principal">
						</p>
					</div>
					<div class="bg-white box-shadow float-md-right form-land wow fadeInUp">
						<div class="my-3 mx-lg-5 mx-md-5 mx-sm-3 mx-3">
							<form class="pt-2" id="contato">
								<h2 class="pb-2 text-center"><? echo $land->exibi['land_titulo_form'];?></h2>
								<div class="form-group">
									<input type="text" class="form-control" name="nome" id="nome" placeholder="Seu nome">
								</div>
								<div class="form-group">
									<input type="email" class="form-control" name="email" id="email" placeholder="Seu email">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="telefone" id="telefone" placeholder="Seu telefone">
								</div>
								<div class="form-group text-center">
									<span id="ReturnoContato">
										<button type="button" onclick="javascript:Send();" class="btn btn-lg btn-outline-primary w-100">Solicitar <i class="fa fa-angle-right"></i></button>
									</span>
								</div>
								<? if( !empty($__unidade->exibi['cli_email']) ){  ?>
								<input type="hidden" name="unidade" value="<? echo $__unidade->exibi['cli_cidade'] ?>">
								<input type="hidden" name="responsavel" value="<? echo $__unidade->exibi['cli_nome'] ?>">
								<input type="hidden" name="destino" value="<? echo $__unidade->exibi['cli_email'] ?>">
								<? } else{ ?>
								<input type="hidden" name="unidade" value="Matriz">
								<input type="hidden" name="responsavel" value="ContabExpress">
								<input type="hidden" name="destino" value="contato@contabexpress.com.br">
								<? } ?>
							</form>


							<script type="text/javascript">
								function Send()
								{  
									$send = jQuery.noConflict(); 
									$send('#ReturnoContato').html('<div class="bg-warning"><h4 class="m-2 p-3">Enviando ....<h4></div>');
									$send.post('http://contabexpress.com.br/landpages/contato.php', $send( "#contato" ).serialize() ,function(data){
										$send('#ReturnoContato').html(data);
										return false;
									});
									return false;
								}
							</script>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="conteudo p-0 wow fadeInRight">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="my-5">
					<h1 class="text-uppercase"><? echo $land->exibi['land_titulo'];?></h1>
				</div>
			</div>
			<div class="col-md-12">
				<div>
					<? echo stripcslashes($land->exibi['land_descricao']);?>
				</div>
			</div>
		</div>
	</div>
</section>

<footer class="my-4 py-5 wow fadeIn">

	<div class="footer-section" style="visibility: visible; animation-name: fadeIn;">
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-4">
					<div class="footer-about wow bounceInLeft" data-wow-delay="0.7" style="visibility: visible; animation-name: bounceInLeft;">
						<a href="https://www.contabexpress.com.br/<? echo $__unidade->exibi['cli_url'] ?>" class="footer-logo"><img src="<? echo $url_site; ?>painel/logo/principal/logo.png?<? echo date('Ymdhis'); ?>" alt="<? echo $conf->exibi['c_nome']?>" class="img-fluid logo-principal"></a>
					</div><!-- .footer-about -->
				</div>	
				<? if( !empty($__unidade->exibi['cli_cidade']) ){  ?>
				<div class="col-md-12 mt-4">
					<div class="footer-address wow bounceInUp" data-wow-delay="0.5" style="visibility: visible; animation-name: bounceInUp;">
						<h6 class="fa-title text-center">ContabExpress Unidade de <? echo $__unidade->exibi['cli_cidade'] ?></h6>
						<div class="address-list text-center">
							<div class="single-address">
								<ul class="m-0 p-0">
									<? if( !empty($__unidade->exibi['cli_telefone']) ){ ?><li><span><i class="fa fa-phone"></i></span> <? echo $__unidade->exibi['cli_telefone'] ?></li><? } ?>
									<? if( !empty($__unidade->exibi['cli_celular']) ){ ?><li><span><i class="fa fa-whastapp"></i></span> <? echo $__unidade->exibi['cli_celular'] ?></li><? } ?>
									<? if( !empty($__unidade->exibi['cli_email']) ){ ?><li><span><i class="fa fa-envelope"></i></span> <? echo $__unidade->exibi['cli_email'] ?></li><? } ?>

									<? if( !empty($__unidade->exibi['cli_endereco']) ){ ?>
									<li>
										<span><i class="fa fa-map-marker"></i></span> <? echo $__unidade->exibi['cli_endereco'] ?>, <? echo $__unidade->exibi['cli_numero'] ?>
										<br>
										<? echo $__unidade->exibi['cli_cidade'] ?> | <? echo $__unidade->exibi['cli_estado'] ?>
									</li>
									<? } ?>

								</ul>
							</div>
						</div><!-- .address-list -->
					</div><!-- .footer-address -->
				</div><!-- .col -->
				<? } ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div>

</footer>

<div class="container">
	<div class="row">
		<div class="col-12 pb-4">
			<span class="copyright-text">2018 (C) • Todos os direitos reservados à Grupo Dicon</span>
		</div>
	</div>
</div>

			<script src="http://webfreelancer.com.br/code/mask/jquery.maskedinput.js"></script>
			<script>
				jQuery(function($){

					jQuery("#telefone")
					.mask("99-9999-9999?9")
					.focusout(function (event) {  
						var target, phone, element;  
						target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
						phone = target.value.replace(/\D/g, '');
						element = $(target);  
						element.unmask();  
						if(phone.length > 10) {  
							element.mask("99-99999-999?9");  
						} else {  
							element.mask("99-9999-9999?9");  
						}  
					});

				});
			</script>