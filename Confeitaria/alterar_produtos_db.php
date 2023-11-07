<?php
	include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Alteração de Produtos</title>
	</head>
	<body>
		<?php
			include('menu.php');
			$con = mysqli_connect('localhost', 'root', '', 'confeitaria');
		
			$id        = $_POST['id'];
			$descricao = $_POST['descricao'];
            $tipo      = $_POST['tipo'];
			
			$sql = "UPDATE produtos SET descricao = '{$descricao}', tipo = '{$tipo}' WHERE id = {$id}";
			
            $query = mysqli_query($con, $sql);

			if(!$query) {
				echo 'Erro no banco: ' . mysqli_error($con);
			} else {
				echo 'Produto alterado com sucesso! Código gerado: ' . $id;
			}
		?>
	</body>
</html>

<?php
	mysqli_close($con);
?>
