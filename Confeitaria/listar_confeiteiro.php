<?php
	include('validar.php');
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Listar os Confeiteiros</title>

		<style type="text/css" rel="stylesheet">
			table {
				border-collapse: collapse;
			}
			th, td {
                text-align: center;
				border: 2px solid black;
                padding: 5px;
			}
			.erro {
				color: red;
			}
			.ok {
				color: green;
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
		echo "<p class=\"ok\">Confeiteiro cadastrado com sucesso! Novo confeiteiro código: {$id}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"ok\">Confeiteiro alterado com sucesso! Confeiteiro código: {$id}</p>";
	} else if ($ok == 3) {
		echo "<p class=\"ok\">Confeiteiro excluido com sucesso! Confeiteiro código: {$id}</p>";
	}	
?>
    <br>

<a href="cadastrar_confeiteiro.php">Cadastrar um novo colaborador</a>
<a href="json_confeiteiro_db.php" target="_blank">JSON</a>

<?php
	$sql = "SELECT id, nome, especialidade, data_contratacao FROM confeiteiro";

	$query = mysqli_query($con, $sql);

	if(!$query) {
		echo 'Erro no banco: ' . mysqli_error($con);
	} else {
?>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
                    <th>Especialidade</th>
                    <th>Data de Contratação</th>
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
                    <td><?php echo $arr['especialidade']; ?></td>
                    <td><?php echo $arr['data_contratacao']; ?></td>
					
                    <td>
						<a href="alterar_confeiteiro.php?id=<?php echo $arr['id']; ?>">Alterar</a>
						
						<a class="excluir">Excluir</a>
					</td>

				</tr>
<?php
		}
?>
			</tbody>
    
		</table>

        <br><br>
        
		<strong>Total de Funcionários Cadastrados: </strong><?php echo mysqli_num_rows($query); ?> 
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
							url: 'excluir_confeiteiro_db.php',
							method: 'GET',
							data: {
								id: id
							}

						}).done(function (dados) {
							var item = JSON.parse(dados);
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
						url: 'listar_confeiteiro_db.php',
						method: 'GET',
						data: {
							texto: texto
						}
					}).done(function (dados) {
						$('#tabela_confeiteiro tbody').html(dados);
					});
				});
			});

		</script>

	</body>

</html>

<?php
	mysqli_close($con);
?>