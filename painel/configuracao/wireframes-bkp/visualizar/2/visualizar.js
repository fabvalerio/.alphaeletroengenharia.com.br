jQuery(document).ready(function($) {
	

	/* BLOG */

	console.log('conteudos');

	if( conteudo != '' ){

		var cols           = "";
		var valorRetornado = conteudo;
		var obj            = JSON.parse(valorRetornado);

		obj.forEach(function(o, index){

			cols += '<a href="'+o.url+o.pag_link+'" class="timeline">';
			cols += '<div class="timeline-icon"><i class="fa fa-globe"></i></div>';
			cols += '<div class="timeline-content">';
			cols += '<h3 class="title">'+o.pag_titulo+'</h3>';
			cols += '<p class="description">';
			cols += o.pag_mini_descricao;
			cols += '</p>';
			cols += '<p class="btn btn-link"><i class="fas fa-chevron-right"></i> Mais informações</p>';
			cols += '</div>';
			cols += '</a>';

		});

	}

	/*--------------------------------------------------------------------------------------------------*/

	/* Conteudo */

	jQuery(".main-timeline").append(cols);



});