<?

/* paginas htaccess ----------------------------------------------------*/
$server = $_SERVER['SERVER_NAME'];

if( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ) {
	$serverhttp = "https://";
}else{
	$serverhttp = "http://";
}

if( $_SERVER['SERVER_NAME'] == 'localhost' ){ /*SERVIDOR OFF*/
	$server = $_SERVER['SERVER_NAME'].":8080";
	$endereco = (@explode("/", $_SERVER['REQUEST_URI'])); 
	$url = $server."/".$endereco[1].'';
	$url = str_replace('/', '/', $url);
	$url = $serverhttp.$url.'/';

}else{ /*SERVIDOR ON*/

	$url = $serverhttp.$_SERVER['SERVER_NAME']."/";
}


define('url', $url);

/*explode link por "/" começando com o "0" .."1" .. "2" ... ... "20"*/
$link = explode('/', $_GET['page']);

/*verificar menu*/
$__menu = new db();
$__menu->query( "SELECT * FROM menu WHERE menu_link = '".$link[0]."'" );
$__menu->execute();
$RowMenu = $__menu->object();

/* ARMAZENAR*/
$_pid_pagina = $RowMenumenu_id;

define('menu_id', $_pid_pagina);
define('menu_menu', $RowMenumenu_menu);
define('menu_link', $RowMenumenu_link);

/* =============================	*/


  /*VERIFICAR LINK ANTIGO*/
  if( $link[1] == 'ver' ){

  	 $__veiricarUrlOld = new db();
  	 $__veiricarUrlOld->query("SELECT pag_link FROM paginas WHERE pag_id = '".$link[2]."'");
  	 $__veiricarUrlOld->execute();
  	 $rowURLold = $__veiricarUrlOld->object();
     echo '<meta http-equiv="refresh" content="0; '.$url.$rowURLold->pag_link.'">'; exit;
  }


/* =============================	*/


if( empty($RowMenumenu_link) ){
	if($link[0] == ""){
		$paginaExibi = "_home.php";
	}elseif(file_exists("_".$link[0].".php")){
		$paginaExibi = "_".$link[0].".php";
	}elseif(file_exists("paginas_fixas/".$link[0].".php")){
		$paginaExibi = "paginas_fixas/".$link[0].".php";
	}else{

		$paginaExibi = "404.php";
		/* FIM UNIDADES JSON */


	}
}




////* FIM htacess------------------------------------------------*/
