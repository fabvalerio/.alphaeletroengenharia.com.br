<form class="float-md-right ml-md-3 mb-md-3 informativo" name="contact-form" method="post">

    <div class="card-bottom card card-hight">
        <div class="card-header"><h3 class="p-0 m-0 lead">Mais informações</h3></div>
        <div class="card-body">
            
            <div class="form-group row">
                <label class="col-sm-4 pr-0 col-form-label">Nome*</label>
                <div class="col-sm-8 pl-0">
                    <input type="text" name="nome" id="nome" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 pr-0 col-form-label">Email*</label>
                <div class="col-sm-8 pl-0">
                    <input type="email" name="email" id="email" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 pr-0 col-form-label">Telefone*</label>
                <div class="col-sm-8 pl-0">
                    <input name="telefone" id="telefone" type="text" class="form-control" required="required">
                </div>
            </div>  
            <div class="form-group row">
                <label class="col-sm-4 pr-0 col-form-label">Cidade/UF*</label>
                <div class="col-sm-8 pl-0">
                    <input type="text" name="cidade" id="cidade" class="form-control" required="required">
                </div>
            </div>             
            <div class="form-group">
                <label>Mensagem *</label>
                <textarea name="mensagem" id="mensagem" required class="form-control " rows="4"></textarea>
            </div>                        
        <div class="form-group">
            <input type="hidden" name="pagina" value="fale-conosco">
            <button type="submit" name="submit" class="btn btn-outline-success w-100">Enviar Mensagem</button>
        </div>
        </div>
    </div>

</form> 
