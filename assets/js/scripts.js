
$(function() {


	/* JSON MENU */
	if( menu != '' ){
		var m = JSON.parse(menu);

		if( m.menu_descricao  == '' ){ $('#menu_descricao').hide();  }else{ $('#menu_descricao').html(m.menu_descricao); }
		if( m.menu_titulo	  == '' ){ $('#menu_titulo').hide();     }else{ $('#menu_titulo').html(m.menu_titulo); }
		if( m.menu_mini_texto == '' ){ $('#menu_mini_texto').hide(); }else{ $('#menu_mini_texto').html(m.menu_mini_texto); }
	}

	$('.dropdown-submenu .dropdown-item').on("click", function(e){
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
	});

	$('#form-busca-nav').submit(function() {
		var q = $('#q').val();
		window.location = "<? echo $url?>busca&q="+q;
		return false;
	});


	/* imagem */
	var CapaImagem = "../../assets/images/sem_imagem.jpg";
	$('.capa').on("error", function() {
		$(this).attr('src', CapaImagem);
	});

	/* formularios */
	$(".formulario").submit(function( event ) {

		$.ajax({
			url: "send-email.php", 
			type : 'post',
			data: $(this).serialize(),
			success: function(result){
				$('.result-formulario').html(result);
			}});

		event.preventDefault();
	});

	/* newsletter */
	$(".news").submit(function( event ) {
		$.ajax({
			url: "send-email.php", 
			type : 'post',
			data: $(this).serialize(),
			success: function(result){
				$('.result-formulario').html(result);
			}});

		event.preventDefault();
	});

	/* newsletter */
	$(".buscablog").submit(function( event ) {
		window.location.assign("blog&q="+$('#q').val());
		event.preventDefault();
	});

	/* news blog */
	$(".newsblog").submit(function( event ) {
		$.ajax({
			url: "send-email.php", 
			type : 'post',
			data: $(this).serialize(),
			success: function(result){
				$('.result-formulario').html(result);
			}});

		event.preventDefault();
	});

	/* informativo */
	$(".informativo").submit(function( event ) {
		$.ajax({
			url: "send-email.php", 
			type : 'post',
			data: $(this).serialize(),
			success: function(result){
				$('.result-formulario').html(result);
			}});

		event.preventDefault();
	});

	/* calculadora */
	$(".calculadora").submit(function( event ) {
		$.ajax({
			url: "send-email.php", 
			type : 'post',
			data: $(this).serialize(),
			success: function(result){
				$('.result-formulario').html(result);
			}});

		event.preventDefault();
	});

	/* SLIDER */
	$('.carousel').carousel({
		interval: 2000
	});


	/* ---------------------------------------------------------------------------------------------------------------------------------------------- */
	
});


/*
--
-- Função para mater a sequencia dos DIVs do mesmo tamanho, pegando o maior!
--
--  Como usar?
--  window.onload = function(){ DivAltura('.card-box'); }
--
*/

function DivAltura(div){
	var q = jQuery(div).length;
	if( q > 1 ){
		var list = new Array();
		list[0] = 0;
		for(i=1; i<=q; i++){
			if( jQuery(div+':eq('+i+')').height() > 0 )
				list[i] = jQuery(div+':eq('+i+')').height();
		}
		var t = Math.max.apply(null, list);
		jQuery(div).css({  'height': t });
	}
}	

/* ---------------------------------------------------------------------------------------------------------------------------------------------- */

