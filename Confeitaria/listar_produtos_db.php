<?php
	include('validar.php');
	include('conexao.php');

	$texto = $_GET['texto'];
	
	$sql = "SELECT id, descricao, tipo FROM produtos WHERE descricao LIKE '%{$texto}%'";

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
					<td><?php echo $arr['descricao']; ?></td>
                    <td><?php echo $arr['tipo']; ?></td>
					
				<td>
					<a href="alterar_produtos.php?id=<?php echo $arr['id']; ?>">Alterar</a>
				</td>
			</tr>
<?php
			}
		}
	}

	mysqli_close($con);
?>