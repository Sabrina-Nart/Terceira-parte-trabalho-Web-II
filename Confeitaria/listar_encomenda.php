<?php
	include('validar.php');
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Confeitaria - Listar os produtos da Encomenda</title>

		<style type="text/css" rel="stylesheet">
			table {
				border-collapse: collapse;
			}
			th, td {
				border: 1px solid black;
			}
		</style>
	</head>

	<body>

<?php
	include('menu.php');
?>

<br><a href="cadastrar_encomenda.php">Cadastrar os produtos da Encomenda</a><br>

<?php
	$sql = "SELECT
					encomenda.id,
					confeiteiro.nome,
					cliente.nome,
					encomenda.forma_pagamento,
					encomenda_produtos.id,
					encomenda.data_entrega,
					encomenda.total
				FROM encomenda
	
				LEFT JOIN cliente
					ON (cliente.id = encomenda.id_cliente)
				LEFT JOIN confeiteiro
					ON (confeiteiro.id = encomenda.id_confeiteiro)
				JOIN encomenda_produtos
					ON (encomenda_produtos.id_encomenda = encomenda.id_encomenda_produto)";
            
    $query = mysqli_query($con, $sql);						

	if(!$query) {
		echo 'Erro no banco: ' . mysqli_error($con);
	} else {

?><br>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Confeiteiro</th>
                    <th>Cliente</th>
					<th>Forma de Pagamento</th>
                    <th>Produtos</th>
                    <th>Data da Entrega</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
                <?php
                    while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                ?>
				<tr>
					<td><?php echo $arr['id']; ?></td>
                    <td><?php echo $arr['nome']; ?></td>
                    <td><?php echo $arr['nome']; ?></td>
					<td><?php echo ($arr['forma_pagamento']); ?></td>
					<td><?php echo $arr['id']; ?></td>
                    <td><?php echo $arr['data_entrega']; ?></td>
					<td><?php echo $arr['total']; ?></td>

                <?php
                    }
                ?>
			</tbody>
		</table><br>
        
		Total: <?php echo mysqli_num_rows($query); ?> encomenda(s)

<?php
	}
?>
	</body>
</html>

<?php
	mysqli_close($con);
?>