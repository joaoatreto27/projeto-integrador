<?php 
    session_start();
    include_once('conexao.php');

    if ((!isset($_SESSION['cnpj']) === true) and (!isset($_SESSION['senha']) === true)) {
        unset($_SESSION['cnpj']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/filtro.css">
    <link rel="stylesheet" href="./../styles/hover.css">
    <title>Categorias</title>
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
                <a class="sair-btn hover" href="./sair.php" >Sair</a>
            </div>
        </div>
    </header>
    <main>
        <h2>Categorias</h2>
        <div class="filtros-card">
            <div class="filtros">
                <a class="fundo-branco" href="./mercearia.php">
                    <img class="mercearia-img" src="./../assets/mercearia.png">
                    <p>Mercearia</p>
                </a>
            </div>
            <div class="filtros">
                <a class="fundo-branco" href="./limpeza.php">
                    <img class="limpeza-img" src="./../assets/limpeza.png">
                    <p>Limpeza</p>
                </a>
            </div>
            <div class="filtros">
                <a class="fundo-branco" href="./bebidas.php">
                    <img class="bebidas-img" src="./../assets/bebidas.png">
                    <p>Bebidas</p>
                </a>
            </div>
        </div>
    </main>
</body>
</html>