<script>
	var $ativeMenu = jQuery.noConflict(); 
	$ativeMenu(document).ready(function(){
		$ativeMenu( "#products" ).addClass( "show" );
	});
</script>

<?
if( $link[9] == 'sim' ){

	$edit = new db();
	$edit->query( "UPDATE banner SET ban_capa = :ban_capa  WHERE ban_id = :ban_id" );

    $edit->bind(':ban_capa', $link[8]);
    $edit->bind(':ban_id', $link[3]);

    $edit->execute();

	echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/fotos/'.$link[3].'" />';

}elseif( $link[9] == 'nao' ){
	echo '<meta http-equiv="refresh" content="1;URL='.$url.'!/'.$link[1].'/fotos/'.$link[3].'" />';
}
?>


<h2 class="display-4 mb-3">Banner &bull;<span> Capa Imagem</h2>


	<hr>

<div class="card">
	<div class="card-body">
	<div class="col-sm-4 col-md-4 text-center">
		<div style="margin:15px;" class="thumbnail"><img src="<?=$url?><?=$link[4]?>/<?=$link[5]?>/<?=$link[6]?>/<?=$link[7]?>/<?=$link[8]?>" width="" height="200" alt=""/> </div>

		<p align="center">
			<a href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/'.$link[5].'/'.$link[6].'/'.$link[7].'/'.$link[8].'/sim'?>" class="btn btn-outline-success">Sim</a>
			<a href="<?=$url.'!/'.$link[1].'/'.$link[2].'/'.$link[3].'/'.$link[4].'/'.$link[5].'/'.$link[6].'/'.$link[7].'/'.$link[8].'/nao'?>" class="btn btn-outline-danger">N&atilde;o</a>
		</p>
	</div>
</div>
</div>