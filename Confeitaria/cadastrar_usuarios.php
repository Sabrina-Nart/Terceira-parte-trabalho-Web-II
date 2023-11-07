<?php
	include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastrar Usuários</title>
	</head>
	<body>
<?php
	include('menu.php');
?>
		<form action="cadastrar_usuarios_db.php" method="post">
			<label for="nome">Nome</label><br>
			<input type="text" name="nome" id="nome" maxlength="50"><br><br>
			
			<label for="email">E-mail</label><br>
			<input type="text" name="email" id="email" maxlength="40"><br><br>
			
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
			
			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>









