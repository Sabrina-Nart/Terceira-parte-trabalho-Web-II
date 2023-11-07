<?php
	//include('validar.php');
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Confeitaria - Cadastrar Preço dos Produtos no Mercado</title>
	</head>
	<body>

<?php
	include('menu.php');
?>
		<form action="cadastrar_precos_db.php" method="post" enctype="multipart/form-data">

			<label for="id_produtos">Produto</label><br>           
			<select name="id_produtos" id="id_produtos">

				<?php
					$sql = "SELECT id, descricao FROM produtos";

					$query = mysqli_query($con, $sql);

					if($query) {
						while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>

				<option value="<?php echo $arr['id']; ?>"><?php echo $arr['descricao']; ?></option>

				<?php
						}
					}
				?>

			</select><br><br>
			
			<label for="id_tipo_gasto">Tipo do Gasto</label><br>
			<select name="id_tipo_gasto" id="id_tipo_gasto">

				<?php
					$sql = "SELECT id, nome FROM tipo_gasto";

					$query = mysqli_query($con, $sql);

					if($query) {
						while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>

				<option value="<?php echo $arr['id']; ?>"><?php echo $arr['nome']; ?></option>

				<?php
						}
					}
				?>
			</select><br><br>

			<label for="valor_mercado">Valor do Produto no Mercado</label><br>
			<input type="text" name="valor_mercado" id="valor_mercado" maxlength="10"><br><br>

			<label for="quantidade_comprada">Quantidade Comprada</label><br>
			<input type="int" name="quantidade_comprada" id="quantidade_comprada" maxlength="5"><br><br>

			<label for="mes_compra">Mês da Compra</label><br>
			<input type="datetime-local" name="mes_compra" id="mes_compra"><br><br>

			
			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>
<?php
	mysqli_close($con);
?>








