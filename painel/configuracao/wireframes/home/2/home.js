


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





						colmenuHome += '<div class="col-lg-4 col-md-6 mt-5">';
						colmenuHome += '<a href="'+a.pag_link+'"" class="text-dark">';
						colmenuHome += '<div class="card">';
						colmenuHome += '<div class="p-5">';
						colmenuHome += '<picture>';
						colmenuHome += '<img src="'+a.pag_capa+'" alt="'+a.pag_titulo+'" class="w-100 capa">';
						colmenuHome += '</picture>';
						colmenuHome += '</div>';
						colmenuHome += '<div class="card-body">';
						colmenuHome += '<h2>'+a.pag_titulo+'</h2>';
						colmenuHome += '<p class="text-justify">'+a.pag_mini_descricao+'</p>';
						colmenuHome += '</div>';
						colmenuHome += '</div>';
						colmenuHome += '</a>';
						colmenuHome += '</div>';




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





$(function() {
	
	window.onload = function(){
		DivAltura('.card-box');
	}

});


