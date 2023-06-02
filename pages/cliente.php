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
        }
        
        if(!empty($_GET['search'])){

            $data = $_GET['search'];
            $sql = "SELECT * FROM mercados WHERE cidade LIKE '%$data%' ORDER BY id_mercados DESC";
    
        }else{
            
            $sql = "SELECT * FROM mercados ORDER BY id_mercados ASC";
        
        }

        $result = $conexao->query($sql);
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
    <title>Área do Cliente</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="pages">
                <a href="./cliente.php" class="hover">Home</a>
                <a href="./info_cliente.php" class="hover">Informações Pessoais</a>
            </div>
            <div class="buttons">
                <a class="sair-btn" href="./sair-cliente.php">Sair</a>
            </div>
        </div>
    </header>
    <main class="main-card">
        <h2>Faça suas compras de mercado sem sair do conforte de sua casa</h2>
        <div class="search">
            <input class="search-input" placeholder="Digite aqui sua cidade..." id="pesquisar"/>
            <button class="search-btn" onclick="searchData()">Pesquisar</button>
        </div>
        <div class="mercados">
            <div class="card-mercados">    
                <?php
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<img src='" . $user_data['path'] . "'>";
                        echo "<p>" . $user_data['nome'] . "</p>";
                        echo "<p>" . $user_data['cidade'] . " - " . $user_data['uf'] ."</p>";
                        echo "<a class='mercado-btn' href='mercado.php?id=$user_data[id_mercados]'>Selecionar Mercado</a>";
                    }
                ?>
            </div>
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
        window.location = 'cliente.php?search=' + search.value;
    }
</script>
</html>