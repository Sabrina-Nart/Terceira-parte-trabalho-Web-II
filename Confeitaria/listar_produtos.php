<?php
	include('validar.php');
	include('conexao.php');
?>


<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Listagem dos Produtos</title>

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
		echo "<p class=\"ok\">Produto cadastrado com sucesso! Novo cliente código: {$id}</p>";
	} else if ($ok == 2) {
		echo "<p class=\"ok\">Produto alterado com sucesso! Cliente código: {$id}</p>";
	}
?>

<form>
	<label>Buscar</label><br>
	<input type="text" name="texto" id="texto"> 
	<button type="button" id="buscar">Buscar</button>
</form>


<a href="cadastrar_produtos.php">Cadastrar um novo Produto</a> 
<a href="json_produtos_db.php" target="_blank">JSON</a>

<?php
	$sql = "SELECT id, descricao, tipo FROM produtos";

	$query = mysqli_query($con, $sql);

	if(!$query) {
		echo 'Erro no banco: ' . mysqli_error($con);
	} else {
?>
		<table>
			<thead>
				<tr>
					<th>Código</th>
					<th>Descrição do Produto</th>
                    <th>Classificação do Produto</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
				<tr>
                    <br>
					<td><?php echo isset($arr['id']) ? $arr['id'] : ''; ?></td>
					<td><?php echo isset($arr['descricao']) ? $arr['descricao'] : ''; ?></td>
                    <td><?php echo isset($arr['tipo']) ? $arr['tipo'] : ''; ?></td>
					
                    <td>
						<a href="alterar_produtos.php?id=<?php echo $arr['id']; ?>">Alterar</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
    
		</table>

        <br><br>
        
		<strong>Total de Produtos Cadastrados: </strong><?php echo mysqli_num_rows($query); ?> 
<?php
	}
?>

<script type="text/javascript" src="jquery-3.7.0.js"></script>
		<script type="text/javascript">	

			$(document).ready(function () {

				$('#buscar').on('click', function () {
					var texto = $('#texto').val();
					$.ajax({
						url: 'listar_produtos_db.php',
						method: 'GET',
						data: {
							texto: texto
						}
					}).done(function (dados) {
						$('#tabela_produtos tbody').html(dados);
					});
				});
			});

		</script>

	</body>

</html>

<?php
	mysqli_close($con);
?>