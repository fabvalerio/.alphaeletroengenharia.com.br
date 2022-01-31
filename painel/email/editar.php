
<?

$edi = new db();
$edi->query( "SELECT * FROM email WHERE mail_id = '".$link[3]."'" );
$edi->execute();
$row = $edi->object();
?>

<h2 class="display-4 mb-3">Editar</h2>


<hr>

<a class="btn btn-outline-warning" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>

<hr>

<form enctype="multipart/form-data" method="post"  id="form">
  <table class="table table-striped">
    <tr>
      <th width="200">Nome</th>
      <td valign="middle">
        <input value="<? echo $row->mail_nome?>" class="form-control" name="mail_nome" type="mail" id="mail_nome" max="200" /> 
      </td>
    </tr>

    <tr>
      <th width="200">Email</th>
      <td valign="middle">
        <input value="<? echo $row->mail_email?>" class="form-control" name="mail_email" type="mail" id="mail_email" max="200" /> 
      </td>
    </tr>

    <tr>
     <th>Senha</th>
     <td valign="middle">
       <input value="<? echo $row->mail_senha?>" class="form-control" name="mail_senha" type="text" id="mail_senha" max="20" />
     </td>
   </tr>

   <tr>
    <th>Autenticado<br> <sub>(1 = Sim / 0 = N&atilde;o)</sub></th>
    <td valign="middle">
     <input value="<? echo $row->mail_autenticado?>" class="form-control" name="mail_autenticado" type="text" id="mail_autenticado" max="20" />
   </td>
 </tr>

 <tr>
  <th width="200">C&oacute;pia</th>
  <td valign="middle">
    <input value="<? echo $row->mail_copia?>" class="form-control" name="mail_copia" type="mail" id="mail_copia" max="200" /> 
  </td>
</tr>

<tr>
 <th>Host</th>
 <td>
   <input value="<? echo $row->mail_host?>" class="form-control" name="mail_host" type="text" id="mail_host" max="200" />
 </td>
</tr>

<tr>
 <th>Porta SMTP</th>
 <td>
   <input value="<? echo $row->mail_port?>" class="form-control" name="mail_port" type="text" id="mail_port" max="20" />
 </td>
</tr>
<tr>
 <td colspan="3"><hr></td>
</tr>
<tr>
 <td colspan="3"><h2>Mensagem de aviso</h2></td>
</tr>
<tr>
 <th>Envio - OK</th>
 <td>
   <input value="<? echo $row->mail_texto_enviado?>" class="form-control" name="mail_texto_enviado" type="text" id="mail_texto_enviado" max="50" />
 </td>
</tr>
<tr>
 <th>Envio - Erro</th>
 <td>
   <input value="<? echo $row->mail_texto_erro?>" class="form-control" name="mail_texto_erro" type="text" id="mail_texto_erro" max="50" />
 </td>
</tr>

<tr>
 <td colspan="2">
  <input  type="button" name="Enviar" id="salvar" value="Editar" class="btn btn-success w-100" />
  <input type="hidden" name="redirecionar" value="visualizar">  <!--Redirecionar-->
  <input type="hidden" name="tabela" value="email">           <!--Tabela-->
  <input type="hidden" name="url" value="<? echo $url ?>">      <!--URL-->
  <input type="hidden" name="mail_id" value="<? echo $link[3] ?>"> <!--Valor Editar-->
</td>
</tr>
</table>
</form>


<div id="result"></div>

<script src="<? echo $url ?>php/db.class.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
  /* EDITAR */
  editar('<? echo $url; ?>', 'mail_id', '<? echo $row->mail_id ?> ', '');
</script>