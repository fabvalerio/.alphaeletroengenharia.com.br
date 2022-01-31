<?

function c($array)
	{
		if(!empty($array)):
		   //substitui acentos
		   $string     = utf8_decode(strtolower(trim($array)));
		   $acentos    = array ("Ã","ã","Õ","õ","á","Á","é","É","í","Í","ó","Ó","ú","Ú","ç","Ç","à","À","è","È","ì","Ì","ò","Ò","ù","Ù","ä","Ä","ë","Ë","ï","Ï","ö","Ö","ü","Ü","Â","Ê","Î","Ô","Û","â","ê","î","ô","û","!","?",",","\"","\"","\"","\\","/", " ", "&nbsp;", '%', '$', '|', '[', ']', "'");
		   $s_acentos  = array ("a","a","o","o","a","a","e","e","i","i","o","o","u","u","c","c","a","a","e","e","i","i","o","o","u","u","a","a","e","e","i","i","o","o","u","u","A","E","I","O","U","a","e","i","o","u",".",".",".","." ,"." ,"." ,"." ,".", "-", "-"     , '' , 's', '-', '-', '-', '-');

	       //valores a su8bistituit
		   $new_string = str_replace($acentos , $s_acentos, $string);
		   
		   //Agora que não temos mais nenhum acento em nossa string, e estamos com ela toda em "lower",
			//vamos montar a expressão regular para o MySQL
			$caractresEnvelopados = array(
				"a", "ã", "á", "à", "ä", "â", "&atilde;", "&aacute;", "&agrave;", "&auml;", "&acirc;", "Ã", "Á", "À", "Ä", "Â", "&Atilde;", "&Aacute;", "&Agrave;", "&Auml;", "&Acirc;",
				"e", "é", "è", "ë", "ê", "&eacute;", "&egrave;", "&euml;", "&ecirc;", "É", "È", "Ë", "Ê", "&Eacute;", "&Egrave;", "&Euml;", "&Ecirc;",
				"i", "í", "ì", "ï", "î", "&iacute;", "&igrave;", "&iuml;", "&icirc;", "Í", "Ì", "Ï", "Î", "&Iacute;", "&Igrave;", "&Iuml;", "&Icirc;",
				"o", "õ", "ó", "ò", "ö", "ô", "&otilde;", "&oacute;", "&ograve;", "&ouml;", "&ocirc;", "Õ", "Ó", "Ò", "Ö", "Ô", "&Otilde;", "&Oacute;", "&Ograve;", "&Ouml;", "&Ocirc)",
				"u", "ú", "ù", "ü", "û", "&uacute;", "&ugrave;", "&uuml;", "&ucirc;", "Ú", "Ù", "Ü", "Û", "&Uacute;", "&Ugrave;", "&Uuml;", "&Ucirc;",
				"c", "ç", "Ç", "&ccedil;", "&Ccedil;", "&quot;", "&lsquo;" );
			$caracteresParaRegExp = array(
			    "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
				"e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
				"i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i",
				"o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o)",
				"u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "Ûu", "u", "u", "u", "u",
				"c", "c", "c", "c", "c", "", ""
			);
			$new_string = str_replace($caractresEnvelopados,$caracteresParaRegExp,$new_string);		   
		   
		   return $new_string;
		endif;
   }
   
   
?>