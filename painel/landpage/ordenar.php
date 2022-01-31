<?
	$visList = new CONNECT();
	$visList->SQL( "SELECT * FROM dragdrop WHERE ord_tabela = '".$link[1]."' AND ord_pid = '".$link[3]."' ORDER BY ord_lista ASC" );
		
	$__pastaFotos = 'images/fotos-landpage/';
?>

<a class="btn btn-warning" href="<?=$url?>!/<?=$link[1]?>/fotos/<?=$link[3]?>">Voltar</a>
<hr>
<h2 class="head">
	<img
 src="data:image/gif;base64,R0lGODlhJwAnAPcAAPT09PHx8Tg4OEFBQfX19RwcHDo6Ojs7Oy4uLi8vLysrKx4eHhoaGtzc3BgYGAgICEBAQD09Pff39/7+/lNTUy0tLc7OzjMzM/Ly8hYWFunp6c/Pz25ubkdHR9HR0Tw8POHh4UVFRbe3t1dXVzU1NeDg4NfX1wUFBUZGRufn5+zs7LW1tUJCQnV1dUlJSdnZ2RMTEyoqKj8/P1lZWfb29lBQUOvr6yIiIoqKisjIyNjY2N7e3kRERMPDw1VVVSQkJOjo6PPz811dXVZWVsbGxs3NzcLCwiEhITY2NmxsbBQUFHZ2dj4+PmVlZe/v72BgYOLi4hcXFxsbG21tbSAgIDAwMCcnJ8XFxfDw8AMDA0pKSoiIiNDQ0FtbWywsLF9fX09PT2lpae7u7jk5Od3d3dPT09/f38zMzL+/vykpKfr6+l5eXvn5+W9vb4yMjPz8/Pj4+NLS0g0NDZaWlrOzs/v7+4CAgKioqNra2nh4eJCQkIKCghISEoeHh42NjSYmJpGRkbi4uLa2tpiYmHR0dMHBwX9/fzQ0NL29vbq6uqqqqh0dHXJycgoKCubm5v39/b6+vjExMTc3N2FhYVFRUdXV1SMjI3d3d1xcXIGBgYaGhh8fH0xMTOPj42ZmZsrKyo6OjlhYWO3t7a+vr5mZmTIyMgkJCUhISA4ODsDAwFJSUsfHx7m5uaGhoRkZGXNzcyUlJcTExLCwsP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAAAAAAALAAAAAAnACcAAAj/AGcJHEiwoMGDCBMqXMiwIBwPKWapmHFBRpU2ZjoFaMgQiBAkEWRZOGAEwIoEpSLwYPVoAkeEoD4UcnMhD4sys0wI2LKqBQlMXVa8NEjoi8AtMUjEmWXhw4ZZJSo8CRNDxFCCgAaImoUlRAUPTA9cmfWiioVZk3xcHYgnTSuBOKxwmVVEwFgdCGLNElFh7UA7Y8TMWlGhyKwzF3rk9KJ4hyW/LxDlSHBnVg4BTzcIIJIzjWIQR9YqQlAhAixPE2hskDBLwgYCsyotQDMLxIK1Vhh94iBFABCEKvpAmdVAytoCTmZNwOGK9sJRP9ZGSSQwwJE5DJvwWDvkggaBREAs/yzxx89ASDkakrkh5A3HPQsizvLgQ4iZhiL4LHG5sEEUTQJ50EECCQxRQkODoLJEHQu18UNEZbiAwIQIjDAcQ6TAMIINCb2QAQ6zOMKEAiSWSAkN+BXAAwAIZVIAhyVwwEETCSCRRBItsNiQEY3ocRABMUxREAAojOAXGDKoYZAHptBRkAQdGLnWFJLoSJAgSgRSEAEhqEXQBCAI5hcXB7SwJQsUGPQEJzusZYEACxhSEBsDpFlQGAt0QMZQZwhQQAEcYADAoASoIEMNBAwKAAFOzPDnKQ1wtIIBDFR6AxMDQADBABFsckOmmg5gwAKVMqAKR6mE4MCqP0RwgAEGfJJwwCJUyArrq1Ss6sAaLzXAQgYZcBBEAMRioIEALgxbLBahAEvBd70OAMMlc46hhUFfwPDsWjsM8MqQJHRg0Bo1qOBXa0GAi4JBGCh57kE0HCLuuxxh4AUE9C5kAgVdaCGHEjXMMMRG+RakQQIPJKxwCKwVXFADF5wg8QkucOiwQTpEkkUWKPx28UE6oACGfAgFBAA7" 
 alt="http://www.stellarinfo.com/sp-images/product-images/drag-drop.gif" width="25">

    <span>Lista</span>
</h2>
<hr>

<?
	$pastaId = 'images/fotos-landpage/'.$link[3];
	$pasta = $pastaId.'/p/';
	
	$arquivos = glob("$pasta{*.jpg,*.png,*.gif}", GLOB_BRACE);
	
	 foreach($arquivos as $img)
	 {
		 $nomeImagem = @end( @explode('/', $img) );
		 
		 //echo $nomeImagem;
		 //echo "<br>";
		 
		 //VERIFICAR
		 $verificarImagem = new CONNECT();
		 $verificarImagem->SQL( "SELECT * FROM dragdrop WHERE ord_tabela = '".$link[1]."' AND ord_pid = '".$link[3]."' AND ord_image = '".$nomeImagem."'" );
	     
		 if( empty( $verificarImagem->num_linha ) ):
		 
		 	//adicionar
			$inserirImage = new CONNECT();
			$inserirImage->INSERIR_MULTI("dragdrop", array('ord_tabela', 'ord_pid', 'ord_image', 'ord_lista'), 
			                                        array($link[1], $link[3], $nomeImagem, 1)
									   );
		    
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

<div id="container">
  <div id="list">

    <div id="response"> </div>
    <ul>
      <?php
		do
		{
			
		$id = stripslashes($visList->exibi['ord_id']);
		$text = stripslashes($visList->exibi['ord_tabela']);
		
		$pastaIdVis = $__pastaFotos.$link[3];
		$pastaVis = $pastaIdVis.'/p/';
					
	   ?>
      <div class="col-md-2 move" id="arrayorder_<?=$visList->exibi['ord_id'];?>">
            <div class="thumbnail">
             <div class="capa" style="background-image:url('<?=$url.$pastaVis.'/'.$visList->exibi['ord_image']?>'); height:100px;"></div>
            </div>
          </div>
      <?php 
	   } 
	   while( $visList->exibi = mysql_fetch_assoc( $visList->result ) );
	  ?>
    </ul>
  </div>
</div>



