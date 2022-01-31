<?
date_default_timezone_set('America/Sao_Paulo');

?>
<script src="http://www.webfreelancer.com.br/code/jquery/jquery-1.12.2.min.js" type="text/javascript"></script>
<?
/*
$_email_ser_enviado
$body
$_assunto
*/

// ====================================================================


$CamposObrigatorios = array('nome', 'email', 'telefone');

  //listar
for( $i=0; $i<count($CamposObrigatorios); $i++ ){
  if( empty($_POST[$CamposObrigatorios[$i]]) ){
    $result[] = ' #'.$CamposObrigatorios[$i];
  }
}

  //agrupar
$result_post = @implode(',', $result);

  //print_r($_POST);


// ====================================================================

  //verificaзгo de envio
if( !empty($result_post) )
{
 echo '<div style="cursor: auto;" class="btn btn-danger btn-sm mb-2 w-100"><i class="fa fa-asterisk"></i> Campos Obrigat&oacute;rios!</div>
 <button type="button" onclick="javascript:Send();" class="btn btn-lg btn-outline-primary w-100">Solicitar <i class="fa fa-angle-right"></i></button>';
}
else
{


// Inclui o arquivo class.phpmailer.php localizado na pasta class
  require_once ('../assets/php/phpmailler/class.phpmailer.php');
  require_once ('../painel/php/db.class.php');

  foreach( $_POST as $name => $value ){
    $mensagemHTML .= strtolower('<p><b>'.$name.': </b> '.($value).'</p>');
  }

//CONEXAO
  $SendEmail = new CONNECT();
  $SendEmail->SQL( " SELECT * FROM email WHERE mail_id = '1' ");


// Inicia a classe PHPMailer
  $mail = new PHPMailer();
$mail->IsSMTP(); // Define que a mensagem será SMTP


// ========================================================================================================
// EMAIL AUTENTICADO
// ========================================================================================================
if( $SendEmail->exibi['mail_autenticado'] == '1' ){


  try {
     $mail->Host       = $SendEmail->exibi['mail_host']; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail->Port       = $SendEmail->exibi['mail_port']; //  Usar 587 porta SMTP
     $mail->Username   = $SendEmail->exibi['mail_email']; // Usuário do servidor SMTP (endereço de email)
     $mail->Password   = $SendEmail->exibi['mail_senha']; // Senha do servidor SMTP (senha do email usado)

     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom($_POST['email'], $_POST['nome']); //Seu e-mail
     $mail->AddReplyTo($_POST['email'], $_POST['nome']); //Seu e-mail

     $mail->Subject = "Lead - Landpage unidade de ".$_POST['unidade'];//Assunto do e-mail


     //Define os destinatário(s)
     $mail->AddAddress($_POST['destino'], $_POST['responsavel']);

     //Campos abaixo são opcionais 
     $mail->AddCC($SendEmail->exibi['mail_email'], $SendEmail->exibi['mail_nome']);
     //$mail->AddCC('fabiovalerio@contabexpress.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo


     //Define o corpo do email
     $mail->MsgHTML($mensagemHTML); 

     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('arquivo.html'));

     if( $mail->Send() ){
      echo '<div class="bg-success p-4 my-4">Cadastro com sucesso! Uns de nossos consultores ir&aacute; entrar em contato.</div>';

      echo '<div class="display:none">';
      $_POST['cont_ip']      = $_SERVER['REMOTE_ADDR'];
      $_POST['cont_data']    = date('Y-m-d H:i:s');
      $_POST['cont_pagina']  = 'LandPage Ramo - Unidade de '.$_POST['agenda_unidade'] ;
      $_POST['cont_assunto'] = "Lead Ramo - Landpage unidade de ".$_POST['unidade'];
      $_POST['cont_texto']   = $mensagemHTML;
      cadastro('contato');
      echo '</div>';

    }else{
      echo '<div class="bg-danger p-4 my-4">Ops! Ocorreu um erro, tente novamente ou mais tarde!</div>';
    }


    //caso apresente algum erro é apresentado abaixo com essa exceção.
  }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
    }

  // ========================================================================================================
  // EMAIL NÃO AUTENTICADO
  // ========================================================================================================
  }

       }

//print_r($mail);

       ?>



       <!-- enviar -->
       <script type="text/javascript">

        $validar = jQuery.noConflict(); 
        $validar('<?=$result_post?>').css({
          'border-color': 'red'
        });

        $validar('<?=$result_post?>').click(function(event) {
          /* Act on the event */

          $validar('<?=$result_post?>').css({
            'border-color': '#ccc'
          });
        });

      </script>


