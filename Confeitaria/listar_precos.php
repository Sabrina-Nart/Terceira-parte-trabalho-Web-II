<?php
	include('validar.php');
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Confeitaria - LIstar Preços dos Produtos</title>

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

<form>
	<label>Buscar</label><br>
	<input type="text" name="texto" id="texto"> 
	<button type="button" id="buscar">Buscar</button>
</form>

<br><a href="cadastrar_precos.php">Cadastro dos Preços dos Produtos</a><br>

<!--<a href="json_locacoes_db.php" target="_blank">JSON</a>-->

<?php
	$sql = "SELECT p.id, d.id, t.id, p.valor_mercado, p.id_produtos, p.id_tipo_gasto, p.quantidade_comprada, p.mes_compra
              FROM precos AS p
              INNER JOIN produtos AS d ON (p.id_produtos = d.id)
              INNER JOIN tipo_gasto AS t ON (p.id_tipo_gasto = t.id)";
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
					<th>Tipo de Gasto</th>
                    <th>Valor do Produto no Mercado</th>
                    <th>Quantidade Comprada</th>
					<th>Mês da Compra</th>
				</tr>
			</thead>
			<tbody>
<?php
		while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
				<tr>
					<td><?php echo $arr['id']; ?></td>
                    <td><?php echo $arr['id_produtos']; ?></td>
                    <td><?php echo $arr['id_tipo_gasto']; ?></td>
					<td><?php echo ($arr['valor_mercado']); ?></td>					
					<td><?php echo $arr['quantidade_comprada']; ?></td>
                    <td><?php echo $arr['mes_compra']; ?></td>
				</tr>
<?php
		}
?>
			</tbody>
		</table><br>
        
		Total: <?php echo mysqli_num_rows($query); ?> gasto(s)
	
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
							url: 'excluir_precos_db.php',
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
						url: 'listar_precos_db.php',
						method: 'GET',
						data: {
							texto: texto
						}
					}).done(function (dados) {
						console.log(dados);
						var tabela = $('#tabela_clientes tbody')
						tabela.html('');
						tabela.html(dados);
					});
				});
			});
			
		</script>

	</body>

</html>

<?php
	mysqli_close($con);
?>