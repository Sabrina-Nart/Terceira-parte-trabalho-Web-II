<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Cadastro de Clientes</title>
	</head>

    <style>
        
    </style>

	<body>
        
<?php
	include('menu.php');
?>
		<form action="cadastrar_cliente_db.php" method="post">

			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="100"><br><br>

			<label for="cpf">CPF</label><br>
			<input type="text" name="cpf" id="cpf" maxlength="11"><br><br>

			<label for="telefone">Telefone</label><br>
			<input type="text" name="telefone" id="telefone" maxlength="11"><br><br>

			<label for="endereco">Endereço</label><br>
			<input type="text" name="endereco" id="endereco" maxlength="100"><br><br>
			
			<label for="status">Sexo</label><br>
			<select name="sexo" id="sexo">
				<option value="F">Feminino</option>
				<option value="M">Masculino</option>
                <option value="O">Outro</option>
                <option value="P">Prefiro não dizer</option>
			</select><br><br>
			
			<label for="complemento">Complemento</label><br>
			<input type="text" name="complemento" id="complemento" maxlength="100"><br><br>

			<button type="submit">Cadastrar</button>

		</form>

		<script type="text/javascript" src="jquery-3.7.0.js"></script>

		<script type="text/javascript">	

			$(document).ready(function () {
				$('#cadastrar').on('click', function() {
					$.ajax({
						url: 'cadastrar_clientes_db.php',
						method: 'POST',
						data: {
							nome: $('#nome').val(),
							cpf: $('#cpf').val(),
							telefone: $('#telefone').val(),
							endereco: $('#endereco').val(),
							sexo: $('#sexo').val(),
							complemento: $('#complemento'),					
						}
					}).done(function (dados) {
						var item = JSON.parse(dados);
						alert(item.msg);
						if(item.tipo == 'ok') {
							window.open('listar_cliente.php');
						}
					});
				});
			});
		</script>
	</body>

</html>









