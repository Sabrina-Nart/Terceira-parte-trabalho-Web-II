
<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Cadastro de Gastos</title>
	</head>

    <style>
        
    </style>

	<body>
        
<?php
	include('menu.php');
?>
		<form action="cadastrar_tipo_gasto_db.php" method="post">

			<label for="nome">Tipo do Gasto</label><br>
			<input type="text" name="nome" id="nome" maxlength="50"><br><br>
			
			<button type="submit">Cadastrar</button>
			</form>

		<script type="text/javascript" src="jquery-3.7.0.js"></script>

		<script type="text/javascript">	

			$(document).ready(function () {
				$('#cadastrar').on('click', function() {
					$.ajax({
						url: 'cadastrar_tipo_gasto_db.php',
						method: 'POST',
						data: {
							nome: $('#nome').val(),					
						}
					}).done(function (dados) {
						var item = JSON.parse(dados);
						alert(item.msg);
						if(item.tipo == 'ok') {
							window.open('listar_tipo_gasto.php');
						}
					});
				});
			});
		</script>

</body>

</html>









