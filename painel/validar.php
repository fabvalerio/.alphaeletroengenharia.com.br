<?

ob_start();
session_start();





include('php/db.class.php');
include('php/htaccess.php');

$_email = trim( $_POST['mail'] );
$_senha = trim( md5( $_POST['senha'] ) );

try {

	$LoginSql = "SELECT * FROM usuario WHERE user_email = '{$_email}' AND user_senha = '{$_senha}' AND user_status = '1' ";

	$Login = new db();	   
	$Login->query($LoginSql);
	$Login->execute();
	$resultLogin = $Login->object();

} catch (PDOException $e) {
	throw new PDOException($e);
}


		if(!empty($resultLogin->user_id)){

			//3600 dias * 24 horas
			setcookie("user_id", $resultLogin->user_id, time()+((3600*24)*7));
			setcookie("user_nivel", $resultLogin->user_nivel, time()+((3600*24)*7));
			//echo 'logado';
			header('location: '.$url);
		}else{
			//echo 'erro';
			header('location: '.$url.'/login.php?alert=error');
		}

?>

