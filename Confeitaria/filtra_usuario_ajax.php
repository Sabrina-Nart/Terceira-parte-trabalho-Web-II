<?php
	include('conexao.php');
	$sql =  " SELECT id, nome, email, senha, status, admin FROM usuario WHERE nome LIKE '%{$_POST['filtro']}%' ";
	
	$query = mysqli_query($con, $sql);

    $dados = [];
    while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$dados[] = $arr;
	}
	
	echo json_encode($dados);
	
	mysqli_close($con);

?>