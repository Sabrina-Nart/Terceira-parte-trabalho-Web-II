<?php
	include('validar.php');
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">

	<head>
		<title>Confeitaria - Listar os Produtos da Encomenda</title>
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

<a href="cadastrar_encomenda_produtos.php">Cadastrar</a><br><br>

<?php

	$sql = "SELECT e.id_encomenda, p.id, p.descricao, e.quantidade
	          FROM  encomenda_produtos AS e     
			JOIN produtos AS p ON (e.id_produtos = p.id)";

	$query = mysqli_query($con, $sql);

	if(!$query) {
		echo 'Erro no banco: ' . mysqli_error($con);
	} else {

?>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Produto</th>
					<th>Quantidade</th>
				</tr>
			</thead>
			<tbody>
<?php
		while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
				<tr>
					<td><?php echo $arr['id_encomenda']; ?></td>
					<td><?php echo $arr['descricao']; ?></td>
					<td><?php echo $arr['quantidade']; ?></td>
					<!--<td>
						<a href="alterar_locacoes.php?id=<?php echo $arr['id']; ?>">Alterar</a>
						
						<a href="excluir_locacoes_db.php?id=<?php echo $arr['id']; ?>">Excluir</a>
					</td>-->
				</tr>
<?php
		}
?>
			</tbody>
		</table>

<?php
	}
?>

	</body>
</html>

<?php
	mysqli_close($con);
?>