
<?
session_start();
include('painel/php/db.class.php');



/* DONWLOAD */
if( $_POST['pagina'] == 'download' ){


	/*  ---------   */
	$reg_contato_mensagem .= "<p><b>Refer&ecirc;ncia</b> ".$_SERVER['HTTP_REFERER']."</p> ";
	$reg_contato_mensagem .= "<p><b>IP</b> ".$_SERVER['REMOTE_ADDR']."</p> ";
	$reg_contato_mensagem .= "<p><b>Página</b> ".$_POST['pagina']."</p> ";
	$reg_contato_mensagem .= "<p><b>Data</b> ".date('d-m-y H-:i:s')."</p> ";
	$reg_contato_mensagem .= "<p><b>Referencia:</b> ".$_SERVER['HTTP_REFERER']."</p> ";

	foreach( $_POST AS $key => $val ){
		$reg_contato_mensagem .= "<p><b>".$key."</b> ".$val."</p> ";
	}

	/*  ---------   */

	$SQL_Reg_Contato = "INSERT INTO contatos (cont_data, cont_email, cont_descricao, cont_status) VALUES (:cont_data, :cont_email, :cont_descricao, :cont_status )";

	$reg_contato = new db();
	$reg_contato->query( $SQL_Reg_Contato );

	$reg_contato->bind(":cont_data"     , date('Y-m-d H:i:s'));
	$reg_contato->bind(":cont_email"    , $_POST['email']);
	$reg_contato->bind(":cont_descricao", $reg_contato_mensagem);
	$reg_contato->bind(":cont_status"   , '0');

	if($reg_contato->execute()){

		/*redirecionar*/
		$__msg__reg_contato = "Seu cadastro foi realizado com sucesso!<br> Estamos redirecionando para  <i class=\"fas fa-download\"></i> download";
		$__msg__reg_color = 'success';

		$_SESSION['down'] = 'ativo';
		echo '<meta http-equiv="refresh" content="1;URL=download/ebook/'.$_POST['id'].'" />';
	}else{
		/*Erro no registro*/
		$__msg__reg_contato = "Ops! Ocorreu um erro... tente novamente ou mais tarde.";
		$__msg__reg_color = 'danger';
	}

	/* NEWSLETTER */
}elseif( $_POST['pagina'] == 'newsletter' || $_POST['pagina'] == 'news-blog' ){

	$SQL_Reg_Contato = "INSERT INTO newsletter (new_data, new_email, new_status) VALUES (:new_data, :new_email, :new_status )";

	$reg_contato = new db();
	$reg_contato->query( $SQL_Reg_Contato );

	$reg_contato->bind(":new_data", date('Y-m-d H:i:s'));
	$reg_contato->bind(":new_email", $_POST['email']);
	$reg_contato->bind(":new_status"   , '0');


	if($reg_contato->execute()){
		$__msg__reg_contato = "Seu email foi cadastro com sucesso!";
		$__msg__reg_color = 'success';
	}else{
		$__msg__reg_contato = "Ops! Ocorreu um erro... tente novamente ou mais tarde.";
		$__msg__reg_color = 'danger';
	}

}elseif( $_POST['pagina'] == 'calculadora' ){

	$SQL_Reg_Contato = "INSERT INTO contatos (cont_data, cont_email, cont_descricao, cont_status) VALUES (:cont_data, :cont_email, :cont_descricao, :cont_status )";

	$reg_contato = new db();
	$reg_contato->query( $SQL_Reg_Contato );

	$reg_contato->bind(":cont_data"     , date('Y-m-d H:i:s'));
	$reg_contato->bind(":cont_email"    , $_POST['email']);
	$reg_contato->bind(":cont_descricao", $reg_contato_mensagem);
	$reg_contato->bind(":cont_status"   , '0');

	if($reg_contato->execute()){

		/*redirecionar*/
		$__msg__reg_contato = "Sua solicitação de cállculo de honorário foi enviado com sucesso!";
		$__msg__reg_color = 'success';

	}else{
		/*Erro no registro*/
		$__msg__reg_contato = "Ops! Ocorreu um erro... tente novamente ou mais tarde.";
		$__msg__reg_color = 'danger';
	}

}elseif( $_POST['pagina'] == 'fale-conosco' ){

	$SQL_Reg_Contato = "INSERT INTO contatos (cont_data, cont_email, cont_descricao, cont_status) VALUES (:cont_data, :cont_email, :cont_descricao, :cont_status )";

	$reg_contato = new db();
	$reg_contato->query( $SQL_Reg_Contato );

	$reg_contato->bind(":cont_data"     , date('Y-m-d H:i:s'));
	$reg_contato->bind(":cont_email"    , $_POST['email']);
	$reg_contato->bind(":cont_descricao", $reg_contato_mensagem);
	$reg_contato->bind(":cont_status"   , '0');

	if($reg_contato->execute()){

		/*redirecionar*/
		$__msg__reg_contato = "Seu e-mail foi enviado com sucesso! Aguarde, iremos entrar em contato o mais rápido possível!";
		$__msg__reg_color = 'success';

	}else{
		/*Erro no registro*/
		$__msg__reg_contato = "Ops! Ocorreu um erro... tente novamente ou mais tarde.";
		$__msg__reg_color = 'danger';
	}

}elseif( $_POST['pagina'] == 'unidade' ){

	$SQL_Reg_Contato = "INSERT INTO contatos (cont_data, cont_email, cont_descricao, cont_status) VALUES (:cont_data, :cont_email, :cont_descricao, :cont_status )";

	$reg_contato = new db();
	$reg_contato->query( $SQL_Reg_Contato );

	$reg_contato->bind(":cont_data"     , date('Y-m-d H:i:s'));
	$reg_contato->bind(":cont_email"    , $_POST['email']);
	$reg_contato->bind(":cont_descricao", $reg_contato_mensagem);
	$reg_contato->bind(":cont_status"   , '0');

	if($reg_contato->execute()){

		/*redirecionar*/
		$__msg__reg_contato = "Seu e-mail foi enviado com sucesso! Aguarde, iremos entrar em contato o mais rápido possível!";
		$__msg__reg_color = 'success';

	}else{
		/*Erro no registro*/
		$__msg__reg_contato = "Ops! Ocorreu um erro... tente novamente ou mais tarde.";
		$__msg__reg_color = 'danger';
	}

}else{
	$__msg__reg_color = 'success';
}


?>

<div class="p-5 alert alert-<? echo $__msg__reg_color; ?> alert-dismissible fade show registro" role="alert">
	<strong>
		<?
		//print_r($_POST);
		echo $__msg__reg_contato;
		?>
	</strong>

	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>



<script>

	window.setTimeout(function() {
		jQuery(".alert").fadeTo(500, 0).slideUp(500, function(){
			jQuery(this).remove(); 
		});
	}, 12000);

</script>
