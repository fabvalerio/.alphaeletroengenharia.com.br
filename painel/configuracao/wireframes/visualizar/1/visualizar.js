jQuery(document).ready(function($) {
	

	/* BLOG */

		//console.log('conteudos');

	if( conteudo != '' ){

		var cols           = "";
		var valorRetornado = conteudo;
		var obj            = JSON.parse(valorRetornado);

		obj.forEach(function(o, index){

			cols += '<div class="mb-5 col-lg-6">';
			cols += '<a href="'+o.url+o.pag_link+'" class="text-dark">';
			cols += '<div class="mb-2 capa">';
			cols += '<picture>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/p/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 350px)"/>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/600/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 600px)"/>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/m/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 800px)"/>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/g/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 1400px)"/>';
			cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/1900/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 1900px)"/>';
			cols += '<img src="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/p/'+o.pag_capa+'" alt="'+o.pag_titulo+'" class="w-100 capa">';
			cols += '</picture>';
			cols += '</div>';
			cols += '<div>';
			cols += '<h5>'+o.pag_titulo+'</h5>';
			cols += '<small>'+o.cat_titulo+'</small>';
			cols += '<p>'+moment(o.pag_data).format('DD-MM-YYYY')+'</p>'; //o.pag_data
			cols += '</div>';
			cols += '</a>';
			cols += '</div>';

		});

	}

	/*--------------------------------------------------------------------------------------------------*/

	/* CATEGORIA */
	if( categoria != '' ){
		var colCategoria      = "";
		var valorRetornadoCat = categoria ;
		var objCat            = JSON.parse(valorRetornadoCat);
		objCat.forEach(function(c, index){

			colCategoria +=  '<li><i class="fas fa-angle-double-left"></i> <a href="'+c.link+'"> '+c.titulo+'</a></li>';

		});
	}

	/*--------------------------------------------------------------------------------------------------*/

	/* Conteudo */

	jQuery(".conteudo-blog").append(cols);
	jQuery("#lista-categorias").append(colCategoria);
	jQuery(".pagination").append(paginizacao);



	/*console.log(arrayCategoria);*/

	var urlPageNum = $(location).attr('href').split('=');
    console.log(urlPageNum[1]);



});