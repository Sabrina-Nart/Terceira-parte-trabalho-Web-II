<?php
	include('conexao.php');
    include('validar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Confeitaria</title>
	</head>
	<body>
	<div class="conteudo">
	<?php
		$erro = @$_GET['erro'];
		$msg  = @$_GET['msg'];
		$ok   = @$_GET['ok'];
		$id   = @$_GET['id'];
		if($erro == 1) {
			echo "<p class=\"erro\">Erro no banco: {$msg}</p>";
		}
		if($ok == 1) {
			echo "<p class=\"ok\">Usuário cadastrado com sucesso!</p>";
		} 
		?>
		<br><br>
		<a href="index.php">_retornar a tela de login</a> 
		<br><br>
		</div>

	</body>
</html>
<?php
	mysqli_close($con);
?>