<?php
	//include('validar.php');
	include('conexao.php');
?>
<!DOCTYPE html>

<html lang="pt-br">

	<head>
		<title>Confeitaria - Cadastros dos gastos mensais</title>
	</head>
	<body>
		<?php
			include('menu.php');
			
			$id_produtos               = $_POST['id_produtos'];
			$quantidade_estoque        = $_POST['quantidade_estoque'];
			
			$sql = "INSERT INTO estoque VALUES (null, '{$id_produtos}', '{$quantidade_estoque}')";
			$query = mysqli_query($con, $sql);
			
            if(!$query) {

				echo 'Erro no banco: ' . mysqli_error($con);

			} else {
                
				if(!$query) {

					echo 'Erro no banco: ' . mysqli_error($con);

				} else {

					echo 'Produto cadastrado no estoque com sucesso! Novo estoque de código: ' . $id_produtos;
				}
			}
		?>

	</body>

</html>

<?php
	mysqli_close($con);
?>