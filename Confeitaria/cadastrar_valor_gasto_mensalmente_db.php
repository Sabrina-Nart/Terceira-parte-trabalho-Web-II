<?php
	include('conexao.php');
		
	$id_tipo_gasto                = $_POST['id_tipo_gasto'];
	$mes_gasto                    = $_POST['mes_gasto'];
	$total                        = $_POST['total'];
			
	$sql = "INSERT INTO valor_gasto_mensalmente VALUES (null, '{$id_tipo_gasto}', '{$mes_gasto}', '{$total}')";
			
    $query = mysqli_query($con, $sql);

	if(!$query) {
		$arr['tipo'] = 'erro';
		$arr['msg'] = mysqli_error($con);
	} else {
		$arr['tipo'] = 'ok';
		$arr['msg'] = 'O gasto foi cadastrado com sucesso! Código gerado: ' . mysqli_insert_id($con);
	}

?>