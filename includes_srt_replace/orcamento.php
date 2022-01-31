<form class="float-md-right w-100 orcamento" name="contact-form" method="post">

    <div class="p-3 badge-primary">
        <div class="card-header"><h3 class="p-0 m-0 lead">Formulário de Orçamento</h3></div>
            
            <div class="form-group">
                    <input type="text" name="nome" id="nome" class="form-control border-0" required="required" placeholder="Seu nome">
            </div>
            <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control border-0" required="required" placeholder="E-mail">
            </div>
            <div class="form-group">
                    <input name="telefone" id="telefone" type="text" class="form-control border-0" required="required" placeholder="Telefone">
            </div>  
            <div class="form-group">
                    <input type="text" name="cidade" id="cidade" class="form-control border-0" required="required" placeholder="Cidade e Estado">
            </div>             
            <div class="form-group">
                <textarea name="mensagem" id="mensagem" required class="form-control border-0 " rows="4" placeholder="Sua mesagem"></textarea>
            </div>                        
        <div class="form-group">
            <input type="hidden" name="pagina" value="orcamento">
            <button type="submit" name="submit" class="btn btn-warning">Enviar</button>
        </div>
    </div>

</form> 
