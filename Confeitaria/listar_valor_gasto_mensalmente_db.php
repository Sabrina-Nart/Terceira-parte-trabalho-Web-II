<?php
	include('validar.php');
	include('conexao.php');

	$texto = $_GET['texto'];
	
	$sql = "SELECT v.id, t.id, v.mes_gasto, v.total
              FROM valor_gasto_mensalmente AS v
            INNER JOIN tipo_gasto AS t ON (v.id = t.id)
            WHERE nome LIKE '%{$texto}%'";

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

<?php
			}
		}
	}

	mysqli_close($con);
?>