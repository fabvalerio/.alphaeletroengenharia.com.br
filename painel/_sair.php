<h2>Sair</h2>
<?


session_start();
session_destroy();

$_COOKIE['id'] = '';
setcookie('id', '');

?>

<meta http-equiv="refresh" content="0;URL=<?=$url?>login.php" />
