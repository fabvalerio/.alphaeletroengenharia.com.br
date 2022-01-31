<?
include('../php/acentos.php');


@mkdir( 'images', 0777 );
@chmod( 'images', 0777 );
$__pastaFotos = './';

@mkdir( $__pastaFotos, 0777 );
@chmod( $__pastaFotos, 0777 );

if( !empty($_FILES['file']['name']) ){
 $extensaoFile = ".".@end(@explode('.', $_FILES['file']['name']));
 $NomeArquivo = strtolower( c($_FILES['file']['name']) );
 if(move_uploaded_file($_FILES['file']['tmp_name'],$__pastaFotos."/".$NomeArquivo ))
 {					
  echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
  Enviado com sucesso!
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
  </div>";
}
}else{
  {
   echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
   Ops! Ocorreu algo errado
   <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
   </div>";
 }

}

?>

<script src="../js/jquery-3.3.1.min.js"></script>
<script>
          setTimeout(function() { onloadGaleria(); }, 2000);
</script>