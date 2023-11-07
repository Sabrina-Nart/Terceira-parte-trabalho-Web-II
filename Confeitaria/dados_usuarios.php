<?php
	include('conexao.php');
    
	$sql =  " SELECT  id , nome, email FROM usuarios %{$_POST['filtro']}%' ";

	$query = mysqli_query($con, $sql);

    $dados = [];
    while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$dados_usuarios[] = $arr;
	}
	
	echo json_encode($dados_usuarios);
	
	mysqli_close($con);

?>