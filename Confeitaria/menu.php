<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Confeitaria</title>

		<style type="text/css">
			@import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap');
			
			h1 {
				text-align: center; 
				font-weight: 700;
				font-size: 90px;
				font-family: 'Dancing Script', cursiva;
			}

			.menu {
				list-style-type: none;
				font-size: 20px;
			}

			.menu li {
				float: left;
				padding: 2px 5px;
			}

			.quebrar {
				clear: left;
			}

		</style>

	<body>

		<h1>O que você deseja fazer?</h1>

		<!--<?php echo $_SESSION['usuario']['nome']; ?>-->

		<ul class="menu">
			<li><a href="listar_cliente.php">Clientes</a></li>
			<li><a href="listar_confeiteiro.php">Confeiteiros</a></li>
			<li><a href="listar_encomenda_produtos.php">Produtos Encomendados</a></li>
			<li><a href="listar_encomenda.php">Encomendas</a></li>
			<li><a href="listar_estoque.php">Estoque</a></li>
			<li><a href="listar_precos.php">Preço da Mercadoria</a></li>
			<li><a href="listar_produtos.php">Produtos</a></li>
			<li><a href="listar_tipo_gasto.php">Gastos</a></li>
			<li><a href="listar_valor_gasto_mensalmente.php">Gastos Mensais</a></li>
			<li><a href="listar_usuarios.php">Usuários</a></li>
		</ul>

		<div class="quebrar"></div>

	</body>
</html>
