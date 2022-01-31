<?

ob_start();
session_start();

include('php/db.class.php');
include('php/function.php');
include('php/htaccess.php');
include('php/deletapasta.php');

/*Validar Usuurio*/
if( empty( $_COOKIE['user_id'] ) )
{
 echo '<meta http-equiv="refresh" content="0;URL='.$url.'login.php">';
 exit;
}

/*configuração*/
$__configSql = "SELECT * FROM configuracao WHERE tipo = 'conf'";
$__config = new db();     
$__config->query($__configSql);
$__config->execute();
$result__config = $__config->object();
$result__config->estruturacao;
$jsonConf = json_decode($result__config->estruturacao);

include('php/acentos.php');
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Painel Administrativo </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<? echo $url; ?>assets/bootstrap/4.1.3/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <script src="<? echo $url; ?>js/jquery-3.3.1.min.js"></script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<? echo $url; ?>images/estrutura/Icone.png" />

  <!-- *** LESS *** -->
  <?
  $PastaStyle = 'assets/less/';
  $arq_Style = glob("$PastaStyle{*.less,*.css,*.sass}", GLOB_BRACE);
  foreach ($arq_Style as $Style){
    $ExtStyle = @end( @explode('.', $Style) );
    echo '<link href="'.$url.$Style.'" rel="stylesheet/'.$ExtStyle.'">'."\n";
  }
  ?>
  <script src="<? echo $url; ?>js/less.js"></script>


  <!-- *** SCRIPT *** -->
  <script>
    function url(site)
    {
      window.location = '<?=$url?>'+site;
    }

    function imgError(image) {
      image.onerror = "";
      image.src = "<?=$url?>assets/img-produto.png";
      return true;
      /*Aplicaзгo: onerror="imgError(this);"*/
    }
  </script>

  <!-- <link href="<? echo $url; ?>assets/status-toggle/bootstrap-toggle.css" rel="stylesheet">
  <script src="<? echo $url; ?>assets/status-toggle/bootstrap-toggle.min.js"></script> -->

  <!-- *** DATE INPUT *** -->
  <!-- 
  <link href="<? echo $url; ?>assets/data/assets/assets/css/bootstrap-datepicker.css" rel="stylesheet" />
  <script src="<? echo $url; ?>assets/data/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
   -->
  <!-- *** DATE REJECT *** -->

  <!--
  <link href="<? echo $url; ?>assets/jReject-master/css/jquery.reject.css" rel="stylesheet">
  <script src="<? echo $url; ?>js/jquery.reject.js" type="text/javascript"></script>
  <script>
    jQuery(document).ready(function() {

      jQuery.reject({
        reject: { 
              safari: true, // Apple Safari
              chrome: false, // Google Chrome
              firefox: true, // Mozilla Firefox
              msie: true, // Microsoft Internet Explorer
              opera: true, // Opera
              konqueror: true, // Konqueror (Linux)
              unknown: true // Everything else
              /*all: true*/ 
              }, // Reject all renderers for demo

              display: ['chrome'],
              header: 'ATEN&Ccedil;&Atilde;O', // Header Text
              paragraph1: 'Este navegador n&atilde;o &eacute; compat&eacute;vel com painel administrativo !', // Paragraph 1
              paragraph2: 'Por favor, acesse pelo navegadoor Google Chrome do seu computador ou instale, link abaixo...',
              closeMessage: 'O painel possui uma tecnologia na programa&ccedil;&atilde;o avan&ccedil;ada (CSS3/LESS/SASS e jQuery), onde somente o navegador pedido &eacute; compat&iacute;vel!' // Message below close window link
          }); // Customized Text

      return false;
    });


  </script>
-->


<!-- 
  <link rel="stylesheet" href="<? echo $url; ?>assets/js/bootstrap-select.css">
  <script src="<? echo $url; ?>assets/js/bootstrap-select.js" defer></script>
  <? include('php/icones.php'); ?> -->
</head>
<body >
  <div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">

      <div class="col-md-3 col-lg-2 sidebar-offcanvas px-0 m-0" id="sidebar" role="navigation">
       <? include('includes/#menu2.php'); ?>
     </div>
     <!--/col-->
     <div class="col-md-9 col-lg-10 main">
      <? include('includes/#nav.php'); ?>
      <div class="px-4">
        <? include($paginaExibi);?>
      </div>
    </div>
    <!--/main col-->
  </div>
</div>


  <script src="<? echo $url; ?>assets/bootstrap/4.1.3/popper.min.js"></script>
  <script src="<? echo $url; ?>assets/bootstrap/4.1.3/bootstrap.min.js"></script>
  <!--scripts loaded here-->
  <script src="<? echo $url; ?>js/tether.js"></script>
  <script src="<? echo $url; ?>js/scripts.js"></script>

</body>
</html>