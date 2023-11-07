<?php
	include('validar.php');
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Confeitaria - Listar os Produtos do Estoque</title>

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

<br><a href="cadastrar_estoque.php">Cadastro da Quantidade dos Produtos no Estoque</a><br>

<?php
	$sql = "SELECT e.id, p.id, p.descricao, e.quantidade_estoque
			  FROM estoque AS e
			INNER JOIN produtos AS p ON (e.id_produtos = p.id)";
	$query = mysqli_query($con, $sql);						

	if(!$query) {
		echo 'Erro no banco: ' . mysqli_error($con);
	} else {

?><br>
		<table>
			<thead>
				<tr>
					<th>Código</th>
                    <th>Produto</th>
					<th>Descrição</th>
                    <th>Quantidade em Estoque</th>
				</tr>
			</thead>
			<tbody>
<?php
		while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
				<tr>
					<td><?php echo $arr['id']; ?></td>
                    <td><?php echo $arr['id']; ?></td>		
					<td><?php echo $arr['descricao']; ?></td>			
					<td><?php echo $arr['quantidade_estoque']; ?></td>
<?php
		}
?>
			</tbody>
		</table><br>
        
		Total: <?php echo mysqli_num_rows($query); ?> produto(s) em estoque

<?php
	}
?>
	</body>
</html>

<?php
	mysqli_close($con);
?>