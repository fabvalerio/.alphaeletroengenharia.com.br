

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

		is_img(ver.url+'painel/images/fotos-paginas/'+ver.pag_id+'/g/'+ver.pag_capa, ver.pag_titulo);

	});
}


