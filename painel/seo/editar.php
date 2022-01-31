
<?

$edi = new db();
$edi->query( "SELECT * FROM seo WHERE seo_id = '".$link[3]."'" );
$edi->execute();
$row = $edi->object();

?>

<h2>Editar SEO</h2>


<hr>

<a class="btn btn-primary" href="<? echo $url?>!/<? echo $link[1]?>/visualizar">Voltar</a>

<hr>

<form enctype="multipart/form-data" id="form" method="post">
  <table class="table table-bordered">
    <tr class="success">
      <th valign="middle">P&aacute;gina</th>
      <td valign="middle"><input class="form-control" name="seo_pagina" type="text" autofocus id="seo_pagina" maxlength="200" value="<? echo $row->seo_pagina?>" />
        <p>M&aacute;ximo 200 Caracteres</p></td>
      </tr>
      <tr>
        <td colspan="2" valign="middle">Para ativar o SEO nas p&aacute;ginas, &eacute; necess&aacute;rio que informe a p&aacute;gina, exemplo:<br />
          www.dominio.com.br/<strong><u>quem-somos</u></strong></td>
        </tr>
        <tr>
          <th valign="middle">T&iacute;tulo</th>
          <td valign="middle"><input class="form-control" name="seo_titulo" type="text" autofocus id="seo_titulo" maxlength="90" value="<? echo $row->seo_titulo?>" />
            <p>M&aacute;ximo 90 Caracteres</p></td>
          </tr>
          <tr>
            <td colspan="2" valign="middle">T&iacute;tulos longos s&atilde;o melhores, em torno de 90 caracteres, apesar que o Google indexa o t&iacute;tulo at&eacute; 63 caracteres.&nbsp;</td>
          </tr>
          <tr>
            <th valign="middle">Descri&ccedil;&atilde;o</th>
            <td valign="middle"><textarea class="form-control" id="seo_descricao" name="seo_descricao" cols="45" rows="5"><? echo $row->seo_descricao?></textarea>
              <p>M&aacute;ximo 250 Caracteres</p></td>
            </tr>
            <tr>
              <td colspan="2" valign="middle">Digite uma descri&ccedil;&atilde;o de seu site, sugest&atilde;o de 250 caracteres, apesar que o Google indexa a Descri&ccedil;&atilde;o at&eacute; 160.</td>
            </tr>
            <tr>
              <th valign="middle">Keywords</th>
              <td valign="middle"><textarea class="form-control" name="seo_key" id="seo_key" cols="45" rows="5"><? echo $row->seo_key?></textarea>
                <p>M&aacute;ximo 200 caracteres</p></td>
              </tr>
              <tr>
                <td colspan="2" valign="middle">Escreva as palavras-chave separadas por v&iacute;rgula, sugest&atilde;o de 200 caracteres</td>
              </tr>

              <td colspan="2">
                <input  type="button" name="Enviar" id="salvar" value="Editar" class="btn btn-success w-100" />
                <input type="hidden" name="redirecionar" value="visualizar">   <!--Redirecionar-->
                <input type="hidden" name="tabela" value="seo">                <!--Tabela-->
                <input type="hidden" name="url" value="<? echo $url ?>">       <!--URL-->
                <input type="hidden" name="seo_id" value="<? echo $link[3]?>"> <!--Valor Editar-->
              </td>
            </tr>
          </table>
        </form>

        <div id="result"></div>

        <script src="<? echo $url ?>php/db.class.js" type="text/javascript" language="javascript"></script>
        <script type="text/javascript" language="javascript">
          /* EDITAR */
          editar('<? echo $url; ?>', 'seo_id', '<? echo $row->seo_id ?> ', '');
        </script>