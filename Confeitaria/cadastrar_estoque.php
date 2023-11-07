<?php
	//include('validar.php');
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">

	<head>
		<title>Confeitaria - Cadastros dos gastos mensais</title>
	</head>

	<body>

<?php
	include('menu.php');
?>

		<form action="cadastrar_estoque_db.php" method="post"><br>

			<label for="id_produtos">Produto</label><br>
			<select name="id_produtos" id="id_produtos">

				<?php
					$sql = "SELECT id, descricao FROM produtos"; 

					$query = mysqli_query($con, $sql);

					if($query) {
						while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>

				<option value="<?php echo $arr['id']; ?>"><?php echo $arr['descricao']; ?></option>

				<?php
						}
					}
				?>

			</select><br><br>

			<label for="quantidade_estoque">Quantidade em Estoque</label><br>
			<input type="text" name="quantidade_estoque" id="quantidade_estoque" maxlength="5"><br><br>
			
			<button type="submit">Cadastrar</button>
		</form>
	</body>

</html>

<?php
	mysqli_close($con);
?>








