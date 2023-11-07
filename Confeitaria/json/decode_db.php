<?php
	include('conexao.php');
	
	$dados = json_decode($json, true);
	
	foreach($dados as $valor) {
		$id					= $valor['id'];
		$nome				= $valor['nome'];
		$cpf				= $valor['cpf'];
		$telefone			= $valor['telefone'];		
		$endereco			= $valor['endereco'];
		$sexo		        = $valor['sexo'];
		$complemento		= $valor['complemento'];
		
		$sql = "INSERT INTO cliente VALUES ('{$id}', '{$nome}', '{$cpf}', '{$telefone}', '{$endereco}', '{$sexo}', '{$complemento}')";
		
		$query = mysqli_query($con, $sql);
	}
	
	mysqli_close($con);
?>













