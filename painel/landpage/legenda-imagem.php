<?

  $_tabela      = $link[1];
  $_leg_foto_id = $link[3];
  $_leg_foto    = $link[8];



    //verificar DB
	$VisLegend = new CONNECT();
	$VisLegend->SQL("SELECT * FROM legenda_foto WHERE leg_tabela = '".$_tabela."' AND leg_foto_id = '".$_leg_foto_id."' AND leg_foto = '".$_leg_foto."' ");
    
		if( $link[9] == 'sim' ):
		
		    //print_r($_POST);
		
		    //cadastro
			if( empty( $VisLegend->exibi['leg_legenda'] ) ):
			
			   cadastro('legenda_foto');
			
			//editar
			else:
			   
			   $_POST['leg_id'] = $VisLegend->exibi['leg_id'];
			   editar('legenda_foto', 'leg_id', $VisLegend->exibi['leg_id']);
			
			endif;
			
		   echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/fotos/'.$link[3].'" />';		   
		   
		
		elseif( $link[9] == 'nao' ):
		  
			echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/fotos/'.$link[3].'" />';
		
		endif;

?>

<form action="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/'.$link[5].'/'.$link[6].'/'.$link[7].'/'.$link[8].'/sim'?>" method="post">

    <h2>Legenda na imagem</h2>
    
    
    <hr>
    <a class="btn btn-warning" href="javascript:window.history.back()" style="background:#FFB600 !important; text-decoration:none">Voltar</a>
    
    <hr>
    
    <div class="col-sm-4 col-md-4">
        <div style="margin:15px;" class="thumbnail"><img src="<?=$url?><?=$link[4]?>/<?=$link[5]?>/<?=$link[6]?>/<?=$link[7]?>/<?=$link[8]?>" width="" height="" alt=""/> </div>
        
    </div>
    
    <div class="col-sm-8 col-md-8">
        <label>Legenda</label>
        <textarea name="leg_legenda" class="form-control"><?=$VisLegend->exibi['leg_legenda']?></textarea>
        <br>
        <button class="btn btn-success">Enviar</button>
    </div>
    
<input type="hidden" name="leg_tabela"  value="<?=$_tabela?>">
<input type="hidden" name="leg_foto_id" value="<?=$_leg_foto_id?>">
<input type="hidden" name="leg_foto"    value="<?=$_leg_foto?>">

</form>