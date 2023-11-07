<?php
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Confeitaria - Alterar Confeiteiro</title>
	</head>

	<body>

<?php
	include('menu.php');

	$id = $_GET['id'];

	$sql = "SELECT * FROM confeiteiro WHERE id = '{$id}'";

	$query = mysqli_query($con, $sql);

	$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

		<form action="alterar_confeiteiro_db.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
		
			<label>Código</label><br>
			<?php echo $id; ?><br><br>

			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" value="<?php echo $arr['nome']; ?>" maxlength="100"><br><br>
			
			<label for="especialidade">Especialidade</label><br>
			<select name="especialidade" id="especialidade">
				<option value="B" <?php if($arr['especialidade'] == 'B') { ?>selected="selected"<?php } ?>>Bolos</option>
				<option value="D" <?php if($arr['especialidade'] == 'D') { ?>selected="selected"<?php } ?>>Docinhos</option>
                <option value="S" <?php if($arr['especialidade'] == 'S') { ?>selected="selected"<?php } ?>>Salgados</option>
			</select><br><br>

			<label for="data_contratacao">Data de Contratacao</label><br>
			<input type="date" name="data_contratacao" id="data_contratacao" value="<?php echo $arr['data_contratacao']; ?>" ><br><br>            
			
			<button type="submit">Alterar</button>
		</form>

	</body>

</html>

<?php
	mysqli_close($con);
?>








