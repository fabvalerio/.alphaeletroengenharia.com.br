


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

						colmenuHome +=  '<div class="col-lg-6 col-12 my-2">';
						colmenuHome +=  '<a href="'+a.pag_link+'" class="card-a">';
						colmenuHome +=  '<div class="d-flex hvr-bounce-to-right p-2 d-flex align-items-center card-detaque-home card-box">';
						if( a.pag_capa != ''  ){
							colmenuHome +=  '<div class="flex-lg-fill">';
							colmenuHome +=  '<img src="'+a.pag_capa+'" alt="'+a.pag_titulo+'" class="img-fluid my-2">';

										/*colmenuHome += '<picture>';
										colmenuHome += '<source class="img-fluid my-2" srcset="'+a.url+'painel/images/fotos-paginas/'+a.pag_id+'/p/'+a.pag_capa+'" alt="'+a.pag_titulo+'" media="(max-width: 350px)"/>';
										colmenuHome += '<source class="img-fluid my-2" srcset="'+a.url+'painel/images/fotos-paginas/'+a.pag_id+'/600/'+a.pag_capa+'" alt="'+a.pag_titulo+'" media="(max-width: 600px)"/>';
										colmenuHome += '<source class="img-fluid my-2" srcset="'+a.url+'painel/images/fotos-paginas/'+a.pag_id+'/m/'+a.pag_capa+'" alt="'+a.pag_titulo+'" media="(max-width: 800px)"/>';
										colmenuHome += '<source class="img-fluid my-2" srcset="'+a.url+'painel/images/fotos-paginas/'+a.pag_id+'/g/'+a.pag_capa+'" alt="'+a.pag_titulo+'" media="(max-width: 1400px)"/>';
										colmenuHome += '<source class="img-fluid my-2" srcset="'+a.url+'painel/images/fotos-paginas/'+a.pag_id+'/1900/'+a.pag_capa+'" alt="'+a.pag_titulo+'" media="(max-width: 1900px)"/>';
										colmenuHome += '<img src="'+a.url+'painel/images/fotos-paginas/'+a.pag_id+'/m/'+a.pag_capa+'" alt="'+a.pag_titulo+'"  class="img-fluid my-2">';
										colmenuHome += '</picture>';*/

										colmenuHome +=  '</div>';
									}
									colmenuHome +=  '<div class="flex-lg-fill ml-2">';
									colmenuHome +=  '<h5>'+a.pag_titulo+'</h5>';
									/*colmenuHome +=  '<p>'+a.pag_mini_descricao+'</p>';*/
									//colmenuHome +=  '<p class="font-weight-light m-0">'+a.pag_data+'</p>';
									colmenuHome +=  '</div>';
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





$(function() {
	
window.onload = function(){
	DivAltura('.card-box');
}

});


