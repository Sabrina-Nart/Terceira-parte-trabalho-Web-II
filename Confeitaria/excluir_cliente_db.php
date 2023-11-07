
<?php
	include('conexao.php');

	$id = $_GET['id'];
	
	$sql = "DELETE FROM cliente WHERE id = '{$id}'";

	$query = mysqli_query($con, $sql);

	if(!$query) {
		$arr['tipo'] = 'erro';
		$arr['msg'] = mysqli_error($con);
	} else {
		$arr['tipo'] = 'ok';
		$arr['msg'] = "Cliente excluido com sucesso! Cliente código: {$id}";
	}
	
	echo json_encode($arr);

	mysqli_close($con);
?>