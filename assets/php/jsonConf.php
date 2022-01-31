<?

/*configuração*/
$__configSql = "SELECT * FROM configuracao WHERE tipo = 'conf'";
$__config = new db();     
$__config->query($__configSql);
$__config->execute();
$result__config = $__config->object();
$result__config->estruturacao;
$jsonConf = json_decode($result__config->estruturacao);

?>