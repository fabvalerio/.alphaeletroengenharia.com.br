<form class="contact-form row formulario" name="contact-form" method="post">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Nome *</label>
            <input type="text" name="nome" id="nome" class="form-control" required="required">
        </div>
        <div class="form-group">
            <label>E-mail *</label>
            <input type="email" name="email" id="email" class="form-control" required="required">
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input id="telefone" name="telefone" type="text" class="form-control">
        </div> 
        <div class="form-group">
            <label>Cidade</label>
            <input id="cidade" name="cidade" type="text" class="form-control">
        </div>                     
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Assunto *</label>
            <input type="text" name="assunto" id="assunto" class="form-control" required="required">
        </div>
        <div class="form-group">
            <label>Mensagem *</label>
            <textarea name="mensagem" id="mensagem" required class="form-control" rows="6"></textarea>
        </div>                        
        <div class="form-group">
            <input type="hidden" name="pagina" value="fale-conosco">
            <button type="submit" name="submit" class="btn btn-outline-success w-100">Enviar Mensagem</button>
        </div>
    </div>
</form> 

