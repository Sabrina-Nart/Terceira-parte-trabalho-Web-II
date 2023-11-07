<?php

	include('conexao.php');

			$id          = $_POST['id'];
			$nome        = $_POST['nome'];
            $cpf         = $_POST['cpf'];
            $telefone    = $_POST['telefone'];
			$endereco    = $_POST['endereco'];
			$sexo        = $_POST['sexo'];
			$complemento = $_POST['complemento'];
	
	$sql = "UPDATE cliente SET nome = '{$nome}', cpf = '{$cpf}', telefone = '{$telefone}', endereco = '{$endereco}', sexo = '{$sexo}', complemento = '{$complemento}' WHERE id = '{$id}'";

	$query = mysqli_query($con, $sql);
	
	if(!$query) {
		header('Location: listar_cliente.php?erro=1&msg=' . mysqli_error($con));
	} else {
		header('Location: listar_cliente.php?ok=2&id=' . $id);
	}
	
	mysqli_close($con);
?>