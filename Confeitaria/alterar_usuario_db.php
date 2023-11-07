<?php
	//include('validar.php');
	include('conexao.php');

	$id       = mysqli_real_escape_string($con, $_POST['id']);
	$nome     = mysqli_real_escape_string($con, $_POST['nome']);
	$email    = mysqli_real_escape_string($con, $_POST['email']);
	$senha    = mysqli_real_escape_string($con, $_POST['senha']);
	$senha_update = '';
	if($senha){
		$senha = md5($senha);
		$senha_update = "senha = '{$senha}', ";
	}
	$status   = mysqli_real_escape_string($con, $_POST['status']);
	
	$sql = "UPDATE usuario SET nome = '{$nome}', email = '{$email}', {$senha_update} status= '{$status}' WHERE id = '{$id}'";
	$query = mysqli_query($con, $sql);
	if(!$query) {
		header('Location: listar_usuarios.php?erro=1&msg=' . mysqli_error($con));
	} else {
		header('Location: listar_usuarios.php?ok=2&id=' . $id);
	}
	
	mysqli_close($con);
?>