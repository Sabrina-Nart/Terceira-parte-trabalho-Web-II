
<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Alteração dos Produtos</title>
	</head>

    <style>     
    </style>

	<body>
        
<?php
	include('menu.php');

	$id = $_GET['id'];
	$con = mysqli_connect('localhost', 'root', '', 'confeitaria');

	$sql = "SELECT * FROM produtos WHERE id = '{$id}'";

	$query = mysqli_query($con, $sql);

	$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

        <form action="alterar_produtos_db.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
		
			<label>Código</label><br>
			<?php echo $id; ?><br><br>

			<label for="descricao">Descrição do Produto</label><br>
			<input type="text"
				name="descricao"
				id="descricao"
				value="<?php echo $arr['descricao']; ?>"
				maxlength="100"
			>
			<br><br>
			
			<label for="tipo">Classificação do Produto</label><br>
			<select name="tipo" id="tipo">
				<option value="C" <?php if($arr['tipo'] == 'C') { ?>selected="selected"<?php } ?>>Cereais e Farináceos</option>
                <option value="P" <?php if($arr['tipo'] == 'P') { ?>selected="selected"<?php } ?>>Padaria</option>
				<option value="E" <?php if($arr['tipo'] == 'E') { ?>selected="selected"<?php } ?>>Enlatados</option>
                <option value="L" <?php if($arr['tipo'] == 'L') { ?>selected="selected"<?php } ?>>Laticínios</option>
                <option value="B" <?php if($arr['tipo'] == 'B') { ?>selected="selected"<?php } ?>>Bebidas</option>
                <option value="F" <?php if($arr['tipo'] == 'F') { ?>selected="selected"<?php } ?>>Frios</option>
                <option value="H" <?php if($arr['tipo'] == 'H') { ?>selected="selected"<?php } ?>>Hortifrúti </option>
                <option value="I"<?php if($arr['tipo'] == 'I') { ?>selected="selected"<?php } ?>>Bebidas</option>
                <option value="G" <?php if($arr['tipo'] == 'G') { ?>selected="selected"<?php } ?>>Congelados</option>
                <option value="U" <?php if($arr['tipo'] == 'U') { ?>selected="selected"<?php } ?>>Utensílios para cozinha</option>
			</select><br><br>
			
			<button type="submit">Alterar</button>

		</form>

	</body>

</html>

<?php
	mysqli_close($con);
?>









