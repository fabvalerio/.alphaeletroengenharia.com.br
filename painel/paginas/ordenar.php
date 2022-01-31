<?
$visSQL =  "SELECT * FROM ordenar WHERE ord_tabela = '".$link[1]."' AND ord_pid = '".$link[3]."' ORDER BY ord_lista ASC";
$vis = new db();
$vis->query( $visSQL );
$vis->execute();
//$visList = $vis->object();

$__pastaFotos = 'images/fotos-paginas/';
?>

<a class="btn btn-warning" href="<?=$url?>!/<?=$link[1]?>/fotos/<?=$link[3]?>">Voltar</a>
<hr>
<h2 class="display-4"><i class="fas fa-expand-arrows-alt"></i> Lista</h2>

<hr>

<?
$pastaId = 'images/fotos-paginas/'.$link[3];
$pasta = $pastaId.'/p/';

$arquivos = glob("$pasta{*.jpg,*.png,*.gif}", GLOB_BRACE);

foreach($arquivos as $img)
{
	$nomeImagem = @end( @explode('/', $img) );

	/*VERIFICAR*/
	$verificarSQL = "SELECT * 
	                 FROM ordenar 
	                 WHERE ord_tabela = '".$link[1]."' 
	                 AND ord_pid = '".$link[3]."' 
	                 AND ord_image = '".$nomeImagem."'";

	$verificar = new db();
	$verificar->query( $verificarSQL );
	$verificar->execute();
	$verificarImagem = $verificar->object();

	if( empty( $verificar->rowCount() ) ):

		/*adicionar*/
		$inserirSQL = "INSERT INTO 
		                    ordenar 
		                    (ord_tabela, ord_pid, ord_image, ord_lista) 
		                    VALUES 
		                    (:ord_tabela, :ord_pid, :ord_image, :ord_lista)";
		$inserir = new db();
		$inserir->query( $inserirSQL );

		$inserir->bind(':ord_tabela', $link[1]);
		$inserir->bind(':ord_pid', $link[3]);
		$inserir->bind(':ord_image', $nomeImagem);
		$inserir->bind(':ord_lista', 1);

        $inserir->execute();

		echo '<div class="alert alert-danger">';
		echo "Ordena&ccedil;&atilde;o est&aacute; sendo conclu&iacute;da, aguarde 3 segundo...";
		echo '</div>';
		echo '<meta http-equiv="refresh" content="3;URL=" />';
	endif;
}
?>




<script type="text/javascript" src="<?=$url?>assets/organiza/jquery-organiza.js"></script>
<script type="text/javascript" src="<?=$url?>assets/organiza/jquery-ui.js"></script>

<script type="text/javascript">
	var $drog = jQuery.noConflict();
	$drog(document).ready(function(){ 
		
		function slideout(){
			setTimeout(function(){
				$drog("#response").slideUp("slow", function () {});
			}, 1000);}

			$drog("#response").hide();
			$drog(function() {
				$drog("#list ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {

					var order = $drog(this).sortable("serialize") + '&update=update'; 
					$drog.post("<?=$url.$link[1]?>/updateList.php", order, function(theResponse){
						$drog("#response").html(theResponse);
						$drog("#response").slideDown('slow');
						slideout();
					}); 															 
				}								  
			});
			});

		});	
	</script>

	<div class="container-fluid" id="container">
		<div id="list">

			<div id="response"> </div>
			<ul class="row">
				<?
				foreach( $vis->row() as $row){

					$id = stripslashes($row['ord_id']);
					$text = stripslashes($row['ord_tabela']);

					$pastaIdVis = $__pastaFotos.$link[3];
					$pastaVis = $pastaIdVis.'/p/';
					
					?>
					<div class="col-md-2 move" id="arrayorder_<?=$row['ord_id'];?>">
						<div class="card">
						<div class="card-body">
							<div class="w-100" style="background-image:url('<?=$url.$pastaVis.'/'.$row['ord_image']?>'); height:100px;"></div>
						</div>
						</div>
					</div>
					<?php 
				} 
				?>
			</ul>
		</div>
	</div>



