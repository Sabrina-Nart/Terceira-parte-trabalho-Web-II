<?php
	include('validar.php');
	include('conexao.php');

	$texto = $_GET['texto'];
	
	$sql = "SELECT p.id, d.id, t.id, p.valor_mercado, p.id_produtos, p.id_tipo_gasto, p.quantidade_comprada, p.mes_compra
              FROM precos AS p
        INNER JOIN produtos AS d ON (p.id_produtos = d.id)
        INNER JOIN tipo_gasto AS t ON (p.id_tipo_gasto = t.id) WHERE d.id LIKE '%{$texto}%'";

	$query = mysqli_query($con, $sql);

	if(!$query) {
?>
			<tr>
				<td colspan="4"><?php echo 'Erro no banco: ' . mysqli_error($con); ?></td>
			</tr>
<?php
	} else {
		if(mysqli_num_rows($query) == 0) {
?>
			<tr>
				<td colspan="4">Não foram encontrados dados!</td>
			</tr>
<?php	
		} else {
			while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
			<tr>
					<td><?php echo $arr['id']; ?></td>
					<td><?php echo $arr['id_produtos']; ?></td>
                    <td><?php echo $arr['id_tipo_gasto']; ?></td>
                    <td><?php echo $arr['valor_mercado']; ?></td>
                    <td><?php echo $arr['quantidade_comprada']; ?></td>
                    <td><?php echo $arr['mes_compra']; ?></td>
					
				<td>
					<a href="alterar_precos.php?id=<?php echo $arr['id']; ?>">Alterar</a>
					
					<a class="excluir">Excluir</a>
				</td>
			</tr>
<?php
			}
		}
	}

	mysqli_close($con);
?>