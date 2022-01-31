<?

include('../includes/#notify.php');
include('../php/db.class.php');


print_r($_POST);


/* Listar Array Json */
foreach ($_POST as $key => $value) {
	$json_array[] = '"'.$key.'": "'.$value.'" ';
}
$json_array_result = @implode(',', $json_array);

/* Estrutura Json */
$json_estrutura = "{ [[value]] }";

$json = str_replace( '[[value]]', $json_array_result, $json_estrutura);


//faz o parsing na string, gerando um objeto PHP
//$obj = json_decode($json);

//echo $obj->c_efeito_slider;


/* registro */

try{


	$tipo         = 'conf';
	$estruturacao = $json;

	$sql = "UPDATE configuracao 
	SET
	estruturacao  = :estruturacao
	WHERE tipo    = :tipo ";

	$db = new db();
	$db->query($sql);


	$db->bind(':tipo'        , $tipo);
	$db->bind(':estruturacao', $estruturacao);


	if($db->execute()){
		echo notify('success');
	}else{
		echo notify('danger');
	}

} catch (PDOException $e) {
	throw new PDOException($e);
}




?>