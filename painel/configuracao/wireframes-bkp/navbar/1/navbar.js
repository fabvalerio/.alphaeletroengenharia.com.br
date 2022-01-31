

/* verificar se existe capa */
function is_img(file) {
	var img = new Image();
	img.src = file;
	img.onload = function() {
		jQuery('.navbar-topo').css({'background-image':'url('+file+')', 
			'background-position':'top left',
			'height':'300px',
			'padding-top':'95px'});
	}
}


if( menu != '' ){
	var obj = JSON.parse(menu);
	is_img(obj.menu_capa)
}