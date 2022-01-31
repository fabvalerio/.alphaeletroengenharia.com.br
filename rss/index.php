<?

date_default_timezone_set('America/Sao_Paulo');


include('../painel/php/db.class.php');
include('../assets/php/htaccess.php');
include('../painel/php/acentos.php');
include('../assets/php/jsonConf.php');
//include('../painel/php/data.php');
//include('../assets/php/tags.php');
include('../painel/php/funcaoStringParaBusca.php');
//include('../assets/php/capa.php');



// *******************************************************
// *** DESCRIÇÂO TEXTO DB
// *******************************************************
function descricao($texto){


  //LISTAR ARQUIVOS NA PASTA
  $page_dir = '../includes_srt_replace';
  $pages_includes = glob($page_dir."/{*.php}", GLOB_BRACE);

  //Validar pasta existente
  if( is_dir($page_dir) ){

    //validar arqvivos existente
    if( !isset($pages_includes) ){

      //Criar lista
      foreach( $pages_includes as $valPages ){

        //limpar caminho da pasta
        $valPages = @end( @explode('/', $valPages) );
        
        //Limpar nome
        $newName = strtolower('{{'.@current( @explode('.', $valPages)).'}}');

        //CRIAR ARRAY NOME
        $array_includeName[] = $newName;

        // CARREGAR INCLUDE PARA ARRAY
        ob_start();
        include($page_dir.'/'.$valPages);
        $str_include = ob_get_clean();

        //CRIAR ARRAY INCLUDE
        $array_includeFile[] = '';

      }
    }
  }

  //SUBISTITUIR CAMINHO DE IMAGENS ARMAZENADA NO PAINEL
  $char_bd  = array('../../../', '../../');
  $char_sub = array($url.'painel/', $url.'painel/');
  $char_txt = str_replace($char_bd, $char_sub, $texto);

  // SUBSTITUIR {{FILE}} PELO CAMINHO CORRETO
  $include_txt = str_replace($array_includeName, $array_includeFile, $char_txt);

  return $include_txt;
}


// *******************************************************
// *** DB
// *******************************************************

if( !empty($_GET['pid']) ){ $__id = "pag_id = '".$_GET['pid']."' "; }else{ $__id = " menu_menu_id = '9' "; }

$SQL = "SELECT pag_titulo, pag_id, menu_menu_id, pag_capa, pag_texto, pag_link, pag_mini_descricao, pag_keyworks
  FROM paginas 
  WHERE ".$__id.
  "ORDER BY paginas.pag_id DESC";

$vis = new db();
$vis->query( $SQL );
$vis->execute();
$row = $vis->object();

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>

<!--
  @COPYRIGHT - WebFreelancer
  By Fabio Valerio
-->

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<!-- FAVICON -->
<link rel="icon" type="image/png" href="<? echo $url ?>painel/logo/favicon/logo.png">
<link rel="stylesheet" href="<? echo $url ?>assets/css/bootstrap.min.css">
<script src="<? echo $url;?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<? echo $url ?>assets/js/popper.min.js"></script>
<script src="<? echo $url ?>assets/js/bootstrap.min.js"></script>

<!-- 
  // BIBLIOTECA MASCARA
-->


<? if( !empty($_GET['pid'] ) ){ ?>
  <title><? echo $row->pag_titulo;?></title>
  <meta name="description" content="<? echo $row->pag_mini_descricao;?>">
  <meta name="keywords" content="<? echo $row->pag_keyworks?>">
  <meta property="og:title" content="<?=utf8_encode($row->pag_titulo)?>">
  <meta property="og:description" content="<?=utf8_encode($row->pag_mini_descricao)?>">
  <meta property="og:image" content="<? echo $url; ?>painel/images/fotos-paginas/<? echo $row->pag_id.'/m/'.$row->pag_capa?>">
  <meta property="og:url" content="<?=$jsonConf->c_site?>/<?=$row->pag_link?>">
  <meta property="og:type" content="website" /> 
  <meta property="og:site_name" content="WebFreelancer">
  <meta property="og:locale" content="pt_BR">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="500">
  <meta property="og:image:height" content="500">
<? }?>

<meta name="theme-color" content="#003E93">

<script>

// CAPA
var CapaImagem = "<? echo $url; ?>assets/images/sem_imagem.jpg";
jQuery("img").error(function() {
  jQuery(this).unbind("error").attr("src", CapaImagem);
});

</script>

<? 

  // CAPA
$__pasta = '../painel/images/fotos-paginas/';

$lista_pasta['p'] = $__pasta.$row->pag_id.'/p/';
$lista_pasta['m'] = $__pasta.$row->pag_id.'/m/';
$lista_pasta['g'] = $__pasta.$row->pag_id.'/g/';

$capa = $lista_pasta['m'].$row->pag_capa;

$listar = 'm';
?>


</head>

<body>

  <?
  if( !empty($_GET['pid'] ) ){
    ?>
    <table class="table" width="600" style="width: 600px; margin: 0 auto; font-size: 12px; font-family: verdana;" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td style="padding: 15px 0">
          <center>
            <img src="<? echo $url; ?>painel/logo/principal/logo.png?<? echo date('Ymdhis'); ?>" alt="<? echo $conf->c_nome?>" style="display:block; max-height: 150px">
          </center>
        </td>
      </tr>

      <tr>
        <td>
          <p>
            <h1>
              <? echo $row->pag_titulo;?>
            </h1>
          </p>
        </td>
      </tr>

      <? 
      if( is_file($capa) ){ 
        ?>
        <tr>
          <td>
            <img src="<? echo $url.str_replace('../', '', $capa); ?>" alt="Capa" style="max-width: 100%;">
          </td>
        </tr>
        <?
      }
      ?>

      <tr>
        <td>
          <? echo descricao($row->pag_texto); ?>
        </td>
      </tr>


      <tr>
        <td>
          Gostou do nosso post? Então, <a href="<? echo $jsonConf->c_site ?>/blog">acesse nosso blog</a> e fica por dentro de tudo que acontece no mundo da contabilidade!
        </td>
      </tr>


      <tr>
        <td>
          <p style="background-color: #ccc; padding: 10px;" align="center">
            (c) <? echo date('Y') ?> • Todos os direitos reservados a <? echo $jsonConf->c_nome ?>
          </p>
        </td>
      </tr>

      <tr>
        <td align="center">
          <a href="<? echo $jsonConf->c_site ?>"><? echo $jsonConf->c_nome ?></a>
        </td>
      </tr>

    </table>
    <?
  }else{

    ?>
    <div class="card m-5">
    <div class="card-body">
      <h1 class="display-4"><? echo $jsonConf->c_nome ?></h1>
    <table class="table-striped table-hover w-100">

        <?    
        foreach($vis->row() AS $row){
          ?>
          <tr>
            <td class="p-2">
            <a href="?pid=<? echo $row['pag_id']?>" class="btn-link p-2">
              <span class="badge badge-pill badge-danger"><? echo $row['pag_id']?></span> <? echo $row['pag_titulo']?>
            </a>
            </td>
          </tr>
          <? 
        }
        ?>
      </table>
    </div>
    </div>

    <?


  }
  ?>

  </body>
  </html>

  <?php ob_end_flush(); ?>