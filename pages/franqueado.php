<?php 
    session_start();
    include_once('conexao.php');

    if ((!isset($_SESSION['cnpj']) === true) and (!isset($_SESSION['senha']) === true)) {
        unset($_SESSION['cnpj']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }else{
        $sql = "SELECT id_mercados FROM mercados WHERE cnpj = '{$_SESSION['cnpj']}'";

        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) == 1) {
            $idMercados = mysqli_fetch_assoc($resultado)['id_mercados'];
            
            //echo ($idMercados);
            
            $sql = "SELECT nome FROM mercados WHERE id_mercados = $idMercados";

            $result = $conexao->query($sql);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/franqueado.css">
    <link rel="stylesheet" href="./../styles/hover.css">
    <title>Franqueado</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="pages">
                <a href="./franqueado.php" class="hover">Home</a>
                <a href="./cadastro_produtos.php" class="hover">Cadastrar Produto</a>
                <a href="./filtro.php" class="hover">Produtos</a>
            </div>
            <div class="buttons">
                <a class="sair-btn hover" href="./sair.php">Sair</a>
            </div>
        </div>
    </header>
    <main>
        <div class="cards">
            <a class="inf-card card" href="./info.php">
                <img src="./../assets/info.png" >
                <p>Informações</p>
            </a>
            <a class="cadastro-card card" href="./cadastro_produtos.php">
                <img src="./../assets/shopping-cart.png" alt="">
                <p>Cadastro de Produtos</p>
            </a>
            <a class="produtos-card card" href="./filtro.php">
                <img src="./../assets/package-box.png" alt="">
                <p>Produtos Cadastrados</p>                   
            </a>
        </div>
    </main>
</body>
</html>