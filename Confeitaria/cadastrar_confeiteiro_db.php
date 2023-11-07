<?php
	include('conexao.php');
		
	$nome              = $_POST['nome'];
	$especialidade     = $_POST['especialidade'];
	$data_contratacao  = $_POST['data_contratacao'];
	
	$sql = "INSERT INTO confeiteiro VALUES (null, '{$nome}', '{$especialidade}', '{$data_contratacao}')";
			
    $query = mysqli_query($con, $sql);

	if(!$query) {
		$arr['tipo'] = 'erro';
		$arr['msg'] = mysqli_error($con);
	} else {
		$arr['tipo'] = 'ok';
		$arr['msg'] = 'Novo colaborador cadastrado com sucesso! Código gerado: ' . mysqli_insert_id($con);
	}

?>
