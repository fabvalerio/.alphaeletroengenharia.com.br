<main id="content" role="main" class="">
  <article class="recipe-article">


    <div class="container">
      <div class="row">

        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<? echo $url ?>">Home</a></li>
              <li class="breadcrumb-item active menu_titulo" aria-current="page"></li>
            </ol>
          </nav>
        </div>

        <div class="col-12  d-flex align-items-center">
          <h1 class="menu_titulo"></h1>
          <p class=" ml-3 lead my-0" id="menu_descricao"></p>
        </div>

        <!-- ebook -->
        <div class="col-lg-12">
          <div class="row conteudo">
          </div>
        </div>

      </div>
    </div>

  </article>

</main>


<script>
  jQuery(document).ready(function($) {


    /* BLOG */

    if( conteudo != '' ){

      var cols           = "";
      var valorRetornado = conteudo;
      var obj            = JSON.parse(valorRetornado);

      obj.forEach(function(o, index){

        cols += '<div class="col-12">';
        cols += '<a href="'+o.url+o.pag_link+'"">';
        cols += '<picture>';
        cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/p/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 350px)"/>';
        cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/600/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 600px)"/>';
        cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/m/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 800px)"/>';
        cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/g/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 1400px)"/>';
        cols += '<source srcset="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/1900/'+o.pag_capa+'" alt="'+o.pag_titulo+'" media="(max-width: 1900px)"/>';
        cols += '<img src="'+o.url+'painel/images/fotos-paginas/'+o.pag_id+'/p/'+o.pag_capa+'" alt="'+o.pag_titulo+'" class="w-100 capa">';
        cols += '</picture>';
        cols += '<h2 class="my2">'+o.pag_titulo+'</h2>';
        cols += '<p class="text-justify">'+o.pag_mini_descricao+'</p>';
        cols += '</a>';
        cols += '<hr class="my-4">';
        cols += '</div>';

      });

    }
    jQuery(".conteudo").append(cols);

    /*--------------------------------------------------------------------------------------------------*/

    if( menu != "" ){
      var obj = JSON.parse(menu);

      obj.forEach(function(ver, index){

        jQuery("#menu_descricao").html(ver.menu_descricao);
        jQuery(".menu_titulo").html(ver.menu_titulo);

      });
    }

    /*--------------------------------------------------------------------------------------------------*/


  });

</script>