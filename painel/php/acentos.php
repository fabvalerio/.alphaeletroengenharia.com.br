<?

function c($array)
	{
		if(!empty($array)):
		   //substitui acentos
		   $string     = utf8_decode(strtolower(trim($array)));
		   $acentos    = array ("�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","!","?",",","\"","\"","\"","\\","/", " ", "&nbsp;", '%', '$', '|', '[', ']', "'");
		   $s_acentos  = array ("a","a","o","o","a","a","e","e","i","i","o","o","u","u","c","c","a","a","e","e","i","i","o","o","u","u","a","a","e","e","i","i","o","o","u","u","A","E","I","O","U","a","e","i","o","u",".",".",".","." ,"." ,"." ,"." ,".", "-", "-"     , '' , 's', '-', '-', '-', '-');

	       //valores a su8bistituit
		   $new_string = str_replace($acentos , $s_acentos, $string);
		   
		   //Agora que n�o temos mais nenhum acento em nossa string, e estamos com ela toda em "lower",
			//vamos montar a express�o regular para o MySQL
			$caractresEnvelopados = array(
				"a", "�", "�", "�", "�", "�", "&atilde;", "&aacute;", "&agrave;", "&auml;", "&acirc;", "�", "�", "�", "�", "�", "&Atilde;", "&Aacute;", "&Agrave;", "&Auml;", "&Acirc;",
				"e", "�", "�", "�", "�", "&eacute;", "&egrave;", "&euml;", "&ecirc;", "�", "�", "�", "�", "&Eacute;", "&Egrave;", "&Euml;", "&Ecirc;",
				"i", "�", "�", "�", "�", "&iacute;", "&igrave;", "&iuml;", "&icirc;", "�", "�", "�", "�", "&Iacute;", "&Igrave;", "&Iuml;", "&Icirc;",
				"o", "�", "�", "�", "�", "�", "&otilde;", "&oacute;", "&ograve;", "&ouml;", "&ocirc;", "�", "�", "�", "�", "�", "&Otilde;", "&Oacute;", "&Ograve;", "&Ouml;", "&Ocirc)",
				"u", "�", "�", "�", "�", "&uacute;", "&ugrave;", "&uuml;", "&ucirc;", "�", "�", "�", "�", "&Uacute;", "&Ugrave;", "&Uuml;", "&Ucirc;",
				"c", "�", "�", "&ccedil;", "&Ccedil;", "&quot;", "&lsquo;" );
			$caracteresParaRegExp = array(
			    "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
				"e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
				"i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i", "i",
				"o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o)",
				"u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "�u", "u", "u", "u", "u",
				"c", "c", "c", "c", "c", "", ""
			);
			$new_string = str_replace($caractresEnvelopados,$caracteresParaRegExp,$new_string);		   
		   
		   return $new_string;
		endif;
   }
   
   
?>