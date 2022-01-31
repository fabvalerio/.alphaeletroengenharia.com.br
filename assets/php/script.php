<?

function curl_get_file_contents($URL){

	$c = curl_init();
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_URL, $URL);
	$contents = curl_exec($c);
	curl_close($c);

	if ($contents) return $contents;
	else return FALSE;
}

/* WIREFRAMES */
function WireframesStyle($Arq, $pid ){

	$diretorio = 'painel/configuracao/wireframes/'.$Arq.'/'.$pid.'/'.$Arq;

	if( file_exists($diretorio.'.json') ){
		$Json = json_decode(file_get_contents($diretorio.'.json'));
		if( !empty( $Json ) ){
			foreach( $Json AS $key => $value ){
				$ArrayVal[] = trim($key);
				$ArrayContent[] = trim($value);
			}
			$ArrayVal[] = "\n";
			$ArrayVal[] = "\t";
			$ArrayVal[] = "\r";
			$ArrayContent[] = '';
		}
	}

	if( file_exists($diretorio.'.less') ){
		$result = str_replace( $ArrayVal, $ArrayContent, file_get_contents($diretorio.'.less'));
	}
	return "\n\n /* {$diretorio} */ \n ".$result;
}

/* JAVASCRIPT */
function WireframesJS($Arq, $pid, $url){

	$diretorio = 'painel/configuracao/wireframes/'.$Arq.'/'.$pid.'/'.$Arq.'.js';

	if( file_exists($diretorio) ){

		$lines = file ($diretorio);

		foreach ($lines as $line_num => $line) {
			$jslLine .=  ($line);
		}

		$result = '<script>'.$jslLine .'</script>';
	}
	echo $result;
}


/* SUBSTITUIR */

function StrReplace($link, $url = NULL){
	if( file_exists($link) ){

		$result = file_get_contents($link);
		$arrayColuna = [];
		$arrayResult = [];

		/* DB Texto */
		if( !strstr($link, '[[texto-') ){
			$__textos = new db();
			$__textos->query("SELECT * FROM textos");
			$__textos->execute();

			foreach( $__textos->row() AS $row ){
				$arrayColuna[] = '[[texto-'.$row['tex_id'].']]';
				$arrayResult[] = '<div id="texto-'.$row['tex_id'].'"><h3>'.$row['tex_titulo'].'</h3><div id="conteudo-'.$row['tex_id'].'">'.$row['tex_texto'].'</div></div>';
			}
		}
		/*---------------*/

		/* DB MIDIAS */
		if( !strstr($link, '[[midias-sociais') ){
			$__midias = new db();
			$__midias->query("SELECT * FROM midias");
			$__midias->execute();

			/*JSON MIDIAS*/
			$__midiasJson = @json_decode(@file_get_contents($url.'painel/configuracao/midias_tipo.json'));

			if( !empty($__midiasJson) ){
				foreach ( $__midiasJson as $e ){
					$__midiasJsonIcon[$e->midias_tipo_id]  = $e->midia_ico;
					$__midiasJsonMidia[$e->midias_tipo_id] =  $e->midia_nome;
				}
			}
			/*----------*/

			$arrayColuna[] = '[[midias-sociais]]';
			if( !empty($__midias->row()) ){
				foreach( $__midias->row() AS $row ){
					$arrayResultMidias .= '<li><a href="'.$row['midia_link'].'" target="_new"><i class="fa-fw '.$__midiasJsonIcon[$row['midia_tipo']].'"></i> '.$__midiasJsonMidia[$row['midia_tipo']].'</a></li>';
				}
			}
			$arrayResult[] = $arrayResultMidias;
		}
		/*---------------*/


		/* DB Texto */
		if( !strstr($link, '[[menu') ){
			$__MenuConteudo = new db();
			$__MenuConteudo->query("SELECT * FROM menu WHERE menu_status = '1' AND menu_rodape = '1' ORDER BY menu_order, menu_titulo");
			$__MenuConteudo->execute();

			$arrayColuna[] = '[[menu]]';
			if( !empty($__MenuConteudo->row()) ){
				foreach( $__MenuConteudo->row() AS $row ){
					$arrayResultMenu .= '<li><a href="'.$url.$row['menu_link'].'"><i class="fas fa-angle-double-right"></i> '.$row['menu_titulo'].'</a></li>';
				}
			}
			$arrayResult[] = $arrayResultMenu;
		}
		/*---------------*/

		$arrayColuna[] = "[[PID]]";
		$arrayResult[] = $__PID;

		$result = str_replace($arrayColuna, $arrayResult, $result);
		
		eval('?> '.$result.' <?');
	}
}


?>