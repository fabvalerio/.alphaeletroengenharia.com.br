<?
date_default_timezone_set('America/Sao_Paulo');

?>
<script type="text/javascript" src="../js/jquery.min.js"><!-- //script --></script>
<?

$_POST['nome'] = 'WebMaster';
$_POST['email'] = 'WebMaster@site.com.br';
$_POST['telefone'] = '12 99999-9999';
$_POST['assunto'] = 'Teste de envio de email '.date('d/m/Y');
$_POST['mensagem'] = 'Nostrud nisi quis consectetur pariatur proident sed nisi cillum in reprehenderit dolore nostrud commodo laboris excepteur.';

// ====================================================================


$CamposObrigatorios = array('nome', 'email', 'telefone', 'assunto', 'mensagem');

  //listar
for( $i=0; $i<count($CamposObrigatorios); $i++ ){
  if( empty($_POST[$CamposObrigatorios[$i]]) ){
    $result[] = ' #'.$CamposObrigatorios[$i];
  }
}

  //agrupar
$result_post = @implode(',', $result);



// ====================================================================

  //verificaзгo de envio
if( !empty($result_post) )
{
 echo '<div style="cursor: auto; width: 100%" class="btn btn-danger btn-sm"><i class="fa fa-asterisk"></i> Campos Obrigat&oacute;rios!</div>
 <hr>
 <button type="button" name="submit" class="btn btn-outline-primary btn-lg form-control" onclick="javascript:Send();">Enviar Mensagem</button>';
}
else
{


// Inclui o arquivo class.phpmailer.php localizado na pasta class
  require_once ('../../assets/php/phpmailler/class.phpmailer.php');
  require_once ('../php/db.class.php');

  foreach( $_POST as $name => $value ){
    $mensagemHTML .= '<p><b>'.$name.': </b> '.$value.'</p>';
  }

//CONEXAO
  $SendEmail = new db();
  $SendEmail->query( " SELECT * FROM email WHERE mail_id = '1' ");
  $SendEmail->execute();
  $row = $SendEmail->object();


// Inicia a classe PHPMailer
  $mail = new PHPMailer();

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP

try {
     $mail->Host       = $row->mail_host; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail->Port       = $row->mail_port; //  Usar 587 porta SMTP
     $mail->Username   = $row->mail_email; // Usuário do servidor SMTP (endereço de email)
     $mail->Password   = $row->mail_senha; // Senha do servidor SMTP (senha do email usado)
     $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)

     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom($_POST['email'], $_POST['nome']); //Seu e-mail
     $mail->AddReplyTo($_POST['email'], $_POST['nome']); //Seu e-mail

     //COPIA
     if( !empty($row->mail_copia) ){  
      $mail->AddAddress($row->mail_copia);
      }

     $mail->Subject = $_POST['assunto'];//Assunto do e-mail


     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress($row->mail_email, $row->mail_nome);

     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('valerio.fabio@gmail.com', 'Destinatario'); // Copia
     //$mail->AddCC('fabiovalerio@contabexpress.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo


     //Define o corpo do email
     $mail->MsgHTML($mensagemHTML); 

     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('arquivo.html'));

     if( $mail->Send() ){
      echo '<div class="bg-sucesso p-4 my-4">'.$row->mail_texto_enviado.'</div>';

      echo '<div class="display:none">';
      $_POST['cont_ip']      = $_SERVER['REMOTE_ADDR'];
      $_POST['cont_data']    = date('Y-m-d H:i:s');
      $_POST['cont_pagina']  = $link[0];
      $_POST['cont_assunto'] = $_POST['assunto'];
      $_POST['cont_texto']   = $mensagemHTML;
      //cadastro('contato');
      echo '</div>';

    }else{
      echo '<div class="bg-danger p-4 my-4">'.$row->mail_texto_erro.'</div>';
    }


    //caso apresente algum erro é apresentado abaixo com essa exceção.
  }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
    }

}

//print_r($mail);

?>


