<!DOCTYPE html>

<html lang="pt-br">

	<head>
		<title>Confeitaria</title>
		<style type="text/css" rel="stylesheet">
			.erro {
				color: red;
			}
		</style>
	</head>

	<body>

<?php
	$erro = @$_GET['erro'];
	$msg  = @$_GET['msg'];

	if($erro == 1) {
		echo "<p class=\"erro\">Erro no banco: {$msg}</p>";
	} else if($erro == 2) {
		echo "<p class=\"erro\">Usuário ou senha inválida!</p>";
	} else if($erro == 3) {
		echo "<p class=\"erro\">Realize o login para continuar!</p>";
	}

?>
		<form action="login_db.php" method="post">
			<label for="email">E-mail</label><br>
			<input type="email" name="email" id="email" maxlength="40"><br><br>
			
			<label for="senha">Senha</label><br>
			<input type="password" name="senha" id="senha" maxlength="20"><br><br>
			
			<button type="submit">Logar</button>
		</form>
		<br>
        <a href="cadastrar_usuarios.php">_ainda não possui um cadastro?</a>
        <br><br>
		</div>
		
	</body>

</html>