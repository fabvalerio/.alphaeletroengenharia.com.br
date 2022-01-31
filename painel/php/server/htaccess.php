<?

//iniciar sessão
//session_start();

 $Ip = @explode(':', $_SERVER['SERVER_ADDR']);
 if( empty( $Ip[0] ) ) $_SERVER['SERVER_ADDR'] = "localhost";

// paginas htaccess ----------------------------------------------------

//link
$url = "http://www.webfreelancer.com.br/teste/arquiteto/painel/";
define('url', $url);
define('urls', $url."!/");

//explode link por "/" começando com o "0" .."1" .. "2" ... ... "20"
$link = explode('/', $_GET['page']);

if( empty($link[0]) ){
$paginaExibi = "pages/home.php";
}
elseif( $link[0] == '!' ){
		
	if( is_file($link[1]) ){
		$paginaExibi = "_".$link[1].".php";
	}
	elseif( is_dir($link[1]) ){
		$paginaExibi = $link[1]."/".$link[2].".php";
	}
	else{
        $paginaExibi = "_404.php";
	}
	
}
elseif( $link[0] != '!' ){
   $paginaExibi = "_".$link[0].".php";
}
else
{
   $paginaExibi = "_404.php";
}
//--------------------------------------------------------------



///// FIM htacess------------------------------------------------
