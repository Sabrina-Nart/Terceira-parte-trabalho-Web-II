<?php
	include('validar.php');
	include('conexao.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Confeitaria - Cadastrar os produtos da Encomenda</title>
	</head>
	<body>
		<?php
			include('menu.php');

			$id                 = $_POST['id'];
			$forma_pagamento    = $_POST['forma_pagamento'];
            $data_entrega       = $_POST['data_entrega'];
            $total              = $_POST['total'];
			
			$sql = "INSERT INTO encomenda VALUES (null, '{$forma_pagamento}', '{$data_entrega}', '{$total}')";
			
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