<div class="container">
	<div class="row my-4">
		<div class="col-12">
			<h1 id="pag_titulo"></h1>
			<div class="lead" id="pag_mini_texto"></div>
		</div>
			<div class="col-12 mt-3" id="capa-imagem"></div>
		<div class="col-12  d-flex align-items-center">
			<p class="mt-3" id="menu_descricao"></p>
		</div>
	</div>
</div>

<main id="pagina" class="mb-4">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div id="pad_texto"></div>
				<div class="clearfix"></div>
			</div>
			<div id="comentario-facebook"></div>
		</div>
	</div>
</main>



<script>
	

/* verificar se existe capa */
function is_img(file, title) {
	var img = new Image();
	img.src = file;
	img.onload = function() {
		//console.log("A imagem " + file + " existe");
		jQuery("#capa-imagem").html('<img src="'+file+'" alt="'+title+'" class="img-fluid capa">');
	}
	img.onerror = function() {
		//console.log("A imagem " + file + " não existe");
		jQuery("#capa-imagem").hide();
	}
}


if( conteudo != "" ){
	var obj = JSON.parse(conteudo);

	obj.forEach(function(ver, index){

		jQuery("#pad_texto").html(ver.pag_texto);
		jQuery("#pag_mini_texto").html(ver.pag_mini_descricao);
		jQuery("#pag_titulo").html(ver.pag_titulo);

		/*COMENTARIO FACEBOOK*/
		if( ver.pag_comentario == '1' ){ 
			jQuery("#comentario-facebook").html("<hr><h2>Gostou? <small>Deixe um Coment&aacute;rio</small></h2><div class=\"fb-comments\" data-href=\""+window.location.href+"\" data-width=\"100%\" data-numposts=\"5\" data-colorscheme=\"light\">");
			jQuery("#comentario-facebook").addClass('col-12 my-3');

			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2&appId=156780015100013&autoLogAppEvents=1';
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));

		}

		is_img(ver.url+'painel/images/fotos-paginas/'+ver.pag_id+'/g/'+ver.pag_capa, ver.pag_titulo);

	});
}



</script>