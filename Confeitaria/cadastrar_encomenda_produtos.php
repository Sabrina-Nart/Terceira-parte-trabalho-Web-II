<?php
	//include('validar.php');
	session_start();
	include('conexao.php');
?>

<!DOCTYPE html>

<html lang="pt-br">

	<head>
		<title>Confeitaria - Cadastro dos Produtos a serem encomendados</title>
	</head>

	<body>
<?php
	include('menu.php');
?>
		<form action="cadastrar_encomenda_produtos.php" method="post">
			<label for="quantidade">Quantidade</label><br>
			<input type="number" name="quantidade" id="quantidade"><br><br>
			
			<button type="submit">Cadastrar</button>
		</form>

		<form action="cadastrar_encomenda_produtos_db.php" method="post">

			</select><br><br>
			
			<table>
				<thead>
					<tr>
						<th>Produtos</th>
					</tr>
				</thead>
				<tbody>

			<?php
				
				$quantidade = @$_POST['quantidade'];
				$_SESSION['quantidade'] = @$_POST['quantidade'];

				if($quantidade > 0) {
					for($i = 0; $i < $quantidade; $i++) {
			?>
					<tr>
						<td>
							<select name="id_produto[]">
								<?php
									$sql = "SELECT id, descricao FROM produtos";

									$query = mysqli_query($con, $sql);

									if($query) {
										while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
								?>

								<option value="<?php echo $arr['id']; ?>"><?php echo $arr['descricao']; ?></option>
								
                                <?php
										}
									}
								?>
							</select>
						</td>
					</tr>
			<?php
					}
				}
			?>
				</tbody>
			</table><br><br>
			
			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>

<?php
	mysqli_close($con);
?>
