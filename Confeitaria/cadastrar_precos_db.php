<?php
	//include('validar.php');
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Confeitaria - Cadastrar Preço dos Produtos no Mercado</title>
	</head>

	<body>
		<?php
			include('menu.php');
		
			$id_produtos          = $_POST['id_produtos'];
			$id_tipo_gasto        = $_POST['id_tipo_gasto'];
			$valor_mercado        = $_POST['valor_mercado'];
			$quantidade_comprada  = $_POST['quantidade_comprada'];
			$mes_compra           =  $_POST['mes_compra'];

			$sql = "INSERT INTO precos VALUES (null, '{$id_produtos}', '{$id_tipo_gasto }', '{$valor_mercado}', '{$quantidade_comprada}', '{$mes_compra}')";

			$query = mysqli_query($con, $sql);
            
			if(!$query) {
				echo 'Erro no banco: ' . mysqli_error($con);
			} else {
				echo 'Preço cadastrado com sucesso! Novo mídia código: ' . mysqli_insert_id($con);
			}
		?>
	</body>

</html>

<?php
	mysqli_close($con);
?>