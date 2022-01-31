<?

//iniciar sessão
@session_start();


/* ************************************************** */
/* HTTACCESS*/
/* ************************************************** */
$server = $_SERVER['SERVER_NAME'];

/* ************************************************** */
/* LINK */
/* ************************************************** */
$url      = "http://".$server."/landpages/";
$url_site = "http://".$server."/";

define('url', $url);

$endereco = $_SERVER ['REQUEST_URI'];
$urlCompleta = "http://" . $server . $endereco;
$verificarUrl = @explode('/', $urlCompleta);
$verificarUrlWWW =  @explode('.', $verificarUrl[2]);


//if( $verificarUrlWWW[0] == 'www'){ echo '<meta http-equiv="refresh" content="0; '.$url.'">'; exit; }


//explode link por "/" começando com o "0" .."1" .. "2" ... ... "20"
$link = explode('/', $_GET['page']);