<div class="alert alert-success notify">
<?
include("../php/db.class.php");
$array	= $_POST['arrayorder'];

if ($_POST['update'] == "update"){
	
	$count = 1;
	foreach ($array as $idval) {
		$OrderSQL = "UPDATE ordenar SET ord_lista = " . $count . " WHERE ord_id = " . $idval;

		$Order = new db();
		$Order->query( $OrderSQL );
		
		if( $Order->execute() ){
			echo 'Ordenado com sucesso!';
		}else{
			echo 'Algo ocorreu errado!';
		}

		$count ++;	
	}
	
}
?>
</div>