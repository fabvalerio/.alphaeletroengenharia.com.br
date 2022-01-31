<?

$_file = str_replace('//', '/', $_GET['file']);
$arq = file($_file);

foreach ($arq as $line_num => $line) {
    $codigo .= htmlspecialchars($line);
}


/* BKP */

$_fileBKP = str_replace('//', '/', $_GET['fileBKP']);
$arqBKP = file($_fileBKP);


foreach ($arqBKP as $line_numBkps => $lineBkps) {
    $codigoBkps .= htmlspecialchars($lineBkps);
}


/*Salvar*/
if( $link[3] == 'envio' ){

    $fp = fopen($_POST['dir'], "w+");
    fwrite($fp, $_POST['code']);
    fclose($fp);

    echo '<p class="bg-success text-white p-3">Salvo com sucesso!!! Aguarde...</p>';
    echo '<meta http-equiv="refresh" content="2;URL='.$url.'!/'.$link[1].'/'.$link[2].'&file='.$_file.'&fileBKP='.$_fileBKP.'" />';
}
?>


<link rel="stylesheet" href="<? echo $url; ?>assets/editor-less/codemirror.css">
<link rel="stylesheet" href="<? echo $url; ?>assets/editor-less/themes/icecoder.css">

<script src="<? echo $url; ?>assets/editor-less/codemirror.js"></script>
<script src="<? echo $url; ?>assets/editor-less/javascript.js"></script>
<script src="<? echo $url; ?>assets/editor-less/active-line.js"></script>
<script src="<? echo $url; ?>assets/editor-less/matchbrackets.js"></script>
<script src="<? echo $url; ?>assets/editor-less/css.js"></script>
<style>.CodeMirror {border: 1px solid #ddd; line-height: 1.2;}</style>

<a class="btn btn-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>

<hr>

<h2>Wireframes Editar <small><? echo $_file ?></small></h2>

<hr>

<div class="p-3 badge-light" style="height: 300px; overflow-y: auto;">
	<pre><? echo $codigoBkps; ?></pre>
</div>

<hr>
	
</textarea>

<form enctype="multipart/form-data" action="<?=$url."!/".$link[1]."/".$link[2]?>/envio&file=<? echo $_file ?>&fileBKP=<? echo $_fileBKP ?>" method="post">
				<textarea id="code" name="code" class="cm-s-icecoder" style="height: 800px;"><? echo $codigo; ?></textarea>
				<input type="hidden" name="dir" id="dir" value="<?=$_file?>">
				<button class="btn btn-lg btn-success w-100 my-3"><i class="far fa-save"></i> Salvar</button>
</form>


<script>
	var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
		lineNumbers: true,
		styleActiveLine: true,
		matchBrackets: true,
		mode: "text/x-less"
	});
</script>