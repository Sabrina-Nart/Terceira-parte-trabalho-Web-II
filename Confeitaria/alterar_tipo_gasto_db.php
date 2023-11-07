<?php

	include('conexao.php');

	$id        = $_POST['id'];
	$nome      = $_POST['nome'];
	
	$sql = "UPDATE tipo_gasto SET nome = '{$nome}' WHERE id = {$id}";

	$query = mysqli_query($con, $sql);
	
	if(!$query) {
		header('Location: listar_tipo_gasto.php?erro=1&msg=' . mysqli_error($con));
	} else {
		header('Location: listar_tipo_gasto.php?ok=2&id=' . $id);
	}
	
	mysqli_close($con);
?>