        <a class="navbar-brand" href="<? echo $url; ?>">
          DASHBOARD
        </a>

        <ul class="nav  flex-column nav-pills nav-stacked">

          <li class="nav-item">
           <a class="nav-link <? if( empty($link[1]) ) echo 'active'?>" href="<? echo $url;?>">
            <i class="fa fa-home"></i> Home
          </a>
        </li>

        <li  data-toggle="collapse" data-target="#products" class="collapsed active nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-cogs"></i>
            <span>Configura&ccedil;&otilde;es</span>
            <span style="float: right;"><i class="fa fa-plus"></i></span>
          </a>
        </li>

        <ul class="collapse" id="products">

          <? if( $_COOKIE['user_id'] == '1' ){?>
            <li class="nav-item">
             <a  class="nav-link <? if( $link[1] == 'menu' ) echo 'active'?>" href="<?=$url?>!/menu/visualizar">
              <i class="fa fa-angle-right"></i> Menu
            </a>
          </li>
        <? }?>

        <li class="nav-item">
         <a  class="nav-link <? if( $link[1] == 'banner' ) echo 'active'?>" href="<?=$url?>!/banner/visualizar">
          <i class="fa fa-angle-right"></i>  Banner
        </a>
      </li>

      <li class="nav-item">
       <a  class="nav-link <? if( $link[1] == 'pagina_home' ) echo 'active'?>" href="<?=$url?>!/pagina_home/visualizar">
        <i class="fa fa-home"></i> Home do site
      </a>
    </li>

    <? if(  $jsonConf->c_categoria == '1' ){ ?>
      <li class="nav-item">
       <a  class="nav-link <? if( $link[1] == 'paginas_categoria' ) echo 'active'?>" href="<?=$url?>!/paginas_categoria/visualizar">
        <i class="fa fa-angle-right"></i> Categoria P&aacute;ginas
      </a>
    </li>
  <? }?>

  <? if(  $jsonConf->c_subcategoria == '1' ){ ?>
    <li class="nav-item">
     <a  class="nav-link <? if( $link[1] == 'paginas_subcategoria' ) echo 'active'?>" href="<?=$url?>!/paginas_subcategoria/visualizar">
      <i class="fa fa-angle-right"></i> Subcategoria P&aacute;ginas
    </a>
  </li>
<? }?>

<li class="nav-item">
 <a  class="nav-link <? if( $link[1] == 'images-json' ) echo 'active'?>" href="<?=$url?>!/images-json/fotos">
  <i class="fa fa-angle-right"></i>  Biblioteca de Imagens
</a>
</li>

</ul>

<li class="nav-item">
 <a  class="nav-link <? if( $link[1] == 'paginas' ) echo 'active'?>" href="<?=$url?>!/paginas/visualizar">
  <i class="fas fa-paper-plane"></i> P&aacute;ginas
</a>
</li>

<li class="nav-item">
 <a  class="nav-link <? if( $link[1] == 'textos' ) echo 'active'?>" href="<?=$url?>!/textos/visualizar">
  <i class="fas fa-font"></i> Textos
</a>
</li>

<li class="nav-item">
 <a  class="nav-link <? if( $link[1] == 'contatos' ) echo 'active'?>" href="<?=$url?>!/contatos/visualizar">
  <i class="fa fa-envelope"></i> E-mails
</a>
</li>

<? if(  $jsonConf->c_news == '1' ){ ?>
  <li class="nav-item">
   <a  class="nav-link <? if( $link[1] == 'newsletter' ) echo 'active'?>" href="<?=$url?>!/newsletter/visualizar">
    <i class="fas fa-newspaper"></i> Newsletter
  </a>
</li>
<? }?>

<li class="text-white p-2 lead">
  <hr>
  Desenvolvedor
</li>

<? if(  $jsonConf->c_land == '1' ){ ?>
  <li class="nav-item">
   <a  class="nav-link <? if( $link[1] == 'landpage' ) echo 'active'?>" href="<?=$url?>!/landpage/visualizar">
    <i class="fa fa-sitemap"></i> LandPage
  </a>
</li>
<? }?>

<? if(  $jsonConf->c_seo == '1' ){ ?>
  <li class="nav-item">
   <a  class="nav-link <? if( $link[1] == 'seo' ) echo 'active'?>" href="<?=$url?>!/seo/visualizar">
    <i class="fas fa-puzzle-piece"></i> SEO
  </a>
</li>
<? }?>

<? if(  $jsonConf->c_css == '1' ){ ?>
  <li class="nav-item">
   <a  class="nav-link <? if( $link[1] == 'css' ) echo 'active'?>" href="<?=$url?>!/css/visualizar">
    <i class="fab fa-css3"></i> Editor CSS
  </a>
</li>
<? }?>

<? if(  $jsonConf->c_dev == '1' ){ ?>
  <li class="nav-item">
   <a  class="nav-link <? if( $link[1] == 'wireframes' ) echo 'active'?>" href="<?=$url?>!/wireframes/visualizar">
    <i class="fab fa-dev"></i> &Aacute;rea do Desenvolvedor
  </a>
</li>
<? }?>

</ul>