<?php

ini_set('max_execution_time', '60'); //Raise to 512 MB
ini_set('memory_limit', '512M'); //Raise to 512 MB

class Redimensiona{
	
	public function Redimensionar($imagem, $type, $tmp, $largura, $pasta){
		
		$name = md5($imagem);
		
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
			$local="$pasta/$name".".jpg";
			imagejpeg($nova, $local);
		}else if ( $type =="image/gif"){
			$local="$pasta/$name".".gif";
			imagegif($nova, $local);
		}else if ( $type =="image/png"){
			$local="$pasta/$name".".png";
			imagepng($nova, $local);
		}		
		
		imagedestroy($img);
		imagedestroy($nova);	
		
		return $local;
	}
}
?>