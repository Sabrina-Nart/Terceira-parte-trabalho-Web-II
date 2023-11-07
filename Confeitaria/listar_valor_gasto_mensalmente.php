<?php
	include('validar.php');
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Confeitaria - Listar o valor dos gastos mensais</title>

		<style type="text/css" rel="stylesheet">
			table {
				border-collapse: collapse;
			}
			th, td {
                text-align: center;
				border: 2px solid black;
                padding: 5px;
			}
		</style>
	</head>
	<body>

<?php	

	include('menu.php');
	$erro = @$_GET['erro'];
	$msg  = @$_GET['msg'];
	$ok   = @$_GET['ok'];
	$id   = @$_GET['id'];

	if($erro == 1) {
		echo "<p class=\"erro\">Erro no banco: {$msg}</p>";
	}

	if($ok == 1) {
		echo "<p class=\"ok\">Gasto cadastrado com sucesso! Novo Gasto de código: {$id}</p>";
	} 
?>

<form>
	<label>Buscar</label><br>
	<input type="text" name="texto" id="texto"> 
	<button type="button" id="buscar">Buscar</button>
</form>


<a href="cadastrar_valor_gasto_mensalmente.php">Cadastrar um novo Gasto</a> 
<!--<a href="json_clientes_db.php" target="_blank">JSON</a>-->

<?php
	$sql = "SELECT v.id, t.id, v.mes_gasto, v.total
			  FROM valor_gasto_mensalmente AS v
  		INNER JOIN tipo_gasto AS t ON (v.id = t.id)";

    $query = mysqli_query($con, $sql);

	if(!$query) {
		echo 'Erro no banco: ' . mysqli_error($con);
	} else {

?>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Tipo de Gasto</th>
					<th>Mês do Gasto</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>

<?php
		while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
				<tr>
					<td><?php echo $arr['id']; ?></td>
                    <td><?php echo $arr['id']; ?></td>
					<td><?php echo ($arr['mes_gasto']); ?></td>					
					<td><?php echo $arr['total']; ?></td>
				</tr>
<?php
		}
?>
			</tbody>
    
		</table>

        <br><br>
        
		<strong>Total de Gastos Cadastrados: </strong><?php echo mysqli_num_rows($query); ?> 

		<?php
	}
?>
		<script type="text/javascript" src="jquery-3.7.0.js"></script>
		<script type="text/javascript">	

			$(document).ready(function () {

				$('#buscar').on('click', function () {
					var texto = $('#texto').val();
					$.ajax({
						url: 'listar_clientes_db.php',
						method: 'GET',
						data: {
							texto: texto
						}
					}).done(function (dados) {
						$('#tabela_clientes tbody').html(dados);
					});
				});
			});

		</script>

	</body>

</html>

<?php
	mysqli_close($con);
?>


