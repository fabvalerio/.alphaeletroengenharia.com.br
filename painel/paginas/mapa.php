<?

	if( $link[4] == 'envio' ){
		// ADICIONAR
		cadastro('pagina_mapa');
		echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'" />';
	}elseif( $link[4] == 'deletar' ){
		// EXCLUIR
		excluir('pagina_mapa', "pagm_id = '".$link[5]."'");
		echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'" />';
	}


	      $listar = new db();
	      $listar->query( "SELECT *
	      				 FROM       pagina_mapa
	      				 INNER JOIN unidade
	      				 ON         pagina_mapa.pagm_mapa  = unidade.uni_id
	      				 WHERE      pagina_mapa.pagm_pagina = '{$link[3]}'" );

?>


<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>
<a class="btn btn-outline-success" href="<?=$url?>!/unidades/cadastro">Adiconar Mapa</a>

<?
$listMaps = new db();
$listMaps->query("SELECT * FROM pagina_mapa WHERE pagm_pagina = '{$link[3]}'");
do
{
	$listRemove[] = "uni_id <> '" . $listMaps->exibi['pagm_mapa'] . "'";
}while( $listMaps->exibi = mysql_fetch_assoc( $listMaps->result ) );

//INCLUDE
$listRemoveUnique = !empty( $listRemove ) ? 'AND ('.$listRemoveUnique = @implode(' AND ', $listRemove).')' : '';


if( empty( $listar->num_linha ) ){
?>

<hr>

<h2>Adicionar unidade(s) na p&aacute;ginas</h2>



<form enctype="multipart/form-data" action="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3]?>/envio" method="post">

	<div class="col-md-12 form-group">
		<div class="alert alert-danger">Campos (*) obrigat&oacute;rios</div>
	</div>

	<div class="col-md-8 form-group">
		<label>Local *</label>
		<select name="pagm_mapa" class="form-control" required="required">
			<? 
			  $listUnidades = new db();
			  $listUnidades->query( "SELECT * FROM unidade WHERE uni_id > '0' {$listRemoveUnique}" );

			  do{

			  	?>
			  	<option value="<? echo $listUnidades->exibi['uni_id']?>"><? echo $listUnidades->exibi['uni_endereco']?></option>
			  	<?

			  }while( $listUnidades->exibi = mysql_fetch_assoc( $listUnidades->Result ) );
			?>
		</select>
		<input type="hidden" name="pagm_pagina" value="<? echo $link[3] ?>">
	</div>
	<div class="col-md-4 form-group">
		<label>Salvar</label>
		<button class="btn btn-outline-success form-control" type="submit">Adicionar</button>
	</div>

</form>
<?
}
?>

<div class="clearfix"></div>

<hr>

<h2>Lista de Mapas Adiconados</h2>

<table class="table table-striped table-bordered table-hover" id="dataTables">
	<thead>
		<tr class="success">
			<th width="10">ID</th>
			<th>Endere&ccedil;o</th>
			<th width="" align="right"></th>
		</tr>
	</thead>
	<tbody>
	    <?
	      do{
	    ?>
		<tr>
			<td width="10"><? echo $listar->exibi['pagm_id']?></td>
			<td><? echo $listar->exibi['uni_endereco']?></td>
			<td width="" align="right">
				<a href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3]?>/deletar/<?=$listar->exibi['pagm_id']?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>
			</td>
		</tr>
		<?
		  }while( $listar->exibi = mysql_fetch_assoc( $listar->result ) );
		?>
	</tbody>
	<tbody>