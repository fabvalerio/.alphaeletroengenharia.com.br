
<?

	
	 include('assets/js/wideimage/lib/WideImage.php');

?>

<h2 class="head">Logo &bull; Principal</h2>

<table class="table">
    <td colspan="2">
    
    <fieldset>
         <form action="<?=$url.'!/'.$link[1].'/'.$link[2]?>/enviar" method="post" enctype="multipart/form-data">
            <div class="input-group">
            <input id="file" name="file" type="file" autocomplete="" required="required" class="form-control" accept="image/png" >
             <span class="input-group-addon" id="basic-addon2">Somente Imagens (PNG)</span>
            </div>
            <br>
            <input name="Enviar" type="submit" class="btn btn-success" value="Enviar Arquivo" />
        </form>
    </fieldset>
    
    
    </td>
  </tr>  
  <? if( $link[3] == 'enviar' ):?>
  <tr>
    <td colspan="2">
    <fieldset>
      <legend>Enviando</legend>
      <div>
        <?
		
		//criar pasta
		$__pastaFotos = 'logo/';

		@mkdir( $__pastaFotos.'principal', 0777 );
		@chmod( $__pastaFotos.'principal', 0777 );
		

			if( !empty($_FILES['file']['name']) ):
			
			   $extensaoFile = ".".@end(@explode('.', $_FILES['file']['name']));
			   echo '<div class="alert alert-success">';
			   
			   $NomeArquivoBanner = strtolower( 'logo'. $extensaoFile );
			   
			   if(move_uploaded_file($_FILES['file']['tmp_name'], $__pastaFotos . "/principal/" . $NomeArquivoBanner ))
			   {					
				  echo "Enviado com sucesso!";
			   }
			   else
			   {
				   echo "Erro no envio!";
			   }
			   echo '</div>';
			   
			endif;
		

		
		?>
      </div>
    </fieldset>
    </td>
  </tr>
  <? endif;?>
</table>

<hr>

<!--Thumb-->    
<div class="row">

<?
$pastaId = 'logo/';
$pasta = $pastaId.'/principal/';

$arquivos = glob("$pasta{*.jpg,*.png,*.gif}", GLOB_BRACE);

 foreach($arquivos as $img)
 {
?>
    <div class="col-sm-6 col-md-2">
	    <div class="thumbnail">
		    <a href="<?=$url.$pastaId.$nomeImagem; ?>" class="thumbnail group3">
		      <img src="<?=$url.$img; ?>?<? echo date('YmdHis'); ?>" class="img-fluid" alt="...">
		    </a>
	    </div>
    </div>
<?php 
 }
?>

</div>   
