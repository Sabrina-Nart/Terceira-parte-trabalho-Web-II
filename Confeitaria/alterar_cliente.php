<?php
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Confeitaria - Alterar Cliente</title>
	</head>

	<body>

<?php
	include('menu.php');

	$id = $_GET['id'];
	
	$sql = "SELECT * FROM cliente WHERE id = '{$id}'";

	$query = mysqli_query($con, $sql);

	$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

		<form action="alterar_cliente_db.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
		
			<label>Código</label><br>
			<?php echo $id; ?><br><br>
		
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" value="<?php echo $arr['nome']; ?>" maxlength="100"><br<br><br><br>

			<label for="cpf">CPF</label><br>
			<input type="text" name="cpf" id="cpf" value="<?php echo $arr['cpf']; ?>" maxlength="11"><br><br>

			<label for="telefone">Telefone</label><br>
			<input type="text" name="telefone" id="telefone" value="<?php echo $arr['telefone']; ?>" maxlength="11"><br><br>

			<label for="endereco">Endereço</label><br>
			<input type="text" name="endereco" id="endereco" value="<?php echo $arr['endereco']; ?>" maxlength="100"><br><br>
			
			<label for="sexo">Sexo</label><br>
			<select name="sexo" id="sexo">
				<option value="F" <?php if($arr['sexo'] == 'F') { ?>selected="selected"<?php } ?>>Feminino</option>
				<option value="M" <?php if($arr['sexo'] == 'M') { ?>selected="selected"<?php } ?>>Masculino</option>
                <option value="O" <?php if($arr['sexo'] == 'O') { ?>selected="selected"<?php } ?>>Outro</option>
                <option value="P" <?php if($arr['sexo'] == 'P') { ?>selected="selected"<?php } ?>>Prefiro não dizer</option>
			</select><br><br>
			
			<label for="complemento">Complemento</label><br>
			<input type="text" name="complemento" id="complemento" maxlength="100"><br><br>
			
			<button type="submit">Alterar</button>
		</form>

	</body>

</html>

<?php
	mysqli_close($con);
?>








