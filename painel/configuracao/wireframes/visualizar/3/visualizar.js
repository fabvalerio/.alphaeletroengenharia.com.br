jQuery(document).ready(function($) {
	

	/* BLOG */

	if( conteudo != '' ){

		var cols           = "";
		var valorRetornado = conteudo;
		var obj            = JSON.parse(valorRetornado);

		obj.forEach(function(o, index){


			cols += '<div class="col-lg-4 col-md-6 mt-5">';
			cols += '<div class="card">';
			//cols += '<img src="painel/images/fotos-paginas/'+o.pag_id+'/m/'+o.pag_capa+'" alt="" class="card-img-top">';
			cols += '<picture>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/p/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 350px)"/>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/600/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 600px)"/>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/m/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 800px)"/>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/g/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 1400px)"/>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/1900/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 1900px)"/>';
			cols += '<img src="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/p/'+o.pag_capa+'" alt="'+o.pag_titulo+'" class="w-100 capa">';
			cols += '</picture>';
			cols += '<div class="card-body">';
			cols += '<h2>'+o.pag_titulo+'</h2>';
			cols += '<p class="text-justify">'+o.pag_mini_descricao+'</p>';
			cols += '<div class="text-center midias">';
			cols += '<div class="share">#compartilhe</div>';
			cols += '<a class="hvr-grow" href="https://www.facebook.com/sharer.php?u='+o.url+o.pag_link+'" target="_blank" title="Compartilhar'+o.pag_titulo+' no Facebook"><i class="fab fa-facebook" aria-hidden="true"></i></a>';
			cols += '<a class="hvr-grow" href="http://twitter.com/intent/tweet?text='+o.pag_titulo+'&url='+o.url+o.pag_link+'&via=webfrrelancer" title="Twittar sobre '+o.pag_titulo+'" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>';
			//cols += '<a class="hvr-grow" href="whatsapp://send?link='+o.pag_titulo+'" data-action="share/whatsapp/share"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>';
			cols += '</div>';
			cols += '<div class="mt-3">';
			cols += '<a href="'+o.url+o.pag_link+'" class="btn btn-outline-danger btn-lg w-100">Download</a>';
			cols += '</div>';
			cols += '</div>';
			cols += '</div>';
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