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
            
            $sql = "SELECT * FROM mercados WHERE id_mercados = $idMercados";

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
    <link rel="stylesheet" href="./../styles/info.css">
    <title>Franqueado</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="pages">
                <a href="./franqueado.php">Home</a>
                <a href="./cadastro_produtos.php">Cadastrar Produto</a>
                <a href="./filtro.php">Produtos</a>
            </div>
            <div class="buttons">
                <a class="sair-btn" href="./sair.php">Sair</a>
            </div>
        </div>
    </header>
    <main>
        <div class="card">
            <div class="infos">
                <?php 
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<p><span>Razão Social:</span> " . $user_data['nome'] . "</p>";
                        echo "<p><span>CNPJ:</span> " . $user_data['cnpj'] . "</p>";
                        echo "<p><span>Inscrição Estadual:</span> " . $user_data['inscricao_estadual'] . "</p>";
                        echo "<p><span>Email:</span> " . $user_data['email'] . "</p>";
                        echo "<p><span>Telefone:</span> " . $user_data['telefone'] . "</p>";
                    
            echo "</div>";
            echo "<div class='endereco'>";

                        echo "<p><span>Cidade:</span> " . $user_data['cidade'] . "</p>";
                        echo "<div class='cep-num'>";
                            echo "<p><span>Numero:</span> " . $user_data['numero'] . "</p>";
                            echo "<p><span>CEP:</span> " . $user_data['cep'] . "</p>";
                        echo "</div>";
                        echo "<p><span>UF:</span> " . $user_data['uf'] . "</p>";
                        echo "<p><span>Rua:</span> " . $user_data['rua'] . "</p>";
                        echo "<p><span>Bairro:</span>" . $user_data['bairro'] . "</p>";
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>