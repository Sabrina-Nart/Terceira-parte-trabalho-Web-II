<?php
	include('validar.php');
	include('conexao.php');

	$nome     = mysqli_real_escape_string($con, $_POST['nome']);
	$email    = mysqli_real_escape_string($con, $_POST['email']);
	$senha    = md5(mysqli_real_escape_string($con, $_POST['senha']));
	$status   = mysqli_real_escape_string($con, $_POST['status']);
	
	$sql = "INSERT INTO usuario VALUES (null, '{$nome}', '{$email}', '{$senha}', '{$status}', '{$admin}')";
	$query = mysqli_query($con, $sql);
	if(!$query) {
		header('Location: listar_usuarios.php?erro=1&msg=' . mysqli_error($con));
	} else {
		header('Location: listar_usuarios.php?ok=1&id=' . mysqli_insert_id($con));
	}

	mysqli_close($con);
?>