<?php 
    session_start();
    include_once('conexao.php');

    if ((!isset($_SESSION['cnpj']) === true) and (!isset($_SESSION['senha']) === true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login_cliente.php');
    }else{
            
        $sql = "SELECT * FROM endereco_cliente ORDER BY id_endereco DESC";
    
        $result = $conexao->query($sql);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="./../styles/franqueado.css">
    <title>Administrador - Clientes</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="pages">
                <a href="./administrador.php">Home</a>
                <a href="./info_mercados_admin.php">Informações de Mercados</a>
                <a href="./clientes_administrador.php">Clientes</a>
                <a href="./produtos_administrador.php">Produtos Cadastrados</a>
                <a href="./enderecos_administrador.php">Endereços Cadastrados</a>
            </div>
            <div class="buttons">
                <a class="sair-btn" href="./sair.php">Sair</a>
            </div>
        </div>
    </header>
    <main>
        <div class="box-search">
            <input type="search" class="form-control" placeholder="Pesquisar" id="pesquisar">
            <button class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
        <div class="m-5">
            <table class="table text-black table-bg">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">UF</th>
                        <th scope="col">Numero</th>
                        <th scope="col">Rua</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">CEP</th>
                        <th scope="col">Complemento</th>
                        <th scope="col">Ponto de Referência</th>
                        <th scope="col">Id Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($user_data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $user_data['id_endereco'] . "</td>";
                            echo "<td>" . $user_data['cidade'] . "</td>";
                            echo "<td>" . $user_data['uf'] . "</td>";
                            echo "<td>" . $user_data['numero'] . "</td>";
                            echo "<td>" . $user_data['rua'] . "</td>";
                            echo "<td>" . $user_data['bairro'] . "</td>";
                            echo "<td>" . $user_data['cep'] . "</td>";
                            echo "<td>" . $user_data['complemento'] . "</td>";
                            echo "<td>" . $user_data['ponto_ref'] . "</td>";
                            echo "<td>" . $user_data['id_clientes'] . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>