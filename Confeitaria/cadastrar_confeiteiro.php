<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Cadastro de Confeiteiro</title>
	</head>

	<body>
        
<?php
	include('menu.php');
?>
		<form action="cadastrar_confeiteiro_db.php" method="post">

			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="100"><br><br>
			
			<label for="especialidade">Especialidade</label><br>
			<select name="especialidade" id="especialidade">
				<option value="B">Bolos</option>
				<option value="D">Docinhos</option>
                <option value="S">Salgados</option>
			</select><br><br>

			<label for="data_contratacao">Data de Contratacao</label><br>
			<input type="date" name="data_contratacao" id="data_contratacao"><br><br>

			<button type="submit">Cadastrar</button>
		
		</form>

		<script type="text/javascript" src="../jquery-3.7.0.js"></script>

		<script type="text/javascript">	

			$(document).ready(function () {
				$('#cadastrar').on('click', function() {
					$.ajax({
						url: 'cadastrar_confeiteiro_db.php',
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








