<div class="alert alert-success">
<?php 
include("../php/db.class.php");
$array	= $_POST['arrayorder'];

//print_r($array);
//echo '<br>';

if ($_POST['update'] == "update"){
	
	$count = 1;
	foreach ($array as $idval) {


	    $_alinhar = new db();
	    $_alinhar->query( "UPDATE menu SET menu_order = " . $count . " WHERE menu_id = " . $idval);
	    $_alinhar->execute();

		$count ++;	
	}
	echo 'Salvo com sucesso!';
}
?>
</div>