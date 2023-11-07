<?php
	include('validar.php');
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Confeitaria - Listar Gastos</title>

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
		echo "<p class=\"ok\">Gasto cadastrado com sucesso! Novo gasto código: {$id}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"ok\">Gasto alterado com sucesso! Gasto código: {$id}</p>";
	} else if ($ok == 3) {
		echo "<p class=\"ok\">Gasto excluido com sucesso! Gasto código: {$id}</p>";
	}
?>

<form>
	<label>Buscar</label><br>
	<input type="text" name="texto" id="texto"> 
	<button type="button" id="buscar">Buscar</button>
</form>

<a href="cadastrar_tipo_gasto.php">Cadastrar um novo Gasto</a> 
<a href="json_tipo_gasto_db.php" target="_blank">JSON</a>

<?php
	$sql =  "SELECT id, nome FROM tipo_gasto";

	$query = mysqli_query($con, $sql);

	if(!$query) {
		echo 'Erro no banco: ' . mysqli_error($con);
	} else {
?>
		<table id="tabela_gasto">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

<?php
		while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>

				<tr>
                    <br>
					<td><?php echo $arr['id']; ?></td>
					<td><?php echo $arr['nome']; ?></td>
					
                    <td>
						<a href="alterar_tipo_gasto.php?id=<?php echo $arr['id']; ?>">Alterar</a>
						
						<a class="excluir">Excluir</a>
					</td> 

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

				$('.excluir').on('click', function () {

					var retorno = confirm('Deseja excluir este item?');

					if(retorno) {
						var obj = $(this);

						var id = obj.closest('tr').find('td').html();
						$.ajax({
							url: 'excluir_gasto_db.php',
							method: 'GET',
							data: {
								id: id
							}

						}).done(function (dados_tipo_gasto) {
							var item = JSON.parse(dados_tipo_gasto);
							alert(item.msg);
							if(item.tipo == 'ok') {
								obj.closest('tr').remove();
							}
						});
					}
				});

				$('#buscar').on('click', function () {
					var texto = $('#texto').val();
					$.ajax({
						url: 'listar_gasto_db.php',
						method: 'GET',
						data: {
							texto: texto
						}
					}).done(function (dados_tipo_gasto) {
						$('#tabela_gasto tbody').html(dados_tipo_gasto);
					});
				});
			});

		</script>

	</body>

</html>

<?php
	mysqli_close($con);
?>