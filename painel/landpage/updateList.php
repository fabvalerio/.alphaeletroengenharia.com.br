<div class="alert alert-success">
<?php 
include("../php/db.class.php");
$array	= $_POST['arrayorder'];

if ($_POST['update'] == "update"){
	
	$count = 1;
	foreach ($array as $idval) {
		$query = "UPDATE dragdrop SET ord_lista = " . $count . " WHERE ord_id = " . $idval;
		mysql_query($query) or die('Ocorreu um erro!');
		$count ++;	
	}
	echo 'Salvo com sucesso!';
}
?>
</div>