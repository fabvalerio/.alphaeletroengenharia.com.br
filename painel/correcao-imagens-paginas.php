<?

  ini_set('max_execution_time', '600'); 
  ini_set('memory_limit', '5012M');


$dir = 'images/fotos-paginas';

function LerPasta($Pasta){ 


    $PixelTamanhos["p"] = 350;
    $PixelTamanhos["600"] = 600;
    $PixelTamanhos["m"] = 800;
    $PixelTamanhos["g"] = 1400;
    $PixelTamanhos["1900"] = 1900;


	$LerDiretorio = opendir($Pasta) or die('Erro');
	while($Entry = @readdir($LerDiretorio)) { 

		if( !strstr($Entry, '#') ){
			if(is_dir($Pasta.'/'.$Entry)&& $Entry != '.' && $Entry != '..') { 
				echo '<ul>';
				echo '<li><b>Pasta: </b>'.$Entry."";
				LerPasta($Pasta.'/'.$Entry);
				echo '</li>';
				echo '</ul>';
			} else { 
				if( $Entry != '..' && $Entry != '.' ){
					echo '<ul>';
					echo '<li>';
					echo $Pasta.'/'.$Entry;
					echo '</li>';
					echo '</ul>';

					if( @end(@explode('/', $Pasta)) == 'g' ){
                       echo '<li><i>Gerar novo imagem</i>';

                       $PASTANOVA = substr($Pasta, 0, -1);

                       echo $ext =  @end(@explode('.', $Entry) );

                       if( $ext  == 'jpg' ){


						    /*CRIA PASTA*/
						    foreach( $PixelTamanhos AS $_SizeName => $_Size ){

						        @mkdir( $PASTANOVA.'/'.$_SizeName, 0777 );
						        @chmod( $PASTANOVA.'/'.$_SizeName, 0777 );

						        /* Agora vai*/

										$imagem = $Pasta.'/'.$Entry;
										$type = 'image/jpeg';
										$tmp = $Pasta.'/'.$Entry;
										$largura = $_Size;
										$pasta = $PASTANOVA.'/'.$_SizeName;
										$name = ($Entry);
										
										if ( $type =="image/jpeg"){
											$img = imagecreatefromjpeg( $tmp );
										}else if ( $type =="image/gif"){
											$img = imagecreatefromgif( $tmp );
										}else if ( $type =="image/png"){
											$img = imagecreatefrompng( $tmp );
										}
										$x   = imagesx($img);
										$y   = imagesy($img);
										$autura = ($largura * $y)/$x;
										
										$nova = imagecreatetruecolor($largura, $autura);
								        
								        if ( $type =="image/png"){
										imagesavealpha($nova, true);
										$cor_fundo = imagecolorallocatealpha($nova, 0, 0, 0, 127);
										imagefill($nova, 0, 0, $cor_fundo);
										}

										imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $autura, $x, $y);
										
										if ( $type =="image/jpeg"){
											$local="$pasta/$name";
											imagejpeg($nova, $local);
										}else if ( $type =="image/gif"){
											$local="$pasta/$name";
											imagegif($nova, $local);
										}else if ( $type =="image/png"){
											$local="$pasta/$name";
											imagepng($nova, $local);
										}		
										
										imagedestroy($img);
										imagedestroy($nova);


						        echo '<li>Criado: '.$PASTANOVA.'/'.$_SizeName.' </li>';
						    }

						}

						$PASTANOVA = '';

					    echo '</li>';
					}
				}
			} 
		}

	} 
	closedir($LerDiretorio);
} 

LerPasta($dir);

?>