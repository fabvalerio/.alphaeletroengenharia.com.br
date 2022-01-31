


<div class="container-fluid">

  <div class="row">

    <div class="col-md-12">

      <div class="row">
        <div class="col-md-6">
          <blockquote class="blockquote">
            <h2>Ol&aacute; <? echo $jsonConf->c_nome; ?>, quer uma dica?</h2>
            <small>Sempre verifique se tem mensagens na sua caixa de entrada.</small>
            <br>
            <?

            try {

              $_num_paginaSql = " SELECT * FROM contatos WHERE cont_status = '0' ";

              $_num_pagina = new db();     
              $_num_pagina->query($_num_paginaSql);
              $_num_pagina->execute();
              $result_num_pagina = $_num_pagina->object();

            } catch (PDOException $e) {
              throw new PDOException($e);
            }

            ?>
            <a class="btn btn-outline-danger btn-lg mt-4" href="<?=$url?>!/contatos/visualizar">Verificar Agora (<? echo $_num_pagina->rowCount(); ?>) <i class="fas fa-envelope-open-text"></i></a>
            <a class="btn btn-outline-info btn-lg mt-4" href="<?=$url?>!/paginas/cadastro">Novo conteúdo <i class="fas fa-file"></i></a>
          </blockquote>
        </div>

        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12"><h3>Cadastros</h3></div>

            <div class="col-md-2 col-sm-4 col-xs-4 bg-warning text-white num-resultado-home">
              <h5>P&aacute;ginas</h5>
              <p>
                <?
                try {

                  $_num_paginaSql = " SELECT pag_id FROM paginas ";

                  $_num_pagina = new db();     
                  $_num_pagina->query($_num_paginaSql);
                  $_num_pagina->execute();
                  $result_num_pagina = $_num_pagina->object();

                } catch (PDOException $e) {
                  throw new PDOException($e);
                }

                echo '<i class="fas fa-paper-plane"></i> '.$_num_pagina->rowCount();;
                ?>
              </p>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-4 bg-warning text-white bg-faded num-resultado-home">
              <h5>Menus</h5>
              <p>
                <?
                try {

                  $_num_paginaSql = "SELECT menu_id FROM menu";

                  $_num_pagina = new db();     
                  $_num_pagina->query($_num_paginaSql);
                  $_num_pagina->execute();
                  $result_num_pagina = $_num_pagina->object();

                } catch (PDOException $e) {
                  throw new PDOException($e);
                }
                echo '<i class="fas fa-list-ol"></i> '.$_num_pagina->rowCount();;
                ?>
              </p>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4 bg-warning text-white bg-faded num-resultado-home">
              <h5>Categorias</h5>
              <p>
                <?
                try {

                  $_num_paginaSql = "SELECT cat_id FROM paginas_categoria";

                  $_num_pagina = new db();     
                  $_num_pagina->query($_num_paginaSql);
                  $_num_pagina->execute();
                  $result_num_pagina = $_num_pagina->object();

                } catch (PDOException $e) {
                  throw new PDOException($e);
                }
                echo '<i class="fas fa-cog"></i> '.$_num_pagina->rowCount();;
                ?>
              </p>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4 bg-warning text-white bg-faded num-resultado-home">
              <h5>Subcategorias</h5>
              <p>
                <?
                try {

                  $_num_paginaSql = "SELECT sub_id FROM paginas_subcategoria";

                  $_num_pagina = new db();     
                  $_num_pagina->query($_num_paginaSql);
                  $_num_pagina->execute();
                  $result_num_pagina = $_num_pagina->object();

                } catch (PDOException $e) {
                  throw new PDOException($e);
                }
                echo '<i class="fas fa-cogs"></i> '.$_num_pagina->rowCount();;
                ?>
              </p>
            </div>
          </div>
        </div>

        <div class="clearfix"></div>
      </div>

      <hr>


      <p>
        <a class="btn btn-success form-control text-xs-left" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          <i class="fa fa-chevron-down"></i>
          Como funciona a busca do Google? 
        </a>
      </p>

      <div class="collapse" id="collapseExample">
        <div class="card card-block">
          <div class="card-body">

            <p>Para entender como tudo isso funciona precisaremos primeiro entender como o Google (<a href="//www.google.com.br/addurl" target="_blank">Adicionar Site no Google</a>, <a href="http://www.bing.com/toolbox/submit-site-url" target="_blank">Adicionar Site no Bing</a>) obt&eacute;m as informa&ccedil;&otilde;es utilizadas em seus resultados.</p>
            <p>Existe um rob&ocirc; chamado Googlebot que fica escaneando a web. Todo o conte&uacute;do produzido na internet pode ser indexado desde que n&atilde;o seja barrado. Para o Googlebot n&atilde;o conseguir encontrar um site existem algumas formas, sendo as mais comuns o arquivo <a href="../robots.txt" target="_blank">robots.txt</a> e os links nofollow. O arquivo <a href="../robots.txt" target="_blank">robots.txt</a> &eacute; um arquivo que funciona como filtro para os mecanismos de busca na internet permitindo ou n&atilde;o que as p&aacute;ginas de um site sejam indexadas.</p>
            <p>Este rob&ocirc; segue links para chegar aos diversos sites espalhados na web. Se n&atilde;o houver nenhum link apontando para o seu site ou se todos estiverem marcados com a tag nofollow o seu site n&atilde;o ser&aacute; indexado. Para agilizar o processo de indexa&ccedil;&atilde;o do seu site no Google voc&ecirc; pode utilizar arquivos XML e mostrar para o buscador todas as p&aacute;ginas do seu site.</p>
            <p>Quanto mais links existirem apontando para o seu site, maior a relev&acirc;ncia dele na web. Isto &eacute; utilizado para calcular o t&atilde;o falado PageRank. Depois de verificada a relev&acirc;ncia da p&aacute;gina chega a hora dela ser analisada segundo as pol&iacute;ticas editoriais do Google.</p>
            <h3>Quanto tempo demora para o site aparecer no Google, Bing ou Yahoo</h3>
            <p>N&atilde;o h&aacute; um prazo pr&eacute;-determinado para que seu site comece a aparecer no Google, Yahoo ou Bing (antigo MSN Live Search). Ele pode ser indexado em poucos dias como pode levar alguns anos, isso depender&aacute; da divulga&ccedil;&atilde;o e quantos links apontam para ele (an&uacute;ncios externos).</p>
            <p>Tente pensar da seguinte forma, a internet &eacute; um imenso mar de informa&ccedil;&otilde;es que s&atilde;o apresentadas em forma de sites. Uma vez que seu site &eacute; criado ele estar&aacute; isolado, como em uma ilha, onde n&atilde;o h&aacute; pontes e ningu&eacute;m conhece o caminho.</p>
            <p>Uma vez que seu site recebe um link de um site que j&aacute; est&aacute; interligado ao &quot;continente&quot;, &eacute; criado uma ponte para que o seu site seja reconhecido pelos buscadores e a partir da&iacute; comece a aparecer.</p>
            <p>Outra forma de tirar seu site desta ilha, &eacute; submet&ecirc;-lo manualmente atrav&eacute;s das p&aacute;ginas de sugest&atilde;o de sites. Veja aqui algumas p&aacute;ginas de submiss&atilde;o de sites:</p>
            <p><a href="http://www.google.com/addurl/?continue=/addurl." target="_blank">http://www.google.com/addurl/?continue=/addurl.</a></p>
            <h3>SiteMap.xml</h3>
            <p>Os sites de busca oferecem ainda um mecanismo para que webmasters submetam o conte&uacute;do de seus sites atrav&eacute;s de um sitemap (mapa de site) no formato XML (eXtensible Markup Language) ou .TXT. O nome do arquivo n&atilde;o possui um padr&atilde;o obrigat&oacute;rio, mas geralmente &eacute; chamado de SITEMAP.XML. O <a href="../sitemap.xml" target="_blank">sitemap.xml</a> &eacute; um arquivo que tem a finalidade de listar as p&aacute;ginas de um site que gostar&iacute;amos de ter presentes nos resultados de busca. O Google permite ainda a submiss&atilde;o de imagens e v&iacute;deos.</p>
            <p>Resumindo, arquivo <a href="../sitemap.xml" target="_blank">sitemap.xml</a> &eacute; usado como um &iacute;ndice aos buscadores, facilitando o acesso a essas p&aacute;ginas e arquivos. Vale frisar, por&eacute;m, que &eacute; muito mais importante ter um site facilmente restre&aacute;vel pelos rob&ocirc;s do que usar o <a href="../sitemap.xml" target="_blank">sitemap.xml</a> para contornar falhas na arquitetura do site.</p>
          </div>
        </div>
      </div>


      <div class="clearfix"></div>

      <p>
        <a class="btn btn-danger form-control text-xs-left" data-toggle="collapse" href="#collapseAlertas" aria-expanded="false" aria-controls="collapseAlertas">
          <i class="fa fa-chevron-down"></i>
          Avisos importante
        </a>
      </p>

      <div class="collapse" id="collapseAlertas">
        <div class="card card-block">
          <div class="card-body">

            <div class="alert alert-success">
             <h2 class="alert-heading"><i class="fa fa-info"></i> <strong>Alerta</strong></h2>
             <p>  Tenha cuidado ao editar o conte&uacute;do do seu site. N&atilde;o insira imagens com resolus&atilde;o muito alta.
              Isso afeta o carregamento das p&aacute;ginas.<br>
              <strong>Obter pela resolu&ccedil;&otilde;es pr&oacute;ximas a <?=$__config->exibi['c_tamanho_image']?>px, na galeria de fotos
              e nas p&aacute;ginas internas</strong>.</p>
              <p>Ao carregar a(s) imagen(s), o sistema ir&aacute; automaticamente edita-la, para resolus&atilde;o padrr&atilde;o da web - 72dpis e 
                tamb&eacute;m ir&aacute; gerar 3 tamanhos:
                <ol>
                  <li>P = 600x400</li>
                  <li>M = 800x600</li>
                  <li>G = 1400x1050</li>
                </ol>
                <p>Obs: Caso envie uma imagem menor do que foi pedido, a imagem ir&aacute; estourar os pixel</p>
              </p>

              <h2>Tamanho de telas</h2>

              <div class="row">

                <div class="col-sm-2">
                  <div class="card card-block">
                    <h5 class="card-title">Desktop</h5> 
                    <div class="btn btn-primary btn-sm">(1920x1080)</div>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="card card-block">
                    <h5 class="card-title">Desktop</h5> 
                    <div class="btn btn-primary btn-sm">(1366x768)</div>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="card card-block">
                    <h5 class="card-title">Desktop</h5> 
                    <div class="btn btn-primary btn-sm">(1440x900)</div>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="card card-block">
                    <h5 class="card-title">Desktop</h5> 
                    <div class="btn btn-primary btn-sm">(1280x800)</div>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="card card-block">
                    <h5 class="card-title">Desktop</h5> 
                    <div class="btn btn-primary btn-sm">(2560x1080)</div>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="card card-block">
                    <h5 class="card-title">Desktop</h5> 
                    <div class="btn btn-primary btn-sm">(2560x1600)</div>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="card card-block">
                    <h5 class="card-title">Tablet</h5> 
                    <div class="btn btn-danger btn-sm">(1024x768)</div>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="card card-block">
                    <h5 class="card-title">Tablet</h5> 
                    <div class="btn btn-danger btn-sm">(768x1024)</div>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="card card-block">
                    <h5 class="card-title">Phone</h5> 
                    <div class="btn btn-success btn-sm">(320x480)</div>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="card card-block">
                    <h5 class="card-title">Phone</h5> 
                    <div class="btn btn-success btn-sm">(720x450)</div>
                  </div>
                </div>


              </div>
            </div>


          </div>




     </div>
   </div>

          <div class="alert alert-info">
           <h2 class="alert-heading"><i class="fa fa-paper-plane-o"></i> <strong>Banner</strong></h2>
           <p>
            A imagem do banner tamb&eacute;m &eacute; muito importante. <strong>Insira imagens com resolus&atilde;o pedida na p&aacute;gina <? echo $jsonConf->c_tamanho_banner; ?>px.</strong>
          </p>
        </div>

        <div class="alert alert-danger">
         <h2 class="alert-heading"><i class="fas fa-skull-crossbones"></i> <strong>Cuidado</strong></h2>
         <p> 
           O Painel Administrativo controla todo o seu site. Fa&ccedil;a tudo com aten&ccedil;&atilde;o para evitar transtornos.
         </p>
       </div>

 </div><!-- /col-lg-9 END SECTION MIDDLE -->


</div><!--/row -->
</div>