<?php
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Confeitaria - Remover produto do Estoque</title>
	</head>

	<body>
		<?php
			include('menu.php');
		
			$id = $_GET['id'];
			
			$sql = "DELETE FROM produtos WHERE id = '{$id}'";

			$query = mysqli_query($con, $sql);
  
            echo '<br>';
			if(!$query) {
				echo 'Erro no banco: ' . mysqli_error($con);
			} else {
				echo 'Produto removido com sucesso! Código removido: ' . $id;
			}
		?>
	</body>

</html>

<?php
	mysqli_close($con);
?>