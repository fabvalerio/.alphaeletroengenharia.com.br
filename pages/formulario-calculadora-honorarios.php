
<form class="calculadora p-3" name="contact-form" method="post">
	<div class="form-group">
		<h3>CALCULADORA DE HONORÁRIOS</h3>
	</div>
	<div class="row">
		<div class="form-group col-6">
			<label class="text-white">Funcionários</label>
			<input type="number" name="funcionario" min="0" class="form-control" placeholder="Quantidade" min="0" max="99999">
		</div>
		<div class="form-group col-6 pl-0">
			<label class="text-white">Notas</label>
			<input type="number" name="entrada-e-saida" min="0" class="form-control" placeholder="Entrada e Saída" min="0" max="99999">
		</div>
	</div>
	<div class="form-group">
		<select name="regime" class="form-control">
			<option value="" disabled selected>Regime tributário?</option>
			<option value="MEI">MEI</option>
			<option value="Simples Nacional">Simples Nacional</option>
			<option value="Lucro Presumido">Lucro Presumido</option>
			<option value="Lucro Real">Lucro Real</option>
		</select>
	</div>
	<div class="form-group">
		<select name="faturamento" class="form-control">
			<option value="" disabled selected>Faturamento mensal</option>
			<option value="a50mil">Até 50mil</option>
			<option value="a100mil">Até 100mil</option>
			<option value="a150mil">Até 150mil</option>
			<option value="a200mil">Até 200mil</option>
			<option value="a300mil">Até 300mil</option>
			<option value="m300mil">Mais de 300mil</option>
		</select>
	</div>
	<div class="form-group">
		<input type="text" name="nome" class="form-control" placeholder="Seu Nome">
	</div>
	<div class="form-group">
		<input type="email" name="email" class="form-control" placeholder="Seu email">
	</div>
	<div class="form-group">
		<input type="text" name="cidade" class="form-control" placeholder="Cidade / Estado">
	</div>
	<div class="text-center">
		<input type="hidden" name="pagina" value="calculadora">
		<button type="submit" class="btn btn-warning"><i class="fas fa-calculator"></i> CALCULAR</button>
	</div>
</form>