<?php
	include('validar.php');
	include('conexao.php');

    $json = $_POST['dados'];
    $dados = json_decode($json, true);
    print_r($dados);

    foreach($dados as $usuario) {
        $sql = "SELECT * FROM cliente";
        $query = mysqli_query($con, $sql);
                        
        $id        = $usuario['id'];
        $nome      = $usuario['nome'];
        $cpf     = $usuario['cpf'];
        $telefone    = $usuario['telefone'];
        $endereco     = $usuario['endereco'];
		$complemento     = $usuario['complemento'];
        
        if(mysqli_num_rows($query) > 0) {
            $sql = "UPDATE cliente SET nome = '{$nome}',
                cpf = '{$cpf}',
                telefone = '{$telefone}',
                endereco = '{$endereco}',
                complemento = '{$complemento}' 
                WHERE id = '{$id}' ";

        } else {
            $sql = "INSERT INTO cliente VALUES (
                '{$id}',
                '{$nome}',
                '{$cpf}',
                '{$telefone}',
                '{$endereco}',
                '{$complemento}' 
            )";
        }
        
        $query = mysqli_query($con, $sql);
    }

    if(!$query) {
		header('Location: json_clientes.php?erro=1&msg=' . mysqli_error($con));
	} else {
		header('Location: listar_cliente.php?ok=1&id=' . mysqli_insert_id($con));
	}
?>






