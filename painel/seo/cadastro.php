

<a class="btn btn-info" href="<?=$url?>!/<?=$link[1]?>/visualizar">Voltar</a>

<hr>
<h2 class="display-4">Cadastrar SEO Páginas Fixas</h2>
<hr>


<div class="card">
  <div class="card-body">
    <form enctype="multipart/form-data" id="cadastro" method="post">
      <table class="table">
        <tr class="success">
          <th valign="middle">P&aacute;gina</th>
          <td valign="middle"><input class="form-control" name="seo_pagina" type="text" autofocus id="seo_pagina" maxlength="200" />
            <p>M&aacute;ximo 200 Caracteres</p>
            <p class="alert-danger p-3">Para ativar o SEO nas p&aacute;ginas, &eacute; necess&aacute;rio que informe a p&aacute;gina, exemplo:<br />
              www.dominio.com.br/<strong><u>quem-somos</u></strong></p>
            </td>
          </tr>
            <tr>
              <th valign="middle">T&iacute;tulo</th>
              <td valign="middle"><input class="form-control" name="seo_titulo" type="text" autofocus id="seo_titulo" maxlength="90" />
                <p>M&aacute;ximo 90 Caracteres</p></td>
              </tr>
              <tr>
                <td colspan="2" valign="middle">T&iacute;tulos longos s&atilde;o melhores, em torno de 90 caracteres, apesar que o Google indexa o t&iacute;tulo at&eacute; 63 caracteres.&nbsp;</td>
              </tr>
              <tr>
                <th valign="middle">Descri&ccedil;&atilde;o</th>
                <td valign="middle">
                  <textarea class="form-control" id="seo_descricao" name="seo_descricao" cols="45" rows="5"></textarea>
                  <p>M&aacute;ximo 250 caracteres</p></td>
                </tr>
                <tr>
                  <td colspan="2" valign="middle">Digite uma descri&ccedil;&atilde;o de seu site, sugest&atilde;o de 250 caracteres, apesar que o Google indexa a Descri&ccedil;&atilde;o at&eacute; 160.</td>
                </tr>
                <tr>
                  <th valign="middle">Keywords</th>
                  <td valign="middle"><textarea name="seo_key" id="seo_key"  cols="45" rows="5" class="form-control" ></textarea>
                    <em>*200 caracteres</em></td>
                  </tr>
                  <tr>
                    <td colspan="2" valign="middle">Escreva as palavras-chave separadas por v&iacute;rgula, sugest&atilde;o de 200 caracteres</td>
                  </tr>

                  <tr>
                    <td colspan="2">

                      <input type="hidden" name="tabela" value="seo"> 
                      <input type="hidden" name="url" value="<? echo $url ?>">
                      <input type="hidden" name="redirecionar" value="visualizar">
                      <input type="button" name="Enviar" id="salvar" value="Enviar" class="btn btn-outline-success w-100 btn-lg" />


                    </td>
                  </tr>
                </table>
              </form>

            </div>
          </div>

<div id="result"></div>


<script src="<? echo $url ?>php/db.class.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">
  /* REGISTRO */
  cadastro('<? echo $url; ?>', '');
</script>

