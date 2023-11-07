<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Cadastrar Encomenda</title>
	</head>

	<body>
        
<?php
	include('menu.php');
?>
		<form action="cadastrar_encomenda_db.php" method="post" enctype="multipart/form-data">

            <?php
					$sql = "SELECT id, nome FROM  confeiteiro";

					$query = mysqli_query($con, $sql);

					if($query) {
						while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>

				<option value="<?php echo $arr['id']; ?>"><?php echo $arr['nome']; ?></option>

				<?php
						}
					}
				?>
			</select><br><br>

            <?php
					$sql = "SELECT id, nome FROM cliente";

					$query = mysqli_query($con, $sql);

					if($query) {
						while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>

				<option value="<?php echo $arr['id']; ?>"><?php echo $arr['nome']; ?></option>

				<?php
						}
					}
				?>

			</select><br><br>

			<label for="forma_pagamento">Forma de Pagamento</label><br>
			<select name="forma_pagamento" id="forma_pagamento">
				<option value="C">Cartão de Débido/Crédito</option>
				<option value="D">Dinheiro</option>
                <option value="P">Pix</option>
			</select><br><br>

            <?php
					$sql = "SELECT id, id_produtos, quantidade FROM encomenda_produtos";

					$query = mysqli_query($con, $sql);

					if($query) {
						while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>

				<option value="<?php echo $arr['id']; ?>"><?php echo $arr['id_produtos']; ?>"><?php echo $arr['quantidade'];?></option>

				<?php
						}
					}
				?>

			</select><br><br>

			<label for="data_entrega">Data de Entrega</label><br>
			<input type="date" name="data_entrega" id="data_entrega"><br><br>

			<label for="total">Total</label><br>
			<input type="int" name="total" id="total" maxlength="4"><br><br>

			<button type="submit">Cadastrar</button>
		</form>
	</body>
</html>
