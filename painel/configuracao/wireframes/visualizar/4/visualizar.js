jQuery(document).ready(function($) {
	

	/* BLOG */

	if( conteudo != '' ){

		var cols           = "";
		var valorRetornado = conteudo;
		var obj            = JSON.parse(valorRetornado);

		obj.forEach(function(o, index){


			cols += '<div class="col-lg-4 col-md-6 mt-5">';
			cols += '<a href="'+o.url+o.pag_link+'"">';
			cols += '<div class="card h-100">';
			cols += '<div class="p-5">';
			cols += '<picture>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/p/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 350px)"/>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/600/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 600px)"/>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/m/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 800px)"/>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/g/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 1400px)"/>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/1900/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 1900px)"/>';
			cols += '<img src="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/p/'+o.pag_capa+'" alt="'+o.pag_titulo+'" class="w-100 capa">';
			cols += '</picture>';
			cols += '</div>';
			cols += '<div class="card-body">';
			cols += '<h2>'+o.pag_titulo+'</h2>';
			cols += '<p class="text-justify">'+o.pag_mini_descricao+'</p>';
			cols += '</div>';
			cols += '</div>';
			cols += '</a>';
			cols += '</div>';


		});

	}
	jQuery(".ebooks-list").append(cols);

	/*--------------------------------------------------------------------------------------------------*/


if( menu != "" ){
	var obj = JSON.parse(menu);

	obj.forEach(function(ver, index){

		jQuery("#menu_descricao").html(ver.menu_descricao);
		jQuery("#menu_titulo").html(ver.menu_titulo);

	});
}




	/*--------------------------------------------------------------------------------------------------*/



});