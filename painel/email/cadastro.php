
<h2 class="display-4 mb-3">Cadastro</h2>

<hr>

<a class="btn btn-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>

<hr>

<form enctype="multipart/form-data" action="<?=$url.'!/'.$link[1].'/'.$link[2]?>/envio" method="post">
<table class="table table-bordered">

  <tr class="success">
    <th width="200">Email</th>
    <td valign="middle">
    <input class="form-control" name="mail_email" type="mail" autofocus id="mail_email" maxlength="200" /> 
      <p>Máximo 200 Caracteres</p></td>
  </tr>

  <tr class="success">
    <th width="200">Email CC</th>
    <td valign="middle">
    <input class="form-control" name="mail_email_cc" type="mail" autofocus id="mail_email_cc" maxlength="200" /> 
      <p>Máximo 200 Caracteres</p></td>
  </tr>

  <tr class="success">
     <th>Senha</th>
     <td valign="middle">
     <input class="form-control" name="mail_senha" type="text" autofocus id="mail_senha" maxlength="20" />
        <p>M&aacute;ximo 20 Caracteres</p></td>
  </tr>
  <tr>
     <th>Host</th>
     <td>
     <input class="form-control" name="mail_host" type="text" autofocus id="mail_host" maxlength="20" />
    </td>
  </tr>
  <tr>
     <th>Porta SMTP</th>
       <td>
     <input class="form-control" name="mail_port" type="text" autofocus id="mail_port" maxlength="20" />
      </td>
    </tr>
  <tr>
    <td colspan="2"><input type="submit" name="Enviar" id="Enviar" value="Enviar" class="btn btn-success" /></td>
  </tr>
</table>
</form>
