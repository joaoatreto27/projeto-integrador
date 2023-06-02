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
            
            $sql = "SELECT * FROM produtos WHERE categoria = 'Mercearia' and id_mercados = $idMercados";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="./../styles/mercearia.css">
    <link rel="stylesheet" href="./../styles/hover.css">
    <title>Produtos Cadastrados</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="pages">
                <a href="./franqueado.php" class="menu-btn hover">Home</a>
                <a href="./cadastro_produtos.php" class="menu-btn hover">Cadastrar Produto</a>
                <a href="./filtro.php" class="menu-btn hover">Produtos</a>
            </div>
            <div class="buttons">
                <a class="sair-btn" href="./sair.php">Sair</a>
            </div>
        </div>
    </header>
    <main>
        <div class="produtos-card">
            <?php

                if (mysqli_num_rows($result) < 1){
                    echo "<p> Nenhum produto cadastrado! Para cadastrar um produto 
                    <a class='href' href='./cadastro_produtos.php'>Clique Aqui!</a></p>";
                }

                while($user_data = mysqli_fetch_assoc($result)){
                    echo "<div class='produtos-img'>";
                    echo "<img src='" . $user_data['path'] . "'>";
                    echo "<h3> R$ " . $user_data['valor'] . "</h3>";
                    echo "<p>" . $user_data['nome_produto'] . "</p>";
                    echo "<p>" . $user_data['marca'] . "</p>";
                    echo "<a class='btn btn-sm btn-primary' href='edit_produtos.php?id=$user_data[id_produto]' title='Editar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                </svg>
                        </a> 
                        <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id_produto]' title='Deletar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>
                        </a>
                    </div>";
                }
            ?>
        </div>
    </main>
</body>
</html>