
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="<? echo $url ?>painel/logo/favicon/logo.png" />

<link rel="canonical" href="<? echo "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI] ?>" />

 

<!-- // GOOGLE WEBMASTER // -->
<? if( !empty($jsonConf->c_google_webmaster) ){ ?>
<meta name="google-site-verification" content="<? echo $jsonConf->c_google_webmaster;?>" />
<? } ?>

<?
/* ROUTE: assets/php/db-counteudo.php */
if( !empty($__menuJson) AND $__pt > 1 ){
	/* VISUALIZAR */
	?>
	<title><? echo $__menuRow->menu_titulo;?> | <? echo $jsonConf->c_nome ?></title>
	<meta name="description" content="<? echo $__menuRow->menu_mini_texto; ?>">
	<meta name="keywords" content="<? echo $__menuRow->menu_keyworks?>">
	<meta property="og:title" content="<? echo $__menuRow->menu_titulo; ?>">
	<meta property="og:description" content="<? echo $__menuRow->menu_mini_texto;?>">
	<meta property="og:image" content="<? echo $url.'painel/images/fotos-menu/'.$__menuRow->menu_id.'/g/'.$__menuRow->menu_capa; ?>">
	<meta property="og:image:alt" content="<? echo $__menuRow->menu_mini_texto; ?>" />
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:site_name" content="<? echo $jsonConf->c_nome ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<? echo "https://www.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI] ?>" />

	<script type="application/ld+json">
    {
      "@context": "http://schema.org", "@type": "NewsArticle", "headline": "<? echo $__menuRow->menu_titulo;?> | <? echo $jsonConf->c_nome ?>",
      "image": ["<? echo $url.'painel/images/fotos-menu/'.$__menuRow->menu_id.'/g/'.$__menuRow->menu_capa; ?>"],"datePublished": "2015-02-05T08:00:00+08:00"
    }
    </script>

	<?
}elseif( $__pt == 1 ){
	/* VER */
	/*print_r($__SEO);*/
	?>
	<title><? echo $__SEO['pag_titulo'];?> | <? echo $jsonConf->c_nome ?></title>
	<meta name="description" content="<? echo $__SEO['pag_mini_descricao'] ?>">
	<meta name="keywords" content="<? echo $__SEO['pag_keyworks'] ?>">
	<meta property="og:title" content="<? echo $__SEO['pag_titulo'] ?>">
	<meta property="og:description" content="<? echo $__SEO['pag_mini_descricao'] ?>">
	<meta property="og:image" content="<? echo $url.'painel/images/fotos-paginas/'.$__SEO['pag_id'].'/g/'.$__SEO['pag_capa']; ?>">
	<meta property="og:image:alt" content="<? echo $__SEO['pag_mini_descricao']; ?>" />
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:site_name" content="<? echo $jsonConf->c_nome ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<? echo "https://www.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI] ?>" />

	<script type="application/ld+json">
    {
      "@context": "http://schema.org","@type": "NewsArticle","headline": "<? echo $__SEO['pag_titulo'];?> | <? echo $jsonConf->c_nome ?>",
      "image": ["<? echo $url.'painel/images/fotos-paginas/'.$__SEO['pag_id'].'/g/'.$__SEO['pag_capa']; ?>"],"datePublished": "2015-02-05T08:00:00+08:00"
    }
    </script>

	<?
}else{
	/* HOME */

	$pageview = empty($link[0]) ? 'home' : $link[0];

	$__dbSEO = new db();
	$__dbSEO->query( "SELECT * FROM seo WHERE seo_pagina = '{$pageview}'" );
	$__dbSEO->execute();
	$__dbSEO_row = $__dbSEO->object();

	$capa = 'painel/images/fotos-seo/'.$__dbSEO_row->pag_id.'/g/'.$__dbSEO_row->pag_capa;

	/* SE CAPA NÃO EXISTE*/
	if( !is_file($capa) ){
		$capa = 'img-facebook.jpg';
	}

	?>
	<title><? echo $__dbSEO_row->seo_titulo;?> | <? echo $jsonConf->c_nome ?></title>
	<meta name="description" content="<? echo preg_replace("@\n@","", $__dbSEO_row->seo_descricao) ?>">
	<meta name="keywords" content="<? echo preg_replace("@\n@","", $__dbSEO_row->seo_key) ?>">
	<meta property="og:title" content="<? echo preg_replace("@\n@","", $__dbSEO_row->seo_titulo) ?>">
	<meta property="og:description" content="<? echo preg_replace("@\n@","", $__dbSEO_row->seo_descricao) ?>">
	<meta property="og:image" content="<? echo $url.$capa ?>">
	<meta property="og:image:alt" content="<? echo $__dbSEO_row->seo_descricao; ?>" />
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:site_name" content="<? echo $jsonConf->c_nome ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<? echo "https://www.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI] ?>" />

	<script type="application/ld+json">
    {
      "@context": "http://schema.org", "@type": "NewsArticle", "headline": "<? echo $__dbSEO_row->seo_titulo;?> | <? echo $jsonConf->c_nome ?>",
      "image": ["<? echo $url.$capa ?>"],"datePublished": "2015-02-05T08:00:00+08:00"
    }
    </script>

	<?
}
?>

<meta name="robot" content="All">
<meta name="rating" content="general">
<meta name="distribuition" content="global">
<meta name="language" content="PT">
<meta name="author" content="WebFreelancer"> 
<meta name="robots" content="index,follow">


<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
