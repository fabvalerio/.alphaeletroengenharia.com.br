<?

function stringParaBusca($str)
{
	//Transformando tudo em min�sculas
	$str = trim(strtolower($str));

	//Tirando espa�os extras da string... "tarcila  almeida" ou "tarcila   almeida" viram "tarcila almeida"
	while ( strpos($str,"  ") )
		$str = str_replace("  "," ",$str);
	
	//Agora, vamos trocar os caracteres perigosos "�,�..." por coisas limpas "a"
	$caracteresPerigosos = array ("�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","!","?",",","�","�","-","\"","\\","/");
	$caracteresLimpos    = array ("a","a","o","o","a","a","e","e","i","i","o","o","u","u","c","c","a","a","e","e","i","i","o","o","u","u","a","a","e","e","i","i","o","o","u","u","A","E","I","O","U","a","e","i","o","u",".",".",".",".",".",".","." ,"." ,".");
	$str = str_replace($caracteresPerigosos,$caracteresLimpos,$str);
	
	//Agora que n�o temos mais nenhum acento em nossa string, e estamos com ela toda em "lower",
	//vamos montar a express�o regular para o MySQL
	$caractresSimples = array("a","e","i","o","u","c");
	$caractresEnvelopados = array("[a]","[e]","[i]","[o]","[u]","[c]");
	$str = str_replace($caractresSimples,$caractresEnvelopados,$str);
	$caracteresParaRegExp = array(
		"(a|�|�|�|�|�|&atilde;|&aacute;|&agrave;|&auml;|&acirc;|�|�|�|�|�|&Atilde;|&Aacute;|&Agrave;|&Auml;|&Acirc;)",
		"(e|�|�|�|�|&eacute;|&egrave;|&euml;|&ecirc;|�|�|�|�|&Eacute;|&Egrave;|&Euml;|&Ecirc;)",
		"(i|�|�|�|�|&iacute;|&igrave;|&iuml;|&icirc;|�|�|�|�|&Iacute;|&Igrave;|&Iuml;|&Icirc;)",
		"(o|�|�|�|�|�|&otilde;|&oacute;|&ograve;|&ouml;|&ocirc;|�|�|�|�|�|&Otilde;|&Oacute;|&Ograve;|&Ouml;|&Ocirc;)",
		"(u|�|�|�|�|&uacute;|&ugrave;|&uuml;|&ucirc;|�|�|�|�|&Uacute;|&Ugrave;|&Uuml;|&Ucirc;)",
		"(c|�|�|&ccedil;|&Ccedil;)" );
	$str = str_replace($caractresEnvelopados,$caracteresParaRegExp,$str);
	
	//Trocando espa�os por .*
	$str = str_replace(" ",".*",$str);
	
	//Retornando a String finalizada!
	return $str;
}


/* exemplo */


/* 
   if( !empty( $_POST['busca'] ) ):
       include('busca_complexa/funcaoStringParaBusca.php');
       $str = stringParaBusca($_POST['busca']);
       $where = " pro_produto REGEXP \"" . $str . "\"";
   else:
       $where = "pro_id > 0";
   endif;

	$vis = new CONNECT();
	$vis->SQLS(1, 'produtos', $where, "pro_produto", "ASC", $_GET['pagina'], "?page=produtos/visualizar");
 */
 
?>