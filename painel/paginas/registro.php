<?

/*Validar Usuбrio*/
if( empty( $_COOKIE['user_id'] ) )
{
 echo '<meta http-equiv="refresh" content="0;URL='.$url.'login.php">';
 exit;
}


include('../includes/#notify.php');
include('../php/db.class.php');

cadastro( $_POST['tabela'], $_POST );

?>