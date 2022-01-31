<?

  ini_set('max_execution_time', '60'); //Raise to 512 MB
  ini_set('memory_limit', '512M'); //Raise to 512 MB
    include('../php/Redimensiona.php');


    /*criar pasta   */
    
    @mkdir( 'images', 0777 );
    @chmod( 'images', 0777 );
    
    $__pastaFotos = '../images/fotos-banner/';

    $PixelTamanhos = array( "p" => 350, "600" => 600, "m" => 800, "g" => 1400, "1900" => 1900 );
    
    @mkdir( $__pastaFotos, 0777 );
    @chmod( $__pastaFotos, 0777 );
    @mkdir( $__pastaFotos.'original', 0777 );
    @chmod( $__pastaFotos.'original', 0777 );
    @mkdir( $__pastaFotos.$_GET['pid'], 0777 );
    @chmod( $__pastaFotos.$_GET['pid'], 0777 );

    foreach( $PixelTamanhos AS $_SizeName => $_Size ){

        @mkdir( $__pastaFotos.$_GET['pid'].'/'.$_SizeName, 0777 );
        @chmod( $__pastaFotos.$_GET['pid'].'/'.$_SizeName, 0777 );
    }
    
    /*   ------------------------------------------------------------------   */

    for( $i=0; $i<count($_FILES['file']); $i++ )
    {
      if( !empty($_FILES['file']['name'][$i]) )
      {
        
        $foto = $_FILES['file']['name'][$i];  
        $type = $_FILES['file']['type'][$i];
        $tmp  = $_FILES['file']['tmp_name'][$i];
        $redim = new Redimensiona();

    foreach( $PixelTamanhos AS $_SizeName => $_Size ){
        $src=$redim->Redimensionar($foto, $type, $tmp, $_Size, $__pastaFotos.$_GET['pid'].'/'.$_SizeName);
    }

        header('Content-type: application/json');
        echo json_encode([]);
        http_response_code(200);

        }
    }
    
?>


