<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title>Alterar Gasto</title>
	</head>

    <style>     
    </style>

	<body>
        
<?php
	include('menu.php');

	$id = $_GET['id'];
	$con = mysqli_connect('localhost', 'root', '', 'confeitaria');

	$sql = "SELECT * FROM tipo_gasto WHERE id = '{$id}'";

	$query = mysqli_query($con, $sql);

	$arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

        <form action="alterar_tipo_gasto_db.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
		
			<label>Código</label><br>
			<?php echo $id; ?><br><br>

			<label for="nome">Tipo de Gasto</label><br>
			<input type="text"
				name="nome"
				id="nome"
				value="<?php echo $arr['nome']; ?>"
				maxlength="50"
			>
			<br><br>
			
			<button type="submit">Alterar</button>

		</form>

	</body>

</html>

<?php
	mysqli_close($con);
?>









