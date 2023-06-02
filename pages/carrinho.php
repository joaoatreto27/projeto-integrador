<?php
    include_once('conexao.php');
    session_start();

    if (isset($_POST['remover_produto'])) {
        $idProduto = $_POST['id_produto'];
        $idMercado = $_POST['idMercado'];
    
        $indice = -1;
        foreach ($_SESSION['carrinho'] as $index => $produto) {
            if ($produto['id_produto'] == $idProduto) {
                $indice = $index;
                break;
            }
        }
    
        if ($indice != -1) {
            unset($_SESSION['carrinho'][$indice]);
        }
    
        header('Location: mercado.php?id=1');
        exit();
    }

    if (isset($_POST['id'])) {

        $idProduto = $_POST['id'];
        $idMercado = $_POST['idMercado'];

        $query = "SELECT * FROM produtos WHERE id_produto = $idProduto";
        $result = mysqli_query($conexao, $query);
        $produto = mysqli_fetch_assoc($result);
        $total = 0;
        if ($produto) {
            $_SESSION['carrinho'][] = $produto;
            $total += $produto['valor'];
            header('Location: mercado.php?id=' . $idMercado);
            
        } else {
            echo 'Produto não encontrado.';
        }

        mysqli_close($conn);
    } else {
        echo 'ID do produto não especificado.';
    }
?>