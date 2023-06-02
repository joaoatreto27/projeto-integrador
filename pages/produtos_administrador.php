<?php 
    session_start();
    include_once('conexao.php');

    if ((!isset($_SESSION['cnpj']) === true) and (!isset($_SESSION['senha']) === true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login_cliente.php');
    }else{
            
        $sql = "SELECT * FROM produtos ORDER BY id_produto DESC";
    
    }

    if(!empty($_GET['search'])){

        $data = $_GET['search'];
        $sql = "SELECT * FROM produtos WHERE marca LIKE '%$data%' or nome_produto LIKE '%$data%' ORDER BY id_produto DESC";

    }else{
        
        $sql = "SELECT * FROM produtos ORDER BY id_produto DESC";
    
    }

    $result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="./../styles/franqueado.css">
    <link rel="stylesheet" href="./../styles/hover.css">
    <title>Administrador - Clientes</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="pages">
                <a href="./administrador.php"  class="hover">Home</a>
                <a href="./info_mercados_admin.php" class="hover">Informações de Mercados</a>
                <a href="./clientes_administrador.php" class="hover">Clientes</a>
                <a href="./produtos_administrador.php" class="hover">Produtos Cadastrados</a>
                <a href="./enderecos_administrador.php" class="hover">Endereços Cadastrados</a>
            </div>
            <div class="buttons">
                <a class="sair-btn" href="./sair.php">Sair</a>
            </div>
        </div>
    </header>
    <main>
        <div class="box-search">
            <input type="search" class="form-control" placeholder="Pesquisar" id="pesquisar">
            <button onclick="searchData()" class="btn btn-primary">
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
                        <th scope="col">Nome</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Id Mercado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $user_data['id_produto'] . "</td>";
                        echo "<td>" . $user_data['nome_produto'] . "</td>";
                        echo "<td>" . $user_data['valor'] . "</td>";
                        echo "<td>" . $user_data['codigo_produto'] . "</td>";
                        echo "<td>" . $user_data['marca'] . "</td>";
                        echo "<td>" . $user_data['categoria'] . "</td>";
                        echo "<td> <img class='frame' src='" . $user_data['path'] . "'></td>";
                        echo "<td>" . $user_data['id_mercados'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
<script>
    var search = document.getElementById('pesquisar');
    
    search.addEventListener("keydown", function(event){
        if(event.key === "Enter"){
            searchData();
        }
    });

    function searchData() {

        window.location = 'produtos_administrador.php?search='+search.value;
    }

</script>
</html>