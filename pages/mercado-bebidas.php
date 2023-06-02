<?php 
    include_once('conexao.php');
    session_start();

    if ((!isset($_SESSION['email']) === true) and (!isset($_SESSION['senha']) === true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login_cliente.php');
    }else{
        if(!empty($_GET['id'])){
            $idMercado = $_GET['id'];

            $sql = "SELECT * FROM produtos WHERE id_mercados = $idMercado AND categoria = 'Bebidas'";

            $result = mysqli_query($conexao, $sql);

            if (isset($_POST['limpar_carrinho'])) {
                $_SESSION['carrinho'] = array();
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/mercado.css">
    <link rel="stylesheet" href="./../styles/hover.css">
    <title>Mercado</title>
</head>
<style>
    .selecionado{
        background-color: #F0F0F0;
    }
</style>
<body>
    <header>
        <div class="header">
            <div class="pages">
                <a href="./cliente.php" class="menu-btn hover">Home</a>
                <a href="./info-cliente.php" class="menu-btn hover">Informações Pessoais</a>
            </div>
            <div class="buttons">
                <a class="sair-btn hover" href="./sair-cliente.php">Sair</a>
            </div>
        </div>
    </header>
    <main>
        <div class="produtos-card">
            <div class="categorias">
                <a href="./mercado.php?id=1" class="btn-categorias">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                    Todos os produtos
                </a>
                <a href="./mercado-mercearia.php?id=1" class="btn-categorias">
                    <img src="https://cdn.icon-icons.com/icons2/2469/PNG/512/basket_market_store_cart_icon_149528.png">
                    Mercearia
                </a>
                <a href="./mercado-bebidas.php?id=1" class="btn-categorias selecionado">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M19.71,2.38,17.62.29a1,1,0,0,0-1.42,0L15,1.51a1,1,0,0,0-.29.7A27.12,27.12,0,0,0,9.44,6.43,1.12,1.12,0,0,1,9,6.72,10.31,10.31,0,0,0,4.51,9.25L.56,13.2a1.91,1.91,0,0,0,0,2.71l3.53,3.53A1.93,1.93,0,0,0,5.45,20a1.91,1.91,0,0,0,1.35-.56l4-4a10.31,10.31,0,0,0,2.53-4.44,1.21,1.21,0,0,1,.28-.49,26.9,26.9,0,0,0,4.23-5.25,1.07,1.07,0,0,0,.7-.29L19.71,3.8A1.05,1.05,0,0,0,20,3.09,1,1,0,0,0,19.71,2.38ZM9.33,14.08,5.45,18,2,14.55l3.89-3.88a8.3,8.3,0,0,1,3.56-2,1.19,1.19,0,0,0,.16.23l1.48,1.48a1.19,1.19,0,0,0,.23.16A8.3,8.3,0,0,1,9.33,14.08Zm3.1-5.23L11.15,7.57a23.05,23.05,0,0,1,4.74-3.73l.27.27A23.56,23.56,0,0,1,12.43,8.85Z"></path>
                    </svg>
                    Bebidas
                </a>
                <a href="./mercado-limpeza.php?id=1" class="btn-categorias"> 
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M16.5,13.84,12.32,7.53V5.89C12.32,4.23,14.58,4,14.67,4a1,1,0,0,0,.79-.5,1,1,0,0,0,0-.93l-1-2a1,1,0,0,0-.9-.56H4.26a1,1,0,0,0-1,1V2.86a1,1,0,0,0,1,1,4.81,4.81,0,0,1,1.83.32,3.74,3.74,0,0,1-1.9,2.44A1,1,0,0,0,4.68,8.5a1,1,0,0,0,.48-.12A5.77,5.77,0,0,0,7.63,5.77a1.88,1.88,0,0,1,0,.2V7.53L3.5,13.84A3,3,0,0,0,3,15.5V17a2.93,2.93,0,0,0,2.9,3h8.2A2.93,2.93,0,0,0,17,17V15.5A3,3,0,0,0,16.5,13.84ZM13.14,2.31a3.94,3.94,0,0,0-2.69,2.58h-1A4.69,4.69,0,0,0,6.31,2.15V2H13ZM15,17a.93.93,0,0,1-.9,1H5.9A.93.93,0,0,1,5,17V15.5a1,1,0,0,1,.17-.56L9.22,8.83h1.56L14.84,15a1,1,0,0,1,.16.55Z"></path>
                    </svg>
                    Limpeza
                </a>
            </div>
            <div class="carrinho">
                <div class="produtos">
                    <?php
                        while($user_data = mysqli_fetch_assoc($result)){
                            echo "<div class='produtos-img'>";
                                echo "<img src='" . $user_data['path'] . "'>";
                                echo "<div class='info-produtos'>";
                                    echo "<p class='valor'> R$ " . $user_data['valor'] . "</p>";
                                    echo "<p>" . $user_data['nome_produto'] . " " . $user_data['marca'] . "</p>";
                                echo "</div>";
                                echo '<form method="POST" action="carrinho.php">';
                                    echo '<input type="hidden" name="id" value="' . $user_data['id_produto'] . '">';
                                    echo '<input type="hidden" name="idMercado" value="' . $idMercado . '">';
                                    echo "<button class='add-btn' type='submit'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus-fill' viewBox='0 0 16 16'>
                                                <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z'/>
                                            </svg>
                                            Comprar
                                        </button>";
                                echo '</form>';
                            echo "</div>";
                        }
                    ?>
                    </div>   
                    <div class="carrinho-de-compras">
                        <div class="header-carrinho">
                            <h5>Meu carrinho de compras</h5>
                        </div>
                        <div class="body-carrinho">
                            <?php
                                if (empty($_SESSION['carrinho'])) {
                                echo '<p>O carrinho está vazio.</p>';
                                $total = 0;
                                } else {

                                    $total = 0;

                                    foreach ($_SESSION['carrinho'] as $produto) {
                                        echo '<div class="produto-carrinho">';
                                            echo '<p class="nome-produto">' . $produto['nome_produto'] . " " . $produto['marca'] . '</p>';
                                            echo '<p class="valor-produto">R$ ' . $produto['valor'] . '</p>';
                                            echo '<form method="post" action="carrinho.php">';
                                                echo '<input type="hidden" name="id_produto" value="' . $produto['id_produto'] . '">';
                                                echo '<button type="submit" name="remover_produto" class="remover-btn">
                                                        <svg class="delete-btn" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                        </svg>
                                                      </button>';
                                            echo '</form>';
                                        echo '</div>';
                                        $total += $produto['valor'];
                                    }
                                }
                            ?>
                        </div>
                        <div class="footer-carrinho">
                            <?php
                            if($total > 0){
                                echo '<p>Total: R$ ' . number_format($total, 2, ',', '.') . '</p>'; 
                                } 
                            if (!empty($_SESSION['carrinho'])){
                                echo '<button class="finalizar-btn">Finaliza compra</button>
                                <button class="limpar-btn" onclick="limparCarrinho()">Limpar Carrinho</button>';
                            }
                            ?>
                        </div>
                    </div>
            </div>
        </div>
    </main>
    <script src="https://kit.fontawesome.com/c1c43739d0.js" crossorigin="anonymous"></script>
    <script src="./../scripts/limpar_carrinho.js"></script>
</body>
</html>