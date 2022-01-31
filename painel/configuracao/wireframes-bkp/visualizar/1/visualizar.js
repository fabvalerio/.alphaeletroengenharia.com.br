jQuery(document).ready(function($) {
	

	/* BLOG */

		console.log('conteudos');

	if( conteudo != '' ){

		var cols           = "";
		var valorRetornado = conteudo;
		var obj            = JSON.parse(valorRetornado);

		obj.forEach(function(o, index){

			cols += '<div class="mb-5 col-lg-6">';
			cols += '<div class="mb-2 capa">';
			cols += '<img src="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/m/'+o.pag_capa+'" alt="'+o.cat_titulo+'" class="img-fluid capa">';
			cols += '</div>';
			cols += '<div>';
			cols += '<h5>'+o.pag_titulo+'</h5>';
			cols += '<small>'+o.cat_titulo+'</small>';
			cols += '<p>'+o.pag_data+'</p>';
			cols += '<a href="'+o.url+o.pag_link+'">leia-mais</a>';
			cols += '</div>';
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



});