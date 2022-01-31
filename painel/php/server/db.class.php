 <?php
 //@ob_start();


// CLASSE DE INSERCAO DE BANCO DE DADOS  //

// POR : Fábio Valério

///////////////////////////////////////////


 $hostname = 'localhost';
 $database = 'webfreel_arq';
 $username = 'webfreel_2018';
 $password = '1q2w3e5t9o';
 $db       = mysql_connect($hostname, $username, $password) or die("Erro na conexão");

 $servidor = $hostname;
 $usuario  = $username;
 $senha    = $password;
 $banco    = $database;
 
 //mysql_connect($servidor, $usuario, $senha) or die(mysql_error());
 //mysql_select_db($banco) or die(mysql_error());

$mysqli = new mysqli($hostname, $usuario, $senha, $banco);
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


 $GLOBALS = array($hostname,  $database);


 class CONNECT{

  	// BD

 	var $db_local  = "localhost";
 	var $db_user   = "webfreel_2018";
 	var $db_senha  = "1q2w3e5t9o";
 	var $db_tabela = "webfreel_arq";

	
	// Relacionado a Classe;

	var $id;
	var $result;
	var $exibi;
	var $num_linha;
	var $campos;
	var $db;


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function CONNECT()
{


	if(empty($this->db_local) or empty($this->db_user)  or empty($this->db_senha) or empty($this->db_tabela))
	{
		echo "Desculpe mas os dados do banco de dados no foi preenchida corretamente";
	}
	else
	{

	 $this->db =  @mysql_connect($this->db_local,$this->db_user,$this->db_senha);
	  @mysql_select_db($this->db_tabela);


		$this->id = 0;
		$this->exibi = "";
		$this->num_linha = 0;
		//echo "Classe Carregada com Sucesso";

	}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function SQL($string)
{

	 if(empty($string))
	 {
		 die("String ou Limnha Invalida para ser processado no SQL");
	 }
	 else
	 {
		$this->result = mysql_query($string) or die(mysql_error());
		$this->exibi = mysql_fetch_assoc($this->result);
		$this->num_linha = mysql_num_rows($this->result);
		return $this->result;
	 }


}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function  EDITAR($tabela, $campos_db = array(), $conteudo = array(), $idcampo, $idvalor)
{


	$monta =  "";
	$contador["campos"] = count($campos_db);
	$contador["conteudo"] = count($conteudo);

	if($contador["campos"] != $contador["conteudo"]){

		echo "A Quantidade de Campos nao Corresponde com a Quantidade de Conteudo<br>";
		echo "Campos : ".$contador["campos"]." e  Campos de Conteudo: ".$contador["conteudo"]."<br>";

	}
	else
	{


	for($i = 0; $i < $contador["campos"]; $i++)
	{
		//$monta .=  $campos_db[$i]." = '".htmlentities(addslashes($conteudo[$i]))."', ";
		$monta .=  $campos_db[$i]." = '".(addslashes($conteudo[$i]))."', ";
		$monta2 = substr($monta, 0 ,-2);
	}

	$temp = sprintf("UPDATE %s SET %s WHERE %s = '%s' ", $tabela, $monta2, $idcampo, $idvalor);
	$roda = mysql_query($temp) or die(mysql_error());

	}

	return true;


}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function  EDITAR2($tabela, $campos_db = array(), $conteudo = array(), $valor)
{


	$monta =  "";
	$contador["campos"] = count($campos_db);
	$contador["conteudo"] = count($conteudo);

	if($contador["campos"] != $contador["conteudo"]){

		echo "A Quantidade de Campos nao Corresponde com a Quantidade de Conteudo<br>";
		echo "Campos : ".$contador["campos"]." e  Campos de Conteudo: ".$contador["conteudo"]."<br>";

	}
	else
	{


	for($i = 0; $i < $contador["campos"]; $i++)
	{
		$monta .=  $campos_db[$i]." = '".$conteudo[$i]."', ";
		$monta2 = substr($monta, 0 ,-2);
	}

	$temp = sprintf("UPDATE %s SET %s WHERE  %s", $tabela, $monta2, $valor);
	$roda = mysql_query($temp) or die(mysql_error());

	}

	return true;


}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function DELETAR($tabela, $id, $valor)
{
	if(empty($tabela) ||  empty($id) || empty($valor))
	{
		echo "os paramentros da funcao devem ser preenchidos corretamente";
		return false;
	}
	else
	{
    	$temp =  sprintf("DELETE FROM %s WHERE %s = '%s'",$tabela,$id, $valor); //"DELETE * FROM ".$tabela." WHERE ".$id." = '".$valor."'";
	    $run = mysql_query($temp) or die(mysql_error());
	    return true;
	}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function DELETAR2($tabela, $where)
{
	if(empty($tabela) ||  empty($where))
	{
		echo "os paramentros da funcao devem ser preenchidos corretamente";
		return false;
	}
	else
	{
    	$temp =  sprintf("DELETE FROM %s WHERE %s",$tabela,$where); //"DELETE * FROM ".$tabela." WHERE ".$id." = '".$valor."'";
	    $run = mysql_query($temp) or die(mysql_error());
	    return true;
	}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function resultado($numero, $nomecampo)
{
	return mysql_result($this->result,$numero,$nome_campo);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function FECHAR()
{
		mysql_close($this->db);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function INSERIR($tabela, $campo, $conteudo)
{
		$temp = sprintf("INSERT INTO %s(%s) VALUE('%s')", $tabela,$campo,$conteudo);
		$run_temp = mysql_query($temp) or die(mysql_error());
		//$temp = mysql_query("INSERT INTO ".$tabela." VALUE('".$conteudo."')") or die(mysql_error());
		$this->id = mysql_insert_id();
		return $temp;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Função onde insere de uma so vez multiplas insercoes
function INSERIR_MULTI($tabela, $campos = array(), $conteudo =  array())
{

	$contador["campos"] = count($campos);
	$contador["conteudo"] = count($conteudo);

	if($contador["campos"] != $contador["conteudo"])
	{
		echo "A Quantidade de Campos nao Corresponde com a Quantidade de Conteudo<br>";
		echo "Campos : ".$contador["campos"]." e  Campos de Conteudo: ".$contador["conteudo"]."<br>";
		die("");
	}

		for($i = 0; $i < $contador["campos"]; $i++)
		{
			//$partes[] = "'".addslashes(htmlentities($conteudo[$i]))."'";
			$partes[] = "'".addslashes(($conteudo[$i]))."'";
			$cp[] = $campos[$i];
		}

		$t_campos = implode(",",$cp);
		$string = 	implode(",",$partes);


	    $temp = sprintf("INSERT INTO %s (%s) VALUES(%s)",$tabela,$t_campos,$string);
		$run_temp = mysql_query($temp) or die(mysql_error());

		return true;



}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function SQLS($num, $tabela, $where, $order, $order_l, $pagina_page, $link)
{

		 if(empty($tabela))
		 {
			 die("String ou Limnha Invalida para ser processado no SQL");
		 }
		 else
		 {

			//pages
			   $maxRows_dados = $num;
			   $pagina = 0;
			   if (isset($pagina_page))
			   {
				 $pagina = $pagina_page;
			   }
			   $startRow_dados = $pagina * $maxRows_dados;

			   //SQL
			       $date = "SELECT * FROM ".$tabela." WHERE ".$where." ORDER BY ".$order." ".$order_l."";

				   $this->result = mysql_query("SELECT * FROM ".$tabela." WHERE ".$where." ORDER BY ".$order." ".$order_l." LIMIT ".$startRow_dados.", ".$maxRows_dados ) or die(mysql_error());
				   $this->exibi = mysql_fetch_assoc($this->result);
				   $this->num_linha = mysql_num_rows($this->result);
				  // return $this->result;

				  #proximo
				      $this->proximo_page = $pagina_page + 1;
				  #anterior
				  if($pagina_page < 0):
				     $this->proximo_page = $pagina_page - 1;
				  endif;

				  $all_dados = mysql_query("SELECT * FROM ".$tabela." WHERE ".$where) or die (mysql_error());
				  //$totalRows_dados = mysql_num_rows($all_dados);

				  $this->totalRows_total = mysql_num_rows($all_dados);

				  //$totalRows_dados= ceil($this->totalRows_total/$maxRows_dados)-1;
				  $this->totalRows_dados= ceil($this->totalRows_total/$maxRows_dados)-1;

					  //Pagina Soma
					  $paginas = $this->totalRows_dados;
					  //maximo
					  $max = array(10);
					  //total
					  $maximopagina = $paginas - $pagina_page;
					  //variavel vazia
					  $pg = "";
					  //variavel pagina
					  $getpagina = $pagina_page;
					  //preenchimento
					  for($i=0; $i<10; $i++)
					  {
						//echo $maximopagina;
						  if($getpagina  >= ($paginas - 5))
						  {
						    $getpagina = $paginas - 5;
						  }
						  //voltar
						   if($getpagina  >= 4)
						   {
							   $pg = $getpagina -4;
							   $max[$i] = $pg + $i;
						   }
						   else
						   {
							 $max[$i] = $i;
						   }
							if($i >= $paginas)
							{
							   break;
							 }
						}

						$this->paginas .= '<nav><ul class="pagination">';
						$this->paginas .= '<li>
											<a href="'.$link.'" aria-label="Previous">
												<span aria-hidden="true">&laquo;</span>
											  </a>
											</li>';

						for($i=0; $i<10; $i++)
						{
						  if(strlen($max[$i])!= 0)
						  {
						       $j = $max[$i]+1;
							   $page_print = $i;

							   if($max[$i] == $pagina_page)
							   {
								 $x = '<li><a>'.$j.'</a></li>';
							   }
							   else
							   {
							     $x =  $j;
							   }
							   $l = $x - 1;

							   $page_num = $pagina_page;
							   if($x != $j)
							   {
								  $this->paginas .= '<li class="active"><a>'.$j.'</a></li>';
							   }
							   else
							   {
							      $this->paginas .= '<li><a href="'.$link.'/'.($x-1).'">'.$x.'</a></li>';
							   }
						   }
						}
						$this->paginas .= '
									<li>
									  <a href="'.$link.'" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									  </a>
									</li>';

						$this->paginas .= '</ul></nav>';


		 }
	}

}

###################################################################################################################
/*
  Desenvolvido por Fábio Valério
  WEB4BR.com | 12 3026.6259 - contato@web4br.com
  2009
*/
###################################################################################################################


#edição
function editar($tabela, $id, $pid)
 {

   $cadastro = new CONNECT();
   $cadastro->SQL('SELECT * FROM '.$tabela);

   for($i; $i<mysql_num_fields($cadastro->result); $i++)
   {
	   $campos[] = mysql_field_name($cadastro->result, $i);
	   $conteudo[] = ($_POST[mysql_field_name($cadastro->result, $i)]);
   }
   //print_r($conteudo);

	   /* foreach($campos as $v1 => $v2)
	   {
		    $v1.' - '.$v2.' = '.$conteudo[$v1].'<br>';
	   } */

	   $inserir = new CONNECT();
	   if($inserir->EDITAR($tabela, $campos , $conteudo, $id, $pid))
	   {
			echo '
		       <div class="alert alert-success alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				  <strong>
		   ';
			echo 'Editado com sucesso!';
			echo '</strong></div>';
	   }
	   else
	   {
		   echo '
		       <div class="alert alert-danger alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				  <strong>
		   ';
			echo 'Erro no envio, tente novamente!';
			echo '</strong></div>';
	   }
}


#cadastro
function cadastro($tabela)
 {

   $cadastro = new CONNECT();
   $cadastro->SQL('SELECT * FROM '.$tabela);

   for($i; $i<mysql_num_fields($cadastro->result); $i++)
   {
	   $campos[] = mysql_field_name($cadastro->result, $i);
	   $conteudo[] = ($_POST[mysql_field_name($cadastro->result, $i)]);
   }

	   $inserir = new CONNECT();
	   if($inserir->INSERIR_MULTI($tabela, $campos , $conteudo))
	   {
	       echo '
		       <div class="alert alert-success alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				  <strong>
		   ';
			echo 'Cadastrado com sucesso!';
			echo '</strong></div>';
	   }
	   else
	   {
		   echo '
		       <div class="alert alert-danger alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				  <strong>
		   ';
			echo 'Erro no envio, tente novamente!';
			echo '</strong></div>';
	   }
 }

#exclusão
function excluir($tabela, $where)
{
	$deletar = new CONNECT();
	if( $deletar->DELETAR2($tabela, $where) )
	{
			echo '
		       <div class="alert alert-success alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				  <strong>
		   ';
			echo 'Deletado com sucesso!';
			echo '</strong></div>';
	   }
	   else
	   {
		   echo '
		       <div class="alert alert-danger alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				  <strong>
		   ';
			echo 'Erro no deletamento, tente novamente!';
			echo '</strong></div>';
	   }
}

//Status--------------------------------------------------------------------------------------
function status($val)
{
	 if( $val == '1' ):
	   return '<i class="fa fa-check-circle" style="color:green"></i>';
	 else:
	   return '<i class="fa fa-times-circle" style="color:red">';
	 endif;
}
//fim status--------------------------------------------------------------------------------------

//Status--------------------------------------------------------------------------------------
function leitura($val)
{
	 if( $val == '1' ):
	   return "Lido";
	 elseif( $val == '0' ):
	   return "Aberto";
	 else:
	   return "Vazio";
	 endif;
}
//fim status--------------------------------------------------------------------------------------


//selects--------------------------------------------------------------------------------------
function select( $tipo, $valOrig, $valValue )
{
	#tipo
	//select  == 1
	//ckec    == 2
	//radio   == 3

	if( $tipo == '1' ):
	   if( $valOrig == $valValue ): $valor = 'selected="selected"'; endif;

    elseif( $tipo == '2' ):
	   if( $valOrig == $valValue ): $valor = "checked"; endif;
	endif;

	return $valor;

}


function option( $tabela, $coluna, $valor, $where, $selectValue = NULL )
{


	   if( !empty( $where ) ) $_where = " WHERE ".$where;


   //db
   $select[$tabela] = new CONNECT();
   $select[$tabela]->SQL("SELECT * FROM ".$tabela.$_where." ORDER BY ".$coluna." ASC");


   //$resultado .= '<option '. $valorSelec .' value="">Selecione...</option>'."\n";

   do
   {

	   if( $select[$tabela]->exibi[$valor] == $selectValue ) $valorSelec = 'selected="selected"';
	   $resultado .= '<option '. $valorSelec .' value="'.($select[$tabela]->exibi[$valor]).'">'.($select[$tabela]->exibi[$coluna]).'</option>'."\n";
	   $valorSelec = '';
   }
   while( $select[$tabela]->exibi = mysql_fetch_assoc( $select[$tabela]->result ) );

   return $resultado;

}

function check( $nome, $tabela, $coluna, $valor, $where, $verifica = NULL )
{

   if( !empty($where) ) $_where = " WHERE ".$where." ORDER BY ".$coluna." ASC";

   //db
   $select[$tabela] = new CONNECT();
   $select[$tabela]->SQL("SELECT * FROM ".$tabela.$_where);

   //verifica ARRAY
      if( is_array($_POST[$nome]) ): #post
			foreach( $_POST[$nome] as $valorArray ):
			  $verificaArray[$valorArray] = $valorArray;
			endforeach;
   elseif( is_array($verifica) ): #string
			foreach( $verifica as $valorArray ):
			  $verificaArray[$valorArray] = $valorArray;
			endforeach;
   endif;

   //print_r($verificaArray);


   do
   {
	   #verificar para checkbox
	   if( $verifica == $select[$tabela]->exibi[$valor] ):
	    $Marcar = ' checked="checked"';
	   elseif( $verificaArray[$select[$tabela]->exibi[$valor]] == $select[$tabela]->exibi[$valor]):
	    $Marcar = ' checked="checked"';
	   endif;

	   #armazernar
	   $resultado .= '<label class="box-check" id="'.$nome.'"><input name="'.$nome.'[]" type="checkbox" value="'.$select[$tabela]->exibi[$valor].'" '.$Marcar.'/>'.$select[$tabela]->exibi[$coluna].'</label>'."\n";

	   #limpar
	   $Marcar = '';
   }
   while( $select[$tabela]->exibi = mysql_fetch_assoc( $select[$tabela]->result ) );

   return $resultado;

}
function checkvis( $tabela, $coluna, $colunaValor, $valor, $where )
{

   if( !empty($where) ) $_where = " WHERE ".$where. " AND ";

   //verifica ARRAY
      if( is_array($valor) ): #post
			foreach($valor as $valorArray ):
			  $verificaArray[] = " ".$colunaValor." = '".$valorArray."' ";
			endforeach;
      else: #string
	        $valor = @explode(',', $valor);
			foreach( $valor as $valorArray ):
			  $verificaArray[] = " ".$colunaValor." = '".$valorArray."' ";
			endforeach;
     endif;

	 $verificaArray  = @implode( ' OR ', $verificaArray );

   //db
   $select[$tabela] = new CONNECT();
   $select[$tabela]->SQL("SELECT * FROM ".$tabela.$_where.$verificaArray." ORDER BY ".$coluna." ASC");

   do
   {
	   #armazernar
	   $resultado[] = $select[$tabela]->exibi[$coluna];
   }
   while( $select[$tabela]->exibi = mysql_fetch_assoc( $select[$tabela]->result ) );

   return @implode('; ', $resultado);

}
//fim selects --------------------------------------------------------------------------------------


//armazenar valor Post-GET--------------------------------------------------------------------------------------
function input($string, $valorOrig = NULL)
{
	 //return !empty($_POST[$string]) ? $_POST[$string] : $_GET[$string];
	 if( !empty($_POST[$string]) ):
	   $valor = $_POST[$string];
	 elseif( !empty($_GET[$string]) ):
	   $valor = $_GET[$string];
	 else:
	   $valor = $valorOrig;
	 endif;

	 return $valor;

}

function inputs( $string, $valor )
{
	if( $_POST[$string] == $valor ) return  'checked="CHECKED"';
	if( $_GET[$string] == $valor )  return  'checked="CHECKED"';
	if( $string == $valor )         return  'checked="CHECKED"';
}
//fim armazenar valor Post-GET--------------------------------------------------------------------------------------


//validar envio--------------------------------------------------------------------------------------
function validarInput($campos)
{
	if( !empty( $campos ) ):
		foreach( $campos as $valores )
		{
			if( empty($_POST[$valores]) ):
			  $Result .= "#".$valores.'{border:1px solid red !important;box-shadow: 0px 0px 10px 1px red;}'."\n";
			endif;
		}
	endif;

	//montar
	if( !empty($Result) ):
	     //$montar .= '<img src="'.$url.'images/icos/1375463945_messagebox_warning.png" width="22" height="22" /> '."Para que o cadastro seja realizado com sucesso, preencha os campos obrigat&oacute;rios.";
		 $montar .= '<style>'.$Result.'</style>';
		 return  $montar;
	endif;
}
//^fim validar envio--------------------------------------------------------------------------------------

function moeda( $valor )
{
	return number_format( $valor, 2, ',', '.' );
}
function _float( $valor )
{
    $valor = str_replace('.', '', $valor);
    $valor = str_replace(',', '.', $valor);
    return $valor;
}
function _int( $valor )
{
    $valor = explode('.', $valor);
    return $valor[0];
}

//NOME DE ARQUIVO--------------------------------------------------------------------------------------
function nome_arquivo($nome)
{
	return md5(nome).date('YmdHisu').".".@end(@explode('.', $nome));
}

function StatusPost( $var ){
	if( $var == 'on' ):
		$res = '1';
	else:
		$res = '0';
	endif;

	return $res;
}

?>
