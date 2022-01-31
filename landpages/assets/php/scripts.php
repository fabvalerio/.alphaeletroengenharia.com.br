<?

// *******************************************************
// *** DESCRIÇÂO TEXTO DB
// *******************************************************
function descricao($texto){


	//LISTAR ARQUIVOS NA PASTA
	$page_dir = 'includes_srt_replace';
	$pages_includes = glob($page_dir."/{*.php}", GLOB_BRACE);

	//Validar pasta existente
	if( is_dir($page_dir) ){

		//validar arqvivos existente
		if( isset($pages_includes) ){

			//Criar lista
			foreach( $pages_includes as $valPages ){

				//limpar caminho da pasta
				$valPages = @end( @explode('/', $valPages) );
				
				//Limpar nome
				$newName = strtolower('{{'.@current( @explode('.', $valPages)).'}}');

				//CRIAR ARRAY NOME
				$array_includeName[] = $newName;

				// CARREGAR INCLUDE PARA ARRAY
				ob_start();
				include($page_dir.'/'.$valPages);
				$str_include = ob_get_clean();

				//CRIAR ARRAY INCLUDE
				$array_includeFile[] = $str_include;

			}
		}
	}

//print_r($array_includeName);
//print_r($array_includeFile);


	//SUBISTITUIR CAMINHO DE IMAGENS ARMAZENADA NO PAINEL
	$char_bd  = array('../../../', '../../');
	$char_sub = array($url.'painel/', $url.'painel/');
	$char_txt = str_replace($char_bd, $char_sub, $texto);

	// SUBSTITUIR {{FILE}} PELO CAMINHO CORRETO
	$include_txt = str_replace($array_includeName, $array_includeFile, $char_txt);

	return $include_txt;
}

?>