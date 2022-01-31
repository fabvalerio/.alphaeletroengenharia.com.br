<?
$InputSQL = new db();
$InputSQL->query( "SELECT * FROM newsletter ORDER BY new_data DESC" );
$InputSQL->execute();
?>

<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>
<hr>
<h2 class="display-4 mb-3">Newsletter<small> (<?=$InputSQL->rowCount()?>)</small></h2>

<div card="row">
    <div class="col-12">
        <div class="row">
            <div class="col-lg-12">
                <textarea style="width:100%; height:20em;"><? if( !empty($InputSQL->row()) ){ foreach( $InputSQL->row() AS $row ){ echo $row['new_email']; } }?></textarea>
         </div>
     </div>
 </div>
</div>


