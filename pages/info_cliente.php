<?php 
    session_start();
    include_once('conexao.php');

    if ((!isset($_SESSION['email']) === true) and (!isset($_SESSION['senha']) === true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login_cliente.php');
    
    }else{
        $sql = "SELECT id_clientes FROM clientes WHERE email = '{$_SESSION['email']}'";

        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) == 1) {
            $idClientes = mysqli_fetch_assoc($resultado)['id_clientes'];
            
            //echo ($idClientes);
            
            $sql = "SELECT * FROM clientes WHERE id_clientes = $idClientes";
            $sqlEndereco = "SELECT * FROM endereco_cliente WHERE id_clientes = $idClientes";

            $result = $conexao->query($sql);
            $resultEndereco = $conexao->query($sqlEndereco);
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/info_cliente.css">
    <link rel="stylesheet" href="./../styles/hover.css">
    <title>Cliente</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="pages">
                <a href="./cliente.php" class="hover">Home</a>
                <a href="./info_cliente.php" class="hover">Informações Pessoais</a>
            </div>
            <div class="buttons">
                <a class="sair-btn hover" href="./sair.php">Sair</a>
            </div>
        </div>
    </header>
    <main>
        <div class="card">
            <div class="infos">
                <?php 
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<p><span>Nome completo:</span> " . $user_data['nome'] . "</p>";
                        echo "<p><span>CPF:</span> " . $user_data['cpf'] . "</p>";
                        echo "<p><span>Email:</span> " . $user_data['email'] . "</p>";
                        echo "<p><span>Telefone:</span> " . $user_data['telefone'] . "</p>";
                        echo "<p><span>Data de Nascimento:</span> " . $user_data['data_nasc'] . "</p>";
                    }
                ?>
            </div>
            <div class="endereco-btn">
                <div class="endereco">
                    <?php 
                        while($user_data = mysqli_fetch_assoc($resultEndereco)){
                            echo "<div class='row'>";
                                echo "<p><span>Cidade:</span> " . $user_data['cidade'] . "</p>";
                                echo "<p><span>UF:</span> " . $user_data['uf'] . "</p>";
                            echo "</div>";
                            echo "<div class='row'>";
                                echo "<p><span>Numero:</span> " . $user_data['numero'] . "</p>";
                                echo "<p><span>CEP:</span> " . $user_data['cep'] . "</p>";
                            echo "</div>";
                            echo "<p><span>Rua:</span> " . $user_data['rua'] . "</p>";
                            echo "<p><span>Bairro:</span> " . $user_data['bairro'] . "</p>";
                            echo "<p><span>Complemento:</span> " . $user_data['complemento'] . "</p>";
                            echo "<p><span>Ponto de Referência:</span> " . $user_data['ponto_ref'] . "</p>";
                        }
                    ?>
                </div>
                <div class="enderecos-clientes">
                    <a class="add-endereco" href="./adicionar_endereco.php">Adicionar Endereço<i class="fa-solid fa-circle-plus"></i></a>
                </div>
            </div>
        </div>
    </main>
    <script src="https://kit.fontawesome.com/c1c43739d0.js" crossorigin="anonymous"></script>
</body>
</html>