<?php
	include('conexao.php');
		
	$descricao = $_POST['descricao'];
    $tipo      = $_POST['tipo'];
			
	$sql = "INSERT INTO produtos (descricao, tipo) VALUES ('{$descricao}', '{$tipo}')";
			
    $query = mysqli_query($con, $sql);

	if(!$query) {
		$arr['tipo'] = 'erro';
		$arr['msg'] = mysqli_error($con);
	} else {
		$arr['tipo'] = 'ok';
		$arr['msg'] = 'Produto cadastrado com sucesso! Código gerado: ' . mysqli_insert_id($con);
	}
?>