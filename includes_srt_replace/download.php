<form class="float-lg-right ml-md-3 mb-md-2 download formulario" name="contact-form" method="post">

    <div class="card card-hight">
            <div id="capa-imagem"></div>

        <div class="card-body">

            <div class="card-title">Preencha os dados abaixo e fa&ccedil;a download gratuitamente</div>

            
            <div class="form-group">
                <label class="col-form-label">Nome*</label>
                    <input type="text" name="nome" id="nome" class="form-control" required="required">
            </div>
            <div class="form-group">
                <label class="col-form-label">Email*</label>
                    <input type="email" name="email" id="email" class="form-control" required="required">
            </div>
            <div class="form-group">
                <label class="col-form-label">Telefone*</label>
                    <input name="telefone" id="telefone" type="text" class="form-control" required="required">
            </div>               
        <div class="form-group">
            <input type="hidden" name="pagina" value="download">
            <input type="hidden" name="id" id="id" value="[[PID]]">
            <button type="submit" name="submit" class="btn btn-outline-success w-100"><i class="fas fa-file-download"></i> Download</button>
        </div>
        <div class="text-danger text-center">
            <small><i class="fas fa-bug"></i> Fique tranquilo, nós também não gostamos de SPAM.</small>
        </div>
        </div>
    </div>

</form> 
