<?php

	include('menu.php');
			
	$id          	   = $_POST['id'];
	$nome              = $_POST['nome'];
	$especialidade     = $_POST['especialidade'];
	$data_contratacao  = $_POST['data_contratacao'];

	$sql = "UPDATE confeiteiro SET nome = '{$nome}', especialidade = '{$especialidade}', data_contratacao = '{$data_contratacao}' WHERE id = '{$id}'";

	$query = mysqli_query($con, $sql);
	
	if(!$query) {
		header('Location: listar_confeiteiro.php?erro=1&msg=' . mysqli_error($con));
	} else {
		header('Location: listar_confeiteiro.php?ok=2&id=' . $id);
	}
	
	mysqli_close($con);
?>