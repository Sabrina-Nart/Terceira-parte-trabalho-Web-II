<?php
	//include('validar.php');
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Confeitaria - Alterar Usuários</title>
	</head>
	<body>
<?php
	include('menu.php');

	$id = mysqli_real_escape_string($con, $_GET['id']);

	$sql = "SELECT * FROM usuario WHERE id = '{$id}'";

	$query = mysqli_query($con, $sql);

	$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
		<form action="alterar_usuario_db.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		
			<label>Código</label><br>
			<?php echo $id; ?><br><br>
			
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" value="<?php echo $arr['nome']; ?>" maxlength="50"><br><br>
			
			<label for="email">E-mail</label><br>
			<input type="text" name="email" id="email" value="<?php echo $arr['email']; ?>" maxlength="40"><br><br>
			
			<label for="senha">Senha</label><br>
			<input type="password" name="senha" id="senha" maxlength="20"><br><br>
			
			<label for="status">Status</label><br>
			<select name="status" id="status">
				<option value="A">Ativo</option>
				<option value="I">Inativo</option>
			</select><br><br>
			
			<label for="admin">Admin</label><br>
			<select name="admin" id="admin">
				<option value="S">Sim</option>
				<option value="N">Não</option>
			</select><br><br>

			<button type="submit">Alterar</button>
		</form>
	</body>
</html>
<?php
	mysqli_close($con);
?>








