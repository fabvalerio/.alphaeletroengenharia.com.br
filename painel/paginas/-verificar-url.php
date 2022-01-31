
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<?

$urlVerifica = trim($_GET['url']);
$id          = trim($_GET['pid']);


include('../php/db.class.php');

if( !empty($id) ){ $WHERE = " AND p.pag_id != '{$id}' "; }

$sql_query = "SELECT p.pag_link, m.menu_link
FROM paginas AS p
LEFT JOIN menu AS m
ON p.menu_menu_id = m.menu_id
WHERE ( p.pag_link = '{$urlVerifica}'
OR m.menu_link = '{$urlVerifica}' )
{$WHERE}";

$__InputSQL = new db();     
$__InputSQL->query($sql_query);
$__InputSQL->execute();

if( empty( $__InputSQL->rowCount() ) ){
	echo '<span class="text-success"><i class="fas fa-thumbs-up"></i> Ok!</spam>';
	?>
	<script>
		$(function() {
			$("#urlAmigavel input").addClass('badge-success');
			$("#urlAmigavel input").removeClass('badge-danger');
			$("#salvar").show();
		});
	</script>
	<?
}else{
	echo '<span class="text-danger"><i class="fas fa-times"></i> Já existe</spam>';
	?>
	<script>
		$(function() {
			$("#urlAmigavel input").addClass('badge-danger');
			$("#urlAmigavel input").removeClass('badge-success');
			$("#salvar").hide();
		});
	</script>
	<?
}

?>