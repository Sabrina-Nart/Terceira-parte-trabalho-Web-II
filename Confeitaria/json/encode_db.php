<?php
	include('../conexao.php');
	
	$sql = "SELECT * FROM cliente";

	$query = mysqli_query($con, $sql);

	$i = 0;

	while($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$dados[$i] = $arr;
		
		$sql = "SELECT * FROM cliente WHERE id_cliente = '{$arr['id']}'";
		
		$query_sub = mysqli_query($con, $sql);

		while($arr_sub = mysqli_fetch_array($query_sub, MYSQLI_ASSOC)) {
			$dados[$i]['cliente'][] = $arr_sub;
		}
		
		$i++;
	}
	echo json_encode($dados);
	
	mysqli_close($con);
?>







