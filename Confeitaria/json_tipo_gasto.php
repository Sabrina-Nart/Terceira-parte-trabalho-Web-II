<?php
    include('validar.php');
    include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confeitaria - Cadastro de Gasto JSON</title>

</head>
<body class="body-bg">

    <section>
            <?php
                include('menu.php');
            ?>
            
            <h2 class="fundo_titulo">Cadastro de Gasto JSON</h2>

            <div class="cartao">
                <form action="json_tipo_gasto_db.php" method="POST">
                    
                    <label for="dados">Dados</label><br>
                    <textarea id="dados" name="dados" rows="5" cols="33"></textarea>

                    <button class="botao" type="submit">Cadastrar</button>
                
                </form>
            </div>
        </div>
    </section>
    <?php
        include('footer.php');
    ?>
</body>
</html>