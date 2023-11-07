<?php
	include('conexao.php');
		
	$nome = $_POST['nome'];
			
	$sql = "INSERT INTO tipo_gasto (nome) VALUES ('{$nome}')";
			
    $query = mysqli_query($con, $sql);

	if(!$query) {
		$arr['tipo'] = 'erro';
		$arr['msg'] = mysqli_error($con);
	} else {
		$arr['tipo'] = 'ok';
		$arr['msg'] = 'Gasto cadastrado com sucesso! Código gerado: ' . mysqli_insert_id($con);
	}

?>