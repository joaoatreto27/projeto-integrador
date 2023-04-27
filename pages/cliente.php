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
            
            $sql = "SELECT nome FROM clientes WHERE id_clientes = $idClientes";

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
    <title>Área do Cliente</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="pages">
                <a href="./cliente.php">Home</a>
                <a href="./info_cliente.php">Informações Pessoais</a>
            </div>
            <div class="buttons">
                <a class="sair-btn" href="./sair-cliente.php">Sair</a>
            </div>
        </div>
    </header>
    <main>
        <div class="cards">
            <a class="inf-card card" href="./info_cliente.php">
                <img src="./../assets/info.png" >
                <p>Informações Pessoais</p>
            </a>
        </div>
    </main>
</body>
</html>