<!DOCTYPE html>

<html lang="pt-br">

	<head>
		<title>Confeitaria - Cadastros dos gastos mensais</title>
	</head>

	<body>

<?php
	include('menu.php');
?>

		<form action="cadastrar_valor_gasto_mensalmente_db.php" method="post"><br>

			<label for="id_tipo_gasto">Tipo de Gasto</label><br>
			<select name="id_tipo_gasto" id="id_tipo_gasto">

				<?php
					$sql = "SELECT id, nome FROM tipo_gasto"; // WHERE status = 'A'"

					$query = mysqli_query($con, $sql);

					if($query) {
						while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>

				<option value="<?php echo $arr['id']; ?>"><?php echo $arr['nome']; ?></option>

				<?php
						}
					}
				?>			

			</select><br><br>

			<label for="mes_gasto">Mês do Gasto</label><br>
			<input type="datetime-local" name="mes_gasto" id="mes_gasto"><br><br>

			<label for="total">Total</label><br>
			<input type="text" name="total" id="total" maxlength="10"><br><br>
			
			<button type="submit">Cadastrar</button>
		</form>

		<script type="text/javascript" src="jquery-3.7.0.js"></script>

		<script type="text/javascript">	

			$(document).ready(function () {
				$('#cadastrar').on('click', function() {
					$.ajax({
						url: 'cadastrar_valor_gasto_mensalmente_db.php',
						method: 'POST',
						data: {
							id_tipo_gasto: $('#id_tipo_gasto').val(),
							mes_gasto: $('#mes_gasto').val(),
							total: $('#total').val(),				
						}
					}).done(function (dados) {
						var item = JSON.parse(dados);
						alert(item.msg);
						if(item.tipo == 'ok') {
							window.open('listar_valor_gasto_mensalmente.php');
						}
					});
				});
			});
		</script>
	</body>

</html>







