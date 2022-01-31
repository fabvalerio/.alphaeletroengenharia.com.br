<?
include('assets/php/htaccess.php');
include('assets/php/jsonConf.php');
?>


<div class="navbar-topo wow bounceInDown" data-wow-delay=".5s">
  <div class="<? echo $jsonConf->c_menu_largura ?>">

    <nav class="navbar navbar-expand-lg nav-top d-sm-flex justify-content-center">
      <a class="navbar-brand" href="<? echo $url; ?>">
        <img src="<? echo $url ?>painel/logo/principal/logo.png" class="img-fluid logo-principal" alt="<? echo $jsonConf->c_nome ?>">
      </a>
      <button class="navbar-toggler mx-2" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">


        <ul class="nav navbar-nav <? echo $jsonConf->c_menu_direcao ?>">

          <!-- Menu FIxo  -->
          <li class="nav-item <? if( empty($link[0]) ) echo 'active' ?> dropdown">
            <a href="<? echo $url; ?>" class="nav-link" <? echo $__NavDropData;?>>
              Home
            </a>
          </li>

          <?
          /*MENU*/
          $__navMenu = new db();
          $__navMenu->query( " SELECT DISTINCT menu.menu_id, 
           menu.menu_titulo, 
           menu.menu_link, 
           paginas.menu_menu_id, 
           menu.menu_sem_categoria
           FROM        menu
           INNER JOIN  paginas
           ON          paginas.menu_menu_id = menu.menu_id
           WHERE       menu.menu_status = '1' 
           AND         paginas.menu_menu_id IS NOT NULL
           ORDER BY    menu.menu_order ASC " );
          $__navMenu->execute();

          /*LISTA MENU*/
          if( !empty($__navMenu->rowCount()) ){
            foreach( $__navMenu->row() AS $__navMenuRow ){

              /*Conf*/
              $__NavMenuHref   = !empty( $__navMenuRow['menu_redirecionar'] ) ? $__navMenuRow['menu_redirecionar'] : $url.$__navMenuRow['menu_link'] ;

              if( $__navMenuRow['menu_sem_categoria'] != '1' ){
                $__NavDropClass = 'dropdown-toggle';
                $__NavDropData  = 'data-toggle="dropdown" data-submenu=""';
              }

              /*Categoria*/
              $__navCat = new db();
              $__navCat->query( "SELECT DISTINCT paginas_categoria.cat_id, 
                paginas_categoria.cat_titulo, 
                paginas_categoria.cat_link, 
                paginas_categoria.cat_menu,  
                paginas.categoria_cat_id
                FROM        paginas_categoria 
                INNER JOIN  paginas
                ON          paginas.categoria_cat_id = paginas_categoria.cat_id
                WHERE       paginas_categoria.cat_status = '1' 
                AND         paginas_categoria.cat_menu = '{$__navMenuRow['menu_id']}'
                ORDER BY    paginas_categoria.cat_titulo ASC" );
              $__navCat->execute();

              /*Se categoria for vazia, tirar o dropdown*/
              if( empty($__navCat->rowCount()) ){
                $__NavDropData = '';
                $__NavDropClass = '';
              }
              ?>

              <!--  MENU  -->
              <li class="nav-item <? if( $link[0] == $__navMenuRow['menu_link'] ) echo 'active';?> dropdown">
                <a href="<? echo $__NavMenuHref; ?>" class="nav-link <? echo $__NavDropClass; ?>" <? echo $__NavDropData;?>>
                  <? echo $__navMenuRow['menu_titulo'] ?>
                </a>

                <?
                /*MENU ANULA A CATEGORIA*/
                if( $__navMenuRow['menu_sem_categoria'] != '1' ){
                  if( $__navCat->rowCount() > 0 ){
                    ?>

                    <!--  CATEGORIA  -->
                    <ul class="dropdown-menu">

                      <?
                      /*LISTA CATEGORIA*/
                      foreach( $__navCat->row() AS $__navCatRow ){

                        /*SUBCATEGORIA*/
                        $__navSubCat = new db();
                        $__navSubCat->query( "SELECT DISTINCT sub.sub_id, 
                          sub.categoria_cat_id, 
                          sub.sub_link,
                          sub.sub_titulo,  
                          paginas.subcategoria_sub_id
                          FROM        paginas_subcategoria as sub
                          INNER JOIN  paginas
                          ON          paginas.subcategoria_sub_id = sub.sub_id
                          WHERE       sub.categoria_cat_id = '{$__navCatRow['cat_id']}'
                          AND         paginas.subcategoria_sub_id <> '0'
                          ORDER BY    sub.sub_titulo ASC" );
                        $__navSubCat->execute();


                        /*conf*/
                        $__LinkCatHref = $url.$__navMenuRow['menu_link'].'/categoria/'.$__navCatRow['cat_link'];
                        if( !empty($__navSubCat->rowCount()) ) $__NavDropClassSub = 'dropdown-submenu';
                        if( !empty($__navSubCat->rowCount()) ) $__NavDropClassSubMenu = 'dropdown-menu';

                        ?>
                        <li class="<? echo $__NavDropClassSub; ?>">
                          <? if($__NavDropClassSub != 'dropdown-submenu'){ ?>
                            <a class="dropdown-item" href="<? echo $__LinkCatHref; ?>">
                            <? }else{ ?>
                              <div class="dropdown-item d-flex justify-content-center">
                              <? } ?>
                              <? echo $__navCatRow['cat_titulo']?>
                              <? if($__NavDropClassSub != 'dropdown-submenu'){ ?>
                              </a>
                            <? }else{ ?>
                              <i class="fas fa-caret-right ml-auto"></i>
                            </div>
                          <? } ?>

                          <? 
                          /* Se a subcategoria tiver vazia, ocultar*/
                          if( !empty($__navSubCat->rowCount()) ){
                            ?>

                            <!--  SUBCATEGORIA  -->
                            <ul class="<? echo $__NavDropClassSubMenu; ?>">

                              <?
                              foreach( $__navSubCat->row() AS $row ){
                                /*conf*/
                                $__LinkSubHref = $url.$__navMenuRow['menu_link'].'/subcategoria/'.$row['sub_link'].'/'.$__navCatRow['cat_link'];
                                ?>
                                <li><a href="<? echo $__LinkSubHref; ?>" class="dropdown-item-sub dropdown-item"><? echo $row['sub_titulo'] ?></a></li>
                                <?
                                /*LIMPAR*/
                                $__LinkSubHref  = '';
                              }
                              ?>
                            </ul>
                            <?
                          }
                          ?>
                        </li>
                        <?

                        /*LIMPAR*/
                        $__LinkCatHref     = '';
                        $__NavDropClassSub = '';
                      }
                      ?>
                    </ul>
                    <?
                  }
                }
                ?>
              </li>
              <?
              /*LIMPAR*/
              $__NavDorpClass = '';
              $__NavDropData  = '';

            }
          }
          ?>

          <!-- Menu FIxo  -->

        </ul>
      </div>
      <? if( $jsonConf->c_busca == '1' ){ ?>
        <form class="form-inline my-2 my-lg-0" id="form-busca-nav" method="post" action="<? echo $url;?>busca">

          <div class="input-group mb-2 mr-sm-2 mb-sm-0">

            <div class="input-group">
              <input type="text" class="form-control" name="q"  id="q" autocomplete="off" placeholder="busca r&aacute;pida" aria-describedby="busca_q" required value="<? echo $_POST['q']?>">
              <div class="input-group-prepend">
                <span class="input-group-text py-0" id="busca_q">
                  <button class="btn btn-link m-0 p-0" id="btn-busca-nav" type="submit"><i class="fa fa-search text-white"></i></button>
                </span>
              </div>
            </div>

          </div>
        </form>
      <? } ?>
    </nav>

  </div>
</div>