<script>
	var $ativeMenu = jQuery.noConflict(); 
	$ativeMenu(document).ready(function(){
		$ativeMenu( "#products" ).addClass( "in show" );
	});
</script>


<?
$vis = new db();
$vis->query( "SELECT * FROM menu WHERE menu_status = '1' ORDER BY menu_order ASC" );
$vis->execute();
?>

<a class="btn btn-outline-warning" href="<? echo $url?>!/<? echo $link[1]?>/visualizar/<? echo $link[3]?>">Voltar</a>
<hr>
<h2 class="display-4">Ordenar Menu</h2>
<p>*Obs: A ordena&ccedil;&atilde;o n&atilde;o &eacute; poss&iacute;vel ser feito em vers&atilde;o responsivo</p>
<hr>

<script type="text/javascript" src="<? echo $url?>assets/organiza/jquery-organiza.js"></script>
<script type="text/javascript" src="<? echo $url?>assets/organiza/jquery-ui.js"></script>

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
					$drog.post("<? echo $url.$link[1]?>/updateList.php", order, function(theResponse){
						$drog("#response").html(theResponse);
						$drog("#response").slideDown('slow');
						$drog('#response').fadeOut('slow');
					}); 															 
				}								  
			});
			});
			
		});	
	</script>

	<div id="container">
		<div id="list">

			<ul class="row">
				<?php
				foreach( $vis->row() AS $row ){
					$id = stripslashes($row['menu_id']);
					?>
					<div class="col-md-2 move p-3 m-2" id="arrayorder_<? echo $row['menu_id'];?>">
						<div class="btn btn-secondary w-100">
							<div><i class="fas fa-arrows-alt"></i> <? echo $row['menu_titulo'];?></div>
						</div>
					</div>
					<? 
				} 
				?>
			</ul>
		</div>
		<div class="clearfix"></div>
		<hr>
		<div id="response"> </div>


	</div>




