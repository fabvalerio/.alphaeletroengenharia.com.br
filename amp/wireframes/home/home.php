
	<main class="wow bounceInUp mb-4" data-wow-delay=".8s">
		<div class="container">
			<div class="row my-4" id="pagina-home">
			</div>
		</div>
	</main>

<script>


/* Menu Home Ativo */
if( menuHome != '' ){
	var colmenuHome        = "";
	var valorRetornadoHome = menuHome ;
	var objCat             = JSON.parse(valorRetornadoHome);
	objCat.forEach(function(c, index){

		colmenuHome +=  '<div class="box-section" id="home-'+c.menu_id+'">';
		colmenuHome +=  '<div class="col-12">';
		colmenuHome +=  '<h1 class="titulo-destaque-home">'+c.menu_titulo+'</h1>';
		colmenuHome +=  '</div>';
		colmenuHome +=  '<div class="row home-conteudo" id="home-conteudo-'+c.menu_id+'">';

		/*--------------------------------------------------------------------------------------------------*/


		/* Conteudo Home Ativo */
		if( destaqueHome != '' ){
			var objContH  = JSON.parse(destaqueHome);
			var coldestaqueHome = '';

			var menu = c.menu_id;

			objContH.forEach(function(c, index){

				//console.log(c.conteudo);
				c.conteudo.forEach(function(a, index){

					if( menu == a.menu_menu_id ){

						colmenuHome +=  '<div class="col-12 my-2">';
						colmenuHome +=  '<a href="'+a.pag_link+'" class="card-a">';
						colmenuHome +=  '<div class="hvr-bounce-to-right p-2 card-box">';
						if( a.pag_capa != ''  ){
							colmenuHome +=  '<div class="">';
							//colmenuHome +=  '<img src="'+a.pag_capa+'" alt="'+a.pag_titulo+'" class="img-fluid my-2">';

										colmenuHome += '<picture>';
										colmenuHome += '<img src="'+a.pag_capa.replace("/p/", "/m/")+'" alt="'+a.pag_titulo+'"  class="img-fluid my-2">';
										colmenuHome += '</picture>';

										colmenuHome +=  '</div>';
									}
									colmenuHome +=  '<h5>'+a.pag_titulo+'</h5>';
									colmenuHome +=  '<p>'+a.pag_mini_descricao+'</p>';
									colmenuHome +=  '</div>';
									colmenuHome +=  '</a>';
									colmenuHome +=  '</div>';

								}
							});
			});
		}

		/*--------------------------------------------------------------------------------------------------*/


		colmenuHome +=  '</div>';
		colmenuHome +=  '<div class="col-12 mt-5 text-center">';
		colmenuHome +=  '<a href="'+c.menu_link+'" class="btn veja-mais">Veja mais</a>';
		colmenuHome +=  '</div>';
		colmenuHome +=  '</div>';
		colmenuHome +=  '</div>';

	});
}


/* PRINT */
if( colmenuHome != '' ){
	$("#pagina-home").append(colmenuHome);
}



</script>