<?

$__SEO = [];

/* Menu */
$__verMenu = $link[0];

/* Categoria */
$__verCat = $link[1];

/* Sub-Categoria */
$__verSub = $link[2];

/* Busca */
$__busca = trim($_GET['q']);


if( !empty($__verMenu) ){

	/* MENU JSON */
	$__menuSQL = " SELECT DISTINCT m.menu_id, m.menu_capa, m.menu_titulo, m.menu_mini_texto, m.menu_descricao, m.menu_quantidade, m.menu_paginizacao, m.menu_wireframes_wf_id, m.menu_keyworks
	FROM menu AS m
	LEFT JOIN paginas AS p
	ON p.menu_menu_id = m.menu_id
	WHERE m.menu_link = '{$__verMenu}'
	OR p.pag_link = '{$__verMenu}' ";
	$__menu = new db();
	$__menu->query( $__menuSQL );
	$__menu->execute();
	$__menuRow = $__menu->object();

	/*JSON*/
	$capaMenu = $url.'painel/images/fotos-menu/'.$__menuRow->menu_id.'/g/'.$__menuRow->menu_capa;
	$__menuJson = '{"menu_capa": "'.$capaMenu.'", "menu_wire": "'.$__menuRow->menu_wireframes_wf_id.'", "menu_titulo": "'.$__menuRow->menu_titulo.'", "menu_mini_texto": "'.$__menuRow->menu_mini_texto.'", "menu_descricao": "'.preg_replace('/\s+/', ' ', trim(addslashes($__menuRow->menu_descricao))).'" }';
	$capaMenu = '';
	$QtdePaginas     = $__menuRow->menu_quantidade;
	$QtdePaginazicao = $__menuRow->menu_paginizacao;


	/*-----------------------------------------------------------------------------------------------------------------------------------------------*/


	/* VERIRICAR CAT E SUB*/
	$__verificarCatSQL =  "SELECT DISTINCT p.categoria_cat_id, p.menu_menu_id, m.menu_link, m.menu_paginizacao, m.menu_quantidade, c.cat_titulo, c.cat_id
	FROM  paginas AS p
	LEFT JOIN menu AS m 
	ON m.menu_id = p.menu_menu_id
	LEFT JOIN paginas_categoria AS c
	ON c.cat_id = p.categoria_cat_id 
	WHERE c.cat_link = '{$__verCat}'
	AND p.pag_status = '1'";

	$__verificarCat = new db();
	$__verificarCat->query( $__verificarCatSQL );
	$__verificarCat->execute();
	$__rowVerificarCat = $__verificarCat->object();


	/*-----------------------------------------------------------------------------------------------------------------------------------------------*/


	/* WHERE */
	if( $__rowVerificarCat->cat_id ){ $__VerCatWhere   = " AND c.cat_id = '".$__rowVerificarCat->cat_id."' "; }
	if( !empty( $__busca ) )        { $__VerBuscaWhere = " AND ( p.pag_texto REGEXP \"" . stringParaBusca($__busca) . "\" 
	OR p.pag_mini_descricao REGEXP \"" . stringParaBusca($__busca) . "\" 
	OR p.pag_titulo REGEXP \"" . stringParaBusca($__busca) . "\"
	OR p.pag_keyworks REGEXP \"" . stringParaBusca($__busca) . "\" )";  }
	$__VerMenuWhere = " ( m.menu_link = '{$link[0]}' OR p.pag_link = '{$link[0]}' ) {$__VerCatWhere}  ";	


	/* PAGINIZACAO */
	if( $QtdePaginazicao == '1' AND !empty($QtdePaginas) ){

		$pagina_num = $_GET['pagina'];
		if (empty($pagina_num)) {
			$pc = "1";
		} else {
			$pc = $pagina_num;
		}
		$inicio = $pc - 1;
		$inicio = $inicio * $QtdePaginas;

		$WhereLimit = " LIMIT {$inicio}, {$QtdePaginas}";

		$WhereOrder = " ORDER BY p.pag_data DESC ";
	}else{

		$WhereOrder = " ORDER BY p.pag_titulo ASC ";
	}


	/* CONTEUDO PAGINAS*/
	$__verSQL = " SELECT * 
	FROM  paginas AS p
	LEFT JOIN menu AS m 
	ON m.menu_id = p.menu_menu_id
	LEFT JOIN paginas_categoria AS c
	ON c.cat_id = p.categoria_cat_id 
	LEFT JOIN paginas_subcategoria AS s
	ON s.sub_id = p.subcategoria_sub_id
	WHERE {$__VerMenuWhere}
	{$__VerBuscaWhere}
	AND p.pag_status = '1'
	{$WhereOrder}
	{$WhereLimit}
	";

	$__ver = new db();
	$__ver->query( $__verSQL );
	$__ver->execute();
	$__ver->object();

	$__pt = $__ver->rowCount();

	/*---------------------*/

	/* TOTAL PAGINAS*/
	$__verTotalSQL = " SELECT p.pag_id
	FROM  paginas AS p
	LEFT JOIN menu AS m 
	ON m.menu_id = p.menu_menu_id
	LEFT JOIN paginas_categoria AS c
	ON c.cat_id = p.categoria_cat_id 
	LEFT JOIN paginas_subcategoria AS s
	ON s.sub_id = p.subcategoria_sub_id
	WHERE {$__VerMenuWhere}
	{$__VerBuscaWhere}
	AND p.pag_status = '1'
	";

	$__verTotal = new db();
	$__verTotal->query( $__verTotalSQL );
	$__verTotal->execute();


	/* PAGINIZACAO */
	if( $QtdePaginazicao == '1' AND !empty($QtdePaginas) ){

		$tr = $__verTotal->rowCount();
		$tp = round($tr / $QtdePaginas); 

		/* agora vamos criar os botões "Anterior e próximo */
		$anterior = $pc -1;
		$proximo = $pc +1;

		if( !empty($_GET['q']) ){  $GetBusca = '&q='.$_GET['q']; }

		if ($pc > 1) {
			$pc_Ant = '<li class="page-item"><a class="page-link" href="'.$url.$link[0].'&pagina='.$anterior.$GetBusca.'"><i class="fas fa-angle-left"></i></li>';
			$pc_Ant .= '<li class="page-item"><a class="page-link" href="'.$url.$link[0].'&pagina=1'.$GetBusca.'"><i class="fas fa-angle-double-left"></i></a></li>';
		}

		$numberPaginas = round($pagina_num/2);

		$max = array(10);

		/*variavel vazia*/
		$pg = "";

		/*preenchimento*/
		for($i=0; $i<10; $i++){
			if($pagina_num  >= ($tr - 5)){
				$pagina_num = $tr - 5;
			}

			/*voltar*/
			if($pagina_num  >= 5){
				$pg = $pagina_num -5;
				$max[$i] = $pg + $i;
			}else{
				$max[$i] = $i;
			}
			if($i >= $tp){
				break;
			}
		}

		for($i=1; $i<=10; $i++){
			if(strlen($max[$i])!= 0){
				if($max[$i] <= $tp){
					$j = $max[$i];

					if($max[$i] == $pagina_num){
						$x = '<li class="page-item"><a class="page-link" href="'.$url.$link[0].'&pagina='.$j.$GetBusca.'"> '.$j.' </a></li>';
					}else{
						$x =  $j;
					}

					$page_num = $pagina_num;
					if($x != $j){
						$pc_num .= '<li class="page-item active"><a class="page-link" href="'.$url.$link[0].'&pagina='.$j.$GetBusca.'"> '.$j.' </a></li>';
					}else{
						$pc_num .= '<li class="page-item"><a class="page-link" href="'.$url.$link[0].'&pagina='.($x).$GetBusca.'">'.$x.'</a></li>';
					}
				}
			}
		}


		if ($pc < $tp) {
			$pc_Anv = '<li class="page-item"><a class="page-link" href="'.$url.$link[0].'&pagina='.$tp.$GetBusca.'"><i class="fas fa-angle-double-right"></i></li>';
			$pc_Anv .= '<li class="page-item"><a class="page-link" href="'.$url.$link[0].'&pagina='.$proximo.$GetBusca.'"><i class="fas fa-angle-right"></i></a></li>';
		}

		$__paginizacaoJson = $pc_Ant.$pc_num.$pc_Anv;

	}

	/*-----------------------------------------------------------------------------------------------------------------------------------------------*/


	/* COLUNAS PAGINAS*/
	$__verDB = new db();
	$__verDB->query( "DESCRIBE paginas" );
	$__verDB->execute();

	foreach ($__verDB->table() as $key) {
		$tabelasSQL[$key] = $key;
	}

	/*-----------------------------------------------------------------------------------------------------------------------------------------------*/


	$__numero_conteudos = $__ver->rowCount();

	/* CATEGORIA JSON */
	$__catJsonSQL = "  SELECT c.cat_titulo, c.cat_id, c.cat_link, m.menu_link
	FROM paginas_categoria AS c
	LEFT JOIN menu AS m
	ON m.menu_id = c.cat_menu
	WHERE m.menu_link = '{$__verMenu}' AND cat_status = '1' ";
	$__catJson = new db();
	$__catJson->query( $__catJsonSQL );

	/*JSON*/
	foreach( $__catJson->row() as $row ){
		$__catJsonList[] = '{"link": "'.$url.$row['menu_link'].'/'.$row['cat_link'].'", "titulo": "'.$row['cat_titulo'].'", "id": "'.$row['cat_id'].'"}';
	}
	$__catJsonListAgroup = @implode(',', $__catJsonList);
	$__verJsonCat = '['.$__catJsonListAgroup.']';

	/*-----------------------------------------------------------------------------------------------------------------------------------------------*/

	/* CRIAR JSON DE CONTEUDO */
	$__verJsonMontar[] = " \"url\" : \"".$url."\"";

	/* LISTAR INCLUDES */
	$str_Includes_Direct = 'includes_srt_replace/';
	$str_Includes = glob("$str_Includes_Direct{*.php}", GLOB_BRACE);

	if( !empty($str_Includes) ){
		foreach($str_Includes as $files){
			if( is_file($files) ){
				$FileName[] = '{{'.@reset( @explode( '.',  @end( @explode( '/', $files ) ) ) ).'}}';
				$arquivo = html_entity_decode(file_get_contents($files));
				$FileExport[] = ($arquivo);
			}
		}
	}
	/* \FIM LISTAR INCLUDES */

	foreach ($__ver->row() as $key => $arrayConteudo) {
		foreach ($arrayConteudo as $coluna => $valor) {
			if( !empty($valor) ){

				/* SUBSTITUIR */
				$valor = str_replace($FileName, $FileExport, $valor);


				if( $__verTotal->rowCount() > 1 ){
					/* quantidade de páginas for maior que 1, irá retirar o CONTEUDO TEXTO */
					if( $coluna != 'pag_texto' ){
						$__verJsonMontar[] = " \"{$coluna}\" : \"".preg_replace('/\s+/', ' ', str_replace("\"", '\\"', trim(addslashes($valor))))."\""; /*REMOVER ESPAÇO E ENTER*/
					//$__verJsonMontar += array($coluna => $valor);

						
					}
				}else{
					
					/* ARMANZENAR ID */
					if( $coluna == 'pag_id'){
						$__PID = $valor;
					}

					$__verJsonMontar[] = " \"{$coluna}\" : \"".preg_replace('/\s+/', ' ', str_replace("\"", '\\"', trim(addslashes($valor))))."\""; /*REMOVER ESPAÇO E ENTER*/
					//$__verJsonMontar += array($coluna => $valor);
					
					/*SEO*/
					if( $coluna == 'pag_titulo' || $coluna == 'pag_mini_descricao' || $coluna == 'pag_link' || $coluna == 'pag_capa' || $coluna == 'pag_keyworks' || $coluna == 'pag_id' ){
						$__SEO[$coluna] = $valor;
					}
					
					/* ARMANZENAR WIREFRAMES */
					if( $coluna == 'paginas_wireframes_wf_id'){
						$__wire['paginas_wireframes_wf_id'] = $valor;
					}
				}


			}
		}
		$__verJsonMontarAgroup = @implode(',', $__verJsonMontar);
		$__verJsonMontarFinal[] = '{'.$__verJsonMontarAgroup.'}';
	}

	$__verJsonMontarFinalJson = @implode(',', $__verJsonMontarFinal);
	$Json_DB = "[{$__verJsonMontarFinalJson}]"; /*JSON*/

    //$Json_DB = json_encode($__MONTAR_JSON_ARRAY, true);
}
/* PAGINA HOME  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< HOME <<<<<<<<<<<<<<<<<<<<<<<<<< HOME <<<<<<<<<<<<<<<<<<<<<<<<<< HOME <<<<<<<<<<<<<<<<<<<<<<<<<< HOME */
else{
	

	/* MENU JSON */
	$__menuHomeSQL = " SELECT menu_id, menu_titulo, menu_link
	FROM menu 
	WHERE menu_home = '1' ";
	$__menuHome = new db();
	$__menuHome->query( $__menuHomeSQL );
	$__menuHome->execute();

	/*JSON*/
	if( !empty($__menuHome->rowCount()) ){
		foreach( $__menuHome->row() as $row ){
			$__menuHomeJsonArray[] = '{"menu_titulo": "'.$row['menu_titulo'].'", "menu_id": "'.$row['menu_id'].'", "menu_link": "'.$row['menu_link'].'"}';
		}
		$__menuHomeJson = @implode(',', $__menuHomeJsonArray);
		$__menuHomeJson = '['.$__menuHomeJson.']';
	}

	/*-----------------------------------------------------------------------------------------------------------------------------------------------*/

	

	/* DESTAQUE */
	$__homeDestaqueSQL = " SELECT pag_titulo, pag_titulo, pag_mini_descricao, pag_capa, menu_menu_id, pag_id, pag_link, pag_data 
	FROM paginas 
	WHERE pag_home = '1' 
	AND pag_status = '1' 
	ORDER BY  pag_titulo, pag_data DESC
	LIMIT 6 ";
	$__homeDestaque = new db();
	$__homeDestaque->query( $__homeDestaqueSQL );
	$__homeDestaque->execute();

	/*JSON*/
	if( !empty($__homeDestaque->rowCount()) ){

		foreach( $__homeDestaque->row() as $rowDest ){

			if( $rowDest['pag_capa'] ){
				$dirCapa = "painel/images/fotos-paginas/".$rowDest['pag_id']."/p/";

				if( is_file($dirCapa.$rowDest['pag_capa']) ){ 
					$capa = $url.$dirCapa.$rowDest['pag_capa']; 
				}else{
					$capa = '';
				}
			}

			$__homeDestaqueJsonArray[$rowDest['menu_menu_id']][] = array('pag_titulo' => $rowDest['pag_titulo'], "pag_capa" => $capa, "pag_mini_descricao" => $rowDest['pag_mini_descricao'], "menu_menu_id" =>  $rowDest['menu_menu_id'], "pag_id" =>  $rowDest['pag_id'], "pag_link" =>  $rowDest['pag_link'], "pag_data" =>  dia($rowDest['pag_data']) );
		}

		//$teste = json_encode($__homeDestaqueJsonArray, JSON_PRETTY_PRINT);

		ksort($__homeDestaqueJsonArray);

		$newArray = [];
		foreach ($__homeDestaqueJsonArray as $key => $value) {
			$newArray[] = array('menu' => "menuId-".$key, "conteudo" => ($value));
		}

		$__homeDestaqueJson = json_encode($newArray);
	}

}

/*---------------------*/

?>

<script>
	/* JSON */
	var conteudo     = '<? echo $Json_DB; ?>';
	var menu         = '<? echo $__menuJson; ?>';
	var menuHome     = '<? echo $__menuHomeJson; ?>';
	var categoria    = '<? echo $__verJsonCat; ?>';
	var paginizacao  = '<? echo $__paginizacaoJson; ?>';
	var destaqueHome = '<? echo $__homeDestaqueJson; ?>';
</script>