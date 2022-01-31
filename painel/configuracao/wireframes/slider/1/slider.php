<?

$slider = new db();
$slider->query( "SELECT *
 FROM     banner
 ORDER BY ban_id DESC" );
//$slider->execute();

if( !empty($slider->execute() )){

  ?>

  <div id="carousel-slider" class="carousel slide wow bounceInUp" data-ride="carousel">
    <ol class="carousel-indicators">
      <? for($i=0; $i<$slider->num_linha; $i++){ ?>
        <li data-target="#carousel-slider" data-slide-to="<? echo $i; ?>" <? if($i == '0' ){ echo 'class="active"'; }?>></li>
      <? } ?>
    </ol>

    <div class="carousel-inner" role="listbox">

      <?
      $aux = 0;
      foreach( $slider->row() AS $row ){
        ?>
        <div class="carousel-item <? if($aux == '0' ){ echo 'active'; }?>"  role="listbox"  style="background-image: url('painel/images/fotos-banner/<? echo $row['ban_id']; ?>/g/<? echo $row['ban_capa']; ?>');">

          <? if( !empty($row['ban_link']) ){?>
            <a href="<? echo $row['ban_link']; ?>" title="<? echo $row['ban_titulo']; ?>">
            <? } ?>
            <div class="container">
            <div class="row container-slide">
              <div class="col-lg-8 align-self-center text-slider">
                <? if( !empty($row['ban_titulo']) ){?><h2><? echo $row['ban_titulo']; ?></h2><? }?>
                <? if( !empty($row['ban_descricao']) ){?><p><? echo $row['ban_descricao']; ?></p><? }?>
              </div>
              <div class="col-lg-4 align-self-center text-slider">
                <? if( !empty($row['ban_include']) ) include( 'pages/'.$row['ban_include'] );?>
              </div>
            </div>
            </div>

            <? if( !empty($row['ban_link']) ){?>
            </a>
          <? } ?>

        </div>
        <?
        $aux++;
      }
      ?>

      <a class="carousel-control-prev" href="#carousel-slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>

  </div>

  <? } ?>