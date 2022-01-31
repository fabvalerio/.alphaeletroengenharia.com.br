
<style>
/** Easy Tree style */
.easy-tree {
    min-height: 20px;
    margin-bottom: 20px;
    /*background-color: #e56155;*/
    color: #ccc;
    border: none;
    border-top: none;
    padding-bottom: 15px;
}

.easy-tree > ul {
    padding-left: 15px;
    margin: 0;
}

.easy-tree li {
    list-style-type: none;
    margin: 15px;
    padding: 10px 5px 0 5px;
    position: relative
}

.easy-tree li::before, .easy-tree li::after {
    content: '';
    left: -30px;
    position: absolute;
    right: auto
}

.easy-tree li::before {
    border-left: 1px solid #000;
    bottom: 50px;
    height: 100%;
    top: 5px;
    width: 1px
}

.easy-tree li::after {
    border-top: 1px solid #000;
    height: 20px;
    top: 25px;
    width: 35px
}

.easy-tree li > span {
    border: 1px solid #000;
    border-radius: 3px;
    display: inline-block;
    padding: 5px;
    text-decoration: none
}

.easy-tree li.parent_li > span {
    cursor: pointer
}


.easy-tree > ul > li::before, .easy-tree > ul > li::after {
    /*border: 0*/
}

.easy-tree li:last-child::before {
    /*height: 70px*/
}

.easy-tree li.parent_li > span:hover, .easy-tree li.parent_li > span:hover + ul li span {
    background: #ff6c60;
    color: #000;
}

.easy-tree li.parent_li > span:hover + ul li.li_selected span {
    background: #e5e2e1;
    color: #e56155;
}

.easy-tree li > span > a {
    color: #000;
    text-decoration: none;
}

.easy-tree li > span > span.glyphicon-folder-close, .easy-tree li > span > span.glyphicon-folder-open {
    margin-right: 5px;
}

.easy-tree li.li_selected > span, .easy-tree li.li_selected > span > a {
    background: #e5e2e1;
    color: #e56155;
}

.easy-tree li.li_selected > span:hover, .easy-tree li.li_selected > span:hover > a {
    background: #fafafa;
    color: #ff6c60;
}

.easy-tree .easy-tree-toolbar {
    background-color: #000;
}

.easy-tree .easy-tree-toolbar > div {
    display: inline-block;
}

.easy-tree .easy-tree-toolbar > div > button {
    border-radius: 0;
    margin: 20px 5px;
}

.easy-tree .easy-tree-toolbar .create .input-group {
    top: -15px;
    margin-left: 5px;
    margin-right: 5px;
}

.easy-tree .easy-tree-toolbar .create .input-group input {
    border-radius: 0;
}

.easy-tree .easy-tree-toolbar .create .input-group button {
    border-radius: 0;
}

a[href="#"]{
	color: #fff;
	font-size: 15px;
	border:  1px solid #D84315;
	padding: 5px;
	background-color: #F4511E;
	border-radius: 4px;
}
</style>

<a class="btn btn-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>
<a class="btn btn-info" href="<?=$url?>!/<?=$link[1]?>/upar">Upar</a>

<hr>

<h2>Wireframes Páginas</h2>

<div class="p-4 my-3 badge-danger">
	<h2 class="lead">Qualquer a&ccedil;&atilde;o realizada, n&atilde;o poder&aacute; voltar!!!</h2>
</div>

<hr>


<?

$dir = "configuracao/wireframes/";
$dirClone = "configuracao/wireframes-bkp/";

function LerPasta($Pasta){ 
	$LerDiretorio = opendir($Pasta) or die('Erro');
	while($Entry = @readdir($LerDiretorio)) { 

		if( !strstr($Entry, '#') ){
			if(is_dir($Pasta.'/'.$Entry)&& $Entry != '.' && $Entry != '..') { 
				echo '<ul>';
				echo '<li><a href="#"><i class="fas fa-folder"></i> '.$Entry."</a>";
				LerPasta($Pasta.'/'.$Entry);
				echo '</li>';
				echo '</ul>';
			} else { 
				if( $Entry != '..' && $Entry != '.' ){
					echo '<ul>';
					echo '<li>';
					echo '<!--<a class="del btn btn-danger btn-sm" href="deletar"><i class="far fa-trash-alt"></i></a> -->
					      <a class="del btn btn-success btn-sm"  href="'.$url.'restaurar&file='.$Pasta.'/'.$Entry.'&fileBKP='.str_replace('wireframes', 'wireframes-bkp', $Pasta).'/'.$Entry.'"><i class="fas fa-sync"></i></a> 
					      <a class="btn btn-sm btn-primary" href="'.$url.'editar&file='.$Pasta.'/'.$Entry.'">'.$Entry.'</a>';
					echo '</li>';
					echo '</ul>';
				}
			} 
		}

	} 
	closedir($LerDiretorio);
} 

?>

<div class="container-fluid">
	<div class="easy-tree">

	<? LerPasta($dir); ?>


</div>
</div>

