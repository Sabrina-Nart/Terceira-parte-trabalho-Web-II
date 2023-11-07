<?php
	include('validar.php');
	include('conexao.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Confeitaria - Cadastro dos Produtos a serem encomendados</title>
	</head>
	<body>
		<?php
			include('menu.php');

			$id_produtos   = $_POST['id_produto'];
			$quantidade = $_SESSION['quantidade'];
			
			$sql = "INSERT INTO encomenda_produtos (id_produtos, quantidade) VALUES ('{$id_produtos[0]}', '{$quantidade}')";
			
            $query = mysqli_query($con, $sql);

			if(!$query) {
				echo 'Erro no banco: ' . mysqli_error($con);
			} else {
				$id_locacao = mysqli_insert_id($con);
				echo 'Encomenda cadastrada com sucesso! Encomenda de código: ' . $id_locacao;
			}
		?>
	</body>
</html>

<?php
	mysqli_close($con);
?>