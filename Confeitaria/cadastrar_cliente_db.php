<?php
	include('conexao.php');
		
	$nome        = $_POST['nome'];
    $cpf         = $_POST['cpf'];
    $telefone    = $_POST['telefone'];
	$endereco    = $_POST['endereco'];
	$sexo        = $_POST['sexo'];
	$complemento = $_POST['complemento'];
			
	$sql = "INSERT INTO cliente VALUES (null, '{$nome}', '{$cpf}', '{$telefone}', '{$endereco}', '{$sexo}', '{$complemento}')";
			
    $query = mysqli_query($con, $sql);

	if(!$query) {
		$arr['tipo'] = 'erro';
		$arr['msg'] = mysqli_error($con);
	} else {
		$arr['tipo'] = 'ok';
		$arr['msg'] = 'Cliente foi cadastrado com sucesso! Código gerado: ' . mysqli_insert_id($con);
	}

?>


	
